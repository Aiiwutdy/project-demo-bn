<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_product()
    {
        // $this->db->select('*');
        // $this->db->from('product');
        // $this->db->order_by('product_id ', 'DESC');
        // $this->db->order_by('product_status ', 'ASC');
        // return $this->db->get()->result_array();

        return $this->db->order_by('product_status', 'DESC')->order_by('product_id', 'ASC')->get('product')->result_array();
    }

    public function create_product($data)
    {
        $query =  $this->db->insert('product', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_product_id($id)
    {
        return $this->db->where('product_id', $id)->get('product')->result_array();
    }


    public function edit_product($id, $data)
    {
        $query =  $this->db->where('product_id', $id)->update('product', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function del_product($id)
    {
        $query =  $this->db->where('product_id', $id)->delete('product');

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_product_num($num)
    {
        return $this->db->where('product_num', $num)->get('product')->result_array();
    }

    public function get_product_user()
    {
        return $this->db->order_by('product_num', 'ASC')->get('product')->result_array();
    }

    public function get_product_view($id)
    {
        return $this->db->where('product_id', $id)->order_by('product_num', 'ASC')->get('product')->result_array();
    }

    public function count_product()
    {
        return $this->db->select('count(product_id) as count')->get('product')->row_array();
    }

    public function get_product_page($limit = NULL)
    {
        return $this->db->limit($limit)->order_by('product_num', 'ASC')->get('product')->result_array();
    }
}
