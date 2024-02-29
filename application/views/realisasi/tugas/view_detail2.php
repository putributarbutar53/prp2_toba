<?php $this->load->view("_partial/header"); ?>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white pb-3 fw-bold">Realisasi Dana Tugas Pembantuan <?= $skpd['nama_skpd'] ?>  Priode <?=bulan($bulan)?> <?=$tahun?></h3>
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
                                        <th class="text-center">Sub Bidang</th>
                                        <th class="text-center">Pagu/Dipa</th>
                                        <th class="text-center">Realisasi</th>
                                        <th class="text-center">Persen</th>
                                        <th class="text-center">Opsi</th>
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
<?php $this->load->view('realisasi/tugas/js_detail2'); ?>
<?php $this->load->view('_partial/tag_close'); ?>