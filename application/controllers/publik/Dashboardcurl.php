<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboardcurl extends CI_Controller
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
        $bulan= 12;
        $total_arus_kas= 0;
        $arr_arus_kas= null;
        $arr_arus_kas_triwulan= null;
        for ($i23 = 1; $i23 < 13; $i23++)
        {
            $row_arus_kas = $this->mquery->sum_data('anggarankas_detail', 'nilai', ['tahun' => $tahun, 'bulan' => $i23]);
            $total_arus_kas=$total_arus_kas+$row_arus_kas['nilai'];

            if($i23==12)
            {
                $arr_arus_kas .= 13953318293830 . ",";
            }
            else
            {
                $arr_arus_kas .= $total_arus_kas . ",";
            }

            if($i23==3 OR $i23==6 OR $i23==9 OR $i23==12)
            {
                $arr_arus_kas_triwulan .= $total_arus_kas . ",";
            }
        }
        $struktur_anggaran_provinsi=$this->grafik->struktur_anggaran_provinsi($tahun);
        $realisasi_apbd_provinsi=$this->grafik->realisasi_apbd_provinsi($tahun,$bulan);
        $realisasi_pb_provinsi=$this->grafik->realisasi_pb_provinsi($tahun);
        $data = [
            "menu_active" => "dashboard",
            "submenu_active" => null,
            "struktur_anggaran_provinsi" => $struktur_anggaran_provinsi,
            "arr_arus_kas" => $arr_arus_kas,
            "arr_arus_kas_triwulan" => $arr_arus_kas_triwulan,
            "realisasi_pb_provinsi" => $realisasi_pb_provinsi,
            "realisasi_apbd_provinsi" => $realisasi_apbd_provinsi
        ];
        $this->load->view('publik/dashboardcurl/apbd_provinsi', $data);
    }

    
}
