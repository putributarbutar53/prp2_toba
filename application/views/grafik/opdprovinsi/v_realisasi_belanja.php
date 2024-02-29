<div class="card-body bg-primary">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Anggaran Belanja Pada <?=$nama_skpd_tampil?></h2>
        <div class="row">
            <div class="col-lg-5 col-12">
                <div id="alokasi-belanja" style="width:100%; height: 450px;"></div>
            </div>
            <div class="col-lg-7 col-12">
                <div id="grafik-realisasi-belanja" style="width:100%; height: 450px;"></div>
            </div>
        </div>
        <br>
        
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="table-responsive">
                    <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
                        <tr height="58" style="background-color: #FCFFC5; font-size: 20px; font-weight: bold;">
                            <td  colspan="5">Anggaran Belanja Pada <?=$nama_skpd_tampil?> : <?= "Rp " . format_angka($anggaran_belanja); ?></td></td>
                        </tr>
                        <tr height="58" style="background-color: #04756f; color: white; font-size: 20px; font-weight: bold;">
                            <td>Jenis Belanja</td>
                            <td class="text-center">Alokasi</td>
                            <td class="text-center">Realisasi</td>
                            <td class="text-center">Persen</td>
                        </tr>
                        <tr height="58" style="background-color: #ff8b00; color: white; font-size: 20px; font-weight: bold;">
                            <td>Belanja Operasi</td>
                            <td class="text-right"><?= "Rp " . format_angka($realisasi['operasi']); ?></td>
                            <td class="text-right"><?= "Rp " . format_angka($belanja_operasi_terakhir); ?></td>
                            <td class="text-right"><?= $persen_belanja_operasi_terakhir; ?>%</td>
                        </tr>
                        <tr height="58" style="background-color: #ff2d00; color: white; font-size: 20px; font-weight: bold;">
                            <td>Belanja Modal</td>
                            <td class="text-right"><?= "Rp " . format_angka($realisasi['modal']); ?></td>
                            <td class="text-right"><?= "Rp " . format_angka($belanja_modal_terakhir); ?></td>
                            <td class="text-right"><?= $persen_belanja_modal_terakhir; ?>%</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card card-secondary bg-secondary-gradient">
                    <div class="card-body">
                        <h2 class="mb-1 fw-bold">
                                    <?=$nama_skpd_tampil?> 
                                </h2>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                
                                <h4 class="mb-1 fw-bold">
                                    <br>Anggaran Belanja :
                                    <?= "Rp " . format_rupiah($anggaran_belanja); ?>
                                    <br> <br>Realisasi Belanja : 
                                    <?= "Rp " . format_rupiah($belanja_terakhir); ?>
                                </h4>
                                <br>
                                <h2 class="mb-1 fw-bold">
                                     Persen : <?=$persen_belanja_terakhir?> %
                                </h2>
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