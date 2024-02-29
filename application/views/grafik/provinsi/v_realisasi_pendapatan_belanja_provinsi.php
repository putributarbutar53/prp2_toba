<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Pendapatan Asli Daerah (PAD) oleh OPD <?=$nama_kabupaten?></h2>
        
        <div class="row">
            <div class="col-lg-6 col-12">
                <div id="target-pad-provinsi" style="width:100%; height: 1000px;"></div>
            </div>
            <div class="col-lg-6 col-12">
                <div id="realisasi-pendapatan-provinsi" style="width:100%; height: 1000px;"></div>
            </div>
        </div>
        <!-- <br>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div id="realisasi-pad-provinsi" style="width:100%; height: 500px;"></div>
            </div>
        </div> -->
        <!-- <br>
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i> Persentase Target dan Realisasi Pendapatan Asli Daerah PAD oleh OPD <?=$nama_kabupaten?></h2>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div id="target-realisasi-pad-provinsi" style="width:100%; height: 700px;"></div>
            </div>
        </div> -->
        <br>
        <br>
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Realisasi Belanja oleh OPD <?=$nama_kabupaten?></h2>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div id="realisasi-belanja-provinsi" style="width:100%; height: 1000px;"></div>
            </div>
        </div>
        <?php if($tahun_data!=2021){ ?>
            <br>
            <br>
            <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Serapan Belanja oleh OPD <?=$nama_kabupaten?></h2>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div id="serapan-belanja-provinsi" style="width:100%; height: 1000px;"></div>
                </div>
            </div>
        <?php  } ?>
        <br>
       
        <!-- <br>
        <div class="row">
            <div class="col-lg-6 col-12">
                <a href="<?= site_url('pendapatan-opd-provinsi') ?>">
                    <div class="card card-warning bg-warning-gradient">
                        <div class="card-body">
                            <h4 class="mb-1 fw-bold">
                                <center>Lihat Detail Realisasi Pendapatan OPD</center>
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-12">
                <a href="<?= site_url('belanja-opd-provinsi') ?>">
                    <div class="card card-info bg-info-gradient">
                        <div class="card-body">
                            <h4 class="mb-1 fw-bold">
                                <center>Lihat Detail Realisasi Belanja OPD</center>
                            </h4>
                        </div>
                    </div>
                </a>
            </div>

        </div> -->

    </div>
</div>