-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 05:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipaduipnujateng`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id_user` int(5) NOT NULL,
  `id_pimpinan` int(10) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` text COLLATE latin1_general_ci NOT NULL,
  `kategori_user` varchar(50) COLLATE latin1_general_ci DEFAULT '' COMMENT 'ipnu or ippnu',
  `tingkatan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `sekretariat` text COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telpon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `foto` text COLLATE latin1_general_ci DEFAULT NULL,
  `ket` varchar(10) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id_user`, `id_pimpinan`, `username`, `password`, `kategori_user`, `tingkatan`, `sekretariat`, `email`, `no_telpon`, `nama_lengkap`, `level`, `aktif`, `foto`, `ket`) VALUES
(114, 18, 'adnan', '1234', '1', 'PW', 'Jl. Dr. Cipto 180 Semarang', 'nandcbp@gmail.com', '085741300425', 'Muhamad Adnan', 'superuser', 'Y', '20210612001907-184403845_2968856643335383_8419863139441398968_n.jpg', NULL),
(170, 18, 'juki', 'juki', '1', 'PW', '-', 'sijuky@gmail.com', '-', 'Marzuqi Rouf', 'anggota', 'Y', NULL, NULL),
(159, 34, 'ipnubanjarnegara', 'ipnubanjarnegara', '1', 'PC', 'Jl Gebang', 'mbahdoyok@wagers.id', '082226848282', 'Ahmad Rofiq', 'user', 'Y', '20210611230047-profile_photo-190x190.jpg', '34'),
(160, 264, 'ipnubanjarmangu', 'ipnubanjarmangu', '1', 'PAC', 'Jl. Bandongan Magelang', 'mbahdoyok@wagers.id', '082226848282', 'Hasan', 'user', 'Y', '20210612085818-profile_photo-190x190.jpg', '34'),
(169, 38, 'hania', 'adnan', '0', 'PW', 'Jl. Dr. Cipto 180 Semarang', 'haniakhumaira@gmail.com', '085741300425', 'Hania Khumaira', 'superuser', 'Y', NULL, NULL),
(172, 19, 'ipnudemak', 'ipnudemak', '1', 'PC', 'Demak', 'marzuqirouf@gmail.com', '085', 'Marzuqi Rouf', 'user', 'Y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(10) NOT NULL,
  `nia` varchar(50) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori_data` varchar(10) DEFAULT '',
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `penghasilan_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `penghasilan_ibu` varchar(100) DEFAULT NULL,
  `jumlah_saudara` varchar(5) DEFAULT NULL,
  `id_pw` varchar(10) DEFAULT NULL,
  `id_pimpinan` int(10) DEFAULT NULL,
  `id_pimpinan_ac` int(10) DEFAULT NULL,
  `id_pimpinan_rk` int(10) DEFAULT NULL,
  `aktif_kepengurusan` varchar(50) DEFAULT NULL,
  `alamat_lengkap` text NOT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL COMMENT 'opsi memilih sd-pt',
  `pendidikan_sd` varchar(100) DEFAULT NULL,
  `pendidikan_smp` varchar(100) DEFAULT NULL,
  `pendidikan_sma` varchar(100) DEFAULT NULL,
  `pendidikan_pt` varchar(100) DEFAULT NULL,
  `pendidikan_nonformal` varchar(100) DEFAULT '',
  `pelatihan_formal` varchar(100) DEFAULT '',
  `makesta` varchar(100) DEFAULT '' COMMENT 'yes or no',
  `penyelenggara_makesta` varchar(100) DEFAULT '',
  `waktu_makesta` varchar(100) DEFAULT '',
  `tempat_makesta` varchar(100) DEFAULT '',
  `lakmud` varchar(100) DEFAULT NULL COMMENT 'yes or no',
  `penyelenggara_lakmud` varchar(100) DEFAULT NULL,
  `waktu_lakmud` varchar(100) DEFAULT NULL,
  `tempat_lakmud` varchar(100) DEFAULT NULL,
  `lakut` varchar(100) DEFAULT NULL,
  `penyelenggara_lakut` varchar(100) DEFAULT NULL,
  `waktu_lakut` varchar(100) DEFAULT NULL,
  `tempat_lakut` varchar(100) DEFAULT NULL,
  `pelatihan_nonformal` text DEFAULT NULL,
  `status_cbp` varchar(100) DEFAULT NULL COMMENT 'anggota atau tidak',
  `tanggal_masuk` date DEFAULT NULL,
  `email` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `fb` text DEFAULT NULL,
  `ig` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `tempat_input_kta` varchar(50) NOT NULL DEFAULT '',
  `tanggal_input_kta` date DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `pekerjaan_usaha` varchar(100) DEFAULT NULL,
  `penghasilan_pribadi` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status_verifikasi` varchar(50) DEFAULT NULL COMMENT 'belum atau sudah terverifikasi',
  `keterangan` text DEFAULT NULL COMMENT 'tulis info yg belum tersedia kolomnya'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nia`, `nama`, `kategori_data`, `tempat_lahir`, `tanggal_lahir`, `nama_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `jumlah_saudara`, `id_pw`, `id_pimpinan`, `id_pimpinan_ac`, `id_pimpinan_rk`, `aktif_kepengurusan`, `alamat_lengkap`, `rt`, `rw`, `kode_pos`, `pendidikan_terakhir`, `pendidikan_sd`, `pendidikan_smp`, `pendidikan_sma`, `pendidikan_pt`, `pendidikan_nonformal`, `pelatihan_formal`, `makesta`, `penyelenggara_makesta`, `waktu_makesta`, `tempat_makesta`, `lakmud`, `penyelenggara_lakmud`, `waktu_lakmud`, `tempat_lakmud`, `lakut`, `penyelenggara_lakut`, `waktu_lakut`, `tempat_lakut`, `pelatihan_nonformal`, `status_cbp`, `tanggal_masuk`, `email`, `no_hp`, `fb`, `ig`, `twitter`, `tempat_input_kta`, `tanggal_input_kta`, `foto`, `pekerjaan_usaha`, `penghasilan_pribadi`, `password`, `status_verifikasi`, `keterangan`) VALUES
