<div class="card-body bg-success-gradient" style="margin-bottom: 15px; padding: 10px;">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"><?= "Rp" . format_rupiah($alokasi); ?></h2>
        <div id="grafik-anggaran-danadesa" style="width:100%; height: 307px;"></div>
        <h2 style="color: white; font-weight: bold; margin-bottom: 0;"><?= number_format($persen_realisasi, 2) . "%"; ?></h2>
        <h4 style="color: white; font-size: 1em;">Realisasi Dana Desa pada APBD Kabupaten Periode 1 Januari s.d <?= $tgl_indo; ?></h4>
    </div>
    <div class="table-responsive">
        <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
            <tr>
                <th style="text-align: left; background-color:#cc0000">Anggaran Dana Desa</th>
                <th style="text-align: right; background-color:#cc0000"><?= format_rupiah($alokasi); ?></th>
            </tr>
            <tr>
                <th style="text-align: left; background-color:#00b3b3">Realisasi Tahap 1</th>
                <th style="text-align: right; background-color:#00b3b3"><?= format_rupiah($realisasi_tahap1); ?></th>
            </tr>
            <tr>
                <th style="text-align: left; background-color:#b37700">Realisasi Tahap 2</th>
                <th style="text-align: right; background-color:#b37700"><?= format_rupiah($realisasi_tahap2); ?></th>
            </tr>
            <tr>
                <th style="text-align: left; background-color:#e6e600">Realisasi Tahap 3</th>
                <th style="text-align: right; background-color:#e6e600"><?= format_rupiah($realisasi_tahap3); ?></th>
            </tr>
            <tr>
                <th style="text-align: left; background-color:#605ca8">Total Realisasi</th>
                <th style="text-align: right; background-color:#605ca8"><?= format_rupiah($realisasi_total); ?></th>
            </tr>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-anggaran-danadesa',
                type: 'bar',
            },
            colors: ['#e6e600', '#b37700', '#00b3b3', '#cc0000'],
            title: {
                text: '<?= $judul_grafik; ?>'
            },
            subtitle: {
                text: '<?= $periode; ?>'
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: ['Anggaran', 'Realisasi']
            },
            yAxis: {
                title: {
                    text: 'Nilai (Rp)'
                },
                labels: {
                    formatter: function() {
                        var a;
                        a = this.value / 1000000000000;
                        return a.toFixed(1) + " T";
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
                name: 'Realisasi Tahap 3',
                data: [<?= "0," . $realisasi_tahap3; ?>]
            }, {
                name: 'Realisasi Tahap 2',
                data: [<?= "0," . $realisasi_tahap2; ?>]
            }, {
                name: 'Realisasi Tahap 1',
                data: [<?= "0," . $realisasi_tahap1; ?>]
            }, {
                name: 'Anggaran Dana Desa',
                data: [<?= $alokasi . ",0"; ?>]
            }]
        });
    });
</script>