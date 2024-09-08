<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Port extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/port_model', 'port');
		$this->load->helper('rename_helper');
		if (empty($this->session->userdata('user'))) {
			redirect(base_url('auth'));
		}
	}
	public function index()
	{
		$data['get_port'] =  $this->port->get_port();

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/port/index', $data);
		$this->load->view('layouts_admin/_footer');
	}

	public function add_port()
	{
		$data['get_port'] =  $this->port->get_port();

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/port/createPort', $data);
		$this->load->view('layouts_admin/_footer');
	}


	public function create_port()
	{
		if (!empty($this->input->post('status'))) {
			$status = $this->input->post('status');
		} else {
			$status = 0;
		}

		$port_title = $this->input->post('port_title');
		$port_sub_title = $this->input->post('port_sub_title');
		$port_detail = $this->input->post('port_detail');
		$port_img = $this->upload_file_port('port_img', '2411', '650', './assets/img/admin/');
		$port_num = $this->input->post('port_num');

		$result = $this->port->get_port_num($port_num);

		if ($result == NULL) {
			// add 
			$data['input_data'] = [
				'port_title' => $port_title,
				'port_sub_title' => $port_sub_title,
				'port_detail' => $port_detail,
				'port_img' => $port_img,
				'port_num' => $port_num,
				'port_status' => $status,
			];
			$result =  $this->port->create_port($data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'เพิ่มข้อมูลสำเร็จ');
				redirect(base_url('admin/port'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'เพิ่มข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/port/add_port'));
			}
		} else {
			//not add
			$this->session->set_flashdata('error', 'duplicate');
			$this->session->set_flashdata('message', 'ข้อมูลลำดับการแสดงต้องห้ามซ้า');
			redirect(base_url('admin/port/add_port'));
		}
		redirect(base_url('admin/port/', $result));
	}


	public function view_port($id = null)
	{
		$data['result'] =  $this->port->get_port_id($id);

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/port/editPort', $data);
		$this->load->view('layouts_admin/_footer');
	}


	public function edit_port()
	{
		if (!empty($this->input->post('status'))) {
			$status = $this->input->post('status');
		} else {
			$status = 0;
		}

		$id = $this->input->post('id');
		$port_title = $this->input->post('port_title');
		$port_sub_title = $this->input->post('port_sub_title');
		$port_detail = $this->input->post('port_detail');
		$port_num = $this->input->post('port_num');

		// เช็คลำดับการแสดงที่ input มาว่าใน DB มีไหม
		$get_num =  $this->port->get_port_num($port_num);

		//ถ้าข้อมูลไม่ตรงกับฐานข้อมูล = แก้ไขได้
		if ($get_num == NULL) {
			if ($_FILES["port_img"]["name"] != NULL) {
				$port_img = $this->upload_file_port('port_img', '2411', '650', './assets/img/admin/');
				$data['input_data'] = [
					'port_title' => $port_title,
					'port_sub_title' => $port_sub_title,
					'port_detail' => $port_detail,
					'port_img' => $port_img,
					'port_num' => $port_num,
					'port_status' => $status,
				];
			} else {
				$data['input_data'] = [
					'port_title' => $port_title,
					'port_sub_title' => $port_sub_title,
					'port_detail' => $port_detail,
					'port_num' => $port_num,
					'port_status' => $status,
				];
			}
			$result =  $this->port->edit_port($id, $data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
				redirect(base_url('admin/port'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/port/view_port'));
			}
			redirect(base_url('admin/port'));

			//ถ้าข้อมูลตรงและไอดีกับฐานข้อมูล = แก้ไขได้
		} else if ($get_num[0]['port_num'] == $port_num && $get_num[0]['port_id'] == $id) {
			if ($_FILES["port_img"]["name"] != NULL) {
				$port_img = $this->upload_file_port('port_img', '2411', '650', './assets/img/admin/');
				$data['input_data'] = [
					'port_title' => $port_title,
					'port_sub_title' => $port_sub_title,
					'port_detail' => $port_detail,
					'port_img' => $port_img,
					'port_num' => $port_num,
					'port_status' => $status,
				];
			} else {
				$data['input_data'] = [
					'port_title' => $port_title,
					'port_sub_title' => $port_sub_title,
					'port_detail' => $port_detail,
					'port_num' => $port_num,
					'port_status' => $status,
				];
			}
			$result =  $this->port->edit_port($id, $data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
				redirect(base_url('admin/port'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/port/view_port'));
			}
			redirect(base_url('admin/port/'));

			//ถ้าข้อมูลตรงแต่ไอดีไม่ตรงกับฐานข้อมูล = ห้ามแก้ไข
		} else if ($get_num[0]['port_num'] == $port_num  && $get_num[0]['port_id'] !== $id) {
			$this->session->set_flashdata('error', 'duplicate');
			$this->session->set_flashdata('message', 'ข้อมูลลำดับการแสดงต้องห้ามซ้ำ');
			redirect(base_url('admin/port/view_port' . $id));
		}
	}

	public function del_port($id)
	{
		$result =  $this->port->del_port($id);
		if ($result == 'success') {
			$this->session->set_flashdata('result',  $result);
			$this->session->set_flashdata('message', 'ลบข้อมูลสำเร็จ');
			redirect(base_url('admin/port'));
		}
	}

	function upload_file_port($pic, $w, $h, $path)
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
			$name_pic =  'pr_' . gennamepic(5);
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
