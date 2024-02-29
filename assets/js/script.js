const flashData = $('.flash-data').data('flashdata');

if (flashData != '') {
    notifikasi = flashData.split('-');
    swal({
        icon: notifikasi[0],
        title: notifikasi[1],
        text: notifikasi[2],
        timer: 1500
    });
}

function notifikasi(icon, title, text) {
    swal({
        icon: icon,
        title: title,
        text: text,
        timer: 1500
    });
}

function load_form(url, id, opsi, load_form_modal, id_tombol = null, icon_tombol = null) {
    if (icon_tombol != null) {
        $(id_tombol).attr('disabled', true);
        $(id_tombol).html("<i class='fa fa-circle-notch fa-spin fa-sm'></i> LOADING...");
    }
    $.ajax({
        url: url,
        type: "POST",
        data: {
            id: id,
            opsi: opsi
        },
        success: function (data) {
            $(load_form_modal).html(data);
            if (icon_tombol != null) {
                $(id_tombol).html(icon_tombol);
                $(id_tombol).attr('disabled', false);
            }
        }
    });
}

function simpan_form(url, nama_form, id_tombol, nama_modal, refresh_data) {
    $(this).attr('disabled', true);
    $(this).html("<i class='fa fa-circle-notch fa-spin fa-sm'></> LOADING...");
    $.ajax({
        url: url,
        type: 'POST',
        data: $(nama_form).serialize(),
        dataType: "json",
        success: function (data) {
            if (data.status) {
                $(nama_modal).modal('hide');
                if (refresh_data == 'reload') {
                    reload_ajax()
                } else {
                    load_data();
                }
                if (data.notif) {
                    notifikasi('success', 'Berhasil', 'Data Berhasil Disimpan');
                } else {
                    notifikasi('error', 'Gagal', 'Data Gagal Disimpan');
                }
            } else {
                if (data.pesan == 'blocked') {
                    notifikasi('error', 'Blocked', 'Access Denied...!!!');
                } else {
                    notifikasi('error', 'Gagal', data.pesan);
                }
                $.each(data.errors, function (key, value) {
                    $(nama_form + ' [name="' + key + '"]').parents(".form-group").removeClass('has-success');
                    $(nama_form + ' [name="' + key + '"]').parents(".form-group").addClass('has-error');
                    $(nama_form + ' .' + key).html(value);
                    if (value == "") {
                        $(nama_form + ' [name="' + key + '"]').parents(".form-group").removeClass('has-error');
                        $(nama_form + ' [name="' + key + '"]').parents(".form-group").addClass('has-success');
                    }
                });
            }
            $(id_tombol).html("<i class='fa fa-save'></i> SIMPAN");
            $(id_tombol).attr('disabled', false);
        },
        error: function (xhr, status, msg) {
            // alert('Status: ' + status + "\n" + xhr + msg);
            notifikasi('error', 'Error', 'Access Blocked...!!!');
            $(id_tombol).html("<i class='fa fa-save'></i> SIMPAN");
            $(id_tombol).attr('disabled', false);
        }
    });
}

function simpan_form_multipart(url, nama_form, id_tombol, nama_modal, refresh_data) {
    $(this).attr('disabled', true);
    $(this).html("<i class='fa fa-circle-notch fa-spin fa-sm'></> LOADING...");
    $.ajax({
        url: url,
        type: "POST",
        enctype: 'multipart/form-data',
        data: new FormData($(nama_form)[0]),
        dataType: "json",
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            console.log(data);
            if (data.status) {
                $(nama_modal).modal('hide');
                if (refresh_data == 'reload') {
                    reload_ajax()
                } else {
                    load_data();
                }
                if (data.notif) {
                    notifikasi('success', 'Berhasil', 'Data Berhasil Disimpan');
                } else {
                    notifikasi('error', 'Gagal', 'Data Gagal Disimpan');
                }
            } else {
                if (data.pesan == 'blocked') {
                    notifikasi('error', 'Blocked', 'Access Denied...!!!');
                } else {
                    notifikasi('error', 'Gagal', data.pesan);
                }
                $.each(data.errors, function (key, value) {
                    $(nama_form + ' [name="' + key + '"]').parents(".form-group").removeClass('has-success');
                    $(nama_form + ' [name="' + key + '"]').parents(".form-group").addClass('has-error');
                    $(nama_form + ' .' + key).html(value);
                    if (value == "") {
                        $(nama_form + ' [name="' + key + '"]').parents(".form-group").removeClass('has-error');
                        $(nama_form + ' [name="' + key + '"]').parents(".form-group").addClass('has-success');
                    }
                });
            }
            $(id_tombol).html("<i class='fa fa-save'></i> SIMPAN");
            $(id_tombol).attr('disabled', false);
        },
        error: function (xhr, status, msg) {
            // alert('Status: ' + status + "\n" + xhr + msg);
            notifikasi('error', 'Error', 'Access Blocked...!!!');
            $(id_tombol).html("<i class='fa fa-save'></i> SIMPAN");
            $(id_tombol).attr('disabled', false);
        }
    });
}

