<div class="card-body bg-success-gradient" style="margin-bottom: 15px; padding: 10px;">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"><?= format_angka($jumlah_desa) . " Desa"; ?></h2>
        <div id="grafik-anggaran-jumlahdesa" style="width:100%;"></div>
    </div>
    <div class="table-responsive">
        <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
            <tr>
                <th style="text-align: left; background-color:#cc0000">Keterangan</th>
                <th style="text-align: right; background-color:#cc0000">Realisasi Tahap 1</th>
                <th style="text-align: right; background-color:#cc0000">Realisasi Tahap 2</th>
                <th style="text-align: right; background-color:#cc0000">Realisasi Tahap 3</th>
            </tr>
            <tr>
                <th style="text-align: left; background-color:#00b3b3">Desa Sudah Cair</th>
                <th style="text-align: right; background-color:#00b3b3"><?= format_angka($sudah_cair1); ?></th>
                <th style="text-align: right; background-color:#00b3b3"><?= format_angka($sudah_cair2); ?></th>
                <th style="text-align: right; background-color:#00b3b3"><?= format_angka($sudah_cair3); ?></th>
            </tr>
            <tr>
                <th style="text-align: left; background-color:#e6e600">Desa Belum Cair</th>
                <th style="text-align: right; background-color:#e6e600"><?= format_angka($belum_cair1); ?></th>
                <th style="text-align: right; background-color:#e6e600"><?= format_angka($belum_cair2); ?></th>
                <th style="text-align: right; background-color:#e6e600"><?= format_angka($belum_cair3); ?></th>
            </tr>
            <tr>
                <th style="text-align: left; background-color:#605ca8">Jumlah Desa</th>
                <th style="text-align: right; background-color:#605ca8"><?= format_angka($sudah_cair1 + $belum_cair1); ?></th>
                <th style="text-align: right; background-color:#605ca8"><?= format_angka($sudah_cair2 + $belum_cair2); ?></th>
                <th style="text-align: right; background-color:#605ca8"><?= format_angka($sudah_cair3 + $belum_cair3); ?></th>
            </tr>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-anggaran-jumlahdesa',
                type: 'bar',
            },
            colors: ['#e6e600', '#00b3b3', '#cc0000', '#cc0000'],
            title: {
                text: '<?= $judul_grafik; ?>'
            },
            subtitle: {
                text: '<?= $periode; ?>'
                // text: 'Priode 24 Desember 2021'
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: ['Jumlah Desa', 'Realisasi Tahap 1', 'Realisasi Tahap 2', 'Realisasi Tahap 3']
            },
            yAxis: {
                gridLineColor: '#197F07',
                title: {
                    text: 'Jumlah Desa'
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
                },
                series: {
                    stacking: 'normal'
                }
            },
            legend: {
                reversed: true
            },
            series: [{
                name: 'Belum Cair',
                data: [<?= "0," . $belum_cair1 . "," . $belum_cair2 . "," . $belum_cair3; ?>]
            }, {
                name: 'Sudah Cair',
                data: [<?= "0," . $sudah_cair1 . "," . $sudah_cair2 . "," . $sudah_cair3; ?>]
            }, {
                name: 'Jumlah Desa',
                data: [<?= $jumlah_desa . ",0,0,0" ?>]
            }]
        });
    });
</script>