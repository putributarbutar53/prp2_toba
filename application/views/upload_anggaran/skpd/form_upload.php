<?php
$skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
?>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            Hapus Anggaran <?=$skpd['nama_skpd']?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form-upload">
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="bulan">Tahun</label>
                        <input type="hidden" name="id_skpd" id="id_skpd" value="<?= $id_skpd ?>">
                        <input type="text" name="tahun" id="tahun" class="form-control" value="2021" readonly>
                        <small class="text-danger bulan"></small>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Anggaran</label>
                        <select name="status" id="status" class="form-control select2" style="width: 100%;">
                            <option value="1">APBD</option>
                            <option value="2">PAPBD</option>
                        </select>
                        <small class="text-danger bulan"></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-upload" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i> HAPUS
            </button>
            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">
                <i class="fa fa-times"></i> BATAL
            </button>
        </div>
    </form>
</div>

<script>
    $('.select2').select2();
</script>