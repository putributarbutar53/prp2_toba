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
    

    public function index()
    {
        $tahun = 2021;
        $bulan_max= 12;
        $bulan_max1= $bulan_max+1;
        $tanggal_data="2021-12-15";

        $arr_nama_kabupaten="";
        $arr_nilai="";
        $arr_pendidikan="";
        $arr_kesehatan="";
        $arr_infrastruktur="";
        $arr_desa="";
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
                $query1 = "SELECT belanja, pendapatan FROM tbl_anggaran_wilayah WHERE id_kabupaten='$id_kabupaten'";
                $hitungjml1=$this->db->query($query1)->row_array();
                $belanja_kab=$hitungjml1['belanja'];
                $pendapatan_kab=$hitungjml1['pendapatan'];
    
                $query1 = "SELECT belanja_realisasi as jml1, pendapatan_realisasi as jml2 FROM tbl_realisasi_wilayah WHERE bulan=12 AND id_kabupaten='$id_kabupaten'";
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

        $query1 = "SELECT sum(pendapatan) as pendapatan, sum(belanja) as belanja FROM tbl_anggaran_wilayah";
        $hitungjml1=$this->db->query($query1)->row_array();
        $totalpendapatan=$hitungjml1['pendapatan']+13481416357958;
        $totalbelanja=$hitungjml1['belanja']+13920416357958;

        $query1 = "SELECT sum(pendapatan_realisasi) as rpendapatan, sum(belanja_realisasi) as rbelanja FROM tbl_realisasi_wilayah WHERE bulan=11";
        $hitungjml1=$this->db->query($query1)->row_array();
        $totalpendapatan_realisasi=$hitungjml1['rpendapatan']+12867798882070;
        $totalbelanja_realisasi=$hitungjml1['rbelanja']+11564683729974;

        $arr_nama_kabupaten123="";
        $result_kabupaten1 = $this->mquery->select_data('ta_kabupaten');
        foreach ($result_kabupaten1 as $hsl1) {
            $id_kabupaten1=$hsl1['id_kabupaten'];

            $query1 = "SELECT belanja, pendapatan FROM tbl_anggaran_wilayah WHERE id_kabupaten='$id_kabupaten1'";
                $hitungjml1=$this->db->query($query1)->row_array();
                $belanja_kab=$hitungjml1['belanja'];

            //coding mandatory
            $row_mdt=$this->mquery->select_id("tbl_mandatory", ['id_kabupaten' => $id_kabupaten1]);
            $row_tkdd=$this->mquery->select_id("tbl_dana_tkdd", ['id_kabupaten' => $id_kabupaten1]);
            $standar_pendidikan=$row_mdt['persen_pendidikan']/100*$belanja_kab;
            $standar_kesehatan=$row_mdt['persen_kesehatan']/100*$belanja_kab;
            $standar_infrastruktur=$row_mdt['infrastruktur'];

            $daundbh=$row_tkdd['dau']+$row_tkdd['dbh'];
            $tkdd_desa=$row_tkdd['desa'];
            if($daundbh==0){$mdt_desa_persen=0;}
            else{
                $mdt_desa=$tkdd_desa/$daundbh*100;
                $mdt_desa_persen=round($mdt_desa,2);
            }
            $standar_lainnya=$tkdd_desa;

            $arr_pendidikan_uu .="20".",";
            $arr_kesehatan_uu .="10".",";
            $arr_infrastruktur_uu .="25".",";
            $arr_desa_uu .="10".",";

            $arr_nama_kabupaten123 .="'".$hsl1['nama_kabupaten']."',";

            if($id_kabupaten1==34)
            {
                $arr_pendidikan .="44.03,";
                $arr_kesehatan .="7.00,";
                $arr_infrastruktur .="25.84,";
                $arr_desa .="0,";
            }
            else
            {
                $arr_pendidikan .=$row_mdt['persen_pendidikan'].",";
                $arr_kesehatan .=$row_mdt['persen_kesehatan'].",";
                $arr_infrastruktur .=$row_mdt['persen_infrestruktur'].",";
                $arr_desa .=$mdt_desa_persen.",";
            }
            

            if($row_mdt['persen_pendidikan']!=0)
            {
            if($row_mdt['persen_pendidikan']<20) 
            {
                $persen1_pendidikan++;
                $nama_pendidikan=$hsl['nama_kabupaten']." (".$row_mdt['persen_pendidikan']." %), ".$nama_pendidikan;
            }
            }

            if($row_mdt['persen_kesehatan']!=0)
            {
            if($row_mdt['persen_kesehatan']<10) 
            {
                $persen1_kesehatan++;
                $nama_kesehatan=$hsl['nama_kabupaten']." (".$row_mdt['persen_kesehatan']." %), ".$nama_kesehatan;
            }
            }

            if($row_mdt['persen_infrestruktur']!=0)
            {
            if($row_mdt['persen_infrestruktur']<25) 
            {
                $persen1_infrastruktur++;
                $nama_infrastruktur=$hsl['nama_kabupaten']." (".$row_mdt['persen_infrestruktur']." %), ".$nama_infrastruktur;
            }
            }

            if($mdt_desa_persen!=0)
            {
            if($mdt_desa_persen<10) 
            {
                $persen1_desa++;
                $nama_desa=$hsl['nama_kabupaten']." (".$mdt_desa_persen." %), ".$nama_desa;
            }
            }
            //mandatory end
        }
        $persen2_pendidikan=$persen1_pendidikan/33*100;
        $persen2_kesehatan=$persen1_kesehatan/33*100;
        $persen2_infrastruktur=$persen1_infrastruktur/33*100;
        $persen2_desa=$persen1_desa/27*100;

        $persen3_pendidikan=round($persen2_pendidikan,2);
        $persen3_kesehatan=round($persen2_kesehatan,2);
        $persen3_infrastruktur=round($persen2_infrastruktur,2);
        $persen3_desa=round($persen2_desa,2);

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
            'nama_desa' => $nama_desa
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
            "arr_pendidikan_uu" => $arr_pendidikan_uu,
            "arr_kesehatan_uu" => $arr_kesehatan_uu,
            "arr_infrastruktur_uu" => $arr_infrastruktur_uu,
            "arr_desa_uu" => $arr_desa_uu,
            "row_mandatory" => $row_mandatory
        ];
        $this->load->view('publik/mandatory/view', $data);
    }
    
    
}
