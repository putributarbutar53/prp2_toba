<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                // backgroundColor: '#d2e4da',
                renderTo: 'mandatory-spending',
                type: 'column'
            },
            colors: ['#04756f', '#ff8b00', '#b38600', '#e6e600', '#0033cc', '#e6e600', '#333300'],
            title: {
                text: 'MANDATORY SPENDING APBD <?=$result_kabupaten_nama?> <br>Tahun <?=$tahun_data?>'
            },
            xAxis: {
                lineColor: '#000',
                categories: ['Pendidikan', 'Kesehatan', 'Infrastruktur Daerah', 'Alokasi Dana Desa']
            },
            yAxis: {
                gridLineColor: '#197F07',
                tickInterval: 10,
                max: <?=$batas_grafik?>,
                title: {
                    text: 'Persen'
                }
            },
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
                colorByPoint: true,
                dataLabels: {
                    enabled: true
                }
            }
            },
                exporting: { enabled: false },
            series: [{
                    type: 'column',
                    name: 'MANDATORY SPENDING APBD',
                    data: [<?=$mandatory_apbd?>]
                }, {
                    type: 'spline',
                    name: 'UU MANDATORY SPENDING',
                    data: [<?=$mandatory_uu?>],
                    lineColor: '#e60000',
                    lineWidth:5
                }]
        });
    });
    
</script>