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
                url: "<?= site_url('apbd/load_apbd'); ?>",
                type: 'POST',
                data: {
                    id: "<?= $skpd['id_skpd']; ?>"
                }
            },
            columnDefs: [{
                className: 'text-center',
                targets: [0, 1, 2, 7]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'tahun'
            }, {
                data: 'bulan'
            }, {
                data: 'pagu'
            }, {
                data: 'realisasi_atbulan'
            }, {
                data: 'realisasi_sdbulan'
            }, {
                data: 'sisa'
            }, {
                data: 'tanggal_input'
            }, {
                data: 'opsi'
            }]
        });
    }


    function reload_ajax() {
        table.ajax.reload(null, false);
    }


    $(document).on("click", "#tombol-tambah", function() {
        url = "<?= site_url('apbd/form_upload'); ?>";
        id = "<?= encrypt_url($skpd['id_skpd']); ?>";
        icon_tombol = "Upload Excel";
        load_form(url, id, "add", "#load-form-action", "#tombol-tambah", icon_tombol);
    });

    $(document).on("click", "#btn-tambah", function() {
        url = "<?= site_url('apbd/add_upload'); ?>";
        simpan_form_multipart(url, "#form-tambah", "#btn-tambah", "#modal-form-action", "reload");
    });
    
    $(document).on("click", "#tombol-hapus", function(e) {
        e.preventDefault();
        url = '<?= site_url('apbd/delete'); ?>';
        id = $(this).data('id');
        hapus_data(url, id, "reload");
    });

</script>