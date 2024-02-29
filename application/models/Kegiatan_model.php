<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_log = 'log_user';
    }

    function get_kegiatan_skpd($id_skpd)
    {
        $this->db->select('a.*, b.nip_pa, b.nama_pa, c.nama_jenis_pelaksanaan');
        $this->db->join('pengguna_anggaran as b', 'a.id_pa = b.id_pa');
        $this->db->join('jenis_pelaksanaan as c', 'a.id_jenis_pelaksanaan = c.id_jenis_pelaksanaan');
        $this->db->where('a.id_skpd', $id_skpd);
        return $this->db->get('data_kegiatan as a')->result_array();
    }

    function get_lra_pemko()
    {
        $this->db->select('*');
        $this->db->join('data_realisasi_pemko as b', 'a.id_alokasi_pemko = b.id_realisasi_pemko');
        return $this->db->get('data_alokasi_pemko as a')->result_array();
    }
}
