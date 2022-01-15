<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_datadokumentasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_data_dokumentasi');
		if ($this->session->userdata('level'!= 2)) {
			redirect('Admin/Auth');
		}
	}
	public function index()
	{
		$data['dokumentasi'] = $this->M_data_dokumentasi->tampil_data()->result();
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Dokumentasi';

		$this->load->view('Admin/admin_header', $data);
		$this->load->view('Admin/admin_sidebar');
		$this->load->view('Admin/admin_topbar');
		$this->load->view('Admin/v_datadokumentasi', $data);
		$this->load->view('Admin/admin_footer');
	}

	public function tambah()
	{
		$this->form_validation->set_rules('namakegiatan', 'Nama Kegiatan', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal Kegiatan', 'required');

		$data['dokumentasi'] = $this->M_data_dokumentasi->tampil_data()->result();
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Form Tambah Data Dokumentasi';

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Admin/admin_header', $data);
			$this->load->view('Admin/admin_sidebar');
			$this->load->view('Admin/admin_topbar');
			$this->load->view('Admin/v_formdokumentasi', $data);
			$this->load->view('Admin/admin_footer');
		} else {
			$namakegiatan = $this->input->post('namakegiatan', true);
			$tanggalkegiatan = $this->input->post('tanggal', true);
			$gambarkegiatan = $_FILES['gambarkegiatan'];

			if ($gambarkegiatan = '') {
			} else {
				$config['upload_path'] = './uploads/dokumentasi';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambarkegiatan')) {
				} else {
					$gambarkegiatan = $this->upload->data('file_name');
				}
			}

			$data = array(
				'nama_kegiatan'         => $namakegiatan,
				'gambar'     			=> $gambarkegiatan,
				'tgl_kegiatan'			=> $tanggalkegiatan,
			);
			$this->M_data_dokumentasi->input_data($data, 'dokumen');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan! </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
			redirect('Admin/C_datadokumentasi');
		}
	}

	public function edit($id)
	{
		$data['dokumentasi'] = $this->M_data_dokumentasi->tampil_data()->result();
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Form Edit Data Dokumentasi';
		$data['data_dokumentasi'] = $this->M_data_dokumentasi->edit_data($id)->result();
		$this->load->view('Admin/admin_header', $data);
		$this->load->view('Admin/admin_sidebar');
		$this->load->view('Admin/admin_topbar');
		$this->load->view('Admin/v_form_edit_dokumentasi', $data);
		$this->load->view('Admin/admin_footer');
	}

	public function update()
	{
		$id = $this->input->post('id');
		$namakegiatan = $this->input->post('namakegiatan', true);
		$tanggalkegiatan = $this->input->post('tanggal', true);
		$upload_image = $_FILES['gambarkegiatan']['name'];

		if ($upload_image) {
			$config['upload_path'] = './uploads/dokumentasi';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambarkegiatan')) {
				echo $this->upload->display_error();
			} else {
				$new_gambarkegiatan = $this->upload->data();
				$new_gambarkegiatan = $new_gambarkegiatan['file_name'];
			}

			$data = array(
				'nama_kegiatan'         => $namakegiatan,
				'gambar'     			=> $new_gambarkegiatan,
				'tgl_kegiatan'			=> $tanggalkegiatan
			);
		} else {
			$data = array(
				'nama_kegiatan'         => $namakegiatan,
				'tgl_kegiatan'			=> $tanggalkegiatan
			);
		}

		$where = array(
			'id' => $id
		);

		$this->M_data_dokumentasi->update_data($where, $data, 'dokumentasi');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Data berhasil diupdate! </strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  	</div>');
		redirect('Admin/C_datadokumentasi');
	}

	public function hapus($id)
	{
		$data = $this->M_data_dokumentasi->getdataById($id)->row();
		$namaGambar = './uploads/dokumentasi/' . $data->gambar;
		if ($data->gambar != '') {
			if (is_readable($namaGambar) && unlink($namaGambar))
				$where = array('id' => $id);
			$this->M_data_dokumentasi->hapus_data($where, 'dokumen');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Data berhasil dihapus! </strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
					</div>');
			redirect('Admin/C_datadokumentasi');
		} else {
			$where = array('id' => $id);
			$this->M_data_dokumentasi->hapus_data($where, 'dokumen');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Data berhasil dihapus! </strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
					</div>');
			redirect('Admin/C_datadokumentasi');
		}
	}
}
