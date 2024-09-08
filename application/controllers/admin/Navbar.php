<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Navbar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('admin/navbar_model', 'navbar');
        $this->load->helper('rename_helper');
        if (empty($this->session->userdata('user'))) {
            redirect(base_url('auth'));
        }
    }
    public function index()
    {
        $data['get_navbar'] =  $this->navbar->get_navbar();

        $this->load->view('layouts_admin/_header');
        $this->load->view('admin/navbar/index', $data);
        $this->load->view('layouts_admin/_footer');
    }

    public function add_navbar()
    {
        $this->load->view('layouts_admin/_header');
        $this->load->view('admin/navbar/create_navbar');
        $this->load->view('layouts_admin/_footer');
    }


    public function create_navbar()
    {
        $navbar_title = $this->input->post('navbar_title');
        $navbar_num = $this->input->post('navbar_num');

        $result = $this->navbar->get_navbar_num($navbar_num);

        if ($result == NULL) {
            // add 
            $data['input_data'] = [
                'navbar_title' => $navbar_title,
                'navbar_num' => $navbar_num
            ];
            $result =  $this->navbar->create_navbar($data['input_data']);
            if ($result == 'success') {
                $this->session->set_flashdata('result',  $result);
                $this->session->set_flashdata('message', 'เพิ่มข้อมูลสำเร็จ');
                redirect(base_url('admin/navbar/'));
            } else if ($result == 'fail') {
                $this->session->set_flashdata('result',  $result);
                $this->session->set_flashdata('message', 'เพิ่มข้อมูลไม่สำเร็จ');
                redirect(base_url('admin/navbar/add_navbar'));
            }
        } else {
            //not add
            $this->session->set_flashdata('error', 'duplicate');
            $this->session->set_flashdata('message', 'ข้อมูลลำดับการแสดงต้องห้ามซ้า');
            redirect(base_url('admin/navbar/add_navbar'));
        }
        redirect(base_url('admin/navbar/', $result));
    }


    public function view_navbar($id = null)
    {
        $data['result'] =  $this->navbar->get_navbar_id($id);

        $this->load->view('layouts_admin/_header');
        $this->load->view('admin/navbar/edit_navbar', $data);
        $this->load->view('layouts_admin/_footer');
    }


    public function edit_navbar()
    {
        $id = $this->input->post('id');
        $navbar_title = $this->input->post('navbar_title');
        $navbar_num = $this->input->post('navbar_num');

        // เช็คลำดับการแสดงที่ input มาว่าใน DB มีไหม
        $get_num =  $this->navbar->get_navbar_num($navbar_num);

        //ถ้าข้อมูลไม่ตรงกับฐานข้อมูล = แก้ไขได้
        if ($get_num == NULL) {

            $data['input_data'] = [
                'navbar_title' => $navbar_title,
                'navbar_num' => $navbar_num
            ];
            $result =  $this->navbar->edit_navbar($id, $data['input_data']);
            if ($result == 'success') {
                $this->session->set_flashdata('result',  $result);
                $this->session->set_flashdata('message', 'แก้ไขข้อมูลสำเร็จ');
                redirect(base_url('admin/navbar/'));
            } else if ($result == 'fail') {
                $this->session->set_flashdata('result',  $result);
                $this->session->set_flashdata('message', 'แก้ไขข้อมูลไม่สำเร็จ');
                redirect(base_url('admin/navbar/view_navbar/'));
            }
            redirect(base_url('admin/navbar/'));

            //ถ้าข้อมูลตรงและไอดีกับฐานข้อมูล = แก้ไขได้
        } else if ($get_num[0]['navbar_num'] == $navbar_num && $get_num[0]['navbar_id'] == $id) {
            $data['input_data'] = [
                'navbar_title' => $navbar_title,
                'navbar_num' => $navbar_num
            ];

            $result =  $this->navbar->edit_navbar($id, $data['input_data']);
            if ($result == 'success') {
                $this->session->set_flashdata('result',  $result);
                $this->session->set_flashdata('message', 'แก้ไขข้อมูลสำเร็จ');
                redirect(base_url('admin/navbar/'));
            } else if ($result == 'fail') {
                $this->session->set_flashdata('result',  $result);
                $this->session->set_flashdata('message', 'แก้ไขข้อมูลไม่สำเร็จ');
                redirect(base_url('admin/navbar/view_navbar/'));
            }
            redirect(base_url('admin/navbar/'));

            //ถ้าข้อมูลตรงแต่ไอดีไม่ตรงกับฐานข้อมูล = ห้ามแก้ไข
        } else if ($get_num[0]['navbar_num'] == $navbar_num  && $get_num[0]['navbar_id'] !== $id) {

            $this->session->set_flashdata('error', 'duplicate');
            $this->session->set_flashdata('message', 'ข้อมูลลำดับการแสดงต้องห้ามซ้ำ');
            redirect(base_url('admin/navbar/view_navbar/' . $id));
        }
    }

    public function del_navbar($id)
    {
        $data['result'] =  $this->navbar->del_navbar($id);
        redirect(base_url('admin/navbar/'), $data);
    }
}
