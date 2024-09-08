<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contrack extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/contrack_model', 'contrack');
		$this->load->helper('rename_helper');
		if (empty($this->session->userdata('user'))) {
			redirect(base_url('auth'));
		}
	}


	public function index($data = NULL)
	{
		$data['get_contrack'] = $this->contrack->get_contrack();

		// if ($this->session->userdata('user')) {
		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/contrack/index', $data);
		$this->load->view('layouts_admin/_footer');
		// } else {
		// 	$this->load->view('login_admin');
		// }
	}

	public function create_contrack()
	{

		$about = $this->input->post('about');
		$about_general = $this->input->post('about_general');
		$name_office = $this->input->post('name_office');
		$time = $this->input->post('time');
		$logo = $this->input->post('logo');
		$web = $this->input->post('web');
		$tel = $this->input->post('tel');
		$email = $this->input->post('email');
		$map_online = $this->input->post('map_online');
		$address = $this->input->post('address');
		$name_facebook = $this->input->post('name_facebook');
		$link_facebook = $this->input->post('link_facebook');
		$name_line = $this->input->post('name_line');
		$link_line = $this->input->post('link_line');
		$qr_code = $this->input->post('qr_code');

		$data_contrack = $this->contrack->get_contrack();

		if ($data_contrack == NULL) {

			$qr_code = $this->upload_file_qr('qr_code', '2411', '650', './assets/img/admin/');
			$logo = $this->upload_file_logo('logo', '2411', '650', './assets/img/admin/');

			$data['input_data'] = [
				'ct_about' => $about,
				'ct_about_general' => $about_general,
				'ct_name_office' => $name_office,
				'ct_time' => $time,
				'ct_logo' => $logo,
				'ct_web' => $web,
				'ct_tel' => $tel,
				'ct_email' => $email,
				'ct_map_online' => $map_online,
				'ct_address' => $address,
				'ct_name_facebook' => $name_facebook,
				'ct_link_facebook' => $link_facebook,
				'ct_name_line' => $name_line,
				'ct_link_line' => $link_line,
				'ct_qr' => $qr_code,
			];
			$result =  $this->contrack->create_contrack($data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
				redirect(base_url('admin/contrack'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/contrack'));
			}
		} else {
			$this->session->set_flashdata('error', 'error');
			$this->session->set_flashdata('message', 'ไม่สามารถบันทึกข้อมูลได้ "กรุณาทำการลบข้อมูลเดิมออกก่อนหรือแก้ไขเดิม"');
			redirect(base_url('admin/contrack'));
		}
	}

	public function view_contrack()
	{
		$data['result'] =  $this->contrack->get_contrack();

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/contrack/editContrack', $data);
		$this->load->view('layouts_admin/_footer');
	}


	public function edit_contrack()
	{
		$about = $this->input->post('about');
		$about_general = $this->input->post('about_general');
		$name_office = $this->input->post('name_office');
		$time = $this->input->post('time');
		$logo = $this->input->post('logo');
		$web = $this->input->post('web');
		$tel = $this->input->post('tel');
		$email = $this->input->post('email');
		$map_online = $this->input->post('map_online');
		$address = $this->input->post('address');
		$name_facebook = $this->input->post('name_facebook');
		$link_facebook = $this->input->post('link_facebook');
		$name_line = $this->input->post('name_line');
		$link_line = $this->input->post('link_line');
		$qr_code = $this->input->post('qr_code');

		if ($_FILES["logo"]["name"] != NULL && $_FILES["qr_code"]["name"] != NULL) {

			$logo = $this->upload_file_logo('logo', '2411', '650', './assets/img/admin/');
			$qr_code = $this->upload_file_qr('qr_code', '2411', '650', './assets/img/admin/');

			$data['input_data'] = [
				'ct_about' => $about,
				'ct_about_general' => $about_general,
				'ct_name_office' => $name_office,
				'ct_time' => $time,
				'ct_logo' => $logo,
				'ct_web' => $web,
				'ct_tel' => $tel,
				'ct_email' => $email,
				'ct_map_online' => $map_online,
				'ct_address' => $address,
				'ct_name_facebook' => $name_facebook,
				'ct_link_facebook' => $link_facebook,
				'ct_name_line' => $name_line,
				'ct_link_line' => $link_line,
				'ct_qr' => $qr_code,
			];
			$result =  $this->contrack->edit_contrack($data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
				redirect(base_url('admin/contrack'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/contrack'));
			}
		} else if ($_FILES["logo"]["name"] != NULL) {

			$logo = $this->upload_file_logo('logo', '2411', '650', './assets/img/admin/');

			$data['input_data'] = [
				'ct_about' => $about,
				'ct_about_general' => $about_general,
				'ct_name_office' => $name_office,
				'ct_time' => $time,
				'ct_logo' => $logo,
				'ct_web' => $web,
				'ct_tel' => $tel,
				'ct_email' => $email,
				'ct_map_online' => $map_online,
				'ct_address' => $address,
				'ct_name_facebook' => $name_facebook,
				'ct_link_facebook' => $link_facebook,
				'ct_name_line' => $name_line,
				'ct_link_line' => $link_line,
			];
			$result =  $this->contrack->edit_contrack($data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
				redirect(base_url('admin/contrack'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/contrack'));
			}
		} else if ($_FILES["qr_code"]["name"] != NULL) {

			$qr_code = $this->upload_file_qr('qr_code', '2411', '650', './assets/img/admin/');

			$data['input_data'] = [
				'ct_about' => $about,
				'ct_about_general' => $about_general,
				'ct_name_office' => $name_office,
				'ct_time' => $time,
				'ct_web' => $web,
				'ct_tel' => $tel,
				'ct_email' => $email,
				'ct_map_online' => $map_online,
				'ct_address' => $address,
				'ct_name_facebook' => $name_facebook,
				'ct_link_facebook' => $link_facebook,
				'ct_name_line' => $name_line,
				'ct_link_line' => $link_line,
				'ct_qr' => $qr_code,
			];
			$result =  $this->contrack->edit_contrack($data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
				redirect(base_url('admin/contrack'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/contrack'));
			}
		} else {
			$data['input_data'] = [
				'ct_about' => $about,
				'ct_about_general' => $about_general,
				'ct_name_office' => $name_office,
				'ct_time' => $time,
				'ct_web' => $web,
				'ct_tel' => $tel,
				'ct_email' => $email,
				'ct_map_online' => $map_online,
				'ct_address' => $address,
				'ct_name_facebook' => $name_facebook,
				'ct_link_facebook' => $link_facebook,
				'ct_name_line' => $name_line,
				'ct_link_line' => $link_line,
			];
			$result =  $this->contrack->edit_contrack($data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
				redirect(base_url('admin/contrack'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/contrack'));
			} else {
				$this->session->set_flashdata('error', 'error');
				$this->session->set_flashdata('message', 'ไม่สามารถบันทึกข้อมูลได้ "กรุณาทำการลบข้อมูลเดิมออกก่อนหรือแก้ไขเดิม"');
				redirect(base_url('admin/contrack'));
			}
		}
	}

	public function del_contrack()
	{
		$data['result'] =  $this->contrack->del_contrack();
		redirect(base_url('admin/contrack/'), $data);
	}

	function upload_file_qr($pic, $w, $h, $path)
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
			$name_pic =  'qr_' . gennamepic(5);
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


	function upload_file_logo($pic, $w, $h, $path)
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
			$name_pic =  'logo_' . gennamepic(5);
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
