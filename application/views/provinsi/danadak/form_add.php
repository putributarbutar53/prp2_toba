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
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" name="tahun" id="tahun" value="<?= $tahun; ?>" class="form-control" autocomplete="off" readonly>
                <small class="text-danger tahun"></small>
            </div>
            <div class="form-group">
                <label for="skpd">Satuan Kerja</label>
                <input type="hidden" name="id_skpd" id="id_skpd" value="<?= $skpd['id_skpd']; ?>" class="form-control" autocomplete="off" readonly>
                <input type="text" name="skpd" id="skpd" value="<?= $skpd['nama_skpd']; ?>" class="form-control" autocomplete="off" readonly>
                <small class="text-danger skpd"></small>
            </div>
            <div class="form-group">
                <label for="sub_bidang">Sub Bidang</label>
                <input type="text" name="sub_bidang" id="sub_bidang" class="form-control" autocomplete="off">
                <small class="text-danger sub_bidang"></small>
            </div>
            <div class="form-group">
                <label for="dipa">Dipa</label>
                <input type="text" name="dipa" id="dipa" class="form-control" autocomplete="off">
                <small class="text-danger dipa"></small>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control" autocomplete="off">
                <small class="text-danger keterangan"></small>
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