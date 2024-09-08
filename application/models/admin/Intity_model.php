<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Intity_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_intity()
    {
        return $this->db->get('intity')->result_array();
    }

    public function create_intity($data)
    {
        $query =  $this->db->insert('intity', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function edit_intity($data)
    {
        $query =  $this->db->update('intity', $data);

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function del_intity()
    {
        $query =  $this->db->delete('intity');

        if ($query) {
            return 'success';
        } else {
            return 'fail';
        }
    }
}
