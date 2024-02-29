<?php $this->load->view("_partial/header_frontend"); ?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/sunburst.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/sankey.js"></script>
<script src="https://code.highcharts.com/modules/organization.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white pb-3 fw-bold">Progress Report Pengendalian Pembangunan Provinsi Sumatera Utara</h3>
			<div class="ml-sm-auto py-md-0">
                <a href="<?= base_url()?>" class="btn btn-danger btn-round btn-sm"><i class="fa fa-home"></i> Home</a> 
            </div>
		</div>
    </div>
</div>


<div class="page-inner mt--5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card-body bg-primary-gradient">
                        <div class="inner">
                            <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Mandatory Spending APBD Provinsi dan Kabupaten/Kota</h2>
                            <div id="rating-mandatory" style="width:100%; height: 500px;"></div>
                        </div>
                        <br>
                            <div class="table-responsive">
                                <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
                                    <tr>
                                    <th style="text-align: left; color:white; background-color:#ff8b00"><?=$row_mandatory['persen1_pendidikan']?> KABUPATEN/KOTA (<?=$row_mandatory['persen3_pendidikan']?> %) TIDAK MEMENUHI STANDAR MANDATORY PENDIDIKAN, YAITU : <?=$row_mandatory['nama_pendidikan']?></th>
                                    </tr>
                                    <tr>
                                    <th style="text-align: left; color:white; background-color:#00b3b3"><?=$row_mandatory['persen1_kesehatan']?> KABUPATEN/KOTA (<?=$row_mandatory['persen3_kesehatan']?> %) TIDAK MEMENUHI STANDAR MANDATORY KESEHATAN, YAITU : <?=$row_mandatory['nama_kesehatan']?></th>
                                    </tr>
                                    <tr>
                                    <th style="text-align: left; color:white; background-color:#b37700"><?=$row_mandatory['persen1_infrastruktur']?> KABUPATEN/KOTA (<?=$row_mandatory['persen3_infrastruktur']?> %) TIDAK MEMENUHI STANDAR MANDATORY INFRASTRUKTUR, YAITU : <?=$row_mandatory['nama_infrastruktur']?></th>
                                    </tr>
                                    <tr>
                                    <th style="text-align: left; color:white; background-color:#605ca8"><?=$row_mandatory['persen1_desa']?> KABUPATEN/KOTA (<?=$row_mandatory['persen3_desa']?> %) TIDAK MEMENUHI STANDAR MANDATORY DESA, YAITU : <?=$row_mandatory['nama_desa']?></th>
                                    </tr>
                                </table>
                                
                            </div>
                        <br>
                    </div>  
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card-body bg-primary-gradient">
                        <div class="inner">
                            <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Mandatory Spending P APBD Provinsi dan Kabupaten/Kota</h2>
                            <div id="rating-mandatory-papbd" style="width:100%; height: 500px;"></div>
                        </div>
                        <br>
                            <div class="table-responsive">
                                <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
                                    <tr>
                                    <th style="text-align: left; color:white; background-color:#ff8b00"><?=$row_mandatory['persen1_pendidikan_p']?> KABUPATEN/KOTA (<?=$row_mandatory['persen3_pendidikan_p']?> %) TIDAK MEMENUHI STANDAR MANDATORY PENDIDIKAN, YAITU : <?=$row_mandatory['nama_pendidikan_p']?></th>
                                    </tr>
                                    <tr>
                                    <th style="text-align: left; color:white; background-color:#00b3b3">SELURUH KABUPATEN/KOTA TELAH MEMENUHI STANDAR MANDATORY KESEHATAN</th>
                                    </tr>

                                    <tr>
                                    <th style="text-align: left; color:white; background-color:#b37700"><?=$row_mandatory['persen1_infrastruktur_p']?> KABUPATEN/KOTA (<?=$row_mandatory['persen3_infrastruktur_p']?> %) TIDAK MEMENUHI STANDAR MANDATORY INFRASTRUKTUR, YAITU : <?=$row_mandatory['nama_infrastruktur_p']?></th>
                                    </tr>
                                    <tr>
                                    <th style="text-align: left; color:white; background-color:#605ca8"><?=$row_mandatory['persen1_desa']?> KABUPATEN/KOTA (<?=$row_mandatory['persen3_desa_p']?> %) TIDAK MEMENUHI STANDAR MANDATORY DESA, YAITU : <?=$row_mandatory['nama_desa_p']?></th>
                                    </tr>
                                </table>
                            </div>
                        <br>
                    </div>  
                </div>
            </div>
            <br>

            <!-- <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card-body bg-primary-gradient">
                        <div class="inner">
                            <h2 style="color: white; font-weight: bold;"><i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i>Anggaran Pendapatan Pada APBD Kabupaten/Kota : <?= "Rp " . format_angka($totalpendapatan); ?></h2>
                            <div id="rating-realisasi-pendapatan" style="width:100%; height: 500px;"></div>
                            <h3 style="color: white; font-weight: bold;">Realisasi Pendapatan Pada APBD Kabupaten/Kota : <?= "Rp " . format_angka($totalpendapatan_realisasi); ?>
                                <br>Persen : <?= hitung_persen($totalpendapatan_realisasi,$totalpendapatan,2); ?> %
                            </h3>
                        </div>
                    </div>  
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card-body bg-primary-gradient">
                        <div class="inner">
                            <h2 style="color: white; font-weight: bold;"><i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Anggaran Belanja Pada APBD Kabupaten/Kota : <?= "Rp " . format_angka($totalbelanja); ?></h2>
                            <div id="rating-realisasi-belanja" style="width:100%; height: 400px;"></div>
                            <h3 style="color: white; font-weight: bold;">Realisasi Pendapatan Pada APBD Kabupaten/Kota : <?= "Rp " . format_angka($totalbelanja_realisasi); ?>
                                <br>Persen : <?= hitung_persen($totalbelanja_realisasi,$totalbelanja,2); ?> %
                            </h3>
                        </div>
                    </div>  
                </div>
            </div>
             -->
        </div>
    </div>
</div>

<?php $this->load->view('_partial/footer'); ?>
<?php $this->load->view('grafik/kabupaten/js_rating_mandatory'); ?>
<?php $this->load->view('grafik/kabupaten/js_rating_mandatory_papbd'); ?>
<?php $this->load->view('grafik/kabupaten/js_rating_realisasi_pendapatan'); ?>
<?php $this->load->view('grafik/kabupaten/js_rating_realisasi_belanja'); ?>

<?php $this->load->view('_partial/tag_close'); ?>