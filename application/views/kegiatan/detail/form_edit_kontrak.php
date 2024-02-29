<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM UBAH
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form-ubah-kontrak">
        <div class="modal-body">
            <div class="form-group">
                <label for="id_kontrak">Nomor Kontrak</label>
                <input type="hidden" name="id_real" id="id_real" value="<?= $data_real['id_real']; ?>" class="form-control" readonly>
                <input type="hidden" name="id_kontrak" id="id_kontrak" value="<?= $kontrak['id_kontrak']; ?>" class="form-control" readonly>
                <input type="text" name="no_kontrak" id="no_kontrak" value="<?= $kontrak['no_kontrak']; ?>" class="form-control" readonly>
                <small class="text-danger id_kontrak"></small>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" name="tahun" id="tahun" value="<?= $kontrak['tahun']; ?>" class="form-control" readonly>
                <small class="text-danger tahun"></small>
            </div>
            <div class="form-group">
                <label for="nilai">Realisasi Kontrak</label>
                <input type="text" name="nilai" id="nilai" value="<?= format_rupiah($data_real['nilai']); ?>" class="form-control" autocomplete="off">
                <small class="text-danger nilai"></small>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" value="<?= $data_real['keterangan']; ?>" class="form-control" autocomplete="off">
                <small class="text-danger keterangan"></small>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-ubah-kontrak" class="btn btn-sm btn-primary">
                <i class="fa fa-save"></i> SIMPAN
            </button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                <i class="fa fa-times"></i> BATAL
            </button>
        </div>
    </form>
</div>