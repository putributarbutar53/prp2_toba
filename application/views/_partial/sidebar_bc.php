<!-- Sidebar -->
<?php
    $tahun_now=date('Y');
    $encrypt_id_skpd = encrypt_url($id_skpd);
?>
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?= cek_file("uploads/users/" . $foto); ?>" alt="users" class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a href="<?= site_url('setting/profile'); ?>">
                        <span>
                            <?= $username; ?>
                            <span class="user-level"><?= $role; ?></span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item <?php if ($menu_active == "dashboard") {
                                        echo "active";
                                    } ?>">
                    <a href="<?= site_url("dashboard"); ?>">
                        <i class="fa fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item <?php if ($menu_active == "master_data") {
                                        echo "active submenu";
                                    } ?>">
                    <a data-toggle="collapse" href="#master_data" class="collapsed" aria-expanded="false">
                        <i class="fa fa-database"></i>
                        <p>Master Data</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?php if ($menu_active == "master_data") {
                                                echo "show";
                                            } ?>" id="master_data">
                        <ul class="nav nav-collapse">
                            <?php if ($role_admin == "master") { ?>
                                <li <?php if ($submenu_active == "skpd") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("master/skpd"); ?>">
                                        <span class="sub-item">Data SKPD</span>
                                    </a>
                                </li>
                                <li <?php if ($submenu_active == "jenis-pelaksanaan") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("master/jenis-pelaksanaan"); ?>">
                                        <span class="sub-item">Jenis Pelaksanaan</span>
                                    </a>
                                </li>
                            <?php } else if ($role_admin == "fisik" or $role_admin == "keuangan") { ?>
                                <li <?php if ($submenu_active == "kepala-skpd") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("master/kepala-skpd"); ?>">
                                        <span class="sub-item">Kepala SKPD</span>
                                    </a>
                                </li>
                            <?php } else if ($role_admin == "provinsi") { ?>
                                <li <?php if ($submenu_active == "skpd") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("master/skpd"); ?>">
                                        <span class="sub-item">Data SKPD</span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </li>

                <?php if ($role_admin == "master" or $role_admin == "kabupaten") { ?>
                    <li class="nav-item <?php if ($menu_active == "kabupaten_kota") {
                                            echo "active submenu";
                                        } ?>">
                        <a data-toggle="collapse" href="#kabupaten_kota" class="collapsed" aria-expanded="false">
                            <i class="fa fa-home"></i>
                            <p>Kabupaten/Kota</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?php if ($menu_active == "kabupaten_kota") {
                                                    echo "show";
                                                } ?>" id="kabupaten_kota">
                            <ul class="nav nav-collapse">
                                <li <?php if ($submenu_active == "anggaran-kabupaten") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("kabupaten/anggaran"); ?>">
                                        <span class="sub-item">Anggaran Kabupaten/Kota</span>
                                    </a>
                                </li>
                                <li <?php if ($submenu_active == "mandatory-kabupaten") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("kabupaten/mandatory"); ?>">
                                        <span class="sub-item">Mandatory Kabupaten/Kota</span>
                                    </a>
                                </li>
                                <li <?php if ($submenu_active == "apbd-kabupaten") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("kabupaten/apbd"); ?>">
                                        <span class="sub-item">APBD Kabupaten/Kota</span>
                                    </a>
                                </li>
                                <li <?php if ($submenu_active == "tkdd-kabupaten") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("kabupaten/tkdd"); ?>">
                                        <span class="sub-item">TKDD Kabupaten/Kota</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php } ?>

                <?php if ($role_admin == "master" or $role_admin == "provinsi" or $role_admin == "fisik" or $role_admin == "keuangan") { ?>
                    <li class="nav-item <?php if ($menu_active == "provinsi") {
                                            echo "active submenu";
                                        } ?>">
                        <a data-toggle="collapse" href="#provinsi" class="collapsed" aria-expanded="false">
                            <i class="fa fa-home"></i>
                            <p>Provinsi</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?php if ($menu_active == "provinsi") {
                                                    echo "show";
                                                } ?>" id="provinsi">
                            <ul class="nav nav-collapse">

                                <?php if ($role_admin == "master" or $role_admin == "provinsi") { ?>                
                                    <li <?php if ($submenu_active == "mandatory-provinsi") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("provinsi/mandatory"); ?>">
                                            <span class="sub-item">Mandatory Provinsi</span>
                                        </a>
                                    </li>

                                    <li <?php if ($submenu_active == "dana-dak") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("provinsi/danadak"); ?>">
                                            <span class="sub-item">Dana DAK</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "dana-dekon") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("provinsi/danadekon"); ?>">
                                            <span class="sub-item">Dana Dekonsentrasi</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "dana-tp") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("provinsi/danatp"); ?>">
                                            <span class="sub-item">Dana Tugas Pembantuan</span>
                                        </a>
                                    </li>

                                <?php } else { ?>
                                    <li <?php if ($submenu_active == "dana-dak") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("provinsi/danadak/detail/".$tahun_now."/".$encrypt_id_skpd); ?>">
                                            <span class="sub-item">Dana DAK</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "dana-dekon") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("provinsi/danadekon/detail/".$tahun_now."/".$encrypt_id_skpd); ?>">
                                            <span class="sub-item">Dana Dekonsentrasi</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "dana-tp") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("provinsi/danatp/detail/".$tahun_now."/".$encrypt_id_skpd); ?>">
                                            <span class="sub-item">Dana Tugas Pembantuan</span>
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </li>
                <?php } ?>

                <?php if ($role_admin == "master" or $role_admin == "pakar" or $role_admin == "biro") { ?>
                    <li class="nav-item <?php if ($menu_active == "pendapatan_skpd") {
                                            echo "active";
                                        } ?>">
                        <a href="<?= site_url("pendapatan/skpd"); ?>">
                            <i class="fa fa-building"></i>
                            <p>Data Pendapatan</p>
                        </a>
                    </li>
                <?php } else { 
                    $encrypt_id = encrypt_url($id_skpd); ?>
                    <li class="nav-item <?php if ($menu_active == "pendapatan_skpd") {
                                            echo "active";
                                        } ?>">
                        <a href="<?= site_url("pendapatan/skpd/detail/".$tahun_now."/" . $encrypt_id); ?>">
                            <i class="fa fa-building"></i>
                            <p>Data Pendapatan</p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($role_admin == "master" or $role_admin == "pakar" or $role_admin == "biro") { ?>
                    <li class="nav-item <?php if ($menu_active == "belanja_skpd") {
                                            echo "active";
                                        } ?>">
                        <a href="<?= site_url("belanja/skpd"); ?>">
                            <i class="fa fa-building"></i>
                            <p>Data Belanja</p>
                        </a>
                    </li>
                <?php } else {
                    $encrypt_id = encrypt_url($id_skpd); ?>
                    <li class="nav-item <?php if ($menu_active == "belanja_skpd") {
                                            echo "active";
                                        } ?>">
                        <a href="<?= site_url("belanja/skpd/detail/".$tahun_now."/" .$encrypt_id); ?>">
                            <i class="fa fa-building"></i>
                            <p>Data Belanja</p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($role_admin == "master" or $role_admin == "pakar" or $role_admin == "biro") { ?>
                    <li class="nav-item <?php if ($menu_active == "kegiatan_skpd") {
                                            echo "active";
                                        } ?>">
                        <a href="<?= site_url("kegiatan"); ?>">
                            <i class="fa fa-tasks"></i>
                            <p>Kegiatan Fisik</p>
                        </a>
                    </li>
                <?php } else {
                    $encrypt_id = encrypt_url($id_skpd); ?>
                    <li class="nav-item <?php if ($menu_active == "kegiatan_skpd") {
                                            echo "active";
                                        } ?>">
                        <a href="<?= site_url("kegiatan/skpd/"  .$tahun_now."/" . $encrypt_id); ?>">
                            <i class="fa fa-tasks"></i>
                            <p>Kegiatan Fisik</p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($role_admin == "master") : ?>
                    <li class="nav-item <?php if ($menu_active == "dana_desa") {
                                            echo "active";
                                        } ?>">
                        <a href="<?= site_url("wilayah/dana-desa-" . date('Y') . "-" . date('m')); ?>">
                            <i class="fa fa-th"></i>
                            <p>Dana Desa</p>
                        </a>
                    </li>
                <?php endif; ?>

             
                    <li class="nav-item <?php if ($menu_active == "laporan") {
                                            echo "active submenu";
                                        } ?>">
                        <a data-toggle="collapse" href="#laporan" class="collapsed" aria-expanded="false">
                            <i class="fa fa-industry"></i>
                            <p>Laporan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?php if ($menu_active == "laporan") {
                                                    echo "show";
                                                } ?>" id="laporan">
                            <ul class="nav nav-collapse">
                                <?php if ($role_admin == "master") { ?>
                                    <li <?php if ($submenu_active == "realisasi_keuangan") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("realisasi-keuangan"); ?>">
                                            <span class="sub-item">Data Realisasi Keuangan</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "laporan_realisasi_keuangan") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("laporan-realisasi-keuangan"); ?>">
                                            <span class="sub-item">Laporan Realisasi Keuangan</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "laporan_realisasi_fisik") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("laporan-realisasi-fisik"); ?>">
                                            <span class="sub-item">Laporan Realisasi Fisik</span>
                                        </a>
                                    </li>
                                <?php } else {
                                    $encrypt_id = encrypt_url($id_skpd); ?>
                                    <li <?php if ($submenu_active == "realisasi_keuangan") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("realisasi-keuangan/detail/" .$tahun_now."/" . $encrypt_id); ?>">
                                            <span class="sub-item">Data Realisasi Keuangan</span>
                                        </a>
                                    </li>

                                    <!-- <li <?php if ($submenu_active == "laporan_realisasi_keuangan") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("laporan-realisasi-keuangan/detail/" .$tahun_now."/" . $encrypt_id); ?>">
                                            <span class="sub-item">Laporan Realisasi Keuangan</span>
                                        </a>
                                    </li> -->

                                    <li <?php if ($submenu_active == "laporan_realisasi_fisik") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("laporan-realisasi-fisik/detail/" .$tahun_now."/" . $encrypt_id); ?>">
                                            <span class="sub-item">Laporan Realisasi Fisik</span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
             


                <?php if ($role_admin == "master" or $role_admin == "provinsi" or $role_admin == "kabupaten") { ?>

                    <li class="nav-item <?php if ($menu_active == "upload_data") {
                                            echo "active submenu";
                                        } ?>">
                        <a data-toggle="collapse" href="#upload_data" class="collapsed" aria-expanded="false">
                            <i class="fa fa-upload"></i>
                            <p>Upload Data</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?php if ($menu_active == "upload_data") {
                                                    echo "show";
                                                } ?>" id="upload_data">
                            <ul class="nav nav-collapse">
                                <?php if ($role_admin == "master") { ?>
                                    <li <?php if ($submenu_active == "upload_anggaran_skpd") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("upload/anggaran-skpd"); ?>">
                                            <span class="sub-item">Data Anggaran OPD</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "upload_lra_skpd") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("upload/lra-skpd"); ?>">
                                            <span class="sub-item">Data LRA OPD</span>
                                        </a>
                                    </li>
                                    <!-- <li <?php if ($submenu_active == "upload_kegiatan_fisik") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("upload_kegiatan_fisik/skpd"); ?>">
                                            <span class="sub-item">Data Kegiatan Fisik</span>
                                        </a>
                                    </li> -->
                                    <li <?php if ($submenu_active == "upload_danadesa") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("upload/dana-desa-" . date('Y') . "-" . date('m')); ?>">
                                            <span class="sub-item">Dana Desa</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "lra-kabupaten-kota") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("lra-kabupaten-kota"); ?>">
                                            <span class="sub-item">LRA Kabupaten Kota</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "anggaran-kas") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("upload-anggaran-kas"); ?>">
                                            <span class="sub-item">Data Anggaran Kas</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "realisasi-kontrak") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("upload-realisasi-kontrak"); ?>">
                                            <span class="sub-item">Realisasi Kontrak</span>
                                        </a>
                                    </li>
                                <?php } elseif ($role_admin == "provinsi") { ?>
                                    <li <?php if ($submenu_active == "upload_anggaran_skpd") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("upload/anggaran-skpd"); ?>">
                                            <span class="sub-item">Data Anggaran OPD</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "upload_lra_skpd") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("upload/lra-skpd"); ?>">
                                            <span class="sub-item">Data LRA OPD</span>
                                        </a>
                                    </li>

                                    <!-- <li <?php if ($submenu_active == "upload_kegiatan_fisik") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("upload_kegiatan_fisik/skpd"); ?>">
                                            <span class="sub-item">Data Kegiatan Fisik</span>
                                        </a>
                                    </li> -->

                                <?php } else if ($role_admin == "kabupaten") { ?>
                                    <li <?php if ($submenu_active == "lra-kabupaten-kota") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("lra-kabupaten-kota"); ?>">
                                            <span class="sub-item">LRA Kabupaten Kota</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "upload_danadesa") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("upload/dana-desa-" . 2021 . "-" . 12); ?>">
                                            <span class="sub-item">Dana Desa</span>
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </li>
                <?php } ?>

                <?php if ($role_admin == "fisik" or $role_admin == "keuangan") { $encrypt_id = encrypt_url($id_skpd); ?> ?>

                    <li class="nav-item <?php if ($menu_active == "upload_data") {
                                            echo "active submenu";
                                        } ?>">
                        <a data-toggle="collapse" href="#upload_data" class="collapsed" aria-expanded="false">
                            <i class="fa fa-upload"></i>
                            <p>Upload Data</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?php if ($menu_active == "upload_data") {
                                                    echo "show";
                                                } ?>" id="upload_data">
                            <ul class="nav nav-collapse">
                                    <li <?php if ($submenu_active == "upload_lra_skpd") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("upload_lra/skpd/detail/".$tahun_now."/".$encrypt_id); ?>">
                                            <span class="sub-item">Data LRA OPD</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "anggaran-kas") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("anggaran-kas-detail/".$tahun_now."/".$encrypt_id); ?>">
                                            <span class="sub-item">Data Anggaran Kas</span>
                                        </a>
                                    </li>
                                    <!-- <li <?php if ($submenu_active == "upload_kegiatan_fisik") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("upload_kegiatan_fisik/skpd/detail/".$tahun_now."/".$encrypt_id); ?>">
                                            <span class="sub-item">Data Kegiatan Fisik</span>
                                        </a>
                                    </li> -->
                            </ul>
                        </div>
                    </li>
                <?php } ?>

                <?php if ($role_admin == "master" or $role_admin == "provinsi" or $role_admin == "kabupaten") { ?>

                <li class="nav-item <?php if ($menu_active == "realisasi_apbn") {
                                        echo "active submenu";
                                    } ?>">
                    <a data-toggle="collapse" href="#realisasi_apbn" class="collapsed" aria-expanded="false">
                        <i class="fa fa-plus"></i>
                        <p>Realisasi APBN</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?php if ($menu_active == "realisasi_apbn") {
                                                echo "show";
                                            } ?>" id="realisasi_apbn">
                        <ul class="nav nav-collapse">
                                <li <?php if ($submenu_active == "realisasi-dak") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("realisasi/dak"); ?>">
                                        <span class="sub-item">Dana Alokasi Khusus</span>
                                    </a>
                                </li>
                                <li <?php if ($submenu_active == "realisasi-dekon") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("realisasi/dekon"); ?>">
                                        <span class="sub-item">Dana Dekonsentrasi</span>
                                    </a>
                                </li>
                                <li <?php if ($submenu_active == "realisasi-tugas") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("realisasi/tugas"); ?>">
                                        <span class="sub-item">Dana Tugas Pembantuan</span>
                                    </a>
                                </li>
                        </ul>
                    </div>
                </li>
            <?php } ?>

            <?php if ($role_admin == "fisik" or $role_admin == "keuangan") { $encrypt_id = encrypt_url($id_skpd); ?> ?>

                <li class="nav-item <?php if ($menu_active == "realisasi_apbn") {
                                        echo "active submenu";
                                    } ?>">
                    <a data-toggle="collapse" href="#realisasi_apbn" class="collapsed" aria-expanded="false">
                        <i class="fa fa-plus"></i>
                        <p>Realisasi APBN</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?php if ($menu_active == "realisasi_apbn") {
                                                echo "show";
                                            } ?>" id="realisasi_apbn">
                        <ul class="nav nav-collapse">
                                <li <?php if ($submenu_active == "realisasi-dak") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("realisasi/dak/detail/".$tahun_now."/".$encrypt_id); ?>">
                                        <span class="sub-item">Dana Alokasi Khusus</span>
                                    </a>
                                </li>
                                <li <?php if ($submenu_active == "realisasi-dekon") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("realisasi/dekon/detail/".$tahun_now."/".$encrypt_id); ?>">
                                        <span class="sub-item">Dana Dekonsentrasi</span>
                                    </a>
                                </li>
                                <li <?php if ($submenu_active == "realisasi-tugas") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("realisasi/tugas/detail/".$tahun_now."/".$encrypt_id); ?>">
                                        <span class="sub-item">Dana Tugas Pembantuan</span>
                                    </a>
                                </li>
                        </ul>
                    </div>
                </li>
                <?php } ?>


                <?php if ($this->session->userdata('role_admin') != "master") : ?>
                    <li class="nav-item <?php if ($submenu_active == "profile") {
                                            echo "active";
                                        } ?>">
                        <a href="<?= site_url("setting/profile"); ?>">
                            <i class="fa fa-user"></i>
                            <p>Profile User</p>
                        </a>
                    </li>
                <?php else : ?>
                    <li class="nav-item <?php if ($menu_active == "setting") {
                                            echo "active submenu";
                                        } ?>">
                        <a data-toggle="collapse" href="#setting" class="collapsed" aria-expanded="false">
                            <i class="fa fa-cogs"></i>
                            <p>Setting</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?php if ($menu_active == "setting") {
                                                    echo "show";
                                                } ?>" id="setting">
                            <ul class="nav nav-collapse">
                                <li <?php if ($submenu_active == "users") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("setting/users"); ?>">
                                        <span class="sub-item">Data User</span>
                                    </a>
                                </li>
                                <li <?php if ($submenu_active == "profile") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("setting/profile"); ?>">
                                        <span class="sub-item">Profile User</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <li class="nav-item <?php if ($menu_active == "logout") {
                                        echo "active";
                                    } ?>">
                    <a href="<?= site_url("logout"); ?>">
                        <i class="fa fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>