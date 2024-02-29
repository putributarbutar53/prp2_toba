<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Danadesa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model', 'master');
        $this->load->model('Danadesa_model', 'danadesa');
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }

    public function index($tahun=NULL, $bulan=NULL)
    {
        if ($this->akses['akses'] == 'Y') {
            if($tahun==NULL){$tahun=date('Y');}
            if($bulan==NULL){$bulan=date('m');}
            $data = [
                "menu_active" => "kabupaten_kota",
                "submenu_active" => 'data-dana-desa',
                "tahun" => $tahun,
                "bulan" => $bulan,
                "result_bulan" => $this->mquery->select_data('bulan', 'id_bulan ASC')
            ];
            $this->load->view('wilayah/dana_desa/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function anggaran_danadesa()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $tipe = $this->input->post('tipe');
        $periode = periode_danadesa($tahun, $bulan);
        $result = $this->danadesa->sum_danadesa($tahun, $bulan);

        $alokasi = $result['alokasi'];
        $realisasi_tahap1 = $result['tahap1'];
        $realisasi_tahap2 = $result['tahap2'];
        $realisasi_tahap3 = $result['tahap3'];
        $realisasi_total = $realisasi_tahap1 + $realisasi_tahap2 + $realisasi_tahap3;
        if ($alokasi != null) {
            $persen_realisasi = $realisasi_total / $alokasi * 100;
        } else {
            $persen_realisasi = 0;
        }

        $data = [
            "judul_grafik" => "Anggaran Dana Desa Pada APBD Kabupaten Provinsi SUmatera Utara",
            "periode" => "Periode " . tanggal_indo($periode['periode']),
            "tgl_indo" => tanggal_indo($periode['periode']),
            "tipe" => $tipe,
            "alokasi" => $alokasi,
            "realisasi_tahap1" => $realisasi_tahap1,
            "realisasi_tahap2" => $realisasi_tahap2,
            "realisasi_tahap3" => $realisasi_tahap3,
            "realisasi_total" => $realisasi_total,
            "persen_realisasi" => $persen_realisasi
        ];
        $this->load->view('wilayah/dana_desa/anggaran_danadesa', $data);
    }

    public function anggaran_jumlahdesa()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $tipe = $this->input->post('tipe');
        $periode = periode_danadesa($tahun, $bulan);
        $result = $this->danadesa->sum_jumlahdesa($tahun, $bulan);

        $jumlah_desa = $result['desa'];
        $sudah_cair1 = $result['desa1'];
        $sudah_cair2 = $result['desa2'];
        $sudah_cair3 = $result['desa3'];
        $belum_cair1 = $result['belum1'];
        $belum_cair2 = $result['belum2'];
        $belum_cair3 = $result['belum3'];

        $data = [
            "judul_grafik" => "Jumlah Desa Pada Anggaran Dana Desa Pada APBD Kabupaten Provinsi SUmatera Utara",
            "periode" => "Periode " . tanggal_indo($periode['periode']),
            "tipe" => $tipe,
            "jumlah_desa" => $jumlah_desa,
            "sudah_cair1" => $sudah_cair1,
            "sudah_cair2" => $sudah_cair2,
            "sudah_cair3" => $sudah_cair3,
            "belum_cair1" => $belum_cair1,
            "belum_cair2" => $belum_cair2,
            "belum_cair3" => $belum_cair3
        ];
        $this->load->view('wilayah/dana_desa/anggaran_jumlahdesa', $data);
    }

    public function persen_realisasi_danadesa()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $tipe = $this->input->post('tipe');

        // rating persen realisasi dana desa
        $rating_persen_realisasi = [];
        $rat_kabupaten = null;
        $rat_persen = null;
        $result_kabupaten = $this->mquery->select_by('tbl_dana_desa', ['tahun' => $tahun, 'bulan' => $bulan]);
        foreach ($result_kabupaten as $kab) {
            $dana_desa = $this->danadesa->sum_danadesa($tahun, $bulan, $kab['id_kabupaten']);
            $r_kab = $this->mquery->select_id('ta_kabupaten', ['id_kabupaten' => $kab['id_kabupaten']]);
            $alokasi = $dana_desa['alokasi'];
            $realisasi_tahap1 = $dana_desa['tahap1'];
            $realisasi_tahap2 = $dana_desa['tahap2'];
            $realisasi_tahap3 = $dana_desa['tahap3'];
            $realisasi_total = $realisasi_tahap1 + $realisasi_tahap2 + $realisasi_tahap3;
            $persen_realisasi = $realisasi_total / $alokasi * 100;
            $rating_persen_realisasi[$r_kab['nama_kabupaten']] = $persen_realisasi;
        }
        arsort($rating_persen_realisasi); // sorting array berdasarkan persen tertinggi
        foreach ($rating_persen_realisasi as $kabupaten => $persen) {
            $rat_kabupaten .= "'" . $kabupaten . "',";
            $rat_persen .= number_format($persen, 2) . ',';
        }

        $data = [
            "judul_grafik" => "Persen Realisasi Dana Desa pada APBD Kabupaten/Kota",
            "tipe" => $tipe,
            "ratting_kabupaten" => $rat_kabupaten,
            "ratting_persen" => $rat_persen,
        ];
        $this->load->view('wilayah/dana_desa/persen_realisasi_danadesa', $data);
    }

    public function persen_desa_cair()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $tipe = $this->input->post('tipe');

        $result_kabupaten = $this->mquery->select_by('tbl_dana_desa', ['tahun' => $tahun, 'bulan' => $bulan]);
        $array = [];
        foreach ($result_kabupaten as $kab) {
            $jumlah = $this->danadesa->sum_jumlahdesa($tahun, $bulan, $kab['id_kabupaten']);
            $r_kab = $this->mquery->select_id('ta_kabupaten', ['id_kabupaten' => $kab['id_kabupaten']]);
            $jumlah_desa = $jumlah['desa'] * 3;
            $jumlah_cair_total = $jumlah['desa1'] + $jumlah['desa2'] + $jumlah['desa3'];
            $persen_cair_total = $jumlah_cair_total / $jumlah_desa * 100;

            $array[] = [
                'nama_kabupaten' => $r_kab['nama_kabupaten'],
                'persen_cair_tahap1' => $jumlah['desa1'] / $jumlah['desa'] * 100,
                'persen_cair_tahap2' => $jumlah['desa2'] / $jumlah['desa'] * 100,
                'persen_cair_tahap3' => $jumlah['desa3'] / $jumlah['desa'] * 100,
                'persen_cair_total' => $persen_cair_total
            ];
        }
        $rating_persen_desa_cair = array_sort($array, 'persen_cair_total', SORT_DESC); // sorting array berdasarkan persen tertinggi

        $nama_kabupaten = null;
        $persen_cair_tahap1 = null;
        $persen_cair_tahap2 = null;
        $persen_cair_tahap3 = null;
        foreach ($rating_persen_desa_cair as $r) {
            $nama_kabupaten .= "'" . $r['nama_kabupaten'] . "',";
            $persen_cair_tahap1 .= number_format($r['persen_cair_tahap1'], 2) . ',';
            $persen_cair_tahap2 .= number_format($r['persen_cair_tahap2'], 2) . ',';
            $persen_cair_tahap3 .= number_format($r['persen_cair_tahap3'], 2) . ',';
        }

        $data = [
            "judul_grafik" => "Persen Dana Cair Pada Realisasi Dana Desa",
            "tipe" => $tipe,
            "nama_kabupaten" => $nama_kabupaten,
            "persen_cair_tahap1" => $persen_cair_tahap1,
            "persen_cair_tahap2" => $persen_cair_tahap2,
            "persen_cair_tahap3" => $persen_cair_tahap3
        ];
        $this->load->view('wilayah/dana_desa/persen_desa_cair', $data);
    }

    public function jumlah_anggaran_danadesa()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $tipe = $this->input->post('tipe');

        $result_kabupaten = $this->mquery->select_by('tbl_dana_desa', ['tahun' => $tahun, 'bulan' => $bulan]);
        $array = [];
        foreach ($result_kabupaten as $kab) {
            $jumlah = $this->danadesa->sum_danadesa($tahun, $bulan, $kab['id_kabupaten']);
            $r_kab = $this->mquery->select_id('ta_kabupaten', ['id_kabupaten' => $kab['id_kabupaten']]);
            $alokasi = $jumlah['alokasi'];

            $array[] = [
                'nama_kabupaten' => $r_kab['nama_kabupaten'],
                'anggaran' => $alokasi
            ];
        }
        $rating_anggaran = array_sort($array, 'anggaran', SORT_DESC); // sorting array berdasarkan jumlah tertinggi

        $nama_kabupaten = null;
        $jumlah_anggaran = null;
        foreach ($rating_anggaran as $r) {
            $nama_kabupaten .= "'" . $r['nama_kabupaten'] . "',";
            $jumlah_anggaran .= $r['anggaran'] . ',';
        }

        $data = [
            "judul_grafik" => "Anggaran Dana Desa Pada APBD Kabupaten/Kota",
            "tipe" => $tipe,
            "nama_kabupaten" => $nama_kabupaten,
            "jumlah_anggaran" => $jumlah_anggaran
        ];
        $this->load->view('wilayah/dana_desa/jumlah_anggaran_danadesa', $data);
    }

    public function jumlah_realisasi_danadesa()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $tipe = $this->input->post('tipe');

        $result_kabupaten = $this->mquery->select_by('tbl_dana_desa', ['tahun' => $tahun, 'bulan' => $bulan]);
        $array = [];
        foreach ($result_kabupaten as $kab) {
            $jumlah = $this->danadesa->sum_danadesa($tahun, $bulan, $kab['id_kabupaten']);
            $r_kab = $this->mquery->select_id('ta_kabupaten', ['id_kabupaten' => $kab['id_kabupaten']]);
            $tahap1 = $jumlah['tahap1'];
            $tahap2 = $jumlah['tahap2'];
            $tahap3 = $jumlah['tahap3'];
            $realisasi = $tahap1 + $tahap2 + $tahap3;

            $array[] = [
                'nama_kabupaten' => $r_kab['nama_kabupaten'],
                'realisasi' => $realisasi
            ];
        }
        $rating_realisasi = array_sort($array, 'realisasi', SORT_DESC); // sorting array berdasarkan jumlah tertinggi

        $nama_kabupaten = null;
        $jumlah_realisasi = null;
        foreach ($rating_realisasi as $r) {
            $nama_kabupaten .= "'" . $r['nama_kabupaten'] . "',";
            $jumlah_realisasi .= $r['realisasi'] . ',';
        }

        $data = [
            "judul_grafik" => "Realisasi Dana Desa Pada APBD Kabupaten/Kota",
            "tipe" => $tipe,
            "nama_kabupaten" => $nama_kabupaten,
            "jumlah_realisasi" => $jumlah_realisasi
        ];
        $this->load->view('wilayah/dana_desa/jumlah_realisasi_danadesa', $data);
    }

    public function detail_realisasi_danadesa()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $tipe = $this->input->post('tipe');

        $result_kabupaten = $this->mquery->select_by('tbl_dana_desa', ['tahun' => $tahun, 'bulan' => $bulan]);
        $array = [];
        foreach ($result_kabupaten as $kab) {
            $jumlah = $this->danadesa->sum_danadesa($tahun, $bulan, $kab['id_kabupaten']);
            $r_kab = $this->mquery->select_id('ta_kabupaten', ['id_kabupaten' => $kab['id_kabupaten']]);
            $tahap1 = $jumlah['tahap1'];
            $tahap2 = $jumlah['tahap2'];
            $tahap3 = $jumlah['tahap3'];
            $realisasi = $tahap1 + $tahap2 + $tahap3;

            $array[] = [
                'nama_kabupaten' => $r_kab['nama_kabupaten'],
                'realisasi_tahap1' => $tahap1,
                'realisasi_tahap2' => $tahap2,
                'realisasi_tahap3' => $tahap3,
                'realisasi' => $realisasi
            ];
        }
        $rating_realisasi = array_sort($array, 'realisasi', SORT_DESC); // sorting array berdasarkan jumlah tertinggi

        $nama_kabupaten = null;
        $realisasi_tahap1 = null;
        $realisasi_tahap2 = null;
        $realisasi_tahap3 = null;
        foreach ($rating_realisasi as $r) {
            $nama_kabupaten .= "'" . $r['nama_kabupaten'] . "',";
            $realisasi_tahap1 .= $r['realisasi_tahap1'] . ',';
            $realisasi_tahap2 .= $r['realisasi_tahap2'] . ',';
            $realisasi_tahap3 .= $r['realisasi_tahap3'] . ',';
        }

        $data = [
            "judul_grafik" => "Realisasi Dana Desa Pada APBD Kabupaten/Kota",
            "tipe" => $tipe,
            "nama_kabupaten" => $nama_kabupaten,
            "realisasi_tahap1" => $realisasi_tahap1,
            "realisasi_tahap2" => $realisasi_tahap2,
            "realisasi_tahap3" => $realisasi_tahap3
        ];
        $this->load->view('wilayah/dana_desa/detail_realisasi_danadesa', $data);
    }

    public function detail_realisasi_jumlahdesa()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $tipe = $this->input->post('tipe');

        $result_kabupaten = $this->mquery->select_by('tbl_dana_desa', ['tahun' => $tahun, 'bulan' => $bulan]);
        $array = [];
        foreach ($result_kabupaten as $kab) {
            $jumlah = $this->danadesa->sum_jumlahdesa($tahun, $bulan, $kab['id_kabupaten']);
            $r_kab = $this->mquery->select_id('ta_kabupaten', ['id_kabupaten' => $kab['id_kabupaten']]);
            $desa = $jumlah['desa'];
            $desa1 = $jumlah['desa1'];
            $desa2 = $jumlah['desa2'];
            $desa3 = $jumlah['desa3'];

            $array[] = [
                'nama_kabupaten' => $r_kab['nama_kabupaten'],
                'jumlah_desa' => $desa,
                'realisasi_desa1' => $desa1,
                'realisasi_desa2' => $desa2,
                'realisasi_desa3' => $desa3
            ];
        }
        $rating_realisasi = array_sort($array, 'jumlah_desa', SORT_DESC); // sorting array berdasarkan jumlah tertinggi

        $nama_kabupaten = null;
        $jumlah_desa = null;
        $realisasi_desa1 = null;
        $realisasi_desa2 = null;
        $realisasi_desa3 = null;
        foreach ($rating_realisasi as $r) {
            $nama_kabupaten .= "'" . $r['nama_kabupaten'] . "',";
            $jumlah_desa .= $r['jumlah_desa'] . ',';
            $realisasi_desa1 .= $r['realisasi_desa1'] . ',';
            $realisasi_desa2 .= $r['realisasi_desa2'] . ',';
            $realisasi_desa3 .= $r['realisasi_desa3'] . ',';
        }

        $data = [
            "judul_grafik" => "Realisasi Dana Desa Pada APBD Kabupaten/Kota",
            "tipe" => $tipe,
            "nama_kabupaten" => $nama_kabupaten,
            "jumlah_desa" => $jumlah_desa,
            "realisasi_desa1" => $realisasi_desa1,
            "realisasi_desa2" => $realisasi_desa2,
            "realisasi_desa3" => $realisasi_desa3
        ];
        $this->load->view('wilayah/dana_desa/detail_realisasi_jumlahdesa', $data);
    }

    public function tabel_realisasi_danadesa()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $tipe = $this->input->post('tipe');
        $periode = periode_danadesa($tahun, $bulan);

        $result_kabupaten = $this->mquery->select_by('tbl_dana_desa', ['tahun' => $tahun, 'bulan' => $bulan]);
        $array = [];
        foreach ($result_kabupaten as $kab) {
            $r_kab = $this->mquery->select_id('ta_kabupaten', ['id_kabupaten' => $kab['id_kabupaten']]);
            $nama_kabupaten = $r_kab['nama_kabupaten'];
            $jumlah = $this->danadesa->sum_danadesa($tahun, $bulan, $kab['id_kabupaten']);
            $alokasi = $jumlah['alokasi'];
            $realisasi_tahap1 = $jumlah['tahap1'];
            $realisasi_tahap2 = $jumlah['tahap2'];
            $realisasi_tahap3 = $jumlah['tahap3'];
            $realisasi_total = $realisasi_tahap1 + $realisasi_tahap2 + $realisasi_tahap3;
            $persen_realisasi = $realisasi_total / $alokasi * 100;

            $array[] = [
                'nama_kabupaten' => $nama_kabupaten,
                'alokasi' => $alokasi,
                'realisasi_tahap1' => $realisasi_tahap1,
                'realisasi_tahap2' => $realisasi_tahap2,
                'realisasi_tahap3' => $realisasi_tahap3,
                'realisasi_total' => $realisasi_total,
                'persen_realisasi' => $persen_realisasi
            ];
        }
        $result_realisasi = array_sort($array, 'persen_realisasi', SORT_DESC); // sorting array berdasarkan jumlah tertinggi

        $data = [
            "judul_tabel" => "Realisasi Dana Desa Kabupaten/Kota " . tanggal_indo($periode['periode']),
            "tipe" => $tipe,
            "result_realisasi" => $result_realisasi
        ];
        $this->load->view('wilayah/dana_desa/tabel_realisasi_danadesa', $data);
    }

    public function tabel_realisasi_jumlahdesa()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $tipe = $this->input->post('tipe');
        $periode = periode_danadesa($tahun, $bulan);

        $result_kabupaten = $this->mquery->select_by('tbl_dana_desa', ['tahun' => $tahun, 'bulan' => $bulan]);
        $array = [];
        foreach ($result_kabupaten as $kab) {
            $r_kab = $this->mquery->select_id('ta_kabupaten', ['id_kabupaten' => $kab['id_kabupaten']]);
            $nama_kabupaten = $r_kab['nama_kabupaten'];
            $jumlah = $this->danadesa->sum_jumlahdesa($tahun, $bulan, $kab['id_kabupaten']);
            $jumlah_desa = $jumlah['desa'] * 3;
            $jumlah_cair_total = $jumlah['desa1'] + $jumlah['desa2'] + $jumlah['desa3'];
            $persen_realisasi = $jumlah_cair_total / $jumlah_desa * 100;

            $array[] = [
                'nama_kabupaten' => $nama_kabupaten,
                'jumlah_desa' => $jumlah['desa'],
                'realisasi_desa1' => $jumlah['desa1'],
                'realisasi_desa2' => $jumlah['desa2'],
                'realisasi_desa3' => $jumlah['desa3'],
                'belum_cair1' => $jumlah['desa'] - $jumlah['desa1'],
                'belum_cair2' => $jumlah['desa'] - $jumlah['desa2'],
                'belum_cair3' => $jumlah['desa'] - $jumlah['desa3'],
                'persen_realisasi' => $persen_realisasi
            ];
        }
        $result_realisasi = array_sort($array, 'persen_realisasi', SORT_DESC); // sorting array berdasarkan jumlah tertinggi

        $data = [
            "judul_tabel" => "Realisasi Dana Desa Kabupaten/Kota " . tanggal_indo($periode['periode']),
            "tipe" => $tipe,
            "result_realisasi" => $result_realisasi
        ];
        $this->load->view('wilayah/dana_desa/tabel_realisasi_jumlahdesa', $data);
    }
}
