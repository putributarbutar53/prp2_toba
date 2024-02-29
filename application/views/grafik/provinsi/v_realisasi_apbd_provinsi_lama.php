<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i> Realisasi APBD <?=$nama_kabupaten?></h2>
        <div id="realisasi-apbd-provinsi" style="width:100%; height: 500px;"></div>
    </div>
    <div class="table-responsive">
        <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
            <tr style="background-color: #0f5dc1; color: white; font-weight: bold;">
                <td colspan="2">Realisasi APBD Provinsi Periode 1 Januari s.d <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?></td>
                <td class="text-right"><a href="<?= site_url('dashboard-realisasi-apbd') ?>" class="btn btn-danger btn-round btn-sm"><i class="fa fa-search"></i> Detail</a>       
                </td>
            </tr>
            <tr style="background-color: #04756f; color: white; font-weight: bold;">
                <td>Realisasi Pendapatan</td>
                <td class="text-right"><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_pendapatan_terakhir']); ?></td>
                <td class="text-right"><?= hitung_persen($realisasi_apbd_provinsi['real_pendapatan_terakhir'],$realisasi_apbd_provinsi['pendapatan'],2); ?> %</td>
            </tr>
            <tr style="background-color: #ff8b00; color: white; font-weight: bold;">
                <td>Realisasi Belanja</td>
                <td class="text-right"><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_belanja_terakhir']); ?></td>
                <td class="text-right"><?= hitung_persen($realisasi_apbd_provinsi['real_belanja_terakhir'],$realisasi_apbd_provinsi['belanja'],2); ?> %</td>
            </tr>
        </table>
    </div>
</div> 
