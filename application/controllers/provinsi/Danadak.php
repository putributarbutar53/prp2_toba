<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Danadak extends CI_Controller
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
                "submenu_active" => "dana-dak"
            ];
            $this->load->view('provinsi/danadak/view', $data);
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
            foreach ($result as $r) {
                $encrypt_id = encrypt_url($r['id_skpd']);
                $sub_bidang = $this->mquery->count_data('tbl_data_dak', ['id_satker' => $r['id_skpd'], 'tahun'=>$tahun]);
                $dipa = $this->mquery->sum_data('tbl_data_dak', 'total', ['id_satker' => $r['id_skpd'], 'tahun'=>$tahun]);
                $nama_skpd = "<a href=" . base_url("dana-dak/detail/" . $tahun . '/' . $encrypt_id) . "><h2>" . $r['nama_skpd'] . "</h2></a>";
                $no++;
                $row = [
                    'no' => $no,
                    'satker' => $nama_skpd,
                    'sub_bidang' => $sub_bidang,
                    'dipa' => format_rupiah($dipa['total'])
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
            "submenu_active" => "dana-dak",
            "skpd" => $skpd,
            "tahun" => $tahun
        ];
        $this->load->view('provinsi/danadak/view_detail', $data);
    }

    public function load_detail()
    {
        $id_skpd = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $result = $this->mquery->select_by('tbl_data_dak', ['id_satker' => $id_skpd, 'tahun'=>$tahun]);
        $data = [];
        $no = 0;
        $tahun_now=date('Y');
        foreach ($result as $r) {
            $no++;
            
            if($tahun_now==$tahun)
                {
                    if ($this->akses['ubah'] == 'Y') 
                        {$edit = action_edit(encrypt_url($r['id_dak']));}
                    else{$edit = "-";}

                    if ($this->akses['hapus'] == 'Y') 
                        {$delete = action_delete(encrypt_url($r['id_dak']));}
                    else{$delete = "-";}
                }
                else
                {
                    if ($this->akses['ubah_1'] == 'Y') 
                        {$edit = action_edit(encrypt_url($r['id_dak']));}
                    else{$edit = "-";}

                    if ($this->akses['hapus_1'] == 'Y') 
                        {$delete = action_delete(encrypt_url($r['id_dak']));}
                    else{$delete = "-";}
                }
            $row = [
                'no' => $no,
                'sub_bidang' => $r['subbidang'],
                'dipa' => format_rupiah($r['total']),
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
                "skpd" => $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]),
                "tahun" => $tahun
            ];
            $this->load->view('provinsi/danadak/form_add', $data);
        } elseif ($opsi == "edit") {
            $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
            $id_no = decrypt_url($encrypt_id);
            $dak = $this->mquery->select_id('tbl_data_dak', ['id_dak' => $id_no]);
            $data = [
                "dak" => $dak,
                "skpd" => $this->mquery->select_id('data_skpd', ['id_skpd' => $dak['id_satker']]),
            ];
            $this->load->view('provinsi/danadak/form_edit', $data);
        } else {
            $this->load->view('blocked');
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('skpd', 'Satuan kerja', 'required|trim');
        $this->form_validation->set_rules('sub_bidang', 'Sub bidang', 'required|trim');
        $this->form_validation->set_rules('dipa', 'Dipa', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error()
    {
        $errors = [
            'skpd' => form_error('skpd'),
            'sub_bidang' => form_error('sub_bidang'),
            'dipa' => form_error('dipa')
        ];
        $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function add()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error();
        } else {
            $post = $this->input->post(null, TRUE);
            $array =  [
                'id_satker' => htmlspecialchars($post['id_skpd']),
                'subbidang' => htmlspecialchars($post['sub_bidang']),
                'total' => input_rupiah($post['dipa']),
                'keterangan' => htmlspecialchars($post['keterangan']),
                'tahun' => htmlspecialchars($post['tahun'])
            ];
            $string = ['tbl_data_dak' => $array];
            $log = simpan_log("insert dana dak", json_encode($string));
            $res = $this->mquery->insert_data('tbl_data_dak', $array, $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    function edit()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error();
        } else {
            $post = $this->input->post(null, TRUE);
            $id_dak = htmlspecialchars($post['id_dak']);
            $array =  [
                'subbidang' => htmlspecialchars($post['sub_bidang']),
                'total' => input_rupiah($post['dipa']),
                'keterangan' => htmlspecialchars($post['keterangan'])
            ];
            $temp = $this->mquery->select_id('tbl_data_dak', ['id_dak' => $id_dak]);
            $string = ['tbl_data_dak' => ['old' => $temp, 'new' => $array]];
            $log = simpan_log("update data dak", json_encode($string));
            $res = $this->mquery->update_data('tbl_data_dak', $array, ['id_dak' => $id_dak], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function delete()
    {
        $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
        $id_dak = decrypt_url($encrypt_id);
        $temp = $this->mquery->select_id('tbl_data_dak', ['id_dak' => $id_dak]);
        $string = ['tbl_data_dak' => $temp];
        $log = simpan_log("delete dana dak", json_encode($string));
        $res = $this->mquery->delete_data('tbl_data_dak', ['id_dak' => $id_dak], $log);
        $data = ['status' => TRUE, 'notif' => $res];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
