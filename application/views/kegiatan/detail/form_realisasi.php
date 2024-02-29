<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM UBAH REALISASI
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form-realisasi">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="realisasi">Realisasi</label>
                        <input type="hidden" name="id_kegiatan_detail" id="id_kegiatan_detail" value="<?= $kegiatan['id_kegiatan_detail']; ?>" class="form-control" autocomplete="off" readonly>
                        <input type="text" name="realisasi" id="realisasi" value="<?= number_format($kegiatan['realisasi'], 2); ?>" class="form-control" autocomplete="off">
                        <small class="text-danger realisasi"></small>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="3"><?= $kegiatan['keterangan_target']; ?></textarea>
                        <small class="text-danger keterangan"></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-realisasi" class="btn btn-sm btn-primary">
                <i class="fa fa-save"></i> SIMPAN
            </button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                <i class="fa fa-times"></i> BATAL
            </button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#_jadwal_target').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });
    });
    $('.select2').select2();
</script>