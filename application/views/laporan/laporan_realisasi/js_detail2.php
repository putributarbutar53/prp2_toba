<script>
    $(document).ready(function() {
        load_apbd();
    });

    function load_apbd() {
        $('#display-content1').css('display', 'none');
        $('.preload1').show();
        table = $('#load-content1').DataTable({
            destroy: true,
            ordering: false,
            bAutoWidth: false,
            initComplete: function() {
                $('#display-content1').css('display', 'block');
                $('.preload1').hide();
            },
            ajax: {
                url: "<?= site_url('laporan/laporan_realisasi/load_apbd2'); ?>",
                type: 'POST',
                data: {
                    id: "<?= $skpd['id_skpd']; ?>",
                    bulan: "<?=$bulan ?>",
                    level: "<?=$level ?>"
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [3, 4, 5, 6, 7]
            }, {
                className: 'text-center',
                targets: [0]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'kode_rekening'
            }, {
                data: 'uraian'
            }, {
                data: 'anggaran'
            }, {
                data: 'realisasi_1'
            }, {
                data: 'persen_1'
            }, {
                data: 'realisasi'
            }, {
                data: 'persen'
            }]
        });
    }
    

    function reload_ajax() {
        table.ajax.reload(null, false);
    }

</script>