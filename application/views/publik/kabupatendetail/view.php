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
                <a href="<?= site_url('kabupaten-kota-2022') ?>" class="btn btn-danger btn-round btn-sm"></i> Kabupaten/Kota</a> 
            </div>
		</div>
    </div>
</div>


<div class="page-inner mt--5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/kabupatendetail/v_anggaran_pendapatan'); ?>  
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/kabupatendetail/v_anggaran_belanja'); ?>  
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <?php $this->load->view('grafik/kabupatendetail/v_mandatory'); ?>  
                </div>
                <div class="col-lg-6 col-12">
                    <?php $this->load->view('grafik/kabupatendetail/v_mandatory_papbd'); ?>  
                </div>
            </div>
            <?php if($cek_st_desa>1){ ?>
                <br>
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <?php $this->load->view('grafik/kabupatendetail/v_realisasi_dana_desa'); ?>  
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php $this->load->view('_partial/footer'); ?>
<?php $this->load->view('grafik/kabupatendetail/js_struktur_anggaran'); ?>
<?php $this->load->view('grafik/kabupatendetail/js_alokasi_pendapatan'); ?>
<?php $this->load->view('grafik/kabupatendetail/js_realisasi_pendapatan'); ?>
<?php $this->load->view('grafik/kabupatendetail/js_alokasi_belanja'); ?>
<?php $this->load->view('grafik/kabupatendetail/js_realisasi_belanja'); ?>
<?php $this->load->view('grafik/kabupatendetail/js_mandatory'); ?>
<?php $this->load->view('grafik/kabupatendetail/js_mandatory_papbd'); ?>
<?php $this->load->view('grafik/kabupatendetail/js_realisasi_belanja_triwulan'); ?>
<?php $this->load->view('grafik/kabupatendetail/js_realisasi_dana_desa'); ?>
<?php $this->load->view('grafik/kabupatendetail/js_realisasi_jumlah_desa'); ?>

<script>
		Circles.create({
			id:'circles-1',
			radius:80,
			value:<?= hitung_persen($pendapatan_terakhir,$row_pendapatan['pendapatan'],1); ?>,
			maxValue:100,
			width:20,
			text: <?= hitung_persen($pendapatan_terakhir,$row_pendapatan['pendapatan'],1); ?>,
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
			value:<?= hitung_persen($belanja_terakhir,$row_belanja['belanja'],1); ?>,
			maxValue:100,
			width:20,
			text: <?= hitung_persen($belanja_terakhir,$row_belanja['belanja'],1); ?>,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
        

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