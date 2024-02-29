<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/sunburst.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/sankey.js"></script>
<script src="https://code.highcharts.com/modules/organization.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<a href="<?= site_url('apbd-provinsi') ?>">
    <h4 class="mb-1 fw-bold">
        Belanja : <?= "Rp " . format_angka($struktur_anggaran_provinsi['belanja']); ?>   
        <br>Realisasi : <?= "Rp " . format_angka($realisasi_apbd_provinsi['real_belanja_terakhir']); ?>
        <br>Persen : <?= hitung_persen($realisasi_apbd_provinsi['real_belanja_terakhir'],$struktur_anggaran_provinsi['belanja_setting'],1); ?> %
    </h4>
    <div class="px-2 pb-2 pb-md-0 text-center">
        <div id="circles-2"></div>
    </div>
</a>

<?php $this->load->view('_partial/footer_kosong'); ?>
<script>
		Circles.create({
			id:'circles-2',
			radius:90,
			value:<?= hitung_persen($realisasi_apbd_provinsi['real_belanja_terakhir'],$struktur_anggaran_provinsi['belanja_setting'],1); ?>,
			maxValue:100,
			width:15,
			text: <?= hitung_persen($realisasi_apbd_provinsi['real_belanja_terakhir'],$struktur_anggaran_provinsi['belanja_setting'],1); ?>,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
	</script>