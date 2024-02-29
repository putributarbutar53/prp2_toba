<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dekon extends CI_Controller
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
                "menu_active" => "realisasi_apbn",
                "submenu_active" => "realisasi-dana-dekon"
            ];
            $this->load->view('realisasi/dekon/view', $data);
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
                $where = array('id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'jenis' => 2);
                $result_max = $this->mquery->max_data_where("log_upload_realisasi", "bulan", $where);
                $row_log_upload = $this->mquery->select_id('log_upload_realisasi', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'jenis' => 2, 'bulan' => $result_max['bulan']]);
                $row_users = $this->mquery->select_id('users', ['id_user' => $row_log_upload['user_input']]);
                $nama_skpd = "<a href=" . base_url("realisasi-dana-dekon/detail/" . $tahun . '/' .$encrypt_id) . "><h2>" . $r['nama_skpd'] . "</h2></a>";
                
                $pagu_dekon = $this->mquery->sum_data('tbl_dana_dekon', 'pagu', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'jenis' => 'DK']);
                $realisasi_dekon = $this->mquery->sum_data('tbl_realisasi_dekon', 'realisasi', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'bulan' => $result_max['bulan'], 'jenis' => 'DK']);
                
                if($pagu_dekon['pagu']==0){$persen=0;}else
                {$persen=round(($realisasi_dekon['realisasi']/$pagu_dekon['pagu']*100),2);}
                
                $no++;
                $row = [
                    'no' => $no,
                    'nama_skpd' => $nama_skpd,
                    'bulan' => bulan($result_max['bulan']),
                    'dipa' => format_rupiah($pagu_dekon['pagu']),
                    'tampil_tahap' => format_rupiah($realisasi_dekon['realisasi']),
                    'persen' => format_rupiah($persen)." %",
                    'tanggal_data' => $row_log_upload['tgl_data'],
                    'tanggal_input' => $row_log_upload['tanggal_input'],
                    'user_input' => $row_users['username']
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
            "menu_active" => "realisasi_apbn",
            "submenu_active" => "realisasi-dana-dekon",
            "skpd" => $skpd,
            "tahun" => $tahun
        ];
        $this->load->view('realisasi/dekon/view_detail', $data);
    }

    public function load_apbd()
    {
        //$tahun=2022;
        $tahun = $this->input->post('tahun');
        $skpd = $this->input->post('id');
        $encrypt_id = encrypt_url($skpd);
        $result = $this->mquery->select_by('log_upload_realisasi', ['id_skpd' => $skpd, 'tahun'=> $tahun, 'jenis'=> 2], "bulan ASC");
        $data = [];
        $no = 0;
        $jenis=2;    //kode Dekon
        foreach ($result as $r) {
            $no++;
            $nama_bulan = "<a href=" . base_url("realisasi-dana-dekon/detail2/" .$encrypt_id."/". $tahun."/". $r['bulan']) . ">" . bulan($r['bulan']) . "</a>";
            $row_users = $this->mquery->select_id('users', ['id_user' => $r['user_input']]);
            $pagu_dekon = $this->mquery->sum_data('tbl_dana_dekon', 'pagu', ['id_skpd' => $skpd, 'tahun' => $tahun, 'jenis' => 'DK']);
            $realisasi_dekon = $this->mquery->sum_data('tbl_realisasi_dekon', 'realisasi', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $r['bulan'], 'jenis' => 'DK']);
            
            if($pagu_dekon['pagu']==0){$persen=0;}else
            {$persen=round(($realisasi_dekon['realisasi']/$pagu_dekon['pagu']*100),2);}

            $row = [
                'no' => $no,
                'tahun' => $tahun,
                'bulan' => $nama_bulan,
                'dipa' => format_rupiah($pagu_dekon['pagu']),
                'tampil_tahap' => format_rupiah($realisasi_dekon['realisasi']),
                'persen' => format_rupiah($persen)." %",
                'tanggal_data' => $r['tgl_data'],
                'tanggal_input' => $r['tanggal_input'],
                'user_input' => $row_users['username']
            ];
            
            $data[] = $row;
        }

        $output['data'] = $data;
        echo json_encode($output);
    }

    public function detail2($encrypt_id, $tahun, $bulan)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $row_log_upload = $this->mquery->select_id('log_upload_realisasi', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $bulan, 'jenis' => 2]);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);

        $result = $this->mquery->select_by(' tbl_dana_dekon', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'jenis' => 'DK'], "id_dana ASC");
        foreach ($result as $r) {
            $id_dana=$r['id_dana'];
            $cek_jml_data = $this->mquery->count_data('tbl_realisasi_dekon', ['id_skpd' => $id_skpd, 'id_dana' => $id_dana, 'tahun' => $tahun, 'bulan' => $bulan]);

            if($cek_jml_data==0)
            {
                $array_realisasi =  [
                    'id_skpd' => $id_skpd,
                    'id_dana' => $id_dana,
                    'tahun' => $tahun,
                    'bulan' => $bulan,
                    'jenis' => "DK"
                ];
                $this->db->insert('tbl_realisasi_dekon', $array_realisasi);
            }
        }
        $data = [
            "menu_active" => "realisasi_apbn",
            "submenu_active" => "realisasi-dana-dekon",
            "skpd" => $skpd,
            "bulan" => $bulan,
            "tahun" => $tahun,
            "nama_periode" => bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('realisasi/dekon/view_detail2', $data);
    }

    public function load_apbd2()
    {
        $tahun = $this->input->post('tahun');
        $skpd = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $encrypt_id = encrypt_url($skpd);
        $result = $this->mquery->select_by('tbl_realisasi_dekon', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan, 'jenis' => "DK"], "id_dana ASC");
        $data = [];
        $no = 0;
        $tahun_now=date('Y');
        foreach ($result as $r) {
            $no++;
            $id_dana=$r['id_dana'];
            $pagu_dekon = $this->mquery->select_id('tbl_dana_dekon', ['id_dana' => $id_dana]);
            
            if($tahun_now==$tahun){
                $edit = action_edit(encrypt_url($r['id_realisasi']));
                $delete = action_delete(encrypt_url($r['id_realisasi']));
            }
            else{
                $edit ='-';
                $delete = '-';
            }

            if($pagu_dekon['pagu']==0){$persen=0;}else
            {$persen=round(($r['realisasi']/$pagu_dekon['pagu']*100),2);}

            $row = [
                'no' => $no,
                'tahun' => $tahun,
                'bulan' => bulan($bulan),
                'kd_satker' =>"Dana : ".$pagu_dekon['jenis']."<br>".$pagu_dekon['kd_satker']."<br>".$pagu_dekon['keterangan'],
                'pagu' => format_rupiah($pagu_dekon['pagu']),
                'realisasi' => format_rupiah($r['realisasi']),
                'persen' => $persen." %",
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
        $tahun = htmlspecialchars($this->input->post('tahun', TRUE));
        $data = [
            'id_skpd' => $id_skpd,
            'tahun' => $tahun
        ];
        $this->load->view('realisasi/dekon/form_upload', $data);
    }

    function upload()
    {
        $post = $this->input->post(null, TRUE);
        $id_skpd = htmlspecialchars($post['id_skpd']);
        $cek_tanggal=$post['tanggal'];
        $temp_bulan=substr($cek_tanggal,5,2);
        $hsl_bulan=intval($temp_bulan);
        $this->db->delete('log_upload_realisasi', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun'], 'bulan' => $hsl_bulan, 'jenis' => 2]);
                
                    $array =  [
                        'tahun' => $post['tahun'],
                        'bulan' => $hsl_bulan,
                        'id_skpd' => $id_skpd,
                        'jenis' => 2,
                        'tgl_data' => $post['tanggal'],
                        'tanggal_input' => date('Y-m-d H:i:s'),
                        'user_input' => $this->user['user']
                    ];
                    $string = ['log_upload_realisasi' => $array];
                    $log = simpan_log("insert log_upload_realisasi", json_encode($string));
                    $res = $this->mquery->insert_data('log_upload_realisasi', $array, $log);
                    $data = ['status' => TRUE, 'notif' => $res];
                    $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function form()
    {
        $opsi = htmlspecialchars($this->input->post('opsi', TRUE));
        if ($opsi == "add") {
            $data = [
                "skpd" => 123
            ];
            $this->load->view('realisasi/dekon/form_add', $data);
        } elseif ($opsi == "edit") {
            $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
            $id_no = decrypt_url($encrypt_id);
            $realisasi = $this->mquery->select_id('tbl_realisasi_dekon', ['id_realisasi' => $id_no]);
            $data = [
                "realisasi" => $realisasi,
                "skpd" => $this->mquery->select_id('data_skpd', ['id_skpd' => $realisasi['id_skpd']]),
            ];
            $this->load->view('realisasi/dekon/form_edit', $data);
        } else {
            $this->load->view('blocked');
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('skpd', 'Satuan kerja', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error()
    {
        $errors = [
            'skpd' => form_error('skpd')
        ];
        $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function edit()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error();
        } else {
            $post = $this->input->post(null, TRUE);
            $id_realisasi = htmlspecialchars($post['id_realisasi']);
            $realisasi = str_replace(".", "", htmlspecialchars($post['realisasi']));

            $array =  [
                'realisasi' => $realisasi
            ];
            $temp = $this->mquery->select_id('tbl_realisasi_dekon', ['id_realisasi' => $id_realisasi]);
            $string = ['tbl_realisasi_dekon' => ['old' => $temp, 'new' => $array]];
            $log = simpan_log("update tbl_realisasi_dekon", json_encode($string));
            $res = $this->mquery->update_data('tbl_realisasi_dekon', $array, ['id_realisasi' => $id_realisasi], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function deleteaaa()
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
    
    function delete()
    {
        $id = htmlspecialchars($this->input->post('id', TRUE));
        $id_realisasi = decrypt_url($id);
        if ($id_realisasi == "error") {
            $data = ['notif' => FALSE, 'pesan' => "blocked"];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $temp = $this->mquery->select_id('tbl_realisasi_dekon', ['id_realisasi' => $id_realisasi]);
            $string = ['tbl_realisasi_dekon' => $temp];
            $log = simpan_log("delete tbl_realisasi_dekon", json_encode($string));
            $res = $this->mquery->delete_data('tbl_realisasi_dekon', ['id_realisasi' => $id_realisasi], $log);
            $data = ['notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

}
