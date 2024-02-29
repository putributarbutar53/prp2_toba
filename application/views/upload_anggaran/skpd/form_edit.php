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
                <label for="id_skpd">Satuan Kerja</label>
                <input type="hidden" name="id_no" id="id_no" value="<?= $data_uraian['id_uraian']; ?>" class="form-control" autocomplete="off" readonly>
                <input type="text" name="id_skpd" id="id_skpd" value="<?= $skpd['nama_skpd']; ?>" class="form-control" autocomplete="off" readonly>
                <small class="text-danger id_skpd"></small>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" name="tahun" id="tahun" value="<?= $data_uraian['tahun']; ?>" class="form-control" autocomplete="off" readonly>
                <small class="text-danger tahun"></small>
            </div>
            <div class="form-group">
                <label for="id_uraian">Nama Uraian</label>
                <select name="id_uraian" id="id_uraian" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih Uraian</option>
                    <?php foreach ($uraian as $kab) : ?>
                        <?php if ($kab['kode_rekening'] == $data_uraian['kode_rekening']) { ?>
                            <option value="<?= $kab['id_uraian']; ?>" selected>[<?= $kab['kode_rekening']; ?>] <?= $kab['uraian']; ?></option>
                        <?php } else { ?>
                            <option value="<?= $kab['id_uraian']; ?>">[<?= $kab['kode_rekening']; ?>] <?= $kab['uraian']; ?></option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
                <small class="text-danger id_uraian"></small>
            </div>
            <div class="form-group">
                <label for="anggaran">Anggaran</label>
                <input type="text" name="anggaran" id="anggaran" value="<?= $data_uraian['anggaran']; ?>" class="form-control" autocomplete="off">
                <small class="text-danger anggaran"></small>
            </div>
            <div class="form-group">
                <label for="st_anggaran">Status Anggaran</label>
                <select name="st_anggaran" id="st_anggaran" class="form-control select2" style="width: 100%;">
                    <option value="1" <?php if ($data_uraian['st_anggaran'] == 1) {
                            echo "selected";
                        } ?>>APBD</option>
                    <option value="2" <?php if ($data_uraian['st_anggaran'] == 2) {
                             echo "selected";
                        } ?>>P APBD</option>
                </select>
                <small class="text-danger st_anggaran"></small>
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