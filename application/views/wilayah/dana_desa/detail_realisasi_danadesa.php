<div class="card-body bg-success-gradient" style="margin-bottom: 15px; padding: 10px;">
    <div class="inner">
        <div id="grafik-detail-realisasi-danadesa" style="width:100%; height: 1200px;"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-detail-realisasi-danadesa',
                type: 'bar'
            },
            colors: ['#337ab7', '#ff33cc', '#00c0ef'],
            title: {
                text: '<?= $judul_grafik; ?>'
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: [<?= $nama_kabupaten ?>]
            },
            yAxis: {
                title: {
                    text: 'Nilai (Rp)'
                },
                labels: {
                    formatter: function() {
                        var a;
                        a = this.value / 1000000000;
                        return a.toFixed(1) + " M";
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
                    dataLabels: {
                        enabled: true,
                        y: -6,
                        formatter: function() {
                            return this.y.toFixed(1) + "";
                        }
                    }
                }
            },
            series: [{
                name: 'Tahap 1',
                data: [<?= $realisasi_tahap1; ?>]
            }, {
                name: 'Tahap 2',
                data: [<?= $realisasi_tahap2; ?>]
            }, {
                name: 'Tahap 3',
                data: [<?= $realisasi_tahap3; ?>]
            }]
        });
    });
</script>