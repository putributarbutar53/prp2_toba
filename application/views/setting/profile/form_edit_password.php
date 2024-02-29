<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            UBAH PASSWORD
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form id="form-password">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="hidden" name="id_user" id="id_user" value="<?= encrypt_url($user['id_user']); ?>" class="form-control" autocomplete="off" readonly>
                        <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                        <small class="text-danger password"></small>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="password_confirm">Konfirmasi Password</label>
                        <input type="password" name="password_confirm" id="password_confirm" class="form-control" autocomplete="off">
                        <small class="text-danger password_confirm"></small>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" id="btn-password" class="btn btn-sm btn-primary">
            <i class="fa fa-save"></i> SIMPAN
        </button>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
            <i class="fa fa-times"></i> BATAL
        </button>
    </div>
</div>

<script>
    $('form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
</script>