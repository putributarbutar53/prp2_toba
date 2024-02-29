<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            UPLOAD DANA DESA KABUPATEN/KOTA
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
                        <input type="text" name="tahun" id="tahun" class="form-control" value="<?= date('Y') ?>" readonly>
                        <small class="text-danger bulan"></small>
                    </div>
                    <div class="form-group">
                        <label for="tgl_periode">Tanggal Periode</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" name="tgl_periode" id="tgl_periode" data-date-format="dd-mm-yyyy" class="form-control" autocomplete="off">
                        </div>
                        <small class="text-danger tgl_periode"></small>
                    </div>
                    <div class="form-group">
                        <label for="file_upload">Upload File Excel (Maksimal ukuran file 2Mb)</label>
                        <input type="file" name="file_upload" id="file_upload" class="form-control" accept=".xlsx" onchange="return file_excel('file_upload')">
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
    $('#tgl_periode').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    function file_excel(fileupload) {
        var input_file = document.getElementById(fileupload);
        var path_file = input_file.value;
        var extention_ok = /(\.xlsx)$/i;
        if (!extention_ok.exec(path_file)) {
            notifikasi('error', 'KONFIRMASI', 'FORMAT EKSTENSI HARUS .XLS');
            input_file.value = '';
            return false;
        } else {
            if (input_file.files && input_file.files[0]) {
                if (input_file.files[0].size > 2048000) {
                    notifikasi('error', 'KONFIRMASI', 'UKURAN FILE HARUS DI BAWAH ' + (2048000 / 1024000) + ' MB');
                    input_file.value = '';
                    return false;
                }
            }
        }
    }
</script>