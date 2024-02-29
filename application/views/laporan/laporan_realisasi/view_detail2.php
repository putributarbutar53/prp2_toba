<?php
$encrypt_id=encrypt_url($skpd['id_skpd']);
?>
<?php $this->load->view("_partial/header"); ?>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white pb-3 fw-bold">Laporan Realisasi Keuangan <?= $skpd['nama_skpd'] ?> periode 1 Januari 2021 s.d <?=$nama_periode?></h3>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="card full-height">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex align-items-left flex-column flex-sm-row">
                        <div class="ml-sm-auto py-md-0">
                            <a href="<?= base_url('pdf-preview-laporan-keuangan/'.$encrypt_id.'/'.$bulan) ?>" target="_blank" class="btn btn-success btn-round btn mr-2 mb-3">P R E V I E W</a>
                            <a href="<?= base_url('pdf-cetak-laporan-keuangan/'.$encrypt_id.'/'.$bulan) ?>" target="_blank" class="btn btn-warning btn-round btn mr-2 mb-3">C E T A K</a>
                        </div>
                    </div>
                    <h4><center>PEMERINTAH PROVINSI SUMATERA UTARA</center></h4>
                    <h3><center>LAPORAN REALISASI ANGGARAN PENDAPATAN DAN BELANJA DAERAH</center></h3>
                    <h4><center><?= $skpd['nama_skpd'] ?></center></h4>
                    <h4><center>periode 1 Januari 2021 s.d <?=$nama_periode?></center></h4>
                    <div class="preload1" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                        <h5>Sedang memuat data...</h5>
                    </div>
                    <div id="display-content1" style="display: none;">
                        <div class="table-responsive">
                            <table id="load-content1" class="table-default" style="width: 100%;">
                                <thead>
                                    <tr style="background-color: #1572EB; color: white;">
                                        <th rowspan="2" width="5px">No</th>
                                        <th rowspan="2"  class="text-center">Kode Rekening</th>
                                        <th rowspan="2"  class="text-center">Uraian</th>
                                        <th rowspan="2"  class="text-center">Anggaran</th>
                                        <th colspan="4" class="text-center">Realisasi</th>
                                    </tr>
                                    <tr style="background-color: #1572EB; color: white;">
                                        <th class="text-center">Bulan Lalu</th>
                                        <th class="text-center">Persen</th>
                                        <th class="text-center">Bulan Ini</th>
                                        <th class="text-center">Persen</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <br>       
                        <br>     
                        <div class="d-flex align-items-left flex-column flex-sm-row">
                            <div class="ml-sm-auto py-md-0">
                                Medan, <?=nama_bulan($tanggal_input)?>
                                <br>Kepala <?= $skpd['nama_skpd'] ?>
                                <br>       
                                <br>
                                <br>  
                                <br><?= $nama_kepala ?>  
                                <br><?= $nip_kepala ?> 
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('_partial/footer'); ?>
<script src="<?= base_url('assets/js/jquery.mask.min.js'); ?>"></script>
<?php $this->load->view('laporan/laporan_realisasi/js_detail2'); ?>
<?php $this->load->view('_partial/tag_close'); ?>