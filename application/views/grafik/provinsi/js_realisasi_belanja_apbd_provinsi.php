<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                renderTo: 'realisasi-belanja-apbd-provinsi',
                type: 'column'
            },
            colors: ['#ff8b00', '#ff2d00', '#04756f', '#05518d'],
            title: {
                text: 'Realisasi Belanja Pada APBD <?=$nama_kabupaten?>'
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
                name: 'Belanja Operasi',
                data: [<?= $realisasi_apbd_provinsi['arr_operasi'] ?>],
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
            },{
                type: 'column',
                name: 'Belanja Modal',
                data: [<?= $realisasi_apbd_provinsi['arr_modal'] ?>],
                    dataLabels: {
                          enabled: true,
                          borderRadius: 5,
                          backgroundColor: 'rgba(255, 45, 0, 0.7)',
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
                name: 'Belanja Tak Terduga',
                data: [<?= $realisasi_apbd_provinsi['arr_takterduga'] ?>],
                    dataLabels: {
                          enabled: true,
                          borderRadius: 5,
                          backgroundColor: 'rgba(4, 117, 111, 0.7)',
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
                name: 'Belanja Transfer',
                data: [<?= $realisasi_apbd_provinsi['arr_beltransfer'] ?>],
                    dataLabels: {
                          enabled: true,
                          borderRadius: 5,
                          backgroundColor: 'rgba(5, 81, 141, 0.7)',
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