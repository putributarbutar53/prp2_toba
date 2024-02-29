<script>
    $(document).ready(function() {
        load_data();
    });

    function load_data() {
        $('#display-content').css('display', 'none');
        $('.preload').show();
        $.ajax({
            url: '<?= site_url('profil-user/load'); ?>',
            type: "POST",
            success: function(data) {
                $('#load-content').html(data);
                $('#display-content').css('display', 'block');
                $('.preload').hide();
            }
        });
    }


    $(document).on("click", "#tombol-foto", function() {
        url = "<?= site_url('profil-user/form_foto'); ?>";
        id = $(this).data('id');
        icon_tombol = '<i class="fa fa-key"></i> EDIT PHOTO PROFILE';
        load_form(url, id, "edit", "#load-form-foto", "#tombol-foto", icon_tombol);
    });

    $(document).on("click", "#btn-foto", function() {
        url = "<?= site_url('profil-user/edit_foto'); ?>";
        simpan_form_multipart(url, "#form-foto", "#btn-foto", "#modal-foto", "load");
    });

    $(document).on("click", "#tombol-password", function() {
        url = "<?= site_url('profil-user/form_password'); ?>";
        id = $(this).data('id');
        icon_tombol = '<i class="fa fa-user"></i> EDIT PASSWORD';
        load_form(url, id, "edit", "#load-form-password", "#tombol-password", icon_tombol);
    });

    $(document).on("click", "#btn-password", function() {
        url = "<?= site_url('profil-user/edit_password'); ?>";
        simpan_form(url, "#form-password", "#btn-password", "#modal-password", "load");
    });
</script>