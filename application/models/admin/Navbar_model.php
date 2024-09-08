<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Navbar_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_navbar()
    {
        return $this->db->order_by('navbar_id ', 'DESC')->get('navbar')->result_array();
    }

    public function create_navbar($data)
    {
        $query =  $this->db->insert('navbar', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_navbar_id($id)
    {
        return $this->db->where('navbar_id', $id)->get('navbar')->result_array();
    }


    public function edit_navbar($id, $data)
    {
        $query =  $this->db->where('navbar_id', $id)->update('navbar', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function del_navbar($id)
    {
        $query =  $this->db->where('navbar_id', $id)->delete('navbar');

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_navbar_num($num)
    {
        return $this->db->where('navbar_num', $num)->get('navbar')->result_array();
    }

    public function get_navbar_user()
    {
        return $this->db->order_by('navbar_id ', 'ASC')->get('navbar')->result_array();
    }
}
