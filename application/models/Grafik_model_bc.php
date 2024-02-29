<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik_model extends CI_Model {
	public function __construct(){
			parent::__construct();			
	}

    public function struktur_anggaran_provinsi($tahun)
    {
        $row_pendapatan = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 1, 'st_anggaran' => 2, 'kode_rekening' => '4']);
        $row_pendapatan_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => 2, 'kode_rekening' => '4.1']);
        $row_pad = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => 2, 'kode_rekening' => '4.2']);
        $row_transfer = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => 2, 'kode_rekening' => '4.3']);
        $row_pad_lain = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 3, 'st_anggaran' => 2, 'kode_rekening' => '4.2.1']);
        $row_pusat = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 3, 'st_anggaran' => 2, 'kode_rekening' => '4.2.2']);
        $row_dbh_daerah = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 5, 'st_anggaran' => 2, 'kode_rekening' => '4.2.1.01.01']);
        $row_dbh = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 5, 'st_anggaran' => 2, 'kode_rekening' => '4.2.1.01.02']);
        $row_dau = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 5, 'st_anggaran' => 2, 'kode_rekening' => '4.2.1.01.03']);
        $row_dak = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 5, 'st_anggaran' => 2, 'kode_rekening' => '4.2.1.01.04']);
        $row_daknon = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 1, 'st_anggaran' => 2, 'kode_rekening' => '5']);
        $row_belanja_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => 2, 'kode_rekening' => '5.1']);
        $row_operasi = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => 2, 'kode_rekening' => '5.2']);
        $row_modal = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => 2, 'kode_rekening' => '5.3']);
        $row_takterduga = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => 2, 'kode_rekening' => '5.4']);
        $row_beltransfer = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

        $this->db->select_sum('anggaran');
        $this->db->where(['tahun' => $tahun, 'level' => 2, 'st_anggaran' => 2, 'kode_rekening' => '6.2']);
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
        $row_pendapatan = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);

        $batas = $bulan + 1;
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
        for ($i23 = 1; $i23 < $batas; $i23++) {
            $nama_bulan .= "'" . bulan($i23) . "',";

            $this->db->select_sum('realisasi');
            $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4']);
            $row_real_pendapatan = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $arr_pendapatan .= (float)($row_real_pendapatan['realisasi']) . ",";
            
            $this->db->select_sum('realisasi');
            $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.1']);
            $row_pad1 = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $arr_pad .= (float)($row_pad1['realisasi']) . ",";

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

            $this->db->select_sum('realisasi');
            $this->db->where(['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '5']);
            $row_real_belanja = $this->db->get('data_realisasi_detail_skpd')->row_array();
            $arr_belanja .= (float)($row_real_belanja['realisasi']) . ",";

            if($i23==3 OR $i23==6 OR $i23==9 OR $i23==12)
            {
                $arr_belanja_triwulan .= (float)($row_real_belanja['realisasi']) . ",";
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
                $real_pendapatan_terakhir = $row_real_pendapatan['realisasi'];
                $real_belanja_terakhir = $row_real_belanja['realisasi'];
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
        $dk_pagu_total=0;
        $dk_real_total=0;
        $tp_pagu_total=0;
        $tp_real_total=0;
        $nama_skpd_dk = null;
        $nama_skpd_tp = null;
        $real_skpd_dk = null;
        $real_skpd_tp = null;
        $result_skpd = $this->mquery->select_data('data_skpd');
        $data = [];
        foreach ($result_skpd as $s) {

            //dana dekon
            $this->db->select_max('pagu');
            $this->db->from('tbl_dana_dekon');
            $this->db->where(['id_skpd' => $s['id_skpd'], 'jenis'=>'DK']);
            $dk_pagu = $this->db->get()->row_array();
            $dk_pagu_opd = $dk_pagu['pagu'];
            $dk_pagu_total=$dk_pagu_total+$dk_pagu_opd;

            $this->db->select_max('realisasi');
            $this->db->from('tbl_dana_dekon');
            $this->db->where(['id_skpd' => $s['id_skpd'], 'jenis'=>'DK']);
            $dk_real = $this->db->get()->row_array();
            $dk_real_opd = $dk_real['realisasi'];
            $dk_real_total=$dk_real_total+$dk_real_opd;

            if($dk_real_opd!=0)
            {
                $nama_skpd_dk .= "'".$s['nama_skpd']."',";
                //$real_skpd_dk .= round(($dk_real_opd/$dk_pagu_opd*100),2).",";
                $real_skpd_dk .= $dk_pagu_opd.",";
            }
            
            $this->db->select_max('pagu');
            $this->db->from('tbl_dana_dekon');
            $this->db->where(['id_skpd' => $s['id_skpd'], 'jenis'=>'TP']);
            $tp_pagu = $this->db->get()->row_array();
            $tp_pagu_opd = $tp_pagu['pagu'];
            $tp_pagu_total=$tp_pagu_total+$tp_pagu_opd;

            $this->db->select_max('realisasi');
            $this->db->from('tbl_dana_dekon');
            $this->db->where(['id_skpd' => $s['id_skpd'], 'jenis'=>'TP']);
            $tp_real = $this->db->get()->row_array();
            $tp_real_opd = $tp_real['realisasi'];
            $tp_real_total=$tp_real_total+$tp_real_opd;

            if($tp_real_opd!=0)
            {
                $nama_skpd_tp .= "'".$s['nama_skpd']."',";
                //$real_skpd_tp .= round(($tp_real_opd/$tp_pagu_opd*100),2).",";
                $real_skpd_tp .= $tp_real_opd.",";
            }
            //dana dekon end

            $this->db->select_max('bulan');
            $this->db->from('data_realisasi_detail_skpd');
            $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun]);
            $bulan_temp = $this->db->get()->row_array();
            $bulan_max = $bulan_temp['bulan'];

            if($s['acuan_pendapatan']==0)
            {
                $this->db->select_sum('anggaran');
                $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'level' => 2, 'st_anggaran' => 2, 'kode_rekening' => '4.1']);
                $row_pendapatan_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();
                $hsl_pendapatan=$row_pendapatan_all['anggaran'];
            }
            else{$hsl_pendapatan=$s['pendapatan'];}

            if($s['acuan_belanja']==0)
            {
                $this->db->select_sum('anggaran');
                $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'level' => 1, 'st_anggaran' => 2, 'kode_rekening' => '5']);
                $row_belanja_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();
                $hsl_belanja=$row_belanja_all['anggaran'];
            }
            else{$hsl_belanja=$s['belanja'];}
            
            $this->db->select_sum('realisasi');
            $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $bulan_max, 'kode_rekening' => '4.1']);
            $row_real_pendapatan = $this->db->get('data_realisasi_detail_skpd')->row_array();
            
            $this->db->select_sum('realisasi');
            $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $bulan_max, 'kode_rekening' => '5']);
            $row_real_belanja = $this->db->get('data_realisasi_detail_skpd')->row_array();

            if($hsl_pendapatan==0){$persen_pendapatan=0;}
            else
            {
                $persen_pendapatan=round(($row_real_pendapatan['realisasi']/$hsl_pendapatan*100),2);
                $persen_skpd_target=round(($hsl_pendapatan/6280336774225*100),4);
            }

            $row = [
                'id_skpd' => $s['id_skpd'],
                'nama_skpd' => $s['nama_skpd'],
                'persen_skpd_belanja' => round(($row_real_belanja['realisasi']/$hsl_belanja*100),2),
                'nilai_belanja' => $row_real_belanja['realisasi']/$hsl_belanja*100,
                'persen_skpd_pendapatan' => $persen_pendapatan,
                'nilai_pendapatan' => $persen_pendapatan,
                'persen_skpd_target' => $persen_skpd_target*-1,
                'hsl_pendapatan' => $hsl_pendapatan,
                'realisasi_pendapatan' => $row_real_pendapatan['realisasi'],
                'nilai_target' => $hsl_pendapatan
            ];
            $data[] = $row;
        }
        $sorting_data = array_sort($data, 'nilai_belanja', SORT_DESC);

        $nama_skpd_belanja = null;
        $persen_skpd_belanja = null;
        $data_warning = [];
        foreach ($sorting_data as $sort) {
            $nama_skpd_belanja .= "'".$sort['nama_skpd']."',";
            $persen_skpd_belanja .= $sort['persen_skpd_belanja'].",";

            $data_warning[] = [
                'id_skpd' => $sort['id_skpd'],
                'nama_skpd' => $sort['nama_skpd'],
                'persen' => $sort['persen_skpd_belanja']
            ];
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

        return array(
            'nama_skpd_belanja' => $nama_skpd_belanja,
            'persen_skpd_belanja' => $persen_skpd_belanja,
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
            'nama_skpd_tp' => $nama_skpd_tp,
            'real_skpd_dk' => $real_skpd_dk,
            'real_skpd_tp' => $real_skpd_tp
        );
    }

    

}