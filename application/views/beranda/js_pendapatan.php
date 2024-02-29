<script>
    $(document).ready(function() {
        load_data();
    });

    function load_data() {
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
                url: "<?= site_url('beranda/load1'); ?>",
                type: 'POST'
            },
            columnDefs: [{
                className: 'text-right',
                targets: [2, 3, 4]
            }, {
                className: 'text-center',
                targets: [0]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'nama_skpd'
            }, {
                data: 'anggaran'
            }, {
                data: 'realisasi_belanja'
            }, {
                data: 'persen_belanja'
            }]
        });

        
        $('#display-content1').css('display', 'none');
        $('.preload').show();
        table = $('#load-content1').DataTable({
            destroy: true,
            ordering: false,
            bAutoWidth: false,
            initComplete: function() {
                $('#display-content1').css('display', 'block');
                $('.preload').hide();
            },
            ajax: {
                url: "<?= site_url('beranda/load2'); ?>",
                type: 'POST'
            },
            columnDefs: [{
                className: 'text-right',
                targets: [2, 3, 4]
            }, {
                className: 'text-center',
                targets: [0]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'nama_skpd'
            }, {
                data: 'anggaran'
            }, {
                data: 'realisasi_belanja'
            }, {
                data: 'persen_belanja'
            }]
        });
    }
</script>