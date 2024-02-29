<script type="text/javascript">
    $(document).ready(function() {
        var chartbar = new Highcharts.Chart({
            chart: {
                backgroundColor: '#daf5be',
                renderTo: 'target-pad-provinsi',
                type: 'bar'
            },
            colors: ['#04756f', '#ff8b00'],
            title: {
                text: 'Target dan Realisasi Pendapatan Asli Daerah (PAD) oleh OPD <?=$nama_kabupaten?>'
            },
            subtitle: {
                text: 'Periode 1 Januari <?=$tahun_data?> s.d <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?>'
            },
            xAxis: {
                categories: [<?= $realisasi_pb_provinsi['nama_skpd_target'] ?>],
                labels: {
                    style: {
                        color: '#000000'
                    }
                }
            },
            yAxis: {
                title: {
                    text: 'Rupiah (Rp)'
                },
                type: 'logarithmic',
                minorTickInterval: 5000000,
                accessibility: {
                    rangeDescription: 'Range: 1000000 to 5000000000000'
                },
                labels: {
                    formatter: function() {
                        var ret,
                            numericSymbols = ['Rb', 'Jt', 'M', 'T'],
                            i = numericSymbols.length;
                        if (this.value >= 1000) {
                            while (i-- && ret === undefined) {
                                multi = Math.pow(1000, i + 1);
                                if (this.value >= multi && numericSymbols[i] !== null) {
                                    ret = (this.value / multi) + numericSymbols[i];
                                }
                            }
                        }
                        return (ret ? ret : this.value);
                    }
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
            credits: {
                enabled: false
            },
               
            series: [{
                name: 'Target Pendapatan Asli Daerah (PAD)',
                data: [<?= $realisasi_pb_provinsi['skpd_pendapatan_target'] ?>],
                    dataLabels: {
                          enabled: true
                    }
            },{
                name: 'Realisasi Pendapatan Asli Daerah (PAD)',
                data: [<?= $realisasi_pb_provinsi['skpd_pendapatan_realisasi'] ?>],
                    dataLabels: {
                          enabled: true
                    }
            }]
        });
    });
</script>