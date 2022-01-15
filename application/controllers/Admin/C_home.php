<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_profile');
		if ($this->session->userdata('level'!= 2)) {
			redirect('Admin/Auth');
		}
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Dashboard';
		$data['count_berita'] = $this->db->query("SELECT count(*) as jumlah FROM berita")->result();
		$data['count_dokumen'] = $this->db->query("SELECT count(*) as jumlah FROM dokumen_perusahaan")->result();
		$data['count_karyawan'] = $this->db->query("SELECT count(*) as jumlah FROM karyawan")->result();
		$this->load->view('Admin/admin_header', $data);
		$this->load->view('Admin/admin_sidebar', $data);
		$this->load->view('Admin/admin_topbar', $data);
		$this->load->view('Admin/Home', $data);
		$this->load->view('Admin/admin_footer');
	}

	public function edit()
	{
		$id = $this->uri->segment(4);
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Profile';
		$data['data'] = $this->db->query('SELECT * FROM karyawan WHERE id = ' . $id)->result();
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}

		$this->load->view('Admin/admin_header', $data);
		$this->load->view('Admin/admin_sidebar', $data);
		$this->load->view('Admin/admin_topbar', $data);
		$this->load->view('Admin/v_form_editprofile', $data);
		$this->load->view('Admin/admin_footer');
	}

	public function update()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image) {
			$config['upload_path'] = './uploads/profile';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				echo $this->upload->display_errors();
			} else {
				$new_gambar = $this->upload->data();
				$new_gambar = $new_gambar['file_name'];
			}
			$data = array(
				'nama' => $nama,
				'foto_karyawan'    => $new_gambar
			);
		} else {
			$data = array(
				'nama' => $nama
			);
		}

		$where = array(
			'id' => $id
		);


		$this->M_profile->update_data_profile($where, $data, 'admin');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diubah! </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
		redirect('Admin/C_home');
	}
}
