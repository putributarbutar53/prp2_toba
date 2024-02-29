<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            UBAH AKSES USER
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form id="form-ubah">
            <div class="table-responsive">
                <input type="hidden" name="role_id" id="role_id" class="form-control" value="<?= encrypt_url($role['role_id']); ?>" autocomplete="off" readonly>
                <table class="table-default" style="width: 100%;">
                    <thead>
                        <tr style="background-color: #1572EB; color: white;">
                            <th class="text-left">NAMA MENU</th>
                            <th class="text-center">AKSES</th>
                            <th class="text-center">TAMBAH</th>
                            <th class="text-center">UBAH</th>
                            <th class="text-center">HAPUS</th>
                            <th class="text-center">UBAH-1</th>
                            <th class="text-center">HAPUS-1</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        <?php foreach ($result_menu as $menu) : ?>
                            <tr>
                                <?php if ($menu['is_main_menu'] == 0) : ?>
                                    <td style="font-weight: bold;"><?= $menu['menu_name']; ?></td>
                                <?php else : ?>
                                    <td style="padding-left: 40px;"><?= $menu['menu_name']; ?></td>
                                <?php endif; ?>
                                <td class="text-center">
                                    <input type="checkbox" name="akses<?= $no; ?>" id="akses<?= $no; ?>" <?php if ($menu['akses'] == 'Y') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                                </td>
                                <td class="text-center">
                                    <?php if ($menu['fitur_add'] == 'Y') : ?>
                                        <input type="checkbox" name="tambah<?= $no; ?>" id="tambah<?= $no; ?>" <?php if ($menu['tambah'] == 'Y') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
                                    <?php else : ?>
                                        -
                                    <?php endif; ?>
                                </td>

                                <td class="text-center">
                                    <?php if ($menu['fitur_update'] == 'Y') : ?>
                                        <input type="checkbox" name="ubah<?= $no; ?>" id="ubah<?= $no; ?>" <?php if ($menu['ubah'] == 'Y') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                                    <?php else : ?>
                                        -
                                    <?php endif; ?>
                                </td>

                                <td class="text-center">
                                    <?php if ($menu['fitur_delete'] == 'Y') : ?>
                                        <input type="checkbox" name="hapus<?= $no; ?>" id="hapus<?= $no; ?>" <?php if ($menu['hapus'] == 'Y') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
                                    <?php else : ?>
                                        -
                                    <?php endif; ?>
                                </td>

                                <td class="text-center">
                                    <?php if ($menu['fitur_update_1'] == 'Y') : ?>
                                        <input type="checkbox" name="ubah_1<?= $no; ?>" id="ubah_1<?= $no; ?>" <?php if ($menu['ubah_1'] == 'Y') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                                    <?php else : ?>
                                        -
                                    <?php endif; ?>
                                </td>

                                <td class="text-center">
                                    <?php if ($menu['fitur_delete_1'] == 'Y') : ?>
                                        <input type="checkbox" name="hapus_1<?= $no; ?>" id="hapus_1<?= $no; ?>" <?php if ($menu['hapus_1'] == 'Y') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
                                    <?php else : ?>
                                        -
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
    $('form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
</script>