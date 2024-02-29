<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            EDIT PHOTO PROFILE
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form id="form-foto">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="foto">Upload Photo (<i style="font-weight: normal;">Format Jpg/Jpeg/Png Maximal 500KB</i>)</label>
                        <br>
                        <input type="hidden" name="id_user" id="id_user" value="<?= encrypt_url($user['id_user']); ?>" class="form-control" autocomplete="off" readonly>
                        <input type="hidden" name="username" id="username" value="<?= $user['username']; ?>" class="form-control" autocomplete="off" readonly>
                        <img src="<?= cek_file("uploads/users/" . $user['foto_profile']); ?>" style="width: 200px; height: 225px;" alt="Photo" id="load-image">
                        <input type="file" name="foto" id="foto" class=" form-control" accept="image/*" onchange="return file_image('foto', '#load-image', '<?= base_url('uploads/no-image.png'); ?>')">
                        <small class="text-danger foto"></small>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" id="btn-foto" class="btn btn-sm btn-primary">
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