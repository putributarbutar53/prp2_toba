<?php $this->load->view("_partial/header"); ?>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white pb-3 fw-bold">Data Realisasi Keuangan <?= $skpd['nama_skpd'] ?></h3>
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
                    <div class="d-flex align-items-left flex-column flex-sm-row">
                    <h3 class="pb-3 fw-bold"><?= $skpd['nama_skpd'] ?></h3>
                        <div class="ml-sm-auto py-md-0">
                            
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
                                        <th class="text-center">Pendapatan</th>
                                        <th class="text-center">Belanja</th>
                                        <th class="text-center">Tanggal Data</th>
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
<?php $this->load->view('laporan/realisasi_keuangan/js_detail'); ?>
<?php $this->load->view('_partial/tag_close'); ?>