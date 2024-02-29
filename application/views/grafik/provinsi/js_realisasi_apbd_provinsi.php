<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                // backgroundColor: '#FCFFC5',
                backgroundColor: '#d2e4da',
                renderTo: 'realisasi-apbd-provinsi',
                type: 'column'
            },
            colors: ['#04756f', '#ff8b00', '#b38600', '#e60000', '#0033cc', '#e6e600', '#333300'],
            title: {
                text: 'Realisasi APBD <?=$nama_kabupaten?>'
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
                exporting: { enabled: false },
            series: [{
                type: 'column',
                name: 'Realisasi Pendapatan',
                data: [<?= $realisasi_apbd_provinsi['arr_pendapatan'] ?>],
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