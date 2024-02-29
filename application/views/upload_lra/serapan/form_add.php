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
                <label for="id_skpd">Satuan Kerja</label>
                <input type="hidden" name="id_skpd" id="id_skpd" value="<?= $skpd['id_skpd']; ?>" class="form-control" autocomplete="off" readonly>
                <input type="text" name="skpd" id="skpd" value="<?= $skpd['nama_skpd']; ?>" class="form-control" autocomplete="off" readonly>
                <small class="text-danger id_skpd"></small>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" name="tahun" id="tahun" value="<?= $tahun; ?>" class="form-control" autocomplete="off" readonly>
                <small class="text-danger tahun"></small>
            </div>
            <div class="form-group">
                <label for="bulan">Bulan</label>
                <input type="text" name="bulan" id="bulan" value="<?= $bulan; ?>" class="form-control" autocomplete="off" readonly>
                <small class="text-danger bulan"></small>
            </div>
            <div class="form-group">
                <label for="id_uraian">Nama Uraian</label>
                <select name="id_uraian" id="id_uraian" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih Uraian</option>
                    <?php foreach ($uraian as $kab) : ?>
                        <option value="<?= $kab['id_uraian']; ?>">[<?= $kab['kode_rekening']; ?>] <?= $kab['uraian']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="text-danger id_uraian"></small>
            </div>
            <div class="form-group">
                <label for="realisasi">Realisasi</label>
                <input type="text" name="realisasi" id="realisasi" class="form-control" autocomplete="off">
                <small class="text-danger realisasi"></small>
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

<script>
    $('.select2').select2();
</script>