<div class="table-responsive">
    <table id="load-content" class="table-rekap" style="width: 100%;">
        <thead>
            <tr style="background-color: #1572EB; color: white;">
                <th rowspan="2" class="text-center" width="5px">NO</th>
                <th rowspan="2" class="text-center">NAMA KABUPATEN</th>
                <th rowspan="2" class="text-center">ALOKASI</th>
                <th colspan="4" class="text-center">RELAISASI DANA DESA</th>
                <th rowspan="2" class="text-center">%</th>
                <th rowspan="2" class="text-center">DESA</th>
                <th colspan="3" class="text-center">DESA CAIR</th>
                <th colspan="3" class="text-center">DESA BELUM CAIR</th>
            </tr>
            <tr style="background-color: #1572EB; color: white;">
                <th class="text-center">I</th>
                <th class="text-center">II</th>
                <th class="text-center">III</th>
                <th class="text-center">TOTAL</th>
                <th class="text-center">I</th>
                <th class="text-center">II</th>
                <th class="text-center">III</th>
                <th class="text-center">I</th>
                <th class="text-center">II</th>
                <th class="text-center">III</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total_alokasi = 0;
            $total_realisasi_tahap1 = 0;
            $total_realisasi_tahap2 = 0;
            $total_realisasi_tahap3 = 0;
            $jumlah_desa = 0;
            $realisasi_desa1 = 0;
            $realisasi_desa2 = 0;
            $realisasi_desa3 = 0;
            $belum_cair1 = 0;
            $belum_cair2 = 0;
            $belum_cair3 = 0;
            foreach ($result_realisasi as $r) :
                $total_alokasi += $r['alokasi'];
                $total_realisasi_tahap1 += $r['realisasi_tahap1'];
                $total_realisasi_tahap2 += $r['realisasi_tahap2'];
                $total_realisasi_tahap3 += $r['realisasi_tahap3'];
                $jumlah_desa += $r['jumlah_desa'];
                $realisasi_desa1 += $r['realisasi_desa1'];
                $realisasi_desa2 += $r['realisasi_desa2'];
                $realisasi_desa3 += $r['realisasi_desa3'];
                $belum_cair1 += $r['belum_cair1'];
                $belum_cair2 += $r['belum_cair2'];
                $belum_cair3 += $r['belum_cair3'];
            ?>
                <tr>
                    <td class="center"><?= $no++; ?></td>
                    <td><?= $r['nama_kabupaten']; ?></td>
                    <td class="text-right"><?= format_rupiah($r['alokasi']); ?></td>
                    <td class="text-right"><?= format_rupiah($r['realisasi_tahap1']); ?></td>
                    <td class="text-right"><?= format_rupiah($r['realisasi_tahap2']); ?></td>
                    <td class="text-right"><?= format_rupiah($r['realisasi_tahap3']); ?></td>
                    <td class="text-right"><?= format_rupiah($r['realisasi_total']); ?></td>
                    <td class="text-center"><?= number_format($r['persen_realisasi'], 2); ?></td>
                    <td class="text-center"><?= format_angka($r['jumlah_desa']) ?></td>
                    <td class="text-center"><?= format_angka($r['realisasi_desa1']) ?></td>
                    <td class="text-center"><?= format_angka($r['realisasi_desa2']) ?></td>
                    <td class="text-center"><?= format_angka($r['realisasi_desa3']) ?></td>
                    <td class="text-center"><?= format_angka($r['belum_cair1']) ?></td>
                    <td class="text-center"><?= format_angka($r['belum_cair2']) ?></td>
                    <td class="text-center"><?= format_angka($r['belum_cair3']) ?></td>
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
                <th class="text-right"><?= format_rupiah($total_alokasi); ?></th>
                <th class="text-right"><?= format_rupiah($total_realisasi_tahap1); ?></th>
                <th class="text-right"><?= format_rupiah($total_realisasi_tahap2); ?></th>
                <th class="text-right"><?= format_rupiah($total_realisasi_tahap3); ?></th>
                <th class="text-right"><?= format_rupiah($total_realisasi); ?></th>
                <th class="text-center"><?= number_format($persen_total, 2); ?></th>
                <th class="text-center"><?= format_angka($jumlah_desa) ?></th>
                <th class="text-center"><?= format_angka($realisasi_desa1) ?></th>
                <th class="text-center"><?= format_angka($realisasi_desa2) ?></th>
                <th class="text-center"><?= format_angka($realisasi_desa3) ?></th>
                <th class="text-center"><?= format_angka($belum_cair1) ?></th>
                <th class="text-center"><?= format_angka($belum_cair2) ?></th>
                <th class="text-center"><?= format_angka($belum_cair3) ?></th>
            </tr>
        </tfoot>
    </table>
</div>