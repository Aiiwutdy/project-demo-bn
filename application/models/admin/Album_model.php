<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Album_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_album()
    {
        $this->db->select('album.album_id,album.album_pd_id, album.album_img, port.port_id, port.port_title, port.port_detail, port.port_img, port.port_num');
        $this->db->from('album');
        $this->db->join('port', 'port.port_id = album.album_pd_id');
        // $this->db->order_by('album.album_id, port.port_date ', 'DESC');
        return $this->db->get()->result_array();
    }

    public function create_album($data)
    {
        $query =  $this->db->insert('album', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function get_album_id($id)
    {
        return $this->db->where('album_id', $id)->get('album')->result_array();
    }


    public function edit_album($id, $data)
    {
        $query =  $this->db->where('album_id', $id)->update('album', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function del_album($id)
    {
        $query =  $this->db->where('album_id', $id)->delete('album');

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }
}
