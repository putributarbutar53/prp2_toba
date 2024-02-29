<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Realisasi_keuangan extends CI_Controller
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
                "menu_active" => "laporan",
                "submenu_active" => "realisasi-keuangan"
            ];
            $this->load->view('laporan/realisasi_keuangan/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function load()
    {
        if ($this->akses['akses'] == 'Y') {
            $tahun = $this->input->post('tahun');
            $bulan=date('m');
            $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
            $tgl_papbd=$cek_papbd['papbd'];
            $temp_bulan=substr($tgl_papbd,5,2);
            $hsl_bulan=intval($temp_bulan);
            if($bulan<$hsl_bulan){$hsl_stanggaran=1;}
            else{$hsl_stanggaran=2;}

            $result = $this->mquery->select_data("data_skpd", "id_skpd ASC");
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $encrypt_id = encrypt_url($r['id_skpd']);

                $result_realisasi = 0;
                $where = array('id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'st_data' => 2);
                $result_max = $this->mquery->max_data_where("log_upload", "bulan", $where);

                $row_realisasi_pendapatan = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'bulan' => $result_max['bulan'], 'kode_rekening' => 4]);
                $row_realisasi_belanja = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'bulan' => $result_max['bulan'], 'kode_rekening' => 5]);
                
                if($r['acuan_belanja']==0)
                {
                    $row_data_uraian_belanja = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $r['id_skpd'], 'kode_rekening' => 5,'st_anggaran' => $hsl_stanggaran]);
                    $total_belanja=$row_data_uraian_belanja['anggaran'];
                }
                else{$total_belanja=$r['belanja'];}
                if($total_belanja==0){$persen_total_belanja=0;}
                else{$persen_total_belanja = round(($row_realisasi_belanja['realisasi'] / $total_belanja * 100), 2);}

                if($r['acuan_pendapatan']==0)
                {
                    $row_data_uraian_pendapatan = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $r['id_skpd'], 'kode_rekening' => 4,'st_anggaran' => $hsl_stanggaran]);
                    $total_pendapatan=$row_data_uraian_pendapatan['anggaran'];
                }
                else{$total_pendapatan=$r['pendapatan'];}
                if($total_pendapatan==0){$persen_total_pendapatan=0;}
                else{$persen_total_pendapatan = round(($row_realisasi_pendapatan['realisasi'] / $total_pendapatan * 100), 2);}

                $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'st_data' => 2, 'bulan' => $result_max['bulan']]);
            
                $row_users = $this->mquery->select_id('users', ['id_user' => $row_log_upload['user_input']]);
                
                $nama_skpd = "<a href=" . base_url("realisasi-keuangan/detail/" .$tahun."/". $encrypt_id) . ">" . $r['nama_skpd'] . "</a>";
                
                $cek_papbd = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
                $tgl_papbd=$cek_papbd['papbd'];
                $tanggal_data=$row_log_upload['tgl_data'];

                if($tanggal_data<$tgl_papbd){$hsl_stanggaran=1;}
                else{$hsl_stanggaran=2;}

                $row_data_uraian_belanja = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $r['id_skpd'], 'kode_rekening' => 5,'st_anggaran' => $hsl_stanggaran]);
                $total_belanja=$row_data_uraian_belanja['anggaran'];
                $row_data_uraian_pendapatan = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $r['id_skpd'], 'kode_rekening' => 4,'st_anggaran' => $hsl_stanggaran]);
                $total_pendapatan=$row_data_uraian_pendapatan['anggaran'];
                
                $row_realisasi_pendapatan = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'bulan' => $result_max['bulan'], 'kode_rekening' => 4]);
                $row_realisasi_belanja = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'bulan' => $result_max['bulan'], 'kode_rekening' => 5]);
               
                
                if($total_belanja==0){$persen_total_belanja=0;}
                else{$persen_total_belanja = round(($row_realisasi_belanja['realisasi'] / $total_belanja * 100), 2);}

                if($total_pendapatan==0){$persen_total_pendapatan=0;}
                else{$persen_total_pendapatan = round(($row_realisasi_pendapatan['realisasi'] / $total_pendapatan * 100), 2);}

                $tampil_pendapatan = "<table class='table-detail' style='width:100%;'>
                    <tr><td>Target</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($total_pendapatan) . "</td></tr>
                    <tr><td>Realisasi</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($row_realisasi_pendapatan['realisasi']) . "</td></tr>
                    <tr><td>Persen</td><td style='text-align:right; font-weight:bold;'>" . $persen_total_pendapatan . "%</td></tr>
                </table>";

                $tampil_belanja = "<table class='table-detail' style='width:100%;'>
                    <tr><td>Anggaran</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($total_belanja) . "</td></tr>
                    <tr><td>Realisasi</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($row_realisasi_belanja['realisasi']) . "</td></tr>
                    <tr><td>Persen</td><td style='text-align:right; font-weight:bold;'>" . $persen_total_belanja . "%</td></tr>
                </table>";

                $no++;
                $row = [
                    'no' => $no,
                    'nama_skpd' => $r['nama_skpd'],
                    'bulan' => bulan($result_max['bulan']),
                    // 'pendapatan' => $tampil_pendapatan,
                    // 'belanja' => $tampil_belanja,
                    'tanggal_data' => $row_log_upload['tgl_data'],
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
            "menu_active" => "laporan",
            "submenu_active" => "realisasi_keuangan",
            "skpd" => $skpd,
            "tahun" => $tahun
        ];
        $this->load->view('laporan/realisasi_keuangan/view_detail', $data);
    }

    
    public function load_apbd()
    {
       // $tahun=2021;
        $tahun = $this->input->post('tahun');
        $bulan=date('m');
        $skpd = $this->input->post('id');
        $row_skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $skpd]);
        
        $encrypt_id = encrypt_url($skpd);
        $result = $this->mquery->select_by('log_upload', ['id_skpd' => $skpd, 'tahun'=> $tahun, 'st_data'=> 2], "bulan ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            //$nama_bulan = "<a href=" . base_url("realisasi-keuangan/detail2/" .$encrypt_id."/". $r['bulan']) . ">" . bulan($r['bulan']) . "</a>";
            
            $nama_bulan = bulan($r['bulan']);
            

            $cek_papbd = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
            $tgl_papbd=$cek_papbd['papbd'];
            $tanggal_data=$r['tgl_data'];

            if($tanggal_data<$tgl_papbd){$hsl_stanggaran=1;}
            else{$hsl_stanggaran=2;}

            $row_data_uraian_belanja = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=> $tahun, 'id_skpd' => $skpd, 'kode_rekening' => 5,'st_anggaran' => $hsl_stanggaran]);
            $total_belanja=$row_data_uraian_belanja['anggaran'];
            $row_data_uraian_pendapatan = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=> $tahun, 'id_skpd' => $skpd, 'kode_rekening' => 4,'st_anggaran' => $hsl_stanggaran]);
            $total_pendapatan=$row_data_uraian_pendapatan['anggaran'];
            
            $row_realisasi_pendapatan = $this->mquery->select_id('data_realisasi_detail_skpd', ['tahun'=> $tahun, 'id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $r['bulan'], 'kode_rekening' => 4]);
            $row_realisasi_belanja = $this->mquery->select_id('data_realisasi_detail_skpd', ['tahun'=> $tahun, 'id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $r['bulan'], 'kode_rekening' => 5]);
            $row_users = $this->mquery->select_id('users', ['id_user' => $r['user_input']]);
            
            if($total_belanja==0){$persen_total_belanja=0;}
            else{$persen_total_belanja = round(($row_realisasi_belanja['realisasi'] / $total_belanja * 100), 2);}
            if($total_pendapatan==0){$persen_total_pendapatan=0;}
            else{$persen_total_pendapatan = round(($row_realisasi_pendapatan['realisasi'] / $total_pendapatan * 100), 2);}

            $tampil_pendapatan = "<table class='table-detail' style='width:100%;'>
                <tr><td>Target</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($total_pendapatan) . "</td></tr>
                <tr><td>Realisasi</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($row_realisasi_pendapatan['realisasi']) . "</td></tr>
                <tr><td>Persen</td><td style='text-align:right; font-weight:bold;'>" . $persen_total_pendapatan . "%</td></tr>
            </table>";

            $tampil_belanja = "<table class='table-detail' style='width:100%;'>
                <tr><td>Anggaran</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($total_belanja) . "</td></tr>
                <tr><td>Realisasi</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($row_realisasi_belanja['realisasi']) . "</td></tr>
                <tr><td>Persen</td><td style='text-align:right; font-weight:bold;'>" . $persen_total_belanja . "%</td></tr>
            </table>";

            $row = [
                'no' => $no,
                'tahun' => $tahun,
                'bulan' => $nama_bulan,
                'pendapatan' => $tampil_pendapatan,
                'belanja' => $tampil_belanja,
                'tanggal_data' => $r['tgl_data']
            ];
            $data[] = $row;
        }

        $output['data'] = $data;
        echo json_encode($output);
    }
    

    public function detail2($encrypt_id, $bulan)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan, 'st_data' => 2]);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $data = [
            "menu_active" => "laporan",
            "submenu_active" => "realisasi_keuangan",
            "skpd" => $skpd,
            "bulan" => $bulan,
            "nama_periode" => $this->fungsi->nama_bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('laporan/realisasi_keuangan/view_detail2', $data);
    }


    public function load_apbd2()
    {
        $tahun=2021;
        $skpd = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $bulan_1=$bulan-1;
        $encrypt_id = encrypt_url($skpd);

        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
        $tgl_papbd=$cek_papbd['papbd'];
        $temp_bulan=substr($tgl_papbd,5,2);
        $hsl_bulan=intval($temp_bulan);

        if($bulan<$hsl_bulan){$hsl_stanggaran=1;}
        else{$hsl_stanggaran=2;}

        if($bulan_1<$hsl_bulan){$hsl_stanggaran_1=1;}
        else{$hsl_stanggaran_1=2;}

        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan], "kode_rekening ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
            $row_anggaran_1 = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran_1]);
            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
            
            $result_realisasi_1 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan_1, 'kode_rekening' => $r['kode_rekening']]);

            if($row_anggaran['anggaran']==0){$persen_anggaran=0;}
            else
            {
                $persen_anggaran = round(($r['realisasi'] / $row_anggaran['anggaran'] * 100), 2);
            }

            if($row_anggaran_1['anggaran']==0){$persen_anggaran_1=0;}
            else
            {
                $persen_anggaran_1 = round(($result_realisasi_1['realisasi'] / $row_anggaran_1['anggaran'] * 100), 2);
            }

            if($row_uraian['level']<=1)
            {
                $row = [
                    'no' => $no,
                    'kode_rekening' => $r['kode_rekening'],
                    'uraian' => $row_uraian['uraian'],
                    'anggaran' => format_rupiah($row_anggaran['anggaran']),
                    'realisasi_1' => format_rupiah($result_realisasi_1['realisasi']),
                    'persen_1' => format_rupiah($persen_anggaran_1)." %",
                    'realisasi' => format_rupiah($r['realisasi']),
                    'persen' => format_rupiah($persen_anggaran)." %"
                ];
                $data[] = $row;
            }
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function load_level2()
    {
        $tahun=2021;
        $skpd = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $bulan_1=$bulan-1;
        $encrypt_id = encrypt_url($skpd);

        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
        $tgl_papbd=$cek_papbd['papbd'];
        $temp_bulan=substr($tgl_papbd,5,2);
        $hsl_bulan=intval($temp_bulan);

        if($bulan<$hsl_bulan){$hsl_stanggaran=1;}
        else{$hsl_stanggaran=2;}

        if($bulan_1<$hsl_bulan){$hsl_stanggaran_1=1;}
        else{$hsl_stanggaran_1=2;}

        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan], "kode_rekening ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
            $row_anggaran_1 = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran_1]);
            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
            
            $result_realisasi_1 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan_1, 'kode_rekening' => $r['kode_rekening']]);

            if($row_anggaran['anggaran']==0){$persen_anggaran=0;}
            else
            {
                $persen_anggaran = round(($r['realisasi'] / $row_anggaran['anggaran'] * 100), 2);
            }

            if($row_anggaran_1['anggaran']==0){$persen_anggaran_1=0;}
            else
            {
                $persen_anggaran_1 = round(($result_realisasi_1['realisasi'] / $row_anggaran_1['anggaran'] * 100), 2);
            }

            if($row_uraian['level']<=2)
            {
                $row = [
                    'no' => $no,
                    'kode_rekening' => $r['kode_rekening'],
                    'uraian' => $row_uraian['uraian'],
                    'anggaran' => format_rupiah($row_anggaran['anggaran']),
                    'realisasi_1' => format_rupiah($result_realisasi_1['realisasi']),
                    'persen_1' => format_rupiah($persen_anggaran_1)." %",
                    'realisasi' => format_rupiah($r['realisasi']),
                    'persen' => format_rupiah($persen_anggaran)." %"
                ];
                $data[] = $row;
            }
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function load_level3()
    {
        $tahun=2021;
        $skpd = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $bulan_1=$bulan-1;
        $encrypt_id = encrypt_url($skpd);

        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
        $tgl_papbd=$cek_papbd['papbd'];
        $temp_bulan=substr($tgl_papbd,5,2);
        $hsl_bulan=intval($temp_bulan);

        if($bulan<$hsl_bulan){$hsl_stanggaran=1;}
        else{$hsl_stanggaran=2;}

        if($bulan_1<$hsl_bulan){$hsl_stanggaran_1=1;}
        else{$hsl_stanggaran_1=2;}

        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan], "kode_rekening ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
            $row_anggaran_1 = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran_1]);
            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
            
            $result_realisasi_1 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan_1, 'kode_rekening' => $r['kode_rekening']]);

            if($row_anggaran['anggaran']==0){$persen_anggaran=0;}
            else
            {
                $persen_anggaran = round(($r['realisasi'] / $row_anggaran['anggaran'] * 100), 2);
            }

            if($row_anggaran_1['anggaran']==0){$persen_anggaran_1=0;}
            else
            {
                $persen_anggaran_1 = round(($result_realisasi_1['realisasi'] / $row_anggaran_1['anggaran'] * 100), 2);
            }

            if($row_uraian['level']<=3)
            {
                $row = [
                    'no' => $no,
                    'kode_rekening' => $r['kode_rekening'],
                    'uraian' => $row_uraian['uraian'],
                    'anggaran' => format_rupiah($row_anggaran['anggaran']),
                    'realisasi_1' => format_rupiah($result_realisasi_1['realisasi']),
                    'persen_1' => format_rupiah($persen_anggaran_1)." %",
                    'realisasi' => format_rupiah($r['realisasi']),
                    'persen' => format_rupiah($persen_anggaran)." %"
                ];
                $data[] = $row;
            }
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function load_level4()
    {
        $tahun=2021;
        $skpd = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $bulan_1=$bulan-1;
        $encrypt_id = encrypt_url($skpd);

        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
        $tgl_papbd=$cek_papbd['papbd'];
        $temp_bulan=substr($tgl_papbd,5,2);
        $hsl_bulan=intval($temp_bulan);

        if($bulan<$hsl_bulan){$hsl_stanggaran=1;}
        else{$hsl_stanggaran=2;}

        if($bulan_1<$hsl_bulan){$hsl_stanggaran_1=1;}
        else{$hsl_stanggaran_1=2;}

        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan], "kode_rekening ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
            $row_anggaran_1 = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran_1]);
            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
            
            $result_realisasi_1 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan_1, 'kode_rekening' => $r['kode_rekening']]);

            if($row_anggaran['anggaran']==0){$persen_anggaran=0;}
            else
            {
                $persen_anggaran = round(($r['realisasi'] / $row_anggaran['anggaran'] * 100), 2);
            }

            if($row_anggaran_1['anggaran']==0){$persen_anggaran_1=0;}
            else
            {
                $persen_anggaran_1 = round(($result_realisasi_1['realisasi'] / $row_anggaran_1['anggaran'] * 100), 2);
            }

            if($row_uraian['level']<=4)
            {
                $row = [
                    'no' => $no,
                    'kode_rekening' => $r['kode_rekening'],
                    'uraian' => $row_uraian['uraian'],
                    'anggaran' => format_rupiah($row_anggaran['anggaran']),
                    'realisasi_1' => format_rupiah($result_realisasi_1['realisasi']),
                    'persen_1' => format_rupiah($persen_anggaran_1)." %",
                    'realisasi' => format_rupiah($r['realisasi']),
                    'persen' => format_rupiah($persen_anggaran)." %"
                ];
                $data[] = $row;
            }
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function load_level5()
    {
        $tahun=2021;
        $skpd = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $bulan_1=$bulan-1;
        $encrypt_id = encrypt_url($skpd);

        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
        $tgl_papbd=$cek_papbd['papbd'];
        $temp_bulan=substr($tgl_papbd,5,2);
        $hsl_bulan=intval($temp_bulan);

        if($bulan<$hsl_bulan){$hsl_stanggaran=1;}
        else{$hsl_stanggaran=2;}

        if($bulan_1<$hsl_bulan){$hsl_stanggaran_1=1;}
        else{$hsl_stanggaran_1=2;}

        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan], "kode_rekening ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
            $row_anggaran_1 = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran_1]);
            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
            
            $result_realisasi_1 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan_1, 'kode_rekening' => $r['kode_rekening']]);

            if($row_anggaran['anggaran']==0){$persen_anggaran=0;}
            else
            {
                $persen_anggaran = round(($r['realisasi'] / $row_anggaran['anggaran'] * 100), 2);
            }

            if($row_anggaran_1['anggaran']==0){$persen_anggaran_1=0;}
            else
            {
                $persen_anggaran_1 = round(($result_realisasi_1['realisasi'] / $row_anggaran_1['anggaran'] * 100), 2);
            }

            if($row_uraian['level']<=5)
            {
                $row = [
                    'no' => $no,
                    'kode_rekening' => $r['kode_rekening'],
                    'uraian' => $row_uraian['uraian'],
                    'anggaran' => format_rupiah($row_anggaran['anggaran']),
                    'realisasi_1' => format_rupiah($result_realisasi_1['realisasi']),
                    'persen_1' => format_rupiah($persen_anggaran_1)." %",
                    'realisasi' => format_rupiah($r['realisasi']),
                    'persen' => format_rupiah($persen_anggaran)." %"
                ];
                $data[] = $row;
            }
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function load_level6()
    {
        $tahun=2021;
        $skpd = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $bulan_1=$bulan-1;
        $encrypt_id = encrypt_url($skpd);

        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
        $tgl_papbd=$cek_papbd['papbd'];
        $temp_bulan=substr($tgl_papbd,5,2);
        $hsl_bulan=intval($temp_bulan);

        if($bulan<$hsl_bulan){$hsl_stanggaran=1;}
        else{$hsl_stanggaran=2;}

        if($bulan_1<$hsl_bulan){$hsl_stanggaran_1=1;}
        else{$hsl_stanggaran_1=2;}

        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan], "kode_rekening ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
            $row_anggaran_1 = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran_1]);
            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
            
            $result_realisasi_1 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan_1, 'kode_rekening' => $r['kode_rekening']]);

            if($row_anggaran['anggaran']==0){$persen_anggaran=0;}
            else
            {
                $persen_anggaran = round(($r['realisasi'] / $row_anggaran['anggaran'] * 100), 2);
            }

            if($row_anggaran_1['anggaran']==0){$persen_anggaran_1=0;}
            else
            {
                $persen_anggaran_1 = round(($result_realisasi_1['realisasi'] / $row_anggaran_1['anggaran'] * 100), 2);
            }

            if($row_uraian['level']<=6)
            {
                $row = [
                    'no' => $no,
                    'kode_rekening' => $r['kode_rekening'],
                    'uraian' => $row_uraian['uraian'],
                    'anggaran' => format_rupiah($row_anggaran['anggaran']),
                    'realisasi_1' => format_rupiah($result_realisasi_1['realisasi']),
                    'persen_1' => format_rupiah($persen_anggaran_1)." %",
                    'realisasi' => format_rupiah($r['realisasi']),
                    'persen' => format_rupiah($persen_anggaran)." %"
                ];
                $data[] = $row;
            }
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function form_level()
    {
        $id_skpd = htmlspecialchars($this->input->post('skpd', TRUE));
        $bulan = htmlspecialchars($this->input->post('bulan', TRUE));
        $level = htmlspecialchars($this->input->post('level', TRUE));
        $data = [
            'id_skpd' => $id_skpd,
            'bulan' => $bulan,
            'level' => $level
        ];
        $this->load->view('laporan/realisasi_keuangan/form_level', $data);
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('id_skpd', 'ID SKPD Tidak Ditemukan, ID SKPD', 'required|trim');
        $this->form_validation->set_rules('bulan', 'Data Bulan Tidak Ditemukan, Data Bulan', 'required|trim');
        $this->form_validation->set_rules('level', 'Data Level Tidak Ditemukan, Data Level', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error($params)
    {
        if ($params == 'kadis') {
            $errors = [
                'id_skpd' => form_error('id_skpd'),
                'bulan' => form_error('bulan'),
                'level' => form_error('level')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Kepala OPD Belum Diinput'];
        } else if ($params == 'laporan') {
            $errors = [
                'id_skpd' => form_error('id_skpd'),
                'bulan' => form_error('bulan'),
                'level' => form_error('level')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Laporan Bulan Ini Sudah Dikirim'];
        } else {
            $errors = [
                'id_skpd' => form_error('id_skpd'),
                'bulan' => form_error('bulan'),
                'level' => form_error('level')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function kirim_laporan()
    {
        $tahun=2021;
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error('default');
        } else {
            $post = $this->input->post(null, TRUE);
            $id_skpd = htmlspecialchars($post['id_skpd']);
            $bulan = htmlspecialchars($post['bulan']);
            $level = htmlspecialchars($post['level']);
            $cek_pa = $this->mquery->count_data('penanda_tangan', ['id_skpd' => $id_skpd]);
                if ($cek_pa == 0) {
                    $this->_send_error('kadis');
                } else {
                    $cek_laporan_realisasi = $this->mquery->count_data('laporan_realisasi_keuangan', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $bulan]);
                    if ($cek_laporan_realisasi > 0) {
                        $this->_send_error('laporan');
                    } else {
                        $username_user=$this->session->userdata('username');
                        $row_users = $this->mquery->select_id('users', ['username' => $username_user]);
                        $row_penanda_tangan = $this->mquery->select_id('penanda_tangan', ['id_skpd' => $id_skpd, 'is_active' => 'Y']);
                        $array =  [
                            'id_skpd' => $id_skpd,
                            'tahun' => $tahun,
                            'bulan' => $bulan,
                            'level' => $level,
                            'tanggal_input' => date('Y-m-d H:i:s'),
                            'user_input' => $row_users['id_user'],
                            'id_kepala' => $row_penanda_tangan['id_ttd']
                        ];
                        $string = ['laporan_realisasi_keuangan' => $array];
                        $log = simpan_log("Laporan Realisasi", json_encode($string));
                        $res = $this->mquery->insert_data('laporan_realisasi_keuangan', $array, $log);
                        $data = ['status' => TRUE, 'notif' => $res];
                        $this->output->set_content_type('application/json')->set_output(json_encode($data));
                }
            }
        }
    }


}
