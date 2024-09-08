<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('admin/admin_model', 'admin');
    }
    public function index()
    {
        if (!empty($this->session->userdata('user'))) {
            redirect(base_url() . 'admin/admin');
        }
        $this->load->view('login_admin');
    }

    public function login()
    {
        $email = $this->input->post('email');
        $real_password = $this->input->post('password');
        $password = md5($real_password);
        $data = $this->admin->login($email, $password);

        if (!empty($data)) {
            if ($data['ad_status'] == 0) {
                $this->session->set_userdata('user', $data);

                redirect(base_url('admin/admin'));
            }
        } else {
            $this->session->set_flashdata('error', 'error');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function logout()
    {
        $this->session->set_userdata('user');
        redirect('auth');
    }
}
