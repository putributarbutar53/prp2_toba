<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kabupaten_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_log = 'log_user';
    }

    function get_anggaran_kabupaten($tahun)
    {
        $this->db->select('a.*, b.nama_kabupaten');
        $this->db->join('ta_kabupaten as b', 'a.id_kabupaten = b.id_kabupaten');
        $this->db->where(['tahun' => $tahun]);
        $this->db->order_by('b.nama_kabupaten ASC');
        return $this->db->get('tbl_anggaran_wilayah as a')->result_array();
    }

    function get_apbd_kabupaten($tahun)
    {
        $this->db->select('a.*, b.nama_kabupaten');
        $this->db->join('ta_kabupaten as b', 'a.id_kabupaten = b.id_kabupaten');
        $this->db->where(['tahun' => $tahun]);
        $this->db->order_by('b.nama_kabupaten ASC');
        return $this->db->get('tbl_detail_anggaran_wil as a')->result_array();
    }
}
