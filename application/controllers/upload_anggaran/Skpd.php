<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skpd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }

    public function index()
    {
        if ($this->akses['akses'] == 'Y') {
            $data = [
                "menu_active" => "upload_data",
                "submenu_active" => "upload-anggaran-opd"
            ];
            $this->load->view('upload_anggaran/skpd/view', $data);
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

                $result_realisasi = 0;
                $where = array('tahun' => $tahun, 'id_skpd' => $r['id_skpd']);
                $result_count = $this->mquery->count_data("data_uraian_kegiatan_skpd", $where);
                $row_anggaran_pendapatan = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $r['id_skpd'], 'kode_rekening' => 4]);
                $row_anggaran_belanja = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $r['id_skpd'], 'kode_rekening' => 5]);
                $row_anggaran_pendapatan_pemko = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $tahun, 'kode_rekening' => 4]);
                
                $this->db->select_sum('anggaran');
                $this->db->where(['level' => 1, 'jenis' => 1]);
                $row_anggaran_belanja_pemko = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

                if($row_anggaran_pendapatan_pemko['anggaran']==0){$persen_pendapatan=0;}
                else
                {
                    $temp_pendapatan=$row_anggaran_pendapatan['anggaran']/$row_anggaran_pendapatan_pemko['anggaran']*100;
                    $persen_pendapatan=round($temp_pendapatan,3);
                }
                if($row_anggaran_belanja_pemko['anggaran']==0){$persen_belanja=0;}
                else
                {
                    $temp_belanja=$row_anggaran_belanja['anggaran']/$row_anggaran_belanja_pemko['anggaran']*100;
                    $persen_belanja=round($temp_belanja,2);
                }

                $nama_skpd = "<a href=" . base_url("upload-anggaran-opd/detail/" . $tahun . '/' . $encrypt_id) . "><h2>" . $r['nama_skpd'] . "</h2></a>";
                $no++;
                $row = [
                    'no' => $no,
                    'nama_skpd' => $nama_skpd,
                    'pendapatan' => format_rupiah($row_anggaran_pendapatan['anggaran']),
                    'belanja' => format_rupiah($row_anggaran_belanja['anggaran']),
                    'jumlah' => $result_count
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
            "menu_active" => "upload_data",
            "submenu_active" => "upload-anggaran-opd",
            "skpd" => $skpd,
            "tahun" => $tahun
        ];
        $this->load->view('upload_anggaran/skpd/view_detail', $data);
    }

    public function load_anggaran()
    {
        $skpd = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $result = $this->mquery->select_by('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $skpd], "kode_rekening ASC");
        $data = [];
        $no = 0;
        $tahun_now=date('Y');
        foreach ($result as $r) {
            $no++;
            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => $r['kode_rekening']]);
            $nilai_anggaran=$row_uraian['anggaran'];
            $st_anggaran=$r['st_anggaran'];
            if($st_anggaran==1){$ket_st="APBD";}else{$ket_st="PAPBD";}
            if($tahun_now==$tahun)
            {
                if ($this->akses['ubah'] == 'Y') 
                    {$edit = action_edit(encrypt_url($r['id_uraian']));}
                else{$edit = "-";}

                if ($this->akses['hapus'] == 'Y') 
                    {$delete = action_delete(encrypt_url($r['id_uraian']));}
                else{$delete = "-";}
            }
            else
            {
                if ($this->akses['ubah_1'] == 'Y') 
                    {$edit = action_edit(encrypt_url($r['id_uraian']));}
                else{$edit = "-";}

                if ($this->akses['hapus_1'] == 'Y') 
                    {$delete = action_delete(encrypt_url($r['id_uraian']));}
                else{$delete = "-";}
            }
            $row = [
                'no' => $no,
                'tahun' => bulan($r['tahun']),
                'kode_rekening' => $r['kode_rekening'],
                'uraian' => $row_uraian['uraian'],
                'anggaran' => format_rupiah($r['anggaran']),
                'st_anggaran' => $ket_st,
                'opsi' => $edit . ' ' . $delete
            ];
            $data[] = $row;
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function form_upload()
    {
        $id_skpd = htmlspecialchars($this->input->post('skpd', TRUE));
        $data = [
            'id_skpd' => $id_skpd
        ];
        $this->load->view('upload_anggaran/skpd/form_upload', $data);
    }

    
    function upload()
    {
        $post = $this->input->post(null, TRUE);
        $id_skpd = htmlspecialchars($post['id_skpd']);
        $this->db->delete('data_uraian_kegiatan_skpd', ['id_skpd'=>$id_skpd, 'tahun' => $post['tahun'], 'st_anggaran' => $post['status']]);
        $data = ['status' => TRUE, 'notif' => 1];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function form()
    {
        $opsi = htmlspecialchars($this->input->post('opsi', TRUE));
        $id_skpd = htmlspecialchars($this->input->post('id_skpd', TRUE));
        $tahun = htmlspecialchars($this->input->post('tahun', TRUE));
        if ($opsi == "add") {
            $data = [
                "skpd" => $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]),
                "uraian" => $this->mquery->select_data('data_kode_rekening'),
                "tahun" => $tahun
            ];
            $this->load->view('upload_anggaran/skpd/form_add', $data);
        } elseif ($opsi == "edit") {
            $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
            $id_no = decrypt_url($encrypt_id);
            $data_uraian = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_uraian' => $id_no]);
            $data = [
                "data_uraian" => $data_uraian,
                "skpd" => $this->mquery->select_id('data_skpd', ['id_skpd' => $data_uraian['id_skpd']]),
                "uraian" => $this->mquery->select_data('data_kode_rekening')
            ];
            $this->load->view('upload_anggaran/skpd/form_edit', $data);
        } else {
            $this->load->view('blocked');
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('id_skpd', 'Satuan kerja', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
        $this->form_validation->set_rules('id_uraian', 'Uraian', 'required|trim');
        $this->form_validation->set_rules('anggaran', 'Anggaran', 'required|trim');
        $this->form_validation->set_rules('st_anggaran', 'Status Anggaran', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error()
    {
        $errors = [
            'id_skpd' => form_error('id_skpd'),
            'tahun' => form_error('tahun'),
            'id_uraian' => form_error('id_uraian'),
            'anggaran' => form_error('anggaran'),
            'st_anggaran' => form_error('st_anggaran')
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
            $id_uraian=htmlspecialchars($post['id_uraian']);
            $temp = $this->mquery->select_id('data_kode_rekening', ['id_uraian' => $id_uraian]);
            $array =  [
                'id_skpd' => htmlspecialchars($post['id_skpd']),
                'kode_rekening' => $temp['kode_rekening'],
                'level' => $temp['level'],
                'anggaran' => htmlspecialchars($post['anggaran']),
                'jenis' => $temp['jenis'],
                'tahun' => $post['tahun'],
                'st_anggaran' => htmlspecialchars($post['st_anggaran'])
            ];

            $string = ['data_uraian_kegiatan_skpd' => $array];
            $log = simpan_log("insert data_uraian_kegiatan_skpd", json_encode($string));
            $res = $this->mquery->insert_data('data_uraian_kegiatan_skpd', $array, $log);
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
            $id_no = htmlspecialchars($post['id_no']);
            $id_uraian = htmlspecialchars($post['id_uraian']);
            $temp = $this->mquery->select_id('data_kode_rekening', ['id_uraian' => $id_uraian]);
            $array =  [
                'kode_rekening' => $temp['kode_rekening'],
                'level' => $temp['level'],
                'anggaran' => htmlspecialchars($post['anggaran']),
                'jenis' => $temp['jenis'],
                'st_anggaran' => htmlspecialchars($post['st_anggaran'])
            ];
            $temp = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_uraian' => $id_no]);
            $string = ['data_uraian_kegiatan_skpd' => ['old' => $temp, 'new' => $array]];
            $log = simpan_log("update data_uraian_kegiatan_skpd", json_encode($string));
            $res = $this->mquery->update_data('data_uraian_kegiatan_skpd', $array, ['id_uraian' => $id_no], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function delete()
    {
        $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
        $id_uraian = decrypt_url($encrypt_id);
        $temp = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_uraian' => $id_uraian]);
        $string = ['data_uraian_kegiatan_skpd' => $temp];
        $log = simpan_log("delete data_uraian_kegiatan_skpd", json_encode($string));
        $res = $this->mquery->delete_data('data_uraian_kegiatan_skpd', ['id_uraian' => $id_uraian], $log);
        $data = ['status' => TRUE, 'notif' => $res];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

}
