<?php $this->load->view("_partial/header"); ?>
<script src="https://code.highcharts.com/6.0.0/highcharts.js"></script>
<!-- <script src="https://code.highcharts.com/6.0.0/modules/sunburst.js"></script> -->
<!-- <script src="<?= base_url('assets/highphp/js/highcharts-3d.js'); ?>"></script> -->

<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white fw-bold" style="margin-bottom: 0;">Progress Report Pengendalian Pembangunan Kabupaten/Kota Se Provinsi Sumatera Utara</h3>
        </div>
    </div>
</div>
<?php error_reporting(0); ?>
<div class="page-inner">
    <!-- <div class="card">
        <div class="card-body"> -->
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">Pilih Periode</legend>
                <div class="form-group">
                    <div class="row mb-2">
                        <div class="col-md-4" style="margin-bottom: 3px; margin-top: 3px;">
                            <select name="bulan" id="bulan" class="select2 form-control">
                                <?php foreach ($result_bulan as $b) : ?>
                                    <?php if ($b['id_bulan'] == $bulan) : ?>
                                        <option value="<?= $b['id_bulan']; ?>" selected><?= $b['nama_bulan']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $b['id_bulan']; ?>"><?= $b['nama_bulan']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-5" style="margin-bottom: 3px; margin-top: 3px;">
                            <select name="tahun" id="tahun" class="select2 form-control">
                                <?php
                                $tahun_sekarang = date('Y');
                                $result_tahun   = [];
                                for ($i = $tahun_sekarang; $i >= tahun_mulai(); $i--) {
                                    array_push($result_tahun, ['tahun' => $i]);
                                }
                                ?>
                                <?php foreach ($result_tahun as $r) : ?>
                                    <?php if ($r['tahun'] == $tahun) : ?>
                                        <option value="<?= $r['tahun']; ?>" selected><?= $r['tahun']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $r['tahun']; ?>"><?= $r['tahun']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3" style="margin-bottom: 3px; margin-top: 3px;">
                            <button type="button" id="btn-tampil" class="btn btn-success btn-block"> <i class="fa fa-search"></i> TAMPILKAN</button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="preload-anggaran-danadesa" style="padding: 10px;">
                <div style=" width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                    <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                    <h5>Sedang memuat data...</h5>
                </div>
            </div>
            <div id="load-anggaran-danadesa" style="display: none;">
                <div id="widget-anggaran-danadesa"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="preload-anggaran-jumlahdesa" style="padding: 10px;">
                <div style=" width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                    <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                    <h5>Sedang memuat data...</h5>
                </div>
            </div>
            <div id="load-anggaran-jumlahdesa" style="display: none;">
                <div id="widget-anggaran-jumlahdesa"></div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="preload-persen-realisasi-danadesa" style="padding: 10px;">
                <div style=" width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                    <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                    <h5>Sedang memuat data...</h5>
                </div>
            </div>
            <div id="load-persen-realisasi-danadesa" style="display: none;">
                <div id="widget-persen-realisasi-danadesa"></div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="preload-persen-desacair" style="padding: 10px;">
                <div style=" width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                    <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                    <h5>Sedang memuat data...</h5>
                </div>
            </div>
            <div id="load-persen-desacair" style="display: none;">
                <div id="widget-persen-desacair"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="preload-jumlah-anggaran-danadesa" style="padding: 10px;">
                <div style=" width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                    <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                    <h5>Sedang memuat data...</h5>
                </div>
            </div>
            <div id="load-jumlah-anggaran-danadesa" style="display: none;">
                <div id="widget-jumlah-anggaran-danadesa"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="preload-jumlah-realisasi-danadesa" style="padding: 10px;">
                <div style=" width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                    <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                    <h5>Sedang memuat data...</h5>
                </div>
            </div>
            <div id="load-jumlah-realisasi-danadesa" style="display: none;">
                <div id="widget-jumlah-realisasi-danadesa"></div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="preload-detail-realisasi-danadesa" style="padding: 10px;">
                <div style=" width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                    <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                    <h5>Sedang memuat data...</h5>
                </div>
            </div>
            <div id="load-detail-realisasi-danadesa" style="display: none;">
                <div id="widget-detail-realisasi-danadesa"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="preload-detail-realisasi-jumlahdesa" style="padding: 10px;">
                <div style=" width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                    <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                    <h5>Sedang memuat data...</h5>
                </div>
            </div>
            <div id="load-detail-realisasi-jumlahdesa" style="display: none;">
                <div id="widget-detail-realisasi-jumlahdesa"></div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="preload-tabel-realisasi-danadesa" style="padding: 10px;">
                <div style=" width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                    <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                    <h5>Sedang memuat data...</h5>
                </div>
            </div>
            <div id="load-tabel-realisasi-danadesa" style="display: none;">
                <div id="widget-tabel-realisasi-danadesa"></div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="preload-tabel-realisasi-jumlahdesa" style="padding: 10px;">
                <div style=" width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                    <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                    <h5>Sedang memuat data...</h5>
                </div>
            </div>
            <div id="load-tabel-realisasi-jumlahdesa" style="display: none;">
                <div id="widget-tabel-realisasi-jumlahdesa"></div>
            </div>
        </div>
    </div>
    <!-- </div>
    </div> -->
</div>

