<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Query_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_log = 'log_user';
    }

    function select_data($table_name, $order = null)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        if ($order != null) {
            $this->db->order_by($order);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function select_by($table_name, $where, $order = null)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($where);
        if ($order != null) {
            $this->db->order_by($order);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function select_id($table_name, $where)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row_array();
    }

    function count_data($table_name, $where)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function insert_data($table_name, $data, $log)
    {
        $this->db->trans_start();
        $this->db->insert($table_name, $data);
        $this->db->insert($this->table_log, $log);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    function update_data($table_name, $data, $where, $log)
    {
        $this->db->trans_start();
        $this->db->update($table_name, $data, $where);
        if ($this->db->affected_rows() > 0) {
            $this->db->insert($this->table_log, $log);
            $this->db->trans_complete();
            return $this->db->trans_status();
        } else {
            return $this->db->affected_rows();
        }
    }

    function delete_data($table_name, $where, $log)
    {
        $this->db->trans_start();
        $this->db->delete($table_name, $where);
        if ($this->db->affected_rows() > 0) {
            $this->db->insert($this->table_log, $log);
            $this->db->trans_complete();
            return $this->db->trans_status();
        } else {
            return $this->db->affected_rows();
        }
    }

    function max_data($table_name, $id)
    {
        $this->db->select_max($id);
        $this->db->from($table_name);
        $query = $this->db->get();
        return $query->row_array();
    }

    function max_data_where($table_name, $id, $where)
    {
        $this->db->select_max($id);
        $this->db->from($table_name);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row_array();
    }

    function sum_data($table_name, $id, $where)
    {
        $this->db->select_sum($id);
        $this->db->where($where);
        return $this->db->get($table_name)->row_array();
    }
}
