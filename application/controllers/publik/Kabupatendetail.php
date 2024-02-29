<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kabupatendetail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'users');
        $this->load->model('Grafik_model', 'grafik');
        $this->load->model('M_fungsi', 'fungsi');
    }
    
    public function index($tahun, $encrypt_id)
    {
        $id_kabupaten = decrypt_url($encrypt_id);

        $result_kabupaten_id = $this->mquery->select_id('ta_kabupaten',['id_kabupaten' => $id_kabupaten]);
   
       // $tahun = 2021;
       // $bulan_max= 12;
       // $bulan_max1= $bulan_max+1;
        $tahun_now=date('Y');
        if($tahun==$tahun_now)
        {
            $this->db->select_max('bulan');
            $this->db->from('tbl_realisasi_wilayah');
            $this->db->where(['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun]);
            $bulan_temp = $this->db->get()->row_array();
            $bulan = $bulan_temp['bulan'];

            $this->db->select_max('periode');
            $last = $this->db->get('tbl_dana_desa_log')->row_array();
            $periode = $this->db->get_where('tbl_dana_desa_log', ['periode' => $last['periode']])->row_array();
            $tahun_desa = $periode['tahun'];
            $bulan_desa = $periode['bulan'];
            $periode_desa = $periode['periode'];

        }
        else{$bulan=12; $bulan_desa = 12;
            $periode_desa = "2021-12-24";}
        $bulan_max=$bulan;
        $bulan_max1= $bulan+1;
        

        

        $row_realisasi = $this->mquery->select_id('tbl_realisasi_wilayah', ['tahun' => $tahun, 'bulan' => $bulan, 'id_kabupaten' => $id_kabupaten]);
        $tanggal_data=$row_realisasi['tanggal'];

        $query1 = "SELECT sum(pendapatan) as pendapatan, sum(belanja) as belanja, sum(pendapatan_p) as pendapatan_p, sum(belanja_p) as belanja_p FROM tbl_anggaran_wilayah WHERE id_kabupaten='$id_kabupaten' AND tahun='$tahun'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $pendapatan=$hitungjml1['pendapatan_p'];
        $belanja=$hitungjml1['belanja_p'];
        if($belanja==0)
        {
            $pendapatan=$hitungjml1['pendapatan'];
            $belanja=$hitungjml1['belanja']; 
        }

        $query1 = "SELECT sum(pad_anggaran) as pad, sum(transfer_anggaran) as transfera, sum(lain_anggaran) as lain FROM tbl_detail_anggaran_wil WHERE id_kabupaten='$id_kabupaten' AND tahun='$tahun'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $pad=$hitungjml1['pad'];
        $transfera=$hitungjml1['transfera'];
        $lain=$hitungjml1['lain'];

        //dana TKDD tabel : tbl_dana_tkdd
        $query1 = "SELECT sum(dbh) as dbh, sum(dau) as dau, sum(dakfisik) as dakfisik, sum(daknon) as daknon, sum(did) as did, sum(desa) as desa FROM tbl_dana_tkdd WHERE id_kabupaten='$id_kabupaten' AND tahun='$tahun'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $dbh=$hitungjml1['dbh'];
        $dau=$hitungjml1['dau'];
        $dakfisik=$hitungjml1['dakfisik'];
        $daknon=$hitungjml1['daknon'];
        $did=$hitungjml1['did'];
        $desa=$hitungjml1['desa'];

        $row_pendapatan = [
            'pendapatan' => $pendapatan,
            'pad' => $pad,
            'transfer' => $transfera,
            'pd_lain' => $lain,
            'dbh' => $dbh,
            'dau' => $dau,
            'dakfisik' => $dakfisik,
            'daknon' => $daknon,
            'did' => $did,
            'desa' => $desa
        ];

        $query1 = "SELECT sum(operasional_anggaran) as operasi, sum(modal_anggaran) as modal, sum(takter_anggaran) as takterduga, sum(beltransfer_anggaran) as beltransfer FROM tbl_detail_anggaran_wil WHERE id_kabupaten='$id_kabupaten'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $operasi=$hitungjml1['operasi'];
        $modal=$hitungjml1['modal'];
        $takterduga=$hitungjml1['takterduga'];
        $beltransfer=$hitungjml1['beltransfer'];

        $row_belanja = [
            'belanja' => $belanja,
            'operasi' => $operasi,
            'modal' => $modal,
            'takterduga' => $takterduga,
            'beltransfer' => $beltransfer
        ];

        $nama_bulan = null;
        $arr_pendapatan = null;
        $arr_belanja = null;
        $arr_belanja_triwulan= null;
        $pendapatan_terakhir = 0;
        $belanja_terakhir = 0;
        for ($i23 = 1; $i23 < $bulan_max1; $i23++)
        {
            $nama_bulan .= "'" . bulan($i23) . "',";
            $row_pendapatan_realisasi = $this->mquery->sum_data('tbl_realisasi_wilayah', 'pendapatan_realisasi', ['id_kabupaten' =>$id_kabupaten, 'tahun' => $tahun, 'bulan' => $i23]);
            $arr_pendapatan .= (float)($row_pendapatan_realisasi['pendapatan_realisasi']) . ",";
            
            $row_belanja_realisasi = $this->mquery->sum_data('tbl_realisasi_wilayah', 'belanja_realisasi', ['id_kabupaten' =>$id_kabupaten, 'tahun' => $tahun, 'bulan' => $i23]);
            $arr_belanja .= (float)($row_belanja_realisasi['belanja_realisasi']) . ",";
            
            if($i23==$bulan_max)
            {
                $pendapatan_terakhir=(float)($row_pendapatan_realisasi['pendapatan_realisasi']);
                $belanja_terakhir=(float)($row_belanja_realisasi['belanja_realisasi']);
            }

            if($i23==3 OR $i23==6 OR $i23==9 OR $i23==12)
            {
                $arr_belanja_triwulan .= (float)($row_belanja_realisasi['belanja_realisasi']) . ",";
            }
        }

        $rst_tbl_desa   = $this->mquery->select_id('tbl_dana_desa',['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun, 'bulan' => $bulan_desa]);
        $gf1_tahap=$rst_tbl_desa['alokasi'].',0';
        $gf1_tahap1='0,'.$rst_tbl_desa['tahap1'];
        $gf1_tahap2='0,'.$rst_tbl_desa['tahap2'];
        $gf1_tahap3='0,'.$rst_tbl_desa['tahap3'];

        $gf1_desa=$rst_tbl_desa['desa'].',0,0,0';
        $gf1_cair='0,'.$rst_tbl_desa['desa1'].','.$rst_tbl_desa['desa2'].','.$rst_tbl_desa['desa3'];
        $gf1_belum='0,'.$rst_tbl_desa['belum1'].','.$rst_tbl_desa['belum2'].','.$rst_tbl_desa['belum3'];

        $row_desa = [
            'gf1_tahap' => $gf1_tahap,
            'gf1_tahap1' => $gf1_tahap1,
            'gf1_tahap2' => $gf1_tahap2,
            'gf1_tahap3' => $gf1_tahap3,
            'gf1_desa' => $gf1_desa,
            'gf1_cair' => $gf1_cair,
            'gf1_belum' => $gf1_belum,
            'total_realisasi' => $rst_tbl_desa['total_realisasi'],
            'persen' => $rst_tbl_desa['persen'],
            'periode_desa' => $periode_desa,
            'bulan_desa' => $bulan_desa
        ];
        // wilayah
        $query1 = "SELECT sum(pendapatan_p) as jml1 FROM tbl_anggaran_wilayah WHERE id_kabupaten='$id_kabupaten' AND tahun='$tahun'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $pendapatan=$hitungjml1['jml1'];

        $query1 = "SELECT sum(belanja_p) as jml1 FROM tbl_anggaran_wilayah WHERE id_kabupaten='$id_kabupaten' AND tahun='$tahun'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $belanja=$hitungjml1['jml1'];

        $row_mdt=$this->mquery->select_id("tbl_mandatory", ['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun, 'st_apbd' => 1]);
        $row_mdt_papbd=$this->mquery->select_id("tbl_mandatory", ['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun, 'st_apbd' => 2]);
        $row_tkdd=$this->mquery->select_id("tbl_dana_tkdd", ['id_kabupaten' => $id_kabupaten]);
        $standar_pendidikan=$row_mdt['persen_pendidikan']/100*$belanja;
        $standar_kesehatan=$row_mdt['persen_kesehatan']/100*$belanja;
        $standar_infrastruktur=$row_mdt['infrastruktur'];

        $standar_pendidikan_papbd=$row_mdt_papbd['persen_pendidikan']/100*$belanja;
        $standar_kesehatan_papbd=$row_mdt_papbd['persen_kesehatan']/100*$belanja;
        
        $daundbh=$row_tkdd['dau']+$row_tkdd['dbh'];
        $tkdd_desa=$row_tkdd['desa'];
        $mdt_desa=$tkdd_desa/$daundbh*100;
        $mdt_desa_persen=round($mdt_desa,2);
        $standar_desa=$tkdd_desa;
        $standar_infrastruktur_papbd=$row_mdt_papbd['persen_infrestruktur']/100*$daundbh;

        if($mdt_desa_persen==0)
        {
            $mandatory_apbd=$row_mdt['persen_pendidikan'].",".$row_mdt['persen_kesehatan'].",".$row_mdt['persen_infrestruktur'];
            $mandatory_papbd=$row_mdt_papbd['persen_pendidikan'].",".$row_mdt_papbd['persen_kesehatan'].",".$row_mdt_papbd['persen_infrestruktur'];
            $mandatory_uu="20,10,25";
            $sortingdata = array($row_mdt['persen_pendidikan'], $row_mdt['persen_kesehatan'], $row_mdt['persen_infrestruktur'], $row_mdt_papbd['persen_pendidikan'], $row_mdt_papbd['persen_kesehatan'],$row_mdt_papbd['persen_infrestruktur']);
            sort($sortingdata);
            $batas_grafik=$sortingdata[5]+10;
        }
        else
        {
            $mandatory_apbd=$row_mdt['persen_pendidikan'].",".$row_mdt['persen_kesehatan'].",".$row_mdt['persen_infrestruktur'].",".$mdt_desa_persen;
            $mandatory_papbd=$row_mdt_papbd['persen_pendidikan'].",".$row_mdt_papbd['persen_kesehatan'].",".$row_mdt_papbd['persen_infrestruktur'].",".$mdt_desa_persen;
            $mandatory_uu="20,10,25,10";
            $sortingdata = array($row_mdt['persen_pendidikan'], $row_mdt['persen_kesehatan'], $row_mdt['persen_infrestruktur'], $row_mdt_papbd['persen_pendidikan'], $row_mdt_papbd['persen_kesehatan'],$row_mdt_papbd['persen_infrestruktur'],$mdt_desa_persen);
            sort($sortingdata);
            $batas_grafik=$sortingdata[6]+10;
        }

        $row_mandatory = [
            'standar_pendidikan' => $standar_pendidikan,
            'standar_kesehatan' => $standar_kesehatan,
            'standar_infrastruktur' => $standar_infrastruktur,
            'standar_desa' => $standar_desa,
            'persen_pendidikan' => $row_mdt['persen_pendidikan'],
            'persen_kesehatan' => $row_mdt['persen_kesehatan'],
            'persen_infrastruktur' => $row_mdt['persen_infrestruktur'],
            'persen_dana_desa' => $mdt_desa_persen,
            'standar_pendidikan_papbd' => $standar_pendidikan_papbd,
            'standar_kesehatan_papbd' => $standar_kesehatan_papbd,
            'standar_infrastruktur_papbd' => $standar_infrastruktur_papbd,
            'persen_pendidikan_papbd' => $row_mdt_papbd['persen_pendidikan'],
            'persen_kesehatan_papbd' => $row_mdt_papbd['persen_kesehatan'],
            'persen_infrastruktur_papbd' => $row_mdt_papbd['persen_infrestruktur']
        ];

        $query1 = "SELECT count(id_kabupaten) as jml1 FROM tbl_dana_desa Where id_kabupaten ='$id_kabupaten'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $cek_st_desa=$hitungjml1['jml1'];

        $data = [
            "row_pendapatan" => $row_pendapatan,
            "nama_bulan" => $nama_bulan,
            "arr_pendapatan" => $arr_pendapatan,
            "tanggal_data" => $tanggal_data,
            "pendapatan_terakhir" => $pendapatan_terakhir,
            "row_belanja" => $row_belanja,
            "arr_belanja" => $arr_belanja,
            "belanja_terakhir" => $belanja_terakhir,
            "result_kabupaten_nama" => $result_kabupaten_id['nama_kabupaten'],
            "mandatory_apbd" => $mandatory_apbd,
            "mandatory_papbd" => $mandatory_papbd,
            "mandatory_uu" => $mandatory_uu,
            "batas_grafik" => $batas_grafik,
            "row_mandatory" => $row_mandatory,
            "arr_belanja_triwulan" => $arr_belanja_triwulan,
            "cek_st_desa" => $cek_st_desa,
            "row_desa" => $row_desa,
            "id_kabupaten" => $id_kabupaten,
            "tahun_data" => $tahun,
            "bulan_data" => $bulan
        ];
        $this->load->view('publik/kabupatendetail/view', $data);
    }
    
    public function khususkota($encrypt_id)
    {
        $id_kabupaten = decrypt_url($encrypt_id);

        $result_kabupaten_id = $this->mquery->select_id('ta_kabupaten',['id_kabupaten' => $id_kabupaten]);
   
        $tahun = 2021;
        $bulan_max= 12;
        $bulan_max1= $bulan_max+1;
        $row_realisasi = $this->mquery->select_id('tbl_realisasi_wilayah', ['bulan' => 12, 'id_kabupaten' => $id_kabupaten]);
        $tanggal_data=$row_realisasi['tanggal'];

        $query1 = "SELECT sum(pendapatan_p) as pendapatan_p, sum(belanja_p) as belanja_p FROM tbl_anggaran_wilayah WHERE id_kabupaten='$id_kabupaten'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $pendapatan=$hitungjml1['pendapatan_p'];
        $belanja=$hitungjml1['belanja_p'];

        $query1 = "SELECT sum(pad_anggaran) as pad, sum(transfer_anggaran) as transfera, sum(lain_anggaran) as lain FROM tbl_detail_anggaran_wil WHERE id_kabupaten='$id_kabupaten'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $pad=$hitungjml1['pad'];
        $transfera=$hitungjml1['transfera'];
        $lain=$hitungjml1['lain'];

        //dana TKDD tabel : tbl_dana_tkdd
        $query1 = "SELECT sum(dbh) as dbh, sum(dau) as dau, sum(dakfisik) as dakfisik, sum(daknon) as daknon, sum(did) as did, sum(desa) as desa FROM tbl_dana_tkdd WHERE id_kabupaten='$id_kabupaten'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $dbh=$hitungjml1['dbh'];
        $dau=$hitungjml1['dau'];
        $dakfisik=$hitungjml1['dakfisik'];
        $daknon=$hitungjml1['daknon'];
        $did=$hitungjml1['did'];
        $desa=$hitungjml1['desa'];

        $row_pendapatan = [
            'pendapatan' => $pendapatan,
            'pad' => $pad,
            'transfer' => $transfera,
            'pd_lain' => $lain,
            'dbh' => $dbh,
            'dau' => $dau,
            'dakfisik' => $dakfisik,
            'daknon' => $daknon,
            'did' => $did,
            'desa' => $desa
        ];

        $query1 = "SELECT sum(operasional_anggaran) as operasi, sum(modal_anggaran) as modal, sum(takter_anggaran) as takterduga, sum(beltransfer_anggaran) as beltransfer FROM tbl_detail_anggaran_wil WHERE id_kabupaten='$id_kabupaten'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $operasi=$hitungjml1['operasi'];
        $modal=$hitungjml1['modal'];
        $takterduga=$hitungjml1['takterduga'];
        $beltransfer=$hitungjml1['beltransfer'];

        $row_belanja = [
            'belanja' => $belanja,
            'operasi' => $operasi,
            'modal' => $modal,
            'takterduga' => $takterduga,
            'beltransfer' => $beltransfer
        ];

        $nama_bulan = null;
        $arr_pendapatan = null;
        $arr_belanja = null;
        $arr_belanja_triwulan= null;
        $pendapatan_terakhir = 0;
        $belanja_terakhir = 0;
        for ($i23 = 1; $i23 < $bulan_max1; $i23++)
        {
            $nama_bulan .= "'" . bulan($i23) . "',";
            $row_pendapatan_realisasi = $this->mquery->sum_data('tbl_realisasi_wilayah', 'pendapatan_realisasi', ['id_kabupaten' =>$id_kabupaten, 'bulan' => $i23]);
            $arr_pendapatan .= (float)($row_pendapatan_realisasi['pendapatan_realisasi']) . ",";
            
            $row_belanja_realisasi = $this->mquery->sum_data('tbl_realisasi_wilayah', 'belanja_realisasi', ['id_kabupaten' =>$id_kabupaten, 'bulan' => $i23]);
            $arr_belanja .= (float)($row_belanja_realisasi['belanja_realisasi']) . ",";
            
            if($i23==$bulan_max)
            {
                $pendapatan_terakhir=(float)($row_pendapatan_realisasi['pendapatan_realisasi']);
                $belanja_terakhir=(float)($row_belanja_realisasi['belanja_realisasi']);
            }

            if($i23==3 OR $i23==6 OR $i23==9 OR $i23==12)
            {
                $arr_belanja_triwulan .= (float)($row_belanja_realisasi['belanja_realisasi']) . ",";
            }
        }

        
        $rst_tbl_desa   = $this->mquery->select_id('tbl_dana_desa',['id_kabupaten' => $id_kabupaten]);
        $gf1_tahap=$rst_tbl_desa['alokasi'].',0';
        $gf1_tahap1='0,'.$rst_tbl_desa['tahap1'];
        $gf1_tahap2='0,'.$rst_tbl_desa['tahap2'];
        $gf1_tahap3='0,'.$rst_tbl_desa['tahap3'];

        $gf1_desa=$rst_tbl_desa['desa'].',0,0,0';
        $gf1_cair='0,'.$rst_tbl_desa['desa1'].','.$rst_tbl_desa['desa2'].','.$rst_tbl_desa['desa3'];
        $gf1_belum='0,'.$rst_tbl_desa['belum1'].','.$rst_tbl_desa['belum2'].','.$rst_tbl_desa['belum3'];

        $row_desa = [
            'gf1_tahap' => $gf1_tahap,
            'gf1_tahap1' => $gf1_tahap1,
            'gf1_tahap2' => $gf1_tahap2,
            'gf1_tahap3' => $gf1_tahap3,
            'gf1_desa' => $gf1_desa,
            'gf1_cair' => $gf1_cair,
            'gf1_belum' => $gf1_belum,
            'total_realisasi' => $rst_tbl_desa['total_realisasi'],
            'persen' => $rst_tbl_desa['persen']
        ];
        

        $row_mdt=$this->mquery->select_id("tbl_mandatory", ['id_kabupaten' => $id_kabupaten, 'tahun'=>$tahun, 'st_apbd' => 1]);
        $row_mdt_papbd=$this->mquery->select_id("tbl_mandatory", ['id_kabupaten' => $id_kabupaten, 'tahun'=>$tahun, 'st_apbd' => 2]);
        $row_tkdd=$this->mquery->select_id("tbl_dana_tkdd", ['id_kabupaten' => $id_kabupaten]);
        $standar_pendidikan=$row_mdt['persen_pendidikan']/100*$belanja;
        $standar_kesehatan=$row_mdt['persen_kesehatan']/100*$belanja;
        $standar_infrastruktur=$row_mdt['infrastruktur'];

        $standar_pendidikan_papbd=$row_mdt_papbd['persen_pendidikan']/100*$belanja;
        $standar_kesehatan_papbd=$row_mdt_papbd['persen_kesehatan']/100*$belanja;
        
        $daundbh=$row_tkdd['dau']+$row_tkdd['dbh'];
        $tkdd_desa=$row_tkdd['desa'];
        $mdt_desa=$tkdd_desa/$daundbh*100;
        $mdt_desa_persen=round($mdt_desa,2);
        $standar_desa=$tkdd_desa;
        $standar_infrastruktur_papbd=$row_mdt_papbd['persen_infrestruktur']/100*$daundbh;

        if($mdt_desa_persen==0)
        {
            $mandatory_apbd=$row_mdt['persen_pendidikan'].",".$row_mdt['persen_kesehatan'].",".$row_mdt['persen_infrestruktur'];
            $mandatory_papbd=$row_mdt_papbd['persen_pendidikan'].",".$row_mdt_papbd['persen_kesehatan'].",".$row_mdt_papbd['persen_infrestruktur'];
            $mandatory_uu="20,10,25";
            $sortingdata = array($row_mdt['persen_pendidikan'], $row_mdt['persen_kesehatan'], $row_mdt['persen_infrestruktur'], $row_mdt_papbd['persen_pendidikan'], $row_mdt_papbd['persen_kesehatan'],$row_mdt_papbd['persen_infrestruktur']);
            sort($sortingdata);
            $batas_grafik=$sortingdata[5]+10;
        }
        else
        {
            $mandatory_apbd=$row_mdt['persen_pendidikan'].",".$row_mdt['persen_kesehatan'].",".$row_mdt['persen_infrestruktur'].",".$mdt_desa_persen;
            $mandatory_papbd=$row_mdt_papbd['persen_pendidikan'].",".$row_mdt_papbd['persen_kesehatan'].",".$row_mdt_papbd['persen_infrestruktur'].",".$mdt_desa_persen;
            $mandatory_uu="20,10,25,10";
            $sortingdata = array($row_mdt['persen_pendidikan'], $row_mdt['persen_kesehatan'], $row_mdt['persen_infrestruktur'], $row_mdt_papbd['persen_pendidikan'], $row_mdt_papbd['persen_kesehatan'],$row_mdt_papbd['persen_infrestruktur'],$mdt_desa_persen);
            sort($sortingdata);
            $batas_grafik=$sortingdata[6]+10;
        }

        $row_mandatory = [
            'standar_pendidikan' => $standar_pendidikan,
            'standar_kesehatan' => $standar_kesehatan,
            'standar_infrastruktur' => $standar_infrastruktur,
            'standar_desa' => $standar_desa,
            'persen_pendidikan' => $row_mdt['persen_pendidikan'],
            'persen_kesehatan' => $row_mdt['persen_kesehatan'],
            'persen_infrastruktur' => $row_mdt['persen_infrestruktur'],
            'persen_dana_desa' => $mdt_desa_persen,
            'standar_pendidikan_papbd' => $standar_pendidikan_papbd,
            'standar_kesehatan_papbd' => $standar_kesehatan_papbd,
            'standar_infrastruktur_papbd' => $standar_infrastruktur_papbd,
            'persen_pendidikan_papbd' => $row_mdt_papbd['persen_pendidikan'],
            'persen_kesehatan_papbd' => $row_mdt_papbd['persen_kesehatan'],
            'persen_infrastruktur_papbd' => $row_mdt_papbd['persen_infrestruktur']
        ];

        $query1 = "SELECT count(id_kabupaten) as jml1 FROM tbl_dana_desa Where id_kabupaten ='$id_kabupaten' AND tahun='$tahun'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $cek_st_desa=$hitungjml1['jml1'];

        $data = [
            "row_pendapatan" => $row_pendapatan,
            "nama_bulan" => $nama_bulan,
            "arr_pendapatan" => $arr_pendapatan,
            "tanggal_data" => $tanggal_data,
            "pendapatan_terakhir" => $pendapatan_terakhir,
            "row_belanja" => $row_belanja,
            "arr_belanja" => $arr_belanja,
            "belanja_terakhir" => $belanja_terakhir,
            "result_kabupaten_nama" => $result_kabupaten_id['nama_kabupaten'],
            "mandatory_apbd" => $mandatory_apbd,
            "mandatory_papbd" => $mandatory_papbd,
            "mandatory_uu" => $mandatory_uu,
            "batas_grafik" => $batas_grafik,
            "row_mandatory" => $row_mandatory,
            "arr_belanja_triwulan" => $arr_belanja_triwulan,
            "cek_st_desa" => $cek_st_desa,
            "row_desa" => $row_desa,
            "id_kabupaten" => $id_kabupaten
        ];
        $this->load->view('publik/kabupatendetail/view_kota', $data);
    }
    
    public function load_realisasi_belanja()
    {
        $result_kabupaten = $this->mquery->select_data('ta_kabupaten');
        $data = [];
        foreach ($result_kabupaten as $hsl) {
            $id_kabupaten=$hsl['id_kabupaten'];
            $encrypt_id = encrypt_url($id_kabupaten);
            $query1 = "SELECT belanja_p, pendapatan_p FROM tbl_anggaran_wilayah WHERE id_kabupaten='$id_kabupaten'";
            $hitungjml1=$this->db->query($query1)->row_array();
            $belanja_kab=$hitungjml1['belanja_p'];
            $pendapatan_kab=$hitungjml1['pendapatan_p'];

            $query1 = "SELECT belanja_realisasi as jml1, pendapatan_realisasi as jml2 FROM tbl_realisasi_wilayah WHERE bulan=12 AND id_kabupaten='$id_kabupaten'";
            $hitungjml1=$this->db->query($query1)->row_array();
            $belanja_realisasi_kab=$hitungjml1['jml1'];
            $pendapatan_realisasi_kab=$hitungjml1['jml2'];

            if($pendapatan_kab==0){$persen_realisasi_pendapatan=0;}
            else{$persen_realisasi_pendapatan=round(($pendapatan_realisasi_kab/$pendapatan_kab*100),2);}

            if($belanja_kab==0){$persen_realisasi_belanja=0;}
            else{$persen_realisasi_belanja=round(($belanja_realisasi_kab/$belanja_kab*100),2);}
            
            $nama_kabupaten = "<a href=" . base_url("kabupaten-kota-detail/" . $encrypt_id) . ">" . $hsl['nama_kabupaten'] . "</a>";
              

            $row = [
                'nama_kabupaten' => $nama_kabupaten,
                'pendapatan_kab' => format_rupiah($pendapatan_kab),
                'pendapatan_realisasi_kab' => format_rupiah($pendapatan_realisasi_kab),
                'persen_realisasi_pendapatan' => $persen_realisasi_pendapatan." %",
                'belanja_kab' => format_rupiah($belanja_kab),
                'belanja_realisasi_kab' => format_rupiah($belanja_realisasi_kab),
                'persen_realisasi_belanja' => $persen_realisasi_belanja." %",
                'nilai_short' => $persen_realisasi_belanja
            ];
            $data[] = $row;
        }
        $sorting_data1 = array_sort($data, 'nilai_short', SORT_DESC);
        $data_short = [];
        $no=0;
        foreach ($sorting_data1 as $sort1) {
            $no++;
            $data_short[] = [
                'no' => $no,
                'nama_kabupaten' => $sort1['nama_kabupaten'],
                'pendapatan' => $sort1['pendapatan_kab'],
                'realisasi_pendapatan' => $sort1['pendapatan_realisasi_kab'],
                'persen_pendapatan' => $sort1['persen_realisasi_pendapatan'],
                'belanja' => $sort1['belanja_kab'],
                'realisasi_belanja' => $sort1['belanja_realisasi_kab'],
                'persen_belanja' => $sort1['persen_realisasi_belanja']
            ];
        }
        $output['data'] = $data_short;
        echo json_encode($output);
    }
}
