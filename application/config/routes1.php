<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['logout'] = 'login/logout';
$route['blocked'] = 'login/blocked';

$route['dashboard'] = 'dashboard';

$route['progress-report-apbd'] = 'beranda/pengendalian_apbd';
$route['progress-report-fisik'] = 'beranda/pengendalian_fisik';

// ================================== ROUTING ADMIN ===================================
$route['master/jenis-pelaksanaan'] = 'master/jenis_pelaksanaan';
$route['master/pengguna-anggaran'] = 'master/pengguna_anggaran';
$route['master/penanda-tangan'] = 'master/penanda_tangan';
$route['master/bendahara-pengeluaran'] = 'master/bendahara_pengeluaran';

$route['kegiatan'] = 'kegiatan/kegiatan';
$route['kegiatan/skpd/([.0-9a-zA-Z-]+)'] = 'kegiatan/kegiatan/skpd/$1';
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
$route['upload/lra-skpd/detail2/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'upload_lra/skpd/detail2/$1/$2';
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

$route['upload/kegiatan-skpd'] = 'upload_kegiatan/skpd';
$route['upload/kegiatan-skpd/detail/([.0-9a-zA-Z-]+)'] = 'upload_kegiatan/skpd/detail/$1';
$route['upload/sirup-skpd'] = 'upload_sirup/skpd';
$route['upload/sirup-skpd/detail/([.0-9a-zA-Z-]+)'] = 'upload_sirup/skpd/detail/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
