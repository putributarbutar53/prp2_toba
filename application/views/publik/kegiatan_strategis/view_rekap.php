<fieldset class="scheduler-border">
    <legend class="scheduler-border">Rekapitulasi Data Kegiatan Fisik </legend>
    <div class="row">
        <div class="col-md-12">
            <div class="card-body bg-primary-gradient">
                <div class="inner">
                    <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i> Dana Kegiatan Fisik</h2>
                    <div class="row">
                        <div class="col-lg-9 col-12">
                            <div id="realisasi-dana" style="width:100%; height: 380px;"></div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="card card-info bg-info-gradient">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <h2 class="mb-1 fw-bold">Jumlah Kegiatan : <?=$jumlah_kegiatan?></h2>
                                            <h4 class="mb-1 fw-bold">Pagu/Kontrak : 
                                                <?= "<br>Rp " . format_angka($total_kontrak_all); ?>
                                                <br>Realisasi  Keuangan <br>Per  <?= $this->fungsi->nama_bulan($tanggal_data)?> :  
                                                <?= "<br>Rp " . format_angka($realisasi_total_all); ?>
                                                <br>Persen : <?= hitung_persen($realisasi_total_all,$total_kontrak_all,1); ?> %
                                            </h4>
                                            <div class="px-2 pb-2 pb-md-0 text-center">
                                                <div id="circles-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-12">
                            <div id="realisasi-persen" style="width:100%; height: 330px;"></div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="card card-info bg-info-gradient">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <h2 class="mb-1 fw-bold">Jumlah Kegiatan : <?=$jumlah_kegiatan?></h2>
                                            <h4 class="mb-1 fw-bold">
                                                <br>Realisasi  Fisik <br>Per <?= $this->fungsi->nama_bulan($tanggal_data)?> :  
                                                <br>Persen : <?=$persen_fisik_all?> %
                                            </h4>
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
            <br>
        </div>
    </div>
</fieldset>

<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                // backgroundColor: '#d2e4da',
                renderTo: 'realisasi-dana',
                type: 'column'
            },
            colors: ['#04756f', '#ff8b00', '#e6e600', '#333300'],
            title: {
                text: 'Realisasi Dana Kegiatan Fisik'
            },
            subtitle: {
                text: 'Periode 1 januari s.d  <?= $this->fungsi->nama_bulan($tanggal_data)?>'
            },
            xAxis: {
                // lineColor: '#000',
                categories: [<?= $nama_skpd ?>],
                labels: {
                    style: {
                        color: '#000000'
                    }
                }
            },
            yAxis: {
                gridLineColor: '#197F07',
                title: {
                    text: 'Rupiah'
                },
                type: 'logarithmic',
                minorTickInterval: 5000000,
                accessibility: {
                    rangeDescription: 'Range: 1000000 to 5000000000000'
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
                        return (ret ? ret : this.value);
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
                exporting: { enabled: false },
            series: [{
                    type: 'column',
                    name: 'Pagu/Kontrak',
                    data: [<?= $kontrak_skpd ?>]
                },{
                    type: 'column',
                    name: 'Realisasi',
                    data: [<?= $realisasi_skpd ?>]
                }]
        });

        barchart = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                // backgroundColor: '#d2e4da',
                renderTo: 'realisasi-persen',
                type: 'column'
            },
            colors: ['#e60000', '#0033cc', '#e6e600', '#333300'],
            title: {
                text: 'Persentase Realisasi Fisik Dan Keuangan'
            },
            subtitle: {
                text: 'Periode 1 januari s.d  <?= $this->fungsi->nama_bulan($tanggal_data)?>'
            },
            xAxis: {
                // lineColor: '#000',
                categories: [<?= $nama_skpd ?>],
                labels: {
                    style: {
                        color: '#000000'
                    }
                }
            },
            yAxis: {
                gridLineColor: '#197F07',
                title: {
                    text: 'Persen'
                },
                type: 'logarithmic',
                minorTickInterval: 5000000,
                accessibility: {
                    rangeDescription: 'Range: 1000000 to 5000000000000'
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
                        return (ret ? ret : this.value);
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
                exporting: { enabled: false },
            series: [{
                    type: 'column',
                    name: 'Realisasi Fisik',
                    data: [<?= $persen_fisik_skpd ?>]
                },{
                    type: 'column',
                    name: 'Realisasi Keuangan',
                    data: [<?= $persen_skpd ?>]
                }]
        });
    });

    Circles.create({
			id:'circles-1',
			radius:80,
			value:<?= hitung_persen($realisasi_total_all,$total_kontrak_all,1); ?>,
			maxValue:100,
			width:20,
			text: <?= hitung_persen($realisasi_total_all,$total_kontrak_all,1); ?>,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		});

        Circles.create({
			id:'circles-2',
			radius:80,
			value:<?=$persen_fisik_all?>,
			maxValue:100,
			width:20,
			text: <?=$persen_fisik_all?>,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
    
</script>
