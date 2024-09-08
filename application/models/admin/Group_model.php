<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Group_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_group()
    {
        return $this->db->order_by('group_id ', 'DESC')->get('group')->result_array();
    }

    public function create_group($data)
    {
        $query =  $this->db->insert('group', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_group_id($id)
    {
        return $this->db->where('group_id', $id)->get('group')->result_array();
    }


    public function edit_group($id, $data)
    {
        $query =  $this->db->where('group_id', $id)->update('group', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function del_group($id)
    {
        $query =  $this->db->where('group_id', $id)->delete('group');

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }
}
