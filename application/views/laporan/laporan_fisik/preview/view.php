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
            <span class='title'>LAPORAN REALISASI KEGIATAN FISIK</span>
            <span class='title'><?= $skpd['nama_skpd'] ?></span>
            <i>Periode <?=$priode?> </i>
        </div>
    </div>
    <br>
    <br>
    <br>
    <hr>
    <div class='box-body'>
        <table style="width: 100%;">
            <thead>
                <tr style="background-color: #1572EB; color: white;">
                    <th width="5px">NO</th>
                    <th>NO. KONTRAK</th>
                    <th>NAMA KEGIATAN</th>
                    <th class="text-center">WAKTU</th>
                    <th class="text-center">NILAI KONTRAK</th>
                    <th class="text-center">REALISASI KEUANGAN</th>
                    <th class="text-center">REALISASI FISIK</th>
                    <th class="text-center">NAMA PA</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $no = 0;
                foreach ($result as $r) :
                    $no++;
                    $encrypt_id = encrypt_url($r['id_kontrak']);
                    $jml_kontrak_pa = $this->mquery->count_data('ta_kontrak_pa', ['id_kontrak' => $r['id_kontrak']]);
                    
                    if($jml_kontrak_pa==0){$nama_pa="";}
                    else{
                        $kontrak_pa = $this->mquery->select_id('ta_kontrak_pa', ['id_kontrak' => $r['id_kontrak']]);
                        $nama_pa=$kontrak_pa['nama_pa'];
                    }

                    $no_kontrak=$r['no_kontrak'];
                    $hit_kontrak_real = $this->mquery->count_data('data_kontrak_real', ['no_kontrak' => $no_kontrak]);
                    if($hit_kontrak_real==0){$realisasi=0;}
                    {
                        $sum_kontrak_real = $this->mquery->sum_data('data_kontrak_real', 'nilai', ['no_kontrak' => $no_kontrak]);
                        $realisasi=$sum_kontrak_real['nilai'];
                    }

                    if($r['nilai']==0){$persen_real=0;}
                    else{
                        $persen_real=hitung_persen($realisasi, $r['nilai'], 2);
                    }

                    $jml_fisik = $this->mquery->count_data('data_kegiatan_detail', ['id_kegiatan' => $r['id_kontrak']]);
                    
                    if($jml_fisik==0){$realisasi_fisik=0;}
                    else{
                        $max_realisasi = $this->mquery->max_data_where('data_kegiatan_detail', 'realisasi', ['id_kegiatan' => $r['id_kontrak']]);
                        $realisasi_fisik=$max_realisasi['realisasi'];
                    }

                    if($realisasi_fisik>=$persen_real){$tamp_realisasi_fisik="<button class='btn btn-success btn-sm'>".$realisasi_fisik." %</button>";}
                    else {$tamp_realisasi_fisik="<button class='btn btn-danger btn-sm'>".$realisasi_fisik." %</button>";}

                    if($jml_fisik==0){$tamp_realisasi_fisik="-";}

                    if ($this->akses['role'] == "pakar"){$keperluan=$r['keperluan'];}
                    else{$keperluan = "<a href=" . base_url("kegiatan/detail/" . $encrypt_id) . ">" . $r['keperluan'] . "</a>";}
                    
                    $data_kontrak="Nomor : ".$r['no_kontrak']."<br>Tanggal : ".substr($r['tgl_kontrak'],0,10);
            
                ?>

                    <tr>
                        <td style="text-align: center;"><?= $no; ?></td>
                        <td style="text-align: left;"><?= $data_kontrak ?></td>
                        <td style="text-align: left;"><?= $r['keperluan'] ?></td>
                        <td style="text-align: right;"><?= $r['waktu'] ?></td>
                        <td style="text-align: right;"><?= format_rupiah($r['nilai']) ?></td>
                        <td style="text-align: right;"><?= format_rupiah($realisasi)."<br>Persen : ".$persen_real." %"; ?></td>
                        <td style="text-align: right;"><?= $realisasi_fisik ?> %</td>
                        <td style="text-align: right;"><?= $nama_pa ?></td>
                    </tr>
                <?php  endforeach; ?>
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
        <br>
        <br>
    </div>
</body>

</html>