<div class="card-body bg-success-gradient" style="margin-bottom: 15px; padding: 10px;">
    <div class="inner">
        <div id="grafik-persen-desacair" style="width:100%;"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-persen-desacair',
                type: 'column'
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
                    dataLabels: {
                        enabled: true,
                        y: -6,
                        formatter: function() {
                            return this.y.toFixed(1) + " %";
                        }
                    }
                }
            },
            series: [{
                name: 'Tahap 1',
                data: [<?= $persen_cair_tahap1; ?>]
            }, {
                name: 'Tahap 2',
                data: [<?= $persen_cair_tahap2; ?>]
            }, {
                name: 'Tahap 3',
                data: [<?= $persen_cair_tahap3; ?>]
            }]
        });
    });
</script>