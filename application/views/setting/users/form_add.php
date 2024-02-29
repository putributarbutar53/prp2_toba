<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM TAMBAH
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
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" autocomplete="off">
                        <small class="text-danger username"></small>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" autocomplete="off">
                        <small class="text-danger nama"></small>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="nip">Nip</label>
                        <input type="text" name="nip" id="nip" class="form-control" autocomplete="off">
                        <small class="text-danger nip"></small>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="skpd">Nama SKPD</label>
                            <select name="skpd" id="skpd" class="form-control select2" style="width: 100%;">
                                <?php foreach ($result_skpd as $r) : ?>
                                    <option value="<?= $r['id_skpd'] ?>"><?= $r['nama_skpd'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        <small class="text-danger skpd"></small>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="level">Level</label>
                            <select name="level" id="level" class="form-control select2" style="width: 100%;">
                                <?php foreach ($users_level as $s) : ?>
                                    <option value="<?= $s['role_id'] ?>"><?= $s['role_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        <small class="text-danger level"></small>
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

<script>
    $('.select2').select2();
    $('form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
</script>