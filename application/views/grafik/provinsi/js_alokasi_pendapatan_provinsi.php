<script type="text/javascript">
    $(document).ready(function() {
        var chartsunburst = new Highcharts.chart('alokasi-pendapatan-provinsi', {
            chart: {
                 backgroundColor: '#daf5be'
                //backgroundColor: '#FCFFC5'
                //backgroundColor: '#d2e4da'
            },
            title: {
                text: 'Persentase Anggaran Pendapatan'
            },
            credits: {
                enabled: false
            },
                exporting: { enabled: false },
            series: [{
                type: "sunburst",
                allowDrillToNode: true,
                cursor: 'pointer',
                levels: [{
                    level: 1,
                    colorByPoint: true
                }, {
                    level: 2,
                    colorVariation: {
                        key: 'brightness',
                        to: -0.5
                    }
                }],
                data: [{
                    id: 'A',
                    name: 'PAD',
                    color: '#33cccc'
                }, {
                    id: 'B',
                    name: 'Transfer',
                    color: '#33cc33'
                }, {
                    id: 'C',
                    name: 'Lain Lain Pendapatan Daerah yang Sah',
                    color: '#b38600'
                }, {
                    id: 'A1',
                    name: 'PAD',
                    parent: 'A',
                    color: '#33cccc',
                    value: <?= $struktur_anggaran_provinsi['pad'] ?>
                }, {
                    id: 'B1',
                    name: 'DBH',
                    parent: 'B',
                    value: <?= $struktur_anggaran_provinsi['dbh'] ?>
                }, {
                    id: 'B2',
                    name: 'DAU',
                    parent: 'B',
                    value: <?= $struktur_anggaran_provinsi['dau'] ?>
                }, {
                    id: 'B3',
                    name: 'DAK Fisik',
                    parent: 'B',
                    value: <?= $struktur_anggaran_provinsi['dak'] ?>
                }, {
                    id: 'B4',
                    name: 'DAK Non Fisik',
                    parent: 'B',
                    value: <?= $struktur_anggaran_provinsi['daknon'] ?>
                }, {
                    id: 'C1',
                    name: 'Lain Lain Pendapatan Daerah yang Sah',
                    parent: 'C',
                    color: '#b38600',
                    value: <?= $struktur_anggaran_provinsi['pad_lain'] ?>
                }]
            }]
        });
    });
</script>