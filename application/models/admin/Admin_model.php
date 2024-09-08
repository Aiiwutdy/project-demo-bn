<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login($user, $password)
    {
        return $this->db->select('ad_id,ad_name,ad_user,ad_status')->where(array('ad_user' => $user, 'ad_pass' => $password))->get('admin')->row_array();
    }

    // ดึงไปใช้หน้า index
    public function get_user()
    {
        return $this->db->order_by('ad_id', 'DESC')->get('admin')->result_array();
    }

    public function create_user($data)
    {
        $query =  $this->db->insert('admin', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_user_id($id)
    {
        return $this->db->where('ad_id', $id)->get('admin')->result_array();
    }


    public function edit_user($id, $data)
    {
        $query =  $this->db->where('ad_id', $id)->update('admin', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function del_user($id)
    {
        $query =  $this->db->where('ad_id', $id)->delete('admin');

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }
}
