<script>
    $(document).ready(function() {
        $('#load-content').DataTable({
            ordering: false
        });
    });

    //==========================================================
    $(document).on("click", "#tombol-ubah", function() {
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
        $.ajax({
            url: '<?= site_url('akses-menu/form-edit'); ?>',
            type: "POST",
            data: {
                id: $(this).data('id')
            },
            success: function(data) {
                $('#load-form-modal').html(data);
                $(self).html("<i class='fa fa-user-lock'></i> AKSES MENU");
                $(self).attr('disabled', false);
            }
        });
    });

    $(document).on("click", "#btn-ubah", function() {
        var self = "#btn-ubah";
        var form_id = "#form-ubah";
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
        $.ajax({
            url: "<?= site_url('akses-menu/edit'); ?>",
            type: 'POST',
            data: $(form_id).serialize(),
            dataType: "json",
            success: function(data) {
                if (data.status) {
                    $('#modal-form-action').modal('hide');
                    if (data.notif) {
                        notifikasi('success', 'Berhasil', 'Data Berhasil Disimpan');
                    } else {
                        notifikasi('error', 'Gagal', 'Data Gagal Disimpan');
                    }
                } else {
                    notifikasi('error', 'Gagal', data.pesan);
                    $.each(data.errors, function(key, value) {
                        $(form_id + ' [name="' + key + '"]').parents(".form-group").removeClass('has-success');
                        $(form_id + ' [name="' + key + '"]').parents(".form-group").addClass('has-error');
                        $(form_id + ' .' + key).html(value);
                        if (value == "") {
                            $(form_id + ' [name="' + key + '"]').parents(".form-group").removeClass('has-error');
                            $(form_id + ' [name="' + key + '"]').parents(".form-group").addClass('has-success');
                        }
                    });
                }
                $(self).html("<i class='fa fa-save'></i> SIMPAN");
                $(self).attr('disabled', false);
            },
            error: function(xhr, status, msg) {
                alert('Status: ' + status + "\n" + msg);
                $(self).html("<i class='fa fa-save'></i> SIMPAN");
                $(self).attr('disabled', false);
            }
        });
    });
</script>