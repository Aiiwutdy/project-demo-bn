<?php
defined('BASEPATH') or exit('No direct script access allowed');

class intity extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('admin/intity_model', 'intity');
        $this->load->helper('rename_helper');
        if (empty($this->session->userdata('user'))) {
            redirect(base_url('auth'));
        }
    }


    public function index($data = NULL)
    {
        $data['get_intity'] = $this->intity->get_intity();

        $this->load->view('layouts_admin/_header');
        $this->load->view('admin/intity/index', $data);
        $this->load->view('layouts_admin/_footer');
    }

    public function create_intity()
    {
        $intity_service = $this->input->post('service');
        $intity_online_marketing = $this->input->post('online_marketing');
        $intity_port = $this->input->post('port');
        $intity_sub_service = $this->input->post('sub_service');
        $intity_sub_online_marketing = $this->input->post('sub_online_marketing');
        $intity_sub_port = $this->input->post('sub_port');

        $data['input_data'] = [
            'intity_service' => $intity_service,
            'intity_online_marketing' => $intity_online_marketing,
            'intity_port' => $intity_port,
            'intity_sub_service' => $intity_sub_service,
            'intity_sub_online_marketing' => $intity_sub_online_marketing,
            'intity_sub_port' => $intity_sub_port,
        ];

        $result =  $this->intity->create_intity($data['input_data']);
        if ($result == 'success') {
            $this->session->set_flashdata('result',  $result);
            $this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
        } else if ($result == 'fail') {
            $this->session->set_flashdata('result',  $result);
            $this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
        }
        redirect(base_url('admin/intity/'), $result);
    }

    public function view_intity()
    {
        $data['result'] =  $this->intity->get_intity();

        $this->load->view('layouts_admin/_header');
        $this->load->view('admin/intity/edit_intity', $data);
        $this->load->view('layouts_admin/_footer');
    }

    public function edit_intity()
    {
        $intity_service = $this->input->post('service');
        $intity_online_marketing = $this->input->post('online_marketing');
        $intity_port = $this->input->post('port');
        $intity_sub_service = $this->input->post('sub_service');
        $intity_sub_online_marketing = $this->input->post('sub_online_marketing');
        $intity_sub_port = $this->input->post('sub_port');

        $data['input_data'] = [
            'intity_service' => $intity_service,
            'intity_online_marketing' => $intity_online_marketing,
            'intity_port' => $intity_port,
            'intity_sub_service' => $intity_sub_service,
            'intity_sub_online_marketing' => $intity_sub_online_marketing,
            'intity_sub_port' => $intity_sub_port,
        ];

        $result =  $this->intity->edit_intity($data['input_data']);
        if ($result == 'success') {
            $this->session->set_flashdata('result',  $result);
            $this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
        } else if ($result == 'fail') {
            $this->session->set_flashdata('result',  $result);
            $this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
        }
        redirect(base_url('admin/intity/'), $result);
    }


    public function del_intity()
    {
        $data['result'] =  $this->intity->del_intity();
        redirect(base_url('admin/intity/'), $data);
    }
}
