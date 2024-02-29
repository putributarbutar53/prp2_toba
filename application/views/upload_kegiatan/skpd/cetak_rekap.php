<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Progress Report Pengendalian Pembangunan Provinsi Sumatera Utara</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('images/preloader.png'); ?>">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/default.css">
    <style type='text/css'>
        @page {
            size: 33cm 21.5cm;
        }

        body {
            font-family: Times;
            font-size: 10px;
        }

        div.box-header {
            text-align: center;
            padding-bottom: 20px;
        }

        div.box-body {
            font-size: 12px;
            clear: both;
            margin-top: 15px;
        }

        span.title {
            margin: 0;
            font-size: 14px;
            font-weight: bold;
            display: block;
        }

        span.alamat {
            margin: 0;
            font-size: 12px;
            display: block;
        }

        span.telepon {
            font-size: 12px;
            display: block;
        }

        .alignleft {
            float: left;
            width: 100px;
            text-align: left;
        }

        .aligncenter {
            float: left;
            width: 80%;
            text-align: center;
        }

        table {
            font-size: 10px;
        }

        hr {
            margin-top: 20px;
            margin-bottom: 26px;
        }

        .table-cetak-rekap {
            font-family: sans-serif;
            color: #444;
            border-collapse: collapse;
            width: 50%;
            border: 1px solid #f2f5f7;
        }

        .table-cetak-rekap th {
            font-size: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            color: #000;
            background-color: #00a65a;
        }

        .table-cetak-rekap td {
            font-size: 10px;
            padding: 10px 5px;
            border: 1px solid #ccc;
        }
    </style>

</head>

<!-- <body onload='window.print()'> -->

