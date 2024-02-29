<?php
$encrypt_id=encrypt_url($skpd['id_skpd']);
?>
<?php $this->load->view("_partial/header"); ?>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white pb-3 fw-bold">Data Realisasi Keuangan <?= $skpd['nama_skpd'] ?> periode 1 Januari 2021 s.d <?=$nama_periode?></h3>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="card full-height">
        <div class="card-body">
            
            <div class="row">
                <div class="col-sm-12">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Realisasi Keuangan Bulan <?=bulan($bulan)?></legend>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table-detail" style="width: 100%; margin-bottom: 20px;">
                                    <tr>
                                        <td>Realisasi Keuangan <?= $skpd['nama_skpd'] ?> periode 1 Januari 2021 s.d <?=$nama_periode?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </fieldset>
                    
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<ul class="nav nav-pills nav-primary" id="pills-tab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="pills-level1-tab" data-toggle="pill" href="#pills-level1" role="tab" aria-controls="pills-level1" aria-selected="true">Level 1</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-level1-tab" data-toggle="pill" href="#pills-level2" role="tab" aria-controls="pills-level2" aria-selected="false">Level 2</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-level3-tab" data-toggle="pill" href="#pills-level3" role="tab" aria-controls="pills-level3" aria-selected="false">Level 3</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-level4-tab" data-toggle="pill" href="#pills-level4" role="tab" aria-controls="pills-level4" aria-selected="false">Level 4</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-level5-tab" data-toggle="pill" href="#pills-level5" role="tab" aria-controls="pills-level5" aria-selected="false">Level 5</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-level6-tab" data-toggle="pill" href="#pills-level6" role="tab" aria-controls="pills-level6" aria-selected="false">Level 6</a>
										</li>
									</ul>
									<div class="tab-content mt-2 mb-3" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-level1" role="tabpanel" aria-labelledby="pills-level1-tab">
                                            <div class="row">
						                        <div class="col-md-12">
                                                    <div class="d-flex align-items-left flex-column flex-sm-row">
                                                        <div class="ml-sm-auto py-md-0">
                                                            <a href="<?= base_url('pdf-preview-keuangan-level1/'.$encrypt_id.'/'.$bulan) ?>" target="_blank" class="btn btn-success btn-round btn mr-2 mb-3">P R E V I E W</a>
                                                            <button id="tombol-level1" class="btn btn-warning btn-round btn mr-2 mb-3" data-toggle="modal" data-target="#modal-level1"><b>KIRIM LAPORAN</b></button>
                                                        </div>
                                                    </div>
                                                    <h4><center>PEMERINTAH PROVINSI SUMATERA UTARA</center></h4>
                                                    <h3><center>LAPORAN REALISASI ANGGARAN PENDAPATAN DAN BELANJA DAERAH</center></h3>
                                                    <h4><center><?= $skpd['nama_skpd'] ?></center></h4>
                                                    <h4><center>periode 1 Januari 2021 s.d <?=$nama_periode?></center></h4>
                                                    <div class="preload1" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                                                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                                                        <h5>Sedang memuat data...</h5>
                                                    </div>
                                                    <div id="display-content1" style="display: none;">
                                                        <div class="table-responsive">
                                                            <table id="load-content1" class="table-default" style="width: 100%;">
                                                                <thead>
                                                                    <tr style="background-color: #1572EB; color: white;">
                                                                        <th rowspan="2" width="5px">No</th>
                                                                        <th rowspan="2"  class="text-center">Kode Rekening</th>
                                                                        <th rowspan="2"  class="text-center">Uraian</th>
                                                                        <th rowspan="2"  class="text-center">Anggaran</th>
                                                                        <th colspan="4" class="text-center">Realisasi</th>
                                                                    </tr>
                                                                    <tr style="background-color: #1572EB; color: white;">
                                                                        <th class="text-center">Bulan Lalu</th>
                                                                        <th class="text-center">Persen</th>
                                                                        <th class="text-center">Bulan Ini</th>
                                                                        <th class="text-center">Persen</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										<div class="tab-pane fade" id="pills-level2" role="tabpanel" aria-labelledby="pills-level2-tab">
                                            <div class="row">
						                        <div class="col-md-12">
                                                    <div class="d-flex align-items-left flex-column flex-sm-row">
                                                        <div class="ml-sm-auto py-md-0">
                                                            <a href="<?= base_url('pdf-preview-keuangan-level2/'.$encrypt_id.'/'.$bulan) ?>" target="_blank" class="btn btn-success btn-round btn mr-2 mb-3">P R E V I E W</a>
                                                            <button id="tombol-level2" class="btn btn-warning btn-round btn mr-2 mb-3" data-toggle="modal" data-target="#modal-level2"><b>KIRIM LAPORAN</b></button>
                                                        </div>
                                                    </div>
                                                    <h4><center>PEMERINTAH PROVINSI SUMATERA UTARA</center></h4>
                                                    <h3><center>LAPORAN REALISASI ANGGARAN PENDAPATAN DAN BELANJA DAERAH</center></h3>
                                                    <h4><center><?= $skpd['nama_skpd'] ?></center></h4>
                                                    <h4><center>periode 1 Januari 2021 s.d <?=$nama_periode?></center></h4>
                                                    <div class="preload2" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                                                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                                                        <h5>Sedang memuat data...</h5>
                                                    </div>
                                                    <div id="display-content2" style="display: none;">
                                                        <div class="table-responsive">
                                                            <table id="load-content2" class="table-default" style="width: 100%;">
                                                                <thead>
                                                                    <tr style="background-color: #1572EB; color: white;">
                                                                        <th rowspan="2" width="5px">No</th>
                                                                        <th rowspan="2"  class="text-center">Kode Rekening</th>
                                                                        <th rowspan="2"  class="text-center">Uraian</th>
                                                                        <th rowspan="2"  class="text-center">Anggaran</th>
                                                                        <th colspan="4" class="text-center">Realisasi</th>
                                                                    </tr>
                                                                    <tr style="background-color: #1572EB; color: white;">
                                                                        <th class="text-center">Bulan Lalu</th>
                                                                        <th class="text-center">Persen</th>
                                                                        <th class="text-center">Bulan Ini</th>
                                                                        <th class="text-center">Persen</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										<div class="tab-pane fade" id="pills-level3" role="tabpanel" aria-labelledby="pills-level3-tab">
                                        <div class="row">
						                        <div class="col-md-12">
                                                    <div class="d-flex align-items-left flex-column flex-sm-row">
                                                        <div class="ml-sm-auto py-md-0">
                                                            <a href="<?= base_url('pdf-preview-keuangan-level3/'.$encrypt_id.'/'.$bulan) ?>" target="_blank" class="btn btn-success btn-round btn mr-2 mb-3">P R E V I E W</a>
                                                            <button id="tombol-level3" class="btn btn-warning btn-round btn mr-2 mb-3" data-toggle="modal" data-target="#modal-level3"><b>KIRIM LAPORAN</b></button>
                                                        </div>
                                                    </div>
                                                    <h4><center>PEMERINTAH PROVINSI SUMATERA UTARA</center></h4>
                                                    <h3><center>LAPORAN REALISASI ANGGARAN PENDAPATAN DAN BELANJA DAERAH</center></h3>
                                                    <h4><center><?= $skpd['nama_skpd'] ?></center></h4>
                                                    <h4><center>periode 1 Januari 2021 s.d <?=$nama_periode?></center></h4>
                                                    <div class="preload3" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                                                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                                                        <h5>Sedang memuat data...</h5>
                                                    </div>
                                                    <div id="display-content3" style="display: none;">
                                                        <div class="table-responsive">
                                                            <table id="load-content3" class="table-default" style="width: 100%;">
                                                                <thead>
                                                                    <tr style="background-color: #1572EB; color: white;">
                                                                        <th rowspan="2" width="5px">No</th>
                                                                        <th rowspan="2"  class="text-center">Kode Rekening</th>
                                                                        <th rowspan="2"  class="text-center">Uraian</th>
                                                                        <th rowspan="2"  class="text-center">Anggaran</th>
                                                                        <th colspan="4" class="text-center">Realisasi</th>
                                                                    </tr>
                                                                    <tr style="background-color: #1572EB; color: white;">
                                                                        <th class="text-center">Bulan Lalu</th>
                                                                        <th class="text-center">Persen</th>
                                                                        <th class="text-center">Bulan Ini</th>
                                                                        <th class="text-center">Persen</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										<div class="tab-pane fade" id="pills-level4" role="tabpanel" aria-labelledby="pills-level4-tab">
                                        <div class="row">
						                        <div class="col-md-12">
                                                    <div class="d-flex align-items-left flex-column flex-sm-row">
                                                        <div class="ml-sm-auto py-md-0">
                                                            <a href="<?= base_url('pdf-preview-keuangan-level4/'.$encrypt_id.'/'.$bulan) ?>" target="_blank" class="btn btn-success btn-round btn mr-2 mb-3">P R E V I E W</a>
                                                            <button id="tombol-level4" class="btn btn-warning btn-round btn mr-2 mb-3" data-toggle="modal" data-target="#modal-level4"><b>KIRIM LAPORAN</b></button>
                                                        </div>
                                                    </div>
                                                    <h4><center>PEMERINTAH PROVINSI SUMATERA UTARA</center></h4>
                                                    <h3><center>LAPORAN REALISASI ANGGARAN PENDAPATAN DAN BELANJA DAERAH</center></h3>
                                                    <h4><center><?= $skpd['nama_skpd'] ?></center></h4>
                                                    <h4><center>periode 1 Januari 2021 s.d <?=$nama_periode?></center></h4>
                                                    <div class="preload4" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                                                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                                                        <h5>Sedang memuat data...</h5>
                                                    </div>
                                                    <div id="display-content4" style="display: none;">
                                                        <div class="table-responsive">
                                                            <table id="load-content4" class="table-default" style="width: 100%;">
                                                                <thead>
                                                                    <tr style="background-color: #1572EB; color: white;">
                                                                        <th rowspan="2" width="5px">No</th>
                                                                        <th rowspan="2"  class="text-center">Kode Rekening</th>
                                                                        <th rowspan="2"  class="text-center">Uraian</th>
                                                                        <th rowspan="2"  class="text-center">Anggaran</th>
                                                                        <th colspan="4" class="text-center">Realisasi</th>
                                                                    </tr>
                                                                    <tr style="background-color: #1572EB; color: white;">
                                                                        <th class="text-center">Bulan Lalu</th>
                                                                        <th class="text-center">Persen</th>
                                                                        <th class="text-center">Bulan Ini</th>
                                                                        <th class="text-center">Persen</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										<div class="tab-pane fade" id="pills-level5" role="tabpanel" aria-labelledby="pills-level5-tab">
                                        <div class="row">
						                        <div class="col-md-12">
                                                    <div class="d-flex align-items-left flex-column flex-sm-row">
                                                        <div class="ml-sm-auto py-md-0">
                                                            <a href="<?= base_url('pdf-preview-keuangan-level5/'.$encrypt_id.'/'.$bulan) ?>" target="_blank" class="btn btn-success btn-round btn mr-2 mb-3">P R E V I E W</a>
                                                            <button id="tombol-level5" class="btn btn-warning btn-round btn mr-2 mb-3" data-toggle="modal" data-target="#modal-level5"><b>KIRIM LAPORAN</b></button>
                                                        </div>
                                                    </div>
                                                    <h4><center>PEMERINTAH PROVINSI SUMATERA UTARA</center></h4>
                                                    <h3><center>LAPORAN REALISASI ANGGARAN PENDAPATAN DAN BELANJA DAERAH</center></h3>
                                                    <h4><center><?= $skpd['nama_skpd'] ?></center></h4>
                                                    <h4><center>periode 1 Januari 2021 s.d <?=$nama_periode?></center></h4>
                                                    <div class="preload5" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                                                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                                                        <h5>Sedang memuat data...</h5>
                                                    </div>
                                                    <div id="display-content5" style="display: none;">
                                                        <div class="table-responsive">
                                                            <table id="load-content5" class="table-default" style="width: 100%;">
                                                                <thead>
                                                                    <tr style="background-color: #1572EB; color: white;">
                                                                        <th rowspan="2" width="5px">No</th>
                                                                        <th rowspan="2"  class="text-center">Kode Rekening</th>
                                                                        <th rowspan="2"  class="text-center">Uraian</th>
                                                                        <th rowspan="2"  class="text-center">Anggaran</th>
                                                                        <th colspan="4" class="text-center">Realisasi</th>
                                                                    </tr>
                                                                    <tr style="background-color: #1572EB; color: white;">
                                                                        <th class="text-center">Bulan Lalu</th>
                                                                        <th class="text-center">Persen</th>
                                                                        <th class="text-center">Bulan Ini</th>
                                                                        <th class="text-center">Persen</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										<div class="tab-pane fade" id="pills-level6" role="tabpanel" aria-labelledby="pills-level6-tab">
                                        <div class="row">
						                        <div class="col-md-12">
                                                    <div class="d-flex align-items-left flex-column flex-sm-row">
                                                        <div class="ml-sm-auto py-md-0">
                                                            <a href="<?= base_url('pdf-preview-keuangan-level6/'.$encrypt_id.'/'.$bulan) ?>" target="_blank" class="btn btn-success btn-round btn mr-2 mb-3">P R E V I E W</a>
                                                            <button id="tombol-level6" class="btn btn-warning btn-round btn mr-2 mb-3" data-toggle="modal" data-target="#modal-level6"><b>KIRIM LAPORAN</b></button>
                                                        </div>
                                                    </div>
                                                    <h4><center>PEMERINTAH PROVINSI SUMATERA UTARA</center></h4>
                                                    <h3><center>LAPORAN REALISASI ANGGARAN PENDAPATAN DAN BELANJA DAERAH</center></h3>
                                                    <h4><center><?= $skpd['nama_skpd'] ?></center></h4>
                                                    <h4><center>periode 1 Januari 2021 s.d <?=$nama_periode?></center></h4>
                                                    <div class="preload6" style="width: 100%; text-align: center; border: 1px solid #00a65a; border-radius: 25px;">
                                                        <img src="<?= base_url('images/ring_green.gif') ?>" alt="" style="width: 125px;">
                                                        <h5>Sedang memuat data...</h5>
                                                    </div>
                                                    <div id="display-content6" style="display: none;">
                                                        <div class="table-responsive">
                                                            <table id="load-content6" class="table-default" style="width: 100%;">
                                                                <thead>
                                                                    <tr style="background-color: #1572EB; color: white;">
                                                                        <th rowspan="2" width="5px">No</th>
                                                                        <th rowspan="2"  class="text-center">Kode Rekening</th>
                                                                        <th rowspan="2"  class="text-center">Uraian</th>
                                                                        <th rowspan="2"  class="text-center">Anggaran</th>
                                                                        <th colspan="4" class="text-center">Realisasi</th>
                                                                    </tr>
                                                                    <tr style="background-color: #1572EB; color: white;">
                                                                        <th class="text-center">Bulan Lalu</th>
                                                                        <th class="text-center">Persen</th>
                                                                        <th class="text-center">Bulan Ini</th>
                                                                        <th class="text-center">Persen</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal-level1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div id="load-form-level1"></div>
    </div>
</div>

<div class="modal fade" id="modal-level2" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div id="load-form-level2"></div>
    </div>
</div>

<div class="modal fade" id="modal-level3" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div id="load-form-level3"></div>
    </div>
</div>

<div class="modal fade" id="modal-level4" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div id="load-form-level4"></div>
    </div>
</div>

<div class="modal fade" id="modal-level5" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div id="load-form-level5"></div>
    </div>
</div>

<div class="modal fade" id="modal-level6" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div id="load-form-level6"></div>
    </div>
</div>

<?php $this->load->view('_partial/footer'); ?>
<script src="<?= base_url('assets/js/jquery.mask.min.js'); ?>"></script>
<?php $this->load->view('laporan/realisasi_keuangan/js_detail2'); ?>
<?php $this->load->view('_partial/tag_close'); ?>