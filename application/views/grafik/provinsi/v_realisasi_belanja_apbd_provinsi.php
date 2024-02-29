<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i> Realisasi Belanja Pada APBD <?=$nama_kabupaten?></h2>
        <div id="realisasi-belanja-apbd-provinsi" style="width:100%; height: 500px;"></div>
    </div>
    <table class="table-responsive">
        <tr style="background-color: #0f5dc1; color: white; font-weight: bold;">
            <td colspan="3">Realisasi Belanja Pada APBD Provinsi Periode 1 Januari s.d <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?></td>
        </tr>
        <tr style="background-color: #ff8b00; color: white; font-weight: bold;">
            <td>Realisasi Belanja Operasi</td>
            <td class="text-right"><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_operasi_terakhir']); ?></td>
            <td class="text-right"><?= hitung_persen($realisasi_apbd_provinsi['real_operasi_terakhir'],$struktur_anggaran_provinsi['operasi'],2); ?> %</td>
        </tr>
        <tr style="background-color: #ff2d00; color: white; font-weight: bold;">
            <td>Realisasi Belanja Modal</td>
            <td class="text-right"><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_modal_terakhir']); ?></td>
            <td class="text-right"><?= hitung_persen($realisasi_apbd_provinsi['real_modal_terakhir'],$struktur_anggaran_provinsi['modal'],2); ?> %</td>
        </tr>
        <tr style="background-color: #04756f; color: white; font-weight: bold;">
            <td>Realisasi Belanja Tak Terduga</td>
            <td class="text-right"><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_takterduga_terakhir']); ?></td>
            <td class="text-right"><?= hitung_persen($realisasi_apbd_provinsi['real_takterduga_terakhir'],$struktur_anggaran_provinsi['takterduga'],2); ?> %</td>
        </tr>
        <tr style="background-color: #05518d; color: white; font-weight: bold;">
            <td>Realisasi Belanja Transfer</td>
            <td class="text-right"><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_beltransfer_terakhir']); ?></td>
            <td class="text-right"><?= hitung_persen($realisasi_apbd_provinsi['real_beltransfer_terakhir'],$struktur_anggaran_provinsi['beltransfer'],2); ?> %</td>
        </tr>
    </table>