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
                    <?php $this->load->view('grafik/provinsi/v_anggaran_pendapatan_provinsi'); ?>  
                </div>
            </div>
            <br>
            
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_anggaran_belanja_provinsi'); ?>  
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_arus_kas'); ?>  
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_mandatory'); ?>  
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_realisasi_pendapatan_belanja_provinsi'); ?>  
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_realisasi_belanja_sekretariat'); ?>
                </div>
            </div>
            <br>
            <?php if($tahun_data==2021){ ?>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_anggaran_covid'); ?>  
                </div>
            </div>
            <br>
            <?php  } ?>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_dana_dak'); ?>  
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_dana_dk'); ?>  
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_dana_tp'); ?>  
                </div>
            </div>
        </div>
    </div>
</div>


<div class="page-inner mt--5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h3 style="font-weight: bold;">Rating Persentase Realisasi Belanja oleh OPD Provinsi Sumatera Utara periode 1 Januari s.d <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?></h3>
                    <div class="preload" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                        <h5>Sedang memuat data...</h5>
                    </div>
                    <div id="display-content" style="display: none;">
                        <div class="table-responsive">
                            <table id="load-content" class="table-default" style="width: 100%;">
                                <thead>
                                    <tr style="background-color: #1572EB; color: white;">
                                        <th width="5px">NO</th>
                                        <th>NAMA OPD</th>
                                        <th class="text-center">Bulan</th>
                                        <th class="text-center">Pendapatan</th>
                                        <th class="text-center">Anggaran Belanja</th>
                                        <th class="text-center">Realisasi Belanja</th>
                                        <th class="text-center">Persen</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <hr style="border-bottom: 3px solid #eee;">
                </div>
                <?= $realisasi_pb_provinsi['real_skpd_dak'] ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('_partial/footer'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_pendapatan'); ?>
<?php $this->load->view('grafik/provinsi/js_struktur_anggaran_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_alokasi_pendapatan_provinsi'); ?>

<?php $this->load->view('grafik/provinsi/js_alokasi_belanja_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_belanja'); ?>

<?php $this->load->view('grafik/provinsi/js_target_pad_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_target_realisasi_pad_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_pad_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_pendapatan_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_belanja_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_serapan_belanja_provinsi'); ?>

<?php $this->load->view('grafik/provinsi/js_arus_kas_bulanan'); ?>
<?php $this->load->view('grafik/provinsi/js_arus_kas_triwulan'); ?>

<?php $this->load->view('grafik/provinsi/js_mandatory'); ?>
<?php $this->load->view('grafik/provinsi/js_mandatory_papbd'); ?>

<?php $this->load->view('grafik/provinsi/js_alokasi_covid'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_covid'); ?>

<?php $this->load->view('grafik/provinsi/js_realisasi_dak'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_dak_persen'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_dak1'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_dak1_persen'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_dekon'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_dekon_persen'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_tp'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_tp_persen'); ?>

<?php $this->load->view('grafik/provinsi/js_realisasi_belanja_sekretariat'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_sekre'); ?>

<?php $this->load->view('publik/js_realisasi_belanja'); ?>


<script>
		Circles.create({
			id:'circles-1',
			radius:80,
			value:<?= hitung_persen($realisasi_apbd_provinsi['real_pendapatan_terakhir'],$struktur_anggaran_provinsi['pendapatan_setting'],1); ?>,
			maxValue:100,
			width:20,
			text: <?= hitung_persen($realisasi_apbd_provinsi['real_pendapatan_terakhir'],$struktur_anggaran_provinsi['pendapatan_setting'],1); ?>,
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
			value:<?= hitung_persen($realisasi_apbd_provinsi['real_belanja_terakhir'],$struktur_anggaran_provinsi['belanja_setting'],1); ?>,
			maxValue:100,
			width:20,
			text: <?= hitung_persen($realisasi_apbd_provinsi['real_belanja_terakhir'],$struktur_anggaran_provinsi['belanja_setting'],1); ?>,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

        Circles.create({
            id:'circles-3',
            radius:100,
            value:<?= hitung_persen(324680879612,363999195257,1); ?>,
            maxValue:100,
            width:20,
            text: <?= hitung_persen(324680879612,363999195257,1); ?>,
            colors:['#f1f1f1', '#2BB930'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })

        Circles.create({
            id:'circles-4',
            radius:120,
            value:<?= hitung_persen($realisasi_pb_provinsi['dk_real_total'],$realisasi_pb_provinsi['dk_pagu_total'],1); ?>,
            maxValue:100,
            width:30,
            text: <?= hitung_persen($realisasi_pb_provinsi['dk_real_total'],$realisasi_pb_provinsi['dk_pagu_total'],1); ?>,
            colors:['#f1f1f1', '#FF9E27'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })

        Circles.create({
            id:'circles-5',
            radius:120,
            value:<?= hitung_persen($realisasi_pb_provinsi['tp_real_total'],$realisasi_pb_provinsi['tp_pagu_total'],1); ?>,
            maxValue:100,
            width:30,
            text: <?= hitung_persen($realisasi_pb_provinsi['tp_real_total'],$realisasi_pb_provinsi['tp_pagu_total'],1); ?>,
            colors:['#f1f1f1', '#2BB930'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })

        Circles.create({
            id:'circles-6',
            radius:120,
            value:<?= hitung_persen($realisasi_pb_provinsi['dak_real_total'],$realisasi_pb_provinsi['dak_pagu_total'],1); ?>,
            maxValue:100,
            width:30,
            text: <?= hitung_persen($realisasi_pb_provinsi['dak_real_total'],$realisasi_pb_provinsi['dak_pagu_total'],1); ?>,
            colors:['#f1f1f1', '#FF9E27'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })

        Circles.create({
            id:'circles-7',
            radius:120,
            value:<?= hitung_persen($realisasi_pb_provinsi['dak_real_total'],$realisasi_pb_provinsi['dak_pagu_total'],1); ?>,
            maxValue:100,
            width:30,
            text: <?= hitung_persen($realisasi_pb_provinsi['dak_real_total'],$realisasi_pb_provinsi['dak_pagu_total'],1); ?>,
            colors:['#f1f1f1', '#2BB930'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })

        Circles.create({
            id:'circles-11',
            radius:120,
            value:<?= hitung_persen($realisasi_pb_provinsi['realisasi_belanja_asekre'],$realisasi_pb_provinsi['pagu_belanja_asekre'],1); ?>,
            maxValue:100,
            width:30,
            text: <?= hitung_persen($realisasi_pb_provinsi['realisasi_belanja_asekre'],$realisasi_pb_provinsi['pagu_belanja_asekre'],1); ?>,
            colors:['#f1f1f1', '#2BB930'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })
	</script>

<?php $this->load->view('_partial/tag_close'); ?>