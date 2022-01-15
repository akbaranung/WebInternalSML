<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data_berita');
        $this->load->model('M_kategori_berita');
        $this->load->model('M_data_dokumentasi');
    }

    public function index()
    {
        $data['title'] = 'PT Sarana Maju Lestari';
        $data['berita'] = $this->M_kategori_berita->tampil_data_kategori()->result();
        $data['slider'] = $this->M_data_dokumentasi->tampil_data()->result();
        $data['berita_home_terbaru'] = $this->M_data_berita->berita_home_terbaru()->result();
        $this->load->view('User/header', $data);
        $this->load->view('User/home', $data);
        $this->load->view('User/footer');
    }
}
