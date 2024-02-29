<script>
    $(document).ready(function() {
        load_apbd();
    });

    function load_apbd() {
        $('#display-content').css('display', 'none');
        $('.preload').show();
        table = $('#load-content').DataTable({
            destroy: true,
            ordering: false,
            bAutoWidth: false,
            initComplete: function() {
                $('#display-content').css('display', 'block');
                $('.preload').hide();
            },
            ajax: {
                url: "<?= site_url('upload/lra-pemko/load-detail'); ?>",
                type: 'POST',
                data: {
                    bulan: "<?=$bulan?>"
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [5, 6, 7]
            }, {
                className: 'text-center',
                targets: [0, 1, 2]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'tahun'
            }, {
                data: 'bulan'
            }, {
                data: 'kode_rekening'
            }, {
                data: 'uraian'
            }, {
                data: 'anggaran'
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