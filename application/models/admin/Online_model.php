<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Online_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_online_marketing()
    {
        return $this->db->order_by('om_status', 'DESC')->order_by('om_id', 'ASC')->get('online_marketing')->result_array();
    }

    public function create_online_marketing($data)
    {
        $query =  $this->db->insert('online_marketing', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_online_marketing_id($id)
    {
        return $this->db->where('om_id', $id)->get('online_marketing')->result_array();
    }


    public function edit_online_marketing($id, $data)
    {
        $query =  $this->db->where('om_id', $id)->update('online_marketing', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function del_online_marketing($id)
    {
        $query =  $this->db->where('om_id', $id)->delete('online_marketing');

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_online_marketing_num($num)
    {
        return $this->db->where('om_num', $num)->get('online_marketing')->result_array();
    }


    public function get_online_marketing_user()
    {
        return $this->db->order_by('om_num', 'ASC')->get('online_marketing')->result_array();
    }

    public function get_online_marketing_view($id)
    {
        return $this->db->where('om_id', $id)->get('online_marketing')->result_array();
    }
}
