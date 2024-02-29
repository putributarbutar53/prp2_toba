<!-- Sidebar -->
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
                <?php $periode = periode_danadesa(); ?>
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
                            <?php if ($role_admin == "master") : ?>
                                <li <?php if ($submenu_active == "skpd") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("master/skpd"); ?>">
                                        <span class="sub-item">Data SKPD</span>
                                    </a>
                                </li>
                                <!-- <li <?php if ($submenu_active == "skpd") {
                                                echo "class='active'";
                                            } ?>>
                                    <a href="<?= site_url("master/skpd"); ?>">
                                        <span class="sub-item">Data Kabupaten/Kota</span>
                                    </a>
                                </li> -->
                                <li <?php if ($submenu_active == "jenis-pelaksanaan") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("master/jenis-pelaksanaan"); ?>">
                                        <span class="sub-item">Jenis Pelaksanaan</span>
                                    </a>
                                </li>
                                <li <?php if ($submenu_active == "data-mandatory-kabupaten") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("data-mandatory-kabupaten"); ?>">
                                        <span class="sub-item">Mandatory Kabupaten/Kota</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <!-- <li <?php if ($submenu_active == "pengguna-anggaran") {
                                            echo "class='active'";
                                        } ?>>
                                <a href="<?= site_url("master/pengguna-anggaran"); ?>">
                                    <span class="sub-item">Pengguna Anggaran</span>
                                </a>
                            </li> -->
                            <li <?php if ($submenu_active == "kepala-skpd") {
                                    echo "class='active'";
                                } ?>>
                                <a href="<?= site_url("master/kepala-skpd"); ?>">
                                    <span class="sub-item">Kepala SKPD</span>
                                </a>
                            </li>
                            <!-- <li <?php if ($submenu_active == "bendahara-pengeluaran") {
                                            echo "class='active'";
                                        } ?>>
                                <a href="<?= site_url("master/bendahara-pengeluaran"); ?>">
                                    <span class="sub-item">Bendahara Pengeluaran</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </li>

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
                        <a href="<?= site_url("pendapatan/skpd/detail/" . $encrypt_id); ?>">
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
                        <a href="<?= site_url("belanja/skpd/detail/" . $encrypt_id); ?>">
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
                        <a href="<?= site_url("kegiatan/skpd/" . $encrypt_id); ?>">
                            <i class="fa fa-tasks"></i>
                            <p>Kegiatan Fisik</p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($role_admin == "master") : ?>
                    <li class="nav-item <?php if ($menu_active == "dana_desa") {
                                            echo "active";
                                        } ?>">
                        <a href="<?= site_url("wilayah/dana-desa-2021-12"); ?>">
                            <i class="fa fa-th"></i>
                            <p>Dana Desa</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($role_admin != "pakar") { ?>
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
                                        <a href="<?= site_url("realisasi-keuangan/detail/" . $encrypt_id); ?>">
                                            <span class="sub-item">Data Realisasi Keuangan</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "laporan_realisasi_keuangan") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("laporan-realisasi-keuangan/detail/" . $encrypt_id); ?>">
                                            <span class="sub-item">Laporan Realisasi Keuangan</span>
                                        </a>
                                    </li>
                                    <li <?php if ($submenu_active == "laporan_realisasi_fisik") {
                                            echo "class='active'";
                                        } ?>>
                                        <a href="<?= site_url("laporan-realisasi-fisik/detail/" . $encrypt_id); ?>">
                                            <span class="sub-item">Laporan Realisasi Fisik</span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                <?php } ?>


                <?php if ($role_admin == "master") { ?>

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
                                <li <?php if ($submenu_active == "upload_kegiatan") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("upload-kegiatan-fisik"); ?>">
                                        <span class="sub-item">Data Kegiatan Fisik</span>
                                    </a>
                                </li>
                                <li <?php if ($submenu_active == "upload_danadesa") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("upload/dana-desa-" . $periode['tahun'] . "-" . $periode['bulan']); ?>">
                                        <span class="sub-item">Dana Desa</span>
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
                                <li <?php if ($submenu_active == "lra-kabupaten-kota") {
                                        echo "class='active'";
                                    } ?>>
                                    <a href="<?= site_url("lra-kabupaten-kota"); ?>">
                                        <span class="sub-item">LRA Kabupaten Kota</span>
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