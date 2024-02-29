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
                url: "<?= site_url('dana-tp/load_anggaran'); ?>",
                type: 'POST',
                data: {
                    id: "<?= $skpd['id_skpd']; ?>",
                    tahun: tahun
                }
            },
            columnDefs: [{
                className: 'text-center',
                targets: [0, 1, 4]
            },{
                className: 'text-right',
                targets: [2]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'kd_satker'
            }, {
                data: 'pagu'
            }, {
                data: 'keterangan'
            }, {
                data: 'opsi'
            }]
        });
    }


    function reload_ajax() {
        table.ajax.reload(null, false);
    }

    $(document).on("click", "#tombol-tambah", function() {
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i>");
        $.ajax({
            url: '<?= site_url('dana-tp/form'); ?>',
            type: "POST",
            data: {
                opsi: "add",
                id_skpd: "<?= $skpd['id_skpd']; ?>",
                tahun: "<?=$tahun?>"
            },
            success: function(data) {
                $('#load-form-action').html(data);
                $(self).html('TAMBAH DATA');
                $(self).attr('disabled', false);
            }
        });
    });

    $(document).on("submit", "#form-tambah", function(e) {
        e.preventDefault(e);
        var self = "#btn-tambah";
        var form_id = "#form-tambah";
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
        $.ajax({
            url: "<?= site_url('dana-tp/add'); ?>",
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

    $(document).on("click", "#tombol-ubah", function() {
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i>");
        $.ajax({
            url: '<?= site_url('dana-tp/form'); ?>',
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
            url: "<?= site_url('dana-tp/edit'); ?>",
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
        url = '<?= site_url('dana-tp/delete'); ?>';
        id = $(this).data('id');
        hapus_data(url, id, "reload");
    });

$(document).on("click", "#btn-tampil", function(e) {
    e.preventDefault();
    var self = this;
    $(self).attr('disabled', true);
    $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
    var tahun = $('#tahun').val();
    load_data(tahun);
});
</script>