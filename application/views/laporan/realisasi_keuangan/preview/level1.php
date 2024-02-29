<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Progress Report Pengendalian Pembangunan Provinsi Sumatera Utara</title>
    <meta name="description" content="Progress Report Pengendalian Pembangunan Provinsi Sumatera Utara" />
    <meta name="keywords" content="aplikasi,kota,pematangsiantar,siantar,pengendalian,pembangunan,report" />
    <meta name="author" content="Progress Report Pengendalian Pembangunan Provinsi Sumatera Utara" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="all,follow">

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('images/preloader.png'); ?>">
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

        .alignright {
            float: right;
            width: 300px;
            text-align: right;
        }

        .aligntandatangan {
            padding-left: 75%;
            float: left;
            width: 250px;
            text-align: center;
        }

        table {
            font-size: 11px;
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 4px 8px;
        }

        hr {
            margin-top: 20px;
            margin-bottom: 26px;
        }
    </style>

</head>

<body>
    <div class='box-header'>
        <div class='alignleft'>
            <img src='<?= base_url('images/logo_pemprovsu.png'); ?>' width='50px'>
        </div>
        <div class='aligncenter'>
            <span class='title'>PEMERINTAH PROVINSI SUMATERA UTARA</span>
            <span class='title'>LAPORAN REALISASI ANGGARAN PENDAPATAN DAN BELANJA DAERAH</span>
            <span class='title'><?= $skpd['nama_skpd'] ?></span>
            <i>periode 1 Januari 2021 s.d <?=$nama_periode?></i>
        </div>
    </div>
    <br>
    <br>
    <br>
    <hr>
    <div class='box-body'>
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th rowspan="2" width="5px">No</th>
                    <th rowspan="2"  class="text-center">Kode Rekening</th>
                    <th rowspan="2"  class="text-center">Uraian</th>
                    <th rowspan="2"  class="text-center">Anggaran</th>
                    <th colspan="4" class="text-center">Realisasi</th>
                </tr>
                    <tr>
                    <th class="text-center">Bulan Lalu</th>
                    <th class="text-center">Persen</th>
                    <th class="text-center">Bulan Ini</th>
                    <th class="text-center">Persen</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $no = 1;
                $tgl_papbd=$cek_papbd['papbd'];
                $temp_bulan=substr($tgl_papbd,5,2);
                $hsl_bulan=intval($temp_bulan);

                if($bulan<$hsl_bulan){$hsl_stanggaran=1;}
                else{$hsl_stanggaran=2;}

                if($bulan_1<$hsl_bulan){$hsl_stanggaran_1=1;}
                else{$hsl_stanggaran_1=2;}

                foreach ($result as $r) :
                    $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd['id_skpd'], 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
                    $row_anggaran_1 = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd['id_skpd'], 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran_1]);
                    $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
                    
                    $result_realisasi_1 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd['id_skpd'], 'tahun' => $tahun, 'bulan' => $bulan_1, 'kode_rekening' => $r['kode_rekening']]);

                    if($row_anggaran['anggaran']==0){$persen_anggaran=0;}
                    else
                    {
                        $persen_anggaran = round(($r['realisasi'] / $row_anggaran['anggaran'] * 100), 2);
                    }

                    if($row_anggaran_1['anggaran']==0){$persen_anggaran_1=0;}
                    else
                    {
                        $persen_anggaran_1 = round(($result_realisasi_1['realisasi'] / $row_anggaran_1['anggaran'] * 100), 2);
                    }

                    if($row_uraian['level']<=$level)
                    {
                ?>

                    <tr>
                        <td style="text-align: center;"><?= $no++; ?></td>
                        <td style="text-align: left;"><?= $r['kode_rekening'] ?></td>
                        <td style="text-align: left;"><?= $row_uraian['uraian'] ?></td>
                        <td style="text-align: right;"><?= format_rupiah($row_anggaran['anggaran']) ?></td>
                        <td style="text-align: right;"><?= format_rupiah($result_realisasi_1['realisasi']) ?></td>
                        <td style="text-align: right;"><?= format_rupiah($persen_anggaran_1) ?></td>
                        <td style="text-align: right;"><?= format_rupiah($r['realisasi']) ?></td>
                        <td style="text-align: right;"><?= format_rupiah($persen_anggaran) ?></td>
                    </tr>
                <?php } endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>       
    <br>     
    <div class='aligntandatangan'>
        Medan, <?=nama_bulan(date('Y-m-d'))?>
        <br>Kepala <?= $skpd['nama_skpd'] ?>
        <br>       
        <br>
        <br>  
        <br><?= $penanda_tangan['nama_ttd'] ?>  
        <br><?= $penanda_tangan['nip_ttd'] ?>  
    </div>
</body>

</html>