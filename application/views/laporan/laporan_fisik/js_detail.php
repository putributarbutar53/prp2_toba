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
                url: "<?= site_url('laporan/laporan_fisik/load_kegiatan'); ?>",
                type: 'POST',
                data: {
                    skpd: "<?= $skpd['id_skpd']; ?>",
                    tahun: tahun
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [4]
            }, {
                className: 'text-center',
                targets: [0, 3, 6]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'no_kontrak'
            }, {
                data: 'keperluan'
            }, {
                data: 'waktu'
            }, {
                data: 'nilai'
            }, {
                data: 'realisasi'
            }, {
                data: 'persen'
            }, {
                data: 'nama_pa'
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

    $(document).on("click", "#tombol-preview", function() {
        var tahun = $("#tahun").val();
        window.open ("<?= site_url('pdf-preview-laporan-fisik/'); ?>"+tahun+"/<?= encrypt_url($skpd['id_skpd']); ?>","_blank");
    });

    $(document).on("click", "#tombol-cetak", function() {
        var tahun = $("#tahun").val();
        window.open ("<?= site_url('pdf-cetak-laporan-fisik/'); ?>"+tahun+"/<?= encrypt_url($skpd['id_skpd']); ?>","_blank");
    });

    $(document).on("click", "#tombol-ubah", function() {
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i>");
        $.ajax({
            url: '<?= site_url('kegiatan/kegiatan/form'); ?>',
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
            url: "<?= site_url('kegiatan/kegiatan/edit'); ?>",
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
                    url: '<?= site_url('kegiatan/kegiatan/delete'); ?>',
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