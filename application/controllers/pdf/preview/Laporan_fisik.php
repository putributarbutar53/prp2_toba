<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_fisik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->model('M_fungsi', 'fungsi');
        $this->akses = is_logged_in();
    }

    public function preview($tahun, $encrypt_id)
    {
        $tahun_now=date('Y');
        if($tahun==$tahun_now){$priode=fungsi_bulan(date('m'), $tahun_now);}
        else{$priode=fungsi_bulan(12, 2021);}
        $id_skpd = decrypt_url($encrypt_id);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $result = $this->mquery->select_by('ta_kontrak', ['tahun'=>$tahun, 'kd_urusan' => $skpd['kd_urusan'],'kd_bidang' => $skpd['kd_bidang'],'kd_unit' => $skpd['kd_unit'],'kd_sub' => $skpd['kd_sub']]);
        $data = [];
        $no = 0;
        $data = [
            "menu_active" => "laporan",
            "submenu_active" => "realisasi_fisik",
            "skpd" => $skpd,
            "result" => $result,
            "tahun" => $tahun,
            "priode" => $priode
        ];
        $this->load->view('laporan/laporan_fisik/preview/view', $data);
    }

}
