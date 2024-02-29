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
                url: "<?= site_url('upload/lra-pemko/load'); ?>",
                type: 'POST'
            },
            columnDefs: [{
                className: 'text-right',
                targets: [3, 4, 5, 6]
            }, {
                className: 'text-center',
                targets: [0, 1, 2, 7, 8, 9]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'tahun'
            }, {
                data: 'bulan'
            }, {
                data: 'realisasi_pendapatan'
            }, {
                data: 'persen_pendapatan'
            }, {
                data: 'realisasi_belanja'
            }, {
                data: 'persen_belanja'
            }, {
                data: 'tanggal_data'
            }, {
                data: 'tanggal_input'
            }, {
                data: 'user_input'
            }]
        });
    }

    function reload_ajax() {
        table.ajax.reload(null, false);
    }

    $(document).on("click", "#tombol-upload", function() {
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
        $.ajax({
            url: '<?= site_url('upload/lra-pemko/form-upload'); ?>',
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
            url: "<?= site_url('upload/lra-pemko/upload'); ?>",
            type: "POST",
            enctype: 'multipart/form-data',
            data: new FormData($(form_id)[0]),
            dataType: "json",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                console.log(data);
                if (data.status) {
                    $('#modal-form-action').modal('hide');
                    reload_ajax();
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

    $(document).on("click", "#tombol-hapus", function(e) {
        e.preventDefault();
        swal({
            title: 'Konfirmasi Hapus',
            text: "Apakah Anda Yakin Akan Menghapus Data Ini?",
            icon: 'warning',
            buttons: {
                confirm: {
                    text: 'HAPUS DATA',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    text: 'BATAL',
                    className: 'btn btn-danger'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                $.ajax({
                    url: '<?= site_url('upload/lra-pemko/delete'); ?>',
                    type: "POST",
                    data: {
                        id: $(this).data('id')
                    },
                    success: function(data) {
                        reload_ajax();
                        if (data.notif) {
                            notifikasi('success', 'Berhasil', 'Data Berhasil Dihapus');
                        } else {
                            notifikasi('error', 'Gagal', 'Data Gagal Dihapus');
                        }
                    }
                });
            }
        })
    });
</script>