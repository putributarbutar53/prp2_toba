<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                // backgroundColor: '#d2e4da',
                renderTo: 'realisasi-dana-desa',
                type: 'bar',
                            options3d: {
                                enabled: true,
                                alpha: 15,
                                beta: 15,
                                depth: 50,
                                viewDistance: 25
                            }
            },
            colors: ['#00b3b3', '#b37700', '#04756f', '#cc0000'],
            title: {
                text: 'REALISASI DANA DESA'
            },
            subtitle: {
                text: 'Periode Januari s.d <?= $this->fungsi->nama_bulan($row_desa['periode_desa'])?>'
            },
            xAxis: {
                lineColor: '#000',
                categories: ['Anggaran','Realisasi']
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
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
                exporting: { enabled: false },
            series: [{
                name: 'BLT',
                data: [<?=$row_desa['gf1_tahap2']?>]
            }, {
                name: 'Dana Desa',
                 data: [<?=$row_desa['gf1_tahap1']?>]
            }, {
                name: 'Anggaran',
                data: [<?=$row_desa['gf1_tahap']?>]
            }]
        });
    });
    
</script>