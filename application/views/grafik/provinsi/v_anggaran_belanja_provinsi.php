<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Anggaran Belanja Pada APBD <?=$nama_kabupaten?></h2>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div id="alokasi-belanja-provinsi" style="width:100%; height: 400px;"></div>
            </div>
            <div class="col-lg-6 col-12">
                <div id="realisasi-belanja" style="width:100%; height: 400px;"></div>
            </div>
        </div>
        <br>
        
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="table-responsive">
                    <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
                        <tr height="33" style="background-color: #FCFFC5; font-weight: bold;">
                            <td  colspan="4">Tabel Alokasi Anggaran Belanja Pada APBD <?=$nama_kabupaten?></td>
                        </tr>
                        <tr height="33" style="background-color: #ff8b00; color: white; font-weight: bold;">
                            <td>Belanja Operasi</td>
                            <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['operasi']); ?></td>
                            <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['operasi'],$struktur_anggaran_provinsi['belanja'],2); ?> %</td>
                        </tr>
                        <tr height="33" style="background-color: #ff2d00; color: white; font-weight: bold;">
                            <td>Belanja Modal</td>
                            <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['modal']); ?></td>
                            <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['modal'],$struktur_anggaran_provinsi['belanja'],2); ?> %</td>
                        </tr>
                        <tr height="33" style="background-color: #04756f; color: white; font-weight: bold;">
                            <td>Belanja Tak Terduga</td>
                            <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['takterduga']); ?></td>
                            <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['takterduga'],$struktur_anggaran_provinsi['belanja'],2); ?> %</td>
                        </tr>
                        <tr height="33" style="background-color: #05518d; color: white; font-weight: bold;">
                            <td>Belanja Transfer</td>
                            <td class="text-right"><?= "Rp " . format_angka($struktur_anggaran_provinsi['beltransfer']); ?></td>
                            <td class="text-right"><?= hitung_persen($struktur_anggaran_provinsi['beltransfer'],$struktur_anggaran_provinsi['belanja'],2); ?> %</td>
                        </tr>
                        <tr height="33" style="background-color: #FCFFC5; font-weight: bold;">
                            <td  colspan="4">Anggaran Belanja Pada APBD <?=$nama_kabupaten?> <?= "Rp " . format_angka($struktur_anggaran_provinsi['belanja']); ?> </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <div class="card card-info bg-info-gradient">
					<div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <h4 class="mb-1 fw-bold">Realisasi Belanja
                                    <br><?=$nama_kabupaten?>
                                    <br>Per Tanggal <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?>
                                    <br><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_belanja_terakhir']); ?>
                                    <br><br>Persen : <?= hitung_persen($realisasi_apbd_provinsi['real_belanja_terakhir'],$struktur_anggaran_provinsi['belanja_setting'],2); ?> %
                                </h4>
                            </div>
                            <div class="col-lg-6 col-12">
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
