<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM UPLOAD EXCEL SIRUP OPD
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form-upload">
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" name="tahun" id="tahun" class="form-control" value="<?= date('Y') ?>" readonly>
                        <small class="text-danger tahun"></small>
                    </div>
                    <div class="form-group">
                        <label for="file">File Excel</label>
                        <input type="hidden" name="id_skpd" id="id_skpd" value="<?= $id_skpd ?>" readonly>
                        <input type="file" name="file_upload" id="file_upload" class="form-control" accept=".xls">
                        <small class="text-danger file_upload"></small>
                    </div>
                </div>
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