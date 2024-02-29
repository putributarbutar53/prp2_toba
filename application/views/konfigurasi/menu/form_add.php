<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">TAMBAH MENU</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form id="form-tambah">
            <div class="form-group">
                <label for="main_menu">Main Menu</label>
                <select name="main_menu" id="main_menu" class="form-control select2" style="width: 100%;">
                    <option value="0">Menu Utama</option>
                    <?php foreach ($result_menu as $r) : ?>
                        <option value="<?= $r['menu_id']; ?>"><?= $r['menu_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="text-danger main_menu"></small>
            </div>
            <div class="form-group">
                <label for="menu">Nama Menu</label>
                <input type="text" name="menu" id="menu" class="form-control" autocomplete="off">
                <small class="text-danger menu"></small>
            </div>
            <div class="form-group">
                <label for="url">Url Menu</label>
                <input type="text" name="url" id="url" class="form-control" autocomplete="off">
                <small class="text-danger url"></small>
            </div>
            <div class="form-group">
                <label for="icon">Icon Menu</label>
                <input type="text" name="icon" id="icon" class="form-control" autocomplete="off">
                <small class="text-danger icon"></small>
            </div>
            <div class="form-group">
                <label style="margin-right: 15px;">Fitur : </label>
                <label style="margin-right: 10px;" for="add">
                    <input type="checkbox" name="add" id="add" checked> Add
                </label>
                <label style="margin-right: 10px;" for="update">
                    <input type="checkbox" name="update" id="update" checked> Update
                </label>
                <label style="margin-right: 10px;" for="delete">
                    <input type="checkbox" name="delete" id="delete" checked> Delete
                </label><br>
                <label style="margin-right: 10px;" for="update_1">
                    <input type="checkbox" name="update_1" id="update_1" checked> Update Tahun-1
                </label>
                <label style="margin-right: 10px;" for="delete_1">
                    <input type="checkbox" name="delete_1" id="delete_1" checked> Delete Tahun-1
                </label>
            </div>
            <div class="form-group">
                <label for="urutan">Urutan</label>
                <input type="number" name="urutan" id="urutan" value="0" class="form-control" autocomplete="off">
                <small class="text-danger urutan"></small>
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
    $(document).ready(function() {
        $('.select2').select2();
    });
    $('form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
</script>