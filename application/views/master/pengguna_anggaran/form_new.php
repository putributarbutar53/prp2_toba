<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM PENGGUNA BARU
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form-new">
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="nama_skpd">OPD</label>
                        <input type="hidden" name="id_skpd" id="id_skpd" value="<?= $skpd['id_skpd']; ?>" class="form-control" autocomplete="off">
                        <input type="text" name="nama_skpd" id="nama_skpd" value="<?= $skpd['nama_skpd']; ?>" class="form-control" autocomplete="off" readonly>
                        <small class="text-danger nama_skpd"></small>
                    </div>

                    <div class="form-group">
                        <label for="nip_pa">NIP PA</label>
                        <input type="text" name="nip_pa" id="nip_pa" class="form-control" autocomplete="off">
                        <small class="text-danger nip_pa"></small>
                    </div>

                    <div class="form-group">
                        <label for="nama_pa">Nama PA</label>
                        <input type="text" name="nama_pa" id="nama_pa" class="form-control" autocomplete="off">
                        <small class="text-danger nama_pa"></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-new" class="btn btn-sm btn-primary">
                <i class="fa fa-save"></i> SIMPAN
            </button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                <i class="fa fa-times"></i> BATAL
            </button>
        </div>
    </form>
</div>