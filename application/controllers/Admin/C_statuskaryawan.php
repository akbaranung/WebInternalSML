<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_statuskaryawan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_data_statuskaryawan');
		if ($this->session->userdata('level'!= 2)) {
			redirect('Admin/Auth');
		}
	}
	public function index()
	{
		$data['status'] = $this->M_data_statuskaryawan->tampil_data()->result();
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Status Karyawan';

		$this->load->view('Admin/admin_header', $data);
		$this->load->view('Admin/admin_sidebar');
		$this->load->view('Admin/admin_topbar');
		$this->load->view('Admin/v_statuskaryawan', $data);
		$this->load->view('Admin/admin_footer');
	}

	public function tambah()
	{
		$this->form_validation->set_rules('status', 'Status Karyawan', 'required');

		$data['status'] = $this->M_data_statuskaryawan->tampil_data()->result();
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Form Tambah Data Status Karyawan';


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Admin/admin_header', $data);
			$this->load->view('Admin/admin_sidebar');
			$this->load->view('Admin/admin_topbar');
			$this->load->view('Admin/v_form_statuskaryawan', $data);
			$this->load->view('Admin/admin_footer');
		} else {
			$status = $this->input->post('status', true);

			$data = array(
				'status' => $status
			);


			$this->M_data_statuskaryawan->input_data($data, 'status_karyawan');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan! </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  	</div>');
			redirect('Admin/C_statuskaryawan');
		}
	}

	public function edit($id)
	{
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Form Edit Status Karyawan';
		$data['status'] = $this->M_data_statuskaryawan->edit_data($id)->result();
		$this->load->view('Admin/admin_header', $data);
		$this->load->view('Admin/admin_sidebar');
		$this->load->view('Admin/admin_topbar');
		$this->load->view('Admin/v_form_edit_statuskaryawan', $data);
		$this->load->view('Admin/admin_footer');
	}

	public function update()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$data = array(
			'status' => $status
		);

		$where = array(
			'id' => $id
		);
		$this->M_data_statuskaryawan->update_data($where, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil diubah! </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  	</div>');
		redirect('Admin/C_statuskaryawan');
	}

	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->M_data_statuskaryawan->hapus_data($where, 'status_karyawan');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus! </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  	</div>');
		redirect('Admin/C_statuskaryawan');
	}
}
