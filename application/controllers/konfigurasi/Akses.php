<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konfigurasi_model', 'konfigurasi');
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }

    public function index()
    {
        if ($this->akses['akses'] == 'Y') {
            $data = [
                "menu_active" => "konfigurasi",
                "submenu_active" => "akses-menu",
                "result_role" => $this->mquery->select_data('users_level')
            ];
            $this->load->view('konfigurasi/akses/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function form_edit()
    {
        if ($this->akses['ubah'] == 'Y') {
            $id = htmlspecialchars($this->input->post('id', TRUE));
            $role_id = decrypt_url($id);
            $data['role'] = $this->konfigurasi->get_role_id($role_id);
            $data['result_menu'] = $this->konfigurasi->get_role_menu($role_id);
            $this->load->view('konfigurasi/akses/form_edit', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function edit()
    {
        if ($this->akses['ubah'] == 'Y') {
            $id = $this->input->post('role_id', TRUE);
            $role_id = decrypt_url($id);
            if ($role_id == "error") {
                kirim_pesan("access");
            } else {
                $list_menu = $this->konfigurasi->get_role_menu($role_id);
                $no = 0;
                foreach ($list_menu as $lm) {
                    $array[] = [
                        "menu_id" => $lm['menu_id'],
                        "akses" => ($this->input->post('akses' . $no)) ? 'Y' : 'N',
                        "tambah" => ($this->input->post('tambah' . $no)) ? 'Y' : 'N',
                        "ubah" => ($this->input->post('ubah' . $no)) ? 'Y' : 'N',
                        "hapus" => ($this->input->post('hapus' . $no)) ? 'Y' : 'N',
                        "ubah_1" => ($this->input->post('ubah_1' . $no)) ? 'Y' : 'N',
                        "hapus_1" => ($this->input->post('hapus_1' . $no)) ? 'Y' : 'N'
                    ];
                    $no++;
                }
                $temp = $this->mquery->select_id('users_access', ['role_id' => $role_id]);
                $string = ['users_access' => ['old' => $temp, 'new' => $array]];
                $log = simpan_log("update access menu", json_encode($string));
                $res = $this->konfigurasi->simpan_akses($role_id, $array, $log);
                $data = ['status' => TRUE, 'notif' => $res];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        } else {
            redirect(site_url('blocked'));
        }
    }
}
