<script type="text/javascript">
    $(document).ready(function() {

        var chartbar = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                renderTo: 'realisasi-belanja-danger-provinsi',
                type: 'bar'
            },
            colors: ['#ff2d00', '#ff6d4d', '#ffac99'],
            title: {
                text: 'Realisasi Belanja SKPD di bawah 45 Persen'
            },
            subtitle: {
                text: 'Periode  Bulan Oktober, November, Desember 2021'
            },
            xAxis: {
                categories: [<?=$nama_skpd_danger?>]
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
                    data: [<?=$bulan_danger3?>],
                    dataLabels: {
                          enabled: true,
                          y: -6,
                          formatter: function() {
                            return '<span style="color: #ff2d00">' + this.y.toFixed(1) + '%</span>';
                          }
                    }
                },{
                    name: 'Bulan November',
                    data: [<?=$bulan_danger2?>],
                    dataLabels: {
                          enabled: true,
                          y: -6,
                          formatter: function() {
                            return '<span style="color: #ff2d00">' + this.y.toFixed(1) + '%</span>';
                          }
                    }
                },{
                    name: 'Bulan Desember',
                    data: [<?=$bulan_danger1?>],
                    dataLabels: {
                          enabled: true,
                          y: -6,
                          formatter: function() {
                            return '<span style="color: #ff2d00">' + this.y.toFixed(1) + '%</span>';
                          }
                    }
                }]
        });
    });
</script>