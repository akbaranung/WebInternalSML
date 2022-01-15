<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_kategori_dokumenperusahaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori_dokumenperusahaan');
        if ($this->session->userdata('level'!= 2)) {
            redirect('Admin/Auth');
        }
    }

    public function index()
    {
        $data['kategori'] = $this->M_kategori_dokumenperusahaan->tampil_data()->result();
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Kategori Dokumen Perusahaan';
        $this->load->view('Admin/admin_header', $data);
        $this->load->view('Admin/admin_sidebar');
        $this->load->view('Admin/admin_topbar');
        $this->load->view('Admin/v_kategori_dokumenperusahaan', $data);
        $this->load->view('Admin/admin_footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kategori', 'Kategori Dokumen Perusahaan', 'required');
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Form Tambah Kategori Dokumen Perusahaan';

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Admin/admin_header', $data);
            $this->load->view('Admin/admin_sidebar');
            $this->load->view('Admin/admin_topbar');
            $this->load->view('Admin/v_formkategori_dokumenperusahaan');
            $this->load->view('Admin/admin_footer');
        } else {
            $kategori = $this->input->post('kategori', true);

            $data = array(
                'nama_kategori'    => $kategori
            );

            $this->M_kategori_dokumenperusahaan->input_data($data, 'kategori_dokumen_perusahaan');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan! </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  	</div>');
            redirect('Admin/C_kategori_dokumenperusahaan');
        }
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_kategori_dokumenperusahaan->hapus_data($where, 'kategori_dokumen_perusahaan');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus! </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  	</div>');
        redirect('Admin/C_kategori_dokumenperusahaan');
    }

    public function edit($id)
    {
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Form Edit Kategori Dokumen Perusahaan';
        $data['kategori'] = $this->M_kategori_dokumenperusahaan->edit_data($id)->result();
        $this->load->view('Admin/admin_header', $data);
        $this->load->view('Admin/admin_sidebar');
        $this->load->view('Admin/admin_topbar');
        $this->load->view('Admin/v_form_edit_kategori_dokumenperusahaan', $data);
        $this->load->view('Admin/admin_footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $kategori = $this->input->post('kategori');
        $data = array(
            'nama_kategori' => $kategori
        );

        $where = array(
            'id' => $id
        );
        $this->M_kategori_dokumenperusahaan->update_data($where, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil diubah! </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  	</div>');
        redirect('Admin/C_kategori_dokumenperusahaan');
    }
}
