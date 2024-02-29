<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['login'] = 'login';
$route['logout'] = 'login/logout';
$route['blocked'] = 'login/blocked';

$route['apbd-([.0-9]+)'] = 'publik/dashboard/index/$1';
$route['apbd-provinsi1-([.0-9]+)'] = 'publik/dashboard1/index/$1';
$route['pendapatan-opd-provinsi'] = 'publik/dashboard/realisasi_pendapatan';
$route['belanja-opd-provinsi'] = 'publik/dashboard/realisasi_belanja';
$route['apbd-opd/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'publik/skpd/detail/$1/$2';

$route['dana-desa'] = 'publik/danadesa';
$route['kegiatan-fisik-([.0-9]+)'] = 'publik/kegiatan_strategis/index/$1';
$route['penanggulangan-covid19'] = 'publik/penanggulangan_covid19';
$route['kaldera-toba'] = 'publik/kaldera_toba';

$route['kabupaten-kota-([.0-9]+)'] = 'publik/kabupatenkota/index/$1';
$route['kabupaten-kota-detail-([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'publik/kabupatendetail/index/$1/$2';
$route['kabupaten-kota-detail1/([.0-9a-zA-Z-]+)'] = 'publik/kabupatendetail/khususkota/$1';

$route['mandatory-spending-([.0-9]+)'] = 'publik/mandatory/index/$1';
$route['upload-lra-kabupaten-kota'] = 'upload_lra_kabupaten/lra_kabupaten';
$route['upload-lra-kabupaten-kota/load'] = 'upload_lra_kabupaten/lra_kabupaten/load';
$route['upload-lra-kabupaten-kota/load_anggaran'] = 'upload_lra_kabupaten/lra_kabupaten/load_anggaran';
$route['upload-lra-kabupaten-kota/form'] = 'upload_lra_kabupaten/lra_kabupaten/form';
$route['upload-lra-kabupaten-kota/add'] = 'upload_lra_kabupaten/lra_kabupaten/add';
$route['upload-lra-kabupaten-kota/edit'] = 'upload_lra_kabupaten/lra_kabupaten/edit';
$route['upload-lra-kabupaten-kota/delete'] = 'upload_lra_kabupaten/lra_kabupaten/delete';
$route['upload-lra-kabupaten-kota/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'upload_lra_kabupaten/lra_kabupaten/detail/$1/$2';

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

$route['pdf-preview-laporan-fisik/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'pdf/preview/laporan_fisik/preview/$1/$2';
$route['pdf-cetak-laporan-fisik/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'pdf/cetak/laporan_fisik/cetak/$1/$2';

$route['kirim-keuangan-level1/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'laporan/kirim_laporan/index/$1/$2';

$route['realisasi-keuangan'] = 'laporan/realisasi_keuangan';
$route['realisasi-keuangan/load'] = 'laporan/realisasi_keuangan/load';
$route['realisasi-keuangan/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'laporan/realisasi_keuangan/detail/$1/$2';
$route['realisasi-keuangan/detail2/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'laporan/realisasi_keuangan/detail2/$1/$2';

$route['laporan-realisasi-keuangan'] = 'laporan/laporan_realisasi';
$route['laporan-realisasi-keuangan/load'] = 'laporan/laporan_realisasi/load';
$route['laporan-realisasi-keuangan/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'laporan/laporan_realisasi/detail/$1/$2';
$route['laporan-realisasi-keuangan/detail2/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'laporan/laporan_realisasi/detail2/$1/$2';

$route['laporan-realisasi-fisik'] = 'laporan/laporan_fisik';
$route['laporan-realisasi-fisik/detail/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'laporan/laporan_fisik/detail/$1/$2';

// ================================== ROUTING ADMIN ===================================
$route['nama-daerah'] = 'master/nama_daerah';
$route['nama-daerah/load'] = 'master/nama_daerah/load';
$route['nama-daerah/form'] = 'master/nama_daerah/form';
$route['nama-daerah/edit'] = 'master/nama_daerah/edit';

$route['data-skpd'] = 'master/skpd';
$route['data-skpd/load'] = 'master/skpd/load';
$route['data-skpd/form'] = 'master/skpd/form';
$route['data-skpd/add'] = 'master/skpd/add';
$route['data-skpd/edit'] = 'master/skpd/edit';
$route['data-skpd/delete'] = 'master/skpd/delete';

$route['jenis-pelaksanaan'] = 'master/jenis_pelaksanaan';
$route['jenis-pelaksanaan/load'] = 'master/jenis_pelaksanaan/load';
$route['jenis-pelaksanaan/form'] = 'master/jenis_pelaksanaan/form';
$route['jenis-pelaksanaan/add'] = 'master/jenis_pelaksanaan/add';
$route['jenis-pelaksanaan/edit'] = 'master/jenis_pelaksanaan/edit';
$route['jenis-pelaksanaan/delete'] = 'master/jenis_pelaksanaan/delete';

$route['kepala-skpd'] = 'master/kepala_skpd';
$route['kepala-skpd/load'] = 'master/kepala_skpd/load';
$route['kepala-skpd/form'] = 'master/kepala_skpd/form';
$route['kepala-skpd/add'] = 'master/kepala_skpd/add';
$route['kepala-skpd/new_ttd'] = 'master/kepala_skpd/new_ttd';
$route['kepala-skpd/edit'] = 'master/kepala_skpd/edit';
$route['kepala-skpd/delete'] = 'master/kepala_skpd/delete';

$route['mandatory'] = 'provinsi/mandatory';
$route['mandatory/load'] = 'provinsi/mandatory/load';
$route['mandatory/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'provinsi/mandatory/detail/$1/$2';
$route['mandatory/load_anggaran'] = 'provinsi/mandatory/load_anggaran';
$route['mandatory/form'] = 'provinsi/mandatory/form';
$route['mandatory/add'] = 'provinsi/mandatory/add';
$route['mandatory/edit'] = 'provinsi/mandatory/edit';
$route['mandatory/delete'] = 'provinsi/mandatory/delete';

$route['postur-anggaran'] = 'provinsi/postur_anggaran';
$route['postur-anggaran/load'] = 'provinsi/postur_anggaran/load';
$route['postur-anggaran/form'] = 'provinsi/postur_anggaran/form';
$route['postur-anggaran/add'] = 'provinsi/postur_anggaran/add';
$route['postur-anggaran/edit'] = 'provinsi/postur_anggaran/edit';
$route['postur-anggaran/delete'] = 'provinsi/postur_anggaran/delete';

$route['dana-transfer'] = 'provinsi/dana_transfer';
$route['dana-transfer/load'] = 'provinsi/dana_transfer/load';
$route['dana-transfer/form'] = 'provinsi/dana_transfer/form';
$route['dana-transfer/add'] = 'provinsi/dana_transfer/add';
$route['dana-transfer/edit'] = 'provinsi/dana_transfer/edit';
$route['dana-transfer/delete'] = 'provinsi/dana_transfer/delete';

$route['dana-dak'] = 'provinsi/danadak';
$route['dana-dak/load'] = 'provinsi/danadak/load';
$route['dana-dak/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'provinsi/danadak/detail/$1/$2';
$route['dana-dak/load_detail'] = 'provinsi/danadak/load_detail';
$route['dana-dak/form'] = 'provinsi/danadak/form';
$route['dana-dak/add'] = 'provinsi/danadak/add';
$route['dana-dak/edit'] = 'provinsi/danadak/edit';
$route['dana-dak/delete'] = 'provinsi/danadak/delete';

$route['dana-dekonsentrasi'] = 'provinsi/danadekon';
$route['dana-dekonsentrasi/load'] = 'provinsi/danadekon/load';
$route['dana-dekonsentrasi/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'provinsi/danadekon/detail/$1/$2';
$route['dana-dekonsentrasi/load_anggaran'] = 'provinsi/danadekon/load_anggaran';
$route['dana-dekonsentrasi/form'] = 'provinsi/danadekon/form';
$route['dana-dekonsentrasi/add'] = 'provinsi/danadekon/add';
$route['dana-dekonsentrasi/edit'] = 'provinsi/danadekon/edit';
$route['dana-dekonsentrasi/delete'] = 'provinsi/danadekon/delete';

$route['dana-tp'] = 'provinsi/danatp';
$route['dana-tp/load'] = 'provinsi/danatp/load';
$route['dana-tp/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'provinsi/danatp/detail/$1/$2';
$route['dana-tp/load_anggaran'] = 'provinsi/danatp/load_anggaran';
$route['dana-tp/form'] = 'provinsi/danatp/form';
$route['dana-tp/add'] = 'provinsi/danatp/add';
$route['dana-tp/edit'] = 'provinsi/danatp/edit';
$route['dana-tp/delete'] = 'provinsi/danatp/delete';

$route['data-apbd'] = 'provinsi/data_apbd';
$route['data-apbd/load'] = 'provinsi/data_apbd/load';
$route['data-apbd/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'provinsi/data_apbd/detail/$1/$2';
$route['data-apbd/realisasi_pad_opd'] = 'provinsi/data_apbd/realisasi_pad_opd';
$route['data-apbd/realisasi_belanja_opd'] = 'provinsi/data_apbd/realisasi_belanja_opd';
$route['data-apbd/arus_kas_opd'] = 'provinsi/data_apbd/arus_kas_opd';

$route['master/pengguna-anggaran'] = 'master/pengguna_anggaran';
$route['master/bendahara-pengeluaran'] = 'master/bendahara_pengeluaran';

$route['kegiatan'] = 'kegiatan/kegiatan';
$route['kegiatan/skpd/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'kegiatan/kegiatan/skpd/$1/$2';
$route['kegiatan/load_kegiatan'] = 'kegiatan/kegiatan/load_kegiatan';
$route['kegiatan/form'] = 'kegiatan/kegiatan/form';
$route['kegiatan/add'] = 'kegiatan/kegiatan/add';
$route['kegiatan/edit'] = 'kegiatan/kegiatan/edit';
$route['kegiatan/delete'] = 'kegiatan/kegiatan/delete';

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
$route['kegiatan/dokumentasi/load_dk'] = 'kegiatan/dokumentasi/load_dk';

$route['anggaran-kabupaten-kota'] = 'kabupaten/anggaran';
$route['anggaran-kabupaten-kota/load'] = 'kabupaten/anggaran/load';
$route['anggaran-kabupaten-kota/form_add'] = 'kabupaten/anggaran/form_add';
$route['anggaran-kabupaten-kota/add'] = 'kabupaten/anggaran/add';
$route['anggaran-kabupaten-kota/form_edit'] = 'kabupaten/anggaran/form_edit';
$route['anggaran-kabupaten-kota/edit'] = 'kabupaten/anggaran/edit';
$route['anggaran-kabupaten-kota/delete'] = 'kabupaten/anggaran/delete';

$route['mandatory-kabupaten-kota'] = 'kabupaten/mandatory';
$route['mandatory-kabupaten-kota/load'] = 'kabupaten/mandatory/load';
$route['mandatory-kabupaten-kota/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'kabupaten/mandatory/detail/$1/$2';
$route['mandatory-kabupaten-kota/load_anggaran'] = 'kabupaten/mandatory/load_anggaran';
$route['mandatory-kabupaten-kota/form'] = 'kabupaten/mandatory/form';
$route['mandatory-kabupaten-kota/add'] = 'kabupaten/mandatory/add';
$route['mandatory-kabupaten-kota/edit'] = 'kabupaten/mandatory/edit';
$route['mandatory-kabupaten-kota/delete'] = 'kabupaten/mandatory/delete';

$route['apbd-kabupaten-kota'] = 'kabupaten/apbd';
$route['apbd-kabupaten-kota/load'] = 'kabupaten/apbd/load';
$route['apbd-kabupaten-kota/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'kabupaten/apbd/detail/$1/$2';
$route['apbd-kabupaten-kota/load_detail'] = 'kabupaten/apbd/load_detail';
$route['apbd-kabupaten-kota/form_add'] = 'kabupaten/apbd/form_add';
$route['apbd-kabupaten-kota/add'] = 'kabupaten/apbd/add';
$route['apbd-kabupaten-kota/form_edit'] = 'kabupaten/apbd/form_edit';
$route['apbd-kabupaten-kota/edit'] = 'kabupaten/apbd/edit';
$route['apbd-kabupaten-kota/delete'] = 'kabupaten/apbd/delete';

$route['tkdd-kabupaten-kota'] = 'kabupaten/tkdd';
$route['tkdd-kabupaten-kota/load'] = 'kabupaten/tkdd/load';
$route['tkdd-kabupaten-kota/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'kabupaten/tkdd/detail/$1/$2';
$route['tkdd-kabupaten-kota/load_detail'] = 'kabupaten/tkdd/load_detail';
$route['tkdd-kabupaten-kota/form_add'] = 'kabupaten/tkdd/form_add';
$route['tkdd-kabupaten-kota/add'] = 'kabupaten/tkdd/add';
$route['tkdd-kabupaten-kota/form_edit'] = 'kabupaten/tkdd/form_edit';
$route['tkdd-kabupaten-kota/edit'] = 'kabupaten/tkdd/edit';
$route['tkdd-kabupaten-kota/delete'] = 'kabupaten/tkdd/delete';

$route['upload-lra-opd'] = 'upload_lra/skpd';
$route['upload-lra-opd/load'] = 'upload_lra/skpd/load';
$route['upload-lra-opd/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'upload_lra/skpd/detail/$1/$2';
$route['upload-lra-opd/load-apbd'] = 'upload_lra/skpd/load_apbd';
$route['upload-lra-opd/form-upload'] = 'upload_lra/skpd/form_upload';
$route['upload-lra-opd/upload'] = 'upload_lra/skpd/upload';
$route['upload-lra-opd/delete'] = 'upload_lra/skpd/delete';
$route['upload-lra-opd/detail2/([.0-9a-zA-Z-]+)/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'upload_lra/skpd/detail2/$1/$2/$3';
$route['upload-lra-opd/load-apbd2'] = 'upload_lra/skpd/load_apbd2';
$route['upload-lra-opd/skpd/form'] = 'upload_lra/skpd/form';
$route['upload-lra-opd/skpd/add'] = 'upload_lra/skpd/add';
$route['upload-lra-opd/skpd/edit'] = 'upload_lra/skpd/edit';
$route['upload-lra-opd/skpd/delete_data'] = 'upload_lra/skpd/delete_data';

$route['upload-lra-opd/serapan/detail2/([.0-9a-zA-Z-]+)/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'upload_lra/serapan/detail2/$1/$2/$3';
$route['upload-lra-opd/serapan/load_apbd2'] = 'upload_lra/serapan/load_apbd2';
$route['upload-lra-opd/serapan/form'] = 'upload_lra/serapan/form';
$route['upload-lra-opd/serapan/add'] = 'upload_lra/serapan/add';
$route['upload-lra-opd/serapan/edit'] = 'upload_lra/serapan/edit';
$route['upload-lra-opd/serapan/delete_data'] = 'upload_lra/serapan/delete_data';

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

$route['upload-anggaran-opd'] = 'upload_anggaran/skpd';
$route['upload-anggaran-opd/load'] = 'upload_anggaran/skpd/load';
$route['upload-anggaran-opd/form'] = 'upload_anggaran/skpd/form';
$route['upload-anggaran-opd/form-upload'] = 'upload_anggaran/skpd/form_upload';
$route['upload-anggaran-opd/upload'] = 'upload_anggaran/skpd/upload';
$route['upload-anggaran-opd/add'] = 'upload_anggaran/skpd/add';
$route['upload-anggaran-opd/edit'] = 'upload_anggaran/skpd/edit';
$route['upload-anggaran-opd/delete'] = 'upload_anggaran/skpd/delete';
$route['upload-anggaran-opd/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'upload_anggaran/skpd/detail/$1/$2';
$route['upload-anggaran-opd/load-anggaran'] = 'upload_anggaran/skpd/load_anggaran';

$route['upload-kegiatan-fisik'] = 'upload_kegiatan/kegiatan_fisik';
$route['upload/kegiatan-skpd/detail/([.0-9a-zA-Z-]+)'] = 'upload_kegiatan/skpd/detail/$1';
$route['upload/kegiatan-skpd/rekap/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'upload_kegiatan/skpd/rekap/$1/$2';
$route['upload/kegiatan-skpd/cetak/([.0-9a-zA-Z-]+)/([.0-9a-zA-Z-]+)'] = 'upload_kegiatan/cetak/index/$1/$2';
$route['upload/sirup-skpd'] = 'upload_sirup/skpd';
$route['upload/sirup-skpd/detail/([.0-9a-zA-Z-]+)'] = 'upload_sirup/skpd/detail/$1';

// ====================================== ROUTING DANA DESA ==========================================
$route['upload-dana-desa'] = 'upload/danadesa';
$route['upload-dana-desa/([.0-9]+)/([.0-9]+)'] = 'upload/danadesa/index/$1/$2';
$route['upload-dana-desa/load'] = 'upload/danadesa/load';
$route['upload-dana-desa/form_upload'] = 'upload/danadesa/form_upload';
$route['upload-dana-desa/upload'] = 'upload/danadesa/upload';
$route['upload-dana-desa/delete'] = 'upload/danadesa/delete';
//$route['wilayah/dana-desa-([.0-9]+)-([.0-9]+)'] = 'wilayah/danadesa/index/$1/$2';
$route['data-dana-desa'] = 'wilayah/danadesa';
$route['data-dana-desa/([.0-9]+)/([.0-9]+)'] = 'wilayah/danadesa/index/$1/$2';
$route['data-dana-desa/anggaran_danadesa'] = 'wilayah/danadesa/anggaran_danadesa';
$route['data-dana-desa/anggaran_jumlahdesa'] = 'wilayah/danadesa/anggaran_jumlahdesa';
$route['data-dana-desa/persen_realisasi_danadesa'] = 'wilayah/danadesa/persen_realisasi_danadesa';
$route['data-dana-desa/persen_desa_cair'] = 'wilayah/danadesa/persen_desa_cair';
$route['data-dana-desa/jumlah_anggaran_danadesa'] = 'wilayah/danadesa/jumlah_anggaran_danadesa';
$route['data-dana-desa/jumlah_realisasi_danadesa'] = 'wilayah/danadesa/jumlah_realisasi_danadesa';
$route['data-dana-desa/detail_realisasi_danadesa'] = 'wilayah/danadesa/detail_realisasi_danadesa';
$route['data-dana-desa/detail_realisasi_jumlahdesa'] = 'wilayah/danadesa/detail_realisasi_jumlahdesa';
$route['data-dana-desa/tabel_realisasi_danadesa'] = 'wilayah/danadesa/tabel_realisasi_danadesa';
$route['data-dana-desa/tabel_realisasi_jumlahdesa'] = 'wilayah/danadesa/tabel_realisasi_jumlahdesa';

// ====================================== ROUTING DANA DESA ==========================================
$route['upload-anggaran-kas'] = 'upload_anggaran_kas/anggarankas';
$route['upload-anggaran-kas/load'] = 'upload_anggaran_kas/anggarankas/load';
$route['upload-anggaran-kas/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'upload_anggaran_kas/anggarankas/detail/$1/$2';
$route['upload-anggaran-kas/load_anggaran'] = 'upload_anggaran_kas/anggarankas/load_anggaran';
$route['upload-anggaran-kas/form_upload'] = 'upload_anggaran_kas/anggarankas/form_upload';
$route['upload-anggaran-kas/upload'] = 'upload_anggaran_kas/anggarankas/upload';
$route['upload-anggaran-kas/delete'] = 'upload_anggaran_kas/anggarankas/delete';
$route['upload-realisasi-kontrak'] = 'upload_realisasi_kontrak/realisasikontrak';
$route['realisasi-kontrak-detail/([.0-9a-zA-Z-]+)'] = 'upload_realisasi_kontrak/realisasikontrak/detail/$1';

$route['realisasi-dana-dak'] = 'realisasi/dak';
$route['realisasi-dana-dak/load'] = 'realisasi/dak/load';
$route['realisasi-dana-dak/load_apbd2'] = 'realisasi/dak/load_apbd2';
$route['realisasi-dana-dak/form'] = 'realisasi/dak/form';
$route['realisasi-dana-dak/edit'] = 'realisasi/dak/edit';
$route['realisasi-dana-dak/delete'] = 'realisasi/dak/delete';
$route['realisasi-dana-dak/load_apbd'] = 'realisasi/dak/load_apbd';
$route['realisasi-dana-dak/form_upload'] = 'realisasi/dak/form_upload';
$route['realisasi-dana-dak/upload'] = 'realisasi/dak/upload';
$route['realisasi-dana-dak/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'realisasi/dak/detail/$1/$2';
$route['realisasi-dana-dak/detail2/([.0-9a-zA-Z-]+)/([.0-9]+)/([.0-9]+)'] = 'realisasi/dak/detail2/$1/$2/$3';

$route['realisasi-dana-dekon'] = 'realisasi/dekon';
$route['realisasi-dana-dekon/load'] = 'realisasi/dekon/load';
$route['realisasi-dana-dekon/load_apbd2'] = 'realisasi/dekon/load_apbd2';
$route['realisasi-dana-dekon/form'] = 'realisasi/dekon/form';
$route['realisasi-dana-dekon/edit'] = 'realisasi/dekon/edit';
$route['realisasi-dana-dekon/delete'] = 'realisasi/dekon/delete';
$route['realisasi-dana-dekon/load_apbd'] = 'realisasi/dekon/load_apbd';
$route['realisasi-dana-dekon/form_upload'] = 'realisasi/dekon/form_upload';
$route['realisasi-dana-dekon/upload'] = 'realisasi/dekon/upload';
$route['realisasi-dana-dekon/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'realisasi/dekon/detail/$1/$2';
$route['realisasi-dana-dekon/detail2/([.0-9a-zA-Z-]+)/([.0-9]+)/([.0-9]+)'] = 'realisasi/dekon/detail2/$1/$2/$3';

$route['realisasi-dana-tp'] = 'realisasi/tugas';
$route['realisasi-dana-tp/load'] = 'realisasi/tugas/load';
$route['realisasi-dana-tp/load_apbd2'] = 'realisasi/tugas/load_apbd2';
$route['realisasi-dana-tp/form'] = 'realisasi/tugas/form';
$route['realisasi-dana-tp/edit'] = 'realisasi/tugas/edit';
$route['realisasi-dana-tp/delete'] = 'realisasi/tugas/delete';
$route['realisasi-dana-tp/load_apbd'] = 'realisasi/tugas/load_apbd';
$route['realisasi-dana-tp/form_upload'] = 'realisasi/tugas/form_upload';
$route['realisasi-dana-tp/upload'] = 'realisasi/tugas/upload';
$route['realisasi-dana-tp/detail/([.0-9]+)/([.0-9a-zA-Z-]+)'] = 'realisasi/tugas/detail/$1/$2';
$route['realisasi-dana-tp/detail2/([.0-9a-zA-Z-]+)/([.0-9]+)/([.0-9]+)'] = 'realisasi/tugas/detail2/$1/$2/$3';

$route['data-user'] = 'setting/users';
$route['data-user/load'] = 'setting/users/load';
$route['data-user/form'] = 'setting/users/form';
$route['data-user/add'] = 'setting/users/add';
$route['data-user/edit'] = 'setting/users/edit';
$route['data-user/delete'] = 'setting/users/delete';

$route['profil-user'] = 'setting/profile';
$route['profil-user/load'] = 'setting/profile/load';
$route['profil-user/form_foto'] = 'setting/profile/form_foto';
$route['profil-user/edit_foto'] = 'setting/profile/edit_foto';
$route['profil-user/form_password'] = 'setting/profile/form_password';
$route['profil-user/edit_password'] = 'setting/profile/edit_password';

// ========================= Module untuk list menu ===========================
$route['list-menu'] = 'konfigurasi/menu';
$route['list-menu/load'] = 'konfigurasi/menu/load';
$route['list-menu/form-add'] = 'konfigurasi/menu/form_add';
$route['list-menu/add'] = 'konfigurasi/menu/add';
$route['list-menu/form-edit'] = 'konfigurasi/menu/form_edit';
$route['list-menu/edit'] = 'konfigurasi/menu/edit';
$route['list-menu/delete'] = 'konfigurasi/menu/delete';
// ========================= Module untuk akses menu ===========================
$route['akses-menu'] = 'konfigurasi/akses';
$route['akses-menu/form-edit'] = 'konfigurasi/akses/form_edit';
$route['akses-menu/edit'] = 'konfigurasi/akses/edit';

$route['404_override'] = '';
$route['translate_uri_dashes/([.0-9a-zA-Z-]+)'] = FALSE;
