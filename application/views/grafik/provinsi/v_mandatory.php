<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"> <i class="fa fa-chart-bar"></i><i class="fa fa-chart-bar"></i> Mandatory Spending <?=$nama_kabupaten?></h2>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div id="mandatory-spending" style="width:100%; height: 400px;"></div>
                <div class="table-responsive">
                    <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
                        <tr style="background-color: #33cccc; color: white; font-weight: bold;">
                            <td>Mandatory Spending</td>
                            <td class="text-center">Aturan UU</td>
                            <td class="text-center">APBD</td>
                            <td class="text-right">Anggaran</td>
                        </tr>
                        <tr style="background-color: #04756f; color: white; font-weight: bold;">
                            <td>Pendidikan</td>
                            <td class="text-center">20 %</td>
                            <td class="text-center"><?=$row_mandatory['persen_pendidikan']?> %</td>
                            <td class="text-right"><?= "Rp " . format_angka($row_mandatory['standar_pendidikan']); ?></td>
                        </tr>
                        <tr style="background-color: #ff8b00; color: white; font-weight: bold;">
                            <td>Kesehatan</td>
                            <td class="text-center">10 %</td>
                            <td class="text-center"><?=$row_mandatory['persen_kesehatan']?> %</td>
                            <td class="text-right"><?= "Rp " . format_angka($row_mandatory['standar_kesehatan']); ?></td>
                        </tr>
                        <tr style="background-color: #b38600; color: white; font-weight: bold;">
                            <td>Infrastruktur Daerah</td>
                            <td class="text-center">25 %</td>
                            <td class="text-center"><?=$row_mandatory['persen_infrastruktur']?> %</td>
                            <td class="text-right"><?= "Rp " . format_angka($row_mandatory['standar_infrastruktur']); ?></td>
                        </tr>
                        <tr style="background-color: #0033cc; color: white; font-weight: bold;">
                            <td>Penanganan Covid-19</td>
                            <td class="text-center">8 %</td>
                            <td class="text-center"><?=$row_mandatory['persen_pengawasan']?> %</td>
                            <td class="text-right"><?= "Rp " . format_angka($row_mandatory['standar_pengawasan']); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div id="mandatory-spending-papbd" style="width:100%; height: 400px;"></div>
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
                        <tr style="background-color: #0033cc; color: white; font-weight: bold;">
                            <td>Penanganan Covid-19</td>
                            <td class="text-center">8 %</td>
                            <td class="text-center"><?=$row_mandatory['persen_pengawasan_papbd']?> %</td>
                            <td class="text-right"><?= "Rp " . format_angka($row_mandatory['standar_pengawasan_papbd']); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
</div> 
