<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            DATA KUASA PENGGUNA ANGGARAN (KPA)
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form-ubah">
        <div class="modal-body">

        <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <textarea name="nama_kegiatan" id="nama_kegiatan" class="form-control" rows="3"><?= $ta_kontrak['keperluan']; ?></textarea>
                <small class="text-danger nama_kegiatan"></small>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="pagu">Pagu</label>
                        <input type="text" name="pagu" id="pagu" value="<?= format_rupiah($ta_kontrak['pagu']); ?>" class="form-control"  autocomplete="off">
                        <small class="text-danger pagu"></small>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="tahun">Tahun Kontrak</label>
                        <input type="text" name="tahun" id="tahun" value="<?= $ta_kontrak['tahun']; ?>" class="form-control" value="<?= date('Y'); ?>" autocomplete="off">
                        <small class="text-danger tahun"></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="no_kontrak">Nomor Kontrak</label>
                        <input type="text" name="no_kontrak" id="no_kontrak" value="<?= $ta_kontrak['no_kontrak']; ?>" class="form-control" autocomplete="off">
                        <small class="text-danger no_kontrak"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="tgl_kontrak">Tanggal Kontrak</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" name="tgl_kontrak" id="tgl_kontrak"  value="<?= format_tanggal($ta_kontrak['tgl_kontrak']); ?>" data-date-format="dd-mm-yyyy" class="form-control" autocomplete="off">
                        </div>
                        <small class="text-danger tgl_kontrak"></small>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="nilai_kontrak">Nilai Kontrak</label>
                        <input type="text" name="nilai_kontrak" id="nilai_kontrak" value="<?= format_rupiah($ta_kontrak['nilai']); ?>" class="form-control" autocomplete="off">
                        <small class="text-danger nilai_kontrak"></small>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="waktu">Waktu</label>
                <input type="text" name="waktu" id="waktu" value="<?= $ta_kontrak['waktu']; ?>" class="form-control" autocomplete="off">
                <small class="text-danger waktu"></small>
            </div>
            <div class="form-group">
                <label for="nama_perusahaan">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?= $ta_kontrak['nm_perusahaan']; ?>" class="form-control" autocomplete="off">
                <small class="text-danger nama_perusahaan"></small>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nama_pa">Nama Kuasa Pengguna Anggaran (KPA)</label>
                        <input type="hidden" name="id_kontrak" id="id_kontrak" value="<?= $id_kontrak; ?>">
                        <input type="text" name="nama_pa" id="nama_pa" value="<?= $nama_pa; ?>" class="form-control" autocomplete="off">
                        <small class="text-danger nama_pa"></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nip_pa">NIP Kuasa Pengguna Anggaran (KPA)</label>
                        <input type="text" name="nip_pa" id="nip_pa" value="<?= $nip_pa; ?>" class="form-control" autocomplete="off">
                        <small class="text-danger nip_pa"></small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Kegiatan Dana Alokasi Khusus DAK Fisik</legend>
                        <?php if($ta_kontrak['status_2']=="Y") { ?>
                            <label style="margin-right: 10px;" for="status_2">
                                <input type="radio" name="status_2" id="status_2" value="Y" checked> Ya
                            </label>  
                            <label style="margin-right: 10px;" for="status_2">
                                <input type="radio" name="status_2" id="status_2" value="N"> Tidak
                            </label> 
                        <?php } else { ?>
                            <label style="margin-right: 10px;" for="status_2">
                                <input type="radio" name="status_2" id="status_2" value="Y"> Ya
                            </label>  
                            <label style="margin-right: 10px;" for="status_2">
                                <input type="radio" name="status_2" id="status_2" value="N" checked> Tidak
                            </label> 
                        <?php } ?>
                    </fieldset>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-ubah" class="btn btn-sm btn-primary">
                <i class="fa fa-save"></i> SIMPAN
            </button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                <i class="fa fa-times"></i> BATAL
            </button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('.input-daterange').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });
        $('#tgl_kontrak').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });
    });
    $('.select2').select2();

$("#prioritas").change(function() {
    var prioritas = $("#form-ubah #prioritas").val();
    console.log(prioritas);
    if (prioritas == 0) {
        $('#select-kegiatan').css('display', 'none');
    } else {
        $('#select-kegiatan').css('display', 'block');
    }
    $.ajax({
        url: '<?= site_url('kegiatan/kegiatan/cek_kegiatan'); ?>',
        type: "POST",
        data: {
            id_prioritas: prioritas
        },
        success: function(data) {
            $('#strategis').html(data);
        }
    });
});
</script>