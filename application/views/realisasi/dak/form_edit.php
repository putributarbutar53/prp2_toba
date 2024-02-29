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
                <label for="sp2d_tahap1">SP2D Tahap 1</label>
                <input type="text" name="sp2d_tahap1" id="sp2d_tahap1" value="<?= format_angka($realisasi['sp2d_tahap1']); ?>" class="form-control" autocomplete="off">
                <small class="text-danger sp2d_tahap1"></small>
            </div>
            <div class="form-group">
                <label for="sp2d_tahap2">SP2D Tahap 2</label>
                <input type="text" name="sp2d_tahap2" id="sp2d_tahap2" value="<?= format_angka($realisasi['sp2d_tahap2']); ?>" class="form-control" autocomplete="off">
                <small class="text-danger sp2d_tahap2"></small>
            </div>
            <div class="form-group">
                <label for="sp2d_tahap3">SP2D Tahap 3</label>
                <input type="text" name="sp2d_tahap3" id="sp2d_tahap3" value="<?= format_angka($realisasi['sp2d_tahap3']); ?>" class="form-control" autocomplete="off">
                <small class="text-danger sp2d_tahap3"></small>
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