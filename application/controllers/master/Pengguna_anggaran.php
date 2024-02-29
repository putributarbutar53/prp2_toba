<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_anggaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model', 'master');
        $this->akses = is_logged_in();
    }

    public function index()
    {
        $data = [
            "menu_active" => "master_data",
            "submenu_active" => "pengguna-anggaran"
        ];
        $this->load->view('master/pengguna_anggaran/view', $data);
    }

    public function load()
    {

        if ($this->akses['role'] == 'skpd') {
            $user = $this->mquery->select_id('users', ['id_user' => $this->akses['user']]);
            $result = $this->master->get_pa($user['id_skpd']);
        } else {
            $result = $this->master->get_pa();
        }
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $new = "<button id='tombol-new' data-id='" . $r['id_skpd'] . "' data-toggle='modal' data-target='#modal-form-action' class='btn btn-warning btn-sm' title='NEW'><i class='fa fa-user'></i> NEW PA</button>";
            $edit = "<button id='tombol-ubah' data-id='" . $r['id_pa'] . "' data-toggle='modal' data-target='#modal-form-action' class='btn btn-success btn-sm' title='UBAH'><i class='fa fa-edit'></i> UBAH</button>";
            $row = [
                'no' => $no,
                'nama_skpd' => $r['nama_skpd'],
                'nip_pa' => $r['nip_pa'],
                'nama_pa' => $r['nama_pa'],
                'aksi' => $new . ' ' . $edit
            ];
            $data[] = $row;
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function form()
    {
        $opsi = htmlspecialchars($this->input->post('opsi', TRUE));
        if ($opsi == "add") {
            if ($this->akses['role'] == 'skpd') {
                $user = $this->mquery->select_id('users', ['id_user' => $this->akses['user']]);
                $result_skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $user['id_skpd']]);
            } else {
                $result_skpd = $this->mquery->select_data('data_skpd', 'nama_skpd ASC');
            }
            $data = [
                "result_skpd" => $result_skpd,
                "akses" => $this->akses['role']
            ];
            $this->load->view('master/pengguna_anggaran/form_add', $data);
        } elseif ($opsi == "new") {
            $id_skpd = htmlspecialchars($this->input->post('skpd', TRUE));
            $data = [
                "skpd" => $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd])
            ];
            $this->load->view('master/pengguna_anggaran/form_new', $data);
        } elseif ($opsi == "edit") {
            $id = htmlspecialchars($this->input->post('id', TRUE));
            $data = [
                'pengguna' => $this->master->get_pa_id($id)
            ];
            $this->load->view('master/pengguna_anggaran/form_edit', $data);
        } else {
            $this->load->view('blocked');
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('nama_skpd', 'Nama SKPD', 'required|trim');
        $this->form_validation->set_rules('nip_pa', 'NIP PA', 'required|trim');
        $this->form_validation->set_rules('nama_pa', 'Nama PA', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error($params)
    {
        if ($params == 'skpd') {
            $errors = [
                'nama_skpd' => "<p>Data Pengguna Anggaran Sudah Ada Di Skpd Ini</p>",
                'nip_pa' => form_error('nip_pa'),
                'nama_pa' => form_error('nama_pa')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Pengguna Anggaran Sudah Ada'];
        } else {
            $errors = [
                'nama_skpd' => form_error('nama_skpd'),
                'nip_pa' => form_error('nip_pa'),
                'nama_pa' => form_error('nama_pa')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function add()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error('default');
        } else {
            $post = $this->input->post(null, TRUE);
            $id_skpd = htmlspecialchars($post['nama_skpd']);
            $cek_pa = $this->mquery->count_data('pengguna_anggaran', ['id_skpd' => $id_skpd]);
            if ($cek_pa > 0) {
                $this->_send_error('skpd');
            } else {
                $array =  [
                    'nip_pa' => htmlspecialchars($post['nip_pa']),
                    'nama_pa' => htmlspecialchars($post['nama_pa']),
                    'id_skpd' => $id_skpd,
                    'is_active' => 'Y',
                    'tgl_input' => date('Y-m-d H:i:s')
                ];
                $string = ['pengguna_anggaran' => $array];
                $log = simpan_log("new pangguna anggaran", json_encode($string));
                $res = $this->mquery->insert_data('pengguna_anggaran', $array, $log);
                $data = ['status' => TRUE, 'notif' => $res];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        }
    }

    function new_pa()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error('default');
        } else {
            $post = $this->input->post(null, TRUE);
            $id_skpd = htmlspecialchars($post['id_skpd']);
            $array =  [
                'nip_pa' => htmlspecialchars($post['nip_pa']),
                'nama_pa' => htmlspecialchars($post['nama_pa']),
                'id_skpd' => $id_skpd,
                'is_active' => 'Y',
                'tgl_input' => date('Y-m-d H:i:s')
            ];
            $cek_pa = $this->mquery->count_data('pengguna_anggaran', ['id_skpd' => $id_skpd]);
            if ($cek_pa > 0) {
                $temp = $this->mquery->select_id('pengguna_anggaran', ['id_skpd' => $id_skpd, 'is_active' => 'Y']);
                $array_old = [
                    'is_active' => 'N'
                ];
                $string = ['pengguna_anggaran' => ['old' => $temp, 'new' => $array]];
                $log = simpan_log("new pangguna anggaran", json_encode($string));
                $res = $this->master->insert_new_pa($array, $array_old, $temp['id_pa'], $log);
            } else {
                $string = ['pengguna_anggaran' => $array];
                $log = simpan_log("new pangguna anggaran", json_encode($string));
                $res = $this->mquery->insert_data('pengguna_anggaran', $array, $log);
            }
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    function edit()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error('default');
        } else {
            $post = $this->input->post(null, TRUE);
            $id_pa = htmlspecialchars($post['id_pa']);
            $array =  [
                'nip_pa' => htmlspecialchars($post['nip_pa']),
                'nama_pa' => htmlspecialchars($post['nama_pa'])
            ];
            $temp = $this->mquery->select_id('pengguna_anggaran', ['id_pa' => $id_pa]);
            $string = ['pengguna_anggaran' => ['old' => $temp, 'new' => $array]];
            $log = simpan_log("update pengguna anggaran", json_encode($string));
            $res = $this->mquery->update_data('pengguna_anggaran', $array, ['id_pa' => $id_pa], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }
}
