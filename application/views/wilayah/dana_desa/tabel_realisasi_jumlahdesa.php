<div class="card-body bg-success-gradient" style="margin-bottom: 15px; padding: 10px;">
    <div class="inner">
        <h3 style="font-weight: bold; color: #fff;"><?= $judul_tabel; ?></h3>
        <div class="table-responsive">
            <table id="load-content" class="table-rekap" style="width: 100%; background-color: #fff;">
                <thead>
                    <tr class="bg-primary text-white">
                        <th width="5px" rowspan="2">NO</th>
                        <th rowspan="2">NAMA KABUPATEN/KOTA</th>
                        <th rowspan="2" class="text-center">JUMLAH DESA</th>
                        <th colspan="3" class="text-center">JUMLAH DESA SUDAH CAIR</th>
                        <th colspan="3" class="text-center">JUMLAH DESA BELUM CAIR</th>
                    </tr>
                    <tr class="bg-primary text-white">
                        <th class="text-center">I</th>
                        <th class="text-center">II</th>
                        <th class="text-center">III</th>
                        <th class="text-center">I</th>
                        <th class="text-center">II</th>
                        <th class="text-center">III</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $jumlah_desa = 0;
                    $realisasi_desa1 = 0;
                    $realisasi_desa2 = 0;
                    $realisasi_desa3 = 0;
                    $belum_cair1 = 0;
                    $belum_cair2 = 0;
                    $belum_cair3 = 0;
                    foreach ($result_realisasi as $r) :
                        $jumlah_desa += $r['jumlah_desa'];
                        $realisasi_desa1 += $r['realisasi_desa1'];
                        $realisasi_desa2 += $r['realisasi_desa2'];
                        $realisasi_desa3 += $r['realisasi_desa3'];
                        $belum_cair1 += $r['belum_cair1'];
                        $belum_cair2 += $r['belum_cair2'];
                        $belum_cair3 += $r['belum_cair3'];
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $r['nama_kabupaten']; ?></td>
                            <td class="text-center"><?= format_angka($r['jumlah_desa']); ?></td>
                            <td class="text-center"><?= format_angka($r['realisasi_desa1']); ?></td>
                            <td class="text-center"><?= format_angka($r['realisasi_desa2']); ?></td>
                            <td class="text-center"><?= format_angka($r['realisasi_desa3']); ?></td>
                            <td class="text-center"><?= format_angka($r['belum_cair1']); ?></td>
                            <td class="text-center"><?= format_angka($r['belum_cair2']); ?></td>
                            <td class="text-center"><?= format_angka($r['belum_cair3']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-center">TOTAL</th>
                        <th class="text-center"><?= format_angka($jumlah_desa); ?></th>
                        <th class="text-center"><?= format_angka($realisasi_desa1); ?></th>
                        <th class="text-center"><?= format_angka($realisasi_desa2); ?></th>
                        <th class="text-center"><?= format_angka($realisasi_desa3); ?></th>
                        <th class="text-center"><?= format_angka($belum_cair1); ?></th>
                        <th class="text-center"><?= format_angka($belum_cair2); ?></th>
                        <th class="text-center"><?= format_angka($belum_cair3); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>