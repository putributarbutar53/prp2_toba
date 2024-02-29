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
                url: "<?= site_url('apbd/load'); ?>",
                type: 'POST'
            },
            columnDefs: [{
                className: 'text-center',
                targets: [0]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'nama_skpd'
            }, {
                data: 'pagu'
            }, {
                data: 'realisasi'
            }, {
                data: 'npersen'
            }]
        });
    }

    function reload_ajax() {
        table.ajax.reload(null, false);
    }

    $(document).on("click", "#tombol-tambah", function() {
        url = "<?= site_url('instansi/form'); ?>";
        id = null;
        icon_tombol = "TAMBAH DATA";
        load_form(url, id, "add", "#load-form-action", "#tombol-tambah", icon_tombol);
    });

    $(document).on("click", "#tombol-ubah", function() {
        url = "<?= site_url('instansi/form'); ?>";
        id = $(this).data('id');
        load_form(url, id, "edit", "#load-form-action");
    });

    $(document).on("click", "#btn-tambah", function() {
        url = "<?= site_url('instansi/add'); ?>";
        simpan_form(url, "#form-tambah", "#btn-tambah", "#modal-form-action", "reload");
    });

    $(document).on("click", "#btn-ubah", function() {
        url = "<?= site_url('instansi/edit'); ?>";
        simpan_form(url, "#form-ubah", "#btn-ubah", "#modal-form-action", "reload");
    });

    $(document).on("click", "#tombol-hapus", function(e) {
        e.preventDefault();
        url = '<?= site_url('instansi/delete'); ?>';
        id = $(this).data('id');
        hapus_data(url, id, "reload");
    });

    function cek_kabupaten(provinsi, kabupaten, tampil_kabupaten) {
        $.ajax({
            url: '<?= site_url('cek/kabupaten'); ?>',
            type: "POST",
            data: {
                id_provinsi: provinsi,
                id_kabupaten: kabupaten
            },
            success: function(data) {
                $(tampil_kabupaten).html(data);
            }
        });
    }
</script>