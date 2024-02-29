<div class="card-body bg-primary">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Anggaran Pendapatan Pada <?=$nama_skpd_tampil?></h2>
        <div class="row">
            <div class="col-lg-7 col-12">
                <div id="grafik-realisasi" style="width:100%; height: 450px;"></div>
            </div>
            
            <div class="col-lg-5 col-12">
                <div class="card card-secondary bg-secondary-gradient">
					<div class="card-body">
						<h4 class="mb-1 fw-bold">
                            Anggaran Pendapatan : <?= "Rp " . format_angka($anggaran_pendapatan); ?>
                            <br> Target Pendapatan Asli Daerah (PAD) : <?= "Rp " . format_angka($anggaran_pendapatan_pad); ?>
                            <br> Realisasi Pendapatan Asli Daerah (PAD) : <?= "Rp " . format_angka($pendapatan_pad_terakhir); ?>
                            <br> Persen Realisasi PAD : <?=$persen_pendapatan_pad_terakhir?> %
                        </h4>
						<div class="px-2 pb-2 pb-md-0 text-center">
							<div id="circles-1"></div>
							<h6 class="fw-bold mt-3 mb-0"><?= "Rp " . format_angka($pendapatan_pad_terakhir); ?></h6>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div> 
</div> 