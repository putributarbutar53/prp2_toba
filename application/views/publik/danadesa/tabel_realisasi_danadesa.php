<div class="card-body bg-success-gradient" style="margin-bottom: 15px; padding: 10px;">
    <div class="inner">
        <h3 style="font-weight: bold; color: #fff;"><?= $judul_tabel; ?></h3>
        <div class="table-responsive">
            <table id="load-content" class="table-rekap" style="width: 100%; background-color: #fff;;">
                <thead>
                    <tr class="bg-primary text-white">
                        <th width="5px">NO</th>
                        <th>NAMA KABUPATEN/KOTA</th>
                        <th class="text-center">ANGGARAN</th>
                        <th class="text-center">TAHAP 1</th>
                        <th class="text-center">TAHAP 2</th>
                        <th class="text-center">TAHAP 3</th>
                        <th class="text-center">TOTAL</th>
                        <th class="text-center">PERSEN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $total_alokasi = 0;
                    $total_realisasi_tahap1 = 0;
                    $total_realisasi_tahap2 = 0;
                    $total_realisasi_tahap3 = 0;
                    foreach ($result_realisasi as $r) :
                        $total_alokasi += $r['alokasi'];
                        $total_realisasi_tahap1 += $r['realisasi_tahap1'];
                        $total_realisasi_tahap2 += $r['realisasi_tahap2'];
                        $total_realisasi_tahap3 += $r['realisasi_tahap3'];
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $r['nama_kabupaten']; ?></td>
                            <td class="text-right"><?= 'Rp' . format_rupiah($r['alokasi']); ?></td>
                            <td class="text-right"><?= 'Rp' . format_rupiah($r['realisasi_tahap1']); ?></td>
                            <td class="text-right"><?= 'Rp' . format_rupiah($r['realisasi_tahap2']); ?></td>
                            <td class="text-right"><?= 'Rp' . format_rupiah($r['realisasi_tahap3']); ?></td>
                            <td class="text-right"><?= 'Rp' . format_rupiah($r['realisasi_total']); ?></td>
                            <td class="text-center"><?= number_format($r['persen_realisasi'], 2) . "%"; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <?php
                    $total_realisasi = $total_realisasi_tahap1 + $total_realisasi_tahap2 + $total_realisasi_tahap3;
                    if ($total_alokasi != null) {
                        $persen_total = $total_realisasi / $total_alokasi * 100;
                    } else {
                        $persen_total = 0;
                    }
                    ?>
                    <tr>
                        <th colspan="2" class="text-center">TOTAL</th>
                        <th class="text-right"><?= 'Rp' . format_rupiah($total_alokasi); ?></th>
                        <th class="text-right"><?= 'Rp' . format_rupiah($total_realisasi_tahap1); ?></th>
                        <th class="text-right"><?= 'Rp' . format_rupiah($total_realisasi_tahap2); ?></th>
                        <th class="text-right"><?= 'Rp' . format_rupiah($total_realisasi_tahap3); ?></th>
                        <th class="text-right"><?= 'Rp' . format_rupiah($total_realisasi); ?></th>
                        <th class="text-center"><?= number_format($persen_total, 2) . '%'; ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>