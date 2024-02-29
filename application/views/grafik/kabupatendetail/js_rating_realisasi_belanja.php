<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                // backgroundColor: '#d2e4da',
                renderTo: 'rating-realisasi-belanja',
                type: 'column'
            },
            colors: ['#04756f', '#ff8b00', '#b38600', '#e60000', '#0033cc', '#e6e600', '#333300'],
            title: {
                text: 'Realisasi Belanja Pada APBD Kabupaten/Kota'
            },
            subtitle: {
                text: 'Periode Januari s.d <?=bulan($bulan_data)?> <?=$tahun_data?>'
            },
            xAxis: {
                // lineColor: '#000',
                categories: [<?=$arr_nama_kabupaten_belanja?>]
            },
            yAxis: {
                gridLineColor: '#197F07',
                title: {
                    text: 'Persen'
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
                type: 'column',
                name: 'Realisasi Belanja',
                data: [<?=$arr_belanja_kab?>],
                    dataLabels: {
                          enabled: true,
                          borderRadius: 5,
                          backgroundColor: 'rgba(255, 139, 0, 0.7)',
                          borderWidth: 1,
                          borderColor: '#AAA',
                          y: -6,
                          formatter: function() {
                            var a;
                            a=this.y/1;
                            return a.toFixed(0)+" %";
                          }
                    }
            }]
        });
    });
    
</script>