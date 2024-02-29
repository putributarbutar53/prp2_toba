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
                url: "<?= site_url('master/mandatory_kabupaten/load'); ?>",
                type: 'POST'
            },
            columnDefs: [{
                className: 'text-center',
                targets: [0,2,3,4]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'nama_kabupaten'
            }, {
                data: 'pendidikan'
            }, {
                data: 'kesehatan'
            }, {
                data: 'infrastruktur'
            }]
        });
    }
</script>