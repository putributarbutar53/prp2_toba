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
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="nama_skpd">OPD</label>
                        <?php if ($akses == "skpd") : ?>
                            <input type="hidden" name="nama_skpd" id="nama_skpd" value="<?= $result_skpd['id_skpd']; ?>" class="form-control" autocomplete="off" readonly>
                            <input type="text" name="skpd" id="skpd" value="<?= $result_skpd['nama_skpd']; ?>" class="form-control" autocomplete="off" readonly>
                        <?php else : ?>
                            <select name="nama_skpd" id="nama_skpd" class="form-control select2" style="width: 100%;">
                                <?php foreach ($result_skpd as $skpd) : ?>
                                    <option value="<?= $skpd['id_skpd']; ?>"><?= $skpd['nama_skpd']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>
                        <small class="text-danger nama_skpd"></small>
                    </div>

                    <div class="form-group">
                        <label for="nip_pa">NIP PA</label>
                        <input type="text" name="nip_pa" id="nip_pa" class="form-control" autocomplete="off">
                        <small class="text-danger nip_pa"></small>
                    </div>

                    <div class="form-group">
                        <label for="nama_pa">Nama PA</label>
                        <input type="text" name="nama_pa" id="nama_pa" class="form-control" autocomplete="off">
                        <small class="text-danger nama_pa"></small>
                    </div>
                </div>
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