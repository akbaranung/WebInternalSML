<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_databerita extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_data_berita');
		$this->load->model('M_kategori_berita');
		if ($this->session->userdata('level' != 2)) {
			redirect('Admin/Auth');
		}
	}
	public function index()
	{
		$data['berita'] = $this->M_data_berita->tampil_data()->result();
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Berita';

		$this->load->view('Admin/admin_header', $data);
		$this->load->view('Admin/admin_sidebar');
		$this->load->view('Admin/admin_topbar');
		$this->load->view('Admin/v_databerita', $data);
		$this->load->view('Admin/admin_footer');
	}

	public function tambah()
	{
		$this->form_validation->set_rules('judul', 'Judul Berita', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal Terbit', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori Berita', 'required');


		$data['berita'] = $this->M_kategori_berita->tampil_data_kategori()->result();
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Form Tambah Data Berita';


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Admin/admin_header', $data);
			$this->load->view('Admin/admin_sidebar');
			$this->load->view('Admin/admin_topbar');
			$this->load->view('Admin/v_formberita', $data);
			$this->load->view('Admin/admin_footer');
		} else {
			$judul = $this->input->post('judul', true);
			$tanggal = $this->input->post('tanggal', true);
			$deskripsi = $this->input->post('deskripsi', true);
			$kategori = $this->input->post('kategori', true);


			$config['upload_path'] = './uploads/berita';
			$config['allowed_types'] = 'jpg|png|jpeg|gif|pdf|docx|doc|ppt|pptx';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
			} else {
				$gambar = $this->upload->data();
				$gambar = $gambar['file_name'];
			}

			if (!$this->upload->do_upload('file')) {
			} else {
				$file = $this->upload->data();
				$file = $file['file_name'];
			}


			$data = array(
				'judul'             => $judul,
				'tgl_berita_terbit' => $tanggal,
				'deskripsi'         => $deskripsi,
				'katagori_berita'   => $kategori,
				'gambar'			=> $gambar,
				'file'				=> $file
			);


			$this->M_data_berita->input_data($data, 'berita');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan! </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  	</div>');
			redirect('Admin/C_databerita');
		}
	}

	public function hapus($id)
	{

		$data = $this->M_data_berita->getdataById($id)->row();
		$namaGambar = './uploads/berita/' . $data->gambar;
		$namaDokumen = './uploads/berita/' . $data->file;

		if (($data->gambar != '') && ($data->file != '')) {
			if ((is_readable($namaGambar) && unlink($namaGambar)) && (is_readable($namaDokumen) && unlink($namaDokumen))) {
				$where = array('id' => $id);
				$this->M_data_berita->hapus_data($where, 'berita');
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Data berhasil dihapus! </strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  	</div>');
				redirect('Admin/C_databerita');
			}
		} elseif ($data->gambar != '') {
			if (is_readable($namaGambar) && unlink($namaGambar)) {
				$where = array('id' => $id);
				$this->M_data_berita->hapus_data($where, 'berita');
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data berhasil dihapus! </strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>');
				redirect('Admin/C_databerita');
			}
		} elseif ($data->file != '') {
			if (is_readable($namaDokumen) && unlink($namaDokumen)) {
				$where = array('id' => $id);
				$this->M_data_berita->hapus_data($where, 'berita');
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data berhasil dihapus! </strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>');
				redirect('Admin/C_databerita');
			}
		} else {
			$where = array('id' => $id);
			$this->M_data_berita->hapus_data($where, 'berita');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil dihapus! </strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  	</div>');
			redirect('Admin/C_databerita');
		}
	}

	public function edit($id)
	{
		$data['berita'] = $this->M_kategori_berita->tampil_data_kategori()->result();
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Form Edit Data Berita';
		$data['data_berita'] = $this->M_data_berita->edit_data($id)->result();
		$this->load->view('Admin/admin_header', $data);
		$this->load->view('Admin/admin_sidebar');
		$this->load->view('Admin/admin_topbar');
		$this->load->view('Admin/v_form_edit_berita', $data);
		$this->load->view('Admin/admin_footer');
	}

	public function update()
	{
		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$tanggal = $this->input->post('tanggal');
		$deskripsi = $this->input->post('deskripsi');
		$kategori = $this->input->post('kategori');
		$upload_image = $_FILES['gambar']['name'];
		$upload_file = $_FILES['file']['name'];

		if ($upload_image && $upload_file) {
			$config['upload_path'] = './uploads/berita';
			$config['allowed_types'] = 'jpg|png|jpeg|gif|pdf|docx|doc|ppt|pptx|xlsx|xls';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				echo $this->upload->display_error();
			} else {
				$new_gambar = $this->upload->data();
				$new_gambar = $new_gambar['file_name'];
			}

			if (!$this->upload->do_upload('file')) {
				echo $this->upload->display_error();
			} else {
				$new_file = $this->upload->data();
				$new_file = $new_file['file_name'];
			}

			$data = array(
				'judul' 			=> $judul,
				'tgl_berita_terbit' => $tanggal,
				'gambar'			=> $new_gambar,
				'deskripsi'			=> $deskripsi,
				'file'				=> $new_file,
				'katagori_berita'	=> $kategori
			);
		} else if ($upload_image) {
			$config['upload_path'] = './uploads/berita';
			$config['allowed_types'] = 'jpg|png|jpeg|gif|';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				echo $this->upload->display_error();
			} else {
				$new_gambar = $this->upload->data();
				$new_gambar = $new_gambar['file_name'];
			}
			$data = array(
				'judul' 			=> $judul,
				'tgl_berita_terbit' => $tanggal,
				'gambar'			=> $new_gambar,
				'deskripsi'			=> $deskripsi,
				'katagori_berita'	=> $kategori
			);
		} else if ($upload_file) {
			$config['upload_path'] = './uploads/berita';
			$config['allowed_types'] = 'pdf|docx|doc|ppt|pptx|xlsx|xls';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) {
				echo $this->upload->display_error();
			} else {
				$new_file = $this->upload->data();
				$new_file = $new_file['file_name'];
			}
			$data = array(
				'judul' 			=> $judul,
				'tgl_berita_terbit' => $tanggal,
				'file'				=> $new_file,
				'deskripsi'			=> $deskripsi,
				'katagori_berita'	=> $kategori
			);
		} else {
			$data = array(
				'judul' 			=> $judul,
				'tgl_berita_terbit' => $tanggal,
				'deskripsi'			=> $deskripsi,
				'katagori_berita'	=> $kategori
			);
		}

		$where = array(
			'id' => $id
		);


		$this->M_data_berita->update_data($where, $data, 'berita');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil diubah! </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  	</div>');
		redirect('Admin/C_databerita');
	}

	public function detail($id)
	{
		$data['berita'] = $this->M_kategori_berita->tampil_data_kategori()->result();
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Detail Berita';
		$data['data_berita'] = $this->M_data_berita->edit_data($id)->result();
		$this->load->view('Admin/admin_header', $data);
		$this->load->view('Admin/admin_sidebar');
		$this->load->view('Admin/admin_topbar');
		$this->load->view('Admin/v_detailberita', $data);
		$this->load->view('Admin/admin_footer');
	}
}
