<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mandatory_kabupaten extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->model('M_fungsi', 'fungsi');
        $this->akses = is_logged_in();
    }

    public function index()
    {
        $data = [
            "menu_active" => "master_data",
            "submenu_active" => "data-mandatory-kabupaten"
        ];
        $this->load->view('master/mandatory/view', $data);
    }

    
    public function load()
    {
        $tahun=2021;
        if ($this->akses['role'] == "master" or $this->akses['role'] == "admin" or $this->akses['role'] == "kabupaten") {
            $result = $this->mquery->select_by("ta_kabupaten", ['kode' => 0], "id_kabupaten ASC");
            $data = [];
            $no = 0;
            $st_apbd=1;
            foreach ($result as $r) {
                $encrypt_id = encrypt_url($r['id_kabupaten']);
                $row_mandatory = $this->mquery->select_id('tbl_mandatory', ['tahun' => $tahun, 'st_apbd' => $st_apbd]);
                $nama_kabupaten = "<a href=" . base_url("mandatory-kabupaten-detail/" . $encrypt_id) . ">" . $r['nama_kabupaten'] . "</a>";
                $no++;
                $row = [
                    'no' => $no,
                    'nama_kabupaten' => $nama_kabupaten,
                    'pendidikan' => $row_mandatory['persen_pendidikan'],
                    'kesehatan' => $row_mandatory['persen_kesehatan'],
                    'infrastruktur' => $row_mandatory['persen_infrestruktur']
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

    public function detail($encrypt_id)
    {
        $id_kabupaten = decrypt_url($encrypt_id);
        $row_kabupaten = $this->mquery->select_id('ta_kabupaten', ['id_kabupaten' => $id_kabupaten]);
        $data = [
            "menu_active" => "master_data",
            "submenu_active" => "data-mandatory-kabupaten",
            "row_kabupaten" => $row_kabupaten
        ];
        $this->load->view('master/mandatory/view_detail', $data);
    }

    public function load_anggaran()
    {
         $id_kabupaten = $this->input->post('id');
        //$id_kabupaten = 1;
        $result = $this->mquery->select_by('tbl_mandatory', ['id_kabupaten' => $id_kabupaten], "tahun ASC");
        $data = [];
        $no = 0;
        $total=0;
        foreach ($result as $r) {
            $no++;
            if($r['st_apbd']==1){$keterangan="APBD";}else{$keterangan="P APBD";}
            $edit = action_edit(encrypt_url($r['id_mandatory']));
            $delete = action_delete(encrypt_url($r['id_mandatory']));
            $row = [
                'no' => $no,
                'tahun' => $r['tahun'],
                'pendidikan' => $r['persen_pendidikan'],
                'kesehatan' => $r['persen_kesehatan'],
                'infrastruktur' => $r['persen_infrestruktur'],
                'keterangan' => $keterangan,
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
        $id_kabupaten = htmlspecialchars($this->input->post('id_kabupaten', TRUE));
        if ($opsi == "add") {
            $data = [
                "id_kabupaten" => $id_kabupaten
            ];
            $this->load->view('master/mandatory/form_add', $data);
        } elseif ($opsi == "edit") {
            $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
            $id_no = decrypt_url($encrypt_id);
            $data = [
                "tbl_mandatory" => $this->mquery->select_id('tbl_mandatory', ['id_mandatory' => $id_no])
            ];
            $this->load->view('master/mandatory/form_edit', $data);
        } else {
            $this->load->view('blocked');
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');
        $this->form_validation->set_rules('kesehatan', 'Kesehatan', 'required|trim');
        $this->form_validation->set_rules('infrastruktur', 'Infrastruktur', 'required|trim');
        $this->form_validation->set_rules('st_apbd', 'Status Anggaran', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error($params)
    {
            $errors = [
                'tahun' => form_error('tahun'),
                'pendidikan' => form_error('pendidikan'),
                'kesehatan' => form_error('kesehatan'),
                'infrastruktur' => form_error('infrastruktur'),
                'st_apbd' => form_error('st_apbd')
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
                'id_kabupaten' => htmlspecialchars($post['id_kabupaten']),
                'tahun' => htmlspecialchars($post['tahun']),
                'persen_pendidikan' => htmlspecialchars($post['pendidikan']),
                'persen_kesehatan' => htmlspecialchars($post['kesehatan']),
                'persen_infrestruktur' => htmlspecialchars($post['infrastruktur']),
                'st_apbd' => htmlspecialchars($post['st_apbd'])
            ];
            $string = ['tbl_mandatory' => $array];
            $log = simpan_log("new tbl_mandatory", json_encode($string));
            $res = $this->mquery->insert_data('tbl_mandatory', $array, $log);
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
                'persen_pendidikan' => htmlspecialchars($post['pendidikan']),
                'persen_kesehatan' => htmlspecialchars($post['kesehatan']),
                'persen_infrestruktur' => htmlspecialchars($post['infrastruktur']),
                'st_apbd' => htmlspecialchars($post['st_apbd'])
            ];
            $temp = $this->mquery->select_id('tbl_mandatory', ['id_mandatory' => $id_no]);
            $string = ['tbl_mandatory' => ['old' => $temp, 'new' => $array]];
            $log = simpan_log("update tbl_mandatory", json_encode($string));
            $res = $this->mquery->update_data('tbl_mandatory', $array, ['id_mandatory' => $id_no], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function delete()
    {
        $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
        $id_no = decrypt_url($encrypt_id);
        $temp = $this->mquery->select_id('tbl_mandatory', ['id_mandatory' => $id_no]);
        $string = ['tbl_mandatory' => $temp];
        $log = simpan_log("delete tbl_mandatory", json_encode($string));
        $res = $this->mquery->delete_data('tbl_mandatory', ['id_mandatory' => $id_no], $log);
        $data = ['status' => TRUE, 'notif' => $res];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }


}
