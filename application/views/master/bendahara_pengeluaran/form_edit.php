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
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="nama_skpd">OPD</label>
                        <input type="hidden" name="id_ttd" id="id_ttd" value="<?= $bendahara_pengeluaran['id_ttd']; ?>" class="form-control" autocomplete="off">
                        <input type="text" name="nama_skpd" id="nama_skpd" value="<?= $bendahara_pengeluaran['nama_skpd']; ?>" class="form-control" autocomplete="off" readonly>
                        <small class="text-danger nama_skpd"></small>
                    </div>

                    <div class="form-group">
                        <label for="nip_ttd">NIP Bendahara Pengeluaran</label>
                        <input type="text" name="nip_ttd" id="nip_ttd" value="<?= $bendahara_pengeluaran['nip_ttd']; ?>" class="form-control" autocomplete="off">
                        <small class="text-danger nip_ttd"></small>
                    </div>

                    <div class="form-group">
                        <label for="nama_ttd">Nama Bendahara Pengeluaran</label>
                        <input type="text" name="nama_ttd" id="nama_ttd" value="<?= $bendahara_pengeluaran['nama_ttd']; ?>" class="form-control" autocomplete="off">
                        <small class="text-danger nama_ttd"></small>
                    </div>

                    <div class="form-group">
                        <label for="_ttd">Upload Photo (<i style="font-weight: normal;">Format Jpg/Jpeg/Png Maximal 500KB</i>)</label>
                        <br>
                        <img src="<?= cek_file("uploads/ttd/" . $bendahara_pengeluaran['ttd']); ?>" style="width: 200px; height: 70px;" alt="Photo" id="load-image">
                        <input type="file" name="ttd" id="_ttd" class=" form-control" accept="image/*" onchange="return file_image('_ttd', '#load-image', '<?= base_url('uploads/no-image.png'); ?>')">
                        <small class="text-danger ttd"></small>
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