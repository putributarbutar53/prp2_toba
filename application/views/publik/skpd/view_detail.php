<?php $this->load->view("_partial/header_frontend"); ?>

<script src="<?= base_url('assets/highphp/js/jquery.min.js'); ?>" type="text/javascript"></script>
<script src="https://code.highcharts.com/6.0.0/highcharts.js"></script>
<script src="https://code.highcharts.com/6.0.0/modules/sunburst.js"></script>
<script src="<?= base_url('assets/highphp/js/highcharts-3d.js'); ?>"></script>
<script src="<?= base_url('assets/highphp/js/exporting.js'); ?>"></script>
<!-- <script src="<?= base_url('assets/highphp/js/export-data.js'); ?>"></script>
<script src="<?= base_url('assets/highphp/js/accessibility.js'); ?>"></script> -->

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white pb-3 fw-bold">Sistem Informasi Monitoring Evaluasi Pelaporan Online</h3>
            <div class="ml-sm-auto py-md-0">
                <a href="<?= base_url()?>" class="btn btn-danger btn-round btn-sm"><i class="fa fa-home"></i> Home</a>  
            </div>
        </div>
    </div>
</div>


<div class="page-inner mt--5">
    <div class="card">
        <div class="card-body">
            <?php if($anggaran_pendapatan!=0){ ?>
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <?php $this->load->view('grafik/opdprovinsi/v_realisasi_pendapatan'); ?>  
                    </div>
                </div>
                <br>
            <?php } ?>
                
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/opdprovinsi/v_realisasi_belanja'); ?> 
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/opdprovinsi/v_arus_kas'); ?> 
                </div>
            </div>
        </div>
    </div>
</div>



<div class="page-inner mt--5">
    <div class="card full-height">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="preload" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                        <h5>Sedang memuat data...</h5>
                    </div>
                    <div id="display-content" style="display: none;">
                        <h2>Daftar Kegiatan Pada <?=$nama_skpd_tampil?> Tahun <?=$tahun_data?></h2>
                        <div class="table-responsive">
                            <table id="load-content" class="table-default" style="width: 100%;">
                                <thead>
                                    <tr style="background-color: #1572EB; color: white;">
                                        <th width="5px">NO</th>
                                        <th>NAMA KEGIATAN</th>
                                        <th class="text-center">WAKTU</th>
                                        <th class="text-center">NILAI KONTRAK</th>
                                        <th class="text-center">REALISASI KEUANGAN</th>
                                        <th class="text-center">REALISASI FISIK</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('_partial/footer'); ?>
<?php $this->load->view('grafik/opdprovinsi/js_realisasi_pendapatan'); ?>
<?php $this->load->view('grafik/opdprovinsi/js_realisasi_belanja'); ?>
<?php $this->load->view('grafik/opdprovinsi/js_alokasi_belanja'); ?>
<?php $this->load->view('grafik/opdprovinsi/js_arus_kas'); ?>
<?php $this->load->view('grafik/opdprovinsi/js_arus_kas_triwulan'); ?>
<?php $this->load->view('publik/skpd/js_detail_kegiatan'); ?>
<script>
		Circles.create({
			id:'circles-1',
			radius:140,
			value:<?=round($persen_pendapatan_pad_terakhir,1)?>,
			maxValue:100,
			width:30,
			text: <?=round($persen_pendapatan_pad_terakhir,1)?>,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:80,
			value:<?=round($persen_belanja_terakhir,1)?>,
			maxValue:100,
			width:20,
			text: <?=round($persen_belanja_terakhir,1)?>,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
	</script>
<?php $this->load->view('_partial/tag_close'); ?>