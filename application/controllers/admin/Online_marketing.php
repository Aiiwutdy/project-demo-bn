<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Online_marketing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('admin/online_model', 'online_marketing');
        $this->load->helper('rename_helper');
        if (empty($this->session->userdata('user'))) {
            redirect(base_url('auth'));
        }
    }
    public function index()
    {
        $data['get_online_marketing'] =  $this->online_marketing->get_online_marketing();

        $this->load->view('layouts_admin/_header');
        $this->load->view('admin/online_marketing/index', $data);
        $this->load->view('layouts_admin/_footer');
    }

    public function add_online_marketing()
    {
        $data['get_online_marketing'] =  $this->online_marketing->get_online_marketing();

        $this->load->view('layouts_admin/_header');
        $this->load->view('admin/online_marketing/create_online_marketing', $data);
        $this->load->view('layouts_admin/_footer');
    }


    public function create_online_marketing()
    {
        if (!empty($this->input->post('status'))) {
            $status = $this->input->post('status');
        } else {
            $status = 0;
        }

        $om_title = $this->input->post('om_title');
        $om_sub_title = $this->input->post('om_sub_title');
        $om_img = $this->upload_file_online_marketing('om_img', '2411', '650', './assets/img/admin/');
        $om_num = $this->input->post('om_num');
        $om_detail = $this->input->post('om_detail');

        $result = $this->online_marketing->get_online_marketing_num($om_num);

        if ($result == NULL) {
            $data['input_data'] = [
                'om_title' => $om_title,
                'om_sub_title' => $om_sub_title,
                'om_img' => $om_img,
                'om_num' => $om_num,
                'om_detail' => $om_detail,
                'om_status' => $status
            ];

            $result =  $this->online_marketing->create_online_marketing($data['input_data']);
            if ($result == 'success') {
                $this->session->set_flashdata('result',  $result);
                $this->session->set_flashdata('message', 'เพิ่มข้อมูลสำเร็จ');
                redirect(base_url('admin/online_marketing'));
            } else if ($result == 'fail') {
                $this->session->set_flashdata('result',  $result);
                $this->session->set_flashdata('message', 'เพิ่มข้อมูลไม่สำเร็จ');
                redirect(base_url('admin/online_marketing/add_online_marketing'));
            }
        } else {
            $this->session->set_flashdata('error', 'duplicate');
            $this->session->set_flashdata('message', 'ข้อมูลลำดับการแสดงต้องห้ามซ้า');
            redirect(base_url('admin/online_marketing/add_online_marketing'));
        }
        redirect(base_url('admin/online_marketing'), $result);
    }


    public function view_online_marketing($id = null)
    {
        $data['result'] =  $this->online_marketing->get_online_marketing_id($id);

        $this->load->view('layouts_admin/_header');
        $this->load->view('admin/online_marketing/edit_online_marketing', $data);
        $this->load->view('layouts_admin/_footer');
    }


    public function edit_online_marketing()
    {
        if (!empty($this->input->post('status'))) {
            $status = $this->input->post('status');
        } else {
            $status = 0;
        }

        $id = $this->input->post('id');
        $om_title = $this->input->post('om_title');
        $om_sub_title = $this->input->post('om_sub_title');
        $om_num = $this->input->post('om_num');
        $om_detail = $this->input->post('om_detail');

        // เช็คลำดับการแสดงที่ input มาว่าใน DB มีไหม
        $get_num =  $this->online_marketing->get_online_marketing_num($om_num);


        //ถ้าข้อมูลไม่ตรงกับฐานข้อมูล = แก้ไขได้
        if ($get_num == NULL) {
            if ($_FILES["om_img"]["name"] != NULL) {
                $om_img = $this->upload_file_online_marketing('om_img', '2411', '650', './assets/img/admin/');
                $data['input_data'] = [
                    'om_title' => $om_title,
                    'om_sub_title' => $om_sub_title,
                    'om_img' => $om_img,
                    'om_num' => $om_num,
                    'om_detail' => $om_detail,
                    'om_status' => $status
                ];
            } else {
                $data['input_data'] = [
                    'om_title' => $om_title,
                    'om_sub_title' => $om_sub_title,
                    'om_num' => $om_num,
                    'om_detail' => $om_detail,
                    'om_status' => $status
                ];
            }
            $result =  $this->online_marketing->edit_online_marketing($id, $data['input_data']);
            if ($result == 'success') {
                $this->session->set_flashdata('result',  $result);
                $this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
                redirect(base_url('admin/online_marketing'));
            } else if ($result == 'fail') {
                $this->session->set_flashdata('result',  $result);
                $this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
                redirect(base_url('admin/online_marketing/view_online_marketing'));
            }
            //     //ถ้าข้อมูลตรงและไอดีกับฐานข้อมูล = แก้ไขได้
        } else if ($get_num[0]['om_num'] == $om_num && $get_num[0]['om_id'] == $id) {
            if ($_FILES["om_img"]["name"] != NULL) {
                $om_img = $this->upload_file_online_marketing('om_img', '2411', '650', './assets/img/admin/');
                $data['input_data'] = [
                    'om_title' => $om_title,
                    'om_sub_title' => $om_sub_title,
                    'om_img' => $om_img,
                    'om_num' => $om_num,
                    'om_detail' => $om_detail,
                    'om_status' => $status
                ];
            } else {
                $data['input_data'] = [
                    'om_title' => $om_title,
                    'om_sub_title' => $om_sub_title,
                    'om_num' => $om_num,
                    'om_detail' => $om_detail,
                    'om_status' => $status
                ];
            }
            $result =  $this->online_marketing->edit_online_marketing($id, $data['input_data']);
            if ($result == 'success') {
                $this->session->set_flashdata('result',  $result);
                $this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
                redirect(base_url('admin/online_marketing'));
            } else if ($result == 'fail') {
                $this->session->set_flashdata('result',  $result);
                $this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
                redirect(base_url('admin/online_marketing/view_online_marketing'));
            }
        }
        // ถ้าข้อมูลตรงแต่ไอดีไม่ตรงกับฐานข้อมูล = ห้ามแก้ไข
        else if ($get_num[0]['om_num'] == $om_num && $get_num[0]['om_id'] != $id) {
            $this->session->set_flashdata('error', 'duplicate');
            $this->session->set_flashdata('message', 'ข้อมูลลำดับการแสดงต้องห้ามซ้ำ');
            redirect(base_url('admin/online_marketing/view_online_marketing' . $id));
        }
    }

    public function del_online_marketing($id)
    {
        $result =  $this->online_marketing->del_online_marketing($id);
        if ($result == 'success') {
            $this->session->set_flashdata('result',  $result);
            $this->session->set_flashdata('message', 'ลบข้อมูลสำเร็จ');
            redirect(base_url('admin/online_marketing'));
        }
    }

    function upload_file_online_marketing($pic, $w, $h, $path)
    {
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|gif|png|webp';
        $config['max_size'] = 100000;
        $config['max_width'] = 4800;
        $config['max_height'] = 3500;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload($pic)) {
            $data = $this->upload->data();
            //ชื่อรูป
            $name_pic =  'om_' . gennamepic(5);
            rename($data['full_path'], $data['file_path'] . $name_pic . $data['file_ext']);
            // resize
            //$width = $this->upload->image_width;
            //$height = $this->upload->image_height;
            $config['image_library'] = 'gd2';
            $config['source_image'] = $data['file_path'] . $name_pic . $data['file_ext'];
            $config['width'] = $w;
            $config['height'] = $h;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $picname = $name_pic . $data['file_ext']; // ชื่อรูปภาพ
        } else {
            $picname = '';
            echo $this->upload->display_errors();
        }
        return $picname;
    }
}
