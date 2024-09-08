<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Slide_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_slide()
    {
        return $this->db->order_by('slider_id', 'DESC')->get('slider')->result_array();
    }

    public function create_slide($data)
    {
        $query =  $this->db->insert('slider', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_slide_id($id)
    {
        return $this->db->where('slider_id', $id)->get('slider')->result_array();
    }


    public function edit_slide($id, $data)
    {
        $query =  $this->db->where('slider_id', $id)->update('slider', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function del_slide($id)
    {
        $query =  $this->db->where('slider_id', $id)->delete('slider');

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_slide_num($num)
    {
        return $this->db->where('slider_num', $num)->get('slider')->result_array();
    }
}
