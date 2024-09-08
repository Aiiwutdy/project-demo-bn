<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slide extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/slide_model', 'slide');
		$this->load->helper('rename_helper');
		if (empty($this->session->userdata('user'))) {
			redirect(base_url() . 'auth');
		}
	}
	public function index()
	{
		$data['get_slide'] =  $this->slide->get_slide();

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/slide/index', $data);
		$this->load->view('layouts_admin/_footer');
	}


	public function add_slide()
	{
		$data['get_slide'] =  $this->slide->get_slide();

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/slide/createSlide');
		$this->load->view('layouts_admin/_footer');
	}

	public function create_slide()
	{
		$slider_name = $this->input->post('slider_name');
		$slider_img = $this->upload_file_slide('slider_img', '2411', '650', './assets/img/admin/');
		$slider_num = $this->input->post('slider_num');

		$result = $this->slide->get_slide_num($slider_num);

		if ($result == NULL) {
			$data['input_data'] = [
				'slider_name' => $slider_name,
				'slider_img' => $slider_img,
				'slider_num' => $slider_num
			];
			$result =  $this->slide->create_slide($data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'เพิ่มข้อมูลสำเร็จ');
				redirect(base_url('admin/slide'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'เพิ่มข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/slide/add_slide'));
			}
		} else {
			$this->session->set_flashdata('error', 'duplicate');
			$this->session->set_flashdata('message', 'ข้อมูลลำดับการแสดงต้องห้ามซ้า');
			redirect(base_url('admin/slide/add_slide'));
		}
	}


	public function view_slide($id = null)
	{
		$data['result'] =  $this->slide->get_slide_id($id);

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/slide/editSlide', $data);
		$this->load->view('layouts_admin/_footer');
	}


	public function edit_slide()
	{
		$id = $this->input->post('id');
		$slider_name = $this->input->post('slider_name');
		$slider_num = $this->input->post('slider_num');

		// เช็คลำดับการแสดงที่ input มาว่าใน DB มีไหม
		$get_num =  $this->slide->get_slide_num($slider_num);

		//ถ้าข้อมูลไม่ตรงกับฐานข้อมูล = แก้ไขได้
		if ($get_num == NULL) {
			if ($_FILES["slider_img"]["name"] != NULL) {
				$slider_img = $this->upload_file_slide('slider_img', '2411', '650', './assets/img/admin/');
				$data['input_data'] = [
					'slider_name' => $slider_name,
					'slider_img' => $slider_img,
					'slider_num' => $slider_num
				];
			} else {
				$data['input_data'] = [
					'slider_name' => $slider_name,
					'slider_num' => $slider_num
				];
			}
			$result =  $this->slide->edit_slide($id, $data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
				redirect(base_url('admin/slide'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/slide/view_slide'));
			}
			//ถ้าข้อมูลตรงและไอดีกับฐานข้อมูล = แก้ไขได้
		} else if ($get_num[0]['slider_num'] == $slider_num && $get_num[0]['slider_id'] == $id) {
			if ($_FILES["slider_img"]["name"] != NULL) {
				$slider_img = $this->upload_file_slide('slider_img', '2411', '650', './assets/img/admin/');
				$data['input_data'] = [
					'slider_name' => $slider_name,
					'slider_img' => $slider_img,
					'slider_num' => $slider_num
				];
			} else {
				$data['input_data'] = [
					'slider_name' => $slider_name,
					'slider_num' => $slider_num
				];
			}
			$result =  $this->slide->edit_slide($id, $data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
			}
			redirect(base_url('admin/slide'));

			//ถ้าข้อมูลตรงแต่ไอดีไม่ตรงกับฐานข้อมูล = ห้ามแก้ไข
		} else if ($get_num[0]['slider_num'] == $slider_num  && $get_num[0]['slider_id'] !== $id) {
			$this->session->set_flashdata('error', 'duplicate');
			$this->session->set_flashdata('message', 'ข้อมูลลำดับการแสดงต้องห้ามซ้ำ');
			redirect(base_url('admin/slide/view_slide') . $id);
		}
	}

	public function del_slide($id)
	{
		$result =  $this->slide->del_slide($id);
		if ($result == 'success') {
			$this->session->set_flashdata('result',  $result);
			$this->session->set_flashdata('message', 'ลบข้อมูลสำเร็จ');
			redirect(base_url('admin/slide'));
		}
	}

	function upload_file_slide($pic, $w, $h, $path)
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
			$name_pic =  'sl_' . gennamepic(5);
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
