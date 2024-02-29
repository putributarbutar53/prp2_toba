<script type="text/javascript">
    $(document).ready(function() {
        var chartpie = new Highcharts.Chart({
            chart: {
                backgroundColor: '#d2e4da',
                renderTo: 'alokasi-belanja',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            colors: ['#00b3b3', '#ff8b00', '#00b3b3', '#ff8b00'],
            title: {
                text: 'Anggaran Belanja'
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
                    name: 'Belanja Operasi',
                    y: <?= $persen_operasi ?>,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Belanja Modal',
                    y: <?= $persen_modal ?>
                }]
            }]
        });


    });
</script>