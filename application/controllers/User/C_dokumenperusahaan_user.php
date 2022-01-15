<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dokumenperusahaan_user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data_dokumenperusahaan');
        $this->load->model('M_kategori_dokumenperusahaan');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $data['title'] = 'Login';
        if ($this->form_validation->run() == false) {
            $this->load->view('Templates/header', $data);
            $this->load->view('Auth/login_user');
            $this->load->view('Templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('karyawan', ['email' => $email])->row_array();
        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'email' => $user['email'],
                    'level' => $user['level']
                ];
                $this->session->set_userdata($data);
                if ($data['level'] == 1) {
                    redirect('User/C_dokumenperusahaan_user/dokumen');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda bukan user, tidak bisa login!</div>');
                    redirect('User/C_dokumenperusahaan_user');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('User/C_dokumenperusahaan_user');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('User/C_dokumenperusahaan_user');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('User/C_dokumenperusahaan_user');
    }

    public function dokumen()
    {
        $this->load->library('session');
        $data['files'] = $this->M_data_dokumenperusahaan->getAllFiles();

        $data['dokumen'] = $this->M_data_dokumenperusahaan->tampil_data()->result();
        $data['relasi'] = $this->M_data_dokumenperusahaan->relasi_kategori_dokumen()->result();
        $data['kategori'] = $this->M_kategori_dokumenperusahaan->tampil_data()->result();
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Dokumen Perusahaan';

        $this->load->view('User/header', $data);
        $this->load->view('User/dokumen_perusahaan', $data);
        $this->load->view('User/footer');
    }
    public function download($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->M_data_dokumenperusahaan->download($id);
        $file = './uploads/dokumen_perusahaan/' . $fileinfo['file'];
        force_download($file, NULL);
    }

    public function Kategori()
    {
        $jenis = $this->input->get('kategori', TRUE);
        $data['relasi'] = $this->M_data_dokumenperusahaan->getDokumenPerusahaan($jenis)->result();
        $data['kategori'] = $this->M_kategori_dokumenperusahaan->tampil_data()->result();
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Dokumen Perusahaan';

        $this->load->view('User/header', $data);
        $this->load->view('User/dokumen_perusahaan', $data);
        $this->load->view('User/footer');
    }
}
