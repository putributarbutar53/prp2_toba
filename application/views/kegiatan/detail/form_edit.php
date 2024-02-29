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
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="jenis_target">Jenis Target</label>
                        <input type="hidden" name="id_kegiatan_detail" id="id_kegiatan_detail" value="<?= $kegiatan['id_kegiatan_detail']; ?>" class="form-control" autocomplete="off" readonly>
                        <select name="jenis_target" id="jenis_target" class="form-control select2" style="width: 100%;">
                            <option value="H" <?php if ($kegiatan['jenis_target'] == 'H') {
                                                    echo "selected";
                                                } ?>>Harian</option>
                            <option value="M" <?php if ($kegiatan['jenis_target'] == 'M') {
                                                    echo "selected";
                                                } ?>>Mingguan</option>
                            <option value="B" <?php if ($kegiatan['jenis_target'] == 'B') {
                                                    echo "selected";
                                                } ?>>Bulanan</option>
                        </select>
                        <small class="text-danger jenis_target"></small>
                    </div>
                    <div class="form-group">
                        <label for="tahapan_target">Tahapan Target</label>
                        <input type="text" name="tahapan_target" id="tahapan_target" value="<?= $kegiatan['tahapan_target']; ?>" class="form-control" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" autocomplete="off">
                        <small class="text-danger tahapan_target"></small>
                    </div>
                    <div class="form-group">
                        <label for="jadwal_target">Jadwal Target</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" name="jadwal_target" id="_jadwal_target" value="<?= format_tanggal($kegiatan['jadwal_target']); ?>" data-date-format="dd-mm-yyyy" class="form-control" autocomplete="off">
                        </div>
                        <small class="text-danger jadwal_target"></small>
                    </div>
                    <div class="form-group">
                        <label for="target">Target Fisik (%)</label>
                        <input type="text" name="target" id="target" value="<?= number_format($kegiatan['target'], 2); ?>" class="form-control" autocomplete="off">
                        <small class="text-danger target"></small>
                    </div>
                </div>
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
    $(document).ready(function() {
        $('#_jadwal_target').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });
    });
    $('.select2').select2();
</script>