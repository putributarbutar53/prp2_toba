<div class="card-body bg-success-gradient" style="margin-bottom: 15px; padding: 10px;">
    <div class="inner">
        <div id="grafik-persen-realisasi-danadesa" style="width:100%;"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-persen-realisasi-danadesa',
                type: 'column'
            },
            title: {
                text: '<?= $judul_grafik; ?>'
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: [<?= $ratting_kabupaten ?>]
            },
            yAxis: {
                title: {
                    text: 'Persen'
                },
                labels: {
                    formatter: function() {
                        var a;
                        a = this.value / 1;
                        return a.toFixed(1) + "%";
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
                            return this.y.toFixed(1) + "%";
                        }
                    }
                }
            },
            series: [{
                name: 'Persen Realisasi Dana Desa',
                data: [<?= $ratting_persen; ?>]
            }]
        });
    });
</script>