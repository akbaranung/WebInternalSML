<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data_berita');
        $this->load->model('M_kategori_berita');
    }


    public function index()
    {
        $data['berita'] = $this->M_data_berita->tampil_data()->result();
        $data['berita_terbaru'] = $this->M_data_berita->berita_terbaru()->result();
        $data['title'] = 'Berita';
        $this->load->view('User/header', $data);
        $this->load->view('User/berita', $data);
        $this->load->view('User/footer');
    }

    public function detail_berita($id)
    {
        $data['berita'] = $this->M_kategori_berita->tampil_data_kategori()->result();
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Detail Berita';
        $data['detailberita'] = $this->M_data_berita->edit_data($id)->result();
        $this->load->view('User/header', $data);
        $this->load->view('User/detail_berita', $data);
        $this->load->view('User/footer');
    }

    public function download($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->M_data_berita->download($id);
        $file = './uploads/berita/' . $fileinfo['file'];
        force_download($file, NULL);
    }
}
