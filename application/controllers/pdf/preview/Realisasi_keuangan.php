<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Realisasi_keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->model('M_fungsi', 'fungsi');
        $this->akses = is_logged_in();
    }

    public function index($encrypt_id, $bulan)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan, 'st_data' => 2]);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $cek_max = $this->mquery->max_data_where('penanda_tangan', 'id_ttd', ['id_skpd'=>$id_skpd]);
        $penanda_tangan = $this->mquery->select_id('penanda_tangan', ['id_ttd' => $cek_max['id_ttd']]);
        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan], "kode_rekening ASC");
        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
        $data = [
            "menu_active" => "laporan",
            "submenu_active" => "realisasi_keuangan",
            "skpd" => $skpd,
            "result" => $result,
            "tahun" => 2021,
            "bulan" => $bulan,
            "cek_papbd" => $cek_papbd,
            "bulan_1" => $bulan-1,
            "penanda_tangan" => $penanda_tangan,
            "level" => 1,
            "nama_periode" => $this->fungsi->nama_bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('laporan/realisasi_keuangan/preview/level1', $data);
    }

    public function level2($encrypt_id, $bulan)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan, 'st_data' => 2]);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $cek_max = $this->mquery->max_data_where('penanda_tangan', 'id_ttd', ['id_skpd'=>$id_skpd]);
        $penanda_tangan = $this->mquery->select_id('penanda_tangan', ['id_ttd' => $cek_max['id_ttd']]);
        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan], "kode_rekening ASC");
        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
        $data = [
            "menu_active" => "laporan",
            "submenu_active" => "realisasi_keuangan",
            "skpd" => $skpd,
            "result" => $result,
            "tahun" => 2021,
            "bulan" => $bulan,
            "cek_papbd" => $cek_papbd,
            "bulan_1" => $bulan-1,
            "penanda_tangan" => $penanda_tangan,
            "level" => 2,
            "nama_periode" => $this->fungsi->nama_bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('laporan/realisasi_keuangan/preview/level1', $data);
    }


    public function level3($encrypt_id, $bulan)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan, 'st_data' => 2]);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $cek_max = $this->mquery->max_data_where('penanda_tangan', 'id_ttd', ['id_skpd'=>$id_skpd]);
        $penanda_tangan = $this->mquery->select_id('penanda_tangan', ['id_ttd' => $cek_max['id_ttd']]);
        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan], "kode_rekening ASC");
        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
        $data = [
            "menu_active" => "laporan",
            "submenu_active" => "realisasi_keuangan",
            "skpd" => $skpd,
            "result" => $result,
            "tahun" => 2021,
            "bulan" => $bulan,
            "cek_papbd" => $cek_papbd,
            "bulan_1" => $bulan-1,
            "penanda_tangan" => $penanda_tangan,
            "level" => 3,
            "nama_periode" => $this->fungsi->nama_bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('laporan/realisasi_keuangan/preview/level1', $data);
    }

    public function level4($encrypt_id, $bulan)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan, 'st_data' => 2]);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $cek_max = $this->mquery->max_data_where('penanda_tangan', 'id_ttd', ['id_skpd'=>$id_skpd]);
        $penanda_tangan = $this->mquery->select_id('penanda_tangan', ['id_ttd' => $cek_max['id_ttd']]);
        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan], "kode_rekening ASC");
        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
        $data = [
            "menu_active" => "laporan",
            "submenu_active" => "realisasi_keuangan",
            "skpd" => $skpd,
            "result" => $result,
            "tahun" => 2021,
            "bulan" => $bulan,
            "cek_papbd" => $cek_papbd,
            "bulan_1" => $bulan-1,
            "penanda_tangan" => $penanda_tangan,
            "level" => 4,
            "nama_periode" => $this->fungsi->nama_bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('laporan/realisasi_keuangan/preview/level1', $data);
    }

    public function level5($encrypt_id, $bulan)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan, 'st_data' => 2]);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $cek_max = $this->mquery->max_data_where('penanda_tangan', 'id_ttd', ['id_skpd'=>$id_skpd]);
        $penanda_tangan = $this->mquery->select_id('penanda_tangan', ['id_ttd' => $cek_max['id_ttd']]);
        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan], "kode_rekening ASC");
        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
        $data = [
            "menu_active" => "laporan",
            "submenu_active" => "realisasi_keuangan",
            "skpd" => $skpd,
            "result" => $result,
            "tahun" => 2021,
            "bulan" => $bulan,
            "cek_papbd" => $cek_papbd,
            "bulan_1" => $bulan-1,
            "penanda_tangan" => $penanda_tangan,
            "level" => 5,
            "nama_periode" => $this->fungsi->nama_bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('laporan/realisasi_keuangan/preview/level1', $data);
    }


    public function level6($encrypt_id, $bulan)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan, 'st_data' => 2]);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $cek_max = $this->mquery->max_data_where('penanda_tangan', 'id_ttd', ['id_skpd'=>$id_skpd]);
        $penanda_tangan = $this->mquery->select_id('penanda_tangan', ['id_ttd' => $cek_max['id_ttd']]);
        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan], "kode_rekening ASC");
        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['id_setting' => 1]);
        $data = [
            "menu_active" => "laporan",
            "submenu_active" => "realisasi_keuangan",
            "skpd" => $skpd,
            "result" => $result,
            "tahun" => 2021,
            "bulan" => $bulan,
            "cek_papbd" => $cek_papbd,
            "bulan_1" => $bulan-1,
            "penanda_tangan" => $penanda_tangan,
            "level" => 6,
            "nama_periode" => $this->fungsi->nama_bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('laporan/realisasi_keuangan/preview/level1', $data);
    }

}
