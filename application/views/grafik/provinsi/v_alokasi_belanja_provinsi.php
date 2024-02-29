<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i> Anggaran Belanja : <?= "Rp " . format_angka($struktur_anggaran_provinsi['belanja']); ?></h2>
        <div id="alokasi-belanja-provinsi" style="width:100%; height: 490px;"></div>
    </div>
    <div class="table-responsive">
        <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
            <tr style="background-color: #ff8b00; color: white; font-weight: bold;">
                <td>Belanja Operasi</td>
                <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['operasi']); ?></td>
                <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['operasi'],$struktur_anggaran_provinsi['belanja'],2); ?> %</td>
            </tr>
            <tr style="background-color: #ff2d00; color: white; font-weight: bold;">
                <td>Belanja Modal</td>
                <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['modal']); ?></td>
                <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['modal'],$struktur_anggaran_provinsi['belanja'],2); ?> %</td>
            </tr>
            <tr style="background-color: #04756f; color: white; font-weight: bold;">
                <td>Belanja Tak Terduga</td>
                <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['takterduga']); ?></td>
                <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['takterduga'],$struktur_anggaran_provinsi['belanja'],2); ?> %</td>
            </tr>
            <tr style="background-color: #05518d; color: white; font-weight: bold;">
                <td>Belanja Transfer</td>
                <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['beltransfer']); ?></td>
                <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['beltransfer'],$struktur_anggaran_provinsi['belanja'],2); ?> %</td>
            </tr>
        </table>
    </div>