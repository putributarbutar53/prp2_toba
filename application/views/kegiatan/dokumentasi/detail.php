<div class="row">
    <?php if ($cek_foto > 0) : ?>
        <?php foreach ($result_foto as $foto) : ?>
            <div class="col-lg-4 text-center">
                <img src="<?= cek_file('uploads/dokumentasi/' . $foto['file_dokumentasi']); ?>" alt="Dokumentasi" style="width: 100%; margin-bottom: 10px;">
                <button id="tombol-hapus" data-id="<?= $foto['id_dokumentasi']; ?>" class="btn btn-danger btn-xs" style="margin-bottom: 10px;"><i class="fa fa-trash"></i> HAPUS GAMBAR</button>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="col-sm-12">
            <h3>Tidak ada dokumentasi</h3>
        </div>
    <?php endif; ?>
</div>