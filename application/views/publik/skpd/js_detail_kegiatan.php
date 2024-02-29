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
                url: "<?= site_url('publik/skpd/load_kegiatan'); ?>",
                type: 'POST',
                data: {
                    skpd: "<?= $skpd['id_skpd']; ?>",
                    tahun_data: "<?= $tahun_data; ?>"
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [3, 4]
            }, {
                className: 'text-center',
                targets: [0, 2, 5]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'keperluan'
            }, {
                data: 'waktu'
            }, {
                data: 'nilai'
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