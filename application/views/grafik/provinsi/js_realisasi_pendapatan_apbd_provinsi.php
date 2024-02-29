<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                renderTo: 'realisasi-pendapatan-apbd-provinsi',
                type: 'column'
            },
            colors: ['#33cccc', '#33cc33', '#b38600', '#33cc33', '#14ad14', '#008d00', '#006d00'],
            title: {
                text: 'Realisasi Pendapatan Pada APBD <?=$nama_kabupaten?>'
            },
            subtitle: {
                text: 'Periode 1 Januari s.d <?= $this->fungsi->nama_bulan($realisasi_apbd_provinsi['tanggal_data'])?>'
            },
            xAxis: {
                categories: [<?= $realisasi_apbd_provinsi['nama_bulan'] ?>]
            },
            yAxis: {
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
                name: 'PAD',
                data: [<?= $realisasi_apbd_provinsi['arr_pad'] ?>],
                    dataLabels: {
                          enabled: true,
                          borderRadius: 5,
                          backgroundColor: 'rgba(51, 204, 204, 0.7)',
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
                name: 'Transfer',
                data: [<?= $realisasi_apbd_provinsi['arr_transfer'] ?>],
                    dataLabels: {
                          enabled: true,
                          borderRadius: 5,
                          backgroundColor: 'rgba(51, 204, 51, 0.7)',
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
                name: 'Lain2 PD yg Sah',
                data: [<?= $realisasi_apbd_provinsi['arr_lain2'] ?>],
                    dataLabels: {
                          enabled: true,
                          borderRadius: 5,
                          backgroundColor: 'rgba(179, 134, 0, 0.7)',
                          borderWidth: 1,
                          borderColor: '#AAA',
                          y: -6,
                          formatter: function() {
                            var a;
                            a=this.y/1000000000000;
                            return a.toFixed(2)+" T";
                          }
                    }
            }, {
                type: 'spline',
                name: 'DBH',
                data: [<?= $realisasi_apbd_provinsi['arr_dbh'] ?>]
            }, {
                type: 'spline',
                name: 'DAU',
                data: [<?= $realisasi_apbd_provinsi['arr_dau'] ?>],
                    dataLabels: {
                          enabled: true,
                          borderRadius: 5,
                          backgroundColor: 'rgba(20, 173, 20, 0.7)',
                          borderWidth: 1,
                          borderColor: '#AAA',
                          y: -6,
                          formatter: function() {
                            var a;
                            a=this.y/1000000000000;
                            return a.toFixed(2)+" T";
                          }
                    }
            }, {
                type: 'spline',
                name: 'DAK',
                data: [<?= $realisasi_apbd_provinsi['arr_dak'] ?>]
            }, {
                type: 'spline',
                name: 'DAK Non Fisik',
                data: [<?= $realisasi_apbd_provinsi['arr_daknon'] ?>],
                    dataLabels: {
                          enabled: true,
                          borderRadius: 5,
                          backgroundColor: 'rgba(0, 109, 0, 0.7)',
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