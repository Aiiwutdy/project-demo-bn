<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Service_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_service()
    {
        return $this->db->order_by('service_status', 'DESC')->order_by('service_group_id', 'ASC')->order_by('service_position', 'ASC')->join('group', 'service.service_group_id = group.group_id')->get('service')->result_array();
    }

    public function create_service($data)
    {
        $query =  $this->db->insert('service', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_service_id($id)
    {
        return $this->db->join('group', 'group.group_id = service.service_group_id')->where('service_id', $id)->get('service')->result_array();
    }


    public function edit_service($id, $data)
    {
        $query =  $this->db->where('service_id', $id)->update('service', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function del_service($id)
    {
        $query =  $this->db->where('service_id', $id)->delete('service');

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_group()
    {
        $this->db->select('*');
        $this->db->from('group');
        return $this->db->get()->result_array();
    }

    public function get_service_num($num, $group_id)
    {
        $where = ['service_group_id' => $group_id, 'service_position' => $num];
        return $this->db->where($where)->get('service')->result_array();
    }

    public function get_service_user()
    {
        return $this->db->order_by('service_position', 'ASC')->join('group', 'service.service_group_id = group.group_id')->get('service')->result_array();
    }

    public function get_service_view($id)
    {
        return $this->db->where('service_id', $id)->join('group', 'service.service_group_id = group.group_id')->get('service')->result_array();
    }

    public function count_service()
    {
        return $this->db->where('group_id', 2)->order_by('service_position', 'ASC')->join('group', 'service.service_group_id = group.group_id')->select('count(service_id) as count')->get('service')->row_array();
    }


    public function get_service_page($limit = NULL)
    {
        return $this->db->limit($limit)->where('group_id', 2)->order_by('service_position', 'ASC')->join('group', 'service.service_group_id = group.group_id')->get('service')->result_array();
    }
}
