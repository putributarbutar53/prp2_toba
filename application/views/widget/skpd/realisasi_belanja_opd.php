<div class="card-body bg-primary">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i> Anggaran Belanja Pada <?=$row_skpd['nama_skpd']?></h2>
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
            <div class="col-lg-7 col-12">
                <div class="table-responsive">
                    <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
                        <tr height="58" style="background-color: #FCFFC5; font-size: 20px; font-weight: bold;">
                            <td  colspan="5">Anggaran Belanja : <?= "Rp " . format_angka($anggaran_belanja); ?></td></td>
                        </tr>
                        <tr height="58" style="background-color: #04756f; color: white; font-size: 20px; font-weight: bold;">
                            <td>Jenis Belanja</td>
                            <td class="text-center">Alokasi</td>
                            <td class="text-center">Realisasi</td>
                            <td class="text-center">Persen</td>
                        </tr>
                        <tr height="58" style="background-color: #ff8b00; color: white; font-size: 20px; font-weight: bold;">
                            <td>Belanja Operasi</td>
                            <td class="text-right"><?= "Rp " . format_angka($belanja_operasi); ?></td>
                            <td class="text-right"><?= "Rp " . format_angka($realisasi_operasi); ?></td>
                            <td class="text-right"><?= $persen_realisasi_operasi; ?>%</td>
                        </tr>
                        <tr height="58" style="background-color: #ff2d00; color: white; font-size: 20px; font-weight: bold;">
                            <td>Belanja Modal</td>
                            <td class="text-right"><?= "Rp " . format_angka($belanja_modal); ?></td>
                            <td class="text-right"><?= "Rp " . format_angka($realisasi_modal); ?></td>
                            <td class="text-right"><?= $persen_realisasi_modal; ?>%</td>
                        </tr>
                        <?php $radius=97;  if($belanja_takterduga!=0) {  $radius=115;?>
                            <tr height="58" style="background-color: #b38600; color: white; font-size: 20px; font-weight: bold;">
                                <td>Belanja Tak Terduga</td>
                                <td class="text-right"><?= "Rp " . format_angka($belanja_takterduga); ?></td>
                                <td class="text-right"><?= "Rp " . format_angka($realisasi_takterduga); ?></td>
                                <td class="text-right"><?= $persen_realisasi_takterduga; ?>%</td>
                            </tr>
                        <?php } ?>
                        <?php if($belanja_transfer!=0) { $radius=115; ?>
                            <tr height="58" style="background-color: #00b3b3; color: white; font-size: 20px; font-weight: bold;">
                                <td>Belanja Transfer</td>
                                <td class="text-right"><?= "Rp " . format_angka($belanja_transfer); ?></td>
                                <td class="text-right"><?= "Rp " . format_angka($realisasi_transfer); ?></td>
                                <td class="text-right"><?= $persen_realisasi_transfer; ?>%</td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>
            <div class="col-lg-5 col-12">
                <div class="card card-secondary bg-secondary-gradient">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <h4 class="mb-1 fw-bold">
                                    Anggaran Belanja :
                                     <br><?= "Rp " . format_rupiah($anggaran_belanja); ?>
                                     <br><br>Realisasi : 
                                     <br><?= "Rp " . format_rupiah($realisasi_belanja); ?>
                                </h4>
                                <br>
                                <h2 class="mb-1 fw-bold">
                                     Persen : <?=$persen_realisasi_belanja?> %
                                </h2>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                <?php if($belanja_transfer!=0) { ?>
                                    <br><br><br>
                                <?php } ?>
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

<script type="text/javascript">
    Circles.create({
            id:'circles-2',
			radius:<?=$radius?>,
			value:<?=round($persen_realisasi_belanja,1)?>,
			maxValue:100,
			width:30,
			text: <?=round($persen_realisasi_belanja,1)?>,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

        $(document).ready(function() {
        var chartpie = new Highcharts.Chart({
            chart: {
                backgroundColor: '#d2e4da',
                renderTo: 'alokasi-belanja',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            colors: ['#ff8b00', '#e60000', '#b38600', '#00b3b3'],
            title: {
                text: 'Anggaran Belanja'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y} %</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    },
                    showInLegend: true
                }
            },
            credits: {
                enabled: false
            },
                exporting: { enabled: false },
            series: [{
                name: 'Persentase',
                colorByPoint: true,
                data: [{
                    name: 'Belanja Operasi',
                    y: <?= $persen_operasi ?>,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Belanja Modal',
                    y: <?= $persen_modal ?>
                }
                <?php if($belanja_takterduga!=0) { ?>
                    , {
                    name: 'Belanja Tak Terduga',
                    y: <?= $persen_takterduga ?>
                }
                <?php } ?>
                <?php if($belanja_transfer!=0) { ?>
                    , {
                    name: 'Belanja Transfer',
                    y: <?= $persen_beltransfer ?>
                }
                <?php } ?>
                ]
            }]
        });
        
    });

    $(document).ready(function() {
    var barchart1 = new Highcharts.Chart({
        chart: {
            backgroundColor: '#FCFFC5',
            renderTo: 'grafik-realisasi-belanja',
            type: 'column'
        },
        colors: ['#04756f', '#ff8b00', '#b38600', '#e60000', '#0033cc', '#e6e600'],
        title: {
            text: 'Realisasi Belanja Pada APBD  <?=$row_skpd['nama_skpd']?>'
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
            name: 'Realisasi Belanja',
            data: [<?=$arr_belanja?>]
        }]
    }); 


    });
</script>