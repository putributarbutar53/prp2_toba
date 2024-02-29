<?php
function cek_query($res, $notifikasi)
{
    $ci = get_instance();
    if ($res > 0) {
        return $ci->session->set_flashdata('flash', 'success-Berhasil-Data Berhasil Di' . $notifikasi);
    } else {
        return $ci->session->set_flashdata('flash', 'error-Gagal-Data Gagal Di' . $notifikasi);
    }
}

function simpan_log($aksi, $keterangan)
{
    $ci = get_instance();
    $tgl_sekarang = date('Y-m-d');
    $tgl_kode = date('y-m-d');
    $cek_kode = $ci->db->get_where('log_user', ['date(waktu_akses)' => $tgl_sekarang])->num_rows();
    if ($cek_kode > 0) {
        $ci->db->select('log_id');
        $ci->db->from('log_user');
        $ci->db->where('date(waktu_akses)', $tgl_sekarang);
        $ci->db->order_by("log_id DESC");
        $ci->db->limit(1, 0);
        $last_kode = $ci->db->get()->row_array();
        $no_urut = substr($last_kode['log_id'], 6, 4);
        $v_kode = (int)($no_urut);
        $id_log = $v_kode + 1;
    } else {
        $id_log = 1;
    }
    $kode_log = str_replace('-', '', $tgl_kode) . str_pad($id_log, 4, "0",  STR_PAD_LEFT);

    $browser = [
        'browser' => $ci->agent->browser(),
        'version' => $ci->agent->version(),
        'os' => $ci->agent->platform(),
        'ip' => $ci->input->ip_address()
    ];
    $string = [
        'log_id'    => $kode_log,
        'username'     => $ci->session->userdata('username'),
        'aktivitas'    => $aksi,
        'aktivitas_detail' => $keterangan,
        'browser'     => json_encode($browser),
        'waktu_akses' => date('Y-m-d H:i:s')
    ];
    return $string;
}

function format_tanggal($tanggal)
{
    return date('d-m-Y', strtotime($tanggal));
}

function tanggal_database($tanggal)
{
    return date('Y-m-d', strtotime($tanggal));
}

function cek_file($path)
{
    if (file_exists(FCPATH . $path)) {
        return base_url($path);
    } else {
        return base_url("uploads/no-image.png");
    }
}

function kode_kabupaten($string)
{
    $provinsi = substr($string, 0, 2);
    $kabupaten = substr($string, 2, 2);
    return $provinsi . '.' . $kabupaten;
}

function kode_kecamatan($string)
{
    $provinsi = substr($string, 0, 2);
    $kabupaten = substr($string, 2, 2);
    $kecamatan = substr($string, 4, 2);
    return $provinsi . '.' . $kabupaten . '.' . $kecamatan;
}

function kode_kelurahan($string)
{
    $provinsi = substr($string, 0, 2);
    $kabupaten = substr($string, 2, 2);
    $kecamatan = substr($string, 4, 2);
    $kelurahan = substr($string, 6, 4);
    return $provinsi . '.' . $kabupaten . '.' . $kecamatan . '.' . $kelurahan;
}




function format_nama($gelar_depan, $nama_pegawai, $gelar_belakang)
{
    if ($gelar_depan == '') {
        if ($gelar_belakang == '') {
            $nama = "$nama_pegawai";
        } else {
            $nama = "$nama_pegawai, $gelar_belakang";
        }
    } else {
        if ($gelar_belakang == '') {
            $nama = "$gelar_depan $nama_pegawai";
        } else {
            $nama = "$gelar_depan $nama_pegawai, $gelar_belakang";
        }
    }

    return $nama;
}

function status_permohonan($status)
{
    if ($status == 0) {
        return "Lengkapi Berkas";
    } elseif ($status == 1) {
        return "Menunggu Verifikasi BKD";
    } elseif ($status == 2) {
        return "Berkas sudah di verifikasi";
    }
}


function action_edit($id)
{
    return "<button id='tombol-ubah' data-id='" . $id . "' data-toggle='modal' data-target='#modal-form-action' class='btn btn-icon btn-round btn-success btn-sm' title='UBAH'><i class='fa fa-edit'></i> </button>";
}

function action_delete($id)
{
    return "<button id='tombol-hapus' data-id='" . $id . "' class='btn btn-icon btn-round btn-danger btn-sm' title='HAPUS'><i class='fa fa-trash'></i></button>";
}

function bulan($bln)
{
    $bulan = $bln;
    switch ($bulan) {
        case 1:
            $bulan = "Januari";
            break;
        case 2:
            $bulan = "Februari";
            break;
        case 3:
            $bulan = "Maret";
            break;
        case 4:
            $bulan = "April";
            break;
        case 5:
            $bulan = "Mei";
            break;
        case 6:
            $bulan = "Juni";
            break;
        case 7:
            $bulan = "Juli";
            break;
        case 8:
            $bulan = "Agustus";
            break;
        case 9:
            $bulan = "September";
            break;
        case 10:
            $bulan = "Oktober";
            break;
        case 11:
            $bulan = "November";
            break;
        case 12:
            $bulan = "Desember";
            break;
    }
    return $bulan;
}

function nama_bulan($tanggal)
    {
        $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }

function hitung_persen($atas, $bawah, $desimal=NULL)
{
    if($desimal==NULL){$desimal=0;}
    if($bawah<=0){$temp_hasil=0;}
    else{
        $temp_hasil=round(($atas/$bawah*100),$desimal);
    }
    return $temp_hasil;
}

function format_angka($nilai)
{
    return number_format($nilai, 0, ',', '.');
}

function format_rupiah($nilai)
{
    return number_format($nilai, 2, ',', '.');
}

function format_3_desimal($nilai)
{
    return number_format($nilai, 3, ',', '.');
}

function angka($nilai)
{
    return str_replace('.', '', $nilai);
}

function konversi_angka($nilai)
{
    $temp_angka = preg_replace("/[^0-9]/", "", $nilai);
    $angka = $temp_angka / 100;
    return $angka;
}

function cek_angka($nilai)
{
    if(empty($nilai) OR $nilai==0){$hasil_cek=0;}else{$hasil_cek=$nilai;}
    return str_replace(",", ".", $hasil_cek);
}

function cek_string($nilai)
{
    if(empty($nilai) OR $nilai==""){$hasil_cek="";}else{$hasil_cek=$nilai;}
    return $hasil_cek;
}

function tipe_jadwal($tipe)
{
    switch ($tipe) {
        case 'M':
            $jadwal = "Minggu";
            break;
        case 'B':
            $jadwal = "Bulan";
            break;
        case 'T':
            $jadwal = "Tahun";
            break;
        default:
            $jadwal = "Hari";
            break;
    }
    return $jadwal;
}

function array_sort($array, $on, $order = SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}
