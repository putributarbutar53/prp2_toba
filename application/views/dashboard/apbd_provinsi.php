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
                    <?php $this->load->view('grafik/provinsi/v_struktur_anggaran_provinsi'); ?> 
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_alokasi_pendapatan_provinsi'); ?>
                    </div>          
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_alokasi_belanja_provinsi'); ?>   
                    </div>         
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_realisasi_apbd_provinsi'); ?>   
                    <center><a href="<?= site_url('dashboard-realisasi-apbd') ?>" class="btn btn-danger btn-round btn-lg"><i class="fa fa-search"></i> Detail Realisasi APBD Provinsi Sumatera Utara</a></center>        
                    </div> 
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <?php $this->load->view('grafik/provinsi/v_realisasi_pendapatan_provinsi'); ?>         
                    <center><a href="<?= site_url('dashboard-realisasi-pendapatan') ?>" class="btn btn-danger btn-round btn-lg"><i class="fa fa-search"></i> Detail Realisasi Pendapatan Pada APBD Provinsi</a></center>        
                    </div>         
                </div>
                <div class="col-lg-6 col-12">
                    <?php $this->load->view('grafik/provinsi/v_realisasi_belanja_provinsi'); ?>       
                    <center><a href="<?= site_url('dashboard-realisasi-belanja') ?>" class="btn btn-danger btn-round btn-lg"><i class="fa fa-search"></i> Detail Realisasi Belanja Pada APBD Provinsi</a></center>        
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('_partial/footer'); ?>
<?php $this->load->view('grafik/provinsi/js_struktur_anggaran_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_alokasi_pendapatan_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_alokasi_belanja_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_apbd_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_pendapatan_provinsi'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_belanja_provinsi'); ?>
<?php $this->load->view('_partial/tag_close'); ?>