(226, '11.07.99.00015', 'Marzuqi Rouf', '1', 'Demak', '1999-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18', 19, 270, 996, NULL, 'Desa Klampok Lor, Kecamatan Kebonagung, Kabupaten Demak', NULL, NULL, NULL, 'STEKOM SEMARANG', NULL, NULL, NULL, NULL, 'PONPES ', 'LAKUT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LATIN 2, DIKLATAMA', 'tidak', '2019-11-30', 'si.juki@gmail.com', '085', 'fb', 'ig', 'twt', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, '11.01.97.00001', 'Muhammad Adnan', '1', 'Magelang', '1997-04-18', 'Achmad Ridwan', '', '', 'Umi Kulsum', '', '', '', '18', 34, 264, 994, 'pw', 'Sugihan, Sidowangi, Kajoran, Magelang', '', '', '', 'S1', 'MI Al Islam Krasak Salaman', 'MTs Walisongo Sidowangi', 'SMK Ma\'arif Walisongo Kajoran', 'STAI Syubbanul Wathon Magelang', 'Ponpes Al Huda Sugihan', 'lakmud', 'sudah', 'Komisariat MTs Walisongo Sidowangi', '2009-12-15', 'MTs Walisongo Sidowangi', 'sudah', 'PAC IPNU Kecamatan Muntilan', '2014-12-26', 'MTs Ma\'arif 2 Muntilan', 'belum', '', '', '', 'Diklatama CBP', 'ya', '2009-12-15', 'nandcbp@gmail.com', '085741300425', 'nandcbp', 'nandcbp_', 'nandcbp', 'Magelang', '2021-12-01', 'adnan2.png', '', '', '', '', NULL),
(229, '11.01.95.00002', 'Muhammad Falah', '1', 'Banjarnegara', '1995-04-05', 'Sadli', NULL, NULL, 'Saunah', NULL, NULL, NULL, NULL, 34, 264, 994, 'pr', 'Banjarkulon, Banjarmangu, Banjarnegara', NULL, NULL, NULL, 'Tidak Ada', '', '', '', '', '', 'makesta', 'sudah', 'PR Banjarkulon', '2019-12-05', 'MTs Asslafi', 'belum', '', '', '', 'belum', '', '', '', NULL, 'tidak', '2019-12-05', '', '', '', '', '', '', '2021-12-02', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buku_ekspedisi`
--

CREATE TABLE `buku_ekspedisi` (
  `id_ekspedisi` int(10) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `alamat_tujuan` text NOT NULL,
  `isi_perihal` text DEFAULT NULL,
  `nomor_surat` varchar(100) DEFAULT NULL,
  `tanggal_surat` varchar(100) DEFAULT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `tanda_tangan_penerima` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_buku_tamu` int(10) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(100) NOT NULL,
  `nama_lengkap_tamu` varchar(100) NOT NULL,
  `organisasi` varchar(100) NOT NULL,
  `jabatan_tamu` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `keperluan` text NOT NULL,
  `tanda_tangan_tamu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `buku_tamu`
--
DELIMITER $$
CREATE TRIGGER `trig_bt` BEFORE INSERT ON `buku_tamu` FOR EACH ROW set NEW.id_buku_tamu=CONCAT('BT', FLOOR(1+(RAND()*655530)))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_hadir`
--

CREATE TABLE `daftar_hadir` (
  `id_dh` int(10) NOT NULL,
  `id_dk` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tanda_tangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `daftar_hadir`
--
DELIMITER $$
CREATE TRIGGER `trig_dh` BEFORE INSERT ON `daftar_hadir` FOR EACH ROW set NEW.id_dh=CONCAT('DH', FLOOR(1+(RAND()*655530)))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_kegiatan`
--

CREATE TABLE `daftar_kegiatan` (
  `id_dk` int(10) NOT NULL,
  `id_pimpinan` int(10) DEFAULT NULL,
  `kategori_kegiatan` varchar(100) DEFAULT NULL,
  `kegiatan` text NOT NULL,
  `hari` varchar(100) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu_mulai` varchar(100) DEFAULT NULL,
  `waktu_selesai` varchar(100) DEFAULT NULL,
  `tempat` text NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `daftar_kegiatan`
--
DELIMITER $$
CREATE TRIGGER `trig_dk` BEFORE INSERT ON `daftar_kegiatan` FOR EACH ROW set NEW.id_dk=CONCAT('DK', FLOOR(1+(RAND()*655530)))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `index_surat`
--

CREATE TABLE `index_surat` (
  `index_surat` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `index_surat`
--

INSERT INTO `index_surat` (`index_surat`, `keterangan`) VALUES
('A', 'Surat untuk lingkungan internal IPNU'),
('B', 'Surat untuk lingkungan eksternal IPNU'),
('C', 'Surat untuk NU, banom lain, lembaga atau lajnah di lingkungan NU'),
('SK', 'Surat Keputusan'),
('SKt.', 'Surat Keterangan'),
('SM ', 'Surat Mandat'),
('SP', 'Surat Pengesahan'),
('Sp(p kecil)', 'Surat Pengangkatan/Pemberhentian'),
('SPt.', 'Surat Pengantar'),
('SRP', 'Surat Rekomendasi Pengesahan'),
('ST', 'Surat Tugas');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_barang`
--

CREATE TABLE `inventaris_barang` (
  `id_ib` int(10) NOT NULL,
  `id_pimpinan` int(10) DEFAULT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `asal_mula_barang` varchar(100) NOT NULL,
  `harga_satuan` varchar(100) NOT NULL,
  `tanggal_mulai_dipakai` date DEFAULT NULL,
  `tanggal_mulai_tidak_dipakai` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `inventaris_barang`
--
DELIMITER $$
CREATE TRIGGER `trig_ib` BEFORE INSERT ON `inventaris_barang` FOR EACH ROW set NEW.id_ib=CONCAT('IB', FLOOR(1+(RAND()*655530)))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(10) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `no_urut` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `no_urut`) VALUES
(1, 'Badan Student Crisis Centre (SCC)', '0901'),
(2, 'Departemen Dakwah', '0703'),
(3, 'Wakil Ketua Bidang Olahraga dan Seni Budaya', '0207'),
(4, 'Departemen Olahraga dan Seni Budaya', '0707'),
(5, 'Departemen Kaderisasi', '0702'),
(6, 'Wakil Ketua Bidang Komunikasi dan Informasi', '0206'),
(7, 'Departemen Jaringan Sekolah dan Pondok Pesantren', '0704'),
(8, 'Wakil Sekretaris Bidang Jaringan Eksternal dan SDM', '0405'),
(9, 'Wakil Sekretaris Bidang Olahraga dan Seni Budaya', '0407'),
(10, 'Departemen Komunikasi dan Informasi', '0706'),
(11, 'Ketua', '01'),
(12, 'Wakil Ketua Bidang Kaderisasi', '0202'),
(13, 'Wakil Ketua Bidang Dakwah', '0203'),
(14, 'Wakil Sekretaris Bidang Kaderisasi', '0402'),
(15, 'Wakil Bendahara I', '0601'),
(16, 'Wakil Sekretaris Bidang Organisasi', '0401'),
(17, 'Lembaga Kajian, Pers dan Jurnalistik', '0803'),
(18, 'Bendahara', '05'),
(19, 'Departemen Jaringan Eksternal', '0705'),
(20, 'Departemen Organisasi', '0701'),
(21, 'Wakil Bendahara IV', '0604'),
(22, 'Wakil Ketua Bidang Jaringan Eksternal dan SDM', '0205'),
(23, 'Wakil Ketua Bidang Jaringan Sekolah dan Pondok Pesantren', '0204'),
(24, 'Lembaga Corps Brigade Pembangunan (CBP)', '0805'),
(25, 'Lembaga Komunikasi Perguruan Tinggi (LKPT)', '0801'),
(26, 'Wakil Sekretaris Bidang Jaringan Sekolah dan Pondok Pesantren', '0404'),
(27, 'Lembaga Anti Narkoba dan Radikalisme', '0804'),
(28, 'Wakil Sekretaris Bidang Dakwah', '0403'),
(29, 'Wakil Bendahara III', '0603'),
(30, 'Wakil Bendahara II', '0602'),
(31, 'Wakil Ketua Bidang Organisasi', '0201'),
(32, 'Lembaga Ekonomi Kewirausahaan dan Koperasi (LEKAS)', '0802'),
(33, 'Wakil Sekretaris Bidang Komunikasi dan Informasi', '0406'),
(34, 'Sekretaris', '03');

--
-- Triggers `jabatan`
--
DELIMITER $$
CREATE TRIGGER `trig_j` BEFORE INSERT ON `jabatan` FOR EACH ROW set NEW.id_jabatan=CONCAT('J', FLOOR(1+(RAND()*655530)))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kaderisasi`
--

CREATE TABLE `kaderisasi` (
  `id_kaderisasi` int(10) NOT NULL,
  `kategori_kaderisasi` varchar(100) NOT NULL,
  `id_pimpinan` int(10) NOT NULL,
  `penyelenggara` varchar(100) DEFAULT NULL,
  `waktu_pelaksanaan` text DEFAULT NULL,
  `tempat_pelaksanaan` text DEFAULT NULL,
  `nama_panitia` varchar(100) DEFAULT NULL,
  `ttd_panitia` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_data`
--

CREATE TABLE `kategori_data` (
  `id_kategori` int(10) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `kode_kategori` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_data`
--

INSERT INTO `kategori_data` (`id_kategori`, `kategori`, `kode_kategori`) VALUES
(1, 'IPNU', '1'),
(2, 'IPPNU', '2');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(10) NOT NULL,
  `id_pimpinan` int(10) DEFAULT NULL,
  `kategori_data` varchar(10) DEFAULT NULL,
  `masuk` varchar(100) DEFAULT NULL,
  `keluar` varchar(100) DEFAULT NULL,
  `tanggal_transaksi` date NOT NULL,
  `uraian_sumber_pemasukan` text DEFAULT NULL,
  `uraian_penggunaan_dana` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `id_pimpinan`, `kategori_data`, `masuk`, `keluar`, `tanggal_transaksi`, `uraian_sumber_pemasukan`, `uraian_penggunaan_dana`, `keterangan`) VALUES
(1, 18, '1', '24000000', '200000', '2021-11-17', '-', '-', '-'),
(2, 18, '1', '500000', '400000', '2021-11-18', '-', '-', '-');

--
-- Triggers `keuangan`
--
DELIMITER $$
CREATE TRIGGER `trig_k` BEFORE INSERT ON `keuangan` FOR EACH ROW set NEW.id_keuangan=CONCAT('K', FLOOR(1+(RAND()*655530)))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(10) NOT NULL,
  `jenis_laporan` varchar(100) NOT NULL,
  `id_dk` varchar(30) NOT NULL,
  `isi_laporan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `laporan`
--
DELIMITER $$
CREATE TRIGGER `trig_lap` BEFORE INSERT ON `laporan` FOR EACH ROW set NEW.id_laporan=CONCAT('L', FLOOR(1+(RAND()*655530)))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notulensi`
--

CREATE TABLE `notulensi` (
  `id_notulensi` int(10) NOT NULL,
  `id_dk` int(10) NOT NULL,
  `jumlah_peserta` varchar(100) NOT NULL,
  `nama_pemimpin` varchar(100) NOT NULL,
  `jabatan_pemimpin` varchar(100) NOT NULL,
  `nama_notulis` varchar(100) NOT NULL,
  `jabatan_notulis` varchar(100) NOT NULL,
  `kesimpulan_setiap_pembicaraan` text DEFAULT NULL,
  `keputusan_yang_diambil` text DEFAULT NULL,
  `rekomendasi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `notulensi`
--
DELIMITER $$
CREATE TRIGGER `trig_n` BEFORE INSERT ON `notulensi` FOR EACH ROW set NEW.id_notulensi=CONCAT('N', FLOOR(1+(RAND()*655530)))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_aplikasi`
--

CREATE TABLE `pengaturan_aplikasi` (
  `nama_app` varchar(100) NOT NULL DEFAULT '',
  `singkatan_app` varchar(10) DEFAULT NULL,
  `title_app_home` varchar(50) DEFAULT NULL,
  `title_app_adm` varchar(50) DEFAULT NULL,
  `logo_app` varchar(50) DEFAULT NULL,
  `footer` text DEFAULT NULL,
  `tahun_dibuat` varchar(10) DEFAULT NULL,
  `versi` varchar(50) DEFAULT NULL,
  `organisasi` varchar(100) NOT NULL,
  `kop_surat` varchar(100) DEFAULT NULL,
  `alamat_lengkap` text NOT NULL,
  `ketua` text NOT NULL,
  `sekretaris` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan_aplikasi`
--

INSERT INTO `pengaturan_aplikasi` (`nama_app`, `singkatan_app`, `title_app_home`, `title_app_adm`, `logo_app`, `footer`, `tahun_dibuat`, `versi`, `organisasi`, `kop_surat`, `alamat_lengkap`, `ketua`, `sekretaris`) VALUES
('SIA GP ANSOR PURWOREJO', 'PC', 'SIA GP ANSOR PURWOREJO', 'Admin Database PC GP ANSOR Purworejo', 'logo.png', '<a href=\"http://ipnujateng.or.id\">PC GP Ansor Purworejo || pesantrenprogrammer.id</a>', '2021', 'AA01', 'PC GP Ansor Kabupaten Purworejo', 'kop-surat2.jpg', 'Jl. Dr. Cipto Nomor 180', 'Ferial Farkhan Ibnu Akhmad', 'Kholid Abdillah');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_kta`
--

CREATE TABLE `pengaturan_kta` (
  `id` varchar(5) NOT NULL,
  `nama_organisasi` varchar(100) NOT NULL,
  `alamt_sekretariat` text NOT NULL,
  `nama_ketua` varchar(100) NOT NULL,
  `nia_ketua` varchar(50) NOT NULL,
  `nama_sekretaris` varchar(100) NOT NULL,
  `nia_sekretaris` varchar(50) NOT NULL,
  `stempel` varchar(100) NOT NULL,
  `tanda_tangan_ketua` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan_kta`
--

INSERT INTO `pengaturan_kta` (`id`, `nama_organisasi`, `alamt_sekretariat`, `nama_ketua`, `nia_ketua`, `nama_sekretaris`, `nia_sekretaris`, `stempel`, `tanda_tangan_ketua`) VALUES
('PNG29', 'PW IPNU Jawa Tengah', 'Jl. Dr. Cipto Nomor 180 Semarang 50125', 'Ferial Farkhan Ibnu Akhmad', '--', 'Kholid Abdillah', '-', 'stempel-pw.png', 'ferial-ttd.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_pimpinan`
--

CREATE TABLE `pengaturan_pimpinan` (
  `id_pengaturan_pimpinan` int(5) NOT NULL,
  `id_pimpinan` int(10) NOT NULL,
  `kop_surat` text NOT NULL,
  `nama_ketua` varchar(100) NOT NULL,
  `nia_ketua` varchar(50) DEFAULT NULL,
  `ttd_ketua` text NOT NULL,
  `nama_sekretaris` varchar(100) NOT NULL,
  `nia_sekretaris` varchar(50) DEFAULT NULL,
  `ttd_sekretaris` text NOT NULL,
  `stempel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan_pimpinan`
--

INSERT INTO `pengaturan_pimpinan` (`id_pengaturan_pimpinan`, `id_pimpinan`, `kop_surat`, `nama_ketua`, `nia_ketua`, `ttd_ketua`, `nama_sekretaris`, `nia_sekretaris`, `ttd_sekretaris`, `stempel`) VALUES
(37, 18, 'kop-surat.PNG', 'Syaeful Kamaludin, S.Pd', '-', 'C.png', 'Fathurrochman Wahid, S.H', '-', 'no-image.jpg', 'no-image.jpg'),
(39, 34, '5055c4b6-bdc5-47f8-bb1c-e5f7f848cfc5.jpg', 'Muhammad Sofyan', '-', 'ttd_rani.jpg', 'Saudi Sahri', '-', 'no-image.jpg', 'stampel_ippnu2.png');

-- --------------------------------------------------------

--
-- Table structure for table `peraturan`
--

CREATE TABLE `peraturan` (
  `id_peraturan` int(10) NOT NULL,
  `judul_peraturan` varchar(100) NOT NULL,
  `nomor_peraturan` varchar(100) NOT NULL,
  `nama_peraturan` text NOT NULL,
  `konsideran` text NOT NULL,
  `isi_peraturan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id_pimpinan` int(10) NOT NULL,
  `pimpinan` varchar(100) NOT NULL,
  `kategori_data` varchar(10) DEFAULT NULL,
  `kd_pimpinan` varchar(10) DEFAULT NULL,
  `nama_pimpinan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`id_pimpinan`, `pimpinan`, `kategori_data`, `kd_pimpinan`, `nama_pimpinan`) VALUES
(1, 'PC', '1', '34', 'Kota Surakarta'),
(2, 'PC', '1', '33', 'Kota Semarang'),
(3, 'PC', '1', '13', 'Kabupaten Kendal'),
(4, 'PC', '1', '36', 'Lasem'),
(5, 'PC', '1', '07', 'Kabupaten Cilacap'),
(6, 'PC', '1', '10', 'Kabupaten Jepara'),
(7, 'PC', '1', '20', 'Kabupaten Purbalingga'),
(8, 'PC', '1', '04', 'Kabupaten Blora'),
(9, 'PC', '1', '23', 'Kabupaten Semarang'),
(10, 'PC', '1', '24', 'Kabupaten Sragen'),
(11, 'PC', '1', '25', 'Kabupaten Sukoharjo'),
(12, 'PC', '1', '14', 'Kabupaten Klaten'),
(13, 'PC', '1', '30', 'Kota Magelang'),
(14, 'PC', '1', '16', 'Kabupaten Magelang'),
(15, 'PC', '1', '17', 'Kabupaten Pati'),
(16, 'PC', '1', '05', 'Kabupaten Boyolali'),
(17, 'PC', '1', '35', 'Kota Tegal'),
(18, 'PW', '1', '11', 'Jawa Tengah'),
(19, 'PC', '1', '08', 'Kabupaten Demak'),
(20, 'PC', '1', '03', 'Kabupaten Batang'),
(21, 'PC', '1', '02', 'Kabupaten Banyumas'),
(22, 'PC', '1', '11', 'Kabupaten Karanganyar'),
(23, 'PC', '1', '28', 'Kabupaten Wonogiri'),
(24, 'PC', '1', '06', 'Kabupaten Brebes'),
(25, 'PC', '1', '19', 'Kabupaten Pemalang'),
(26, 'PC', '1', '22', 'Kabupaten Rembang'),
(27, 'PC', '1', '21', 'Kabupaten Purworejo'),
(28, 'PC', '1', '29', 'Kabupaten Wonosobo'),
(29, 'PC', '1', '15', 'Kabupaten Kudus'),
(30, 'PC', '1', '09', 'Kabupaten Grobogan'),
(31, 'PC', '1', '12', 'Kabupaten Kebumen'),
(32, 'PC', '1', '27', 'Kabupaten Temanggung'),
(33, 'PC', '1', '26', 'Kabupaten Tegal'),
(34, 'PC', '1', '01', 'Kabupaten Banjarnegara'),
(35, 'PC', '1', '32', 'Kota Salatiga'),
(36, 'PC', '1', '31', 'Kota Pekalongan'),
(37, 'PC', '1', '18', 'Kabupaten Pekalongan'),
(38, 'PW', '0', '33', 'Jawa Tengah'),
(39, 'PC', '0', '01', 'Kabupaten Cilacap'),
(40, 'PC', '0', '02', 'Kabupaten Banyumas'),
(41, 'PC', '0', '03', 'Kabupaten Purbalingga'),
(42, 'PC', '0', '04', 'Kabupaten Banjarnegara'),
(43, 'PC', '0', '05', 'Kabupaten Kebumen'),
(44, 'PC', '0', '06', 'Kabupaten Purworejo'),
(45, 'PC', '0', '07', 'Kabupaten Wonosobo'),
(46, 'PC', '0', '08', 'Kabupaten Magelang'),
(47, 'PC', '0', '09', 'Kabupaten Boyolali'),
(48, 'PC', '0', '10', 'Kabupaten Klaten'),
(49, 'PC', '0', '11', 'Kabupaten Sukoharjo'),
(50, 'PC', '0', '12', 'Kabupaten Wonogiri'),
(51, 'PC', '0', '13', 'Kabupaten Karanganyar'),
(52, 'PC', '0', '14', 'Kabupaten Sragen'),
(53, 'PC', '0', '15', 'Kabupaten Grobogan'),
(54, 'PC', '0', '16', 'Kabupaten Blora'),
(55, 'PC', '0', '17', 'Kabupaten Rembang'),
(56, 'PC', '0', '18', 'Kabupaten Pati'),
(57, 'PC', '0', '19', 'Kabupaten Kudus'),
(58, 'PC', '0', '20', 'Kabupaten Jepara'),
(59, 'PC', '0', '21', 'Kabupaten Demak'),
(60, 'PC', '0', '22', 'Kabupaten Semarang'),
(61, 'PC', '0', '23', 'Kabupaten Temanggung'),
(62, 'PC', '0', '24', 'Kabupaten Kendal'),
(63, 'PC', '0', '25', 'Kabupaten Batang'),
(64, 'PC', '0', '26', 'Kabupaten Pekalongan'),
(65, 'PC', '0', '27', 'Kabupaten Pemalang'),
(66, 'PC', '0', '28', 'Kabupaten Tegal'),
(67, 'PC', '0', '29', 'Kabupatehn Brebes'),
(68, 'PC', '0', '71', 'Kota Magelang'),
(69, 'PC', '0', '72', 'Kota Surakarta'),
(70, 'PC', '0', '73', 'Kota Salatiga'),
(71, 'PC', '0', '74', 'Kota Semarang'),
(72, 'PC', '0', '75', 'Kota Pekalongan'),
(73, 'PC', '0', '76', 'Kota Tegal'),
(74, 'PC', '0', '77', 'Lasem');

--
-- Triggers `pimpinan`
--
DELIMITER $$
CREATE TRIGGER `trig_insert_pimpinan` BEFORE INSERT ON `pimpinan` FOR EACH ROW set NEW.id_pimpinan=CONCAT('PM', FLOOR(1+(RAND()*655530)))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan_ac`
--

CREATE TABLE `pimpinan_ac` (
  `id_pimpinan_ac` int(10) NOT NULL,
  `id_pimpinan` int(10) NOT NULL,
  `pimpinan_ac` varchar(100) NOT NULL,
  `kategori_data` varchar(10) DEFAULT NULL,
  `kd_pimpinan_ac` varchar(10) NOT NULL,
  `nama_pimpinan_ac` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pimpinan_ac`
--

INSERT INTO `pimpinan_ac` (`id_pimpinan_ac`, `id_pimpinan`, `pimpinan_ac`, `kategori_data`, `kd_pimpinan_ac`, `nama_pimpinan_ac`) VALUES
(264, 34, 'PAC', '1', '01', 'Banjarmangu'),
(265, 34, 'PAC', '1', '02', 'Banjarnegara'),
(266, 34, 'PAC', '1', '03', 'Batur'),
(267, 34, 'PAC', '1', '04', 'Bawang'),
(268, 34, 'PAC', '1', '05', 'Kalibening'),
(269, 34, 'PAC', '1', '06', 'Karangkobar'),
(270, 19, 'PAC', '1', '09', 'Kebonagung'),
(271, 39, 'PAC', '0', '01', 'Kroya'),
(272, 34, 'PAC', '1', '09', 'alakadabra');

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan_rk`
--

CREATE TABLE `pimpinan_rk` (
  `id_pimpinan_rk` int(10) NOT NULL,
  `id_pimpinan_ac` int(10) NOT NULL,
  `id_pimpinan` int(10) NOT NULL,
  `pimpinan_rk` varchar(100) NOT NULL,
  `kategori_data` varchar(10) DEFAULT NULL,
  `kd_pimpinan_rk` varchar(10) NOT NULL,
  `nama_pimpinan_rk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pimpinan_rk`
--

INSERT INTO `pimpinan_rk` (`id_pimpinan_rk`, `id_pimpinan_ac`, `id_pimpinan`, `pimpinan_rk`, `kategori_data`, `kd_pimpinan_rk`, `nama_pimpinan_rk`) VALUES
(994, 264, 34, 'PR', '1', '01', 'Banjarkulon'),
(995, 264, 34, 'PR', '1', '02', 'Banjarmangu'),
(996, 270, 19, 'PR', '1', '01', 'Klampoklor'),
(997, 264, 34, 'PR', '1', '05', 'hula');

-- --------------------------------------------------------

--
-- Table structure for table `rencana_kegiatan`
--

CREATE TABLE `rencana_kegiatan` (
  `id_rk` int(10) NOT NULL,
  `id_pimpinan` int(10) DEFAULT NULL,
  `kategori_rencana_kegiatan` varchar(100) DEFAULT NULL,
  `nama_kegiatan` text NOT NULL,
  `rencana_waktu_mulai` date DEFAULT NULL,
  `rencana_waktu_selesai` date DEFAULT NULL,
  `penanggung_jawab` text NOT NULL,
  `keterangan` text DEFAULT NULL,
  `proposal` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `rencana_kegiatan`
--
DELIMITER $$
CREATE TRIGGER `trig_rk` BEFORE INSERT ON `rencana_kegiatan` FOR EACH ROW set NEW.id_rk=CONCAT('RK', FLOOR(1+(RAND()*655530)))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_sk` int(10) NOT NULL,
  `id_pimpinan` int(10) DEFAULT NULL,
  `index_surat` varchar(30) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `tujuan_surat` varchar(100) NOT NULL,
  `uraian_singkat` varchar(100) DEFAULT NULL,
  `isi_surat` text DEFAULT NULL,
  `tanggal_surat` date NOT NULL,
  `sifat_surat` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(10) NOT NULL,
  `id_pimpinan` int(10) DEFAULT NULL,
  `kategori_data` varchar(10) DEFAULT NULL,
  `nomor_surat_masuk` varchar(100) NOT NULL,
  `tanggal_surat_diterima` date NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_surat` date NOT NULL,
  `terusan` varchar(100) DEFAULT NULL,
  `catatan_disposisi` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `id_pimpinan`, `kategori_data`, `nomor_surat_masuk`, `tanggal_surat_diterima`, `pengirim`, `perihal`, `isi`, `tanggal_surat`, `terusan`, `catatan_disposisi`, `keterangan`, `foto`) VALUES
(11, 18, '1', '001', '2021-11-17', 'PP IPNU', 'Kerjasama Pengembangan Media', '-', '2021-11-15', '-', '-', '-', '-'),
(12, 18, '0', '002', '2021-11-17', 'PP RMI', 'Workshop Santri Mandiri', '-', '2021-11-15', '-', '-', '-', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku_ekspedisi`
--
ALTER TABLE `buku_ekspedisi`
  ADD PRIMARY KEY (`id_ekspedisi`);

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_buku_tamu`);

--
-- Indexes for table `daftar_hadir`
--
ALTER TABLE `daftar_hadir`
  ADD PRIMARY KEY (`id_dh`),
  ADD KEY `fk_dh_dk` (`id_dk`);

--
-- Indexes for table `daftar_kegiatan`
--
ALTER TABLE `daftar_kegiatan`
  ADD PRIMARY KEY (`id_dk`);

--
-- Indexes for table `index_surat`
--
ALTER TABLE `index_surat`
  ADD PRIMARY KEY (`index_surat`);

--
-- Indexes for table `inventaris_barang`
--
ALTER TABLE `inventaris_barang`
  ADD PRIMARY KEY (`id_ib`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kaderisasi`
--
ALTER TABLE `kaderisasi`
  ADD PRIMARY KEY (`id_kaderisasi`);

--
-- Indexes for table `kategori_data`
--
ALTER TABLE `kategori_data`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `fk_id_dk` (`id_dk`);

--
-- Indexes for table `notulensi`
--
ALTER TABLE `notulensi`
  ADD PRIMARY KEY (`id_notulensi`),
  ADD KEY `fk_n_dk` (`id_dk`);

--
-- Indexes for table `pengaturan_aplikasi`
--
ALTER TABLE `pengaturan_aplikasi`
  ADD PRIMARY KEY (`nama_app`);

--
-- Indexes for table `pengaturan_kta`
--
ALTER TABLE `pengaturan_kta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan_pimpinan`
--
ALTER TABLE `pengaturan_pimpinan`
  ADD PRIMARY KEY (`id_pengaturan_pimpinan`);

--
-- Indexes for table `peraturan`
--
ALTER TABLE `peraturan`
  ADD PRIMARY KEY (`id_peraturan`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`);

--
-- Indexes for table `pimpinan_ac`
--
ALTER TABLE `pimpinan_ac`
  ADD PRIMARY KEY (`id_pimpinan_ac`);

--
-- Indexes for table `pimpinan_rk`
--
ALTER TABLE `pimpinan_rk`
  ADD PRIMARY KEY (`id_pimpinan_rk`);

--
-- Indexes for table `rencana_kegiatan`
--
ALTER TABLE `rencana_kegiatan`
  ADD PRIMARY KEY (`id_rk`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `fk_sk_index` (`index_surat`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `buku_ekspedisi`
--
ALTER TABLE `buku_ekspedisi`
  MODIFY `id_ekspedisi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id_buku_tamu` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_hadir`
--
ALTER TABLE `daftar_hadir`
  MODIFY `id_dh` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_kegiatan`
--
ALTER TABLE `daftar_kegiatan`
  MODIFY `id_dk` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_barang`
--
ALTER TABLE `inventaris_barang`
  MODIFY `id_ib` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kategori_data`
--
ALTER TABLE `kategori_data`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notulensi`
--
ALTER TABLE `notulensi`
  MODIFY `id_notulensi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaturan_pimpinan`
--
ALTER TABLE `pengaturan_pimpinan`
  MODIFY `id_pengaturan_pimpinan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `peraturan`
--
ALTER TABLE `peraturan`
  MODIFY `id_peraturan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id_pimpinan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `pimpinan_ac`
--
ALTER TABLE `pimpinan_ac`
  MODIFY `id_pimpinan_ac` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `pimpinan_rk`
--
ALTER TABLE `pimpinan_rk`
  MODIFY `id_pimpinan_rk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=998;

--
-- AUTO_INCREMENT for table `rencana_kegiatan`
--
ALTER TABLE `rencana_kegiatan`
  MODIFY `id_rk` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_sk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `fk_sk_index` FOREIGN KEY (`index_surat`) REFERENCES `index_surat` (`index_surat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
