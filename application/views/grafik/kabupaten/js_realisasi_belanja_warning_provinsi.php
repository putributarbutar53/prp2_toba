<script type="text/javascript">
    $(document).ready(function() {

        var chartbar = new Highcharts.Chart({
            chart: {
                backgroundColor: '#d2e4da',
                renderTo: 'realisasi-belanja-warning-provinsi',
                type: 'bar'
            },
            colors: ['#ff8b00', '#ffaf4d', '#ffd199'],
            title: {
                text: 'Realisasi Belanja SKPD 45 s.d 50 Persen'
            },
            subtitle: {
                text: 'Periode Bulan Oktober, November, Desember 2021'
            },
            xAxis: {
                categories: [<?=$nama_skpd_warning?>]
            },
            yAxis: {
                title: {
                    text: 'persen'
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
            credits: {
                enabled: false
            },
                exporting: { enabled: false },
            series: [{
                    name: 'Bulan Oktober',
                    data: [<?=$bulan_warning3?>],
                    dataLabels: {
                          enabled: true,
                          y: -6,
                          formatter: function() {
                            return '<span style="color: #ff8b00">' + this.y.toFixed(1) + '%</span>';
                          }
                    }
                },{
                    name: 'Bulan November',
                    data: [<?=$bulan_warning2?>],
                    dataLabels: {
                          enabled: true,
                          y: -6,
                          formatter: function() {
                            return '<span style="color: #ff8b00">' + this.y.toFixed(1) + '%</span>';
                          }
                    }
                },{
                    name: 'Bulan Desember',
                    data: [<?=$bulan_warning1?>],
                    dataLabels: {
                          enabled: true,
                          y: -6,
                          formatter: function() {
                            return '<span style="color: #ff8b00">' + this.y.toFixed(1) + '%</span>';
                          }
                    }
                }]
        });
    });
</script>