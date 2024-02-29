<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM PENGGUNA BARU
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form-new">
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="nama_skpd">OPD</label>
                        <input type="hidden" name="id_skpd" id="id_skpd" value="<?= $skpd['id_skpd']; ?>" class="form-control" autocomplete="off">
                        <input type="text" name="nama_skpd" id="nama_skpd" value="<?= $skpd['nama_skpd']; ?>" class="form-control" autocomplete="off" readonly>
                        <small class="text-danger nama_skpd"></small>
                    </div>

                    <div class="form-group">
                        <label for="nip_ttd">NIP Bendahara Pengeluaran</label>
                        <input type="text" name="nip_ttd" id="nip_ttd" class="form-control" autocomplete="off">
                        <small class="text-danger nip_ttd"></small>
                    </div>

                    <div class="form-group">
                        <label for="nama_ttd">Nama Bendahara Pengeluaran</label>
                        <input type="text" name="nama_ttd" id="nama_ttd" class="form-control" autocomplete="off">
                        <small class="text-danger nama_ttd"></small>
                    </div>

                    <div class="form-group">
                        <label for="ttd">Upload Photo (<i style="font-weight: normal;">Format Jpg/Jpeg/Png Maximal 500KB</i>)</label>
                        <br>
                        <img src="<?= cek_file("uploads/no-image.png"); ?>" style="width: 200px; height: 75px;" alt="Photo" id="load-image">
                        <input type="file" name="ttd" id="ttd" class=" form-control" accept="image/*" onchange="return file_image('ttd', '#load-image', '<?= base_url('uploads/no-image.png'); ?>')">
                        <small class="text-danger ttd"></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-new" class="btn btn-sm btn-primary">
                <i class="fa fa-save"></i> SIMPAN
            </button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                <i class="fa fa-times"></i> BATAL
            </button>
        </div>
    </form>
</div>