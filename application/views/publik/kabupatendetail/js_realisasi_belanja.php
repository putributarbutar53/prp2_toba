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
                url: "<?= site_url('publik/kabupatendetail/load_realisasi_belanja'); ?>",
                type: 'POST'
            },
            columnDefs: [{
                className: 'text-right',
                targets: [2, 3, 5, 6]
            }, {
                className: 'text-center',
                targets: [0, 4, 7]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'nama_kabupaten'
            }, {
                data: 'pendapatan'
            }, {
                data: 'realisasi_pendapatan'
            }, {
                data: 'persen_pendapatan'
            }, {
                data: 'belanja'
            }, {
                data: 'realisasi_belanja'
            }, {
                data: 'persen_belanja'
            }]
        });

    }
</script>