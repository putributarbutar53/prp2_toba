<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendapatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_fungsi', 'fungsi');
        $this->akses = is_logged_in();
    }

    public function index()
    {
        $tahun=2021;
        $cek_max = $this->mquery->max_data_where('data_realisasi_detail_skpd', 'bulan', ['tahun'=>$tahun]);
        $cek_log_upload = $this->mquery->max_data_where('log_upload', 'bulan', ['tahun'=>$tahun, 'st_data'=>2]);
        $row_log_upload = $this->mquery->select_id('log_upload', ['tahun' => $tahun, 'bulan' => $cek_log_upload['bulan']]);
        $periode = $this->fungsi->nama_bulan($row_log_upload['tgl_data']);

        $cek_max1 = $this->mquery->max_data_where('data_realisasi_detail_pemko', 'bulan', ['tahun'=>$tahun]);
        $cek_log_upload1 = $this->mquery->max_data_where('log_upload', 'bulan', ['tahun'=>$tahun, 'st_data'=>1]);
        $row_log_upload1 = $this->mquery->select_id('log_upload', ['tahun' => $tahun, 'bulan' => $cek_log_upload1['bulan']]);
        $periode_pemko = $this->fungsi->nama_bulan($row_log_upload1['tgl_data']);

        $nama_skpd = null;
        $realisasi_skpd = null;
        $result_persen_pendapatan = $this->mquery->select_by('data_realisasi_detail_skpd', ['bulan' =>  $cek_max['bulan'], 'tahun'=>$tahun, 'kode_rekening' => 4], 'persen DESC');
        foreach ($result_persen_pendapatan as $persen) :
            if ($persen['persen'] != 0) {
                $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $persen['id_skpd']]);
                $nama_skpd .= "'" . $skpd['nama_skpd'] . "',";
                $realisasi_skpd .= $persen['persen'] . ',';
            }
        endforeach;

        $nama_skpd1 = null;
        $realisasi_skpd1 = null;
        $result_persen_pendapatan1 = $this->mquery->select_by('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'kode_rekening' => 4], 'anggaran DESC');
        foreach ($result_persen_pendapatan1 as $persen) :
            if ($persen['anggaran'] != 0) {
                $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $persen['id_skpd']]);
                $nama_skpd1 .= "'" . $skpd['nama_skpd'] . "',";
                $realisasi_skpd1 .= $persen['anggaran'] . ',';
            }
        endforeach;

        $row_pendapatan = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => 4]);
        $row_pad = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => 4.1]);
        $row_transfer= $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => 4.2]);
        $row_pusat= $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => '4.2.1']);
        $row_dbh= $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => '4.2.1.01.01']);
        $row_dau= $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => '4.2.1.01.02']);
        $row_dak= $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => '4.2.1.01.03']);
        $row_daknon= $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => '4.2.1.01.04']);
        $row_dbh_daerah= $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => '4.2.2']);
        $row_pad_lain= $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => 4.3]);
        $row_realisasi_pendapatan = $this->mquery->select_id('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $cek_log_upload['bulan'], 'kode_rekening' => 4]);
        
        $realisasi = [
        'pendapatan'=> $row_pendapatan['anggaran'],
        'pad'=> $row_pad['anggaran'],
        'transfer'=> $row_transfer['anggaran'],
        'pad_lain'=> $row_pad_lain['anggaran'],
        'realisasi_pendapatan'=> $row_realisasi_pendapatan['realisasi'],
        'dbh'=> $row_dbh['anggaran'],
        'dau'=> $row_dau['anggaran'],
        'dak'=> $row_dak['anggaran'],
        'daknon'=> $row_daknon['anggaran'],
        'pusat'=> $row_pusat['anggaran'],
        'dbh_daerah'=> $row_dbh_daerah['anggaran']
        ];

        $persen_pad = round(($realisasi['pad'] / $realisasi['pendapatan'] * 100), 2);
        $persen_transfer = round(($realisasi['transfer'] / $realisasi['pendapatan'] * 100), 2);
        $persen_pad_lain = round(($realisasi['pad_lain'] / $realisasi['pendapatan'] * 100), 2);
        $persen_realisasi = round(($realisasi['realisasi_pendapatan'] / $realisasi['pendapatan']*100), 2);

        $batas=$cek_max1['bulan']+1;
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
            $row_pad1 = $this->mquery->select_id('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 4.1]);
            $arr_pad .= $row_pad1['realisasi'] . ",";
            $row_transfer1 = $this->mquery->select_id('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 4.2]);
            $arr_transfer .= $row_transfer1['realisasi'] . ",";
            $row_lain21 = $this->mquery->select_id('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 4.3]);
            $arr_lain2 .= $row_lain21['realisasi'] . ",";
            $row_dbh1= $this->mquery->select_id('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.2.1.01.01']);
            $arr_dbh .= $row_dbh1['realisasi'] . ",";
            $row_dau1= $this->mquery->select_id('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.2.1.01.02']);
            $arr_dau .= $row_dau1['realisasi'] . ",";
            $row_dak1= $this->mquery->select_id('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.2.1.01.03']);
            $arr_dak .= $row_dak1['realisasi'] . ",";
            $row_daknon1= $this->mquery->select_id('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => '4.2.1.01.04']);
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
		
		$pad_terakhir=null;
		$transfer_terakhir=null;
		$lain2_terakhir=null;
		$persen_pad_terakhir=null;
		$persen_transfer_terakhir=null;
		$persen_lain2_terakhir=null;

        $data = [
            "menu_active" => "progress_report",
            "submenu_active" => "pendapatan",
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
            "periode_pemko" => $periode_pemko,
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
            "persen_lain2_terakhir" => $persen_lain2_terakhir
        ];
        $this->load->view('report/pendapatan', $data);
    }
    

    public function load1()
    {
        $tahun=2021;
        if ($this->akses['role'] == "master" or $this->akses['role'] == "admin") {

            $where = array('tahun' => 2021, 'st_data' => 2);
            $result_max = $this->mquery->max_data_where("log_upload", "bulan", $where);

            $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['tahun' => $tahun, 'bulan' => $result_max['bulan'], 'kode_rekening' => 4], "persen DESC");
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $encrypt_id = encrypt_url($r['id_skpd']);
                $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'kode_rekening' => 4]);
                
                $row_skpd = $this->mquery->select_id("data_skpd", ['id_skpd' => $r['id_skpd']]);
                $nama_skpd = "<a href=" . base_url("upload/lra-skpd/detail/" . $encrypt_id) . ">" . $row_skpd['nama_skpd'] . "</a>";
                $no++;
                if($no<6)
                {
                    $row = [
                        'no' => $no,
                        'nama_skpd' => $nama_skpd,
                        'anggaran' => format_rupiah($row_anggaran['anggaran']),
                        'realisasi_belanja' => format_rupiah($r['realisasi']),
                        'persen_belanja' => format_rupiah($r['persen'])." %"
                    ];
                    $data[] = $row;
                }
            }
            $output['data'] = $data;
            echo json_encode($output);
        } else {
            $data = ['status' => FALSE, 'pesan' => 'blocked'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function load2()
    {
        $tahun=2021;
        if ($this->akses['role'] == "master" or $this->akses['role'] == "admin") {

            $where = array('tahun' => 2021, 'st_data' => 2);
            $result_max = $this->mquery->max_data_where("log_upload", "bulan", $where);

            $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['tahun' => $tahun, 'bulan' => $result_max['bulan'], 'kode_rekening' => 4], "persen ASC");
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $encrypt_id = encrypt_url($r['id_skpd']);
                $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'kode_rekening' => 4]);
                
                $row_skpd = $this->mquery->select_id("data_skpd", ['id_skpd' => $r['id_skpd']]);
                $nama_skpd = "<a href=" . base_url("upload/lra-skpd/detail/" . $encrypt_id) . ">" . $row_skpd['nama_skpd'] . "</a>";
                $no++;
                if($no<6)
                {
                    $row = [
                        'no' => $no,
                        'nama_skpd' => $nama_skpd,
                        'anggaran' => format_rupiah($row_anggaran['anggaran']),
                        'realisasi_belanja' => format_rupiah($r['realisasi']),
                        'persen_belanja' => format_rupiah($r['persen'])." %"
                    ];
                    $data[] = $row;
                }
            }
            $output['data'] = $data;
            echo json_encode($output);
        } else {
            $data = ['status' => FALSE, 'pesan' => 'blocked'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

}