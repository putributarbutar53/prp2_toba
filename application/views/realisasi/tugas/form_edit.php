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
            <div class="form-group">
                <label for="skpd">Satuan Kerja</label>
                <input type="hidden" name="id_realisasi" id="id_realisasi" value="<?= $realisasi['id_realisasi']; ?>" class="form-control" autocomplete="off" readonly>
                <input type="text" name="skpd" id="skpd" value="<?= $skpd['nama_skpd']; ?>" class="form-control" autocomplete="off" readonly>
                <small class="text-danger skpd"></small>
            </div>
            <div class="form-group">
                <label for="realisasi">Realisasi</label>
                <input type="text" name="realisasi" id="realisasi" value="<?= format_angka($realisasi['realisasi']); ?>" class="form-control" autocomplete="off">
                <small class="text-danger realisasi"></small>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-upload" class="btn btn-sm btn-primary">
                <i class="fa fa-save"></i> SIMPAN
            </button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                <i class="fa fa-times"></i> BATAL
            </button>
        </div>
    </form>
</div>

<script>
    $('.select2').select2();
</script>