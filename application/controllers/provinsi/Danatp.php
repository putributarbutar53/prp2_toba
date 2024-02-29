<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Danatp extends CI_Controller
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
                "menu_active" => "data_apbn",
                "submenu_active" => "dana-tp"
            ];
            $this->load->view('provinsi/danatp/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function load()
    {
        if ($this->akses['akses'] == 'Y') {
            $tahun = $this->input->post('tahun');
            if ($this->user['is_skpd'] == 'Y') {
                $user = $this->mquery->select_id('users', ['id_user' => $this->user['user']]);
                $result = $this->mquery->select_by("data_skpd", ['id_skpd'=>$user['id_skpd']]);
            } else {
                $result = $this->mquery->select_data("data_skpd", "id_skpd ASC");
            }
            $data = [];
            $no = 0;
            $jenis='TP';
            foreach ($result as $r) {
                $encrypt_id = encrypt_url($r['id_skpd']);
                $jumlah_kegiatan = $this->mquery->count_data('tbl_dana_dekon', ['id_skpd' => $r['id_skpd'], 'tahun'=>$tahun, 'jenis'=>$jenis]);
                $pagu = $this->mquery->sum_data('tbl_dana_dekon', 'pagu', ['id_skpd' => $r['id_skpd'], 'tahun'=>$tahun, 'jenis'=>$jenis]);
                $nama_skpd = "<a href=" . base_url("dana-tp/detail/" . $tahun . '/' . $encrypt_id) . "><h2>" . $r['nama_skpd'] . "</h2></a>";
                $no++;
                    $row = [
                        'no' => $no,
                        'nama_skpd' => $nama_skpd,
                        'jumlah' => $jumlah_kegiatan,
                        'pagu' => format_rupiah($pagu['pagu'])
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

    public function detail($tahun, $encrypt_id)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $data = [
            "menu_active" => "data_apbn",
            "submenu_active" => "dana-tp",
            "skpd" => $skpd,
            "tahun" => $tahun
        ];
        $this->load->view('provinsi/danatp/view_detail', $data);
    }

    public function load_anggaran()
    {
        $id_skpd = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $jenis='TP';
        $tahun_now=date('Y');
        $result = $this->mquery->select_by('tbl_dana_dekon', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'jenis'=>$jenis], "id_skpd ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            if($tahun_now==$tahun)
                {
                    if ($this->akses['ubah'] == 'Y') 
                        {$edit = action_edit(encrypt_url($r['id_dana']));}
                    else{$edit = "-";}

                    if ($this->akses['hapus'] == 'Y') 
                        {$delete = action_delete(encrypt_url($r['id_dana']));}
                    else{$delete = "-";}
                }
                else
                {
                    if ($this->akses['ubah_1'] == 'Y') 
                        {$edit = action_edit(encrypt_url($r['id_dana']));}
                    else{$edit = "-";}

                    if ($this->akses['hapus_1'] == 'Y') 
                        {$delete = action_delete(encrypt_url($r['id_dana']));}
                    else{$delete = "-";}
                }
            $row = [
                'no' => $no,
                'kd_satker' => $r['kd_satker'],
                'pagu' => format_rupiah($r['pagu']),
                'keterangan' => $r['keterangan'],
                'opsi' => $edit . ' ' . $delete
            ];
            $data[] = $row;
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function form()
    {
        $opsi = htmlspecialchars($this->input->post('opsi', TRUE));
        $id_skpd = htmlspecialchars($this->input->post('id_skpd', TRUE));
        $tahun = htmlspecialchars($this->input->post('tahun', TRUE));
        if ($opsi == "add") {
            $data = [
                "id_skpd" => $id_skpd,
                "tahun" => $tahun
            ];
            $this->load->view('provinsi/danatp/form_add', $data);
        } elseif ($opsi == "edit") {
            $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
            $id_no = decrypt_url($encrypt_id);
            $data = [
                "tbl_dana_dekon" => $this->mquery->select_id('tbl_dana_dekon', ['id_dana' => $id_no])
            ];
            $this->load->view('provinsi/danatp/form_edit', $data);
        } else {
            $this->load->view('blocked');
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('kd_satker', 'KD Satker', 'required|trim');
        $this->form_validation->set_rules('pagu', 'Pagu', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error()
    {
        $errors = [
            'kd_satker' => form_error('kd_satker'),
            'pagu' => form_error('pagu')
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
                'id_skpd' => htmlspecialchars($post['id_skpd']),
                'tahun' => htmlspecialchars($post['tahun']),
                'kd_satker' => htmlspecialchars($post['kd_satker']),
                'pagu' => htmlspecialchars($post['pagu']),
                'keterangan' => htmlspecialchars($post['keterangan']),
                'jenis' => 'TP'
            ];
            $string = ['tbl_dana_dekon' => $array];
            $log = simpan_log("new tbl_dana_dekon", json_encode($string));
            $res = $this->mquery->insert_data('tbl_dana_dekon', $array, $log);
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
                'kd_satker' => htmlspecialchars($post['kd_satker']),
                'keterangan' => htmlspecialchars($post['keterangan']),
                'pagu' => htmlspecialchars($post['pagu'])
            ];
            $temp = $this->mquery->select_id('tbl_dana_dekon', ['id_dana' => $id_no]);
            $string = ['tbl_dana_dekon' => ['old' => $temp, 'new' => $array]];
            $log = simpan_log("update tbl_dana_dekon", json_encode($string));
            $res = $this->mquery->update_data('tbl_dana_dekon', $array, ['id_dana' => $id_no], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function delete()
    {
        $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
        $id_no = decrypt_url($encrypt_id);
        $temp = $this->mquery->select_id('tbl_dana_dekon', ['id_dana' => $id_no]);
        $string = ['tbl_dana_dekon' => $temp];
        $log = simpan_log("delete tbl_dana_dekon", json_encode($string));
        $res = $this->mquery->delete_data('tbl_dana_dekon', ['id_dana' => $id_no], $log);
        $data = ['status' => TRUE, 'notif' => $res];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
