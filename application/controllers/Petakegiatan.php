<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petakegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'users');
        $this->akses = is_logged_in();
    }

    public function index()
    {

        $data = [
            "menu_active" => "dashboard",
            "submenu_active" => null,
            "users" => $this->users->get_users($this->akses['user'])
        ];
        $this->load->view('petakegiatan/view', $data);
    }

}
