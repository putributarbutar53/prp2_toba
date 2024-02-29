<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"><i class="fa fa-chart-bar"></i>  MANDATORY SPENDING APBD</h2>
        <div id="mandatory-spending" style="width:100%; height: 500px;"></div>
        <div class="table-responsive">
                <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
                    <tr height="43" style="background-color: #33cccc; color: white; font-weight: bold;">
                        <td>Mandatory Spending</td>
                        <td class="text-center">Aturan UU</td>
                        <td class="text-center">APBD</td>
                        <td class="text-right">Anggaran</td>
                    </tr>
                    <tr height="43" style="background-color: #04756f; color: white; font-weight: bold;">
                        <td>Pendidikan</td>
                        <td class="text-center">20 %</td>
                        <td class="text-center"><?=$row_mandatory['persen_pendidikan']?> %</td>
                        <td class="text-right"><?= "Rp " . format_angka($row_mandatory['standar_pendidikan']); ?></td>
                    </tr>
                    <tr height="43" style="background-color: #ff8b00; color: white; font-weight: bold;">
                        <td>Kesehatan</td>
                        <td class="text-center">10 %</td>
                        <td class="text-center"><?=$row_mandatory['persen_kesehatan']?> %</td>
                        <td class="text-right"><?= "Rp " . format_angka($row_mandatory['standar_kesehatan']); ?></td>
                    </tr>
                    <tr height="43" style="background-color: #b38600; color: white; font-weight: bold;">
                        <td>Infrastruktur Daerah</td>
                        <td class="text-center">25 %</td>
                        <td class="text-center"><?=$row_mandatory['persen_infrastruktur']?> %</td>
                        <td class="text-right"><?= "Rp " . format_angka($row_mandatory['standar_infrastruktur']); ?></td>
                    </tr>
                    <?php if($row_mandatory['standar_desa']!=0){ ?>
                        <tr height="43" style="background-color: #e6e600; font-weight: bold;">
                            <td>Alokasi Dana Desa</td>
                            <td class="text-center">10 %</td>
                            <td class="text-center"><?=$row_mandatory['persen_dana_desa']?> %</td>
                            <td class="text-right"><?= "Rp " . format_angka($row_mandatory['standar_desa']); ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <br>
    </div>
</div> 
