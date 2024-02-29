<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['login'] = 'login';
$route['logout'] = 'login/logout';
$route['blocked'] = 'login/blocked';

$route['apbd-provinsi-([.0-9]+)'] = 'publik/dashboard/index/$1';
$route['pendapatan-opd-provinsi'] = 'publik/dashboard/realisasi_pendapatan';
$route['belanja-opd-provinsi'] = 'publik/dashboard/realisasi_belanja';
$route['apbd-opd-provinsi/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'publik/skpd/detail/$1/$2';

$route['dana-desa'] = 'publik/danadesa';

$route['kabupaten-kota-([.0-9]+)'] = 'publik/kabupatenkota/index/$1';
$route['kabupaten-kota-detail-([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'publik/kabupatendetail/index/$1/$2';
$route['kabupaten-kota-detail1/([.0-9a-zA-Z-]+)'] = 'publik/kabupatendetail/khususkota/$1';

$route['mandatory-spending-([.0-9]+)'] = 'publik/mandatory/index/$1';
$route['lra-kabupaten-kota'] = 'upload_lra_kabupaten/lra_kabupaten';
$route['lra-kabupaten-detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'upload_lra_kabupaten/lra_kabupaten/detail/$1/$2';

$route['dashboard'] = 'dashboard';
$route['dashboard-apbd-provinsi'] = 'dashboard/apbd_provinsi';
$route['dashboard-realisasi-apbd'] = 'dashboard/realisasi_apbd';
$route['dashboard-realisasi-pendapatan'] = 'dashboard/realisasi_pendapatan';
$route['dashboard-realisasi-belanja'] = 'dashboard/realisasi_belanja';

$route['pdf-preview-keuangan-level1/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'pdf/preview/realisasi_keuangan/index/$1/$2';
$route['pdf-preview-keuangan-level2/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'pdf/preview/realisasi_keuangan/level2/$1/$2';
$route['pdf-preview-keuangan-level3/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'pdf/preview/realisasi_keuangan/level3/$1/$2';
$route['pdf-preview-keuangan-level4/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'pdf/preview/realisasi_keuangan/level4/$1/$2';
$route['pdf-preview-keuangan-level5/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'pdf/preview/realisasi_keuangan/level5/$1/$2';
$route['pdf-preview-keuangan-level6/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'pdf/preview/realisasi_keuangan/level6/$1/$2';

$route['pdf-preview-laporan-keuangan/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'pdf/preview/laporan_keuangan/preview/$1/$2';
$route['pdf-cetak-laporan-keuangan/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'pdf/cetak/laporan_keuangan/cetak/$1/$2';

$route['pdf-preview-laporan-fisik/([.0-9a-zA-Z-]+)'] = 'pdf/preview/laporan_fisik/preview/$1';
$route['pdf-cetak-laporan-fisik/([.0-9a-zA-Z-]+)'] = 'pdf/cetak/laporan_fisik/cetak/$1';

$route['kirim-keuangan-level1/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'laporan/kirim_laporan/index/$1/$2';

$route['realisasi-keuangan'] = 'laporan/realisasi_keuangan';
$route['realisasi-keuangan/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'laporan/realisasi_keuangan/detail/$1/$2';
$route['realisasi-keuangan/detail2/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'laporan/realisasi_keuangan/detail2/$1/$2';

$route['laporan-realisasi-keuangan'] = 'laporan/laporan_realisasi';
$route['laporan-realisasi-keuangan/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'laporan/laporan_realisasi/detail/$1/$2';
$route['laporan-realisasi-keuangan/detail2/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'laporan/laporan_realisasi/detail2/$1/$2';

$route['laporan-realisasi-fisik'] = 'laporan/laporan_fisik';
$route['laporan-realisasi-fisik/detail/([.0-9a-zA-Z-]+)'] = 'laporan/laporan_fisik/detail/$1';

// ================================== ROUTING ADMIN ===================================
$route['master/jenis-pelaksanaan'] = 'master/jenis_pelaksanaan';
$route['master/pengguna-anggaran'] = 'master/pengguna_anggaran';
$route['master/kepala-skpd'] = 'master/kepala_skpd';
$route['master/bendahara-pengeluaran'] = 'master/bendahara_pengeluaran';

$route['kegiatan'] = 'kegiatan/kegiatan';
$route['kegiatan/skpd/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'kegiatan/kegiatan/skpd/$1/$2';
$route['kegiatan/detail/load'] = 'kegiatan/detail/load';
$route['kegiatan/detail/form'] = 'kegiatan/detail/form';
$route['kegiatan/detail/realisasi'] = 'kegiatan/detail/realisasi';
$route['kegiatan/detail/add'] = 'kegiatan/detail/add';
$route['kegiatan/detail/edit'] = 'kegiatan/detail/edit';
$route['kegiatan/detail/delete'] = 'kegiatan/detail/delete';
$route['kegiatan/detail/([.0-9a-zA-Z-]+)'] = 'kegiatan/detail/index/$1';
$route['kegiatan/dokumentasi/load'] = 'kegiatan/dokumentasi/load';
$route['kegiatan/dokumentasi/form'] = 'kegiatan/dokumentasi/form';
$route['kegiatan/dokumentasi/upload'] = 'kegiatan/dokumentasi/upload';
$route['kegiatan/dokumentasi/delete'] = 'kegiatan/dokumentasi/delete';
$route['kegiatan/dokumentasi/([.0-9a-zA-Z-]+)'] = 'kegiatan/dokumentasi/index/$1';


$route['upload/lra-skpd'] = 'upload_lra/skpd';
$route['upload/lra-skpd/load'] = 'upload_lra/skpd/load';
$route['upload/lra-skpd/detail/([.0-9a-zA-Z-]+)'] = 'upload_lra/skpd/detail/$1';
$route['upload/lra-skpd/load-apbd'] = 'upload_lra/skpd/load_apbd';
$route['upload/lra-skpd/form-upload'] = 'upload_lra/skpd/form_upload';
$route['upload/lra-skpd/upload'] = 'upload_lra/skpd/upload';
$route['upload/lra-skpd/delete'] = 'upload_lra/skpd/delete';
$route['upload/lra-skpd/detail2/([.0-9a-zA-Z-]+)/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'upload_lra/skpd/detail2/$1/$2/$3';
$route['upload/lra-skpd/load-apbd2'] = 'upload_lra/skpd/load_apbd2';

$route['upload/lra-pemko'] = 'upload_lra/pemko';
$route['upload/lra-pemko/load'] = 'upload_lra/pemko/load';
$route['upload/lra-pemko/form-upload'] = 'upload_lra/pemko/form_upload';
$route['upload/lra-pemko/upload'] = 'upload_lra/pemko/upload';
$route['upload/lra-pemko/delete'] = 'upload_lra/pemko/delete';
$route['upload/lra-pemko/detail/([.0-9a-zA-Z-]+)'] = 'upload_lra/pemko/detail/$1';
$route['upload/lra-pemko/load-detail'] = 'upload_lra/pemko/load_detail';

$route['upload/anggaran-pemko'] = 'upload_anggaran/pemko';
$route['upload/anggaran-pemko/load'] = 'upload_anggaran/pemko/load';
$route['upload/anggaran-pemko/form-upload'] = 'upload_anggaran/pemko/form_upload';
$route['upload/anggaran-pemko/upload'] = 'upload_anggaran/pemko/upload';
$route['upload/anggaran-pemko/delete'] = 'upload_anggaran/pemko/delete';

$route['upload/anggaran-skpd'] = 'upload_anggaran/skpd';
$route['upload/anggaran-skpd/load'] = 'upload_anggaran/skpd/load';
$route['upload/anggaran-skpd/form-upload'] = 'upload_anggaran/skpd/form_upload';
$route['upload/anggaran-skpd/upload'] = 'upload_anggaran/skpd/upload';
$route['upload/anggaran-skpd/delete'] = 'upload_anggaran/skpd/delete';
$route['upload/anggaran-skpd/detail/([.0-9a-zA-Z-]+)'] = 'upload_anggaran/skpd/detail/$1';
$route['upload/anggaran-skpd/load-anggaran'] = 'upload_anggaran/skpd/load_anggaran';

$route['upload-kegiatan-fisik'] = 'upload_kegiatan/kegiatan_fisik';
$route['upload/kegiatan-skpd/detail/([.0-9a-zA-Z-]+)'] = 'upload_kegiatan/skpd/detail/$1';
$route['upload/kegiatan-skpd/rekap/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'upload_kegiatan/skpd/rekap/$1/$2';
$route['upload/kegiatan-skpd/cetak/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'upload_kegiatan/cetak/index/$1/$2';
$route['upload/sirup-skpd'] = 'upload_sirup/skpd';
$route['upload/sirup-skpd/detail/([.0-9a-zA-Z-]+)'] = 'upload_sirup/skpd/detail/$1';


// ====================================== ROUTING DANA DESA ==========================================
$route['upload/dana-desa-([.0-9]+)-([.0-9]+)'] = 'upload/danadesa/index/$1/$2';
$route['wilayah/dana-desa-([.0-9]+)-([.0-9]+)'] = 'wilayah/danadesa/index/$1/$2';

// ====================================== ROUTING DANA DESA ==========================================
$route['upload-anggaran-kas'] = 'upload_anggaran_kas/anggarankas';
$route['upload-realisasi-kontrak'] = 'upload_realisasi_kontrak/realisasikontrak';
$route['anggaran-kas-detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'upload_anggaran_kas/anggarankas/detail/$1/$2';
$route['realisasi-kontrak-detail/([.0-9a-zA-Z-]+)'] = 'upload_realisasi_kontrak/realisasikontrak/detail/$1';



$route['404_override'] = '';
$route['translate_uri_dashes/([.0-9a-zA-Z-]+)'] = FALSE;
