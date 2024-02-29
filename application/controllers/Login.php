<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->rule_validation();
        if ($this->form_validation->run() == false) {
            $this->load->view('login_view');
        } else {
            $this->_login();
        }
    }

    function rule_validation()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[50]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[50]|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        $this->form_validation->set_message('max_length', '%s maksimal 50 karakter');
    }

    private function _login()
    {
        $post = $this->input->post(null, TRUE);
        $username = htmlspecialchars($post['username']);
        $password = htmlspecialchars($post['password']);
        $user = $this->db->get_where('users', ['username' => $username])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'user_id' => $user['id_user'],
                    'username' => $user['username'],
                    'apps' => "prp2sumut",
                    'role_admin' => $user['role_admin'],
                    'id_level' => $user['level'],
                    'is_skpd' => $user['skpd'],
                    'timeout' => time() + 900
                ];
                $this->session->set_userdata($data);
                $string = simpan_log("login", "-");
                $this->db->insert('log_user', $string);
                redirect(site_url('dashboard'));
            } else {
                $this->session->set_flashdata('flash', 'error-KONFIRMASI-PASSWORD SALAH');
                redirect(site_url('login'));
            }
        } else {
            $this->session->set_flashdata('flash', 'error-KONFIRMASI-USERNAME TIDAK TERDAFTAR');
            redirect(site_url('login'));
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('apps');
        $this->session->unset_userdata('role_admin');
        $this->session->unset_userdata('timeout');
        $this->session->set_flashdata('flash', 'success-KONFIRMASI-ANDA SUDAH KELUAR DARI APLIKASI');
        redirect(site_url('login'));
    }

    public function blocked()
    {
        $this->load->view('blocked');
    }
}
