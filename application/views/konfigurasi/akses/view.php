<?php $this->load->view("_partial/header"); ?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white pb-3 fw-bold">AKSES MENU</h3>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="card full-height">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="load-content" class="table-default" style="width: 100%;">
                            <thead>
                                <tr style="background-color: #1572EB; color: white;">
                                    <th width="5px">NO</th>
                                    <th class="text-left">LEVEL</th>
                                    <th class="text-center" style="width:75px;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($result_role as $r) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $r['role_name']; ?></td>
                                        <td><button type="button" id="tombol-ubah" data-id="<?= encrypt_url($r['role_id']); ?>" data-toggle="modal" data-target="#modal-form-action" class="btn btn-success btn-sm"><i class="fa fa-user-lock"></i> AKSES MENU</button></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-form-action" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div id="load-form-modal"></div>
    </div>
</div>

<?php $this->load->view('_partial/footer'); ?>
<?php $this->load->view('konfigurasi/akses/js'); ?>
<?php $this->load->view('_partial/tag_close'); ?>