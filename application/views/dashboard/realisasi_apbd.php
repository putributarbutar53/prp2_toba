<?php $this->load->view("_partial/header"); ?>

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
            <h3 class="text-white pb-3 fw-bold">Selamat Datang <?= $users['username']; ?></h3>
        </div>
    </div>
</div>


<div class="page-inner mt--5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_realisasi_apbd_provinsi'); ?>   
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_realisasi_pendapatan_apbd_provinsi'); ?>  
                    </div>         
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_realisasi_belanja_apbd_provinsi'); ?>  
                    </div>         
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('_partial/footer'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_apbd_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_pendapatan_apbd_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_belanja_apbd_provinsi'); ?>
<?php $this->load->view('_partial/tag_close'); ?>