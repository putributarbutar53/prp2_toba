<?php $this->load->view("_partial/header_frontend"); ?>
<script src="https://code.highcharts.com/6.0.0/highcharts.js"></script>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white fw-bold" style="margin-bottom: 0;">Progress Report Pengendalian Pembangunan <?=$result_kabupaten_nama?></h3>
            <div class="ml-sm-auto py-md-0">
                <a href="<?= base_url()?>" class="btn btn-danger btn-round btn-sm"><i class="fa fa-home"></i> Home</a> 
            </div>
        </div>
    </div>
</div>

<?php error_reporting(0); ?>
<div class="page-inner">
    <!-- <div class="card">
        <div class="card-body"> -->
    
    <div class="row">
        <div class="col-lg-12">
            <?php $this->load->view('grafik/kabupatendetail/v_realisasi_dana_desa'); ?>
        </div>
    </div>
    <!-- </div>
    </div> -->
</div>

<?php $this->load->view('_partial/footer'); ?>
<?php $this->load->view('grafik/kabupatendetail/js_realisasi_dana_desa'); ?>
<?php $this->load->view('grafik/kabupatendetail/js_realisasi_jumlah_desa'); ?>
<script>
		Circles.create({
			id:'circles-3',
			radius:125,
			value:<?=round($row_desa['persen'],1)?>,
			maxValue:100,
			width:33,
			text: <?=round($row_desa['persen'],1)?>,
			colors:['#f1f1f1', '#e60000'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
	</script>
<?php $this->load->view('_partial/tag_close'); ?>