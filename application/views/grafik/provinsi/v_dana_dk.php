<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Dana Dekonsentrasi <?=$nama_kabupaten?></h2>
        <div class="row">
            <div class="col-lg-9 col-12">
                <div id="realisasi-dana-dk" style="width:100%; height: 410px;"></div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="card card-info bg-info-gradient">
					<div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <h2 class="mb-1 fw-bold">Dana Dekonsentrasi</h4>
                                <h4 class="mb-1 fw-bold">Pagu : 
                                    <?= "Rp " . format_angka($realisasi_pb_provinsi['dk_pagu_total']); ?>
                                    <br>Realisasi  Per  <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?> :  
                                    <?= "<br>Rp " . format_angka($realisasi_pb_provinsi['dk_real_total']); ?>
                                    <br>Persen : <?= hitung_persen($realisasi_pb_provinsi['dk_real_total'],$realisasi_pb_provinsi['dk_pagu_total'],1); ?> %
                                </h4>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-4"></div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
            </div>
        </div>
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Persentase Serapan Belanja Dana Dekonsentrasi <?=$nama_kabupaten?></h2>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div id="realisasi-dana-dk-persen" style="width:100%; height: 800px;"></div>
            </div>
        </div>
    </div>
</div> 
