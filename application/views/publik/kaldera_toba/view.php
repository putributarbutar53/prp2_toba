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
            <h3 class="text-white pb-3 fw-bold">Progress Report Pengendalian Pembangunan Provinsi Sumatera Utara</h3>
            <div class="ml-sm-auto py-md-0">
                <a href="<?= base_url()?>" class="btn btn-danger btn-round btn-sm"><i class="fa fa-home"></i> Home</a> 
                <a href="<?= site_url('apbd-provinsi-2022') ?>" class="btn btn-danger btn-round btn-sm"></i> Provinsi</a>  
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="card full-height">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">

                    <div class="preload_rekap" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                        <h5>Sedang memuat data...</h5>
                    </div>
                    <div id="load-data-rekap" style="display: none;"></div>                        

                    <div class="preload" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                        <h5>Sedang memuat data...</h5>
                    </div>
                    <div id="display-content" style="display: none;">
                        <h2>Data Kegiatan Pengembangan Geopark Kaldera Toba</h2>
                        <div class="table-responsive">
                            <table id="load-content" class="table-default" style="width: 100%;">
                                <thead>
                                    <tr style="background-color: #1572EB; color: white;">
                                        <th width="5px">NO</th>
                                        <th>NAMA SKPD</th>
                                        <th>NAMA KEGIATAN</th>
                                        <th class="text-center">WAKTU</th>
                                        <th class="text-center">PAGU / NILAI KONTRAK</th>
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
<script>
     $(document).ready(function() {
        $('.select2').select2();
        load_data();
        load_data_rekap();
    });

    function load_data_rekap() {
            $('#load-data-rekap').css('display', 'none');
            $('.preload_rekap').show();
            $.ajax({
                url: '<?= site_url('publik/kaldera_toba/load_rekap'); ?>',
                type: "POST",
                dataType: "html",
                success: function(data) {
                    $('#load-data-rekap').css('display', 'block');
                    $('.preload_rekap').hide();
                    $('#load-data-rekap').html(data);
                }
            });
        }

    function load_data() {
        $('#display-content').css('display', 'none');
        $('.preload').show();
        table = $('#load-content').DataTable({
            destroy: true,
            ordering: false,
            bAutoWidth: false,
            initComplete: function() {
                $('#display-content').css('display', 'block');
                $('.preload').hide();
            },
            ajax: {
                url: "<?= site_url('publik/kaldera_toba/load_kegiatan'); ?>",
                type: 'POST'
            },
            columnDefs: [{
                className: 'text-right',
                targets: [4, 5]
            }, {
                className: 'text-center',
                targets: [0, 3, 6]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'skpd'
            }, {
                data: 'keperluan'
            }, {
                data: 'waktu'
            }, {
                data: 'nilai'
            }, {
                data: 'realisasi'
            }, {
                data: 'persen'
            }]
        });
    }

    function reload_ajax() {
        table.ajax.reload(null, false);
    }
</script>
<?php $this->load->view('_partial/tag_close'); ?>