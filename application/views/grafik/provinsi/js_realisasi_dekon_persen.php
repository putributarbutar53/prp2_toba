<script type="text/javascript">
    $(document).ready(function() {

        var chartbar = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                renderTo: 'realisasi-dana-dk-persen',
                type: 'bar'
            },
            title: {
                text: 'Persentase Serapan Belanja Dana Dekonsentrasi <br><?=$nama_kabupaten?>'
            },
            subtitle: {
                text: 'Periode 1 januari s.d <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?>'
            },
            xAxis: {
                categories: [<?= $realisasi_pb_provinsi['nama_skpd_dk_persen'] ?>],
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
                        {value: 10, color: '#ff2d00'},
                        {value: 25, color: '#ff8b00'},
                        {color: '#04756f'}
                    ]
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Persentase Serapan Belanja',
                data: [<?= $realisasi_pb_provinsi['persen_dk'] ?>],
                    dataLabels: {
                          enabled: true,
                          formatter: function() {
                            if (this.y < 10) {
                              return '<span style="color: #ff2d00">' + this.y.toFixed(2) + '%</span>';
                            } else if (this.y < 25) {
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