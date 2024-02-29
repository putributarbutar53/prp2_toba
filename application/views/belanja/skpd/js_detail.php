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
                url: "<?= site_url('belanja/skpd/load_belanja'); ?>",
                type: 'POST',
                data: {
                    id: "<?= $skpd['id_skpd']; ?>",
                    tahun: "<?= $tahun_data; ?>"
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

$(document).on("click", "#btn-tampil", function(e) {
    e.preventDefault();
    var self = this;
    $(self).attr('disabled', true);
    $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
    var tahun = $('#tahun').val();
    load_data(tahun);
});
</script>