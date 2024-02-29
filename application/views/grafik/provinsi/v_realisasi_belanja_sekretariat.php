<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Serapan Anggaran Sekretariat Daerah <?=$nama_kabupaten?></h2>
        <div class="row">
            <div class="col-lg-9 col-12">
                <div id="realisasi-belanja-sekre" style="width:100%; height: 443px;"></div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="card card-info bg-info-gradient">
					<div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <h2 class="mb-1 fw-bold">Serapan Anggaran <br>Sekretariat Daerah</h4>
                                <h4 class="mb-1 fw-bold">Anggaran : 
                                    <?= "Rp " . format_angka($realisasi_pb_provinsi['pagu_belanja_asekre']); ?>
                                    <br><br>Realisasi :  
                                    <?= "Rp " . format_angka($realisasi_pb_provinsi['realisasi_belanja_asekre']); ?>
                                    <br>Persen : <?= hitung_persen($realisasi_pb_provinsi['realisasi_belanja_asekre'],$realisasi_pb_provinsi['pagu_belanja_asekre'],1); ?> %
                                </h4>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-11"></div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-12">
            <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i> Persentase Serapan Anggaran Sekretariat Daerah <?=$nama_kabupaten?></h2>
                <div id="realisasi-belanja-sekretariat" style="width:100%; height: 500px;"></div>
            </div>
        </div>
    </div>  
</div>