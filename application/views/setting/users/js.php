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
                url: "<?= site_url('data-user/load'); ?>",
                type: 'POST'
            },
            columnDefs: [{
                className: 'text-center',
                targets: [0, 1, 2]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'foto'
            }, {
                data: 'username'
            }, {
                data: 'nama_user'
            }, {
                data: 'nip_user'
            }, {
                data: 'nama_skpd'
            }, {
                data: 'keterangan'
            }, {
                data: 'password'
            }, {
                data: 'opsi'
            }]
        });
    }

    function reload_ajax() {
        table.ajax.reload(null, false);
    }

    $(document).on("click", "#tombol-tambah", function() {
        url = "<?= site_url('data-user/form'); ?>";
        id = null;
        icon_tombol = "TAMBAH DATA";
        load_form(url, id, "add", "#load-form-action", "#tombol-tambah", icon_tombol);
    });

    $(document).on("click", "#tombol-ubah", function() {
        url = "<?= site_url('data-user/form'); ?>";
        id = $(this).data('id');
        load_form(url, id, "edit", "#load-form-action");
    });

    $(document).on("click", "#btn-tambah", function() {
        url = "<?= site_url('data-user/add'); ?>";
        simpan_form(url, "#form-tambah", "#btn-tambah", "#modal-form-action", "reload");
    });

    $(document).on("click", "#btn-ubah", function() {
        url = "<?= site_url('data-user/edit'); ?>";
        simpan_form(url, "#form-ubah", "#btn-ubah", "#modal-form-action", "reload");
    });

    $(document).on("click", "#tombol-hapus", function(e) {
        e.preventDefault();
        url = '<?= site_url('data-user/delete'); ?>';
        id = $(this).data('id');
        hapus_data(url, id, "reload");
    });

    // ============================================================================
    $(document).on("click", "#tombol-password", function() {
        url = "<?= site_url('profil-user/form_password'); ?>";
        id = $(this).data('id');
        load_form(url, id, "edit", "#load-form-password");
    });

    $(document).on("click", "#btn-password", function() {
        url = "<?= site_url('profil-user/edit_password'); ?>";
        simpan_form(url, "#form-password", "#btn-password", "#modal-password", "reload");
    });
</script>