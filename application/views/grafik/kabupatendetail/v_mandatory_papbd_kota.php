<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"><i class="fa fa-chart-bar"></i>  MANDATORY SPENDING P APBD</h2>
        <div id="mandatory-spending-papbd" style="width:100%; height: 250px;"></div>
            <div class="table-responsive">
                <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
                    <tr style="background-color: #33cccc; color: white; font-weight: bold;">
                        <td>Mandatory Spending</td>
                        <td class="text-center">Aturan UU</td>
                        <td class="text-center">P APBD</td>
                        <td class="text-right">Anggaran</td>
                    </tr>
                    <tr style="background-color: #04756f; color: white; font-weight: bold;">
                        <td>Pendidikan</td>
                        <td class="text-center">20 %</td>
                        <td class="text-center"><?=$row_mandatory['persen_pendidikan_papbd']?> %</td>
                        <td class="text-right"><?= "Rp " . format_angka($row_mandatory['standar_pendidikan_papbd']); ?></td>
                    </tr>
                    <tr style="background-color: #ff8b00; color: white; font-weight: bold;">
                        <td>Kesehatan</td>
                        <td class="text-center">10 %</td>
                        <td class="text-center"><?=$row_mandatory['persen_kesehatan_papbd']?> %</td>
                        <td class="text-right"><?= "Rp " . format_angka($row_mandatory['standar_kesehatan_papbd']); ?></td>
                    </tr>
                    <tr style="background-color: #b38600; color: white; font-weight: bold;">
                        <td>Infrastruktur Daerah</td>
                        <td class="text-center">25 %</td>
                        <td class="text-center"><?=$row_mandatory['persen_infrastruktur_papbd']?> %</td>
                        <td class="text-right"><?= "Rp " . format_angka($row_mandatory['standar_infrastruktur_papbd']); ?></td>
                    </tr>
                    <?php if($row_mandatory['standar_desa']!=0){ ?>
                        <tr style="background-color: #e6e600; font-weight: bold;">
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
