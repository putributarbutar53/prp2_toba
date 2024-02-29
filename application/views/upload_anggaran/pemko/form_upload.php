<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM UPLOAD EXCEL ANGGARAN PROVINSI SUMATERA UTARA
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
                        <label for="bulan">Tahun</label>
                        <input type="text" name="tahun" id="tahun" class="form-control" value="2021" readonly>
                        <small class="text-danger bulan"></small>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Anggaran</label>
                        <select name="status" id="status" class="form-control select2" style="width: 100%;">
                            <option value="1">APBD</option>
                            <option value="2">PAPBD</option>
                        </select>
                        <small class="text-danger bulan"></small>
                    </div>
                    <div class="form-group">
                        <label for="file">File Excel</label>
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