<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                // backgroundColor: '#d2e4da',
                renderTo: 'mandatory-spending-papbd',
                type: 'column'
            },
            colors: ['#04756f', '#ff8b00', '#b38600', '#0033cc', '#0033cc', '#e6e600', '#333300'],
            title: {
                text: 'Mandatory Spending P APBD <?=$nama_kabupaten?> Tahun <?=$tahun_data?>'
            },
            xAxis: {
                lineColor: '#000',
                categories: ['Pendidikan', 'Kesehatan', 'Infrastruktur Daerah', 'Penanganan Covid-19']
            },
            yAxis: {
                gridLineColor: '#197F07',
                tickInterval: 10,
                max: 50,
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
                    name: 'MANDATORY SPENDING P APBD',
                    data: [<?=$mandatory_papbd?>]
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