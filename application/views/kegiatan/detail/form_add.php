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
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="jenis_target">Jenis Target</label>
                        <input type="hidden" name="id_kontrak" id="id_kontrak" value="<?=$ta_kontrak['id_kontrak']?>">
                        <select name="jenis_target" id="jenis_target" class="form-control select2" style="width: 100%;">
                            <option value="H">Harian</option>
                            <option value="M">Mingguan</option>
                            <option value="B">Bulanan</option>
                        </select>
                        <small class="text-danger jenis_target"></small>
                    </div>
                    <div class="form-group">
                        <label for="tahapan_target">Tahapan Target</label>
                        <input type="text" name="tahapan_target" id="tahapan_target" class="form-control" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" autocomplete="off">
                        <small class="text-danger tahapan_target"></small>
                    </div>
                    <div class="form-group">
                        <label for="jadwal_target">Jadwal Target</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" name="jadwal_target" id="jadwal_target" data-date-format="dd-mm-yyyy" class="form-control" autocomplete="off">
                        </div>
                        <small class="text-danger jadwal_target"></small>
                    </div>
                    <div class="form-group">
                        <label for="target">Target Fisik (%)</label>
                        <input type="text" name="target" id="target" class="form-control" autocomplete="off">
                        <small class="text-danger target"></small>
                    </div>
                </div>
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
    $(document).ready(function() {
        $('#jadwal_target').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });
    });
    $('.select2').select2();
</script>