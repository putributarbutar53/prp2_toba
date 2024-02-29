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
                url: "<?= site_url('publik/dashboard/load_realisasi_belanja'); ?>",
                type: 'POST',
                data: {
                    tahun_data: "<?= $tahun_data; ?>"
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [4, 5]
            }, {
                className: 'text-center',
                targets: [0, 2, 3, 6]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'nama_skpd'
            }, {
                data: 'bulan'
            }, {
                data: 'pendapatan'
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