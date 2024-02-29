<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                // backgroundColor: '#d2e4da',
                renderTo: 'realisasi-jumlah-desa',
                type: 'bar',
                            options3d: {
                                enabled: true,
                                alpha: 15,
                                beta: 15,
                                depth: 50,
                                viewDistance: 25
                            }
            },
            colors: ['#cc0000', '#32CD32', '#04756f', '#cc0000'],
            title: {
                text: 'REALISASI JUMLAH DESA'
            },
            subtitle: {
                text: 'Periode Januari s.d <?= $this->fungsi->nama_bulan($row_desa['periode_desa'])?>'
            },
            xAxis: {
                lineColor: '#000',
                categories: ['Jumlah Desa','Dana Desa Tahap 1','Dana Desa Tahap 2','Dana Desa Tahap 3','BLT Tahap 1','BLT Tahap 2','BLT Tahap 3','BLT Tahap 4']
            },
            yAxis: {
                gridLineColor: '#197F07',
                title: {
                    text: 'Jumlah'
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
                name: 'Belum Cair',
                data: [<?=$row_desa['gf1_belum']?>]
            }, {
                name: 'Sudah Cair',
                data: [<?=$row_desa['gf1_cair']?>]
            }, {
                name: 'Jumlah Desa',
                 data: [<?=$row_desa['gf1_desa']?>]
            }]
        });
    });
    
</script>