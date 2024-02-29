<script>
    $(document).ready(function() {
        load_data();
    });
    $('.select2').select2();

    function load_data() {
        $.ajax({
            url: '<?= site_url('upload-dana-desa/load'); ?>',
            type: "POST",
            data: {
                tahun: "<?= $tahun; ?>",
                bulan: "<?= $bulan; ?>",
                tipe: "tampil"
            },
            success: function(data) {
                $('#widget-danadesa').html(data);
                $('#load-danadesa').css('display', 'block');
                $('.preload-danadesa').hide();
            }
        });
    }

    $(document).on("click", "#btn-tampil", function(e) {
        e.preventDefault();
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
        var tahun = $('#tahun').val();
        var bulan = $('#bulan').val();
        window.location.href = "<?= site_url('upload-dana-desa/'); ?>" + tahun + '/' + bulan;
    });

    $(document).on("click", "#tombol-upload", function() {
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
        $.ajax({
            url: '<?= site_url('upload-dana-desa/form_upload'); ?>',
            type: "POST",
            success: function(data) {
                $('#load-form-action').html(data);
                $(self).html("Upload Excel");
                $(self).attr('disabled', false);
            }
        });
    });

    $(document).on("submit", "#form-upload", function(e) {
        e.preventDefault(e);
        var self = "#btn-upload";
        var form_id = "#form-upload";
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
        $.ajax({
            url: "<?= site_url('upload-dana-desa/upload'); ?>",
            type: "POST",
            enctype: 'multipart/form-data',
            data: new FormData($(form_id)[0]),
            dataType: "json",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                if (data.status) {
                    $('#modal-form-action').modal('hide');
                    load_data();
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