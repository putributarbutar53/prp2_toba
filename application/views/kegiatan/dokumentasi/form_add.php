<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM TAMBAH DOKUMENTASI
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form-tambah">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="foto">Upload Photo (<i style="font-weight: normal;">Format Jpg/Jpeg/Png Maximal 500KB</i>)</label>
                        <br>
                        <input type="hidden" name="id_detail" id="id_detail" value="<?= $detail['id_kegiatan_detail']; ?>" class="form-control" autocomplete="off" readonly>
                        <img src="<?= cek_file("uploads/no-image.png"); ?>" style="width: 100%;" alt="Photo" id="load-image">
                        <input type="file" name="foto" id="foto" class=" form-control" accept="image/*" onchange="return file_image('foto', '#load-image', '<?= base_url('uploads/no-image.png'); ?>')">
                        <small class="text-danger foto"></small>
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