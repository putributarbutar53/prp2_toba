<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_log = 'log_user';
    }

    public function get_main_menu()
    {
        $this->db->select('*');
        $this->db->where('is_main_menu', 0);
        $this->db->order_by('urutan ASC');
        return $this->db->get('users_menu')->result_array();
    }

    public function get_menu_id($menu_id)
    {
        return $this->db->get_where('users_menu', ['menu_id' => $menu_id])->row_array();
    }

    public function get_menu()
    {
        $result_menu = $this->db->order_by('urutan ASC')->get_where('users_menu', ['is_main_menu' => 0])->result_array();
        foreach ($result_menu as $menu) {
            $data[] = [
                "menu_id" => $menu['menu_id'],
                "menu_name" => $menu['menu_name'],
                "menu_link" => $menu['menu_link'],
                "menu_icon" => $menu['menu_icon'],
                "fitur_add" => $menu['fitur_add'],
                "fitur_update" => $menu['fitur_update'],
                "fitur_delete" => $menu['fitur_delete'],
                "fitur_update_1" => $menu['fitur_update_1'],
                "fitur_delete_1" => $menu['fitur_delete_1'],
                "is_main_menu" => $menu['is_main_menu'],
                "urutan" => $menu['urutan']
            ];
            $result_submenu = $this->db->order_by('urutan ASC')->get_where('users_menu', ['is_main_menu' => $menu['menu_id']])->result_array();
            foreach ($result_submenu as $submenu) {
                $data[] = [
                    "menu_id" => $submenu['menu_id'],
                    "menu_name" => $submenu['menu_name'],
                    "menu_link" => $submenu['menu_link'],
                    "menu_icon" => $submenu['menu_icon'],
                    "fitur_add" => $submenu['fitur_add'],
                    "fitur_update" => $submenu['fitur_update'],
                    "fitur_delete" => $submenu['fitur_delete'],
                    "fitur_update_1" => $submenu['fitur_update_1'],
                    "fitur_delete_1" => $submenu['fitur_delete_1'],
                    "is_main_menu" => $submenu['is_main_menu'],
                    "urutan" => $submenu['urutan']
                ];
            }
        }
        return $data;
    }

    public function get_role_id($id)
    {
        return $this->db->get_where('users_level', ['role_id' => $id])->row_array();
    }

    public function get_role_access($id)
    {
        return $this->db->get_where('users_access', ['role_id' => $id])->result_array();
    }

    public function get_role_menu($id)
    {
        $menu = $this->db->get('users_menu')->result_array();
        foreach ($menu as $mn) {
            $ada = false;
            foreach ($this->get_role_access($id) as $r) {
                if ($mn['menu_id'] == $r['menu_id']) {
                    $ada = true;
                }
            }
            if (!$ada) {
                $insert[] = [
                    "menu_id" => $mn['menu_id'],
                    "role_id" => $id,
                    "akses" => 'N',
                    "tambah" => 'N',
                    "ubah" => 'N',
                    "hapus" => 'N',
                    "ubah_1" => 'N',
                    "hapus_1" => 'N'
                ];
            }
        }

        if (isset($insert)) {
            $this->db->insert_batch('users_access', $insert);
        }

        $this->db->select('users_menu.menu_name, users_menu.is_main_menu, users_menu.menu_link, users_menu.fitur_add, users_menu.fitur_update, users_menu.fitur_delete,users_menu.fitur_update_1, users_menu.fitur_delete_1, users_access.*');
        $this->db->from('users_menu');
        $this->db->join('users_access', 'users_menu.menu_id = users_access.menu_id');
        $this->db->where(['users_menu.is_main_menu' => 0, 'users_access.role_id' => $id]);
        $this->db->order_by('users_menu.urutan ASC');
        $result_menu = $this->db->get()->result_array();
        foreach ($result_menu as $row_menu) {
            $users_menu[] = [
                "menu_id" => $row_menu['menu_id'],
                "menu_name" => $row_menu['menu_name'],
                "menu_link" => $row_menu['menu_link'],
                "is_main_menu" => $row_menu['is_main_menu'],
                "fitur_add" => $row_menu['fitur_add'],
                "fitur_update" => $row_menu['fitur_update'],
                "fitur_delete" => $row_menu['fitur_delete'],
                "fitur_update_1" => $row_menu['fitur_update_1'],
                "fitur_delete_1" => $row_menu['fitur_delete_1'],
                "akses" => $row_menu['akses'],
                "tambah" => $row_menu['tambah'],
                "ubah" => $row_menu['ubah'],
                "hapus" => $row_menu['hapus'],
                "ubah_1" => $row_menu['ubah_1'],
                "hapus_1" => $row_menu['hapus_1']
            ];
            $this->db->select('users_menu.menu_name, users_menu.is_main_menu, users_menu.menu_link, users_menu.fitur_add, users_menu.fitur_update, users_menu.fitur_delete, users_menu.fitur_update_1, users_menu.fitur_delete_1, users_access.*');
            $this->db->from('users_menu');
            $this->db->join('users_access', 'users_menu.menu_id = users_access.menu_id');
            $this->db->where(['users_menu.is_main_menu' => $row_menu['menu_id'], 'users_access.role_id' => $id]);
            $this->db->order_by('users_menu.urutan ASC');
            $result_submenu = $this->db->get()->result_array();
            foreach ($result_submenu as $submenu) {
                $users_menu[] = [
                    "menu_id" => $submenu['menu_id'],
                    "menu_name" => $submenu['menu_name'],
                    "menu_link" => $submenu['menu_link'],
                    "is_main_menu" => $submenu['is_main_menu'],
                    "fitur_add" => $submenu['fitur_add'],
                    "fitur_update" => $submenu['fitur_update'],
                    "fitur_delete" => $submenu['fitur_delete'],
                    "fitur_update_1" => $submenu['fitur_update_1'],
                    "fitur_delete_1" => $submenu['fitur_delete_1'],
                    "akses" => $submenu['akses'],
                    "tambah" => $submenu['tambah'],
                    "ubah" => $submenu['ubah'],
                    "hapus" => $submenu['hapus'],
                    "ubah_1" => $submenu['ubah_1'],
                    "hapus_1" => $submenu['hapus_1']
                ];
            }
        }
        return $users_menu;
    }

    public function simpan_akses($id, $data, $log)
    {
        $this->db->trans_start();
        $this->db->where('role_id', $id);
        $this->db->update_batch('users_access', $data, "menu_id");
        $this->db->insert($this->table_log, $log);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete_menu($id, $log)
    {
        $this->db->trans_start();
        $this->db->delete('users_menu', ['menu_id' => $id]);
        $this->db->delete('users_access', ['menu_id' => $id]);
        $this->db->insert($this->table_log, $log);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
}
