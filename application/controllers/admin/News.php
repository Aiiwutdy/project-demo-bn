<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/news_model', 'news');
		if (empty($this->session->userdata('user'))) {
			redirect(base_url('auth'));
		}
	}
	public function index($data = NULL)
	{
		$data['get_news'] =  $this->news->get_news();

		// if ($this->session->userdata('user')) {
		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/news/index', $data);
		$this->load->view('layouts_admin/_footer');
		// } else { 
		// 	$this->load->view('login_admin');
		// }
	}

	// public function test($id = NULL){
	// 	$result = $this->news->get_news_id($id);
	// 	echo '<pre>';
	// 	print_r($result);
	// 	echo '</pre>';
	// }

	public function add_news()
	{
		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/news/createNews');
		$this->load->view('layouts_admin/_footer');
	}


	public function create_news()
	{
		$titleNews = $this->input->post('titleNews');
		$detailNews = $this->input->post('detailNews');
		$dateNews = $this->input->post('dateNews');
		// echo '<pre>';
		// print_r($this->session->userdata());
		// print_r($this->session->userdata('user'));
		// echo $this->session->userdata['user']['ad_id'];
		// echo '</pre>';
		$admin_id =  $this->session->userdata['user']['ad_id'];
		$status = $this->input->post('status');


		$data['input_data'] = [
			'new_title' => $titleNews,
			'new_detail' => $detailNews,
			'new_date' => $dateNews,
			'new_ad_id' => $admin_id,
			'new_status' => $status
		];
		$result =  $this->news->create_news($data['input_data']);
		redirect(base_url('admin/news/'), $result);

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/news/createNews', $data);
		$this->load->view('layouts_admin/_footer');
	}

	public function view_news($id = null)
	{
		$data['result'] =  $this->news->get_news_id($id);

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/news/editNews', $data);
		$this->load->view('layouts_admin/_footer');
	}


	public function edit_news()
	{
		$id = $this->input->post('id');
		$titleNews = $this->input->post('titleNews');
		$detailNews = $this->input->post('detailNews');
		$dateNews = $this->input->post('dateNews');
		$admin_id =  $this->session->userdata['user']['ad_id'];

		$status = $this->input->post('status');

		$data['input_data'] = ['new_title' => $titleNews, 'new_detail' => $detailNews, 'new_date' => $dateNews, 'new_ad_id' => $admin_id, 'new_status' => $status];
		$data['result'] =  $this->news->edit_news($id, $data['input_data']);
		redirect(base_url('admin/news/'), $data);

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/news/editNews', $data);
		$this->load->view('layouts_admin/_footer');
	}

	public function del_news($id)
	{
		$data['result'] =  $this->news->del_news($id);
		redirect(base_url('admin/news/'), $data);
	}
}
