<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contrack_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_contrack()
    {
        return $this->db->get('contrack')->result_array();
    }

    public function create_contrack($data)
    {
        $query =  $this->db->insert('contrack', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function edit_contrack($data)
    {
        $query =  $this->db->update('contrack', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function del_contrack()
    {
        $query =  $this->db->delete('contrack');

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }
}
