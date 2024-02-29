<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                // backgroundColor: '#d2e4da',
                renderTo: 'realisasi-belanja',
                type: 'column'
            },
            colors: ['#04756f', '#ff8b00', '#b38600', '#e60000', '#0033cc', '#e6e600', '#333300'],
            title: {
                text: 'Realisasi Belanja Pada APBD <?=$nama_kabupaten?>'
            },
            subtitle: {
                text: 'Periode 1 Januari s.d <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?>'
            },
            xAxis: {
                // lineColor: '#000',
                categories: [<?= $realisasi_apbd_provinsi['nama_bulan'] ?>]
            },
            yAxis: {
                gridLineColor: '#197F07',
                title: {
                    text: 'Rupiah'
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
                colorByPoint: true,
                dataLabels: {
                    enabled: true
                }
            }
            },
                exporting: { enabled: false },
            series: [{
                    type: 'spline',
                    name: 'Arus Kas',
                    data: [<?=$arr_arus_kas?>],
                    dataLabels: {
                          enabled: true,
                          borderRadius: 5,
                          backgroundColor: 'rgba(4, 117, 11, 0.7)',
                          borderWidth: 1,
                          borderColor: '#AAA',
                          y: -6,
                          formatter: function() {
                            var a;
                            a=this.y/1000000000000;
                            return a.toFixed(2)+" T";
                          }
                    }
                },{
                type: 'column',
                name: 'Realisasi Belanja',
                data: [<?= $realisasi_apbd_provinsi['arr_belanja'] ?>],
                    dataLabels: {
                          enabled: true,
                          borderRadius: 5,
                          backgroundColor: 'rgba(255, 139, 0, 0.7)',
                          borderWidth: 1,
                          borderColor: '#AAA',
                          y: -6,
                          formatter: function() {
                            var a;
                            a=this.y/1000000000000;
                            return a.toFixed(2)+" T";
                          }
                    }
            }]
        });
    });
    
</script>