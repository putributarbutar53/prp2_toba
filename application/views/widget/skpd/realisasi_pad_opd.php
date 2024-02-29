<?php if($anggaran_pendapatan!=0) { ?>
<div class="card-body bg-primary">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i> Anggaran Pendapatan Pada <?=$row_skpd['nama_skpd']?></h2>
        <div class="row">
            <div class="col-lg-7 col-12">
                <div id="grafik-realisasi" style="width:100%; height: 450px;"></div>
            </div>
            <div class="col-lg-5 col-12">
                <div class="card card-secondary bg-secondary-gradient">
					<div class="card-body">
						<h4 class="mb-1 fw-bold">
                            Anggaran Pendapatan : <?= "Rp " . format_angka($anggaran_pendapatan)?>
                            <br> Target Pendapatan Asli Daerah (PAD) : <?= "Rp " . format_angka($anggaran_pad)?>
                            <br> Realisasi Pendapatan Asli Daerah (PAD) : <?= "Rp " . format_angka($realisasi_pad)?>
                            <br> Persen Realisasi PAD : <?=$persen_realisasi_pad?> %
                        </h4>
						<div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-1"></div>
							<h6 class="fw-bold mt-3 mb-0"> </h6>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div> 
</div> 
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
            var barchart1 = new Highcharts.Chart({
                chart: {
                    backgroundColor: '#FCFFC5',
                    renderTo: 'grafik-realisasi',
                    type: 'column'
                },
                colors: ['#04756f', '#ff8b00', '#b38600', '#e60000', '#0033cc', '#e6e600'],
                title: {
                    text: 'Realisasi Pendapatan Asli Daerah (PAD) oleh  <?=$row_skpd['nama_skpd']?>'
                },
                subtitle: {
                    text: 'Periode 1 Januari s.d <?=$periode?>'
                },
                xAxis: {
                categories: [<?=$nama_bulan?>]
                },
                yAxis: { 
                    gridLineColor: '#197F07',
                title: {
                    text: 'Rupiah'
                },
                labels: {
                    formatter: function() {
                        var ret,
                            numericSymbols = ['Rb', 'Jt', 'M', 'T'],
                            i = numericSymbols.length;
                        if (this.value >= 1000) {
                            while (i-- && ret === undefined) {
                                multi = Math.pow(1000, i + 1);
                                if (this.value >= multi && numericSymbols[i] !== null) {
                                    ret = (this.value / multi) + numericSymbols[i];
                                }
                            }
                        }
                        return (ret ? ret : Math.abs(this.value));
                    }
                }
                    },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: true
                    }
                },
                plotOptions: {
                    column: {
                        depth: 25
                    }
                },
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                plotOptions: {
                series: {
                    colorByPoint: true,
                    dataLabels: {
                        enabled: true
                    }
                }
                },
                exporting: { enabled: false },
                series: [{
                    type: 'column',
                    name: 'Realisasi Pendapatan',
                    data: [<?=$arr_pendapatan_pad?>]
                }, {
                    type: 'spline',
                    name: 'Target',
                    data: [<?=$arr_target_pad?>],
                    lineColor: '#e60000',
                    lineWidth:5
                }]
            }); 


    });
    Circles.create({
            id:'circles-1',
			radius:150,
			value:<?=round($persen_realisasi_pad,1)?>,
			maxValue:100,
			width:40,
			text: <?=round($persen_realisasi_pad,1)?>,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
</script>