
<script type="text/javascript">
    $(document).ready(function() {
        Highcharts.chart('struktur-anggaran', {
            chart: {
                backgroundColor: '#d2e4da',
                height: 360,
                inverted: true
            },
            title: {
                text: 'Struktur Anggaran Pendapatan Pada APBD Kabupaten/Kota'
            },
            accessibility: {
                point: {
                    descriptionFormatter: function(point) {
                        var nodeName = point.toNode.name,
                            nodeId = point.toNode.id,
                            nodeDesc = nodeName === nodeId ? nodeName : nodeName + ', ' + nodeId,
                            parentDesc = point.fromNode.id;
                        return point.index + '. ' + nodeDesc + ', reports to ' + parentDesc + '.';
                    }
                }
            },
            credits: {
                enabled: false
            },
                exporting: { enabled: false },
            series: [{
                type: 'organization',
                name: 'Struktur Anggaran Pendapatan',
                keys: ['from', 'to'],
                data: [
                    ['Pendapatan', 'PAD'],
                    ['Pendapatan', 'Transfer'],
                    ['Pendapatan', 'Lain2 PD yang Sah'],
                    ['Transfer', 'DBH'],
                    ['Transfer', 'DAU'],
                    ['Transfer', 'DAK Fisik'],
                    ['Transfer', 'DAK Non Fisik'],
                    ['Transfer', 'DID'],
                    ['Transfer', 'Dana Desa']
                ],
                levels: [{
                    level: 0,
                    color: 'silver',
                    dataLabels: {
                        color: 'black'
                    },
                    height: 25
                }, {
                    level: 1,
                    color: 'silver',
                    dataLabels: {
                        color: 'black'
                    },
                    height: 25
                }, {
                    level: 2,
                    color: '#980104'
                }, {
                    level: 4,
                    color: '#359154'
                }],
                nodes: [{
                    id: 'Pendapatan',
                    title: 'Rp <?= format_angka($row_pendapatan['pendapatan']) ?>'
                }, {
                    id: 'PAD',
                    color: '#33cccc',
                    title: 'Rp <?= format_angka($row_pendapatan['pad']) ?>'
                }, {
                    id: 'Transfer',
                    color: '#33cc33',
                    title: 'Rp <?= format_angka($row_pendapatan['transfer']) ?>'
                }, {
                    id: 'Lain2 PD yang Sah',
                    color: '#b38600',
                    title: 'Rp <?= format_angka($row_pendapatan['pd_lain']) ?>'
                }, {
                    id: 'DBH',
                    color: '#33cc33',
                    title: 'Rp <?= format_angka($row_pendapatan['dbh']) ?>'
                }, {
                    id: 'DAU',
                    color: '#14ad14',
                    title: 'Rp <?= format_angka($row_pendapatan['dau']) ?>'
                }, {
                    id: 'DAK Fisik',
                    color: '#008d00',
                    title: 'Rp <?= format_angka($row_pendapatan['dakfisik']) ?>'
                }, {
                    id: 'DAK Non Fisik',
                    color: '#006d00',
                    title: 'Rp <?= format_angka($row_pendapatan['daknon']) ?>'
                }, {
                    id: 'DID',
                    color: '#035005',
                    title: 'Rp <?= format_angka($row_pendapatan['did']) ?>'
                }, {
                    id: 'Dana Desa',
                    color: '#034004',
                    title: 'Rp <?= format_angka($row_pendapatan['desa']) ?>'
                }],
                colorByPoint: false,
                color: '#007ad0',
                dataLabels: {
                    color: 'white'
                },
                borderColor: 'white',
                nodeWidth: 65
            }],
            tooltip: {
                outside: true
            },
            exporting: {
                allowHTML: true,
                sourceWidth: 800,
                sourceHeight: 600
            }
        });
    });
</script>