<div class="card-body bg-secondary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"><i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i>Anggaran Pendapatan Pada APBD Kabupaten/Kota Se Provinsi Sumatera Utara : <?= "Rp " . format_angka($row_pendapatan['pendapatan']); ?></h2>
        <div class="row">
            <div class="col-lg-8 col-12">
                <div id="struktur-anggaran" style="width:100%; height: 360px;"></div>
            </div>
            <div class="col-lg-4 col-12">
                <div id="alokasi-pendapatan" style="width:100%; height: 360px;"></div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-7 col-12">
            <div id="realisasi-pendapatan" style="width:100%; height: 427px;"></div>
        </div>
        <div class="col-lg-5 col-12">
        <div class="table-responsive">
                <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
                    <tr style="background-color: #FCFFC5; font-weight: bold;">
                        <td  colspan="4">Tabel Alokasi Anggaran Pendapatan Pada APBD Kabupaten/Kota</td>
                    </tr>
                    <tr style="background-color: #33cccc; color: white; font-weight: bold;">
                        <td  colspan="2">Pendapatan Asli daerah (PAD)</td>
                        <td class="text-right"><?= "Rp " . format_angka($row_pendapatan['pad']); ?></td>
                        <td class="text-right"><?= hitung_persen($row_pendapatan['pad'],$row_pendapatan['pendapatan'],1); ?> %</td>
                    </tr>
                    <tr style="background-color: #33cc33; color: white; font-weight: bold;">
                        <td>Transfer</td>
                        <td>Dana Bagi Hasil (DBH)</td>
                        <td class="text-right"><?= "Rp " . format_angka($row_pendapatan['dbh']); ?></td>
                        <td class="text-right"><?= hitung_persen($row_pendapatan['dbh'],$row_pendapatan['pendapatan'],1); ?> %</td>
                    </tr>
                    <tr style="background-color: #14ad14; color: white; font-weight: bold;">
                        <td>Transfer</td>
                        <td>Dana Alokasi Umum (DAU)</td>
                        <td class="text-right"><?= "Rp " . format_angka($row_pendapatan['dau']); ?></td>
                        <td class="text-right"><?= hitung_persen($row_pendapatan['dau'],$row_pendapatan['pendapatan'],1); ?> %</td>
                    </tr>
                    <tr style="background-color: #008d00; color: white; font-weight: bold;">
                        <td>Transfer</td>
                        <td>Dana Alokasi Khusus (DAK) Fisik</td>
                        <td class="text-right"><?= "Rp " . format_angka($row_pendapatan['dakfisik']); ?></td>
                        <td class="text-right"><?= hitung_persen($row_pendapatan['dakfisik'],$row_pendapatan['pendapatan'],1); ?> %</td>
                    </tr>
                    <tr style="background-color: #006d00; color: white; font-weight: bold;">
                        <td>Transfer</td>
                        <td>Dana Alokasi Khusus (DAK) Non Fisik</td>
                        <td class="text-right"><?= "Rp " . format_angka($row_pendapatan['daknon']); ?></td>
                        <td class="text-right"><?= hitung_persen($row_pendapatan['daknon'],$row_pendapatan['pendapatan'],1); ?> %</td>
                    </tr>
                    <tr style="background-color: #035005; color: white; font-weight: bold;">
                        <td>Transfer</td>
                        <td>Dana Insentif Daerah (DID)</td>
                        <td class="text-right"><?= "Rp " . format_angka($row_pendapatan['did']); ?></td>
                        <td class="text-right"><?= hitung_persen($row_pendapatan['did'],$row_pendapatan['pendapatan'],1); ?> %</td>
                    </tr>
                    <tr style="background-color: #034004; color: white; font-weight: bold;">
                        <td>Transfer</td>
                        <td>Dana Desa</td>
                        <td class="text-right"><?= "Rp " . format_angka($row_pendapatan['desa']); ?></td>
                        <td class="text-right"><?= hitung_persen($row_pendapatan['desa'],$row_pendapatan['pendapatan'],1); ?> %</td>
                    </tr>
                    <tr style="background-color: #b38600; color: white; font-weight: bold;">
                        <td colspan="2">Lain Lain Pendapatan Daerah yang Sah</td>
                        <td class="text-right"><?= "Rp " . format_angka($row_pendapatan['pd_lain']); ?></td>
                        <td class="text-right"><?= hitung_persen($row_pendapatan['pd_lain'],$row_pendapatan['pendapatan'],1); ?> %</td>
                    </tr>
                </table>
            </div>
            <br>
            <div class="card card-info bg-info-gradient">
				<div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h4 class="mb-1 fw-bold">Realisasi Pendapatan
                                <br>Kabupaten/Kota
                                <br>Per  <?=bulan($bulan_data)?> <?=$tahun_data?>
                                <br><?= "Rp " . format_angka($pendapatan_terakhir); ?>
                                <br><br>Persen : <?= hitung_persen($pendapatan_terakhir,$row_pendapatan['pendapatan'],1); ?> %
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