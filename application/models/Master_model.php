<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_log = 'log_user';
    }

    function get_pa($id_skpd = null)
    {
        $this->db->select('a.*, b.id_pa, b.nip_pa, b.nama_pa, b.is_active');
        $this->db->join('pengguna_anggaran as b', 'a.id_skpd = b.id_skpd');
        if ($id_skpd != null) {
            $this->db->where('b.id_skpd', $id_skpd);
        }
        $this->db->where('b.is_active', 'Y');
        return $this->db->get('data_skpd as a')->result_array();
    }

    function get_pa_id($id_pa)
    {
        $this->db->select('a.*, b.id_pa, b.nip_pa, b.nama_pa, b.is_active');
        $this->db->join('pengguna_anggaran as b', 'a.id_skpd = b.id_skpd');
        $this->db->where('b.id_pa', $id_pa);
        return $this->db->get('data_skpd as a')->row_array();
    }

    function insert_new_pa($data, $data_old, $id_old, $log)
    {
        $this->db->trans_start();
        $this->db->update('pengguna_anggaran', $data_old, ['id_pa' => $id_old]);
        if ($this->db->affected_rows() > 0) {
            $this->db->insert('pengguna_anggaran', $data);
            $this->db->insert($this->table_log, $log);
            $this->db->trans_complete();
            return $this->db->trans_status();
        } else {
            return $this->db->affected_rows();
        }
    }

    function get_ttd($id_skpd = null)
    {
        $this->db->select('a.*, b.id_ttd, b.nip_ttd, b.nama_ttd, b.ttd, b.is_active');
        $this->db->join('penanda_tangan as b', 'a.id_skpd = b.id_skpd');
        if ($id_skpd != null) {
            $this->db->where('b.id_skpd', $id_skpd);
        }
        $this->db->where('b.is_active', 'Y');
        return $this->db->get('data_skpd as a')->result_array();
    }

    function get_ttd_id($id_ttd)
    {
        $this->db->select('a.*, b.id_ttd, b.nip_ttd, b.nama_ttd, b.ttd, b.is_active');
        $this->db->join('penanda_tangan as b', 'a.id_skpd = b.id_skpd');
        $this->db->where('b.id_ttd', $id_ttd);
        return $this->db->get('data_skpd as a')->row_array();
    }

    function insert_new_ttd($data, $data_old, $id_old, $log)
    {
        $this->db->trans_start();
        $this->db->update('penanda_tangan', $data_old, ['id_ttd' => $id_old]);
        if ($this->db->affected_rows() > 0) {
            $this->db->insert('penanda_tangan', $data);
            $this->db->insert($this->table_log, $log);
            $this->db->trans_complete();
            return $this->db->trans_status();
        } else {
            return $this->db->affected_rows();
        }
    }

    function get_ttd1($id_skpd = null)
    {
        $this->db->select('a.*, b.id_ttd, b.nip_ttd, b.nama_ttd, b.ttd, b.is_active');
        $this->db->join('bendahara_pengeluaran as b', 'a.id_skpd = b.id_skpd');
        if ($id_skpd != null) {
            $this->db->where('b.id_skpd', $id_skpd);
        }
        $this->db->where('b.is_active', 'Y');
        return $this->db->get('data_skpd as a')->result_array();
    }

    function get_ttd_id1($id_ttd)
    {
        $this->db->select('a.*, b.id_ttd, b.nip_ttd, b.nama_ttd, b.ttd, b.is_active');
        $this->db->join('bendahara_pengeluaran as b', 'a.id_skpd = b.id_skpd');
        $this->db->where('b.id_ttd', $id_ttd);
        return $this->db->get('data_skpd as a')->row_array();
    }

    function insert_new_ttd1($data, $data_old, $id_old, $log)
    {
        $this->db->trans_start();
        $this->db->update('bendahara_pengeluaran', $data_old, ['id_ttd' => $id_old]);
        if ($this->db->affected_rows() > 0) {
            $this->db->insert('bendahara_pengeluaran', $data);
            $this->db->insert($this->table_log, $log);
            $this->db->trans_complete();
            return $this->db->trans_status();
        } else {
            return $this->db->affected_rows();
        }
    }

    function get_anggaran_kabupaten($tahun)
    {
        $this->db->select('a.*, b.nama_kabupaten');
        $this->db->join('ta_kabupaten as b', 'a.id_kabupaten = b.id_kabupaten');
        $this->db->where(['tahun' => $tahun]);
        $this->db->order_by('b.nama_kabupaten ASC');
        return $this->db->get('tbl_anggaran_wilayah as a')->result_array();
    }
}
