<?php $this->load->view("_partial/header"); ?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white pb-3 fw-bold">LIST MENU</h3>
            <div class="ml-sm-auto py-md-0">
                <button id="tombol-tambah" class="btn btn-secondary btn-round btn-sm mr-2 mb-3" data-toggle="modal" data-target="#modal-form-action">TAMBAH DATA</button>
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="card full-height">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="preload" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                        <h5>Sedang memuat data...</h5>
                    </div>
                    <div id="display-content" style="display: none;">
                        <div class="table-responsive">
                            <table id="load-content" class="table-default" style="width: 100%;">
                                <thead>
                                    <tr style="background-color: #1572EB; color: white;">
                                        <th class="text-left" rowspan="2">NAMA MENU</th>
                                        <th class="text-center" rowspan="2">URL</th>
                                        <th class="text-center" rowspan="2">ICON</th>
                                        <th class="text-center" colspan="5">FITUR</th>
                                        <th class="text-center" rowspan="2">URUTAN</th>
                                        <th class="text-center" rowspan="2" style="width:75px;">AKSI</th>
                                    </tr>
                                    <tr style="background-color: #1572EB; color: white;">
                                        <th class="text-center">ADD</th>
                                        <th class="text-center">UPDATE</th>
                                        <th class="text-center">DELETE</th>
                                        <th class="text-center">UPDATE-1</th>
                                        <th class="text-center">DELETE-1</th>
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

<div class="modal modal-blur fade" id="modal-form-action" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div id="load-form-modal"></div>
    </div>
</div>

<?php $this->load->view('_partial/footer'); ?>
<?php $this->load->view('konfigurasi/menu/js'); ?>
<?php $this->load->view('_partial/tag_close'); ?>