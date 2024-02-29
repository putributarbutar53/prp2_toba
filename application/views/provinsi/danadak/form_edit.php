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
                <input type="hidden" name="id_dak" id="id_dak" value="<?= $dak['id_dak']; ?>" class="form-control" autocomplete="off" readonly>
                <input type="text" name="skpd" id="skpd" value="<?= $skpd['nama_skpd']; ?>" class="form-control" autocomplete="off" readonly>
                <small class="text-danger skpd"></small>
            </div>
            <div class="form-group">
                <label for="sub_bidang">Sub Bidang</label>
                <input type="text" name="sub_bidang" id="sub_bidang" value="<?= $dak['subbidang']; ?>" class="form-control" autocomplete="off">
                <small class="text-danger sub_bidang"></small>
            </div>
            <div class="form-group">
                <label for="dipa">Dipa</label>
                <input type="text" name="dipa" id="dipa" value="<?= format_rupiah($dak['total']); ?>" class="form-control" autocomplete="off">
                <small class="text-danger dipa"></small>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" value="<?= $dak['keterangan']; ?>" class="form-control" autocomplete="off">
                <small class="text-danger keterangan"></small>
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