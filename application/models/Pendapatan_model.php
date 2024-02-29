<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendapatan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_log = 'log_user';
    }

    function count_realisasi($id_skpd = null)
    {
        $this->db->select_sum('pendapatan');
        $this->db->select_sum('pad');
        $this->db->select_sum('transfer');
        $this->db->select_sum('pusat');
        $this->db->select_sum('dbh');
        $this->db->select_sum('dau');
        $this->db->select_sum('dak');
        $this->db->select_sum('daknon');
        $this->db->select_sum('dbh_daerah');
        $this->db->select_sum('pad_lain');
        $this->db->select_sum('realisasi_pendapatan');
		//$this->db->select_sum('pad_terakhir');
        if ($id_skpd != null) {
            $this->db->where('id_skpd', $id_skpd);
        }
        return $this->db->get('data_realisasi')->row_array();
    }
}
