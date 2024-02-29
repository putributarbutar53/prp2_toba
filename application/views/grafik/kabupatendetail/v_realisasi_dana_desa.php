<div class="card-body bg-primary-gradient">
    <div class="inner">
        <h2 style="color: white; font-weight: bold;"><i class="fa fa-chart-bar"></i>  DANA DESA <?=$result_kabupaten_nama?></h2>
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="card card-info bg-info-gradient">
                    <div class="card-body">
                        <h2 class="mb-1 fw-bold">Realisasi Dana Desa
                            <br>Periode <?= $this->fungsi->nama_bulan($row_desa['periode_desa'])?>
                            <br><?= "Rp " . format_angka($row_desa['total_realisasi']); ?>
                            <br>Persen : <?= $row_desa['persen']; ?> %
                        </h2>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3"></div>
                        </div>   
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div id="realisasi-dana-desa" style="width:100%; height: 413px;"></div>
            </div>
            <div class="col-lg-4 col-12">
                <div id="realisasi-jumlah-desa" style="width:100%; height: 413px;"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="table-responsive">
                    <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
                        <tr height="43" style="background-color: #e60000; color: white; font-size: 27px; font-weight: bold;">
                            <th  colspan="9">Realisasi Dana Desa <?=$result_kabupaten_nama?> Periode <?= $this->fungsi->nama_bulan($row_desa['periode_desa'])?></th>
                        </tr>
                        <tr height="43" style="background-color: #ff8b00; color: white; font-size: 27px; font-weight: bold;">
                            <th style="text-align: center;">Anggaran</th>
                            <th colspan="2" style="text-align: center;">Tahap 1</th>
                            <th colspan="2" style="text-align: center;">Tahap 2</th>
                            <th colspan="2" style="text-align: center;">Tahap 3</th>
                            <th style="text-align: center;">Realisasi Dana Desa</th>
                            <th style="text-align: center;">Persen</th>
                        </tr>
                        <?php
                            $data_rst   = $this->mquery->select_id('tbl_dana_desa',['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun_data, 'bulan' => $row_desa['bulan_desa']]);
                        ?>
                        <tr height="43" style="background-color: #04756f; color: white; font-size: 27px; font-weight: bold;">
                            <td style="text-align: center;"><?php echo format_rupiah($data_rst['alokasi']); ?></td>
                            <td colspan="2" style="text-align: center;"><?php echo format_rupiah($data_rst['tahap1']); ?></td>
                            <td colspan="2" style="text-align: center;"><?php echo format_rupiah($data_rst['tahap2']); ?></td>
                            <td colspan="2" style="text-align: center;"><?php echo format_rupiah($data_rst['tahap3']); ?></td>
                            <td style="text-align: center;"><?php echo format_rupiah($data_rst['total_realisasi']); ?></td>
                            <td style="text-align: center;"><?php echo $data_rst['persen']; ?> %</td>
                        </tr>
                        <tr height="30" style="color: white; font-size: 17px; font-weight: bold;">
                            <th style="background-color: #ff8b00; text-align: center;"></th>
                            <th style="background-color: #32CD32; text-align: center;">Desa Cair : <?php echo $data_rst['desa1']; ?></th>
                            <th style="background-color: #e60000; text-align: center;">Belum Cair : <?php echo $data_rst['belum1']; ?></th>
                            <th style="background-color: #32CD32; text-align: center;">Desa Cair : <?php echo $data_rst['desa2']; ?></th>
                            <th style="background-color: #e60000; text-align: center;">Belum Cair : <?php echo $data_rst['belum2']; ?></th>
                            <th style="background-color: #32CD32; text-align: center;">Desa Cair : <?php echo $data_rst['desa3']; ?></th>
                            <th style="background-color: #e60000; text-align: center;">Belum Cair : <?php echo $data_rst['belum3']; ?></th>
                            <th style="background-color: #ff8b00; text-align: center;"></th>
                            <th style="background-color: #ff8b00; text-align: center;"></th>
                        </tr>
                    
                    </table>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="table-responsive">
                    <table class="table-grafik" style="margin-bottom: 0; width: 100%;">
                    <tr height="43" style="background-color: #00b3b3; color: white; font-size: 27px; font-weight: bold;">
                            <th  colspan="11">Realisasi Dana BLT <?=$result_kabupaten_nama?> Periode <?= $this->fungsi->nama_bulan($row_desa['periode_desa'])?></th>
                        </tr>
                        <tr height="43" style="background-color: #ff8b00; color: white; font-size: 27px; font-weight: bold;">
                            <th colspan="2" style="text-align: center;">TW 1</th>
                            <th colspan="2" style="text-align: center;">TW 2</th>
                            <th colspan="2" style="text-align: center;">TW 3</th>
                            <th colspan="2" style="text-align: center;">TW 4</th>
                            <th style="text-align: center;">Realisasi BLT</th>
                            <th colspan="2" style="text-align: center;">Total Penyaluran</th>
                        </tr>
                        <?php
                            $data_rst   = $this->mquery->select_id('tbl_dana_desa',['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun_data, 'bulan' => $row_desa['bulan_desa']]);
                        ?>
                        <tr height="43" style="background-color: #04756f; color: white; font-size: 27px; font-weight: bold;">
                            <td colspan="2" style="text-align: center;"><?php echo format_rupiah($data_rst['tw1']); ?></td>
                            <td colspan="2" style="text-align: center;"><?php echo format_rupiah($data_rst['tw2']); ?></td>
                            <td colspan="2" style="text-align: center;"><?php echo format_rupiah($data_rst['tw3']); ?></td>
                            <td colspan="2" style="text-align: center;"><?php echo format_rupiah($data_rst['tw4']); ?></td>
                            <td style="text-align: center;"><?php echo format_rupiah($data_rst['total_blt']); ?></td>
                            <td colspan="2" style="text-align: center;"><?php echo format_rupiah($data_rst['total_salur']); ?></td>
                        </tr>
                        <tr height="30" style="color: white; font-size: 17px; font-weight: bold;">
                            <th style="background-color: #32CD32; text-align: center;">Desa Cair : <?php echo $data_rst['blt_cair1']; ?></th>
                            <th style="background-color: #e60000; text-align: center;">Belum Cair : <?php echo $data_rst['blt_bcair1']; ?></th>
                            <th style="background-color: #32CD32; text-align: center;">Desa Cair : <?php echo $data_rst['blt_cair2']; ?></th>
                            <th style="background-color: #e60000; text-align: center;">Belum Cair : <?php echo $data_rst['blt_bcair2']; ?></th>
                            <th style="background-color: #32CD32; text-align: center;">Desa Cair : <?php echo $data_rst['blt_cair3']; ?></th>
                            <th style="background-color: #e60000; text-align: center;">Belum Cair : <?php echo $data_rst['blt_bcair3']; ?></th>
                            <th style="background-color: #32CD32; text-align: center;">Desa Cair : <?php echo $data_rst['blt_cair4']; ?></th>
                            <th style="background-color: #e60000; text-align: center;">Belum Cair : <?php echo $data_rst['blt_bcair4']; ?></th>
                            <th colspan="3" style="background-color: #ff8b00;  font-size: 27px; text-align: right;">Persen : <?php echo $data_rst['persen_salur']; ?> %</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <br>

    </div>
</div> 
