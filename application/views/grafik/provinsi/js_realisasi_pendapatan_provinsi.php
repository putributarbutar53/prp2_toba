<script type="text/javascript">
    $(document).ready(function() {
        var chartbar = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                renderTo: 'realisasi-pendapatan-provinsi',
                type: 'bar'
            },
            colors: ['#337ab7', '#00c0ef'],
            title: {
                text: 'Persentase Realisasi Pendapatan Asli Daerah (PAD) oleh OPD <?=$nama_kabupaten?>'
            },
            subtitle: {
                text: 'Periode 1 Januari <?=$tahun_data?> s.d <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?>'
            },
            xAxis: {
                categories: [<?= $realisasi_pb_provinsi['nama_skpd_pendapatan'] ?>],
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
                        {value: 30, color: '#ff2d00'},
                        {value: 60, color: '#ff8b00'},
                        {color: '#04756f'}
                    ]
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Realisasi Pendapatan Asli Daerah (PAD)',
                data: [<?= $realisasi_pb_provinsi['persen_skpd_pendapatan'] ?>],
                    dataLabels: {
                          enabled: true,
                          formatter: function() {
                            if (this.y < 30) {
                              return '<span style="color: #ff2d00">' + this.y.toFixed(2) + '%</span>';
                            } else if (this.y < 60) {
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