<?php $this->load->view('_partial/footer'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
        $.ajax({
            url: '<?= site_url('data-dana-desa/anggaran_danadesa'); ?>',
            type: "POST",
            data: {
                tahun: "<?= $tahun; ?>",
                bulan: "<?= $bulan; ?>",
                tipe: "tampil"
            },
            success: function(data) {
                $('#widget-anggaran-danadesa').html(data);
                $('#load-anggaran-danadesa').css('display', 'block');
                $('.preload-anggaran-danadesa').hide();
            }
        });

        $.ajax({
            url: '<?= site_url('data-dana-desa/anggaran_jumlahdesa'); ?>',
            type: "POST",
            data: {
                tahun: "<?= $tahun; ?>",
                bulan: "<?= $bulan; ?>",
                tipe: "tampil"
            },
            success: function(data) {
                $('#widget-anggaran-jumlahdesa').html(data);
                $('#load-anggaran-jumlahdesa').css('display', 'block');
                $('.preload-anggaran-jumlahdesa').hide();
            }
        });

        $.ajax({
            url: '<?= site_url('data-dana-desa/persen_realisasi_danadesa'); ?>',
            type: "POST",
            data: {
                tahun: "<?= $tahun; ?>",
                bulan: "<?= $bulan; ?>",
                tipe: "tampil"
            },
            success: function(data) {
                $('#widget-persen-realisasi-danadesa').html(data);
                $('#load-persen-realisasi-danadesa').css('display', 'block');
                $('.preload-persen-realisasi-danadesa').hide();
            }
        });

        $.ajax({
            url: '<?= site_url('data-dana-desa/persen_desa_cair'); ?>',
            type: "POST",
            data: {
                tahun: "<?= $tahun; ?>",
                bulan: "<?= $bulan; ?>",
                tipe: "tampil"
            },
            success: function(data) {
                $('#widget-persen-desacair').html(data);
                $('#load-persen-desacair').css('display', 'block');
                $('.preload-persen-desacair').hide();
            }
        });

        $.ajax({
            url: '<?= site_url('data-dana-desa/jumlah_anggaran_danadesa'); ?>',
            type: "POST",
            data: {
                tahun: "<?= $tahun; ?>",
                bulan: "<?= $bulan; ?>",
                tipe: "tampil"
            },
            success: function(data) {
                $('#widget-jumlah-anggaran-danadesa').html(data);
                $('#load-jumlah-anggaran-danadesa').css('display', 'block');
                $('.preload-jumlah-anggaran-danadesa').hide();
            }
        });

        $.ajax({
            url: '<?= site_url('data-dana-desa/jumlah_realisasi_danadesa'); ?>',
            type: "POST",
            data: {
                tahun: "<?= $tahun; ?>",
                bulan: "<?= $bulan; ?>",
                tipe: "tampil"
            },
            success: function(data) {
                $('#widget-jumlah-realisasi-danadesa').html(data);
                $('#load-jumlah-realisasi-danadesa').css('display', 'block');
                $('.preload-jumlah-realisasi-danadesa').hide();
            }
        });

        $.ajax({
            url: '<?= site_url('data-dana-desa/detail_realisasi_danadesa'); ?>',
            type: "POST",
            data: {
                tahun: "<?= $tahun; ?>",
                bulan: "<?= $bulan; ?>",
                tipe: "tampil"
            },
            success: function(data) {
                $('#widget-detail-realisasi-danadesa').html(data);
                $('#load-detail-realisasi-danadesa').css('display', 'block');
                $('.preload-detail-realisasi-danadesa').hide();
            }
        });

        $.ajax({
            url: '<?= site_url('data-dana-desa/detail_realisasi_jumlahdesa'); ?>',
            type: "POST",
            data: {
                tahun: "<?= $tahun; ?>",
                bulan: "<?= $bulan; ?>",
                tipe: "tampil"
            },
            success: function(data) {
                $('#widget-detail-realisasi-jumlahdesa').html(data);
                $('#load-detail-realisasi-jumlahdesa').css('display', 'block');
                $('.preload-detail-realisasi-jumlahdesa').hide();
            }
        });

        $.ajax({
            url: '<?= site_url('data-dana-desa/tabel_realisasi_danadesa'); ?>',
            type: "POST",
            data: {
                tahun: "<?= $tahun; ?>",
                bulan: "<?= $bulan; ?>",
                tipe: "tampil"
            },
            success: function(data) {
                $('#widget-tabel-realisasi-danadesa').html(data);
                $('#load-tabel-realisasi-danadesa').css('display', 'block');
                $('.preload-tabel-realisasi-danadesa').hide();
            }
        });

        $.ajax({
            url: '<?= site_url('data-dana-desa/tabel_realisasi_jumlahdesa'); ?>',
            type: "POST",
            data: {
                tahun: "<?= $tahun; ?>",
                bulan: "<?= $bulan; ?>",
                tipe: "tampil"
            },
            success: function(data) {
                $('#widget-tabel-realisasi-jumlahdesa').html(data);
                $('#load-tabel-realisasi-jumlahdesa').css('display', 'block');
                $('.preload-tabel-realisasi-jumlahdesa').hide();
            }
        });
    });

    $(document).on("click", "#btn-tampil", function(e) {
        e.preventDefault();
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
        var tahun = $('#tahun').val();
        var bulan = $('#bulan').val();
        window.location.href = "<?= site_url('data-dana-desa/'); ?>" + tahun + '/' + bulan;
    });
</script>
<?php $this->load->view('_partial/tag_close'); ?>