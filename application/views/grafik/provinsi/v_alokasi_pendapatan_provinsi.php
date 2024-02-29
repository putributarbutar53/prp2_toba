<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i> Anggaran Pendapatan : <?= "Rp " . format_angka($struktur_anggaran_provinsi['pendapatan']); ?></h2>
        <div id="alokasi-pendapatan-provinsi" style="width:100%; height: 400px;"></div>
    </div>

    <div class="table-responsive">
        <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
            <tr style="background-color: #33cccc; color: white; font-weight: bold;">
                <td  colspan="2">Pendapatan Asli daerah (PAD)</td>
                <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['pad']); ?></td>
                <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['pad'],$struktur_anggaran_provinsi['pendapatan'],1); ?> %</td>
            </tr>
            <tr style="background-color: #33cc33; color: white; font-weight: bold;">
                <td>Transfer</td>
                <td>Dana Bagi Hasil (DBH)</td>
                <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['dbh']); ?></td>
                <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['dbh'],$struktur_anggaran_provinsi['pendapatan'],1); ?> %</td>
            </tr>
            <tr style="background-color: #14ad14; color: white; font-weight: bold;">
                <td>Transfer</td>
                <td>Dana Alokasi Umum (DAU)</td>
                <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['dau']); ?></td>
                <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['dau'],$struktur_anggaran_provinsi['pendapatan'],1); ?> %</td>
            </tr>
            <tr style="background-color: #008d00; color: white; font-weight: bold;">
                <td>Transfer</td>
                <td>Dana Alokasi Khusus (DAK) Fisik</td>
                <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['dak']); ?></td>
                <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['dak'],$struktur_anggaran_provinsi['pendapatan'],1); ?> %</td>
            </tr>
            <tr style="background-color: #006d00; color: white; font-weight: bold;">
                <td>Transfer</td>
                <td>Dana Alokasi Khusus (DAK) Non Fisik</td>
                <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['daknon']); ?></td>
                <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['daknon'],$struktur_anggaran_provinsi['pendapatan'],1); ?> %</td>
            </tr>
            <tr style="background-color: #b38600; color: white; font-weight: bold;">
                <td colspan="2">Lain Lain Pendapatan Daerah yang Sah</td>
                <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['pad_lain']); ?></td>
                <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['pad_lain'],$struktur_anggaran_provinsi['pendapatan'],1); ?> %</td>
            </tr>
        </table>
    </div>