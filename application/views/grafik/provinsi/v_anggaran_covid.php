<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Belanja Pencegahan dan Penanggulangan Covid-19 Pada APBD <?=$nama_kabupaten?></h2>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div id="alokasi-covid" style="width:100%; height: 400px;"></div>
            </div>
            <div class="col-lg-6 col-12">
                <div id="realisasi-covid" style="width:100%; height: 400px;"></div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="table-responsive">
                    <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
                        <tr style="background-color: #FCFFC5; font-weight: bold;">
                            <td height="40"  colspan="5">Tabel Alokasi Anggaran Belanja Pencegahan dan Penanggulangan Covid-19</td>
                        </tr>
                        <tr style="background-color: #0033cc; color: white; font-weight: bold;">
                            <th height="40">Bidang</th>
                            <th class="text-center">Anggaran</th>
                            <td class="text-center">Realisasi</td>
                            <th class="text-center">Persen</th>
                        </tr>
                        <tr style="background-color: #ff8b00; color: white; font-weight: bold;">
                            <td height="40">Bidang Kesehatan</td>
                            <td class="text-right"><?= "Rp " . format_angka(224461020336); ?></td>
                            <td class="text-right"><?= "Rp " . format_angka(201262639802); ?></td>
                            <td class="text-right"><?= hitung_persen(201262639802,224461020336,2); ?> %</td>
                        </tr>
                        <tr style="background-color: #ff2d00; color: white; font-weight: bold;">
                            <td height="40">Dukungan Ekonomi</td>
                            <td class="text-right"><?= "Rp " . format_angka(14974351247); ?></td>
                            <td class="text-right"><?= "Rp " . format_angka(14321990100); ?></td>
                            <td class="text-right"><?= hitung_persen(14321990100,14974351247,2); ?> %</td>
                        </tr>
                        <tr style="background-color: #04756f; color: white; font-weight: bold;">
                            <td height="40">Jaringan Pengaman Sosial</td>
                            <td class="text-right"><?= "Rp " . format_angka(124563823674); ?></td>
                            <td class="text-right"><?= "Rp " . format_angka(109096249710); ?></td>
                            <td class="text-right"><?= hitung_persen(109096249710,124563823674,2); ?> %</td>
                        </tr>
                        <tr style="background-color: #FCFFC5; font-weight: bold;">
                            <td  height="40" colspan="5">Alokasi Anggaran Belanja Pencegahan dan Penanggulangan Covid-19 <?= "Rp " . format_angka(363999195257); ?> </td>
                        </tr>
                    </table>
                </div>
            </div>

            
            <div class="col-lg-6 col-12">
                <div class="card card-info bg-info-gradient">
					<div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <h4 class="mb-1 fw-bold">Anggaran Belanja
                                    <br>Pencegahan dan Penanggulangan Covid-19
                                    <br>Pada <?=$nama_kabupaten?>
                                    <br><?= "Rp " . format_angka(363999195257); ?>
                                    <br><br>Realisasi 
                                    <br><?= "Rp " . format_angka(324680879612); ?>
                                    <br>Persen : <?= hitung_persen(324680879612,363999195257,1); ?> %
                                </h4>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-3"></div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
            </div>

        </div>
    </div>
</div> 
