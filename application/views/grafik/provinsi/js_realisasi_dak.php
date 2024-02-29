<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                // backgroundColor: '#d2e4da',
                renderTo: 'realisasi-dana-dak',
                type: 'column'
            },
            colors: ['#04756f', '#ff8b00', '#e6e600', '#333300'],
            title: {
                text: 'Realisasi RKUD Dana Alokasi Khusus (DAK) <?=$nama_kabupaten?>'
            },
            xAxis: {
                // lineColor: '#000',
                categories: [<?= $realisasi_pb_provinsi['nama_skpd_dak'] ?>],
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
                    data: [<?= $realisasi_pb_provinsi['pagu_skpd_dak'] ?>]
                },{
                    type: 'column',
                    name: 'Realisasi RKUD',
                    data: [<?= $realisasi_pb_provinsi['real_skpd_dak'] ?>]
                }]
        });
    });
    
</script>