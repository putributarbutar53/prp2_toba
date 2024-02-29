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
            searching: false,
            paging: false,
            info: false,
            initComplete: function() {
                $('#display-content').css('display', 'block');
                $('.preload').hide();
            },
            ajax: {
                url: "<?= site_url('publik/dashboard/load_realisasi_pendapatan'); ?>",
                type: 'POST'
            },
            columnDefs: [{
                className: 'text-right',
                targets: [2, 3, 4]
            }, {
                className: 'text-center',
                targets: [0, 5]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'nama_skpd'
            }, {
                data: 'anggaran_all'
            }, {
                data: 'anggaran'
            }, {
                data: 'realisasi'
            }, {
                data: 'persen'
            }]
        });

    }
</script>