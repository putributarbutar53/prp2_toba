<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skpd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Belanja_model', 'belanja');
        $this->load->model('M_fungsi', 'fungsi');
        $this->akses = is_logged_in();
    }

    public function index()
    {
        $data = [
            "menu_active" => "belanja_skpd",
            "submenu_active" => null
        ];
        $this->load->view('belanja/skpd/view', $data);
    }

    public function load()
    {
        if ($this->akses['role'] == "master" OR $this->akses['role'] == "pakar" OR $this->akses['role'] == "biro") {
            

        $tahun = $this->input->post('tahun');
        $cek_max = $this->mquery->max_data_where('data_realisasi_detail_skpd', 'bulan', ['tahun'=>$tahun]);
        $cek_log_upload = $this->mquery->max_data_where('log_upload', 'bulan', ['tahun'=>$tahun, 'st_data'=>2]);
        $row_log_upload = $this->mquery->select_id('log_upload', ['tahun' => $tahun, 'bulan' => $cek_log_upload['bulan']]);
        $periode = $this->fungsi->nama_bulan($row_log_upload['tgl_data']);

        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['bulan' =>  $cek_max['bulan'], 'tahun'=>$tahun, 'kode_rekening' => 5], 'persen DESC');
        $data = [];
        $no = 0;
        
        $bulan=date('m');
        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
        $tgl_papbd=$cek_papbd['papbd'];
        $temp_bulan=substr($tgl_papbd,5,2);
        $hsl_bulan=intval($temp_bulan);
        if($bulan<$hsl_bulan){$st_anggaran=1;}
        else{$st_anggaran=2;}

        foreach ($result as $r) {
            $encrypt_id = encrypt_url($r['id_skpd']);
            $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $r['id_skpd']]);
            $nama_skpd = "<a href=" . base_url("belanja/skpd/detail/" .$tahun."/" .  $encrypt_id) . ">" . $skpd['nama_skpd'] . "</a>";
            
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
        } else {
            $data = ['status' => FALSE, 'pesan' => 'blocked'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
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

        $bulan=date('m');
        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
        $tgl_papbd=$cek_papbd['papbd'];
        $temp_bulan=substr($tgl_papbd,5,2);
        $hsl_bulan=intval($temp_bulan);
        if($bulan<$hsl_bulan){$st_anggaran=1;}
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

        $row_data_uraian_belanja = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => 5, 'st_anggaran' => $st_anggaran]);
        $total_belanja_pemko_simda=$row_data_uraian_belanja['anggaran'];

        if($row_skpd['acuan_belanja']==0)
            {
                $row_data_uraian_belanja = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => 5, 'st_anggaran' => $st_anggaran]);
                $total_belanja_pemko=$row_data_uraian_belanja['anggaran'];
            }
            else{$total_belanja_pemko=$row_skpd['belanja'];}

        $row_data_uraian_operasi = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => 5.1, 'st_anggaran' => $st_anggaran]);
        $belanja_operasi=$row_data_uraian_operasi['anggaran'];

        $row_data_uraian_modal= $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => 5.2, 'st_anggaran' => $st_anggaran]);
        $belanja_modal=$row_data_uraian_modal['anggaran'];

        $row_data_uraian_takterduga= $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => 5.3, 'st_anggaran' => $st_anggaran]);
        $belanja_takterduga=$row_data_uraian_takterduga['anggaran'];

        $row_data_uraian_transfer= $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'kode_rekening' => 5.4, 'st_anggaran' => $st_anggaran]);
        $belanja_transfer=$row_data_uraian_transfer['anggaran'];

        $row_data_realisasi_belanja = $this->mquery->select_id('data_realisasi_detail_skpd', ['tahun'=>$tahun, 'id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $cek_log_upload['bulan'], 'kode_rekening' => 5]);
        $total_realisasi_pemko=$row_data_realisasi_belanja['realisasi'];

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
        $h_tri=array();
        for ($i23 = 1; $i23 < $batas; $i23++)
        {
            $nama_bulan .= "'" . bulan($i23) . "',";
            $row_data_realisasi_belanja0 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 5]);
            $arr_belanja_all .= $row_data_realisasi_belanja0['realisasi'] . ",";
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
            {
                $arr_arus_kas_triwulan .= $total_arus_kas . ",";
            }

            if($i23==$cek_max['bulan'])
            {
                $belanja_operasi_terakhir=$row_data_realisasi_belanja1['realisasi'];
                $belanja_modal_terakhir=$row_data_realisasi_belanja2['realisasi'];
                $belanja_takterduga_terakhir=$row_data_realisasi_belanja3['realisasi'];
                $belanja_beltransfer_terakhir=$row_data_realisasi_belanja4['realisasi'];

                if($belanja_operasi==0){$persen_belanja_operasi_terakhir=0;}
                else{$persen_belanja_operasi_terakhir = round(($belanja_operasi_terakhir / $belanja_operasi * 100), 2);}
                
                if($belanja_modal==0){$persen_belanja_modal_terakhir=0;}
                else{$persen_belanja_modal_terakhir = round(($belanja_modal_terakhir / $belanja_modal * 100), 2);}
                
                if($belanja_takterduga==0){$persen_belanja_takterduga_terakhir=0;}
                else{$persen_belanja_takterduga_terakhir = round(($belanja_takterduga_terakhir / $belanja_takterduga * 100), 2);}
                
                if($belanja_transfer==0){$persen_belanja_beltransfer_terakhir=0;}
                else{$persen_belanja_beltransfer_terakhir = round(($belanja_beltransfer_terakhir / $belanja_transfer * 100), 2);}
                
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
        if($cek_max['bulan']==1){$arr_target3 .= $h_tri[1] . ",";}
        elseif($cek_max['bulan']==2){$arr_target3 .= $h_tri[2] . ",";}
        elseif($cek_max['bulan']==3){$arr_target3 .= $h_tri[3] . ",";}
        elseif($cek_max['bulan']==4){$arr_target3 .= $h_tri[3] . ","; $arr_target3 .= $h_tri[4] . ",";}
        elseif($cek_max['bulan']==5){$arr_target3 .= $h_tri[3] . ","; $arr_target3 .= $h_tri[5] . ",";}
        elseif($cek_max['bulan']==6){$arr_target3 .= $h_tri[3] . ","; $arr_target3 .= $h_tri[6] . ",";}
        elseif($cek_max['bulan']==7)
        {
            $arr_target3 .= $h_tri[3] . ","; 
            $arr_target3 .= $h_tri[6] . ",";
            $arr_target3 .= $h_tri[7] . ",";
        }
        elseif($cek_max['bulan']==8)
        {
            $arr_target3 .= $h_tri[3] . ","; 
            $arr_target3 .= $h_tri[6] . ",";
            $arr_target3 .= $h_tri[8] . ",";
        }
        elseif($cek_max['bulan']==9)
        {
            $arr_target3 .= $h_tri[3] . ","; 
            $arr_target3 .= $h_tri[6] . ",";
            $arr_target3 .= $h_tri[9] . ",";
        }
        elseif($cek_max['bulan']==10)
        {
            $arr_target3 .= $h_tri[3] . ","; 
            $arr_target3 .= $h_tri[6] . ",";
            $arr_target3 .= $h_tri[9] . ",";
            $arr_target3 .= $h_tri[10] . ",";
        }
        elseif($cek_max['bulan']==11)
        {
            $arr_target3 .= $h_tri[3] . ","; 
            $arr_target3 .= $h_tri[6] . ",";
            $arr_target3 .= $h_tri[9] . ",";
            $arr_target3 .= $h_tri[11] . ",";
        }
        else
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
            "skpd" => $row_skpd,
            "tahun_data" => $tahun
        ];
        $this->load->view('belanja/skpd/view_detail', $data);
    }


    public function load_belanja()
    {
       // $tahun=2021;
        $tahun = $this->input->post('tahun');
        $skpd = $this->input->post('id');
        $row_skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $skpd]);

        if($row_skpd['acuan_belanja']==0)
            {
                $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $skpd, 'kode_rekening' => 5]);
                $hsl_belanja=$row_anggaran['anggaran'];
            }
            else{$hsl_belanja=$row_skpd['belanja'];}

        $encrypt_id = encrypt_url($skpd);
        $result = $this->mquery->select_by('log_upload', ['id_skpd' => $skpd, 'tahun'=> $tahun, 'st_data'=> 2], "bulan ASC");
        $data = [];
        $no = 0;

        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
        $tgl_papbd=$cek_papbd['papbd'];
        $temp_bulan=substr($tgl_papbd,5,2);
        $hsl_bulan=intval($temp_bulan);

        foreach ($result as $r) {
            $no++;
            $nama_bulan = "<a href=" . base_url("belanja/skpd/detail2/" .$encrypt_id."/". $tahun. "/". $r['bulan']) . ">" . bulan($r['bulan']) . "</a>";
            $row_realisasi_pendapatan = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $r['bulan'], 'kode_rekening' => 4]);
            $row_realisasi_belanja = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $r['bulan'], 'kode_rekening' => 5]);
            $row_users = $this->mquery->select_id('users', ['id_user' => $r['user_input']]);
            
            if($r['bulan']<$hsl_bulan){$st_anggaran=1;}
            else{$st_anggaran=2;}

            if($row_skpd['acuan_belanja']==0)
            {
                $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $skpd, 'kode_rekening' => 5, 'st_anggaran' => $st_anggaran]);
                $hsl_belanja=$row_anggaran['anggaran'];
            }
            else{$hsl_pendapatan=$row_skpd['pendapatan'];}

            if($hsl_belanja==0){$persen_temp=0;}
            else{$persen_temp=round(($row_realisasi_belanja['realisasi']/$hsl_belanja*100),2);}

            $row = [
                'no' => $no,
                'tahun' => $tahun,
                'bulan' => $nama_bulan,
                'anggaran_belanja' => format_rupiah($hsl_belanja),
                'realisasi' => format_rupiah($row_realisasi_belanja['realisasi']),
                'persen' => format_rupiah($persen_temp)." %",
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
            "menu_active" => "belanja_skpd",
            "submenu_active" => "",
            "skpd" => $skpd,
            "tahun" => $tahun,
            "bulan" => $bulan,
            "nama_periode" => $this->fungsi->nama_bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('belanja/skpd/view_detail2', $data);
    }

    public function load_belanja2()
    {
        //$tahun=2021;
        $skpd = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $encrypt_id = encrypt_url($skpd);
        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan], "kode_rekening ASC");
        $data = [];
        $no = 0;

        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
        $tgl_papbd=$cek_papbd['papbd'];
        $temp_bulan=substr($tgl_papbd,5,2);
        $hsl_bulan=intval($temp_bulan);

        if($bulan<$hsl_bulan){$st_anggaran=1;}
        else{$st_anggaran=2;}
        foreach ($result as $r) {
            $no++;
            $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'st_anggaran' => $st_anggaran, 'kode_rekening' => $r['kode_rekening']]);
            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $tahun, 'st_anggaran' => $st_anggaran, 'kode_rekening' => $r['kode_rekening']]);
            if($row_anggaran['anggaran']==0){$real_belanja=0;}
            else{$real_belanja=round(($r['realisasi']/$row_anggaran['anggaran']*100),2);}

            
                $row = [
                    'no' => $no,
                    'tahun' => $tahun,
                    'bulan' => bulan($bulan),
                    'kode_rekening' => $r['kode_rekening'],
                    'uraian' => $row_uraian['uraian'],
                    'anggaran' => format_rupiah($row_anggaran['anggaran']),
                    'realisasi' => format_rupiah($r['realisasi']),
                    'persen' => format_rupiah($real_belanja)." %"
                ];
                $data[] = $row;
            
        }

        $output['data'] = $data;
        echo json_encode($output);
    }
}
