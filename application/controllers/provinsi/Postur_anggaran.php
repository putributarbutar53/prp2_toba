<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Postur_anggaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->model('M_fungsi', 'fungsi');
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }

    public function index()
    {
        if ($this->akses['akses'] == 'Y') {
            $data = [
                "menu_active" => "postur_apbd",
                "submenu_active" => "postur-anggaran"
            ];
            $this->load->view('provinsi/postur_anggaran/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function load()
    {
        if ($this->akses['akses'] == 'Y') {
            $tahun = $this->input->post('tahun');
            $rst_kabupaten = $this->mquery->select_id("ta_kabupaten", ['id_kabupaten' => 34]);
            $result = $this->mquery->select_by("setting_anggaran", ['tahun' => $tahun]);
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $no++;
                if ($this->akses['ubah'] == 'Y') 
                    {$edit = action_edit($r['id_setting']);}
                else{$edit = "-";}

                if ($this->akses['hapus'] == 'Y') 
                    {$delete = action_delete($r['id_setting']);}
                else{$delete = "-";}
                $row = [
                    'no' => $no,
                    'nama_kabupaten' => "<h2>".$rst_kabupaten['nama_kabupaten']."</h2>",
                    'tahun' => $r['tahun'],
                    'pendapatan' => "APBD : Rp. ".format_rupiah($r['pendapatan'])."<br>P APBD : Rp. ".format_rupiah($r['pendapatan_p']),
                    'belanja' => "APBD : Rp. ".format_rupiah($r['belanja'])."<br>P APBD : Rp. ".format_rupiah($r['belanja_p']),
                    'papbd' => $r['papbd'],
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
        $opsi = htmlspecialchars($this->input->post('opsi', TRUE));
	$tahun = htmlspecialchars($this->input->post('tahun', TRUE));
        if ($opsi == "add") {
            $data = [
                "id_kabupaten" => 123,
		"tahun" => $tahun
            ];
            $this->load->view('provinsi/postur_anggaran/form_add', $data);
        } elseif ($opsi == "edit") {
            $id_no = htmlspecialchars($this->input->post('id', TRUE));
            $data = [
                "setting_anggaran" => $this->mquery->select_id('setting_anggaran', ['id_setting' => $id_no])
            ];
            $this->load->view('provinsi/postur_anggaran/form_edit', $data);
        } else {
            $this->load->view('blocked');
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
        $this->form_validation->set_rules('pendapatan', 'Pendapatan', 'required|trim');
        $this->form_validation->set_rules('belanja', 'Belanja', 'required|trim');
        $this->form_validation->set_rules('papbd', 'Tanggal P APBD', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error()
    {
        $errors = [
            'tahun' => form_error('tahun'),
            'pendapatan' => form_error('pendapatan'),
            'belanja' => form_error('belanja'),
            'papbd' => form_error('papbd')
        ];
        $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function add()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error('default');
        } else {
            $post = $this->input->post(null, TRUE);
            $array =  [
                'tahun' => htmlspecialchars($post['tahun']),
                'pendapatan' => htmlspecialchars($post['pendapatan']),
                'belanja' => htmlspecialchars($post['belanja']),
                'pendapatan_p' => htmlspecialchars($post['pendapatan_p']),
                'belanja_p' => htmlspecialchars($post['belanja_p']),
                'papbd' => htmlspecialchars($post['papbd'])
            ];
            $string = ['setting_anggaran' => $array];
            $log = simpan_log("new setting_anggaran", json_encode($string));
            $res = $this->mquery->insert_data('setting_anggaran', $array, $log);
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
            $id_no = htmlspecialchars($post['id_no']);
            $array =  [
                'tahun' => htmlspecialchars($post['tahun']),
                'pendapatan' => htmlspecialchars($post['pendapatan']),
                'belanja' => htmlspecialchars($post['belanja']),
                'pendapatan_p' => htmlspecialchars($post['pendapatan_p']),
                'belanja_p' => htmlspecialchars($post['belanja_p']),
                'papbd' => htmlspecialchars($post['papbd'])
            ];
            $temp = $this->mquery->select_id('setting_anggaran', ['id_setting' => $id_no]);
            $string = ['setting_anggaran' => ['old' => $temp, 'new' => $array]];
            $log = simpan_log("update setting_anggaran", json_encode($string));
            $res = $this->mquery->update_data('setting_anggaran', $array, ['id_setting' => $id_no], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function delete()
    {
        $id_no = htmlspecialchars($this->input->post('id', TRUE));
        $temp = $this->mquery->select_id('setting_anggaran', ['id_setting' => $id_no]);
        $string = ['setting_anggaran' => $temp];
        $log = simpan_log("delete setting_anggaran", json_encode($string));
        $res = $this->mquery->delete_data('setting_anggaran', ['id_setting' => $id_no], $log);
        $data = ['status' => TRUE, 'notif' => $res];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
