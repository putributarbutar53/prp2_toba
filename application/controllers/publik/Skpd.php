<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skpd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Belanja_model', 'belanja');
        $this->load->model('M_fungsi', 'fungsi');
    }

    public function index()
    {
        $tahun=2021;
        $cek_max = $this->mquery->max_data_where('data_realisasi_detail_skpd', 'bulan', ['tahun'=>$tahun]);
        $cek_log_upload = $this->mquery->max_data_where('log_upload', 'bulan', ['tahun'=>$tahun, 'st_data'=>2]);
        $row_log_upload = $this->mquery->select_id('log_upload', ['tahun' => $tahun, 'bulan' => $cek_log_upload['bulan']]);
        $periode = $this->fungsi->nama_bulan($row_log_upload['tgl_data']);

        $data = [
            "menu_active" => "belanja_skpd",
            "submenu_active" => null,
            "periode" => $periode
        ];
        $this->load->view('belanja/skpd/view', $data);
    }

    public function load()
    {
        $tahun=2021;
        $cek_max = $this->mquery->max_data_where('data_realisasi_detail_skpd', 'bulan', ['tahun'=>$tahun]);
        $cek_log_upload = $this->mquery->max_data_where('log_upload', 'bulan', ['tahun'=>$tahun, 'st_data'=>2]);
        $row_log_upload = $this->mquery->select_id('log_upload', ['tahun' => $tahun, 'bulan' => $cek_log_upload['bulan']]);
        $periode = $this->fungsi->nama_bulan($row_log_upload['tgl_data']);

        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['bulan' =>  $cek_max['bulan'], 'tahun'=>$tahun, 'kode_rekening' => 5], 'persen DESC');
        $data = [];
        $no = 0;
        
        $bulan=date('m');
        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
        $tgl_papbd=$cek_papbd['papbd'];
        $temp_bulan=substr($tgl_papbd,5,2);
        $hsl_bulan=intval($temp_bulan);
        if($bulan<$hsl_bulan){$st_anggaran=1;}
        else{$st_anggaran=2;}

        foreach ($result as $r) {
            $encrypt_id = encrypt_url($r['id_skpd']);
            $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $r['id_skpd']]);
            $nama_skpd = "<a href=" . base_url("belanja/skpd/detail/" . $encrypt_id) . ">" . $skpd['nama_skpd'] . "</a>";
            
            if($skpd['acuan_belanja']==0)
            {
                $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $r['id_skpd'], 'kode_rekening' => 5, 'st_anggaran' => $st_anggaran]);
                $hsl_belanja=$row_anggaran['anggaran'];
            }
            else{$hsl_belanja=$skpd['belanja'];}

                $persen=round(($r['realisasi']/$hsl_belanja*100),2);
                $no++;
                $row = [
                    'no' => $no,
                    'nama_skpd' => $nama_skpd,
                    'pagu' => "Rp" . number_format($hsl_belanja, 0, ',', '.'),
                    'realisasi' => "Rp" . number_format($r['realisasi'], 0, ',', '.'),
                    'npersen' => $persen ." %"
                ];
                $data[] = $row;
        }
            $output['data'] = $data;
            echo json_encode($output);
       
    }


    public function detail($tahun, $encrypt_id)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $row_skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);

        //$tahun=2021;
        $cek_max = $this->mquery->max_data_where('data_realisasi_detail_skpd', 'bulan', ['id_skpd' => $id_skpd, 'tahun'=>$tahun]);
        $cek_log_upload = $this->mquery->max_data_where('log_upload', 'bulan', ['id_skpd' => $id_skpd, 'tahun'=>$tahun, 'st_data'=>2]);
        $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $cek_log_upload['bulan']]);
        $periode = $this->fungsi->nama_bulan($row_log_upload['tgl_data']);

        $tahun_now=date('Y');
        if($tahun==$tahun_now)
        {
            $cek_max = $this->mquery->max_data_where('data_realisasi_detail_skpd', 'bulan', ['id_skpd' => $id_skpd, 'tahun'=>$tahun]);
            $bulan=$cek_max['bulan'];
        }
        else{$bulan=12;}

        $row_pendapatan = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
        $tgl_papbd=$row_pendapatan['papbd'];
        $tgl_now=date('Y-m-d');
        if($tgl_now<$tgl_papbd){$st_anggaran=1;}
        else{$st_anggaran=2;}

        $nama_skpd = null;
        $realisasi_skpd = null;
        $result_persen_pendapatan = $this->mquery->select_by('data_realisasi_detail_skpd', ['bulan' =>  $cek_max['bulan'], 'tahun'=>$tahun, 'kode_rekening' => 5], 'persen DESC');
        foreach ($result_persen_pendapatan as $persen) :
            if ($persen['persen'] != 0) {
                $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $persen['id_skpd']]);
                $nama_skpd .= "'" . $skpd['nama_skpd'] . "',";
                $realisasi_skpd .= $persen['persen'] . ',';
            }
        endforeach;

        $nama_skpd1 = null;
        $realisasi_skpd1 = null;
        $result_persen_pendapatan1 = $this->mquery->select_by('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'kode_rekening' => 5, 'st_anggaran' => $st_anggaran], 'anggaran DESC');
        foreach ($result_persen_pendapatan1 as $persen) :
            if ($persen['anggaran'] != 0) {
                $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $persen['id_skpd']]);
                $nama_skpd1 .= "'" . $skpd['nama_skpd'] . "',";
                $realisasi_skpd1 .= $persen['anggaran'] . ',';
            }
        endforeach;

        $row_data_uraian_belanja = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $id_skpd, 'kode_rekening' => 5, 'st_anggaran' => $st_anggaran]);
        $total_belanja_pemko_simda=$row_data_uraian_belanja['anggaran'];

        if($row_skpd['acuan_belanja']==0)
            {
                $row_data_uraian_belanja = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $id_skpd, 'kode_rekening' => 5, 'st_anggaran' => $st_anggaran]);
                $total_belanja_pemko=$row_data_uraian_belanja['anggaran'];
            }
            else{$total_belanja_pemko=$row_skpd['belanja'];}

        $row_data_uraian_operasi = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => 5.1, 'st_anggaran' => $st_anggaran]);
        $belanja_operasi=$row_data_uraian_operasi['anggaran'];

        $row_data_uraian_modal= $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => 5.2, 'st_anggaran' => $st_anggaran]);
        $belanja_modal=$row_data_uraian_modal['anggaran'];

        $row_data_uraian_takterduga= $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => 5.3, 'st_anggaran' => $st_anggaran]);
        $belanja_takterduga=$row_data_uraian_takterduga['anggaran'];

        $row_data_uraian_transfer= $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => 5.4, 'st_anggaran' => $st_anggaran]);
        $belanja_transfer=$row_data_uraian_transfer['anggaran'];

        $row_data_realisasi_belanja = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $cek_log_upload['bulan'], 'kode_rekening' => 5]);
        $total_realisasi_pemko=$row_data_realisasi_belanja['realisasi'];

        $row_data_pendapatan = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $id_skpd, 'kode_rekening' => 4, 'st_anggaran' => $st_anggaran, 'tahun' => $tahun]);
        $anggaran_pendapatan=$row_data_pendapatan['anggaran'];

        $row_data_pendapatan_pad = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $id_skpd, 'kode_rekening' => 4.1, 'st_anggaran' => $st_anggaran, 'tahun' => $tahun]);
        $anggaran_pendapatan_pad=$row_data_pendapatan_pad['anggaran'];

        $row_data_belanja = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $id_skpd, 'kode_rekening' => 5, 'st_anggaran' => $st_anggaran, 'tahun' => $tahun]);
        $anggaran_belanja=$row_data_belanja['anggaran'];

        $anggaran = [
        'operasi'=> $belanja_operasi,
        'modal'=> $belanja_modal,
        'takterduga'=>$belanja_takterduga,
        'beltransfer'=>$belanja_transfer,
        'realisasi_belanja'=>$total_realisasi_pemko,
        'belanja_simda'=>$total_belanja_pemko_simda,
        'belanja'=>$total_belanja_pemko
        ];

        
        $persen_operasi = round(($belanja_operasi / $total_belanja_pemko_simda * 100), 2);
        $persen_modal = round(($belanja_modal / $total_belanja_pemko_simda * 100), 2);
        $persen_takterduga = round(($belanja_takterduga / $total_belanja_pemko_simda * 100), 2);
        $persen_beltransfer = round(($belanja_transfer / $total_belanja_pemko_simda * 100), 2);

        $cek_max = $this->mquery->max_data_where('data_realisasi_detail_skpd', 'bulan', ['id_skpd' => $id_skpd, 'tahun'=>$tahun]);
        $cek_log_upload = $this->mquery->max_data_where('log_upload', 'bulan', ['id_skpd' => $id_skpd, 'tahun'=>$tahun, 'st_data'=>2]);
        $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $cek_log_upload['bulan']]);
        $periode_pemko = $this->fungsi->nama_bulan($row_log_upload['tgl_data']);

        $persen_realisasi_belanja = round(($total_realisasi_pemko / $total_belanja_pemko * 100), 2);

        $batas=$cek_max['bulan']+1;
        $nama_bulan= null;
        $arr_belanja_all= null;
        $arr_belanja_operasi= null;
        $arr_belanja_modal= null;
        $arr_belanja_takterduga= null;
        $arr_belanja_beltransfer= null;
        $total_arus_kas= 0;
        $arr_arus_kas= null;
        $arr_arus_kas_triwulan= null;
        $arr_pendapatan= null;
        $arr_pendapatan_pad= null;
        
        if($anggaran_pendapatan_pad==0){$target_pad_bulanan=0;}
        else{$target_pad_bulanan=$anggaran_pendapatan_pad/12;}

        $arr_target_pad= null;
        $get_target_pad=0;
        $h_tri=array();
        for ($i23 = 1; $i23 < $batas; $i23++)
        {
            $nama_bulan .= "'" . bulan($i23) . "',";
            $get_target_pad=$get_target_pad+$target_pad_bulanan;
            $arr_target_pad .=$get_target_pad . ",";

            $row_data_realisasi_belanja0 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 5]);
            if(empty($row_data_realisasi_belanja0['realisasi'])){$arr_belanja_all .= "0,";}
            else{$arr_belanja_all .= $row_data_realisasi_belanja0['realisasi'] . ",";}
            
            $h_tri[$i23]=$row_data_realisasi_belanja0['realisasi'];
            $row_data_realisasi_belanja1 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 5.1]);
            $arr_belanja_operasi .= $row_data_realisasi_belanja1['realisasi'] . ",";
            $row_data_realisasi_belanja2 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 5.2]);
            $arr_belanja_modal .= $row_data_realisasi_belanja2['realisasi'] . ",";
            $row_data_realisasi_belanja3 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 5.3]);
            $arr_belanja_takterduga .= $row_data_realisasi_belanja3['realisasi'] . ",";
            $row_data_realisasi_belanja4 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 5.4]);
            $arr_belanja_beltransfer .= $row_data_realisasi_belanja4['realisasi'] . ",";
            
            $row_arus_kas = $this->mquery->sum_data('anggarankas_detail', 'nilai', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23]);
            $total_arus_kas=$total_arus_kas+$row_arus_kas['nilai'];
            $arr_arus_kas .= $total_arus_kas . ",";
            if($i23==3 OR $i23==6 OR $i23==9 OR $i23==12)
            { $arr_arus_kas_triwulan .= $total_arus_kas . ","; }

            $row_pendapatan = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 4]);
            $arr_pendapatan .= $row_pendapatan['realisasi'] . ",";

            $row_pendapatan_pad = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 4.1]);
            if(empty($row_pendapatan_pad['realisasi'])){$arr_pendapatan_pad .= "0,";}
            else{$arr_pendapatan_pad .= $row_pendapatan_pad['realisasi'] . ",";}
            

            if($i23==$cek_max['bulan'])
            {
                $belanja_operasi_terakhir=$row_data_realisasi_belanja1['realisasi'];
                $belanja_modal_terakhir=$row_data_realisasi_belanja2['realisasi'];
                $belanja_takterduga_terakhir=$row_data_realisasi_belanja3['realisasi'];
                $belanja_beltransfer_terakhir=$row_data_realisasi_belanja4['realisasi'];

                $pendapatan_terakhir=$row_pendapatan['realisasi'];
                $pendapatan_pad_terakhir=$row_pendapatan_pad['realisasi'];

                $belanja_terakhir=$row_data_realisasi_belanja0['realisasi'];

                if($belanja_operasi==0){$persen_belanja_operasi_terakhir=0;}
                else{$persen_belanja_operasi_terakhir = round(($belanja_operasi_terakhir / $belanja_operasi * 100), 2);}
                
                if($belanja_modal==0){$persen_belanja_modal_terakhir=0;}
                else{$persen_belanja_modal_terakhir = round(($belanja_modal_terakhir / $belanja_modal * 100), 2);}
                
                if($belanja_takterduga==0){$persen_belanja_takterduga_terakhir=0;}
                else{$persen_belanja_takterduga_terakhir = round(($belanja_takterduga_terakhir / $belanja_takterduga * 100), 2);}
                
                if($belanja_transfer==0){$persen_belanja_beltransfer_terakhir=0;}
                else{$persen_belanja_beltransfer_terakhir = round(($belanja_beltransfer_terakhir / $belanja_transfer * 100), 2);}
                
                if($anggaran_pendapatan==0){$persen_pendapatan_terakhir=0;}
                else{$persen_pendapatan_terakhir = round(($pendapatan_terakhir / $anggaran_pendapatan * 100), 2);}
                
                if($anggaran_pendapatan_pad==0){$persen_pendapatan_pad_terakhir=0;}
                else{$persen_pendapatan_pad_terakhir = round(($pendapatan_pad_terakhir / $anggaran_pendapatan_pad * 100), 2);}
                
                if($anggaran_belanja==0){$persen_belanja_terakhir=0;}
                else{$persen_belanja_terakhir = round(($belanja_terakhir / $anggaran_belanja * 100), 2);}
            }
        }
        $rt = $this->mquery->select_id('ta_rencana', ['kd_urusan' => $row_skpd['kd_urusan'], 'kd_bidang' => $row_skpd['kd_bidang'], 'kd_unit' => $row_skpd['kd_unit'], 'kd_sub' => $row_skpd['kd_sub']]);
        $arr_belanja_target= null;
        $arr_belanja_target3= null;
        $arr_belanja_target .=$rt['jan'] . ",";
        $arr_belanja_target .=$rt['jan']+$rt['feb'] . ",";
        $arr_belanja_target .=$rt['jan']+$rt['feb']+$rt['mar'] . ",";
        $arr_belanja_target3 .=$rt['jan']+$rt['feb']+$rt['mar'] . ",";
        $arr_belanja_target .=$rt['jan']+$rt['feb']+$rt['mar']+$rt['apr'] . ",";
        $arr_belanja_target .=$rt['jan']+$rt['feb']+$rt['mar']+$rt['apr']+$rt['mei'] . ",";
        $arr_belanja_target .=$rt['jan']+$rt['feb']+$rt['mar']+$rt['apr']+$rt['mei']+$rt['jun'] . ",";
        $arr_belanja_target3 .=$rt['jan']+$rt['feb']+$rt['mar']+$rt['apr']+$rt['mei']+$rt['jun'] . ",";
        $arr_belanja_target .=$rt['jan']+$rt['feb']+$rt['mar']+$rt['apr']+$rt['mei']+$rt['jun']+$rt['jul'] . ",";
        $arr_belanja_target .=$rt['jan']+$rt['feb']+$rt['mar']+$rt['apr']+$rt['mei']+$rt['jun']+$rt['jul']+$rt['agt'] . ",";
        $arr_belanja_target .=$rt['jan']+$rt['feb']+$rt['mar']+$rt['apr']+$rt['mei']+$rt['jun']+$rt['jul']+$rt['agt']+$rt['sep'] . ",";
        $arr_belanja_target3 .=$rt['jan']+$rt['feb']+$rt['mar']+$rt['apr']+$rt['mei']+$rt['jun']+$rt['jul']+$rt['agt']+$rt['sep'] . ",";
        $arr_belanja_target .=$rt['jan']+$rt['feb']+$rt['mar']+$rt['apr']+$rt['mei']+$rt['jun']+$rt['jul']+$rt['agt']+$rt['sep']+$rt['okt'] . ",";
        $arr_belanja_target .=$rt['jan']+$rt['feb']+$rt['mar']+$rt['apr']+$rt['mei']+$rt['jun']+$rt['jul']+$rt['agt']+$rt['sep']+$rt['okt']+$rt['nop'] . ",";
        $arr_belanja_target .=$rt['jan']+$rt['feb']+$rt['mar']+$rt['apr']+$rt['mei']+$rt['jun']+$rt['jul']+$rt['agt']+$rt['sep']+$rt['okt']+$rt['nop']+$rt['des'] . ",";
        $arr_belanja_target3 .=$rt['jan']+$rt['feb']+$rt['mar']+$rt['apr']+$rt['mei']+$rt['jun']+$rt['jul']+$rt['agt']+$rt['sep']+$rt['okt']+$rt['nop']+$rt['des'];
        
        $arr_target3= null;
        if($bulan==1){$arr_target3 .= $h_tri[1];}
        elseif($bulan==2){$arr_target3 .= $h_tri[2];}
        elseif($bulan==3){$arr_target3 .= $h_tri[3];}
        elseif($bulan==4){$arr_target3 .= $h_tri[3] . ","; $arr_target3 .= $h_tri[4] . ",";}
        elseif($bulan==5){$arr_target3 .= $h_tri[3] . ","; $arr_target3 .= $h_tri[5] . ",";}
        elseif($bulan==6){$arr_target3 .= $h_tri[3] . ","; $arr_target3 .= $h_tri[6] . ",";}
        elseif($bulan==7)
        {
            $arr_target3 .= $h_tri[3] . ","; 
            $arr_target3 .= $h_tri[6] . ",";
            $arr_target3 .= $h_tri[7] . ",";
        }
        elseif($bulan==8)
        {
            $arr_target3 .= $h_tri[3] . ","; 
            $arr_target3 .= $h_tri[6] . ",";
            $arr_target3 .= $h_tri[8] . ",";
        }
        elseif($bulan==9)
        {
            $arr_target3 .= $h_tri[3] . ","; 
            $arr_target3 .= $h_tri[6] . ",";
            $arr_target3 .= $h_tri[9] . ",";
        }
        elseif($bulan==10)
        {
            $arr_target3 .= $h_tri[3] . ","; 
            $arr_target3 .= $h_tri[6] . ",";
            $arr_target3 .= $h_tri[9] . ",";
            $arr_target3 .= $h_tri[10] . ",";
        }
        elseif($bulan==11)
        {
            $arr_target3 .= $h_tri[3] . ","; 
            $arr_target3 .= $h_tri[6] . ",";
            $arr_target3 .= $h_tri[9] . ",";
            $arr_target3 .= $h_tri[11] . ",";
        }
        elseif($bulan==12)
        {
            $arr_target3 .= $h_tri[3] . ","; 
            $arr_target3 .= $h_tri[6] . ",";
            $arr_target3 .= $h_tri[9] . ",";
            $arr_target3 .= $h_tri[12] . ",";
        }
        
        $data = [
            "menu_active" => "belanja_skpd",
            "nama_skpd_tampil" => $row_skpd['nama_skpd'],
            "submenu_active" => "",
            "periode" => $periode,
            "periode_pemko" => $periode_pemko,
            "nama_skpd" => $nama_skpd,
            "realisasi_skpd" => $realisasi_skpd,
            "nama_skpd1" => $nama_skpd1,
            "realisasi_skpd1" => $realisasi_skpd1,
            "realisasi" => $anggaran,
            "persen_operasi" => $persen_operasi,
            "persen_modal" => $persen_modal,
            "persen_takterduga" => $persen_takterduga,
            "persen_beltransfer" => $persen_beltransfer,
            "persen_realisasi_belanja" => $persen_realisasi_belanja,
            "nama_bulan" => $nama_bulan,
            "arr_belanja_target3" => $arr_belanja_target3,
            "arr_target3" => $arr_target3,
            "arr_belanja_target" => $arr_belanja_target,
            "arr_belanja_all" => $arr_belanja_all,
            "belanja_terakhir" => $belanja_terakhir,
            "persen_belanja_terakhir" => $persen_belanja_terakhir,
            "anggaran_belanja" => $anggaran_belanja,
            "arr_belanja_operasi" => $arr_belanja_operasi,
            "arr_belanja_modal" => $arr_belanja_modal,
            "arr_belanja_takterduga" => $arr_belanja_takterduga,
            "arr_belanja_beltransfer" => $arr_belanja_beltransfer,
            "belanja_operasi_terakhir" => $belanja_operasi_terakhir,
            "belanja_modal_terakhir" => $belanja_modal_terakhir,
            "belanja_takterduga_terakhir" => $belanja_takterduga_terakhir,
            "belanja_beltransfer_terakhir" => $belanja_beltransfer_terakhir,
            "persen_belanja_operasi_terakhir" => $persen_belanja_operasi_terakhir,
            "persen_belanja_modal_terakhir" => $persen_belanja_modal_terakhir,
            "persen_belanja_takterduga_terakhir" => $persen_belanja_takterduga_terakhir,
            "persen_belanja_beltransfer_terakhir" => $persen_belanja_beltransfer_terakhir,
            "arr_arus_kas" => $arr_arus_kas,
            "arr_arus_kas_triwulan" => $arr_arus_kas_triwulan,
            "arr_pendapatan" => $arr_pendapatan,
            "arr_pendapatan_pad" => $arr_pendapatan_pad,
            "anggaran_pendapatan" => $anggaran_pendapatan,
            "anggaran_pendapatan_pad" => $anggaran_pendapatan_pad,
            "pendapatan_terakhir" => $pendapatan_terakhir,
            "pendapatan_pad_terakhir" => $pendapatan_pad_terakhir,
            "persen_pendapatan_terakhir" => $persen_pendapatan_terakhir,
            "persen_pendapatan_pad_terakhir" => $persen_pendapatan_pad_terakhir,
            "arr_target_pad" => $arr_target_pad,
            "skpd" => $row_skpd,
            "tahun_data" => $tahun
        ];
        $this->load->view('publik/skpd/view_detail', $data);
    }

    public function load_kegiatan()
    {
        $id_skpd = $this->input->post('skpd');
        $tahun = $this->input->post('tahun_data');
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $result = $this->mquery->select_by('ta_kontrak', ['tahun' => $tahun, 'kd_urusan' => $skpd['kd_urusan'],'kd_bidang' => $skpd['kd_bidang'],'kd_unit' => $skpd['kd_unit'],'kd_sub' => $skpd['kd_sub']], 'id_prioritas DESC, id_kegiatan ASC');
        $data = [];
        $no = 0;
        $realisasi_total=0;
        $nilai_total=0;
        $fisik_total=0;
        $jml_input_data=0;
        foreach ($result as $r) {
            $no++;
            $encrypt_id = encrypt_url($r['id_kontrak']);
            $jml_kontrak_pa = $this->mquery->count_data('ta_kontrak_pa', ['id_kontrak' => $r['id_kontrak']]);
            
            if($jml_kontrak_pa==0){$nama_pa="";}
            else{
                $kontrak_pa = $this->mquery->select_id('ta_kontrak_pa', ['id_kontrak' => $r['id_kontrak']]);
                $nama_pa=$kontrak_pa['nama_pa'];
            }

            $no_kontrak=$r['no_kontrak'];

            $hit_kontrak_real = $this->mquery->count_data('data_kontrak_real', ['id_kontrak' => $r['id_kontrak']]);
            if($hit_kontrak_real==0){$realisasi=0;}
            {
                $sum_kontrak_real = $this->mquery->sum_data('data_kontrak_real', 'nilai', ['id_kontrak' => $r['id_kontrak']]);
                $realisasi=$sum_kontrak_real['nilai'];
                $realisasi_total=$realisasi_total+$realisasi;
            }

            if($r['nilai']==0){$persen_real=0;}
            else{
                $persen_real=hitung_persen($realisasi, $r['nilai'], 2);
            }

            $jml_fisik = $this->mquery->count_data('data_kegiatan_detail', ['id_kegiatan' => $r['id_kontrak']]);
            
            if($jml_fisik==0){$realisasi_fisik=0;}
            else{
                $max_realisasi = $this->mquery->max_data_where('data_kegiatan_detail', 'realisasi', ['id_kegiatan' => $r['id_kontrak']]);
                $realisasi_fisik=$max_realisasi['realisasi'];
                $jml_input_data++;
            }

            if($realisasi_fisik>=$persen_real){$tamp_realisasi_fisik="<button class='btn btn-success btn-sm'>".$realisasi_fisik." %</button>";}
            else {$tamp_realisasi_fisik="<button class='btn btn-danger btn-sm'>".$realisasi_fisik." %</button>";}

            if($jml_fisik==0){$tamp_realisasi_fisik="-";}

            $data_kontrak="Nomor : ".$r['no_kontrak']."<br>Tanggal : ".substr($r['tgl_kontrak'],0,10);
            $nilai_total=$nilai_total+$r['nilai'];
            $fisik_total=$fisik_total+$realisasi_fisik;

            
            $keperluan=$r['keperluan'];
            if($r['id_prioritas']!=0)
            {
                if($r['id_prioritas']==1){$keperluan=$keperluan." <img src=".cek_file('images/1.png')." height='20';>";}
                elseif($r['id_prioritas']==2){$keperluan=$keperluan." <img src=".cek_file('images/2.png')." height='20';>";}
                elseif($r['id_prioritas']==3){$keperluan=$keperluan." <img src=".cek_file('images/3.png')." height='20';>";}
                elseif($r['id_prioritas']==4){$keperluan=$keperluan." <img src=".cek_file('images/4.png')." height='20';>";}
                elseif($r['id_prioritas']==5){$keperluan=$keperluan." <img src=".cek_file('images/5.png')." height='20';>";}
                elseif($r['id_prioritas']==6){$keperluan=$keperluan." <img src=".cek_file('images/6.png')." height='20';>";}
                elseif($r['id_prioritas']==7){$keperluan=$keperluan." <img src=".cek_file('images/7.png')." height='20';>";}
                elseif($r['id_prioritas']==8){$keperluan=$keperluan." <img src=".cek_file('images/8.png')." height='20';>";}
                
            }
            $row = [
                'no' => $no,
                'keperluan' => $keperluan,
                'waktu' => $r['waktu'],
                'nilai' => 'Rp '.format_rupiah($r['nilai']),
                'realisasi' => format_rupiah($realisasi)."<br>Persen : ".$persen_real." %",
                'persen' => $tamp_realisasi_fisik
            ];
            $data[] = $row;
        }
        if($no==0){$persen_fisik=0;}else
        {
            $persen_fisik=round(($fisik_total/$no),2);
        }
        if($nilai_total==0){$persen_total=0;}
        else{$persen_total=round(($realisasi_total/$nilai_total*100),2);}
        $array_update =  [
            'realisasi' => $realisasi_total,
            'persen_realisasi' => $persen_total,
            'persen_fisik' => $persen_fisik,
            'jml_input' => $jml_input_data
        ];

        $this->db->update('data_skpd', $array_update, ['id_skpd'=>$id_skpd]);
        
        $output['data'] = $data;
        echo json_encode($output);
    }

}
