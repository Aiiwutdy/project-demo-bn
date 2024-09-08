<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Port_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_port()
    {
        return $this->db->order_by('port_status', 'DESC')->order_by('port_id', 'ASC')->get('port')->result_array();
    }

    public function create_port($data)
    {
        $query =  $this->db->insert('port', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_port_id($id)
    {
        return $this->db->where('port_id', $id)->get('port')->result_array();
    }


    public function edit_port($id, $data)
    {
        $query =  $this->db->where('port_id', $id)->update('port', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function del_port($id)
    {
        $query =  $this->db->where('port_id', $id)->delete('port');

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_port_num($num)
    {
        return $this->db->where('port_num', $num)->get('port')->result_array();
    }

    public function get_port_user()
    {
        return $this->db->order_by('port_num', 'ASC')->get('port')->result_array();
    }

    public function get_port_view($id)
    {
        return $this->db->where('port_id', $id)->get('port')->result_array();
    }

    public function count_port()
    {
        return $this->db->select('count(port_id) as count')->get('port')->row_array();
    }

    public function get_port_page($limit = NULL)
    {
        return $this->db->limit($limit)->order_by('port_num', 'ASC')->get('port')->result_array();
    }
}
