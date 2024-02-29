<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM UPLOAD EXCEL REALISASI PROVINSI SUMATERA UTARA
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
                        <label for="bulan">Bulan</label>
                        <select name="bulan" id="bulan" class="form-control select2" style="width: 100%;">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <small class="text-danger bulan"></small>
                    </div>
                    <div class="form-group">
                        <label for="bulan">Tanggal Data</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control">
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