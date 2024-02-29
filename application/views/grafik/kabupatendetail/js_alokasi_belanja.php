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
            colors: ['#ff8b00', '#ff2d00', '#04756f', '#05518d'],
            title: {
                text: 'Alokasi Anggaran Belanja Pada APBD Kabupaten/Kota'
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
                    name: 'Operasi',
                    y: <?= hitung_persen($row_belanja['operasi'],$row_belanja['belanja'],2); ?>,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Modal',
                    y: <?= hitung_persen($row_belanja['modal'],$row_belanja['belanja'],2); ?>
                }, {
                    name: 'Tak Terduga',
                    y: <?= hitung_persen($row_belanja['takterduga'],$row_belanja['belanja'],2); ?>
                }, {
                    name: 'Transfer',
                    y: <?= hitung_persen($row_belanja['beltransfer'],$row_belanja['belanja'],2); ?>
                }]
            }]
        });
    });
</script>