<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skpd extends CI_Controller
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
                "menu_active" => "master_data",
                "submenu_active" => "data-skpd"
            ];
            $this->load->view('master/skpd/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function load()
    {
        if ($this->akses['akses'] == 'Y') {
            $result = $this->mquery->select_data("data_skpd", "id_skpd ASC");
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $no++;
                if ($this->akses['ubah'] == 'Y') 
                    {$edit = action_edit($r['id_skpd']);}
                else{$edit = "-";}

                if ($this->akses['hapus'] == 'Y') 
                    {$delete = action_delete($r['id_skpd']);}
                else{$delete = "-";}

                $row = [
                    'no' => $no,
                    'nama_skpd' => $r['nama_skpd'],
                    'kd_urusan' => $r['kd_urusan'],
                    'kd_bidang' => $r['kd_bidang'],
                    'kd_unit' => $r['kd_unit'],
                    'kd_sub' => $r['kd_sub'],
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


    public function form()
    {
        if ($this->akses['tambah'] == 'Y' or $this->akses['ubah'] == 'Y') {
            $opsi = htmlspecialchars($this->input->post('opsi', TRUE));
            if ($opsi == "add") {
                $this->load->view('master/skpd/form_add');
            } elseif ($opsi == "edit") {
                $id = htmlspecialchars($this->input->post('id', TRUE));
                $data = [
                    'data_skpd' => $this->mquery->select_id('data_skpd', ['id_skpd' => $id])
                ];
                $this->load->view('master/skpd/form_edit', $data);
            } else {
                $this->load->view('blocked');
            }
        } else {
            redirect(site_url('blocked'));
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('nama_skpd', 'Nama SKPD', 'required|trim');
        $this->form_validation->set_rules('kd_urusan', 'Kode Urusan', 'required|trim');
        $this->form_validation->set_rules('kd_bidang', 'Kode Bidang', 'required|trim');
        $this->form_validation->set_rules('kd_unit', 'Kode Unit', 'required|trim');
        $this->form_validation->set_rules('kd_sub', 'Kode Sub', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error()
    {
        $errors = [
            'nama_skpd' => form_error('nama_skpd'),
            'kd_urusan' => form_error('kd_urusan'),
            'kd_bidang' => form_error('kd_bidang'),
            'kd_unit' => form_error('kd_unit'),
            'kd_sub' => form_error('kd_sub')
        ];
        $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
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
                    'nama_skpd' => htmlspecialchars($post['nama_skpd']),
                    'kd_urusan' => htmlspecialchars($post['kd_urusan']),
                    'kd_bidang' => htmlspecialchars($post['kd_bidang']),
                    'kd_unit' => htmlspecialchars($post['kd_unit']),
                    'kd_sub' => htmlspecialchars($post['kd_sub'])
                ];
                $string = ['data_skpd' => $array];
                $log = simpan_log("insert jenis data_skpd", json_encode($string));
                $res = $this->mquery->insert_data('data_skpd', $array, $log);
                $data = ['status' => TRUE, 'notif' => $res];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
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
                $this->_send_error();
            } else {
                $post = $this->input->post(null, TRUE);
                $id = htmlspecialchars($post['id_skpd']);
                $array =  [
                    'nama_skpd' => htmlspecialchars($post['nama_skpd']),
                    'kd_urusan' => htmlspecialchars($post['kd_urusan']),
                    'kd_bidang' => htmlspecialchars($post['kd_bidang']),
                    'kd_unit' => htmlspecialchars($post['kd_unit']),
                    'kd_sub' => htmlspecialchars($post['kd_sub'])
                ];
                $temp = $this->mquery->select_id('data_skpd', ['id_skpd' => $id]);
                $string = ['data_skpd' => ['old' => $temp, 'new' => $array]];
                $log = simpan_log("update data_skpd", json_encode($string));
                $res = $this->mquery->update_data('data_skpd', $array, ['id_skpd' => $id], $log);
                $data = ['status' => TRUE, 'notif' => $res];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        } else {
            $data = ['status' => FALSE, 'pesan' => 'blocked'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function delete()
    {
        if ($this->akses['hapus'] == 'Y') {
            $id = htmlspecialchars($this->input->post('id', TRUE));
            $temp = $this->mquery->select_id('data_skpd', ['id_skpd' => $id]);
            $string = ['data_skpd' => $temp];
            $log = simpan_log("delete data_skpd", json_encode($string));
            $res = $this->mquery->delete_data('data_skpd', ['id_skpd' => $id], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            redirect(site_url('blocked'));
        }
    }

}
