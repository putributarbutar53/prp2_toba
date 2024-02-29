<script type="text/javascript">
    $(document).ready(function() {

            var barchart1 = new Highcharts.Chart({
                chart: {
                    backgroundColor: '#FCFFC5',
                    renderTo: 'arus-kas-bulan',
                    type: 'column'
                },
                colors: ['#04756f', '#e60000', '#b38600', '#e60000', '#0033cc', '#e6e600'],
                title: {
                    text: 'Arus Kas Per Bulan dan Realisasi Belanja'
                },
                subtitle: {
                    text: 'Periode 1 Januari s.d <?=$periode_pemko?>'
                },
                xAxis: {
                categories: [<?=$nama_bulan?>]
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
                    name: 'Realisasi Belanja',
                    data: [<?=$arr_belanja_all?>]
                },{
                    type: 'spline',
                    name: 'Arus Kas',
                    data: [<?=$arr_arus_kas?>]
                }]
            }); 


    });
</script>