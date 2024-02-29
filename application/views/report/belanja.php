<?php $this->load->view("_partial/header"); ?>
<script src="<?= base_url('assets/highphp/js/jquery.min.js'); ?>" type="text/javascript"></script>
<script src="https://code.highcharts.com/6.0.0/highcharts.js"></script>
<script src="https://code.highcharts.com/6.0.0/modules/sunburst.js"></script>
<script src="<?= base_url('assets/highphp/js/highcharts-3d.js'); ?>"></script>
<script src="<?= base_url('assets/highphp/js/exporting.js'); ?>"></script>
<!-- <script src="<?= base_url('assets/highphp/js/export-data.js'); ?>"></script>
<script src="<?= base_url('assets/highphp/js/accessibility.js'); ?>"></script> -->

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white pb-3 fw-bold">Realisasi Belanja pada APBD Provinsi Sumatera Utara</h3>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="card-body bg-info">
                        <div class="inner">
                            <h2 style="color: white; font-weight: bold;">Anggaran Belanja : <?= "Rp " . format_angka($realisasi['belanja']); ?></h2>
                            <div id="chart-pie" style="width:100%; height: 100%;"></div>
                        </div>
                        <table class="table table-hover">
                            <tr style="background-color: #999966; color: white; font-weight: bold;">
                                <td>Anggaran Belanja Operasi</td>
                                <td class="text-right"><?= "Rp " . format_angka($realisasi['operasi']); ?></td>
                                <td class="text-right"><?= $persen_operasi; ?>%</td>
                            </tr>
                            <tr style="background-color: #b37700; color: white; font-weight: bold;">
                                <td>Anggaran Belanja Modal</td>
                                <td class="text-right"><?= "Rp " . format_angka($realisasi['modal']); ?></td>
                                <td class="text-right"><?= $persen_modal; ?>%</td>
                            </tr>
                            <tr style="background-color: #00b3b3; color: white; font-weight: bold;">
                                <td>Anggaran Belanja Tak Terduga</td>
                                <td class="text-right"><?= "Rp " . format_angka($realisasi['takterduga']); ?></td>
                                <td class="text-right"><?= $persen_takterduga; ?>%</td>
                            </tr>
                            <tr style="background-color: #605ca8; color: white; font-weight: bold;">
                                <td>Total Anggaran Belanja</td>
                                <td class="text-right"><?= "Rp " . format_angka($realisasi['belanja']); ?></td>
                                <td class="text-right">100 %</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="card-body bg-info">
                        <div class="inner">
                            <h2 style="color: white; font-weight: bold;">Realisasi : <?= "Rp " . format_angka($realisasi['realisasi_belanja']); ?></h2>
                            <div id="grafik-realisasi" style="width:100%; height: 100%;"></div>
                        </div>
                        <table class="table table-hover">
                            <tr style="background-color: #999966; color: white; font-weight: bold;">
                                <td>Realisasi Belanja Operasi</td>
                                <td class="text-right"><?= "Rp " . format_angka($belanja_operasi_terakhir); ?></td>
                                <td class="text-right"><?= $persen_belanja_operasi_terakhir; ?>%</td>
                            </tr>
                            <tr style="background-color: #b37700; color: white; font-weight: bold;">
                                <td>Realisasi Belanja Modal</td>
                                <td class="text-right"><?= "Rp " . format_angka($belanja_modal_terakhir); ?></td>
                                <td class="text-right"><?= $persen_belanja_modal_terakhir; ?>%</td>
                            </tr>
                            <tr style="background-color: #00b3b3; color: white; font-weight: bold;">
                                <td>Realisasi Belanja Tak Terduga</td>
                                <td class="text-right"><?= "Rp " . format_angka($belanja_takterduga_terakhir); ?></td>
                                <td class="text-right"><?= $persen_belanja_takterduga_terakhir; ?>%</td>
                            </tr>
                            <tr style="background-color: #605ca8; color: white; font-weight: bold;">
                                <td>Realisasi Periode <?=$periode_pemko?></td>
                                <td class="text-right"><?= "Rp " . format_angka($realisasi['realisasi_belanja']); ?></td>
                                <td class="text-right"><?= $persen_realisasi_belanja; ?>%</td>
                            </tr>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<div class="page-inner mt--5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="card-body bg-info">
                        <div class="inner">
                            <div id="grafik-pendapatan" style="width:100%; height: 900px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="card-body bg-info">
                        <div class="inner">
                            <div id="grafik-belanja" style="width:100%; height: 900px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-12">
                <h3 style="font-weight: bold;">Top 10 Realisasi Belanja OPD periode <?=$periode_pemko?></h3>
                    <div class="preload" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                        <h5>Sedang memuat data...</h5>
                    </div>
                    <div id="display-content" style="display: none;">
                        <div class="table-responsive">
                            <table id="load-content" class="table-default" style="width: 100%;">
                                <thead>
                                    <tr style="background-color: #1572EB; color: white;">
                                        <th width="5px">NO</th>
                                        <th>NAMA OPD</th>
                                        <th>Anggaran</th>
                                        <th class="text-center">Realisasi Belanja</th>
                                        <th class="text-center">Persen</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                
                <div class="col-lg-6 col-12">
                <h3 style="font-weight: bold;">Terendah 10 Realisasi Belanja OPD periode <?=$periode_pemko?></h3>
                    <div class="preload" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                        <h5>Sedang memuat data...</h5>
                    </div>
                    <div id="display-content1" style="display: none;">
                        <div class="table-responsive">
                            <table id="load-content1" class="table-default" style="width: 100%;">
                                <thead>
                                    <tr style="background-color: #1572EB; color: white;">
                                        <th width="5px">NO</th>
                                        <th>NAMA OPD</th>
                                        <th>Anggaran</th>
                                        <th class="text-center">Realisasi Belanja</th>
                                        <th class="text-center">Persen</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('_partial/footer'); ?>
