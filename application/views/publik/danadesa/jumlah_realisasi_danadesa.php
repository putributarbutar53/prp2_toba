<div class="card-body bg-success-gradient" style="margin-bottom: 15px; padding: 10px;">
    <div class="inner">
        <div id="grafik-jumlah-realisasi-danadesa" style="width:100%; height: 800px;"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-jumlah-realisasi-danadesa',
                type: 'bar'
            },
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
                    colorByPoint: true,
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
                name: 'Realisasi Dana Desa',
                data: [<?= $jumlah_realisasi; ?>]
            }]
        });
    });
</script>