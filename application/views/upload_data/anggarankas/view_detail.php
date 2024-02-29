<?php $this->load->view("_partial/header"); ?>
<?php
    $tahun_now=date('Y');
?>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white pb-3 fw-bold">Data Anggaran Kas Pada APBD <?= $skpd['nama_skpd'] ?> tahun <?=$tahun?></h3>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="card full-height">
        <div class="card-body">
            <div class="row">

                <div class="col-sm-12">
                    <div class="d-flex align-items-left flex-column flex-sm-row">
                    <h3 class="pb-3 fw-bold"><?= $skpd['nama_skpd'] ?></h3>
                        <div class="ml-sm-auto py-md-0">
                            <a href="<?= base_url('uploads/format/Format_Anggaran_Kas.xlsx') ?>" target="_blank" class="btn btn-success btn-round btn-sm mr-2 mb-3"><i class="fa fa-download"></i> Format Excel</a>
                            <?php if($tahun_now==$tahun){ ?>
                                <button id="tombol-upload" class="btn btn-warning btn-round btn-sm mr-2 mb-3" data-toggle="modal" data-target="#modal-form-action">Upload Excel</button>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="preload" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                        <h5>Sedang memuat data...</h5>
                    </div>
                    <div id="display-content" style="display: none;">
                        <div class="table-responsive">
                            <table id="load-content" class="table-default" style="width: 100%;">
                                <thead>
                                    <tr style="background-color: #1572EB; color: white;">
                                        <th width="5px">No</th>
                                        <th>Tahun</th>
                                        <th>Bulan</th>
                                        <th class="text-center">Anggaran</th>
                                        <th class="text-center">Total</th>
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

<div class="modal fade" id="modal-form-action" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div id="load-form-action"></div>
    </div>
</div>

<?php $this->load->view('_partial/footer'); ?>
<script src="<?= base_url('assets/js/jquery.mask.min.js'); ?>"></script>
<?php $this->load->view('upload_data/anggarankas/js_detail'); ?>
<?php $this->load->view('_partial/tag_close'); ?>