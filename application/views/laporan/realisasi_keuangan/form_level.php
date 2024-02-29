<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            KONFIRMASI PENGIRIMAN LAPORAN
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form-kirim">
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="bulan">Laporan Bulan <?=bulan($bulan)?></label>
                        <input type="hidden" name="id_skpd" id="id_skpd" value="<?=$id_skpd?>">
                        <small class="text-danger id_skpd"></small>
                        <input type="hidden" name="bulan" id="bulan" value="<?=$bulan?>">
                        <small class="text-danger bulan"></small>
                        <input type="hidden" name="level" id="level" value="<?=$level?>">
                        <small class="text-danger level"></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-kirim" class="btn btn-sm btn-primary">
                <i class="fa fa-save"></i> KIRIM
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