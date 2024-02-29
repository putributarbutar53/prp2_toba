<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_pelaksanaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }

    public function index()
    {
        if ($this->akses['akses'] == 'Y') {
            $data = [
                "menu_active" => "master_data",
                "submenu_active" => "jenis-pelaksanaan"
            ];
            $this->load->view('master/jenis_pelaksanaan/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function load()
    {
        if ($this->akses['akses'] == 'Y') {
            $result = $this->mquery->select_data("jenis_pelaksanaan");
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $no++;
                if ($this->akses['ubah'] == 'Y') 
                    {$edit = action_edit($r['id_jenis_pelaksanaan']);}
                else{$edit = "-";}

                if ($this->akses['hapus'] == 'Y') 
                    {$delete = action_delete($r['id_jenis_pelaksanaan']);}
                else{$delete = "-";}
                $row = [
                    'no' => $no,
                    'jenis_pelaksanaan' => $r['nama_jenis_pelaksanaan'],
                    'aksi' => $edit . ' ' . $delete
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

    public function form()
    {
        if ($this->akses['tambah'] == 'Y' or $this->akses['ubah'] == 'Y') {
            $opsi = htmlspecialchars($this->input->post('opsi', TRUE));
            if ($opsi == "add") {
                $this->load->view('master/jenis_pelaksanaan/form_add');
            } elseif ($opsi == "edit") {
                $id = htmlspecialchars($this->input->post('id', TRUE));
                $data = [
                    'jenis' => $this->mquery->select_id('jenis_pelaksanaan', ['id_jenis_pelaksanaan' => $id])
                ];
                $this->load->view('master/jenis_pelaksanaan/form_edit', $data);
            } else {
                $this->load->view('blocked');
            }
        } else {
            redirect(site_url('blocked'));
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('jenis_pelaksanaan', 'Metode pelaksanaan', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error()
    {
        $errors = [
            'jenis_pelaksanaan' => form_error('jenis_pelaksanaan')
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
                    'nama_jenis_pelaksanaan' => htmlspecialchars($post['jenis_pelaksanaan']),
                ];
                $string = ['jenis_pelaksanaan' => $array];
                $log = simpan_log("insert jenis pelaksanaan", json_encode($string));
                $res = $this->mquery->insert_data('jenis_pelaksanaan', $array, $log);
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
                $id = htmlspecialchars($post['id_jenis_pelaksanaan']);
                $array =  [
                    'nama_jenis_pelaksanaan' => htmlspecialchars($post['jenis_pelaksanaan']),
                ];
                $temp = $this->mquery->select_id('jenis_pelaksanaan', ['id_jenis_pelaksanaan' => $id]);
                $string = ['jenis_pelaksanaan' => ['old' => $temp, 'new' => $array]];
                $log = simpan_log("update jenis pelaksanaan", json_encode($string));
                $res = $this->mquery->update_data('jenis_pelaksanaan', $array, ['id_jenis_pelaksanaan' => $id], $log);
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
            $temp = $this->mquery->select_id('jenis_pelaksanaan', ['id_jenis_pelaksanaan' => $id]);
            $string = ['jenis_pelaksanaan' => $temp];
            $log = simpan_log("delete jenis pelaksanaan", json_encode($string));
            $res = $this->mquery->delete_data('jenis_pelaksanaan', ['id_jenis_pelaksanaan' => $id], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            redirect(site_url('blocked'));
        }
    }
}
