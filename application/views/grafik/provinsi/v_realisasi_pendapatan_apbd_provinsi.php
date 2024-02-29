<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i> Realisasi Pendapatan Pada APBD <?=$nama_kabupaten?></h2>
        <div id="realisasi-pendapatan-apbd-provinsi" style="width:100%; height: 500px;"></div>
    </div>
    <table class="table-responsive">
        <tr style="background-color: #0f5dc1; color: white; font-weight: bold;">
            <td colspan="3">Realisasi Pendapatan Pada APBD Provinsi Periode 1 Januari s.d <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?></td>
        </tr>
        <tr style="background-color: #33cccc; color: white; font-weight: bold;">
            <td>Realisasi Pendapatan Asli Daerah (PAD)</td>
            <td class="text-right"><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_pad_terakhir']); ?></td>
            <td class="text-right"><?= hitung_persen($realisasi_apbd_provinsi['real_pad_terakhir'],$struktur_anggaran_provinsi['pad'],2); ?> %</td>
        </tr>
        <tr style="background-color: #33cc33; color: white; font-weight: bold;">
            <td>Realisasi Pendapatan Transfer</td>
            <td class="text-right"><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_transfer_terakhir']); ?></td>
            <td class="text-right"><?= hitung_persen($realisasi_apbd_provinsi['real_transfer_terakhir'],$struktur_anggaran_provinsi['transfer'],2); ?> %</td>
        </tr>
        <tr style="background-color: #b38600; color: white; font-weight: bold;">
            <td>Realisasi Lain Lain Pendapatan Daerah yang Sah</td>
            <td class="text-right"><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_lain2_terakhir']); ?></td>
            <td class="text-right"><?= hitung_persen($realisasi_apbd_provinsi['real_lain2_terakhir'],$struktur_anggaran_provinsi['pad_lain'],2); ?> %</td>
        </tr>
        <tr style="background-color: #33cc33; color: white; font-weight: bold;">
            <td>Realisasi Dana Bagi Hasil (DBH)</td>
            <td class="text-right"><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_dbh_terakhir']); ?></td>
            <td class="text-right"><?= hitung_persen($realisasi_apbd_provinsi['real_dbh_terakhir'],$struktur_anggaran_provinsi['dbh'],2); ?> %</td>
        </tr>
        <tr style="background-color: #14ad14; color: white; font-weight: bold;">
            <td>Realisasi Dana Alokasi Umum (DAU)</td>
            <td class="text-right"><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_dau_terakhir']); ?></td>
            <td class="text-right"><?= hitung_persen($realisasi_apbd_provinsi['real_dau_terakhir'],$struktur_anggaran_provinsi['dau'],2); ?> %</td>
        </tr>
        <tr style="background-color: #008d00; color: white; font-weight: bold;">
            <td>Realisasi Dana Alokasi Khusus (DAK) Fisik</td>
            <td class="text-right"><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_dak_terakhir']); ?></td>
            <td class="text-right"><?= hitung_persen($realisasi_apbd_provinsi['real_dak_terakhir'],$struktur_anggaran_provinsi['dak'],2); ?> %</td>
        </tr>
        <tr style="background-color: #006d00; color: white; font-weight: bold;">
            <td>Realisasi Dana Alokasi Khusus (DAK) Non Fisik</td>
            <td class="text-right"><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_daknon_terakhir']); ?></td>
            <td class="text-right"><?= hitung_persen($realisasi_apbd_provinsi['real_daknon_terakhir'],$struktur_anggaran_provinsi['daknon'],2); ?> %</td>
        </tr>
    </table>