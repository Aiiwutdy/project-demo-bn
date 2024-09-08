<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/admin_model', 'admin');
		if (empty($this->session->userdata('user'))) {
			redirect(base_url('auth'));
		}
	}
	public function index($data = NULL)
	{
		$data['get_user'] =  $this->admin->get_user();
		$title = 'admin';
		$this->load->view('layouts_admin/_header', $title);
		$this->load->view('admin/user/index', $data);
		$this->load->view('layouts_admin/_footer');
	}

	public function add_user()
	{
		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/user/createAdminModal');
		$this->load->view('layouts_admin/_footer');
	}

	public function create_user()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$name = $this->input->post('name');
		$status = $this->input->post('status');

		$data['input_data'] = [
			'ad_name' => $name,
			'ad_user' => $email,
			'ad_pass' => $password,
			'ad_status' => $status
		];
		$result =  $this->admin->create_user($data['input_data']);
		if ($result == 'success') {
			$this->session->set_flashdata('result',  $result);
			$this->session->set_flashdata('message', 'เพิ่มข้อมูลสำเร็จ');
			redirect(base_url('admin/admin/'));
		} else if ($result == 'fail') {
			$this->session->set_flashdata('result',  $result);
			$this->session->set_flashdata('message', 'เพิ่มข้อมูลไม่สำเร็จ');
			redirect(base_url('admin/admin/add_user'));
		}
	}

	public function view_user($id = null)
	{
		$data['result'] =  $this->admin->get_user_id($id);

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/user/editAdmin', $data);
		$this->load->view('layouts_admin/_footer');
	}


	public function edit_user()
	{
		$id = $this->input->post('id');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$o_password = $this->input->post("o_password");
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		if ($password == '') {
			$password = $o_password;
		} else {
			$password = md5($password);
		}

		$data['input_data'] = [
			'ad_name' => $name,
			'ad_user' => $email,
			'ad_pass' => $password,
			'ad_status' => $status
		];

		$result = $this->admin->edit_user($id, $data['input_data']);
		if ($result == 'success') {
			$this->session->set_flashdata('result',  $result);
			$this->session->set_flashdata('message', 'เพิ่มข้อมูลสำเร็จ');
			redirect(base_url('admin/admin/'));
		} else if ($result == 'fail') {
			$this->session->set_flashdata('result',  $result);
			$this->session->set_flashdata('message', 'เพิ่มข้อมูลไม่สำเร็จ');
			redirect(base_url('admin/admin/view_user'));
		}
	}

	public function del_user($id)
	{
		$result =  $this->admin->del_user($id);
		if ($result == 'success') {
			$this->session->set_flashdata('result',  $result);
			$this->session->set_flashdata('message', 'ลบข้อมูลสำเร็จ');
			redirect(base_url('admin/admin'));
		}
	}
}
