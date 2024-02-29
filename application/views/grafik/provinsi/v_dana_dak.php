<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Realisasi Dana Alokasi Khusus (DAK) <?=$nama_kabupaten?></h2>
        <div class="row">
            <div class="col-lg-8 col-12">
                <div id="realisasi-dana-dak1" style="width:100%; height: 410px;"></div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card card-info bg-info-gradient">
					<div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <h2 class="mb-1 fw-bold">Dana Alokasi Khusus (DAK)</h4>
                                <h4 class="mb-1 fw-bold">Anggaran : 
                                    <?= "Rp " . format_angka($realisasi_pb_provinsi['dak_pagu_total']); ?>
                                    <br>Realisasi Per <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?> :  
                                    <?= "<br>Rp " . format_angka($realisasi_pb_provinsi['dak_real_total']); ?>
                                    <br>Persen : <?= hitung_persen($realisasi_pb_provinsi['dak_real_total'],$realisasi_pb_provinsi['dak_pagu_total'],1); ?> %
                                </h4>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-7"></div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
            </div>
        </div>
        <br>
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Persentase Realisasi Dana Alokasi Khusus (DAK) <?=$nama_kabupaten?></h2>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div id="realisasi-dana-dak1-persen" style="width:100%; height: 500px;"></div>
            </div>
        </div>
    </div>
</div> 
