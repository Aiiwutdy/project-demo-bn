<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Album extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/album_model', 'album');
		$this->load->model('admin/port_model', 'port');
		$this->load->helper('rename_helper');
		if (empty($this->session->userdata('user'))) {
			redirect(base_url('auth'));
		}
	}
	public function index()
	{
		$data['get_album'] =  $this->album->get_album();

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/album/index', $data);
		$this->load->view('layouts_admin/_footer');
	}


	public function add_album()
	{
		$data['get_port'] = $this->port->get_port();


		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/album/createAlbum', $data);
		$this->load->view('layouts_admin/_footer');
	}


	public function create_album()
	{
		$port_id = $this->input->post('port_id');
		// $albumImg = $this->input->post('albumImg');
		$albumImg = $this->upload_file('albumImg', '2411', '650', './assets/img/admin/');

		$data['input_data'] = ['album_pd_id' => $port_id, 'album_img' => $albumImg];
		$result =  $this->album->create_album($data['input_data']);
		redirect(base_url('admin/album/'), $result);
	}

	public function view_album($id = null)
	{
		$data['get_port'] = $this->port->get_port($id);
		$data['result'] =  $this->album->get_album_id($id);

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/album/editAlbum', $data);
		$this->load->view('layouts_admin/_footer');
	}


	public function edit_album()
	{
		$id = $this->input->post('id');
		$port_id = $this->input->post('port_id');

		if ($_FILES["albumImg"]["name"] != NULL) {
			$albumImg = $this->upload_file('albumImg', '2411', '650', './assets/img/admin/');
			$data['input_data'] = ['album_pd_id' => $port_id, 'album_img' => $albumImg];
		} else {
			$data['input_data'] = ['album_pd_id' => $port_id];
		}
		$data['result'] =  $this->album->edit_album($id, $data['input_data'], $data['get_port']);
		redirect(base_url('admin/album/'), $data);
	}

	public function del_album($id)
	{
		$data['result'] =  $this->album->del_album($id);
		redirect(base_url('admin/album/'), $data);
	}

	function upload_file($pic, $w, $h, $path)
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
			$name_pic =  'ab_' . gennamepic(5);
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
