<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_datakaryawan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_data_karyawan');
		if ($this->session->userdata('level'!= 2)) {
			redirect('Admin/Auth');
		}
	}
	public function index()
	{
		$data['karyawan'] = $this->M_data_karyawan->tampil_data()->result();
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Karyawan';

		$this->load->view('Admin/admin_header', $data);
		$this->load->view('Admin/admin_sidebar');
		$this->load->view('Admin/admin_topbar');
		$this->load->view('Admin/v_datakaryawan', $data);
		$this->load->view('Admin/admin_footer');
	}


	public function tambah()
	{
		$this->form_validation->set_rules('nama', 'Nama Karyawan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Karyawan', 'required');
		$this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('email', 'Email Karyawan', 'required');
		$this->form_validation->set_rules('notelpon', 'No telfon', 'required');
		$this->form_validation->set_rules('divisi', 'Divisi Karyawan', 'required');
		$this->form_validation->set_rules('password', 'Password Karyawan', 'required');
		$this->form_validation->set_rules('status', 'Status Karyawan', 'required');


		$data['karyawan'] = $this->M_data_karyawan->tampil_data_status_karyawan()->result();
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Form Tambah Data Karyawan';

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Admin/admin_header', $data);
			$this->load->view('Admin/admin_sidebar');
			$this->load->view('Admin/admin_topbar');
			$this->load->view('Admin/v_formkaryawan', $data);
			$this->load->view('Admin/admin_footer');
		} else {
			$nama = $this->input->post('nama', true);
			$alamat = $this->input->post('alamat', true);
			$jeniskelamin = $this->input->post('jeniskelamin', true);
			$email = $this->input->post('email', true);
			$notelpon = $this->input->post('notelpon', true);
			$fotokaryawan = $_FILES['fotokaryawan'];
			$divisi = $this->input->post('divisi', true);
			$password = $this->input->post('password', true);
			$status = $this->input->post('status', true);
			if ($fotokaryawan = '') {
			} else {
				$config['upload_path'] = './uploads/karyawan';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('fotokaryawan')) {
				} else {
					$fotokaryawan = $this->upload->data('file_name');
				}
			}

			$data = array(
				'nama'             	=> $nama,
				'alamat' 			=> $alamat,
				'jenis_kelamin'     => $jeniskelamin,
				'email'   			=> $email,
				'no_telpon'			=> $notelpon,
				'foto_karyawan'     => $fotokaryawan,
				'divisi'			=> $divisi,
				'password'			=> $password,
				'status'			=> $status,
				'level'				=> 1
			);
			$this->M_data_karyawan->input_data($data, 'karyawan');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan! </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
			redirect('Admin/C_datakaryawan');
		}
	}

	public function edit($id)
	{
		$data['karyawan'] = $this->M_data_karyawan->tampil_data_status_karyawan()->result();
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Form Edit Data Karyawan';
		$data['data_karyawan'] = $this->M_data_karyawan->edit_data($id)->result();
		$this->load->view('Admin/admin_header', $data);
		$this->load->view('Admin/admin_sidebar');
		$this->load->view('Admin/admin_topbar');
		$this->load->view('Admin/v_form_edit_karyawan', $data);
		$this->load->view('Admin/admin_footer');
	}

	public function update()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$jeniskelamin = $this->input->post('jeniskelamin');
		$email = $this->input->post('email');
		$notelpon = $this->input->post('notelpon');
		$divisi = $this->input->post('divisi');
		$password = $this->input->post('password');
		$status = $this->input->post('status');
		$level = $this->input->post('level');
		$upload_image = $_FILES['fotokaryawan']['name'];

		if ($upload_image) {
			$config['upload_path'] = './uploads/karyawan';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('fotokaryawan')) {
				echo $this->upload->display_error();
			} else {
				$new_fotokaryawan = $this->upload->data();
				$new_fotokaryawan = $new_fotokaryawan['file_name'];
			}
			$data = array(
				'nama'             	=> $nama,
				'alamat' 			=> $alamat,
				'jenis_kelamin'     => $jeniskelamin,
				'email'   			=> $email,
				'no_telpon'			=> $notelpon,
				'foto_karyawan'     => $new_fotokaryawan,
				'divisi'			=> $divisi,
				'password'			=> $password,
				'status'			=> $status,
				'level'				=> $level
			);
		} else {
			$data = array(
				'nama'             	=> $nama,
				'alamat' 			=> $alamat,
				'jenis_kelamin'     => $jeniskelamin,
				'email'   			=> $email,
				'no_telpon'			=> $notelpon,
				'divisi'			=> $divisi,
				'password'			=> $password,
				'status'			=> $status,
				'level'				=> $level
			);
		}
		
		$where = array(
			'id' => $id
		);

		$this->M_data_karyawan->update_data($where, $data, 'karyawan');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Data berhasil diupdate! </strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  	</div>');
		redirect('Admin/C_datakaryawan');
	}

	public function hapus($id)
	{
		$data = $this->M_data_karyawan->getdataById($id)->row();
		$namaGambar = './uploads/karyawan/' . $data->foto_karyawan;
		if ($data->foto_karyawan != '') {
			if (is_readable($namaGambar) && unlink($namaGambar))
				$where = array('id' => $id);
			$this->M_data_karyawan->hapus_data($where, 'karyawan');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Data berhasil dihapus! </strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
					</div>');
			redirect('Admin/C_datakaryawan');
		} else {
			$where = array('id' => $id);
			$this->M_data_karyawan->hapus_data($where, 'karyawan');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Data berhasil dihapus! </strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
					</div>');
			redirect('Admin/C_datakaryawan');
		}
	}
}
