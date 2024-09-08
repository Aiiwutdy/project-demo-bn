<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('admin/navbar_model', 'navbar');
		$this->load->model('admin/admin_model', 'admin');
		$this->load->model('admin/album_model', 'album');
		$this->load->model('admin/contrack_model', 'contrack');
		$this->load->model('admin/news_model', 'news');
		$this->load->model('admin/port_model', 'port');
		$this->load->model('admin/product_model', 'product');
		$this->load->model('admin/slide_model', 'slide');
		$this->load->model('admin/online_model', 'online_marketing');
		$this->load->model('admin/service_model', 'service');
		$this->load->model('admin/intity_model', 'intity');
		$this->load->library('session');
	}

	public function index()
	{
		$data['navbar'] = $this->navbar->get_navbar_user();
		$data['admin'] = $this->admin->get_user();
		$data['album'] = $this->album->get_album();
		$data['contrack'] = $this->contrack->get_contrack();
		$data['news'] = $this->news->get_news();
		$data['port'] = $this->port->get_port_user();
		$data['product'] = $this->product->get_product_user();
		$data['slide'] = $this->slide->get_slide();
		$data['online_marketing'] = $this->online_marketing->get_online_marketing_user();
		$data['service'] = $this->service->get_service_user();
		$data['intity'] = $this->intity->get_intity();

		$this->load->view('user/index', $data);
	}

	public function get_about()
	{
		$data['contrack'] = $this->contrack->get_contrack();

		$this->load->view('user/page/about', $data);
	}


	public function get_service($limit = Null)
	{
		if ($this->input->get()) {
			$limit = $this->input->get('limit');
		} else {
			$limit = 5;
		}
		$data['limit'] = $limit;
		$data['service'] = $this->service->get_service_page($limit);
		$data['intity'] = $this->intity->get_intity();
		$data['contrack'] = $this->contrack->get_contrack();

		$data['get_count'] = $this->service->count_service();

		$this->load->view('user/page/service', $data);
	}

	public function get_product($limit = Null)
	{
		if ($this->input->get()) {
			$limit = $this->input->get('limit');
		} else {
			$limit = 4;
		}

		$data['limit'] = $limit;
		$data['product'] = $this->product->get_product_page($limit);
		$data['contrack'] = $this->contrack->get_contrack();

		$data['get_count'] = $this->product->count_product();

		$this->load->view('user/page/product', $data);
	}

	public function get_port($limit = Null)
	{
		if ($this->input->get()) {
			$limit = $this->input->get('limit');
		} else {
			$limit = 5;
		}

		$data['limit'] = $limit;
		$data['intity'] = $this->intity->get_intity();
		$data['port'] = $this->port->get_port_page($limit);
		$data['contrack'] = $this->contrack->get_contrack();

		$data['get_count'] = $this->port->count_port();

		$this->load->view('user/page/port', $data);
	}

	public function view_service($id)
	{
		$data['navbar'] = $this->navbar->get_navbar_user();
		$data['service'] = $this->service->get_service_view($id);
		$data['contrack'] = $this->contrack->get_contrack();


		$this->load->view('user/view/view_service', $data);
	}

	public function view_service_page($id)
	{
		$data['navbar'] = $this->navbar->get_navbar_user();
		$data['service'] = $this->service->get_service_view($id);
		$data['contrack'] = $this->contrack->get_contrack();


		$this->load->view('user/view/view_service_page', $data);
	}

	public function view_product_page($id)
	{
		$data['navbar'] = $this->navbar->get_navbar_user();
		$data['product'] = $this->product->get_product_view($id);
		$data['contrack'] = $this->contrack->get_contrack();


		$this->load->view('user/view/view_product_page', $data);
	}


	public function view_online_marketing($id)
	{
		$data['navbar'] = $this->navbar->get_navbar_user();
		$data['online_marketing'] = $this->online_marketing->get_online_marketing_view($id);
		$data['contrack'] = $this->contrack->get_contrack();

		$this->load->view('user/view/view_online_marketing', $data);
	}

	public function view_port($id)
	{
		$data['port'] = $this->port->get_port_view($id);
		$data['contrack'] = $this->contrack->get_contrack();

		$this->load->view('user/view/view_port', $data);
	}
}
