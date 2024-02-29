-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 Jul 2022 pada 17.48
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prp2pemkab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses_admin`
--

CREATE TABLE `akses_admin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_user` varchar(35) NOT NULL,
  `nip_user` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses_admin`
--

INSERT INTO `akses_admin` (`id_user`, `username`, `nama_user`, `nip_user`) VALUES
(1, 'admin', 'Yudhi Andrian', '-'),
(2, 'bpdp1', 'Trie Utami, SH', '19910205 201403 2 002'),
(3, 'bpdp2', 'Nita Herawati', '19780903 200701 2 001'),
(4, 'ipd1', 'Ponimin', '197912022009011001'),
(5, 'dewan1', 'Sri Rafiqoh, SE', '198306252010012018'),
(6, 'polpp1', 'Ahmad Jufri Harahap, SE, M.Si', '198305192011011004'),
(7, 'bpbd1', 'Teguh Wigunardi', '198601072006041005'),
(8, 'bpp1', 'Nashriatun Munawwarah, SE', '197901242009032004'),
(9, 'aset1', 'Medika Eva Yanti, SE', '198603132010012019'),
(10, 'bpprd1', 'Novi Afriani, SE', '198504192011012019'),
(11, 'sumberdaya1', 'Annisa Ibrahim, SE', '199212202020122012'),
(12, 'bkd1', 'Sri Rahmadani, S.Kom', '198605202010012024'),
(13, 'bkbp1', 'Febri Kurniawan Siregar, A.Md', '199302272020122002'),
(14, 'bppd1', 'Nurhujaima, SE', '198709052020122004'),
(15, 'bmbk1', 'Reza Agus Parlindungan Hrp, ST', '198708202015071001'),
(16, 'desdm1', 'Elisabet UB. Pakpahan, SE', '199107242020122019'),
(17, 'dkp1', 'Erika Agustina, SE', '198608012010012003'),
(18, 'kehutanan1', 'Nenci Navratilova Manik, SE', '198406302006042002'),
(19, 'dinaskelautan1', 'Nanda Syahputra, S. Pi', '198409142011011011'),
(20, 'sipil1', 'Yusnita Hastuti Siregar, S.Pt', '1982007092009012001'),
(21, 'dinkes1', 'Eko Armando Maha, ST, ME', '199206102020121009'),
(22, 'dkpp1', 'Emilia Podesta Nasrun, SP, M.Si', '197507232010012005'),
(23, 'kominfo1', 'Martalisha', '196403131985032001'),
(24, 'kukm1', 'Rienty M. Nainggolan, A. Md', '197711052012122003'),
(25, 'lingkunganhidup1', 'H. Marsuyetno, S.Sos, M.AP', '196706181990071001'),
(26, 'dpmd1', 'Tengku Andri Saladin, SE', '197308082009011001'),
(27, 'dpppa1', 'Idham Mansyur, SE', '198709182010011003'),
(28, 'dispora1', 'Ariski Putra Yusuf, S.Pd', '198411262014031001'),
(29, 'dpm1', 'Rinto ML Tobing, S.AP', '19811106 200502 1 002'),
(30, 'disdik1', 'Syahfitra, S.Kom', '19721202 201212 1 006'),
(31, 'dppkb1', 'Darmansyah, SE', '19931208 202012 1 010'),
(32, 'dishub1', 'Evarina Nurihisa Ginting, M.Si', '19850825 201101 2 023'),
(33, 'dpp1', 'Febrina Kurniawaty Aruan, S.ST', '19810225 200902 2 002'),
(34, 'perkebunan1', 'Margareth Trisnawati br. Surbakti, ', '19870304 202012 2 006'),
(35, 'dpa1', 'Ahmad Afif Fauzan, SE', '19940718 202012 1 011'),
(36, 'pkp1', 'Hendra Oliver Sihombing, A.Md', '19850915 201001 1 018'),
(37, 'dinsos1', 'Desi Natalia Sitorus, S.ST', '19891220 201101 2 006'),
(38, 'dsda1', 'Muhammad Andrisyam, ST', '19871105 201101 1 002'),
(39, 'dtph1', 'Ednasari Damanik, SP', '19861207 201101 2 004'),
(40, 'dtk1', 'Relani Noverita Br. Sianturi, SE', '19831126 201101 2 002'),
(41, 'biropembangunan1', 'Afrini Yohana, SE, M.AP', '19850409 200604 2 001'),
(42, 'perekonomian1', 'Ambani Romasi Naibaho, A.Md', '19891227 201101 2 001'),
(43, 'hukum1', 'Macklin Pardede, A.Md', '19800324 201212 1 002'),
(44, 'bhk1', 'Taufik Siregar', '19810817 200902 1 002'),
(45, 'organisasi1', 'Simon Hutabarat', '19740905 200502 1001'),
(46, 'bsk1', 'Nuzuliana Lubis, S.Sos', '19700301 199103 2 002'),
(47, 'pemerintah1', 'Dra. Suheili Yusni Lubis', '19690708 199303 2 005'),
(48, 'bodk1', 'Hoiruman Pulungan, SE', '19660502 198810 1 001'),
(49, 'umum1', 'Faisal Ghifa Razak', '19760412 200901 1 003'),
(50, 'rsuhaji1', 'Ermiwati', '19781029 199903 2 002'),
(51, 'rsj1', 'Dian Sukmawarni Siregar, SKM', '19800409 200502 2 001'),
(52, 'ipd2', 'Diana Zuraeda', '19780117 200502 2 001'),
(53, 'dewan2', 'Wira Ardhiningtyas, A.Md', '19870130201101 1 003'),
(54, 'polpp2', 'Ahmad Jufri Harahap, SE, M.Si', '19830519 201101 1 004'),
(55, 'bpbd2', 'Arwanda Ginting', '19790328 201001 1 009'),
(56, 'bpp2', 'Chandra Siregar, S.Ak', '19890605 202012 1 005'),
(57, 'aset2', 'Widya Astuti, A.Md', '19800423 200901 2 001'),
(58, 'bpprd2', 'Norma Fadillah, SP', '19810916 200804 2 001'),
(59, 'sumberdaya2', 'Annisa Ibrahim, SE', '19921220 202012 2 012'),
(60, 'bkd2', 'Dewita Pratiwi, SE', '19930508 202012 2 011'),
(61, 'bkbp2', 'Nilvan Yasri Sidabutar, SE', '19890808 202012 1 010'),
(62, 'bppd2', 'Anjuita Situmorang, SE', '19820321 200902 2 002'),
(63, 'bmbk2', 'Martin Togar Hamonangan Sumbayak, S', '19770715 201001 1 002'),
(64, 'desdm2', 'Joko Supriono, SE', '19800128 200901 1 005'),
(65, 'dkp2', 'Maria Hotmauli Hutagaol, SE', '19860614 201001 2 018'),
(66, 'kehutanan2', 'Marthin Aliaser Sipayung', '19750324 199503 1 003'),
(67, 'dinaskelautan2', 'Nanda Syahputra, S.Pi', '19840914 201101 1 011'),
(68, 'sipil2', 'Dwin Fanani, SE', '19890425 201101 1 006'),
(69, 'dinkes2', 'Lamsirah Rita A. Hutagalung, SKM', '19770902 200012 2 001'),
(70, 'dkpp2', 'Yudhistira Purba, S.Pt', '19871126 201403 1 001'),
(71, 'kominfo2', 'Mohammad Suhemi', '19680421 200901 1 004'),
(72, 'kukm2', 'T Salmira Aziza, SE', '19750507 200701 2 008'),
(73, 'lingkunganhidup2', 'Irham Dani Tanjung, SE', '19830316 200901 1 001'),
(74, 'dpmd2', 'Hanafy Umri, SE', '19820526 2009001 1 001'),
(75, 'dpppa2', 'Idham Mansyur, SE', '19870918 201001 1 003'),
(76, 'dispora2', 'Yati Oktrina, S.IP', '19800108 200003 2 001'),
(77, 'dpm2', 'Pardamean Hutabarat, SE, M.Si, Ak', '19751229 200502 1 002'),
(78, 'disdik2', 'Dewi Irawati, SE', '19800505 201212 2 001'),
(79, 'dppkb2', 'Darmansyah, SE', '19931208 202012 1 010'),
(80, 'dishub2', 'Irma Hanum Lubis, A.Md', '19820216 201101 2 008'),
(81, 'dpp2', 'Febrina Kurniawaty Aruan, S.ST', '19810225 200902 2 002'),
(82, 'perkebunan2', 'Margareth Trisnawati br. Surbakti, ', '19870304 202012 2 006'),
(83, 'dpa2', 'Ahmad Afif Fauzan, SE', '19940718 202012 1 011'),
(84, 'pkp2', 'Nanda Rahmana, S.Kom', '19840913 201212 1 004'),
(85, 'dinsos2', 'Desi Natalia Sitorus, S.ST', '19891220 201101 2 006'),
(86, 'dsda2', 'Rameuli Pane, SE', '19850217 201001 2 005'),
(87, 'dtph2', 'Ae Bhatara Lubis', '19801214 200901 1 004'),
(88, 'dtk2', 'Trisna Handayani, SE', '19880111 202012 2 007'),
(89, 'biropembangunan2', 'Hanres Butar-Butar, S.IP', '19941118 201609 1 002'),
(90, 'perekonomian2', 'Ambani Romasi Naibaho, A.Md', '19891227 201101 2 001'),
(91, 'hukum2', 'Macklin Pardede, A.Md', '19800324 201212 1 002'),
(92, 'bhk2', 'Surya Ramadhan', '19790727 200801 1 005'),
(93, 'organisasi2', 'Wilda Frisca Marpaung, A.Md', '19870114 201101 2 012'),
(94, 'bsk2', 'Nunuk Mutia Sari A.Md', '19800731 200604 2 004'),
(95, 'pemerintah2', 'Suarsono', '19670305 20070 1 007'),
(96, 'bodk2', 'Dedi Yusmanto, SE', '19801106 200801 1001'),
(97, 'umum2', 'Rizka Signorita Siregar, A.Md', '19870304 200902 2 001'),
(98, 'rsuhaji2', 'Yatini', '19791112 200904 2 001'),
(99, 'rsj2', 'Fitria Rose, Amd', '19850126 201101 2 008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggarankas_detail`
--

CREATE TABLE `anggarankas_detail` (
  `id_skpd` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaran_kas`
--

CREATE TABLE `anggaran_kas` (
  `id_skpd` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nilai` double NOT NULL,
  `namafile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bendahara_pengeluaran`
--

CREATE TABLE `bendahara_pengeluaran` (
  `id_ttd` int(11) NOT NULL,
  `nip_ttd` varchar(20) NOT NULL,
  `nama_ttd` varchar(100) NOT NULL,
  `ttd` varchar(50) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `is_active` enum('Y','N') NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bendahara_pengeluaran`
--

INSERT INTO `bendahara_pengeluaran` (`id_ttd`, `nip_ttd`, `nama_ttd`, `ttd`, `id_skpd`, `is_active`, `tgl_input`) VALUES
(1, '1983020620102019', 'SONDANG ERI JUNITA LUBIS, SH', 'sondang-eri-junita-lubis-sh-20211001-121507.jpg', 18, 'Y', '2021-10-01 12:08:11'),
(2, '198206122009012003', 'DEBI JULIANA SARAGIH', 'debi-juliana-saragih-20211004-095931.png', 1, 'Y', '2021-10-04 09:58:05'),
(3, '19860323 201001 1 00', 'ABDI LH TAMPUBOLON', 'abdi-lh-tampubolon-20211004-101256.jpg', 32, 'Y', '2021-10-04 10:12:56'),
(4, '197303071993032010', 'Rosita Simanjuntak, SH', 'rosita-simanjuntak-sh-20211004-102621.jpeg', 12, 'Y', '2021-10-04 10:26:21'),
(5, '197212062007012005', 'VIVI AULIA', 'vivi-aulia-20211004-105303.jpeg', 4, 'Y', '2021-10-04 10:53:03'),
(6, '19761201 200604 2 01', 'HOTMA DEWI SILALAHI', 'hotma-dewi-silalahi-20211005-151736.jpg', 30, 'Y', '2021-10-04 11:02:29'),
(7, '198212192007011002', 'AGUS SUFIYANNUR, SH', 'agus-sufiyannur-sh-20211004-110403.jpg', 17, 'Y', '2021-10-04 11:04:03'),
(8, '198307302015032002', 'Julita Hutapea, A.Md', 'julita-hutapea-amd-20211004-112317.png', 21, 'Y', '2021-10-04 11:23:17'),
(9, '19740315 200604 1 01', 'MISNAN', 'misnan-20211004-113228.jpg', 6, 'Y', '2021-10-04 11:32:28'),
(10, '198305302006042005', 'ENDANG ELLIS ROMEI SINAGA, SE', 'endang-ellis-romei-sinaga-se-20211004-113758.jpeg', 15, 'Y', '2021-10-04 11:37:58'),
(11, '198107282009011006', 'JOHN FERRY SITUMORANG, SH', 'john-ferry-situmorang-sh-20211004-113808.jpeg', 16, 'N', '2021-10-04 11:38:08'),
(12, '197605232008011003', 'BINAHAR LUMBANGAOL', 'binahar-lumbangaol-20211004-120223.jpg', 25, 'Y', '2021-10-04 12:02:24'),
(13, '19690818 200801 2 00', 'HAIDA SIBARANI', 'haida-sibarani-20211005-140710.jpeg', 10, 'Y', '2021-10-04 12:13:09'),
(14, '19810428 201212 2 00', 'FAZA HALILAH', 'faza-halilah-20211004-121502.jpg', 28, 'Y', '2021-10-04 12:15:03'),
(15, '198808022010012015', 'SYLVANI L. SITANGGANG, A.Md', 'sylvani-l-sitanggang-amd-20211005-101147.jpg', 33, 'Y', '2021-10-04 12:23:06'),
(16, '198608202014101001', 'YUDANTO', 'yudanto-20211004-124838.jpg', 31, 'Y', '2021-10-04 12:48:39'),
(17, '198707042011012019', 'MEGA SELVIA DEWI SIPAYUNG, SS', 'mega-selvia-dewi-sipayung-ss-20211004-133725.png', 22, 'Y', '2021-10-04 13:37:25'),
(18, '19810113 200901 1 00', 'Gopal Gultom', 'gopal-gultom-20211004-141849.jpeg', 11, 'Y', '2021-10-04 14:18:49'),
(19, '19730614 199404 2 00', 'NURLELY JUNIARI SITOMPUL', 'nurlely-juniari-sitompul-20211004-143500.jpeg', 14, 'Y', '2021-10-04 14:24:56'),
(20, '198703132011012033', 'CAROLINA MS SIAGIAN, S.Sos', 'carolina-ms-siagian-ssos-20211004-160034.jpeg', 9, 'Y', '2021-10-04 14:57:57'),
(21, '198504022009011001', 'HERMANSYAH, SE', 'hermansyah-se-20211004-150046.jpeg', 5, 'Y', '2021-10-04 15:00:46'),
(22, '197605062006041004', 'EIKA WIJAYA, A. Md', 'eika-wijaya-a-md-20211004-150525.png', 20, 'Y', '2021-10-04 15:05:25'),
(23, '19660121 198903 2 00', 'NIKMAH SIREGAR', 'nikmah-siregar-20211004-151205.jpeg', 3, 'Y', '2021-10-04 15:12:05'),
(24, '19820904 200901 2 00', 'HERTIARINA, S.Sos. i', 'hertiarina-ssos-i-20211004-151857.jpeg', 27, 'Y', '2021-10-04 15:18:57'),
(25, '198109062005021003', 'FRENGKI DANIEL PURBA,SH', 'frengki-daniel-purbash-20211004-154045.png', 26, 'Y', '2021-10-04 15:40:45'),
(26, '198107052009012002', 'Sri Hastuti', 'sri-hastuti-20211004-173221.jpg', 7, 'Y', '2021-10-04 15:56:36'),
(27, '196708291988102001', 'ASLI SILALAHI, SH', 'asli-silalahi-sh-20211005-122232.jpeg', 23, 'Y', '2021-10-05 10:20:22'),
(28, '19850908 201212 2 00', 'JENNITA SEPTIARA SIMARMATA', 'jennita-septiara-simarmata-20211005-113852.jpeg', 24, 'Y', '2021-10-05 11:38:52'),
(29, '19690511 2015062002', 'Indri Melisa Siagian', 'indri-melisa-siagian-20211005-121322.jpg', 2, 'Y', '2021-10-05 12:13:22'),
(30, '198107282009011006', 'JOHN FERRY H. SITUMORANG, SH', 'john-ferry-h-situmorang-sh-20211005-123934.jpeg', 16, 'Y', '2021-10-05 12:39:34'),
(31, '197811302009032001', 'NOVITA DOSRIA SIAHAAN', 'novita-dosria-siahaan-20211005-125742.jpeg', 8, 'Y', '2021-10-05 12:57:42'),
(32, '197904242010012009', 'Kesra Sibarani, SH', 'kesra-sibarani-sh-20211005-143730.jpg', 13, 'Y', '2021-10-05 14:37:30'),
(33, '197602142005022005', 'FELLEWANNA PURBA, SH', 'fellewanna-purba-sh-20211005-153847.jpg', 29, 'Y', '2021-10-05 15:38:47'),
(34, '197511182007012006', 'TARHIRIM SIHOMBING, SH', 'tarhirim-sihombing-sh-20211005-185024.png', 19, 'Y', '2021-10-05 18:06:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_alokasi_pemko`
--

CREATE TABLE `data_alokasi_pemko` (
  `id_alokasi_pemko` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `pendapatan` double NOT NULL,
  `pad` double NOT NULL,
  `transfer` double NOT NULL,
  `pusat` double NOT NULL,
  `dbh_daerah` double NOT NULL,
  `pad_lain` double NOT NULL,
  `belanja` double NOT NULL,
  `operasi` double NOT NULL,
  `modal` double NOT NULL,
  `takterduga` double NOT NULL,
  `pembiayaan` double NOT NULL,
  `st_anggaran` int(11) NOT NULL DEFAULT '1' COMMENT '1:APBD, 2:PAPBD'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_alokasi_tr_pemko`
--

CREATE TABLE `data_alokasi_tr_pemko` (
  `id_alokasi_tr_pemko` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `dbh` double NOT NULL,
  `dau` double NOT NULL,
  `dak` double NOT NULL,
  `daknon` double NOT NULL,
  `st_anggaran_tr` int(11) NOT NULL DEFAULT '1' COMMENT '1:APBD, 2:PAPBD'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kegiatan`
--

CREATE TABLE `data_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `id_pa` int(11) NOT NULL,
  `no_kontrak` varchar(25) NOT NULL,
  `nama_penyedia` varchar(100) NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `lokasi_pekerjaan` varchar(200) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `nilai_pagu` double NOT NULL,
  `jenis_kegiatan` int(11) NOT NULL,
  `id_jenis_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `id_jenis_pelaksanaan` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `target_angka` int(11) NOT NULL,
  `target_tipe` enum('H','M','B','T') NOT NULL COMMENT 'Hari, Minggu, Bulan',
  `user_input` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kegiatan_detail`
--

CREATE TABLE `data_kegiatan_detail` (
  `id_kegiatan_detail` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `jenis_target` enum('H','M','B','T') NOT NULL,
  `tahapan_target` int(11) NOT NULL,
  `jadwal_target` date NOT NULL,
  `target` double NOT NULL,
  `target_keuangan` double NOT NULL,
  `realisasi` double NOT NULL,
  `realisasi_keuangan` double NOT NULL,
  `keterangan_target` varchar(200) NOT NULL,
  `user_input` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kegiatan_fisik`
--

CREATE TABLE `data_kegiatan_fisik` (
  `id_kegiatan_fisik` int(5) NOT NULL,
  `kode_tender` int(8) NOT NULL,
  `kode_rup` int(8) NOT NULL,
  `nama_tender` varchar(255) NOT NULL,
  `tanggal_tayang` varchar(25) NOT NULL,
  `anggaran` varchar(12) NOT NULL,
  `nama_skpd` varchar(75) NOT NULL,
  `id_skpd` int(3) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `id_metode` int(2) NOT NULL,
  `kualifikasi` varchar(20) NOT NULL,
  `dokumen` varchar(10) NOT NULL,
  `motode_evaluasi` varchar(35) NOT NULL,
  `nilai_pagu` double NOT NULL,
  `nilai_hps` double NOT NULL,
  `nama_pemenang` varchar(50) NOT NULL,
  `harga_penawaran` double NOT NULL,
  `st_jadwal` varchar(100) NOT NULL,
  `nama_metode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kode_rekening`
--

CREATE TABLE `data_kode_rekening` (
  `id_uraian` int(2) NOT NULL,
  `kode_rekening` varchar(16) NOT NULL,
  `uraian` varchar(150) NOT NULL,
  `level` int(1) NOT NULL,
  `jenis` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kode_rekening`
--

INSERT INTO `data_kode_rekening` (`id_uraian`, `kode_rekening`, `uraian`, `level`, `jenis`) VALUES
(1, '4', 'PENDAPATAN DAERAH', 1, 1),
(2, '4.1', 'PENDAPATAN ASLI DAERAH (PAD)', 2, 1),
(3, '4.2', 'PENDAPATAN TRANSFER', 2, 1),
(4, '4.3', 'LAIN-LAIN PENDAPATAN DAERAH YANG SAH', 2, 1),
(5, '5', 'BELANJA DAERAH', 1, 2),
(6, '5.1', 'BELANJA OPERASII', 2, 2),
(7, '5.2', 'BELANJA MODAL', 2, 2),
(8, '5.3', 'BELANJA TIDAK TERDUGA', 2, 2),
(9, '5.4', 'BELANJA TRANSFER', 2, 2),
(10, '4.2.1.01.01', 'Dana Transfer Umum-Dana Bagi Hasil (DBH)', 5, 1),
(11, '4.2.1.01.02', 'Dana Transfer Umum-Dana Alokasi Umum (DAU)', 5, 1),
(12, '4.2.1.01.03', 'Dana Transfer Khusus-Dana Alokasi Khusus (DAK) Fisik', 5, 1),
(13, '4.2.1.01.04', 'Dana Transfer Khusus-Dana Alokasi Khusus (DAK) Non Fisik', 5, 1),
(14, '4.3.4.01.02 ', 'Dana Insentif Daerah (DID)', 5, 1),
(15, '4.3.5', 'Dana Desa', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kontrak_real`
--

CREATE TABLE `data_kontrak_real` (
  `id_real` int(7) NOT NULL,
  `tahun` int(4) NOT NULL,
  `id_kontrak` int(7) NOT NULL,
  `no_kontrak` varchar(150) NOT NULL,
  `nilai` double NOT NULL,
  `kd_urusan` int(1) NOT NULL,
  `kd_bidang` int(2) NOT NULL,
  `kd_unit` int(1) NOT NULL,
  `kd_sub` int(1) NOT NULL,
  `kd_keg` int(4) NOT NULL,
  `keterangan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kontrak_real`
--

INSERT INTO `data_kontrak_real` (`id_real`, `tahun`, `id_kontrak`, `no_kontrak`, `nilai`, `kd_urusan`, `kd_bidang`, `kd_unit`, `kd_sub`, `kd_keg`, `keterangan`) VALUES
(1, 2022, 1, '123/765', 100000000, 1, 1, 1, 1, 0, ''),
(2, 2022, 2, '123/ty', 100000000, 1, 1, 1, 1, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_prioritas`
--

CREATE TABLE `data_prioritas` (
  `id_prioritas` int(1) NOT NULL,
  `nama_prioritas` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_prioritas`
--

INSERT INTO `data_prioritas` (`id_prioritas`, `nama_prioritas`) VALUES
(1, 'Prioritas Pembangunan Peningkatan dan Pemenuhan Akses Pendidikan'),
(2, 'Prioritas peningkatan derajat kesehatan masyarakat'),
(3, 'Prioritas peningkatan kesempatan kerja dan berusaha melalui penyediaan lapangan pekerjaan'),
(4, 'Prioritas peningkatan daya saing melalui sektor agraris'),
(5, 'Prioritas peningkatan daya saing melalui sektor pariwisata'),
(6, 'Prioritas peningkatan kualitas reformasi birokrasi'),
(7, 'Prioritas peningkatan sosial kemasyarakatan dan olahraga'),
(8, 'Prioritas Pembangunan Infrastruktur Yang Baik Dan Berwawasan Lingkungan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_realisasi`
--

CREATE TABLE `data_realisasi` (
  `id_realisasi` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `pagu` double NOT NULL,
  `realisasi_atbulan` double NOT NULL,
  `realisasi_sdbulan` double NOT NULL,
  `sisa` double NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `pendapatan` double NOT NULL,
  `realisasi_pendapatan` double NOT NULL,
  `pad` double NOT NULL,
  `realisasi_pad` double NOT NULL,
  `transfer` double NOT NULL,
  `realisasi_transfer` double NOT NULL,
  `pusat` double NOT NULL,
  `realisasi_pusat` double NOT NULL,
  `dbh` double NOT NULL,
  `realisasi_dbh` double NOT NULL,
  `dau` double NOT NULL,
  `realisasi_dau` double NOT NULL,
  `dak` double NOT NULL,
  `realisasi_dak` double NOT NULL,
  `daknon` double NOT NULL,
  `realisasi_daknon` double NOT NULL,
  `dbh_daerah` double NOT NULL,
  `realisasi_dbh_daerah` double NOT NULL,
  `pad_lain` double NOT NULL,
  `realisasi_pad_lain` double NOT NULL,
  `belanja` double NOT NULL,
  `realisasi_belanja` double NOT NULL,
  `operasi` double NOT NULL,
  `realisasi_operasi` double NOT NULL,
  `modal` double NOT NULL,
  `realisasi_modal` double NOT NULL,
  `takterduga` double NOT NULL,
  `realisasi_takterduga` double NOT NULL,
  `persen_pendapatan` double NOT NULL,
  `persen_belanja` double NOT NULL,
  `tgl_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_realisasi_detail_pemko`
--

CREATE TABLE `data_realisasi_detail_pemko` (
  `kode_rekening` varchar(11) NOT NULL,
  `realisasi` double NOT NULL,
  `persen` double NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_realisasi_detail_skpd`
--

CREATE TABLE `data_realisasi_detail_skpd` (
  `id_realisasi` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `kode_rekening` varchar(16) NOT NULL,
  `realisasi` double NOT NULL,
  `persen` double NOT NULL COMMENT 'temp: hasrus dibuang',
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_realisasi_pemko`
--

CREATE TABLE `data_realisasi_pemko` (
  `id_realisasi_pemko` int(11) NOT NULL,
  `realisasi_tahun` int(11) NOT NULL,
  `realisasi_bulan` int(11) NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `realisasi_pendapatan` double NOT NULL,
  `realisasi_pad` double NOT NULL,
  `realisasi_transfer` double NOT NULL,
  `realisasi_pusat` double NOT NULL,
  `realisasi_dbh_daerah` double NOT NULL,
  `realisasi_pad_lain` double NOT NULL,
  `realisasi_belanja` double NOT NULL,
  `realisasi_operasi` double NOT NULL,
  `realisasi_modal` double NOT NULL,
  `realisasi_takterduga` double NOT NULL,
  `realisasi_pembiayaan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_realisasi_tr_pemko`
--

CREATE TABLE `data_realisasi_tr_pemko` (
  `id_realisasi_tr_pemko` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `realisasi_dbh` double NOT NULL,
  `realisasi_dau` double NOT NULL,
  `realisasi_dak` double NOT NULL,
  `realisasi_daknon` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_serapan_skpd`
--

CREATE TABLE `data_serapan_skpd` (
  `id_serapan` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `kode_rekening` varchar(16) NOT NULL,
  `realisasi` double NOT NULL,
  `persen` double NOT NULL COMMENT 'temp: hasrus dibuang',
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_serapan_skpd`
--

INSERT INTO `data_serapan_skpd` (`id_serapan`, `id_skpd`, `kode_rekening`, `realisasi`, `persen`, `tahun`, `bulan`) VALUES
(1, 1, '4', 768233160234, 13.67, 2022, 1),
(2, 1, '4.1', 24707352380, 5.77, 2022, 1),
(3, 1, '4.2', 731156820400, 14.36, 2022, 1),
(4, 1, '4.3', 12368987454, 12.46, 2022, 1),
(5, 1, '5', 562227238191, 17.81, 2022, 1),
(6, 1, '5.1', 2789416237, 4.66, 2022, 1),
(7, 1, '5.2', 0, 0, 2022, 1),
(8, 1, '5.3', 0, 0, 2022, 1),
(9, 1, '5.4', 559437821954, 18.61, 2022, 1),
(10, 1, '4', 768233160234, 13.67, 2022, 2),
(11, 1, '4.1', 24707352380, 5.77, 2022, 2),
(12, 1, '4.2', 731156820400, 14.36, 2022, 2),
(13, 1, '4.3', 12368987454, 12.46, 2022, 2),
(14, 1, '5', 562227238191, 17.81, 2022, 2),
(15, 1, '5.1', 2789416237, 4.66, 2022, 2),
(16, 1, '5.2', 0, 0, 2022, 2),
(17, 1, '5.3', 0, 0, 2022, 2),
(18, 1, '5.4', 559437821954, 18.61, 2022, 2),
(19, 3, '4', 0, 0, 2022, 4),
(20, 3, '4.1', 0, 0, 2022, 4),
(21, 3, '4.2', 0, 0, 2022, 4),
(22, 3, '4.3', 0, 0, 2022, 4),
(23, 3, '5', 0, 0, 2022, 4),
(24, 3, '5.1', 0, 0, 2022, 4),
(25, 3, '5.2', 0, 0, 2022, 4),
(26, 3, '5.3', 0, 0, 2022, 4),
(27, 3, '5.4', 0, 0, 2022, 4),
(28, 1, '4', 0, 0, 2022, 4),
(29, 1, '4.1', 0, 0, 2022, 4),
(30, 1, '4.2', 0, 0, 2022, 4),
(31, 1, '4.3', 0, 0, 2022, 4),
(32, 1, '5', 0, 0, 2022, 4),
(33, 1, '5.1', 0, 0, 2022, 4),
(34, 1, '5.2', 0, 0, 2022, 4),
(35, 1, '5.3', 0, 0, 2022, 4),
(36, 1, '5.4', 0, 0, 2022, 4),
(37, 47, '4', 1223500, 8.44, 2022, 5),
(38, 47, '4.1', 1223500, 8.44, 2022, 5),
(39, 47, '4.2', 0, 0, 2022, 5),
(40, 47, '4.3', 0, 0, 2022, 5),
(41, 47, '5', 39679646.73, 0.43, 2022, 5),
(42, 47, '5.1', 39679646.73, 0.59, 2022, 5),
(43, 47, '5.2', 0, 0, 2022, 5),
(44, 47, '5.3', 0, 0, 2022, 5),
(45, 47, '5.4', 0, 0, 2022, 5),
(64, 47, '4', 1223500, 8.44, 2022, 4),
(65, 47, '4.1', 1223500, 8.44, 2022, 4),
(66, 47, '4.2', 0, 0, 2022, 4),
(67, 47, '4.3', 0, 0, 2022, 4),
(68, 47, '5', 39679646.73, 0.43, 2022, 4),
(69, 47, '5.1', 39679646.73, 0.59, 2022, 4),
(70, 47, '5.2', 0, 0, 2022, 4),
(71, 47, '5.3', 0, 0, 2022, 4),
(72, 47, '5.4', 0, 0, 2022, 4),
(136, 47, '4', 1223500, 8.44, 2022, 3),
(137, 47, '4.1', 1223500, 8.44, 2022, 3),
(138, 47, '4.2', 0, 0, 2022, 3),
(139, 47, '4.3', 0, 0, 2022, 3),
(140, 47, '5', 39679646.73, 0.43, 2022, 3),
(141, 47, '5.1', 39679646.73, 0.59, 2022, 3),
(142, 47, '5.2', 0, 0, 2022, 3),
(143, 47, '5.3', 0, 0, 2022, 3),
(144, 47, '5.4', 0, 0, 2022, 3),
(145, 4, '4', 0, 0, 2022, 1),
(146, 4, '4.1', 0, 0, 2022, 1),
(147, 4, '4.2', 0, 0, 2022, 1),
(148, 4, '4.3', 0, 0, 2022, 1),
(149, 4, '5', 0, 0, 2022, 1),
(150, 4, '5.1', 0, 0, 2022, 1),
(151, 4, '5.2', 0, 0, 2022, 1),
(152, 4, '5.3', 0, 0, 2022, 1),
(153, 4, '5.4', 0, 0, 2022, 1),
(154, 2, '4', 0, 0, 2022, 5),
(155, 2, '4.1', 0, 0, 2022, 5),
(156, 2, '4.2', 0, 0, 2022, 5),
(157, 2, '4.3', 0, 0, 2022, 5),
(158, 2, '5', 0, 0, 2022, 5),
(159, 2, '5.1', 0, 0, 2022, 5),
(160, 2, '5.2', 0, 0, 2022, 5),
(161, 2, '5.3', 0, 0, 2022, 5),
(162, 2, '5.4', 0, 0, 2022, 5),
(163, 2, '4', 0, 0, 2022, 6),
(164, 2, '4.1', 0, 0, 2022, 6),
(165, 2, '4.2', 0, 0, 2022, 6),
(166, 2, '4.3', 0, 0, 2022, 6),
(167, 2, '5', 0, 0, 2022, 6),
(168, 2, '5.1', 0, 0, 2022, 6),
(169, 2, '5.2', 0, 0, 2022, 6),
(170, 2, '5.3', 0, 0, 2022, 6),
(171, 2, '5.4', 0, 0, 2022, 6),
(273, 1, '4', 0, 0, 2022, 7),
(274, 1, '4.1', 0, 0, 2022, 7),
(275, 1, '4.2', 0, 0, 2022, 7),
(276, 1, '4.3', 0, 0, 2022, 7),
(277, 1, '5', 0, 0, 2022, 7),
(278, 1, '5.1', 0, 0, 2022, 7),
(279, 1, '5.2', 0, 0, 2022, 7),
(280, 1, '5.3', 0, 0, 2022, 7),
(281, 1, '5.4', 0, 0, 2022, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sirup_skpd`
--

CREATE TABLE `data_sirup_skpd` (
  `id_kegiatan_sirup` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `nama_paket` varchar(200) NOT NULL,
  `pagu` double NOT NULL,
  `id_jenis_pelaksanaan` int(11) NOT NULL,
  `metode_pemilihan` varchar(50) NOT NULL,
  `sumber_dana` varchar(20) NOT NULL,
  `kode_rup` varchar(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_skpd`
--

CREATE TABLE `data_skpd` (
  `id_skpd` int(2) NOT NULL,
  `nama_skpd` varchar(150) NOT NULL,
  `pendapatan` double NOT NULL,
  `belanja` double NOT NULL,
  `st_pendapatan` int(1) NOT NULL,
  `acuan_pendapatan` int(1) NOT NULL COMMENT '0: simda, 1:tabel',
  `acuan_belanja` int(1) NOT NULL COMMENT '0: simda, 1:tabel',
  `kd_urusan` int(1) NOT NULL,
  `kd_bidang` int(2) NOT NULL,
  `kd_unit` int(1) NOT NULL,
  `kd_sub` int(1) NOT NULL,
  `realisasi` double NOT NULL,
  `persen_realisasi` double NOT NULL,
  `persen_fisik` double NOT NULL,
  `jml_input` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_skpd`
--

INSERT INTO `data_skpd` (`id_skpd`, `nama_skpd`, `pendapatan`, `belanja`, `st_pendapatan`, `acuan_pendapatan`, `acuan_belanja`, `kd_urusan`, `kd_bidang`, `kd_unit`, `kd_sub`, `realisasi`, `persen_realisasi`, `persen_fisik`, `jml_input`) VALUES
(1, 'Dinas Pendidikan', 5000000, 6049951908781, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0),
(2, 'Dinas Kesehatan', 5355524000, 593957446191, 1, 0, 0, 1, 2, 1, 1, 16076490100, 17.34, 66.21, 60),
(5, 'Dinas Pekerjaan Umum Dan Tata Ruang', 924099232, 641899976000, 1, 0, 0, 1, 3, 1, 1, 0, 0, 0, 1),
(7, 'Dinas Perumahan dan Kawasan Permukiman', 80000000, 58331047600, 1, 0, 0, 1, 4, 1, 1, 0, 0, 100, 3),
(8, 'Badan Kesatuan Bangsa dan Politik', 0, 32714389164, 0, 0, 0, 4, 12, 1, 1, 6346722947, 82.07, 0, 0),
(9, 'Satuan Polisi Pamong Praja', 0, 44300439000, 0, 0, 0, 1, 5, 1, 1, 14934105319, 100, 0, 0),
(10, 'Badan Penanggulangan Bencana Daerah', 0, 70172249151, 0, 0, 0, 1, 5, 2, 1, 32243609324, 81.24, 0, 0),
(11, 'Dinas Sosial', 0, 129547853305, 0, 0, 0, 1, 6, 1, 1, 0, 0, 0, 0),
(12, 'Dinas Ketenagakerjaan', 1910000000, 54244797000, 1, 0, 0, 2, 1, 1, 1, 0, 0, 0, 0),
(13, 'Dinas Pemberdayaan Perempuan Dan Perlindungan Anak Serta Pengendalian Penduduk Dan Keluarga Berencana', 0, 15288206000, 0, 0, 0, 2, 2, 1, 1, 527327000, 42.8, 0, 0),
(14, 'Dinas Ketahanan Pangan Dan Pertanian', 0, 105394315000, 0, 0, 0, 2, 3, 1, 1, 46044499024.01, 99.79, 0, 0),
(15, 'Dinas Lingkungan Hidup Dan Perikanan', 1800000000, 40723830945, 1, 0, 0, 2, 5, 1, 1, 0, 0, 0, 0),
(16, 'Dinas Kependudukan dan Pencatatan Sipil', 0, 16719060000, 0, 0, 0, 2, 6, 1, 1, 0, 0, 0, 0),
(17, 'Dinas Pemberdayaan Masyarakat dan Desa', 0, 23935449000, 0, 0, 0, 2, 7, 1, 1, 0, 0, 0, 0),
(19, 'Dinas Perhubungan', 300000000, 67389094000, 1, 0, 0, 2, 9, 1, 1, 0, 0, 0, 0),
(20, 'Dinas Komunikasi dan Informatika', 0, 57343481000, 0, 0, 0, 2, 10, 1, 1, 0, 0, 0, 0),
(21, 'Dinas Koperasi Dan Usaha Kecil Dan Menengah Serta Perdagangan', 0, 48042057000, 0, 0, 0, 2, 11, 1, 1, 0, 0, 0, 0),
(22, 'Dinas Penanaman Modal Dan Pelayanan Terpadu Satu Pintu', 0, 29218747000, 0, 0, 0, 2, 12, 1, 1, 2555201000, 84.72, 0, 0),
(23, 'Dinas Pemuda, Olahraga Dan Pariwisata', 48620000, 295150521000, 1, 0, 0, 2, 13, 1, 1, 0, 0, 0, 0),
(25, 'Dinas Perpustakaan dan Arsip', 0, 25263917000, 0, 0, 0, 2, 17, 1, 1, 0, 0, 16.67, 2),
(32, 'Badan Perencanaan Pembangunan Daerah, Penelitian Dan Pengembangan', 0, 42264559300, 0, 0, 0, 4, 3, 1, 1, 0, 0, 0, 0),
(33, 'Badan Keuangan Dan Aset Daerah', 7802901013566, 2467728356455, 1, 0, 0, 4, 4, 1, 1, 0, 0, 0, 0),
(34, 'Badan Kepegawaian Dan Pengembangan Sumber Daya Manusia', 0, 26757298000, 0, 0, 0, 4, 5, 1, 1, 0, 0, 0, 0),
(37, 'Sekretariat DPRD', 0, 393924697568, 0, 0, 0, 4, 8, 1, 1, 0, 0, 0, 0),
(38, 'Inspektorat Daerah', 0, 70727615000, 0, 0, 0, 4, 2, 1, 1, 0, 0, 0, 0),
(39, 'Badan Pendapatan Daerah', 5775761112627, 368849208000, 1, 0, 0, 4, 4, 2, 1, 54751313364.83, 77.89, 0, 0),
(41, 'Sekretariat Daerah', 0, 8049999683, 0, 0, 0, 4, 1, 1, 2, 0, 0, 0, 0),
(42, 'Kecamatan Kampung Rakyat', 0, 4264997100, 0, 0, 0, 4, 1, 1, 8, 0, 0, 0, 0),
(43, 'Kecamatan Kotapinang', 0, 6082650859, 0, 0, 0, 4, 1, 1, 6, 0, 0, 0, 0),
(44, 'Kecamatan Silangkitang', 0, 3391775550, 0, 0, 0, 4, 1, 1, 3, 0, 0, 0, 0),
(45, 'Kecamatan Sungai Kanan', 0, 3265837124, 0, 0, 0, 4, 1, 1, 7, 0, 0, 0, 0),
(46, 'Kecamatan Torgamba', 0, 331977999993, 0, 0, 0, 4, 1, 1, 4, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_skpd_rekap`
--

CREATE TABLE `data_skpd_rekap` (
  `id_skpd` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nilai` double NOT NULL,
  `realisasi` double NOT NULL,
  `persen_realisasi` double NOT NULL,
  `persen_fisik` double NOT NULL,
  `jml_input` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_skpd_rekap`
--

INSERT INTO `data_skpd_rekap` (`id_skpd`, `tahun`, `nilai`, `realisasi`, `persen_realisasi`, `persen_fisik`, `jml_input`) VALUES
(1, 2022, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_uraian_kegiatan_pemko`
--

CREATE TABLE `data_uraian_kegiatan_pemko` (
  `kode_rekening` varchar(16) NOT NULL,
  `uraian` varchar(150) NOT NULL,
  `level` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `anggaran` double NOT NULL,
  `jenis` int(11) NOT NULL COMMENT '1:Pendapatan, 2:Belanja, 3:Penerimaan, 4:Pengeluaran',
  `st_anggaran` int(11) NOT NULL COMMENT '1:APBD, 2:PAPBD'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_uraian_kegiatan_pemko`
--

INSERT INTO `data_uraian_kegiatan_pemko` (`kode_rekening`, `uraian`, `level`, `tahun`, `anggaran`, `jenis`, `st_anggaran`) VALUES
('4', 'PENDAPATAN DAERAH', 1, 2021, 2200000000, 1, 1),
('4.1', 'PENDAPATAN ASLI DAERAH (PAD)', 2, 2021, 2200000000, 1, 1),
('4.1.2', 'Retribusi Daerah', 3, 2021, 2200000000, 1, 1),
('4.1.2.02', 'Retribusi Jasa Usaha', 4, 2021, 2200000000, 1, 1),
('4.1.2.02.01', 'Retribusi Pemakaian Kekayaan Daerah', 5, 2021, 173880000, 1, 1),
('4.1.2.02.01.0003', 'Retribusi Penyewaan Bangunan', 6, 2021, 246498708, 1, 1),
('5', 'BELANJA DAERAH', 1, 2021, 20075000000, 2, 1),
('5.1', 'BELANJA OPERASI', 2, 2021, 17751066100, 2, 1),
('5.1.1', 'Belanja Pegawai', 3, 2021, 181080000, 2, 1),
('5.1.1.01', 'Belanja Gaji dan Tunjangan ASN', 4, 2021, 30860843291, 2, 1),
('5.1.1.01.01', 'Belanja Gaji Pokok ASN', 5, 2021, 22278054000, 2, 1),
('5.1.1.01.01.0001', 'Belanja Gaji Pokok PNS', 6, 2021, 5261927975, 2, 1),
('5.1.1.01.02', 'Belanja Tunjangan Keluarga ASN', 5, 2021, 2079514000, 2, 1),
('5.1.1.01.02.0001', 'Belanja Tunjangan Keluarga PNS', 6, 2021, 515941000, 2, 1),
('5.1.1.01.03', 'Belanja Tunjangan Jabatan ASN', 5, 2021, 1460201000, 2, 1),
('5.1.1.01.03.0001', 'Belanja Tunjangan Jabatan PNS', 6, 2021, 294831000, 2, 1),
('5.1.1.01.04', 'Belanja Tunjangan Fungsional ASN', 5, 2021, 119000000, 2, 1),
('5.1.1.01.04.0001', 'Belanja Tunjangan Fungsional PNS', 6, 2021, 124278000, 2, 1),
('5.1.1.01.05', 'Belanja Tunjangan Fungsional Umum ASN', 5, 2021, 856942996, 2, 1),
('5.1.1.01.05.0001', 'Belanja Tunjangan Fungsional Umum PNS', 6, 2021, 204490000, 2, 1),
('5.1.1.01.06', 'Belanja Tunjangan Beras ASN', 5, 2021, 1080547000, 2, 1),
('5.1.1.01.06.0001', 'Belanja Tunjangan Beras PNS', 6, 2021, 304346000, 2, 1),
('5.1.1.01.07', 'Belanja Tunjangan PPh/Tunjangan Khusus ASN', 5, 2021, 184209000, 2, 1),
('5.1.1.01.07.0001', 'Belanja Tunjangan PPh/Tunjangan Khusus PNS', 6, 2021, 19190000, 2, 1),
('5.1.1.01.08', 'Belanja Pembulatan Gaji ASN', 5, 2021, 321295, 2, 1),
('5.1.1.01.08.0001', 'Belanja Pembulatan Gaji PNS', 6, 2021, 87120, 2, 1),
('5.1.1.01.09', 'Belanja Iuran Jaminan Kesehatan ASN', 5, 2021, 2618737000, 2, 1),
('5.1.1.01.09.0001', 'Belanja Iuran Jaminan Kesehatan PNS', 6, 2021, 658444000, 2, 1),
('5.1.1.01.10', 'Belanja Iuran Jaminan Kecelakaan Kerja ASN', 5, 2021, 45829000, 2, 1),
('5.1.1.01.10.0001', 'Belanja Iuran Jaminan Kecelakaan Kerja PNS', 6, 2021, 10781000, 2, 1),
('5.1.1.01.11', 'Belanja Iuran Jaminan Kematian ASN', 5, 2021, 137488000, 2, 1),
('5.1.1.01.11.0001', 'Belanja Iuran Jaminan Kematian PNS', 6, 2021, 32344000, 2, 1),
('5.1.1.02', 'Belanja Tambahan Penghasilan ASN', 4, 2021, 41768701000, 2, 1),
('5.1.1.02.01', 'Tambahan Penghasilan berdasarkan Beban Kerja ASN', 5, 2021, 41768701000, 2, 1),
('5.1.1.02.01.0001', 'Tambahan Penghasilan berdasarkan Beban Kerja PNS', 6, 2021, 8435497000, 2, 1),
('5.1.1.03', 'Tambahan Penghasilan berdasarkan Pertimbangan Objektif Lainnya ASN', 4, 2021, 181080000, 2, 1),
('5.1.1.03.03', 'Belanja Tunjangan Profesi Guru (TPG) PNSD', 5, 2021, 627207840000, 2, 1),
('5.1.1.03.03.0001', 'Belanja TPG PNSD', 6, 2021, 642224682960, 2, 1),
('5.1.1.03.04', 'Belanja Tunjangan Khusus Guru (TKG) PNSD', 5, 2021, 19940535000, 2, 1),
('5.1.1.03.04.0001', 'Belanja TKG PNSD', 6, 2021, 20970677800, 2, 1),
('5.1.1.03.05', 'Belanja Tambahan Penghasilan (Tamsil) Guru PNSD', 5, 2021, 3090000000, 2, 1),
('5.1.1.03.05.0001', 'Belanja Tamsil Guru PNSD', 6, 2021, 3255000000, 2, 1),
('5.1.1.03.07', 'Belanja Honorarium', 5, 2021, 181080000, 2, 1),
('5.1.1.03.07.0001', 'Belanja Honorarium Penanggungjawaban Pengelola Keuangan', 6, 2021, 111360000, 2, 1),
('5.1.1.03.07.0002', 'Belanja Honorarium Pengadaan Barang/Jasa', 6, 2021, 25920000, 2, 1),
('5.1.2', 'Belanja Barang dan Jasa', 3, 2021, 17569986100, 2, 1),
('5.1.2.01', 'Belanja Barang', 4, 2021, 4206230780, 2, 1),
('5.1.2.01.01', 'Belanja Barang Pakai Habis', 5, 2021, 4206230780, 2, 1),
('5.1.2.01.01.0001', 'Belanja Bahan-Bahan Bangunan dan Konstruksi', 6, 2021, 0, 2, 1),
('5.1.2.01.01.0004', 'Belanja Bahan-Bahan Bakar dan Pelumas', 6, 2021, 662553700, 2, 1),
('5.1.2.01.01.0013', 'Belanja Suku Cadang-Suku Cadang Alat Angkutan', 6, 2021, 39000000, 2, 1),
('5.1.2.01.01.0015', 'Belanja Suku Cadang-Suku Cadang Alat Kedokteran', 6, 2021, 332662820, 2, 1),
('5.1.2.01.01.0024', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Alat Tulis Kantor', 6, 2021, 520095681, 2, 1),
('5.1.2.01.01.0025', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Kertas dan Cover', 6, 2021, 0, 2, 1),
('5.1.2.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Bahan Cetak', 6, 2021, 410669050, 2, 1),
('5.1.2.01.01.0027', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Benda Pos', 6, 2021, 11800000, 2, 1),
('5.1.2.01.01.0029', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Bahan Komputer', 6, 2021, 10595000, 2, 1),
('5.1.2.01.01.0030', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Perabot Kantor', 6, 2021, 65195000, 2, 1),
('5.1.2.01.01.0031', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Alat Listrik', 6, 2021, 745462830, 2, 1),
('5.1.2.01.01.0032', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Perlengkapan Dinas', 6, 2021, 50000000, 2, 1),
('5.1.2.01.01.0035', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Suvenir/Cendera Mata', 6, 2021, 22450000, 2, 1),
('5.1.2.01.01.0038', 'Belanja Obat-Obatan-Obat-Obatan Lainnya', 6, 2021, 468524664, 2, 1),
('5.1.2.01.01.0052', 'Belanja Makanan dan Minuman Rapat', 6, 2021, 1188932000, 2, 1),
('5.1.2.01.01.0053', 'Belanja Makanan dan Minuman Jamuan Tamu', 6, 2021, 253510000, 2, 1),
('5.1.2.01.01.0055', 'Belanja Makanan dan Minuman pada Fasilitas Pelayanan Urusan Pendidikan', 6, 2021, 486000000, 2, 1),
('5.1.2.01.01.0075', 'Belanja Pakaian Batik Tradisional', 6, 2021, 2960000, 2, 1),
('5.1.2.02', 'Belanja Jasa', 4, 2021, 2878887430, 2, 1),
('5.1.2.02.01', 'Belanja Jasa Kantor', 5, 2021, 2148093430, 2, 1),
('5.1.2.02.01.0003', 'Honorarium Narasumber atau Pembahas, Moderator, Pembawa Acara, dan Panitia', 6, 2021, 642966000, 2, 1),
('5.1.2.02.01.0004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 6, 2021, 242435000, 2, 1),
('5.1.2.02.01.0013', 'Belanja Jasa Tenaga Pendidikan', 6, 2021, 198540000000, 2, 1),
('5.1.2.02.01.0014', 'Belanja Jasa Tenaga Kesehatan', 6, 2021, 189900000, 2, 1),
('5.1.2.02.01.0028', 'Belanja Jasa Tenaga Pelayanan Umum', 6, 2021, 238000000, 2, 1),
('5.1.2.02.01.0029', 'Belanja Jasa Tenaga Ahli', 6, 2021, 521112352, 2, 1),
('5.1.2.02.01.0030', 'Belanja Jasa Tenaga Kebersihan', 6, 2021, 3910275000, 2, 1),
('5.1.2.02.01.0031', 'Belanja Jasa Tenaga Keamanan', 6, 2021, 4525225000, 2, 1),
('5.1.2.02.01.0038', 'Belanja Jasa Tata Rias', 6, 2021, 25000000, 2, 1),
('5.1.2.02.01.0059', 'Belanja Tagihan Telepon', 6, 2021, 50000000, 2, 1),
('5.1.2.02.01.0060', 'Belanja Tagihan Air', 6, 2021, 400000000, 2, 1),
('5.1.2.02.01.0061', 'Belanja Tagihan Listrik', 6, 2021, 1821000000, 2, 1),
('5.1.2.02.01.0062', 'Belanja Langganan Jurnal/Surat Kabar/Majalah', 6, 2021, 32500000, 2, 1),
('5.1.2.02.01.0063', 'Belanja Kawat/Faksimili/Internet/TV Berlangganan', 6, 2021, 14000000, 2, 1),
('5.1.2.02.01.0064', 'Belanja Paket/Pengiriman', 6, 2021, 1155000, 2, 1),
('5.1.2.02.04', 'Belanja Sewa Peralatan dan Mesin', 5, 2021, 2885442500, 2, 1),
('5.1.2.02.04.0036', 'Belanja Sewa Kendaraan Bermotor Penumpang', 6, 2021, 108000000, 2, 1),
('5.1.2.02.04.0123', 'Belanja Sewa Alat Rumah Tangga Lainnya (Home Use)', 6, 2021, 81120000, 2, 1),
('5.1.2.02.04.0132', 'Belanja Sewa Peralatan Studio Audio', 6, 2021, 56000000, 2, 1),
('5.1.2.02.05', 'Belanja Sewa Gedung dan Bangunan', 5, 2021, 39000000, 2, 1),
('5.1.2.02.05.0001', 'Belanja Sewa Bangunan Gedung Kantor', 6, 2021, 50000000, 2, 1),
('5.1.2.02.05.0009', 'Belanja Sewa Bangunan Gedung Tempat Pertemuan', 6, 2021, 794200000, 2, 1),
('5.1.2.02.05.0032', 'Belanja Sewa Bangunan Fasilitas Umum', 6, 2021, 65000000, 2, 1),
('5.1.2.02.08', 'Belanja Jasa Konsultansi Konstruksi', 5, 2021, 50000000, 2, 1),
('5.1.2.02.08.0005', 'Belanja Jasa Konsultansi Perencanaan Arsitektur-Jasa Arsitektur Lainnya', 6, 2021, 70000000, 2, 1),
('5.1.2.02.08.0008', 'Belanja Jasa Konsultansi Perencanaan Rekayasa-Jasa Desain Rekayasa untuk Pekerjaan Teknik Sipil Air', 6, 2021, 94000000, 2, 1),
('5.1.2.02.08.0012', 'Belanja Jasa Konsultansi Perencanaan Rekayasa-Jasa Nasihat dan Konsultansi Jasa Rekayasa Konstruksi', 6, 2021, 4443500000, 2, 1),
('5.1.2.02.08.0019', 'Belanja Jasa Konsultansi Pengawasan Rekayasa-Jasa Pengawas Pekerjaan Konstruksi Bangunan Gedung', 6, 2021, 639000000, 2, 1),
('5.1.2.02.12', 'Belanja Kursus/Pelatihan, Sosialisasi, Bimbingan Teknis serta Pendidikan dan Pelatihan', 5, 2021, 680794000, 2, 1),
('5.1.2.02.12.0003', 'Belanja Bimbingan Teknis', 6, 2021, 647645000, 2, 1),
('5.1.2.03', 'Belanja Pemeliharaan', 4, 2021, 224300000, 2, 1),
('5.1.2.03.02', 'Belanja Pemeliharaan Peralatan dan Mesin', 5, 2021, 224300000, 2, 1),
('5.1.2.03.02.0035', 'Belanja Pemeliharaan Alat Angkutan-Alat Angkutan Darat Bermotor-Kendaraan Dinas Bermotor Perorangan', 6, 2021, 108000000, 2, 1),
('5.1.2.03.02.0117', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Kantor-Alat Kantor Lainnya', 6, 2021, 58906000, 2, 1),
('5.1.2.03.02.0121', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Rumah Tangga-Alat Pendingin', 6, 2021, 22000000, 2, 1),
('5.1.2.03.02.0123', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Rumah Tangga-Alat Rumah Tangga Lainnya (Home Use)', 6, 2021, 204639100, 2, 1),
('5.1.2.03.02.0132', 'Belanja Pemeliharaan Alat Studio, Komunikasi, dan Pemancar-Alat Studio- Peralatan Studio Audio', 6, 2021, 1200000, 2, 1),
('5.1.2.03.02.0181', 'Belanja Pemeliharaan Alat Studio, Komunikasi, dan Pemancar-Peralatan Pemancar-Peralatan Pemancar dan Penerima VHF', 6, 2021, 0, 2, 1),
('5.1.2.03.02.0406', 'Belanja Pemeliharaan Komputer-Komputer Unit-Komputer Unit Lainnya', 6, 2021, 15000000, 2, 1),
('5.1.2.03.02.0411', 'Belanja Pemeliharaan Komputer-Peralatan Komputer-Peralatan Komputer Lainnya', 6, 2021, 20000000, 2, 1),
('5.1.2.04', 'Belana Perjalanan Dinas', 4, 2021, 10260567890, 2, 1),
('5.1.2.04.01', 'Belanja Perjalanan Dinas Dalam Negeri', 5, 2021, 10260567890, 2, 1),
('5.1.2.04.01.0001', 'Belanja Perjalanan Dinas Biasa', 6, 2021, 2610848000, 2, 1),
('5.1.2.04.01.0003', 'Belanja Perjalanan Dinas Dalam Kota', 6, 2021, 359150000, 2, 1),
('5.1.2.04.01.0005', 'Belanja Perjalanan Dinas Paket Meeting Luar Kota', 6, 2021, 596452000, 2, 1),
('5.1.2.05', 'Belanja Uang dan/atau Jasa untuk Diberikan kepada Pihak Ketiga/Pihak Lain/Masyarakat', 4, 2021, 442000000, 2, 1),
('5.1.2.05.01', 'Belanja Uang yang Diberikan kepada Pihak Ketiga/Pihak Lain/Masyarakat', 5, 2021, 442000000, 2, 1),
('5.1.2.05.01.0001', 'Belanja Hadiah yang Bersifat Perlombaan', 6, 2021, 0, 2, 1),
('5.1.2.05.01.0003', 'Belanja Beasiswa', 6, 2021, 160443360000, 2, 1),
('5.1.2.88', 'Belanja Barang dan Jasa BOS', 4, 2021, 456815533360, 2, 1),
('5.1.2.88.88', 'Belanja Barang dan Jasa BOS', 5, 2021, 456815533360, 2, 1),
('5.1.2.88.88.8888', 'Belanja Barang dan Jasa BOS', 6, 2021, 456815533360, 2, 1),
('5.1.5', 'Belanja Hibah', 3, 2021, 2500000000, 2, 1),
('5.1.5.06', 'Belanja Hibah Dana BOS', 4, 2021, 2783674794500, 2, 1),
('5.1.5.06.01', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdikdas Negeri', 5, 2021, 476553000000, 2, 1),
('5.1.5.06.01.0001', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdikdas Negeri', 6, 2021, 476553000000, 2, 1),
('5.1.5.06.02', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdikdas Swasta', 5, 2021, 1660224000000, 2, 1),
('5.1.5.06.02.0001', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdikdas Swasta', 6, 2021, 1660224000000, 2, 1),
('5.1.5.06.03', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdikmen Swasta', 5, 2021, 638412114500, 2, 1),
('5.1.5.06.03.0001', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdikmen Swasta', 6, 2021, 638412114500, 2, 1),
('5.1.5.06.04', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdiksus Swasta', 5, 2021, 8485680000, 2, 1),
('5.1.5.06.04.0001', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdiksus Swasta', 6, 2021, 8485680000, 2, 1),
('5.2', 'BELANJA MODAL', 2, 2021, 2323933900, 2, 1),
('5.2.1', 'Belanja Modal Tanah', 3, 2021, 3196000000, 2, 1),
('5.2.1.01', 'Belanja Modal Tanah', 4, 2021, 3196000000, 2, 1),
('5.2.1.01.01', 'Belanja Modal Tanah Persil', 5, 2021, 3730336337, 2, 1),
('5.2.1.01.01.0004', 'Belanja Modal Tanah untuk Bangunan Tempat Kerja', 6, 2021, 2000000000, 2, 1),
('5.2.2', 'Belanja Modal Peralatan dan Mesin', 3, 2021, 2119933900, 2, 1),
('5.2.2.05', 'Belanja Modal Alat Kantor dan Rumah Tangga', 4, 2021, 578595900, 2, 1),
('5.2.2.05.01', 'Belanja Modal Alat Kantor', 5, 2021, 428700000, 2, 1),
('5.2.2.05.01.0004', 'Belanja Modal Alat Penyimpan Perlengkapan Kantor', 6, 2021, 328150000, 2, 1),
('5.2.2.05.01.0005', 'Belanja Modal Alat Kantor Lainnya', 6, 2021, 345993060, 2, 1),
('5.2.2.05.02', 'Belanja Modal Alat Rumah Tangga', 5, 2021, 149895900, 2, 1),
('5.2.2.05.02.0001', 'Belanja Modal Mebel', 6, 2021, 635050000, 2, 1),
('5.2.2.05.02.0004', 'Belanja Modal Alat Pendingin', 6, 2021, 270500000, 2, 1),
('5.2.2.05.02.0006', 'Belanja Modal Alat Rumah Tangga Lainnya (Home Use)', 6, 2021, 48890000, 2, 1),
('5.2.2.05.03', 'Belanja Modal Meja dan Kursi Kerja/Rapat Pejabat', 5, 2021, 1077885000, 2, 1),
('5.2.2.05.03.0001', 'Belanja Modal Meja Kerja Pejabat', 6, 2021, 37800000, 2, 1),
('5.2.2.05.03.0003', 'Belanja Modal Kursi Kerja Pejabat', 6, 2021, 493425000, 2, 1),
('5.2.2.06', 'Belanja Modal Alat Studio, Komunikasi, dan Pemancar', 4, 2021, 221088000, 2, 1),
('5.2.2.06.01', 'Belanja Modal Alat Studio', 5, 2021, 135775500, 2, 1),
('5.2.2.06.01.0002', 'Belanja Modal Peralatan Studio Video dan Film', 6, 2021, 60000000, 2, 1),
('5.2.2.07', 'Belanja Modal Alat Kedokteran dan Kesehatan', 4, 2021, 265000000, 2, 1),
('5.2.2.07.02', 'Belanja Modal Alat Kesehatan Umum', 5, 2021, 265000000, 2, 1),
('5.2.2.07.02.0005', 'Belanja Modal Alat Kesehatan Umum Lainnya', 6, 2021, 16376100, 2, 1),
('5.2.2.08', 'Belanja Modal Alat Laboratorium', 4, 2021, 6000000, 2, 1),
('5.2.2.08.01', 'Belanja Modal Unit Alat Laboratorium', 5, 2021, 6000000, 2, 1),
('5.2.2.08.01.0056', 'Belanja Modal Alat Laboratorium Lain', 6, 2021, 3000000, 2, 1),
('5.2.2.08.03', 'Belanja Modal Alat Peraga Praktek Sekolah', 5, 2021, 149253936986, 2, 1),
('5.2.2.08.03.0006', 'Belanja Modal Alat Peraga Praktek Sekolah Bidang Studi:IPA Atas', 6, 2021, 3510000000, 2, 1),
('5.2.2.08.03.0013', 'Belanja Modal Alat Peraga Luar Biasa (Tuna Netra, Terapi Fisik, Tuna Daksa, dan Tuna Rungu)', 6, 2021, 593050000, 2, 1),
('5.2.2.08.03.0014', 'Belanja Modal Alat Peraga Kejuruan', 6, 2021, 65844339486, 2, 1),
('5.2.2.08.03.0016', 'Belanja Modal Alat Peraga Praktik Sekolah Lainnya', 6, 2021, 79306547500, 2, 1),
('5.2.2.10', 'Belanja Modal Komputer', 4, 2021, 1120250000, 2, 1),
('5.2.2.10.01', 'Belanja Modal Komputer Unit', 5, 2021, 39300000, 2, 1),
('5.2.2.10.01.0001', 'Belanja Modal Komputer Jaringan', 6, 2021, 217910000, 2, 1),
('5.2.2.10.01.0003', 'Belanja Modal Komputer Unit Lainnya', 6, 2021, 58950000, 2, 1),
('5.2.2.10.02', 'Belanja Modal Peralatan Komputer', 5, 2021, 1120250000, 2, 1),
('5.2.2.10.02.0003', 'Belanja Modal Peralatan Personal Computer', 6, 2021, 133035000, 2, 1),
('5.2.2.10.02.0005', 'Belanja Modal Peralatan Komputer Lainnya', 6, 2021, 21900000, 2, 1),
('5.2.2.13', 'Belanja Modal Alat Produksi, Pengolahan, dan Pemurnian', 4, 2021, 385020000, 2, 1),
('5.2.2.13.01', 'Belanja Modal Sumur', 5, 2021, 385020000, 2, 1),
('5.2.2.13.01.0002', 'Belanja Modal Sumur Pemboran', 6, 2021, 181795540, 2, 1),
('5.2.3', 'Belanja Modal Gedung dan Bangunan', 3, 2021, 660000000, 2, 1),
('5.2.3.01', 'Belanja Modal Bangunan Gedung', 4, 2021, 660000000, 2, 1),
('5.2.3.01.01', 'Belanja Modal Bangunan Gedung Tempat Kerja', 5, 2021, 660000000, 2, 1),
('5.2.3.01.01.0001', 'Belanja Modal Bangunan Gedung Kantor', 6, 2021, 3611655000, 2, 1),
('5.2.3.01.01.0010', 'Belanja Modal Bangunan Gedung Tempat Pendidikan', 6, 2021, 0, 2, 1),
('5.2.3.01.01.0030', 'Belanja Modal Bangunan Gedung Tempat Kerja Lainnya', 6, 2021, 2833368500, 2, 1),
('5.2.5', 'Belanja Modal Aset Tetap Lainnya', 3, 2021, 204000000, 2, 1),
('5.2.5.01', 'Belanja Modal Bahan Perpustakaan', 4, 2021, 204000000, 2, 1),
('5.2.5.01.01', 'Belanja Modal Bahan Perpustakaan Tercetak', 5, 2021, 12000000, 2, 1),
('5.2.5.01.01.0001', 'Belanja Modal Buku Umum', 6, 2021, 12000000, 2, 1),
('5.2.5.01.07', 'Belanja Modal Tarscalt', 5, 2021, 87519182654, 2, 1),
('5.2.5.01.07.0001', 'Belanja Modal Tarscalt', 6, 2021, 87519182654, 2, 1),
('5.2.5.05', 'Belanja Modal Tanaman', 4, 2021, 200000000, 2, 1),
('5.2.5.05.01', 'Belanja Modal Tanaman', 5, 2021, 200000000, 2, 1),
('5.2.5.05.01.0001', 'Belanja Modal Tanaman', 6, 2021, 200000000, 2, 1),
('4.1.2.01', 'Retribusi Jasa Umum', 4, 2021, 200000000, 1, 1),
('4.1.2.01.01', 'Retribusi Pelayanan Kesehatan', 5, 2021, 9900000000, 1, 1),
('4.1.2.01.01.0006', 'Retribusi Pelayanan Kesehatan di Tempat Pelayanan Kesehatan Lainnya yang Sejenis', 6, 2021, 9900000000, 1, 1),
('4.1.2.02.06', 'Retribusi Tempat Penginapan/ Pesanggrahan/Vila', 5, 2021, 2200000000, 1, 1),
('4.1.2.02.06.0001', 'Retribusi Pelayanan Tempat Penginapan/Pesanggrahan/Vila', 6, 2021, 2200000000, 1, 1),
('4.1.4', 'Lain-lain PAD yang Sah', 3, 2021, 69677525781, 1, 1),
('4.1.4.16', 'Pendapatan BLUD', 4, 2021, 62600000000, 1, 1),
('4.1.4.16.01', 'Pendapatan BLUD', 5, 2021, 62600000000, 1, 1),
('4.1.4.16.01.0001', 'Pendapatan BLUD', 6, 2021, 78250000000, 1, 1),
('5.1.1.02.04', 'Tambahan Penghasilan berdasarkan Kelangkaan Profesi ASN', 5, 2021, 18121320000, 2, 1),
('5.1.1.02.04.0001', 'Tambahan Penghasilan berdasarkan Kelangkaan Profesi PNS', 6, 2021, 18121320000, 2, 1),
('5.1.1.03.02', 'Belanja bagi ASN atas Insentif Pemungutan Retribusi Daerah', 5, 2021, 82962500, 2, 1),
('5.1.1.03.02.0001', 'Belanja Insentif bagi ASN atas Pemungutan Retribusi Jasa Umum-Pelayanan Kesehatan', 6, 2021, 0, 2, 1),
('5.1.2.01.01.0002', 'Belanja Bahan-Bahan Kimia', 6, 2021, 7200000, 2, 1),
('5.1.2.01.01.0009', 'Belanja Bahan-Isi Tabung Pemadam Kebakaran', 6, 2021, 5070000, 2, 1),
('5.1.2.01.01.0010', 'Belanja Bahan-Isi Tabung Gas', 6, 2021, 54325000, 2, 1),
('5.1.2.01.01.0012', 'Belanja Bahan-Bahan Lainnya', 6, 2021, 46956500, 2, 1),
('5.1.2.01.01.0016', 'Belanja Suku Cadang-Suku Cadang Alat Laboratorium', 6, 2021, 15180000, 2, 1),
('5.1.2.01.01.0037', 'Belanja Obat-Obatan-Obat', 6, 2021, 549000, 2, 1),
('5.1.2.01.01.0054', 'Belanja Penambah Daya Tahan Tubuh', 6, 2021, 16500000, 2, 1),
('5.1.2.01.01.0056', 'Belanja Makanan dan Minuman pada Fasilitas Pelayanan Urusan Kesehatan', 6, 2021, 3520000, 2, 1),
('5.1.2.02.01.0007', 'Honorarium Rohaniwan', 6, 2021, 8400000, 2, 1),
('5.1.2.02.01.0008', 'Honorarium Tim Penyusunan Jurnal, Buletin, Majalah, Pengelola Teknologi Informasi dan Pengelola Website', 6, 2021, 38000000, 2, 1),
('5.1.2.02.01.0015', 'Belanja Jasa Tenaga Laboratorium', 6, 2021, 4000000, 2, 1),
('5.1.2.02.01.0026', 'Belanja Jasa Tenaga Administrasi', 6, 2021, 66000000, 2, 1),
('5.1.2.02.01.0027', 'Belanja Jasa Tenaga Operator Komputer', 6, 2021, 1053000000, 2, 1),
('5.1.2.02.01.0033', 'Belanja Jasa Tenaga Supir', 6, 2021, 234000000, 2, 1),
('5.1.2.02.01.0034', 'Belanja Jasa Tenaga Juru Masak', 6, 2021, 655500000, 2, 1),
('5.1.2.02.01.0049', 'Belanja Jasa Pencucian Pakaian, Alat Kesenian dan Kebudayaan, serta Alat Rumah Tangga', 6, 2021, 19550000, 2, 1),
('5.1.2.02.01.0050', 'Belanja Jasa Kalibrasi', 6, 2021, 60000000, 2, 1),
('5.1.2.02.01.0051', 'Belanja Jasa Pengolahan Sampah', 6, 2021, 16200000, 2, 1),
('5.1.2.02.01.0055', 'Belanja Jasa Iklan/Reklame, Film, dan Pemotretan', 6, 2021, 6000000, 2, 1),
('5.1.2.02.01.0067', 'Belanja Pembayaran Pajak, Bea, dan Perizinan', 6, 2021, 238000000, 2, 1),
('5.1.2.02.01.0073', 'Belanja Medical Check Up', 6, 2021, 50000000, 2, 1),
('5.1.2.02.02', 'Belanja Iuran Jaminan/Asuransi', 5, 2021, 189000000, 2, 1),
('5.1.2.02.02.0002', 'Belanja Kontribusi Jaminan Kesehatan bagi PBI', 6, 2021, 119288962800, 2, 1),
('5.1.2.02.02.0003', 'Belanja Iuran Jaminan Kesehatan bagi Peserta PBPU dan BP Kelas 3', 6, 2021, 0, 2, 1),
('5.1.2.02.04.0035', 'Belanja Sewa Kendaraan Dinas Bermotor Perorangan', 6, 2021, 20000000, 2, 1),
('5.1.2.02.04.0118', 'Belanja Sewa Mebel', 6, 2021, 0, 2, 1),
('5.1.2.02.04.0201', 'Belanja Sewa Alat Pengatur Telekomunikasi', 6, 2021, 0, 2, 1),
('5.1.2.02.04.0416', 'Belanja Sewa Elektronik/Electric', 6, 2021, 15000000, 2, 1),
('5.1.2.02.05.0036', 'Belanja Sewa Taman', 6, 2021, 0, 2, 1),
('5.1.2.02.05.0043', 'Belanja Sewa Hotel', 6, 2021, 201960000, 2, 1),
('5.1.2.02.08.0028', 'Belanja Jasa Konsultansi Spesialis-Jasa Pengujian dan Analisa Komposisi dan Tingkat Kemurnian', 6, 2021, 50000000, 2, 1),
('5.1.2.02.09', 'Belanja Jasa Konsultansi Non Konstruksi', 5, 2021, 700000000, 2, 1),
('5.1.2.02.09.0008', 'Belanja Jasa Konsultansi Berorientasi Bidang-Kesehatan', 6, 2021, 50000000, 2, 1),
('5.1.2.02.11', 'Belanja Beasiswa Pendidikan PNS', 5, 2021, 110000000, 2, 1),
('5.1.2.02.11.0002', 'Belanja Beasiswa Tugas Belajar S2', 6, 2021, 55000000, 2, 1),
('5.1.2.02.12.0001', 'Belanja Kursus Singkat/Pelatihan', 6, 2021, 516500000, 2, 1),
('5.1.2.03.02.0022', 'Belanja Pemeliharaan Alat Besar-Alat Bantu- Electric Generating Set', 6, 2021, 40500000, 2, 1),
('5.1.2.03.02.0038', 'Belanja Pemeliharaan Alat Angkutan-Alat Angkutan Darat Bermotor-Kendaraan Bermotor Beroda Dua', 6, 2021, 37000000, 2, 1),
('5.1.2.03.02.0118', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Rumah Tangga-Mebel', 6, 2021, 24375000, 2, 1),
('5.1.2.03.02.0138', 'Belanja Pemeliharaan Alat Studio, Komunikasi, dan Pemancar-Alat Komunikasi- Alat Komunikasi Telephone', 6, 2021, 3000000, 2, 1),
('5.1.2.03.02.0237', 'Belanja Pemeliharaan Alat Kedokteran dan Kesehatan-Alat Kesehatan Umum-Alat Kesehatan Umum Lainnya', 6, 2021, 50000000, 2, 1),
('5.1.2.03.02.0293', 'Belanja Pemeliharaan Alat Laboratorium-Unit Alat Laboratorium-Alat Laboratorium Lain', 6, 2021, 35920000, 2, 1),
('5.1.2.03.02.0405', 'Belanja Pemeliharaan Komputer-Komputer Unit-Personal Computer', 6, 2021, 4000000, 2, 1),
('5.1.2.03.02.0410', 'Belanja Pemeliharaan Komputer-Peralatan Komputer-Peralatan Jaringan', 6, 2021, 2000000, 2, 1),
('5.1.2.03.03', 'Belanja Pemeliharaan Gedung dan Bangunan', 5, 2021, 134214070000, 2, 1),
('5.1.2.03.03.0001', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Gedung Kantor', 6, 2021, 180000000, 2, 1),
('5.1.2.03.03.0006', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Kesehatan', 6, 2021, 3684605000, 2, 1),
('5.1.2.03.03.0037', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Gedung Tempat Kerja Lainnya', 6, 2021, 2031977749, 2, 1),
('5.1.2.03.04', 'Belanja Pemeliharaan Jalan, Jaringan, dan Irigasi', 5, 2021, 16200000, 2, 1),
('5.1.2.03.04.0126', 'Belanja Pemeliharaan Jaringan-Jaringan Listrik-Jaringan Listrik Lainnya', 6, 2021, 16200000, 2, 1),
('5.1.2.04.01.0004', 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota', 6, 2021, 10200000, 2, 1),
('5.1.5.05', 'Belanja Hibah kepada Badan, Lembaga, Organisasi Kemasyarakatan yang Berbadan Hukum Indonesia', 4, 2021, 500000000, 2, 1),
('5.1.5.05.03', 'Belanja Hibah kepada Badan dan Lembaga Nirlaba, Sukarela Bersifat Sosial Kemasyarakatan', 5, 2021, 300400000000, 2, 1),
('5.1.5.05.03.0001', 'Belanja Hibah Uang kepada Badan dan Lembaga Nirlaba, Sukarela Bersifat Sosial Kemasyarakatan', 6, 2021, 389607033473, 2, 1),
('5.2.2.01', 'Belanja Modal Alat Besar', 4, 2021, 238000000, 2, 1),
('5.2.2.01.03', 'Belanja Modal Alat Bantu', 5, 2021, 238000000, 2, 1),
('5.2.2.01.03.0004', 'Belanja Modal Electric Generating Set', 6, 2021, 200000000, 2, 1),
('5.2.2.01.03.0005', 'Belanja Modal Pompa', 6, 2021, 103975000, 2, 1),
('5.2.2.03', 'Belanja Modal Alat Bengkel dan Alat Ukur', 4, 2021, 13500000, 2, 1),
('5.2.2.03.03', 'Belanja Modal Alat Ukur', 5, 2021, 13500000, 2, 1),
('5.2.2.03.03.0021', 'Belanja Modal Alat Ukur Lainnya', 6, 2021, 2000000, 2, 1),
('5.2.2.07.01', 'Belanja Modal Alat Kedokteran', 5, 2021, 5000000, 2, 1),
('5.2.2.07.01.0029', 'Belanja Modal Alat Kedokteran Lainnya', 6, 2021, 0, 2, 1),
('5.2.2.08.01.0011', 'Belanja Modal Alat Laboratorium Umum', 6, 2021, 344000000, 2, 1),
('5.2.2.08.01.0013', 'Belanja Modal Alat Laboratorium Kimia', 6, 2021, 1780492000, 2, 1),
('5.2.2.10.01.0002', 'Belanja Modal Personal Computer', 6, 2021, 117437000, 2, 1),
('5.2.5.08', 'Belanja Modal Aset Tidak Berwujud', 4, 2021, 55000000, 2, 1),
('5.2.5.08.01', 'Belanja Modal Aset Tidak Berwujud', 5, 2021, 55000000, 2, 1),
('5.2.5.08.01.0005', 'Belanja Modal Software', 6, 2021, 30000000, 2, 1),
('5.1.1.03.08', 'Belanja Jasa Pengelolaan BMD', 5, 2021, 36600000, 2, 1),
('5.1.1.03.08.0002', 'Belanja Jasa Pengelolaan BMD yang Tidak Menghasilkan Pendapatan', 6, 2021, 36600000, 2, 1),
('5.1.2.01.01.0008', 'Belanja Bahan-Bahan/Bibit Tanaman', 6, 2021, 64236000, 2, 1),
('5.1.2.01.01.0034', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Perlengkapan Pendukung Olahraga', 6, 2021, 36000000, 2, 1),
('5.1.2.01.01.0036', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Alat/Bahan untuk Kegiatan Kantor Lainnya', 6, 2021, 15172500, 2, 1),
('5.1.2.01.01.0043', 'Belanja Natura dan Pakan-Natura', 6, 2021, 4688991750, 2, 1),
('5.1.2.02.01.0035', 'Belanja Jasa Tenaga Teknisi Mekanik dan Listrik', 6, 2021, 39000000, 2, 1),
('5.1.2.02.01.0048', 'Belanja Jasa Kontribusi Asosiasi', 6, 2021, 150000000, 2, 1),
('5.1.2.02.02.0006', 'Belanja Iuran Jaminan Kecelakaan Kerja bagi Non ASN', 6, 2021, 130920052, 2, 1),
('5.1.2.03.02.0103', 'Belanja Pemeliharaan Alat Pertanian-Alat Pengolahan-Alat Pengolahan Tanah dan Tanaman', 6, 2021, 4000000, 2, 1),
('5.1.2.03.02.0409', 'Belanja Pemeliharaan Komputer-Peralatan Komputer-Peralatan Personal Computer', 6, 2021, 20000000, 2, 1),
('5.1.2.03.03.0008', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Gedung Tempat Ibadah', 6, 2021, 22350000, 2, 1),
('5.1.2.03.03.0013', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Gedung untuk Pos Jaga', 6, 2021, 207855000, 2, 1),
('5.2.2.03.01', 'Belanja Modal Alat Bengkel Bermesin', 5, 2021, 35000000, 2, 1),
('5.2.2.03.01.0008', 'Belanja Modal Peralatan Las', 6, 2021, 35000000, 2, 1),
('5.2.2.03.03.0001', 'Belanja Modal Alat Ukur Universal', 6, 2021, 77400000, 2, 1),
('5.2.2.03.03.0010', 'Belanja Modal Alat Timbangan/Biara', 6, 2021, 0, 2, 1),
('5.2.2.06.01.0004', 'Belanja Modal Peralatan Cetak', 6, 2021, 12000000, 2, 1),
('5.2.2.07.01.0013', 'Belanja Modal Alat Kedokteran Neurologi (Saraf)', 6, 2021, 984856000, 2, 1),
('5.2.2.08.01.0064', 'Belanja Modal Unit Alat Laboratorium Lainnya', 6, 2021, 1700000, 2, 1),
('5.2.2.10.02.0004', 'Belanja Modal Peralatan Jaringan', 6, 2021, 3000000, 2, 1),
('5.2.3.01.01.0004', 'Belanja Modal Bangunan Gedung Instalasi', 6, 2021, 848850000, 2, 1),
('5.2.3.01.01.0006', 'Belanja Modal Bangunan Kesehatan', 6, 2021, 17719000000, 2, 1),
('5.2.4', 'Belanja Modal Jalan, Jaringan, dan Irigasi', 3, 2021, 399655097, 2, 1),
('5.2.4.04', 'Belanja Modal Jaringan', 4, 2021, 182000000, 2, 1),
('5.2.4.04.02', 'Belanja Modal Jaringan Listrik', 5, 2021, 182000000, 2, 1),
('5.2.4.04.02.0003', 'Belanja Modal Jaringan Listrik Lainnya', 6, 2021, 182000000, 2, 1),
('5.2.5.01.01.0012', 'Belanja Modal Bahan Perpustakaan Tercetak Lainnya', 6, 2021, 5000000, 2, 1),
('5.1.1.03.07.0003', 'Belanja Honorarium Perangkat Unit Kerja Pengadaan Barang dan Jasa (UKPBJ)', 6, 2021, 0, 2, 1),
('5.1.1.99', 'Belanja Pegawai BLUD', 4, 2021, 24731242000, 2, 1),
('5.1.1.99.99', 'Belanja Pegawai BLUD', 5, 2021, 24731242000, 2, 1),
('5.1.1.99.99.9999', 'Belanja Pegawai BLUD', 6, 2021, 37041212472, 2, 1),
('5.1.2.01.01.0039', 'Belanja Barang untuk Dijual/Diserahkan kepada Masyarakat', 6, 2021, 238200000, 2, 1),
('5.1.2.01.01.0058', 'Belanja Makanan dan Minuman Aktivitas Lapangan', 6, 2021, 1102943000, 2, 1),
('5.1.2.02.01.0012', 'Honorarium Tim Anggaran Pemerintah Daerah', 6, 2021, 2240500000, 2, 1),
('5.1.2.03.02.0301', 'Belanja Pemeliharaan Alat Laboratorium-Unit Alat Laboratorium-Unit Alat Laboratorium Lainnya', 6, 2021, 150000000, 2, 1),
('5.1.2.03.03.0046', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Tinggal-Rumah Negara dalam Proses Penggolongan', 6, 2021, 1360258250, 2, 1),
('5.1.2.99', 'Belanja Barang dan Jasa BLUD', 4, 2021, 37868758000, 2, 1),
('5.1.2.99.99', 'Belanja Barang dan Jasa BLUD', 5, 2021, 37868758000, 2, 1),
('5.1.2.99.99.9999', 'Belanja Barang dan Jasa BLUD', 6, 2021, 41208787528, 2, 1),
('5.2.2.01.01', 'Belanja Modal Alat Besar Darat', 5, 2021, 20516000, 2, 1),
('5.2.2.01.01.0011', 'Belanja Modal Mesin Proses', 6, 2021, 40250000, 2, 1),
('5.2.2.01.03.0008', 'Belanja Modal Alat Pengolahan Air Kotor', 6, 2021, 120000000, 2, 1),
('5.2.2.02', 'Belanja Modal Alat Angkutan', 4, 2021, 12805200000, 2, 1),
('5.2.2.02.01', 'Belanja Modal Alat Angkutan Darat Bermotor', 5, 2021, 12700000000, 2, 1),
('5.2.2.02.01.0006', 'Belanja Modal Kendaraan Bermotor Khusus', 6, 2021, 0, 2, 1),
('5.2.2.06.02', 'Belanja Modal Alat Komunikasi', 5, 2021, 85312500, 2, 1),
('5.2.2.06.02.0001', 'Belanja Modal Alat Komunikasi Telephone', 6, 2021, 48998000, 2, 1),
('5.2.2.07.01.0004', 'Belanja Modal Alat Kedokteran Bedah', 6, 2021, 10726628000, 2, 1),
('5.2.3.04', 'Belanja Modal Tugu Titik Kontrol/Pasti', 4, 2021, 180000000, 2, 1),
('5.2.3.04.01', 'Belanja Modal Tugu/Tanda Batas', 5, 2021, 180000000, 2, 1),
('5.2.3.04.01.0004', 'Belanja Modal Pagar', 6, 2021, 0, 2, 1),
('5.2.5.01.01.0003', 'Belanja Modal Buku Agama', 6, 2021, 5750000, 2, 1),
('4.1.2.02.01.0002', 'Retribusi Penyewaan Tanah', 6, 2021, 800000000, 1, 1),
('4.1.2.02.01.0004', 'Retribusi Pemakaian Laboratorium', 6, 2021, 650000000, 1, 1),
('4.1.2.02.01.0007', 'Retribusi Pemakaian Alat', 6, 2021, 52404365, 1, 1),
('5.1.2.02.08.0009', 'Belanja Jasa Konsultansi Perencanaan Rekayasa-Jasa Desain Rekayasa untuk Pekerjaan Teknik Sipil Transportasi', 6, 2021, 350500000, 2, 1),
('5.1.2.02.08.0020', 'Belanja Jasa Konsultansi Pengawasan Rekayasa-Jasa Pengawas Pekerjaan Konstruksi Teknik Sipil Transportasi', 6, 2021, 395562200, 2, 1),
('5.1.2.03.02.0012', 'Belanja Pemeliharaan Alat Besar-Alat Besar Darat-Alat Besar Darat Lainnya', 6, 2021, 6000000, 2, 1),
('5.1.2.03.02.0404', 'Belanja Pemeliharaan Komputer-Komputer Unit-Komputer Jaringan', 6, 2021, 63000000, 2, 1),
('5.1.2.03.04.0002', 'Belanja Pemeliharaan Jalan dan Jembatan- Jalan-Jalan Provinsi', 6, 2021, 50197209184, 2, 1),
('5.1.2.03.04.0012', 'Belanja Pemeliharaan Jalan dan Jembatan- Jembatan-Jembatan pada Jalan Provinsi', 6, 2021, 4587828575, 2, 1),
('5.2.1.01.03', 'Belanja Modal Lapangan', 5, 2021, 3196000000, 2, 1),
('5.2.1.01.03.0007', 'Belanja Modal Tanah untuk Jalan', 6, 2021, 25000000000, 2, 1),
('5.2.2.01.01.0008', 'Belanja Modal Aggregate and Concrete Equipment', 6, 2021, 0, 2, 1),
('5.2.2.01.03.0003', 'Belanja Modal Compressor', 6, 2021, 0, 2, 1),
('5.2.2.02.01.0003', 'Belanja Modal Kendaraan Bermotor Angkutan Barang', 6, 2021, 192800000, 2, 1),
('5.2.2.05.01.0002', 'Belanja Modal Mesin Hitung/Mesin Jumlah', 6, 2021, 2250000, 2, 1),
('5.2.2.08.01.0008', 'Belanja Modal Alat Laboratorium Mekanika Tanah dan Batuan', 6, 2021, 183137500, 2, 1),
('5.2.2.18', 'Belanja Modal Rambu-Rambu', 4, 2021, 12303700000, 2, 1),
('5.2.2.18.01', 'Belanja Modal Rambu-Rambu Lalu Lintas Darat', 5, 2021, 12303700000, 2, 1),
('5.2.2.18.01.0003', 'Belanja Modal Rambu-Rambu Lalu Lintas Darat Lainnya', 6, 2021, 125000000, 2, 1),
('5.2.4.01', 'Belanja Modal Jalan dan Jembatan', 4, 2021, 2126880000, 2, 1),
('5.2.4.01.01', 'Belanja Modal Jalan', 5, 2021, 1287287500, 2, 1),
('5.2.4.01.01.0002', 'Belanja Modal Jalan Provinsi', 6, 2021, 0, 2, 1),
('5.2.4.01.02', 'Belanja Modal Jembatan', 5, 2021, 2126880000, 2, 1),
('5.2.4.01.02.0002', 'Belanja Modal Jembatan pada Jalan Provinsi', 6, 2021, 33017935110, 2, 1),
('5.1.2.01.01.0023', 'Belanja Suku Cadang-Suku Cadang Lainnya', 6, 2021, 32500000, 2, 1),
('5.1.2.02.08.0021', 'Belanja Jasa Konsultansi Pengawasan Rekayasa-Jasa Pengawas Pekerjaan Konstruksi Teknik Sipil Air', 6, 2021, 2365000000, 2, 1),
('5.1.2.02.08.0027', 'Belanja Jasa Konsultansi Spesialis-Jasa Pembuatan Peta', 6, 2021, 100000000, 2, 1),
('5.1.2.02.12.0002', 'Belanja Sosialisasi', 6, 2021, 74600000, 2, 1),
('5.1.2.03.02.0120', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Rumah Tangga-Alat Pembersih', 6, 2021, 123925000, 2, 1),
('5.2.2.01.01.0006', 'Belanja Modal Asphalt Equipment', 6, 2021, 0, 2, 1),
('5.2.2.01.01.0012', 'Belanja Modal Alat Besar Darat Lainnya', 6, 2021, 0, 2, 1),
('5.2.2.04', 'Belanja Modal Alat Pertanian', 4, 2021, 3000000, 2, 1),
('5.2.2.04.01', 'Belanja Modal Alat Pengolahan', 5, 2021, 3000000, 2, 1),
('5.2.2.04.01.0001', 'Belanja Modal Alat Pengolahan Tanah dan Tanaman', 6, 2021, 1000000, 2, 1),
('5.2.3.01.01.0009', 'Belanja Modal Bangunan Gedung Tempat Pertemuan', 6, 2021, 310000000, 2, 1),
('5.2.3.01.02', 'Belanja Modal Bangunan Gedung Tempat Tinggal', 5, 2021, 0, 2, 1),
('5.2.3.01.02.0013', 'Belanja Modal Bangunan Gedung Tempat Tinggal Lainnya', 6, 2021, 161710287, 2, 1),
('5.2.4.01.01.0010', 'Belanja Modal Jalan Lainnya', 6, 2021, 537287500, 2, 1),
('5.2.4.02', 'Belanja Modal Bangunan Air', 4, 2021, 199655097, 2, 1),
('5.2.4.02.01', 'Belanja Modal Bangunan Air Irigasi', 5, 2021, 728000000, 2, 1),
('5.2.4.02.01.0002', 'Belanja Modal Bangunan Pengambilan Irigasi', 6, 2021, 8004021552, 2, 1),
('5.2.4.02.01.0003', 'Belanja Modal Bangunan Pembawa Irigasi', 6, 2021, 27438126888, 2, 1),
('5.2.4.02.01.0004', 'Belanja Modal Bangunan Pembuang Irigasi', 6, 2021, 1215111176, 2, 1),
('5.2.4.02.04', 'Belanja Modal Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam', 5, 2021, 199655097, 2, 1),
('5.2.4.02.04.0001', 'Belanja Modal Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam', 6, 2021, 199655097, 2, 1),
('5.2.4.02.04.0002', 'Belanja Modal Bangunan Pengambilan Pengaman Sungai/Pantai', 6, 2021, 48204998502, 2, 1),
('5.2.4.02.06', 'Belanja Modal Bangunan Air Bersih/Air Baku', 5, 2021, 52686860000, 2, 1),
('5.2.4.02.06.0001', 'Belanja Modal Bangunan Waduk Air Bersih/Air Baku', 6, 2021, 1646424156, 2, 1),
('5.2.4.02.06.0002', 'Belanja Modal Bangunan Pengambilan Air Bersih/Air Baku', 6, 2021, 2629840909, 2, 1),
('5.2.4.02.06.0003', 'Belanja Modal Bangunan Pembawa Air Bersih/Air Baku', 6, 2021, 49886860000, 2, 1),
('5.2.4.03', 'Belanja Modal Instalasi', 4, 2021, 200000000, 2, 1),
('5.2.4.03.02', 'Belanja Modal Instalasi Air Kotor', 5, 2021, 300000000, 2, 1),
('5.2.4.03.02.0004', 'Belanja Modal Instalasi Air Kotor Lainnya', 6, 2021, 1410000000, 2, 1),
('5.1.2.01.01.0076', 'Belanja Pakaian Olahraga', 6, 2021, 6720000, 2, 1),
('5.1.2.02.04.0135', 'Belanja Sewa Peralatan Cetak', 6, 2021, 0, 2, 1),
('5.1.5.02', 'Belanja Hibah kepada Pemerintah Daerah Lainnya', 4, 2021, 150600000, 2, 1),
('5.1.5.02.02', 'Belanja Hibah Barang kepada Pemerintah Daerah Lainnya', 5, 2021, 150600000, 2, 1),
('5.1.5.02.02.0001', 'Belanja Hibah Barang kepada Pemerintah Daerah Lainnya', 6, 2021, 150600000, 2, 1),
('5.1.6', 'Belanja Bantuan Sosial', 3, 2021, 810000000, 2, 1),
('5.1.6.03', 'Belanja Bantuan Sosial kepada Kelompok Masyarakat', 4, 2021, 3786720750, 2, 1),
('5.1.6.03.01', 'Belanja Bantuan Sosial Uang yang direncanakan kepada Kelompok Masyarakat', 5, 2021, 1152000000, 2, 1),
('5.1.6.03.01.0001', 'Belanja Bantuan Sosial Uang yang Direncanakan kepada Kelompok Masyarakat', 6, 2021, 1152000000, 2, 1),
('5.2.1.01.01.0007', 'Belanja Modal Tanah Persil Lainnya', 6, 2021, 1563010925, 2, 1),
('5.1.2.01.01.0074', 'Belanja Pakaian Adat Daerah', 6, 2021, 40600000, 2, 1),
('5.1.2.02.01.0025', 'Belanja Jasa Tenaga Kesenian dan Kebudayaan', 6, 2021, 506925000, 2, 1),
('5.1.2.02.01.0046', 'Belanja Jasa Konversi Aplikasi/Sistem Informasi', 6, 2021, 200000000, 2, 1),
('5.1.2.02.01.0071', 'Belanja Lembur', 6, 2021, 0, 2, 1),
('5.1.2.02.02.0008', 'Belanja Asuransi Barang Milik Daerah', 6, 2021, 0, 2, 1),
('5.1.5.05.01', 'Belanja Hibah kepada Badan dan Lembaga yang Bersifat Nirlaba, Sukarela dan Sosial yang Dibentuk Berdasarkan Peraturan Perundang-Undangan', 5, 2021, 500000000, 2, 1),
('5.1.5.05.01.0001', 'Belanja Hibah Uang kepada Badan dan Lembaga yang Bersifat Nirlaba, Sukarela dan Sosial yang Dibentuk Berdasarkan Peraturan Perundang-Undangan', 6, 2021, 83454243000, 2, 1),
('5.1.5.05.02', 'Belanja Hibah kepada Badan dan Lembaga Nirlaba, Sukarela dan Sosial yang Telah Memiliki Surat Keterangan Terdaftar', 5, 2021, 20350000000, 2, 1),
('5.1.5.05.02.0001', 'Belanja Hibah Uang kepada Badan dan Lembaga Nirlaba, Sukarela dan Sosial yang Telah Memiliki Surat Keterangan Terdaftar', 6, 2021, 23550000000, 2, 1),
('5.1.5.05.03.0002', 'Belanja Hibah Barang kepada Badan dan Lembaga Nirlaba, Sukarela Bersifat Sosial Kemasyarakatan', 6, 2021, 150000000, 2, 1),
('5.1.5.07', 'Belanja Hibah Bantuan Keuangan kepada Partai Politik', 4, 2021, 7591268400, 2, 1),
('5.1.5.07.01', 'Belanja Hibah Bantuan Keuangan kepada Partai Politik', 5, 2021, 7591268400, 2, 1),
('5.1.5.07.01.0001', 'Belanja Hibah berupa Bantuan Keuangan kepada Partai Politik', 6, 2021, 7591268400, 2, 1),
('5.2.2.05.02.0007', 'Belanja Modal Alat Pemadam Kebakaran', 6, 2021, 2510248000, 2, 1),
('5.2.2.05.03.0002', 'Belanja Modal Meja Rapat Pejabat', 6, 2021, 19500000, 2, 1),
('5.1.2.02.01.0017', 'Belanja Jasa Tenaga Ketenteraman, Ketertiban Umum, dan Perlindungan Masyarakat', 6, 2021, 11308462500, 2, 1),
('5.1.2.02.08.0016', 'Belanja Jasa Konsultansi Perencanaan Penataan Ruang-Jasa Perencanaan dan Perancangan Lingkungan Bangunan dan Landscape', 6, 2021, 50000000, 2, 1),
('5.1.2.02.08.0023', 'Belanja Jasa Konsultansi Pengawasan Penataan Ruang', 6, 2021, 190000000, 2, 1),
('5.1.5.01', 'Belanja Hibah kepada Pemerintah Pusat', 4, 2021, 2000000000, 2, 1),
('5.1.5.01.01', 'Belanja Hibah Uang kepada Pemerintah Pusat', 5, 2021, 0, 2, 1),
('5.1.5.01.01.0001', 'Belanja Hibah Uang kepada Pemerintah Pusat', 6, 2021, 3000000000, 2, 1),
('5.2.3.01.01.0036', 'Belanja Modal Taman', 6, 2021, 60000000, 2, 1),
('5.1.2.01.01.0045', 'Belanja Natura dan Pakan-Natura dan Pakan Lainnya', 6, 2021, 158760000, 2, 1),
('5.1.2.02.01.0019', 'Belanja Jasa Tenaga Penanganan Bencana', 6, 2021, 5470000000, 2, 1),
('5.1.2.02.04.0034', 'Belanja Sewa Alat Bantu Lainnya', 6, 2021, 30000000, 2, 1),
('5.1.2.02.04.0121', 'Belanja Sewa Alat Pendingin', 6, 2021, 10000000, 2, 1),
('5.1.2.02.09.0014', 'Belanja Jasa Konsultansi Berorientasi Layanan-Jasa Khusus', 6, 2021, 96000000, 2, 1),
('5.1.2.02.12.0004', 'Belanja Diklat Kepemimpinan', 6, 2021, 169420000, 2, 1),
('5.1.2.03.03.0026', 'Belanja Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung Tempat Kerja-Bangunan Penampung Sekam', 6, 2021, 766605000, 2, 1),
('5.1.2.03.05', 'Belanja Pemeliharaan Aset Tetap Lainnya', 5, 2021, 300000, 2, 1),
('5.1.2.03.05.0065', 'Belanja Pemeliharaan Aset Tetap dalam Renovasi-Aset Tetap dalam Renovasi-Aset Tetap dalam Renovasi', 6, 2021, 192550500, 2, 1),
('5.2.2.06.02.0011', 'Belanja Modal Alat Komunikasi Lainnya', 6, 2021, 450000000, 2, 1),
('5.2.2.06.04', 'Belanja Modal Peralatan Komunikasi Navigasi', 5, 2021, 4000000, 2, 1),
('5.2.2.06.04.0006', 'Belanja Modal Peralatan Komunikasi untuk Dokumentasi', 6, 2021, 300000, 2, 1),
('5.2.2.07.01.0001', 'Belanja Modal Alat Kedokteran Umum', 6, 2021, 0, 2, 1),
('5.2.2.15', 'Belanja Modal Alat Keselamatan Kerja', 4, 2021, 9910200, 2, 1),
('5.2.2.15.03', 'Belanja Modal Alat SAR', 5, 2021, 60356313, 2, 1),
('5.2.2.15.03.0004', 'Belanja Modal Alat SAR Lainnya', 6, 2021, 60356313, 2, 1),
('5.1.2.02.01.0065', 'Belanja Penambahan Daya', 6, 2021, 70349400, 2, 1),
('5.1.2.02.04.0052', 'Belanja Sewa Alat Angkutan Apung Bermotor Lainnya', 6, 2021, 6400000, 2, 1),
('5.1.2.02.04.0075', 'Belanja Sewa Perkakas Bengkel Kerja', 6, 2021, 2000000, 2, 1),
('5.1.2.02.04.0103', 'Belanja Sewa Alat Pengolahan Tanah dan Tanaman', 6, 2021, 4000000, 2, 1),
('5.1.2.02.05.0037', 'Belanja Sewa Bangunan Gedung Tempat Kerja Lainnya', 6, 2021, 10000000, 2, 1),
('5.1.6.01', 'Belanja Bantuan Sosial kepada Individu', 4, 2021, 810000000, 2, 1),
('5.1.6.01.01', 'Belanja Bantuan Sosial Uang yang direncanakan kepada Individu', 5, 2021, 810000000, 2, 1),
('5.1.6.01.01.0001', 'Belanja Bantuan Sosial Uang yang Direncanakan kepada Individu', 6, 2021, 405000000, 2, 1),
('5.1.6.01.02', 'Belanja Bantuan Sosial Barang yang Direncanakan kepada Individu', 5, 2021, 402800000, 2, 1),
('5.1.6.01.02.0001', 'Belanja Bantuan Sosial Barang yang Direncanakan kepada Individu', 6, 2021, 2469080288, 2, 1),
('5.2.2.02.02', 'Belanja Modal Alat Angkutan Darat Tak Bermotor', 5, 2021, 105200000, 2, 1),
('5.2.2.02.02.0001', 'Belanja Modal Kendaraan Tak Bermotor Angkutan Barang', 6, 2021, 1300000, 2, 1),
('4.1.2.03', 'Retribusi Perizinan Tertentu', 4, 2021, 2246000000, 1, 1),
('4.1.2.03.06', 'Retribusi Perpanjangan Izin Mempekerjakan Tenaga Kerja Asing (IMTA)', 5, 2021, 1500000000, 1, 1),
('4.1.2.03.06.0001', 'Retribusi Pemberian Perpanjangan IMTA kepada Pemberi Kerja Tenaga Kerja Asing', 6, 2021, 1900000000, 1, 1),
('5.1.2.02.01.0011', 'Honorarium Penyelenggaraan Kegiatan Pendidikan dan Pelatihan', 6, 2021, 528800000, 2, 1),
('5.1.2.02.03', 'Belanja Sewa Tanah', 5, 2021, 60000000, 2, 1),
('5.1.2.02.03.0004', 'Belanja Sewa Tanah untuk Bangunan Tempat Kerja', 6, 2021, 150000000, 2, 1),
('5.1.2.01.01.0064', 'Belanja Pakaian Dinas Lapangan (PDL)', 6, 2021, 35400000, 2, 1),
('5.1.2.02.05.0016', 'Belanja Sewa Bangunan Gedung Perpustakaan', 6, 2021, 28000000, 2, 1),
('5.1.2.04.02', 'Belanja Perjalanan Dinas Luar Negeri', 5, 2021, 900000000, 2, 1),
('5.1.2.04.02.0001', 'Belanja Perjalanan Dinas BiasaûLuar Negeri', 6, 2021, 0, 2, 1),
('5.1.2.05.02', 'Belanja Jasa yang Diberikan kepada Pihak Ketiga/Pihak Lain/Masyarakat', 5, 2021, 20187500, 2, 1),
('5.1.2.05.02.0001', 'Belanja Jasa yang Diberikan kepada Pihak Ketiga/Pihak Lain', 6, 2021, 0, 2, 1),
('5.2.2.06.01.0006', 'Belanja Modal Alat Studio Lainnya', 6, 2021, 3000000, 2, 1),
('5.1.2.01.01.0041', 'Belanja Persediaan untuk Tujuan Strategis/Berjaga-jaga-Persediaan untuk Tujuan Strategis/Berjaga-jaga', 6, 2021, 726000000, 2, 1),
('5.1.2.01.01.0044', 'Belanja Natura dan Pakan-Pakan', 6, 2021, 34392000, 2, 1),
('5.1.2.02.01.0023', 'Belanja Jasa Tenaga Teknis Pertanian dan Pangan', 6, 2021, 8269260000, 2, 1),
('5.1.2.02.01.0032', 'Belanja Jasa Tenaga Caraka', 6, 2021, 78000000, 2, 1),
('5.1.2.02.04.0037', 'Belanja Sewa Kendaraan Bermotor Angkutan Barang', 6, 2021, 133513948, 2, 1),
('5.1.2.02.08.0006', 'Belanja Jasa Konsultansi Perencanaan Rekayasa-Jasa Nasihat dan Konsultansi Rekayasa Teknik', 6, 2021, 12000000, 2, 1),
('5.1.2.02.09.0001', 'Belanja Jasa Konsultansi Berorientasi Bidang-Pengembangan Pertanian dan Perdesaan', 6, 2021, 1193200000, 2, 1),
('5.1.2.03.02.0001', 'Belanja Pemeliharaan Alat Besar-Alat Besar Darat-Tractor', 6, 2021, 11000000, 2, 1),
('5.1.2.03.02.0039', 'Belanja Pemeliharaan Alat Angkutan-Alat Angkutan Darat Bermotor-Kendaraan Bermotor Beroda Tiga', 6, 2021, 6000000, 2, 1),
('5.1.2.03.02.0107', 'Belanja Pemeliharaan Alat Pertanian-Alat Pengolahan-Alat Laboratorium Pertanian', 6, 2021, 864000, 2, 1),
('5.1.2.03.02.0446', 'Belanja Pemeliharaan Alat Keselamatan Kerja-Alat Pelindung-Baju Pengaman', 6, 2021, 1600000, 2, 1),
('5.1.2.03.03.0002', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Gudang', 6, 2021, 0, 2, 1),
('5.1.2.03.03.0029', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Peternakan/Perikanan', 6, 2021, 191092500, 2, 1),
('5.1.2.03.05.0046', 'Belanja Pemeliharaan Hewan-Hewan Lainnya-Hewan Lainnya', 6, 2021, 11205000, 2, 1),
('5.2.2.01.01.0001', 'Belanja Modal Tractor', 6, 2021, 35000000, 2, 1),
('5.2.2.02.01.0005', 'Belanja Modal Kendaraan Bermotor Beroda Tiga', 6, 2021, 150000000, 2, 1),
('5.2.2.04.01.0009', 'Belanja Modal Alat-Alat Peternakan', 6, 2021, 76050000, 2, 1),
('5.2.3.01.01.0008', 'Belanja Modal Bangunan Gedung Tempat Ibadah', 6, 2021, 200000000, 2, 1),
('5.2.3.01.01.0013', 'Belanja Modal Bangunan Gedung untuk Pos Jaga', 6, 2021, 55875000, 2, 1),
('5.2.3.01.01.0029', 'Belanja Modal Bangunan Peternakan/Perikanan', 6, 2021, 973995000, 2, 1),
('5.2.4.02.01.0008', 'Belanja Modal Bangunan Air Irigasi Lainnya', 6, 2021, 728000000, 2, 1),
('5.2.4.03.02.0003', 'Belanja Modal Instalasi Air Buangan Pertanian', 6, 2021, 300000000, 2, 1),
('5.2.5.03', 'Belanja Modal Hewan', 4, 2021, 2525000000, 2, 1),
('5.2.5.03.02', 'Belanja Modal Ternak', 5, 2021, 2525000000, 2, 1),
('5.2.5.03.02.0004', 'Belanja Modal Ternak Lainnya', 6, 2021, 2877500000, 2, 1),
('5.1.2.01.01.0005', 'Belanja Bahan-Bahan Baku', 6, 2021, 26279880, 2, 1),
('5.1.2.02.01.0069', 'Belanja Pengolahan Air Limbah', 6, 2021, 1350000000, 2, 1),
('5.1.2.02.04.0003', 'Belanja Sewa Excavator', 6, 2021, 48328291, 2, 1),
('5.1.2.02.04.0018', 'Belanja Sewa Alat Besar Apung Lainnya', 6, 2021, 20000000, 2, 1),
('5.1.2.02.04.0050', 'Belanja Sewa Alat Angkutan Apung Bermotor Khusus', 6, 2021, 8000000, 2, 1),
('5.1.2.02.09.0011', 'Belanja Jasa Konsultansi Berorientasi Layanan-Jasa Survei', 6, 2021, 1490000000, 2, 1),
('5.1.2.02.10', 'Belanja Jasa Ketersediaan Layanan (Availibility Payment)', 5, 2021, 21450000, 2, 1),
('5.1.2.02.10.0010', 'Belanja Jasa Ketersediaan Layanan (Availibility Payment) Infrastruktur Minyak dan Gas Bumi dan Energi Terbarukan', 6, 2021, 21450000, 2, 1),
('5.1.2.03.02.0113', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Kantor-Mesin Ketik', 6, 2021, 2000000, 2, 1),
('5.2.2.05.01.0001', 'Belanja Modal Mesin Ketik', 6, 2021, 2500000, 2, 1),
('5.2.3.01.01.0032', 'Belanja Modal Bangunan Fasilitas Umum', 6, 2021, 1456231000, 2, 1),
('5.2.5.01.03', 'Belanja Modal Kartografi, Naskah, dan Lukisan', 5, 2021, 204000000, 2, 1),
('5.2.5.01.03.0003', 'Belanja Modal Lukisan dan Ukiran', 6, 2021, 0, 2, 1),
('5.1.1.02.02', 'Tambahan Penghasilan berdasarkan Tempat Bertugas ASN', 5, 2021, 0, 2, 1),
('5.1.1.02.02.0001', 'Tambahan Penghasilan berdasarkan Tempat Bertugas PNS', 6, 2021, 0, 2, 1),
('5.1.2.02.04.0202', 'Belanja Sewa Peralatan Komunikasi untuk Dokumentasi', 6, 2021, 0, 2, 1),
('5.1.2.02.04.0133', 'Belanja Sewa Peralatan Studio Video dan Film', 6, 2021, 112000000, 2, 1),
('5.1.2.02.07', 'Belanja Sewa Aset Tetap Lainnya', 5, 2021, 24000000, 2, 1),
('5.1.2.02.07.0057', 'Belanja Sewa Tanaman', 6, 2021, 0, 2, 1),
('5.1.5.05.02.0002', 'Belanja Hibah Barang kepada Badan dan Lembaga Nirlaba, Sukarela dan Sosial yang Telah Memiliki Surat Keterangan Terdaftar', 6, 2021, 0, 2, 1),
('5.1.5.05.01.0002', 'Belanja Hibah Barang kepada Badan dan Lembaga yang Bersifat Nirlaba, Sukarela dan Sosial yang Dibentuk Berdasarkan Peraturan Perundang-Undangan', 6, 2021, 460696000, 2, 1),
('4.1.2.03.03', 'Retribusi Izin Trayek untuk Menyediakan Pelayanan Angkutan Umum', 5, 2021, 300000000, 1, 1),
('4.1.2.03.03.0001', 'Retribusi Izin Trayek untuk Menyediakan Pelayanan Angkutan Umum', 6, 2021, 300000000, 1, 1),
('5.1.2.02.09.0012', 'Belanja Jasa Konsultansi Berorientasi Layanan-Jasa Studi Penelitian dan Bantuan Teknik', 6, 2021, 700000000, 2, 1),
('5.2.2.15.01', 'Belanja Modal Alat Deteksi', 5, 2021, 2564991630, 2, 1),
('5.2.2.15.01.0003', 'Belanja Modal Alat Deteksi Lainnya', 6, 2021, 2372041630, 2, 1),
('5.2.3.01.01.0018', 'Belanja Modal Bangunan Gedung Terminal/Pelabuhan/Bandara', 6, 2021, 0, 2, 1),
('5.2.5.01.05', 'Belanja Modal Karya Grafika (Graphic Material)', 5, 2021, 5000000, 2, 1),
('5.2.5.01.05.0002', 'Belanja Modal Karya Grafika (Graphic Material) Lainnya', 6, 2021, 5000000, 2, 1),
('5.1.2.02.01.0039', 'Belanja Jasa Tenaga Informasi dan Teknologi', 6, 2021, 114000000, 2, 1),
('5.1.2.02.04.0355', 'Belanja Sewa Peralatan Umum', 6, 2021, 20000000, 2, 1),
('5.1.2.02.07.0028', 'Belanja Sewa Alat Musik', 6, 2021, 163900000, 2, 1),
('5.1.2.03.03.0033', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Parkir', 6, 2021, 161000000, 2, 1),
('5.1.5.01.02', 'Belanja Hibah Barang kepada Pemerintah Pusat', 5, 2021, 2000000000, 2, 1),
('5.1.5.01.02.0001', 'Belanja Hibah Barang kepada Pemerintah Pusat', 6, 2021, 2056600000, 2, 1),
('5.2.2.14', 'Belanja Modal Alat Bantu Eksplorasi', 4, 2021, 200000000, 2, 1),
('5.2.2.14.01', 'Belanja Modal Alat Bantu Eksplorasi', 5, 2021, 200000000, 2, 1),
('5.2.2.14.01.0002', 'Belanja Modal Elektrik', 6, 2021, 0, 2, 1),
('5.1.2.01.01.0046', 'Belanja Persediaan Penelitian-Persediaan Penelitian Biologi', 6, 2021, 132600000, 2, 1),
('5.1.2.02.05.0002', 'Belanja Sewa Bangunan Gudang', 6, 2021, 30000000, 2, 1),
('5.1.2.02.08.0013', 'Belanja Jasa Konsultansi Perencanaan Rekayasa-Jasa Desain Rekayasa Lainnya', 6, 2021, 9550000, 2, 1),
('5.1.2.03.02.0104', 'Belanja Pemeliharaan Alat Pertanian-Alat Pengolahan-Alat Pemeliharaan Tanaman/ Ikan/Ternak', 6, 2021, 30000000, 2, 1),
('5.1.2.03.03.0036', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Taman', 6, 2021, 200000000, 2, 1),
('5.1.2.03.03.0041', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Tinggal- Mess/Wisma/Bungalow/Tempat Peristirahatan', 6, 2021, 500000000, 2, 1),
('5.1.2.03.04.0010', 'Belanja Pemeliharaan Jalan dan Jembatan- Jalan-Jalan Lainnya', 6, 2021, 200000000, 2, 1),
('5.2.2.15.02', 'Belanja Modal Alat Pelindung', 5, 2021, 9910200, 2, 1),
('5.2.2.15.02.0002', 'Belanja Modal Masker', 6, 2021, 0, 2, 1),
('5.2.2.15.02.0006', 'Belanja Modal Alat Pelindung Lainnya', 6, 2021, 0, 2, 1),
('5.1.2.01.01.0028', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Persediaan Dokumen/Administrasi Tender', 6, 2021, 0, 2, 1),
('5.1.2.02.04.0364', 'Belanja Sewa Photo and Film Equipment', 6, 2021, 0, 2, 1),
('5.2.2.11', 'Belanja Modal Alat Eksplorasi', 4, 2021, 250000000, 2, 1),
('5.2.2.11.02', 'Belanja Modal Alat Eksplorasi Geofisika', 5, 2021, 250000000, 2, 1),
('5.2.2.11.02.0002', 'Belanja Modal Elektronik/Electric', 6, 2021, 144450000, 2, 1),
('5.2.5.08.01.0006', 'Belanja Modal Kajian', 6, 2021, 0, 2, 1),
('4.1.2.02.09', 'Retribusi Tempat Rekreasi dan Olahraga', 5, 2021, 109752000, 1, 1),
('4.1.2.02.09.0001', 'Retribusi Pelayanan Tempat Rekreasi dan Olahraga', 6, 2021, 48620000, 1, 1),
('5.1.2.02.01.0054', 'Belanja Jasa Jalan/Tol', 6, 2021, 15000000, 2, 1),
('5.1.2.02.04.0038', 'Belanja Sewa Kendaraan Bermotor Beroda Dua', 6, 2021, 0, 2, 1),
('5.1.2.02.04.0117', 'Belanja Sewa Alat Kantor Lainnya', 6, 2021, 13500000, 2, 1),
('5.1.2.02.04.0406', 'Belanja Sewa Komputer Unit Lainnya', 6, 2021, 1806000, 2, 1),
('5.1.2.05.01.0002', 'Belanja Penghargaan atas Suatu Prestasi', 6, 2021, 0, 2, 1),
('5.1.2.05.01.0004', 'Belanja Penanganan Dampak Sosial Kemasyarakatan', 6, 2021, 8140326052, 2, 1),
('5.2.2.05.03.0006', 'Belanja Modal Kursi Tamu di Ruangan Pejabat', 6, 2021, 46550000, 2, 1),
('5.2.2.05.03.0007', 'Belanja Modal Lemari dan Arsip Pejabat', 6, 2021, 17000000, 2, 1),
('5.2.2.19', 'Belanja Modal Peralatan Olahraga', 4, 2021, 5206892250, 2, 1),
('5.2.2.19.01', 'Belanja Modal Peralatan Olahraga', 5, 2021, 5206892250, 2, 1),
('5.2.2.19.01.0006', 'Belanja Modal Peralatan Olahraga Lainnya', 6, 2021, 10000000, 2, 1);
INSERT INTO `data_uraian_kegiatan_pemko` (`kode_rekening`, `uraian`, `level`, `tahun`, `anggaran`, `jenis`, `st_anggaran`) VALUES
('5.2.3.01.01.0011', 'Belanja Modal Bangunan Gedung Tempat Olahraga', 6, 2021, 15409810870, 2, 1),
('5.2.5.01.01.0007', 'Belanja Modal Buku Ilmu Pengetahuan Praktis', 6, 2021, 7599810, 2, 1),
('5.1.2.02.01.0006', 'Honorarium Penyuluhan atau Pendampingan', 6, 2021, 15400000, 2, 1),
('5.1.2.02.01.0036', 'Belanja Jasa Audit/Surveillance ISO', 6, 2021, 115800000, 2, 1),
('5.1.2.02.01.0037', 'Belanja Jasa Juri Perlombaan/Pertandingan', 6, 2021, 21000000, 2, 1),
('5.1.2.02.01.0041', 'Belanja Jasa Pemasangan Instalasi Telepon, Air, dan Listrik', 6, 2021, 33000000, 2, 1),
('5.1.2.02.04.0012', 'Belanja Sewa Alat Besar Darat Lainnya', 6, 2021, 43000000, 2, 1),
('5.1.2.02.04.0043', 'Belanja Sewa Alat Angkutan Darat Bermotor Lainnya', 6, 2021, 12000000, 2, 1),
('5.1.2.02.04.0049', 'Belanja Sewa Alat Angkutan Apung Bermotor untuk Penumpang', 6, 2021, 8000000, 2, 1),
('5.1.2.02.09.0015', 'Belanja Jasa Konsultansi Bidang Kepariwisataan-Jasa Konsultansi Destinasi Pariwisata', 6, 2021, 94750000, 2, 1),
('5.2.1.01.03.0011', 'Belanja Modal Tanah untuk Bangunan Bersejarah', 6, 2021, 3196000000, 2, 1),
('5.1.2.02.01.0024', 'Belanja Jasa Tenaga Arsip dan Perpustakaan', 6, 2021, 31750000, 2, 1),
('5.1.2.02.01.0045', 'Belanja Jasa Pelayanan Kearsipan', 6, 2021, 3600000, 2, 1),
('5.2.5.01.01.0004', 'Belanja Modal Buku Ilmu Sosial', 6, 2021, 48000000, 2, 1),
('5.2.5.01.01.0005', 'Belanja Modal Buku Ilmu Bahasa', 6, 2021, 198000000, 2, 1),
('4.1.2.02.11', 'Retribusi Penjualan Produksi Usaha Daerah', 5, 2021, 915000000, 1, 1),
('4.1.2.02.11.0003', 'Retribusi Penjualan Produksi hasil Usaha Daerah berupa Bibit atau Benih Ikan', 6, 2021, 500000000, 1, 1),
('4.1.2.02.11.0004', 'Retribusi Penjualan Produksi hasil Usaha Daerah selain Bibit atau Benih Tanaman, Ternak, dan Ikan', 6, 2021, 1000000000, 1, 1),
('4.1.2.03.04', 'Retribusi Izin Usaha Perikanan', 5, 2021, 2246000000, 1, 1),
('4.1.2.03.04.0001', 'Retribusi Pemberian Izin Kegiatan Usaha Penangkapan Ikan', 6, 2021, 2550000000, 1, 1),
('5.1.2.01.01.0011', 'Belanja Bahan-Bahan/Bibit Ternak/Bibit Ikan', 6, 2021, 39200000, 2, 1),
('5.1.2.02.01.0042', 'Belanja Jasa Pelaksanaan Transaksi Keuangan', 6, 2021, 5460000000, 2, 1),
('5.1.2.02.01.0057', 'Belanja Jasa Operator Kapal', 6, 2021, 120000000, 2, 1),
('5.1.2.03.02.0052', 'Belanja Pemeliharaan Alat Angkutan-Alat Angkutan Apung Bermotor-Alat Angkutan Apung Bermotor Lainnya', 6, 2021, 15000000, 2, 1),
('5.1.5.05.04', 'Belanja Hibah kepada Koperasi', 5, 2021, 650000000, 2, 1),
('5.1.5.05.04.0002', 'Belanja Hibah Barang kepada Koperasi', 6, 2021, 604773500, 2, 1),
('5.2.2.01.02', 'Belanja Modal Alat Besar Apung', 5, 2021, 9328095293, 2, 1),
('5.2.2.01.02.0004', 'Belanja Modal Kapal Tarik', 6, 2021, 20000000, 2, 1),
('5.2.2.01.02.0006', 'Belanja Modal Alat Besar Apung Lainnya', 6, 2021, 9247452500, 2, 1),
('5.2.2.01.03.0013', 'Belanja Modal Peralatan Selam', 6, 2021, 536153751, 2, 1),
('5.2.2.01.03.0016', 'Belanja Modal Alat Bantu Lainnya', 6, 2021, 4800000, 2, 1),
('5.2.2.17', 'Belanja Modal Peralatan Proses/Produksi', 4, 2021, 120000000, 2, 1),
('5.2.2.17.01', 'Belanja Modal Unit Peralatan Proses/Produksi', 5, 2021, 120000000, 2, 1),
('4.1.2.02.01.0001', 'Retribusi Penyewaan Tanah dan Bangunan', 6, 2021, 0, 1, 1),
('5.1.2.02.05.0030', 'Belanja Sewa Bangunan Gedung Tempat Kerja Lainnya', 6, 2021, 150000000, 2, 1),
('5.1.6.03.02', 'Belanja Bantuan Sosial Barang yang Direncanakan kepada Kelompok Masyarakat', 5, 2021, 3786720750, 2, 1),
('5.1.6.03.02.0001', 'Belanja Bantuan Sosial Barang yang direncanakan kepada Kelompok Masyarakat', 6, 2021, 0, 2, 1),
('5.2.3.01.01.0014', 'Belanja Modal Bangunan Gedung Garasi/Pool', 6, 2021, 141230000, 2, 1),
('4.1.2.01.08', 'Retribusi Penggantian Biaya Cetak Peta', 5, 2021, 200000000, 1, 1),
('4.1.2.01.08.0004', 'Retribusi Penyediaan Peta Tematik', 6, 2021, 100000000, 1, 1),
('5.1.2.01.01.0018', 'Belanja Suku Cadang-Suku Cadang Alat Studio dan Komunikasi', 6, 2021, 27387500, 2, 1),
('5.1.2.02.01.0047', 'Belanja Jasa Penyelenggaraan Acara', 6, 2021, 180000000, 2, 1),
('5.1.2.02.08.0031', 'Belanja Jasa Konsultansi Spesialis-Jasa Inspeksi Teknikal', 6, 2021, 0, 2, 1),
('5.1.2.02.09.0006', 'Belanja Jasa Konsultansi Berorientasi Bidang-Keuangan', 6, 2021, 200000000, 2, 1),
('5.2.2.06.01.0001', 'Belanja Modal Peralatan Studio Audio', 6, 2021, 194810000, 2, 1),
('5.1.2.02.04.0405', 'Belanja Sewa Personal Computer', 6, 2021, 4800000, 2, 1),
('4.1.3', 'Hasil Pengelolaan Kekayaan Daerah yang Dipisahkan', 3, 2021, 356265026558, 1, 1),
('4.1.3.01', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMN', 4, 2021, 526848905, 1, 1),
('4.1.3.01.01', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMN', 5, 2021, 526848905, 1, 1),
('4.1.3.01.01.0001', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMN', 6, 2021, 526848905, 1, 1),
('4.1.3.02', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD', 4, 2021, 355738177653, 1, 1),
('4.1.3.02.01', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD (Lembaga Keuangan)', 5, 2021, 329046680000, 1, 1),
('4.1.3.02.01.0001', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD (Lembaga Keuangan)', 6, 2021, 329046680000, 1, 1),
('4.1.3.02.02', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD (Aneka Usaha)', 5, 2021, 1691497653, 1, 1),
('4.1.3.02.02.0001', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD (Aneka Usaha)', 6, 2021, 1691497653, 1, 1),
('4.1.3.02.03', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD (Bidang Air Minum)', 5, 2021, 25000000000, 1, 1),
('4.1.3.02.03.0001', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada Perusahaan Milik Daerah/BUMD (Bidang Air Minum)', 6, 2021, 25000000000, 1, 1),
('4.1.4.01', 'Hasil Penjualan BMD yang Tidak Dipisahkan', 4, 2021, 250000000, 1, 1),
('4.1.4.01.03', 'Hasil Penjualan Gedung dan Bangunan', 5, 2021, 50000000, 1, 1),
('4.1.4.01.03.0001', 'Hasil Penjualan Bangunan Gedung', 6, 2021, 50000000, 1, 1),
('4.1.4.01.06', 'Hasil Penjualan Aset Lainnya', 5, 2021, 200000000, 1, 1),
('4.1.4.01.06.0002', 'Hasil Penjualan Aset Lainnya-Aset Lain-Lain', 6, 2021, 5200000000, 1, 1),
('4.1.4.05', 'Jasa Giro', 4, 2021, 30900000000, 1, 1),
('4.1.4.05.01', 'Jasa Giro pada Kas Daerah', 5, 2021, 30900000000, 1, 1),
('4.1.4.05.01.0001', 'Jasa Giro pada Kas Daerah', 6, 2021, 30900000000, 1, 1),
('4.1.4.08', 'Penerimaan atas Tuntutan Ganti Kerugian Keuangan Daerah', 4, 2021, 40000000, 1, 1),
('4.1.4.08.01', 'Tuntutan Ganti Kerugian Daerah terhadap Bendahara', 5, 2021, 0, 1, 1),
('4.1.4.08.01.0001', 'Tuntutan Ganti Kerugian Daerah terhadap Bendahara', 6, 2021, 0, 1, 1),
('4.1.4.08.02', 'Tuntutan Ganti Kerugian Daerah terhadap Pegawai Negeri Bukan Bendahara atau Pejabat Lain', 5, 2021, 40000000, 1, 1),
('4.1.4.08.02.0001', 'Tuntutan Ganti Kerugian Daerah terhadap Pegawai Negeri Bukan Bendahara atau Pejabat Lain', 6, 2021, 40000000, 1, 1),
('4.1.4.11', 'Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan', 4, 2021, 300000000, 1, 1),
('4.1.4.11.01', 'Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan', 5, 2021, 300000000, 1, 1),
('4.1.4.11.01.0001', 'Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan', 6, 2021, 300000000, 1, 1),
('4.1.4.15', 'Pendapatan dari Pengembalian', 4, 2021, 2650600000, 1, 1),
('4.1.4.15.03', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Gaji dan Tunjangan', 5, 2021, 2250600000, 1, 1),
('4.1.4.15.03.0001', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Gaji dan Tunjangan', 6, 2021, 2250600000, 1, 1),
('4.1.4.15.04', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Perjalanan Dinas', 5, 2021, 400000000, 1, 1),
('4.1.4.15.04.0001', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Perjalanan Dinas Dalam Negeri- Perjalanan Dinas Biasa', 6, 2021, 400000000, 1, 1),
('4.2', 'PENDAPATAN TRANSFER', 2, 2021, 7434780086300, 1, 1),
('4.2.1', 'Pendapatan Transfer Pemerintah Pusat', 3, 2021, 7434780086300, 1, 1),
('4.2.1.01', 'Dana Perimbangan', 4, 2021, 7434780086300, 1, 1),
('4.2.1.01.01', 'Dana Transfer Umum-Dana Bagi Hasil (DBH)', 5, 2021, 440441729300, 1, 1),
('4.2.1.01.01.0001', 'DBH Pajak Bumi dan Bangunan', 6, 2021, 91496739000, 1, 1),
('4.2.1.01.01.0002', 'DBH PPh Pasal 21', 6, 2021, 261353359000, 1, 1),
('4.2.1.01.01.0003', 'DBH PPh Pasal 25 dan Pasal 29/WPOPDN', 6, 2021, 28946479000, 1, 1),
('4.2.1.01.01.0004', 'DBH Cukai Hasil Tembakau (CHT)', 6, 2021, 3838485300, 1, 1),
('4.2.1.01.01.0005', 'DBH Sumber Daya Alam (SDA) Minyak Bumi', 6, 2021, 48793000, 1, 1),
('4.2.1.01.01.0006', 'DBH Sumber Daya Alam (SDA) Gas Bumi', 6, 2021, 293132000, 1, 1),
('4.2.1.01.01.0007', 'DBH Sumber Daya Alam (SDA) Pengusahaan Panas Bumi', 6, 2021, 3427158000, 1, 1),
('4.2.1.01.01.0008', 'DBH Sumber Daya Alam (SDA) Mineral dan Batubara-Landrent', 6, 2021, 1672772000, 1, 1),
('4.2.1.01.01.0009', 'Dana Bagi Hasil (DBH) Sumber Daya Alam (SDA) Mineral dan Batubara-Royalty', 6, 2021, 37240967000, 1, 1),
('4.2.1.01.01.0010', 'DBH Sumber Daya Alam (SDA) Kehutanan- Provisi Sumber Daya Hutan (PSDH)', 6, 2021, 3554255000, 1, 1),
('4.2.1.01.01.0012', 'DBH Sumber Daya Alam (SDA) Kehutanan- Dana Reboisasi (DR)', 6, 2021, 8569590000, 1, 1),
('4.2.1.01.02', 'Dana Transfer Umum-Dana Alokasi Umum (DAU)', 5, 2021, 2545202693000, 1, 1),
('4.2.1.01.02.0001', 'DAU', 6, 2021, 2463686589000, 1, 1),
('4.2.1.01.03', 'Dana Transfer Khusus-Dana Alokasi Khusus (DAK) Fisik', 5, 2021, 387905400000, 1, 1),
('4.2.1.01.03.0004', 'DAK Fisik-Bidang Pendidikan-Reguler-SMA', 6, 2021, 194930650000, 1, 1),
('4.2.1.01.03.0005', 'DAK Fisik-Bidang Pendidikan-Reguler-SLB', 6, 2021, 1895050000, 1, 1),
('4.2.1.01.03.0011', 'DAK Fisik-Bidang Pendidikan-Reguler- Perpustakaan Daerah', 6, 2021, 500000000, 1, 1),
('4.2.1.01.03.0013', 'DAK Fisik-Bidang Kesehatan dan KB- Reguler-Pelayanan Kesehatan Dasar', 6, 2021, 1780492000, 1, 1),
('4.2.1.01.03.0014', 'DAK Fisik-Bidang Kesehatan dan KB- Reguler-Pelayanan Kesehatan Rujukan', 6, 2021, 32485929000, 1, 1),
('4.2.1.01.03.0017', 'DAK Fisik-Bidang Kesehatan dan KB- Penugasan-Penguatan Intervensi Stunting', 6, 2021, 19256700000, 1, 1),
('4.2.1.01.03.0031', 'DAK Fisik-Bidang Pertanian-Penugasan-Pembangunan/Renovasi Sarana dan Prasarana Fisik Dasar Pembangunan Pertanian', 6, 2021, 4735000000, 1, 1),
('4.2.1.01.03.0032', 'DAK Fisik-Bidang Kelautan dan Perikanan- Penugasan', 6, 2021, 350000000, 1, 1),
('4.2.1.01.03.0034', 'DAK Fisik-Bidang Jalan-Reguler-Jalan', 6, 2021, 13133236000, 1, 1),
('4.2.1.01.03.0035', 'DAK Fisik-Bidang Jalan-Penugasan-Jalan', 6, 2021, 70294554000, 1, 1),
('4.2.1.01.03.0043', 'DAK Fisik-Bidang Irigasi-Penugasan', 6, 2021, 11999999000, 1, 1),
('4.2.1.01.03.0046', 'DAK Fisik-Bidang Lingkungan Hidup dan Kehutanan-Penugasan-Kehutanan', 6, 2021, 460696000, 1, 1),
('4.2.1.01.04', 'Dana Transfer Khusus-Dana Alokasi Khusus (DAK) Non Fisik', 5, 2021, 4061230264000, 1, 1),
('4.2.1.01.04.0001', 'DAK Non Fisik-BOS Reguler', 6, 2021, 3338953850000, 1, 1),
('4.2.1.01.04.0002', 'DAK Non Fisik-BOS Afirmasi', 6, 2021, 19620000000, 1, 1),
('4.2.1.01.04.0003', 'DAK Non Fisik-BOS Kinerja', 6, 2021, 35280000000, 1, 1),
('4.2.1.01.04.0004', 'DAK Non Fisik-TPG PNSD', 6, 2021, 627207840000, 1, 1),
('4.2.1.01.04.0005', 'DAK Non Fisik-Tamsil Guru PNSD', 6, 2021, 3090000000, 1, 1),
('4.2.1.01.04.0006', 'DAK Non Fisik-TKG PNSD', 6, 2021, 19940535000, 1, 1),
('4.2.1.01.04.0009', 'DAK Non Fisik-BOP Museum dan Taman Budaya-Museum', 6, 2021, 1593200000, 1, 1),
('4.2.1.01.04.0011', 'DAK Non Fisik-BOKKB-BOK', 6, 2021, 9492240000, 1, 1),
('4.2.1.01.04.0014', 'DAK Non Fisik-BOKKB-Jaminan Persalinan', 6, 2021, 558332000, 1, 1),
('4.2.1.01.04.0016', 'DAK Non Fisik-PK2UKM', 6, 2021, 2352080000, 1, 1),
('4.2.1.01.04.0017', 'DAK Non Fisik-Dana Pelayanan Administrasi Kependudukan', 6, 2021, 2279609000, 1, 1),
('4.2.1.01.04.0018', 'DAK Non Fisik-Dana Pelayanan Kepariwisataan', 6, 2021, 862578000, 1, 1),
('4.3', 'LAIN-LAIN PENDAPATAN DAERAH YANG SAH', 2, 2021, 91568000000, 1, 1),
('4.3.1', 'Pendapatan Hibah', 3, 2021, 61068000000, 1, 1),
('4.3.1.01', 'Pendapatan Hibah dari Pemerintah Pusat', 4, 2021, 55000000000, 1, 1),
('4.3.1.01.01', 'Pendapatan Hibah dari Pemerintah Pusat', 5, 2021, 55000000000, 1, 1),
('4.3.1.01.01.0001', 'Pendapatan Hibah dari Pemerintah Pusat', 6, 2021, 53500000000, 1, 1),
('4.3.1.03', 'Pendapatan Hibah dari Kelompok Masyarakat/Perorangan Dalam Negeri', 4, 2021, 500000000, 1, 1),
('4.3.1.03.01', 'Pendapatan Hibah dari Kelompok Masyarakat/Perorangan Dalam Negeri', 5, 2021, 500000000, 1, 1),
('4.3.1.03.01.0001', 'Pendapatan Hibah dari Kelompok Masyarakat Dalam Negeri/Perorangan dalam Negeri', 6, 2021, 500000000, 1, 1),
('4.3.1.04', 'Pendapatan Hibah dari Badan/Lembaga/ Organisasi Dalam Negeri/Luar Negeri', 4, 2021, 5568000000, 1, 1),
('4.3.1.04.01', 'Pendapatan Hibah dari Badan/Lembaga/ Organisasi Dalam Negeri', 5, 2021, 5568000000, 1, 1),
('4.3.1.04.01.0001', 'Pendapatan Hibah dari Badan/Lembaga/ Organisasi Dalam Negeri', 6, 2021, 5568000000, 1, 1),
('4.3.3', 'Lain-lain Pendapatan Sesuai dengan Ketentuan Peraturan Perundang-Undangan', 3, 2021, 30500000000, 1, 1),
('4.3.3.01', 'Lain-lain Pendapatan', 4, 2021, 30500000000, 1, 1),
('4.3.3.01.01', 'Pendapatan Hibah Dana BOS', 5, 2021, 20000000000, 1, 1),
('4.3.3.01.01.0001', 'Pendapatan Hibah Dana BOS', 6, 2021, 20000000000, 1, 1),
('4.3.3.01.02', 'Pendapatan atas Pengembalian Hibah', 5, 2021, 10500000000, 1, 1),
('4.3.3.01.02.0001', 'Pendapatan atas Pengembalian Hibah pada Pemerintah', 6, 2021, 0, 1, 1),
('4.3.3.01.02.0005', 'Pendapatan atas Pengembalian Hibah pada Badan, Lembaga, dan Organisasi Kemasyarakatan yang Berbadan hukum Indonesia', 6, 2021, 10500000000, 1, 1),
('5.1.2.02.04.0116', 'Belanja Sewa Alat Penyimpan Perlengkapan Kantor', 6, 2021, 30000000, 2, 1),
('5.1.2.02.04.0148', 'Belanja Sewa Alat Komunikasi Lainnya', 6, 2021, 45712666, 2, 1),
('5.1.2.02.09.0002', 'Belanja Jasa Konsultansi Berorientasi Bidang-Transportasi', 6, 2021, 350000000, 2, 1),
('5.3', 'BELANJA TIDAK TERDUGA', 2, 2021, 75000000000, 2, 1),
('5.3.1', 'Belanja Tidak Terduga', 3, 2021, 75000000000, 2, 1),
('5.3.1.01', 'Belanja Tidak Terduga', 4, 2021, 75000000000, 2, 1),
('5.3.1.01.01', 'Belanja Tidak Terduga', 5, 2021, 75000000000, 2, 1),
('5.3.1.01.01.0001', 'Belanja Tidak Terduga', 6, 2021, 21058512853, 2, 1),
('5.4', 'BELANJA TRANSFER', 2, 2021, 2337211916455, 2, 1),
('5.4.1', 'Belanja Bagi Hasil', 3, 2021, 2337211916455, 2, 1),
('5.4.1.01', 'Belanja Bagi Hasil Pajak Daerah Kepada Pemerintahan Kabupaten/Kota dan Desa', 4, 2021, 2337211916455, 2, 1),
('5.4.1.01.01', 'Belanja Bagi Hasil Pajak Daerah Kepada Pemerintahan Kabupaten', 5, 2021, 1293708994588, 2, 1),
('5.4.1.01.01.0001', 'Belanja Bagi Hasil Pajak Daerah Kepada Pemerintahan Kabupaten', 6, 2021, 1434444567946, 2, 1),
('5.4.1.01.02', 'Belanja Bagi Hasil Pajak Daerah Kepada Pemerintahan Kota', 5, 2021, 1043502921867, 2, 1),
('5.4.1.01.02.0001', 'Belanja Bagi Hasil Pajak Daerah Kepada Pemerintahan Kota', 6, 2021, 1142502921867, 2, 1),
('6.1', 'PENERIMAAN PEMBIAYAAN', 2, 2021, 439000000000, 3, 1),
('6.1.1', 'Sisa Lebih Perhitungan Anggaran Tahun Sebelumnya', 3, 2021, 439000000000, 3, 1),
('6.1.1.05', 'Penghematan Belanja', 4, 2021, 439000000000, 3, 1),
('6.1.1.05.03', 'Sisa Penggunaan Belanja Tidak Terduga', 5, 2021, 439000000000, 3, 1),
('6.1.1.05.03.0001', 'Sisa Penggunaan Belanja Tidak Terduga', 6, 2021, 476782631305, 3, 1),
('6.2', 'PENGELUARAN PEMBIAYAAN', 2, 2021, 207000000000, 4, 1),
('6.2.2', 'Penyertaan Modal Daerah', 3, 2021, 207000000000, 4, 1),
('6.2.2.02', 'Penyertaan Modal Daerah pada Badan Usaha Milik Daerah (BUMD)', 4, 2021, 207000000000, 4, 1),
('6.2.2.02.01', 'Penyertaan Modal Daerah pada BUMD', 5, 2021, 207000000000, 4, 1),
('6.2.2.02.01.0001', 'Penyertaan Modal Daerah pada BUMD', 6, 2021, 210500000000, 4, 1),
('5.1.2.02.01.0009', 'Honorarium Penyelenggara Ujian', 6, 2021, 22640000, 2, 1),
('5.2.5.01.02', 'Belanja Modal Bahan Perpustakaan Terekam dan Bentuk Mikro', 5, 2021, 3500000000, 2, 1),
('5.2.5.01.02.0001', 'Belanja Modal Audio Visual', 6, 2021, 4428468000, 2, 1),
('5.1.1.03.01', 'Belanja Insentif bagi ASN atas Pemungutan Pajak Daerah', 5, 2021, 119583205982, 2, 1),
('5.1.1.03.01.0001', 'Belanja Insentif bagi ASN atas Pemungutan Pajak Kendaraan Bermotor', 6, 2021, 41118956815, 2, 1),
('5.1.2.02.04.0404', 'Belanja Sewa Komputer Jaringan', 6, 2021, 70000000, 2, 1),
('5.1.2.02.08.0029', 'Belanja Jasa Konsultansi Spesialis-Jasa Pengujian dan Analisa Parameter Fisikal', 6, 2021, 1500000, 2, 1),
('5.1.2.03.02.0112', 'Belanja Pemeliharaan Alat Pertanian-Alat Pengolahan-Alat Pengolahan Lainnya', 6, 2021, 15000000, 2, 1),
('5.1.1.04', 'Belanja Gaji dan Tunjangan DPRD', 4, 2021, 123747510610, 2, 1),
('5.1.1.04.01', 'Belanja Uang Representasi DPRD', 5, 2021, 3222939000, 2, 1),
('5.1.1.04.01.0001', 'Belanja Uang Representasi DPRD', 6, 2021, 3222939000, 2, 1),
('5.1.1.04.02', 'Belanja Tunjangan Keluarga DPRD', 5, 2021, 332867000, 2, 1),
('5.1.1.04.02.0001', 'Belanja Tunjangan Keluarga DPRD', 6, 2021, 368501000, 2, 1),
('5.1.1.04.03', 'Belanja Tunjangan Beras DPRD', 5, 2021, 273904000, 2, 1),
('5.1.1.04.03.0001', 'Belanja Tunjangan Beras DPRD', 6, 2021, 281185000, 2, 1),
('5.1.1.04.04', 'Belanja Uang Paket DPRD', 5, 2021, 396113000, 2, 1),
('5.1.1.04.04.0001', 'Belanja Uang Paket DPRD', 6, 2021, 396113000, 2, 1),
('5.1.1.04.05', 'Belanja Tunjangan Jabatan DPRD', 5, 2021, 4640215000, 2, 1),
('5.1.1.04.05.0001', 'Belanja Tunjangan Jabatan DPRD', 6, 2021, 4640215000, 2, 1),
('5.1.1.04.06', 'Belanja Tunjangan Alat Kelengkapan DPRD', 5, 2021, 671243000, 2, 1),
('5.1.1.04.06.0001', 'Belanja Tunjangan Alat Kelengkapan DPRD', 6, 2021, 671243000, 2, 1),
('5.1.1.04.07', 'Belanja Tunjangan Alat Kelengkapan Lainnya DPRD', 5, 2021, 95306000, 2, 1),
('5.1.1.04.07.0001', 'Belanja Tunjangan Alat Kelengkapan Lainnya DPRD', 6, 2021, 95306000, 2, 1),
('5.1.1.04.08', 'Belanja Tunjangan Komunikasi Intensif Pimpinan dan Anggota DPRD', 5, 2021, 25200000000, 2, 1),
('5.1.1.04.08.0001', 'Belanja Tunjangan Komunikasi Intensif Pimpinan dan Anggota DPRD', 6, 2021, 25200000000, 2, 1),
('5.1.1.04.09', 'Belanja Tunjangan Reses DPRD', 5, 2021, 6300000000, 2, 1),
('5.1.1.04.09.0001', 'Belanja Tunjangan Reses DPRD', 6, 2021, 6300000000, 2, 1),
('5.1.1.04.10', 'Belanja Pembebanan PPh kepada Pimpinan dan Anggota DPRD', 5, 2021, 201530000, 2, 1),
('5.1.1.04.10.0001', 'Belanja Pembebanan PPh kepada Pimpinan dan Anggota DPRD', 6, 2021, 158615000, 2, 1),
('5.1.1.04.12', 'Belanja Tunjangan Kesejahteraan Pimpinan dan Anggota DPRD', 5, 2021, 53929185000, 2, 1),
('5.1.1.04.12.0001', 'Belanja Iuran Jaminan Kesehatan bagi DPRD', 6, 2021, 3588853000, 2, 1),
('5.1.1.04.12.0002', 'Belanja Jaminan Kecelakaan Kerja DPRD', 6, 2021, 6583000, 2, 1),
('5.1.1.04.12.0003', 'Belanja Jaminan Kematian DPRD', 6, 2021, 19749000, 2, 1),
('5.1.1.04.12.0004', 'Belanja Tunjangan Perumahan DPRD', 6, 2021, 50314000000, 2, 1),
('5.1.1.04.13', 'Belanja Tunjangan Transportasi DPRD', 5, 2021, 28356083610, 2, 1),
('5.1.1.04.13.0001', 'Belanja Tunjangan Transportasi DPRD', 6, 2021, 28356083610, 2, 1),
('5.1.1.04.14', 'Belanja Uang Jasa Pengabdian DPRD', 5, 2021, 128125000, 2, 1),
('5.1.1.04.14.0001', 'Belanja Uang Jasa Pengabdian DPRD', 6, 2021, 128125000, 2, 1),
('5.1.1.06', 'Belanja Penerimaan Lainnya Pimpinan DPRD serta KDH/WKDH', 4, 2021, 8030737000, 2, 1),
('5.1.1.06.01', 'Belanja Dana Operasional Pimpinan DPRD', 5, 2021, 676800000, 2, 1),
('5.1.1.06.01.0001', 'Belanja Dana Operasional Pimpinan DPRD', 6, 2021, 676800000, 2, 1),
('5.1.2.02.01.0066', 'Belanja Registrasi/Keanggotaan', 6, 2021, 76000000, 2, 1),
('5.1.2.02.08.0007', 'Belanja Jasa Konsultansi Perencanaan Rekayasa-Jasa Desain Rekayasa untuk Konstruksi Pondasi serta Struktur Bangunan', 6, 2021, 36210000, 2, 1),
('5.1.2.02.08.0034', 'Belanja Jasa Konsultansi Lainnya-Jasa Manajemen Proyek Terkait Konstruksi Bangunan', 6, 2021, 15490000, 2, 1),
('5.2.4.01.02.0006', 'Belanja Modal Jembatan pada Jalan Tol', 6, 2021, 0, 2, 1),
('5.2.2.02.01.0001', 'Belanja Modal Kendaraan Dinas Bermotor Perorangan', 6, 2021, 0, 2, 1),
('4.1.1', 'Pajak Daerah', 3, 2021, 5438098178279, 1, 1),
('4.1.1.01', 'Pajak Kendaraan Bermotor (PKB)', 4, 2021, 2174033550464, 1, 1),
('4.1.1.01.01', 'PKB-Mobil Penumpang-Sedan', 5, 2021, 30427047373, 1, 1),
('4.1.1.01.01.0001', 'PKB-Mobil Penumpang-Sedan-Pribadi', 6, 2021, 32938191268, 1, 1),
('4.1.1.01.01.0002', 'PKB-Mobil Penumpang-Sedan-Umum', 6, 2021, 52690074, 1, 1),
('4.1.1.01.01.0004', 'PKB-Mobil Penumpang-Sedan-Pemerintah Daerah', 6, 2021, 1495489974, 1, 1),
('4.1.1.01.02', 'PKB-Mobil Penumpang-Jeep', 5, 2021, 254938366544, 1, 1),
('4.1.1.01.02.0001', 'PKB-Mobil Penumpang-Jeep-Pribadi', 6, 2021, 284462179034, 1, 1),
('4.1.1.01.02.0004', 'PKB-Mobil Penumpang-Jeep-Pemerintah Daerah', 6, 2021, 4487946953, 1, 1),
('4.1.1.01.03', 'PKB-Mobil Penumpang-Minibus', 5, 2021, 1017916559184, 1, 1),
('4.1.1.01.03.0001', 'PKB-Mobil Penumpang-Minibus-Pribadi', 6, 2021, 1136537356089, 1, 1),
('4.1.1.01.03.0002', 'PKB-Mobil Penumpang-Minibus-Umum', 6, 2021, 2732571732, 1, 1),
('4.1.1.01.03.0004', 'PKB-Mobil Penumpang-Minibus-Pemerintah Daerah', 6, 2021, 14448604258, 1, 1),
('4.1.1.01.04', 'PKB-Mobil Bus-Microbus', 5, 2021, 8665603809, 1, 1),
('4.1.1.01.04.0001', 'PKB-Mobil Bus-Microbus-Pribadi', 6, 2021, 6298113815, 1, 1),
('4.1.1.01.04.0002', 'PKB-Mobil Bus-Microbus-Umum', 6, 2021, 288142357, 1, 1),
('4.1.1.01.04.0004', 'PKB-Mobil Bus-Microbus-Pemerintah Daerah', 6, 2021, 909983371, 1, 1),
('4.1.1.01.05', 'PKB-Mobil Bus-Bus', 5, 2021, 6654543081, 1, 1),
('4.1.1.01.05.0001', 'PKB-Mobil Bus-Bus-Pribadi', 6, 2021, 3218450071, 1, 1),
('4.1.1.01.05.0002', 'PKB-Mobil Bus-Bus-Umum', 6, 2021, 2219395524, 1, 1),
('4.1.1.01.05.0004', 'PKB-Mobil Bus-Bus-Pemerintah Daerah', 6, 2021, 318712180, 1, 1),
('4.1.1.01.06', 'PKB-Mobil Barang/Beban-Pick Up', 5, 2021, 182073082642, 1, 1),
('4.1.1.01.06.0001', 'PKB-Mobil Barang/Beban-Pick Up-Pribadi', 6, 2021, 161281690854, 1, 1),
('4.1.1.01.06.0002', 'PKB-Mobil Barang/Beban-Pick Up-Umum', 6, 2021, 162434393, 1, 1),
('4.1.1.01.06.0004', 'PKB-Mobil Barang/Beban-Pick Up-Pemerintah Daerah', 6, 2021, 4569970265, 1, 1),
('4.1.1.01.07', 'PKB-Mobil Barang/Beban-Light Truck', 5, 2021, 3780850825, 1, 1),
('4.1.1.01.07.0001', 'PKB-Mobil Barang/Beban-Light Truck-Pribadi', 6, 2021, 2944372688, 1, 1),
('4.1.1.01.07.0002', 'PKB-Mobil Barang/Beban-Light Truck-Umum', 6, 2021, 409420575, 1, 1),
('4.1.1.01.07.0004', 'PKB-Mobil Barang/Beban-Light Truck- Pemerintah Daerah', 6, 2021, 93583587, 1, 1),
('4.1.1.01.08', 'PKB-Mobil Barang/Beban-Truck', 5, 2021, 212034850798, 1, 1),
('4.1.1.01.08.0001', 'PKB-Mobil Barang/Beban-Truck-Pribadi', 6, 2021, 77124207818, 1, 1),
('4.1.1.01.08.0002', 'PKB-Mobil Barang/Beban-Truck-Umum', 6, 2021, 112369970324, 1, 1),
('4.1.1.01.08.0004', 'PKB-Mobil Barang/Beban-Truck-Pemerintah Daerah', 6, 2021, 3839034330, 1, 1),
('4.1.1.01.10', 'PKB-Sepeda Motor-Sepeda Motor Roda Dua', 5, 2021, 456231096996, 1, 1),
('4.1.1.01.10.0001', 'PKB-Sepeda Motor-Sepeda Motor Roda Dua- Pribadi', 6, 2021, 437341214161, 1, 1),
('4.1.1.01.10.0002', 'PKB-Sepeda Motor-Sepeda Motor Roda Dua- Umum', 6, 2021, 3353538, 1, 1),
('4.1.1.01.10.0004', 'PKB-Sepeda Motor-Sepeda Motor Roda Dua- Pemerintah Daerah', 6, 2021, 2020458153, 1, 1),
('4.1.1.01.11', 'PKB-Sepeda Motor-Sepeda Motor Roda Tiga', 5, 2021, 771993681, 1, 1),
('4.1.1.01.11.0001', 'PKB-Sepeda Motor-Sepeda Motor Roda Tiga- Pribadi', 6, 2021, 458627030, 1, 1),
('4.1.1.01.11.0002', 'PKB-Sepeda Motor-Sepeda Motor Roda Tiga- Umum', 6, 2021, 103261025, 1, 1),
('4.1.1.01.11.0004', 'PKB-Sepeda Motor-Sepeda Motor Roda Tiga- Pemerintah Daerah', 6, 2021, 181566361, 1, 1),
('4.1.1.01.13', 'PKB-Kendaraan Khusus Alat Berat/Alat Besar', 5, 2021, 539555531, 1, 1),
('4.1.1.01.13.0001', 'PKB-Kendaraan Khusus Alat Berat/Alat Besar-Pribadi', 6, 2021, 259363459, 1, 1),
('4.1.1.01.13.0002', 'PKB-Kendaraan Khusus Alat Berat/Alat Besar-Umum', 6, 2021, 35040479, 1, 1),
('4.1.1.02', 'Bea Balik Nama Kendaraan Bermotor (BBNKB)', 4, 2021, 1197728286623, 1, 1),
('4.1.1.02.01', 'BBNKB-Mobil Penumpang-Sedan', 5, 2021, 11294094352, 1, 1),
('4.1.1.02.01.0001', 'BBNKB-Mobil Penumpang-Sedan', 6, 2021, 16590388973, 1, 1),
('4.1.1.02.02', 'BBNKB-Mobil Penumpang-Jeep', 5, 2021, 94629555420, 1, 1),
('4.1.1.02.02.0001', 'BBNKB-Mobil Penumpang-Jeep', 6, 2021, 139005491166, 1, 1),
('4.1.1.02.03', 'BBNKB-Mobil Penumpang-Minibus', 5, 2021, 377836387501, 1, 1),
('4.1.1.02.03.0001', 'BBNKB-Mobil Penumpang-Minibus', 6, 2021, 555020388626, 1, 1),
('4.1.1.02.04', 'BBNKB-Mobil Bus-Microbus', 5, 2021, 6052893968, 1, 1),
('4.1.1.02.04.0001', 'BBNKB-Mobil Bus-Microbus', 6, 2021, 5138556711, 1, 1),
('4.1.1.02.05', 'BBNKB-Mobil Bus-Bus', 5, 2021, 4648175080, 1, 1),
('4.1.1.02.05.0001', 'BBNKB-Mobil Bus-Bus', 6, 2021, 3946031663, 1, 1),
('4.1.1.02.06', 'BBNKB-Mobil Barang/Beban-Pick Up', 5, 2021, 100083442415, 1, 1),
('4.1.1.02.06.0001', 'BBNKB-Mobil Barang/Beban-Pick Up', 6, 2021, 64129908262, 1, 1),
('4.1.1.02.07', 'BBNKB-Mobil Barang/Beban-Light Truck', 5, 2021, 2078289445, 1, 1),
('4.1.1.02.07.0001', 'BBNKB-Mobil Barang/Beban-Light Truck', 6, 2021, 1331693917, 1, 1),
('4.1.1.02.08', 'BBNKB-Mobil Barang/Beban-Truck', 5, 2021, 116553075676, 1, 1),
('4.1.1.02.08.0001', 'BBNKB-Mobil Barang/Beban-Truck', 6, 2021, 74683063156, 1, 1),
('4.1.1.02.10', 'BBNKB-Sepeda Motor-Sepeda Motor Roda Dua', 5, 2021, 483709592581, 1, 1),
('4.1.1.02.10.0001', 'BBNKB-Sepeda Motor-Sepeda Motor Roda Dua', 6, 2021, 378092168889, 1, 1),
('4.1.1.02.11', 'BBNKB-Sepeda Motor-Sepeda Motor Roda Tiga', 5, 2021, 818490347, 1, 1),
('4.1.1.02.11.0001', 'BBNKB-Sepeda Motor-Sepeda Motor Roda Tiga', 6, 2021, 639773937, 1, 1),
('4.1.1.02.13', 'BBNKB-Kendaraan Khusus Alat Berat', 5, 2021, 24289838, 1, 1),
('4.1.1.02.13.0001', 'BBNKB-Kendaraan Khusus Alat Berat', 6, 2021, 851458, 1, 1),
('4.1.1.03', 'Pajak Bahan Bakar Kendaraan Bermotor (PBBKB)', 4, 2021, 1036674544484, 1, 1),
('4.1.1.03.01', 'PBBKB-Bahan Bakar Bensin', 5, 2021, 500361673351, 1, 1),
('4.1.1.03.01.0001', 'PBBKB Bahan Bakar Bensin', 6, 2021, 500361673351, 1, 1),
('4.1.1.03.02', 'PBBKB-Bahan Bakar Solar', 5, 2021, 309888447109, 1, 1),
('4.1.1.03.02.0001', 'PBBKB Bahan Bakar Solar', 6, 2021, 309888447109, 1, 1),
('4.1.1.03.04', 'PBBKB-Bahan Bakar Lainnya', 5, 2021, 226424424024, 1, 1),
('4.1.1.03.04.0001', 'PBBKB Bahan Bakar Lainnya', 6, 2021, 226424424024, 1, 1),
('4.1.1.04', 'Pajak Air Permukaan', 4, 2021, 76489854175, 1, 1),
('4.1.1.04.01', 'Pajak Air Permukaan', 5, 2021, 76489854175, 1, 1),
('4.1.1.04.01.0001', 'Pajak Air Permukaan', 6, 2021, 76489854175, 1, 1),
('4.1.1.05', 'Pajak Rokok', 4, 2021, 953171942533, 1, 1),
('4.1.1.05.01', 'Pajak Rokok', 5, 2021, 953171942533, 1, 1),
('4.1.1.05.01.0001', 'Pajak Rokok', 6, 2021, 1060735475689, 1, 1),
('4.1.4.12', 'Pendapatan Denda Pajak Daerah', 4, 2021, 69677525781, 1, 1),
('4.1.4.12.01', 'Pendapatan Denda Pajak Kendaraan Bermotor (PKB)', 5, 2021, 67197481083, 1, 1),
('4.1.4.12.01.0001', 'Pendapatan Denda PKB-Mobil Penumpang- Sedan', 6, 2021, 880457284, 1, 1),
('4.1.4.12.01.0002', 'Pendapatan Denda PKB-Mobil Penumpang- Jeep', 6, 2021, 8091766171, 1, 1),
('4.1.4.12.01.0003', 'Pendapatan Denda PKB-Mobil Penumpang- Minibus', 6, 2021, 30884510721, 1, 1),
('4.1.4.12.01.0004', 'Pendapatan Denda PKB-Mobil Bus-Microbus', 6, 2021, 250753677, 1, 1),
('4.1.4.12.01.0005', 'Pendapatan Denda PKB-Mobil Bus-Bus', 6, 2021, 192560285, 1, 1),
('4.1.4.12.01.0006', 'Pendapatan Denda PKB-Mobil Barang/Beban-Pick Up', 6, 2021, 5268587843, 1, 1),
('4.1.4.12.01.0007', 'Pendapatan Denda PKB-Mobil Barang/Beban-Light Truck', 6, 2021, 109405215, 1, 1),
('4.1.4.12.01.0008', 'Pendapatan Denda PKB-Mobil Barang/Beban-Truck', 6, 2021, 6850281498, 1, 1),
('4.1.4.12.01.0010', 'Pendapatan Denda PKB-Sepeda Motor- Sepeda Motor Roda Dua', 6, 2021, 14631206528, 1, 1),
('4.1.4.12.01.0011', 'Pendapatan Denda PKB-Sepeda Motor- Sepeda Motor Roda Tiga', 6, 2021, 22338923, 1, 1),
('4.1.4.12.01.0013', 'Pendapatan Denda PKB-Kendaraan Khusus Alat Berat/Alat Besar', 6, 2021, 15612938, 1, 1),
('4.1.4.12.02', 'Pendapatan Denda Bea Balik Nama Kendaraan Bermotor (BBNKB)', 5, 2021, 2470044698, 1, 1),
('4.1.4.12.02.0001', 'Pendapatan Denda BBNKB-Mobil Penumpang-Sedan', 6, 2021, 23291525, 1, 1),
('4.1.4.12.02.0002', 'Pendapatan Denda BBNKB-Mobil Penumpang-Jeep', 6, 2021, 195152134, 1, 1),
('4.1.4.12.02.0003', 'Pendapatan Denda BBNKB-Mobil Penumpang-Minibus', 6, 2021, 779202408, 1, 1),
('4.1.4.12.02.0004', 'Pendapatan Denda BBNKB-Mobil Bus- Microbus', 6, 2021, 12482730, 1, 1),
('4.1.4.12.02.0005', 'Pendapatan Denda BBNKB-Mobil Bus-Bus', 6, 2021, 9585814, 1, 1),
('4.1.4.12.02.0006', 'Pendapatan Denda BBNKB-Mobil Barang/Beban-Pick Up', 6, 2021, 206399547, 1, 1),
('4.1.4.12.02.0007', 'Pendapatan Denda BBNKB-Mobil Barang/Beban-Light Truck', 6, 2021, 4286004, 1, 1),
('4.1.4.12.02.0008', 'Pendapatan Denda BBNKB-Mobil Barang/Beban-Truck', 6, 2021, 240364455, 1, 1),
('4.1.4.12.02.0010', 'Pendapatan Denda BBNKB-Sepeda Motor- Sepeda Motor Roda Dua', 6, 2021, 997542037, 1, 1),
('4.1.4.12.02.0011', 'Pendapatan Denda BBNKB-Sepeda Motor- Sepeda Motor Roda Tiga', 6, 2021, 1687952, 1, 1),
('4.1.4.12.02.0013', 'Pendapatan Denda BBNKB-Kendaraan Khusus Alat Berat', 6, 2021, 50092, 1, 1),
('4.1.4.12.04', 'Pendapatan Denda Pajak Air Permukaan', 5, 2021, 10000000, 1, 1),
('4.1.4.12.04.0001', 'Pendapatan Denda Pajak Air Permukaan', 6, 2021, 10000000, 1, 1),
('5.1.1.03.01.0002', 'Belanja Insentif bagi ASN atas Pemungutan Bea Balik Nama Kendaraan Bermotor', 6, 2021, 35717946693, 2, 1),
('5.1.1.03.01.0003', 'Belanja Insentif bagi ASN atas Pemungutan Pajak Bahan Bakar Kendaraan Bermotor', 6, 2021, 20492840587, 2, 1),
('5.1.1.03.01.0004', 'Belanja Insentif bagi ASN atas Pemungutan Pajak Air Permukaan', 6, 2021, 2426329265, 2, 1),
('5.1.1.05', 'Belanja Gaji dan Tunjangan KDH/WKDH', 4, 2021, 573554891, 2, 1),
('5.1.1.05.10', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Pajak Daerah', 5, 2021, 1739271946, 2, 1),
('5.1.1.05.10.0001', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Pajak Kendaraan Bermotor bagi KDH/WKDH', 6, 2021, 641280920, 2, 1),
('5.1.1.05.10.0002', 'Belanja Insentif Pemungutan bagi KDH/WKDH atas Bea Balik Nama Kendaraan Bermotor', 6, 2021, 849753950, 2, 1),
('5.1.1.05.10.0003', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Pajak Bahan Bakar Kendaraan Bermotor', 6, 2021, 402026445, 2, 1),
('5.1.1.05.10.0004', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Pajak Air Permukaan', 6, 2021, 29663065, 2, 1),
('5.1.2.02.13', 'Belanja Jasa Insentif bagi Pegawai Non ASN atas Pemungutan Pajak Daerah', 5, 2021, 13225309174, 2, 1),
('5.1.2.02.13.0001', 'Belanja Jasa Insentif bagi Pegawai Non ASN atas Pemungutan Pajak Kendaraan Bermotor', 6, 2021, 4922100651, 2, 1),
('5.1.2.02.13.0002', 'Belanja Jasa Insentif Pegawai Non ASN atas Pemungutan Bea Balik Nama Kendaraan Bermotor', 6, 2021, 3593184860, 2, 1),
('5.1.2.02.13.0003', 'Belanja Jasa Insentif Pegawai Non ASN atas Pemungutan Pajak Bahan Bakar Kendaraan Bermotor', 6, 2021, 3110023663, 2, 1),
('5.1.2.02.01.0021', 'Belanja Jasa Tenaga Sumber Daya Air', 6, 2021, 17500000, 2, 1),
('5.1.2.02.07.0030', 'Belanja Sewa Alat Peraga Kesenian', 6, 2021, 3500000, 2, 1),
('5.2.3.04.01.0003', 'Belanja Modal Pilar/Tugu/Tanda Lainnya', 6, 2021, 180000000, 2, 1),
('5.1.2.02.04.0122', 'Belanja Sewa Alat Dapur', 6, 2021, 660000, 2, 1),
('5.1.1.05.01', 'Belanja Gaji Pokok KDH/WKDH', 5, 2021, 77112000, 2, 1),
('5.1.1.05.01.0001', 'Belanja Gaji Pokok KDH/WKDH', 6, 2021, 77112000, 2, 1),
('5.1.1.05.02', 'Belanja Tunjangan Keluarga KDH/WKDH', 5, 2021, 9939000, 2, 1),
('5.1.1.05.02.0001', 'Belanja Tunjangan Keluarga KDH/WKDH', 6, 2021, 9939000, 2, 1),
('5.1.1.05.03', 'Belanja Tunjangan Jabatan KDH/WKDH', 5, 2021, 138802000, 2, 1),
('5.1.1.05.03.0001', 'Belanja Tunjangan Jabatan KDH/WKDH', 6, 2021, 138802000, 2, 1),
('5.1.1.05.04', 'Belanja Tunjangan Beras KDH/WKDH', 5, 2021, 6205000, 2, 1),
('5.1.1.05.04.0001', 'Belanja Tunjangan Beras KDH/WKDH', 6, 2021, 6889780, 2, 1),
('5.1.1.05.05', 'Belanja Tunjangan PPh/Tunjangan Khusus KDH/WKDH', 5, 2021, 10588000, 2, 1),
('5.1.1.05.05.0001', 'Belanja Tunjangan PPh/Tunjangan Khusus KDH/WKDH', 6, 2021, 10588000, 2, 1),
('5.1.1.05.06', 'Belanja Pembulatan Gaji KDH/WKDH', 5, 2021, 9891, 2, 1),
('5.1.1.05.06.0001', 'Belanja Pembulatan Gaji KDH/WKDH', 6, 2021, 2098, 2, 1),
('5.1.1.05.07', 'Belanja Iuran Jaminan Kesehatan bagi KDH/WKDH', 5, 2021, 330264000, 2, 1),
('5.1.1.05.07.0001', 'Belanja Iuran Jaminan Kesehatan bagi KDH/WKDH', 6, 2021, 330264000, 2, 1),
('5.1.1.05.08', 'Belanja Iuran Jaminan Kecelakaan Kerja KDH/WKDH', 5, 2021, 159000, 2, 1),
('5.1.1.05.08.0001', 'Belanja Iuran Jaminan Kecelakaan Kerja KDH/WKDH', 6, 2021, 159000, 2, 1),
('5.1.1.05.09', 'Belanja Iuran Jaminan Kematian KDH/WKDH', 5, 2021, 476000, 2, 1),
('5.1.1.05.09.0001', 'Belanja Iuran Jaminan Kematian KDH/WKDH', 6, 2021, 476000, 2, 1),
('5.1.1.06.02', 'Belanja Dana Operasional KDH/WKDH', 5, 2021, 8030737000, 2, 1),
('5.1.1.06.02.0001', 'Belanja Dana Operasional KDH/WKDH', 6, 2021, 9395520381, 2, 1),
('5.1.2.01.01.0059', 'Belanja Pakaian Dinas KDH dan WKDH', 6, 2021, 661000000, 2, 1),
('5.1.2.03.03.0038', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Tinggal-Rumah Negara Golongan I', 6, 2021, 0, 2, 1),
('5.1.2.03.04.0048', 'Belanja Pemeliharaan Bangunan Air- Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pengaman Sungai/Pantai dan Penanggulangan ', 6, 2021, 400000000, 2, 1),
('5.2.2.01.03.0001', 'Belanja Modal Alat Penarik', 6, 2021, 218000000, 2, 1),
('5.2.2.02.01.0002', 'Belanja Modal Kendaraan Bermotor Penumpang', 6, 2021, 4650000000, 2, 1),
('5.2.2.02.02.0002', 'Belanja Modal Kendaraan Tak Bermotor Penumpang', 6, 2021, 100000000, 2, 1),
('5.2.2.07.02.0004', 'Belanja Modal Alat Kesehatan Olahraga', 6, 2021, 265000000, 2, 1),
('5.2.4.03.10', 'Belanja Modal Instalasi Lain', 5, 2021, 200000000, 2, 1),
('5.2.4.03.10.0001', 'Belanja Modal Instalasi Lain', 6, 2021, 400000000, 2, 1),
('5.1.2.03.02.0133', 'Belanja Pemeliharaan Alat Studio, Komunikasi, dan Pemancar-Alat Studio- Peralatan Studio Video dan Film', 6, 2021, 200000000, 2, 1),
('5.1.2.03.04.0083', 'Belanja Pemeliharaan Instalasi-Instalasi Air Kotor-Instalasi Air Kotor Lainnya', 6, 2021, 183282000, 2, 1),
('5.2.2.07.01.0007', 'Belanja Modal Alat Kedokteran Mata', 6, 2021, 967443000, 2, 1),
('5.1.2.03.01', 'Belanja Pemeliharaan Tanah', 5, 2021, 198750000, 2, 1),
('5.1.2.03.01.0023', 'Belanja Pemeliharaan Tanah-Lapangan- Tanah untuk Jalan', 6, 2021, 198750000, 2, 1),
('5.1.2.03.03.0016', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Gedung Perpustakaan', 6, 2021, 196680000, 2, 1),
('5.2.2.01.01.0002', 'Belanja Modal Grader', 6, 2021, 6831000000, 2, 1),
('5.2.2.01.01.0007', 'Belanja Modal Compacting Equipment', 6, 2021, 6495775000, 2, 1),
('5.2.2.01.01.0009', 'Belanja Modal Loader', 6, 2021, 5085300000, 2, 1),
('5.2.2.02.01.0004', 'Belanja Modal Kendaraan Bermotor Beroda Dua', 6, 2021, 104100000, 2, 1),
('5.2.2.08.01.0006', 'Belanja Modal Alat Laboratorium Bahan Bangunan Konstruksi', 6, 2021, 2566846300, 2, 1),
('5.2.2.08.01.0007', 'Belanja Modal Alat Laboratorium Aspal, Cat, dan Kimia', 6, 2021, 117130000, 2, 1),
('5.1.2.02.09.0013', 'Belanja Jasa Konsultansi Berorientasi Layanan-Jasa Konsultansi Manajemen', 6, 2021, 100000000, 2, 1),
('5.1.2.03.04.0025', 'Belanja Pemeliharaan Bangunan Air- Bangunan Air Irigasi-Bangunan Pengambilan Irigasi', 6, 2021, 12213560570, 2, 1),
('5.2.4.02.05', 'Belanja Modal Bangunan Pengembangan Sumber Air dan Air Tanah', 5, 2021, 1854267405, 2, 1),
('5.2.4.02.05.0001', 'Belanja Modal Bangunan Waduk Pengembangan Sumber Air', 6, 2021, 1854267405, 2, 1),
('5.2.2.06.02.0008', 'Belanja Modal Alat Komunikasi Khusus', 6, 2021, 208725000, 2, 1),
('5.2.1.01.03.0008', 'Belanja Modal Tanah untuk Bangunan Air', 6, 2021, 497944158, 2, 1),
('5.2.2.05.02.0005', 'Belanja Modal Alat Dapur', 6, 2021, 100000000, 2, 1),
('5.2.4.03.05', 'Belanja Modal Instalasi Pembangkit Listrik', 5, 2021, 100998750, 2, 1),
('5.2.4.03.05.0009', 'Belanja Modal Instalasi Pembangkit Listrik Tenaga Surya (PLTS)', 6, 2021, 100998750, 2, 1),
('5.1.2.01.01.0071', 'Belanja Pakaian Kerja Laboratorium', 6, 2021, 8000000, 2, 1),
('5.1.2.01.01.0040', 'Belanja Barang untuk Dijual/Diserahkan kepada Pihak Ketiga/Pihak Lain', 6, 2021, 980681250, 2, 1),
('5.2.4.01.02.0013', 'Belanja Modal Jembatan Lainnya', 6, 2021, 20942005, 2, 1),
('4.1.2.02.11.0001', 'Retribusi Penjualan Produksi Hasil Usaha Daerah berupa Bibit atau Benih Tanaman', 6, 2021, 1552500000, 1, 1),
('5.1.2.01.01.0007', 'Belanja Bahan-Barang dalam Proses', 6, 2021, 72800000, 2, 1),
('5.1.5.05.01.0003', 'Belanja Hibah Jasa kepada Badan dan Lembaga yang Bersifat Nirlaba, Sukarela dan Sosial yang Dibentuk Berdasarkan Peraturan Perundang-Undangan', 6, 2021, 0, 2, 1),
('5.2.2.04.01.0005', 'Belanja Modal Alat Laboratorium Pertanian', 6, 2021, 600000000, 2, 1),
('5.2.2.17.01.0026', 'Belanja Modal Unit Peralatan Proses/Produksi Lainnya', 6, 2021, 120000000, 2, 1),
('5.2.4.01.01.0005', 'Belanja Modal Jalan Desa', 6, 2021, 199999200, 2, 1),
('5.1.2.01.01.0070', 'Belanja Pakaian Pelatihan Kerja', 6, 2021, 56000000, 2, 1),
('5.1.2.02.08.0014', 'Belanja Jasa Konsultansi Perencanaan Penataan Ruang-Jasa Perencanaan dan Perancangan Perkotaan', 6, 2021, 90000000, 2, 1),
('4.1.2.01.08.0001', 'Retribusi Penyediaan Peta Dasar (Garis)', 6, 2021, 2000000, 1, 1),
('5.1.2.02.04.0410', 'Belanja Sewa Peralatan Jaringan', 6, 2021, 416058500, 2, 1),
('5.1.2.02.07.0013', 'Belanja Sewa Audio Visual', 6, 2021, 500000000, 2, 1),
('4', 'PENDAPATAN DAERAH', 1, 2021, 38497100, 1, 2),
('4.1', 'PENDAPATAN ASLI DAERAH (PAD)', 2, 2021, 38497100, 1, 2),
('4.1.2', 'Retribusi Daerah', 3, 2021, 38497100, 1, 2),
('4.1.2.02', 'Retribusi Jasa Usaha', 4, 2021, 38497100, 1, 2),
('4.1.2.02.01', 'Retribusi Pemakaian Kekayaan Daerah', 5, 2021, 38497100, 1, 2),
('4.1.2.02.01.0003', 'Retribusi Penyewaan Bangunan', 6, 2021, 38497100, 1, 2),
('5', 'BELANJA DAERAH', 1, 2021, 34362789036, 2, 2),
('5.1', 'BELANJA OPERASI', 2, 2021, 30742381386, 2, 2),
('5.1.1', 'Belanja Pegawai', 3, 2021, 17319088776, 2, 2),
('5.1.1.01', 'Belanja Gaji dan Tunjangan ASN', 4, 2021, 7465558776, 2, 2),
('5.1.1.01.01', 'Belanja Gaji Pokok ASN', 5, 2021, 5103284338, 2, 2),
('5.1.1.01.01.0001', 'Belanja Gaji Pokok PNS', 6, 2021, 5103284338, 2, 2),
('5.1.1.01.02', 'Belanja Tunjangan Keluarga ASN', 5, 2021, 473441000, 2, 2),
('5.1.1.01.02.0001', 'Belanja Tunjangan Keluarga PNS', 6, 2021, 473441000, 2, 2),
('5.1.1.01.03', 'Belanja Tunjangan Jabatan ASN', 5, 2021, 270035000, 2, 2),
('5.1.1.01.03.0001', 'Belanja Tunjangan Jabatan PNS', 6, 2021, 270035000, 2, 2),
('5.1.1.01.04', 'Belanja Tunjangan Fungsional ASN', 5, 2021, 462890000, 2, 2),
('5.1.1.01.04.0001', 'Belanja Tunjangan Fungsional PNS', 6, 2021, 462890000, 2, 2),
('5.1.1.01.05', 'Belanja Tunjangan Fungsional Umum ASN', 5, 2021, 100246000, 2, 2),
('5.1.1.01.05.0001', 'Belanja Tunjangan Fungsional Umum PNS', 6, 2021, 100246000, 2, 2),
('5.1.1.01.06', 'Belanja Tunjangan Beras ASN', 5, 2021, 228927000, 2, 2),
('5.1.1.01.06.0001', 'Belanja Tunjangan Beras PNS', 6, 2021, 228927000, 2, 2),
('5.1.1.01.07', 'Belanja Tunjangan PPh/Tunjangan Khusus ASN', 5, 2021, 65268000, 2, 2),
('5.1.1.01.07.0001', 'Belanja Tunjangan PPh/Tunjangan Khusus PNS', 6, 2021, 65268000, 2, 2),
('5.1.1.01.08', 'Belanja Pembulatan Gaji ASN', 5, 2021, 212438, 2, 2),
('5.1.1.01.08.0001', 'Belanja Pembulatan Gaji PNS', 6, 2021, 212438, 2, 2),
('5.1.1.01.09', 'Belanja Iuran Jaminan Kesehatan ASN', 5, 2021, 718956000, 2, 2),
('5.1.1.01.09.0001', 'Belanja Iuran Jaminan Kesehatan PNS', 6, 2021, 718956000, 2, 2),
('5.1.1.01.10', 'Belanja Iuran Jaminan Kecelakaan Kerja ASN', 5, 2021, 10575000, 2, 2),
('5.1.1.01.10.0001', 'Belanja Iuran Jaminan Kecelakaan Kerja PNS', 6, 2021, 10575000, 2, 2),
('5.1.1.01.11', 'Belanja Iuran Jaminan Kematian ASN', 5, 2021, 31724000, 2, 2),
('5.1.1.01.11.0001', 'Belanja Iuran Jaminan Kematian PNS', 6, 2021, 31724000, 2, 2),
('5.1.1.02', 'Belanja Tambahan Penghasilan ASN', 4, 2021, 9410950000, 2, 2),
('5.1.1.02.01', 'Tambahan Penghasilan berdasarkan Beban Kerja ASN', 5, 2021, 5351393000, 2, 2),
('5.1.1.02.01.0001', 'Tambahan Penghasilan berdasarkan Beban Kerja PNS', 6, 2021, 5351393000, 2, 2),
('5.1.1.03', 'Tambahan Penghasilan berdasarkan Pertimbangan Objektif Lainnya ASN', 4, 2021, 442580000, 2, 2),
('5.1.1.03.03', 'Belanja Tunjangan Profesi Guru (TPG) PNSD', 5, 2021, 642224682960, 2, 2),
('5.1.1.03.03.0001', 'Belanja TPG PNSD', 6, 2021, 642224682960, 2, 2),
('5.1.1.03.04', 'Belanja Tunjangan Khusus Guru (TKG) PNSD', 5, 2021, 20970677800, 2, 2),
('5.1.1.03.04.0001', 'Belanja TKG PNSD', 6, 2021, 20970677800, 2, 2),
('5.1.1.03.05', 'Belanja Tambahan Penghasilan (Tamsil) Guru PNSD', 5, 2021, 3255000000, 2, 2),
('5.1.1.03.05.0001', 'Belanja Tamsil Guru PNSD', 6, 2021, 3255000000, 2, 2),
('5.1.1.03.07', 'Belanja Honorarium', 5, 2021, 442580000, 2, 2),
('5.1.1.03.07.0001', 'Belanja Honorarium Penanggungjawaban Pengelola Keuangan', 6, 2021, 420980000, 2, 2),
('5.1.1.03.07.0002', 'Belanja Honorarium Pengadaan Barang/Jasa', 6, 2021, 21600000, 2, 2),
('5.1.2', 'Belanja Barang dan Jasa', 3, 2021, 13423292610, 2, 2),
('5.1.2.01', 'Belanja Barang', 4, 2021, 3148111376, 2, 2),
('5.1.2.01.01', 'Belanja Barang Pakai Habis', 5, 2021, 3148111376, 2, 2),
('5.1.2.01.01.0001', 'Belanja Bahan-Bahan Bangunan dan Konstruksi', 6, 2021, 354768189, 2, 2),
('5.1.2.01.01.0004', 'Belanja Bahan-Bahan Bakar dan Pelumas', 6, 2021, 184821500, 2, 2),
('5.1.2.01.01.0013', 'Belanja Suku Cadang-Suku Cadang Alat Angkutan', 6, 2021, 34668000, 2, 2),
('5.1.2.01.01.0015', 'Belanja Suku Cadang-Suku Cadang Alat Kedokteran', 6, 2021, 6000000, 2, 2),
('5.1.2.01.01.0024', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Alat Tulis Kantor', 6, 2021, 778006820, 2, 2),
('5.1.2.01.01.0025', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Kertas dan Cover', 6, 2021, 6276200, 2, 2),
('5.1.2.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Bahan Cetak', 6, 2021, 180908100, 2, 2),
('5.1.2.01.01.0027', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Benda Pos', 6, 2021, 5220000, 2, 2),
('5.1.2.01.01.0029', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Bahan Komputer', 6, 2021, 24867950, 2, 2),
('5.1.2.01.01.0030', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Perabot Kantor', 6, 2021, 366793513, 2, 2),
('5.1.2.01.01.0031', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Alat Listrik', 6, 2021, 50567604, 2, 2),
('5.1.2.01.01.0032', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Perlengkapan Dinas', 6, 2021, 30924000, 2, 2),
('5.1.2.01.01.0035', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Suvenir/Cendera Mata', 6, 2021, 4500000, 2, 2),
('5.1.2.01.01.0038', 'Belanja Obat-Obatan-Obat-Obatan Lainnya', 6, 2021, 3850000, 2, 2),
('5.1.2.01.01.0052', 'Belanja Makanan dan Minuman Rapat', 6, 2021, 471212000, 2, 2),
('5.1.2.01.01.0053', 'Belanja Makanan dan Minuman Jamuan Tamu', 6, 2021, 27997500, 2, 2),
('5.1.2.01.01.0055', 'Belanja Makanan dan Minuman pada Fasilitas Pelayanan Urusan Pendidikan', 6, 2021, 486000000, 2, 2),
('5.1.2.01.01.0058', 'Belanja Makanan dan Minuman Aktivitas Lapangan', 6, 2021, 15300000, 2, 2),
('5.1.2.01.01.0075', 'Belanja Pakaian Batik Tradisional', 6, 2021, 1500000, 2, 2),
('5.1.2.02', 'Belanja Jasa', 4, 2021, 5743998234, 2, 2),
('5.1.2.02.01', 'Belanja Jasa Kantor', 5, 2021, 5285883434, 2, 2),
('5.1.2.02.01.0003', 'Honorarium Narasumber atau Pembahas, Moderator, Pembawa Acara, dan Panitia', 6, 2021, 419200000, 2, 2),
('5.1.2.02.01.0004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 6, 2021, 266340000, 2, 2),
('5.1.2.02.01.0009', 'Honorarium Penyelenggara Ujian', 6, 2021, 22640000, 2, 2),
('5.1.2.02.01.0013', 'Belanja Jasa Tenaga Pendidikan', 6, 2021, 198540000000, 2, 2),
('5.1.2.02.01.0028', 'Belanja Jasa Tenaga Pelayanan Umum', 6, 2021, 1136458797, 2, 2),
('5.1.2.02.01.0029', 'Belanja Jasa Tenaga Ahli', 6, 2021, 27840000, 2, 2),
('5.1.2.02.01.0030', 'Belanja Jasa Tenaga Kebersihan', 6, 2021, 542500000, 2, 2),
('5.1.2.02.01.0031', 'Belanja Jasa Tenaga Keamanan', 6, 2021, 7800000, 2, 2),
('5.1.2.02.01.0038', 'Belanja Jasa Tata Rias', 6, 2021, 80000000, 2, 2),
('5.1.2.02.01.0039', 'Belanja Jasa Tenaga Informasi dan Teknologi', 6, 2021, 114000000, 2, 2),
('5.1.2.02.01.0060', 'Belanja Tagihan Air', 6, 2021, 300000000, 2, 2),
('5.1.2.02.01.0061', 'Belanja Tagihan Listrik', 6, 2021, 574000000, 2, 2),
('5.1.2.02.01.0062', 'Belanja Langganan Jurnal/Surat Kabar/Majalah', 6, 2021, 40824000, 2, 2),
('5.1.2.02.01.0063', 'Belanja Kawat/Faksimili/Internet/TV Berlangganan', 6, 2021, 412425000, 2, 2),
('5.1.2.02.01.0064', 'Belanja Paket/Pengiriman', 6, 2021, 3535000, 2, 2),
('5.1.2.02.04', 'Belanja Sewa Peralatan dan Mesin', 5, 2021, 145852800, 2, 2),
('5.1.2.02.04.0036', 'Belanja Sewa Kendaraan Bermotor Penumpang', 6, 2021, 0, 2, 2),
('5.1.2.02.04.0123', 'Belanja Sewa Alat Rumah Tangga Lainnya (Home Use)', 6, 2021, 6921000, 2, 2),
('5.1.2.02.04.0132', 'Belanja Sewa Peralatan Studio Audio', 6, 2021, 260000000, 2, 2),
('5.1.2.02.04.0406', 'Belanja Sewa Komputer Unit Lainnya', 6, 2021, 9030000, 2, 2),
('5.1.2.02.05', 'Belanja Sewa Gedung dan Bangunan', 5, 2021, 0, 2, 2),
('5.1.2.02.05.0001', 'Belanja Sewa Bangunan Gedung Kantor', 6, 2021, 0, 2, 2),
('5.1.2.02.05.0009', 'Belanja Sewa Bangunan Gedung Tempat Pertemuan', 6, 2021, 1034250000, 2, 2),
('5.1.2.02.05.0032', 'Belanja Sewa Bangunan Fasilitas Umum', 6, 2021, 115000000, 2, 2),
('5.1.2.02.08', 'Belanja Jasa Konsultansi Konstruksi', 5, 2021, 195710000, 2, 2),
('5.1.2.02.08.0005', 'Belanja Jasa Konsultansi Perencanaan Arsitektur-Jasa Arsitektur Lainnya', 6, 2021, 20000000, 2, 2),
('5.1.2.02.08.0008', 'Belanja Jasa Konsultansi Perencanaan Rekayasa-Jasa Desain Rekayasa untuk Pekerjaan Teknik Sipil Air', 6, 2021, 94000000, 2, 2),
('5.1.2.02.08.0012', 'Belanja Jasa Konsultansi Perencanaan Rekayasa-Jasa Nasihat dan Konsultansi Jasa Rekayasa Konstruksi', 6, 2021, 21000000, 2, 2),
('5.1.2.02.08.0019', 'Belanja Jasa Konsultansi Pengawasan Rekayasa-Jasa Pengawas Pekerjaan Konstruksi Bangunan Gedung', 6, 2021, 120000000, 2, 2),
('5.1.2.02.12', 'Belanja Kursus/Pelatihan, Sosialisasi, Bimbingan Teknis serta Pendidikan dan Pelatihan', 5, 2021, 90852000, 2, 2),
('5.1.2.02.12.0003', 'Belanja Bimbingan Teknis', 6, 2021, 90852000, 2, 2),
('5.1.2.03', 'Belanja Pemeliharaan', 4, 2021, 2169850000, 2, 2),
('5.1.2.03.02', 'Belanja Pemeliharaan Peralatan dan Mesin', 5, 2021, 370675000, 2, 2),
('5.1.2.03.02.0035', 'Belanja Pemeliharaan Alat Angkutan-Alat Angkutan Darat Bermotor-Kendaraan Dinas Bermotor Perorangan', 6, 2021, 141275000, 2, 2),
('5.1.2.03.02.0117', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Kantor-Alat Kantor Lainnya', 6, 2021, 55250000, 2, 2),
('5.1.2.03.02.0121', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Rumah Tangga-Alat Pendingin', 6, 2021, 48300000, 2, 2),
('5.1.2.03.02.0123', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Rumah Tangga-Alat Rumah Tangga Lainnya (Home Use)', 6, 2021, 15900000, 2, 2),
('5.1.2.03.02.0132', 'Belanja Pemeliharaan Alat Studio, Komunikasi, dan Pemancar-Alat Studio- Peralatan Studio Audio', 6, 2021, 4500000, 2, 2),
('5.1.2.03.02.0181', 'Belanja Pemeliharaan Alat Studio, Komunikasi, dan Pemancar-Peralatan Pemancar-Peralatan Pemancar dan Penerima VHF', 6, 2021, 900000, 2, 2),
('5.1.2.03.02.0404', 'Belanja Pemeliharaan Komputer-Komputer Unit-Komputer Jaringan', 6, 2021, 27000000, 2, 2),
('5.1.2.03.02.0406', 'Belanja Pemeliharaan Komputer-Komputer Unit-Komputer Unit Lainnya', 6, 2021, 40650000, 2, 2),
('5.1.2.03.02.0411', 'Belanja Pemeliharaan Komputer-Peralatan Komputer-Peralatan Komputer Lainnya', 6, 2021, 0, 2, 2),
('5.1.2.04', 'Belana Perjalanan Dinas', 4, 2021, 2361333000, 2, 2),
('5.1.2.04.01', 'Belanja Perjalanan Dinas Dalam Negeri', 5, 2021, 2361333000, 2, 2),
('5.1.2.04.01.0001', 'Belanja Perjalanan Dinas Biasa', 6, 2021, 1626229000, 2, 2),
('5.1.2.04.01.0003', 'Belanja Perjalanan Dinas Dalam Kota', 6, 2021, 642162000, 2, 2),
('5.1.2.04.01.0005', 'Belanja Perjalanan Dinas Paket Meeting Luar Kota', 6, 2021, 64822000, 2, 2),
('5.1.2.05', 'Belanja Uang dan/atau Jasa untuk Diberikan kepada Pihak Ketiga/Pihak Lain/Masyarakat', 4, 2021, 70000000, 2, 2),
('5.1.2.05.01', 'Belanja Uang yang Diberikan kepada Pihak Ketiga/Pihak Lain/Masyarakat', 5, 2021, 70000000, 2, 2),
('5.1.2.05.01.0001', 'Belanja Hadiah yang Bersifat Perlombaan', 6, 2021, 70000000, 2, 2),
('5.1.2.05.01.0003', 'Belanja Beasiswa', 6, 2021, 160443360000, 2, 2),
('5.1.2.88', 'Belanja Barang dan Jasa BOS', 4, 2021, 456815533360, 2, 2),
('5.1.2.88.88', 'Belanja Barang dan Jasa BOS', 5, 2021, 456815533360, 2, 2),
('5.1.2.88.88.8888', 'Belanja Barang dan Jasa BOS', 6, 2021, 456815533360, 2, 2),
('5.1.5', 'Belanja Hibah', 3, 2021, 0, 2, 2),
('5.1.5.06', 'Belanja Hibah Dana BOS', 4, 2021, 2783674794500, 2, 2),
('5.1.5.06.01', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdikdas Negeri', 5, 2021, 476553000000, 2, 2),
('5.1.5.06.01.0001', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdikdas Negeri', 6, 2021, 476553000000, 2, 2),
('5.1.5.06.02', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdikdas Swasta', 5, 2021, 1660224000000, 2, 2),
('5.1.5.06.02.0001', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdikdas Swasta', 6, 2021, 1660224000000, 2, 2),
('5.1.5.06.03', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdikmen Swasta', 5, 2021, 638412114500, 2, 2),
('5.1.5.06.03.0001', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdikmen Swasta', 6, 2021, 638412114500, 2, 2),
('5.1.5.06.04', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdiksus Swasta', 5, 2021, 8485680000, 2, 2),
('5.1.5.06.04.0001', 'Belanja Hibah Uang Dana BOS yang Diterima oleh Satdiksus Swasta', 6, 2021, 8485680000, 2, 2),
('5.2', 'BELANJA MODAL', 2, 2021, 3620407650, 2, 2),
('5.2.1', 'Belanja Modal Tanah', 3, 2021, 3196000000, 2, 2),
('5.2.1.01', 'Belanja Modal Tanah', 4, 2021, 3196000000, 2, 2),
('5.2.1.01.01', 'Belanja Modal Tanah Persil', 5, 2021, 2000000000, 2, 2),
('5.2.1.01.01.0004', 'Belanja Modal Tanah untuk Bangunan Tempat Kerja', 6, 2021, 2000000000, 2, 2),
('5.2.2', 'Belanja Modal Peralatan dan Mesin', 3, 2021, 1969004850, 2, 2),
('5.2.2.05', 'Belanja Modal Alat Kantor dan Rumah Tangga', 4, 2021, 883710650, 2, 2),
('5.2.2.05.01', 'Belanja Modal Alat Kantor', 5, 2021, 331322750, 2, 2),
('5.2.2.05.01.0004', 'Belanja Modal Alat Penyimpan Perlengkapan Kantor', 6, 2021, 114050000, 2, 2),
('5.2.2.05.01.0005', 'Belanja Modal Alat Kantor Lainnya', 6, 2021, 217272750, 2, 2);
INSERT INTO `data_uraian_kegiatan_pemko` (`kode_rekening`, `uraian`, `level`, `tahun`, `anggaran`, `jenis`, `st_anggaran`) VALUES
('5.2.2.05.02', 'Belanja Modal Alat Rumah Tangga', 5, 2021, 529947500, 2, 2),
('5.2.2.05.02.0001', 'Belanja Modal Mebel', 6, 2021, 190750000, 2, 2),
('5.2.2.05.02.0004', 'Belanja Modal Alat Pendingin', 6, 2021, 154400000, 2, 2),
('5.2.2.05.02.0006', 'Belanja Modal Alat Rumah Tangga Lainnya (Home Use)', 6, 2021, 184797500, 2, 2),
('5.2.2.05.03', 'Belanja Modal Meja dan Kursi Kerja/Rapat Pejabat', 5, 2021, 22440400, 2, 2),
('5.2.2.05.03.0001', 'Belanja Modal Meja Kerja Pejabat', 6, 2021, 15100000, 2, 2),
('5.2.2.05.03.0003', 'Belanja Modal Kursi Kerja Pejabat', 6, 2021, 7340400, 2, 2),
('5.2.2.06', 'Belanja Modal Alat Studio, Komunikasi, dan Pemancar', 4, 2021, 635105000, 2, 2),
('5.2.2.06.01', 'Belanja Modal Alat Studio', 5, 2021, 630605000, 2, 2),
('5.2.2.06.01.0002', 'Belanja Modal Peralatan Studio Video dan Film', 6, 2021, 595050000, 2, 2),
('5.2.2.07', 'Belanja Modal Alat Kedokteran dan Kesehatan', 4, 2021, 2500000, 2, 2),
('5.2.2.07.02', 'Belanja Modal Alat Kesehatan Umum', 5, 2021, 2500000, 2, 2),
('5.2.2.07.02.0005', 'Belanja Modal Alat Kesehatan Umum Lainnya', 6, 2021, 2500000, 2, 2),
('5.2.2.08', 'Belanja Modal Alat Laboratorium', 4, 2021, 6000000, 2, 2),
('5.2.2.08.01', 'Belanja Modal Unit Alat Laboratorium', 5, 2021, 6000000, 2, 2),
('5.2.2.08.01.0056', 'Belanja Modal Alat Laboratorium Lain', 6, 2021, 1127101000, 2, 2),
('5.2.2.08.03', 'Belanja Modal Alat Peraga Praktek Sekolah', 5, 2021, 149253936986, 2, 2),
('5.2.2.08.03.0006', 'Belanja Modal Alat Peraga Praktek Sekolah Bidang Studi:IPA Atas', 6, 2021, 3510000000, 2, 2),
('5.2.2.08.03.0013', 'Belanja Modal Alat Peraga Luar Biasa (Tuna Netra, Terapi Fisik, Tuna Daksa, dan Tuna Rungu)', 6, 2021, 593050000, 2, 2),
('5.2.2.08.03.0014', 'Belanja Modal Alat Peraga Kejuruan', 6, 2021, 65844339486, 2, 2),
('5.2.2.08.03.0016', 'Belanja Modal Alat Peraga Praktik Sekolah Lainnya', 6, 2021, 79306547500, 2, 2),
('5.2.2.10', 'Belanja Modal Komputer', 4, 2021, 447689200, 2, 2),
('5.2.2.10.01', 'Belanja Modal Komputer Unit', 5, 2021, 282930000, 2, 2),
('5.2.2.10.01.0001', 'Belanja Modal Komputer Jaringan', 6, 2021, 0, 2, 2),
('5.2.2.10.01.0003', 'Belanja Modal Komputer Unit Lainnya', 6, 2021, 151030000, 2, 2),
('5.2.2.10.02', 'Belanja Modal Peralatan Komputer', 5, 2021, 164759200, 2, 2),
('5.2.2.10.02.0003', 'Belanja Modal Peralatan Personal Computer', 6, 2021, 547500000, 2, 2),
('5.2.2.10.02.0005', 'Belanja Modal Peralatan Komputer Lainnya', 6, 2021, 164759200, 2, 2),
('5.2.2.13', 'Belanja Modal Alat Produksi, Pengolahan, dan Pemurnian', 4, 2021, 181795540, 2, 2),
('5.2.2.13.01', 'Belanja Modal Sumur', 5, 2021, 181795540, 2, 2),
('5.2.2.13.01.0002', 'Belanja Modal Sumur Pemboran', 6, 2021, 181795540, 2, 2),
('5.2.3', 'Belanja Modal Gedung dan Bangunan', 3, 2021, 1601402800, 2, 2),
('5.2.3.01', 'Belanja Modal Bangunan Gedung', 4, 2021, 1482550000, 2, 2),
('5.2.3.01.01', 'Belanja Modal Bangunan Gedung Tempat Kerja', 5, 2021, 1482550000, 2, 2),
('5.2.3.01.01.0001', 'Belanja Modal Bangunan Gedung Kantor', 6, 2021, 1482550000, 2, 2),
('5.2.3.01.01.0010', 'Belanja Modal Bangunan Gedung Tempat Pendidikan', 6, 2021, 0, 2, 2),
('5.2.3.01.01.0030', 'Belanja Modal Bangunan Gedung Tempat Kerja Lainnya', 6, 2021, 0, 2, 2),
('5.2.5', 'Belanja Modal Aset Tetap Lainnya', 3, 2021, 50000000, 2, 2),
('5.2.5.01', 'Belanja Modal Bahan Perpustakaan', 4, 2021, 18320610, 2, 2),
('5.2.5.01.01', 'Belanja Modal Bahan Perpustakaan Tercetak', 5, 2021, 18320610, 2, 2),
('5.2.5.01.01.0001', 'Belanja Modal Buku Umum', 6, 2021, 18320610, 2, 2),
('5.2.5.01.02', 'Belanja Modal Bahan Perpustakaan Terekam dan Bentuk Mikro', 5, 2021, 4428468000, 2, 2),
('5.2.5.01.02.0001', 'Belanja Modal Audio Visual', 6, 2021, 4428468000, 2, 2),
('5.2.5.01.07', 'Belanja Modal Tarscalt', 5, 2021, 87519182654, 2, 2),
('5.2.5.01.07.0001', 'Belanja Modal Tarscalt', 6, 2021, 87519182654, 2, 2),
('5.2.5.05', 'Belanja Modal Tanaman', 4, 2021, 200000000, 2, 2),
('5.2.5.05.01', 'Belanja Modal Tanaman', 5, 2021, 200000000, 2, 2),
('5.2.5.05.01.0001', 'Belanja Modal Tanaman', 6, 2021, 0, 2, 2),
('4.1.2.01', 'Retribusi Jasa Umum', 4, 2021, 102000000, 1, 2),
('4.1.2.01.01', 'Retribusi Pelayanan Kesehatan', 5, 2021, 9900000000, 1, 2),
('4.1.2.01.01.0006', 'Retribusi Pelayanan Kesehatan di Tempat Pelayanan Kesehatan Lainnya yang Sejenis', 6, 2021, 9900000000, 1, 2),
('4.1.2.02.06', 'Retribusi Tempat Penginapan/ Pesanggrahan/Vila', 5, 2021, 1650000000, 1, 2),
('4.1.2.02.06.0001', 'Retribusi Pelayanan Tempat Penginapan/Pesanggrahan/Vila', 6, 2021, 2200000000, 1, 2),
('4.1.4', 'Lain-lain PAD yang Sah', 3, 2021, 39140600000, 1, 2),
('4.1.4.16', 'Pendapatan BLUD', 4, 2021, 78250000000, 1, 2),
('4.1.4.16.01', 'Pendapatan BLUD', 5, 2021, 78250000000, 1, 2),
('4.1.4.16.01.0001', 'Pendapatan BLUD', 6, 2021, 78250000000, 1, 2),
('5.1.1.02.04', 'Tambahan Penghasilan berdasarkan Kelangkaan Profesi ASN', 5, 2021, 4059557000, 2, 2),
('5.1.1.02.04.0001', 'Tambahan Penghasilan berdasarkan Kelangkaan Profesi PNS', 6, 2021, 4059557000, 2, 2),
('5.1.1.03.02', 'Belanja bagi ASN atas Insentif Pemungutan Retribusi Daerah', 5, 2021, 0, 2, 2),
('5.1.1.03.02.0001', 'Belanja Insentif bagi ASN atas Pemungutan Retribusi Jasa Umum-Pelayanan Kesehatan', 6, 2021, 0, 2, 2),
('5.1.2.01.01.0002', 'Belanja Bahan-Bahan Kimia', 6, 2021, 25680000, 2, 2),
('5.1.2.01.01.0009', 'Belanja Bahan-Isi Tabung Pemadam Kebakaran', 6, 2021, 5070000, 2, 2),
('5.1.2.01.01.0010', 'Belanja Bahan-Isi Tabung Gas', 6, 2021, 4500000, 2, 2),
('5.1.2.01.01.0012', 'Belanja Bahan-Bahan Lainnya', 6, 2021, 1200468750, 2, 2),
('5.1.2.01.01.0016', 'Belanja Suku Cadang-Suku Cadang Alat Laboratorium', 6, 2021, 65021000, 2, 2),
('5.1.2.01.01.0034', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Perlengkapan Pendukung Olahraga', 6, 2021, 0, 2, 2),
('5.1.2.01.01.0037', 'Belanja Obat-Obatan-Obat', 6, 2021, 549000, 2, 2),
('5.1.2.01.01.0039', 'Belanja Barang untuk Dijual/Diserahkan kepada Masyarakat', 6, 2021, 11549830747, 2, 2),
('5.1.2.01.01.0043', 'Belanja Natura dan Pakan-Natura', 6, 2021, 96740000, 2, 2),
('5.1.2.01.01.0054', 'Belanja Penambah Daya Tahan Tubuh', 6, 2021, 21850000, 2, 2),
('5.1.2.01.01.0056', 'Belanja Makanan dan Minuman pada Fasilitas Pelayanan Urusan Kesehatan', 6, 2021, 3520000, 2, 2),
('5.1.2.02.01.0007', 'Honorarium Rohaniwan', 6, 2021, 9600000, 2, 2),
('5.1.2.02.01.0008', 'Honorarium Tim Penyusunan Jurnal, Buletin, Majalah, Pengelola Teknologi Informasi dan Pengelola Website', 6, 2021, 69200000, 2, 2),
('5.1.2.02.01.0014', 'Belanja Jasa Tenaga Kesehatan', 6, 2021, 2500000, 2, 2),
('5.1.2.02.01.0015', 'Belanja Jasa Tenaga Laboratorium', 6, 2021, 33000000, 2, 2),
('5.1.2.02.01.0026', 'Belanja Jasa Tenaga Administrasi', 6, 2021, 1236375501, 2, 2),
('5.1.2.02.01.0027', 'Belanja Jasa Tenaga Operator Komputer', 6, 2021, 810000000, 2, 2),
('5.1.2.02.01.0033', 'Belanja Jasa Tenaga Supir', 6, 2021, 90000000, 2, 2),
('5.1.2.02.01.0034', 'Belanja Jasa Tenaga Juru Masak', 6, 2021, 655500000, 2, 2),
('5.1.2.02.01.0049', 'Belanja Jasa Pencucian Pakaian, Alat Kesenian dan Kebudayaan, serta Alat Rumah Tangga', 6, 2021, 41876200, 2, 2),
('5.1.2.02.01.0050', 'Belanja Jasa Kalibrasi', 6, 2021, 140000000, 2, 2),
('5.1.2.02.01.0051', 'Belanja Jasa Pengolahan Sampah', 6, 2021, 16200000, 2, 2),
('5.1.2.02.01.0055', 'Belanja Jasa Iklan/Reklame, Film, dan Pemotretan', 6, 2021, 20000000, 2, 2),
('5.1.2.02.01.0059', 'Belanja Tagihan Telepon', 6, 2021, 20000000, 2, 2),
('5.1.2.02.01.0067', 'Belanja Pembayaran Pajak, Bea, dan Perizinan', 6, 2021, 32408936, 2, 2),
('5.1.2.02.01.0071', 'Belanja Lembur', 6, 2021, 0, 2, 2),
('5.1.2.02.01.0073', 'Belanja Medical Check Up', 6, 2021, 50000000, 2, 2),
('5.1.2.02.02', 'Belanja Iuran Jaminan/Asuransi', 5, 2021, 16200000, 2, 2),
('5.1.2.02.02.0002', 'Belanja Kontribusi Jaminan Kesehatan bagi PBI', 6, 2021, 119288962800, 2, 2),
('5.1.2.02.02.0003', 'Belanja Iuran Jaminan Kesehatan bagi Peserta PBPU dan BP Kelas 3', 6, 2021, 0, 2, 2),
('5.1.2.02.03', 'Belanja Sewa Tanah', 5, 2021, 0, 2, 2),
('5.1.2.02.03.0004', 'Belanja Sewa Tanah untuk Bangunan Tempat Kerja', 6, 2021, 25000000, 2, 2),
('5.1.2.02.04.0034', 'Belanja Sewa Alat Bantu Lainnya', 6, 2021, 19301800, 2, 2),
('5.1.2.02.04.0035', 'Belanja Sewa Kendaraan Dinas Bermotor Perorangan', 6, 2021, 0, 2, 2),
('5.1.2.02.04.0118', 'Belanja Sewa Mebel', 6, 2021, 8000000, 2, 2),
('5.1.2.02.04.0201', 'Belanja Sewa Alat Pengatur Telekomunikasi', 6, 2021, 9100000, 2, 2),
('5.1.2.02.04.0355', 'Belanja Sewa Peralatan Umum', 6, 2021, 0, 2, 2),
('5.1.2.02.04.0416', 'Belanja Sewa Elektronik/Electric', 6, 2021, 21600000, 2, 2),
('5.1.2.02.05.0036', 'Belanja Sewa Taman', 6, 2021, 182500000, 2, 2),
('5.1.2.02.05.0043', 'Belanja Sewa Hotel', 6, 2021, 0, 2, 2),
('5.1.2.02.08.0028', 'Belanja Jasa Konsultansi Spesialis-Jasa Pengujian dan Analisa Komposisi dan Tingkat Kemurnian', 6, 2021, 54210000, 2, 2),
('5.1.2.02.09', 'Belanja Jasa Konsultansi Non Konstruksi', 5, 2021, 2040000000, 2, 2),
('5.1.2.02.09.0008', 'Belanja Jasa Konsultansi Berorientasi Bidang-Kesehatan', 6, 2021, 50000000, 2, 2),
('5.1.2.02.11', 'Belanja Beasiswa Pendidikan PNS', 5, 2021, 55000000, 2, 2),
('5.1.2.02.11.0002', 'Belanja Beasiswa Tugas Belajar S2', 6, 2021, 55000000, 2, 2),
('5.1.2.02.12.0001', 'Belanja Kursus Singkat/Pelatihan', 6, 2021, 0, 2, 2),
('5.1.2.03.02.0022', 'Belanja Pemeliharaan Alat Besar-Alat Bantu- Electric Generating Set', 6, 2021, 40500000, 2, 2),
('5.1.2.03.02.0038', 'Belanja Pemeliharaan Alat Angkutan-Alat Angkutan Darat Bermotor-Kendaraan Bermotor Beroda Dua', 6, 2021, 9000000, 2, 2),
('5.1.2.03.02.0118', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Rumah Tangga-Mebel', 6, 2021, 1750000, 2, 2),
('5.1.2.03.02.0138', 'Belanja Pemeliharaan Alat Studio, Komunikasi, dan Pemancar-Alat Komunikasi- Alat Komunikasi Telephone', 6, 2021, 0, 2, 2),
('5.1.2.03.02.0237', 'Belanja Pemeliharaan Alat Kedokteran dan Kesehatan-Alat Kesehatan Umum-Alat Kesehatan Umum Lainnya', 6, 2021, 50000000, 2, 2),
('5.1.2.03.02.0293', 'Belanja Pemeliharaan Alat Laboratorium-Unit Alat Laboratorium-Alat Laboratorium Lain', 6, 2021, 35920000, 2, 2),
('5.1.2.03.02.0405', 'Belanja Pemeliharaan Komputer-Komputer Unit-Personal Computer', 6, 2021, 4000000, 2, 2),
('5.1.2.03.02.0410', 'Belanja Pemeliharaan Komputer-Peralatan Komputer-Peralatan Jaringan', 6, 2021, 35800000, 2, 2),
('5.1.2.03.03', 'Belanja Pemeliharaan Gedung dan Bangunan', 5, 2021, 1799175000, 2, 2),
('5.1.2.03.03.0001', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Gedung Kantor', 6, 2021, 1240425000, 2, 2),
('5.1.2.03.03.0006', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Kesehatan', 6, 2021, 3684605000, 2, 2),
('5.1.2.03.03.0036', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Taman', 6, 2021, 26000000, 2, 2),
('5.1.2.03.04', 'Belanja Pemeliharaan Jalan, Jaringan, dan Irigasi', 5, 2021, 200000000, 2, 2),
('5.1.2.03.04.0083', 'Belanja Pemeliharaan Instalasi-Instalasi Air Kotor-Instalasi Air Kotor Lainnya', 6, 2021, 183282000, 2, 2),
('5.1.2.03.04.0126', 'Belanja Pemeliharaan Jaringan-Jaringan Listrik-Jaringan Listrik Lainnya', 6, 2021, 16200000, 2, 2),
('5.1.2.04.01.0004', 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota', 6, 2021, 28120000, 2, 2),
('5.1.5.05', 'Belanja Hibah kepada Badan, Lembaga, Organisasi Kemasyarakatan yang Berbadan Hukum Indonesia', 4, 2021, 0, 2, 2),
('5.1.5.05.03', 'Belanja Hibah kepada Badan dan Lembaga Nirlaba, Sukarela Bersifat Sosial Kemasyarakatan', 5, 2021, 389757033473, 2, 2),
('5.1.5.05.03.0001', 'Belanja Hibah Uang kepada Badan dan Lembaga Nirlaba, Sukarela Bersifat Sosial Kemasyarakatan', 6, 2021, 389607033473, 2, 2),
('5.2.2.01', 'Belanja Modal Alat Besar', 4, 2021, 0, 2, 2),
('5.2.2.01.01', 'Belanja Modal Alat Besar Darat', 5, 2021, 0, 2, 2),
('5.2.2.01.01.0011', 'Belanja Modal Mesin Proses', 6, 2021, 0, 2, 2),
('5.2.2.01.03', 'Belanja Modal Alat Bantu', 5, 2021, 0, 2, 2),
('5.2.2.01.03.0004', 'Belanja Modal Electric Generating Set', 6, 2021, 0, 2, 2),
('5.2.2.01.03.0005', 'Belanja Modal Pompa', 6, 2021, 103975000, 2, 2),
('5.2.2.03', 'Belanja Modal Alat Bengkel dan Alat Ukur', 4, 2021, 0, 2, 2),
('5.2.2.03.03', 'Belanja Modal Alat Ukur', 5, 2021, 0, 2, 2),
('5.2.2.03.03.0001', 'Belanja Modal Alat Ukur Universal', 6, 2021, 13500000, 2, 2),
('5.2.2.03.03.0021', 'Belanja Modal Alat Ukur Lainnya', 6, 2021, 2000000, 2, 2),
('5.2.2.06.01.0006', 'Belanja Modal Alat Studio Lainnya', 6, 2021, 12830000, 2, 2),
('5.2.2.06.02', 'Belanja Modal Alat Komunikasi', 5, 2021, 0, 2, 2),
('5.2.2.06.02.0001', 'Belanja Modal Alat Komunikasi Telephone', 6, 2021, 0, 2, 2),
('5.2.2.07.01', 'Belanja Modal Alat Kedokteran', 5, 2021, 0, 2, 2),
('5.2.2.07.01.0007', 'Belanja Modal Alat Kedokteran Mata', 6, 2021, 967443000, 2, 2),
('5.2.2.07.01.0029', 'Belanja Modal Alat Kedokteran Lainnya', 6, 2021, 0, 2, 2),
('5.2.2.08.01.0013', 'Belanja Modal Alat Laboratorium Kimia', 6, 2021, 1780492000, 2, 2),
('5.2.2.10.01.0002', 'Belanja Modal Personal Computer', 6, 2021, 131900000, 2, 2),
('5.2.2.10.02.0004', 'Belanja Modal Peralatan Jaringan', 6, 2021, 3000000, 2, 2),
('5.2.3.01.01.0036', 'Belanja Modal Taman', 6, 2021, 60000000, 2, 2),
('5.2.5.08', 'Belanja Modal Aset Tidak Berwujud', 4, 2021, 50000000, 2, 2),
('5.2.5.08.01', 'Belanja Modal Aset Tidak Berwujud', 5, 2021, 50000000, 2, 2),
('5.2.5.08.01.0005', 'Belanja Modal Software', 6, 2021, 50000000, 2, 2),
('5.1.1.03.08', 'Belanja Jasa Pengelolaan BMD', 5, 2021, 36600000, 2, 2),
('5.1.1.03.08.0002', 'Belanja Jasa Pengelolaan BMD yang Tidak Menghasilkan Pendapatan', 6, 2021, 36600000, 2, 2),
('5.1.2.01.01.0008', 'Belanja Bahan-Bahan/Bibit Tanaman', 6, 2021, 0, 2, 2),
('5.1.2.01.01.0036', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Alat/Bahan untuk Kegiatan Kantor Lainnya', 6, 2021, 240000, 2, 2),
('5.1.2.02.01.0035', 'Belanja Jasa Tenaga Teknisi Mekanik dan Listrik', 6, 2021, 3000000, 2, 2),
('5.1.2.02.01.0048', 'Belanja Jasa Kontribusi Asosiasi', 6, 2021, 150000000, 2, 2),
('5.1.2.02.02.0006', 'Belanja Iuran Jaminan Kecelakaan Kerja bagi Non ASN', 6, 2021, 0, 2, 2),
('5.1.2.03.01', 'Belanja Pemeliharaan Tanah', 5, 2021, 198750000, 2, 2),
('5.1.2.03.01.0023', 'Belanja Pemeliharaan Tanah-Lapangan- Tanah untuk Jalan', 6, 2021, 198750000, 2, 2),
('5.1.2.03.02.0103', 'Belanja Pemeliharaan Alat Pertanian-Alat Pengolahan-Alat Pengolahan Tanah dan Tanaman', 6, 2021, 0, 2, 2),
('5.1.2.03.02.0409', 'Belanja Pemeliharaan Komputer-Peralatan Komputer-Peralatan Personal Computer', 6, 2021, 20000000, 2, 2),
('5.1.2.03.03.0008', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Gedung Tempat Ibadah', 6, 2021, 22350000, 2, 2),
('5.1.2.03.03.0013', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Gedung untuk Pos Jaga', 6, 2021, 207855000, 2, 2),
('5.1.2.03.03.0016', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Gedung Perpustakaan', 6, 2021, 196680000, 2, 2),
('5.2.2.03.01', 'Belanja Modal Alat Bengkel Bermesin', 5, 2021, 35000000, 2, 2),
('5.2.2.03.01.0008', 'Belanja Modal Peralatan Las', 6, 2021, 35000000, 2, 2),
('5.2.2.06.01.0004', 'Belanja Modal Peralatan Cetak', 6, 2021, 4725000, 2, 2),
('5.2.2.07.01.0001', 'Belanja Modal Alat Kedokteran Umum', 6, 2021, 0, 2, 2),
('5.2.2.07.01.0013', 'Belanja Modal Alat Kedokteran Neurologi (Saraf)', 6, 2021, 984856000, 2, 2),
('5.2.2.08.01.0064', 'Belanja Modal Unit Alat Laboratorium Lainnya', 6, 2021, 1700000, 2, 2),
('5.2.3.01.01.0004', 'Belanja Modal Bangunan Gedung Instalasi', 6, 2021, 848850000, 2, 2),
('5.2.3.01.01.0006', 'Belanja Modal Bangunan Kesehatan', 6, 2021, 17719000000, 2, 2),
('5.2.4', 'Belanja Modal Jalan, Jaringan, dan Irigasi', 3, 2021, 599655097, 2, 2),
('5.2.4.04', 'Belanja Modal Jaringan', 4, 2021, 182000000, 2, 2),
('5.2.4.04.02', 'Belanja Modal Jaringan Listrik', 5, 2021, 182000000, 2, 2),
('5.2.4.04.02.0003', 'Belanja Modal Jaringan Listrik Lainnya', 6, 2021, 182000000, 2, 2),
('5.1.1.03.07.0003', 'Belanja Honorarium Perangkat Unit Kerja Pengadaan Barang dan Jasa (UKPBJ)', 6, 2021, 3060000, 2, 2),
('5.1.1.99', 'Belanja Pegawai BLUD', 4, 2021, 37041212472, 2, 2),
('5.1.1.99.99', 'Belanja Pegawai BLUD', 5, 2021, 37041212472, 2, 2),
('5.1.1.99.99.9999', 'Belanja Pegawai BLUD', 6, 2021, 37041212472, 2, 2),
('5.1.2.02.01.0012', 'Honorarium Tim Anggaran Pemerintah Daerah', 6, 2021, 0, 2, 2),
('5.1.2.03.02.0301', 'Belanja Pemeliharaan Alat Laboratorium-Unit Alat Laboratorium-Unit Alat Laboratorium Lainnya', 6, 2021, 150000000, 2, 2),
('5.1.2.03.03.0046', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Tinggal-Rumah Negara dalam Proses Penggolongan', 6, 2021, 558750000, 2, 2),
('5.1.2.99', 'Belanja Barang dan Jasa BLUD', 4, 2021, 41208787528, 2, 2),
('5.1.2.99.99', 'Belanja Barang dan Jasa BLUD', 5, 2021, 41208787528, 2, 2),
('5.1.2.99.99.9999', 'Belanja Barang dan Jasa BLUD', 6, 2021, 41208787528, 2, 2),
('5.2.2.01.03.0008', 'Belanja Modal Alat Pengolahan Air Kotor', 6, 2021, 120000000, 2, 2),
('5.2.2.02', 'Belanja Modal Alat Angkutan', 4, 2021, 4942800000, 2, 2),
('5.2.2.02.01', 'Belanja Modal Alat Angkutan Darat Bermotor', 5, 2021, 4842800000, 2, 2),
('5.2.2.02.01.0006', 'Belanja Modal Kendaraan Bermotor Khusus', 6, 2021, 0, 2, 2),
('5.2.2.07.01.0004', 'Belanja Modal Alat Kedokteran Bedah', 6, 2021, 10726628000, 2, 2),
('5.2.3.04', 'Belanja Modal Tugu Titik Kontrol/Pasti', 4, 2021, 118852800, 2, 2),
('5.2.3.04.01', 'Belanja Modal Tugu/Tanda Batas', 5, 2021, 118852800, 2, 2),
('5.2.3.04.01.0004', 'Belanja Modal Pagar', 6, 2021, 118852800, 2, 2),
('5.2.5.01.01.0003', 'Belanja Modal Buku Agama', 6, 2021, 5750000, 2, 2),
('4.1.2.02.01.0002', 'Retribusi Penyewaan Tanah', 6, 2021, 800000000, 1, 2),
('4.1.2.02.01.0004', 'Retribusi Pemakaian Laboratorium', 6, 2021, 1800000000, 1, 2),
('4.1.2.02.01.0007', 'Retribusi Pemakaian Alat', 6, 2021, 52404365, 1, 2),
('5.1.2.02.04.0148', 'Belanja Sewa Alat Komunikasi Lainnya', 6, 2021, 45712666, 2, 2),
('5.1.2.02.08.0009', 'Belanja Jasa Konsultansi Perencanaan Rekayasa-Jasa Desain Rekayasa untuk Pekerjaan Teknik Sipil Transportasi', 6, 2021, 0, 2, 2),
('5.1.2.02.08.0020', 'Belanja Jasa Konsultansi Pengawasan Rekayasa-Jasa Pengawas Pekerjaan Konstruksi Teknik Sipil Transportasi', 6, 2021, 395562200, 2, 2),
('5.1.2.02.09.0012', 'Belanja Jasa Konsultansi Berorientasi Layanan-Jasa Studi Penelitian dan Bantuan Teknik', 6, 2021, 350000000, 2, 2),
('5.1.2.03.02.0012', 'Belanja Pemeliharaan Alat Besar-Alat Besar Darat-Alat Besar Darat Lainnya', 6, 2021, 1650000, 2, 2),
('5.1.2.03.04.0002', 'Belanja Pemeliharaan Jalan dan Jembatan- Jalan-Jalan Provinsi', 6, 2021, 50197209184, 2, 2),
('5.1.2.03.04.0012', 'Belanja Pemeliharaan Jalan dan Jembatan- Jembatan-Jembatan pada Jalan Provinsi', 6, 2021, 4587828575, 2, 2),
('5.2.1.01.03', 'Belanja Modal Lapangan', 5, 2021, 3196000000, 2, 2),
('5.2.1.01.03.0007', 'Belanja Modal Tanah untuk Jalan', 6, 2021, 25000000000, 2, 2),
('5.2.2.01.01.0002', 'Belanja Modal Grader', 6, 2021, 6831000000, 2, 2),
('5.2.2.01.01.0007', 'Belanja Modal Compacting Equipment', 6, 2021, 6495775000, 2, 2),
('5.2.2.01.01.0008', 'Belanja Modal Aggregate and Concrete Equipment', 6, 2021, 0, 2, 2),
('5.2.2.01.01.0009', 'Belanja Modal Loader', 6, 2021, 5085300000, 2, 2),
('5.2.2.01.03.0003', 'Belanja Modal Compressor', 6, 2021, 0, 2, 2),
('5.2.2.02.01.0001', 'Belanja Modal Kendaraan Dinas Bermotor Perorangan', 6, 2021, 0, 2, 2),
('5.2.2.02.01.0003', 'Belanja Modal Kendaraan Bermotor Angkutan Barang', 6, 2021, 192800000, 2, 2),
('5.2.2.02.01.0004', 'Belanja Modal Kendaraan Bermotor Beroda Dua', 6, 2021, 104100000, 2, 2),
('5.2.2.05.01.0002', 'Belanja Modal Mesin Hitung/Mesin Jumlah', 6, 2021, 2250000, 2, 2),
('5.2.2.08.01.0006', 'Belanja Modal Alat Laboratorium Bahan Bangunan Konstruksi', 6, 2021, 2566846300, 2, 2),
('5.2.2.08.01.0007', 'Belanja Modal Alat Laboratorium Aspal, Cat, dan Kimia', 6, 2021, 117130000, 2, 2),
('5.2.2.08.01.0008', 'Belanja Modal Alat Laboratorium Mekanika Tanah dan Batuan', 6, 2021, 183137500, 2, 2),
('5.2.2.18', 'Belanja Modal Rambu-Rambu', 4, 2021, 125000000, 2, 2),
('5.2.2.18.01', 'Belanja Modal Rambu-Rambu Lalu Lintas Darat', 5, 2021, 125000000, 2, 2),
('5.2.2.18.01.0003', 'Belanja Modal Rambu-Rambu Lalu Lintas Darat Lainnya', 6, 2021, 125000000, 2, 2),
('5.2.4.01', 'Belanja Modal Jalan dan Jembatan', 4, 2021, 0, 2, 2),
('5.2.4.01.01', 'Belanja Modal Jalan', 5, 2021, 1287287500, 2, 2),
('5.2.4.01.01.0002', 'Belanja Modal Jalan Provinsi', 6, 2021, 750000000, 2, 2),
('5.2.4.01.02', 'Belanja Modal Jembatan', 5, 2021, 0, 2, 2),
('5.2.4.01.02.0002', 'Belanja Modal Jembatan pada Jalan Provinsi', 6, 2021, 33017935110, 2, 2),
('5.1.2.01.01.0023', 'Belanja Suku Cadang-Suku Cadang Lainnya', 6, 2021, 32500000, 2, 2),
('5.1.2.02.01.0069', 'Belanja Pengolahan Air Limbah', 6, 2021, 1350000000, 2, 2),
('5.1.2.02.08.0021', 'Belanja Jasa Konsultansi Pengawasan Rekayasa-Jasa Pengawas Pekerjaan Konstruksi Teknik Sipil Air', 6, 2021, 2365000000, 2, 2),
('5.1.2.02.08.0027', 'Belanja Jasa Konsultansi Spesialis-Jasa Pembuatan Peta', 6, 2021, 100000000, 2, 2),
('5.1.2.02.09.0013', 'Belanja Jasa Konsultansi Berorientasi Layanan-Jasa Konsultansi Manajemen', 6, 2021, 100000000, 2, 2),
('5.1.2.02.12.0002', 'Belanja Sosialisasi', 6, 2021, 89520000, 2, 2),
('5.1.2.02.12.0004', 'Belanja Diklat Kepemimpinan', 6, 2021, 22125000, 2, 2),
('5.1.2.03.02.0120', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Rumah Tangga-Alat Pembersih', 6, 2021, 123925000, 2, 2),
('5.1.2.03.04.0025', 'Belanja Pemeliharaan Bangunan Air- Bangunan Air Irigasi-Bangunan Pengambilan Irigasi', 6, 2021, 12213560570, 2, 2),
('5.2.1.01.01.0007', 'Belanja Modal Tanah Persil Lainnya', 6, 2021, 1563010925, 2, 2),
('5.2.2.01.01.0006', 'Belanja Modal Asphalt Equipment', 6, 2021, 0, 2, 2),
('5.2.2.01.01.0012', 'Belanja Modal Alat Besar Darat Lainnya', 6, 2021, 0, 2, 2),
('5.2.2.04', 'Belanja Modal Alat Pertanian', 4, 2021, 0, 2, 2),
('5.2.2.04.01', 'Belanja Modal Alat Pengolahan', 5, 2021, 0, 2, 2),
('5.2.2.04.01.0001', 'Belanja Modal Alat Pengolahan Tanah dan Tanaman', 6, 2021, 0, 2, 2),
('5.2.3.01.01.0009', 'Belanja Modal Bangunan Gedung Tempat Pertemuan', 6, 2021, 310000000, 2, 2),
('5.2.3.01.02', 'Belanja Modal Bangunan Gedung Tempat Tinggal', 5, 2021, 161710287, 2, 2),
('5.2.3.01.02.0013', 'Belanja Modal Bangunan Gedung Tempat Tinggal Lainnya', 6, 2021, 161710287, 2, 2),
('5.2.4.01.01.0010', 'Belanja Modal Jalan Lainnya', 6, 2021, 537287500, 2, 2),
('5.2.4.02', 'Belanja Modal Bangunan Air', 4, 2021, 199655097, 2, 2),
('5.2.4.02.01', 'Belanja Modal Bangunan Air Irigasi', 5, 2021, 728000000, 2, 2),
('5.2.4.02.01.0002', 'Belanja Modal Bangunan Pengambilan Irigasi', 6, 2021, 8004021552, 2, 2),
('5.2.4.02.01.0003', 'Belanja Modal Bangunan Pembawa Irigasi', 6, 2021, 27438126888, 2, 2),
('5.2.4.02.01.0004', 'Belanja Modal Bangunan Pembuang Irigasi', 6, 2021, 1215111176, 2, 2),
('5.2.4.02.04', 'Belanja Modal Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam', 5, 2021, 199655097, 2, 2),
('5.2.4.02.04.0001', 'Belanja Modal Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam', 6, 2021, 199655097, 2, 2),
('5.2.4.02.04.0002', 'Belanja Modal Bangunan Pengambilan Pengaman Sungai/Pantai', 6, 2021, 48204998502, 2, 2),
('5.2.4.02.05', 'Belanja Modal Bangunan Pengembangan Sumber Air dan Air Tanah', 5, 2021, 1854267405, 2, 2),
('5.2.4.02.05.0001', 'Belanja Modal Bangunan Waduk Pengembangan Sumber Air', 6, 2021, 1854267405, 2, 2),
('5.2.4.02.06', 'Belanja Modal Bangunan Air Bersih/Air Baku', 5, 2021, 54163125065, 2, 2),
('5.2.4.02.06.0001', 'Belanja Modal Bangunan Waduk Air Bersih/Air Baku', 6, 2021, 1646424156, 2, 2),
('5.2.4.02.06.0002', 'Belanja Modal Bangunan Pengambilan Air Bersih/Air Baku', 6, 2021, 2629840909, 2, 2),
('5.2.4.02.06.0003', 'Belanja Modal Bangunan Pembawa Air Bersih/Air Baku', 6, 2021, 49886860000, 2, 2),
('5.2.4.03', 'Belanja Modal Instalasi', 4, 2021, 400000000, 2, 2),
('5.2.4.03.02', 'Belanja Modal Instalasi Air Kotor', 5, 2021, 300000000, 2, 2),
('5.2.4.03.02.0004', 'Belanja Modal Instalasi Air Kotor Lainnya', 6, 2021, 1410000000, 2, 2),
('5.1.2.01.01.0076', 'Belanja Pakaian Olahraga', 6, 2021, 6720000, 2, 2),
('5.1.2.02.04.0135', 'Belanja Sewa Peralatan Cetak', 6, 2021, 8800000, 2, 2),
('5.1.5.02', 'Belanja Hibah kepada Pemerintah Daerah Lainnya', 4, 2021, 150600000, 2, 2),
('5.1.5.02.02', 'Belanja Hibah Barang kepada Pemerintah Daerah Lainnya', 5, 2021, 150600000, 2, 2),
('5.1.5.02.02.0001', 'Belanja Hibah Barang kepada Pemerintah Daerah Lainnya', 6, 2021, 150600000, 2, 2),
('5.1.6', 'Belanja Bantuan Sosial', 3, 2021, 405000000, 2, 2),
('5.1.6.03', 'Belanja Bantuan Sosial kepada Kelompok Masyarakat', 4, 2021, 0, 2, 2),
('5.1.6.03.01', 'Belanja Bantuan Sosial Uang yang direncanakan kepada Kelompok Masyarakat', 5, 2021, 1152000000, 2, 2),
('5.1.6.03.01.0001', 'Belanja Bantuan Sosial Uang yang Direncanakan kepada Kelompok Masyarakat', 6, 2021, 1152000000, 2, 2),
('5.1.2.01.01.0074', 'Belanja Pakaian Adat Daerah', 6, 2021, 0, 2, 2),
('5.1.2.02.01.0025', 'Belanja Jasa Tenaga Kesenian dan Kebudayaan', 6, 2021, 0, 2, 2),
('5.1.2.02.01.0046', 'Belanja Jasa Konversi Aplikasi/Sistem Informasi', 6, 2021, 200000000, 2, 2),
('5.1.2.02.02.0008', 'Belanja Asuransi Barang Milik Daerah', 6, 2021, 16200000, 2, 2),
('5.1.2.02.04.0202', 'Belanja Sewa Peralatan Komunikasi untuk Dokumentasi', 6, 2021, 5000000, 2, 2),
('5.1.2.02.07', 'Belanja Sewa Aset Tetap Lainnya', 5, 2021, 9500000, 2, 2),
('5.1.2.02.07.0028', 'Belanja Sewa Alat Musik', 6, 2021, 0, 2, 2),
('5.1.5.05.01', 'Belanja Hibah kepada Badan dan Lembaga yang Bersifat Nirlaba, Sukarela dan Sosial yang Dibentuk Berdasarkan Peraturan Perundang-Undangan', 5, 2021, 500000000, 2, 2),
('5.1.5.05.01.0001', 'Belanja Hibah Uang kepada Badan dan Lembaga yang Bersifat Nirlaba, Sukarela dan Sosial yang Dibentuk Berdasarkan Peraturan Perundang-Undangan', 6, 2021, 500000000, 2, 2),
('5.1.5.05.02', 'Belanja Hibah kepada Badan dan Lembaga Nirlaba, Sukarela dan Sosial yang Telah Memiliki Surat Keterangan Terdaftar', 5, 2021, 0, 2, 2),
('5.1.5.05.02.0001', 'Belanja Hibah Uang kepada Badan dan Lembaga Nirlaba, Sukarela dan Sosial yang Telah Memiliki Surat Keterangan Terdaftar', 6, 2021, 23550000000, 2, 2),
('5.1.5.05.03.0002', 'Belanja Hibah Barang kepada Badan dan Lembaga Nirlaba, Sukarela Bersifat Sosial Kemasyarakatan', 6, 2021, 150000000, 2, 2),
('5.1.5.07', 'Belanja Hibah Bantuan Keuangan kepada Partai Politik', 4, 2021, 7591268400, 2, 2),
('5.1.5.07.01', 'Belanja Hibah Bantuan Keuangan kepada Partai Politik', 5, 2021, 7591268400, 2, 2),
('5.1.5.07.01.0001', 'Belanja Hibah berupa Bantuan Keuangan kepada Partai Politik', 6, 2021, 7591268400, 2, 2),
('5.2.2.05.02.0007', 'Belanja Modal Alat Pemadam Kebakaran', 6, 2021, 2510248000, 2, 2),
('5.2.2.05.03.0002', 'Belanja Modal Meja Rapat Pejabat', 6, 2021, 19500000, 2, 2),
('5.1.2.01.01.0064', 'Belanja Pakaian Dinas Lapangan (PDL)', 6, 2021, 38600000, 2, 2),
('5.1.2.02.01.0017', 'Belanja Jasa Tenaga Ketenteraman, Ketertiban Umum, dan Perlindungan Masyarakat', 6, 2021, 11308462500, 2, 2),
('5.1.2.02.01.0041', 'Belanja Jasa Pemasangan Instalasi Telepon, Air, dan Listrik', 6, 2021, 54000000, 2, 2),
('5.1.2.02.08.0016', 'Belanja Jasa Konsultansi Perencanaan Penataan Ruang-Jasa Perencanaan dan Perancangan Lingkungan Bangunan dan Landscape', 6, 2021, 50000000, 2, 2),
('5.1.2.02.08.0023', 'Belanja Jasa Konsultansi Pengawasan Penataan Ruang', 6, 2021, 190000000, 2, 2),
('5.1.5.01', 'Belanja Hibah kepada Pemerintah Pusat', 4, 2021, 5056600000, 2, 2),
('5.1.5.01.01', 'Belanja Hibah Uang kepada Pemerintah Pusat', 5, 2021, 3000000000, 2, 2),
('5.1.5.01.01.0001', 'Belanja Hibah Uang kepada Pemerintah Pusat', 6, 2021, 3000000000, 2, 2),
('5.2.2.06.02.0008', 'Belanja Modal Alat Komunikasi Khusus', 6, 2021, 208725000, 2, 2),
('5.1.2.01.01.0045', 'Belanja Natura dan Pakan-Natura dan Pakan Lainnya', 6, 2021, 158760000, 2, 2),
('5.1.2.02.01.0019', 'Belanja Jasa Tenaga Penanganan Bencana', 6, 2021, 5470000000, 2, 2),
('5.1.2.02.04.0121', 'Belanja Sewa Alat Pendingin', 6, 2021, 985000000, 2, 2),
('5.1.2.02.09.0014', 'Belanja Jasa Konsultansi Berorientasi Layanan-Jasa Khusus', 6, 2021, 96000000, 2, 2),
('5.1.2.03.03.0026', 'Belanja Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung Tempat Kerja-Bangunan Penampung Sekam', 6, 2021, 516285000, 2, 2),
('5.1.2.03.05', 'Belanja Pemeliharaan Aset Tetap Lainnya', 5, 2021, 0, 2, 2),
('5.1.2.03.05.0065', 'Belanja Pemeliharaan Aset Tetap dalam Renovasi-Aset Tetap dalam Renovasi-Aset Tetap dalam Renovasi', 6, 2021, 192550500, 2, 2),
('5.2.2.06.02.0011', 'Belanja Modal Alat Komunikasi Lainnya', 6, 2021, 450000000, 2, 2),
('5.2.2.06.04', 'Belanja Modal Peralatan Komunikasi Navigasi', 5, 2021, 4500000, 2, 2),
('5.2.2.06.04.0006', 'Belanja Modal Peralatan Komunikasi untuk Dokumentasi', 6, 2021, 4500000, 2, 2),
('5.2.2.15', 'Belanja Modal Alat Keselamatan Kerja', 4, 2021, 0, 2, 2),
('5.2.2.15.03', 'Belanja Modal Alat SAR', 5, 2021, 60356313, 2, 2),
('5.2.2.15.03.0004', 'Belanja Modal Alat SAR Lainnya', 6, 2021, 60356313, 2, 2),
('5.1.2.02.01.0065', 'Belanja Penambahan Daya', 6, 2021, 70349400, 2, 2),
('5.1.2.02.04.0012', 'Belanja Sewa Alat Besar Darat Lainnya', 6, 2021, 6500000, 2, 2),
('5.1.2.02.04.0037', 'Belanja Sewa Kendaraan Bermotor Angkutan Barang', 6, 2021, 9500000, 2, 2),
('5.1.2.02.04.0052', 'Belanja Sewa Alat Angkutan Apung Bermotor Lainnya', 6, 2021, 6400000, 2, 2),
('5.1.2.02.04.0075', 'Belanja Sewa Perkakas Bengkel Kerja', 6, 2021, 2000000, 2, 2),
('5.1.2.02.04.0103', 'Belanja Sewa Alat Pengolahan Tanah dan Tanaman', 6, 2021, 4000000, 2, 2),
('5.1.2.02.05.0037', 'Belanja Sewa Bangunan Gedung Tempat Kerja Lainnya', 6, 2021, 20000000, 2, 2),
('5.1.6.01', 'Belanja Bantuan Sosial kepada Individu', 4, 2021, 405000000, 2, 2),
('5.1.6.01.01', 'Belanja Bantuan Sosial Uang yang direncanakan kepada Individu', 5, 2021, 405000000, 2, 2),
('5.1.6.01.01.0001', 'Belanja Bantuan Sosial Uang yang Direncanakan kepada Individu', 6, 2021, 405000000, 2, 2),
('5.1.6.01.02', 'Belanja Bantuan Sosial Barang yang Direncanakan kepada Individu', 5, 2021, 2469080288, 2, 2),
('5.1.6.01.02.0001', 'Belanja Bantuan Sosial Barang yang Direncanakan kepada Individu', 6, 2021, 2469080288, 2, 2),
('5.2.1.01.03.0008', 'Belanja Modal Tanah untuk Bangunan Air', 6, 2021, 497944158, 2, 2),
('5.2.2.02.02', 'Belanja Modal Alat Angkutan Darat Tak Bermotor', 5, 2021, 100000000, 2, 2),
('5.2.2.02.02.0001', 'Belanja Modal Kendaraan Tak Bermotor Angkutan Barang', 6, 2021, 0, 2, 2),
('5.2.2.05.02.0005', 'Belanja Modal Alat Dapur', 6, 2021, 100000000, 2, 2),
('4.1.2.03', 'Retribusi Perizinan Tertentu', 4, 2021, 300000000, 1, 2),
('4.1.2.03.06', 'Retribusi Perpanjangan Izin Mempekerjakan Tenaga Kerja Asing (IMTA)', 5, 2021, 1900000000, 1, 2),
('4.1.2.03.06.0001', 'Retribusi Pemberian Perpanjangan IMTA kepada Pemberi Kerja Tenaga Kerja Asing', 6, 2021, 1900000000, 1, 2),
('5.2.4.03.05', 'Belanja Modal Instalasi Pembangkit Listrik', 5, 2021, 100998750, 2, 2),
('5.2.4.03.05.0009', 'Belanja Modal Instalasi Pembangkit Listrik Tenaga Surya (PLTS)', 6, 2021, 100998750, 2, 2),
('5.1.2.02.05.0016', 'Belanja Sewa Bangunan Gedung Perpustakaan', 6, 2021, 0, 2, 2),
('5.1.2.04.02', 'Belanja Perjalanan Dinas Luar Negeri', 5, 2021, 0, 2, 2),
('5.1.2.04.02.0001', 'Belanja Perjalanan Dinas BiasaûLuar Negeri', 6, 2021, 0, 2, 2),
('5.1.2.05.02', 'Belanja Jasa yang Diberikan kepada Pihak Ketiga/Pihak Lain/Masyarakat', 5, 2021, 0, 2, 2),
('5.1.2.05.02.0001', 'Belanja Jasa yang Diberikan kepada Pihak Ketiga/Pihak Lain', 6, 2021, 0, 2, 2),
('5.1.2.01.01.0041', 'Belanja Persediaan untuk Tujuan Strategis/Berjaga-jaga-Persediaan untuk Tujuan Strategis/Berjaga-jaga', 6, 2021, 726000000, 2, 2),
('5.1.2.01.01.0044', 'Belanja Natura dan Pakan-Pakan', 6, 2021, 34392000, 2, 2),
('5.1.2.02.01.0023', 'Belanja Jasa Tenaga Teknis Pertanian dan Pangan', 6, 2021, 8269260000, 2, 2),
('5.1.2.02.01.0032', 'Belanja Jasa Tenaga Caraka', 6, 2021, 78000000, 2, 2),
('5.1.2.02.08.0006', 'Belanja Jasa Konsultansi Perencanaan Rekayasa-Jasa Nasihat dan Konsultansi Rekayasa Teknik', 6, 2021, 12000000, 2, 2),
('5.1.2.02.09.0001', 'Belanja Jasa Konsultansi Berorientasi Bidang-Pengembangan Pertanian dan Perdesaan', 6, 2021, 1193200000, 2, 2),
('5.1.2.03.02.0001', 'Belanja Pemeliharaan Alat Besar-Alat Besar Darat-Tractor', 6, 2021, 11000000, 2, 2),
('5.1.2.03.02.0039', 'Belanja Pemeliharaan Alat Angkutan-Alat Angkutan Darat Bermotor-Kendaraan Bermotor Beroda Tiga', 6, 2021, 6000000, 2, 2),
('5.1.2.03.02.0107', 'Belanja Pemeliharaan Alat Pertanian-Alat Pengolahan-Alat Laboratorium Pertanian', 6, 2021, 864000, 2, 2),
('5.1.2.03.02.0446', 'Belanja Pemeliharaan Alat Keselamatan Kerja-Alat Pelindung-Baju Pengaman', 6, 2021, 1600000, 2, 2),
('5.1.2.03.03.0002', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Gudang', 6, 2021, 0, 2, 2),
('5.1.2.03.03.0029', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Peternakan/Perikanan', 6, 2021, 191092500, 2, 2),
('5.1.2.03.05.0046', 'Belanja Pemeliharaan Hewan-Hewan Lainnya-Hewan Lainnya', 6, 2021, 0, 2, 2),
('5.2.2.01.01.0001', 'Belanja Modal Tractor', 6, 2021, 35000000, 2, 2),
('5.2.2.02.01.0005', 'Belanja Modal Kendaraan Bermotor Beroda Tiga', 6, 2021, 150000000, 2, 2),
('5.2.2.03.03.0010', 'Belanja Modal Alat Timbangan/Biara', 6, 2021, 0, 2, 2),
('5.2.2.04.01.0009', 'Belanja Modal Alat-Alat Peternakan', 6, 2021, 76050000, 2, 2),
('5.2.3.01.01.0008', 'Belanja Modal Bangunan Gedung Tempat Ibadah', 6, 2021, 200000000, 2, 2),
('5.2.3.01.01.0013', 'Belanja Modal Bangunan Gedung untuk Pos Jaga', 6, 2021, 55875000, 2, 2),
('5.2.3.01.01.0029', 'Belanja Modal Bangunan Peternakan/Perikanan', 6, 2021, 973995000, 2, 2),
('5.2.4.02.01.0008', 'Belanja Modal Bangunan Air Irigasi Lainnya', 6, 2021, 728000000, 2, 2),
('5.2.4.03.02.0003', 'Belanja Modal Instalasi Air Buangan Pertanian', 6, 2021, 300000000, 2, 2),
('5.2.5.03', 'Belanja Modal Hewan', 4, 2021, 2877500000, 2, 2),
('5.2.5.03.02', 'Belanja Modal Ternak', 5, 2021, 2877500000, 2, 2),
('5.2.5.03.02.0004', 'Belanja Modal Ternak Lainnya', 6, 2021, 2877500000, 2, 2),
('5.1.2.01.01.0005', 'Belanja Bahan-Bahan Baku', 6, 2021, 0, 2, 2),
('5.1.2.01.01.0071', 'Belanja Pakaian Kerja Laboratorium', 6, 2021, 8000000, 2, 2),
('5.1.2.02.04.0003', 'Belanja Sewa Excavator', 6, 2021, 0, 2, 2),
('5.1.2.02.04.0018', 'Belanja Sewa Alat Besar Apung Lainnya', 6, 2021, 30000000, 2, 2),
('5.1.2.02.04.0050', 'Belanja Sewa Alat Angkutan Apung Bermotor Khusus', 6, 2021, 8000000, 2, 2),
('5.1.2.02.09.0011', 'Belanja Jasa Konsultansi Berorientasi Layanan-Jasa Survei', 6, 2021, 0, 2, 2),
('5.1.2.02.10', 'Belanja Jasa Ketersediaan Layanan (Availibility Payment)', 5, 2021, 21450000, 2, 2),
('5.1.2.02.10.0010', 'Belanja Jasa Ketersediaan Layanan (Availibility Payment) Infrastruktur Minyak dan Gas Bumi dan Energi Terbarukan', 6, 2021, 21450000, 2, 2),
('5.1.2.03.02.0113', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Kantor-Mesin Ketik', 6, 2021, 0, 2, 2),
('5.2.2.05.01.0001', 'Belanja Modal Mesin Ketik', 6, 2021, 2500000, 2, 2),
('5.2.3.01.01.0032', 'Belanja Modal Bangunan Fasilitas Umum', 6, 2021, 0, 2, 2),
('5.2.5.01.01.0004', 'Belanja Modal Buku Ilmu Sosial', 6, 2021, 115500000, 2, 2),
('5.2.5.01.03', 'Belanja Modal Kartografi, Naskah, dan Lukisan', 5, 2021, 0, 2, 2),
('5.2.5.01.03.0003', 'Belanja Modal Lukisan dan Ukiran', 6, 2021, 0, 2, 2),
('5.1.1.02.02', 'Tambahan Penghasilan berdasarkan Tempat Bertugas ASN', 5, 2021, 0, 2, 2),
('5.1.1.02.02.0001', 'Tambahan Penghasilan berdasarkan Tempat Bertugas PNS', 6, 2021, 0, 2, 2),
('5.1.2.01.01.0040', 'Belanja Barang untuk Dijual/Diserahkan kepada Pihak Ketiga/Pihak Lain', 6, 2021, 0, 2, 2),
('5.1.2.02.04.0133', 'Belanja Sewa Peralatan Studio Video dan Film', 6, 2021, 112000000, 2, 2),
('5.1.2.02.07.0057', 'Belanja Sewa Tanaman', 6, 2021, 9500000, 2, 2),
('5.1.5.05.02.0002', 'Belanja Hibah Barang kepada Badan dan Lembaga Nirlaba, Sukarela dan Sosial yang Telah Memiliki Surat Keterangan Terdaftar', 6, 2021, 0, 2, 2),
('5.1.5.05.01.0002', 'Belanja Hibah Barang kepada Badan dan Lembaga yang Bersifat Nirlaba, Sukarela dan Sosial yang Dibentuk Berdasarkan Peraturan Perundang-Undangan', 6, 2021, 460696000, 2, 2),
('4.1.2.03.03', 'Retribusi Izin Trayek untuk Menyediakan Pelayanan Angkutan Umum', 5, 2021, 300000000, 1, 2),
('4.1.2.03.03.0001', 'Retribusi Izin Trayek untuk Menyediakan Pelayanan Angkutan Umum', 6, 2021, 300000000, 1, 2),
('5.2.2.15.01', 'Belanja Modal Alat Deteksi', 5, 2021, 2372041630, 2, 2),
('5.2.2.15.01.0003', 'Belanja Modal Alat Deteksi Lainnya', 6, 2021, 2372041630, 2, 2),
('5.2.3.01.01.0018', 'Belanja Modal Bangunan Gedung Terminal/Pelabuhan/Bandara', 6, 2021, 0, 2, 2),
('5.2.4.01.02.0013', 'Belanja Modal Jembatan Lainnya', 6, 2021, 20942005, 2, 2),
('5.2.5.01.05', 'Belanja Modal Karya Grafika (Graphic Material)', 5, 2021, 5000000, 2, 2),
('5.2.5.01.05.0002', 'Belanja Modal Karya Grafika (Graphic Material) Lainnya', 6, 2021, 5000000, 2, 2),
('5.1.2.03.03.0033', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Parkir', 6, 2021, 161000000, 2, 2),
('5.1.5.01.02', 'Belanja Hibah Barang kepada Pemerintah Pusat', 5, 2021, 2056600000, 2, 2),
('5.1.5.01.02.0001', 'Belanja Hibah Barang kepada Pemerintah Pusat', 6, 2021, 2056600000, 2, 2),
('5.2.2.14', 'Belanja Modal Alat Bantu Eksplorasi', 4, 2021, 0, 2, 2),
('5.2.2.14.01', 'Belanja Modal Alat Bantu Eksplorasi', 5, 2021, 0, 2, 2),
('5.2.2.14.01.0002', 'Belanja Modal Elektrik', 6, 2021, 0, 2, 2),
('5.1.2.01.01.0046', 'Belanja Persediaan Penelitian-Persediaan Penelitian Biologi', 6, 2021, 0, 2, 2),
('5.1.2.02.05.0002', 'Belanja Sewa Bangunan Gudang', 6, 2021, 120000000, 2, 2),
('5.1.2.02.08.0013', 'Belanja Jasa Konsultansi Perencanaan Rekayasa-Jasa Desain Rekayasa Lainnya', 6, 2021, 500000, 2, 2),
('5.1.2.03.02.0104', 'Belanja Pemeliharaan Alat Pertanian-Alat Pengolahan-Alat Pemeliharaan Tanaman/ Ikan/Ternak', 6, 2021, 0, 2, 2),
('5.1.2.03.03.0041', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Tinggal- Mess/Wisma/Bungalow/Tempat Peristirahatan', 6, 2021, 50000000, 2, 2),
('5.1.2.03.04.0010', 'Belanja Pemeliharaan Jalan dan Jembatan- Jalan-Jalan Lainnya', 6, 2021, 200000000, 2, 2),
('5.2.2.15.02', 'Belanja Modal Alat Pelindung', 5, 2021, 0, 2, 2),
('5.2.2.15.02.0002', 'Belanja Modal Masker', 6, 2021, 0, 2, 2),
('5.2.2.15.02.0006', 'Belanja Modal Alat Pelindung Lainnya', 6, 2021, 0, 2, 2),
('5.1.2.01.01.0028', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Persediaan Dokumen/Administrasi Tender', 6, 2021, 0, 2, 2),
('5.1.2.02.04.0364', 'Belanja Sewa Photo and Film Equipment', 6, 2021, 0, 2, 2),
('5.2.2.11', 'Belanja Modal Alat Eksplorasi', 4, 2021, 1710000000, 2, 2),
('5.2.2.11.02', 'Belanja Modal Alat Eksplorasi Geofisika', 5, 2021, 1710000000, 2, 2),
('5.2.2.11.02.0002', 'Belanja Modal Elektronik/Electric', 6, 2021, 1710000000, 2, 2),
('5.2.5.08.01.0006', 'Belanja Modal Kajian', 6, 2021, 0, 2, 2),
('4.1.2.02.09', 'Retribusi Tempat Rekreasi dan Olahraga', 5, 2021, 120000000, 1, 2),
('4.1.2.02.09.0001', 'Retribusi Pelayanan Tempat Rekreasi dan Olahraga', 6, 2021, 120000000, 1, 2),
('5.1.2.02.01.0054', 'Belanja Jasa Jalan/Tol', 6, 2021, 28000000, 2, 2),
('5.1.2.02.04.0038', 'Belanja Sewa Kendaraan Bermotor Beroda Dua', 6, 2021, 60500000, 2, 2),
('5.1.2.02.04.0117', 'Belanja Sewa Alat Kantor Lainnya', 6, 2021, 46000000, 2, 2),
('5.1.2.03.03.0037', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Kerja-Bangunan Gedung Tempat Kerja Lainnya', 6, 2021, 2031977749, 2, 2),
('5.1.2.05.01.0002', 'Belanja Penghargaan atas Suatu Prestasi', 6, 2021, 0, 2, 2),
('5.1.2.05.01.0004', 'Belanja Penanganan Dampak Sosial Kemasyarakatan', 6, 2021, 310000000, 2, 2),
('5.2.2.05.03.0006', 'Belanja Modal Kursi Tamu di Ruangan Pejabat', 6, 2021, 46550000, 2, 2),
('5.2.2.05.03.0007', 'Belanja Modal Lemari dan Arsip Pejabat', 6, 2021, 17000000, 2, 2),
('5.2.2.19', 'Belanja Modal Peralatan Olahraga', 4, 2021, 10000000, 2, 2),
('5.2.2.19.01', 'Belanja Modal Peralatan Olahraga', 5, 2021, 10000000, 2, 2),
('5.2.2.19.01.0006', 'Belanja Modal Peralatan Olahraga Lainnya', 6, 2021, 10000000, 2, 2),
('5.2.3.01.01.0011', 'Belanja Modal Bangunan Gedung Tempat Olahraga', 6, 2021, 15409810870, 2, 2),
('5.2.5.01.01.0007', 'Belanja Modal Buku Ilmu Pengetahuan Praktis', 6, 2021, 192000000, 2, 2),
('5.1.2.02.01.0006', 'Honorarium Penyuluhan atau Pendampingan', 6, 2021, 155600000, 2, 2),
('5.1.2.02.01.0036', 'Belanja Jasa Audit/Surveillance ISO', 6, 2021, 0, 2, 2),
('5.1.2.02.01.0037', 'Belanja Jasa Juri Perlombaan/Pertandingan', 6, 2021, 2400000, 2, 2),
('5.1.2.02.04.0043', 'Belanja Sewa Alat Angkutan Darat Bermotor Lainnya', 6, 2021, 31500000, 2, 2),
('5.1.2.02.04.0049', 'Belanja Sewa Alat Angkutan Apung Bermotor untuk Penumpang', 6, 2021, 8000000, 2, 2),
('5.1.2.02.04.0122', 'Belanja Sewa Alat Dapur', 6, 2021, 6600000, 2, 2),
('5.1.2.02.09.0015', 'Belanja Jasa Konsultansi Bidang Kepariwisataan-Jasa Konsultansi Destinasi Pariwisata', 6, 2021, 94750000, 2, 2),
('5.2.1.01.03.0011', 'Belanja Modal Tanah untuk Bangunan Bersejarah', 6, 2021, 3196000000, 2, 2),
('5.1.2.02.01.0024', 'Belanja Jasa Tenaga Arsip dan Perpustakaan', 6, 2021, 31750000, 2, 2),
('5.1.2.02.01.0045', 'Belanja Jasa Pelayanan Kearsipan', 6, 2021, 3600000, 2, 2),
('5.2.5.01.01.0005', 'Belanja Modal Buku Ilmu Bahasa', 6, 2021, 198000000, 2, 2),
('4.1.2.02.11', 'Retribusi Penjualan Produksi Usaha Daerah', 5, 2021, 1000000000, 1, 2),
('4.1.2.02.11.0003', 'Retribusi Penjualan Produksi hasil Usaha Daerah berupa Bibit atau Benih Ikan', 6, 2021, 500000000, 1, 2),
('4.1.2.02.11.0004', 'Retribusi Penjualan Produksi hasil Usaha Daerah selain Bibit atau Benih Tanaman, Ternak, dan Ikan', 6, 2021, 1000000000, 1, 2),
('4.1.2.03.04', 'Retribusi Izin Usaha Perikanan', 5, 2021, 2550000000, 1, 2),
('4.1.2.03.04.0001', 'Retribusi Pemberian Izin Kegiatan Usaha Penangkapan Ikan', 6, 2021, 2550000000, 1, 2),
('5.1.2.01.01.0011', 'Belanja Bahan-Bahan/Bibit Ternak/Bibit Ikan', 6, 2021, 39200000, 2, 2),
('5.1.2.02.01.0042', 'Belanja Jasa Pelaksanaan Transaksi Keuangan', 6, 2021, 5460000000, 2, 2),
('5.1.2.02.01.0057', 'Belanja Jasa Operator Kapal', 6, 2021, 120000000, 2, 2),
('5.1.2.03.02.0052', 'Belanja Pemeliharaan Alat Angkutan-Alat Angkutan Apung Bermotor-Alat Angkutan Apung Bermotor Lainnya', 6, 2021, 15000000, 2, 2),
('5.1.5.05.04', 'Belanja Hibah kepada Koperasi', 5, 2021, 604773500, 2, 2),
('5.1.5.05.04.0002', 'Belanja Hibah Barang kepada Koperasi', 6, 2021, 604773500, 2, 2),
('5.2.2.01.02', 'Belanja Modal Alat Besar Apung', 5, 2021, 9267452500, 2, 2),
('5.2.2.01.02.0004', 'Belanja Modal Kapal Tarik', 6, 2021, 20000000, 2, 2),
('5.2.2.01.02.0006', 'Belanja Modal Alat Besar Apung Lainnya', 6, 2021, 9247452500, 2, 2),
('5.2.2.01.03.0013', 'Belanja Modal Peralatan Selam', 6, 2021, 536153751, 2, 2),
('5.2.2.01.03.0016', 'Belanja Modal Alat Bantu Lainnya', 6, 2021, 4800000, 2, 2),
('4.1.2.02.11.0001', 'Retribusi Penjualan Produksi Hasil Usaha Daerah berupa Bibit atau Benih Tanaman', 6, 2021, 1552500000, 1, 2),
('5.1.2.01.01.0007', 'Belanja Bahan-Barang dalam Proses', 6, 2021, 72800000, 2, 2),
('5.1.2.03.02.0112', 'Belanja Pemeliharaan Alat Pertanian-Alat Pengolahan-Alat Pengolahan Lainnya', 6, 2021, 15000000, 2, 2),
('5.1.5.05.01.0003', 'Belanja Hibah Jasa kepada Badan dan Lembaga yang Bersifat Nirlaba, Sukarela dan Sosial yang Dibentuk Berdasarkan Peraturan Perundang-Undangan', 6, 2021, 0, 2, 2),
('5.2.2.04.01.0005', 'Belanja Modal Alat Laboratorium Pertanian', 6, 2021, 600000000, 2, 2),
('5.2.2.17', 'Belanja Modal Peralatan Proses/Produksi', 4, 2021, 120000000, 2, 2),
('5.2.2.17.01', 'Belanja Modal Unit Peralatan Proses/Produksi', 5, 2021, 120000000, 2, 2),
('5.2.2.17.01.0026', 'Belanja Modal Unit Peralatan Proses/Produksi Lainnya', 6, 2021, 120000000, 2, 2),
('5.2.4.01.01.0005', 'Belanja Modal Jalan Desa', 6, 2021, 199999200, 2, 2),
('5.1.2.01.01.0070', 'Belanja Pakaian Pelatihan Kerja', 6, 2021, 56000000, 2, 2),
('4.1.2.02.01.0001', 'Retribusi Penyewaan Tanah dan Bangunan', 6, 2021, 0, 1, 2),
('5.1.2.02.05.0030', 'Belanja Sewa Bangunan Gedung Tempat Kerja Lainnya', 6, 2021, 150000000, 2, 2),
('5.1.2.02.08.0014', 'Belanja Jasa Konsultansi Perencanaan Penataan Ruang-Jasa Perencanaan dan Perancangan Perkotaan', 6, 2021, 90000000, 2, 2),
('5.1.6.03.02', 'Belanja Bantuan Sosial Barang yang Direncanakan kepada Kelompok Masyarakat', 5, 2021, 0, 2, 2),
('5.1.6.03.02.0001', 'Belanja Bantuan Sosial Barang yang direncanakan kepada Kelompok Masyarakat', 6, 2021, 0, 2, 2),
('5.2.3.01.01.0014', 'Belanja Modal Bangunan Gedung Garasi/Pool', 6, 2021, 141230000, 2, 2),
('4.1.2.01.08', 'Retribusi Penggantian Biaya Cetak Peta', 5, 2021, 102000000, 1, 2),
('4.1.2.01.08.0001', 'Retribusi Penyediaan Peta Dasar (Garis)', 6, 2021, 2000000, 1, 2),
('4.1.2.01.08.0004', 'Retribusi Penyediaan Peta Tematik', 6, 2021, 100000000, 1, 2),
('5.1.2.01.01.0018', 'Belanja Suku Cadang-Suku Cadang Alat Studio dan Komunikasi', 6, 2021, 8070000, 2, 2),
('5.1.2.02.01.0047', 'Belanja Jasa Penyelenggaraan Acara', 6, 2021, 180000000, 2, 2),
('5.1.2.02.08.0031', 'Belanja Jasa Konsultansi Spesialis-Jasa Inspeksi Teknikal', 6, 2021, 0, 2, 2),
('5.1.2.02.09.0006', 'Belanja Jasa Konsultansi Berorientasi Bidang-Keuangan', 6, 2021, 200000000, 2, 2),
('5.2.2.06.01.0001', 'Belanja Modal Peralatan Studio Audio', 6, 2021, 18000000, 2, 2),
('5.1.2.02.04.0405', 'Belanja Sewa Personal Computer', 6, 2021, 4800000, 2, 2),
('4.1.3', 'Hasil Pengelolaan Kekayaan Daerah yang Dipisahkan', 3, 2021, 356265026558, 1, 2),
('4.1.3.01', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMN', 4, 2021, 526848905, 1, 2),
('4.1.3.01.01', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMN', 5, 2021, 526848905, 1, 2),
('4.1.3.01.01.0001', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMN', 6, 2021, 526848905, 1, 2),
('4.1.3.02', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD', 4, 2021, 355738177653, 1, 2),
('4.1.3.02.01', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD (Lembaga Keuangan)', 5, 2021, 329046680000, 1, 2),
('4.1.3.02.01.0001', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD (Lembaga Keuangan)', 6, 2021, 329046680000, 1, 2),
('4.1.3.02.02', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD (Aneka Usaha)', 5, 2021, 1691497653, 1, 2),
('4.1.3.02.02.0001', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD (Aneka Usaha)', 6, 2021, 1691497653, 1, 2),
('4.1.3.02.03', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD (Bidang Air Minum)', 5, 2021, 25000000000, 1, 2),
('4.1.3.02.03.0001', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada Perusahaan Milik Daerah/BUMD (Bidang Air Minum)', 6, 2021, 25000000000, 1, 2),
('4.1.4.01', 'Hasil Penjualan BMD yang Tidak Dipisahkan', 4, 2021, 5250000000, 1, 2),
('4.1.4.01.03', 'Hasil Penjualan Gedung dan Bangunan', 5, 2021, 50000000, 1, 2),
('4.1.4.01.03.0001', 'Hasil Penjualan Bangunan Gedung', 6, 2021, 50000000, 1, 2),
('4.1.4.01.06', 'Hasil Penjualan Aset Lainnya', 5, 2021, 5200000000, 1, 2),
('4.1.4.01.06.0002', 'Hasil Penjualan Aset Lainnya-Aset Lain-Lain', 6, 2021, 5200000000, 1, 2),
('4.1.4.05', 'Jasa Giro', 4, 2021, 30900000000, 1, 2),
('4.1.4.05.01', 'Jasa Giro pada Kas Daerah', 5, 2021, 30900000000, 1, 2),
('4.1.4.05.01.0001', 'Jasa Giro pada Kas Daerah', 6, 2021, 30900000000, 1, 2),
('4.1.4.08', 'Penerimaan atas Tuntutan Ganti Kerugian Keuangan Daerah', 4, 2021, 40000000, 1, 2),
('4.1.4.08.01', 'Tuntutan Ganti Kerugian Daerah terhadap Bendahara', 5, 2021, 0, 1, 2),
('4.1.4.08.01.0001', 'Tuntutan Ganti Kerugian Daerah terhadap Bendahara', 6, 2021, 0, 1, 2),
('4.1.4.08.02', 'Tuntutan Ganti Kerugian Daerah terhadap Pegawai Negeri Bukan Bendahara atau Pejabat Lain', 5, 2021, 40000000, 1, 2),
('4.1.4.08.02.0001', 'Tuntutan Ganti Kerugian Daerah terhadap Pegawai Negeri Bukan Bendahara atau Pejabat Lain', 6, 2021, 40000000, 1, 2),
('4.1.4.11', 'Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan', 4, 2021, 300000000, 1, 2),
('4.1.4.11.01', 'Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan', 5, 2021, 300000000, 1, 2),
('4.1.4.11.01.0001', 'Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan', 6, 2021, 300000000, 1, 2),
('4.1.4.15', 'Pendapatan dari Pengembalian', 4, 2021, 2650600000, 1, 2),
('4.1.4.15.03', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Gaji dan Tunjangan', 5, 2021, 2250600000, 1, 2),
('4.1.4.15.03.0001', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Gaji dan Tunjangan', 6, 2021, 2250600000, 1, 2),
('4.1.4.15.04', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Perjalanan Dinas', 5, 2021, 400000000, 1, 2),
('4.1.4.15.04.0001', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Perjalanan Dinas Dalam Negeri- Perjalanan Dinas Biasa', 6, 2021, 400000000, 1, 2),
('4.2', 'PENDAPATAN TRANSFER', 2, 2021, 7317180888300, 1, 2),
('4.2.1', 'Pendapatan Transfer Pemerintah Pusat', 3, 2021, 7317180888300, 1, 2),
('4.2.1.01', 'Dana Perimbangan', 4, 2021, 7317180888300, 1, 2),
('4.2.1.01.01', 'Dana Transfer Umum-Dana Bagi Hasil (DBH)', 5, 2021, 440441729300, 1, 2),
('4.2.1.01.01.0001', 'DBH Pajak Bumi dan Bangunan', 6, 2021, 91496739000, 1, 2),
('4.2.1.01.01.0002', 'DBH PPh Pasal 21', 6, 2021, 261353359000, 1, 2),
('4.2.1.01.01.0003', 'DBH PPh Pasal 25 dan Pasal 29/WPOPDN', 6, 2021, 28946479000, 1, 2),
('4.2.1.01.01.0004', 'DBH Cukai Hasil Tembakau (CHT)', 6, 2021, 3838485300, 1, 2),
('4.2.1.01.01.0005', 'DBH Sumber Daya Alam (SDA) Minyak Bumi', 6, 2021, 48793000, 1, 2),
('4.2.1.01.01.0006', 'DBH Sumber Daya Alam (SDA) Gas Bumi', 6, 2021, 293132000, 1, 2),
('4.2.1.01.01.0007', 'DBH Sumber Daya Alam (SDA) Pengusahaan Panas Bumi', 6, 2021, 3427158000, 1, 2),
('4.2.1.01.01.0008', 'DBH Sumber Daya Alam (SDA) Mineral dan Batubara-Landrent', 6, 2021, 1672772000, 1, 2),
('4.2.1.01.01.0009', 'Dana Bagi Hasil (DBH) Sumber Daya Alam (SDA) Mineral dan Batubara-Royalty', 6, 2021, 37240967000, 1, 2),
('4.2.1.01.01.0010', 'DBH Sumber Daya Alam (SDA) Kehutanan- Provisi Sumber Daya Hutan (PSDH)', 6, 2021, 3554255000, 1, 2),
('4.2.1.01.01.0012', 'DBH Sumber Daya Alam (SDA) Kehutanan- Dana Reboisasi (DR)', 6, 2021, 8569590000, 1, 2),
('4.2.1.01.02', 'Dana Transfer Umum-Dana Alokasi Umum (DAU)', 5, 2021, 2463686589000, 1, 2),
('4.2.1.01.02.0001', 'DAU', 6, 2021, 2463686589000, 1, 2),
('4.2.1.01.03', 'Dana Transfer Khusus-Dana Alokasi Khusus (DAK) Fisik', 5, 2021, 351822306000, 1, 2);
INSERT INTO `data_uraian_kegiatan_pemko` (`kode_rekening`, `uraian`, `level`, `tahun`, `anggaran`, `jenis`, `st_anggaran`) VALUES
('4.2.1.01.03.0004', 'DAK Fisik-Bidang Pendidikan-Reguler-SMA', 6, 2021, 194930650000, 1, 2),
('4.2.1.01.03.0005', 'DAK Fisik-Bidang Pendidikan-Reguler-SLB', 6, 2021, 1895050000, 1, 2),
('4.2.1.01.03.0011', 'DAK Fisik-Bidang Pendidikan-Reguler- Perpustakaan Daerah', 6, 2021, 500000000, 1, 2),
('4.2.1.01.03.0013', 'DAK Fisik-Bidang Kesehatan dan KB- Reguler-Pelayanan Kesehatan Dasar', 6, 2021, 1780492000, 1, 2),
('4.2.1.01.03.0014', 'DAK Fisik-Bidang Kesehatan dan KB- Reguler-Pelayanan Kesehatan Rujukan', 6, 2021, 32485929000, 1, 2),
('4.2.1.01.03.0017', 'DAK Fisik-Bidang Kesehatan dan KB- Penugasan-Penguatan Intervensi Stunting', 6, 2021, 19256700000, 1, 2),
('4.2.1.01.03.0031', 'DAK Fisik-Bidang Pertanian-Penugasan-Pembangunan/Renovasi Sarana dan Prasarana Fisik Dasar Pembangunan Pertanian', 6, 2021, 4735000000, 1, 2),
('4.2.1.01.03.0032', 'DAK Fisik-Bidang Kelautan dan Perikanan- Penugasan', 6, 2021, 350000000, 1, 2),
('4.2.1.01.03.0034', 'DAK Fisik-Bidang Jalan-Reguler-Jalan', 6, 2021, 13133236000, 1, 2),
('4.2.1.01.03.0035', 'DAK Fisik-Bidang Jalan-Penugasan-Jalan', 6, 2021, 70294554000, 1, 2),
('4.2.1.01.03.0043', 'DAK Fisik-Bidang Irigasi-Penugasan', 6, 2021, 11999999000, 1, 2),
('4.2.1.01.03.0046', 'DAK Fisik-Bidang Lingkungan Hidup dan Kehutanan-Penugasan-Kehutanan', 6, 2021, 460696000, 1, 2),
('4.2.1.01.04', 'Dana Transfer Khusus-Dana Alokasi Khusus (DAK) Non Fisik', 5, 2021, 4061230264000, 1, 2),
('4.2.1.01.04.0001', 'DAK Non Fisik-BOS Reguler', 6, 2021, 3338953850000, 1, 2),
('4.2.1.01.04.0002', 'DAK Non Fisik-BOS Afirmasi', 6, 2021, 19620000000, 1, 2),
('4.2.1.01.04.0003', 'DAK Non Fisik-BOS Kinerja', 6, 2021, 35280000000, 1, 2),
('4.2.1.01.04.0004', 'DAK Non Fisik-TPG PNSD', 6, 2021, 627207840000, 1, 2),
('4.2.1.01.04.0005', 'DAK Non Fisik-Tamsil Guru PNSD', 6, 2021, 3090000000, 1, 2),
('4.2.1.01.04.0006', 'DAK Non Fisik-TKG PNSD', 6, 2021, 19940535000, 1, 2),
('4.2.1.01.04.0009', 'DAK Non Fisik-BOP Museum dan Taman Budaya-Museum', 6, 2021, 1593200000, 1, 2),
('4.2.1.01.04.0011', 'DAK Non Fisik-BOKKB-BOK', 6, 2021, 9492240000, 1, 2),
('4.2.1.01.04.0014', 'DAK Non Fisik-BOKKB-Jaminan Persalinan', 6, 2021, 558332000, 1, 2),
('4.2.1.01.04.0016', 'DAK Non Fisik-PK2UKM', 6, 2021, 2352080000, 1, 2),
('4.2.1.01.04.0017', 'DAK Non Fisik-Dana Pelayanan Administrasi Kependudukan', 6, 2021, 2279609000, 1, 2),
('4.2.1.01.04.0018', 'DAK Non Fisik-Dana Pelayanan Kepariwisataan', 6, 2021, 862578000, 1, 2),
('4.3', 'LAIN-LAIN PENDAPATAN DAERAH YANG SAH', 2, 2021, 90068000000, 1, 2),
('4.3.1', 'Pendapatan Hibah', 3, 2021, 59568000000, 1, 2),
('4.3.1.01', 'Pendapatan Hibah dari Pemerintah Pusat', 4, 2021, 53500000000, 1, 2),
('4.3.1.01.01', 'Pendapatan Hibah dari Pemerintah Pusat', 5, 2021, 53500000000, 1, 2),
('4.3.1.01.01.0001', 'Pendapatan Hibah dari Pemerintah Pusat', 6, 2021, 53500000000, 1, 2),
('4.3.1.03', 'Pendapatan Hibah dari Kelompok Masyarakat/Perorangan Dalam Negeri', 4, 2021, 500000000, 1, 2),
('4.3.1.03.01', 'Pendapatan Hibah dari Kelompok Masyarakat/Perorangan Dalam Negeri', 5, 2021, 500000000, 1, 2),
('4.3.1.03.01.0001', 'Pendapatan Hibah dari Kelompok Masyarakat Dalam Negeri/Perorangan dalam Negeri', 6, 2021, 500000000, 1, 2),
('4.3.1.04', 'Pendapatan Hibah dari Badan/Lembaga/ Organisasi Dalam Negeri/Luar Negeri', 4, 2021, 5568000000, 1, 2),
('4.3.1.04.01', 'Pendapatan Hibah dari Badan/Lembaga/ Organisasi Dalam Negeri', 5, 2021, 5568000000, 1, 2),
('4.3.1.04.01.0001', 'Pendapatan Hibah dari Badan/Lembaga/ Organisasi Dalam Negeri', 6, 2021, 5568000000, 1, 2),
('4.3.3', 'Lain-lain Pendapatan Sesuai dengan Ketentuan Peraturan Perundang-Undangan', 3, 2021, 30500000000, 1, 2),
('4.3.3.01', 'Lain-lain Pendapatan', 4, 2021, 30500000000, 1, 2),
('4.3.3.01.01', 'Pendapatan Hibah Dana BOS', 5, 2021, 20000000000, 1, 2),
('4.3.3.01.01.0001', 'Pendapatan Hibah Dana BOS', 6, 2021, 20000000000, 1, 2),
('4.3.3.01.02', 'Pendapatan atas Pengembalian Hibah', 5, 2021, 10500000000, 1, 2),
('4.3.3.01.02.0001', 'Pendapatan atas Pengembalian Hibah pada Pemerintah', 6, 2021, 0, 1, 2),
('4.3.3.01.02.0005', 'Pendapatan atas Pengembalian Hibah pada Badan, Lembaga, dan Organisasi Kemasyarakatan yang Berbadan hukum Indonesia', 6, 2021, 10500000000, 1, 2),
('5.1.2.02.04.0116', 'Belanja Sewa Alat Penyimpan Perlengkapan Kantor', 6, 2021, 30000000, 2, 2),
('5.1.2.02.09.0002', 'Belanja Jasa Konsultansi Berorientasi Bidang-Transportasi', 6, 2021, 350000000, 2, 2),
('5.3', 'BELANJA TIDAK TERDUGA', 2, 2021, 21058512853, 2, 2),
('5.3.1', 'Belanja Tidak Terduga', 3, 2021, 21058512853, 2, 2),
('5.3.1.01', 'Belanja Tidak Terduga', 4, 2021, 21058512853, 2, 2),
('5.3.1.01.01', 'Belanja Tidak Terduga', 5, 2021, 21058512853, 2, 2),
('5.3.1.01.01.0001', 'Belanja Tidak Terduga', 6, 2021, 21058512853, 2, 2),
('5.4', 'BELANJA TRANSFER', 2, 2021, 2576947489813, 2, 2),
('5.4.1', 'Belanja Bagi Hasil', 3, 2021, 2576947489813, 2, 2),
('5.4.1.01', 'Belanja Bagi Hasil Pajak Daerah Kepada Pemerintahan Kabupaten/Kota dan Desa', 4, 2021, 2576947489813, 2, 2),
('5.4.1.01.01', 'Belanja Bagi Hasil Pajak Daerah Kepada Pemerintahan Kabupaten', 5, 2021, 1434444567946, 2, 2),
('5.4.1.01.01.0001', 'Belanja Bagi Hasil Pajak Daerah Kepada Pemerintahan Kabupaten', 6, 2021, 1434444567946, 2, 2),
('5.4.1.01.02', 'Belanja Bagi Hasil Pajak Daerah Kepada Pemerintahan Kota', 5, 2021, 1142502921867, 2, 2),
('5.4.1.01.02.0001', 'Belanja Bagi Hasil Pajak Daerah Kepada Pemerintahan Kota', 6, 2021, 1142502921867, 2, 2),
('6.1', 'PENERIMAAN PEMBIAYAAN', 2, 2021, 476782631305, 3, 2),
('6.1.1', 'Sisa Lebih Perhitungan Anggaran Tahun Sebelumnya', 3, 2021, 476782631305, 3, 2),
('6.1.1.05', 'Penghematan Belanja', 4, 2021, 476782631305, 3, 2),
('6.1.1.05.03', 'Sisa Penggunaan Belanja Tidak Terduga', 5, 2021, 476782631305, 3, 2),
('6.1.1.05.03.0001', 'Sisa Penggunaan Belanja Tidak Terduga', 6, 2021, 476782631305, 3, 2),
('6.2', 'PENGELUARAN PEMBIAYAAN', 2, 2021, 210500000000, 4, 2),
('6.2.2', 'Penyertaan Modal Daerah', 3, 2021, 210500000000, 4, 2),
('6.2.2.02', 'Penyertaan Modal Daerah pada Badan Usaha Milik Daerah (BUMD)', 4, 2021, 210500000000, 4, 2),
('6.2.2.02.01', 'Penyertaan Modal Daerah pada BUMD', 5, 2021, 210500000000, 4, 2),
('6.2.2.02.01.0001', 'Penyertaan Modal Daerah pada BUMD', 6, 2021, 210500000000, 4, 2),
('5.1.1.03.01', 'Belanja Insentif bagi ASN atas Pemungutan Pajak Daerah', 5, 2021, 0, 2, 2),
('5.1.1.03.01.0001', 'Belanja Insentif bagi ASN atas Pemungutan Pajak Kendaraan Bermotor', 6, 2021, 0, 2, 2),
('5.1.2.02.01.0011', 'Honorarium Penyelenggaraan Kegiatan Pendidikan dan Pelatihan', 6, 2021, 528800000, 2, 2),
('5.1.2.02.04.0404', 'Belanja Sewa Komputer Jaringan', 6, 2021, 82500000, 2, 2),
('5.1.2.02.08.0029', 'Belanja Jasa Konsultansi Spesialis-Jasa Pengujian dan Analisa Parameter Fisikal', 6, 2021, 1500000, 2, 2),
('5.1.1.04', 'Belanja Gaji dan Tunjangan DPRD', 4, 2021, 123747510610, 2, 2),
('5.1.1.04.01', 'Belanja Uang Representasi DPRD', 5, 2021, 3222939000, 2, 2),
('5.1.1.04.01.0001', 'Belanja Uang Representasi DPRD', 6, 2021, 3222939000, 2, 2),
('5.1.1.04.02', 'Belanja Tunjangan Keluarga DPRD', 5, 2021, 368501000, 2, 2),
('5.1.1.04.02.0001', 'Belanja Tunjangan Keluarga DPRD', 6, 2021, 368501000, 2, 2),
('5.1.1.04.03', 'Belanja Tunjangan Beras DPRD', 5, 2021, 281185000, 2, 2),
('5.1.1.04.03.0001', 'Belanja Tunjangan Beras DPRD', 6, 2021, 281185000, 2, 2),
('5.1.1.04.04', 'Belanja Uang Paket DPRD', 5, 2021, 396113000, 2, 2),
('5.1.1.04.04.0001', 'Belanja Uang Paket DPRD', 6, 2021, 396113000, 2, 2),
('5.1.1.04.05', 'Belanja Tunjangan Jabatan DPRD', 5, 2021, 4640215000, 2, 2),
('5.1.1.04.05.0001', 'Belanja Tunjangan Jabatan DPRD', 6, 2021, 4640215000, 2, 2),
('5.1.1.04.06', 'Belanja Tunjangan Alat Kelengkapan DPRD', 5, 2021, 671243000, 2, 2),
('5.1.1.04.06.0001', 'Belanja Tunjangan Alat Kelengkapan DPRD', 6, 2021, 671243000, 2, 2),
('5.1.1.04.07', 'Belanja Tunjangan Alat Kelengkapan Lainnya DPRD', 5, 2021, 95306000, 2, 2),
('5.1.1.04.07.0001', 'Belanja Tunjangan Alat Kelengkapan Lainnya DPRD', 6, 2021, 95306000, 2, 2),
('5.1.1.04.08', 'Belanja Tunjangan Komunikasi Intensif Pimpinan dan Anggota DPRD', 5, 2021, 25200000000, 2, 2),
('5.1.1.04.08.0001', 'Belanja Tunjangan Komunikasi Intensif Pimpinan dan Anggota DPRD', 6, 2021, 25200000000, 2, 2),
('5.1.1.04.09', 'Belanja Tunjangan Reses DPRD', 5, 2021, 6300000000, 2, 2),
('5.1.1.04.09.0001', 'Belanja Tunjangan Reses DPRD', 6, 2021, 6300000000, 2, 2),
('5.1.1.04.10', 'Belanja Pembebanan PPh kepada Pimpinan dan Anggota DPRD', 5, 2021, 158615000, 2, 2),
('5.1.1.04.10.0001', 'Belanja Pembebanan PPh kepada Pimpinan dan Anggota DPRD', 6, 2021, 158615000, 2, 2),
('5.1.1.04.12', 'Belanja Tunjangan Kesejahteraan Pimpinan dan Anggota DPRD', 5, 2021, 53929185000, 2, 2),
('5.1.1.04.12.0001', 'Belanja Iuran Jaminan Kesehatan bagi DPRD', 6, 2021, 3588853000, 2, 2),
('5.1.1.04.12.0002', 'Belanja Jaminan Kecelakaan Kerja DPRD', 6, 2021, 6583000, 2, 2),
('5.1.1.04.12.0003', 'Belanja Jaminan Kematian DPRD', 6, 2021, 19749000, 2, 2),
('5.1.1.04.12.0004', 'Belanja Tunjangan Perumahan DPRD', 6, 2021, 50314000000, 2, 2),
('5.1.1.04.13', 'Belanja Tunjangan Transportasi DPRD', 5, 2021, 28356083610, 2, 2),
('5.1.1.04.13.0001', 'Belanja Tunjangan Transportasi DPRD', 6, 2021, 28356083610, 2, 2),
('5.1.1.04.14', 'Belanja Uang Jasa Pengabdian DPRD', 5, 2021, 128125000, 2, 2),
('5.1.1.04.14.0001', 'Belanja Uang Jasa Pengabdian DPRD', 6, 2021, 128125000, 2, 2),
('5.1.1.06', 'Belanja Penerimaan Lainnya Pimpinan DPRD serta KDH/WKDH', 4, 2021, 9395520381, 2, 2),
('5.1.1.06.01', 'Belanja Dana Operasional Pimpinan DPRD', 5, 2021, 676800000, 2, 2),
('5.1.1.06.01.0001', 'Belanja Dana Operasional Pimpinan DPRD', 6, 2021, 676800000, 2, 2),
('5.1.2.02.01.0066', 'Belanja Registrasi/Keanggotaan', 6, 2021, 76000000, 2, 2),
('5.1.2.02.08.0007', 'Belanja Jasa Konsultansi Perencanaan Rekayasa-Jasa Desain Rekayasa untuk Konstruksi Pondasi serta Struktur Bangunan', 6, 2021, 36210000, 2, 2),
('5.1.2.02.08.0034', 'Belanja Jasa Konsultansi Lainnya-Jasa Manajemen Proyek Terkait Konstruksi Bangunan', 6, 2021, 15490000, 2, 2),
('5.2.4.01.02.0006', 'Belanja Modal Jembatan pada Jalan Tol', 6, 2021, 0, 2, 2),
('4.1.1', 'Pajak Daerah', 3, 2021, 5706083586846, 1, 2),
('4.1.1.01', 'Pajak Kendaraan Bermotor (PKB)', 4, 2021, 2293605395740, 1, 2),
('4.1.1.01.01', 'PKB-Mobil Penumpang-Sedan', 5, 2021, 34486371316, 1, 2),
('4.1.1.01.01.0001', 'PKB-Mobil Penumpang-Sedan-Pribadi', 6, 2021, 32938191268, 1, 2),
('4.1.1.01.01.0002', 'PKB-Mobil Penumpang-Sedan-Umum', 6, 2021, 52690074, 1, 2),
('4.1.1.01.01.0004', 'PKB-Mobil Penumpang-Sedan-Pemerintah Daerah', 6, 2021, 1495489974, 1, 2),
('4.1.1.01.02', 'PKB-Mobil Penumpang-Jeep', 5, 2021, 288950125987, 1, 2),
('4.1.1.01.02.0001', 'PKB-Mobil Penumpang-Jeep-Pribadi', 6, 2021, 284462179034, 1, 2),
('4.1.1.01.02.0004', 'PKB-Mobil Penumpang-Jeep-Pemerintah Daerah', 6, 2021, 4487946953, 1, 2),
('4.1.1.01.03', 'PKB-Mobil Penumpang-Minibus', 5, 2021, 1153718532079, 1, 2),
('4.1.1.01.03.0001', 'PKB-Mobil Penumpang-Minibus-Pribadi', 6, 2021, 1136537356089, 1, 2),
('4.1.1.01.03.0002', 'PKB-Mobil Penumpang-Minibus-Umum', 6, 2021, 2732571732, 1, 2),
('4.1.1.01.03.0004', 'PKB-Mobil Penumpang-Minibus-Pemerintah Daerah', 6, 2021, 14448604258, 1, 2),
('4.1.1.01.04', 'PKB-Mobil Bus-Microbus', 5, 2021, 7496239543, 1, 2),
('4.1.1.01.04.0001', 'PKB-Mobil Bus-Microbus-Pribadi', 6, 2021, 6298113815, 1, 2),
('4.1.1.01.04.0002', 'PKB-Mobil Bus-Microbus-Umum', 6, 2021, 288142357, 1, 2),
('4.1.1.01.04.0004', 'PKB-Mobil Bus-Microbus-Pemerintah Daerah', 6, 2021, 909983371, 1, 2),
('4.1.1.01.05', 'PKB-Mobil Bus-Bus', 5, 2021, 5756557775, 1, 2),
('4.1.1.01.05.0001', 'PKB-Mobil Bus-Bus-Pribadi', 6, 2021, 3218450071, 1, 2),
('4.1.1.01.05.0002', 'PKB-Mobil Bus-Bus-Umum', 6, 2021, 2219395524, 1, 2),
('4.1.1.01.05.0004', 'PKB-Mobil Bus-Bus-Pemerintah Daerah', 6, 2021, 318712180, 1, 2),
('4.1.1.01.06', 'PKB-Mobil Barang/Beban-Pick Up', 5, 2021, 166014095512, 1, 2),
('4.1.1.01.06.0001', 'PKB-Mobil Barang/Beban-Pick Up-Pribadi', 6, 2021, 161281690854, 1, 2),
('4.1.1.01.06.0002', 'PKB-Mobil Barang/Beban-Pick Up-Umum', 6, 2021, 162434393, 1, 2),
('4.1.1.01.06.0004', 'PKB-Mobil Barang/Beban-Pick Up-Pemerintah Daerah', 6, 2021, 4569970265, 1, 2),
('4.1.1.01.07', 'PKB-Mobil Barang/Beban-Light Truck', 5, 2021, 3447376850, 1, 2),
('4.1.1.01.07.0001', 'PKB-Mobil Barang/Beban-Light Truck-Pribadi', 6, 2021, 2944372688, 1, 2),
('4.1.1.01.07.0002', 'PKB-Mobil Barang/Beban-Light Truck-Umum', 6, 2021, 409420575, 1, 2),
('4.1.1.01.07.0004', 'PKB-Mobil Barang/Beban-Light Truck- Pemerintah Daerah', 6, 2021, 93583587, 1, 2),
('4.1.1.01.08', 'PKB-Mobil Barang/Beban-Truck', 5, 2021, 193333212472, 1, 2),
('4.1.1.01.08.0001', 'PKB-Mobil Barang/Beban-Truck-Pribadi', 6, 2021, 77124207818, 1, 2),
('4.1.1.01.08.0002', 'PKB-Mobil Barang/Beban-Truck-Umum', 6, 2021, 112369970324, 1, 2),
('4.1.1.01.08.0004', 'PKB-Mobil Barang/Beban-Truck-Pemerintah Daerah', 6, 2021, 3839034330, 1, 2),
('4.1.1.01.10', 'PKB-Sepeda Motor-Sepeda Motor Roda Dua', 5, 2021, 439365025852, 1, 2),
('4.1.1.01.10.0001', 'PKB-Sepeda Motor-Sepeda Motor Roda Dua- Pribadi', 6, 2021, 437341214161, 1, 2),
('4.1.1.01.10.0002', 'PKB-Sepeda Motor-Sepeda Motor Roda Dua- Umum', 6, 2021, 3353538, 1, 2),
('4.1.1.01.10.0004', 'PKB-Sepeda Motor-Sepeda Motor Roda Dua- Pemerintah Daerah', 6, 2021, 2020458153, 1, 2),
('4.1.1.01.11', 'PKB-Sepeda Motor-Sepeda Motor Roda Tiga', 5, 2021, 743454416, 1, 2),
('4.1.1.01.11.0001', 'PKB-Sepeda Motor-Sepeda Motor Roda Tiga- Pribadi', 6, 2021, 458627030, 1, 2),
('4.1.1.01.11.0002', 'PKB-Sepeda Motor-Sepeda Motor Roda Tiga- Umum', 6, 2021, 103261025, 1, 2),
('4.1.1.01.11.0004', 'PKB-Sepeda Motor-Sepeda Motor Roda Tiga- Pemerintah Daerah', 6, 2021, 181566361, 1, 2),
('4.1.1.01.13', 'PKB-Kendaraan Khusus Alat Berat/Alat Besar', 5, 2021, 294403938, 1, 2),
('4.1.1.01.13.0001', 'PKB-Kendaraan Khusus Alat Berat/Alat Besar-Pribadi', 6, 2021, 259363459, 1, 2),
('4.1.1.01.13.0002', 'PKB-Kendaraan Khusus Alat Berat/Alat Besar-Umum', 6, 2021, 35040479, 1, 2),
('4.1.1.02', 'Bea Balik Nama Kendaraan Bermotor (BBNKB)', 4, 2021, 1238578316758, 1, 2),
('4.1.1.02.01', 'BBNKB-Mobil Penumpang-Sedan', 5, 2021, 16590388973, 1, 2),
('4.1.1.02.01.0001', 'BBNKB-Mobil Penumpang-Sedan', 6, 2021, 16590388973, 1, 2),
('4.1.1.02.02', 'BBNKB-Mobil Penumpang-Jeep', 5, 2021, 139005491166, 1, 2),
('4.1.1.02.02.0001', 'BBNKB-Mobil Penumpang-Jeep', 6, 2021, 139005491166, 1, 2),
('4.1.1.02.03', 'BBNKB-Mobil Penumpang-Minibus', 5, 2021, 555020388626, 1, 2),
('4.1.1.02.03.0001', 'BBNKB-Mobil Penumpang-Minibus', 6, 2021, 555020388626, 1, 2),
('4.1.1.02.04', 'BBNKB-Mobil Bus-Microbus', 5, 2021, 5138556711, 1, 2),
('4.1.1.02.04.0001', 'BBNKB-Mobil Bus-Microbus', 6, 2021, 5138556711, 1, 2),
('4.1.1.02.05', 'BBNKB-Mobil Bus-Bus', 5, 2021, 3946031663, 1, 2),
('4.1.1.02.05.0001', 'BBNKB-Mobil Bus-Bus', 6, 2021, 3946031663, 1, 2),
('4.1.1.02.06', 'BBNKB-Mobil Barang/Beban-Pick Up', 5, 2021, 64129908262, 1, 2),
('4.1.1.02.06.0001', 'BBNKB-Mobil Barang/Beban-Pick Up', 6, 2021, 64129908262, 1, 2),
('4.1.1.02.07', 'BBNKB-Mobil Barang/Beban-Light Truck', 5, 2021, 1331693917, 1, 2),
('4.1.1.02.07.0001', 'BBNKB-Mobil Barang/Beban-Light Truck', 6, 2021, 1331693917, 1, 2),
('4.1.1.02.08', 'BBNKB-Mobil Barang/Beban-Truck', 5, 2021, 74683063156, 1, 2),
('4.1.1.02.08.0001', 'BBNKB-Mobil Barang/Beban-Truck', 6, 2021, 74683063156, 1, 2),
('4.1.1.02.10', 'BBNKB-Sepeda Motor-Sepeda Motor Roda Dua', 5, 2021, 378092168889, 1, 2),
('4.1.1.02.10.0001', 'BBNKB-Sepeda Motor-Sepeda Motor Roda Dua', 6, 2021, 378092168889, 1, 2),
('4.1.1.02.11', 'BBNKB-Sepeda Motor-Sepeda Motor Roda Tiga', 5, 2021, 639773937, 1, 2),
('4.1.1.02.11.0001', 'BBNKB-Sepeda Motor-Sepeda Motor Roda Tiga', 6, 2021, 639773937, 1, 2),
('4.1.1.02.13', 'BBNKB-Kendaraan Khusus Alat Berat', 5, 2021, 851458, 1, 2),
('4.1.1.02.13.0001', 'BBNKB-Kendaraan Khusus Alat Berat', 6, 2021, 851458, 1, 2),
('4.1.1.03', 'Pajak Bahan Bakar Kendaraan Bermotor (PBBKB)', 4, 2021, 1036674544484, 1, 2),
('4.1.1.03.01', 'PBBKB-Bahan Bakar Bensin', 5, 2021, 500361673351, 1, 2),
('4.1.1.03.01.0001', 'PBBKB Bahan Bakar Bensin', 6, 2021, 500361673351, 1, 2),
('4.1.1.03.02', 'PBBKB-Bahan Bakar Solar', 5, 2021, 309888447109, 1, 2),
('4.1.1.03.02.0001', 'PBBKB Bahan Bakar Solar', 6, 2021, 309888447109, 1, 2),
('4.1.1.03.04', 'PBBKB-Bahan Bakar Lainnya', 5, 2021, 226424424024, 1, 2),
('4.1.1.03.04.0001', 'PBBKB Bahan Bakar Lainnya', 6, 2021, 226424424024, 1, 2),
('4.1.1.04', 'Pajak Air Permukaan', 4, 2021, 76489854175, 1, 2),
('4.1.1.04.01', 'Pajak Air Permukaan', 5, 2021, 76489854175, 1, 2),
('4.1.1.04.01.0001', 'Pajak Air Permukaan', 6, 2021, 76489854175, 1, 2),
('4.1.1.05', 'Pajak Rokok', 4, 2021, 1060735475689, 1, 2),
('4.1.1.05.01', 'Pajak Rokok', 5, 2021, 1060735475689, 1, 2),
('4.1.1.05.01.0001', 'Pajak Rokok', 6, 2021, 1060735475689, 1, 2),
('4.1.4.12', 'Pendapatan Denda Pajak Daerah', 4, 2021, 69677525781, 1, 2),
('4.1.4.12.01', 'Pendapatan Denda Pajak Kendaraan Bermotor (PKB)', 5, 2021, 67197481083, 1, 2),
('4.1.4.12.01.0001', 'Pendapatan Denda PKB-Mobil Penumpang- Sedan', 6, 2021, 880457284, 1, 2),
('4.1.4.12.01.0002', 'Pendapatan Denda PKB-Mobil Penumpang- Jeep', 6, 2021, 8091766171, 1, 2),
('4.1.4.12.01.0003', 'Pendapatan Denda PKB-Mobil Penumpang- Minibus', 6, 2021, 30884510721, 1, 2),
('4.1.4.12.01.0004', 'Pendapatan Denda PKB-Mobil Bus-Microbus', 6, 2021, 250753677, 1, 2),
('4.1.4.12.01.0005', 'Pendapatan Denda PKB-Mobil Bus-Bus', 6, 2021, 192560285, 1, 2),
('4.1.4.12.01.0006', 'Pendapatan Denda PKB-Mobil Barang/Beban-Pick Up', 6, 2021, 5268587843, 1, 2),
('4.1.4.12.01.0007', 'Pendapatan Denda PKB-Mobil Barang/Beban-Light Truck', 6, 2021, 109405215, 1, 2),
('4.1.4.12.01.0008', 'Pendapatan Denda PKB-Mobil Barang/Beban-Truck', 6, 2021, 6850281498, 1, 2),
('4.1.4.12.01.0010', 'Pendapatan Denda PKB-Sepeda Motor- Sepeda Motor Roda Dua', 6, 2021, 14631206528, 1, 2),
('4.1.4.12.01.0011', 'Pendapatan Denda PKB-Sepeda Motor- Sepeda Motor Roda Tiga', 6, 2021, 22338923, 1, 2),
('4.1.4.12.01.0013', 'Pendapatan Denda PKB-Kendaraan Khusus Alat Berat/Alat Besar', 6, 2021, 15612938, 1, 2),
('4.1.4.12.02', 'Pendapatan Denda Bea Balik Nama Kendaraan Bermotor (BBNKB)', 5, 2021, 2470044698, 1, 2),
('4.1.4.12.02.0001', 'Pendapatan Denda BBNKB-Mobil Penumpang-Sedan', 6, 2021, 23291525, 1, 2),
('4.1.4.12.02.0002', 'Pendapatan Denda BBNKB-Mobil Penumpang-Jeep', 6, 2021, 195152134, 1, 2),
('4.1.4.12.02.0003', 'Pendapatan Denda BBNKB-Mobil Penumpang-Minibus', 6, 2021, 779202408, 1, 2),
('4.1.4.12.02.0004', 'Pendapatan Denda BBNKB-Mobil Bus- Microbus', 6, 2021, 12482730, 1, 2),
('4.1.4.12.02.0005', 'Pendapatan Denda BBNKB-Mobil Bus-Bus', 6, 2021, 9585814, 1, 2),
('4.1.4.12.02.0006', 'Pendapatan Denda BBNKB-Mobil Barang/Beban-Pick Up', 6, 2021, 206399547, 1, 2),
('4.1.4.12.02.0007', 'Pendapatan Denda BBNKB-Mobil Barang/Beban-Light Truck', 6, 2021, 4286004, 1, 2),
('4.1.4.12.02.0008', 'Pendapatan Denda BBNKB-Mobil Barang/Beban-Truck', 6, 2021, 240364455, 1, 2),
('4.1.4.12.02.0010', 'Pendapatan Denda BBNKB-Sepeda Motor- Sepeda Motor Roda Dua', 6, 2021, 997542037, 1, 2),
('4.1.4.12.02.0011', 'Pendapatan Denda BBNKB-Sepeda Motor- Sepeda Motor Roda Tiga', 6, 2021, 1687952, 1, 2),
('4.1.4.12.02.0013', 'Pendapatan Denda BBNKB-Kendaraan Khusus Alat Berat', 6, 2021, 50092, 1, 2),
('4.1.4.12.04', 'Pendapatan Denda Pajak Air Permukaan', 5, 2021, 10000000, 1, 2),
('4.1.4.12.04.0001', 'Pendapatan Denda Pajak Air Permukaan', 6, 2021, 10000000, 1, 2),
('5.1.1.03.01.0002', 'Belanja Insentif bagi ASN atas Pemungutan Bea Balik Nama Kendaraan Bermotor', 6, 2021, 35717946693, 2, 2),
('5.1.1.03.01.0003', 'Belanja Insentif bagi ASN atas Pemungutan Pajak Bahan Bakar Kendaraan Bermotor', 6, 2021, 20492840587, 2, 2),
('5.1.1.03.01.0004', 'Belanja Insentif bagi ASN atas Pemungutan Pajak Air Permukaan', 6, 2021, 2426329265, 2, 2),
('5.1.1.05', 'Belanja Gaji dan Tunjangan KDH/WKDH', 4, 2021, 574231878, 2, 2),
('5.1.1.05.10', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Pajak Daerah', 5, 2021, 1922724380, 2, 2),
('5.1.1.05.10.0001', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Pajak Kendaraan Bermotor bagi KDH/WKDH', 6, 2021, 641280920, 2, 2),
('5.1.1.05.10.0002', 'Belanja Insentif Pemungutan bagi KDH/WKDH atas Bea Balik Nama Kendaraan Bermotor', 6, 2021, 849753950, 2, 2),
('5.1.1.05.10.0003', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Pajak Bahan Bakar Kendaraan Bermotor', 6, 2021, 402026445, 2, 2),
('5.1.1.05.10.0004', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Pajak Air Permukaan', 6, 2021, 29663065, 2, 2),
('5.1.2.02.04.0410', 'Belanja Sewa Peralatan Jaringan', 6, 2021, 416058500, 2, 2),
('5.1.2.02.13', 'Belanja Jasa Insentif bagi Pegawai Non ASN atas Pemungutan Pajak Daerah', 5, 2021, 11625309174, 2, 2),
('5.1.2.02.13.0001', 'Belanja Jasa Insentif bagi Pegawai Non ASN atas Pemungutan Pajak Kendaraan Bermotor', 6, 2021, 4922100651, 2, 2),
('5.1.2.02.13.0002', 'Belanja Jasa Insentif Pegawai Non ASN atas Pemungutan Bea Balik Nama Kendaraan Bermotor', 6, 2021, 3593184860, 2, 2),
('5.1.2.02.13.0003', 'Belanja Jasa Insentif Pegawai Non ASN atas Pemungutan Pajak Bahan Bakar Kendaraan Bermotor', 6, 2021, 3110023663, 2, 2),
('5.1.2.02.01.0021', 'Belanja Jasa Tenaga Sumber Daya Air', 6, 2021, 17500000, 2, 2),
('5.1.2.02.07.0030', 'Belanja Sewa Alat Peraga Kesenian', 6, 2021, 3500000, 2, 2),
('5.2.3.04.01.0003', 'Belanja Modal Pilar/Tugu/Tanda Lainnya', 6, 2021, 180000000, 2, 2),
('5.1.1.05.01', 'Belanja Gaji Pokok KDH/WKDH', 5, 2021, 77112000, 2, 2),
('5.1.1.05.01.0001', 'Belanja Gaji Pokok KDH/WKDH', 6, 2021, 77112000, 2, 2),
('5.1.1.05.02', 'Belanja Tunjangan Keluarga KDH/WKDH', 5, 2021, 9939000, 2, 2),
('5.1.1.05.02.0001', 'Belanja Tunjangan Keluarga KDH/WKDH', 6, 2021, 9939000, 2, 2),
('5.1.1.05.03', 'Belanja Tunjangan Jabatan KDH/WKDH', 5, 2021, 138802000, 2, 2),
('5.1.1.05.03.0001', 'Belanja Tunjangan Jabatan KDH/WKDH', 6, 2021, 138802000, 2, 2),
('5.1.1.05.04', 'Belanja Tunjangan Beras KDH/WKDH', 5, 2021, 6889780, 2, 2),
('5.1.1.05.04.0001', 'Belanja Tunjangan Beras KDH/WKDH', 6, 2021, 6889780, 2, 2),
('5.1.1.05.05', 'Belanja Tunjangan PPh/Tunjangan Khusus KDH/WKDH', 5, 2021, 10588000, 2, 2),
('5.1.1.05.05.0001', 'Belanja Tunjangan PPh/Tunjangan Khusus KDH/WKDH', 6, 2021, 10588000, 2, 2),
('5.1.1.05.06', 'Belanja Pembulatan Gaji KDH/WKDH', 5, 2021, 2098, 2, 2),
('5.1.1.05.06.0001', 'Belanja Pembulatan Gaji KDH/WKDH', 6, 2021, 2098, 2, 2),
('5.1.1.05.07', 'Belanja Iuran Jaminan Kesehatan bagi KDH/WKDH', 5, 2021, 330264000, 2, 2),
('5.1.1.05.07.0001', 'Belanja Iuran Jaminan Kesehatan bagi KDH/WKDH', 6, 2021, 330264000, 2, 2),
('5.1.1.05.08', 'Belanja Iuran Jaminan Kecelakaan Kerja KDH/WKDH', 5, 2021, 159000, 2, 2),
('5.1.1.05.08.0001', 'Belanja Iuran Jaminan Kecelakaan Kerja KDH/WKDH', 6, 2021, 159000, 2, 2),
('5.1.1.05.09', 'Belanja Iuran Jaminan Kematian KDH/WKDH', 5, 2021, 476000, 2, 2),
('5.1.1.05.09.0001', 'Belanja Iuran Jaminan Kematian KDH/WKDH', 6, 2021, 476000, 2, 2),
('5.1.1.06.02', 'Belanja Dana Operasional KDH/WKDH', 5, 2021, 9395520381, 2, 2),
('5.1.1.06.02.0001', 'Belanja Dana Operasional KDH/WKDH', 6, 2021, 9395520381, 2, 2),
('5.1.2.01.01.0059', 'Belanja Pakaian Dinas KDH dan WKDH', 6, 2021, 661000000, 2, 2),
('5.1.2.02.07.0013', 'Belanja Sewa Audio Visual', 6, 2021, 500000000, 2, 2),
('5.1.2.03.03.0038', 'Belanja Pemeliharaan Bangunan Gedung- Bangunan Gedung Tempat Tinggal-Rumah Negara Golongan I', 6, 2021, 0, 2, 2),
('5.1.2.03.04.0048', 'Belanja Pemeliharaan Bangunan Air- Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pengaman Sungai/Pantai dan Penanggulangan ', 6, 2021, 400000000, 2, 2),
('5.2.2.01.03.0001', 'Belanja Modal Alat Penarik', 6, 2021, 218000000, 2, 2),
('5.2.2.02.01.0002', 'Belanja Modal Kendaraan Bermotor Penumpang', 6, 2021, 4650000000, 2, 2),
('5.2.2.02.02.0002', 'Belanja Modal Kendaraan Tak Bermotor Penumpang', 6, 2021, 100000000, 2, 2),
('5.2.2.07.02.0004', 'Belanja Modal Alat Kesehatan Olahraga', 6, 2021, 265000000, 2, 2),
('5.2.4.03.10', 'Belanja Modal Instalasi Lain', 5, 2021, 400000000, 2, 2),
('5.2.4.03.10.0001', 'Belanja Modal Instalasi Lain', 6, 2021, 400000000, 2, 2),
('5.1.2.03.02.0133', 'Belanja Pemeliharaan Alat Studio, Komunikasi, dan Pemancar-Alat Studio- Peralatan Studio Video dan Film', 6, 2021, 200000000, 2, 2),
('5.2.2.04.01.0002', 'Belanja Modal Alat Pemeliharaan Tanaman/Ikan/Ternak', 6, 2021, 0, 2, 2),
('6.1.1.01', 'Pelampauan Penerimaan PAD', 4, 2021, 0, 3, 2),
('6.1.1.01.02', 'Pelampauan Penerimaan PAD-Retribusi Daerah', 5, 2021, 0, 3, 2),
('4.3.4.01.02', 'Dana Insentif Daerah (DID)', 5, 2022, 0, 2, 1),
('4.3.5', 'Dana Desa', 3, 2022, 0, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_uraian_kegiatan_skpd`
--

CREATE TABLE `data_uraian_kegiatan_skpd` (
  `id_uraian` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `kode_rekening` varchar(16) NOT NULL,
  `level` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `anggaran` double NOT NULL,
  `jenis` int(11) NOT NULL COMMENT '1:Pendapatan, 2:Belanja, 3:Penerimaan, 4:Pengeluaran',
  `st_anggaran` int(11) NOT NULL COMMENT '1:APBD, 2:PAPBD',
  `is_transfer` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kegiatan_skpd`
--

CREATE TABLE `detail_kegiatan_skpd` (
  `id_kegiatan_skpd` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `kode_rekening` varchar(30) NOT NULL,
  `uraian` varchar(250) NOT NULL,
  `level` int(11) NOT NULL,
  `parent` varchar(30) NOT NULL,
  `tahun` int(11) NOT NULL,
  `anggaran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kegiatan_skpd_backup`
--

CREATE TABLE `detail_kegiatan_skpd_backup` (
  `id_kegiatan_skpd` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `kode_rekening` varchar(30) NOT NULL,
  `uraian` varchar(250) NOT NULL,
  `level` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `anggaran` double NOT NULL,
  `st_anggaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_realisasi_skpd`
--

CREATE TABLE `detail_realisasi_skpd` (
  `id_realisasi_skpd` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `kode_rekening` varchar(30) NOT NULL,
  `uraian` varchar(250) NOT NULL,
  `level` int(11) NOT NULL,
  `parent` varchar(30) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `anggaran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pelaksanaan`
--

CREATE TABLE `jenis_pelaksanaan` (
  `id_jenis_pelaksanaan` int(11) NOT NULL,
  `nama_jenis_pelaksanaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pelaksanaan`
--

INSERT INTO `jenis_pelaksanaan` (`id_jenis_pelaksanaan`, `nama_jenis_pelaksanaan`) VALUES
(1, 'Pengadaan Langsung'),
(2, 'e-Purchasing'),
(3, 'Tender'),
(4, 'Penunjukan Langsung'),
(5, 'Tender Cepat'),
(6, 'Seleksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(1) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pekerjaan Konstruksi'),
(2, 'Pengadaan Barang'),
(3, 'Jasa Lainnya'),
(4, 'Jasa Konsultansi Badan Usaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_dokumentasi`
--

CREATE TABLE `kegiatan_dokumentasi` (
  `id_dokumentasi` int(11) NOT NULL,
  `id_kegiatan_detail` int(11) NOT NULL,
  `file_dokumentasi` varchar(100) NOT NULL,
  `user_input` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan_dokumentasi`
--

INSERT INTO `kegiatan_dokumentasi` (`id_dokumentasi`, `id_kegiatan_detail`, `file_dokumentasi`, `user_input`, `tgl_input`) VALUES
(19, 23, '23-20211115-024023.png', 34, '2021-11-15 02:40:23'),
(20, 23, '23-20211115-024038.png', 34, '2021-11-15 02:40:38'),
(21, 8475, '8475-20220622-121228.png', 1, '2022-06-22 12:12:28'),
(22, 8476, '8476-20220719-210913.jpg', 2, '2022-07-19 21:09:13'),
(23, 8476, '8476-20220719-210921.jpg', 2, '2022-07-19 21:09:21'),
(24, 8477, '8477-20220719-212345.png', 2, '2022-07-19 21:23:45'),
(25, 8478, '8478-20220719-213745.png', 2, '2022-07-19 21:37:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_strategis`
--

CREATE TABLE `kegiatan_strategis` (
  `id_kegiatan` int(2) NOT NULL,
  `id_prioritas` int(1) NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `urutan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan_strategis`
--

INSERT INTO `kegiatan_strategis` (`id_kegiatan`, `id_prioritas`, `nama_kegiatan`, `urutan`) VALUES
(1, 1, 'Pembangunan unit sekolah baru menengah, kejuruan dan khusus sebanyak 26 (dua puluh enam) unit dalam rangka memenuhi akses pemerataan layanan pendidikan', 1),
(2, 1, 'Pemberian Bantuan Operasional Pendidikan (BOP) untuk siswa/i jenjang SMA, SMK, dan SLB Negeri dengan prioritas intervensi kepada siswa/i kurang mampu sejumlah 167.000 (seratus enam puluh tujuh ribu) jiwa', 2),
(3, 1, 'Pembangunan kampung beasiswa scholarships booth sebagai wadah informasi beasiswa S1, S2, S3 di pekan raya Sumatera Utara Medan', 3),
(4, 1, 'Kerjasama link and match sekolah menengah kejuruan (SMK)/vokasi dengan dunia usaha dunia industri', 4),
(5, 1, 'Penyelarasan kurikulum vokasi/SMK dengan jumlah sebanyak 70 (tujuh puluh) kompetensi keahlian vokasi ', 5),
(6, 1, 'Teaching factory atau pembelajaran berbasis produk dan bisnis dengan jumlah sebanyak 70 (tujuh puluh) kompetensi keahlian vokasi ', 6),
(7, 1, 'MoU dan MoA yang ditandatangani melalui kerjasama link and match antara SMK dan dunia usaha dan dunia industri dengan jumlah sebanyak 210 (dua ratus sepuluh) MoU/MoA kerjasama', 7),
(8, 1, 'Pembangunan 33 (tiga puluh tiga) unit pojok baca dan gerobak baca serta pengembangan perpustakaan digital (e- library)', 8),
(9, 1, 'Gubernur/Wakil Gubernur Sumatera Utara menyapa melalui kelas motivasi bagi siswa/i sekolah menengah atas dan kejuruan se- Sumatera Utara', 9),
(10, 1, 'Penguatan materi kearifan lokal serta penyelarasan kecerdasan spiritual, emosional dan intelektual dalam kurikulum melalui pola integrasi ilmu', 10),
(11, 1, 'Penguatan pembelajaran jarak jauh (distance learning) melalui metode Training of Trainer (ToT) Pada tenaga pendidik dari 33 (tiga puluh tiga) Kabupaten/kota', 11),
(12, 2, 'Penanganan covid-19 melalui penguatan pola 3T (testing, tracing, treatment), percepatan vaksinasi, penyediaan obat – obatan, penguatan kapasitas rumah sakit dan pemberian insentif bagi tenaga medis', 1),
(13, 2, 'Pembangunan Dan Rehabilitasi Rumah Sakit Haji Medan Dalam Rangka Peningkatan Layanan Kesehatan Masyarakat', 2),
(14, 2, 'Pemberian makanan tambahan bagi ibu hamil Kurang Energi Kronis (Kek), balita kurus dan anak sekolah sebanyak 250.000 (dua ratus lima puluh ribu) jiwa dalam rangka penurunan prevalensi stunting', 3),
(15, 2, 'Peningkatan kapasitas layanan kesehatan melalui penambahan 100 (seratus) bed dalam rangka rehabilitasi narkoba pada rumah sakit jiwa prof. Dr. M. Ildrem', 4),
(16, 2, 'Kampanye Gerakan Masyarakat Sehat (GERMAS) melalui peningkatan Komunikasi, Informasi Dan Edukasi (KIE) pada masyarakat di 33 (tiga puluh tiga) kabupaten/kota se-sumatera utara', 5),
(17, 2, 'Pemberian jaminan kesehatan bagi Penerima Bantuan Iuran (PBI) provinsi kepada masyarakat kurang mampu sebanyak 420.000 (empat ratus dua puluh ribu) jiwa dan penyediaan kontribusi bagi peserta PBI JKN sebanyak 4.733.689 (empat juta tujuh ratus tiga puluh tiga ribu enam ratus delapan puluh sembilan) jiwa', 6),
(18, 2, 'Layanan kesehatan bergerak melalui pengadaan 8 (delapan) unit mobil medis/bus kesehatan.', 7),
(19, 3, 'Fasilitasi Kerja Sama 10 (Sepuluh) Sektor Ekonomi Dengan Dunia Usaha Dan Dunia Industri Dalam Rangka Peningkatan Kompetensi Dan Kesempatan Kerja', 1),
(20, 3, 'Fasilitasi standarisasi 1000 (seribu) UMKM dan IKM menuju digitalisasi pemasaran', 2),
(21, 3, 'Pengembangan sistem informasi ketenagakerjaan terintegrasi melalui bursa kerja online', 3),
(22, 3, 'Penguatan kebijakan daerah dalam rangka optimalisasi investasi melalui peraturan daerah tentang pemberian insentif dan kemudahan penanaman modal serta peraturan daerah tentang Rencana Umum Penanaman Modal (RUPM)', 4),
(23, 4, 'Peningkatan produksi daging sapi menjadi sebesar 17.149,75 ton dalam rangka pemenuhan kebutuhan konsumsi', 1),
(24, 4, 'Peningkatan produksi daging kambing/domba menjadi sebesar 1.537,50 ton dalam rangka pemenuhan kebutuhan konsumsi dan ekspor', 2),
(25, 4, 'Mempertahankan swasembada beras dan jagung dalam rangka pemenuhan kebutuhan konsumsi dan industri', 3),
(26, 4, 'Peningkatan produksi cabe merah sebesar 190.011 (seratus sembilan puluh ribu sebelas) ton dan bawang putih sebesar 1.421 (seribu empat ratus dua Puluh satu) ton serta bawang merah sebesar 18.675 (delapan belas ribu enam ratus tujuh puluh lima) ton dalam rangka pemenuhan kebutuhan konsumsi dan industri', 4),
(27, 4, 'Peningkatan produksi perikanan tangkap sebesar 459.403,89 (empat ratus lima puluh sembilan ribu empat ratus tiga koma delapan puluh sembilan) ton dan produksi perikanan budidaya sebesar 216.996 (dua ratus enam belas ribu sembilan ratus sembilan puluh enam) ton dalam rangka memenuhi kebutuhan konsumsi dan ekspor.', 5),
(28, 5, 'Pengembangan kawasan pariwisata, meliputi ekowisata tangkahan, bahorok/ bukit lawang - langkat; agrowisata ulu pungkut - madina; wisata alam dan budaya - kepulauan nias; wisata religi dan sejarah barus – tapanuli tengah; wisata religi dan sejarah candi bahal – padang lawas utara;', 1),
(29, 5, 'Pengembangan desa wisata melalui 3 (tiga) konsep tematik yaitu agro, eko dan budaya ', 2),
(30, 5, 'Dukungan penataan cagar budaya kesultanan langkat, situs benteng putri hijau, bawomataluo dan lapangan merdeka medan.', 3),
(31, 5, 'Dukungan pengembangan destinasi pariwisata super prioritas danau toba melalui pemenuhan 6 (enam) rekomendasi UNESCO dalam rangka mempertahankan status UNESCO Global Geopark Kaldera Toba;', 4),
(32, 5, 'Digitalisasi promosi pariwisata;', 5),
(33, 5, 'Pelestarian budaya daerah melalui pemberdayaan forum kesultanan daerah.', 6),
(34, 6, 'Mempertahankan pencapaian opini Wajar Tanpa Pengecualian (WTP) terhadap laporan keuangan pemerintah daerah provinsi dan dukungan pencapaian 80 (delapan puluh) persen opini Wajar Tanpa Pengecualian (WTP) pada pemerintah kabupaten/kota se-sumatera utara dalam peran Gubernur sebagai Wakil Pemerintah Pusat di daerah (GWPP)', 1),
(35, 6, 'Peningkatan capaian nilai Sistem Akuntabilitas Kinerja Instansi Pemerintah (SAKIP) dengan target predikat BB', 2),
(36, 6, 'Peningkatan Capaian Indeks Pelayanan Publik Dengan Target Predikat A', 3),
(37, 7, 'Penguatan Pusat Wawasan Kebangsaan Dalam Rangka Peningkatan Kebebasan Berpendapat, Berserikat Dan Bebas Diskriminasi Di Provinsi Sumatera Utara', 1),
(38, 7, 'Pembangunan 300 Kampung  Bersinar (Bersih Narkoba)', 2),
(39, 7, 'Channel layanan pengaduan masyarakat terkait Pembangunan Sumatera Utara', 3),
(40, 7, 'Gubernur dan Wakil Gubernur mendengar melalui kegiatan dialog dengan masyarakat secara langsung maupun virtual', 4),
(41, 7, 'Pencapaian Standart Pelayanan Minimal (SPM) bidang sosial melalui peningkatan pelayanan panti yang menjadi kewenangan Provinsi Sumatera Utara', 5),
(42, 7, 'Peningkatan pembinaan atlet berprestasi dan tenaga keolahragaan serta peningkatan sarana prasarana olahraga dalam rangka pekan olahraga nasional tahun 2024', 6),
(43, 7, 'Pemberian suplemen tambahan bagi atlet olahraga prestasi', 7),
(44, 7, 'Pembangunan sports centre di daerah kualanamu', 8),
(45, 7, 'Persiapan Tuan Rumah Pekan Olahraga Nasional XXI Tahun 2024', 9),
(46, 7, 'Dukungan Pembangunan dan Rehabilitasi Rumah Ibadah', 10),
(47, 8, 'Penanganan jalan strategis provinsi dalam kondisi baik yang meliputi jalan strategis kawasan wisata, kawasan pusat produktivitas, perkotaan dan kawasan daerah tertinggal sepanjang 218,22 (dua ratus delapan belas koma dua puluh dua) kilometer dan pencapaian tingkat kemantapan jalan provinsi sumatera utara sampai dengan 85 (delapan puluh lima) persen', 1),
(48, 8, 'Fasilitasi penyelesaian masalah pertanahan dan tata ruang melalui penguatan, penegakan hukum dan kelembagaan', 2),
(49, 8, 'Optimalisasi jaringan irigasi sebesar lebih kurang 65.000 (enam puluh lima ribu) hektar;', 3),
(50, 8, 'Pembangunan dan pengelolaan Tempat Pembuangan Akhir (TPA) Regional Mebidang', 4),
(51, 8, 'Pembangunan Sistem Penyediaan Air Minum (SPAM) Mebidang', 5),
(52, 8, 'Pembangunan role model pengurangan luas kawasan kumuh terintegrasi dan rehabilitasi rumah tidak layak huni (RTLH) sebanyak 1000 (seribu) unit;', 6),
(53, 8, 'Penurunan emisi gas rumah kaca 35,55 (tiga puluh lima koma lima puluh lima) juta eq. Co2 (ekuivalensi karbondioksida) melalui kebijakan daerah tentang pembangunan rendah karbon', 7),
(54, 8, 'Penyediaan energi listrik dalam rangka pemenuhan kebutuhan listrik rumah tangga miskin sebanyak 8.745 (delapan ribu tujuh ratus empat puluh lima) kepala keluarga dan dukungan terhadap pelaksanaan sistem pertanian terintegrasi sebanyak 7 (tujuh) unit pembangkit listrik tenaga surya.', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_realisasi_keuangan`
--

CREATE TABLE `laporan_realisasi_keuangan` (
  `id_laporan` int(5) NOT NULL,
  `id_skpd` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `bulan` int(2) NOT NULL,
  `level` int(1) NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `user_input` int(3) NOT NULL,
  `tanggal_terima` datetime NOT NULL,
  `user_terima` int(3) NOT NULL,
  `id_kepala` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan_realisasi_keuangan`
--

INSERT INTO `laporan_realisasi_keuangan` (`id_laporan`, `id_skpd`, `tahun`, `bulan`, `level`, `tanggal_input`, `user_input`, `tanggal_terima`, `user_terima`, `id_kepala`) VALUES
(1, 33, 2021, 1, 1, '2021-11-09 21:35:26', 34, '0000-00-00 00:00:00', 0, 1),
(2, 33, 2021, 2, 2, '2021-11-09 21:43:26', 34, '0000-00-00 00:00:00', 0, 1),
(3, 1, 2021, 1, 3, '2021-11-09 21:45:30', 1, '0000-00-00 00:00:00', 0, 2),
(4, 1, 2021, 7, 6, '2021-11-09 21:46:09', 1, '0000-00-00 00:00:00', 0, 2),
(5, 33, 2021, 3, 3, '2021-11-23 05:35:42', 34, '0000-00-00 00:00:00', 0, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_upload`
--

CREATE TABLE `log_upload` (
  `id_log` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `st_data` int(11) NOT NULL DEFAULT '1' COMMENT '1:pemko, 2:SKPD',
  `tgl_data` date NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `user_input` int(11) NOT NULL,
  `namafile` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_upload_realisasi`
--

CREATE TABLE `log_upload_realisasi` (
  `id_log` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `tgl_data` date NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `user_input` int(11) NOT NULL,
  `jenis` int(11) NOT NULL DEFAULT '1' COMMENT '1: dak, 2:dk, 3:tp'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_user`
--

CREATE TABLE `log_user` (
  `log_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `aktivitas` varchar(100) NOT NULL,
  `aktivitas_detail` text NOT NULL,
  `browser` varchar(200) NOT NULL,
  `waktu_akses` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_user`
--

INSERT INTO `log_user` (`log_id`, `username`, `aktivitas`, `aktivitas_detail`, `browser`, `waktu_akses`) VALUES
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 06:15:44'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 06:47:55'),
(2147483647, 'admin', 'new tbl_mandatory', '{\"tbl_mandatory\":{\"id_kabupaten\":\"34\",\"tahun\":\"2022\",\"pendidikan\":\"10000000\",\"kesehatan\":\"20000000\",\"infrastruktur\":\"30000000\",\"pengawasan\":\"4000000\",\"persen_pendidikan\":\"20\",\"persen_kesehatan\":\"31\",\"persen_infrestruktur\":\"30\",\"persen_pengawasan\":\"25\",\"st_apbd\":\"1\"}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 06:52:33'),
(2147483647, 'admin', 'update tbl_mandatory', '{\"tbl_mandatory\":{\"old\":{\"id_mandatory\":\"39\",\"tahun\":\"2022\",\"id_kabupaten\":\"34\",\"pendidikan\":\"10000000\",\"persen_pendidikan\":\"20\",\"kesehatan\":\"20000000\",\"persen_kesehatan\":\"31\",\"infrastruktur\":\"30000000\",\"persen_infrestruktur\":\"30\",\"fkub\":\"0\",\"persen_fkub\":\"0\",\"kompetisi\":\"0\",\"persen_kompetisi\":\"0\",\"pengawasan\":\"4000000\",\"persen_pengawasan\":\"25\",\"st_apbd\":\"1\"},\"new\":{\"tahun\":\"2022\",\"pendidikan\":\"100000001\",\"kesehatan\":\"200000001\",\"infrastruktur\":\"300000001\",\"pengawasan\":\"40000001\",\"persen_pendidikan\":\"20\",\"persen_kesehatan\":\"31\",\"persen_infrestruktur\":\"30\",\"persen_pengawasan\":\"25\",\"st_apbd\":\"1\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 06:53:06'),
(2147483647, 'admin', 'update tbl_mandatory', '{\"tbl_mandatory\":{\"old\":{\"id_mandatory\":\"39\",\"tahun\":\"2022\",\"id_kabupaten\":\"34\",\"pendidikan\":\"100000001\",\"persen_pendidikan\":\"20\",\"kesehatan\":\"200000001\",\"persen_kesehatan\":\"31\",\"infrastruktur\":\"300000001\",\"persen_infrestruktur\":\"30\",\"fkub\":\"0\",\"persen_fkub\":\"0\",\"kompetisi\":\"0\",\"persen_kompetisi\":\"0\",\"pengawasan\":\"40000001\",\"persen_pengawasan\":\"25\",\"st_apbd\":\"1\"},\"new\":{\"tahun\":\"2022\",\"pendidikan\":\"100000001\",\"kesehatan\":\"200000001\",\"infrastruktur\":\"300000001\",\"pengawasan\":\"40000001\",\"persen_pendidikan\":\"21\",\"persen_kesehatan\":\"32\",\"persen_infrestruktur\":\"32\",\"persen_pengawasan\":\"22\",\"st_apbd\":\"1\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 06:53:22'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:36:06'),
(2147483647, 'admin', 'delete menu', '{\"users_menu\":{\"menu_id\":\"26\",\"menu_name\":\"TKDD Kabupaten\\/Kota\",\"menu_link\":\"tkdd-kabupaten-kota\",\"menu_icon\":\"-\",\"is_main_menu\":\"22\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"4\"},\"users_access\":[{\"access_id\":\"43\",\"role_id\":\"1\",\"menu_id\":\"26\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"access_id\":\"67\",\"role_id\":\"3\",\"menu_id\":\"26\",\"akses\":\"N\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"}]}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:40:49'),
(2147483647, 'admin', 'delete menu', '{\"users_menu\":{\"menu_id\":\"25\",\"menu_name\":\"APBD Kabupaten\\/Kota\",\"menu_link\":\"apbd-kabupaten-kota\",\"menu_icon\":\"-\",\"is_main_menu\":\"22\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"3\"},\"users_access\":[{\"access_id\":\"42\",\"role_id\":\"1\",\"menu_id\":\"25\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"access_id\":\"66\",\"role_id\":\"3\",\"menu_id\":\"25\",\"akses\":\"N\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"}]}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:40:54'),
(2147483647, 'admin', 'delete menu', '{\"users_menu\":{\"menu_id\":\"24\",\"menu_name\":\"Mandatory Kabupaten\\/Kota\",\"menu_link\":\"mandatory-kabupaten-kota\",\"menu_icon\":\"-\",\"is_main_menu\":\"22\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"2\"},\"users_access\":[{\"access_id\":\"41\",\"role_id\":\"1\",\"menu_id\":\"24\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"access_id\":\"65\",\"role_id\":\"3\",\"menu_id\":\"24\",\"akses\":\"N\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"}]}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:40:58'),
(2147483647, 'admin', 'delete menu', '{\"users_menu\":{\"menu_id\":\"23\",\"menu_name\":\"Anggaran Kabupaten\\/Kota\",\"menu_link\":\"anggaran-kabupaten-kota\",\"menu_icon\":\"-\",\"is_main_menu\":\"22\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"1\"},\"users_access\":[{\"access_id\":\"40\",\"role_id\":\"1\",\"menu_id\":\"23\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"access_id\":\"64\",\"role_id\":\"3\",\"menu_id\":\"23\",\"akses\":\"N\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"}]}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:41:01'),
(2147483647, 'admin', 'delete menu', '{\"users_menu\":{\"menu_id\":\"27\",\"menu_name\":\"Dana Desa\",\"menu_link\":\"data-dana-desa\",\"menu_icon\":\"-\",\"is_main_menu\":\"22\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"5\"},\"users_access\":[{\"access_id\":\"44\",\"role_id\":\"1\",\"menu_id\":\"27\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"access_id\":\"68\",\"role_id\":\"3\",\"menu_id\":\"27\",\"akses\":\"N\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"}]}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:41:20'),
(2147483647, 'admin', 'delete menu', '{\"users_menu\":{\"menu_id\":\"22\",\"menu_name\":\"Kabupaten\\/Kota\",\"menu_link\":\"#kabupaten_kota\",\"menu_icon\":\"fa fa-book\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"7\"},\"users_access\":[{\"access_id\":\"39\",\"role_id\":\"1\",\"menu_id\":\"22\",\"akses\":\"Y\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"},{\"access_id\":\"63\",\"role_id\":\"3\",\"menu_id\":\"22\",\"akses\":\"N\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"}]}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:41:23'),
(2147483647, 'admin', 'delete menu', '{\"users_menu\":{\"menu_id\":\"32\",\"menu_name\":\"LRA Kabupaten\\/Kota\",\"menu_link\":\"upload-lra-kabupaten-kota\",\"menu_icon\":\"-\",\"is_main_menu\":\"28\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"4\"},\"users_access\":[{\"access_id\":\"49\",\"role_id\":\"1\",\"menu_id\":\"32\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"access_id\":\"73\",\"role_id\":\"3\",\"menu_id\":\"32\",\"akses\":\"N\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"}]}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:41:30'),
(2147483647, 'admin', 'update menu', '{\"users_menu\":{\"old\":{\"menu_id\":\"28\",\"menu_name\":\"Upload Data\",\"menu_link\":\"#upload_data\",\"menu_icon\":\"fa fa-upload\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"8\"},\"new\":{\"menu_name\":\"Upload Data\",\"menu_link\":\"#upload_data\",\"menu_icon\":\"fa fa-upload\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"6\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:42:38'),
(2147483647, 'admin', 'update menu', '{\"users_menu\":{\"old\":{\"menu_id\":\"28\",\"menu_name\":\"Upload Data\",\"menu_link\":\"#upload_data\",\"menu_icon\":\"fa fa-upload\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"6\"},\"new\":{\"menu_name\":\"Upload Data\",\"menu_link\":\"#upload_data\",\"menu_icon\":\"fa fa-upload\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"7\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:42:48'),
(2147483647, 'admin', 'update menu', '{\"users_menu\":{\"old\":{\"menu_id\":\"34\",\"menu_name\":\"Realisasi APBN\",\"menu_link\":\"#realisasi_apbn\",\"menu_icon\":\"fa fa-list\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"9\"},\"new\":{\"menu_name\":\"Realisasi APBN\",\"menu_link\":\"#realisasi_apbn\",\"menu_icon\":\"fa fa-list\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"7\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:43:01'),
(2147483647, 'admin', 'update menu', '{\"users_menu\":{\"old\":{\"menu_id\":\"34\",\"menu_name\":\"Realisasi APBN\",\"menu_link\":\"#realisasi_apbn\",\"menu_icon\":\"fa fa-list\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"7\"},\"new\":{\"menu_name\":\"Realisasi APBN\",\"menu_link\":\"#realisasi_apbn\",\"menu_icon\":\"fa fa-list\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"8\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:43:07'),
(2147483647, 'admin', 'update menu', '{\"users_menu\":{\"old\":{\"menu_id\":\"38\",\"menu_name\":\"Laporan\",\"menu_link\":\"#laporan\",\"menu_icon\":\"fa fa-industry\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"10\"},\"new\":{\"menu_name\":\"Laporan\",\"menu_link\":\"#laporan\",\"menu_icon\":\"fa fa-industry\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"9\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:43:15'),
(2147483647, 'admin', 'update menu', '{\"users_menu\":{\"old\":{\"menu_id\":\"9\",\"menu_name\":\"Data User\",\"menu_link\":\"#users\",\"menu_icon\":\"fa fa-users\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"11\"},\"new\":{\"menu_name\":\"Data User\",\"menu_link\":\"#users\",\"menu_icon\":\"fa fa-users\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"10\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:43:23'),
(2147483647, 'admin', 'update menu', '{\"users_menu\":{\"old\":{\"menu_id\":\"2\",\"menu_name\":\"Konfigurasi\",\"menu_link\":\"#konfigurasi\",\"menu_icon\":\"fa fa-user-lock\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"12\"},\"new\":{\"menu_name\":\"Konfigurasi\",\"menu_link\":\"#konfigurasi\",\"menu_icon\":\"fa fa-user-lock\",\"is_main_menu\":\"0\",\"fitur_add\":\"N\",\"fitur_update\":\"N\",\"fitur_delete\":\"N\",\"fitur_update_1\":\"N\",\"fitur_delete_1\":\"N\",\"urutan\":\"11\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:43:30'),
(2147483647, 'admin', 'insert menu', '{\"users_menu\":{\"menu_name\":\"Nama Daerah\",\"menu_link\":\"nama-daerah\",\"menu_icon\":\"-\",\"is_main_menu\":\"5\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"1\"}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:45:58'),
(2147483647, 'admin', 'update menu', '{\"users_menu\":{\"old\":{\"menu_id\":\"6\",\"menu_name\":\"Data SKPD\",\"menu_link\":\"data-skpd\",\"menu_icon\":\"-\",\"is_main_menu\":\"5\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"1\"},\"new\":{\"menu_name\":\"Data SKPD\",\"menu_link\":\"data-skpd\",\"menu_icon\":\"-\",\"is_main_menu\":\"5\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"2\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:46:04'),
(2147483647, 'admin', 'update menu', '{\"users_menu\":{\"old\":{\"menu_id\":\"7\",\"menu_name\":\"Jenis Pelaksanaan\",\"menu_link\":\"jenis-pelaksanaan\",\"menu_icon\":\"-\",\"is_main_menu\":\"5\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"2\"},\"new\":{\"menu_name\":\"Jenis Pelaksanaan\",\"menu_link\":\"jenis-pelaksanaan\",\"menu_icon\":\"-\",\"is_main_menu\":\"5\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"3\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:46:11'),
(2147483647, 'admin', 'update menu', '{\"users_menu\":{\"old\":{\"menu_id\":\"8\",\"menu_name\":\"Kepala SKPD\",\"menu_link\":\"kepala-skpd\",\"menu_icon\":\"-\",\"is_main_menu\":\"5\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"3\"},\"new\":{\"menu_name\":\"Kepala SKPD\",\"menu_link\":\"kepala-skpd\",\"menu_icon\":\"-\",\"is_main_menu\":\"5\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"4\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:46:18'),
(2147483647, 'admin', 'update access menu', '{\"users_access\":{\"old\":{\"access_id\":\"1\",\"role_id\":\"1\",\"menu_id\":\"1\",\"akses\":\"Y\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"},\"new\":[{\"menu_id\":\"1\",\"akses\":\"Y\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"},{\"menu_id\":\"5\",\"akses\":\"Y\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"},{\"menu_id\":\"42\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"6\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"7\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"8\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"12\",\"akses\":\"Y\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"},{\"menu_id\":\"13\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"14\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"15\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"16\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"17\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"18\",\"akses\":\"Y\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"},{\"menu_id\":\"19\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"20\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"21\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"28\",\"akses\":\"Y\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"},{\"menu_id\":\"29\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"30\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"31\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"33\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"34\",\"akses\":\"Y\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"},{\"menu_id\":\"35\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"36\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"37\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"38\",\"akses\":\"Y\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"},{\"menu_id\":\"39\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"40\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"41\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"9\",\"akses\":\"Y\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"},{\"menu_id\":\"10\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"11\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"2\",\"akses\":\"Y\",\"tambah\":\"N\",\"ubah\":\"N\",\"hapus\":\"N\",\"ubah_1\":\"N\",\"hapus_1\":\"N\"},{\"menu_id\":\"3\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"},{\"menu_id\":\"4\",\"akses\":\"Y\",\"tambah\":\"Y\",\"ubah\":\"Y\",\"hapus\":\"Y\",\"ubah_1\":\"Y\",\"hapus_1\":\"Y\"}]}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 07:47:24'),
(2147483647, 'admin', 'update ta_kabupaten', '{\"ta_kabupaten\":{\"old\":{\"id_kabupaten\":\"34\",\"nama_kabupaten\":\"PROVINSI SUMATERA UTARA\",\"kabupaten_danadesa\":\"\",\"kode\":\"1\"},\"new\":{\"nama_kabupaten\":\"PROVINSI SUMATERA UTARA1\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 08:08:45'),
(2147483647, 'admin', 'update ta_kabupaten', '{\"ta_kabupaten\":{\"old\":{\"id_kabupaten\":\"34\",\"nama_kabupaten\":\"PROVINSI SUMATERA UTARA1\",\"kabupaten_danadesa\":\"\",\"kode\":\"1\"},\"new\":{\"nama_kabupaten\":\"PROVINSI SUMATERA UTARA123\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 08:08:53'),
(2147483647, 'admin', 'update ta_kabupaten', '{\"ta_kabupaten\":{\"old\":{\"id_kabupaten\":\"34\",\"nama_kabupaten\":\"PROVINSI SUMATERA UTARA123\",\"kabupaten_danadesa\":\"\",\"kode\":\"1\"},\"new\":{\"nama_kabupaten\":\"PROVINSI SUMATERA UTARA\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 08:08:59'),
(2147483647, 'admin', 'update ta_kabupaten', '{\"ta_kabupaten\":{\"old\":{\"id_kabupaten\":\"34\",\"nama_kabupaten\":\"PROVINSI SUMATERA UTARA\",\"kabupaten_danadesa\":\"\",\"kode\":\"1\"},\"new\":{\"nama_kabupaten\":\"NAMA KABUPATEN KOTA\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-21 08:09:45'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-22 09:50:44'),
(2147483647, 'admin', 'update ta_kabupaten', '{\"ta_kabupaten\":{\"old\":{\"id_kabupaten\":\"34\",\"nama_kabupaten\":\"NAMA KABUPATEN KOTA\",\"kabupaten_danadesa\":\"\",\"kode\":\"1\"},\"new\":{\"nama_kabupaten\":\"KABUPATEN LABUHANBATU SELATAN\"}}}', '{\"browser\":\"Firefox\",\"version\":\"102.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-22 09:52:20'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-25 04:27:46'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-25 06:04:57'),
(2147483647, 'admin', 'update setting_anggaran', '{\"setting_anggaran\":{\"old\":{\"id_setting\":\"2\",\"tahun\":\"2022\",\"pendapatan\":\"12011625563716\",\"belanja\":\"12649625563716\",\"papbd\":\"2022-10-28\"},\"new\":{\"tahun\":\"2022\",\"pendapatan\":\"898316782992\",\"belanja\":\"936316782992\",\"papbd\":\"2022-10-28\"}}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-25 06:12:23'),
(2147483647, 'admin', 'update tbl_mandatory', '{\"tbl_mandatory\":{\"old\":{\"id_mandatory\":\"39\",\"tahun\":\"2022\",\"id_kabupaten\":\"34\",\"pendidikan\":\"100000001\",\"persen_pendidikan\":\"21\",\"kesehatan\":\"200000001\",\"persen_kesehatan\":\"32\",\"infrastruktur\":\"300000001\",\"persen_infrestruktur\":\"32\",\"fkub\":\"0\",\"persen_fkub\":\"0\",\"kompetisi\":\"0\",\"persen_kompetisi\":\"0\",\"pengawasan\":\"40000001\",\"persen_pengawasan\":\"22\",\"st_apbd\":\"1\"},\"new\":{\"tahun\":\"2022\",\"pendidikan\":\"257745400269\",\"kesehatan\":\"160007163028\",\"infrastruktur\":\"200418751736\",\"pengawasan\":\"67788110000\",\"persen_pendidikan\":\"28.05\",\"persen_kesehatan\":\"22.45\",\"persen_infrestruktur\":\"41.63\",\"persen_pengawasan\":\"12.61\",\"st_apbd\":\"1\"}}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-25 06:13:39'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-25 07:43:11'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.01\",\"level\":\"5\",\"anggaran\":\"65.587.406.000\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-25 07:45:10'),
(2147483647, 'admin', 'update data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"old\":{\"id_uraian\":\"1\",\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.01\",\"level\":\"5\",\"tahun\":\"2022\",\"anggaran\":\"65.587\",\"jenis\":\"1\",\"st_anggaran\":\"1\"},\"new\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.01\",\"level\":\"5\",\"anggaran\":\"65587406000\",\"jenis\":\"1\",\"st_anggaran\":\"1\"}}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-25 07:45:19'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.02\",\"level\":\"5\",\"anggaran\":\"472807253000\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-25 07:45:36'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.03\",\"level\":\"5\",\"anggaran\":\"65189319000\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-25 07:45:59'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.04\",\"level\":\"5\",\"anggaran\":\"111530796000\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-25 07:46:21'),
(2147483647, 'admin', 'update menu', '{\"users_menu\":{\"old\":{\"menu_id\":\"15\",\"menu_name\":\"Dana Transfer\",\"menu_link\":\"dana-transfer\",\"menu_icon\":\"-\",\"is_main_menu\":\"12\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"3\"},\"new\":{\"menu_name\":\"Dana Transfer &amp;  PAD\",\"menu_link\":\"dana-transfer\",\"menu_icon\":\"-\",\"is_main_menu\":\"12\",\"fitur_add\":\"Y\",\"fitur_update\":\"Y\",\"fitur_delete\":\"Y\",\"fitur_update_1\":\"Y\",\"fitur_delete_1\":\"Y\",\"urutan\":\"3\"}}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-25 07:57:06'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-25 11:17:16'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-25 11:18:31'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 06:10:03'),
(2147483647, 'admin', 'delete log_upload', '{\"log_upload\":{\"id_log\":\"1\",\"tahun\":\"2022\",\"bulan\":\"7\",\"id_skpd\":\"1\",\"st_data\":\"2\",\"tgl_data\":\"2022-07-27\",\"tanggal_input\":\"2022-07-27 06:11:26\",\"user_input\":\"1\",\"namafile\":\"1_lra_20220727-061125.xls\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 06:11:35'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.2\",\"level\":\"5\",\"anggaran\":\"100000000\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 06:29:58'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.3.5\",\"level\":\"5\",\"anggaran\":\"30000000\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 06:30:14'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.3.4.01.02 \",\"level\":\"5\",\"anggaran\":\"20000000\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 06:33:11'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:12:41'),
(2147483647, 'admin', 'delete data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_uraian\":\"15\",\"id_skpd\":\"33\",\"kode_rekening\":\"4.3.5\",\"level\":\"5\",\"tahun\":\"2022\",\"anggaran\":\"30000000\",\"jenis\":\"1\",\"st_anggaran\":\"1\",\"is_transfer\":\"\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:21:53'),
(2147483647, 'admin', 'delete data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_uraian\":\"14\",\"id_skpd\":\"33\",\"kode_rekening\":\"4.2\",\"level\":\"5\",\"tahun\":\"2022\",\"anggaran\":\"100000000\",\"jenis\":\"1\",\"st_anggaran\":\"1\",\"is_transfer\":\"\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:21:57'),
(2147483647, 'admin', 'delete data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_uraian\":\"16\",\"id_skpd\":\"33\",\"kode_rekening\":\"4.3.4.01.02 \",\"level\":\"5\",\"tahun\":\"2022\",\"anggaran\":\"20000000\",\"jenis\":\"1\",\"st_anggaran\":\"1\",\"is_transfer\":\"\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:22:24'),
(2147483647, 'admin', 'delete data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_uraian\":\"1\",\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.01\",\"level\":\"5\",\"tahun\":\"2022\",\"anggaran\":\"65587406000\",\"jenis\":\"1\",\"st_anggaran\":\"1\",\"is_transfer\":\"\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:22:32'),
(2147483647, 'admin', 'delete data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_uraian\":\"2\",\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.02\",\"level\":\"5\",\"tahun\":\"2022\",\"anggaran\":\"472807253000\",\"jenis\":\"1\",\"st_anggaran\":\"1\",\"is_transfer\":\"\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:22:35'),
(2147483647, 'admin', 'delete data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_uraian\":\"3\",\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.03\",\"level\":\"5\",\"tahun\":\"2022\",\"anggaran\":\"65189319000\",\"jenis\":\"1\",\"st_anggaran\":\"1\",\"is_transfer\":\"\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:22:38'),
(2147483647, 'admin', 'delete data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_uraian\":\"4\",\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.04\",\"level\":\"5\",\"tahun\":\"2022\",\"anggaran\":\"111530796000\",\"jenis\":\"1\",\"st_anggaran\":\"1\",\"is_transfer\":\"\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:22:42'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.01\",\"level\":\"5\",\"anggaran\":\"123000000\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\",\"is_transfer\":\"Y\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:23:17'),
(2147483647, 'admin', 'update data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"old\":{\"id_uraian\":\"17\",\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.01\",\"level\":\"5\",\"tahun\":\"2022\",\"anggaran\":\"123000000\",\"jenis\":\"1\",\"st_anggaran\":\"1\",\"is_transfer\":\"Y\"},\"new\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.01\",\"level\":\"5\",\"anggaran\":\"65587406000\",\"jenis\":\"1\",\"st_anggaran\":\"1\"}}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:24:34'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.02\",\"level\":\"5\",\"anggaran\":\"472807253000\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\",\"is_transfer\":\"Y\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:24:57'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.03\",\"level\":\"5\",\"anggaran\":\"65189319000\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\",\"is_transfer\":\"Y\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:25:21'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.2.1.01.04\",\"level\":\"5\",\"anggaran\":\"111530796000\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\",\"is_transfer\":\"Y\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:25:43'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.3.4.01.02 \",\"level\":\"5\",\"anggaran\":\"0\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\",\"is_transfer\":\"Y\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:26:00'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.3.5\",\"level\":\"3\",\"anggaran\":\"56978087000\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\",\"is_transfer\":\"Y\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:26:16'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.2\",\"level\":\"2\",\"anggaran\":\"812955479229\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\",\"is_transfer\":\"Y\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:27:51'),
(2147483647, 'admin', 'insert data_uraian_kegiatan_skpd', '{\"data_uraian_kegiatan_skpd\":{\"id_skpd\":\"33\",\"kode_rekening\":\"4.3\",\"level\":\"2\",\"anggaran\":\"123\",\"jenis\":\"1\",\"tahun\":\"2022\",\"st_anggaran\":\"1\",\"is_transfer\":\"Y\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:28:18'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:49:20'),
(2147483647, 'admin', 'insert kegiatan', '{\"ta_kontrak\":{\"tahun\":\"2022\",\"id_prioritas\":\"\",\"id_kegiatan\":0,\"no_kontrak\":\"\",\"pagu\":\"200000000\",\"kd_urusan\":\"1\",\"kd_bidang\":\"1\",\"kd_unit\":\"1\",\"kd_sub\":\"1\",\"tgl_kontrak\":\"1970-01-01\",\"keperluan\":\"penanggulanga kemiskinan\",\"waktu\":\"\",\"nilai\":\"\",\"nm_perusahaan\":\"\",\"status_1\":\"\",\"status_2\":\"N\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:50:38'),
(2147483647, 'admin', 'insert kegiatan', '{\"ta_kontrak\":{\"tahun\":\"2022\",\"id_prioritas\":0,\"id_kegiatan\":0,\"no_kontrak\":\"\",\"pagu\":\"200000000\",\"kd_urusan\":\"1\",\"kd_bidang\":\"1\",\"kd_unit\":\"1\",\"kd_sub\":\"1\",\"tgl_kontrak\":\"1970-01-01\",\"keperluan\":\"penanggulanga kemiskinan\",\"waktu\":\"\",\"nilai\":\"\",\"nm_perusahaan\":\"\",\"status_1\":\"N\",\"status_2\":\"N\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:52:57'),
(2147483647, 'admin', 'insert pa', '{\"ta_kontrak_pa\":{\"id_kontrak\":\"1\",\"nama_pa\":\"qqw\",\"nip_pa\":\"1212\"},\"ta_kontrak\":{\"old\":\"0\",\"new\":\"0.00\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:54:35'),
(2147483647, 'admin', 'insert pa', '{\"ta_kontrak_pa\":{\"id_kontrak\":\"2\",\"nama_pa\":\"123\",\"nip_pa\":\"3445\"},\"ta_kontrak\":{\"old\":\"0\",\"new\":\"0.00\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:55:18'),
(2147483647, 'admin', 'update pa', '{\"ta_kontrak_pa\":{\"old\":{\"id_kontrak\":\"2\",\"nama_pa\":\"123\",\"nip_pa\":\"3445\"},\"new\":{\"tahun\":\"2022\",\"pagu\":\"200000000.00\",\"tgl_kontrak\":\"2022-07-13\",\"keperluan\":\"penanggulanga kemiskinan\",\"waktu\":\"\",\"nilai\":\"0.00\",\"nm_perusahaan\":\"\",\"status_2\":\"Y\"}},\"ta_kontrak\":{\"old\":\"0\",\"new\":\"0.00\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 18:55:39'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 19:08:14'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 19:39:39'),
(2147483647, 'admin', 'delete tbl_dana_desa', '{\"tbl_dana_desa\":{\"id_danadesa\":\"1\",\"id_kabupaten\":\"34\",\"tahun\":\"2022\",\"bulan\":\"7\",\"alokasi\":\"56978087000\",\"tahap1\":\"0\",\"tahap2\":\"0\",\"tahap3\":\"0\",\"total_realisasi\":\"0\",\"persen\":\"0\",\"desa\":\"52\",\"desa1\":\"0\",\"desa2\":\"0\",\"desa3\":\"0\",\"belum1\":\"0\",\"belum2\":\"0\",\"belum3\":\"0\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 19:47:59'),
(2147483647, 'admin', 'delete tbl_dana_desa', '{\"tbl_dana_desa\":{\"id_danadesa\":\"2\",\"id_kabupaten\":\"34\",\"tahun\":\"2022\",\"bulan\":\"6\",\"alokasi\":\"56978087000\",\"tahap1\":\"0\",\"tahap2\":\"0\",\"tahap3\":\"0\",\"total_realisasi\":\"0\",\"persen\":\"0\",\"desa\":\"52\",\"desa1\":\"0\",\"desa2\":\"0\",\"desa3\":\"0\",\"belum1\":\"0\",\"belum2\":\"0\",\"belum3\":\"0\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 19:49:45'),
(2147483647, 'admin', 'delete tbl_dana_desa', '{\"tbl_dana_desa\":{\"id_danadesa\":\"3\",\"id_kabupaten\":\"34\",\"tahun\":\"2022\",\"bulan\":\"7\",\"alokasi\":\"56978087000\",\"tahap1\":\"0\",\"tahap2\":\"0\",\"tahap3\":\"0\",\"total_realisasi\":\"0\",\"persen\":\"0\",\"desa\":\"52\",\"desa1\":\"0\",\"desa2\":\"0\",\"desa3\":\"0\",\"belum1\":\"0\",\"belum2\":\"0\",\"belum3\":\"0\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 19:51:10'),
(2147483647, 'admin', 'delete tbl_dana_desa', '{\"tbl_dana_desa\":{\"id_danadesa\":\"4\",\"id_kabupaten\":\"34\",\"tahun\":\"2022\",\"bulan\":\"7\",\"alokasi\":\"56978087000\",\"tahap1\":\"0\",\"tahap2\":\"0\",\"tahap3\":\"0\",\"total_realisasi\":\"0\",\"persen\":\"0\",\"desa\":\"52\",\"desa1\":\"0\",\"desa2\":\"0\",\"desa3\":\"0\",\"belum1\":\"0\",\"belum2\":\"0\",\"belum3\":\"0\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 19:52:26'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:19:20'),
(2147483647, 'admin', 'insert real kontrak', '{\"data_kontrak_real\":{\"tahun\":\"2022\",\"id_kontrak\":\"1\",\"no_kontrak\":\"\",\"nilai\":\"1000000000\",\"kd_urusan\":\"1\",\"kd_bidang\":\"1\",\"kd_unit\":\"1\",\"kd_sub\":\"1\",\"keterangan\":\"\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:36:28'),
(2147483647, 'admin', 'insert detail kegiatan', '{\"data_kegiatan_detail\":{\"id_kegiatan\":\"1\",\"jenis_target\":\"H\",\"tahapan_target\":\"30\",\"jadwal_target\":\"2022-07-13\",\"target\":\"100\",\"user_input\":\"1\",\"tgl_input\":\"2022-07-27 20:37:31\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:37:31'),
(2147483647, 'admin', 'update realisasi', '{\"data_kegiatan_detail\":{\"old\":{\"id_kegiatan_detail\":\"1\",\"id_kegiatan\":\"1\",\"jenis_target\":\"H\",\"tahapan_target\":\"30\",\"jadwal_target\":\"2022-07-13\",\"target\":\"100\",\"target_keuangan\":\"0\",\"realisasi\":\"0\",\"realisasi_keuangan\":\"0\",\"keterangan_target\":\"\",\"user_input\":\"1\",\"tgl_input\":\"2022-07-27 20:37:31\"},\"new\":{\"realisasi\":\"100\",\"keterangan_target\":\"\"}}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:37:37'),
(2147483647, 'admin', 'update pa', '{\"ta_kontrak_pa\":{\"old\":{\"id_kontrak\":\"1\",\"nama_pa\":\"qqw\",\"nip_pa\":\"1212\"},\"new\":{\"tahun\":\"2022\",\"pagu\":\"200000000.00\",\"tgl_kontrak\":\"2022-07-12\",\"keperluan\":\"penanggulanga kemiskinan\",\"waktu\":\"3 minggu\",\"nilai\":\"200000000\",\"nm_perusahaan\":\"123\",\"status_2\":\"N\"}},\"ta_kontrak\":{\"old\":\"0\",\"new\":\"200000000\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:38:19'),
(2147483647, 'admin', 'edit real kontrak', '{\"data_kontrak_real\":{\"old\":{\"id_real\":\"1\",\"tahun\":\"2022\",\"id_kontrak\":\"1\",\"no_kontrak\":\"\",\"nilai\":\"1000000000\",\"kd_urusan\":\"1\",\"kd_bidang\":\"1\",\"kd_unit\":\"1\",\"kd_sub\":\"1\",\"kd_keg\":\"0\",\"keterangan\":\"\"},\"new\":{\"no_kontrak\":\"\",\"nilai\":\"100000000\",\"keterangan\":\"\"}}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:38:35'),
(2147483647, 'admin', 'update pa', '{\"ta_kontrak_pa\":{\"old\":{\"id_kontrak\":\"1\",\"nama_pa\":\"qqw\",\"nip_pa\":\"1212\"},\"new\":{\"tahun\":\"2022\",\"pagu\":\"200000000.00\",\"tgl_kontrak\":\"2022-07-12\",\"keperluan\":\"penanggulanga kemiskinan\",\"waktu\":\"3 minggu\",\"nilai\":\"200000000.00\",\"nm_perusahaan\":\"123\",\"status_2\":\"N\"}},\"ta_kontrak\":{\"old\":\"200000000\",\"new\":\"200000000.00\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:39:11'),
(2147483647, 'admin', 'update pa', '{\"ta_kontrak_pa\":{\"old\":{\"id_kontrak\":\"1\",\"nama_pa\":\"qqw\",\"nip_pa\":\"1212\"},\"new\":{\"tahun\":\"2022\",\"pagu\":\"200000000.00\",\"tgl_kontrak\":\"2022-07-12\",\"keperluan\":\"penanggulanga kemiskinan\",\"waktu\":\"3 minggu\",\"nilai\":\"200000000.00\",\"nm_perusahaan\":\"123\",\"status_2\":\"N\"}},\"ta_kontrak\":{\"old\":\"200000000\",\"new\":\"200000000.00\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:39:25'),
(2147483647, 'admin', 'update pa', '{\"ta_kontrak_pa\":{\"old\":{\"id_kontrak\":\"1\",\"nama_pa\":\"qqw\",\"nip_pa\":\"1212\"},\"new\":{\"tahun\":\"2022\",\"no_kontrak\":\"123\\/765\",\"pagu\":\"200000000.00\",\"tgl_kontrak\":\"2022-07-12\",\"keperluan\":\"penanggulanga kemiskinan\",\"waktu\":\"3 minggu\",\"nilai\":\"200000000.00\",\"nm_perusahaan\":\"123\",\"status_2\":\"N\"}},\"ta_kontrak\":{\"old\":\"200000000\",\"new\":\"200000000.00\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:40:24'),
(2147483647, 'admin', 'edit real kontrak', '{\"data_kontrak_real\":{\"old\":{\"id_real\":\"1\",\"tahun\":\"2022\",\"id_kontrak\":\"1\",\"no_kontrak\":\"\",\"nilai\":\"100000000\",\"kd_urusan\":\"1\",\"kd_bidang\":\"1\",\"kd_unit\":\"1\",\"kd_sub\":\"1\",\"kd_keg\":\"0\",\"keterangan\":\"\"},\"new\":{\"no_kontrak\":\"123\\/765\",\"nilai\":\"100000000.00\",\"keterangan\":\"\"}}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:40:31'),
(2147483647, 'admin', 'update pa', '{\"ta_kontrak_pa\":{\"old\":{\"id_kontrak\":\"2\",\"nama_pa\":\"123\",\"nip_pa\":\"3445\"},\"new\":{\"tahun\":\"2022\",\"no_kontrak\":\"123\\/ty\",\"pagu\":\"200000000.00\",\"tgl_kontrak\":\"2022-07-13\",\"keperluan\":\"penanggulanga kemiskinan\",\"waktu\":\"1\",\"nilai\":\"0.00\",\"nm_perusahaan\":\"12\",\"status_2\":\"Y\"}},\"ta_kontrak\":{\"old\":\"0\",\"new\":\"0.00\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:41:08'),
(2147483647, 'admin', 'insert detail kegiatan', '{\"data_kegiatan_detail\":{\"id_kegiatan\":\"2\",\"jenis_target\":\"H\",\"tahapan_target\":\"1\",\"jadwal_target\":\"2022-07-05\",\"target\":\"50\",\"user_input\":\"1\",\"tgl_input\":\"2022-07-27 20:41:23\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:41:23'),
(2147483647, 'admin', 'update realisasi', '{\"data_kegiatan_detail\":{\"old\":{\"id_kegiatan_detail\":\"2\",\"id_kegiatan\":\"2\",\"jenis_target\":\"H\",\"tahapan_target\":\"1\",\"jadwal_target\":\"2022-07-05\",\"target\":\"50\",\"target_keuangan\":\"0\",\"realisasi\":\"0\",\"realisasi_keuangan\":\"0\",\"keterangan_target\":\"\",\"user_input\":\"1\",\"tgl_input\":\"2022-07-27 20:41:23\"},\"new\":{\"realisasi\":\"50\",\"keterangan_target\":\"\"}}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:41:29'),
(2147483647, 'admin', 'update pa', '{\"ta_kontrak_pa\":{\"old\":{\"id_kontrak\":\"2\",\"nama_pa\":\"123\",\"nip_pa\":\"3445\"},\"new\":{\"tahun\":\"2022\",\"no_kontrak\":\"123\\/ty\",\"pagu\":\"200000000.00\",\"tgl_kontrak\":\"2022-07-13\",\"keperluan\":\"penanggulanga kemiskinan\",\"waktu\":\"1\",\"nilai\":\"200000000\",\"nm_perusahaan\":\"12\",\"status_2\":\"Y\"}},\"ta_kontrak\":{\"old\":\"0\",\"new\":\"200000000\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:41:47'),
(2147483647, 'admin', 'insert real kontrak', '{\"data_kontrak_real\":{\"tahun\":\"2022\",\"id_kontrak\":\"2\",\"no_kontrak\":\"123\\/ty\",\"nilai\":\"100000000\",\"kd_urusan\":\"1\",\"kd_bidang\":\"1\",\"kd_unit\":\"1\",\"kd_sub\":\"1\",\"keterangan\":\"\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 20:41:58'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 21:03:56'),
(2147483647, 'admin', 'delete tbl_dana_desa', '{\"tbl_dana_desa\":{\"id_danadesa\":\"5\",\"id_kabupaten\":\"34\",\"tahun\":\"2022\",\"bulan\":\"7\",\"alokasi\":\"56978087000\",\"tahap1\":\"12936626800\",\"tahap2\":\"0\",\"tahap3\":\"0\",\"total_realisasi\":\"12936626800\",\"persen\":\"22.7\",\"desa\":\"52\",\"desa1\":\"52\",\"desa2\":\"0\",\"desa3\":\"0\",\"belum1\":\"0\",\"belum2\":\"52\",\"belum3\":\"52\"}}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 21:05:03'),
(2147483647, 'admin', 'delete kegiatan', '{\"ta_kontrak\":{\"id_kontrak\":\"2\",\"tahun\":\"2022\",\"pagu\":\"200000000\",\"no_kontrak\":\"123\\/ty\",\"kd_urusan\":\"1\",\"kd_bidang\":\"1\",\"kd_unit\":\"1\",\"kd_sub\":\"1\",\"kd_prog\":\"0\",\"id_prog\":\"0\",\"kd_keg\":\"0\",\"tgl_kontrak\":\"2022-07-13 00:00:00\",\"keperluan\":\"penanggulanga kemiskinan\",\"waktu\":\"1\",\"nilai\":\"200000000\",\"nm_perusahaan\":\"12\",\"bentuk\":\"\",\"alamat\":\"\",\"nm_pemilik\":\"\",\"npwp\":\"\",\"nm_bank\":\"\",\"nm_rekening\":\"\",\"no_rekening\":\"\",\"real_kontrak\":\"0\",\"realisasi\":\"0\",\"persen_realisasi\":\"0\",\"tgl_input\":\"2022-07-27 18:52:57\",\"id_prioritas\":\"0\",\"id_kegiatan\":\"0\",\"status_1\":\"N\",\"status_2\":\"Y\"},\"ta_kontrak_pa\":{\"id_kontrak\":\"2\",\"nama_pa\":\"123\",\"nip_pa\":\"3445\"},\"data_kegiatan_detail\":[{\"id_kegiatan_detail\":\"2\",\"id_kegiatan\":\"2\",\"jenis_target\":\"H\",\"tahapan_target\":\"1\",\"jadwal_target\":\"2022-07-05\",\"target\":\"50\",\"target_keuangan\":\"0\",\"realisasi\":\"50\",\"realisasi_keuangan\":\"0\",\"keterangan_target\":\"\",\"user_input\":\"1\",\"tgl_input\":\"2022-07-27 20:41:23\"}]}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 21:06:45');
INSERT INTO `log_user` (`log_id`, `username`, `aktivitas`, `aktivitas_detail`, `browser`, `waktu_akses`) VALUES
(2147483647, 'admin', 'delete kegiatan', '{\"ta_kontrak\":{\"id_kontrak\":\"1\",\"tahun\":\"2022\",\"pagu\":\"200000000\",\"no_kontrak\":\"123\\/765\",\"kd_urusan\":\"1\",\"kd_bidang\":\"1\",\"kd_unit\":\"1\",\"kd_sub\":\"1\",\"kd_prog\":\"0\",\"id_prog\":\"0\",\"kd_keg\":\"0\",\"tgl_kontrak\":\"2022-07-12 00:00:00\",\"keperluan\":\"penanggulanga kemiskinan\",\"waktu\":\"3 minggu\",\"nilai\":\"200000000\",\"nm_perusahaan\":\"123\",\"bentuk\":\"\",\"alamat\":\"\",\"nm_pemilik\":\"\",\"npwp\":\"\",\"nm_bank\":\"\",\"nm_rekening\":\"\",\"no_rekening\":\"\",\"real_kontrak\":\"0\",\"realisasi\":\"0\",\"persen_realisasi\":\"0\",\"tgl_input\":\"2022-07-27 18:50:38\",\"id_prioritas\":\"0\",\"id_kegiatan\":\"0\",\"status_1\":\"\",\"status_2\":\"N\"},\"ta_kontrak_pa\":{\"id_kontrak\":\"1\",\"nama_pa\":\"qqw\",\"nip_pa\":\"1212\"},\"data_kegiatan_detail\":[{\"id_kegiatan_detail\":\"1\",\"id_kegiatan\":\"1\",\"jenis_target\":\"H\",\"tahapan_target\":\"30\",\"jadwal_target\":\"2022-07-13\",\"target\":\"100\",\"target_keuangan\":\"0\",\"realisasi\":\"100\",\"realisasi_keuangan\":\"0\",\"keterangan_target\":\"\",\"user_input\":\"1\",\"tgl_input\":\"2022-07-27 20:37:31\"}]}', '{\"browser\":\"Opera\",\"version\":\"89.0.4447.48\",\"os\":\"Windows 10\",\"ip\":\"::1\"}', '2022-07-27 21:06:49'),
(2147483647, 'admin', 'login', '-', '{\"browser\":\"Firefox\",\"version\":\"103.0\",\"os\":\"Windows 7\",\"ip\":\"127.0.0.1\"}', '2022-07-27 22:46:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penanda_tangan`
--

CREATE TABLE `penanda_tangan` (
  `id_ttd` int(11) NOT NULL,
  `nip_ttd` varchar(20) NOT NULL,
  `nama_ttd` varchar(100) NOT NULL,
  `ttd` varchar(200) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `is_active` enum('Y','N') NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna_anggaran`
--

CREATE TABLE `pengguna_anggaran` (
  `id_pa` int(11) NOT NULL,
  `nip_pa` varchar(20) NOT NULL,
  `nama_pa` varchar(100) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `is_active` enum('Y','N') NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `realisasi_kontrak`
--

CREATE TABLE `realisasi_kontrak` (
  `id_skpd` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `realisasi_kontrak`
--

INSERT INTO `realisasi_kontrak` (`id_skpd`, `tahun`, `nilai`) VALUES
(1, 2021, 528210686147.64);

-- --------------------------------------------------------

--
-- Struktur dari tabel `realisasi_kontrak_detail`
--

CREATE TABLE `realisasi_kontrak_detail` (
  `id_skpd` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `bulan` int(2) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `realisasi_kontrak_detail`
--

INSERT INTO `realisasi_kontrak_detail` (`id_skpd`, `tahun`, `bulan`, `nilai`) VALUES
(1, 2021, 1, 248836398157.62),
(1, 2021, 10, 248836398157.62);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_rek90_1`
--

CREATE TABLE `ref_rek90_1` (
  `kd_rek90_1` int(1) NOT NULL,
  `nm_rek90_1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_rek90_1`
--

INSERT INTO `ref_rek90_1` (`kd_rek90_1`, `nm_rek90_1`) VALUES
(1, 'ASET'),
(2, 'KEWAJIBAN'),
(3, 'EKUITAS'),
(4, 'PENDAPATAN DAERAH'),
(5, 'BELANJA DAERAH'),
(6, 'PEMBIAYAAN DAERAH'),
(7, 'PENDAPATAN - LO'),
(8, 'BEBAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_rek90_2`
--

CREATE TABLE `ref_rek90_2` (
  `kd_rek90_1` int(1) NOT NULL,
  `kd_rek90_2` int(1) NOT NULL,
  `nm_rek90_2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_rek90_2`
--

INSERT INTO `ref_rek90_2` (`kd_rek90_1`, `kd_rek90_2`, `nm_rek90_2`) VALUES
(1, 1, 'ASET LANCAR'),
(1, 2, 'INVESTASI JANGKA PANJANG'),
(1, 3, 'ASET TETAP'),
(1, 4, 'DANA CADANGAN'),
(1, 5, 'ASET LAINNYA'),
(2, 1, 'KEWAJIBAN JANGKA PENDEK'),
(2, 2, 'KEWAJIBAN JANGKA PANJANG'),
(3, 1, 'EKUITAS'),
(4, 1, 'PENDAPATAN ASLI DAERAH (PAD)'),
(4, 2, 'PENDAPATAN TRANSFER'),
(4, 3, 'LAIN-LAIN PENDAPATAN DAERAH YANG SAH'),
(5, 1, 'BELANJA OPERASI'),
(5, 2, 'BELANJA MODAL'),
(5, 3, 'BELANJA TIDAK TERDUGA'),
(5, 4, 'BELANJA TRANSFER'),
(6, 1, 'PENERIMAAN PEMBIAYAAN'),
(6, 2, 'PENGELUARAN PEMBIAYAAN'),
(6, 3, 'PEMBIAYAAN NETTO'),
(7, 1, 'PENDAPATAN ASLI DAERAH (PAD)-LO'),
(7, 2, 'PENDAPATAN TRANSFER-LO'),
(7, 3, 'LAIN-LAIN PENDAPATAN DAERAH YANG SAH- LO'),
(7, 4, 'SURPLUS NON OPERASIONAL-LO'),
(8, 1, 'BEBAN OPERASI'),
(8, 2, 'BEBAN PENYUSUTAN DAN AMORTISASI'),
(8, 3, 'BEBAN TRANSFER'),
(8, 4, 'BEBAN TAK TERDUGA'),
(8, 5, 'DEFISIT NON OPERASIONAL-LO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_rek90_3`
--

CREATE TABLE `ref_rek90_3` (
  `kd_rek90_1` int(1) NOT NULL,
  `kd_rek90_2` int(1) NOT NULL,
  `kd_rek90_3` int(2) NOT NULL,
  `nm_rek90_3` varchar(100) NOT NULL,
  `saldonorm` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_rek90_3`
--

INSERT INTO `ref_rek90_3` (`kd_rek90_1`, `kd_rek90_2`, `kd_rek90_3`, `nm_rek90_3`, `saldonorm`) VALUES
(1, 1, 1, 'Kas dan Setara Kas', 'D'),
(1, 1, 2, 'Investasi Jangka Pendek', 'D'),
(1, 1, 3, 'Piutang Pajak Daerah', 'D'),
(1, 1, 4, 'Piutang Retribusi Daerah', 'D'),
(1, 1, 5, 'Piutang Hasil Pengelolaan Kekayaan Daerah yang Dipisahkan', 'D'),
(1, 1, 6, 'Piutang Lain-lain PAD yang Sah', 'D'),
(1, 1, 7, 'Piutang Transfer Pemerintah Pusat', 'D'),
(1, 1, 8, 'Piutang Transfer Antar Daerah', 'D'),
(1, 1, 9, 'Piutang Lainnya', 'D'),
(1, 1, 10, 'Penyisihan Piutang', 'D'),
(1, 1, 11, 'Beban Dibayar Dimuka', 'D'),
(1, 1, 12, 'Persediaan', 'D'),
(1, 1, 13, 'Aset Untuk Dikonsolidasikan', 'D'),
(1, 2, 1, 'Investasi Jangka Panjang Non Permanen', 'D'),
(1, 2, 2, 'Investasi Jangka Panjang Permanen', 'D'),
(1, 3, 1, 'Tanah', 'D'),
(1, 3, 2, 'Peralatan dan Mesin', 'D'),
(1, 3, 3, 'Gedung dan Bangunan', 'D'),
(1, 3, 4, 'Jalan, Jaringan, dan Irigasi', 'D'),
(1, 3, 5, 'Aset Tetap Lainnya', 'D'),
(1, 3, 6, 'Konstruksi Dalam Pengerjaan', 'D'),
(1, 3, 7, 'Akumulasi Penyusutan', 'D'),
(1, 4, 1, 'Dana Cadangan', 'D'),
(1, 5, 1, 'Tagihan Jangka Panjang', 'D'),
(1, 5, 2, 'Kemitraan dengan Pihak Ketiga', 'D'),
(1, 5, 3, 'Aset Tidak Berwujud', 'D'),
(1, 5, 4, 'Aset Lain-lain', 'D'),
(1, 5, 5, 'Akumulasi Amortisasi Aset Tidak Berwujud', 'D'),
(1, 5, 6, 'Akumulasi Penyusutan Aset Lainnya', 'D'),
(2, 1, 1, 'Utang Perhitungan Pihak Ketiga (PFK)', 'K'),
(2, 1, 2, 'Utang Bunga', 'K'),
(2, 1, 3, 'Utang Pinjaman Jangka Pendek', 'K'),
(2, 1, 4, 'Bagian Lancar Utang Jangka Panjang', 'K'),
(2, 1, 5, 'Pendapatan Diterima Dimuka', 'K'),
(2, 1, 6, 'Utang Belanja', 'K'),
(2, 1, 7, 'Utang Jangka Pendek Lainnya', 'K'),
(2, 1, 8, 'R/K PPKD', 'K'),
(2, 2, 1, 'Utang kepada Pemerintah Pusat', 'K'),
(2, 2, 2, 'Utang kepada Lembaga Keuangan Bank (LKB)', 'K'),
(2, 2, 3, 'Utang kepada Lembaga Keuangan Bukan Bank', 'K'),
(2, 2, 4, 'Utang kepada Masyarakat', 'K'),
(3, 1, 1, 'Ekuitas', 'K'),
(3, 1, 2, 'Ekuitas SAL', 'K'),
(3, 1, 3, 'Ekuitas untuk Dikonsolidasikan', 'K'),
(4, 1, 1, 'Pajak Daerah', 'K'),
(4, 1, 2, 'Retribusi Daerah', 'K'),
(4, 1, 3, 'Hasil Pengelolaan Kekayaan Daerah yang Dipisahkan', 'K'),
(4, 1, 4, 'Lain-lain PAD yang Sah', 'K'),
(4, 2, 1, 'Pendapatan Transfer Pemerintah Pusat', 'K'),
(4, 2, 2, 'Pendapatan Transfer Antar Daerah', 'K'),
(4, 3, 1, 'Pendapatan Hibah', 'K'),
(4, 3, 2, 'Dana Darurat', 'K'),
(4, 3, 3, 'Lain-lain Pendapatan Sesuai dengan Ketentuan Peraturan Perundang-Undangan', 'K'),
(5, 1, 1, 'Belanja Pegawai', 'D'),
(5, 1, 2, 'Belanja Barang dan Jasa', 'D'),
(5, 1, 3, 'Belanja Bunga', 'D'),
(5, 1, 4, 'Belanja Subsidi', 'D'),
(5, 1, 5, 'Belanja Hibah', 'D'),
(5, 1, 6, 'Belanja Bantuan Sosial', 'D'),
(5, 2, 1, 'Belanja Modal Tanah', 'D'),
(5, 2, 2, 'Belanja Modal Peralatan dan Mesin', 'D'),
(5, 2, 3, 'Belanja Modal Gedung dan Bangunan', 'D'),
(5, 2, 4, 'Belanja Modal Jalan, Jaringan, dan Irigasi', 'D'),
(5, 2, 5, 'Belanja Modal Aset Tetap Lainnya', 'D'),
(5, 3, 1, 'Belanja Tidak Terduga', 'D'),
(5, 4, 1, 'Belanja Bagi Hasil', 'D'),
(5, 4, 2, 'Belanja Bantuan Keuangan', 'D'),
(6, 1, 1, 'Sisa Lebih Perhitungan Anggaran Tahun Sebelumnya', 'K'),
(6, 1, 2, 'Pencairan Dana Cadangan', 'K'),
(6, 1, 3, 'Hasil Penjualan Kekayaan Daerah yang Dipisahkan', 'K'),
(6, 1, 4, 'Penerimaan Pinjaman Daerah', 'K'),
(6, 1, 5, 'Penerimaan Kembali Pemberian Pinjaman Daerah', 'K'),
(6, 1, 6, 'Penerimaan Pembiayaan Lainnya Sesuai dengan Ketentuan Peraturan Perundang- Undangan', 'K'),
(6, 2, 1, 'Pembentukan Dana Cadangan', 'D'),
(6, 2, 2, 'Penyertaan Modal Daerah', 'D'),
(6, 2, 3, 'Pembayaran Cicilan Pokok Utang yang Jatuh Tempo', 'D'),
(6, 2, 4, 'Pemberian Pinjaman Daerah', 'D'),
(6, 2, 5, 'Pengeluaran Pembiayaan Lainnya sesuai dengan Ketentuan Peraturan Perundang- Undangan', 'D'),
(6, 3, 1, 'Surplus/Defisit LRA', 'K'),
(6, 3, 2, 'Pembiayaan Netto', 'K'),
(6, 3, 3, 'SiLPA/SiKPA', 'K'),
(6, 3, 4, 'Perubahan SAL', 'K'),
(7, 1, 1, 'Pajak Daerah-LO', 'K'),
(7, 1, 2, 'Retribusi Daerah-LO', 'K'),
(7, 1, 3, 'Hasil Pengelolaan Kekayaan Daerah yang Dipisahkan-LO', 'K'),
(7, 1, 4, 'Lain-lain PAD yang Sah-LO', 'K'),
(7, 2, 1, 'Pendapatan Transfer Pemerintah Pusat-LO', 'K'),
(7, 2, 2, 'Pendapatan Transfer Antar Daerah-LO', 'K'),
(7, 3, 1, 'Pendapatan Hibah-LO', 'K'),
(7, 3, 2, 'Dana Darurat-LO', 'K'),
(7, 3, 3, 'Lain-lain Pendapatan Sesuai dengan Ketentuan Peraturan Perundang-Undangan-LO', 'K'),
(7, 4, 1, 'Surplus Penjualan/Pertukaran/Pelepasan Aset Non Lancar-LO', 'K'),
(7, 4, 2, 'Surplus Penyelesaian Kewajiban Jangka Panjang-LO', 'K'),
(8, 1, 1, 'Beban Pegawai', 'D'),
(8, 1, 2, 'Beban Barang dan Jasa', 'D'),
(8, 1, 3, 'Beban Bunga', 'D'),
(8, 1, 4, 'Beban Subsidi', 'D'),
(8, 1, 5, 'Beban Hibah', 'D'),
(8, 1, 6, 'Beban Bantuan Sosial', 'D'),
(8, 1, 7, 'Beban Penyisihan Piutang', 'D'),
(8, 1, 8, 'Beban Lain-lain', 'D'),
(8, 2, 1, 'Beban Penyusutan Peralatan dan Mesin', 'D'),
(8, 2, 2, 'Beban Penyusutan Gedung dan Bangunan', 'D'),
(8, 2, 3, 'Beban Penyusutan Jalan, Jaringan dan Irigasi', 'D'),
(8, 2, 4, 'Beban Penyusutan Aset Tetap Lainnya', 'D'),
(8, 2, 5, 'Beban Penyusutan Aset Lainnya', 'D'),
(8, 2, 6, 'Beban Amortisasi Aset Tidak Berwujud', 'D'),
(8, 3, 1, 'Beban Bagi Hasil', 'D'),
(8, 3, 2, 'Beban Bantuan Keuangan', 'D'),
(8, 4, 1, 'Beban Tak Terduga', 'D'),
(8, 5, 1, 'Defisit Penjualan/Pertukaran/Pelepasan Aset Non Lancar-LO', 'D'),
(8, 5, 2, 'Defisit Penyelesaian Kewajiban Jangka Panjang-LO', 'D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_rek90_4`
--

CREATE TABLE `ref_rek90_4` (
  `kd_rek90_1` int(1) NOT NULL,
  `kd_rek90_2` int(1) NOT NULL,
  `kd_rek90_3` int(2) NOT NULL,
  `kd_rek90_4` int(2) NOT NULL,
  `nm_rek90_4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_rek90_4`
--

INSERT INTO `ref_rek90_4` (`kd_rek90_1`, `kd_rek90_2`, `kd_rek90_3`, `kd_rek90_4`, `nm_rek90_4`) VALUES
(1, 1, 1, 1, 'Kas di Kas Daerah'),
(1, 1, 1, 2, 'Kas di Bendahara Penerimaan'),
(1, 1, 1, 3, 'Kas di Bendahara Pengeluaran'),
(1, 1, 1, 4, 'Kas di BLUD'),
(1, 1, 1, 5, 'Kas Dana BOS'),
(1, 1, 1, 6, 'Kas Dana Kapitasi pada FKTP'),
(1, 1, 1, 7, 'Kas Lainnya'),
(1, 1, 1, 8, 'Setara Kas'),
(1, 1, 2, 1, 'Investasi dalam Saham'),
(1, 1, 2, 2, 'Investasi dalam Deposito'),
(1, 1, 2, 3, 'Investasi dalam SUN'),
(1, 1, 2, 4, 'Investasi dalam SBI'),
(1, 1, 2, 5, 'Investasi dalam SPN'),
(1, 1, 2, 6, 'Investasi Jangka Pendek BLUD'),
(1, 1, 3, 1, 'Piutang Pajak Kendaraan Bermotor (PKB)'),
(1, 1, 3, 2, 'Piutang Bea Balik Nama Kendaraan Bermotor'),
(1, 1, 3, 3, 'Piutang Pajak Bahan Bakar Kendaraan Bermotor (PBBKB)'),
(1, 1, 3, 4, 'Piutang Pajak Air Permukaan'),
(1, 1, 3, 5, 'Piutang Pajak Rokok'),
(1, 1, 3, 6, 'Piutang Pajak Hotel'),
(1, 1, 3, 7, 'Piutang Pajak Restoran'),
(1, 1, 3, 8, 'Piutang Pajak Hiburan'),
(1, 1, 3, 9, 'Piutang Pajak Reklame'),
(1, 1, 3, 10, 'Piutang Pajak Penerangan Jalan'),
(1, 1, 3, 11, 'Piutang Pajak Parkir'),
(1, 1, 3, 12, 'Piutang Pajak Air Tanah'),
(1, 1, 3, 13, 'Piutang Pajak Sarang Burung Walet'),
(1, 1, 3, 14, 'Piutang Pajak Mineral Bukan Logam dan Batuan'),
(1, 1, 3, 15, 'Piutang Pajak Bumi dan Bangunan Pedesaan dan Perkotaan (PBBP2)'),
(1, 1, 3, 16, 'Piutang Bea Perolehan Hak Atas Tanah dan Bangunan (BPHTB)'),
(1, 1, 3, 17, 'Piutang Pajak Lingkungan'),
(1, 1, 4, 1, 'Piutang Retribusi Jasa Umum'),
(1, 1, 4, 2, 'Piutang Retribusi Jasa Usaha'),
(1, 1, 4, 3, 'Piutang Retribusi Perizinan Tertentu'),
(1, 1, 5, 1, 'Piutang Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMN'),
(1, 1, 5, 2, 'Piutang Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD'),
(1, 1, 5, 3, 'Piutang Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada Perusahaan Swasta'),
(1, 1, 6, 1, 'Piutang Hasil Penjualan BMD yang Tidak Dipisahkan'),
(1, 1, 6, 2, 'Piutang Hasil Selisih Lebih Tukar Menukar BMD yang Tidak Dipisahkan'),
(1, 1, 6, 3, 'Piutang Hasil Pemanfaatan BMD yang Tidak Dipisahkan'),
(1, 1, 6, 4, 'Piutang Hasil Kerja Sama Daerah'),
(1, 1, 6, 5, 'Piutang Jasa Giro'),
(1, 1, 6, 6, 'Piutang Hasil Pengelolaan Dana Bergulir'),
(1, 1, 6, 7, 'Piutang Pendapatan Bunga'),
(1, 1, 6, 8, 'Piutang Penerimaan atas Tuntutan Ganti Kerugian Keuangan Daerah'),
(1, 1, 6, 9, 'Piutang Penerimaan Komisi, Potongan, atau Bentuk Lain'),
(1, 1, 6, 10, 'Piutang Penerimaan Keuntungan dari Selisih Nilai Tukar Rupiah Terhadap Mata Uang Asing'),
(1, 1, 6, 11, 'Piutang Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan'),
(1, 1, 6, 12, 'Piutang Pendapatan Denda Pajak Daerah'),
(1, 1, 6, 13, 'Piutang Pendapatan Denda Retribusi Daerah'),
(1, 1, 6, 14, 'Piutang Pendapatan Hasil Eksekusi atas Jaminan'),
(1, 1, 6, 15, 'Piutang Pendapatan dari Pengembalian'),
(1, 1, 6, 16, 'Piutang Pendapatan BLUD'),
(1, 1, 6, 17, 'Piutang Pendapatan Denda Pemanfaatan BMD yang Tidak Dipisahkan'),
(1, 1, 6, 18, 'Piutang Pendapatan Dana Kapitasi Jaminan Kesehatan Nasional (JKN) pada Fasilitas Kesehatan Tingkat Pertama (FKTP)'),
(1, 1, 6, 19, 'Piutang Pendapatan Hasil Pengelolaan Dana Bergulir'),
(1, 1, 6, 20, 'Piutang Pendapatan Berdasarkan Putusan Pengadilan (Inkracht)'),
(1, 1, 6, 21, 'Piutang Pendapatan Denda atas Pelanggaran Peraturan Daerah'),
(1, 1, 6, 22, 'Piutang Pendapatan Zakat, Infaq, Shadaqah, dan Wakaf'),
(1, 1, 6, 23, 'Piutang dari Angsuran/Cicilan Penjualan'),
(1, 1, 6, 24, 'Piutang Hasil dari Pemanfaatan Kekayaan Daerah'),
(1, 1, 6, 25, 'Piutang Fasilitas Sosial dan Fasilitas Umum'),
(1, 1, 6, 26, 'Piutang Lain-lain PAD Yang Sah Lainnya'),
(1, 1, 7, 1, 'Piutang Dana Perimbangan'),
(1, 1, 7, 2, 'Piutang Dana Insentif Daerah (DID)'),
(1, 1, 7, 3, 'Piutang Dana Otonomi Khusus dan Tambahan Infrastruktur'),
(1, 1, 7, 4, 'Piutang Dana Keistimewaan'),
(1, 1, 7, 5, 'Piutang Dana Desa'),
(1, 1, 7, 6, 'Piutang Transfer Dana Penyesuaian'),
(1, 1, 7, 7, 'Piutang Transfer Lainnya?'),
(1, 1, 7, 8, 'Piutang Pendapatan Lainnya?.'),
(1, 1, 8, 1, 'Piutang Bagi Hasil'),
(1, 1, 8, 2, 'Piutang Bantuan Keuangan'),
(1, 1, 8, 3, 'Piutang Pendapatan Hibah'),
(1, 1, 8, 4, 'Piutang Sumbangan Pihak Ketiga/Sejenis'),
(1, 1, 8, 5, 'Piutang Dana Darurat pada Tahap Pasca Bencana'),
(1, 1, 8, 6, 'Piutang Pendapatan Hibah Dana BOS'),
(1, 1, 8, 7, 'Piutang Pendapatan atas Pengembalian Hibah '),
(1, 1, 9, 1, 'Bagian Lancar Tagihan Jangka Panjang'),
(1, 1, 9, 2, 'Bagian Lancar Tagihan Pinjaman Jangka Panjang'),
(1, 1, 9, 3, 'Bagian Lancar Tagihan Penjualan Angsuran'),
(1, 1, 9, 4, 'Bagian Lancar Tuntutan Ganti Kerugian Daerah'),
(1, 1, 9, 5, 'Uang Muka'),
(1, 1, 10, 1, 'Penyisihan Piutang Pendapatan'),
(1, 1, 10, 2, 'Penyisihan Piutang Lainnya'),
(1, 1, 11, 1, 'Beban Dibayar Dimuka'),
(1, 1, 12, 1, 'Barang Pakai Habis'),
(1, 1, 12, 2, 'Barang Tak Habis Pakai'),
(1, 1, 12, 3, 'Barang Bekas Dipakai'),
(1, 1, 13, 1, 'RK SKPD'),
(1, 2, 1, 1, 'Investasi kepada Badan Usaha Milik Negara'),
(1, 2, 1, 2, 'Investasi kepada Badan Usaha Milik Daerah'),
(1, 2, 1, 3, 'Investasi dalam Obligasi'),
(1, 2, 1, 4, 'Investasi dalam Proyek Pembangunan'),
(1, 2, 1, 5, 'Dana Bergulir'),
(1, 2, 1, 6, 'Deposito Jangka Panjang'),
(1, 2, 1, 7, 'Investasi Non Permanen Lainnya'),
(1, 2, 1, 8, 'Investasi Permanen Lainnya'),
(1, 2, 2, 1, 'Penyertaan Modal'),
(1, 2, 2, 2, 'Investasi-Pemberian Pinjaman Daerah'),
(1, 3, 1, 1, 'Tanah'),
(1, 3, 2, 1, 'Alat Besar'),
(1, 3, 2, 2, 'Alat Angkutan'),
(1, 3, 2, 3, 'Alat Bengkel dan Alat Ukur'),
(1, 3, 2, 4, 'Alat Pertanian'),
(1, 3, 2, 5, 'Alat Kantor dan Rumah Tangga'),
(1, 3, 2, 6, 'Alat Studio, Komunikasi, dan Pemancar'),
(1, 3, 2, 7, 'Alat Kedokteran dan Kesehatan'),
(1, 3, 2, 8, 'Alat Laboratorium'),
(1, 3, 2, 10, 'Komputer'),
(1, 3, 2, 11, 'Alat Eksplorasi'),
(1, 3, 2, 12, 'Alat Pengeboran'),
(1, 3, 2, 13, 'Alat Produksi, Pengolahan, dan Pemurnian'),
(1, 3, 2, 14, 'Alat Bantu Eksplorasi'),
(1, 3, 2, 15, 'Alat Keselamatan Kerja'),
(1, 3, 2, 16, 'Alat Peraga'),
(1, 3, 2, 17, 'Peralatan Proses/Produksi'),
(1, 3, 2, 18, 'Rambu-rambu'),
(1, 3, 2, 19, 'Peralatan Olahraga'),
(1, 3, 3, 1, 'Bangunan Gedung'),
(1, 3, 3, 2, 'Monumen'),
(1, 3, 3, 3, 'Bangunan Menara'),
(1, 3, 3, 4, 'Tugu Titik Kontrol/Pasti'),
(1, 3, 4, 1, 'Jalan dan Jembatan'),
(1, 3, 4, 2, 'Bangunan Air'),
(1, 3, 4, 3, 'Instalasi'),
(1, 3, 4, 4, 'Jaringan'),
(1, 3, 5, 1, 'Bahan Perpustakaan'),
(1, 3, 5, 2, 'Barang Bercorak Kesenian/Kebudayaan/ Olahraga'),
(1, 3, 5, 3, 'Hewan'),
(1, 3, 5, 4, 'Biota Perairan'),
(1, 3, 5, 5, 'Tanaman'),
(1, 3, 5, 6, 'Barang Koleksi Non Budaya'),
(1, 3, 5, 7, 'Aset Tetap Dalam Renovasi'),
(1, 3, 6, 1, 'Konstruksi Dalam Pengerjaan'),
(1, 3, 7, 1, 'Akumulasi Penyusutan Peralatan dan Mesin'),
(1, 3, 7, 2, 'Akumulasi Penyusutan Gedung dan Bangunan'),
(1, 3, 7, 3, 'Akumulasi Penyusutan Jalan, Jaringan, dan Irigasi'),
(1, 3, 7, 4, 'Akumulasi Penyusutan Aset Tetap Lainnya'),
(1, 4, 1, 1, 'Dana Cadangan'),
(1, 5, 1, 1, 'Tagihan Penjualan Angsuran'),
(1, 5, 1, 2, 'Tuntutan Ganti Kerugian Daerah'),
(1, 5, 2, 1, 'Kemitraan dengan Pihak Ketiga'),
(1, 5, 3, 1, 'Aset Tidak Berwujud'),
(1, 5, 4, 1, 'Aset Lain-lain'),
(1, 5, 5, 1, 'Akumulasi Amortisasi Aset Tidak Berwujud'),
(1, 5, 6, 1, 'Akumulasi Penyusutan Aset Lainnya'),
(2, 1, 1, 1, 'Utang Taspen'),
(2, 1, 1, 2, 'Utang Iuran Jaminan Kesehatan'),
(2, 1, 1, 3, 'Utang Iuran Jaminan Kecelakaan Kerja'),
(2, 1, 1, 4, 'Utang Iuran Jaminan Kematian'),
(2, 1, 1, 5, 'Utang PPh Pusat'),
(2, 1, 1, 6, 'Utang PPN Pusat'),
(2, 1, 1, 7, 'Utang Taperum'),
(2, 1, 1, 8, 'Utang Iuran Wajib Pegawai'),
(2, 1, 1, 9, 'Utang Perhitungan Pihak Ketiga Lainnya'),
(2, 1, 1, 10, 'Utang Jaminan'),
(2, 1, 2, 1, 'Utang Bunga kepada Pemerintah Pusat'),
(2, 1, 2, 2, 'Utang Bunga kepada Pemerintah Daerah Lain'),
(2, 1, 2, 3, 'Utang Bunga kepada Lembaga Keuangan Bank (LKB)'),
(2, 1, 2, 4, 'Utang Bunga kepada Lembaga Keuangan Bukan Bank'),
(2, 1, 2, 5, 'Utang Bunga kepada Masyarakat'),
(2, 1, 2, 6, 'Utang Bunga melalui BLUD'),
(2, 1, 3, 1, 'Utang Pinjaman dari Pemerintah Daerah'),
(2, 1, 3, 2, 'Utang Pinjaman dari Lembaga Keuangan Bank (LKB)'),
(2, 1, 3, 3, 'Utang Pinjaman dari Lembaga Keuangan Bukan Bank (LKBB)'),
(2, 1, 3, 4, 'Utang Pinjaman melalui BLUD'),
(2, 1, 4, 1, 'Bagian Lancar Utang Jangka Panjang dari Pemerintah Pusat'),
(2, 1, 4, 2, 'Bagian Lancar Utang Jangka Panjang kepada Lembaga Keuangan Bank (LKB)'),
(2, 1, 4, 3, 'Bagian Lancar Utang Jangka Panjang kepada Lembaga Keuangan Bukan Bank (LKBB)'),
(2, 1, 4, 4, 'Bagian Lancar Utang Jangka Panjang dari Masyarakat'),
(2, 1, 4, 5, 'Bagian Lancar Utang Jangka Panjang melalui BLUD'),
(2, 1, 5, 1, 'Setoran Kelebihan Pembayaran Dari Pihak III'),
(2, 1, 5, 2, 'Uang Muka Penjualan Produk Pemda Dari Pihak III'),
(2, 1, 5, 3, 'Uang Muka Lelang Penjualan Aset Daerah'),
(2, 1, 5, 4, 'Pendapatan Diterima Dimuka lainnya'),
(2, 1, 6, 1, 'Utang Belanja Pegawai'),
(2, 1, 6, 2, 'Utang Belanja Barang dan Jasa'),
(2, 1, 6, 3, 'Utang Belanja Bunga'),
(2, 1, 6, 4, 'Utang Belanja Subsidi'),
(2, 1, 6, 5, 'Utang Belanja Hibah'),
(2, 1, 6, 6, 'Utang Belanja Modal Tanah'),
(2, 1, 6, 7, 'Utang Belanja Modal Peralatan dan Mesin'),
(2, 1, 6, 8, 'Utang Belanja Modal Gedung dan Bangunan'),
(2, 1, 6, 9, 'Utang Belanja Modal Jalan, Jaringan, dan Irigasi'),
(2, 1, 6, 10, 'Utang Belanja Aset Tetap Lainnya'),
(2, 1, 6, 11, 'Utang Belanja Tidak Terduga'),
(2, 1, 6, 12, 'Utang Belanja Bagi Hasil'),
(2, 1, 6, 13, 'Utang Belanja Bantuan Keuangan'),
(2, 1, 6, 14, 'Utang Belanja Bantuan Sosial'),
(2, 1, 6, 15, 'Utang Beban Lain-lain'),
(2, 1, 7, 1, 'Utang Kelebihan Pembayaran PAD'),
(2, 1, 7, 2, 'Utang Kelebihan Pembayaran Transfer'),
(2, 1, 7, 3, 'Utang Kelebihan Pembayaran Lain-Lain Pendapatan Daerah yang Sah'),
(2, 1, 7, 4, 'Utang Transfer'),
(2, 1, 7, 5, 'Utang Pengadaan Aset Tetap'),
(2, 1, 7, 6, 'Utang Pembiayaan'),
(2, 1, 7, 7, 'Utang Jangka Pendek Lainnya'),
(2, 1, 8, 1, 'R/K PPKD'),
(2, 2, 1, 1, 'Utang atas Penerusan Pinjaman Dalam Negeri'),
(2, 2, 1, 2, 'Utang atas Penerusan Pinjaman Luar Negeri'),
(2, 2, 1, 3, 'Sumber Lainnya sesuai Ketentuan Peraturan Perundang-Undangan'),
(2, 2, 2, 1, 'Utang kepada Lembaga Keuangan Bank (LKB)- BUMN'),
(2, 2, 2, 2, 'Utang kepada Lembaga Keuangan Bank (LKB)- BUMD'),
(2, 2, 2, 3, 'Utang kepada Lembaga Keuangan Bank (LKB)- Swasta'),
(2, 2, 3, 1, 'Utang kepada Lembaga Keuangan Bukan Bank (LKBB)-BUMN'),
(2, 2, 3, 2, 'Utang kepada Lembaga Keuangan Bukan Bank (LKBB)-BUMD'),
(2, 2, 3, 3, 'Utang kepada Lembaga Keuangan Bukan Bank (LKBB)-Swasta'),
(2, 2, 4, 1, 'Obligasi'),
(3, 1, 1, 1, 'Ekuitas'),
(3, 1, 1, 2, 'Surplus/Defisit-LO'),
(3, 1, 2, 1, 'Estimasi Pendapatan'),
(3, 1, 2, 2, 'Estimasi Penerimaan Pembiayaan'),
(3, 1, 2, 3, 'Apropriasi Belanja'),
(3, 1, 2, 4, 'Apropriasi Pengeluaran Pembiayaan'),
(3, 1, 2, 5, 'Estimasi Perubahan SAL'),
(3, 1, 2, 6, 'Surplus/Defisit-LRA'),
(4, 1, 1, 1, 'Pajak Kendaraan Bermotor (PKB)'),
(4, 1, 1, 2, 'Bea Balik Nama Kendaraan Bermotor (BBNKB)'),
(4, 1, 1, 3, 'Pajak Bahan Bakar Kendaraan Bermotor (PBBKB)'),
(4, 1, 1, 4, 'Pajak Air Permukaan'),
(4, 1, 1, 5, 'Pajak Rokok'),
(4, 1, 1, 6, 'Pajak Hotel'),
(4, 1, 1, 7, 'Pajak Restoran'),
(4, 1, 1, 8, 'Pajak Hiburan'),
(4, 1, 1, 9, 'Pajak Reklame'),
(4, 1, 1, 10, 'Pajak Penerangan Jalan'),
(4, 1, 1, 11, 'Pajak Parkir'),
(4, 1, 1, 12, 'Pajak Air Tanah'),
(4, 1, 1, 13, 'Pajak Sarang Burung Walet'),
(4, 1, 1, 14, 'Pajak Mineral Bukan Logam dan Batuan'),
(4, 1, 1, 15, 'Pajak Bumi dan Bangunan Perdesaan dan Perkotaan (PBBP2)'),
(4, 1, 1, 16, 'Bea Perolehan Hak Atas Tanah dan Bangunan (BPHTB)'),
(4, 1, 1, 17, 'Pajak Lingkungan - LRA'),
(4, 1, 2, 1, 'Retribusi Jasa Umum'),
(4, 1, 2, 2, 'Retribusi Jasa Usaha'),
(4, 1, 2, 3, 'Retribusi Perizinan Tertentu'),
(4, 1, 3, 1, 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMN'),
(4, 1, 3, 2, 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD'),
(4, 1, 3, 3, 'Bagian Laba yang dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada Perusahaan Milik Swasta'),
(4, 1, 4, 1, 'Hasil Penjualan BMD yang Tidak Dipisahkan'),
(4, 1, 4, 2, 'Hasil Selisih Lebih Tukar Menukar BMD yang Tidak Dipisahkan'),
(4, 1, 4, 3, 'Hasil Pemanfaatan BMD yang Tidak Dipisahkan'),
(4, 1, 4, 4, 'Hasil Kerja Sama Daerah'),
(4, 1, 4, 5, 'Jasa Giro'),
(4, 1, 4, 6, 'Hasil Pengelolaan Dana Bergulir'),
(4, 1, 4, 7, 'Pendapatan Bunga'),
(4, 1, 4, 8, 'Penerimaan atas Tuntutan Ganti Kerugian Keuangan Daerah'),
(4, 1, 4, 9, 'Penerimaan Komisi, Potongan, atau Bentuk Lain'),
(4, 1, 4, 10, 'Penerimaan Keuntungan dari Selisih Nilai Tukar Rupiah terhadap Mata Uang Asing'),
(4, 1, 4, 11, 'Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan'),
(4, 1, 4, 12, 'Pendapatan Denda Pajak Daerah'),
(4, 1, 4, 13, 'Pendapatan Denda Retribusi Daerah'),
(4, 1, 4, 14, 'Pendapatan Hasil Eksekusi atas Jaminan'),
(4, 1, 4, 15, 'Pendapatan dari Pengembalian'),
(4, 1, 4, 16, 'Pendapatan BLUD'),
(4, 1, 4, 17, 'Pendapatan Denda Pemanfaatan BMD yang tidak Dipisahkan'),
(4, 1, 4, 18, 'Pendapatan Dana Kapitasi Jaminan Kesehatan Nasional (JKN) pada Fasilitas Kesehatan Tingkat Pertama (FKTP)'),
(4, 1, 4, 19, 'Pendapatan Hasil Pengelolaan Dana Bergulir'),
(4, 1, 4, 20, 'Pendapatan Berdasarkan Putusan Pengadilan (Inkracht)'),
(4, 1, 4, 21, 'Pendapatan Denda atas Pelanggaran Peraturan Daerah'),
(4, 1, 4, 22, 'Pendapatan Zakat, Infaq, Shadaqah, dan Wakaf'),
(4, 1, 4, 23, 'Lain-lain PAD yang Sah Lainnya - LRA'),
(4, 1, 4, 24, 'Fasilitas Sosial dan Fasilitas Umum - LRA'),
(4, 1, 4, 25, 'Pendapatan dari Angsuran/Cicilan Penjualan - LRA'),
(4, 2, 1, 1, 'Dana Perimbangan'),
(4, 2, 1, 2, 'Dana Insentif Daerah (DID)'),
(4, 2, 1, 3, 'Dana Otonomi Khusus dan Dana Tambahann Infrastruktur'),
(4, 2, 1, 4, 'Dana Keistimewaan'),
(4, 2, 1, 5, 'Dana Desa'),
(4, 2, 2, 1, 'Pendapatan Bagi Hasil'),
(4, 2, 2, 2, 'Bantuan Keuangan'),
(4, 3, 1, 1, 'Pendapatan Hibah dari Pemerintah Pusat'),
(4, 3, 1, 2, 'Pendapatan Hibah dari Pemerintah Daerah Lainnya'),
(4, 3, 1, 3, 'Pendapatan Hibah dari Kelompok Masyarakat/Perorangan Dalam Negeri'),
(4, 3, 1, 4, 'Pendapatan Hibah dari Badan/Lembaga/ Organisasi Dalam Negeri/Luar Negeri'),
(4, 3, 1, 5, 'Sumbangan Pihak Ketiga/Sejenis'),
(4, 3, 2, 1, 'Dana Darurat'),
(4, 3, 3, 1, 'Lain-lain Pendapatan'),
(5, 1, 1, 1, 'Belanja Gaji dan Tunjangan ASN'),
(5, 1, 1, 2, 'Belanja Tambahan Penghasilan ASN'),
(5, 1, 1, 3, 'Tambahan Penghasilan berdasarkan Pertimbangan Objektif Lainnya ASN'),
(5, 1, 1, 4, 'Belanja Gaji dan Tunjangan DPRD'),
(5, 1, 1, 5, 'Belanja Gaji dan Tunjangan KDH/WKDH'),
(5, 1, 1, 6, 'Belanja Penerimaan Lainnya Pimpinan DPRD serta KDH/WKDH'),
(5, 1, 1, 88, 'Belanja Pegawai BOS'),
(5, 1, 1, 99, 'Belanja Pegawai BLUD'),
(5, 1, 2, 1, 'Belanja Barang'),
(5, 1, 2, 2, 'Belanja Jasa'),
(5, 1, 2, 3, 'Belanja Pemeliharaan'),
(5, 1, 2, 4, 'Belana Perjalanan Dinas'),
(5, 1, 2, 5, 'Belanja Uang dan/atau Jasa untuk Diberikan kepada Pihak Ketiga/Pihak Lain/Masyarakat'),
(5, 1, 2, 88, 'Belanja Barang dan Jasa BOS'),
(5, 1, 2, 99, 'Belanja Barang dan Jasa BLUD'),
(5, 1, 3, 1, 'Belanja Bunga Utang Pinjaman kepada Pemerintah Pusat'),
(5, 1, 3, 2, 'Belanja Bunga Utang Pinjaman kepada Pemerintah Daerah Lain'),
(5, 1, 3, 3, 'Belanja Bunga Utang Pinjaman kepada Lembaga Keuangan Bank (LKB)'),
(5, 1, 3, 4, 'Belanja Bunga Utang Pinjaman kepada Lembaga Keuangan Bukan Bank (LKBB)'),
(5, 1, 3, 5, 'Belanja Bunga Utang Kepada Masyarakat (Obligasi)'),
(5, 1, 3, 6, 'Belanja Bunga Utang Pinjaman melalui BLUD'),
(5, 1, 4, 1, 'Belanja Subsidi kepada BUMN'),
(5, 1, 4, 2, 'Belanja Subsidi kepada BUMD'),
(5, 1, 4, 3, 'Belanja Subsidi kepada Badan Usaha Milik Swasta'),
(5, 1, 4, 4, 'Belanja Subsidi kepada Koperasi'),
(5, 1, 5, 1, 'Belanja Hibah kepada Pemerintah Pusat'),
(5, 1, 5, 2, 'Belanja Hibah kepada Pemerintah Daerah Lainnya'),
(5, 1, 5, 3, 'Belanja Hibah kepada BUMN'),
(5, 1, 5, 4, 'Belanja Hibah kepada BUMD'),
(5, 1, 5, 5, 'Belanja Hibah kepada Badan, Lembaga, Organisasi Kemasyarakatan yang Berbadan Hukum Indonesia'),
(5, 1, 5, 6, 'Belanja Hibah Dana BOS'),
(5, 1, 5, 7, 'Belanja Hibah Bantuan Keuangan kepada Partai Politik'),
(5, 1, 6, 1, 'Belanja Bantuan Sosial kepada Individu'),
(5, 1, 6, 2, 'Belanja Bantuan Sosial kepada Keluarga'),
(5, 1, 6, 3, 'Belanja Bantuan Sosial kepada Kelompok Masyarakat'),
(5, 1, 6, 4, 'Belanja Bantuan Sosial kepada Lembaga Non Pemerintahan (Bidang Pendidikan, Keagamaan dan Bidang Lainnya)'),
(5, 2, 1, 1, 'Belanja Modal Tanah'),
(5, 2, 2, 1, 'Belanja Modal Alat Besar'),
(5, 2, 2, 2, 'Belanja Modal Alat Angkutan'),
(5, 2, 2, 3, 'Belanja Modal Alat Bengkel dan Alat Ukur'),
(5, 2, 2, 4, 'Belanja Modal Alat Pertanian'),
(5, 2, 2, 5, 'Belanja Modal Alat Kantor dan Rumah Tangga'),
(5, 2, 2, 6, 'Belanja Modal Alat Studio, Komunikasi, dan Pemancar'),
(5, 2, 2, 7, 'Belanja Modal Alat Kedokteran dan Kesehatan'),
(5, 2, 2, 8, 'Belanja Modal Alat Laboratorium'),
(5, 2, 2, 10, 'Belanja Modal Komputer'),
(5, 2, 2, 11, 'Belanja Modal Alat Eksplorasi'),
(5, 2, 2, 12, 'Belanja Modal Alat Pengeboran'),
(5, 2, 2, 13, 'Belanja Modal Alat Produksi, Pengolahan, dan Pemurnian'),
(5, 2, 2, 14, 'Belanja Modal Alat Bantu Eksplorasi'),
(5, 2, 2, 15, 'Belanja Modal Alat Keselamatan Kerja'),
(5, 2, 2, 16, 'Belanja Modal Alat Peraga'),
(5, 2, 2, 17, 'Belanja Modal Peralatan Proses/Produksi'),
(5, 2, 2, 18, 'Belanja Modal Rambu-Rambu'),
(5, 2, 2, 19, 'Belanja Modal Peralatan Olahraga'),
(5, 2, 3, 1, 'Belanja Modal Bangunan Gedung'),
(5, 2, 3, 2, 'Belanja Modal Monumen'),
(5, 2, 3, 3, 'Belanja Modal Bangunan Menara'),
(5, 2, 3, 4, 'Belanja Modal Tugu Titik Kontrol/Pasti'),
(5, 2, 4, 1, 'Belanja Modal Jalan dan Jembatan'),
(5, 2, 4, 2, 'Belanja Modal Bangunan Air'),
(5, 2, 4, 3, 'Belanja Modal Instalasi'),
(5, 2, 4, 4, 'Belanja Modal Jaringan'),
(5, 2, 5, 1, 'Belanja Modal Bahan Perpustakaan'),
(5, 2, 5, 2, 'Belanja Modal Barang Bercorak Kesenian/Kebudayaan/Olahraga'),
(5, 2, 5, 3, 'Belanja Modal Hewan'),
(5, 2, 5, 4, 'Belanja Modal Biota Perairan'),
(5, 2, 5, 5, 'Belanja Modal Tanaman'),
(5, 2, 5, 6, 'Belanja Modal Barang Koleksi Non Budaya'),
(5, 2, 5, 7, 'Belanja Modal Aset Tetap Dalam Renovasi'),
(5, 2, 5, 8, 'Belanja Modal Aset Tidak Berwujud'),
(5, 3, 1, 1, 'Belanja Tidak Terduga'),
(5, 4, 1, 1, 'Belanja Bagi Hasil Pajak Daerah Kepada Pemerintahan Kabupaten/Kota dan Desa'),
(5, 4, 1, 2, 'Belanja Bagi Hasil Retribusi Daerah Kabupaten/Kota Kepada Pemerintah Desa'),
(5, 4, 2, 1, 'Belanja Bantuan Keuangan antar Daerah Provinsi'),
(5, 4, 2, 2, 'Belanja Bantuan Keuangan antar Daerah Kabupaten/Kota'),
(5, 4, 2, 3, 'Belanja Bantuan Keuangan Daerah Provinsi ke Kabupaten/Kota'),
(5, 4, 2, 4, 'Belanja Bantuan Keuangan Kabupaten/Kota ke Daerah Provinsi'),
(5, 4, 2, 5, 'Belanja Bantuan Keuangan Daerah Provinsi atau Kabupaten/Kota kepada Desa'),
(5, 4, 2, 6, 'Belanja Transfer Dana Otonomi Khusus Provinsi kepada Kabupaten/Kota'),
(6, 1, 1, 1, 'Pelampauan Penerimaan PAD'),
(6, 1, 1, 2, 'Pelampauan Penerimaan Pendapatan Transfer'),
(6, 1, 1, 3, 'Pelampauan Penerimaan Lain-Lain Pendapatan Daerah yang Sah'),
(6, 1, 1, 4, 'Pelampauan Penerimaan Pembiayaan'),
(6, 1, 1, 5, 'Penghematan Belanja'),
(6, 1, 1, 6, 'Kewajiban kepada Pihak Ketiga sampai dengan Akhir Tahun Belum Terselesaikan'),
(6, 1, 1, 7, 'Sisa Dana Akibat Tidak Tercapainya Capaian Target Kinerja dan Sisa Dana Pengeluaran Pembiayaan'),
(6, 1, 1, 8, 'Sisa Belanja Lainnya'),
(6, 1, 1, 99, 'Koreksi SiLPA'),
(6, 1, 2, 1, 'Pencairan Dana Cadangan'),
(6, 1, 3, 1, 'Hasil Penjualan Kekayaan Daerah yang Dipisahkan pada Badan Usaha Milik Negara (BUMN)'),
(6, 1, 3, 2, 'Hasil Penjualan Kekayaan Daerah yang Dipisahkan pada Badan Usaha Milik Daerah (BUMD)'),
(6, 1, 3, 3, 'Hasil penjualan kekayaan daerah yang dipisahkan pada perusahaan milik swasta'),
(6, 1, 4, 1, 'Pinjaman Daerah dari Pemerintah Pusat'),
(6, 1, 4, 2, 'Pinjaman Daerah dari Pemerintah Daerah Lain'),
(6, 1, 4, 3, 'Pinjaman Daerah dari Lembaga Keuangan Bank (LKB)'),
(6, 1, 4, 4, 'Pinjaman Daerah dari Lembaga Keuangan Bukan Bank (LKBB)'),
(6, 1, 4, 5, 'Pinjaman Daerah dari Masyarakat'),
(6, 1, 5, 1, 'Penerimaan Kembali Pemberian Pinjaman Daerah kepada Pemerintah Pusat'),
(6, 1, 5, 2, 'Penerimaan Kembali Pemberian Pinjaman Daerah kepada Pemerintah Daerah Lainnya'),
(6, 1, 5, 3, 'Penerimaan Kembali Pinjaman kepada BUMD'),
(6, 1, 5, 4, 'Penerimaan Kembali Pinjaman kepada BUMN'),
(6, 1, 5, 5, 'Penerimaan Kembali Pinjaman kepada Koperasi'),
(6, 1, 5, 6, 'Penerimaan Kembali Pinjaman kepada Masyarakat'),
(6, 1, 5, 7, 'Penerimaan Kembali Dana Bergulir kepada BLUD'),
(6, 1, 6, 1, 'Penerimaan Kembali Pinjaman melalui BLUD'),
(6, 1, 6, 2, 'Penerimaan Kembali Piutang'),
(6, 1, 6, 3, 'Penerimaan Kembali Investasi Non Permanen Lainnya'),
(6, 1, 6, 4, 'Penerimaan Utang Jangka Panjang Lainnya'),
(6, 2, 1, 1, 'Pembentukan Dana Cadangan'),
(6, 2, 2, 1, 'Penyertaan Modal Daerah pada Badan Usaha Milik Negara (BUMN)'),
(6, 2, 2, 2, 'Penyertaan Modal Daerah pada Badan Usaha Milik Daerah (BUMD)'),
(6, 2, 2, 3, 'Penyertaan Modal/Investasi Pemerintah Daerah'),
(6, 2, 3, 1, 'Pembayaran Pinjaman Daerah dari Pemerintah Pusat'),
(6, 2, 3, 2, 'Pembayaran Pinjaman dari Pemerintah Daerah Lain'),
(6, 2, 3, 3, 'Pembayaran Pinjaman dari Lembaga Keuangan Bank (LKB)'),
(6, 2, 3, 4, 'Pembayaran Pinjaman dari Lembaga Keuangan Bukan Bank (LKBB)'),
(6, 2, 3, 5, 'Pembayaran Pinjaman Daerah dari Masyarakat'),
(6, 2, 3, 6, 'Pembayaran Utang Jangka Panjang Lainnya'),
(6, 2, 4, 1, 'Pemberian Pinjaman Daerah kepada Pemerintah Pusat'),
(6, 2, 4, 2, 'Pemberian Pinjaman Daerah kepada Pemerintah Daerah Lainnya'),
(6, 2, 4, 3, 'Pemberian Pinjaman Daerah kepada BUMD'),
(6, 2, 4, 4, 'Pemberian Pinjaman Daerah kepada BUMN'),
(6, 2, 4, 5, 'Pemberian Pinjaman Daerah kepada Koperasi'),
(6, 2, 4, 6, 'Pemberian Pinjaman Daerah kepada Masyarakat'),
(6, 2, 4, 7, 'Pemberian Pinjaman-Dana Bergulir melalui BLUD'),
(6, 2, 4, 8, 'Pengeluaran Investasi Non Permanen Lainnya'),
(6, 2, 5, 1, 'Pinjaman melalui BLUD'),
(6, 3, 1, 1, 'Surplus/Defisit LRA'),
(6, 3, 2, 1, 'Pembiayaan Netto'),
(6, 3, 3, 1, 'SiLPA/SiKPA'),
(6, 3, 4, 1, 'Perubahan SAL'),
(7, 1, 1, 1, 'Pajak Kendaraan Bermotor (PKB)-LO'),
(7, 1, 1, 2, 'Bea Balik Nama Kendaraan Bermotor (BBNKB)?LO'),
(7, 1, 1, 3, 'Pajak Bahan Bakar Kendaraan Bermotor (PBBKB)-LO'),
(7, 1, 1, 4, 'Pajak Air Permukaan-LO'),
(7, 1, 1, 5, 'Pajak Rokok?LO'),
(7, 1, 1, 6, 'Pajak Hotel-LO'),
(7, 1, 1, 7, 'Pajak Restoran?LO'),
(7, 1, 1, 8, 'Pajak Hiburan-LO'),
(7, 1, 1, 9, 'Pajak Reklame-LO'),
(7, 1, 1, 10, 'Pajak Penerangan Jalan-LO'),
(7, 1, 1, 11, 'Pajak Parkir-LO'),
(7, 1, 1, 12, 'Pajak Air Tanah-LO'),
(7, 1, 1, 13, 'Pajak Sarang Burung Walet-LO'),
(7, 1, 1, 14, 'Pajak Mineral Bukan Logam dan Batuan-LO'),
(7, 1, 1, 15, 'Pajak Bumi dan Bangunan Perdesaan dan Perkotaan (PBBP2)-LO'),
(7, 1, 1, 16, 'Bea Perolehan Hak Atas Tanah dan Bangunan (BPHTB)-LO'),
(7, 1, 1, 17, 'Pajak Lingkungan - LO'),
(7, 1, 2, 1, 'Retribusi Jasa Umum-LO'),
(7, 1, 2, 2, 'Retribusi Jasa Usaha-LO'),
(7, 1, 2, 3, 'Retribusi Perizinan Tertentu-LO'),
(7, 1, 3, 1, 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMN-LO'),
(7, 1, 3, 2, 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMD-LO'),
(7, 1, 3, 3, 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada Perusahaan Swasta-LO'),
(7, 1, 4, 1, 'Hasil Penjualan BMD yang Tidak Dipisahkan- LO'),
(7, 1, 4, 2, 'Hasil Selisih Lebih Tukar Menukar BMD yang Tidak Dipisahkan-LO'),
(7, 1, 4, 3, 'Hasil Pemanfaatan BMD yang Tidak Dipisahkan-LO'),
(7, 1, 4, 4, 'Hasil Kerja Sama Daerah-LO'),
(7, 1, 4, 5, 'Jasa Giro-LO'),
(7, 1, 4, 6, 'Hasil Pengelolaan Dana Bergulir-LO'),
(7, 1, 4, 7, 'Pendapatan Bunga-LO'),
(7, 1, 4, 8, 'Penerimaan atas Tuntutan Ganti Kerugian Keuangan Daerah-LO'),
(7, 1, 4, 9, 'Penerimaan Komisi, Potongan, atau Bentuk Lain-LO'),
(7, 1, 4, 10, 'Penerimaan Keuntungan dari Selisih Nilai Tukar Rupiah terhadap Mata Uang Asing-LO'),
(7, 1, 4, 11, 'Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan-LO'),
(7, 1, 4, 12, 'Pendapatan Denda Pajak Daerah-LO'),
(7, 1, 4, 13, 'Pendapatan Denda Retribusi Daerah-LO'),
(7, 1, 4, 14, 'Pendapatan Hasil Eksekusi atas Jaminan-LO'),
(7, 1, 4, 15, 'Pendapatan dari Pengembalian-LO'),
(7, 1, 4, 16, 'Pendapatan dari BLUD-LO'),
(7, 1, 4, 17, 'Pendapatan Denda Pemanfaatan BMD yang Tidak Dipisahkan-LO'),
(7, 1, 4, 18, 'Pendapatan Dana Kapitasi Jaminan Kesehatan Nasional (JKN) pada Fasilitas Kesehatan Tingkat Pertama (FKTP)-LO'),
(7, 1, 4, 19, 'Pendapatan Hasil Pengelolaan Dana Bergulir- LO'),
(7, 1, 4, 20, 'Pendapatan Berdasarkan Putusan Pengadilan (Inkracht)-LO'),
(7, 1, 4, 21, 'Pendapatan Denda atas Pelanggaran Peraturan Daerah-LO'),
(7, 1, 4, 22, 'Pendapatan Zakat, Infaq, Shadaqah, dan Wakaf -LO'),
(7, 1, 4, 23, 'Pendapatan dari Angsuran/Cicilan Penjualan - LO'),
(7, 1, 4, 24, 'Lain-lain PAD Yang Sah Lainnya - LO'),
(7, 1, 4, 25, 'Fasilitas Sosial dan Fasilitas Umum - LO'),
(7, 2, 1, 1, 'Dana Perimbangan-LO'),
(7, 2, 1, 2, 'Dana Insentif Daerah (DID)-LO'),
(7, 2, 1, 3, 'Dana Otonomi Khusus dan Dana Tambahan'),
(7, 2, 1, 4, 'Dana Keistimewaan-LO'),
(7, 2, 1, 5, 'Dana Desa-LO'),
(7, 2, 2, 1, 'Pendapatan Bagi Hasil-LO'),
(7, 2, 2, 2, 'Bantuan Keuangan'),
(7, 3, 1, 1, 'Pendapatan Hibah dari Pemerintah Pusat-LO'),
(7, 3, 1, 2, 'Pendapatan Hibah dari Pemerintah Daerah Lainnya-LO'),
(7, 3, 1, 3, 'Pendapatan Hibah dari Kelompok Masyarakat/Perorangan Dalam Negeri-LO'),
(7, 3, 1, 4, 'Pendapatan Hibah dari Badan/Lembaga/ Organisasi Dalam Negeri/Luar Negeri-LO'),
(7, 3, 1, 5, 'Sumbangan Pihak Ketiga/Sejenis-LO'),
(7, 3, 2, 1, 'Dana Darurat-LO'),
(7, 3, 3, 1, 'Lain-lain Pendapatan-LO'),
(7, 4, 1, 1, 'Surplus Penjualan BMD yang Tidak Dipisahkan-LO'),
(7, 4, 1, 2, 'Surplus Pertukaran BMD yang Tidak Dipisahkan-LO'),
(7, 4, 1, 3, 'Surplus Pelepasan Investasi Jangka Panjang- LO'),
(7, 4, 1, 4, 'Surplus Pelepasan Investasi Jangka Pendek - LO'),
(7, 4, 2, 1, 'Surplus Penyelesaian Utang kepada Pemerintah Pusat-LO'),
(7, 4, 2, 2, 'Surplus Penyelesaian Utang kepada Lembaga Keuangan Bank (LKB)-LO'),
(7, 4, 2, 3, 'Surplus Penyelesaian Utang kepada Lembaga Keuangan Bukan Bank (LKBB)-LO'),
(7, 4, 2, 4, 'Surplus Penyelesaian Premium (Diskonto) Obligasi-LO'),
(7, 4, 2, 5, 'Surplus Penyelesaian Kewajiban Jangka Panjang - LO'),
(8, 1, 1, 1, 'Beban Gaji dan Tunjangan ASN'),
(8, 1, 1, 2, 'Beban Tambahan Penghasilan ASN'),
(8, 1, 1, 3, 'Beban Tambahan Penghasilan berdasarkan Pertimbangan Objektif Lainnya ASN'),
(8, 1, 1, 4, 'Beban Gaji dan Tunjangan DPRD'),
(8, 1, 1, 5, 'Beban Gaji dan Tunjangan KDH/WKDH'),
(8, 1, 1, 6, 'Beban Penerimaan Lainnya Pimpinan DPRD serta KDH/WKDH'),
(8, 1, 1, 88, 'Beban Pegawai BOS'),
(8, 1, 1, 99, 'Beban Pegawai BLUD'),
(8, 1, 2, 1, 'Beban Barang'),
(8, 1, 2, 2, 'Beban Jasa'),
(8, 1, 2, 3, 'Beban Pemeliharaan'),
(8, 1, 2, 4, 'Beban Perjalanan Dinas'),
(8, 1, 2, 5, 'Beban Uang dan/atau Jasa untuk Diberikan kepada Pihak Ketiga/Pihak Lain/Masyarakat'),
(8, 1, 2, 88, 'Beban Barang dan Jasa BOS'),
(8, 1, 2, 99, 'Beban Barang dan Jasa BLUD'),
(8, 1, 3, 1, 'Beban Bunga Utang kepada Pemerintah Pusat'),
(8, 1, 3, 2, 'Beban Bunga Utang atas Pinjaman kepada Pemerintah Daerah Lain'),
(8, 1, 3, 3, 'Beban Bunga Utang Pinjaman kepada Lembaga Keuangan Bank (LKB)'),
(8, 1, 3, 4, 'Beban Bunga Utang atas Pinjaman kepada Lembaga Keuangan Bukan Bank (LKBB)'),
(8, 1, 3, 5, 'Beban Bunga Utang Kepada Masyarakat'),
(8, 1, 3, 6, 'Beban Bunga Utang Pinjaman melalui BLUD- Jangka Pendek'),
(8, 1, 3, 7, 'Beban Bunga Utang Pinjaman'),
(8, 1, 4, 1, 'Beban Subsidi kepada BUMN'),
(8, 1, 4, 2, 'Beban Subsidi kepada BUMD'),
(8, 1, 4, 3, 'Beban Subsidi kepada Badan Usaha Milik Swasta'),
(8, 1, 4, 4, 'Beban Subsidi kepada Koperasi'),
(8, 1, 5, 1, 'Beban Hibah kepada Pemerintah Pusat'),
(8, 1, 5, 2, 'Beban Hibah kepada Pemerintah Daerah Lainnya'),
(8, 1, 5, 3, 'Beban Hibah kepada BUMN'),
(8, 1, 5, 4, 'Beban Hibah Uang kepada BUMD'),
(8, 1, 5, 5, 'Beban Hibah kepada Badan, Lembaga, Organisasi Kemasyarakatan yang Berbadan Hukum Indonesia'),
(8, 1, 5, 6, 'Beban Hibah Dana BOS'),
(8, 1, 5, 7, 'Beban Hibah Bantuan Keuangan Kepada Partai Politik'),
(8, 1, 6, 1, 'Beban Bantuan Sosial Uang kepada Individu'),
(8, 1, 6, 2, 'Beban Bantuan Sosial Uang kepada Keluarga'),
(8, 1, 6, 3, 'Beban Bantuan Sosial Uang kepada Kelompok Masyarakat'),
(8, 1, 6, 4, 'Beban Bantuan Sosial Uang kepada Lembaga Non Pemerintahan (Bidang Pendidikan, Keagamaan dan Bidang Lainnya)'),
(8, 1, 7, 1, 'Beban Penyisihan Piutang Pajak Daerah'),
(8, 1, 7, 2, 'Beban Penyisihan Piutang Retribusi Daerah'),
(8, 1, 7, 3, 'Beban Penyisihan Piutang Hasil Pengelolaan'),
(8, 1, 7, 4, 'Beban Penyisihan Piutang Lain-Lain PAD yang Sah'),
(8, 1, 7, 5, 'Beban Penyisihan Piutang Transfer Pemerintah Pusat'),
(8, 1, 7, 6, 'Beban Penyisihan Piutang Transfer Antar Daerah'),
(8, 1, 7, 7, 'Beban Penyisihan Piutang Lainnya'),
(8, 1, 8, 1, 'Beban Penurunan Nilai Investasi'),
(8, 1, 8, 2, 'Beban Lain-lain'),
(8, 2, 1, 1, 'Beban Penyusutan Alat Besar'),
(8, 2, 1, 2, 'Beban Penyusutan Alat Angkutan'),
(8, 2, 1, 3, 'Beban Penyusutan Alat Bengkel dan Alat Ukur'),
(8, 2, 1, 4, 'Beban Penyusutan Alat Pertanian'),
(8, 2, 1, 5, 'Beban Penyusutan Alat Kantor dan Rumah Tangga'),
(8, 2, 1, 6, 'Beban Penyusutan Alat Studio, Komunikasi, dan Pemancar'),
(8, 2, 1, 7, 'Beban Penyusutan Alat Kedokteran dan Kesehatan'),
(8, 2, 1, 8, 'Beban Penyusutan Alat Laboratorium'),
(8, 2, 1, 10, 'Beban Penyusutan Komputer'),
(8, 2, 1, 11, 'Beban Penyusutan Alat Eksplorasi'),
(8, 2, 1, 12, 'Beban Penyusutan Alat Pengeboran'),
(8, 2, 1, 13, 'Beban Penyusutan Alat Produksi, Pengolahan dan Pemurnian'),
(8, 2, 1, 14, 'Beban Penyusutan Alat Bantu Eksplorasi'),
(8, 2, 1, 15, 'Beban Penyusutan Alat Keselamatan Kerja'),
(8, 2, 1, 16, 'Beban Penyusutan Alat Peraga'),
(8, 2, 1, 17, 'Beban Penyusutan Peralatan Proses/Produksi'),
(8, 2, 1, 18, 'Beban Penyusutan Rambu-Rambu'),
(8, 2, 1, 19, 'Beban Penyusutan Peralatan Olahraga'),
(8, 2, 2, 1, 'Beban Penyusutan Bangunan Gedung'),
(8, 2, 2, 2, 'Beban Penyusutan Monumen'),
(8, 2, 2, 3, 'Beban Penyusutan Bangunan Menara'),
(8, 2, 2, 4, 'Beban Penyusutan Tugu Titik Kontrol/Pasti'),
(8, 2, 3, 1, 'Beban Penyusutan Jalan dan Jembatan'),
(8, 2, 3, 2, 'Beban Penyusutan Bangunan Air'),
(8, 2, 3, 3, 'Beban Penyusutan Instalasi'),
(8, 2, 3, 4, 'Beban Penyusutan Jaringan'),
(8, 2, 4, 1, 'Beban Penyusutan Barang Bercorak Kesenian/Kebudayaan/Olahraga'),
(8, 2, 4, 2, 'Beban Penyusutan Aset Tetap Dalam Renovasi'),
(8, 2, 5, 1, 'Beban Penyusutan Aset Lainnya'),
(8, 2, 6, 1, 'Beban Amortisasi Aset Tidak Berwujud'),
(8, 3, 1, 1, 'Beban Bagi Hasil Pajak Daerah Kepada Pemerintahan Kabupaten/Kota dan Desa'),
(8, 3, 1, 2, 'Beban Bagi Hasil Retribusi Daerah Kabupaten/Kota Kepada Pemerintah Desa'),
(8, 3, 2, 1, 'Beban Bantuan Keuangan antar Daerah Provinsi'),
(8, 3, 2, 2, 'Beban Bantuan Keuangan antar Daerah Kabupaten/Kota'),
(8, 3, 2, 3, 'Beban Bantuan Keuangan Daerah Provinsi ke Kabupaten/Kota'),
(8, 3, 2, 4, 'Beban Bantuan Keuangan Kabupaten/Kota ke Daerah Provinsi'),
(8, 3, 2, 5, 'Beban Bantuan Keuangan Daerah Provinsi atau Kabupaten/Kota ke Desa'),
(8, 3, 2, 6, 'Beban Transfer Dana Otonomi Khusus Provinsi kepada Kabupaten/Kota'),
(8, 3, 2, 7, 'Beban Transfer Bantuan Kepada Partai Politik'),
(8, 4, 1, 1, 'Beban Tak Terduga'),
(8, 5, 1, 1, 'Defisit Penjualan BMD yang Tidak Dipisahkan- LO'),
(8, 5, 1, 2, 'Defisit Tukar Menukar BMD yang Tidak Dipisahkan-LO'),
(8, 5, 1, 3, 'Defisit Pelepasan Investasi Jangka Panjang-LO'),
(8, 5, 2, 1, 'Defisit Penyelesaian Utang kepada Pemerintah Pusat-LO'),
(8, 5, 2, 2, 'Defisit Penyelesaian Utang kepada Lembaga Keuangan Bank (LKB)-LO'),
(8, 5, 2, 3, 'Defisit Penyelesaian Utang kepada Lembaga Keuangan Bukan Bank (LKBB)-LO'),
(8, 5, 2, 4, 'Defisit Penyelesaian Obligasi-LO'),
(8, 5, 2, 5, 'Defisit Penyelesaian Utang Pemerintah Provinsi - LO'),
(8, 5, 2, 6, 'Defisit Penyelesaian Utang Pemerintah Kabupaten/Kota - LO'),
(8, 5, 2, 7, 'Defisit dari Kegiatan Non Operasional Lainnya - LO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_rek90_5`
--

CREATE TABLE `ref_rek90_5` (
  `kd_rek90_1` int(1) NOT NULL,
  `kd_rek90_2` int(1) NOT NULL,
  `kd_rek90_3` int(2) NOT NULL,
  `kd_rek90_4` int(2) NOT NULL,
  `kd_rek90_5` int(2) NOT NULL,
  `nm_rek90_5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_rek90_6`
--

CREATE TABLE `ref_rek90_6` (
  `kd_rek90_1` int(1) NOT NULL,
  `kd_rek90_2` int(1) NOT NULL,
  `kd_rek90_3` int(2) NOT NULL,
  `kd_rek90_4` int(2) NOT NULL,
  `kd_rek90_5` int(2) NOT NULL,
  `kd_rek90_6` int(4) NOT NULL,
  `nm_rek90_6` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_anggaran`
--

CREATE TABLE `setting_anggaran` (
  `id_setting` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `pendapatan` double NOT NULL,
  `belanja` double NOT NULL,
  `papbd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting_anggaran`
--

INSERT INTO `setting_anggaran` (`id_setting`, `tahun`, `pendapatan`, `belanja`, `papbd`) VALUES
(1, 2021, 13687123662525, 13953318293830, '2021-10-28'),
(2, 2022, 898316782992, 936316782992, '2022-10-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table 61`
--

CREATE TABLE `table 61` (
  `COL 1` varchar(2) DEFAULT NULL,
  `COL 2` int(2) DEFAULT NULL,
  `COL 3` bigint(11) DEFAULT NULL,
  `COL 4` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `table 61`
--

INSERT INTO `table 61` (`COL 1`, `COL 2`, `COL 3`, `COL 4`) VALUES
('DK', 11, 276174000, 258144000),
('DK', 2, 409173000, 380672800),
('DK', 26, 482998000, 478201251),
('DK', 23, 3063660000, 2853976000),
('DK', 21, 3140684000, 3079804000),
('DK', 32, 391348000, 368603450),
('DK', 25, 460517000, 393387188),
('DK', 22, 248789000, 214630500),
('DK', 11, 636846000, 628946000),
('DK', 11, 4092049000, 3864833818),
('DK', 12, 311771000, 288666100),
('DK', 12, 3088340000, 3014270750),
('DK', 31, 470771000, 366840800),
('DK', 31, 1781181000, 1714082585),
('DK', 2, 4501079000, 4478729050),
('DK', 2, 1635381000, 1552270900),
('DK', 2, 15058837000, 14705515598),
('DK', 2, 478237000, 448859600),
('DK', 2, 5031232000, 2652457484),
('DK', 27, 3255203000, 3152451000),
('DK', 27, 979045000, 968109100),
('DK', 26, 390950000, 377992000),
('DK', 26, 722698000, 692385300),
('DK', 26, 133352000, 132987000),
('DK', 26, 101031000, 98356200),
('DK', 26, 155500000, 155139400),
('DK', 31, 1034618000, 960404554),
('DK', 27, 10116676000, 10082178345),
('DK', 28, 799178000, 797535135),
('DK', 14, 11108973000, 10955406500),
('DK', 17, 2170942000, 2078850290),
('DK', 27, 25662802000, 24218325310),
('DK', 11, 5307520000, 5246313600),
('DK', 38, 194503000, 191543088),
('DK', 12, 206808000, 122116000),
('TP', 27, 2678250000, 2668864520),
('TP', 27, 3536861000, 3520747200),
('TP', 28, 2059852000, 1999973700),
('TP', 14, 10510127000, 9423184079),
('TP', 14, 240000000, 240000000),
('TP', 27, 18183195000, 17928484181),
('TP', 28, 570600000, 570379980),
('TP', 6, 19701415000, 19657490425),
('TP', 5, 9447090000, 9440094098);

-- --------------------------------------------------------

--
-- Struktur dari tabel `table 63`
--

CREATE TABLE `table 63` (
  `COL 1` int(6) DEFAULT NULL,
  `COL 2` int(2) DEFAULT NULL,
  `COL 3` varchar(2) DEFAULT NULL,
  `COL 4` varchar(13) DEFAULT NULL,
  `COL 5` varchar(12) DEFAULT NULL,
  `COL 6` int(4) DEFAULT NULL,
  `COL 7` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `table 63`
--

INSERT INTO `table 63` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`) VALUES
(70028, 2, 'DK', ' 2992778000 ', ' 0 ', 2022, 3),
(70044, 26, 'DK', ' 640000000 ', ' 28429469 ', 2022, 3),
(70051, 23, 'DK', ' 3077660000 ', ' 0 ', 2022, 3),
(70055, 21, 'DK', ' 23376950000 ', ' 304600000 ', 2022, 3),
(70060, 32, 'DK', ' 1006891000 ', ' 0 ', 2022, 3),
(70074, 25, 'DK', ' 719992000 ', ' 0 ', 2022, 3),
(79001, 22, 'DK', ' 357781000 ', ' 0 ', 2022, 3),
(79006, 12, 'DK', ' 322089000 ', ' 0 ', 2022, 3),
(79009, 12, 'DK', ' 463563000 ', ' 0 ', 2022, 3),
(79010, 12, 'DK', ' 3449918000 ', ' 0 ', 2022, 3),
(79016, 31, 'DK', ' 338802000 ', ' 0 ', 2022, 3),
(79019, 31, 'DK', ' 1197000000 ', ' 0 ', 2022, 3),
(79020, 2, 'DK', ' 24516290000 ', ' 0 ', 2022, 3),
(79021, 2, 'DK', ' 1596315000 ', ' 0 ', 2022, 3),
(79022, 2, 'DK', ' 14772896000 ', ' 0 ', 2022, 3),
(79023, 2, 'DK', ' 192766000 ', ' 0 ', 2022, 3),
(79024, 2, 'DK', ' 3487279000 ', ' 0 ', 2022, 3),
(79025, 27, 'DK', ' 9011522000 ', ' 348334375 ', 2022, 3),
(79027, 27, 'DK', ' 619275000 ', ' 147937425 ', 2022, 3),
(79031, 26, 'DK', ' 1127908000 ', ' 0 ', 2022, 3),
(79032, 26, 'DK', ' 1070809000 ', ' 0 ', 2022, 3),
(79033, 26, 'DK', ' 160542000 ', ' 0 ', 2022, 3),
(79034, 26, 'DK', ' 318650000 ', ' 0 ', 2022, 3),
(79035, 26, 'DK', ' 186750000 ', ' 0 ', 2022, 3),
(79071, 12, 'DK', ' 234776000 ', ' 0 ', 2022, 3),
(79074, 31, 'DK', ' 1100323000 ', ' 0 ', 2022, 3),
(79076, 27, 'DK', ' 7076439000 ', ' 840179011 ', 2022, 3),
(79077, 28, 'DK', ' 914591000 ', ' 90000000 ', 2022, 3),
(79124, 27, 'TP', ' 8556762000 ', ' 245950000 ', 2022, 3),
(79125, 27, 'TP', ' 6012312000 ', ' 72456950 ', 2022, 3),
(79126, 28, 'TP', ' 5081240000 ', ' 51177000 ', 2022, 3),
(79127, 14, 'TP', ' 9758019000 ', ' 1058624623 ', 2022, 3),
(79131, 14, 'TP', ' 154800000 ', ' 19800000 ', 2022, 3),
(79132, 27, 'TP', ' 10834405000 ', ' 67132000 ', 2022, 3),
(79136, 26, 'TP', ' 491411000 ', ' 0 ', 2022, 3),
(79330, 6, 'TP', ' 20522435000 ', ' 3477968568 ', 2022, 3),
(79333, 5, 'TP', ' 10607864000 ', ' 111872600 ', 2022, 3),
(417999, 27, 'DK', ' 16732808000 ', ' 368274956 ', 2022, 3),
(484105, 22, 'DK', ' 355335000 ', ' 0 ', 2022, 3),
(484106, 32, 'DK', ' 355335000 ', ' 0 ', 2022, 3),
(484107, 38, 'DK', ' 515440000 ', ' 0 ', 2022, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_belanja_rinc_sub`
--

CREATE TABLE `ta_belanja_rinc_sub` (
  `tahun` int(4) NOT NULL,
  `kd_urusan` int(1) NOT NULL,
  `kd_bidang` int(1) NOT NULL,
  `kd_unit` int(1) NOT NULL,
  `kd_sub` int(2) NOT NULL,
  `kd_prog` int(2) NOT NULL,
  `id_prog` int(3) NOT NULL,
  `kd_keg` int(2) NOT NULL,
  `kd_rek_1` int(1) NOT NULL,
  `kd_rek_2` int(1) NOT NULL,
  `kd_rek_3` int(1) NOT NULL,
  `kd_rek_4` int(1) NOT NULL,
  `kd_rek_5` int(3) NOT NULL,
  `no_rinc` int(3) NOT NULL,
  `no_id` int(3) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_jurnalsemua`
--

CREATE TABLE `ta_jurnalsemua` (
  `tahun` int(4) NOT NULL,
  `kd_source` int(1) NOT NULL,
  `no_bukti` varchar(50) NOT NULL,
  `kd_urusan` int(1) NOT NULL,
  `kd_bidang` int(1) NOT NULL,
  `kd_unit` int(1) NOT NULL,
  `kd_sub` int(3) NOT NULL,
  `tgl_bukti` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_kabupaten`
--

CREATE TABLE `ta_kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` varchar(30) NOT NULL,
  `kabupaten_danadesa` varchar(50) NOT NULL,
  `kode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_kabupaten`
--

INSERT INTO `ta_kabupaten` (`id_kabupaten`, `nama_kabupaten`, `kabupaten_danadesa`, `kode`) VALUES
(34, 'KABUPATEN LABUHANBATU SELATAN', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_kontrak`
--

CREATE TABLE `ta_kontrak` (
  `id_kontrak` int(5) NOT NULL,
  `tahun` int(4) NOT NULL,
  `pagu` double NOT NULL,
  `no_kontrak` varchar(50) NOT NULL,
  `kd_urusan` int(2) NOT NULL,
  `kd_bidang` int(2) NOT NULL,
  `kd_unit` int(2) NOT NULL,
  `kd_sub` int(2) NOT NULL,
  `kd_prog` int(3) NOT NULL,
  `id_prog` int(3) NOT NULL,
  `kd_keg` int(3) NOT NULL,
  `tgl_kontrak` datetime NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `waktu` varchar(150) NOT NULL,
  `nilai` double NOT NULL,
  `nm_perusahaan` varchar(100) NOT NULL,
  `bentuk` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nm_pemilik` varchar(100) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `nm_bank` varchar(50) NOT NULL,
  `nm_rekening` varchar(100) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `real_kontrak` double NOT NULL,
  `realisasi` double NOT NULL,
  `persen_realisasi` double NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_prioritas` int(1) NOT NULL,
  `id_kegiatan` int(2) NOT NULL,
  `status_1` enum('Y','N') NOT NULL DEFAULT 'N',
  `status_2` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_kontrak_pa`
--

CREATE TABLE `ta_kontrak_pa` (
  `id_kontrak` int(5) NOT NULL,
  `nama_pa` varchar(100) NOT NULL,
  `nip_pa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_pendapatan_rinc`
--

CREATE TABLE `ta_pendapatan_rinc` (
  `tahun` int(4) NOT NULL,
  `kd_urusan` int(1) NOT NULL,
  `kd_bidang` int(2) NOT NULL,
  `kd_unit` int(1) NOT NULL,
  `kd_sub` int(1) NOT NULL,
  `kd_rek_1` int(1) NOT NULL,
  `kd_rek_2` int(1) NOT NULL,
  `kd_rek_3` int(2) NOT NULL,
  `kd_rek_4` int(2) NOT NULL,
  `kd_rek_5` int(2) NOT NULL,
  `no_id` int(1) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_rencana`
--

CREATE TABLE `ta_rencana` (
  `kd_urusan` int(1) NOT NULL,
  `kd_bidang` int(2) NOT NULL,
  `kd_unit` int(1) NOT NULL,
  `kd_sub` int(1) NOT NULL,
  `jan` double NOT NULL,
  `feb` double NOT NULL,
  `mar` double NOT NULL,
  `apr` double NOT NULL,
  `mei` double NOT NULL,
  `jun` double NOT NULL,
  `jul` double NOT NULL,
  `agt` double NOT NULL,
  `sep` double NOT NULL,
  `okt` double NOT NULL,
  `nop` double NOT NULL,
  `des` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_spp_kontrak`
--

CREATE TABLE `ta_spp_kontrak` (
  `tahun` int(4) NOT NULL,
  `no_spp` varchar(50) NOT NULL,
  `no_kontrak` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bentuk` varchar(25) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nm_pimpinan` varchar(50) NOT NULL,
  `nm_bank` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tgl_kontrak` datetime NOT NULL,
  `waktu` varchar(150) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `nilai` double NOT NULL,
  `no_addendum` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_spp_rinc`
--

CREATE TABLE `ta_spp_rinc` (
  `tahun` int(4) NOT NULL,
  `no_spp` varchar(50) NOT NULL,
  `no_id` int(5) NOT NULL,
  `kd_urusan` int(2) NOT NULL,
  `kd_bidang` int(2) NOT NULL,
  `kd_unit` int(2) NOT NULL,
  `kd_sub` int(3) NOT NULL,
  `kd_prog` int(4) NOT NULL,
  `id_prog` int(4) NOT NULL,
  `kd_keg` int(4) NOT NULL,
  `kd_rek_1` int(2) NOT NULL,
  `kd_rek_2` int(2) NOT NULL,
  `kd_rek_3` int(2) NOT NULL,
  `kd_rek_4` int(2) NOT NULL,
  `kd_rek_5` int(4) NOT NULL,
  `usulan` double NOT NULL,
  `nilai` double NOT NULL,
  `kd_sumber` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggaran_wilayah`
--

CREATE TABLE `tbl_anggaran_wilayah` (
  `no` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `pendapatan` decimal(15,2) NOT NULL,
  `belanja` decimal(15,2) NOT NULL,
  `pendapatan_p` double NOT NULL,
  `belanja_p` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dana_dekon`
--

CREATE TABLE `tbl_dana_dekon` (
  `id_dana` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `jenis` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pagu` double NOT NULL,
  `tahun` int(4) NOT NULL,
  `kd_satker` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dana_desa`
--

CREATE TABLE `tbl_dana_desa` (
  `id_danadesa` int(5) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `tahun` int(11) NOT NULL DEFAULT '2021',
  `bulan` int(11) NOT NULL DEFAULT '12',
  `alokasi` double NOT NULL,
  `tahap1` double NOT NULL,
  `tahap2` double NOT NULL,
  `tahap3` double NOT NULL,
  `total_realisasi` double NOT NULL,
  `persen` double NOT NULL,
  `desa` int(11) NOT NULL,
  `desa1` int(11) NOT NULL,
  `desa2` int(11) NOT NULL,
  `desa3` int(11) NOT NULL,
  `belum1` int(11) NOT NULL,
  `belum2` int(11) NOT NULL,
  `belum3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dana_desa_log`
--

CREATE TABLE `tbl_dana_desa_log` (
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL DEFAULT '12',
  `periode` date NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dana_tkdd`
--

CREATE TABLE `tbl_dana_tkdd` (
  `id_tkdd` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `tahun` int(11) NOT NULL DEFAULT '2021',
  `daerah_del` varchar(25) NOT NULL,
  `dbh` decimal(13,0) NOT NULL,
  `dau` decimal(13,0) NOT NULL,
  `dakfisik` decimal(13,0) NOT NULL,
  `daknon` decimal(13,0) NOT NULL,
  `did` decimal(13,0) NOT NULL,
  `desa` decimal(13,0) NOT NULL,
  `realisasi_desa` decimal(13,0) NOT NULL,
  `persen_desa` float NOT NULL,
  `total` decimal(13,0) NOT NULL,
  `st_apbd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_dak`
--

CREATE TABLE `tbl_data_dak` (
  `id_dak` int(5) NOT NULL,
  `subbidang` varchar(150) DEFAULT NULL,
  `id_satker` int(2) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `tahun` int(4) NOT NULL DEFAULT '2021',
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_anggaran_wil`
--

CREATE TABLE `tbl_detail_anggaran_wil` (
  `no` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `pad_anggaran` decimal(15,2) NOT NULL,
  `transfer_anggaran` decimal(15,2) NOT NULL,
  `lain_anggaran` decimal(15,2) NOT NULL,
  `operasional_anggaran` decimal(15,2) NOT NULL,
  `modal_anggaran` decimal(15,2) NOT NULL,
  `takter_anggaran` decimal(15,2) NOT NULL,
  `beltransfer_anggaran` decimal(15,2) NOT NULL,
  `st_apbd` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_realisasi_wil`
--

CREATE TABLE `tbl_detail_realisasi_wil` (
  `no` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `pad_realisasi` decimal(15,2) NOT NULL,
  `pad_persen` double NOT NULL,
  `transfer_realisasi` decimal(15,2) NOT NULL,
  `transfer_persen` double NOT NULL,
  `lain_realisasi` decimal(15,2) NOT NULL,
  `lain_persen` double NOT NULL,
  `operasional_realisasi` decimal(15,2) NOT NULL,
  `operasional_persen` double NOT NULL,
  `modal_realisasi` decimal(15,2) NOT NULL,
  `modal_persen` double NOT NULL,
  `takter_realisasi` decimal(15,2) NOT NULL,
  `takter_persen` double NOT NULL,
  `beltransfer_realisasi` decimal(15,2) NOT NULL,
  `beltransfer_persen` double NOT NULL,
  `tanggal` date NOT NULL DEFAULT '2021-05-30'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mandatory`
--

CREATE TABLE `tbl_mandatory` (
  `id_mandatory` int(11) NOT NULL,
  `tahun` int(11) NOT NULL DEFAULT '2021',
  `id_kabupaten` int(11) NOT NULL,
  `pendidikan` double NOT NULL,
  `persen_pendidikan` double NOT NULL,
  `kesehatan` double NOT NULL,
  `persen_kesehatan` double NOT NULL,
  `infrastruktur` double NOT NULL,
  `persen_infrestruktur` double NOT NULL,
  `fkub` double NOT NULL,
  `persen_fkub` double NOT NULL,
  `kompetisi` double NOT NULL,
  `persen_kompetisi` double NOT NULL,
  `pengawasan` double NOT NULL,
  `persen_pengawasan` double NOT NULL,
  `st_apbd` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mandatory`
--

INSERT INTO `tbl_mandatory` (`id_mandatory`, `tahun`, `id_kabupaten`, `pendidikan`, `persen_pendidikan`, `kesehatan`, `persen_kesehatan`, `infrastruktur`, `persen_infrestruktur`, `fkub`, `persen_fkub`, `kompetisi`, `persen_kompetisi`, `pengawasan`, `persen_pengawasan`, `st_apbd`) VALUES
(39, 2022, 34, 257745400269, 28.05, 160007163028, 22.45, 200418751736, 41.63, 0, 0, 0, 0, 67788110000, 12.61, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mandatory_papbd`
--

CREATE TABLE `tbl_mandatory_papbd` (
  `id_mandatory` int(11) NOT NULL,
  `tahun` int(11) NOT NULL DEFAULT '2021',
  `id_kabupaten` int(11) NOT NULL,
  `pendidikan` double NOT NULL,
  `persen_pendidikan` double NOT NULL,
  `kesehatan` double NOT NULL,
  `persen_kesehatan` double NOT NULL,
  `infrastruktur` double NOT NULL,
  `persen_infrestruktur` double NOT NULL,
  `fkub` double NOT NULL,
  `persen_fkub` double NOT NULL,
  `kompetisi` double NOT NULL,
  `persen_kompetisi` double NOT NULL,
  `pengawasan` double NOT NULL,
  `persen_pengawasan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_realisasi_dak`
--

CREATE TABLE `tbl_realisasi_dak` (
  `id_realisasi` int(7) NOT NULL,
  `id_dak` int(5) NOT NULL,
  `id_satker` int(2) DEFAULT NULL,
  `sp2d_tahap1` double DEFAULT NULL,
  `sp2d_tahap2` double DEFAULT NULL,
  `sp2d_tahap3` double DEFAULT NULL,
  `sp2d_total` double DEFAULT NULL,
  `tahun` int(4) NOT NULL DEFAULT '2021',
  `bulan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_realisasi_dekon`
--

CREATE TABLE `tbl_realisasi_dekon` (
  `id_dana` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `jenis` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `realisasi` double NOT NULL,
  `tahun` int(4) NOT NULL,
  `bulan` int(2) NOT NULL,
  `id_realisasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_realisasi_wilayah`
--

CREATE TABLE `tbl_realisasi_wilayah` (
  `no` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `pendapatan_realisasi` decimal(15,2) NOT NULL,
  `pendapatan_persen` double NOT NULL,
  `belanja_realisasi` decimal(15,2) NOT NULL,
  `belanja_persen` double NOT NULL,
  `tanggal` date NOT NULL DEFAULT '2021-05-30',
  `tgl_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_realisasi_wilayah`
--

INSERT INTO `tbl_realisasi_wilayah` (`no`, `id_kabupaten`, `tahun`, `bulan`, `pendapatan_realisasi`, `pendapatan_persen`, `belanja_realisasi`, `belanja_persen`, `tanggal`, `tgl_update`) VALUES
(1, 1, 2021, 2, '109139273194.42', 0, '25782218052.00', 0, '2021-05-30', '2021-12-31 10:34:24'),
(2, 2, 2021, 2, '37635777698.00', 0, '24490327848.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(3, 3, 2021, 2, '335883413658.39', 0, '141285556063.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(4, 4, 2021, 2, '71235103472.00', 0, '52857872005.48', 0, '2021-05-30', '2021-12-31 10:26:49'),
(5, 5, 2021, 2, '46459561406.00', 0, '1645600000.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(6, 6, 2021, 2, '128039263116.78', 0, '34681847216.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(7, 7, 2021, 2, '154290899814.00', 0, '30134874990.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(8, 8, 2021, 2, '83496534560.00', 0, '53176893779.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(9, 9, 2021, 2, '0.00', 0, '22532537059.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(10, 10, 2021, 2, '35779472150.00', 0, '20195175584.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(11, 11, 2021, 2, '306695349079.94', 0, '164213585515.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(12, 12, 2021, 2, '216127021546.00', 0, '509129377.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(13, 13, 2021, 2, '109873207142.28', 0, '24289756798.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(14, 14, 2021, 2, '88339188087.20', 0, '18113909657.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(15, 15, 2021, 2, '110595339746.96', 0, '54168378810.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(16, 16, 2021, 2, '250923145221.17', 0, '79019543280.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(17, 17, 2021, 2, '67077924182.98', 0, '27749774648.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(18, 18, 2021, 2, '149990172769.00', 0, '35907144217.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(19, 19, 2021, 2, '107404208621.42', 0, '58689215606.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(20, 20, 2021, 2, '64070620522.00', 0, '18586542922.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(21, 21, 2021, 2, '150455007727.77', 0, '46579183976.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(22, 22, 2021, 2, '102784166686.00', 0, '6516444860.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(23, 23, 2021, 2, '187584091144.65', 0, '71181530347.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(24, 24, 2021, 2, '42462855726.00', 0, '15356590538.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(25, 25, 2021, 2, '138848183905.82', 0, '38481467732.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(26, 26, 2021, 2, '43356366828.00', 0, '20021376121.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(27, 27, 2021, 2, '322387518014.00', 0, '64308594296.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(28, 28, 2021, 2, '234771224590.00', 0, '50304567858.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(29, 29, 2021, 2, '86009833842.00', 0, '66432413547.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(30, 30, 2021, 2, '72009018426.00', 0, '27548662460.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(31, 31, 2021, 2, '10717068659.00', 0, '61069240390.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(32, 32, 2021, 2, '214150129515.00', 0, '55907583386.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(33, 33, 2021, 2, '37429199610.00', 0, '26557887724.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(34, 1, 2021, 3, '129277901316.86', 0, '67462206709.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(35, 2, 2021, 3, '109102732561.93', 0, '44209432463.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(36, 3, 2021, 3, '455172790925.61', 0, '186708206919.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(37, 4, 2021, 3, '73944639146.00', 0, '89011157786.65', 0, '2021-05-30', '2021-12-31 10:26:49'),
(38, 5, 2021, 3, '174907615558.66', 0, '103198763611.66', 0, '2021-05-30', '2021-12-31 10:26:49'),
(39, 6, 2021, 3, '18642557024.00', 0, '21405427217.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(40, 7, 2021, 3, '8696046181.00', 0, '79727894542.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(41, 8, 2021, 3, '199968240798.00', 0, '76264854337.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(42, 9, 2021, 3, '139691198.02', 0, '103979998271.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(43, 10, 2021, 3, '73181866217.00', 0, '36648883683.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(44, 11, 2021, 3, '488231093318.45', 0, '288652587376.95', 0, '2021-05-30', '2021-12-31 10:26:49'),
(45, 12, 2021, 3, '343937100238.00', 0, '171384166465.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(46, 13, 2021, 3, '266186298471.97', 0, '87208936520.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(47, 14, 2021, 3, '93898499736.20', 0, '34177315858.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(48, 15, 2021, 3, '173275663998.96', 0, '93861525601.08', 0, '2021-05-30', '2021-12-31 10:26:49'),
(49, 16, 2021, 3, '401308864599.73', 0, '141702037568.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(50, 17, 2021, 3, '67207593519.18', 0, '28037809770.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(51, 18, 2021, 3, '379008868824.00', 0, '56624550486.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(52, 19, 2021, 3, '224883267164.42', 0, '166449150076.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(53, 20, 2021, 3, '203576393297.00', 0, '68968299232.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(54, 21, 2021, 3, '233533946258.77', 0, '74117696251.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(55, 22, 2021, 3, '103047973804.00', 0, '59900867132.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(56, 23, 2021, 3, '284244106580.92', 0, '137720859208.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(57, 24, 2021, 3, '42462855726.00', 0, '26396616705.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(58, 25, 2021, 3, '224023380744.26', 0, '70846187480.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(59, 26, 2021, 3, '203286299272.00', 0, '63490190557.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(60, 27, 2021, 3, '342422839108.00', 0, '199891816472.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(61, 28, 2021, 3, '299190887112.00', 0, '299190887112.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(62, 29, 2021, 3, '122170231881.00', 0, '35632394315.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(63, 30, 2021, 3, '46257974418.00', 0, '2534746754.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(64, 31, 2021, 3, '310231606817.79', 0, '26701197360.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(65, 32, 2021, 3, '279039591088.00', 0, '105978481309.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(66, 33, 2021, 3, '47153743554.43', 0, '60363492863.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(67, 1, 2021, 4, '137321182555.02', 0, '97246210637.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(68, 2, 2021, 4, '203966386006.00', 0, '64090660428.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(69, 3, 2021, 4, '991667428190.65', 0, '477399012741.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(70, 4, 2021, 4, '128490174261.00', 0, '81534108767.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(71, 5, 2021, 4, '235278993698.21', 0, '191547657134.62', 0, '2021-05-30', '2021-12-31 10:26:49'),
(72, 6, 2021, 4, '24840564782.00', 0, '39935933542.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(73, 7, 2021, 4, '14139465377.56', 0, '144269777647.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(74, 8, 2021, 4, '271604137506.00', 0, '126436642563.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(75, 9, 2021, 4, '139691198.02', 0, '131545680990.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(76, 10, 2021, 4, '88862829354.77', 0, '49712722093.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(77, 11, 2021, 4, '835573723086.87', 0, '511264378250.95', 0, '2021-05-30', '2021-12-31 10:26:49'),
(78, 12, 2021, 4, '344381535144.00', 0, '254854641153.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(79, 13, 2021, 4, '127068546527.99', 0, '102357158639.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(80, 14, 2021, 4, '139018966529.20', 0, '56138178856.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(81, 15, 2021, 4, '193129087455.77', 0, '121115769158.08', 0, '2021-05-30', '2021-12-31 10:26:49'),
(82, 16, 2021, 4, '481247340425.51', 0, '252176217001.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(83, 17, 2021, 4, '274041853997.02', 0, '201455307815.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(84, 18, 2021, 4, '228411152130.00', 0, '121429891451.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(85, 19, 2021, 4, '285551974887.40', 0, '210830483472.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(86, 20, 2021, 4, '75836648099.27', 0, '92176684972.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(87, 21, 2021, 4, '312561578670.12', 0, '170044590066.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(88, 22, 2021, 4, '103047973804.00', 0, '111014136635.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(89, 23, 2021, 4, '11308546957.00', 0, '77972074624.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(90, 24, 2021, 4, '154689548279.22', 0, '78186577401.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(91, 25, 2021, 4, '282566274666.85', 0, '123052209120.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(92, 26, 2021, 4, '231767037709.16', 0, '101780556654.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(93, 27, 2021, 4, '465338605957.00', 0, '346003187755.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(94, 28, 2021, 4, '483078847281.00', 0, '209317085962.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(95, 29, 2021, 4, '122170231881.00', 0, '67599200086.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(96, 30, 2021, 4, '163851647179.48', 0, '92238425858.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(97, 31, 2021, 4, '304101502406.79', 0, '263553266198.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(98, 32, 2021, 4, '318811122424.00', 0, '175377629824.00', 0, '2021-05-30', '2021-12-31 10:26:49'),
(99, 33, 2021, 4, '91180462811.15', 0, '84751508744.75', 0, '2021-05-30', '2021-12-31 10:26:49'),
(100, 1, 2021, 5, '239300260502.02', 39.61, '148577949995.00', 24.6, '2021-05-30', '2021-12-31 10:26:49'),
(101, 2, 2021, 5, '253881114570.45', 35.53, '138854244114.00', 18.96, '2021-05-30', '2021-12-31 10:26:49'),
(102, 3, 2021, 5, '1829560928770.85', 35.21, '1060553707741.00', 19.84, '2021-05-30', '2021-12-31 10:26:49'),
(103, 4, 2021, 5, '130727532637.00', 17.7, '195027433463.62', 25.12, '2021-05-30', '2021-12-31 10:26:49'),
(104, 5, 2021, 5, '332911939975.56', 32.43, '257659961870.62', 25.46, '2021-05-30', '2021-12-31 10:26:49'),
(105, 6, 2021, 5, '171213926853.42', 20.96, '183035905641.00', 20.5, '2021-05-30', '2021-12-31 10:26:49'),
(106, 7, 2021, 5, '19137699987.56', 2.16, '205413810112.00', 22.32, '2021-05-30', '2021-12-31 10:26:49'),
(107, 8, 2021, 5, '295819755639.00', 21.69, '197758377086.00', 14.5, '2021-05-30', '2021-12-31 10:26:49'),
(108, 9, 2021, 5, '112680866936.02', 14.67, '157468419398.00', 20.06, '2021-05-30', '2021-12-31 10:26:49'),
(109, 10, 2021, 5, '117263516179.77', 13.95, '107815451488.00', 12.06, '2021-05-30', '2021-12-31 10:26:49'),
(110, 11, 2021, 5, '1057320971100.00', 26.44, '907414087900.95', 22.54, '2021-05-30', '2021-12-31 10:26:49'),
(111, 12, 2021, 5, '349056715007.00', 19.17, '530974111699.00', 29.15, '2021-05-30', '2021-12-31 10:26:49'),
(112, 13, 2021, 5, '398362594877.24', 33.55, '300394389413.00', 24.47, '2021-05-30', '2021-12-31 10:26:49'),
(113, 14, 2021, 5, '173183525163.62', 27.43, '98907897733.00', 14.79, '2021-05-30', '2021-12-31 10:26:49'),
(114, 15, 2021, 5, '322712455845.77', 22.1, '194557608036.08', 12.02, '2021-05-30', '2021-12-31 10:26:49'),
(115, 16, 2021, 5, '581399298991.71', 36.58, '391362913173.00', 23.63, '2021-05-30', '2021-12-31 10:26:49'),
(116, 17, 2021, 5, '297209451005.08', 18.08, '309826473775.00', 18.52, '2021-05-30', '2021-12-31 10:26:49'),
(117, 18, 2021, 5, '277443377264.41', 25.56, '208137772564.00', 13.7, '2021-05-30', '2021-12-31 10:26:49'),
(118, 19, 2021, 5, '285073490522.49', 21.29, '331700570746.00', 22, '2021-05-30', '2021-12-31 10:26:49'),
(119, 20, 2021, 5, '349497484571.97', 34.09, '225796649123.00', 22.02, '2021-05-30', '2021-12-31 10:26:49'),
(120, 21, 2021, 5, '378852843026.24', 32.7, '276858496786.00', 22.91, '2021-05-30', '2021-12-31 10:26:49'),
(121, 22, 2021, 5, '240186898395.68', 21.88, '207414721262.00', 18.26, '2021-05-30', '2021-12-31 10:26:49'),
(122, 23, 2021, 5, '364337241473.50', 27.85, '313845867884.00', 23.2, '2021-05-30', '2021-12-31 10:26:49'),
(123, 24, 2021, 5, '174360962359.22', 19.34, '181410855671.00', 19.47, '2021-05-30', '2021-12-31 10:26:49'),
(124, 25, 2021, 5, '340656254015.78', 30.96, '259631144649.00', 23.35, '2021-05-30', '2021-12-31 10:26:49'),
(125, 26, 2021, 5, '285247842348.16', 28.72, '183441947191.00', 16.69, '2021-05-30', '2021-12-31 10:26:49'),
(126, 27, 2021, 5, '631606191786.00', 26.96, '500890808195.00', 22.34, '2021-05-30', '2021-12-31 10:26:49'),
(127, 28, 2021, 5, '568776547518.00', 44.26, '340861545930.00', 25.47, '2021-05-30', '2021-12-31 10:26:49'),
(128, 29, 2021, 5, '154174038547.00', 28.78, '114613667494.00', 20.65, '2021-05-30', '2021-12-31 10:26:49'),
(129, 30, 2021, 5, '172763620793.48', 18.77, '168395632136.00', 16.44, '2021-05-30', '2021-12-31 10:26:49'),
(130, 31, 2021, 5, '329684656315.79', 29.02, '380263247569.00', 31.23, '2021-05-30', '2021-12-31 10:26:49'),
(131, 32, 2021, 5, '575885132162.16', 38.71, '375452197785.63', 25.24, '2021-05-30', '2021-12-31 10:26:49'),
(132, 33, 2021, 5, '181253870008.16', 28.5, '140951398418.49', 18.64, '2021-05-30', '2021-12-31 10:26:49'),
(133, 1, 2021, 8, '352418865187.28', 58.34, '279613104515.55', 46.29, '2021-08-31', '2021-12-31 10:26:49'),
(139, 27, 2021, 8, '1063246174483.00', 45.38, '1019089769846.00', 45.45, '2021-08-31', '2021-12-31 10:26:49'),
(140, 2, 2021, 8, '378790830551.00', 53.01, '302174490533.00', 41.26, '2021-08-31', '2021-12-31 10:26:49'),
(141, 5, 2021, 8, '469837488837.18', 45.77, '466649699463.82', 46.12, '2021-08-31', '2021-12-31 10:26:49'),
(142, 6, 2021, 8, '348169935897.28', 42.62, '335881300148.29', 37.62, '2021-08-31', '2021-12-31 10:26:49'),
(143, 7, 2021, 8, '441211217599.33', 49.69, '416240655536.78', 45.23, '2021-08-31', '2021-12-31 10:26:49'),
(144, 8, 2021, 8, '644369257364.04', 47.26, '458408011975.00', 33.62, '2021-08-31', '2021-12-31 10:26:49'),
(145, 9, 2021, 8, '355482364972.21', 46.3, '250844336666.81', 31.95, '2021-08-31', '2021-12-31 10:26:49'),
(146, 11, 2021, 8, '2041393821771.17', 51.04, '1700464985792.95', 42.23, '2021-08-31', '2021-12-31 10:26:49'),
(147, 12, 2021, 8, '1177354645629.76', 64.64, '894583989221.00', 49.12, '2021-08-31', '2021-12-31 10:26:49'),
(148, 13, 2021, 8, '791955876469.48', 66.7, '413466019989.00', 33.68, '2021-08-31', '2021-12-31 10:26:49'),
(149, 14, 2021, 8, '294433192291.81', 46.64, '217975368612.00', 32.6, '2021-08-31', '2021-12-31 10:26:49'),
(150, 10, 2021, 8, '429611273566.75', 51.12, '323758411121.14', 36.2, '2021-08-31', '2021-12-31 10:26:49'),
(151, 17, 2021, 8, '845591580213.21', 51.44, '618623573462.00', 36.97, '2021-08-31', '2021-12-31 10:26:49'),
(152, 20, 2021, 8, '558808808612.97', 54.5, '468778485879.00', 45.72, '2021-08-31', '2021-12-31 10:26:49'),
(153, 21, 2021, 8, '692915490368.74', 59.8, '530518934355.40', 43.91, '2021-08-31', '2021-12-31 10:26:49'),
(154, 22, 2021, 8, '511522770295.87', 46.6, '440906179067.00', 38.81, '2021-08-31', '2021-12-31 10:26:49'),
(155, 23, 2021, 8, '673764060217.96', 51.5, '538990997523.38', 39.84, '2021-08-31', '2021-12-31 10:26:49'),
(156, 25, 2021, 8, '604779925095.94', 54.96, '467754802498.00', 42.06, '2021-08-31', '2021-12-31 10:26:49'),
(157, 26, 2021, 8, '512376983239.16', 51.59, '399585439719.00', 36.36, '2021-08-31', '2021-12-31 10:26:49'),
(158, 24, 2021, 8, '436872162385.11', 48.47, '336914676068.53', 36.16, '2021-08-31', '2021-12-31 10:26:49'),
(159, 28, 2021, 8, '847634455734.00', 65.96, '636239326442.00', 47.54, '2021-08-31', '2021-12-31 10:26:49'),
(160, 29, 2021, 8, '280823031395.24', 52.43, '183856772717.00', 33.12, '2021-08-31', '2021-12-31 10:26:49'),
(161, 30, 2021, 8, '445364298444.99', 48.38, '548092659192.00', 53.52, '2021-08-31', '2021-12-31 10:26:49'),
(162, 31, 2021, 8, '596226946425.33', 52.49, '621842414217.00', 51.07, '2021-08-31', '2021-12-31 10:26:49'),
(164, 33, 2021, 8, '298236240518.55', 46.89, '263013252390.00', 34.78, '2021-08-31', '2021-12-31 10:26:49'),
(165, 18, 2021, 8, '582766788582.98', 53.7, '515660073023.00', 33.95, '2021-08-31', '2021-12-31 10:26:49'),
(167, 32, 2021, 8, '905635943532.00', 60.88, '706247126836.24', 47.48, '2021-08-31', '2021-12-31 10:26:49'),
(168, 3, 2021, 8, '3163290015285.58', 60.87, '2041223804929.00', 38.18, '2021-08-31', '2021-12-31 10:26:49'),
(169, 16, 2021, 8, '581399298992.00', 36.58, '391362913173.00', 23.63, '2021-05-31', '2021-12-31 10:26:49'),
(170, 19, 2021, 8, '285073490522.00', 21.29, '331700570746.00', 22, '2021-05-31', '2021-12-31 10:26:49'),
(171, 4, 2021, 8, '130727532637.00', 17.7, '195027433464.00', 25.12, '2021-05-31', '2021-12-31 10:26:49'),
(172, 15, 2021, 8, '322712455846.00', 22.1, '194557608036.00', 12.02, '2021-05-31', '2021-12-31 10:26:49'),
(173, 1, 2021, 9, '384750006918.28', 58.34, '323456254123.81', 46.29, '2021-09-30', '2021-12-31 10:26:49'),
(174, 2, 2021, 9, '428118644912.94', 53.01, '337024060162.00', 41.26, '2021-09-30', '2021-12-31 10:26:49'),
(175, 3, 2021, 9, '3572077454831.31', 60.87, '2344865205872.00', 38.18, '2021-09-30', '2021-12-31 10:26:49'),
(176, 4, 2021, 9, '436432568954.00', 17.7, '405891821227.10', 25.12, '2021-09-30', '2021-12-31 10:26:49'),
(177, 5, 2021, 9, '542994376500.18', 45.77, '523797843674.95', 46.12, '2021-09-30', '2021-12-31 10:26:49'),
(178, 6, 2021, 9, '522161421440.28', 42.62, '380995378137.53', 37.62, '2021-09-30', '2021-12-31 10:26:49'),
(179, 7, 2021, 9, '447654936164.33', 49.69, '474891302873.68', 45.23, '2021-09-30', '2021-12-31 10:26:49'),
(180, 8, 2021, 9, '848515523539.57', 47.26, '536127422344.00', 33.62, '2021-09-30', '2021-12-31 10:26:49'),
(181, 9, 2021, 9, '482059353336.51', 46.3, '354988947330.78', 31.95, '2021-09-30', '2021-12-31 10:26:49'),
(182, 10, 2021, 9, '489677206079.75', 51.12, '389184271739.86', 36.2, '2021-09-30', '2021-12-31 10:26:49'),
(183, 11, 2021, 9, '2330162255700.10', 51.04, '1936762156449.95', 42.23, '2021-09-30', '2021-12-31 10:26:49'),
(184, 12, 2021, 9, '1308972894856.76', 64.64, '1043131054568.00', 49.12, '2021-09-30', '2021-12-31 10:26:49'),
(185, 13, 2021, 9, '819442959661.48', 66.7, '690080958981.00', 33.68, '2021-09-30', '2021-12-31 10:26:49'),
(186, 14, 2021, 9, '362909514618.74', 46.64, '286764732911.00', 32.6, '2021-09-30', '2021-12-31 10:26:49'),
(187, 15, 2021, 9, '779782769447.05', 22.1, '766602373427.98', 12.02, '2021-09-30', '2021-12-31 10:26:49'),
(188, 16, 2021, 9, '1142035818009.50', 36.58, '910265890082.03', 23.63, '2021-09-30', '2021-12-31 10:26:49'),
(189, 17, 2021, 9, '954479369346.21', 51.44, '727717027100.00', 36.97, '2021-09-30', '2021-12-31 10:26:49'),
(190, 18, 2021, 9, '729947170735.98', 53.7, '609124451884.00', 33.95, '2021-09-30', '2021-12-31 10:26:49'),
(191, 19, 2021, 9, '820358032423.33', 21.29, '819675222866.89', 22, '2021-09-30', '2021-12-31 10:26:49'),
(192, 20, 2021, 9, '727346105761.47', 54.5, '521569602267.00', 45.72, '2021-09-30', '2021-12-31 10:26:49'),
(193, 21, 2021, 9, '769911985006.74', 59.8, '616969601529.15', 43.91, '2021-09-30', '2021-12-31 10:26:49'),
(194, 22, 2021, 9, '569263895522.87', 46.6, '517074863883.00', 38.81, '2021-09-30', '2021-12-31 10:26:49'),
(195, 23, 2021, 9, '781412755985.31', 51.5, '617754632342.38', 39.84, '2021-09-30', '2021-12-31 10:26:49'),
(197, 25, 2021, 9, '604779925096.00', 54.96, '467754802498.00', 42.06, '2021-09-30', '2021-12-31 10:26:49'),
(198, 26, 2021, 9, '606573370091.16', 51.59, '537670461924.00', 36.36, '2021-09-30', '2021-12-31 10:26:49'),
(199, 27, 2021, 9, '1063246174483.00', 45.38, '1019089769846.00', 45.45, '2021-08-31', '2021-12-31 10:26:49'),
(200, 28, 2021, 9, '965097593728.00', 65.96, '738282612988.00', 47.54, '2021-09-30', '2021-12-31 10:26:49'),
(201, 29, 2021, 9, '328258821655.24', 52.43, '282115661041.67', 33.12, '2021-09-30', '2021-12-31 10:26:49'),
(202, 30, 2021, 9, '548112381927.99', 48.38, '431389744095.00', 53.52, '2021-09-30', '2021-12-31 10:26:49'),
(203, 31, 2021, 9, '704279388490.29', 52.49, '734884499814.00', 51.07, '2021-09-30', '2021-12-31 10:26:49'),
(204, 24, 2021, 9, '505445101701.11', 48.47, '392080501244.62', 36.16, '2021-09-30', '2021-12-31 10:26:49'),
(205, 32, 2021, 9, '1098280052040.32', 60.88, '881977057739.00', 47.48, '2021-09-30', '2021-12-31 10:26:49'),
(206, 33, 2021, 9, '377147524423.94', 46.89, '304701477711.87', 34.78, '2021-09-30', '2021-12-31 10:26:49'),
(208, 2, 2021, 10, '435734326377.94', 60.98, '375697975921.00', 51.3, '2021-10-15', '2021-12-31 10:26:49'),
(209, 3, 2021, 10, '3974147998640.64', 76.48, '2649274584796.00', 49.55, '2021-10-29', '2021-12-31 10:26:49'),
(210, 4, 2021, 10, '482475472338.00', 65.33, '448755698404.31', 57.81, '2021-10-29', '2021-12-31 10:26:49'),
(211, 5, 2021, 10, '611934419442.18', 59.61, '594004130185.32', 58.7, '2021-10-29', '2021-12-31 10:26:49'),
(212, 6, 2021, 10, '537583798963.28', 65.8, '414683495373.75', 46.44, '2021-10-31', '2021-12-31 10:26:49'),
(213, 7, 2021, 10, '458036762469.33', 51.59, '525252930174.68', 57.07, '2021-10-31', '2021-12-31 10:26:49'),
(214, 8, 2021, 10, '916306922886.61', 67.2, '581957400812.00', 42.68, '2021-10-15', '2021-12-31 10:26:49'),
(215, 9, 2021, 10, '532235692641.51', 69.32, '390690886257.66', 49.76, '2021-10-15', '2021-12-31 10:26:49'),
(216, 10, 2021, 10, '489683268846.75', 58.27, '415520221936.63', 46.47, '2021-10-15', '2021-12-31 10:26:49'),
(217, 11, 2021, 10, '2558864477170.24', 63.98, '2199897130583.60', 54.63, '2021-10-29', '2021-12-31 10:26:49'),
(218, 12, 2021, 10, '1328858122428.76', 72.96, '1151280914805.00', 63.21, '2021-10-29', '2021-12-31 10:26:49'),
(219, 13, 2021, 10, '913365841501.39', 76.92, '772902742681.20', 62.96, '2021-10-15', '2021-12-31 10:26:49'),
(220, 14, 2021, 10, '446574702685.74', 70.74, '351892801010.00', 52.62, '2021-10-29', '2021-12-31 10:26:49'),
(221, 15, 2021, 10, '920778697847.89', 63.05, '833912912840.62', 51.53, '2021-10-31', '2021-12-31 10:26:49'),
(222, 16, 2021, 10, '1262259289356.97', 79.42, '1050388430355.03', 63.43, '2021-10-29', '2021-12-31 10:26:49'),
(223, 17, 2021, 10, '1277710204415.21', 77.73, '1020913939139.00', 61.02, '2021-12-29', '2021-12-31 10:26:49'),
(224, 19, 2021, 10, '907352087980.73', 67.77, '630490373638.75', 41.81, '2021-10-29', '2021-12-31 10:26:49'),
(225, 20, 2021, 10, '852433533740.83', 83.14, '598667675811.00', 58.39, '2021-10-29', '2021-12-31 10:26:49'),
(226, 21, 2021, 10, '808536965537.80', 69.78, '660427944795.15', 54.66, '2021-10-15', '2021-12-31 10:26:49'),
(227, 22, 2021, 10, '692343089669.87', 63.07, '581109691203.00', 51.16, '2021-10-29', '2021-12-31 10:26:49'),
(228, 23, 2021, 10, '823823168805.31', 62.97, '685254821479.93', 50.66, '2021-10-29', '2021-12-31 10:26:49'),
(229, 24, 2021, 10, '595151893221.21', 66.03, '484445820219.74', 52, '2021-10-29', '2021-12-31 10:26:49'),
(230, 27, 2021, 10, '1529178457892.00', 65.26, '1299678477730.00', 57.96, '2021-10-15', '2021-12-31 10:26:49'),
(231, 28, 2021, 10, '1059622368270.00', 82.46, '813466566644.00', 60.79, '2021-10-29', '2021-12-31 10:26:49'),
(232, 29, 2021, 10, '368780028100.00', 68.85, '234210251111.00', 42.19, '2021-10-29', '2021-12-31 10:26:49'),
(234, 30, 2021, 10, '690982134950.38', 75.06, '508209225628.00', 49.62, '2021-10-30', '2021-12-31 10:26:49'),
(235, 32, 2021, 10, '1205993978365.32', 81.07, '1000128808068.42', 67.23, '2021-10-29', '2021-12-31 10:26:49'),
(236, 33, 2021, 10, '392774009269.44', 61.76, '343056324951.76', 45.37, '2021-10-31', '2021-12-31 10:26:49'),
(238, 18, 2021, 10, '881109411583.98', 81.19, '726334188282.00', 47.81, '2021-10-29', '2021-12-31 10:26:49'),
(239, 25, 2021, 10, '769101982544.02', 69.9, '619346272821.00', 55.69, '2021-10-29', '2021-12-31 10:26:49'),
(240, 31, 2021, 10, '704279388490.00', 62, '834730980226.00', 68.55, '2021-10-29', '2021-12-31 10:26:49'),
(241, 26, 2021, 10, '606573370091.00', 61.08, '537670461924.00', 48.93, '2021-09-30', '2021-12-31 10:26:49'),
(242, 1, 2021, 10, '478132567517.28', 79.15, '366966784070.81', 60.75, '2021-10-29', '2021-12-31 10:26:49'),
(243, 1, 2021, 11, '487594014518.58', 80.71, '409750348069.62', 67.83, '2021-11-19', '2021-12-31 10:26:49'),
(247, 4, 2021, 11, '587540133852.00', 79.56, '522820418487.16', 67.35, '2021-11-30', '2021-12-31 10:26:49'),
(248, 5, 2021, 11, '711297177676.18', 69.29, '662586737552.69', 65.48, '2021-11-30', '2021-12-31 10:26:49'),
(249, 6, 2021, 11, '654655167877.28', 80.13, '562477572176.75', 62.99, '2021-11-30', '2021-12-31 10:26:49'),
(250, 7, 2021, 11, '637781574902.18', 71.83, '567347068647.99', 61.64, '2021-11-19', '2021-12-31 10:26:49'),
(251, 10, 2021, 11, '624540636903.75', 74.31, '508332082724.63', 56.84, '2021-11-30', '2021-12-31 10:26:49'),
(253, 12, 2021, 11, '1360398771528.46', 74.69, '1355323512806.90', 74.42, '2021-11-30', '2021-12-31 10:26:49'),
(254, 13, 2021, 11, '1019712008398.39', 85.88, '869338819920.20', 70.82, '2021-11-23', '2021-12-31 10:26:49'),
(255, 14, 2021, 11, '574949257521.06', 91.07, '464917281717.00', 69.52, '2021-11-30', '2021-12-31 10:26:49'),
(256, 9, 2021, 11, '692274640013.51', 90.16, '511177657533.66', 65.11, '2021-11-30', '2021-12-31 10:26:49'),
(257, 16, 2021, 11, '1420085673254.67', 89.35, '1209725256364.16', 73.05, '2021-11-30', '2021-12-31 10:26:49'),
(258, 17, 2021, 11, '1400551599745.25', 85.2, '1172458227735.00', 70.08, '2021-11-30', '2021-12-31 10:26:49'),
(259, 18, 2021, 11, '1042782802754.98', 96.08, '834965178219.00', 54.96, '2021-11-30', '2021-12-31 10:26:49'),
(261, 20, 2021, 11, '891100330403.83', 86.91, '718415222248.00', 70.07, '2021-11-30', '2021-12-31 10:26:49'),
(263, 22, 2021, 11, '901211671016.87', 82.1, '752840815399.00', 66.27, '2021-11-30', '2021-12-31 10:26:49'),
(264, 23, 2021, 11, '939712352482.31', 71.83, '756101932257.36', 55.89, '2021-11-12', '2021-12-31 10:26:49'),
(265, 24, 2021, 11, '716138070630.71', 79.45, '624699703856.04', 67.05, '2021-11-30', '2021-12-31 10:26:49'),
(266, 25, 2021, 11, '864137603150.16', 78.53, '705979168831.00', 63.48, '2021-11-18', '2021-12-31 10:26:49'),
(267, 27, 2021, 11, '1747484308411.27', 74.58, '1421397467061.23', 63.39, '2021-11-19', '2021-12-31 10:26:49'),
(268, 28, 2021, 11, '1241161602407.00', 96.59, '947766965728.00', 70.82, '2021-11-30', '2021-12-31 10:26:49'),
(270, 30, 2021, 11, '711732752114.38', 77.31, '564794982121.00', 55.15, '2021-11-19', '2021-12-31 10:26:49'),
(271, 31, 2021, 11, '981639878420.66', 86.41, '988315915353.00', 81.16, '2021-11-30', '2021-12-31 10:26:49'),
(272, 15, 2021, 11, '1047277637869.86', 71.71, '946985821823.04', 58.52, '2021-11-30', '2021-12-31 10:26:49'),
(273, 26, 2021, 11, '773001877955.45', 77.84, '700092132985.00', 63.71, '2021-11-23', '2021-12-31 10:26:49'),
(274, 32, 2021, 11, '1426438082123.48', 95.89, '1189334371155.68', 79.95, '2021-11-30', '2021-12-31 10:26:49'),
(275, 33, 2021, 11, '484668766967.84', 76.21, '395551549461.48', 52.31, '2021-11-30', '2021-12-31 10:26:49'),
(276, 29, 2021, 11, '390672291619.51', 72.94, '371722395535.67', 66.96, '2021-11-30', '2021-12-31 10:26:49'),
(277, 21, 2021, 11, '1011275172175.36', 87.28, '849520204354.25', 70.31, '2021-11-30', '2021-12-31 10:26:49'),
(278, 19, 2021, 11, '1156369064867.35', 86.37, '1071550630490.20', 71.06, '2021-11-30', '2021-12-31 10:26:49'),
(279, 11, 2021, 11, '3042353578984.28', 76.06, '2597103890400.60', 64.5, '2021-11-30', '2021-12-31 10:26:49'),
(280, 8, 2021, 11, '1083017352375.57', 79.43, '694317952517.00', 50.92, '2021-11-23', '2021-12-31 10:26:49'),
(281, 3, 2021, 11, '4037408033154.64', 77.7, '3136970072006.00', 58.67, '2021-11-12', '2021-12-31 10:26:49'),
(282, 2, 2021, 11, '499049743349.94', 69.84, '422873068983.00', 57.74, '2021-11-19', '2021-12-31 10:26:49'),
(284, 1, 2021, 12, '551610065733.28', 0, '505418420281.33', 0, '2021-12-23', '2021-12-31 10:26:49'),
(285, 2, 2021, 12, '581469785347.00', 0, '555347281311.00', 0, '2021-12-15', '2021-12-31 10:26:49'),
(286, 3, 2021, 12, '4546666520381.83', 0, '3610874896612.65', 0, '2021-12-15', '2021-12-31 10:26:49'),
(287, 5, 2021, 12, '762085453920.18', 0, '709531849931.62', 0, '2021-12-15', '2021-12-31 10:26:49'),
(288, 9, 2021, 12, '731168968008.00', 0, '600882960373.00', 0, '2021-12-15', '2021-12-31 10:26:49'),
(289, 11, 2021, 12, '3327199736958.30', 0, '3033035418488.60', 0, '2021-12-23', '2021-12-31 10:26:49'),
(290, 12, 2021, 12, '1403451118891.93', 0, '1574402329758.51', 0, '2021-12-22', '2021-12-31 10:26:49'),
(291, 13, 2021, 12, '1104346463108.39', 0, '990835663200.20', 0, '2021-12-17', '2021-12-31 10:26:49'),
(292, 16, 2021, 12, '1527795159354.77', 0, '1407421270883.30', 0, '2021-12-23', '2021-12-31 10:26:49'),
(293, 19, 2021, 12, '1216979465228.80', 0, '1307099294106.52', 0, '2021-12-23', '2021-12-31 10:26:49'),
(294, 17, 2021, 12, '1478867990699.14', 0, '1309340227179.00', 0, '2021-12-23', '2021-12-31 10:26:49'),
(295, 33, 2021, 12, '485857298378.84', 0, '440240344824.10', 0, '2021-12-15', '2021-12-31 10:26:49'),
(296, 25, 2021, 12, '968850399383.39', 0, '823688161111.00', 0, '2021-12-16', '2021-12-31 10:26:49'),
(297, 31, 2021, 12, '1040867916855.79', 0, '1117958152728.12', 0, '2021-12-23', '2021-12-31 10:26:49'),
(298, 26, 2021, 12, '875948590107.45', 0, '783902433478.00', 0, '2021-12-17', '2021-12-31 10:26:49'),
(299, 15, 2021, 12, '1242523265658.34', 0, '1194740309598.27', 0, '2021-12-23', '2021-12-31 10:26:49'),
(302, 1, 2021, 6, '239300260502.00', 0, '148577949995.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(303, 1, 2021, 7, '352418865187.00', 0, '279613104515.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(304, 2, 2021, 6, '253881114570.45', 0, '138854244114.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(305, 2, 2021, 7, '378790830551.00', 0, '302174490533.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(306, 3, 2021, 6, '1829560928770.85', 0, '1060553707741.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(307, 3, 2021, 7, '3163290015285.58', 0, '2041223804929.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(308, 4, 2021, 6, '130727532637.00', 0, '195027433463.62', 0, '2021-06-30', '2021-12-31 10:26:49'),
(309, 4, 2021, 7, '130727532637.00', 0, '195027433464.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(310, 5, 2021, 6, '332911939975.56', 0, '257659961870.62', 0, '2021-06-30', '2021-12-31 10:26:49'),
(311, 5, 2021, 1, '469837488837.18', 0, '466649699463.82', 0, '2021-07-30', '2021-12-31 10:26:49'),
(312, 6, 2021, 6, '171213926853.42', 0, '183035905641.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(313, 6, 2021, 7, '348169935897.28', 0, '335881300148.29', 0, '2021-07-30', '2021-12-31 10:26:49'),
(314, 7, 2021, 6, '19137699987.56', 0, '205413810112.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(315, 7, 2021, 7, '441211217599.33', 0, '416240655536.78', 0, '2021-07-30', '2021-12-31 10:26:49'),
(316, 8, 2021, 6, '295819755639.00', 0, '197758377086.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(317, 8, 2021, 7, '644369257364.04', 0, '458408011975.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(318, 9, 2021, 6, '112680866936.02', 0, '157468419398.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(319, 9, 2021, 7, '355482364972.21', 0, '250844336666.81', 0, '2021-07-30', '2021-12-31 10:26:49'),
(320, 10, 2021, 6, '117263516179.77', 0, '107815451488.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(321, 10, 2021, 7, '429611273566.75', 0, '323758411121.14', 0, '2021-07-30', '2021-12-31 10:26:49'),
(322, 11, 2021, 6, '1057320971100.00', 0, '907414087900.95', 0, '2021-06-30', '2021-12-31 10:26:49'),
(323, 11, 2021, 7, '2041393821771.00', 0, '1700464985792.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(324, 12, 2021, 6, '349056715007.00', 0, '530974111699.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(325, 12, 2021, 7, '1177354645629.76', 0, '894583989221.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(326, 13, 2021, 6, '398362594877.24', 0, '300394389413.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(327, 13, 2021, 7, '791955876469.48', 0, '413466019989.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(328, 14, 2021, 6, '173183525163.62', 0, '98907897733.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(329, 14, 2021, 7, '294433192291.81', 0, '217975368612.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(330, 15, 2021, 6, '322712455845.77', 0, '194557608036.08', 0, '2021-06-30', '2021-12-31 10:26:49'),
(331, 15, 2021, 7, '322712455846.00', 0, '194557608036.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(332, 16, 2021, 6, '581399298991.71', 0, '391362913173.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(333, 16, 2021, 7, '581399298992.00', 0, '391362913173.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(334, 17, 2021, 6, '297209451005.08', 0, '309826473775.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(335, 17, 2021, 7, '845591580213.21', 0, '618623573462.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(336, 18, 2021, 6, '277443377264.00', 0, '208137772564.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(337, 18, 2021, 7, '582766788582.98', 0, '515660073023.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(338, 19, 2021, 6, '285073490522.00', 0, '331700570746.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(339, 19, 2021, 7, '285073490522.00', 0, '331700570746.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(340, 20, 2021, 6, '349497484571.97', 0, '225796649123.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(341, 20, 2021, 7, '558808808612.97', 0, '468778485879.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(342, 21, 2021, 6, '378852843026.24', 0, '276858496786.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(343, 21, 2021, 7, '692915490368.74', 0, '530518934355.40', 0, '2021-07-30', '2021-12-31 10:26:49'),
(344, 22, 2021, 6, '240186898395.68', 0, '207414721262.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(345, 22, 2021, 7, '511522770295.87', 0, '440906179067.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(346, 23, 2021, 6, '364337241473.50', 0, '313845867884.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(347, 23, 2021, 7, '673764060217.96', 0, '538990997523.38', 0, '2021-07-30', '2021-12-31 10:26:49'),
(348, 24, 2021, 6, '174360962359.22', 0, '181410855671.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(349, 24, 2021, 7, '436872162385.11', 0, '336914676068.53', 0, '2021-07-30', '2021-12-31 10:26:49'),
(350, 25, 2021, 6, '340656254015.78', 0, '259631144649.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(351, 25, 2021, 7, '604779925095.94', 0, '467754802498.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(352, 26, 2021, 6, '285247842348.16', 0, '183441947191.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(353, 26, 2021, 7, '512376983239.16', 0, '399585439719.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(354, 27, 2021, 6, '631606191786.00', 0, '500890808195.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(355, 27, 2021, 7, '1063246174483.00', 0, '1019089769846.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(356, 28, 2021, 6, '568776547518.00', 0, '340861545930.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(357, 28, 2021, 7, '847634455734.00', 0, '636239326442.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(358, 29, 2021, 6, '154174038547.00', 0, '114613667494.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(359, 29, 2021, 7, '280823031395.24', 0, '183856772717.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(360, 30, 2021, 6, '172763620793.48', 0, '168395632136.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(361, 30, 2021, 7, '445364298444.99', 0, '548092659192.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(362, 31, 2021, 6, '329684656315.00', 0, '380263247569.00', 0, '2021-06-30', '2021-12-31 10:26:49'),
(363, 31, 2021, 7, '596226946425.33', 0, '621842414217.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(364, 32, 2021, 6, '575885132162.16', 0, '375452197785.63', 0, '2021-06-30', '2021-12-31 10:26:49'),
(365, 32, 2021, 7, '905635943532.00', 0, '706247126836.24', 0, '2021-07-30', '2021-12-31 10:26:49'),
(366, 33, 2021, 6, '181253870008.16', 0, '140951398418.49', 0, '2021-06-30', '2021-12-31 10:26:49'),
(367, 33, 2021, 7, '298236240518.55', 0, '263013252390.00', 0, '2021-07-30', '2021-12-31 10:26:49'),
(368, 21, 2021, 12, '1102518991262.17', 0, '951893072119.02', 0, '2021-12-24', '2021-12-31 10:26:49'),
(369, 19, 2021, 12, '1216979465228.80', 0, '1314910624561.23', 0, '2021-12-23', '2021-12-31 10:26:49'),
(370, 27, 2021, 12, '2056323813338.27', 0, '1786633038964.55', 0, '2021-12-24', '2021-12-31 10:26:49'),
(371, 4, 2021, 12, '587540133852.00', 0, '522820418487.16', 0, '2021-11-30', '2021-12-31 10:26:49'),
(372, 6, 2021, 12, '654655167877.28', 0, '562477572176.75', 0, '2021-11-30', '2021-12-31 10:26:49'),
(373, 7, 2021, 12, '637781574902.18', 0, '567347068647.99', 0, '2021-11-19', '2021-12-31 10:26:49'),
(374, 8, 2021, 12, '1083017352375.57', 0, '694317952517.00', 0, '2021-11-23', '2021-12-31 10:26:49'),
(375, 14, 2021, 12, '574949257521.06', 0, '464917281717.00', 0, '2021-11-30', '2021-12-31 10:26:49'),
(376, 10, 2021, 12, '624540636903.75', 0, '508332082724.63', 0, '2021-11-30', '2021-12-31 10:26:49'),
(377, 18, 2021, 12, '1042782802754.98', 0, '834965178219.00', 0, '2021-11-30', '2021-12-31 10:26:49'),
(378, 20, 2021, 12, '891100330403.83', 0, '718415222248.00', 0, '2021-11-30', '2021-12-31 10:26:49'),
(379, 22, 2021, 12, '901211671016.87', 0, '752840815399.00', 0, '2021-11-30', '2021-12-31 10:26:49'),
(380, 23, 2021, 12, '939712352482.31', 0, '756101932257.36', 0, '2021-11-12', '2021-12-31 10:26:49'),
(381, 24, 2021, 12, '716138070630.71', 0, '624699703856.04', 0, '2021-11-30', '2021-12-31 10:26:49'),
(382, 28, 2021, 12, '1241161602407.00', 0, '947766965728.00', 0, '2021-11-30', '2021-12-31 10:26:49'),
(383, 29, 2021, 12, '390672291619.51', 0, '371722395535.67', 0, '2021-11-30', '2021-12-31 10:26:49'),
(384, 30, 2021, 12, '711732752114.38', 0, '564794982121.00', 0, '2021-11-19', '2021-12-31 10:26:49'),
(385, 32, 2021, 12, '1426438082123.48', 0, '1189334371155.68', 0, '2021-11-30', '2021-12-31 10:26:49'),
(386, 1, 2022, 1, '0.00', 0, '0.00', 0, '2022-01-31', '2022-04-25 21:05:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_user` varchar(35) NOT NULL,
  `nip_user` varchar(25) NOT NULL,
  `password` varchar(150) NOT NULL DEFAULT '$2y$10$S9h2GPMZbUjy1sZANFqbAuRSNqvaUEy2K6/7yQr66cJ9nCjdKxNva',
  `foto_profile` varchar(100) NOT NULL,
  `role_admin` enum('master','fisik','keuangan','provinsi','kabupaten','desa','biro','pakar') NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `id_pegawai` char(7) NOT NULL,
  `is_active` enum('Y','N') NOT NULL,
  `level` int(2) NOT NULL,
  `skpd` enum('Y','N') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `nama_user`, `nip_user`, `password`, `foto_profile`, `role_admin`, `id_skpd`, `id_pegawai`, `is_active`, `level`, `skpd`) VALUES
(1, 'admin', '', '', '$2y$10$n3kACEzJKrSw5eeG.2rnPuQ8l03Y64ZRS9BHKzyMbRI1m9ucgHvRG', 'admin-20220717-092928.jpg', 'master', 0, '', 'Y', 1, 'N');

--

--
-- Struktur dari tabel `users_access`
--

CREATE TABLE `users_access` (
  `access_id` int(7) NOT NULL,
  `role_id` int(3) NOT NULL,
  `menu_id` int(5) NOT NULL,
  `akses` enum('Y','N') NOT NULL,
  `tambah` enum('Y','N') NOT NULL,
  `ubah` enum('Y','N') NOT NULL,
  `hapus` enum('Y','N') NOT NULL,
  `ubah_1` enum('Y','N') NOT NULL,
  `hapus_1` enum('Y','N') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_access`
--

INSERT INTO `users_access` (`access_id`, `role_id`, `menu_id`, `akses`, `tambah`, `ubah`, `hapus`, `ubah_1`, `hapus_1`) VALUES
(1, 1, 1, 'Y', 'N', 'N', 'N', 'N', 'N'),
(2, 1, 2, 'Y', 'N', 'N', 'N', 'N', 'N'),
(3, 1, 3, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(4, 1, 4, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(5, 1, 5, 'Y', 'N', 'N', 'N', 'N', 'N'),
(6, 1, 6, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(7, 1, 7, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(8, 1, 8, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(9, 1, 9, 'Y', 'N', 'N', 'N', 'N', 'N'),
(10, 1, 10, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(11, 1, 11, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(12, 1, 12, 'Y', 'N', 'N', 'N', 'N', 'N'),
(13, 1, 13, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(14, 1, 14, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(15, 1, 15, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(16, 1, 16, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(17, 3, 1, 'Y', 'N', 'N', 'N', 'N', 'N'),
(18, 3, 2, 'N', 'N', 'N', 'N', 'N', 'N'),
(19, 3, 3, 'N', 'N', 'N', 'N', 'N', 'N'),
(20, 3, 4, 'N', 'N', 'N', 'N', 'N', 'N'),
(21, 3, 5, 'Y', 'N', 'N', 'N', 'N', 'N'),
(22, 3, 6, 'N', 'N', 'N', 'N', 'N', 'N'),
(23, 3, 7, 'N', 'N', 'N', 'N', 'N', 'N'),
(24, 3, 8, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(25, 3, 9, 'N', 'N', 'N', 'N', 'N', 'N'),
(26, 3, 10, 'N', 'N', 'N', 'N', 'N', 'N'),
(27, 3, 11, 'N', 'N', 'N', 'N', 'N', 'N'),
(28, 3, 12, 'N', 'N', 'N', 'N', 'N', 'N'),
(29, 3, 13, 'N', 'N', 'N', 'N', 'N', 'N'),
(30, 3, 14, 'N', 'N', 'N', 'N', 'N', 'N'),
(31, 3, 15, 'N', 'N', 'N', 'N', 'N', 'N'),
(32, 3, 16, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(33, 1, 17, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(34, 3, 17, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(35, 1, 18, 'Y', 'N', 'N', 'N', 'N', 'N'),
(36, 1, 19, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(37, 1, 20, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(38, 1, 21, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(45, 1, 28, 'Y', 'N', 'N', 'N', 'N', 'N'),
(46, 1, 29, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(47, 1, 30, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(48, 1, 31, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(50, 1, 33, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(51, 1, 34, 'Y', 'N', 'N', 'N', 'N', 'N'),
(52, 1, 35, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(53, 1, 36, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(54, 1, 37, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(55, 1, 38, 'Y', 'N', 'N', 'N', 'N', 'N'),
(56, 1, 39, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(57, 1, 40, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(58, 1, 41, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(59, 3, 18, 'Y', 'N', 'N', 'N', 'N', 'N'),
(60, 3, 19, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(61, 3, 20, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(62, 3, 21, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(69, 3, 28, 'Y', 'N', 'N', 'N', 'N', 'N'),
(70, 3, 29, 'N', 'N', 'N', 'N', 'N', 'N'),
(71, 3, 30, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(72, 3, 31, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(83, 1, 42, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(74, 3, 33, 'N', 'N', 'N', 'N', 'N', 'N'),
(75, 3, 34, 'Y', 'N', 'N', 'N', 'N', 'N'),
(76, 3, 35, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(77, 3, 36, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(78, 3, 37, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(79, 3, 38, 'Y', 'N', 'N', 'N', 'N', 'N'),
(80, 3, 39, 'N', 'N', 'N', 'N', 'N', 'N'),
(81, 3, 40, 'N', 'N', 'N', 'N', 'N', 'N'),
(82, 3, 41, 'Y', 'Y', 'Y', 'Y', 'N', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_level`
--

CREATE TABLE `users_level` (
  `role_id` int(3) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_level`
--

INSERT INTO `users_level` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Admin adpemb'),
(3, 'Admin Fisik OPD'),
(4, 'Admin Keuangan OPD'),
(5, 'Pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_menu`
--

CREATE TABLE `users_menu` (
  `menu_id` int(5) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_link` varchar(100) NOT NULL,
  `menu_icon` varchar(50) NOT NULL,
  `is_main_menu` int(5) NOT NULL,
  `fitur_add` enum('Y','N') NOT NULL,
  `fitur_update` enum('Y','N') NOT NULL,
  `fitur_delete` enum('Y','N') NOT NULL,
  `fitur_update_1` enum('Y','N') NOT NULL,
  `fitur_delete_1` enum('Y','N') NOT NULL,
  `urutan` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_menu`
--

INSERT INTO `users_menu` (`menu_id`, `menu_name`, `menu_link`, `menu_icon`, `is_main_menu`, `fitur_add`, `fitur_update`, `fitur_delete`, `fitur_update_1`, `fitur_delete_1`, `urutan`) VALUES
(1, 'Dashboard', 'dashboard', 'fa fa-tachometer-alt', 0, 'N', 'N', 'N', 'N', 'N', 1),
(2, 'Konfigurasi', '#konfigurasi', 'fa fa-user-lock', 0, 'N', 'N', 'N', 'N', 'N', 11),
(3, 'List Menu', 'list-menu', '-', 2, 'Y', 'Y', 'Y', 'Y', 'Y', 1),
(4, 'Akses Menu', 'akses-menu', '-', 2, 'Y', 'Y', 'Y', 'Y', 'Y', 2),
(5, 'Master Data', '#master_data', 'fa fa-database', 0, 'N', 'N', 'N', 'N', 'N', 2),
(6, 'Data SKPD', 'data-skpd', '-', 5, 'Y', 'Y', 'Y', 'Y', 'Y', 2),
(7, 'Jenis Pelaksanaan', 'jenis-pelaksanaan', '-', 5, 'Y', 'Y', 'Y', 'Y', 'Y', 3),
(8, 'Kepala SKPD', 'kepala-skpd', '-', 5, 'Y', 'Y', 'Y', 'Y', 'Y', 4),
(9, 'Data User', '#users', 'fa fa-users', 0, 'N', 'N', 'N', 'N', 'N', 10),
(10, 'Data User', 'data-user', '-', 9, 'Y', 'Y', 'Y', 'Y', 'Y', 1),
(11, 'Profile User', 'profil-user', '-', 9, 'Y', 'Y', 'Y', 'Y', 'Y', 2),
(12, 'Postur APBD', '#postur_apbd', 'fa  fa-signal', 0, 'N', 'N', 'N', 'N', 'N', 3),
(13, 'Mandatory Spending', 'mandatory', '-', 12, 'Y', 'Y', 'Y', 'Y', 'Y', 1),
(14, 'Postur Anggaran', 'postur-anggaran', '-', 12, 'Y', 'Y', 'Y', 'Y', 'Y', 2),
(15, 'Dana Transfer &amp;  PAD', 'dana-transfer', '-', 12, 'Y', 'Y', 'Y', 'Y', 'Y', 3),
(16, 'Data APBD', 'data-apbd', 'fa fa-list', 0, 'Y', 'Y', 'Y', 'Y', 'Y', 4),
(17, 'Kegiatan Fisik', 'kegiatan', 'fa fa-building', 0, 'Y', 'Y', 'Y', 'Y', 'Y', 5),
(18, 'Data APBN', '#data_apbn', 'fa fa-signal', 0, 'N', 'N', 'N', 'N', 'N', 6),
(19, 'Dana DAK', 'dana-dak', '-', 18, 'Y', 'Y', 'Y', 'Y', 'Y', 1),
(20, 'Dana Dekonsentrasi', 'dana-dekonsentrasi', '-', 18, 'Y', 'Y', 'Y', 'Y', 'Y', 2),
(21, 'Dana Tugas Pembantuan', 'dana-tp', '-', 18, 'Y', 'Y', 'Y', 'Y', 'Y', 3),
(28, 'Upload Data', '#upload_data', 'fa fa-upload', 0, 'N', 'N', 'N', 'N', 'N', 7),
(29, 'Data Anggaran OPD', 'upload-anggaran-opd', '-', 28, 'Y', 'Y', 'Y', 'Y', 'Y', 1),
(30, 'Data LRA OPD', 'upload-lra-opd', '-', 28, 'Y', 'Y', 'Y', 'Y', 'Y', 2),
(31, 'Anggaran Kas', 'upload-anggaran-kas', '-', 28, 'Y', 'Y', 'Y', 'Y', 'Y', 3),
(42, 'Nama Daerah', 'nama-daerah', '-', 5, 'Y', 'Y', 'Y', 'Y', 'Y', 1),
(33, 'Realisasi Dana Desa', 'upload-dana-desa', '-', 28, 'Y', 'Y', 'Y', 'Y', 'Y', 5),
(34, 'Realisasi APBN', '#realisasi_apbn', 'fa fa-list', 0, 'N', 'N', 'N', 'N', 'N', 8),
(35, 'Realisasi Dana DAK', 'realisasi-dana-dak', '-', 34, 'Y', 'Y', 'Y', 'Y', 'Y', 1),
(36, 'Realisasi Dana Dekonsentrasi', 'realisasi-dana-dekon', '-', 34, 'Y', 'Y', 'Y', 'Y', 'Y', 2),
(37, 'Realisasi Dana Tugas Pembantuan', 'realisasi-dana-tp', '-', 34, 'Y', 'Y', 'Y', 'Y', 'Y', 3),
(38, 'Laporan', '#laporan', 'fa fa-industry', 0, 'N', 'N', 'N', 'N', 'N', 9),
(39, 'Data Realisasi Keuangan', 'realisasi-keuangan', '-', 38, 'Y', 'Y', 'Y', 'Y', 'Y', 1),
(40, 'Laporan Realisasi Keuangan', 'laporan-realisasi-keuangan', '-', 38, 'Y', 'Y', 'Y', 'Y', 'Y', 2),
(41, 'Laporan Realisasi Fisik', 'laporan-realisasi-fisik', '-', 38, 'Y', 'Y', 'Y', 'Y', 'Y', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses_admin`
--
ALTER TABLE `akses_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `bendahara_pengeluaran`
--
ALTER TABLE `bendahara_pengeluaran`
  ADD PRIMARY KEY (`id_ttd`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `data_kegiatan`
--
ALTER TABLE `data_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `data_kegiatan_detail`
--
ALTER TABLE `data_kegiatan_detail`
  ADD PRIMARY KEY (`id_kegiatan_detail`);

--
-- Indexes for table `data_kegiatan_fisik`
--
ALTER TABLE `data_kegiatan_fisik`
  ADD PRIMARY KEY (`id_kegiatan_fisik`);

--
-- Indexes for table `data_kode_rekening`
--
ALTER TABLE `data_kode_rekening`
  ADD PRIMARY KEY (`id_uraian`);

--
-- Indexes for table `data_kontrak_real`
--
ALTER TABLE `data_kontrak_real`
  ADD PRIMARY KEY (`id_real`);

--
-- Indexes for table `data_prioritas`
--
ALTER TABLE `data_prioritas`
  ADD PRIMARY KEY (`id_prioritas`);

--
-- Indexes for table `data_realisasi_detail_skpd`
--
ALTER TABLE `data_realisasi_detail_skpd`
  ADD PRIMARY KEY (`id_realisasi`);

--
-- Indexes for table `data_serapan_skpd`
--
ALTER TABLE `data_serapan_skpd`
  ADD PRIMARY KEY (`id_serapan`);

--
-- Indexes for table `data_sirup_skpd`
--
ALTER TABLE `data_sirup_skpd`
  ADD PRIMARY KEY (`id_kegiatan_sirup`);

--
-- Indexes for table `data_skpd`
--
ALTER TABLE `data_skpd`
  ADD PRIMARY KEY (`id_skpd`);

--
-- Indexes for table `data_uraian_kegiatan_skpd`
--
ALTER TABLE `data_uraian_kegiatan_skpd`
  ADD PRIMARY KEY (`id_uraian`);

--
-- Indexes for table `detail_kegiatan_skpd`
--
ALTER TABLE `detail_kegiatan_skpd`
  ADD PRIMARY KEY (`id_kegiatan_skpd`);

--
-- Indexes for table `detail_kegiatan_skpd_backup`
--
ALTER TABLE `detail_kegiatan_skpd_backup`
  ADD PRIMARY KEY (`id_kegiatan_skpd`);

--
-- Indexes for table `detail_realisasi_skpd`
--
ALTER TABLE `detail_realisasi_skpd`
  ADD PRIMARY KEY (`id_realisasi_skpd`);

--
-- Indexes for table `jenis_pelaksanaan`
--
ALTER TABLE `jenis_pelaksanaan`
  ADD PRIMARY KEY (`id_jenis_pelaksanaan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kegiatan_dokumentasi`
--
ALTER TABLE `kegiatan_dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`);

--
-- Indexes for table `kegiatan_strategis`
--
ALTER TABLE `kegiatan_strategis`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `laporan_realisasi_keuangan`
--
ALTER TABLE `laporan_realisasi_keuangan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `log_upload`
--
ALTER TABLE `log_upload`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_upload_realisasi`
--
ALTER TABLE `log_upload_realisasi`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `penanda_tangan`
--
ALTER TABLE `penanda_tangan`
  ADD PRIMARY KEY (`id_ttd`);

--
-- Indexes for table `pengguna_anggaran`
--
ALTER TABLE `pengguna_anggaran`
  ADD PRIMARY KEY (`id_pa`);

--
-- Indexes for table `ref_rek90_1`
--
ALTER TABLE `ref_rek90_1`
  ADD PRIMARY KEY (`kd_rek90_1`);

--
-- Indexes for table `ref_rek90_2`
--
ALTER TABLE `ref_rek90_2`
  ADD KEY `kd_rek90_1` (`kd_rek90_1`),
  ADD KEY `kd_rek90_2` (`kd_rek90_2`);

--
-- Indexes for table `ref_rek90_3`
--
ALTER TABLE `ref_rek90_3`
  ADD KEY `kd_rek90_1` (`kd_rek90_1`),
  ADD KEY `kd_rek90_2` (`kd_rek90_2`),
  ADD KEY `kd_rek90_3` (`kd_rek90_3`);

--
-- Indexes for table `ref_rek90_4`
--
ALTER TABLE `ref_rek90_4`
  ADD KEY `kd_rek90_1` (`kd_rek90_1`),
  ADD KEY `kd_rek90_2` (`kd_rek90_2`),
  ADD KEY `kd_rek90_3` (`kd_rek90_3`),
  ADD KEY `kd_rek90_4` (`kd_rek90_4`);

--
-- Indexes for table `ref_rek90_5`
--
ALTER TABLE `ref_rek90_5`
  ADD KEY `kd_rek90_1` (`kd_rek90_1`),
  ADD KEY `kd_rek90_2` (`kd_rek90_2`),
  ADD KEY `kd_rek90_3` (`kd_rek90_3`),
  ADD KEY `kd_rek90_4` (`kd_rek90_4`),
  ADD KEY `kd_rek90_5` (`kd_rek90_5`);

--
-- Indexes for table `setting_anggaran`
--
ALTER TABLE `setting_anggaran`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `ta_belanja_rinc_sub`
--
ALTER TABLE `ta_belanja_rinc_sub`
  ADD KEY `tahun` (`tahun`),
  ADD KEY `kd_urusan` (`kd_urusan`),
  ADD KEY `kd_bidang` (`kd_bidang`),
  ADD KEY `kd_unit` (`kd_unit`),
  ADD KEY `kd_sub` (`kd_sub`),
  ADD KEY `kd_prog` (`kd_prog`),
  ADD KEY `id_prog` (`id_prog`),
  ADD KEY `kd_keg` (`kd_keg`),
  ADD KEY `kd_rek_1` (`kd_rek_1`),
  ADD KEY `kd_rek_2` (`kd_rek_2`),
  ADD KEY `kd_rek_3` (`kd_rek_3`),
  ADD KEY `kd_rek_4` (`kd_rek_4`),
  ADD KEY `kd_rek_5` (`kd_rek_5`),
  ADD KEY `no_rinc` (`no_rinc`),
  ADD KEY `no_id` (`no_id`);

--
-- Indexes for table `ta_jurnalsemua`
--
ALTER TABLE `ta_jurnalsemua`
  ADD KEY `tahun` (`tahun`),
  ADD KEY `kd_source` (`kd_source`),
  ADD KEY `no_bukti` (`no_bukti`),
  ADD KEY `kd_urusan` (`kd_urusan`),
  ADD KEY `kd_bidang` (`kd_bidang`),
  ADD KEY `kd_unit` (`kd_unit`),
  ADD KEY `kd_sub` (`kd_sub`);

--
-- Indexes for table `ta_kabupaten`
--
ALTER TABLE `ta_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `ta_kontrak`
--
ALTER TABLE `ta_kontrak`
  ADD PRIMARY KEY (`id_kontrak`),
  ADD KEY `tahun` (`tahun`),
  ADD KEY `no_kontrak` (`no_kontrak`);

--
-- Indexes for table `ta_spp_kontrak`
--
ALTER TABLE `ta_spp_kontrak`
  ADD KEY `tahun` (`tahun`),
  ADD KEY `no_spp` (`no_spp`),
  ADD KEY `no_kontrak` (`no_kontrak`);

--
-- Indexes for table `ta_spp_rinc`
--
ALTER TABLE `ta_spp_rinc`
  ADD KEY `tahun` (`tahun`),
  ADD KEY `no_spp` (`no_spp`),
  ADD KEY `no_id` (`no_id`);

--
-- Indexes for table `tbl_anggaran_wilayah`
--
ALTER TABLE `tbl_anggaran_wilayah`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_dana_dekon`
--
ALTER TABLE `tbl_dana_dekon`
  ADD PRIMARY KEY (`id_dana`);

--
-- Indexes for table `tbl_dana_desa`
--
ALTER TABLE `tbl_dana_desa`
  ADD PRIMARY KEY (`id_danadesa`);

--
-- Indexes for table `tbl_dana_tkdd`
--
ALTER TABLE `tbl_dana_tkdd`
  ADD PRIMARY KEY (`id_tkdd`);

--
-- Indexes for table `tbl_data_dak`
--
ALTER TABLE `tbl_data_dak`
  ADD PRIMARY KEY (`id_dak`);

--
-- Indexes for table `tbl_detail_anggaran_wil`
--
ALTER TABLE `tbl_detail_anggaran_wil`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_detail_realisasi_wil`
--
ALTER TABLE `tbl_detail_realisasi_wil`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_mandatory`
--
ALTER TABLE `tbl_mandatory`
  ADD PRIMARY KEY (`id_mandatory`);

--
-- Indexes for table `tbl_mandatory_papbd`
--
ALTER TABLE `tbl_mandatory_papbd`
  ADD PRIMARY KEY (`id_mandatory`);

--
-- Indexes for table `tbl_realisasi_dak`
--
ALTER TABLE `tbl_realisasi_dak`
  ADD PRIMARY KEY (`id_realisasi`);

--
-- Indexes for table `tbl_realisasi_dekon`
--
ALTER TABLE `tbl_realisasi_dekon`
  ADD PRIMARY KEY (`id_realisasi`);

--
-- Indexes for table `tbl_realisasi_wilayah`
--
ALTER TABLE `tbl_realisasi_wilayah`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users_access`
--
ALTER TABLE `users_access`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `users_level`
--
ALTER TABLE `users_level`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users_menu`
--
ALTER TABLE `users_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses_admin`
--
ALTER TABLE `akses_admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `bendahara_pengeluaran`
--
ALTER TABLE `bendahara_pengeluaran`
  MODIFY `id_ttd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `data_kegiatan`
--
ALTER TABLE `data_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_kegiatan_detail`
--
ALTER TABLE `data_kegiatan_detail`
  MODIFY `id_kegiatan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_kegiatan_fisik`
--
ALTER TABLE `data_kegiatan_fisik`
  MODIFY `id_kegiatan_fisik` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_kode_rekening`
--
ALTER TABLE `data_kode_rekening`
  MODIFY `id_uraian` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `data_kontrak_real`
--
ALTER TABLE `data_kontrak_real`
  MODIFY `id_real` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_prioritas`
--
ALTER TABLE `data_prioritas`
  MODIFY `id_prioritas` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `data_realisasi_detail_skpd`
--
ALTER TABLE `data_realisasi_detail_skpd`
  MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `data_serapan_skpd`
--
ALTER TABLE `data_serapan_skpd`
  MODIFY `id_serapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;
--
-- AUTO_INCREMENT for table `data_sirup_skpd`
--
ALTER TABLE `data_sirup_skpd`
  MODIFY `id_kegiatan_sirup` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_skpd`
--
ALTER TABLE `data_skpd`
  MODIFY `id_skpd` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `data_uraian_kegiatan_skpd`
--
ALTER TABLE `data_uraian_kegiatan_skpd`
  MODIFY `id_uraian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `detail_kegiatan_skpd`
--
ALTER TABLE `detail_kegiatan_skpd`
  MODIFY `id_kegiatan_skpd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_kegiatan_skpd_backup`
--
ALTER TABLE `detail_kegiatan_skpd_backup`
  MODIFY `id_kegiatan_skpd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_realisasi_skpd`
--
ALTER TABLE `detail_realisasi_skpd`
  MODIFY `id_realisasi_skpd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kegiatan_dokumentasi`
--
ALTER TABLE `kegiatan_dokumentasi`
  MODIFY `id_dokumentasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `kegiatan_strategis`
--
ALTER TABLE `kegiatan_strategis`
  MODIFY `id_kegiatan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `laporan_realisasi_keuangan`
--
ALTER TABLE `laporan_realisasi_keuangan`
  MODIFY `id_laporan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `log_upload`
--
ALTER TABLE `log_upload`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_upload_realisasi`
--
ALTER TABLE `log_upload_realisasi`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penanda_tangan`
--
ALTER TABLE `penanda_tangan`
  MODIFY `id_ttd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna_anggaran`
--
ALTER TABLE `pengguna_anggaran`
  MODIFY `id_pa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setting_anggaran`
--
ALTER TABLE `setting_anggaran`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ta_kabupaten`
--
ALTER TABLE `ta_kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `ta_kontrak`
--
ALTER TABLE `ta_kontrak`
  MODIFY `id_kontrak` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_anggaran_wilayah`
--
ALTER TABLE `tbl_anggaran_wilayah`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_dana_dekon`
--
ALTER TABLE `tbl_dana_dekon`
  MODIFY `id_dana` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_dana_desa`
--
ALTER TABLE `tbl_dana_desa`
  MODIFY `id_danadesa` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_dana_tkdd`
--
ALTER TABLE `tbl_dana_tkdd`
  MODIFY `id_tkdd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_dak`
--
ALTER TABLE `tbl_data_dak`
  MODIFY `id_dak` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_detail_anggaran_wil`
--
ALTER TABLE `tbl_detail_anggaran_wil`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_detail_realisasi_wil`
--
ALTER TABLE `tbl_detail_realisasi_wil`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_mandatory`
--
ALTER TABLE `tbl_mandatory`
  MODIFY `id_mandatory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_realisasi_dak`
--
ALTER TABLE `tbl_realisasi_dak`
  MODIFY `id_realisasi` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_realisasi_dekon`
--
ALTER TABLE `tbl_realisasi_dekon`
  MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_realisasi_wilayah`
--
ALTER TABLE `tbl_realisasi_wilayah`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `users_access`
--
ALTER TABLE `users_access`
  MODIFY `access_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `users_level`
--
ALTER TABLE `users_level`
  MODIFY `role_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_menu`
--
ALTER TABLE `users_menu`
  MODIFY `menu_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
