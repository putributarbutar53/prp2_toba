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
                <a href="<?= site_url('apbd-provinsi') ?>" class="btn btn-danger btn-round btn-sm"></i> Provinsi</a> 
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_realisasi_belanja_provinsi'); ?>         
                    </div>   
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <?php $this->load->view('grafik/provinsi/v_realisasi_belanja_warning_provinsi'); ?>         
                    </div>   
                </div>
                <div class="col-lg-6 col-12">
                    <?php $this->load->view('grafik/provinsi/v_realisasi_belanja_danger_provinsi'); ?>         
                    </div>   
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
                    <h3 style="font-weight: bold;">Rating Realisasi Belanja SKPD periode 1 Januari s.d <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?></h3>
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
                                        <th>NAMA SKPD</th>
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

            </div>
        </div>
    </div>
</div>


<div class="page-inner mt--5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_realisasi_belanja_sekretariat'); ?>         
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('_partial/footer'); ?>
<?php $this->load->view('publik/js_realisasi_belanja'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_belanja_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_belanja_sekretariat'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_sekre'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_belanja_warning_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_belanja_danger_provinsi'); ?>
<script>
        Circles.create({
            id:'circles-1',
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