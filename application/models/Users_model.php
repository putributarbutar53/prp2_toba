<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_log = 'log_user';
    }

    function get_users($id_user = null)
    {
        $this->db->select('*');
        $this->db->order_by('id_skpd', 'ASC');
        $this->db->order_by('username', 'ASC');
        if ($id_user != null) {
            $this->db->where('id_user', $id_user);
            return $this->db->get('users')->row_array();
        } else {
            return $this->db->get('users')->result_array();
        }
    }
}
