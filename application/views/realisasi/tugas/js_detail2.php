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
                url: "<?= site_url('realisasi-dana-tp/load_apbd2'); ?>",
                type: 'POST',
                data: {
                    id: "<?= $skpd['id_skpd']; ?>",
                    bulan: "<?=$bulan ?>",
                    tahun: "<?= $tahun; ?>"
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [4, 5]
            }, {
                className: 'text-center',
                targets: [0, 1, 2, 3, 6, 7]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'tahun'
            }, {
                data: 'bulan'
            }, {
                data: 'kd_satker'
            }, {
                data: 'pagu'
            }, {
                data: 'realisasi'
            }, {
                data: 'persen'
            }, {
                data: 'opsi'
            }]
        });
    }
    

    function reload_ajax() {
        table.ajax.reload(null, false);
    }

$(document).on("click", "#tombol-ubah", function() {
    var self = this;
    $(self).attr('disabled', true);
    $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i>");
    $.ajax({
        url: '<?= site_url('realisasi-dana-tp/form'); ?>',
        type: "POST",
        data: {
            opsi: "edit",
            id: $(this).data('id')
        },
        success: function(data) {
            $('#load-form-action').html(data);
            $(self).html('<i class="fa fa-edit"></i>');
            $(self).attr('disabled', false);
        }
    });
});

$(document).on("submit", "#form-ubah", function(e) {
    e.preventDefault(e);
    var self = "#btn-ubah";
    var form_id = "#form-ubah";
    $(self).attr('disabled', true);
    $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
    $.ajax({
        url: "<?= site_url('realisasi-dana-tp/edit'); ?>",
        type: 'POST',
        data: $(form_id).serialize(),
        dataType: "json",
        success: function(data) {
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
    url = '<?= site_url('realisasi-dana-tp/delete'); ?>';
    id = $(this).data('id');
    hapus_data(url, id, "reload");
});
</script>