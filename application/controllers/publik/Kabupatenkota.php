<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kabupatenkota extends CI_Controller
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
        $tanggal_data="2021-12-31";
        $tahun_now=date('Y');
        if($tahun==$tahun_now)
        {
            $this->db->select_max('bulan');
            $this->db->from('tbl_realisasi_wilayah');
            $this->db->where(['tahun' => $tahun]);
            $bulan_temp = $this->db->get()->row_array();
            $bulan= $bulan_temp['bulan'];   
            //$bulan=date('m');
            $bulan_max=$bulan;
            $bulan_max1= $bulan+1;
        }else
        {
            $bulan=12;
            $bulan_max=12;
            $bulan_max1= 13;
        }

        $query1 = "SELECT sum(pendapatan) as pendapatan, sum(belanja) as belanja FROM tbl_anggaran_wilayah  WHERE tahun='$tahun'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $pendapatan=$hitungjml1['pendapatan'];
        $belanja=$hitungjml1['belanja'];

        $query1 = "SELECT sum(pad_anggaran) as pad, sum(transfer_anggaran) as transfera, sum(lain_anggaran) as lain FROM tbl_detail_anggaran_wil  WHERE tahun='$tahun'";
        $hitungjml1=$this->db->query($query1)->row_array();
        $pad=$hitungjml1['pad'];
        $transfera=$hitungjml1['transfera'];
        $lain=$hitungjml1['lain'];

        //dana TKDD tabel : tbl_dana_tkdd
        $query1 = "SELECT sum(dbh) as dbh, sum(dau) as dau, sum(dakfisik) as dakfisik, sum(daknon) as daknon, sum(did) as did, sum(desa) as desa FROM tbl_dana_tkdd  WHERE tahun='$tahun'";
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

        $query1 = "SELECT sum(operasional_anggaran) as operasi, sum(modal_anggaran) as modal, sum(takter_anggaran) as takterduga, sum(beltransfer_anggaran) as beltransfer FROM tbl_detail_anggaran_wil WHERE tahun='$tahun'";
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
        $pendapatan_terakhir = 0;
        $belanja_terakhir = 0;
        for ($i23 = 1; $i23 < $bulan_max1; $i23++)
        {
            $nama_bulan .= "'" . bulan($i23) . "',";

            $result_get_kabupaten = $this->mquery->select_data('ta_kabupaten');
            $total_row_real_pendapatan=0;
            $total_row_real_belanja=0;
            foreach ($result_get_kabupaten as $sg) {

                $row_pendapatan_realisasi = $this->mquery->sum_data('tbl_realisasi_wilayah', 'pendapatan_realisasi', ['id_kabupaten' => $sg['id_kabupaten'], 'tahun' => $tahun, 'bulan' => $i23]);
                //$arr_pendapatan .= (float)($row_pendapatan_realisasi['pendapatan_realisasi']) . ",";
                
                $row_belanja_realisasi = $this->mquery->sum_data('tbl_realisasi_wilayah', 'belanja_realisasi', ['id_kabupaten' => $sg['id_kabupaten'], 'tahun' => $tahun, 'bulan' => $i23]);
               // $arr_belanja .= (float)($row_belanja_realisasi['belanja_realisasi']) . ",";

                if($i23==1)
                {
                    $temp_row_real_pendapatan=$row_pendapatan_realisasi['pendapatan_realisasi'];
                    $temp_row_real_belanja=$row_belanja_realisasi['belanja_realisasi'];
                }
                else
                {
                    if($row_pendapatan_realisasi['pendapatan_realisasi']==0)
                    {
                        $i23_1=$i23-1;
                        $row_pendapatan_realisasi_1 = $this->mquery->sum_data('tbl_realisasi_wilayah', 'pendapatan_realisasi', ['id_kabupaten' => $sg['id_kabupaten'], 'tahun' => $tahun, 'bulan' => $i23_1]);
                        $temp_row_real_pendapatan=$row_pendapatan_realisasi_1['pendapatan_realisasi'];
                    }
                    else
                    {$temp_row_real_pendapatan=$row_pendapatan_realisasi['pendapatan_realisasi'];}

                    if($row_belanja_realisasi['belanja_realisasi']==0)
                    {
                        $i23_1=$i23-1;
                        $row_belanja_realisasi_1 = $this->mquery->sum_data('tbl_realisasi_wilayah', 'belanja_realisasi', ['id_kabupaten' => $sg['id_kabupaten'], 'tahun' => $tahun, 'bulan' => $i23_1]);
                        $temp_row_real_belanja=$row_belanja_realisasi_1['belanja_realisasi'];
                    }
                    else
                    {$temp_row_real_belanja=$row_belanja_realisasi['belanja_realisasi'];}
                }
                $total_row_real_pendapatan=$total_row_real_pendapatan+$temp_row_real_pendapatan;
                $total_row_real_belanja=$total_row_real_belanja+$temp_row_real_belanja;
            }
            $arr_pendapatan .= (float)($total_row_real_pendapatan) . ",";
            $arr_belanja .= (float)($total_row_real_belanja) . ",";
            
            
            if($i23==$bulan_max)
            {
                $pendapatan_terakhir=(float)($total_row_real_pendapatan);
                $belanja_terakhir=(float)($total_row_real_belanja);
            }
        }

        $result_kabupaten = $this->mquery->select_data('ta_kabupaten');
        $data1 = [];
        foreach ($result_kabupaten as $hsl) {
            $id_kabupaten=$hsl['id_kabupaten'];

            $query1 = "SELECT belanja, pendapatan, belanja_p, pendapatan_p FROM tbl_anggaran_wilayah WHERE id_kabupaten='$id_kabupaten' AND tahun='$tahun'";
            $hitungjml1=$this->db->query($query1)->row_array();
            $belanja_kab=$hitungjml1['belanja_p'];
            $pendapatan_kab=$hitungjml1['pendapatan_p'];
            if($pendapatan_kab==0)
            {
                $belanja_kab=$hitungjml1['belanja'];
                $pendapatan_kab=$hitungjml1['pendapatan'];
            }

            $query1 = "SELECT belanja_realisasi as jml1, pendapatan_realisasi as jml2 FROM tbl_realisasi_wilayah WHERE bulan=$bulan_max AND id_kabupaten='$id_kabupaten' AND tahun='$tahun'";
            $hitungjml1=$this->db->query($query1)->row_array();
            if($bulan_max==1)
            {
                $belanja_realisasi_kab=$hitungjml1['jml1'];
                $pendapatan_realisasi_kab=$hitungjml1['jml2'];
            }
            else
            {
                if($hitungjml1['jml1']==0)
                {
                    $bulan_max_1=$bulan_max-1;
                    $query1_1 = "SELECT belanja_realisasi as jml1, pendapatan_realisasi as jml2 FROM tbl_realisasi_wilayah WHERE bulan=$bulan_max_1 AND id_kabupaten='$id_kabupaten' AND tahun='$tahun'";
                    $hitungjml1_1=$this->db->query($query1_1)->row_array();
                    $belanja_realisasi_kab=$hitungjml1_1['jml1'];
                }
                else
                {$belanja_realisasi_kab=$hitungjml1['jml1'];}

                if($hitungjml1['jml2']==0)
                {
                    $bulan_max_1=$bulan_max-1;
                    $query1_1 = "SELECT belanja_realisasi as jml1, pendapatan_realisasi as jml2 FROM tbl_realisasi_wilayah WHERE bulan=$bulan_max_1 AND id_kabupaten='$id_kabupaten' AND tahun='$tahun'";
                    $hitungjml1_1=$this->db->query($query1_1)->row_array();
                    $pendapatan_realisasi_kab=$hitungjml1_1['jml2'];
                }
                else
                {$pendapatan_realisasi_kab=$hitungjml1['jml2'];}
            }

            if($pendapatan_kab==0){$persen_realisasi_pendapatan=0;}
            else{$persen_realisasi_pendapatan=round(($pendapatan_realisasi_kab/$pendapatan_kab*100),2);}

            if($belanja_kab==0){$persen_realisasi_belanja=0;}
            else{$persen_realisasi_belanja=round(($belanja_realisasi_kab/$belanja_kab*100),2);}

            if($id_kabupaten!=34)
            {
                $row1 = [
                    'nama_kabupaten' => $hsl['nama_kabupaten'],
                    'persen_realisasi_pendapatan' => $persen_realisasi_pendapatan,
                    'nilai_short_pendapatan' => $persen_realisasi_pendapatan,
                    'persen_realisasi_belanja' => $persen_realisasi_belanja,
                    'nilai_short_belanja' => $persen_realisasi_belanja
                ];
                $data1[] = $row1;
            }
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

        $data = [
            "row_pendapatan" => $row_pendapatan,
            "nama_bulan" => $nama_bulan,
            "arr_pendapatan" => $arr_pendapatan,
            "tanggal_data" => $tanggal_data,
            "pendapatan_terakhir" => $pendapatan_terakhir,
            "row_belanja" => $row_belanja,
            "arr_belanja" => $arr_belanja,
            "belanja_terakhir" => $belanja_terakhir,
            "arr_nama_kabupaten_pendapatan" => $arr_nama_kabupaten_pendapatan,
            "arr_pendapatan_kab" => $arr_pendapatan_kab,
            "arr_nama_kabupaten_belanja" => $arr_nama_kabupaten_belanja,
            "arr_belanja_kab" => $arr_belanja_kab,
            "tahun_data" => $tahun,
            "bulan_data" => $bulan
        ];
        $this->load->view('publik/kabupatenkota/view', $data);
    }
    
    public function load_realisasi_belanja()
    {
        $tahun = htmlspecialchars($this->input->post('tahun', TRUE));
        $tahun_now=date('Y');
        if($tahun==$tahun_now)
        {
            $this->db->select_max('bulan');
            $this->db->from('tbl_realisasi_wilayah');
            $this->db->where(['tahun' => $tahun]);
            $bulan_temp = $this->db->get()->row_array();
            $bulan= $bulan_temp['bulan'];   
            //$bulan=date('m');
            $bulan_max=$bulan;
            $bulan_max1= $bulan+1;
        }else
        {
            $bulan=12;
            $bulan_max=12;
            $bulan_max1= 13;
        }

        $result_kabupaten = $this->mquery->select_data('ta_kabupaten');
        $data = [];
        foreach ($result_kabupaten as $hsl) {
            $id_kabupaten=$hsl['id_kabupaten'];
            $encrypt_id = encrypt_url($id_kabupaten);
            $query1 = "SELECT belanja, pendapatan, belanja_p, pendapatan_p FROM tbl_anggaran_wilayah WHERE id_kabupaten='$id_kabupaten' AND tahun='$tahun'";
            $hitungjml1=$this->db->query($query1)->row_array();
            $belanja_kab=$hitungjml1['belanja_p'];
            $pendapatan_kab=$hitungjml1['pendapatan_p'];
            if($pendapatan_kab==0)
            {
                $belanja_kab=$hitungjml1['belanja'];
                $pendapatan_kab=$hitungjml1['pendapatan'];
            }

            $query1 = "SELECT belanja_realisasi as jml1, pendapatan_realisasi as jml2 FROM tbl_realisasi_wilayah WHERE bulan=$bulan_max AND tahun='$tahun' AND id_kabupaten='$id_kabupaten'";
            $hitungjml1=$this->db->query($query1)->row_array();
            // $belanja_realisasi_kab=$hitungjml1['jml1'];
            // $pendapatan_realisasi_kab=$hitungjml1['jml2'];
            if($bulan_max==1)
            {
                $belanja_realisasi_kab=$hitungjml1['jml1'];
                $pendapatan_realisasi_kab=$hitungjml1['jml2'];
            }
            else
            {
                if($hitungjml1['jml1']==0)
                {
                    $bulan_max_1=$bulan_max-1;
                    $query1_1 = "SELECT belanja_realisasi as jml1, pendapatan_realisasi as jml2 FROM tbl_realisasi_wilayah WHERE bulan=$bulan_max_1 AND id_kabupaten='$id_kabupaten' AND tahun='$tahun'";
                    $hitungjml1_1=$this->db->query($query1_1)->row_array();
                    $belanja_realisasi_kab=$hitungjml1_1['jml1'];
                }
                else
                {$belanja_realisasi_kab=$hitungjml1['jml1'];}

                if($hitungjml1['jml2']==0)
                {
                    $bulan_max_1=$bulan_max-1;
                    $query1_1 = "SELECT belanja_realisasi as jml1, pendapatan_realisasi as jml2 FROM tbl_realisasi_wilayah WHERE bulan=$bulan_max_1 AND id_kabupaten='$id_kabupaten' AND tahun='$tahun'";
                    $hitungjml1_1=$this->db->query($query1_1)->row_array();
                    $pendapatan_realisasi_kab=$hitungjml1_1['jml2'];
                }
                else
                {$pendapatan_realisasi_kab=$hitungjml1['jml2'];}
            }

            if($pendapatan_kab==0){$persen_realisasi_pendapatan=0;}
            else{$persen_realisasi_pendapatan=round(($pendapatan_realisasi_kab/$pendapatan_kab*100),2);}

            if($belanja_kab==0){$persen_realisasi_belanja=0;}
            else{$persen_realisasi_belanja=round(($belanja_realisasi_kab/$belanja_kab*100),2);}
            
            $nama_kabupaten = "<a href=" . base_url("kabupaten-kota-detail-".$tahun."/" . $encrypt_id) . ">" . $hsl['nama_kabupaten'] . "</a>";
              
            if($id_kabupaten!=34)
            {
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
