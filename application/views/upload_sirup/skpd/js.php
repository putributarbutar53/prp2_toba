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
                url: "<?= site_url('upload_sirup/skpd/load'); ?>",
                type: 'POST'
            },
            columnDefs: [{
                className: 'text-right',
                targets: [2]
            }, {
                className: 'text-center',
                targets: [0]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'nama_skpd'
            }, {
                data: 'pagu'
            }]
        });
    }
</script>