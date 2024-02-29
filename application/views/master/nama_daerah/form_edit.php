<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM UBAH
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form-ubah">
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="nama_kabupaten">Nama Daerah</label>
                        <input type="hidden" name="id_kabupaten" id="id_jenis_pelid_kabupatenaksanaan" value="<?= $ta_kabupaten['id_kabupaten']; ?>" class="form-control" autocomplete="off">
                        <input type="text" name="nama_kabupaten" id="nama_kabupaten" value="<?= $ta_kabupaten['nama_kabupaten']; ?>" class="form-control" autocomplete="off">
                        <small class="text-danger nama_kabupaten"></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-ubah" class="btn btn-sm btn-primary">
                <i class="fa fa-save"></i> SIMPAN
            </button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                <i class="fa fa-times"></i> BATAL
            </button>
        </div>
    </form>
</div>