<script>
    $(document).ready(function() {
        $('.select2').select2();
        var tahun = $('#tahun').val();
        load_data(tahun);
    });

    function load_data(tahun) {
        $('#display-content').css('display', 'none');
        $('.preload').show();
        table = $('#load-content').DataTable({
            destroy: true,
            ordering: false,
            bAutoWidth: false,
            initComplete: function() {
                $('#display-content').css('display', 'block');
                $('.preload').hide();
                $('#btn-tampil').attr('disabled', false);
                $('#btn-tampil').html("<i class='fa fa-search'></i> TAMPILKAN");
            },
            ajax: {
                url: "<?= site_url('upload-lra-kabupaten-kota/load'); ?>",
                type: 'POST',
                data: {
                    tahun: tahun
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [3,4]
            }, {
                className: 'text-center',
                targets: [0,2,5]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'nama_kabupaten'
            }, {
                data: 'bulan'
            }, {
                data: 'pendapatan'
            }, {
                data: 'belanja'
            }, {
                data: 'tanggal'
            }, {
                data: 'tgl_update'
            }]
        });
    }

    $(document).on("click", "#btn-tampil", function(e) {
        e.preventDefault();
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
        var tahun = $('#tahun').val();
        load_data(tahun);
    });
</script>