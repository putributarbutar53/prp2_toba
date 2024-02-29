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
                <label for="kabupaten">Nama Kabupaten/Kota</label>
                <input type="hidden" name="id_wilayah" id="id_wilayah" class="form-control" value="<?= $anggaran['no']; ?>" autocomplete="off" readonly>
                <select name="kabupaten" id="kabupaten" class="form-control select2" style="width: 100%;">
                    <?php foreach ($result_kabupaten as $kab) : ?>
                        <?php if ($kab['id_kabupaten'] == $anggaran['id_kabupaten']) : ?>
                            <option value="<?= $kab['id_kabupaten']; ?>" selected><?= $kab['nama_kabupaten']; ?></option>
                        <?php else : ?>
                            <option value="<?= $kab['id_kabupaten']; ?>"><?= $kab['nama_kabupaten']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <small class="text-danger kabupaten"></small>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun Anggaran</label>
                <input type="text" name="tahun" id="tahun" class="form-control" value="<?= $anggaran['tahun']; ?>" autocomplete="off" readonly>
                <small class="text-danger tahun"></small>
            </div>
            <div class="form-group">
                <label for="pendapatan">Pendapatan APBD</label>
                <input type="text" name="pendapatan" id="pendapatan" value="<?= format_rupiah($anggaran['pendapatan']); ?>" class="form-control" autocomplete="off">
                <small class="text-danger pendapatan"></small>
            </div>
            <div class="form-group">
                <label for="belanja">Belanja APBD</label>
                <input type="text" name="belanja" id="belanja" value="<?= format_rupiah($anggaran['belanja']); ?>" class="form-control" autocomplete="off">
                <small class="text-danger belanja"></small>
            </div>
            <div class="form-group">
                <label for="pendapatan_p">Pendapatan PAPBD</label>
                <input type="text" name="pendapatan_p" id="pendapatan_p" value="<?= format_rupiah($anggaran['pendapatan_p']); ?>" class="form-control" autocomplete="off">
                <small class="text-danger pendapatan_p"></small>
            </div>
            <div class="form-group">
                <label for="belanja_p">Belanja PAPBD</label>
                <input type="text" name="belanja_p" id="belanja_p" value="<?= format_rupiah($anggaran['belanja_p']); ?>" class="form-control" autocomplete="off">
                <small class="text-danger belanja_p"></small>
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

<script>
    $('.select2').select2();
</script>