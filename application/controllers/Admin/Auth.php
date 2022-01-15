<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $data['title'] = 'Login';
        if ($this->form_validation->run() == false) {
            $this->load->view('Templates/header', $data);
            $this->load->view('Auth/login');
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
                if ($data['level'] == 2) {
                    redirect('Admin/C_home');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda bukan admin, tidak bisa login!</div>');
                    redirect('Admin/Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('Admin/Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('Admin/Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('C_user');
    }
}
