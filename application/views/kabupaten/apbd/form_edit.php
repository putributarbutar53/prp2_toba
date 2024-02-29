<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM UBAH
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form-ubah">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kabupaten">Nama Kabupaten/Kota</label>
                        <input type="hidden" name="id_wilayah" id="id_wilayah" class="form-control" value="<?= $apbd['no']; ?>" autocomplete="off" readonly>
                        <input type="hidden" name="kabupaten" id="kabupaten" value="<?= $kabupaten['id_kabupaten']; ?>" class="form-control" autocomplete="off" readonly>
                        <input type="text" name="nama_kabupaten" id="nama_kabupaten" value="<?= $kabupaten['nama_kabupaten']; ?>" class="form-control" autocomplete="off" readonly>
                        <small class="text-danger kabupaten"></small>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun Anggaran</label>
                        <input type="text" name="tahun" id="tahun" class="form-control" value="<?= $apbd['tahun']; ?>" autocomplete="off" readonly>
                        <small class="text-danger tahun"></small>
                    </div>
                    <div class="form-group">
                        <label for="pad">Pendapatan PAD</label>
                        <input type="text" name="pad" id="pad" value="<?= format_rupiah($apbd['pad_anggaran']); ?>" class="form-control" autocomplete="off">
                        <small class="text-danger pad"></small>
                    </div>
                    <div class="form-group">
                        <label for="transfer">Pendapatan Transfer</label>
                        <input type="text" name="transfer" id="transfer" value="<?= format_rupiah($apbd['transfer_anggaran']); ?>" class="form-control" autocomplete="off">
                        <small class="text-danger transfer"></small>
                    </div>
                    <div class="form-group">
                        <label for="pad_lain">Pendapatan Lain</label>
                        <input type="text" name="pad_lain" id="pad_lain" value="<?= format_rupiah($apbd['lain_anggaran']); ?>" class="form-control" autocomplete="off">
                        <small class="text-danger pad_lain"></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="operasional">Belanja Operasional</label>
                        <input type="text" name="operasional" id="operasional" value="<?= format_rupiah($apbd['operasional_anggaran']); ?>" class="form-control" autocomplete="off">
                        <small class="text-danger operasional"></small>
                    </div>
                    <div class="form-group">
                        <label for="modal">Belanja Modal</label>
                        <input type="text" name="modal" id="modal" value="<?= format_rupiah($apbd['modal_anggaran']); ?>" class="form-control" autocomplete="off">
                        <small class="text-danger modal"></small>
                    </div>
                    <div class="form-group">
                        <label for="tak_terduga">Belanja Takterduga</label>
                        <input type="text" name="tak_terduga" id="tak_terduga" value="<?= format_rupiah($apbd['takter_anggaran']); ?>" class="form-control" autocomplete="off">
                        <small class="text-danger tak_terduga"></small>
                    </div>
                    <div class="form-group">
                        <label for="bel_transfer">Belanja Trasfer</label>
                        <input type="text" name="bel_transfer" id="bel_transfer" value="<?= format_rupiah($apbd['beltransfer_anggaran']); ?>" class="form-control" autocomplete="off">
                        <small class="text-danger bel_transfer"></small>
                    </div>
                    <div class="form-group">
                        <label for="st_apbd">Status Anggaran</label>
                        <select name="st_apbd" id="st_apbd" class="form-control select2" style="width: 100%;">
                            <option value="0" <?php if ($apbd['st_apbd'] == '0') {
                                                    echo 'selected';
                                                } ?>>APBD</option>
                            <option value="1" <?php if ($apbd['st_apbd'] == '1') {
                                                    echo 'selected';
                                                } ?>>P APBD</option>
                        </select>
                        <small class="text-danger st_apbd"></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-ubah" class="btn btn-sm btn-primary">
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