<?php $this->load->view('report/js'); ?>
<script type="text/javascript">
    $(document).ready(function() {

        //--------------------------------------------------------------------
        var chartpie = new Highcharts.Chart({
            chart: {
                renderTo: 'chart-pie',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            colors: ['#999966', '#b37700', '#00b3b3', '#cc0000'],
            title: {
                text: 'Anggaran Belanja Pada APBD Provinsi Sumatera Utara'
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
                }, {
                    name: 'Belanja Tak Terduga',
                    y: <?= $persen_takterduga ?>
                }]
            }]
        });

         //--------------------------------------------------------------------
         
        var chartbar = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-pendapatan',
                type: 'bar'
            },
            colors: ['#337ab7', '#00c0ef'],
            title: {
                text: 'Rating Anggaran Belanja OPD Pada APBD Provinsi Sumatera Utara'
            },
            xAxis: {
                categories: [<?= $nama_skpd1; ?>]
            },
            yAxis: {
                title: {
                    text: 'Rupiah'
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
                        enabled: true,
                        y: -6,
                        formatter: function() {
                            return this.y.toFixed(1);
                        }
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Anggaran Belanja',
                data: [<?= $realisasi_skpd1; ?>]
            }]
        });

         barchart = new Highcharts.Chart({
                chart: {
                    renderTo: 'grafik-realisasi',
                    type: 'column'
                },
                colors: ['#999966', '#b37700', '#00b3b3', '#cc0000', '#33cc33', '#cc3300', '#0000ff'],
                title: {
                    text: 'Realisasi Belanja Pada APBD Provinsi Sumatera Utara'
                },
                subtitle: {
                    text: 'Periode 1 Januari s.d <?=$periode_pemko?>'
                },
                xAxis: {
                categories: [<?=$nama_bulan?>]
                },
                yAxis: { title: { text: 'Rupiah'} },
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
                series: [{
                    type: 'column',
                    name: 'Belanja Operasi',
                    data: [<?=$arr_belanja_operasi?>]
                }, {
                    type: 'column',
                    name: 'Belanja Modal',
                    data: [<?=$arr_belanja_modal?>]
                }, {
                    type: 'column',
                    name: 'Belanja Tak Terduga',
                    data: [<?=$arr_belanja_takterduga?>]
                }]
            }); 


        var chartbar = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-belanja',
                type: 'bar'
            },
            colors: ['#337ab7', '#00c0ef'],
            title: {
                text: 'Rating Persen Realisasi Belanja OPD pada APBD Provinsi Sumatera Utara'
            },
            subtitle: {
                text: 'Periode 1 Januari 2021 s.d <?=$periode_pemko?>'
            },
            xAxis: {
                categories: [<?= $nama_skpd; ?>]
            },
            yAxis: {
                title: {
                    text: 'persen'
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
                        enabled: true,
                        y: -6,
                        formatter: function() {
                            return this.y.toFixed(1) + "%";
                        }
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Realisasi Belanja',
                data: [<?= $realisasi_skpd; ?>]
            }]
        });
    });
</script>
<?php $this->load->view('_partial/tag_close'); ?>