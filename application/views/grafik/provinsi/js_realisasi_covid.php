<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                // backgroundColor: '#d2e4da',
                renderTo: 'realisasi-covid',
                type: 'column'
            },
            colors: ['#e60000', '#0033cc', '#e6e600', '#333300'],
            title: {
                text: 'Realisasi Belanja Pencegahan dan Penanggulangan Covid-19'
            },
            xAxis: {
                // lineColor: '#000',
                categories: ['Bidang Kesehatan','Dukungan Ekonomi','Jaringan Pengaman Sosial']
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
                dataLabels: {
                    enabled: true
                }
            }
            },
                exporting: { enabled: false },
            series: [{
                    type: 'column',
                    name: 'Anggaran',
                    data: [224461020336,14974351247,124563823674],
                    dataLabels: {
                          enabled: true,
                          borderRadius: 5,
                          backgroundColor: 'rgba(4, 117, 11, 0.7)',
                          borderWidth: 1,
                          borderColor: '#AAA',
                          y: -6,
                          formatter: function() {
                            return this.y;
                          }
                    }
                },{
                type: 'column',
                name: 'Realisasi',
                data: [201262639802,14321990100,109096249710],
                    dataLabels: {
                          enabled: true,
                          borderRadius: 5,
                          backgroundColor: 'rgba(255, 139, 0, 0.7)',
                          borderWidth: 1,
                          borderColor: '#AAA',
                          y: -6,
                          formatter: function() {
                            return this.y;
                          }
                    }
            }]
        });
    });
    
</script>