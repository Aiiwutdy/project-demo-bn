<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/service_model', 'service');
		$this->load->helper('rename_helper');
		if (empty($this->session->userdata('user'))) {
			redirect(base_url('auth'));
		}
	}
	public function index()
	{
		$data['get_service'] =  $this->service->get_service();

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/service/index', $data);
		$this->load->view('layouts_admin/_footer');
	}

	public function add_service()
	{
		$data['get_service'] =  $this->service->get_service();
		$data['get_group'] =  $this->service->get_group();

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/service/createService', $data);
		$this->load->view('layouts_admin/_footer');
	}

	public function create_service()
	{
		if (!empty($this->input->post('status'))) {
			$status = $this->input->post('status');
		} else {
			$status = 0;
		}

		$data['get_group'] =  $this->service->get_group();

		$titleService = $this->input->post('titleService');
		$detailService = $this->input->post('detailService');
		$imgService = $this->upload_file_service('imgService', '2411', '650', './assets/img/admin/');
		$group_id = $this->input->post('group_id');
		$bg_color = $this->input->post('bg_color');
		$text_color = $this->input->post('text_color');
		$service_position = $this->input->post('service_position');
		$service_sub_tiitle	 = $this->input->post('service_sub_tiitle');

		$result = $this->service->get_service_num($service_position, $group_id);

		if ($result == NULL) {
			$data['input_data'] = [
				'service_title' => $titleService,
				'service_detail' => $detailService,
				'service_img' => $imgService,
				'service_position' => $service_position,
				'service_group_id' => $group_id,
				'service_bg_color' => $bg_color,
				'service_text_color' => $text_color,
				'service_sub_tiitle' => $service_sub_tiitle,
				'service_status' => $status
			];
			$result =  $this->service->create_service($data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'เพิ่มข้อมูลสำเร็จ');
				redirect(base_url('admin/service'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'เพิ่มข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/service/add_service'));
			}
		} else {
			$this->session->set_flashdata('error', 'duplicate');
			$this->session->set_flashdata('message', 'ข้อมูลลำดับการแสดงต้องห้ามซ้า');
			redirect(base_url('admin/service/add_service'));
		}
	}

	public function view_service($id = null)
	{
		$data['get_service'] =  $this->service->get_service();
		$data['get_group'] =  $this->service->get_group();
		$data['result'] =  $this->service->get_service_id($id);

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/service/editService', $data);
		$this->load->view('layouts_admin/_footer');
	}


	public function edit_service()
	{
		if (!empty($this->input->post('status'))) {
			$status = $this->input->post('status');
		} else {
			$status = 0;
		}

		$data['get_group'] =  $this->service->get_group();

		$id = $this->input->post('id');
		$titleService = $this->input->post('titleService');
		$detailService = $this->input->post('detailService');
		$group_id = $this->input->post('group_id');
		$bg_color = $this->input->post('bg_color');
		$text_color = $this->input->post('text_color');
		$service_position = $this->input->post('service_position');
		$service_sub_tiitle	 = $this->input->post('service_sub_tiitle');

		// เช็คลำดับการแสดงที่ input มาว่าใน DB มีไหม
		$get_num =  $this->service->get_service_num($service_position, $group_id);


		//ถ้าข้อมูลไม่ตรงกับฐานข้อมูล = แก้ไขได้
		if ($get_num == NULL) {
			if ($_FILES["imgService"]["name"] != NULL) {
				$imgService = $this->upload_file_service('imgService', '2411', '650', './assets/img/admin/');
				$data['input_data'] = [
					'service_title' => $titleService,
					'service_detail' => $detailService,
					'service_img' => $imgService,
					'service_position' => $service_position,
					'service_group_id' => $group_id,
					'service_bg_color' => $bg_color,
					'service_text_color' => $text_color,
					'service_sub_tiitle' => $service_sub_tiitle,
					'service_status' => $status
				];
			} else {
				$data['input_data'] = [
					'service_title' => $titleService,
					'service_detail' => $detailService,
					'service_position' => $service_position,
					'service_group_id' => $group_id,
					'service_bg_color' => $bg_color,
					'service_text_color' => $text_color,
					'service_sub_tiitle' => $service_sub_tiitle,
					'service_status' => $status
				];
			}
			$result =  $this->service->edit_service($id, $data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
				redirect(base_url('admin/service'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/service/view_service'));
			}


			//ถ้าข้อมูลตรงและไอดีกับฐานข้อมูล = แก้ไขได้
		} else if ($get_num[0]['service_position'] == $service_position && $get_num[0]['service_id'] == $id) {
			if ($_FILES["imgService"]["name"] != NULL) {
				$imgService = $this->upload_file_service('imgService', '2411', '650', './assets/img/admin/');
				$data['input_data'] = [
					'service_title' => $titleService,
					'service_detail' => $detailService,
					'service_img' => $imgService,
					'service_position' => $service_position,
					'service_group_id' => $group_id,
					'service_bg_color' => $bg_color,
					'service_text_color' => $text_color,
					'service_sub_tiitle' => $service_sub_tiitle,
					'service_status' => $status
				];
			} else {
				$data['input_data'] = [
					'service_title' => $titleService,
					'service_detail' => $detailService,
					'service_position' => $service_position,
					'service_group_id' => $group_id,
					'service_bg_color' => $bg_color,
					'service_text_color' => $text_color,
					'service_sub_tiitle' => $service_sub_tiitle,
					'service_status' => $status
				];
			}
			$result =  $this->service->edit_service($id, $data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
				redirect(base_url('admin/service'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/service/view_service'));
			}


			// ถ้าข้อมูลตรงแต่ไอดีไม่ตรงกับฐานข้อมูล = ห้ามแก้ไข
		} else if ($get_num[0]['service_position'] == $service_position  && $get_num[0]['service_id'] !== $id) {
			$this->session->set_flashdata('error', 'duplicate');
			$this->session->set_flashdata('message', 'ข้อมูลลำดับการแสดงต้องห้ามซ้ำ');
			redirect(base_url('admin/service/view_service' . $id));
		}
	}

	public function del_service($id)
	{
		$result =  $this->service->del_service($id);
		if ($result == 'success') {
			$this->session->set_flashdata('result',  $result);
			$this->session->set_flashdata('message', 'ลบข้อมูลสำเร็จ');
			redirect(base_url('admin/service'));
		}
	}

	public function view_modal($id = null)
	{
		$data['result'] =  $this->service->get_service_id($id);
		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/service/modal_service', $data);
		$this->load->view('layouts_admin/_footer');
	}


	function upload_file_service($pic, $w, $h, $path)
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
			$name_pic =  'sv_' . gennamepic(5);
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
