<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM TAMBAH
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form-tambah">
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="nama_skpd">Nama SKPD</label>
                        <input type="text" name="nama_skpd" id="nama_skpd" class="form-control" autocomplete="off">
                        <small class="text-danger nama_skpd"></small>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="kd_urusan">Kode Urusan</label>
                                <input type="text" name="kd_urusan" id="kd_urusan" class="form-control" autocomplete="off">
                                <small class="text-danger kd_urusan"></small>
                            </div>
                        </div><div class="col-sm-6">
                            <div class="form-group">
                                <label for="kd_bidang">Kode Bidang</label>
                                <input type="text" name="kd_bidang" id="kd_bidang" class="form-control" autocomplete="off">
                                <small class="text-danger kd_bidang"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="kd_unit">Kode Unit</label>
                                <input type="text" name="kd_unit" id="kd_unit" class="form-control" autocomplete="off">
                                <small class="text-danger kd_unit"></small>
                            </div>
                        </div><div class="col-sm-6">
                            <div class="form-group">
                                <label for="kd_sub">Kode Sub</label>
                                <input type="text" name="kd_sub" id="kd_sub" class="form-control" autocomplete="off">
                                <small class="text-danger kd_sub"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-tambah" class="btn btn-sm btn-primary">
                <i class="fa fa-save"></i> SIMPAN
            </button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                <i class="fa fa-times"></i> BATAL
            </button>
        </div>
    </form>
</div>