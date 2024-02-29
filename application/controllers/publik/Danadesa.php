<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Danadesa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model', 'master');
        $this->load->model('Danadesa_model', 'danadesa');
        $this->load->model('M_fungsi', 'fungsi');
    }

    public function index()
    {
        $this->db->select_max('periode');
        $last = $this->db->get('tbl_dana_desa_log')->row_array();
        $periode = $this->db->get_where('tbl_dana_desa_log', ['periode' => $last['periode']])->row_array();
        $tahun = $periode['tahun'];
        $bulan = $periode['bulan'];
        $periode_desa = $periode['periode'];
        $id_kabupaten=34;

        $rst_tbl_desa   = $this->mquery->select_id('tbl_dana_desa',['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun, 'bulan' => $bulan]);
        $gf1_tahap=$rst_tbl_desa['alokasi'].',0';
        

        $gf1_desa=$rst_tbl_desa['desa'].',0,0,0,0,0,0,0';
        $gf1_cair='0,'.$rst_tbl_desa['desa1'].','.$rst_tbl_desa['desa2'].','.$rst_tbl_desa['desa3'].','.$rst_tbl_desa['blt_cair1'].','.$rst_tbl_desa['blt_cair2'].','.$rst_tbl_desa['blt_cair3'].','.$rst_tbl_desa['blt_cair4'];
        $gf1_belum='0,'.$rst_tbl_desa['belum1'].','.$rst_tbl_desa['belum2'].','.$rst_tbl_desa['belum3'].','.$rst_tbl_desa['blt_bcair1'].','.$rst_tbl_desa['blt_bcair2'].','.$rst_tbl_desa['blt_bcair3'].','.$rst_tbl_desa['blt_bcair4'];

        $total_realisasi=$rst_tbl_desa['total_realisasi'];
        $persen = $rst_tbl_desa['persen'];

        $total_salur=$rst_tbl_desa['total_salur'];
        $persen_salur = $rst_tbl_desa['persen_salur'];

        if($total_salur==0){$total_salur=$total_realisasi;}
        if($persen_salur==0){$persen_salur=$persen;}

        $gf1_tahap1='0,'.$rst_tbl_desa['total_realisasi'];
        $gf1_tahap2='0,'.$rst_tbl_desa['total_blt'];
        $gf1_tahap3='0,'.$rst_tbl_desa['tahap3'];


        $row_desa = [
            'gf1_tahap' => $gf1_tahap,
            'gf1_tahap1' => $gf1_tahap1,
            'gf1_tahap2' => $gf1_tahap2,
            'gf1_tahap3' => $gf1_tahap3,
            'gf1_desa' => $gf1_desa,
            'gf1_cair' => $gf1_cair,
            'gf1_belum' => $gf1_belum,
            'total_realisasi' => $total_salur,
            'persen' => $persen_salur,
            'periode_desa' => $periode_desa,
            'bulan_desa' => $bulan
        ];

        $result_kabupaten_id = $this->mquery->select_id('ta_kabupaten',['id_kabupaten' => $id_kabupaten]);
   
        $data = [
            "menu_active" => "dana_desa",
            "submenu_active" => null,
            "tahun_data" => $tahun,
            "bulan" => $bulan,
            "row_desa" => $row_desa,
            "result_kabupaten_nama" => $result_kabupaten_id['nama_kabupaten'],
            "id_kabupaten" => $result_kabupaten_id['id_kabupaten'],
            "result_bulan" => $this->mquery->select_data('bulan', 'id_bulan ASC')
        ];
        $this->load->view('publik/danadesa/view', $data);
    }

}
