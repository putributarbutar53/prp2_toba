<script>
    $(document).ready(function() {
        load_apbd1();
        load_apbd2();
        load_apbd3();
        load_apbd4();
        load_apbd5();
        load_apbd6();
    });

    function load_apbd1() {
        $('#display-content1').css('display', 'none');
        $('.preload1').show();
        table = $('#load-content1').DataTable({
            destroy: true,
            ordering: false,
            bAutoWidth: false,
            initComplete: function() {
                $('#display-content1').css('display', 'block');
                $('.preload1').hide();
            },
            ajax: {
                url: "<?= site_url('laporan/realisasi_keuangan/load_apbd2'); ?>",
                type: 'POST',
                data: {
                    id: "<?= $skpd['id_skpd']; ?>",
                    bulan: "<?=$bulan ?>"
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [3, 4, 5, 6, 7]
            }, {
                className: 'text-center',
                targets: [0]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'kode_rekening'
            }, {
                data: 'uraian'
            }, {
                data: 'anggaran'
            }, {
                data: 'realisasi_1'
            }, {
                data: 'persen_1'
            }, {
                data: 'realisasi'
            }, {
                data: 'persen'
            }]
        });
    }

    function load_apbd2() {
        $('#display-content2').css('display', 'none');
        $('.preload2').show();
        table = $('#load-content2').DataTable({
            destroy: true,
            ordering: false,
            bAutoWidth: false,
            initComplete: function() {
                $('#display-content2').css('display', 'block');
                $('.preload2').hide();
            },
            ajax: {
                url: "<?= site_url('laporan/realisasi_keuangan/load_level2'); ?>",
                type: 'POST',
                data: {
                    id: "<?= $skpd['id_skpd']; ?>",
                    bulan: "<?=$bulan ?>"
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [3, 4, 5, 6, 7]
            }, {
                className: 'text-center',
                targets: [0]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'kode_rekening'
            }, {
                data: 'uraian'
            }, {
                data: 'anggaran'
            }, {
                data: 'realisasi_1'
            }, {
                data: 'persen_1'
            }, {
                data: 'realisasi'
            }, {
                data: 'persen'
            }]
        });
    }

    function load_apbd3() {
        $('#display-content3').css('display', 'none');
        $('.preload3').show();
        table = $('#load-content3').DataTable({
            destroy: true,
            ordering: false,
            bAutoWidth: false,
            initComplete: function() {
                $('#display-content3').css('display', 'block');
                $('.preload3').hide();
            },
            ajax: {
                url: "<?= site_url('laporan/realisasi_keuangan/load_level3'); ?>",
                type: 'POST',
                data: {
                    id: "<?= $skpd['id_skpd']; ?>",
                    bulan: "<?=$bulan ?>"
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [3, 4, 5, 6, 7]
            }, {
                className: 'text-center',
                targets: [0]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'kode_rekening'
            }, {
                data: 'uraian'
            }, {
                data: 'anggaran'
            }, {
                data: 'realisasi_1'
            }, {
                data: 'persen_1'
            }, {
                data: 'realisasi'
            }, {
                data: 'persen'
            }]
        });
    }

    function load_apbd4() {
        $('#display-content4').css('display', 'none');
        $('.preload4').show();
        table = $('#load-content4').DataTable({
            destroy: true,
            ordering: false,
            bAutoWidth: false,
            initComplete: function() {
                $('#display-content4').css('display', 'block');
                $('.preload4').hide();
            },
            ajax: {
                url: "<?= site_url('laporan/realisasi_keuangan/load_level4'); ?>",
                type: 'POST',
                data: {
                    id: "<?= $skpd['id_skpd']; ?>",
                    bulan: "<?=$bulan ?>"
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [3, 4, 5, 6, 7]
            }, {
                className: 'text-center',
                targets: [0]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'kode_rekening'
            }, {
                data: 'uraian'
            }, {
                data: 'anggaran'
            }, {
                data: 'realisasi_1'
            }, {
                data: 'persen_1'
            }, {
                data: 'realisasi'
            }, {
                data: 'persen'
            }]
        });
    }

    function load_apbd5() {
        $('#display-content5').css('display', 'none');
        $('.preload5').show();
        table = $('#load-content5').DataTable({
            destroy: true,
            ordering: false,
            bAutoWidth: false,
            initComplete: function() {
                $('#display-content5').css('display', 'block');
                $('.preload5').hide();
            },
            ajax: {
                url: "<?= site_url('laporan/realisasi_keuangan/load_level5'); ?>",
                type: 'POST',
                data: {
                    id: "<?= $skpd['id_skpd']; ?>",
                    bulan: "<?=$bulan ?>"
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [3, 4, 5, 6, 7]
            }, {
                className: 'text-center',
                targets: [0]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'kode_rekening'
            }, {
                data: 'uraian'
            }, {
                data: 'anggaran'
            }, {
                data: 'realisasi_1'
            }, {
                data: 'persen_1'
            }, {
                data: 'realisasi'
            }, {
                data: 'persen'
            }]
        });
    }

    function load_apbd6() {
        $('#display-content6').css('display', 'none');
        $('.preload6').show();
        table = $('#load-content6').DataTable({
            destroy: true,
            ordering: false,
            bAutoWidth: false,
            initComplete: function() {
                $('#display-content6').css('display', 'block');
                $('.preload6').hide();
            },
            ajax: {
                url: "<?= site_url('laporan/realisasi_keuangan/load_level6'); ?>",
                type: 'POST',
                data: {
                    id: "<?= $skpd['id_skpd']; ?>",
                    bulan: "<?=$bulan ?>"
                }
            },
            columnDefs: [{
                className: 'text-right',
                targets: [3, 4, 5, 6, 7]
            }, {
                className: 'text-center',
                targets: [0]
            }],
            columns: [{
                data: 'no'
            }, {
                data: 'kode_rekening'
            }, {
                data: 'uraian'
            }, {
                data: 'anggaran'
            }, {
                data: 'realisasi_1'
            }, {
                data: 'persen_1'
            }, {
                data: 'realisasi'
            }, {
                data: 'persen'
            }]
        });
    }
    
    function reload_ajax() {
        table.ajax.reload(null, false);
    }

    $(document).on("click", "#tombol-level1", function() {
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i>");
        $.ajax({
            url: '<?= site_url('laporan/realisasi_keuangan/form_level'); ?>',
            type: "POST",
            data: {
                skpd: "<?= $skpd['id_skpd']; ?>",
                bulan: "<?= $bulan; ?>",
                level: 1
            },
            success: function(data) {
                $('#load-form-level1').html(data);
                $(self).html('KIRIM LAPORAN');
                $(self).attr('disabled', false);
            }
        });
    });

    $(document).on("click", "#tombol-level2", function() {
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i>");
        $.ajax({
            url: '<?= site_url('laporan/realisasi_keuangan/form_level'); ?>',
            type: "POST",
            data: {
                skpd: "<?= $skpd['id_skpd']; ?>",
                bulan: "<?= $bulan; ?>",
                level: 2
            },
            success: function(data) {
                $('#load-form-level2').html(data);
                $(self).html('KIRIM LAPORAN');
                $(self).attr('disabled', false);
            }
        });
    });

    $(document).on("click", "#tombol-level3", function() {
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i>");
        $.ajax({
            url: '<?= site_url('laporan/realisasi_keuangan/form_level'); ?>',
            type: "POST",
            data: {
                skpd: "<?= $skpd['id_skpd']; ?>",
                bulan: "<?= $bulan; ?>",
                level: 3
            },
            success: function(data) {
                $('#load-form-level3').html(data);
                $(self).html('KIRIM LAPORAN');
                $(self).attr('disabled', false);
            }
        });
    });

    $(document).on("click", "#tombol-level4", function() {
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i>");
        $.ajax({
            url: '<?= site_url('laporan/realisasi_keuangan/form_level'); ?>',
            type: "POST",
            data: {
                skpd: "<?= $skpd['id_skpd']; ?>",
                bulan: "<?= $bulan; ?>",
                level: 4
            },
            success: function(data) {
                $('#load-form-level4').html(data);
                $(self).html('KIRIM LAPORAN');
                $(self).attr('disabled', false);
            }
        });
    });

    $(document).on("click", "#tombol-level5", function() {
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i>");
        $.ajax({
            url: '<?= site_url('laporan/realisasi_keuangan/form_level'); ?>',
            type: "POST",
            data: {
                skpd: "<?= $skpd['id_skpd']; ?>",
                bulan: "<?= $bulan; ?>",
                level: 5
            },
            success: function(data) {
                $('#load-form-level5').html(data);
                $(self).html('KIRIM LAPORAN');
                $(self).attr('disabled', false);
            }
        });
    });

    $(document).on("click", "#tombol-level6", function() {
        var self = this;
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i>");
        $.ajax({
            url: '<?= site_url('laporan/realisasi_keuangan/form_level'); ?>',
            type: "POST",
            data: {
                skpd: "<?= $skpd['id_skpd']; ?>",
                bulan: "<?= $bulan; ?>",
                level: 6
            },
            success: function(data) {
                $('#load-form-level6').html(data);
                $(self).html('KIRIM LAPORAN');
                $(self).attr('disabled', false);
            }
        });
    });

    $(document).on("submit", "#form-kirim", function(e) {
        e.preventDefault(e);
        var self = "#btn-kirim";
        var form_id = "#form-kirim";
        $(self).attr('disabled', true);
        $(self).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
        $.ajax({
            url: "<?= site_url('laporan/realisasi_keuangan/kirim_laporan'); ?>",
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

</script>