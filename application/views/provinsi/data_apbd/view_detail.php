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
            <h3 class="text-white pb-3 fw-bold">Data APBD Pada <?=$skpd['nama_skpd']?></h3>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="card full-height">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Pilih Tahun</legend>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-md-8 col-sm-6" style="margin-bottom: 3px; margin-top: 3px;">
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
                                                <option value="<?= $r['tahun']; ?>" <?= "selected"; ?>><?= $r['tahun']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $r['tahun']; ?>"><?= $r['tahun']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-6" style="margin-bottom: 3px; margin-top: 3px;">
                                    <button type="button" id="btn-tampil" class="btn btn-success btn-block"> <i class="fa fa-search"></i> TAMPILKAN</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="preload_realisasi_pad" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                                <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                                <h5>Sedang memuat data...</h5>
                            </div>
                            <div id="load-data-realisasi-pad" style="display: none;"></div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="preload_realisasi_belanja" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                                <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                                <h5>Sedang memuat data...</h5>
                            </div>
                            <div id="load-data-realisasi-belanja" style="display: none;"></div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="preload_arus_kas" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                                <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                                <h5>Sedang memuat data...</h5>
                            </div>
                            <div id="load-data-arus-kas" style="display: none;"></div>
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
        var tahun = $('#tahun').val();
        load_data_realisasi_pad(tahun);
        load_data_realisasi_belanja(tahun);
        load_data_arus_kas(tahun);
    });

        function load_data_realisasi_pad(tahun) {
            $('#load-data-realisasi-pad').css('display', 'none');
            $('.preload_realisasi_pad').show();
            $.ajax({
                url: '<?= site_url('data-apbd/realisasi_pad_opd'); ?>',
                type: "POST",
                data: {
                    tahun : tahun,
                    id_skpd : <?=$skpd['id_skpd']?>
                },
                dataType: "html",
                success: function(data) {
                    $('#load-data-realisasi-pad').css('display', 'block');
                    $('.preload_realisasi_pad').hide();
                    $('#btn-tampil').html("<i class='fa fa-search'></i> TAMPILKAN");
                    $('#btn-tampil').attr('disabled', false);
                    $('#load-data-realisasi-pad').html(data);
                }
            });
        }

        function load_data_realisasi_belanja(tahun) {
            $('#load-data-realisasi-belanja').css('display', 'none');
            $('.preload_realisasi_belanja').show();
            $.ajax({
                url: '<?= site_url('data-apbd/realisasi_belanja_opd'); ?>',
                type: "POST",
                data: {
                    tahun : tahun,
                    id_skpd : <?=$skpd['id_skpd']?>
                },
                dataType: "html",
                success: function(data) {
                    $('#load-data-realisasi-belanja').css('display', 'block');
                    $('.preload_realisasi_belanja').hide();
                    $('#load-data-realisasi-belanja').html(data);
                }
            });
        }

        function load_data_arus_kas(tahun) {
            $('#load-data-arus-kas').css('display', 'none');
            $('.preload_arus_kas').show();
            $.ajax({
                url: '<?= site_url('data-apbd/arus_kas_opd'); ?>',
                type: "POST",
                data: {
                    tahun : tahun,
                    id_skpd : <?=$skpd['id_skpd']?>
                },
                dataType: "html",
                success: function(data) {
                    $('#load-data-arus-kas').css('display', 'block');
                    $('.preload_arus_kas').hide();
                    $('#load-data-arus-kas').html(data);
                }
            });
        }

    $(document).on("click", "#btn-tampil", function(e) {
    e.preventDefault();
    var self = this;
    $(self).attr('disabled', true);
    $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
    var tahun = $('#tahun').val();
    load_data_realisasi_pad(tahun);
    load_data_realisasi_belanja(tahun);
    load_data_arus_kas(tahun);
});
</script>
<?php $this->load->view('_partial/tag_close'); ?>