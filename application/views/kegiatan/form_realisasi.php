<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mb-0">
            FORM UBAH REALISASI
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form-ubah">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="id_skpd">OPD</label>
                        <input type="hidden" name="id_kegiatan" id="id_kegiatan" value="<?= $kegiatan['id_kegiatan']; ?>" class="form-control" autocomplete="off" readonly>
                        <input type="text" name="nama_skpd" id="nama_skpd" value="<?= $skpd['nama_skpd']; ?>" class="form-control" autocomplete="off" readonly>
                        <small class="text-danger nama_skpd"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_pa">Nama PA</label>
                        <input type="text" name="nama_pa" id="nama_pa" value="<?= $kegiatan['nama_pa']; ?>" class="form-control" autocomplete="off">
                        <small class="text-danger nama_pa"></small>
                    </div>
                    <div class="form-group">
                        <label for="nip_pa">NIP PA</label>
                        <input type="text" name="nip_pa" id="nip_pa" value="<?= $kegiatan['nip_pa']; ?>" class="form-control" autocomplete="off">
                        <small class="text-danger nip_pa"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_kegiatan">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" id="nama_kegiatan" value="<?= $kegiatan['nama_kegiatan']; ?>" class="form-control" autocomplete="off">
                        <small class="text-danger nama_kegiatan"></small>
                    </div>
                    <div class="form-group">
                        <label for="pagu">Pagu</label>
                        <input type="text" name="pagu" id="pagu" class="form-control" value="<?= format_angka($kegiatan['nilai_pagu']); ?>" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" autocomplete="off">
                        <small class="text-danger pagu"></small>
                    </div>
                    <div class="form-group">
                        <label for="no_kontrak">Nomor Kontrak</label>
                        <input type="text" name="no_kontrak" id="no_kontrak" value="<?= $kegiatan['no_kontrak']; ?>" class="form-control" autocomplete="off">
                        <small class="text-danger no_kontrak"></small>
                    </div>
                    <div class="form-group">
                        <label for="tgl_kontrak">Tanggal Kontrak</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" name="tgl_kontrak" id="_tgl_kontrak" value="<?= format_tanggal($kegiatan['tgl_kontrak']); ?>" data-date-format="dd-mm-yyyy" class="form-control" autocomplete="off">
                        </div>
                        <small class="text-danger tgl_kontrak"></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="jenis_pelaksanaan">Metode Pemilihan</label>
                        <select name="jenis_pelaksanaan" id="jenis_pelaksanaan" class="form-control select2" style="width: 100%;">
                            <?php foreach ($jenis_pelaksanaan as $p) : ?>
                                <?php if ($p['id_jenis_pelaksanaan'] == $kegiatan['id_jenis_pelaksanaan']) : ?>
                                    <option value="<?= $p['id_jenis_pelaksanaan']; ?>" selected><?= $p['nama_jenis_pelaksanaan']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $p['id_jenis_pelaksanaan']; ?>"><?= $p['nama_jenis_pelaksanaan']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-danger jenis_pelaksanaan"></small>
                    </div>
                    <div class="form-group">
                        <label for="target_angka">Jangka Waktu Pelaksanaan</label>
                        <div class="input-group">
                            <input type="text" name="target_angka" id="target_angka" value="<?= format_angka($kegiatan['target_angka']); ?>" class="form-control" placeholder="Masukkan jadwal" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" autocomplete="off">
                            <select name="target_tipe" id="target_tipe" class="form-control">
                                <option value="H" <?php if ($kegiatan['target_tipe'] == 'H') {
                                                        echo "selected";
                                                    } ?>>Hari</option>
                                <option value="M" <?php if ($kegiatan['target_tipe'] == 'M') {
                                                        echo "selected";
                                                    } ?>>Minggu</option>
                                <option value="B" <?php if ($kegiatan['target_tipe'] == 'B') {
                                                        echo "selected";
                                                    } ?>>Bulan</option>
                                <option value="T" <?php if ($kegiatan['target_tipe'] == 'T') {
                                                        echo "selected";
                                                    } ?>>Tahun</option>
                            </select>
                        </div>
                        <small class="text-danger target_angka"></small>
                    </div>
                    <div class="form-group">
                        <label for="tgl_mulai">Waktu Pelaksanaan</label>
                        <div class="input-daterange input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" name="tgl_mulai" id="tgl_mulai" data-date-format="dd-mm-yyyy" class="form-control" value="<?= format_tanggal($kegiatan['tgl_mulai']); ?>" placeholder="Tanggal Awal" autocomplete="off">
                            <span class="input-group-addon" style="border: 1px solid #ddd; padding: 10px">
                                s/d
                            </span>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" name="tgl_akhir" id="tgl_akhir" data-date-format="dd-mm-yyyy" class="form-control" value="<?= format_tanggal($kegiatan['tgl_akhir']); ?>" placeholder="Tanggal Akhir" autocomplete="off">
                        </div>
                        <small class="text-danger tgl_mulai"></small>
                    </div>
                    <div class="form-group">
                        <label for="lokasi_pekerjaan">Lokasi Pekerjaan</label>
                        <textarea name="lokasi_pekerjaan" id="lokasi_pekerjaan" class="form-control" rows="3"><?= $kegiatan['lokasi_pekerjaan']; ?></textarea>
                        <small class="text-danger lokasi_pekerjaan"></small>
                    </div>
                    <div class="form-group">
                        <label for="longitude">Peta Lokasi</label>
                        <div class="input-group">
                            <input type="text" name="longitude" id="longitude" value="<?= $kegiatan['longitude']; ?>" class="form-control" placeholder="Longitude" autocomplete="off">
                            <input type="text" name="latitude" id="latitude" value="<?= $kegiatan['latitude']; ?>" class="form-control" placeholder="Latitude" autocomplete="off">
                        </div>
                        <small class="text-danger longitude"></small>
                        <small class="text-danger latitude"></small>
                    </div>
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
        $('#_tgl_kontrak').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });
    });
    $('.select2').select2();
</script>