<?php $this->load->view("_partial/header"); ?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/sunburst.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/sankey.js"></script>
<script src="https://code.highcharts.com/modules/organization.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white pb-3 fw-bold">Selamat Datang <?= $users['username']; ?></h3>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-12"><div class="card-body bg-primary-gradient">
                    <div class="inner">
                        <h2 style="color: white; font-weight: bold;">
                            Anggaran Pendapatan : <br><?= "Rp " . format_angka($struktur_anggaran_provinsi['pendapatan']); ?>
                            <br>Belanja : <?= "Rp " . format_angka($struktur_anggaran_provinsi['belanja']); ?>
                         </h2>
                        <div style="width:100%; height: 100%;"></div>
                    </div>
                    <table class="table table-hover">
                    </table>   
                    <center><a href="<?= site_url('dashboard-apbd-provinsi') ?>" class="btn btn-danger btn-round btn-lg"><i class="fa fa-search"></i> Alokasi APBD Provinsi</a></center>          
                    </div> 
                </div>
                
				
                <div class="col-lg-4 col-12"><div class="card-body bg-secondary-gradient">
                    <div class="inner">
                        <h2 style="color: white; font-weight: bold;">
                        Realisasi Pendapatan : <br><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_pendapatan_terakhir']); ?>
                        <br><?= hitung_persen($realisasi_apbd_provinsi['real_pendapatan_terakhir'],$realisasi_apbd_provinsi['pendapatan'],2); ?> %
                    </h2>
                        <div style="width:100%; height: 100%;"></div>
                    </div>
                    <table class="table table-hover">
                    </table>   
                    <center><a href="<?= site_url('dashboard-realisasi-pendapatan') ?>" class="btn btn-danger btn-round btn-lg"><i class="fa fa-search"></i> Realisasi Pendapatan Provinsi</a></center>          
                    </div> 
                </div>
                <div class="col-lg-4 col-12"><div class="card-body bg-info-gradient">
                    <div class="inner">
                        <h2 style="color: white; font-weight: bold;">
                        Realisasi Balanja : <br><?= "Rp " . format_angka($realisasi_apbd_provinsi['real_belanja_terakhir']); ?>
                        <br><?= hitung_persen($realisasi_apbd_provinsi['real_belanja_terakhir'],$realisasi_apbd_provinsi['pendapatan'],2); ?> %
                    </h2>
                        <div style="width:100%; height: 100%;"></div>
                    </div>
                    <table class="table table-hover">
                    </table>   
                    <center><a href="<?= site_url('dashboard-realisasi-belanja') ?>" class="btn btn-danger btn-round btn-lg"><i class="fa fa-search"></i> Realisasi Belanja Provinsi</a></center>          
                    </div> 
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php $this->load->view('grafik/provinsi/v_realisasi_apbd_provinsi'); ?>   
                    <center><a href="<?= site_url('dashboard-realisasi-apbd') ?>" class="btn btn-danger btn-round btn-lg"><i class="fa fa-search"></i> Detail Realisasi APBD Provinsi Sumatera Utara</a></center>        
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
        <div class="col-lg-4">
            <a href="<?= site_url('backend/banner'); ?>">
            <div class="card card-dark bg-primary-gradient">
								<div class="card-body pb-0">
									<div class="h1 fw-bold float-right">+5%</div>
									<h2 class="mb-2">17</h2>
									<p>Users online</p>
									<div class="pull-in sparkline-fix chart-as-background">
										<div id="lineChart"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
									</div>
								</div>
							</div>
            </a>
        </div>

        <div class="col-lg-4">
            <a href="<?= site_url('backend/banner'); ?>">
            <div class="card card-secondary">
								<div class="card-header">
									<div class="card-title">Daily Sales</div>
									<div class="card-category">March 25 - April 02</div>
								</div>
								<div class="card-body pb-0">
									<div class="mb-4 mt-2">
										<h1>$4,578.58</h1>
									</div>
									<div class="pull-in">
										<canvas id="dailySalesChart"></canvas>
									</div>
								</div>
							</div>
							<div class="card card-primary bg-primary-gradient">
								<div class="card-body">
									<h4 class="mb-1 fw-bold">Tasks Progress</h4>
									<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">New Users</h6>
										</div>
								</div>
							</div>
            </a>
        </div>
        <div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Overall statistics</div>
									<div class="card-category">Daily information about statistics in system</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">New Users</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Sales</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">Subscribers</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
</div>

<?php $this->load->view('_partial/footer'); ?>
<?php $this->load->view('grafik/provinsi/js_realisasi_apbd_provinsi'); ?>


<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5.56,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>

<?php $this->load->view('_partial/tag_close'); ?>