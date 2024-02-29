<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">UBAH MENU</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form id="form-ubah">
            <div class="form-group">
                <label for="main_menu">Main Menu</label>
                <input type="hidden" name="menu_id" id="menu_id" class="form-control" value="<?= encrypt_url($menu['menu_id']); ?>" autocomplete="off" readonly>
                <select name="main_menu" id="main_menu" class="form-control select2" style="width: 100%;">
                    <option value="0">Menu Utama</option>
                    <?php foreach ($result_menu as $r) : ?>
                        <?php if ($r['menu_id'] == $menu['is_main_menu']) : ?>
                            <option value="<?= $r['menu_id']; ?>" selected><?= $r['menu_name']; ?></option>
                        <?php else : ?>
                            <option value="<?= $r['menu_id']; ?>"><?= $r['menu_name']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <small class="text-danger main_menu"></small>
            </div>
            <div class="form-group">
                <label for="menu">Nama Menu</label>
                <input type="text" name="menu" id="menu" value="<?= $menu['menu_name']; ?>" class="form-control" autocomplete="off">
                <small class="text-danger menu"></small>
            </div>
            <div class="form-group">
                <label for="url">Url Menu</label>
                <input type="text" name="url" id="url" value="<?= $menu['menu_link']; ?>" class="form-control" autocomplete="off">
                <small class="text-danger url"></small>
            </div>
            <div class="form-group">
                <label for="icon">Icon Menu</label>
                <input type="text" name="icon" id="icon" value="<?= $menu['menu_icon']; ?>" class="form-control" autocomplete="off">
                <small class="text-danger icon"></small>
            </div>
            <div class="form-group">
                <label style="margin-right: 15px;">Fitur : </label>
                <label style="margin-right: 10px;" for="_add">
                    <input type="checkbox" name="add" id="_add" <?php if ($menu['fitur_add'] == 'Y') {
                                                                    echo "checked";
                                                                } ?>> Add
                </label>
                <label style="margin-right: 10px;" for="_update">
                    <input type="checkbox" name="update" id="_update" <?php if ($menu['fitur_update'] == 'Y') {
                                                                            echo "checked";
                                                                        } ?>> Update
                </label>
                <label style="margin-right: 10px;" for="_delete">
                    <input type="checkbox" name="delete" id="_delete" <?php if ($menu['fitur_delete'] == 'Y') {
                                                                            echo "checked";
                                                                        } ?>> Delete
                </label><br>
                <label style="margin-right: 10px;" for="update_1">
                    <input type="checkbox" name="update_1" id="_update_1" <?php if ($menu['fitur_update_1'] == 'Y') {
                                                                            echo "checked";
                                                                        } ?>> Update Tahun-1
                </label>
                <label style="margin-right: 10px;" for="delete_1">
                    <input type="checkbox" name="delete_1" id="_delete_1" <?php if ($menu['fitur_delete_1'] == 'Y') {
                                                                            echo "checked";
                                                                        } ?>> Delete Tahun-1
                </label>
            </div>
            <div class="form-group">
                <label for="urutan">Urutan</label>
                <input type="number" name="urutan" id="urutan" value="<?= $menu['urutan']; ?>" class="form-control" autocomplete="off">
                <small class="text-danger urutan"></small>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" id="btn-ubah" class="btn btn-sm btn-primary">
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