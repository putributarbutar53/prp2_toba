<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'users');
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }

    public function index()
    {
        if ($this->akses['akses'] == 'Y') {
            $data = [
                "menu_active" => "users",
                "submenu_active" => "data-user"
            ];
            $this->load->view('setting/users/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function load()
    {
        if ($this->akses['akses'] == 'Y') {
            $result = $this->users->get_users();
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $no++;
                $foto = "<img src='" . cek_file("uploads/users/" . $r['foto_profile']) . "' alt='Photo' class='foto-img' />";
                $password = "<button id='tombol-password' data-id='" . encrypt_url($r['id_user']) . "' data-toggle='modal' data-target='#modal-password' class='btn btn-warning btn-xs'><i class='fa fa-key'></i> PASSWORD</button>";
                
                if ($this->akses['ubah'] == 'Y') 
                    {$edit = action_edit(encrypt_url($r['id_user']));}
                else{$edit = "-";}

                if ($this->akses['hapus'] == 'Y') 
                    {$delete = action_delete(encrypt_url($r['id_user']));}
                else{$delete = "-";}
                
                $result_skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $r['id_skpd']]);
                $nama_skpd = $result_skpd['nama_skpd'];

                $users_level = $this->mquery->select_id('users_level', ['role_id' => $r['level']]);

                $row = [
                    'no' => $no,
                    'foto' => $foto,
                    'username' => $r['username'],
                    'nama_user' => $r['nama_user'],
                    'nip_user' => $r['nip_user'],
                    'nama_skpd' => $nama_skpd,
                    'keterangan' => $users_level['role_name'],
                    'password' => $password,
                    'opsi' => $edit . ' ' . $delete
                ];
                $data[] = $row;
            }
            $output['data'] = $data;
            echo json_encode($output);
        } else {
            $data = ['status' => FALSE, 'pesan' => 'blocked'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    private function _rule_form()
    {
        // $this->form_validation->set_rules('unit_kerja', 'Unit kerja', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama User', 'required|trim');
        $this->form_validation->set_rules('nip', 'Nip User', 'required|trim');
        $this->form_validation->set_rules('skpd', 'Nama SKPD', 'required|trim');
        $this->form_validation->set_rules('level', 'Level admin', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error($params)
    {
        if ($params == 'admin') {
            $errors = [
                // 'unit_kerja' => "<p>Admin Unit Kerja Ini Sudah Ada</p>",
                'username' => form_error('username'),
                'nama' => form_error('nama'),
                'nip' => form_error('nip'),
                'skpd' => form_error('skpd'),
                'level' => form_error('level')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Admin Unit Kerja Ini Sudah Ada'];
            } elseif ($params == 'username') {
                $errors = [
                    // 'unit_kerja' => form_error('unit_kerja'),
                    'username' => "<p>Username sudah digunakan</p>",
                    'level' => form_error('level')
                ];
                $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Username sudah digunakan'];
            } else {
                $errors = [
                    // 'unit_kerja' => form_error('unit_kerja'),
                    'username' => form_error('username'),
                    'nama' => form_error('nama'),
                    'nip' => form_error('nip'),
                    'skpd' => form_error('skpd'),
                    'level' => form_error('level')
                ];
                $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function form()
    {
        if ($this->akses['tambah'] == 'Y' or $this->akses['ubah'] == 'Y') {
            $opsi = htmlspecialchars($this->input->post('opsi', TRUE));
            if ($opsi == "add") {
                $data = [
                    'users_level' => $this->mquery->select_data('users_level'),
                    'result_skpd' => $this->mquery->select_data('data_skpd')
                ];
                $this->load->view('setting/users/form_add', $data);
            } elseif ($opsi == "edit") {
                $id = htmlspecialchars($this->input->post('id', TRUE));
                $id_user = decrypt_url($id);
                $data = [
                    'users_level' => $this->mquery->select_data('users_level'),
                    'user' => $this->users->get_users($id_user),
                    'result_skpd' => $this->mquery->select_data('data_skpd')
                ];
                $this->load->view('setting/users/form_edit', $data);
            } else {
                $this->load->view('blocked');
            }
        } else {
            redirect(site_url('blocked'));
        }
    }


    function add()
    {
        if ($this->akses['tambah'] == 'Y') {
            $this->_rule_form();
            if ($this->form_validation->run() == false) {
                $this->_send_error('default');
            } else {
                $post = $this->input->post(null, TRUE);
                // $id_skpd = htmlspecialchars($post['unit_kerja']);
                $username = htmlspecialchars($post['username']);
                $cek_username = $this->mquery->count_data('users', ['username' => $username]);
                $level=htmlspecialchars($post['level']);
                if($level==3 OR $level==4){$role_admin="Y";}else{$role_admin="N";}
                $cek_admin = 0; // $this->master->count_data('users', ['id_skpd' => $id_skpd, 'role_admin' => 'skpd']);
                if ($cek_username > 0) {
                    $this->_send_error('username');
                } elseif ($cek_admin > 0) {
                    $this->_send_error('admin');
                } else {
                    $insert =  [
                        'username' => htmlspecialchars($post['username']),
                        'nama_user' => htmlspecialchars($post['nama']),
                        'nip_user' => htmlspecialchars($post['nip']),
                        'id_skpd' => htmlspecialchars($post['skpd']),
                        'password' => password_hash('prp123', PASSWORD_DEFAULT),
                        'foto_profile' => 'no-image.png',
                        'level' => $level,
                        'skpd' => $role_admin
                    ];

                    $string = ['users' => $insert];
                    $log = simpan_log("insert user", json_encode($string));
                    $res = $this->mquery->insert_data('users', $insert, $log);
                    $data = ['status' => TRUE, 'notif' => $res];
                    $this->output->set_content_type('application/json')->set_output(json_encode($data));
                }
            }
        } else {
            $data = ['status' => FALSE, 'pesan' => 'blocked'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    function edit()
    {
        if ($this->akses['ubah'] == 'Y') {
            $this->_rule_form();
            if ($this->form_validation->run() == false) {
                $this->_send_error('default');
            } else {
                $post = $this->input->post(null, TRUE);
                $id = htmlspecialchars($post['id_user']);
                $id_user = decrypt_url($id);
                $level=htmlspecialchars($post['level']);
                if($level==3 OR $level==4){$role_admin="Y";}else{$role_admin="N";}
                if ($id_user == "error") {
                    $data = ['status' => FALSE, 'pesan' => "blocked"];
                    $this->output->set_content_type('application/json')->set_output(json_encode($data));
                } else {
                    $username = htmlspecialchars($post['username']);
                    $temp = $this->users->get_users($id_user);
                    // cek apakan username berubah atau tidak
                    if ($temp['username'] == $username) {
                        $cek_username = 0;
                    } else {
                        $cek_username = $this->mquery->count_data('users', ['username' => $username]);
                    }
                    // jika ada username lain selain user id, maka kirim pesan eror
                    if ($cek_username > 0) {
                        $this->_send_error('username');
                    } else {
                        $update =  [
                            'username' => $username,
                            'nama_user' => htmlspecialchars($post['nama']),
                            'nip_user' => htmlspecialchars($post['nip']),
                            'id_skpd' => htmlspecialchars($post['skpd']),
                            'level' => $level,
                            'skpd' => $role_admin
                        ];
                        $string = ['users' => ['old' => $temp, 'new' => $update]];
                        $log = simpan_log("update user", json_encode($string));
                        $res = $this->mquery->update_data('users', $update, ['id_user' => $id_user], $log);
                        $data = ['status' => TRUE, 'notif' => $res];
                        $this->output->set_content_type('application/json')->set_output(json_encode($data));
                    }
                }
            }
        } else {
            $data = ['status' => FALSE, 'pesan' => 'blocked'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    function delete()
    {
        if ($this->akses['hapus'] == 'Y') {
            $id = htmlspecialchars($this->input->post('id', TRUE));
            $id_user = decrypt_url($id);
            if ($id_user == "error") {
                $data = ['status' => FALSE, 'pesan' => "blocked"];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            } else {
                $temp = $this->users->get_users($id_user);
                $string = ['users' => $temp];
                $log = simpan_log("delete user", json_encode($string));
                $res = $this->mquery->delete_data('users', ['id_user' => $id_user], $log);
                if (($res > 0) && ($temp['foto_profile'] != "no-image.png")) {
                    if (file_exists(FCPATH . "uploads/users/" . $temp['foto_profile'])) {
                        unlink(FCPATH . "uploads/users/" . $temp['foto_profile']);
                    }
                }
                $data = ['notif' => $res];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        } else {
            $data = ['status' => FALSE, 'pesan' => 'blocked'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }
}
