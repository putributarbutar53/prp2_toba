<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_fungsi', 'fungsi');
        $this->load->model('Belanja_model', 'belanja');
        $this->akses = is_logged_in();
    }


    public function index()
    {
        $tahun=2021;
        $cek_max = $this->mquery->max_data_where('data_realisasi_detail_skpd', 'bulan', ['tahun'=>$tahun]);
        $cek_log_upload = $this->mquery->max_data_where('log_upload', 'bulan', ['tahun'=>$tahun, 'st_data'=>1]);
        $row_log_upload = $this->mquery->select_id('log_upload', ['tahun' => $tahun, 'bulan' => $cek_log_upload['bulan']]);
        $periode = $this->fungsi->nama_bulan($row_log_upload['tgl_data']);

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
        $result_persen_pendapatan1 = $this->mquery->select_by('data_uraian_kegiatan_skpd', ['tahun'=>$tahun, 'kode_rekening' => 5], 'anggaran DESC');
        foreach ($result_persen_pendapatan1 as $persen) :
            if ($persen['anggaran'] != 0) {
                $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $persen['id_skpd']]);
                $nama_skpd1 .= "'" . $skpd['nama_skpd'] . "',";
                $realisasi_skpd1 .= $persen['anggaran'] . ',';
            }
        endforeach;

        $row_data_uraian_belanja = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => 5]);
        $total_belanja_pemko=$row_data_uraian_belanja['anggaran'];

        $row_data_uraian_operasi = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => 5.1]);
        $belanja_operasi=$row_data_uraian_operasi['anggaran'];

        $row_data_uraian_modal= $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => 5.2]);
        $belanja_modal=$row_data_uraian_modal['anggaran'];

        $row_data_uraian_takterduga= $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => 5.3]);
        $belanja_takterduga=$row_data_uraian_takterduga['anggaran'];

        $row_data_realisasi_belanja = $this->mquery->select_id('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $cek_log_upload['bulan'], 'kode_rekening' => 5]);
        $total_realisasi_pemko=$row_data_realisasi_belanja['realisasi'];

        $anggaran = [
        'operasi'=> $belanja_operasi,
        'modal'=> $belanja_modal,
        'takterduga'=>$belanja_takterduga,
        'realisasi_belanja'=>$total_realisasi_pemko,
        'belanja'=>$total_belanja_pemko
        ];

        $persen_operasi = round(($belanja_operasi / $total_belanja_pemko * 100), 2);
        $persen_modal = round(($belanja_modal / $total_belanja_pemko * 100), 2);
        $persen_takterduga = round(($belanja_takterduga / $total_belanja_pemko * 100), 2);

        $cek_max = $this->mquery->max_data_where('data_realisasi_detail_pemko', 'bulan', ['tahun'=>$tahun]);
        $cek_log_upload = $this->mquery->max_data_where('log_upload', 'bulan', ['tahun'=>$tahun, 'st_data'=>1]);
        $row_log_upload = $this->mquery->select_id('log_upload', ['tahun' => $tahun, 'bulan' => $cek_log_upload['bulan']]);
        $periode_pemko = $this->fungsi->nama_bulan($row_log_upload['tgl_data']);

        $persen_realisasi_belanja = round(($total_realisasi_pemko / $total_belanja_pemko * 100), 2);

        $batas=$cek_max['bulan']+1;
        $nama_bulan= null;
        $arr_belanja_operasi= null;
        $arr_belanja_modal= null;
        $arr_belanja_takterduga= null;
        for ($i23 = 1; $i23 < $batas; $i23++)
        {
            $nama_bulan .= "'" . bulan($i23) . "',";
            $row_data_realisasi_belanja1 = $this->mquery->select_id('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 5.1]);
            $arr_belanja_operasi .= $row_data_realisasi_belanja1['realisasi'] . ",";
            $row_data_realisasi_belanja2 = $this->mquery->select_id('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 5.2]);
            $arr_belanja_modal .= $row_data_realisasi_belanja2['realisasi'] . ",";
            $row_data_realisasi_belanja3 = $this->mquery->select_id('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $i23, 'kode_rekening' => 5.3]);
            $arr_belanja_takterduga .= $row_data_realisasi_belanja3['realisasi'] . ",";

            if($i23==$cek_max['bulan'])
            {
                $belanja_operasi_terakhir=$row_data_realisasi_belanja1['realisasi'];
                $belanja_modal_terakhir=$row_data_realisasi_belanja2['realisasi'];
                $belanja_takterduga_terakhir=$row_data_realisasi_belanja3['realisasi'];

                $persen_belanja_operasi_terakhir=$row_data_realisasi_belanja1['persen'];
                $persen_belanja_modal_terakhir=$row_data_realisasi_belanja2['persen'];
                $persen_belanja_takterduga_terakhir=$row_data_realisasi_belanja3['persen'];
            }
        }
		
		$belanja_operasi_terakhir=null;
		$belanja_modal_terakhir=null;
		$belanja_takterduga_terakhir=null;
		$persen_belanja_operasi_terakhir=null;
		$belanja_modal_terakhir=null;
		$persen_belanja_modal_terakhir=null;
		$persen_belanja_takterduga_terakhir=null;

        $data = [
            "menu_active" => "progress_report",
            "submenu_active" => "belanja",
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
            "persen_realisasi_belanja" => $persen_realisasi_belanja,
            "nama_bulan" => $nama_bulan,
            "arr_belanja_operasi" => $arr_belanja_operasi,
            "arr_belanja_modal" => $arr_belanja_modal,
            "arr_belanja_takterduga" => $arr_belanja_takterduga,
            "belanja_operasi_terakhir" => $belanja_operasi_terakhir,
            "belanja_modal_terakhir" => $belanja_modal_terakhir,
            "belanja_takterduga_terakhir" => $belanja_takterduga_terakhir,
            "persen_belanja_operasi_terakhir" => $persen_belanja_operasi_terakhir,
            "persen_belanja_modal_terakhir" => $persen_belanja_modal_terakhir,
            "persen_belanja_takterduga_terakhir" => $persen_belanja_takterduga_terakhir
        ];
        $this->load->view('report/belanja', $data);
    }

    public function load1()
    {
        $tahun=2021;
        

            $where = array('tahun' => 2021, 'st_data' => 2);
            $result_max = $this->mquery->max_data_where("log_upload", "bulan", $where);

            $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['tahun' => $tahun, 'bulan' => $result_max['bulan'], 'kode_rekening' => 5], "persen DESC");
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $encrypt_id = encrypt_url($r['id_skpd']);
                $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'kode_rekening' => 5]);
                
                $row_skpd = $this->mquery->select_id("data_skpd", ['id_skpd' => $r['id_skpd']]);
                $nama_skpd = "<a href=" . base_url("upload/lra-skpd/detail/" . $encrypt_id) . ">" . $row_skpd['nama_skpd'] . "</a>";
                $no++;
                if($no<11)
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
        
    }

    public function load2()
    {
        $tahun=2021;
     

            $where = array('tahun' => 2021, 'st_data' => 2);
            $result_max = $this->mquery->max_data_where("log_upload", "bulan", $where);

            $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['tahun' => $tahun, 'bulan' => $result_max['bulan'], 'kode_rekening' => 5], "persen ASC");
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $encrypt_id = encrypt_url($r['id_skpd']);
                $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'kode_rekening' => 5]);
                
                $row_skpd = $this->mquery->select_id("data_skpd", ['id_skpd' => $r['id_skpd']]);
                $nama_skpd = "<a href=" . base_url("upload/lra-skpd/detail/" . $encrypt_id) . ">" . $row_skpd['nama_skpd'] . "</a>";
                $no++;
                if($no<11)
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
       
    }

}
