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
                <input type="hidden" name="kabupaten" id="kabupaten" value="<?= $kabupaten['id_kabupaten']; ?>" class="form-control" autocomplete="off" readonly>
                <input type="text" name="nama_kabupaten" id="nama_kabupaten" value="<?= $kabupaten['nama_kabupaten']; ?>" class="form-control" autocomplete="off" readonly>
                <small class="text-danger kabupaten"></small>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun Anggaran</label>
                <input type="text" name="tahun" id="tahun" class="form-control" value="<?= $tahun; ?>" autocomplete="off" readonly>
                <small class="text-danger tahun"></small>
            </div>
            <div class="form-group">
                <label for="dbh">DBH</label>
                <input type="text" name="dbh" id="dbh" class="form-control" autocomplete="off">
                <small class="text-danger dbh"></small>
            </div>
            <div class="form-group">
                <label for="dau">DAU</label>
                <input type="text" name="dau" id="dau" class="form-control" autocomplete="off">
                <small class="text-danger dau"></small>
            </div>
            <div class="form-group">
                <label for="dakfisik">DAK Fisik</label>
                <input type="text" name="dakfisik" id="dakfisik" class="form-control" autocomplete="off">
                <small class="text-danger dakfisik"></small>
            </div>
            <div class="form-group">
                <label for="daknon">DAK Non Fisik</label>
                <input type="text" name="daknon" id="daknon" class="form-control" autocomplete="off">
                <small class="text-danger daknon"></small>
            </div>
            <div class="form-group">
                <label for="did">DID</label>
                <input type="text" name="did" id="did" class="form-control" autocomplete="off">
                <small class="text-danger did"></small>
            </div>
            <div class="form-group">
                <label for="desa">Desa</label>
                <input type="text" name="desa" id="desa" class="form-control" autocomplete="off">
                <small class="text-danger desa"></small>
            </div>
            <div class="form-group">
                <label for="st_apbd">Status Anggaran</label>
                <select name="st_apbd" id="st_apbd" class="form-control select2" style="width: 100%;">
                    <option value="0">APBD</option>
                    <option value="1">P APBD</option>
                </select>
                <small class="text-danger st_apbd"></small>
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