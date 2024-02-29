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
                <label for="kabupaten">Nama Kabupaten/Kota</label>
                <select name="kabupaten" id="kabupaten" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih Kabupaten</option>
                    <?php foreach ($result_kabupaten as $kab) : ?>
                        <option value="<?= $kab['id_kabupaten']; ?>"><?= $kab['nama_kabupaten']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="text-danger kabupaten"></small>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun Anggaran</label>
                <input type="text" name="tahun" id="tahun" class="form-control" value="<?= $tahun; ?>" autocomplete="off" readonly>
                <small class="text-danger tahun"></small>
            </div>
            <div class="form-group">
                <label for="pendapatan">Pendapatan APBD</label>
                <input type="text" name="pendapatan" id="pendapatan" class="form-control" autocomplete="off">
                <small class="text-danger pendapatan"></small>
            </div>
            <div class="form-group">
                <label for="belanja">Belanja APBD</label>
                <input type="text" name="belanja" id="belanja" class="form-control" autocomplete="off">
                <small class="text-danger belanja"></small>
            </div>
            <div class="form-group">
                <label for="pendapatan_p">Pendapatan PAPBD</label>
                <input type="text" name="pendapatan_p" id="pendapatan_p" class="form-control" autocomplete="off">
                <small class="text-danger pendapatan_p"></small>
            </div>
            <div class="form-group">
                <label for="belanja_p">Belanja PAPBD</label>
                <input type="text" name="belanja_p" id="belanja_p" class="form-control" autocomplete="off">
                <small class="text-danger belanja_p"></small>
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