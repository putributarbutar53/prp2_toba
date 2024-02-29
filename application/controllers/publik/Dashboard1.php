<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard1 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'users');
        $this->load->model('Grafik_model', 'grafik');
        $this->load->model('M_fungsi', 'fungsi');
    }
    

    public function index($tahun=null)
    {
        // $tahun = 2021;
        // $bulan= 12;
        if($tahun==null){$tahun=date('Y');}
        $tanggal_data="2021-12-31";
        $tahun_now=date('Y');
        if($tahun==$tahun_now)
        {
            $this->db->select_max('bulan');
            $this->db->from('log_upload');
            $this->db->where(['tahun' => $tahun, 'st_data' => 2]);
            $bulan_temp = $this->db->get()->row_array();
            $bulan = $bulan_temp['bulan'];
        }
        else{$bulan=12;}
        $bulan_max=$bulan;
        $bulan_max1= $bulan+1;
        

        $total_arus_kas= 0;
        $arr_arus_kas= null;
        $arr_arus_kas_triwulan= null;
        for ($i23 = 1; $i23 < $bulan_max1; $i23++)
        {
            $row_arus_kas = $this->mquery->sum_data('anggarankas_detail', 'nilai', ['tahun' => $tahun, 'bulan' => $i23]);
            $total_arus_kas=$total_arus_kas+$row_arus_kas['nilai'];

            if($i23==12)
            {
                $arr_arus_kas .= 13953318293830 . ",";
                $arr_arus_kas_triwulan .= 13953318293830 . ",";
            }
            else
            {
                $arr_arus_kas .= $total_arus_kas . ",";
            }

            if($i23==3 OR $i23==6 OR $i23==9)
            {
                $arr_arus_kas_triwulan .= $total_arus_kas . ",";
            }
        }
        $struktur_anggaran_provinsi=$this->grafik->struktur_anggaran_provinsi($tahun);
        $realisasi_apbd_provinsi=$this->grafik->realisasi_apbd_provinsi($tahun,$bulan);
        $realisasi_pb_provinsi=$this->grafik->realisasi_pb_provinsi($tahun);

        $row_mdt=$this->mquery->select_id("tbl_mandatory", ['id_kabupaten' => 34, 'st_apbd' => 1, 'tahun' => $tahun]);
        $row_mdt_papbd=$this->mquery->select_id("tbl_mandatory", ['id_kabupaten' => 34, 'st_apbd' => 2, 'tahun' => $tahun]);
        
        
        $row_mandatory = [
            'standar_pendidikan' => $row_mdt['pendidikan'],
            'standar_kesehatan' => $row_mdt['kesehatan'],
            'standar_infrastruktur' => $row_mdt['infrastruktur'],
            'standar_pengawasan' => $row_mdt['pengawasan'],
            'persen_pendidikan' => $row_mdt['persen_pendidikan'],
            'persen_kesehatan' => $row_mdt['persen_kesehatan'],
            'persen_infrastruktur' => $row_mdt['persen_infrestruktur'],
            'persen_pengawasan' => $row_mdt['persen_pengawasan'],

            'standar_pendidikan_papbd' => $row_mdt_papbd['pendidikan'],
            'standar_kesehatan_papbd' => $row_mdt_papbd['kesehatan'],
            'standar_infrastruktur_papbd' => $row_mdt_papbd['infrastruktur'],
            'standar_pengawasan_papbd' => $row_mdt_papbd['pengawasan'],
            'persen_pendidikan_papbd' => $row_mdt_papbd['persen_pendidikan'],
            'persen_kesehatan_papbd' => $row_mdt_papbd['persen_kesehatan'],
            'persen_infrastruktur_papbd' => $row_mdt_papbd['persen_infrestruktur'],
            'persen_pengawasan_papbd' => $row_mdt_papbd['persen_pengawasan']
        ];

        $mandatory_apbd=$row_mdt['persen_pendidikan'].",".$row_mdt['persen_kesehatan'].",".$row_mdt['persen_infrestruktur'].",".$row_mdt['persen_pengawasan'];
        $mandatory_papbd=$row_mdt_papbd['persen_pendidikan'].",".$row_mdt_papbd['persen_kesehatan'].",".$row_mdt_papbd['persen_infrestruktur'].",".$row_mdt_papbd['persen_pengawasan'];
        $mandatory_uu="20,10,25,8";

        $data = [
            "menu_active" => "dashboard",
            "submenu_active" => null,
            "struktur_anggaran_provinsi" => $struktur_anggaran_provinsi,
            "arr_arus_kas" => $arr_arus_kas,
            "arr_arus_kas_triwulan" => $arr_arus_kas_triwulan,
            "realisasi_pb_provinsi" => $realisasi_pb_provinsi,
            "realisasi_apbd_provinsi" => $realisasi_apbd_provinsi,
            "row_mandatory" => $row_mandatory,
            "mandatory_apbd" => $mandatory_apbd,
            "mandatory_papbd" => $mandatory_papbd,
            "mandatory_uu" => $mandatory_uu,
            "tahun_data" => $tahun
        ];
        $this->load->view('publik/dashboard', $data);
    }
    

    public function realisasi_pendapatan()
    {
        $tahun = 2021;
        $bulan= 12;
        $realisasi_apbd_provinsi=$this->grafik->realisasi_apbd_provinsi($tahun,$bulan);
        $realisasi_pb_provinsi=$this->grafik->realisasi_pb_provinsi($tahun);
        $data = [
            "menu_active" => "dashboard",
            "submenu_active" => null,
            "realisasi_apbd_provinsi" => $realisasi_apbd_provinsi,
            "realisasi_pb_provinsi" => $realisasi_pb_provinsi
        ];
        $this->load->view('publik/realisasi_pendapatan', $data);
    }

    public function load_realisasi_pendapatan()
    {
        //$tahun = 2021;
        $tahun = $this->input->post('tahun_data');

        $result_skpd = $this->mquery->select_data('data_skpd');
        $data = [];
        foreach ($result_skpd as $s) {
            $encrypt_id = encrypt_url($s['id_skpd']);

            $this->db->select_max('bulan');
            $this->db->from('data_realisasi_detail_skpd');
            $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun]);
            $bulan_temp = $this->db->get()->row_array();
            $bulan_max = $bulan_temp['bulan'];

            if($s['acuan_pendapatan']==0)
            {
                $this->db->select_sum('anggaran');
                $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'level' => 1, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4']);
                $row_pendapatan_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();
                $hsl_pendapatan_all=$row_pendapatan_all['anggaran'];

                $this->db->select_sum('anggaran');
                $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'level' => 2, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '4.1']);
                $row_pendapatan_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();
                $hsl_pendapatan=$row_pendapatan_all['anggaran'];
            }
            else{$hsl_pendapatan=$s['pendapatan'];}

            $this->db->select_sum('realisasi');
            $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $bulan_max, 'kode_rekening' => '4.1']);
            $row_real_pendapatan = $this->db->get('data_realisasi_detail_skpd')->row_array();
            
            if($hsl_pendapatan==0){$persen_pendapatan=0;}
            else{$persen_pendapatan=round(($row_real_pendapatan['realisasi']/$hsl_pendapatan*100),2);}

            if($persen_pendapatan>51){$tamp_persen_pendapatan="<button class='btn btn-success btn-sm'>".$persen_pendapatan." %</button>";}
            else if($persen_pendapatan>45){$tamp_persen_pendapatan="<button class='btn btn-warning btn-sm'>".$persen_pendapatan." %</button>";}
            else {$tamp_persen_pendapatan="<button class='btn btn-danger btn-sm'>".$persen_pendapatan." %</button>";}
            
            $nama_skpd = "<a href=" . base_url("apbd-opd-provinsi/" . $encrypt_id) . ">" . $s['nama_skpd'] . "</a>";
              

            $row = [
                'nama_skpd' => $nama_skpd,
                'anggaran_all' => format_rupiah($hsl_pendapatan_all),
                'anggaran' => format_rupiah($hsl_pendapatan),
                'realisasi' => format_rupiah($row_real_pendapatan['realisasi']),
                'persen' => $tamp_persen_pendapatan,
                'nilai_short' => $persen_pendapatan
            ];
            $data[] = $row;
        }
        $sorting_data1 = array_sort($data, 'nilai_short', SORT_DESC);
        $data_short = [];
        $no=0;
        foreach ($sorting_data1 as $sort1) {
            if($sort1['anggaran']!=0)
            {
                $no++;
                $data_short[] = [
                    'no' => $no,
                    'nama_skpd' => $sort1['nama_skpd'],
                    'anggaran_all' => $sort1['anggaran_all'],
                    'anggaran' => $sort1['anggaran'],
                    'realisasi' => $sort1['realisasi'],
                    'persen' => $sort1['persen']
                ];
            }
        }
        $output['data'] = $data_short;
        echo json_encode($output);
    }

    public function realisasi_belanja()
    {
        //$tahun = 2021;
        $tahun = $this->input->post('tahun_data');

        $this->db->select_max('bulan');
        $this->db->from('data_realisasi_detail_skpd');
        $this->db->where(['tahun' => $tahun]);
        $bulan_temp = $this->db->get()->row_array();
        $bulan= $bulan_temp['bulan'];
        $batas1=$bulan;
        $batas2=$bulan-1;
        $batas3=$bulan-2;

        $realisasi_apbd_provinsi=$this->grafik->realisasi_apbd_provinsi($tahun,$bulan);
        $realisasi_pb_provinsi=$this->grafik->realisasi_pb_provinsi($tahun);

        $hasil_data_warning=$realisasi_pb_provinsi['data_warning'];
        $nama_skpd_warning = null;
        $bulan_warning1 = null;
        $bulan_warning2 = null;
        $bulan_warning3 = null;
        $nama_skpd_danger = null;
        $bulan_danger1 = null;
        $bulan_danger2 = null;
        $bulan_danger3 = null;
            foreach ($hasil_data_warning as $s) {
               if($s['persen']>51){}
               else if($s['persen']>45)
               {
                $nama_skpd_warning .= "'" . $s['nama_skpd'] . "',";
                $result_skpd = $this->mquery->select_id('data_skpd',['id_skpd' => $s['id_skpd']]);
                if($result_skpd['acuan_belanja']==0)
                {
                    $this->db->select_sum('anggaran');
                    $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'level' => 1, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '5']);
                    $row_belanja_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();
                    $hsl_belanja=$row_belanja_all['anggaran'];
                }
                else{$hsl_belanja=$result_skpd['belanja'];}

                $this->db->select_sum('realisasi');
                $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $batas1, 'kode_rekening' => '5']);
                $row_real_belanja = $this->db->get('data_realisasi_detail_skpd')->row_array();
                if($hsl_belanja==0){$persen_belanja=0;}
                else{$persen_belanja=round(($row_real_belanja['realisasi']/$hsl_belanja*100),2);}
                $bulan_warning1 .= (float)($persen_belanja) . ",";
                
                $this->db->select_sum('realisasi');
                $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $batas2, 'kode_rekening' => '5']);
                $row_real_belanja = $this->db->get('data_realisasi_detail_skpd')->row_array();
                if($hsl_belanja==0){$persen_belanja=0;}
                else{$persen_belanja=round(($row_real_belanja['realisasi']/$hsl_belanja*100),2);}
                $bulan_warning2 .= (float)($persen_belanja) . ",";
                
                $this->db->select_sum('realisasi');
                $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $batas3, 'kode_rekening' => '5']);
                $row_real_belanja = $this->db->get('data_realisasi_detail_skpd')->row_array();
                if($hsl_belanja==0){$persen_belanja=0;}
                else{$persen_belanja=round(($row_real_belanja['realisasi']/$hsl_belanja*100),2);}
                $bulan_warning3 .= (float)($persen_belanja) . ",";
               }
               else
               {
                $nama_skpd_danger .= "'" . $s['nama_skpd'] . "',";
                $result_skpd = $this->mquery->select_id('data_skpd',['id_skpd' => $s['id_skpd']]);
                if($result_skpd['acuan_belanja']==0)
                {
                    $this->db->select_sum('anggaran');
                    $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'level' => 1, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '5']);
                    $row_belanja_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();
                    $hsl_belanja=$row_belanja_all['anggaran'];
                }
                else{$hsl_belanja=$result_skpd['belanja'];}

                $this->db->select_sum('realisasi');
                $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $batas1, 'kode_rekening' => '5']);
                $row_real_belanja = $this->db->get('data_realisasi_detail_skpd')->row_array();
                if($hsl_belanja==0){$persen_belanja=0;}
                else{$persen_belanja=round(($row_real_belanja['realisasi']/$hsl_belanja*100),2);}
                $bulan_danger1 .= (float)($persen_belanja) . ",";
                
                $this->db->select_sum('realisasi');
                $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $batas2, 'kode_rekening' => '5']);
                $row_real_belanja = $this->db->get('data_realisasi_detail_skpd')->row_array();
                if($hsl_belanja==0){$persen_belanja=0;}
                else{$persen_belanja=round(($row_real_belanja['realisasi']/$hsl_belanja*100),2);}
                $bulan_danger2 .= (float)($persen_belanja) . ",";
                
                $this->db->select_sum('realisasi');
                $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $batas3, 'kode_rekening' => '5']);
                $row_real_belanja = $this->db->get('data_realisasi_detail_skpd')->row_array();
                if($hsl_belanja==0){$persen_belanja=0;}
                else{$persen_belanja=round(($row_real_belanja['realisasi']/$hsl_belanja*100),2);}
                $bulan_danger3 .= (float)($persen_belanja) . ",";
               }
            }

        $data = [
            "menu_active" => "dashboard",
            "submenu_active" => null,
            "realisasi_apbd_provinsi" => $realisasi_apbd_provinsi,
            "realisasi_pb_provinsi" => $realisasi_pb_provinsi,
            "nama_skpd_warning" => $nama_skpd_warning,
            "bulan_warning1" => $bulan_warning1,
            "bulan_warning2" => $bulan_warning2,
            "bulan_warning3" => $bulan_warning3,
            "nama_skpd_danger" => $nama_skpd_danger,
            "bulan_danger1" => $bulan_danger1,
            "bulan_danger2" => $bulan_danger2,
            "bulan_danger3" => $bulan_danger3,
            "tahun_data" => $tahun
        ];
        $this->load->view('publik/realisasi_belanja', $data);
    }


    public function load_realisasi_belanja()
    {
        //$tahun = 2021;
        $tahun = $this->input->post('tahun_data');
        $tahun_now=date('Y');

        $row_pendapatan = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
        $tgl_papbd=$row_pendapatan['papbd'];
        $tgl_now=date('Y-m-d');
        if($tgl_now<=$tgl_papbd){$hsl_stanggaran=1;}
        else{$hsl_stanggaran=2;}

        $result_skpd = $this->mquery->select_data('data_skpd');
        $data = [];
        foreach ($result_skpd as $s) {
            $encrypt_id = encrypt_url($s['id_skpd']);
            if($tahun==$tahun_now)
            {
                $this->db->select_max('bulan');
                $this->db->from('data_realisasi_detail_skpd');
                $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun]);
                $bulan_temp = $this->db->get()->row_array();
                $bulan_max = $bulan_temp['bulan'];
            }
            else{$bulan_max=12;}


            if($s['acuan_belanja']==0)
            {
                $this->db->select_sum('anggaran');
                $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'level' => 1, 'st_anggaran' => $hsl_stanggaran, 'kode_rekening' => '5']);
                $row_belanja_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();
                $hsl_belanja=$row_belanja_all['anggaran'];
            }
            else{$hsl_belanja=$s['belanja'];}
            
            $this->db->select_sum('realisasi');
            $this->db->where(['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $bulan_max, 'kode_rekening' => '5']);
            $row_real_belanja = $this->db->get('data_realisasi_detail_skpd')->row_array();

            if($hsl_belanja==0){$persen_belanja=0;}
            else{$persen_belanja=round(($row_real_belanja['realisasi']/$hsl_belanja*100),2);}

            if($persen_belanja>51){$tamp_persen_belanja="<button class='btn btn-success btn-sm'>".$persen_belanja." %</button>";}
            else if($persen_belanja>45){$tamp_persen_belanja="<button class='btn btn-warning btn-sm'>".$persen_belanja." %</button>";}
            else {$tamp_persen_belanja="<button class='btn btn-danger btn-sm'>".$persen_belanja." %</button>";}
            
            $nama_skpd = "<a href=" . base_url("apbd-opd-provinsi/" . $tahun. "/". $encrypt_id) . ">" . $s['nama_skpd'] . "</a>";
              
            $row_data_uraian_pendapatan = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $s['id_skpd'], 'kode_rekening' => 4,'st_anggaran' => $hsl_stanggaran, 'tahun' => $tahun]);
            $total_pendapatan=$row_data_uraian_pendapatan['anggaran'];
            $row_realisasi_pendapatan = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $s['id_skpd'], 'tahun' => $tahun, 'bulan' => $bulan_max, 'kode_rekening' => 4]);
                
            if($total_pendapatan==0){$persen_total_pendapatan=0;}
                else{$persen_total_pendapatan = round(($row_realisasi_pendapatan['realisasi'] / $total_pendapatan * 100), 2);}

                $tampil_pendapatan = "<table class='table-detail' style='width:100%;'>
                    <tr><td>Target</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($total_pendapatan) . "</td></tr>
                    <tr><td>Realisasi</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($row_realisasi_pendapatan['realisasi']) . "</td></tr>
                    <tr><td>Persen</td><td style='text-align:right; font-weight:bold;'>" . $persen_total_pendapatan . "%</td></tr>
                </table>";

            $row = [
                'nama_skpd' => $nama_skpd,
                'bulan' => bulan($bulan_max),
                'pendapatan' => $tampil_pendapatan,
                'anggaran' => format_rupiah($hsl_belanja),
                'realisasi' => format_rupiah($row_real_belanja['realisasi']),
                'persen' => $tamp_persen_belanja,
                'nilai_short' => $persen_belanja
            ];
            $data[] = $row;
        }
        $sorting_data1 = array_sort($data, 'nilai_short', SORT_DESC);
        $data_short = [];
        $no=0;
        foreach ($sorting_data1 as $sort1) {
            if($sort1['anggaran']!=0)
            {
                $no++;
                $data_short[] = [
                    'no' => $no,
                    'nama_skpd' => $sort1['nama_skpd'],
                    'bulan' => $sort1['bulan'],
                    'pendapatan' => $sort1['pendapatan'],
                    'anggaran' => $sort1['anggaran'],
                    'realisasi' => $sort1['realisasi'],
                    'persen' => $sort1['persen']
                ];
            }
        }
        $output['data'] = $data_short;
        echo json_encode($output);
    }
}
