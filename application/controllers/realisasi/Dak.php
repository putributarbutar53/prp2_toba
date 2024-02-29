<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dak extends CI_Controller
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
                "submenu_active" => "realisasi-dana-dak"
            ];
            $this->load->view('realisasi/dak/view', $data);
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
                $where = array('id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'jenis' => 1);
                $result_max = $this->mquery->max_data_where("log_upload_realisasi", "bulan", $where);
                $row_log_upload = $this->mquery->select_id('log_upload_realisasi', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'jenis' => 1, 'bulan' => $result_max['bulan']]);
                $row_users = $this->mquery->select_id('users', ['id_user' => $row_log_upload['user_input']]);
                $nama_skpd = "<a href=" . base_url("realisasi-dana-dak/detail/" . $tahun . '/' .$encrypt_id) . "><h2>" . $r['nama_skpd'] . "</h2></a>";
                
                $hsl_realisasi = $this->mquery->sum_data('tbl_data_dak', 'total', ['id_satker' => $r['id_skpd'], 'tahun' => $tahun]);
                $dipa = $hsl_realisasi['total'];

                $hsl_realisasi = $this->mquery->sum_data('tbl_realisasi_dak', 'sp2d_tahap1', ['id_satker' => $r['id_skpd'], 'tahun' => $tahun, 'bulan' => $result_max['bulan']]);
                $sp2d_tahap1 = $hsl_realisasi['sp2d_tahap1'];
                $hsl_realisasi = $this->mquery->sum_data('tbl_realisasi_dak', 'sp2d_tahap2', ['id_satker' => $r['id_skpd'], 'tahun' => $tahun, 'bulan' => $result_max['bulan']]);
                $sp2d_tahap2 = $hsl_realisasi['sp2d_tahap2'];
                $hsl_realisasi = $this->mquery->sum_data('tbl_realisasi_dak', 'sp2d_tahap3', ['id_satker' => $r['id_skpd'], 'tahun' => $tahun, 'bulan' => $result_max['bulan']]);
                $sp2d_tahap3 = $hsl_realisasi['sp2d_tahap3'];
                $sp2d_total=$sp2d_tahap1+$sp2d_tahap2+$sp2d_tahap3;
                if($dipa==0){$persen=0;}else
                {$persen=round(($sp2d_total/$dipa*100),2);}
                
                $tampil_tahap = "<table class='table-detail' style='width:100%;'>
                        <tr><td>Tahap 1</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($sp2d_tahap1) . "</td></tr>
                        <tr><td>Tahap 2</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($sp2d_tahap2) . "</td></tr>
                        <tr><td>Tahap 3</td><td style='text-align:right; font-weight:bold;'>" . format_rupiah($sp2d_tahap3) . "</td></tr>
                        <tr><td>Total</td><td style='text-align:right; font-weight:bold;'>" . format_rupiah($sp2d_total) . "</td></tr>
                    </table>";
                
                $no++;
                $row = [
                    'no' => $no,
                    'nama_skpd' => $nama_skpd,
                    'bulan' => bulan($result_max['bulan']),
                    'dipa' => format_rupiah($dipa),
                    'tampil_tahap' => $tampil_tahap,
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
            "submenu_active" => "realisasi-dana-dak",
            "skpd" => $skpd,
            "tahun" => $tahun
        ];
        $this->load->view('realisasi/dak/view_detail', $data);
    }

    public function load_apbd()
    {
        //$tahun=2022;
        $tahun = $this->input->post('tahun');
        $skpd = $this->input->post('id');
        $encrypt_id = encrypt_url($skpd);
        $result = $this->mquery->select_by('log_upload_realisasi', ['id_skpd' => $skpd, 'tahun'=> $tahun, 'jenis'=> 1], "bulan ASC");
        $data = [];
        $no = 0;
        $jenis=1;    //kode DAK
        foreach ($result as $r) {
            $no++;
            $nama_bulan = "<a href=" . base_url("realisasi-dana-dak/detail2/" .$encrypt_id."/". $tahun."/". $r['bulan']) . ">" . bulan($r['bulan']) . "</a>";
            $row_users = $this->mquery->select_id('users', ['id_user' => $r['user_input']]);
            $hsl_realisasi = $this->mquery->sum_data('tbl_data_dak', 'total', ['id_satker' => $skpd, 'tahun' => $tahun]);
            $dipa = $hsl_realisasi['total'];

            $hsl_realisasi = $this->mquery->sum_data('tbl_realisasi_dak', 'sp2d_tahap1', ['id_satker' => $skpd, 'tahun' => $tahun, 'bulan' => $r['bulan']]);
            $sp2d_tahap1 = $hsl_realisasi['sp2d_tahap1'];
            $hsl_realisasi = $this->mquery->sum_data('tbl_realisasi_dak', 'sp2d_tahap2', ['id_satker' => $skpd, 'tahun' => $tahun, 'bulan' => $r['bulan']]);
            $sp2d_tahap2 = $hsl_realisasi['sp2d_tahap2'];
            $hsl_realisasi = $this->mquery->sum_data('tbl_realisasi_dak', 'sp2d_tahap3', ['id_satker' => $skpd, 'tahun' => $tahun, 'bulan' => $r['bulan']]);
            $sp2d_tahap3 = $hsl_realisasi['sp2d_tahap3'];
            $sp2d_total=$sp2d_tahap1+$sp2d_tahap2+$sp2d_tahap3;
            if($dipa==0){$persen=0;}else
            {$persen=round(($sp2d_total/$dipa*100),2);}
            
            $tampil_tahap = "<table class='table-detail' style='width:100%;'>
                    <tr><td>Tahap 1</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($sp2d_tahap1) . "</td></tr>
                    <tr><td>Tahap 2</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($sp2d_tahap2) . "</td></tr>
                    <tr><td>Tahap 3</td><td style='text-align:right; font-weight:bold;'>" . format_rupiah($sp2d_tahap3) . "</td></tr>
                    <tr><td>Total</td><td style='text-align:right; font-weight:bold;'>" . format_rupiah($sp2d_total) . "</td></tr>
                </table>";

            $row = [
                'no' => $no,
                'tahun' => $tahun,
                'bulan' => $nama_bulan,
                'dipa' => format_rupiah($dipa),
                'tampil_tahap' => $tampil_tahap,
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
        $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $bulan, 'st_data' => 2]);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);

        $result = $this->mquery->select_by('tbl_data_dak', ['id_satker' => $id_skpd, 'tahun' => $tahun], "id_dak ASC");
        foreach ($result as $r) {
            $id_dak=$r['id_dak'];
            $cek_jml_data = $this->mquery->count_data('tbl_realisasi_dak', ['id_satker' => $id_skpd, 'id_dak' => $id_dak, 'tahun' => $tahun, 'bulan' => $bulan]);

            if($cek_jml_data==0)
            {
                $array_realisasi =  [
                    'id_satker' => $id_skpd,
                    'id_dak' => $id_dak,
                    'tahun' => $tahun,
                    'bulan' => $bulan
                ];
                $this->db->insert('tbl_realisasi_dak', $array_realisasi);
            }
        }
        $data = [
            "menu_active" => "realisasi_apbn",
            "submenu_active" => "realisasi-dana-dak",
            "skpd" => $skpd,
            "bulan" => $bulan,
            "tahun" => $tahun,
            "nama_periode" => bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('realisasi/dak/view_detail2', $data);
    }

    public function load_apbd2()
    {
        $tahun = $this->input->post('tahun');
        $skpd = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $encrypt_id = encrypt_url($skpd);
        $result = $this->mquery->select_by('tbl_realisasi_dak', ['id_satker' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan], "id_dak ASC");
        $data = [];
        $no = 0;
        $tahun_now=date('Y');
        foreach ($result as $r) {
            $no++;
            $id_dak=$r['id_dak'];
            $hsl_dak = $this->mquery->select_id('tbl_data_dak', ['id_dak' => $id_dak]);
            
            if($tahun_now==$tahun){
                $edit = action_edit(encrypt_url($r['id_realisasi']));
                $delete = action_delete(encrypt_url($r['id_realisasi']));
            }
            else{
                $edit ='-';
                $delete = '-';
            }
            if($hsl_dak['total']==0){$persen=0;}else
            {$persen=round(($r['sp2d_total']/$hsl_dak['total']*100),2);}
            
            $tampil_sp2d = "<table class='table-detail' style='width:100%;'>
                    <tr><td>Tahap 1</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($r['sp2d_tahap1']) . "</td></tr>
                    <tr><td>Tahap 2</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($r['sp2d_tahap2']) . "</td></tr>
                    <tr><td>Tahap 3</td><td style='text-align:right; font-weight:bold;'>" . format_rupiah($r['sp2d_tahap3']) . "</td></tr>
                    <tr><td>Total</td><td style='text-align:right; font-weight:bold;'>" . format_rupiah($r['sp2d_total']) . "</td></tr>
                </table>";

            $row = [
                'no' => $no,
                'tahun' => $tahun,
                'bulan' => bulan($bulan),
                'subbidang' => $hsl_dak['subbidang'],
                'pagu' => format_rupiah($hsl_dak['total']),
                'tampil_sp2d' => $tampil_sp2d,
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
        $this->load->view('realisasi/dak/form_upload', $data);
    }

    function upload()
    {
        $post = $this->input->post(null, TRUE);
        $id_skpd = htmlspecialchars($post['id_skpd']);
        $cek_tanggal=$post['tanggal'];
        $temp_bulan=substr($cek_tanggal,5,2);
        $hsl_bulan=intval($temp_bulan);
        $this->db->delete('log_upload_realisasi', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun'], 'bulan' => $hsl_bulan, 'jenis' => 1]);
                
                    $array =  [
                        'tahun' => $post['tahun'],
                        'bulan' => $hsl_bulan,
                        'id_skpd' => $id_skpd,
                        'jenis' => 1,
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
            $this->load->view('realisasi/dak/form_add', $data);
        } elseif ($opsi == "edit") {
            $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
            $id_no = decrypt_url($encrypt_id);
            $realisasi = $this->mquery->select_id('tbl_realisasi_dak', ['id_realisasi' => $id_no]);
            $data = [
                "realisasi" => $realisasi,
                "skpd" => $this->mquery->select_id('data_skpd', ['id_skpd' => $realisasi['id_satker']]),
            ];
            $this->load->view('realisasi/dak/form_edit', $data);
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
            $sp2d_tahap1 = str_replace(".", "", htmlspecialchars($post['sp2d_tahap1']));
            $sp2d_tahap2 = str_replace(".", "", htmlspecialchars($post['sp2d_tahap2']));
            $sp2d_tahap3 = str_replace(".", "", htmlspecialchars($post['sp2d_tahap3']));
            $sp2d_total = $sp2d_tahap1+$sp2d_tahap2+$sp2d_tahap3;

            $array =  [
                'sp2d_tahap1' => $sp2d_tahap1,
                'sp2d_tahap2' => $sp2d_tahap2,
                'sp2d_tahap3' => $sp2d_tahap3,
                'sp2d_total' => $sp2d_total
            ];
            $temp = $this->mquery->select_id('tbl_realisasi_dak', ['id_realisasi' => $id_realisasi]);
            $string = ['tbl_realisasi_dak' => ['old' => $temp, 'new' => $array]];
            $log = simpan_log("update tbl_realisasi_dak", json_encode($string));
            $res = $this->mquery->update_data('tbl_realisasi_dak', $array, ['id_realisasi' => $id_realisasi], $log);
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
            $temp = $this->mquery->select_id('tbl_realisasi_dak', ['id_realisasi' => $id_realisasi]);
            $string = ['tbl_realisasi_dak' => $temp];
            $log = simpan_log("delete tbl_realisasi_dak", json_encode($string));
            $res = $this->mquery->delete_data('tbl_realisasi_dak', ['id_realisasi' => $id_realisasi], $log);
            $data = ['notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

}
