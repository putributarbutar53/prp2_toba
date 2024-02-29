<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i> Struktur Anggaran Pendapatan Pada APBD</h2>
        <div id="struktur-anggaran-provinsi" style="width:100%; height: 350px;"></div>
    </div>
    
    <div class="table-responsive">
        <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
            <tr style="background-color: #33cccc; color: white; font-weight: bold;">
                <td>Pendapatan Asli Daerah (PAD)</td>
                <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['pad']); ?></td>
                <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['pad'],$struktur_anggaran_provinsi['pendapatan'],1); ?> %</td>
            </tr>
            <tr style="background-color: #33cc33; color: white; font-weight: bold;">
                <td>Pendapatan Transfer</td>
                <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['transfer']); ?></td>
                <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['transfer'],$struktur_anggaran_provinsi['pendapatan'],1); ?> %</td>
            </tr>
            <tr style="background-color: #b38600; color: white; font-weight: bold;">
                <td>Lain Lain Pendapatan Daerah yang Sah</td>
                <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['pad_lain']); ?></td>
                <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['pad_lain'],$struktur_anggaran_provinsi['pendapatan'],1); ?> %</td>
            </tr>
            <tr style="background-color: #c0c0c0; color: white; font-weight: bold;">
                <td>Anggaran Pendapatan</td>
                <td class="text-right" colspan="2"><?= "Rp " . format_angka($struktur_anggaran_provinsi['pendapatan']); ?></td>
            </tr>
        </table>
    </div>