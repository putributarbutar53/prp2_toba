<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->model('M_fungsi', 'fungsi');
        $this->akses = is_logged_in();
    }

    public function cetak($encrypt_id, $bulan)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan, 'st_data' => 2]);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $row_laporan = $this->mquery->select_id('laporan_realisasi_keuangan', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan]);
        $row_kepala = $this->mquery->select_id('penanda_tangan', ['id_ttd' => $row_laporan['id_kepala']]);
        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan], "kode_rekening ASC");
        $data = [
            "menu_active" => "laporan",
            "submenu_active" => "realisasi_keuangan",
            "skpd" => $skpd,
            "result" => $result,
            "tahun" => 2021,
            "bulan" => $bulan,
            "bulan_1" => $bulan-1,
            "tanggal_input" => substr($row_laporan['tanggal_input'],0,10),
            "nip_kepala" => $row_kepala['nip_ttd'],
            "nama_kepala" => $row_kepala['nama_ttd'],
            "level" => $row_laporan['level'],
            "nama_periode" => $this->fungsi->nama_bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('laporan/laporan_realisasi/cetak', $data);
    }

}
