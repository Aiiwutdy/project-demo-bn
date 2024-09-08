<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Group extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('admin/group_model', 'group');
        $this->load->helper('rename_helper');
        if (empty($this->session->userdata('user'))) {
            redirect(base_url('auth'));
        }
    }
    public function index()
    {
        $data['get_group'] =  $this->group->get_group();

        $this->load->view('layouts_admin/_header');
        $this->load->view('admin/group/index', $data);
        $this->load->view('layouts_admin/_footer');
    }

    public function add_group()
    {
        $data['get_group'] =  $this->group->get_group();

        $this->load->view('layouts_admin/_header');
        $this->load->view('admin/group/create_group');
        $this->load->view('layouts_admin/_footer');
    }


    public function create_group()
    {
        $group_name = $this->input->post('group_name');

        $data['input_data'] = [
            'group_name' => $group_name
        ];
        $result =  $this->group->create_group($data['input_data']);
        if ($result == 'success') {
            $this->session->set_flashdata('result',  $result);
            $this->session->set_flashdata('message', 'เพิ่มข้อมูลสำเร็จ');
            redirect(base_url('admin/group'));
        } else if ($result == 'fail') {
            $this->session->set_flashdata('result',  $result);
            $this->session->set_flashdata('message', 'เพิ่มข้อมูลไม่สำเร็จ');
            redirect(base_url('admin/group/add_group'));
        }
    }


    public function view_group($id = null)
    {
        $data['result'] =  $this->group->get_group_id($id);

        $this->load->view('layouts_admin/_header');
        $this->load->view('admin/group/edit_group', $data);
        $this->load->view('layouts_admin/_footer');
    }


    public function edit_group()
    {
        $id = $this->input->post('id');
        $group_name = $this->input->post('group_name');


        $data['input_data'] = [
            'group_name' => $group_name
        ];
        $result =  $this->group->edit_group($id, $data['input_data']);
        if ($result == 'success') {
            $this->session->set_flashdata('result',  $result);
            $this->session->set_flashdata('message', 'เพิ่มข้อมูลสำเร็จ');
            redirect(base_url('admin/group'));
        } else if ($result == 'fail') {
            $this->session->set_flashdata('result',  $result);
            $this->session->set_flashdata('message', 'เพิ่มข้อมูลไม่สำเร็จ');
            redirect(base_url('admin/group/view_group'));
        }
    }

    public function del_group($id)
    {
        $result =  $this->group->del_group($id);
        if ($result == 'success') {
            $this->session->set_flashdata('result',  $result);
            $this->session->set_flashdata('message', 'ลบข้อมูลสำเร็จ');
            redirect(base_url('admin/group'));
        }
    }
}
