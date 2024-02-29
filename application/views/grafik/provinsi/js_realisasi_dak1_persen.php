<script type="text/javascript">
    $(document).ready(function() {

        var chartbar = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                renderTo: 'realisasi-dana-dak1-persen',
                type: 'bar'
            },
            title: {
                text: 'Persentase Realisasi Dana Alokasi Khusus (DAK) <?=$nama_kabupaten?>'
            },
            subtitle: {
                text: 'Periode 1 januari s.d <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?>'
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
                        {value: 10, color: '#ff2d00'},
                        {value: 24, color: '#ff8b00'},
                        {color: '#04756f'}
                    ]
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Persentase Realisasi',
                data: [<?= $realisasi_pb_provinsi['persen_dak'] ?>],
                    dataLabels: {
                          enabled: true,
                          formatter: function() {
                            if (this.y < 10) {
                              return '<span style="color: #ff2d00">' + this.y.toFixed(2) + '%</span>';
                            } else if (this.y < 24) {
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