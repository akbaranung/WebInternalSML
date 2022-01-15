<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dokumenperusahaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data_dokumenperusahaan');
        $this->load->model('M_kategori_dokumenperusahaan');
        if ($this->session->userdata('level'!= 2)) {
            redirect('Admin/Auth');
        }
    }
    public function index()
    {
        $data['dokumen'] = $this->M_data_dokumenperusahaan->tampil_data()->result();
        $data['relasi'] = $this->M_data_dokumenperusahaan->relasi_kategori_dokumen()->result();
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Dokumen Perusahaan';

        $this->load->view('Admin/admin_header', $data);
        $this->load->view('Admin/admin_sidebar');
        $this->load->view('Admin/admin_topbar');
        $this->load->view('Admin/v_dokumenperusahaan', $data);
        $this->load->view('Admin/admin_footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('judul', 'Judul Dokumen', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori Dokumen', 'required');

        $data['dokumen'] = $this->M_data_dokumenperusahaan->tampil_data()->result();
        $data['kategori'] = $this->M_kategori_dokumenperusahaan->tampil_data()->result();
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Form Tambah Data Status Karyawan';


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Admin/admin_header', $data);
            $this->load->view('Admin/admin_sidebar');
            $this->load->view('Admin/admin_topbar');
            $this->load->view('Admin/v_form_dokumenperusahaan', $data);
            $this->load->view('Admin/admin_footer');
        } else {
            $judul = $this->input->post('judul', true);
            $kategori = $this->input->post('kategori', true);


            $config['upload_path'] = './uploads/dokumen_perusahaan';
            $config['allowed_types'] = 'pdf|docx|doc|ppt|pptx';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
            } else {
                $file = $this->upload->data();
                $file = $file['file_name'];
            }

            $data = array(
                'judul_dokumen' => $judul,
                'file' => $file,
                'nama_kategori' => $kategori
            );


            $this->M_data_dokumenperusahaan->input_data($data, 'dokumen_perusahaan');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan! </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  	</div>');
            redirect('Admin/C_dokumenperusahaan');
        }
    }

    public function edit($id)
    {
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Form Edit Dokumen Perusahaan';
        $data['dokumen'] = $this->M_data_dokumenperusahaan->edit_data($id)->result();
        $data['relasi'] = $this->M_kategori_dokumenperusahaan->tampil_data()->result();
        $this->load->view('Admin/admin_header', $data);
        $this->load->view('Admin/admin_sidebar');
        $this->load->view('Admin/admin_topbar');
        $this->load->view('Admin/v_form_edit_dokumenperusahaan', $data);
        $this->load->view('Admin/admin_footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $kategori = $this->input->post('kategori');
        $upload_file = $_FILES['file']['name'];

        if ($upload_file) {
            $config['upload_path'] = './uploads/dokumen_perusahaan';
            $config['allowed_types'] = 'pdf|docx|doc|ppt|pptx';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                echo $this->upload->display_error();
            } else {
                $new_file = $this->upload->data();
                $new_file = $new_file['file_name'];
            }

            $data = array(
                'judul_dokumen'         => $judul,
                'file'                 => $new_file,
                'nama_kategori'          => $kategori
            );
        } else {
            $data = array(
                'judul_dokumen'         => $judul,
                'nama_kategori'         => $kategori
            );
        }

        $where = array(
            'id' => $id
        );
        $this->M_data_dokumenperusahaan->update_data($where, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil diubah! </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  	</div>');
        redirect('Admin/C_dokumenperusahaan');
    }

    public function hapus($id)
    {
        $data = $this->M_data_dokumenperusahaan->getdataById($id)->row();
        $file = './uploads/dokumen_perusahaan/' . $data->file;
        if ($data->file != '') {
            if (is_readable($file) && unlink($file)) {
                $where = array('id' => $id);
                $this->M_data_dokumenperusahaan->hapus_data($where, 'dokumen_perusahaan');
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Data berhasil dihapus! </strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  	</div>');
                redirect('Admin/C_dokumenperusahaan');
            }
        } else {
            $where = array('id' => $id);
            $this->M_data_dokumenperusahaan->hapus_data($where, 'dokumen_perusahaan');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil dihapus! </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                  </div>');
            redirect('Admin/C_dokumenperusahaan');
        }
    }
}
