<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
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
                "submenu_active" => "list-menu"
            ];
            $this->load->view('konfigurasi/menu/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function load()
    {
        if ($this->akses['akses'] == 'Y') {
            $result = $this->konfigurasi->get_menu();
            $data = [];
            foreach ($result as $r) {
                if ($r['is_main_menu'] == 0) {
                    $menu = "<strong>" . $r['menu_name'] . "</strong>";
                    $urutan = "<strong>" . $r['urutan'] . "</strong>";
                } else {
                    $menu = "<span style='padding-left: 30px;'></span>" . $r['menu_name'];
                    $urutan = "<span style='padding-left: 30px;'></span>" . $r['urutan'];
                }
                ($r['fitur_add'] == 'Y') ? $fitur_add = "Ya" : $fitur_add = "Tidak";
                ($r['fitur_update'] == 'Y') ? $fitur_update = "Ya" : $fitur_update = "Tidak";
                ($r['fitur_delete'] == 'Y') ? $fitur_delete = "Ya" : $fitur_delete = "Tidak";
                ($r['fitur_update_1'] == 'Y') ? $fitur_update_1 = "Ya" : $fitur_update_1 = "Tidak";
                ($r['fitur_delete_1'] == 'Y') ? $fitur_delete_1 = "Ya" : $fitur_delete_1 = "Tidak";
                $edit = action_edit(encrypt_url($r['menu_id']));
                $delete = action_delete(encrypt_url($r['menu_id']));
                
                $row = [
                    'menu' => $menu,
                    'link' => $r['menu_link'],
                    'icon' => $r['menu_icon'],
                    'add' => $fitur_add,
                    'update' => $fitur_update,
                    'delete' => $fitur_delete,
                    'update_1' => $fitur_update_1,
                    'delete_1' => $fitur_delete_1,
                    'urutan' => $urutan,
                    'aksi' => $edit . ' ' . $delete
                ];
                $data[] = $row;
            }
            $output['data'] = $data;
            echo json_encode($output);
        } else {
            redirect(site_url('blocked'));
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('menu', 'Nama menu', 'required|trim');
        $this->form_validation->set_rules('url', 'Url menu', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon menu', 'required|trim');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|trim');
        $this->form_validation->set_rules('main_menu', 'Main menu', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error()
    {
        $errors = [
            'menu' => form_error('menu'),
            'url' => form_error('url'),
            'icon' => form_error('icon'),
            'urutan' => form_error('urutan'),
            'main_menu' => form_error('main_menu')
        ];
        $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function form_add()
    {
        if ($this->akses['tambah'] == 'Y') {
            $data['result_menu'] = $this->konfigurasi->get_main_menu();
            $this->load->view('konfigurasi/menu/form_add', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    function add()
    {
        if ($this->akses['tambah'] == 'Y') {
            $this->_rule_form();
            if ($this->form_validation->run() == false) {
                $this->_send_error();
            } else {
                $post = $this->input->post(null, TRUE);
                $array =  [
                    'menu_name' => htmlspecialchars($post['menu']),
                    'menu_link' => htmlspecialchars($post['url']),
                    'menu_icon' => htmlspecialchars($post['icon']),
                    'is_main_menu' => htmlspecialchars($post['main_menu']),
                    'fitur_add' => ($this->input->post('add')) ? 'Y' : 'N',
                    'fitur_update' => ($this->input->post('update')) ? 'Y' : 'N',
                    'fitur_delete' => ($this->input->post('delete')) ? 'Y' : 'N',
                    'fitur_update_1' => ($this->input->post('update_1')) ? 'Y' : 'N',
                    'fitur_delete_1' => ($this->input->post('delete_1')) ? 'Y' : 'N',
                    'urutan' => htmlspecialchars($post['urutan'])
                ];
                $string = ['users_menu' => $array];
                $log = simpan_log("insert menu", json_encode($string));
                $res = $this->mquery->insert_data("users_menu", $array, $log);
                $data = ['status' => TRUE, 'notif' => $res];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        } else {
            kirim_pesan("blocked");
        }
    }

    public function form_edit()
    {
        if ($this->akses['ubah'] == 'Y') {
            $id = htmlspecialchars($this->input->post('menu', TRUE));
            $menu_id = decrypt_url($id);
            $data['menu'] = $this->konfigurasi->get_menu_id($menu_id);
            $data['result_menu'] = $this->konfigurasi->get_main_menu();
            $this->load->view('konfigurasi/menu/form_edit', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    function edit()
    {
        if ($this->akses['ubah'] == 'Y') {
            $this->_rule_form();
            if ($this->form_validation->run() == false) {
                $this->_send_error();
            } else {
                $post = $this->input->post(null, TRUE);
                $id = htmlspecialchars($post['menu_id']);
                $menu_id = decrypt_url($id);
                if ($menu_id == "error") {
                    kirim_pesan("access");
                } else {
                    $array =  [
                        'menu_name' => htmlspecialchars($post['menu']),
                        'menu_link' => htmlspecialchars($post['url']),
                        'menu_icon' => htmlspecialchars($post['icon']),
                        'is_main_menu' => htmlspecialchars($post['main_menu']),
                        'fitur_add' => ($this->input->post('add')) ? 'Y' : 'N',
                        'fitur_update' => ($this->input->post('update')) ? 'Y' : 'N',
                        'fitur_delete' => ($this->input->post('delete')) ? 'Y' : 'N',
                        'fitur_update_1' => ($this->input->post('update_1')) ? 'Y' : 'N',
                        'fitur_delete_1' => ($this->input->post('delete_1')) ? 'Y' : 'N',
                        'urutan' => htmlspecialchars($post['urutan'])
                    ];
                    $temp = $this->mquery->select_id('users_menu', ['menu_id' => $menu_id]);
                    $string = ['users_menu' => ['old' => $temp, 'new' => $array]];
                    $log = simpan_log("update menu", json_encode($string));
                    $res = $this->mquery->update_data('users_menu', $array, ['menu_id' => $menu_id], $log);
                    $data = ['status' => TRUE, 'notif' => $res];
                    $this->output->set_content_type('application/json')->set_output(json_encode($data));
                }
            }
        } else {
            kirim_pesan("blocked");
        }
    }

    function delete()
    {
        if ($this->akses['hapus'] == 'Y') {
            $id = htmlspecialchars($this->input->post('menu', TRUE));
            $menu_id = decrypt_url($id);
            if ($menu_id == "error") {
                kirim_pesan("access");
            } else {
                $temp_menu = $this->mquery->select_id('users_menu', ['menu_id' => $menu_id]);
                $temp_access = $this->mquery->select_by('users_access', ['menu_id' => $menu_id]);
                $string = ['users_menu' => $temp_menu, 'users_access' => $temp_access];
                $log = simpan_log("delete menu", json_encode($string));
                $res = $this->konfigurasi->delete_menu($menu_id, $log);
                $data = ['notif' => $res];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        } else {
            kirim_pesan("blocked");
        }
    }
}
