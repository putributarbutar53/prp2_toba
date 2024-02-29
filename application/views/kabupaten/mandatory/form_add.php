<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM UPLOAD EXCEL ANGGARAN KAS
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form-tambah">
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="hidden" name="id_kabupaten" value="<?=$id_kabupaten?>">
                        <input type="text" name="tahun" id="tahun" class="form-control" value="<?=$tahun?>" readonly>
                        <small class="text-danger tahun"></small>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-8">
                                <label for="pendidikan">Pendidikan</label>
                                <input type="text" name="pendidikan" id="pendidikan" class="form-control">
                                <small class="text-danger pendidikan"></small>
                            </div>
                            <div class="col-sm-4">
                                <label for="persen_pendidikan">Persen</label>
                                <input type="text" name="persen_pendidikan" id="persen_pendidikan" class="form-control">
                                <small class="text-danger persen_pendidikan"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-8">
                                <label for="kesehatan">Kesehatan</label>
                                <input type="text" name="kesehatan" id="kesehatan" class="form-control">
                                <small class="text-danger kesehatan"></small>
                            </div>
                            <div class="col-sm-4">
                                <label for="persen_kesehatan">Persen</label>
                                <input type="text" name="persen_kesehatan" id="persen_kesehatan" class="form-control">
                                <small class="text-danger persen_kesehatan"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-8">
                                <label for="infrastruktur">Infrastruktur</label>
                                <input type="text" name="infrastruktur" id="infrastruktur" class="form-control">
                                <small class="text-danger infrastruktur"></small>
                            </div>
                            <div class="col-sm-4">
                                <label for="persen_infrestruktur">Persen</label>
                                <input type="text" name="persen_infrestruktur" id="persen_infrestruktur" class="form-control">
                                <small class="text-danger persen_infrestruktur"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="st_apbd">Status Anggaran</label>
                        <select name="st_apbd" id="st_apbd" class="form-control select2" style="width: 100%;">
                                <option value="1">APBD</option>
                                <option value="2">P APBD</option>
                            </select>
                        <small class="text-danger st_apbd"></small>
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
