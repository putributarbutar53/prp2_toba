<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_log = 'log_user';
    }

    function count_realisasi($id_skpd = null)
    {
        $this->db->select_sum('operasi');
        $this->db->select_sum('modal');
        $this->db->select_sum('takterduga');
        $this->db->select_sum('belanja');
        $this->db->select_sum('realisasi_belanja');
        if ($id_skpd != null) {
            $this->db->where('id_skpd', $id_skpd);
        }
        return $this->db->get('data_realisasi')->row_array();
    }
}
