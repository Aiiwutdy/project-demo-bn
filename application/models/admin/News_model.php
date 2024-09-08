<?php

defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_news()
    {
        // return $this->db->order_by('new_id', 'ASC')->join('admin' , 'admin.ad_id = new.new_ad_id')->select('new.new_id,new.new_title,new.new_detail,new.new_date,new.new_ad_id,new.new_status,admin.ad_name')->get('new')->result_array();
        $this->db->select('new.new_id,new.new_title,new.new_detail,new.new_date,new.new_ad_id,new.new_status,admin.ad_name');
        $this->db->from('new');
        $this->db->join('admin', 'admin.ad_id = new.new_ad_id');
        $this->db->order_by('new.new_date ', 'DESC');
        return $this->db->get()->result_array();
    }

    public function create_news($data)
    {
        $query =  $this->db->insert('new', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_news_id($id)
    {
        return $this->db->where('new_id', $id)->get('new')->result_array();
    }


    public function edit_news($id, $data)
    {
        $query =  $this->db->where('new_id', $id)->update('new', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function del_news($id)
    {
        $query =  $this->db->where('new_id', $id)->delete('new');

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }
}
