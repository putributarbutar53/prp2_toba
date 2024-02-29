<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
                "submenu_active" => "profil-user"
            ];
            $this->load->view('setting/profile/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function load()
    {
        $data['user'] = $this->users->get_users($this->user['user']);
        $this->load->view('setting/profile/load', $data);
    }

    public function form_foto()
    {
        if ($this->akses['ubah'] == 'Y') {
            $id = htmlspecialchars($this->input->post('id', TRUE));
            $id_user = decrypt_url($id);
            if ($id_user == "error") {
                $data = ['status' => FALSE, 'pesan' => "blocked"];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            } else {
                $data['user'] = $this->users->get_users($id_user);
                $this->load->view('setting/profile/form_edit_foto', $data);
            }
        } else {
            redirect(site_url('blocked'));
        }
    }

    function edit_foto()
    {
        $post = $this->input->post(null, TRUE);
        $id = htmlspecialchars($post['id_user']);
        $id_user = decrypt_url($id);
        if ($id_user == "error") {
            $data = ['status' => FALSE, 'pesan' => "blocked"];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $username = htmlspecialchars($post['username']);
            $config['upload_path']      = "./uploads/users/";
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['file_name']        = $username . '-' . date("Ymd-His");
            $config['max_size']         = 512;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $errors = [
                    'foto' => $this->upload->display_errors()
                ];
                $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            } else {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = "./uploads/users/" . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['width'] = 200;
                $config['height'] = 225;
                $config['new_image'] = "./uploads/users/" . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $update =  [
                    'foto_profile' => $gbr['file_name']
                ];
                $temp = $this->users->get_users($id_user);
                $string = ['users' => $update];
                $log = simpan_log("update", json_encode($string));
                $res = $this->mquery->update_data('users', $update, ['id_user' => $id_user], $log);
                if ($res > 0) {
                    if (($res > 0) && ($temp['foto_profile'] != "no-image.png")) {
                        if (file_exists(FCPATH . "uploads/users/" . $temp['foto_profile'])) {
                            unlink(FCPATH . "uploads/users/" . $temp['foto_profile']);
                        }
                    }
                }
                $data = ['status' => TRUE, 'notif' => $res];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        }
    }

    public function form_password()
    {
        if ($this->akses['ubah'] == 'Y') {
            $id = htmlspecialchars($this->input->post('id', TRUE));
            $id_user = decrypt_url($id);
            if ($id_user == "error") {
                $data = ['status' => FALSE, 'pesan' => "blocked"];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            } else {
                $data['user'] = $this->users->get_users($id_user);
                $this->load->view('setting/profile/form_edit_password', $data);
            }
        } else {
            redirect(site_url('blocked'));
        }
    }

    function edit_password()
    {
        $this->form_validation->set_rules('password', 'Password baru', 'required|trim');
        $this->form_validation->set_rules('password_confirm', 'Konfirmasi password', 'required|trim|matches[password]');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        $this->form_validation->set_message('matches', '%s tidak sama');
        if ($this->form_validation->run() == false) {
            $errors = [
                'password' => form_error('password'),
                'password_confirm' => form_error('password_confirm')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $post = $this->input->post(null, TRUE);
            $id = htmlspecialchars($post['id_user']);
            $id_user = decrypt_url($id);
            if ($id_user == "error") {
                $data = ['status' => FALSE, 'pesan' => "blocked"];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            } else {
                $password   = htmlspecialchars($post['password']);
                $update =  [
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ];
                $string = ['users' => $update];
                $log = simpan_log("update", json_encode($string));
                $res = $this->mquery->update_data('users', $update, ['id_user' => $id_user], $log);
                $data = ['status' => TRUE, 'notif' => $res];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        }
    }
}
