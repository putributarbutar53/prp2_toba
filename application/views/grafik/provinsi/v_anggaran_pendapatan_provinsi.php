<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i> Anggaran Pendapatan Pada APBD <?=$nama_kabupaten?></h2>
        <div class="row">
            <div class="col-lg-8 col-12">
                <div id="struktur-anggaran-provinsi" style="width:100%; height: 350px;"></div>
            </div>
            <div class="col-lg-4 col-12">
                <div id="alokasi-pendapatan-provinsi" style="width:100%; height: 350px;"></div>
            </div>
        </div>
    </div>
    <br>
    
    <div class="row">
        <div class="col-lg-6 col-12">
            <div id="realisasi-pendapatan" style="width:100%; height: 382px;"></div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="table-responsive">
                <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
                    <tr style="background-color: #FCFFC5; font-weight: bold;">
                        <td  colspan="4">Tabel Alokasi Anggaran Pendapatan Pada APBD <?=$nama_kabupaten?></td>
                    </tr>
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
            <br>
            <div class="card card-info bg-info-gradient">
				<div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h4 class="mb-1 fw-bold">Realisasi Pendapatan
                                <br><?=$nama_kabupaten?>
                                <br>Per Tanggal <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?>
                                <br><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_pendapatan_terakhir']); ?>
                                <br><br>Persen : <?= hitung_persen($realisasi_apbd_provinsi['real_pendapatan_terakhir'],$struktur_anggaran_provinsi['pendapatan_setting'],2); ?> %
                            </h4>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-1"></div>
                            </div>
                        </div>
				    </div>
				</div>
			</div>
        </div>
    </div>
</div>