<script type="text/javascript">
    $(document).ready(function() {
        var chartsunburst = new Highcharts.chart('alokasi-pendapatan', {
            chart: {
                // backgroundColor: '#FCFFC5'
                backgroundColor: '#d2e4da'
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
                    value: <?= $row_pendapatan['pad'] ?>
                }, {
                    id: 'B1',
                    name: 'DBH',
                    parent: 'B',
                    value: <?= $row_pendapatan['dbh'] ?>
                }, {
                    id: 'B2',
                    name: 'DAU',
                    parent: 'B',
                    value: <?= $row_pendapatan['dau'] ?>
                }, {
                    id: 'B3',
                    name: 'DAK Fisik',
                    parent: 'B',
                    value: <?= $row_pendapatan['dakfisik'] ?>
                }, {
                    id: 'B4',
                    name: 'DAK Non Fisik',
                    parent: 'B',
                    value: <?= $row_pendapatan['daknon'] ?>
                }, {
                    id: 'B5',
                    name: 'DID',
                    parent: 'B',
                    value: <?= $row_pendapatan['did'] ?>
                }, {
                    id: 'B6',
                    name: 'Dana Desa',
                    parent: 'B',
                    value: <?= $row_pendapatan['desa'] ?>
                }, {
                    id: 'C1',
                    name: 'Lain Lain Pendapatan Daerah yang Sah',
                    parent: 'C',
                    color: '#b38600',
                    value: <?= $row_pendapatan['pd_lain'] ?>
                }]
            }]
        });
    });
</script>