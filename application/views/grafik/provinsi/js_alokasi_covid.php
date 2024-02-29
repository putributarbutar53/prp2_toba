<script type="text/javascript">
    $(document).ready(function() {
        var chartpie = new Highcharts.Chart({
            chart: {
                backgroundColor: '#d2e4da',
                renderTo: 'alokasi-covid',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            colors: ['#ff8b00', '#ff2d00', '#04756f', '#05518d'],
            title: {
                text: 'Anggaran Belanja Pencegahan dan Penanggulangan Covid-19'
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
                    name: 'Bidang Kesehatan',
                    y: 61.67,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Dukungan Ekonomi',
                    y: 4.11
                }, {
                    name: 'Jaringan Pengaman Sosial',
                    y: 34.22
                }]
            }]
        });
    });
</script>