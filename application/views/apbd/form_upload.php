<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM UPLOAD EXCEL
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form id="form-tambah">
            <div class="row">
                <div class="col-sm-12">
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
                        <label for="file">File Excel</label>
                        <input type="hidden" name="id_skpd" id="id_skpd" value="<?=$id_skpd?>">
                        <input type="file" name="file_upload" id="file_upload" class="form-control" accept=".xls">
                        <small class="text-danger file_upload"></small>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" id="btn-tambah" class="btn btn-sm btn-primary">
            <i class="fa fa-save"></i> SIMPAN
        </button>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
            <i class="fa fa-times"></i> BATAL
        </button>
    </div>
</div>