<body onload='window.print()' onfocus='window.close()'>
    <div class='box-header'>
        <div class='alignleft'>
            <img src='<?= base_url('images/preloader.png'); ?>' width='50px'>
        </div>
        <div class='aligncenter'>
            <span class='title'>Data Kegiatan <?= $skpd['nama_skpd'] ?> Pada APBD Provinsi Sumatera Utara</span>
            <span class='title'><?= bulan($bulan) . ' ' . $tahun; ?></span>
        </div>
    </div>
    <br>
    <br>
    <hr>
    <div class='box-body'>
        <table class="table-cetak-rekap" style="width: 100%;">
            <thead>
                <tr>
                    <th rowspan="4" style="width: 120px;">KODE REKENING</th>
                    <th rowspan="4">PROGRAM DAN KEGIATAN</th>
                    <th class="text-center" rowspan="4">SUMBER DANA<br>(Rp)</th>
                    <th class="text-center" rowspan="4">PAGU DALAM DPA<br>(Rp)</th>
                    <th class="text-center" rowspan="4">JUMLAH SP2D</th>
                    <th class="text-center" rowspan="4">SISA DANA (DPA)</th>
                    <th class="text-center" colspan="7">PEREKEMBANGAN KEMAJUAN</th>
                    <th class="text-center" rowspan="4">SISA DANA BELUM DIREALIASIKAN<br>(Rp)</th>
                    <th class="text-center" rowspan="4">%</th>
                </tr>
                <tr>
                    <th class="text-center" colspan="2">FISIK</th>
                    <th class="text-center" colspan="5">KEUANGAN</th>
                </tr>
                <tr>
                    <th class="text-center">RENC.</th>
                    <th class="text-center">RAEL</th>
                    <th class="text-center">S/D BULAN LALU</th>
                    <th class="text-center" colspan="2">BULAN INI</th>
                    <th class="text-center" colspan="2">S/D BULAN INI</th>
                </tr>
                <tr>
                    <th class="text-center">%</th>
                    <th class="text-center">%</th>
                    <th class="text-center">(Rp)</th>
                    <th class="text-center">(Rp)</th>
                    <th class="text-center">%</th>
                    <th class="text-center">(Rp)</th>
                    <th class="text-center">%</th>
                </tr>
                <tr>
                    <th class="text-center">1</th>
                    <th class="text-center">2</th>
                    <th class="text-center">3</th>
                    <th class="text-center">4</th>
                    <th class="text-center">5</th>
                    <th class="text-center">6</th>
                    <th class="text-center">7</th>
                    <th class="text-center">8</th>
                    <th class="text-center">9</th>
                    <th class="text-center">10</th>
                    <th class="text-center">11</th>
                    <th class="text-center">12</th>
                    <th class="text-center">13</th>
                    <th class="text-center">14</th>
                    <th class="text-center">15</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($result_kegiatan as $r) : ?>
                    <?php
                    $periode = $tahun . '-' . $bulan;
                    $periode_lalu = date('Y-m', strtotime(date($periode) . '- 1 month'));
                    $explode_priode = explode("-", $periode_lalu);
                    $tahun_lalu = $explode_priode[0];
                    $bulan_lalu = $explode_priode[1];
                    if ($r['level'] == 1) {
                        $this->db->select_sum('anggaran');
                        $this->db->where(['tahun' => $tahun, 'bulan' => $bulan, 'level' => 3]);
                        $this->db->like('parent', $r['kode_rekening'], 'after');
                        $query_realisasi = $this->db->get('detail_realisasi_skpd')->row_array();
                        $realisasi = $query_realisasi['anggaran'];

                        $this->db->select_sum('anggaran');
                        $this->db->where(['tahun' => $tahun_lalu, 'bulan' => $bulan_lalu, 'level' => 3]);
                        $this->db->like('parent', $r['kode_rekening'], 'after');
                        $query_realisasi_sebelumnya = $this->db->get('detail_realisasi_skpd')->row_array();
                        $realisasi_sebelumnya = $query_realisasi_sebelumnya['anggaran'];

                        $this->db->select_sum('anggaran');
                        $this->db->where(['tahun' => $tahun, 'level' => 3]);
                        $this->db->like('parent', $r['kode_rekening'], 'after');
                        $query_anggaran = $this->db->get('detail_kegiatan_skpd')->row_array();
                        $anggaran = $query_anggaran['anggaran'];
                    } elseif ($r['level'] == 2) {
                        $this->db->select_sum('anggaran');
                        $this->db->where(['tahun' => $tahun, 'bulan' => $bulan, 'level' => 3, 'parent' => $r['kode_rekening']]);
                        $query_realisasi = $this->db->get('detail_realisasi_skpd')->row_array();
                        $realisasi = $query_realisasi['anggaran'];

                        $this->db->select_sum('anggaran');
                        $this->db->where(['tahun' => $tahun_lalu, 'bulan' => $bulan_lalu, 'level' => 3, 'parent' => $r['kode_rekening']]);
                        $query_realisasi_sebelumnya = $this->db->get('detail_realisasi_skpd')->row_array();
                        $realisasi_sebelumnya = $query_realisasi_sebelumnya['anggaran'];

                        $this->db->select_sum('anggaran');
                        $this->db->where(['tahun' => $tahun, 'level' => 3, 'parent' => $r['kode_rekening']]);
                        $query_anggaran = $this->db->get('detail_kegiatan_skpd')->row_array();
                        $anggaran = $query_anggaran['anggaran'];
                    } else {
                        $realisasi = $r['anggaran'];

                        $query_realisasi_sebelumnya = $this->mquery->select_id('detail_realisasi_skpd', ['tahun' => $tahun_lalu, 'bulan' => $bulan_lalu, 'level' => 3, 'kode_rekening' => $r['kode_rekening'], 'parent' => $r['parent']]);
                        $realisasi_sebelumnya = $query_realisasi_sebelumnya['anggaran'];

                        $query_anggaran = $this->mquery->select_id('detail_kegiatan_skpd', ['tahun' => $tahun, 'level' => 3, 'kode_rekening' => $r['kode_rekening'], 'parent' => $r['parent']]);
                        $anggaran = $query_anggaran['anggaran'];
                    }

                    $sisa_dana = $anggaran - $realisasi;
                    $persen_realisasi = $realisasi / $anggaran * 100;
                    $realisasi_bulan_ini = $realisasi - $realisasi_sebelumnya;
                    $persen_realisasi_bulan_ini = $realisasi_bulan_ini / $anggaran * 100;
                    $persen_sisa = $sisa_dana / $anggaran * 100;

                    // kolom 4 = anggaran
                    // kolom 5 = realisasi
                    // kolom 6 = sisa_dana
                    // kolom 7 = persen rencana 100%
                    // kolom 8 = persen_realisaisi (kolom 5/kolom 4 * 100 )
                    // kolom 9 = realisasi_sebelumnya (kolom 5 bulan lalu)
                    // kolom 10 = realisasi_bulan_ini (kolom 5 - kolom 9)
                    // kolom 11 = persen_realisasi_bulan_ini (kolom 10/kolom 4 * 100
                    // kolom 12 = kolom 5
                    // kolom 13 = kolom 7
                    // kolom 14 = kolom 6
                    // kolom 15 = persen_sisa (kolom14/kolom4*100)
                    ?>
                    <?php if ($r['level'] == 1) : ?>
                        <tr style="background-color: #00a65a; font-weight: bold; font-size: 12px;">
                        <?php elseif ($r['level'] == 2) : ?>
                        <tr style="background-color: yellow; font-weight: bold; font-size: 12px;">
                        <?php else : ?>
                        <tr>
                        <?php endif; ?>
                        <td><?= $r['kode_rekening'] ?></td>
                        <td><?= $r['uraian'] ?></td>
                        <td> - </td>
                        <td class="text-right">
                            <?= format_rupiah($anggaran); // kolom 4 
                            ?></td>
                        <td class="text-right">
                            <?= format_rupiah($realisasi); // kolom 5 
                            ?></td>
                        <td class="text-right">
                            <?= format_rupiah($sisa_dana); // kolom 6 
                            ?></td>
                        <td class="text-center">
                            <?= "100%"; // kolom 7 
                            ?></td>
                        <td class="text-center">
                            <?= number_format($persen_realisasi, 2); // kolom 8 
                            ?></td>
                        <td class="text-right">
                            <?= format_rupiah($realisasi_sebelumnya); // kolom 9 
                            ?></td>
                        <td class="text-right">
                            <?= format_rupiah($realisasi_bulan_ini); // kolom 10 
                            ?></td>
                        <td class="text-center">
                            <?= number_format($persen_realisasi_bulan_ini, 2); // kolom 11 
                            ?></td>
                        <td class="text-center">
                            <?= format_rupiah($realisasi); // kolom 12 
                            ?></td>
                        <td class="text-center">
                            <?= number_format($persen_realisasi, 2); // kolom 13
                            ?></td>
                        <td class="text-right">
                            <?= format_rupiah($sisa_dana); // kolom 14
                            ?></td>
                        <td class="text-center">
                            <?= number_format($persen_sisa, 2); // kolom 15
                            ?></td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</body>

</html>