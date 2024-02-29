<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mandatory extends CI_Controller
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
        if($tahun==null){$tahun=date('Y');}
        //$tahun = 2022;
        $bulan_max= 12;
        $bulan_max1= $bulan_max+1;
        $tanggal_data="2021-12-15";
        $tahun_now=date('Y');
        if($tahun==$tahun_now){$bulan=date('m');}else{$bulan=12;}
        

        $arr_nama_kabupaten="";
        $arr_nilai="";
        $arr_pendidikan="";
        $arr_kesehatan="";
        $arr_infrastruktur="";
        $arr_desa="";
        $arr_pendidikan_p="";
        $arr_kesehatan_p="";
        $arr_infrastruktur_p="";
        $arr_desa_p="";
        $arr_pendidikan_uu="";
        $arr_kesehatan_uu="";
        $arr_infrastruktur_uu="";
        $arr_desa_uu="";
        $persen1_pendidikan=0;
        $persen1_kesehatan=0;
        $persen1_infrastruktur=0;
        $persen1_desa=0;
        $nama_pendidikan="";
        $nama_kesehatan="";
        $nama_infrastruktur="";
        $nama_desa="";
        $persen1_pendidikan_p=0;
        $persen1_kesehatan_p=0;
        $persen1_infrastruktur_p=0;
        $persen1_desa_p=0;
        $nama_pendidikan_p="";
        $nama_kesehatan_p="";
        $nama_infrastruktur_p="";
        $nama_desa_p="";

        $result_kabupaten = $this->mquery->select_data('ta_kabupaten');
        $data1 = [];
        foreach ($result_kabupaten as $hsl) {
            $id_kabupaten=$hsl['id_kabupaten'];

            if($id_kabupaten==34)
            {
                $this->db->select_sum('anggaran');
                $this->db->where(['tahun' => $tahun, 'level' => 1, 'st_anggaran' => 2, 'kode_rekening' => '4']);
                $row_pendapatan_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();
                $pendapatan_kab=$row_pendapatan_all['anggaran'];

                $this->db->select_sum('anggaran');
                $this->db->where(['tahun' => $tahun, 'level' => 1, 'st_anggaran' => 2, 'kode_rekening' => '5']);
                $row_belanja_all = $this->db->get('data_uraian_kegiatan_skpd')->row_array();
                $belanja_kab=$row_belanja_all['anggaran'];

                $this->db->select_sum('realisasi');
                $this->db->where(['tahun' => $tahun, 'bulan' => 12, 'kode_rekening' => '4']);
                $row_real_pendapatan = $this->db->get('data_realisasi_detail_skpd')->row_array();
                $pendapatan_realisasi_kab = $row_real_pendapatan['realisasi'];

                $this->db->select_sum('realisasi');
                $this->db->where(['tahun' => $tahun, 'bulan' => 12, 'kode_rekening' => '5']);
                $row_real_belanja = $this->db->get('data_realisasi_detail_skpd')->row_array();
                $belanja_realisasi_kab = $row_real_belanja['realisasi'];
            }
            else
            {
                $query1 = "SELECT belanja, pendapatan, belanja_p, pendapatan_p FROM tbl_anggaran_wilayah WHERE id_kabupaten='$id_kabupaten' AND tahun='$tahun'";
                $hitungjml1=$this->db->query($query1)->row_array();
                $belanja_kab=$hitungjml1['belanja_p'];
                $pendapatan_kab=$hitungjml1['pendapatan_p'];
                if($belanja_kab==0)
                {
                    $belanja_kab=$hitungjml1['belanja'];
                    $pendapatan_kab=$hitungjml1['pendapatan'];
                }
    
                $query1 = "SELECT belanja_realisasi as jml1, pendapatan_realisasi as jml2 FROM tbl_realisasi_wilayah WHERE bulan=$bulan  AND tahun='$tahun' AND id_kabupaten='$id_kabupaten'";
                $hitungjml1=$this->db->query($query1)->row_array();
                $belanja_realisasi_kab=$hitungjml1['jml1'];
                $pendapatan_realisasi_kab=$hitungjml1['jml2'];
            }


            if($pendapatan_kab==0){$persen_realisasi_pendapatan=0;}
            else{$persen_realisasi_pendapatan=round(($pendapatan_realisasi_kab/$pendapatan_kab*100),2);}

            if($belanja_kab==0){$persen_realisasi_belanja=0;}
            else{$persen_realisasi_belanja=round(($belanja_realisasi_kab/$belanja_kab*100),2);}

            $row1 = [
                'nama_kabupaten' => $hsl['nama_kabupaten'],
                'persen_realisasi_pendapatan' => $persen_realisasi_pendapatan,
                'nilai_short_pendapatan' => $persen_realisasi_pendapatan,
                'persen_realisasi_belanja' => $persen_realisasi_belanja,
                'nilai_short_belanja' => $persen_realisasi_belanja
            ];
            $data1[] = $row1;
        }

        $sorting_data1 = array_sort($data1, 'nilai_short_pendapatan', SORT_DESC);
        $arr_pendapatan_kab = null;
        $arr_nama_kabupaten_pendapatan = null;
        foreach ($sorting_data1 as $sort1) {
            $arr_nama_kabupaten_pendapatan .= "'" . $sort1['nama_kabupaten'] . "',";
            $arr_pendapatan_kab .= (float)($sort1['persen_realisasi_pendapatan']) . ",";
        }
        
        $sorting_data2 = array_sort($data1, 'nilai_short_belanja', SORT_DESC);
        $arr_belanja_kab = null;
        $arr_nama_kabupaten_belanja = null;
        foreach ($sorting_data2 as $sort1) {
            $arr_nama_kabupaten_belanja .= "'" . $sort1['nama_kabupaten'] . "',";
            $arr_belanja_kab .= (float)($sort1['persen_realisasi_belanja']) . ",";
        }

        $query1 = "SELECT sum(pendapatan) as pendapatan, sum(belanja) as belanja, sum(pendapatan_p) as pendapatan_p, sum(belanja_p) as belanja_p FROM tbl_anggaran_wilayah WHERE  tahun='$tahun'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $belanja_kab=$hitungjml1['belanja_p'];
        $pendapatan_kab=$hitungjml1['pendapatan_p'];
        if($belanja_kab==0)
                {
                    $belanja_kab=$hitungjml1['belanja'];
                    $pendapatan_kab=$hitungjml1['pendapatan'];
                }
        $totalpendapatan=$pendapatan_kab+13687123662525;
        $totalbelanja=$belanja_kab+13953318293830;

        $query1 = "SELECT sum(pendapatan_realisasi) as rpendapatan, sum(belanja_realisasi) as rbelanja FROM tbl_realisasi_wilayah WHERE tahun='$tahun' AND bulan=$bulan";
        $hitungjml1=$this->db->query($query1)->row_array();
        if($tahun==2022)
        {
            $totalpendapatan_realisasi=$hitungjml1['rpendapatan']+0;
            $totalbelanja_realisasi=$hitungjml1['rbelanja']+0;
        }
        else
        {
            $totalpendapatan_realisasi=$hitungjml1['rpendapatan']+13853755513981;
            $totalbelanja_realisasi=$hitungjml1['rbelanja']+12591143869067;
        }

        $arr_nama_kabupaten123="";
        $result_kabupaten1 = $this->mquery->select_data('ta_kabupaten','kode DESC, id_kabupaten ASC');
        foreach ($result_kabupaten1 as $hsl1) {
            $id_kabupaten1=$hsl1['id_kabupaten'];

            $query1 = "SELECT belanja, pendapatan, belanja_p, pendapatan_p FROM tbl_anggaran_wilayah WHERE id_kabupaten='$id_kabupaten1' AND tahun='$tahun'";
                $hitungjml1=$this->db->query($query1)->row_array();
                $belanja_kab=$hitungjml1['belanja_p'];
                if($belanja_kab==0)
                {$belanja_kab=$hitungjml1['belanja'];}

            //coding mandatory
            $row_mdt=$this->mquery->select_id("tbl_mandatory", ['id_kabupaten' => $id_kabupaten1, 'tahun'=>$tahun, 'st_apbd'=>1]);
            $row_mdt_p=$this->mquery->select_id("tbl_mandatory", ['id_kabupaten' => $id_kabupaten1, 'tahun'=>$tahun, 'st_apbd'=>2]);

            $row_tkdd=$this->mquery->select_id("tbl_dana_tkdd", ['id_kabupaten' => $id_kabupaten1, 'tahun'=>$tahun]);

            $daundbh=$row_tkdd['dau']+$row_tkdd['dbh'];
            $tkdd_desa=$row_tkdd['desa'];
            
            if($daundbh==0){$mdt_desa_persen=0; $mdt_desa_persen_p=0;}
            else{
                $mdt_desa=$tkdd_desa/$daundbh*100;
                $mdt_desa_persen=round($mdt_desa,2);
                $mdt_desa_persen_p=round($mdt_desa,2);
            }

            $arr_pendidikan_uu .="20".",";
            $arr_kesehatan_uu .="10".",";
            $arr_infrastruktur_uu .="25".",";
            $arr_desa_uu .="10".",";

            $arr_nama_kabupaten123 .="'".$hsl1['nama_kabupaten']."',";

            $arr_pendidikan .=$row_mdt['persen_pendidikan'].",";
            $arr_kesehatan .=$row_mdt['persen_kesehatan'].",";
            $arr_infrastruktur .=$row_mdt['persen_infrestruktur'].",";
            $arr_desa .=$mdt_desa_persen.",";

            $arr_pendidikan_p .=$row_mdt_p['persen_pendidikan'].",";
            $arr_kesehatan_p .=$row_mdt_p['persen_kesehatan'].",";
            $arr_infrastruktur_p .=$row_mdt_p['persen_infrestruktur'].",";

            if($row_mdt_p['persen_pendidikan']<1)
            {$arr_desa_p .="0,"; $mdt_desa_persen_p=0;}
            else{$arr_desa_p .=$mdt_desa_persen_p.",";}
            
            

            if($row_mdt['persen_pendidikan']!=0)
            {
                if($row_mdt['persen_pendidikan']<20) 
                {
                    $persen1_pendidikan++;
                    $nama_pendidikan .=$hsl1['nama_kabupaten']." (".$row_mdt['persen_pendidikan']." %), ";
                }
            }

            if($row_mdt['persen_kesehatan']!=0)
            {
                if($row_mdt['persen_kesehatan']<10) 
                {
                    $persen1_kesehatan++;
                    $nama_kesehatan .=$hsl1['nama_kabupaten']." (".$row_mdt['persen_kesehatan']." %), ";
                }
            }

            if($row_mdt['persen_infrestruktur']!=0)
            {
                if($row_mdt['persen_infrestruktur']<25) 
                {
                    $persen1_infrastruktur++;
                    $nama_infrastruktur .=$hsl1['nama_kabupaten']." (".$row_mdt['persen_infrestruktur']." %), ";
                }
            }

            if($mdt_desa_persen!=0)
            {
                if($mdt_desa_persen<10) 
                {
                    $persen1_desa++;
                    $nama_desa .=$hsl1['nama_kabupaten']." (".$mdt_desa_persen." %), ";
                }
            }

            if($row_mdt_p['persen_pendidikan']!=0)
            {
                if($row_mdt_p['persen_pendidikan']<20) 
                {
                    $persen1_pendidikan_p++;
                    $nama_pendidikan_p .=$hsl1['nama_kabupaten']." (".$row_mdt_p['persen_pendidikan']." %), ";
                }
            }

            if($row_mdt_p['persen_kesehatan']!=0)
            {
                if($row_mdt_p['persen_kesehatan']<10) 
                {
                    $persen1_kesehatan_p++;
                    $nama_kesehatan_p .=$hsl1['nama_kabupaten']." (".$row_mdt_p['persen_kesehatan']." %), ";
                }
            }

            if($row_mdt_p['persen_infrestruktur']!=0)
            {
                if($row_mdt_p['persen_infrestruktur']<25) 
                {
                    $persen1_infrastruktur_p++;
                    $nama_infrastruktur_p .=$hsl1['nama_kabupaten']." (".$row_mdt_p['persen_infrestruktur']." %), ";
                }
            }

            if($mdt_desa_persen_p!=0)
            {
                if($mdt_desa_persen_p<10) 
                {
                    $persen1_desa_p++;
                    $nama_desa_p .=$hsl1['nama_kabupaten']." (".$mdt_desa_persen_p." %), ";
                }
            }
            //mandatory end
        }
        $persen2_pendidikan=$persen1_pendidikan/34*100;
        $persen2_kesehatan=$persen1_kesehatan/34*100;
        $persen2_infrastruktur=$persen1_infrastruktur/34*100;
        $persen2_desa=$persen1_desa/27*100;

        $persen3_pendidikan=round($persen2_pendidikan,2);
        $persen3_kesehatan=round($persen2_kesehatan,2);
        $persen3_infrastruktur=round($persen2_infrastruktur,2);
        $persen3_desa=round($persen2_desa,2);

        $persen2_pendidikan_p=$persen1_pendidikan_p/34*100;
        $persen2_kesehatan_p=$persen1_kesehatan_p/34*100;
        $persen2_infrastruktur_p=$persen1_infrastruktur_p/34*100;
        $persen2_desa_p=$persen1_desa_p/27*100;

        $persen3_pendidikan_p=round($persen2_pendidikan_p,2);
        $persen3_kesehatan_p=round($persen2_kesehatan_p,2);
        $persen3_infrastruktur_p=round($persen2_infrastruktur_p,2);
        $persen3_desa_p=round($persen2_desa_p,2);

        $row_mandatory = [
            'persen1_pendidikan' => $persen1_pendidikan,
            'persen3_pendidikan' => $persen3_pendidikan,
            'nama_pendidikan' => $nama_pendidikan,
            'persen1_kesehatan' => $persen1_kesehatan,
            'persen3_kesehatan' => $persen3_kesehatan,
            'nama_kesehatan' => $nama_kesehatan,
            'persen1_infrastruktur' => $persen1_infrastruktur,
            'persen3_infrastruktur' => $persen3_infrastruktur,
            'nama_infrastruktur' => $nama_infrastruktur,
            'persen1_desa' => $persen1_desa,
            'persen3_desa' => $persen3_desa,
            'nama_desa' => $nama_desa,
            'persen1_pendidikan_p' => $persen1_pendidikan_p,
            'persen3_pendidikan_p' => $persen3_pendidikan_p,
            'nama_pendidikan_p' => $nama_pendidikan_p,
            'persen1_kesehatan_p' => $persen1_kesehatan_p,
            'persen3_kesehatan_p' => $persen3_kesehatan_p,
            'nama_kesehatan_p' => $nama_kesehatan_p,
            'persen1_infrastruktur_p' => $persen1_infrastruktur_p,
            'persen3_infrastruktur_p' => $persen3_infrastruktur_p,
            'nama_infrastruktur_p' => $nama_infrastruktur_p,
            'persen1_desa_p' => $persen1_desa_p,
            'persen3_desa_p' => $persen3_desa_p,
            'nama_desa_p' => $nama_desa_p
        ];

        $data = [
            "tanggal_data" => $tanggal_data,
            "arr_nama_kabupaten_pendapatan" => $arr_nama_kabupaten_pendapatan,
            "arr_pendapatan_kab" => $arr_pendapatan_kab,
            "arr_nama_kabupaten_belanja" => $arr_nama_kabupaten_belanja,
            "arr_belanja_kab" => $arr_belanja_kab,
            "totalpendapatan" => $totalpendapatan,
            "totalbelanja" => $totalbelanja,
            "totalpendapatan_realisasi" => $totalpendapatan_realisasi,
            "totalbelanja_realisasi" => $totalbelanja_realisasi,
            "arr_nama_kabupaten" => $arr_nama_kabupaten,
            "arr_nama_kabupaten123" => $arr_nama_kabupaten123,
            "arr_pendidikan" => $arr_pendidikan,
            "arr_kesehatan" => $arr_kesehatan,
            "arr_infrastruktur" => $arr_infrastruktur,
            "arr_desa" => $arr_desa,
            "arr_pendidikan_p" => $arr_pendidikan_p,
            "arr_kesehatan_p" => $arr_kesehatan_p,
            "arr_infrastruktur_p" => $arr_infrastruktur_p,
            "arr_desa_p" => $arr_desa_p,
            "arr_pendidikan_uu" => $arr_pendidikan_uu,
            "arr_kesehatan_uu" => $arr_kesehatan_uu,
            "arr_infrastruktur_uu" => $arr_infrastruktur_uu,
            "arr_desa_uu" => $arr_desa_uu,
            "row_mandatory" => $row_mandatory,
            "tahun_data" => $tahun,
            "bulan_data" => $bulan
        ];
        $this->load->view('publik/mandatory/view', $data);
    }
    
    
}
