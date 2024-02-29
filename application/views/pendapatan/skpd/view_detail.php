<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/sunburst.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/sankey.js"></script>
<script src="https://code.highcharts.com/modules/organization.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<?php $this->load->view("_partial/header"); ?>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white pb-3 fw-bold">Anggaran Pendapatan Pada APBD <?=$nama_skpd_tampil?></h3>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Pilih Tahun</legend>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-md-8 col-sm-6" style="margin-bottom: 3px; margin-top: 3px;">
                                    <select name="tahun" id="tahun" class="select2 form-control">
                                        <?php
                                        $tahun_sekarang = date('Y');
                                        $result_tahun   = [];
                                        for ($i = $tahun_sekarang; $i >= tahun_mulai(); $i--) {
                                            array_push($result_tahun, ['tahun' => $i]);
                                        }
                                        ?>
                                        <?php foreach ($result_tahun as $r) : ?>
                                            <?php if ($r['tahun'] == $tahun) : ?>
                                                <option value="<?= $r['tahun']; ?>" <?= "selected"; ?>><?= $r['tahun']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $r['tahun']; ?>"><?= $r['tahun']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-6" style="margin-bottom: 3px; margin-top: 3px;">
                                    <button type="button" id="btn-tampil" class="btn btn-success btn-block"> <i class="fa fa-search"></i> TAMPILKAN</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="card-body bg-info">
                        <div class="inner">
                            <div id="chart-bagan" style="width:100%; height: 100%;"></div>
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
                    <div class="card-body bg-info">
                        <div class="inner">
                            <h2 style="color: white; font-weight: bold;">Anggaran Pendapatan : <?= "Rp " . format_angka($realisasi['pendapatan']); ?></h2>
                            <div id="chart-sunburst" style="width:100%; height: 600px;"></div>
                        </div>
                        <table class="table table-hover">
                        <tr style="background-color: #33cccc; color: white; font-weight: bold;">
                            <td>PENDAPATAN ASLI DAERAH (PAD)</td>
                            <td class="text-right"><?= "Rp " . format_angka($realisasi['pad']); ?></td>
                            <td class="text-right"><?= $persen_pad; ?>%</td>
                        </tr>
                        <tr style="background-color: #33cc33; color: white; font-weight: bold;">
                            <td>PENDAPATAN TRANSFER</td>
                            <td class="text-right"><?= "Rp " . format_angka($realisasi['transfer']); ?></td>
                            <td class="text-right"><?= $persen_transfer; ?>%</td>
                        </tr>
                        <tr style="background-color: #b38600; color: white; font-weight: bold;">
                            <td>LAIN LAIN PENDAPATAN DAERAH</td>
                            <td class="text-right"><?= "Rp " . format_angka($realisasi['pad_lain']); ?></td>
                            <td class="text-right"><?= $persen_pad_lain; ?>%</td>
                        </tr>
                        <tr style="background-color: #605ca8; color: white; font-weight: bold;">
                            <td>ANGGARAN PENDAPATAN</td>
                            <td class="text-right"><?= "Rp " . format_angka($realisasi['pendapatan']); ?></td>
                            <td class="text-right"> 100 % </td>
                        </tr>
                    </table>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="card-body bg-info">
                        <div class="inner">
                            <h2 style="color: white; font-weight: bold;">Realisasi : <?= "Rp " . format_angka($realisasi['realisasi_pendapatan']); ?></h2>
                            <div id="grafik-realisasi" style="width:100%; height: 600px;"></div>
                        </div>
                        <table class="table table-hover">
                            <tr style="background-color: #33cccc; color: white; font-weight: bold;">
                                <td>Realisasi PAD</td>
                                <td class="text-right"><?= "Rp " . format_angka($pad_terakhir); ?></td>
                                <td class="text-right"><?= $persen_pad_terakhir; ?>%</td>
                            </tr>
                            <tr style="background-color: #33cc33; color: white; font-weight: bold;">
                                <td>Realisasi Transfer</td>
                                <td class="text-right"><?= "Rp " . format_angka($transfer_terakhir); ?></td>
                                <td class="text-right"><?= $persen_transfer_terakhir; ?>%</td>
                            </tr>
                            <tr style="background-color: #b38600; color: white; font-weight: bold;">
                                <td>Realisasi Lain2 Pendapatan</td>
                                <td class="text-right"><?= "Rp " . format_angka($lain2_terakhir); ?></td>
                                <td class="text-right"><?= $persen_lain2_terakhir; ?>%</td>
                            </tr>
                            <tr style="background-color: #605ca8; color: white; font-weight: bold;">
                                <td>Realisasi Periode <?=$periode_pemko?></td>
                                <td class="text-right"><?= "Rp " . format_angka($realisasi['realisasi_pendapatan']); ?></td>
                                <td class="text-right"><?= $persen_realisasi; ?>%</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="card full-height">
        <div class="card-body">
            <div class="row">

                <div class="col-sm-12">
                    <div class="preload" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                        <h5>Sedang memuat data...</h5>
                    </div>
                    <div id="display-content" style="display: none;">
                        <div class="table-responsive">
                            <table id="load-content" class="table-default" style="width: 100%;">
                                <thead>
                                    <tr style="background-color: #1572EB; color: white;">
                                        <th width="5px">No</th>
                                        <th>Tahun</th>
                                        <th>Bulan</th>
                                        <th class="text-center">Anggaran Pendapatan</th>
                                        <th class="text-center">Realisasi Pendapatan</th>
                                        <th class="text-center">Persen</th>
                                        <th class="text-center">Tanggal Data</th>
                                        <th class="text-center">Tanggal Input</th>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
        var tahun = $('#tahun').val();
        load_apbd(tahun);
    });

    function load_apbd(tahun) {
        $('#display-content').css('display', 'none');
        $('.preload').show();
        table = $('#load-content').DataTable({
            destroy: true,
            ordering: false,
            bAutoWidth: false,
            initComplete: function() {
                $('#display-content').css('display', 'block');
                $('.preload').hide();
                $('#btn-tampil').attr('disabled', false);
                $('#btn-tampil').html("<i class='fa fa-search'></i> TAMPILKAN");
            },
            ajax: {
                url: "<?= site_url('pendapatan/skpd/load_pendapatan'); ?>",
                type: 'POST',
                data: {
                    id: "<?= $skpd['id_skpd']; ?>",
                    tahun: "<?= $tahun_data; ?>"
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [3, 4]
            }, {
                className: 'text-center',
                targets: [0, 1, 2, 5, 6, 7]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'tahun'
            }, {
                data: 'bulan'
            }, {
                data: 'anggaran_pendapatan'
            }, {
                data: 'realisasi_pendapatan'
            }, {
                data: 'persen_pendapatan'
            }, {
                data: 'tanggal_data'
            }, {
                data: 'tanggal_input'
            }]
        });
    }

    $(document).ready(function() {
        Highcharts.chart('chart-bagan', {
            chart: {
                height: 600,
                inverted: true
            },
            title: {
                text: 'Struktur Anggaran Pendapatan Pada APBD <?=$nama_skpd_tampil?>'
            },
            accessibility: {
                point: {
                    descriptionFormatter: function(point) {
                        var nodeName = point.toNode.name,
                            nodeId = point.toNode.id,
                            nodeDesc = nodeName === nodeId ? nodeName : nodeName + ', ' + nodeId,
                            parentDesc = point.fromNode.id;
                        return point.index + '. ' + nodeDesc + ', reports to ' + parentDesc + '.';
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                type: 'organization',
                name: 'Struktur Anggaran Pendapatan',
                keys: ['from', 'to'],
                data: [
                    ['Pendapatan', 'PAD'],
                    ['Pendapatan', 'TRANSFER'],
                    ['Pendapatan', 'LAIN LAIN PENDAPATAN DAERAH'],
                    ['TRANSFER', 'TRANSFER PUSAT'],
                    ['TRANSFER', 'TRANSFER DAERAH'],
                    ['TRANSFER PUSAT', 'DBH'],
                    ['TRANSFER PUSAT', 'DAU'],
                    ['TRANSFER PUSAT', 'DAK Fisik'],
                    ['TRANSFER PUSAT', 'DAK Non Fisik']
                ],
                levels: [{
                    level: 0,
                    color: 'silver',
                    dataLabels: {
                        color: 'black'
                    },
                    height: 25
                }, {
                    level: 1,
                    color: 'silver',
                    dataLabels: {
                        color: 'black'
                    },
                    height: 25
                }, {
                    level: 2,
                    color: '#980104'
                }, {
                    level: 4,
                    color: '#359154'
                }],
                nodes: [{
                    id: 'Pendapatan',
                    title: 'Rp <?= format_angka($realisasi['pendapatan']) ?>'
                }, {
                    id: 'PAD',
                    color: '#33cccc',
                    title: 'Rp <?= format_angka($realisasi['pad']) ?>'
                }, {
                    id: 'TRANSFER',
                    color: '#33cc33',
                    title: 'Rp <?= format_angka($realisasi['transfer']) ?>'
                }, {
                    id: 'LAIN LAIN PENDAPATAN DAERAH',
                    color: '#b38600',
                    title: 'Rp <?= format_angka($realisasi['pad_lain']) ?>'
                }, {
                    id: 'TRANSFER PUSAT',
                    color: '#29a329',
                    title: 'Rp <?= format_angka($realisasi['pusat']) ?>'
                }, {
                    id: 'TRANSFER DAERAH',
                    color: '#009933',
                    title: 'Rp <?= format_angka($realisasi['dbh_daerah']) ?>'
                }, {
                    id: 'DBH',
                    color: '#29a329',
                    title: 'Rp <?= format_angka($realisasi['dbh']) ?>'
                }, {
                    id: 'DAU',
                    color: '#0a840a',
                    title: 'Rp <?= format_angka($realisasi['dau']) ?>'
                }, {
                    id: 'DAK Fisik',
                    color: '#006400',
                    title: 'Rp <?= format_angka($realisasi['dak']) ?>'
                }, {
                    id: 'DAK Non Fisik',
                    color: '#004400',
                    title: 'Rp <?= format_angka($realisasi['daknon']) ?>'
                }],
                colorByPoint: false,
                color: '#007ad0',
                dataLabels: {
                    color: 'white'
                },
                borderColor: 'white',
                nodeWidth: 65
            }],
            tooltip: {
                outside: true
            },
            exporting: {
                allowHTML: true,
                sourceWidth: 800,
                sourceHeight: 600
            }
        });

        var chartsunburst = new Highcharts.chart('chart-sunburst', {
            title: {
                text: 'Alokasi Anggaran Pendapatan Pada APBD <?=$nama_skpd_tampil?>'
            },
            credits: {
                enabled: false
            },
            series: [{
                type: "sunburst",
                allowDrillToNode: true,
                cursor: 'pointer',
                levels: [{
                    level: 1,
                    colorByPoint: true
                }, {
                    level: 2,
                    colorVariation: {
                        key: 'brightness',
                        to: -0.5
                    }
                }, {
                    level: 3,
                    colorVariation: {
                        key: 'brightness',
                        to: -0.5
                    }
                }],
                data: [{
                    id: 'A',
                    name: 'PAD',
                    color: '#33cccc'
                }, {
                    id: 'B',
                    name: 'Transfer',
                    color: '#33cc33'
                }, {
                    id: 'C',
                    name: 'Lain Lain Pendapatan Daerah yang Sah',
                    color: '#b38600'
                }, {
                    id: 'A1',
                    name: 'PAD',
                    parent: 'A',
                    color: '#33cccc'
                }, {
                    id: 'B1',
                    name: 'Pusat',
                    parent: 'B',
                    color: '#29a329'
                }, {
                    id: 'B2',
                    name: 'Daerah',
                    parent: 'B',
                    color: '#009933'
                }, {
                    id: 'C1',
                    name: 'LAIN LAIN PENDAPATAN DAERAH YANG SAH',
                    parent: 'C',
                    color: '#b38600'
                }, {
                    id: 'A11',
                    name: 'PAD',
                    parent: 'A1',
                    value: <?= $realisasi['pad'] ?>
                }, {
                    id: 'B11',
                    name: 'DBH',
                    parent: 'B1',
                    value: <?= $realisasi['dbh'] ?>
                }, {
                    id: 'B12',
                    name: 'DAU',
                    parent: 'B1',
                    value: <?= $realisasi['dau'] ?>
                }, {
                    id: 'B13',
                    name: 'DAK Fisik',
                    parent: 'B1',
                    value: <?= $realisasi['dak'] ?>
                }, {
                    id: 'B14',
                    name: 'DAK Non Fisik',
                    parent: 'B1',
                    value: <?= $realisasi['daknon'] ?>
                }, {
                    id: 'B21',
                    name: 'Tranfer Daerah',
                    parent: 'B2',
                    value: <?= $realisasi['dbh_daerah'] ?>
                }, {
                    id: 'C11',
                    name: 'LAIN LAIN PENDAPATAN DAERAH YANG SAH',
                    parent: 'C1',
                    value: <?= $realisasi['pad_lain'] ?>
                }]
            }]
        });

         //--------------------------------------------------------------------

         barchart = new Highcharts.Chart({
                chart: {
                    renderTo: 'grafik-realisasi',
                    type: 'column'
                },
                colors: ['#33cccc', '#33cc33', '#b38600', '#e60000', '#0033cc', '#e6e600', '#333300'],
                title: {
                    text: 'Realisasi Pendapatan Pada APBD <?=$nama_skpd_tampil?>'
                },
                subtitle: {
                    text: 'Periode 1 Januari s.d <?=$periode_pemko?>'
                },
                xAxis: {
                categories: [<?=$nama_bulan?>]
                },
                yAxis: { title: { text: 'Nilai'} },
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
                    name: 'PAD',
                    data: [<?=$arr_pad?>]
                }, {
                    type: 'column',
                    name: 'Transfer',
                    data: [<?=$arr_transfer?>]
                }, {
                    type: 'column',
                    name: 'Lain Lain Pendapatan Sah',
                    data: [<?=$arr_lain2?>]
                }, {
                    type: 'spline',
                    name: 'DBH',
                    data: [<?=$arr_dbh?>]
                }, {
                    type: 'spline',
                    name: 'DAU',
                    data: [<?=$arr_dau?>]
                }, {
                    type: 'spline',
                    name: 'DAK',
                    data: [<?=$arr_dak?>]
                }, {
                    type: 'spline',
                    name: 'DAK Non Fisik',
                    data: [<?=$arr_daknon?>]
                }]
            }); 

        

    });

$(document).on("click", "#btn-tampil", function(e) {
    e.preventDefault();
    var self = this;
    $(self).attr('disabled', true);
    $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
    var tahun = $('#tahun').val();
    load_apbd(tahun);
});
</script>
<?php $this->load->view('_partial/tag_close'); ?>