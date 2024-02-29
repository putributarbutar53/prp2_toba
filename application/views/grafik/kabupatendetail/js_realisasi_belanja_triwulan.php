<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                // backgroundColor: '#d2e4da',
                renderTo: 'realisasi-belanja-triwulan',
                type: 'column'
            },
            colors: ['#04756f', '#ff8b00', '#b38600', '#e60000', '#0033cc', '#e6e600', '#333300'],
            title: {
                text: 'Realisasi Belanja Per Triwulan Pada APBD  <?=$result_kabupaten_nama?>'
            },
            subtitle: {
                text: 'Periode 1 Januari s.d <?= $this->fungsi->nama_bulan($tanggal_data)?>'
            },
            xAxis: {
                // lineColor: '#000',
                categories: ['Triwulan I', 'Triwulan II', 'Triwulan III', 'Triwulan IV']
            },
            yAxis: {
                gridLineColor: '#197F07',
                title: {
                    text: 'Nilai (Rupiah)'
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
                data: [<?=$arr_belanja_triwulan?>]
            }]
        });
    });
    
</script>