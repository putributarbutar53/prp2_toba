<div class="row">
        <?php foreach ($data_kegiatan as $kegiatan) { 
            $realisasi = number_format($kegiatan['realisasi'], 2);
            $detail_kegiatan = $this->mquery->select_by('kegiatan_dokumentasi', ['id_kegiatan_detail' => $kegiatan['id_kegiatan_detail']]);
            foreach ($detail_kegiatan as $detail) { 
        ?>
            <div class="col-lg-4 text-center">
                <img src="<?= cek_file('uploads/dokumentasi/' . $detail['file_dokumentasi']); ?>" alt="Dokumentasi" style="width: 100%; margin-bottom: 10px;">
                <button class="btn btn-warning btn-xs" style="margin-bottom: 10px;"> <?=tipe_jadwal($kegiatan['jenis_target']) . ' ke-' . $kegiatan['tahapan_target'] . '<br>' . format_tanggal($kegiatan['jadwal_target'])?> <br> Realisasi <?=$realisasi?> %</button>
            </div>
            <?php } ?>
        <?php } ?>
</div>