function hapus_data(url, id, refresh_data) {
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
                url: url,
                type: "POST",
                data: {
                    id: id
                },
                success: function (data) {
                    if (refresh_data == 'reload') {
                        reload_ajax()
                    } else {
                        load_data();
                    }
                    if (data.notif) {
                        notifikasi('success', 'Berhasil', 'Data Berhasil Dihapus');
                    } else {
                        if (data.pesan == 'blocked') {
                            notifikasi('error', 'Blocked', 'Access Denied...!!!');
                        } else {
                            notifikasi('error', 'Gagal', 'Data Gagal Dihapus');
                        }
                    }
                }
            });
        }
    })
}

function file_pdf(fileupload) {
    var input_file = document.getElementById(fileupload);
    var path_file = input_file.value;
    var extention_ok = /(\.pdf)$/i;
    if (!extention_ok.exec(path_file)) {
        swal({
            icon: 'error',
            title: 'KONFIRMASI',
            text: 'FORMAT EKSTENSI HARUS .PDF',
            timer: 1500
        })
        input_file.value = '';
        return false;
    } else {
        if (input_file.files && input_file.files[0]) {
            if (input_file.files[0].size > 1024000) {
                swal({
                    icon: 'error',
                    title: 'KONFIRMASI',
                    text: 'UKURAN FILE HARUS DI BAWAH ' + (1024000 / 1024000) + ' MB',
                    timer: 1500
                })
                input_file.value = '';
                return false;
            }
        }
    }
}

function file_image(fileupload, preview, no_image) {
    var input_file = document.getElementById(fileupload);
    var path_file = input_file.value;
    var extention_ok = /(\.jpg|\.jpeg|\.png)$/i;
    if (!extention_ok.exec(path_file)) {
        swal({
            icon: 'error',
            title: 'KONFIRMASI',
            text: 'FORMAT EKSTENSI .JPG ATAU .PNG',
            timer: 1500
        })
        input_file.value = '';
        $(preview).attr('src', no_image);
        return false;
    } else {
        if (input_file.files && input_file.files[0]) {
            if (input_file.files[0].size > 512000) {
                swal({
                    icon: 'error',
                    title: 'KONFIRMASI',
                    text: 'UKURAN GAMBAR HARUS DI BAWAH ' + (512000 / 1024) + ' KB',
                    timer: 1500
                })
                input_file.value = '';
                $(preview).attr('src', no_image);
                return false;
            } else {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(preview).attr('src', e.target.result);
                };
                reader.readAsDataURL(input_file.files[0]);
            }
        }
    }
}

function tandaPemisahTitik(b) {
    var _minus = false;
    if (b < 0) _minus = true;
    b = b.toString();
    b = b.replace(".", "");
    b = b.replace("-", "");
    c = "";
    panjang = b.length;
    j = 0;
    for (i = panjang; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
            c = b.substr(i - 1, 1) + "." + c;
        } else {
            c = b.substr(i - 1, 1) + c;
        }
    }
    if (_minus) c = "-" + c;
    return c;
}

function numbersonly(ini, e) {
    if (e.keyCode >= 48) {
        if (e.keyCode <= 57) {
            a = ini.value.toString().replace(".", "");
            b = a.replace(/[^\d]/g, "");
            b = (b == "0") ? String.fromCharCode(e.keyCode) : b + String.fromCharCode(e.keyCode);
            ini.value = tandaPemisahTitik(b);
            return false;
        } else if (e.keyCode <= 105) {
            if (e.keyCode >= 96) {
                //e.keycode = e.keycode - 47;
                a = ini.value.toString().replace(".", "");
                b = a.replace(/[^\d]/g, "");
                b = (b == "0") ? String.fromCharCode(e.keyCode - 48) : b + String.fromCharCode(e.keyCode - 48);
                ini.value = tandaPemisahTitik(b);
                //alert(e.keycode);
                return false;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else if (e.keyCode == 48) {
        a = ini.value.replace(".", "") + String.fromCharCode(e.keyCode);
        b = a.replace(/[^\d]/g, "");
        if (parseFloat(b) != 0) {
            ini.value = tandaPemisahTitik(b);
            return false;
        } else {
            return false;
        }
    } else if (e.keyCode == 95) {
        a = ini.value.replace(".", "") + String.fromCharCode(e.keyCode - 48);
        b = a.replace(/[^\d]/g, "");
        if (parseFloat(b) != 0) {
            ini.value = tandaPemisahTitik(b);
            return false;
        } else {
            return false;
        }
    } else if (e.keyCode == 8 || e.keycode == 46) {
        a = ini.value.replace(".", "");
        b = a.replace(/[^\d]/g, "");
        b = b.substr(0, b.length - 1);
        if (tandaPemisahTitik(b) != "") {
            ini.value = tandaPemisahTitik(b);
        } else {
            ini.value = "";
        }
        return false;
    } else if (e.keyCode == 9) {
        return true;
    } else if (e.keyCode == 17) {
        return true;
    } else {
        //alert (e.keyCode);
        return false;
    }
}