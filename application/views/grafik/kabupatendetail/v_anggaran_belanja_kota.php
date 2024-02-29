<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"><i class="fa fa-chart-bar"></i>  ANGGARAN BELANJA PADA APBD  <?=$result_kabupaten_nama?> : <?= "Rp " . format_angka($row_belanja['belanja']); ?></h2>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div id="alokasi-belanja" style="width:100%; height: 300px;"></div>
            </div>
            <div class="col-lg-6 col-12">
                <div id="realisasi-belanja" style="width:100%; height: 300px;"></div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="table-responsive">
                    <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
                        <tr style="background-color: #FCFFC5; font-weight: bold;">
                            <td  colspan="4">Tabel Alokasi Anggaran Belanja Pada APBD  <?=$result_kabupaten_nama?></td>
                        </tr>
                        <tr style="background-color: #ff8b00; color: white; font-weight: bold;">
                            <td>Belanja Operasi</td>
                            <td class="text-right"><?= "Rp " . format_angka($row_belanja['operasi']); ?></td>
                            <td class="text-right"><?= hitung_persen($row_belanja['operasi'],$row_belanja['belanja'],2); ?> %</td>
                        </tr>
                        <tr style="background-color: #ff2d00; color: white; font-weight: bold;">
                            <td>Belanja Modal</td>
                            <td class="text-right"><?= "Rp " . format_angka($row_belanja['modal']); ?></td>
                            <td class="text-right"><?= hitung_persen($row_belanja['modal'],$row_belanja['belanja'],2); ?> %</td>
                        </tr>
                        <tr style="background-color: #04756f; color: white; font-weight: bold;">
                            <td>Belanja Tak Terduga</td>
                            <td class="text-right"><?= "Rp " . format_angka($row_belanja['takterduga']); ?></td>
                            <td class="text-right"><?= hitung_persen($row_belanja['takterduga'],$row_belanja['belanja'],2); ?> %</td>
                        </tr>
                        <tr style="background-color: #05518d; color: white; font-weight: bold;">
                            <td>Belanja Transfer</td>
                            <td class="text-right"><?= "Rp " . format_angka($row_belanja['beltransfer']); ?></td>
                            <td class="text-right"><?= hitung_persen($row_belanja['beltransfer'],$row_belanja['belanja'],2); ?> %</td>
                        </tr>
                        <tr style="background-color: #FCFFC5; font-weight: bold;">
                            <td  colspan="4">Alokasi Anggaran Belanja Pada APBD  <?=$result_kabupaten_nama?> <?= "Rp " . format_angka($row_belanja['belanja']); ?> </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <div class="card card-info bg-info-gradient">
					<div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <h4 class="mb-1 fw-bold">Realisasi Belanja <?=$result_kabupaten_nama?>
                                    <br>Per Tanggal <?= $this->fungsi->nama_bulan($tanggal_data)?>
                                    <br>Realisasi : <?= "Rp " . format_angka($belanja_terakhir); ?>
                                    <br>Persen : <?= hitung_persen($belanja_terakhir,$row_belanja['belanja'],1); ?> %
                                </h4>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-2"></div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
            </div>

        </div>
    </div>
</div> 
