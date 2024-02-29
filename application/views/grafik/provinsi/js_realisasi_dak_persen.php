<script type="text/javascript">
    $(document).ready(function() {

        var chartbar = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                renderTo: 'realisasi-dana-dak-persen',
                type: 'bar'
            },
            title: {
                text: 'Persentase Realisasi RKUD Dana Alokasi Khusus (DAK) <?=$nama_kabupaten?>'
            },
            xAxis: {
                categories: [<?= $realisasi_pb_provinsi['nama_skpd_dak_persen'] ?>],
                labels: {
                    style: {
                        color: '#000000'
                    }
                }
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
                bar: {
                    zones: [
                        {value: 45, color: '#ff2d00'},
                        {value: 51, color: '#ff8b00'},
                        {color: '#04756f'}
                    ]
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Persentase Realisasi RKUD',
                data: [<?= $realisasi_pb_provinsi['persen_dak'] ?>],
                    dataLabels: {
                          enabled: true,
                          formatter: function() {
                            if (this.y < 45) {
                              return '<span style="color: #ff2d00">' + this.y.toFixed(2) + '%</span>';
                            } else if (this.y < 51) {
                              return '<span style="color: #ff8b00">' + this.y.toFixed(2) + '%</span>';
                            } else {
                              return '<span style="color: #000000">' + this.y.toFixed(1) + '%</span>';
                            }
                          }
                    }
            }]
        });
    });
</script>