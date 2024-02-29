<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'users');
        $this->load->model('Grafik_model', 'grafik');
        $this->load->model('M_fungsi', 'fungsi');
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }
    
    public function index()
    {
        if ($this->akses['akses'] == 'Y') {
            $data = [
            "menu_active" => "dashboard",
            "submenu_active" => null,
            "users" => $this->users->get_users($this->user['user'])
            ];
            $this->load->view('dashboard/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

}
