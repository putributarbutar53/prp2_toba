<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                // backgroundColor: '#d2e4da',
                renderTo: 'realisasi-dana-dk',
                type: 'column'
            },
            colors: ['#04756f', '#ff8b00', '#e6e600', '#333300'],
            title: {
                text: 'Realisasi Dana Dekonsentrasi <?=$nama_kabupaten?>'
            },
            subtitle: {
                text: 'Periode 1 januari s.d <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?>'
            },
            xAxis: {
                // lineColor: '#000',
                categories: [<?= $realisasi_pb_provinsi['nama_skpd_dk'] ?>],
                labels: {
                    style: {
                        color: '#000000'
                    }
                }
            },
            yAxis: {
                gridLineColor: '#197F07',
                title: {
                    text: 'Rupiah'
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
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            plotOptions: {
            series: {
                dataLabels: {
                    enabled: true
                }
            }
            },
                exporting: { enabled: false },
            series: [{
                    type: 'column',
                    name: 'Pagu',
                    data: [<?= $realisasi_pb_provinsi['pagu_skpd_dk'] ?>]
                },{
                    type: 'column',
                    name: 'Realisasi',
                    data: [<?= $realisasi_pb_provinsi['real_skpd_dk'] ?>]
                }]
        });
    });
    
</script>