<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik_model extends CI_Model {
	public function __construct(){
			parent::__construct();			
	}

    public function struktur_anggaran_provinsi($tahun)
    {
        $row_pendapatan = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
        $tgl_papbd=$row_pendapatan['papbd'];
        $tgl_now=date('Y-m-d');
        if($tgl_now<=$tgl_papbd){$hsl_stanggaran=1;}
        else{$hsl_stanggaran=2;}

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 1, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4']);
        $row_pendapatan_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4.1']);
        $row_pad = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4.2']);
        $row_transfer = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4.3']);
        $row_pad_lain = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 3, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4.2.1']);
        $row_pusat = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 3, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4.2.2']);
        $row_dbh_daerah = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 5, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4.2.1.01.01']);
        $row_dbh = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 5, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4.2.1.01.02']);
        $row_dau = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 5, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4.2.1.01.03']);
        $row_dak = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 5, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4.2.1.01.04']);
        $row_daknon = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 5, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4.3.4.01.02']);
        $row_did = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 3, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4.3.5']);
        $row_desa = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 1, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '5']);
        $row_belanja_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '5.1']);
        $row_operasi = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '5.2']);
        $row_modal = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '5.3']);
        $row_takterduga = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '5.4']);
        $row_beltransfer = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '6.2']);
        $row_pembiayaan = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        return array(
            'pendapatan_setting' => (float)($row_pendapatan['pendapatan']),
              'pendapatan_all' => (float)($row_pendapatan_all['anggaran']),
             'pendapatan' => (float)($row_pendapatan['pendapatan']),

            'pad' => (float)($row_pad['anggaran']),
            'transfer' => (float)($row_transfer['anggaran']),
            'pad_lain' => (float)($row_pad_lain['anggaran']),
            'dbh' => (float)($row_dbh['anggaran']),
            'dau' => (float)($row_dau['anggaran']),
            'dak' => (float)($row_dak['anggaran']),
            'daknon' => (float)($row_daknon['anggaran']),
            'did' => (float)($row_did['anggaran']),
            'desa' => (float)($row_desa['anggaran']),
            'pusat' => (float)($row_pusat['anggaran']),
            'dbh_daerah' => (float)($row_dbh_daerah['anggaran']),
            'belanja_setting' => (float)($row_pendapatan['belanja']),
            //'belanja' => (float)($row_belanja_all['anggaran']),
            'belanja' => (float)($row_pendapatan['belanja']),

            'operasi' => (float)($row_operasi['anggaran']),
            'modal' => (float)($row_modal['anggaran']),
            'takterduga' => (float)($row_takterduga['anggaran']),
            'beltransfer' => (float)($row_beltransfer['anggaran']),
            'pembiayaan' => (float)($row_pembiayaan['anggaran'])
        );
    }

    
    public function realisasi_apbd_provinsi($tahun, $bulan)
    {
        $row_pendapatan = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
        $tgl_papbd=$row_pendapatan['papbd'];
        $tgl_now=date('Y-m-d');
        if($tgl_now<=$tgl_papbd){$hsl_stanggaran=1;}
        else{$hsl_stanggaran=2;}

        $batas = $bulan+1;
        $nama_bulan = null;
        $arr_pendapatan = null;
        $arr_belanja = null;
        $arr_belanja_triwulan = null;
        $arr_pad = null;
        $arr_transfer = null;
        $arr_lain2 = null;
        $arr_dbh = null;
        $arr_dau = null;
        $arr_dak = null;
        $arr_daknon = null;
        $arr_operasi = null;
        $arr_modal = null;
        $arr_takterduga = null;
        $arr_beltransfer = null;
        $real_pendapatan_terakhir = 0;
                $real_belanja_terakhir = 0;
                $real_pad_terakhir = 0;
                $real_transfer_terakhir = 0;
                $real_lain2_terakhir = 0;
                $real_dbh_terakhir = 0;
                $real_dau_terakhir = 0;
                $real_dak_terakhir = 0;
                $real_daknon_terakhir = 0;
                $real_operasi_terakhir = 0;
                $real_modal_terakhir = 0;
                $real_takterduga_terakhir = 0;
                $real_beltransfer_terakhir = 0;

        for ($i23 = 1; $i23 < $batas; $i23++) {
            $nama_bulan .= "'" . bulan($i23) . "',";


            // $this->db->select_sum('realisasi');
            // $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4']);
            // $row_real_pendapatan = $this->db->get('data_realisasi_detail_skpd')->row_array();
            // $arr_pendapatan .= (float)($row_real_pendapatan['realisasi']) . ",";

            $result_get_skpd = $this->mquery->select_data('data_skpd');
            $total_row_real_pendapatan=0;
            $total_row_real_belanja=0;
            $total_row_real_pad1=0;
            foreach ($result_get_skpd as $sg) {
                $this->db->select_sum('realisasi');
                $this->db->where(['id_skpd' => $sg['id_skpd'], 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4']);
                $row_real_pendapatan = $this->db->get('data_realisasi_detail_skpd')->row_array();

                $this->db->select_sum('realisasi');
                $this->db->where(['id_skpd' => $sg['id_skpd'], 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '5']);
                $row_real_belanja = $this->db->get('data_realisasi_detail_skpd')->row_array();

                $this->db->select_sum('realisasi');
                $this->db->where(['id_skpd' => $sg['id_skpd'], 'tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.1']);
                $row_pad1 = $this->db->get('data_realisasi_detail_skpd')->row_array();

                if($i23==1)
                {
                    $temp_row_real_pendapatan=$row_real_pendapatan['realisasi'];
                    $temp_row_real_belanja=$row_real_belanja['realisasi'];
                    $temp_row_real_pad1=$row_pad1['realisasi'];
                }
                else
                {
                    if($row_real_pendapatan['realisasi']==0)
                    {
                        $i23_1=$i23-1;
                        $this->db->select_sum('realisasi');
                        $this->db->where(['id_skpd' => $sg['id_skpd'], 'tahun' => $tahun, 'bulan' => $i23_1, 'kode_rekening' => '4']);
                        $row_real_pendapatan_1 = $this->db->get('data_realisasi_detail_skpd')->row_array();
                        $temp_row_real_pendapatan=$row_real_pendapatan_1['realisasi'];

                    }
                    else
                    {$temp_row_real_pendapatan=$row_real_pendapatan['realisasi'];}

                    if($row_real_belanja['realisasi']==0)
                    {
                        $i23_2=$i23-1;
                        $this->db->select_sum('realisasi');
                        $this->db->where(['id_skpd' => $sg['id_skpd'], 'tahun' => $tahun, 'bulan' => $i23_2, 'kode_rekening' => '5']);
                        $row_real_belanja_1 = $this->db->get('data_realisasi_detail_skpd')->row_array();
                        $temp_row_real_belanja=$row_real_belanja_1['realisasi'];

                    }
                    else
                    {$temp_row_real_belanja=$row_real_belanja['realisasi'];}

                    if($row_pad1['realisasi']==0)
                    {
                        $i23_3=$i23-1;
                        $this->db->select_sum('realisasi');
                        $this->db->where(['id_skpd' => $sg['id_skpd'], 'tahun' => $tahun, 'bulan' => $i23_3, 'kode_rekening' => '5']);
                        $row_pad1_1 = $this->db->get('data_realisasi_detail_skpd')->row_array();
                        $temp_row_real_pad1=$row_pad1_1['realisasi'];

                    }
                    else
                    {$temp_row_real_pad1=$row_pad1['realisasi'];}
                }
                $total_row_real_pendapatan=$total_row_real_pendapatan+$temp_row_real_pendapatan;
                $total_row_real_belanja=$total_row_real_belanja+$temp_row_real_belanja;
                $total_row_real_pad1=$total_row_real_pad1+$temp_row_real_pad1;
            }
            $arr_pendapatan .= (float)($total_row_real_pendapatan) . ",";
            $arr_belanja .= (float)($total_row_real_belanja) . ",";
            $arr_pad .= (float)($total_row_real_pad1) . ",";
            
            // $this->db->select_sum('realisasi');
            // $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.1']);
            // $row_pad1 = $this->db->get('data_realisasi_detail_skpd')->row_array();
            // $arr_pad .= (float)($row_pad1['realisasi']) . ",";

            $this->db->select_sum('realisasi');
            $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.2']);
            $row_transfer1 = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $arr_transfer .= (float)($row_transfer1['realisasi']) . ",";

            $this->db->select_sum('realisasi');
            $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.3']);
            $row_lain21 = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $arr_lain2 .= (float)($row_lain21['realisasi']) . ",";

            $this->db->select_sum('realisasi');
            $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.2.1.01.01']);
            $row_dbh1 = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $arr_dbh .= (float)($row_dbh1['realisasi']) . ",";

            $this->db->select_sum('realisasi');
            $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.2.1.01.02']);
            $row_dau1 = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $arr_dau .= (float)($row_dau1['realisasi']) . ",";

            $this->db->select_sum('realisasi');
            $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.2.1.01.03']);
            $row_dak1 = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $arr_dak .= (float)($row_dak1['realisasi']) . ",";

            $this->db->select_sum('realisasi');
            $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.2.1.01.04']);
            $row_daknon1 = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $arr_daknon .= (float)($row_daknon1['realisasi']) . ",";

            // $this->db->select_sum('realisasi');
            // $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '5']);
            // $row_real_belanja = $this->db->get('data_realisasi_detail_skpd')->row_array();
            // $arr_belanja .= (float)($row_real_belanja['realisasi']) . ",";

            if($i23==3 OR $i23==6 OR $i23==9 OR $i23==12)
            {
                $arr_belanja_triwulan .= (float)($total_row_real_belanja) . ",";
            }

            $this->db->select_sum('realisasi');
            $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '5.1']);
            $row_operasi = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $arr_operasi .= (float)($row_operasi['realisasi']) . ",";

            $this->db->select_sum('realisasi');
            $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '5.2']);
            $row_modal = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $arr_modal .= (float)($row_modal['realisasi']) . ",";

            $this->db->select_sum('realisasi');
            $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '5.3']);
            $row_takterduga = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $arr_takterduga .= (float)($row_takterduga['realisasi']) . ",";

            $this->db->select_sum('realisasi');
            $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '5.4']);
            $row_beltransfer = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $arr_beltransfer .= (float)($row_beltransfer['realisasi']) . ",";

            if ($i23 == $bulan) {
                $real_pendapatan_terakhir = $total_row_real_pendapatan;
                $real_belanja_terakhir = $total_row_real_belanja;
                $real_pad_terakhir = $row_pad1['realisasi'];
                $real_transfer_terakhir = $row_transfer1['realisasi'];
                $real_lain2_terakhir = $row_lain21['realisasi'];
                $real_dbh_terakhir = $row_dbh1['realisasi'];
                $real_dau_terakhir = $row_dau1['realisasi'];
                $real_dak_terakhir = $row_dak1['realisasi'];
                $real_daknon_terakhir = $row_daknon1['realisasi'];
                $real_operasi_terakhir = $row_operasi['realisasi'];
                $real_modal_terakhir = $row_modal['realisasi'];
                $real_takterduga_terakhir = $row_takterduga['realisasi'];
                $real_beltransfer_terakhir = $row_beltransfer['realisasi'];
            }
        }

        $this->db->select_max('tgl_data');
        $this->db->from('log_upload');
        $this->db->where(['tahun' => $tahun, 'bulan' => $bulan, 'st_data' => 2]);
        $tanggal_temp = $this->db->get()->row_array();
        $tanggal_data = $tanggal_temp['tgl_data'];
       //$tanggal_data = "2022-07-15";

        return array(
            'pendapatan' => (float)($row_pendapatan['pendapatan']),
            'belanja' => (float)($row_pendapatan['belanja']),
            'nama_bulan' => $nama_bulan,
            'tanggal_data' => $tanggal_data,
            'arr_pendapatan' => $arr_pendapatan,
            'arr_belanja' => $arr_belanja,
            'arr_belanja_triwulan' => $arr_belanja_triwulan,
            'arr_pad' => $arr_pad,
            'arr_transfer' => $arr_transfer,
            'arr_lain2' => $arr_lain2,
            'arr_dbh' => $arr_dbh,
            'arr_dau' => $arr_dau,
            'arr_dak' => $arr_dak,
            'arr_daknon' => $arr_daknon,
            'arr_operasi' => $arr_operasi,
            'arr_modal' => $arr_modal,
            'arr_takterduga' => $arr_takterduga,
            'arr_beltransfer' => $arr_beltransfer,
            'real_pendapatan_terakhir' => $real_pendapatan_terakhir,
            'real_belanja_terakhir' => $real_belanja_terakhir,
            'real_pad_terakhir' => $real_pad_terakhir,
            'real_transfer_terakhir' => $real_transfer_terakhir,
            'real_lain2_terakhir' => $real_lain2_terakhir,
            'real_dbh_terakhir' => $real_dbh_terakhir,
            'real_dau_terakhir' => $real_dau_terakhir,
            'real_dak_terakhir' => $real_dak_terakhir,
            'real_daknon_terakhir' => $real_daknon_terakhir,
            'real_operasi_terakhir' => $real_operasi_terakhir,
            'real_modal_terakhir' => $real_modal_terakhir,
            'real_takterduga_terakhir' => $real_takterduga_terakhir,
            'real_beltransfer_terakhir' => $real_beltransfer_terakhir
        );
    }

    public function realisasi_pb_provinsi($tahun)
    {
        $row_pendapatan = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
        $tgl_papbd=$row_pendapatan['papbd'];
        $tgl_now=date('Y-m-d');
        if($tgl_now<=$tgl_papbd){$hsl_stanggaran=1;}
        else{$hsl_stanggaran=2;}

        $dk_pagu_total=0;
        $dk_real_total=0;
        $tp_pagu_total=0;
        $tp_real_total=0;
        $dak_pagu_total=0;
        $dak_real_total=0;
        $persen_skpd_target=0;
        
        $where = array('tahun' => $tahun, 'jenis' => 1);
        $result_max_dak = $this->mquery->max_data_where("log_upload_realisasi", "bulan", $where);

        $where = array('tahun' => $tahun, 'jenis' => 2);
        $result_max_dk = $this->mquery->max_data_where("log_upload_realisasi", "bulan", $where);

        $where = array('tahun' => $tahun, 'jenis' => 3);
        $result_max_tp = $this->mquery->max_data_where("log_upload_realisasi", "bulan", $where);

        $result_skpd = $this->mquery->select_data('data_skpd');
        $data = [];
        foreach ($result_skpd as $s) {

            //dana dekon
            $this->db->select_sum('pagu');
            $this->db->from('tbl_dana_dekon');
            $this->db->where(['tahun' => $tahun, 'id_skpd' => $s['id_skpd'], 'jenis'=>'DK']);
            $dk_pagu = $this->db->get()->row_array();
            $dk_pagu_opd = $dk_pagu['pagu'];
            $dk_pagu_total=$dk_pagu_total+$dk_pagu_opd;

            $this->db->select_sum('realisasi');
            $this->db->from('tbl_realisasi_dekon');
            $this->db->where(['tahun' => $tahun, 'id_skpd' => $s['id_skpd'], 'jenis'=>'DK', 'bulan' => $result_max_dk['bulan']]);
            $dk_real = $this->db->get()->row_array();
            $dk_real_opd = $dk_real['realisasi'];
            $dk_real_total=$dk_real_total+$dk_real_opd;

            if($dk_pagu_opd==0){$dk_persen_opd=0;}
            else {$dk_persen_opd = round(($dk_real_opd/$dk_pagu_opd*100),2);}
            //dana dekon end

            //dana tp
            $this->db->select_sum('pagu');
            $this->db->from('tbl_dana_dekon');
            $this->db->where(['tahun' => $tahun, 'id_skpd' => $s['id_skpd'], 'jenis'=>'TP']);
            $tp_pagu = $this->db->get()->row_array();
            $tp_pagu_opd = $tp_pagu['pagu'];
            $tp_pagu_total=$tp_pagu_total+$tp_pagu_opd;

            $this->db->select_sum('realisasi');
            $this->db->from('tbl_realisasi_dekon');
            $this->db->where(['tahun' => $tahun, 'id_skpd' => $s['id_skpd'], 'jenis'=>'TP', 'bulan' => $result_max_tp['bulan']]);
            $tp_real = $this->db->get()->row_array();
            $tp_real_opd = $tp_real['realisasi'];
            $tp_real_total=$tp_real_total+$tp_real_opd;

            if($tp_pagu_opd==0){$tp_persen_opd=0;}
            else {$tp_persen_opd = round(($tp_real_opd/$tp_pagu_opd*100),2);}
            //dana tp end
            
            //dana dak
            $this->db->select_sum('total');
            $this->db->from('tbl_data_dak');
            $this->db->where(['tahun' => $tahun, 'id_satker' => $s['id_skpd']]);
            $hsl_pagu_opd = $this->db->get()->row_array();
            
            $dak_pagu_opd = $hsl_pagu_opd['total'];
            $dak_pagu_total=$dak_pagu_total+$dak_pagu_opd;

            $this->db->select_sum('sp2d_total');
            $this->db->from('tbl_realisasi_dak');
            $this->db->where(['tahun' => $tahun, 'bulan' => $result_max_dak['bulan'], 'id_satker' => $s['id_skpd']]);
            $dak_real1 = $this->db->get()->row_array();
            $dak_real_opd = $dak_real1['sp2d_total'];
            $dak_real_total=$dak_real_total+$dak_real_opd;

            if($dak_pagu_opd==0){$dak_persen_opd=0;}
            else {$dak_persen_opd = round(($dak_real_opd/$dak_pagu_opd*100),2);}
            //dana dak end

            $this->db->select_max('bulan');
            $this->db->from('data_realisasi_detail_skpd');
            $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun]);
            $bulan_temp = $this->db->get()->row_array();
            $bulan_max = $bulan_temp['bulan'];

            if($s['acuan_pendapatan']==0)
            {
                $this->db->select_sum('anggaran');
                $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'level' => 2, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4.1']);
                $row_pendapatan_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();
                $hsl_pendapatan=$row_pendapatan_all['anggaran'];
            }
            else{$hsl_pendapatan=$s['pendapatan'];}

            if($s['acuan_belanja']==0)
            {
                $this->db->select_sum('anggaran');
                $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'level' => 1, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '5']);
                $row_belanja_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();
                $hsl_belanja=$row_belanja_all['anggaran'];
            }
            else{$hsl_belanja=$s['belanja'];}
            
            $this->db->select_sum('realisasi');
            $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $bulan_max, 'kode_rekening' => '4.1']);
            $row_real_pendapatan = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $cek_real_pendapatan=$row_real_pendapatan['realisasi'];

            $this->db->select_sum('realisasi');
            $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $bulan_max, 'kode_rekening' => '5']);
            $row_real_belanja = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $cek_real_belanja=$row_real_belanja['realisasi'];

            if($bulan_max==1)
            {
                $hasil_real_pendapatan=$row_real_pendapatan['realisasi'];
                $hasil_real_belanja=$row_real_belanja['realisasi'];
            }
            else
            {
                if($cek_real_pendapatan==0)
                {
                    $bulan_max_1=$bulan_max-1;
                    $this->db->select_sum('realisasi');
                    $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $bulan_max_1, 'kode_rekening' => '4.1']);
                    $row_real_pendapatan_1 = $this->db->get('data_realisasi_detail_skpd')->row_array();
                    $hasil_real_pendapatan=$row_real_pendapatan_1['realisasi'];
                }
                else{$hasil_real_pendapatan=$row_real_pendapatan['realisasi'];}

                if($cek_real_belanja==0)
                {
                    $bulan_max_2=$bulan_max-1;
                    $this->db->select_sum('realisasi');
                    $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $bulan_max_2, 'kode_rekening' => '5']);
                    $row_real_belanja_1 = $this->db->get('data_realisasi_detail_skpd')->row_array();
                    $hasil_real_belanja=$row_real_belanja_1['realisasi'];
                }
                else{$hasil_real_belanja=$row_real_belanja['realisasi'];}
            }
            

            if($hsl_pendapatan==0){$persen_pendapatan=0;}
            else
            {
                $persen_pendapatan=round(($hasil_real_pendapatan/$hsl_pendapatan*100),2);
                $persen_skpd_target=round(($hsl_pendapatan/6280336774225*100),4);
            }

            if($hsl_belanja==0){$persen_belanja=0;}
            else
            {
                $persen_belanja=round(($hasil_real_belanja/$hsl_belanja*100),2);
            }

            if($hasil_real_pendapatan==0){$dis_real_pendapatan=0;}
            else{$dis_real_pendapatan=$hasil_real_pendapatan;}

            $this->db->select_sum('realisasi');
            $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $bulan_max, 'kode_rekening' => '5']);
            $row_serapan = $this->db->get('data_serapan_skpd')->row_array();
            
            if($hsl_belanja==0){$persen_serapan=0;}
            else
            {
                $persen_serapan=round(($row_serapan['realisasi']/$hsl_belanja*100),2);
                if($persen_serapan<=$persen_belanja){$persen_serapan=$persen_belanja;}
            }

            $row = [
                'id_skpd' => $s['id_skpd'],
                'nama_skpd' => $s['nama_skpd'],
                'persen_skpd_belanja' => $persen_belanja,
                'nilai_belanja' => $persen_belanja,
                'persen_skpd_serapan' => $persen_serapan,
                'nilai_serapan' => $persen_serapan,
                'pagu_belanja' => $hsl_belanja,
                'realisasi_belanja' => $hasil_real_belanja,
                'temp_belanja' => $hsl_belanja,
                'persen_skpd_pendapatan' => $persen_pendapatan,
                'nilai_pendapatan' => $persen_pendapatan,
                'persen_skpd_target' => $persen_skpd_target*-1,
                'hsl_pendapatan' => $hsl_pendapatan,
                'realisasi_pendapatan' => $dis_real_pendapatan,
                'nilai_target' => $hsl_pendapatan,
                'dk_pagu_opd' => $dk_pagu_opd,
                'dk_real_opd' => $dk_real_opd,
                'dk_persen_opd' => $dk_persen_opd,
                'nilai_dk_persen' => $dk_persen_opd,
                'nilai_pagu_dk' => $dk_pagu_opd,
                'tp_pagu_opd' => $tp_pagu_opd,
                'tp_real_opd' => $tp_real_opd,
                'tp_persen_opd' => $tp_persen_opd,
                'nilai_tp_persen' => $tp_persen_opd,
                'nilai_pagu_tp' => $tp_pagu_opd,
                'dak_pagu_opd' => $dak_pagu_opd,
                'nilai_pagu_dak' => $dak_pagu_opd,
                'dak_real_opd' => $dak_real_opd,
                'dak_persen_opd' => $dak_persen_opd,
                'nilai_dak_persen' => $dak_persen_opd

            ];
            $data[] = $row;
        }
        $sorting_data = array_sort($data, 'nilai_belanja', SORT_DESC);
        $nama_skpd_belanja = null;
        $persen_skpd_belanja = null;
        $nama_skpd_belanja_sekre = null;
        $persen_skpd_belanja_sekre = null;
        $data_warning = [];
        foreach ($sorting_data as $sort) {
            $nama_skpd_belanja .= "'".$sort['nama_skpd']."',";
            $persen_skpd_belanja .= $sort['persen_skpd_belanja'].",";

            if($sort['id_skpd']>40)
            {
                $nama_skpd_belanja_sekre .= "'".$sort['nama_skpd']."',";
                $persen_skpd_belanja_sekre .= $sort['persen_skpd_belanja'].",";
            }

            $data_warning[] = [
                'id_skpd' => $sort['id_skpd'],
                'nama_skpd' => $sort['nama_skpd'],
                'persen' => $sort['persen_skpd_belanja']
            ];
        }

        $sorting_data0 = array_sort($data, 'nilai_serapan', SORT_DESC);
        $nama_skpd_serapan = null;
        $persen_skpd_serapan = null;
        foreach ($sorting_data0 as $sort0) {
            $nama_skpd_serapan .= "'".$sort0['nama_skpd']."',";
            $persen_skpd_serapan .= $sort0['persen_skpd_serapan'].",";
        }

        $sorting_data1 = array_sort($data, 'nilai_pendapatan', SORT_DESC);
        $nama_skpd_pendapatan = null;
        $persen_skpd_pendapatan = null;
        $persen_skpd_target = null;
        foreach ($sorting_data1 as $sort1) {
            if($sort1['hsl_pendapatan']!=0)
            {
                $nama_skpd_pendapatan .= "'".$sort1['nama_skpd']."',";
                $persen_skpd_pendapatan .= $sort1['persen_skpd_pendapatan'].",";
                $persen_skpd_target .= $sort1['persen_skpd_target'].",";
            }
        }

        $sorting_data2 = array_sort($data, 'nilai_target', SORT_DESC);

        $nama_skpd_target = null;
        $skpd_pendapatan_target = null;
        $skpd_pendapatan_realisasi = null;
        $persen_skpd_pendapatan_target = null;
        foreach ($sorting_data2 as $sort2) {
            if($sort2['hsl_pendapatan']!=0)
            {
                $nama_skpd_target .= "'".$sort2['nama_skpd']."',";
                $skpd_pendapatan_target .= $sort2['hsl_pendapatan'].",";
                $skpd_pendapatan_realisasi .= $sort2['realisasi_pendapatan'].",";
                $persen_skpd_pendapatan_target .= $sort2['persen_skpd_pendapatan'].",";
            }
        }

        $sorting_data3 = array_sort($data, 'nilai_pagu_dk', SORT_DESC);
        $nama_skpd_dk = null;
        $pagu_skpd_dk = null;
        $real_skpd_dk = null;
        foreach ($sorting_data3 as $sort3) {
            if($sort3['dk_pagu_opd']!=0)
            {
                $nama_skpd_dk .= "'".$sort3['nama_skpd']."',";
                $pagu_skpd_dk .= $sort3['dk_pagu_opd'].",";
                $real_skpd_dk .= $sort3['dk_real_opd'].",";
            }
        }

        $sorting_data4 = array_sort($data, 'nilai_pagu_tp', SORT_DESC);
        $nama_skpd_tp = null;
        $pagu_skpd_tp = null;
        $real_skpd_tp = null;
        foreach ($sorting_data4 as $sort4) {
            if($sort4['tp_pagu_opd']!=0)
            {
                $nama_skpd_tp .= "'".$sort4['nama_skpd']."',";
                $pagu_skpd_tp .= $sort4['tp_pagu_opd'].",";
                $real_skpd_tp .= $sort4['tp_real_opd'].",";
            }
        }

        $sorting_data5 = array_sort($data, 'nilai_pagu_dak', SORT_DESC);
        $nama_skpd_dak = null;
        $pagu_skpd_dak = null;
        $real_skpd_dak = null;
        foreach ($sorting_data5 as $sort5) {
            if($sort5['dak_pagu_opd']!=0)
            {
                $nama_skpd_dak .= "'".$sort5['nama_skpd']."',";
                $pagu_skpd_dak .= $sort5['dak_pagu_opd'].",";
                if($sort5['dak_real_opd']!=0){$real_skpd_dak .= $sort5['dak_real_opd'].",";}
                else{$real_skpd_dak .= "0,";}
            }
        }

        $sorting_data6 = array_sort($data, 'nilai_dak_persen', SORT_DESC);
        $nama_skpd_dak_persen = null;
        $persen_dak = null;
        foreach ($sorting_data6 as $sort6) {
            if($sort6['dak_pagu_opd']!=0)
            {
                $nama_skpd_dak_persen .= "'".$sort6['nama_skpd']."',";
                $persen_dak .= $sort6['dak_persen_opd'].",";
            }
        }

        $sorting_data8 = array_sort($data, 'nilai_dk_persen', SORT_DESC);
        $nama_skpd_dk_persen = null;
        $persen_dk = null;
        foreach ($sorting_data8 as $sort8) {
            if($sort8['dk_pagu_opd']!=0)
            {
                $nama_skpd_dk_persen .= "'".$sort8['nama_skpd']."',";
                $persen_dk .= $sort8['dk_persen_opd'].",";
            }
        }

        $sorting_data9 = array_sort($data, 'nilai_tp_persen', SORT_DESC);
        $nama_skpd_tp_persen = null;
        $persen_tp= null;
        foreach ($sorting_data9 as $sort9) {
            if($sort9['tp_pagu_opd']!=0)
            {
                $nama_skpd_tp_persen .= "'".$sort9['nama_skpd']."',";
                $persen_tp .= $sort9['tp_persen_opd'].",";
            }
        }

        $sorting_data10 = array_sort($data, 'temp_belanja', SORT_DESC);
        $nama_skpd_sekre = null;
        $pagu_belanja_sekre = null;
        $realisasi_belanja_sekre = null;
        $pagu_belanja_asekre=0;
        $realisasi_belanja_asekre=0;
        foreach ($sorting_data10 as $sort10) {
            if($sort10['pagu_belanja']!=0)
            {
                if($sort10['id_skpd']>40)
                {
                    $nama_skpd_sekre .= "'".$sort10['nama_skpd']."',";
                    $pagu_belanja_sekre .= $sort10['pagu_belanja'].",";
                    $realisasi_belanja_sekre .= $sort10['realisasi_belanja'].",";
                    $pagu_belanja_asekre=$pagu_belanja_asekre+$sort10['pagu_belanja'];
                    $realisasi_belanja_asekre=$realisasi_belanja_asekre+$sort10['realisasi_belanja'];
                }
            }
        }


        return array(
            'pagu_belanja_asekre' => $pagu_belanja_asekre,
            'realisasi_belanja_asekre' => $realisasi_belanja_asekre,
            'nama_skpd_sekre' => $nama_skpd_sekre,
            'pagu_belanja_sekre' => $pagu_belanja_sekre,
            'realisasi_belanja_sekre' => $realisasi_belanja_sekre,
            'nama_skpd_belanja' => $nama_skpd_belanja,
            'persen_skpd_belanja' => $persen_skpd_belanja,
            'nama_skpd_serapan' => $nama_skpd_serapan,
            'persen_skpd_serapan' => $persen_skpd_serapan,
            'nama_skpd_belanja_sekre' => $nama_skpd_belanja_sekre,
            'persen_skpd_belanja_sekre' => $persen_skpd_belanja_sekre,
            'nama_skpd_pendapatan' => $nama_skpd_pendapatan,
            'persen_skpd_pendapatan' => $persen_skpd_pendapatan,
            'persen_skpd_target' => $persen_skpd_target,
            'data_warning' => $data_warning,
            'nama_skpd_target' => $nama_skpd_target,
            'skpd_pendapatan_target' => $skpd_pendapatan_target,
            'skpd_pendapatan_realisasi' => $skpd_pendapatan_realisasi,
            'persen_skpd_pendapatan_target' => $persen_skpd_pendapatan_target,
            'dk_pagu_total' => $dk_pagu_total,
            'dk_real_total' => $dk_real_total,
            'tp_pagu_total' => $tp_pagu_total,
            'tp_real_total' => $tp_real_total,
            'nama_skpd_dk' => $nama_skpd_dk,
            'pagu_skpd_dk' => $pagu_skpd_dk,
            'real_skpd_dk' => $real_skpd_dk,
            'nama_skpd_dk_persen' => $nama_skpd_dk_persen,
            'persen_dk' => $persen_dk,
            'nama_skpd_tp' => $nama_skpd_tp,
            'pagu_skpd_tp' => $pagu_skpd_tp,
            'real_skpd_tp' => $real_skpd_tp,
            'nama_skpd_tp_persen' => $nama_skpd_tp_persen,
            'persen_tp' => $persen_tp,
            'dak_pagu_total' => $dak_pagu_total,
            'dak_real_total' => $dak_real_total,
            'nama_skpd_dak' => $nama_skpd_dak,
            'pagu_skpd_dak' => $pagu_skpd_dak,
            'real_skpd_dak' => $real_skpd_dak,
            'nama_skpd_dak_persen' => $nama_skpd_dak_persen,
            'persen_dak' => $persen_dak,
            'bulan_dak' => bulan($result_max_dak['bulan'])." ".$tahun,
            'bulan_dk' => bulan($result_max_dk['bulan'])." ".$tahun,
            'bulan_tp' => bulan($result_max_tp['bulan'])." ".$tahun,
            'bulan_max123' => $bulan_max
        );
    }
}