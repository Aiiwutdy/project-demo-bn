<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/product_model', 'product');
		$this->load->helper('rename_helper');
		if (empty($this->session->userdata('user'))) {
			redirect(base_url('auth'));
		}
	}

	public function index()
	{
		$data['get_product'] =  $this->product->get_product();

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/product/index', $data);
		$this->load->view('layouts_admin/_footer');
	}


	public function add_product()
	{

		$data['get_product'] =  $this->product->get_product();

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/product/createProduct', $data);
		$this->load->view('layouts_admin/_footer');
	}

	public function create_product()
	{
		if (!empty($this->input->post('status'))) {
			$status = $this->input->post('status');
		} else {
			$status = 0;
		}

		$productName = $this->input->post('productName');
		$product_sub_name = $this->input->post('product_sub_name');
		$productDetail = $this->input->post('productDetail');
		$productPrice = $this->input->post('productPrice');
		$productImg = $this->upload_file_product('productImg', '2411', '650', './assets/img/admin/');
		$product_layout = $this->input->post('product_layout');
		$product_num = $this->input->post('product_num');

		$result = $this->product->get_product_num($product_num);

		if ($result == NULL) {
			$data['input_data'] = [
				'product_name' => $productName,
				'product_sub_name' => $product_sub_name,
				'product_detail' => $productDetail,
				'product_price' => $productPrice,
				'product_img' => $productImg,
				'product_layout_position' => $product_layout,
				'product_num' => $product_num,
				'product_status' => $status
			];
			$result =  $this->product->create_product($data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'เพิ่มข้อมูลสำเร็จ');
				redirect(base_url('admin/product'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'เพิ่มข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/product/add_product'));
			}
		} else {
			$this->session->set_flashdata('error', 'duplicate');
			$this->session->set_flashdata('message', 'ข้อมูลลำดับการแสดงต้องห้ามซ้า');
			redirect(base_url('admin/product/add_product'));
		}
		redirect(base_url('admin/product/'), $result);
	}


	public function view_product($id = null)
	{
		$data['result'] =  $this->product->get_product_id($id);

		$this->load->view('layouts_admin/_header');
		$this->load->view('admin/product/editProduct', $data);
		$this->load->view('layouts_admin/_footer');
	}

	public function edit_product()
	{
		if (!empty($this->input->post('status'))) {
			$status = $this->input->post('status');
		} else {
			$status = 0;
		}

		$id = $this->input->post('id');
		$productName = $this->input->post('productName');
		$product_sub_name = $this->input->post('product_sub_name');
		$productDetail = $this->input->post('productDetail');
		$productPrice = $this->input->post('productPrice');
		$product_layout = $this->input->post('product_layout');
		$product_num = $this->input->post('product_num');

		// เช็คลำดับการแสดงที่ input มาว่าใน DB มีไหม
		$get_num = $this->product->get_product_num($product_num);

		//ถ้าข้อมูลไม่ตรงกับฐานข้อมูล = แก้ไขได้
		if ($get_num == NULL) {
			if ($_FILES["productImg"]["name"] != NULL) {
				$productImg = $this->upload_file_product('productImg', '2411', '650', './assets/img/admin/');
				$data['input_data'] = [
					'product_name' => $productName,
					'product_sub_name' => $product_sub_name,
					'product_detail' => $productDetail,
					'product_price' => $productPrice,
					'product_img' => $productImg,
					'product_layout_position' => $product_layout,
					'product_num' => $product_num,
					'product_status' => $status
				];
			} else {
				$data['input_data'] = [
					'product_name' => $productName,
					'product_sub_name' => $product_sub_name,
					'product_detail' => $productDetail,
					'product_price' => $productPrice,
					'product_layout_position' => $product_layout,
					'product_num' => $product_num,
					'product_status' => $status
				];
			}
			$result =  $this->product->edit_product($id, $data['input_data']);

			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
				redirect(base_url('admin/product'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/product/view_product'));
			}
			//ถ้าข้อมูลตรงและไอดีกับฐานข้อมูล = แก้ไขได้
		} else if ($get_num[0]['product_num'] == $product_num && $get_num[0]['product_id'] == $id) {
			if ($_FILES["productImg"]["name"] != NULL) {
				$productImg = $this->upload_file_product('productImg', '2411', '650', './assets/img/admin/');
				$data['input_data'] = [
					'product_name' => $productName,
					'product_sub_name' => $product_sub_name,
					'product_detail' => $productDetail,
					'product_price' => $productPrice,
					'product_img' => $productImg,
					'product_layout_position' => $product_layout,
					'product_num' => $product_num,
					'product_status' => $status
				];
			} else {
				$data['input_data'] = [
					'product_name' => $productName,
					'product_sub_name' => $product_sub_name,
					'product_detail' => $productDetail,
					'product_price' => $productPrice,
					'product_layout_position' => $product_layout,
					'product_num' => $product_num,
					'product_status' => $status
				];
			}
			$result =  $this->product->edit_product($id, $data['input_data']);
			if ($result == 'success') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลสำเร็จ');
				redirect(base_url('admin/product'));
			} else if ($result == 'fail') {
				$this->session->set_flashdata('result',  $result);
				$this->session->set_flashdata('message', 'บันทึกข้อมูลไม่สำเร็จ');
				redirect(base_url('admin/product/view_product'));
			}
		}
		// ถ้าข้อมูลตรงแต่ไอดีไม่ตรงกับฐานข้อมูล = ห้ามแก้ไข
		else if ($get_num[0]['product_num'] == $product_num && $get_num[0]['product_id'] != $id) {
			$this->session->set_flashdata('error', 'duplicate');
			$this->session->set_flashdata('message', 'ข้อมูลลำดับการแสดงต้องห้ามซ้ำ');
			redirect(base_url('admin/product/view_product' . $id));
		}
	}

	public function del_product($id)
	{
		$result =  $this->product->del_product($id);
		if ($result == 'success') {
			$this->session->set_flashdata('result',  $result);
			$this->session->set_flashdata('message', 'ลบข้อมูลสำเร็จ');
			redirect(base_url('admin/product'));
		}
	}

	function upload_file_product($pic, $w, $h, $path)
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
			$name_pic =  'pd_' . gennamepic(5);
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
