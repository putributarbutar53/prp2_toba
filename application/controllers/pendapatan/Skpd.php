<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skpd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pendapatan_model', 'pendapatan');
        $this->load->model('M_fungsi', 'fungsi');
        $this->akses = is_logged_in();
    }

    public function index()
    {
        $data = [
            "menu_active" => "pendapatan_skpd",
            "submenu_active" => null
        ];
        $this->load->view('pendapatan/skpd/view', $data);
    }


    public function load()
    {
        $tahun = $this->input->post('tahun');
        $result = $this->mquery->select_data("data_skpd", "id_skpd ASC");
        $data = [];
        $no = 0;
    
        foreach ($result as $r) {
            $encrypt_id = encrypt_url($r['id_skpd']);

                $result_realisasi = 0;
                $where = array('id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'st_data' => 2);
                $result_max = $this->mquery->max_data_where("log_upload", "bulan", $where);

                $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'st_data' => 2, 'bulan' => $result_max['bulan']]);
            
                $row_users = $this->mquery->select_id('users', ['id_user' => $row_log_upload['user_input']]);
                
                $nama_skpd = "<a href=" . base_url("pendapatan/skpd/detail/".$tahun."/" . $encrypt_id) . ">" . $r['nama_skpd'] . "</a>";
                $cek_papbd = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
                $tgl_papbd=$cek_papbd['papbd'];
                $tanggal_data=$row_log_upload['tgl_data'];

                if($tanggal_data<$tgl_papbd){$hsl_stanggaran=1;}
                else{$hsl_stanggaran=2;}

                $row_data_uraian_belanja = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $r['id_skpd'], 'kode_rekening' => 5,'st_anggaran' => $hsl_stanggaran, 'tahun' => $tahun]);
                $total_belanja=$row_data_uraian_belanja['anggaran'];
                $row_data_uraian_pendapatan = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $r['id_skpd'], 'kode_rekening' => 4,'st_anggaran' => $hsl_stanggaran, 'tahun' => $tahun]);
                $total_pendapatan=$row_data_uraian_pendapatan['anggaran'];
                
                $row_realisasi_pendapatan = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'bulan' => $result_max['bulan'], 'kode_rekening' => 4]);
                $row_realisasi_belanja = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'bulan' => $result_max['bulan'], 'kode_rekening' => 5]);
               
                if($total_belanja==0){$persen_total_belanja=0;}
                else{$persen_total_belanja = round(($row_realisasi_belanja['realisasi'] / $total_belanja * 100), 2);;}

                if($total_pendapatan==0){$persen_total_pendapatan=0;}
                else{$persen_total_pendapatan = round(($row_realisasi_pendapatan['realisasi'] / $total_pendapatan * 100), 2);}

                $tampil_pendapatan = "<table class='table-detail' style='width:100%;'>
                    <tr><td>Target</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($total_pendapatan) . "</td></tr>
                    <tr><td>Realisasi</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($row_realisasi_pendapatan['realisasi']) . "</td></tr>
                    <tr><td>Persen</td><td style='text-align:right; font-weight:bold;'>" . $persen_total_pendapatan . "%</td></tr>
                </table>";

            if ($total_pendapatan != 0) {
               // $persen=round(($r['realisasi']/$hsl_pendapatan*100),2);
                $no++;
                $row = [
                    'no' => $no,
                    'nama_skpd' => $nama_skpd,
                    'pagu' => "Rp" . format_rupiah($total_pendapatan),
                    'realisasi' => "Rp" . format_rupiah($row_realisasi_pendapatan['realisasi']),
                    'npersen' => $persen_total_pendapatan ." %",
                    'nilai_short' => $persen_total_pendapatan
                ];
                $data[] = $row;
            }
        }
        $sorting_data1 = array_sort($data, 'nilai_short', SORT_DESC);
        $data_short = [];
        $no=0;
        foreach ($sorting_data1 as $sort1) {
            $no++;
            $data_short[] = [
                'no' => $no,
                'nama_skpd' => $sort1['nama_skpd'],
                'pagu' => $sort1['pagu'],
                'realisasi' => $sort1['realisasi'],
                'npersen' => $sort1['npersen']
            ];
        }

        $output['data'] = $data_short;
        echo json_encode($output);
    }

    public function detail($tahun, $encrypt_id)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $row_skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);

        $cek_max = $this->mquery->max_data_where('data_realisasi_detail_skpd', 'bulan', ['id_skpd' => $id_skpd, 'tahun'=>$tahun]);
        $cek_log_upload = $this->mquery->max_data_where('log_upload', 'bulan', ['id_skpd' => $id_skpd, 'tahun'=>$tahun, 'st_data'=>2]);
        $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $cek_log_upload['bulan']]);
        $periode = $this->fungsi->nama_bulan($row_log_upload['tgl_data']);

        $nama_skpd = null;
        $realisasi_skpd = null;
        $result_persen_pendapatan = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'bulan' =>  $cek_max['bulan'], 'tahun'=>$tahun, 'kode_rekening' => 4], 'persen DESC');

        $row_pendapatan = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
        $tgl_papbd=$row_pendapatan['papbd'];
        $tgl_now=date('Y-m-d');
        if($tgl_now<=$tgl_papbd){$st_anggaran=1;}
        else{$st_anggaran=2;}
        
        foreach ($result_persen_pendapatan as $persen) :
            if ($persen['persen'] != 0) {
                $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $persen['id_skpd']]);
                $nama_skpd .= "'" . $skpd['nama_skpd'] . "',";
                $realisasi_skpd .= $persen['persen'] . ',';
            }
        endforeach;

        $nama_skpd1 = null;
        $realisasi_skpd1 = null;
        $result_persen_pendapatan1 = $this->mquery->select_by('data_uraian_kegiatan_skpd', ['id_skpd' => $id_skpd, 'tahun'=>$tahun, 'kode_rekening' => 4, 'st_anggaran' => $st_anggaran], 'anggaran DESC');
        foreach ($result_persen_pendapatan1 as $persen) :
            if ($persen['anggaran'] != 0) {
                $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $persen['id_skpd']]);
                $nama_skpd1 .= "'" . $skpd['nama_skpd'] . "',";
                $realisasi_skpd1 .= $persen['anggaran'] . ',';
            }
        endforeach;

        $row_pendapatan = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => 4, 'st_anggaran' => $st_anggaran]);
        $row_pad = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => 4.1, 'st_anggaran' => $st_anggaran]);
        $row_transfer= $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => 4.2, 'st_anggaran' => $st_anggaran]);
        $row_pusat= $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => '4.2.1', 'st_anggaran' => $st_anggaran]);
        $row_dbh= $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => '4.2.1.01.01', 'st_anggaran' => $st_anggaran]);
        $row_dau= $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => '4.2.1.01.02', 'st_anggaran' => $st_anggaran]);
        $row_dak= $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => '4.2.1.01.03', 'st_anggaran' => $st_anggaran]);
        $row_daknon= $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => '4.2.1.01.04', 'st_anggaran' => $st_anggaran]);
        $row_dbh_daerah= $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => '4.2.2', 'st_anggaran' => $st_anggaran]);
        $row_pad_lain= $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => 4.3, 'st_anggaran' => $st_anggaran]);
        $row_realisasi_pendapatan = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $cek_log_upload['bulan'], 'kode_rekening' => 4]);

        ($row_pendapatan['anggaran']=="") ? $r_pendapatan = 0 : $r_pendapatan = $row_pendapatan['anggaran'];
        ($row_pad['anggaran']=="") ? $r_pad = 0 : $r_pad = $row_pad['anggaran'];
        ($row_transfer['anggaran']=="") ? $r_transfer = 0 : $r_transfer = $row_transfer['anggaran'];
        ($row_pad_lain['anggaran']=="") ? $r_pad_lain = 0 : $r_pad_lain = $row_pad_lain['anggaran'];
        ($row_realisasi_pendapatan['realisasi']=="") ? $r_realisasi_pendapatan = 0 : $r_realisasi_pendapatan = $row_realisasi_pendapatan['realisasi'];
        ($row_dbh['anggaran']=="") ? $r_dbh = 0 : $r_dbh = $row_dbh['anggaran'];
        ($row_dau['anggaran']=="") ? $r_dau = 0 : $r_dau = $row_dau['anggaran'];
        ($row_dak['anggaran']=="") ? $r_dak = 0 : $r_dak = $row_dak['anggaran'];
        ($row_daknon['anggaran']=="") ? $r_daknon = 0 : $r_daknon = $row_daknon['anggaran'];
        ($row_pusat['anggaran']=="") ? $r_pusat = 0 : $r_pusat = $row_pusat['anggaran'];
        ($row_dbh_daerah['anggaran']=="") ? $r_dbh_daerah = 0 : $r_dbh_daerah = $row_dbh_daerah['anggaran'];
        
        if($row_skpd['acuan_pendapatan']==0)
            {
                $hsl_pendapatan=$r_pendapatan;
            }
            else{$hsl_pendapatan=$row_skpd['pendapatan'];}

        $realisasi = [
            'pendapatan'=> $hsl_pendapatan,
            'pad'=> $r_pad,
            'transfer'=> $r_transfer,
            'pad_lain'=> $r_pad_lain,
            'realisasi_pendapatan'=> $r_realisasi_pendapatan,
            'dbh'=> $r_dbh,
            'dau'=> $r_dau,
            'dak'=> $r_dak,
            'daknon'=> $r_daknon,
            'pusat'=> $r_pusat,
            'dbh_daerah'=> $r_dbh_daerah
        ];
        
        // program sebelumnya
        // $realisasi = [
        // 'pendapatan'=> $row_pendapatan['anggaran'],
        // 'pad'=> $row_pad['anggaran'],
        // 'transfer'=> $row_transfer['anggaran'],
        // 'pad_lain'=> $row_pad_lain['anggaran'],
        // 'realisasi_pendapatan'=> $row_realisasi_pendapatan['realisasi'],
        // 'dbh'=> $row_dbh['anggaran'],
        // 'dau'=> $row_dau['anggaran'],
        // 'dak'=> $row_dak['anggaran'],
        // 'daknon'=> $row_daknon['anggaran'],
        // 'pusat'=> $row_pusat['anggaran'],
        // 'dbh_daerah'=> $row_dbh_daerah['anggaran']
        // ];

        if($realisasi['pad']==0){$persen_pad = 0;}
        else{$persen_pad = round(($realisasi['pad'] / $realisasi['pendapatan'] * 100), 2);}
        
        if($realisasi['transfer']==0){$persen_transfer = 0;}
        else{$persen_transfer = round(($realisasi['transfer'] / $realisasi['pendapatan'] * 100), 2);}
        
        if($realisasi['pad_lain']==0){$persen_pad_lain = 0;}
        else{$persen_pad_lain = round(($realisasi['pad_lain'] / $realisasi['pendapatan'] * 100), 2);}
        
        if($realisasi['realisasi_pendapatan']==0){$persen_realisasi = 0;}
        else{$persen_realisasi = round(($realisasi['realisasi_pendapatan'] / $realisasi['pendapatan']*100), 2);}
        
        $batas=$cek_max['bulan']+1;
        $nama_bulan= null;
        $arr_pad = null;
        $arr_transfer= null;
        $arr_lain2= null;
        $arr_dbh= null;
        $arr_dau= null;
        $arr_dak= null;
        $arr_daknon= null;
        for ($i23 = 1; $i23 < $batas; $i23++)
        {
            $nama_bulan .= "'" . bulan($i23) . "',";
            $row_pad1 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 4.1]);
            $arr_pad .= $row_pad1['realisasi'] . ",";
            $row_transfer1 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 4.2]);
            $arr_transfer .= $row_transfer1['realisasi'] . ",";
            $row_lain21 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.3']);
            $arr_lain2 .= $row_lain21['realisasi'] . ",";
            $row_dbh1= $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.2.1.01.01']);
            $arr_dbh .= $row_dbh1['realisasi'] . ",";
            $row_dau1= $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.2.1.01.02']);
            $arr_dau .= $row_dau1['realisasi'] . ",";
            $row_dak1= $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.2.1.01.03']);
            $arr_dak .= $row_dak1['realisasi'] . ",";
            $row_daknon1= $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.2.1.01.04']);
            $arr_daknon .= $row_daknon1['realisasi'] . ",";
            

            if($i23==$cek_max['bulan'])
            {
                $pad_terakhir=$row_pad1['realisasi'];
                $transfer_terakhir=$row_transfer1['realisasi'];
                $lain2_terakhir=$row_lain21['realisasi'];

                $persen_pad_terakhir=$row_pad1['persen'];
                $persen_transfer_terakhir=$row_transfer1['persen'];
                $persen_lain2_terakhir=$row_lain21['persen'];
            }
        }

        $data = [
            "menu_active" => "pendapatan_skpd",
            "submenu_active" => "",
            "nama_skpd_tampil" => $row_skpd['nama_skpd'],
            "periode" => $periode,
            "nama_skpd" => $nama_skpd,
            "realisasi_skpd" => $realisasi_skpd,
            "nama_skpd1" => $nama_skpd1,
            "realisasi_skpd1" => $realisasi_skpd1,
            "realisasi" => $realisasi,
            "persen_pad" => $persen_pad,
            "persen_transfer" => $persen_transfer,
            "persen_pad_lain" => $persen_pad_lain,
            "persen_realisasi" => $persen_realisasi,
            "periode_pemko" => $periode,
            "nama_bulan" => $nama_bulan,
            "arr_pad" => $arr_pad,
            "arr_transfer" => $arr_transfer,
            "arr_lain2" => $arr_lain2,
            "arr_dbh" => $arr_dbh,
            "arr_dau" => $arr_dau,
            "arr_dak" => $arr_dak,
            "arr_daknon" => $arr_daknon,
            "pad_terakhir" => $pad_terakhir,
            "transfer_terakhir" => $transfer_terakhir,
            "lain2_terakhir" => $lain2_terakhir,
            "persen_pad_terakhir" => $persen_pad_terakhir,
            "persen_transfer_terakhir" => $persen_transfer_terakhir,
            "persen_lain2_terakhir" => $persen_lain2_terakhir,
            "skpd" => $row_skpd,
            "tahun_data" => $tahun
        ];
        $this->load->view('pendapatan/skpd/view_detail', $data);
    }


    public function load_pendapatan()
    {
        //$tahun=2022;
        $skpd = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $row_skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $skpd]);

        $encrypt_id = encrypt_url($skpd);

        $result = $this->mquery->select_by('log_upload', ['id_skpd' => $skpd, 'tahun'=> $tahun, 'st_data'=> 2], "bulan ASC");
        $data = [];
        $no = 0;

        $row_pendapatan = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
        $tgl_papbd=$row_pendapatan['papbd'];
        $tgl_now=date('Y-m-d');
        if($tgl_now<=$tgl_papbd){$st_anggaran=1;}
        else{$st_anggaran=2;}

        foreach ($result as $r) {
            $no++;
            $nama_bulan = "<a href=" . base_url("pendapatan/skpd/detail2/" .$encrypt_id."/". $tahun. "/". $r['bulan']) . ">" . bulan($r['bulan']) . "</a>";
            $row_realisasi_pendapatan = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $r['bulan'], 'kode_rekening' => 4]);
            $row_realisasi_belanja = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $r['bulan'], 'kode_rekening' => 5]);
            $row_users = $this->mquery->select_id('users', ['id_user' => $r['user_input']]);

            if($row_skpd['acuan_pendapatan']==0)
            {
                $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $skpd, 'kode_rekening' => 4, 'st_anggaran' => $st_anggaran]);
                $hsl_pendapatan=$row_anggaran['anggaran'];
            }
            else{$hsl_pendapatan=$row_skpd['pendapatan'];}

            $persen_pendapatan_temp=round(($row_realisasi_pendapatan['realisasi']/$hsl_pendapatan*100),2);

            $row = [
                'no' => $no,
                'tahun' => $tahun,
                'bulan' => $nama_bulan,
                'anggaran_pendapatan' => format_rupiah($hsl_pendapatan),
                'realisasi_pendapatan' => format_rupiah($row_realisasi_pendapatan['realisasi']),
                'persen_pendapatan' => format_rupiah($persen_pendapatan_temp)." %",
                'tanggal_data' => $r['tgl_data'],
                'tanggal_input' => $r['tanggal_input']
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
        $data = [
            "menu_active" => "pendapatan_skpd",
            "submenu_active" => "",
            "skpd" => $skpd,
            "tahun" => $tahun,
            "bulan" => $bulan,
            "nama_periode" => $this->fungsi->nama_bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('pendapatan/skpd/view_detail2', $data);
    }

    public function load_pendapatan2()
    {
       // $tahun=2021;
        $skpd = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $encrypt_id = encrypt_url($skpd);
        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan], "kode_rekening ASC");
        $data = [];
        $no = 0;

        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
        $tgl_papbd=$cek_papbd['papbd'];
        $temp_bulan=substr($tgl_papbd,5,2);
        $hsl_bulan=intval($temp_bulan);

        if($bulan<$hsl_bulan){$st_anggaran=1;}
        else{$st_anggaran=2;}

        foreach ($result as $r) {
            $no++;
            $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'st_anggaran' => $st_anggaran, 'kode_rekening' => $r['kode_rekening']]);
            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $tahun, 'st_anggaran' => $st_anggaran, 'kode_rekening' => $r['kode_rekening']]);
            
            if($row_anggaran['anggaran']==0){$real_pendapatan=0;}
            else{$real_pendapatan=round(($r['realisasi']/$row_anggaran['anggaran']*100),2);}
            
                $row = [
                    'no' => $no,
                    'tahun' => $tahun,
                    'bulan' => bulan($bulan),
                    'kode_rekening' => $r['kode_rekening'],
                    'uraian' => $row_uraian['uraian'],
                    'anggaran' => format_rupiah($row_anggaran['anggaran']),
                    'realisasi' => format_rupiah($r['realisasi']),
                    'persen' => format_rupiah($real_pendapatan)." %"
                ];
                $data[] = $row;
            
        }

        $output['data'] = $data;
        echo json_encode($output);
    }

}
