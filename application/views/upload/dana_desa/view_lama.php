<?php $this->load->view("_partial/header"); ?>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white pb-3 fw-bold">Dana Desa Pada APBD Provinsi Sumatera Utara Periode <?= tanggal_indo($periode['periode']); ?></h3>
            <div class="ml-sm-auto py-md-0">
            <a href="<?= base_url('uploads/format/Format_Dana_Desa.xls') ?>" target="_blank" class="btn btn-success btn-round btn-sm mr-2 mb-3"><i class="fa fa-download"></i> Format Excel</a>
                <button id="tombol-upload" class="btn btn-warning btn-round btn-sm mr-2 mb-3" data-toggle="modal" data-target="#modal-form-action">Upload Excel</button>
            </div>
            
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="card full-height">
        <div class="card-body">
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
                <div class="col-sm-12">
                    <div class="preload-danadesa" style="padding: 10px;">
                        <div style=" width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                            <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                            <h5>Sedang memuat data...</h5>
                        </div>
                    </div>
                    <div id="load-danadesa" style="display: none;">
                        <div id="widget-danadesa"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-form-action" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div id="load-form-action"></div>
    </div>
</div>

<?php $this->load->view('_partial/footer'); ?>
<?php $this->load->view('upload/dana_desa/js'); ?>
<?php $this->load->view('_partial/tag_close'); ?>