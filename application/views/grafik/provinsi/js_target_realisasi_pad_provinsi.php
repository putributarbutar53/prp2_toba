<script type="text/javascript">
    $(document).ready(function() {
        var chartbar = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                renderTo: 'target-realisasi-pad-provinsi',
                type: 'bar'
            },
            colors: ['#04756f', '#ff8b00'],
            title: {
                text: 'Persentase Target dan Realisasi Pendapatan Asli Daerah (PAD) oleh OPD <?=$nama_kabupaten?>'
            },
            subtitle: {
                text: 'Periode 1 Januari <?=$tahun_data?> s.d <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?>'
            },
            accessibility: {
                point: {
                    valueDescriptionFormat: '{index}. Age {xDescription}, {value}%.'
                }
            },
            xAxis: [{
                categories: [<?= $realisasi_pb_provinsi['nama_skpd_pendapatan'] ?>],
                reversed: false,
                labels: {
                    step: 1
                },
                accessibility: {
                    description: 'Age (male)'
                }
            }, { // mirror axis on right side
                opposite: true,
                reversed: false,
                categories: [<?= $realisasi_pb_provinsi['nama_skpd_pendapatan'] ?>],
                linkedTo: 0,
                labels: {
                    step: 1
                },
                accessibility: {
                    description: 'Age (female)'
                }
            }],
            yAxis: {
                title: {
                    text: null
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
                        return (ret ? ret : Math.abs(this.value));
                    }
                },
                accessibility: {
                    description: 'Percentage population',
                    rangeDescription: 'Range: 0 to 5%'
                }
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },               
            series: [{
                name: 'Persentase Target PAD',
                data: [<?= $realisasi_pb_provinsi['persen_skpd_target'] ?>],
                    dataLabels: {
                          enabled: true,
                          formatter: function() {
                            return Math.abs(this.y);
                          }
                    }
            },{
                name: 'Persentase Realisasi PAD',
                data: [<?= $realisasi_pb_provinsi['persen_skpd_pendapatan'] ?>],
                    dataLabels: {
                          enabled: true,
                          formatter: function() {
                            return this.y;
                          }
                    }
            }]
        });
    });
</script>