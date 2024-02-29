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
                url: "<?= site_url('publik/skpd/load_belanja'); ?>",
                type: 'POST',
                data: {
                    id: "<?= $skpd['id_skpd']; ?>"
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [3, 4]
            }, {
                className: 'text-center',
                targets: [0, 1, 2, 5, 6, 7]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'tahun'
            }, {
                data: 'bulan'
            }, {
                data: 'anggaran_belanja'
            }, {
                data: 'realisasi'
            }, {
                data: 'persen'
            }, {
                data: 'tanggal_data'
            }, {
                data: 'tanggal_input'
            }]
        });
    }
    

    function reload_ajax() {
        table.ajax.reload(null, false);
    }
</script>