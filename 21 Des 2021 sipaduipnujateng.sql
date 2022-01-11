-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 09:19 PM
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
(159, 34, 'ipnubanjarnegara', 'ipnubanjarnegara', '1', 'PC', 'Jl Gebang2', 'ipnubanjarnegara@gmail.com', '082226848282', 'Ahmad Rofiq', 'user', 'Y', '20210611230047-profile_photo-190x190.jpg', '34'),
(184, 264, 'ipnubanjarmangu', 'ipnubanjarmangu', '1', 'PAC', 'ipnubanjarmangu', 'ipnubanjarmangu@gmail.com', '087', 'ipnubanjarmangu', 'user', 'Y', NULL, '34'),
(185, 21, 'ipnubanyumas', 'ipnubanyumas', '1', 'PC', 'Banyumas Raya', 'ipnubanyumas@gmail.com', '080', 'IPNU BANYUMAS', 'user', 'Y', NULL, NULL),
(169, 38, 'alifa', 'alifa', '0', 'PW', 'Jl. Dr. Cipto 180 Semarang', 'alifa@gmail.com', '085', 'Alifa Muhandis', 'superuser', 'Y', NULL, NULL),
(186, 19, 'ipnudemak', 'ipnudemak', '1', 'PC', 'Demak Kota', 'marzuqirouf@gmail.com', '085', 'Marzuqi Rouf', 'user', 'Y', NULL, NULL),
(173, 42, 'ippnubanjarnegara', 'ippnubanjarnegara', '0', 'PC', 'Jl. Susah', 'ippnubanjarnegara@gmail.com', '087', 'IPPNU BANJARNEGARA', 'user', 'Y', NULL, '42'),
(174, 39, 'ippnucilacap', 'ippnucilacap', '0', 'PC', '', 'ippnucilacap@yahoo.com', '', 'ippnucilacap', 'user', 'Y', NULL, '39'),
(180, 270, 'ipnukebonagung', 'ipnukebonagung', '1', 'PAC', 'Demak', 'ipnukebonagung@gmail.com', '085', 'IPNU KEBONAGUNG', 'user', 'Y', NULL, '19'),
(183, 273, 'ippnubanjarmangu', 'ippnubanjarmangu', '0', 'PAC', 'ippnubanjarmangu', 'ippnubanjarmangu@gmail.com', '087', 'ippnubanjarmangu', 'user', 'Y', NULL, '42'),
(191, 284, 'ipnusigaluh', 'ipnusigaluh', '1', 'PAC', 'Sigaluh Banjarnegara', 'ipnusigaluh@gmail.com', '085', 'ipnusigaluh', 'user', 'Y', NULL, '34'),
(188, 19, 'ipnudemak', 'ipnudemak', '1', 'PC', 'Jl. Demak', 'ipnudemak@gmail.com', '085', 'IPNU DEMAK', 'user', 'Y', NULL, NULL),
(189, 271, 'ippnukroya', 'ippnukroya', '0', 'PAC', 'ippnukroya', 'ippnukroya@gmail.com', 'ippnukroya', 'ippnukroya', 'user', 'Y', NULL, '39');

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
(227, '11.01.97.00001', 'Muhammad Adnan', '1', 'Magelang', '1997-04-18', 'Achmad Ridwan', '', '', 'Umi Kulsum', '', '', '', '18', 34, 264, 994, 'PW', 'Desa Klampoklor RT 03 RW 02, Kecamatan Kebonagung, Kabupaten Demak', '', '', '', 'S2', '', '', '', '', 'Ponpes Al Huda Sugihan', 'lakmud', 'sudah', '-', '', '-', 'sudah', '-', '', '-', 'belum', '', '', '', '', 'tidak', NULL, 'nandcbp@gmail.com', '085741300425', 'nandcbp', 'nandcbp_', '', 'Magelang', '2021-12-01', '145898904_2763054043945537_1998258453405352082_n3.jpg', '', '', '1234', '', NULL),
(232, '3301161200001', 'Avivi Zain Rachmawati', '0', 'Cilacap', '1999-12-06', 'Rochmat', NULL, NULL, 'Nur Aisyah', NULL, NULL, NULL, NULL, 39, 271, 998, 'PC', 'RT01/RW02, Desa Karangmangu, Kecamatan Kroya, Kabupaten Cilacap', NULL, NULL, NULL, 'S1', 'MI Al Islam Kroya', 'MTs Miftahul Huda Kroya', 'MA Miftahul Huda Kroya', 'UIN Prof. KH. Saifuddin Zuhri', 'Ponpes Miftahul Huda Kroya', 'Lakmud', 'sudah', 'PK IPPNU Miftahul Huda Kroya', '2016-12-17', 'Ponpes Miftahul Huda Kroya', 'sudah', 'PAC IPPNU Kroya', '', 'PAC IPPNU Kroya', 'belum', '', '', '', 'Latin 2', 'ya', '2016-12-17', 'zainrachmawati@gmail.com', '085', 'zainrachmawati', 'zainrachmawati', 'zainrachmawati', 'Cilacap', '2021-12-06', 'adelia.jpg', NULL, NULL, '1234', NULL, NULL),
(235, '330419090001', 'Kusuma Wardani', '0', 'Banjarnegara', '1999-05-02', 'Sadli', NULL, NULL, 'Saunah', NULL, NULL, NULL, NULL, 42, 273, 999, '', 'Jl. Sangsekerta', NULL, NULL, NULL, 'Tidak Ada', '', '', '', '', '', 'makesta', 'sudah', '-', '2019-09-05', '-', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '2021-12-06', '5055c4b6-bdc5-47f8-bb1c-e5f7f848cfc5.jpg', NULL, NULL, '1234', NULL, NULL),
(237, '11.01.99.00005', 'Rohmat Afif', '1', 'Banjarnegara', '1999-12-07', 'Shodiq Ahmad', NULL, NULL, 'Umi Kulsum', NULL, NULL, NULL, NULL, 34, 264, 995, 'Anggota', 'Banjarmangu, Banjarnegara', NULL, NULL, NULL, 'SMA/Sederajat', 'MI Al Islam Krasak Salaman', 'MTs Walisongo Sidowangi', 'SMK Ma\'arif Walisongo Kajoran', '-', 'Ponpes Al Huda Sugihan', 'Makesta', 'sudah', '-', '2017-12-07', '-', 'belum', '', '', '', 'belum', '', '', '', 'Diklatama CBP', 'ya', '2017-12-07', 'nandcbp@gmail.com', '085741300425', 'nandcbp', 'nandcbp_', 'nandcbp', 'Banjarnegara', '2021-12-07', 'tFjz2PIz_400x4001.jpg', NULL, NULL, NULL, 'belum', NULL),
(238, '330419120002', 'Siti Qomariah', '0', 'Banjarnegara', '1998-02-02', 'Sofwan', NULL, NULL, 'Siti Muniah', NULL, NULL, NULL, NULL, 42, 273, 999, 'anggota', 'Jl. Mahkamah Agung', NULL, NULL, NULL, 'SMA/Sederajat', '', '', '', '', '', 'makesta', 'sudah', 'PR Banjarkulon', '2019-12-19', 'MTs Asslafi', 'belum', '', '', '', 'belum', '', '', '', 'Diklatama CBP', 'ya', '2019-12-19', '', '', '', '', '', 'Banjarnegara', '2021-12-08', '', NULL, NULL, NULL, NULL, NULL),
(241, '337614050001', 'Alifa Muhandis', '0', 'Tegal', '1994-05-09', '-', NULL, NULL, '-', NULL, NULL, NULL, NULL, 73, 834, 1004, 'pw', 'Tegal Selatan Kota Tegal Jawa Tegah', NULL, NULL, NULL, 'Tidak Ada', '', '', '', '', '', 'lakut', 'sudah', 'PKPT UNNES', '2014-05-23', 'UNNES', 'belum', '', '', '', 'belum', '', '', '', '', 'Pilih', '0000-00-00', '', '', '', '', '', 'Kota Tegal', '2021-12-16', '20211211013714_IMG_0415.JPG', NULL, NULL, NULL, NULL, NULL),
(242, '11.33.00.00001', 'Mujib Hanafi', '1', 'Semarang', '2000-02-19', 'Rozaq', NULL, NULL, 'Siti', NULL, NULL, NULL, NULL, 2, 833, NULL, 'PKPT', 'Jl. Dr. Cipto Semarang', NULL, NULL, NULL, 'S1', '-', '-', '-', '-', '-', 'Lakmud', 'sudah', 'PR Banjarmangu', '2017-12-16', 'Ponpes Al Hidayah Banjarmangu', 'sudah', 'PKPT UNNES', '2019-12-16', 'UNNES', 'belum', '', '', '', 'Latin 2', 'tidak', NULL, 'a@b.com', '-', '-', '-', '-', 'Kota Semarang', '2021-12-16', 'Proyek_48_2.jpg', NULL, NULL, NULL, NULL, NULL),
(246, '33010002', 'Siti Aisyah', '0', '-', '1999-10-09', '-', NULL, NULL, '-', NULL, NULL, NULL, NULL, 39, 271, 998, 'anggota', '-', NULL, NULL, NULL, 'Tidak Ada', '', '', '', '', '', 'makesta', 'sudah', '-', '2021-12-09', '-', 'belum', '', '', '', 'belum', '', '', '', NULL, 'tidak', NULL, 'email@gmail.com', '', '', '', '', 'Kabupaten Cilacap', '2021-12-20', '2__Photo1.jpg', NULL, NULL, NULL, NULL, NULL),
(247, '11.25.00.00002', 'Ulin Nuha', '1', 'Magelang', '2000-10-10', '-', NULL, NULL, '-', NULL, NULL, NULL, NULL, 14, 559, 1007, 'PAC', 'Ponpes Islam Nusantara (SMP-MAPK Birrul Ummah) Tegalrejo', NULL, NULL, NULL, 'S1', '-', '-', '-', '-', '-', 'Lakmud', 'sudah', '-', '2021-12-01', '-', 'sudah', '-', '2021-12-13', '-', 'belum', '', '', '', 'Latin 1', 'tidak', NULL, 'ulinnuhategalrejo1@gmail.com', '-', '-', '-', '-', '14', '2021-12-20', 'IMG-20190701-WA0047.jpg', NULL, NULL, NULL, NULL, NULL),
(248, '11.07.02.00001', 'Marzuqi Rouf', '1', 'Demak', '2002-03-10', 'Kusno', NULL, NULL, 'Siti Mudrikah', NULL, NULL, NULL, NULL, 19, 270, 996, 'PP', 'Desa Klampoklor 03/02 Kecamatan Kebonagung Kabupaten Demak', NULL, NULL, NULL, 'S1', 'SD Negeri Klampoklor', 'MTs Yasua Pilangwetan', 'MA Negeri Demak', 'Universitas STEKOM', 'Pon-Pes As-Sujuudiyyah', 'Lakut', 'sudah', 'PAC IPNU IPPNU Demak Kota', '2021-12-01', 'MTs Tanwirud Dholam', 'sudah', 'PC IPNU IPPNU Kota Semarang', '2020-01-04', 'BBPLK Semarang', 'belum', '', '', '', 'Latin 1', 'tidak', NULL, 'marzuqiman1demak@gmail.com', '085945568715', '-', '-', '-', 'Kabupaten Demak', '2021-12-20', 'ppgh1.jpg', NULL, NULL, NULL, 'belum', NULL),
(249, '11.21.00.00001', 'Ahsan Maarif', '1', 'Banjarnegara', '2000-10-09', '-', NULL, NULL, '-', NULL, NULL, NULL, NULL, 34, 842, NULL, 'pkpt', '-', NULL, NULL, NULL, 'Tidak Ada', '', '', '', '', '', 'makesta', 'belum', '', '', '', 'belum', '', '', '', 'belum', '', '', '', NULL, 'tidak', NULL, '', '', '', '', '', 'Kabupaten Banjarnegara', '2021-12-20', '', NULL, NULL, NULL, NULL, NULL);

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
  `id_daftar_kegiatan` int(10) NOT NULL,
  `id_pimpinan` int(10) DEFAULT NULL,
  `kategori_data` varchar(10) DEFAULT NULL,
  `kategori_kegiatan` varchar(100) DEFAULT NULL,
  `nama_kegiatan` text NOT NULL,
  `hari` varchar(100) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `tempat` text NOT NULL,
  `keterangan` text DEFAULT NULL,
  `file_lpj` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_kegiatan`
--

INSERT INTO `daftar_kegiatan` (`id_daftar_kegiatan`, `id_pimpinan`, `kategori_data`, `kategori_kegiatan`, `nama_kegiatan`, `hari`, `tanggal`, `waktu`, `tempat`, `keterangan`, `file_lpj`) VALUES
(1, 18, '1', 'SCC', 'Diskusi Pelajar dan Mahasiswa1', 'Kamis', '2021-12-09', '02:00:07', 'UNNES', '-', '-'),
(2, 18, '1', 'DKW CBP', 'DIKLATMAD CBP', 'Kamis', '2021-12-09', '07:57:00', 'Akademi Militer ', 'ertet', ''),
(4, 18, '1', 'Jsksb', 'Kaderisasi / Latin 2 ', 'Hsjwj', '2021-12-20', '19:27:00', 'Uwjwj', 'Hwkwk', '');

-- --------------------------------------------------------

--
-- Table structure for table `download_peraturan`
--

CREATE TABLE `download_peraturan` (
  `id_peraturan` int(10) NOT NULL,
  `judul_file` varchar(100) NOT NULL,
  `kategori_data` varchar(10) DEFAULT NULL,
  `link_download` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `download_peraturan`
--

INSERT INTO `download_peraturan` (`id_peraturan`, `judul_file`, `kategori_data`, `link_download`, `keterangan`) VALUES
(1, 'PDPRT', '1', 'http://www.ipnu.or.id/wp-content/uploads/2019/05/Hasil-Kongres-XIX-1.pdf', '-'),
(4, 'Hasil Konbes dan Rakernas 2019', '1', 'https://www.ipnu.or.id/wp-content/uploads/2020/01/HASIL-KONBES-DAN-RAKERNAS-2019-1.pdf', '-');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_barang`
--

CREATE TABLE `inventaris_barang` (
  `id_inventaris_barang` int(10) NOT NULL,
  `id_pimpinan` int(10) DEFAULT NULL,
  `kategori_data` varchar(30) DEFAULT NULL,
  `index_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` varchar(100) DEFAULT NULL,
  `asal_barang` varchar(100) DEFAULT NULL,
  `harga_satuan` varchar(100) DEFAULT NULL,
  `tanggal_dipakai` date DEFAULT NULL,
  `tanggal_tidak_dipakai` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris_barang`
--

INSERT INTO `inventaris_barang` (`id_inventaris_barang`, `id_pimpinan`, `kategori_data`, `index_barang`, `nama_barang`, `jumlah`, `asal_barang`, `harga_satuan`, `tanggal_dipakai`, `tanggal_tidak_dipakai`, `keterangan`) VALUES
(1, 18, '1', '01-IB-PW', 'Komputer Server', '1', '-', '-', NULL, NULL, '-'),
(2, 18, '1', '02-PW-IP', 'Printer Epson L3001', '1', '-', '-', NULL, NULL, '-'),
(4, 18, '1', '03-IB-PW', 'Kipas angin kecil', '1', 'Hibah Juki', '300000', NULL, NULL, '-');

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
  `uraian_pemasukan` text DEFAULT NULL,
  `uraian_pengeluaran` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `id_pimpinan`, `kategori_data`, `masuk`, `keluar`, `tanggal_transaksi`, `uraian_pemasukan`, `uraian_pengeluaran`, `keterangan`) VALUES
(1, 18, '1', '24000000', '4000000', '2021-11-17', 'KAS', '-', 'Pembelian Laptop'),
(2, 18, '1', '500000', '400000', '2021-11-18', '-', '-', 'Beli Tinta Print');

--
-- Triggers `keuangan`
--
DELIMITER $$
CREATE TRIGGER `trig_k` BEFORE INSERT ON `keuangan` FOR EACH ROW set NEW.id_keuangan=CONCAT('K', FLOOR(1+(RAND()*655530)))
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
  `stempel` text NOT NULL,
  `masa_khidmat` varchar(50) DEFAULT NULL,
  `no_sp` varchar(50) DEFAULT NULL,
  `file_sp` text DEFAULT NULL,
  `tingkatan` varchar(20) DEFAULT NULL,
  `tgl_sp` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan_pimpinan`
--

INSERT INTO `pengaturan_pimpinan` (`id_pengaturan_pimpinan`, `id_pimpinan`, `kop_surat`, `nama_ketua`, `nia_ketua`, `ttd_ketua`, `nama_sekretaris`, `nia_sekretaris`, `ttd_sekretaris`, `stempel`, `masa_khidmat`, `no_sp`, `file_sp`, `tingkatan`, `tgl_sp`, `email`, `website`, `facebook`, `instagram`, `twitter`, `no_hp`) VALUES
(37, 18, 'kop-surat.PNG', 'Syaeful Kamaludin, S.Pd', '-', 'C.png', 'Fathurrochman Wahid, S.H', '-', 'no-image.jpg', 'no-image.jpg', '2019-2022', '379/PP/SP/XIX/7354/VII/2020', 'PEDOMAN_AKREDITASI_SM_2021_r4_121.pdf', 'PW', '2022-12-15', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 34, 'Untitled.jpg', 'Muhammad Sofyan', '-', 'ttd_rani.jpg', 'Saudi Sahri', '-', 'IMG_20211205_200418.jpg', 'stampel_ippnu2.png', '2020-2020', '-', 'Desain SIPADU Admin PW.pdf', 'PC', '0000-00-00', NULL, NULL, NULL, NULL, 'uhuh', '085'),
(40, 42, 'Mark-Zuckerberg-Facebook-CEO-quotes-300x212.jpg', 'ssss', '-', 'ttd_ain.png', '', NULL, 'RS-Islam-Kendal-180x180.jpg', 'stampel_ippnu3.png', '2019-2021', 'asfgsdsgg/sdgsg', '', 'PC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 39, '5055c4b6-bdc5-47f8-bb1c-e5f7f848cfc51.jpg', 'Avivi Zain', '3301161200001', 'Tanda_Tangan_Sjachroedin_ZP2.png', 'Rachmawati', '3301161200001', 'Tanda_Tangan_Sjachroedin_ZP3.png', 'stampel_ippnu4.png', NULL, NULL, NULL, 'PC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 266, '', '', NULL, '', '', NULL, '', '', NULL, NULL, NULL, 'PAC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 270, '', 'Sofiyul Umam', NULL, '', '', NULL, '', '', '-', NULL, NULL, 'PAC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 272, '', '', NULL, '', '', NULL, '', '', NULL, NULL, NULL, 'PAC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 267, '', '', NULL, '', '', NULL, '', '', NULL, NULL, NULL, 'PAC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 273, 'TOKO_KAYU_H__SAJAD_(2).png', '', NULL, '', '', NULL, '', '', '2021-2026', NULL, 'proposal KONCO SINAU.pdf', 'PAC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 264, 'skj-removebg-preview.png', '', NULL, '', '', NULL, '', '', 'cr', NULL, '', 'PAC', '2021-12-25', NULL, NULL, NULL, NULL, NULL, NULL),
(50, 21, '', '', NULL, '', '', NULL, '', '', NULL, NULL, NULL, 'PC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 19, '', 'Marzuqi', '11.07.02.00001', 'Tanda_Tangan_Sjachroedin_ZP.png', 'Rouf', '11.07.02.00001', 'Tanda_Tangan_Mick_Schumacher.png', 'SIPNU.png', '2018-2030', NULL, NULL, 'PC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 266, '', '', NULL, '', '', NULL, '', '', NULL, NULL, NULL, 'PAC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 38, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 19, '', '', NULL, '', '', NULL, '', '', NULL, NULL, NULL, 'PC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 271, '', '', NULL, '', '', NULL, '', '', NULL, NULL, NULL, 'PAC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 14, '', '', NULL, '', '', NULL, '', '', NULL, NULL, NULL, 'PC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 284, '', '', NULL, '', '', NULL, '', '', NULL, NULL, NULL, 'PAC', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(2, 'PC', '1', '08', 'Kota Semarang'),
(3, 'PC', '1', '11', 'Kabupaten Kendal'),
(4, 'PC', '1', '36', 'Lasem'),
(5, 'PC', '1', '23', 'Kabupaten Cilacap'),
(6, 'PC', '1', '04', 'Kabupaten Jepara'),
(7, 'PC', '1', '22', 'Kabupaten Purbalingga'),
(8, 'PC', '1', '05', 'Kabupaten Blora'),
(9, 'PC', '1', '09', 'Kabupaten Semarang'),
(10, 'PC', '1', '30', 'Kabupaten Sragen'),
(11, 'PC', '1', '35', 'Kabupaten Sukoharjo'),
(12, 'PC', '1', '29', 'Kabupaten Klaten'),
(13, 'PC', '1', '24', 'Kota Magelang'),
(14, 'PC', '1', '25', 'Kabupaten Magelang'),
(15, 'PC', '1', '03', 'Kabupaten Pati'),
(16, 'PC', '1', '33', 'Kabupaten Boyolali'),
(17, 'PC', '1', '17', 'Kota Tegal'),
(18, 'PW', '1', '11', 'Jawa Tengah'),
(19, 'PC', '1', '07', 'Kabupaten Demak'),
(20, 'PC', '1', '12', 'Kabupaten Batang'),
(21, 'PC', '1', '20', 'Kabupaten Banyumas'),
(22, 'PC', '1', '32', 'Kabupaten Karanganyar'),
(23, 'PC', '1', '31', 'Kabupaten Wonogiri'),
(24, 'PC', '1', '18', 'Kabupaten Brebes'),
(25, 'PC', '1', '15', 'Kabupaten Pemalang'),
(26, 'PC', '1', '01', 'Kabupaten Rembang'),
(27, 'PC', '1', '28', 'Kabupaten Purworejo'),
(28, 'PC', '1', '26', 'Kabupaten Wonosobo'),
(29, 'PC', '1', '02', 'Kabupaten Kudus'),
(30, 'PC', '1', '06', 'Kabupaten Grobogan'),
(31, 'PC', '1', '27', 'Kabupaten Kebumen'),
(32, 'PC', '1', '19', 'Kabupaten Temanggung'),
(33, 'PC', '1', '16', 'Kabupaten Tegal'),
(34, 'PC', '1', '21', 'Kabupaten Banjarnegara'),
(35, 'PC', '1', '10', 'Kota Salatiga'),
(36, 'PC', '1', '14', 'Kota Pekalongan'),
(37, 'PC', '1', '13', 'Kabupaten Pekalongan'),
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
(272, 34, 'PAC', '1', '09', 'Pagedongan'),
(273, 42, 'PAC', '0', '01', 'Banjarmangu'),
(274, 42, 'PAC', '0', '02', 'alakadabra'),
(275, 34, 'PAC', '1', '07', 'Madukara'),
(276, 34, 'PAC', '1', '08', 'Mandiraja'),
(277, 34, 'PAC', '1', '10', 'Pagentan'),
(278, 34, 'PAC', '1', '11', 'Pandanarum'),
(279, 34, 'PAC', '1', '12', 'Pejawaran'),
(280, 34, 'PAC', '1', '13', 'Punggelan'),
(281, 34, 'PAC', '1', '14', 'Purwanegara'),
(282, 34, 'PAC', '1', '15', 'Purworejo Klampok'),
(283, 34, 'PAC', '1', '16', 'Rakit'),
(284, 34, 'PAC', '1', '17', 'Sigaluh'),
(285, 34, 'PAC', '1', '18', 'Susukan'),
(286, 34, 'PAC', '1', '19', 'Wanadadi'),
(287, 34, 'PAC', '1', '20', 'Wanayasa'),
(288, 21, 'PAC', '1', '01', 'Ajibarang'),
(289, 21, 'PAC', '1', '02', 'Banyumas'),
(290, 21, 'PAC', '1', '03', 'Baturaden'),
(291, 21, 'PAC', '1', '04', 'Cilongok'),
(292, 21, 'PAC', '1', '05', 'Gumelar'),
(293, 21, 'PAC', '1', '06', 'Kalibagor'),
(294, 21, 'PAC', '1', '07', 'Karanglewas'),
(295, 21, 'PAC', '1', '08', 'Kebasen'),
(296, 21, 'PAC', '1', '09', 'Kedung Banteng'),
(297, 21, 'PAC', '1', '10', 'Kembaran'),
(298, 21, 'PAC', '1', '11', 'Kemranjen'),
(299, 21, 'PAC', '1', '12', 'Jatilawang'),
(300, 21, 'PAC', '1', '13', 'Lumbir'),
(301, 21, 'PAC', '1', '14', 'Patikraja'),
(302, 21, 'PAC', '1', '15', 'Pekuncen'),
(303, 21, 'PAC', '1', '16', 'Purwojati'),
(304, 21, 'PAC', '1', '17', 'Purwokerto Barat'),
(305, 21, 'PAC', '1', '18', 'Purwokerto Selatan'),
(306, 21, 'PAC', '1', '19', 'Purwokerto Timur'),
(307, 21, 'PAC', '1', '20', 'Purwokerto Utara'),
(308, 21, 'PAC', '1', '21', 'Rawalo'),
(309, 21, 'PAC', '1', '22', 'Sokaraja'),
(310, 21, 'PAC', '1', '23', 'Somagede'),
(311, 21, 'PAC', '1', '24', 'Sumbang'),
(312, 21, 'PAC', '1', '25', 'Sumpiuh'),
(313, 21, 'PAC', '1', '26', 'Tambak'),
(314, 21, 'PAC', '1', '27', 'Wangon'),
(315, 20, 'PAC', '1', '01', 'Bandar'),
(316, 20, 'PAC', '1', '02', 'Banyuputih'),
(317, 20, 'PAC', '1', '03', 'Batang'),
(318, 20, 'PAC', '1', '04', 'Bawang'),
(319, 20, 'PAC', '1', '05', 'Blado'),
(320, 20, 'PAC', '1', '06', 'Gringsing'),
(321, 20, 'PAC', '1', '07', 'Kandeman'),
(322, 20, 'PAC', '1', '08', 'Limpung'),
(323, 20, 'PAC', '1', '09', 'Pecalungan'),
(324, 20, 'PAC', '1', '10', 'Reban'),
(325, 20, 'PAC', '1', '11', 'Subah'),
(326, 20, 'PAC', '1', '12', 'Tersono'),
(327, 20, 'PAC', '1', '13', 'Tulis'),
(328, 20, 'PAC', '1', '14', 'Warungasem'),
(329, 20, 'PAC', '1', '15', 'Wonotunggal'),
(330, 16, 'PAC', '1', '01', 'Ampel'),
(331, 16, 'PAC', '1', '02', 'Andong'),
(332, 16, 'PAC', '1', '03', 'Banyudono'),
(333, 16, 'PAC', '1', '04', 'Boyolali'),
(334, 16, 'PAC', '1', '05', 'Cepogo'),
(335, 16, 'PAC', '1', '06', 'Gladagsari'),
(336, 16, 'PAC', '1', '07', 'Juwangi'),
(337, 16, 'PAC', '1', '08', 'Karanggede'),
(338, 16, 'PAC', '1', '09', 'Kemusu'),
(339, 16, 'PAC', '1', '10', 'Klego'),
(340, 16, 'PAC', '1', '11', 'Mojosongo'),
(341, 16, 'PAC', '1', '12', 'Musuk'),
(342, 16, 'PAC', '1', '13', 'Ngemplak'),
(343, 16, 'PAC', '1', '14', 'Nogosari'),
(344, 16, 'PAC', '1', '15', 'Sambi'),
(345, 16, 'PAC', '1', '16', 'Sawit'),
(346, 16, 'PAC', '1', '17', 'Selo'),
(347, 16, 'PAC', '1', '18', 'Simo'),
(348, 16, 'PAC', '1', '19', 'Tamansari'),
(349, 16, 'PAC', '1', '20', 'Teras'),
(350, 16, 'PAC', '1', '21', 'Wonosamodro	'),
(351, 16, 'PAC', '1', '22', 'Wonosegoro'),
(352, 24, 'PAC', '1', '01', 'Banjarharjo'),
(353, 24, 'PAC', '1', '02', 'Bantarkawung'),
(354, 24, 'PAC', '1', '03', 'Brebes'),
(355, 24, 'PAC', '1', '04', 'Bulakamba'),
(356, 24, 'PAC', '1', '05', 'Bumiayu'),
(357, 24, 'PAC', '1', '06', 'Jatibarang'),
(358, 24, 'PAC', '1', '07', 'Kersana'),
(359, 24, 'PAC', '1', '08', 'Ketanggungan'),
(360, 24, 'PAC', '1', '09', 'Larangan'),
(361, 24, 'PAC', '1', '10', 'Losari'),
(362, 24, 'PAC', '1', '11', 'Paguyangan'),
(363, 24, 'PAC', '1', '12', 'Salem'),
(364, 24, 'PAC', '1', '13', 'Sirampog'),
(365, 24, 'PAC', '1', '14', 'Songgom'),
(366, 24, 'PAC', '1', '15', 'Tanjung'),
(367, 24, 'PAC', '1', '16', 'Tonjong'),
(368, 24, 'PAC', '1', '17', 'Wanasari'),
(369, 5, 'PAC', '1', '01', 'Adipala'),
(370, 5, 'PAC', '1', '02', 'Bantarsari'),
(371, 5, 'PAC', '1', '03', 'Binangun'),
(372, 5, 'PAC', '1', '04', 'Cilacap Selatan'),
(373, 5, 'PAC', '1', '05', 'Cilacap Tengah'),
(374, 5, 'PAC', '1', '06', 'Cilacap Utara'),
(375, 5, 'PAC', '1', '07', 'Cimanggu'),
(376, 5, 'PAC', '1', '08', 'Cipari'),
(377, 5, 'PAC', '1', '09', 'Dayeuhluhur'),
(378, 5, 'PAC', '1', '10', 'Gandrungmangu'),
(379, 5, 'PAC', '1', '11', 'Jeruklegi'),
(380, 5, 'PAC', '1', '12', 'Kampung Laut'),
(381, 5, 'PAC', '1', '13', 'Karangpucung'),
(382, 5, 'PAC', '1', '14', 'Kawunganten'),
(383, 5, 'PAC', '1', '15', 'Kedungreja'),
(384, 5, 'PAC', '1', '16', 'Kesugihan'),
(385, 5, 'PAC', '1', '17', 'Kroya'),
(386, 5, 'PAC', '1', '18', 'Majenang'),
(387, 5, 'PAC', '1', '19', 'Maos'),
(388, 5, 'PAC', '1', '20', 'Nusawungu'),
(389, 5, 'PAC', '1', '21', 'Patimuan'),
(390, 5, 'PAC', '1', '22', 'Sampang'),
(391, 5, 'PAC', '1', '23', 'Sidareja'),
(392, 5, 'PAC', '1', '24', 'Wanareja'),
(393, 19, 'PAC', '1', '01', 'Bonang'),
(394, 19, 'PAC', '1', '02', 'Demak'),
(395, 19, 'PAC', '1', '03', 'Dempet'),
(396, 19, 'PAC', '1', '04', 'Gajah'),
(397, 19, 'PAC', '1', '05', 'Guntur'),
(398, 19, 'PAC', '1', '06', 'Karanganyar'),
(399, 19, 'PAC', '1', '07', 'Karangawen'),
(400, 19, 'PAC', '1', '08', 'Karangtengah'),
(401, 19, 'PAC', '1', '10', 'Mijen'),
(402, 19, 'PAC', '1', '11', 'Mranggen'),
(403, 19, 'PAC', '1', '12', 'Sayung'),
(404, 19, 'PAC', '1', '13', 'Wedung'),
(405, 19, 'PAC', '1', '14', 'Wonosalam'),
(406, 30, 'PAC', '1', '01', 'Brati'),
(407, 30, 'PAC', '1', '02', 'Gabus'),
(408, 30, 'PAC', '1', '03', 'Geyer'),
(409, 30, 'PAC', '1', '04', 'Godong'),
(410, 30, 'PAC', '1', '05', 'Grobogan'),
(411, 30, 'PAC', '1', '06', 'Gubug'),
(412, 30, 'PAC', '1', '07', 'Karangrayung'),
(413, 30, 'PAC', '1', '08', 'Kedungjati'),
(414, 30, 'PAC', '1', '09', 'Klambu'),
(415, 30, 'PAC', '1', '10', 'Kradenan'),
(416, 30, 'PAC', '1', '11', 'Ngaringan'),
(417, 30, 'PAC', '1', '12', 'Penawangan'),
(418, 30, 'PAC', '1', '13', 'Pulokulon'),
(419, 30, 'PAC', '1', '14', 'Purwodadi'),
(420, 30, 'PAC', '1', '15', 'Tanggungharjo'),
(421, 30, 'PAC', '1', '16', 'Tawangharjo'),
(422, 30, 'PAC', '1', '17', 'Tegowanu'),
(423, 30, 'PAC', '1', '18', 'Toroh'),
(424, 30, 'PAC', '1', '19', 'Wirosari'),
(425, 6, 'PAC', '1', '01', 'Bangsri'),
(426, 6, 'PAC', '1', '02', 'Batealit'),
(427, 6, 'PAC', '1', '03', 'Donorojo'),
(428, 6, 'PAC', '1', '04', 'Jepara'),
(429, 6, 'PAC', '1', '05', 'Kalinyamatan'),
(430, 6, 'PAC', '1', '06', 'Karimunjawa'),
(431, 6, 'PAC', '1', '07', 'Kedung'),
(432, 6, 'PAC', '1', '08', 'Keling'),
(433, 6, 'PAC', '1', '09', 'Kembang'),
(434, 6, 'PAC', '1', '10', 'Mayong'),
(435, 6, 'PAC', '1', '11', 'Mlonggo'),
(436, 6, 'PAC', '1', '12', 'Nalumsari'),
(437, 6, 'PAC', '1', '13', 'Pakis Aji'),
(438, 6, 'PAC', '1', '14', 'Pecangaan'),
(439, 6, 'PAC', '1', '15', 'Tahunan'),
(440, 6, 'PAC', '1', '16', 'Welahan'),
(441, 22, 'PAC', '1', '01', 'Colomadu'),
(442, 22, 'PAC', '1', '02', 'Gondangrejo'),
(443, 22, 'PAC', '1', '03', 'Jaten'),
(444, 22, 'PAC', '1', '04', 'Jatipuro'),
(445, 22, 'PAC', '1', '05', 'Jatiyoso'),
(446, 22, 'PAC', '1', '06', 'Jenawi'),
(447, 22, 'PAC', '1', '07', 'Jumantono'),
(448, 22, 'PAC', '1', '08', 'Jumapolo'),
(449, 22, 'PAC', '1', '09', 'Karanganyar'),
(450, 22, 'PAC', '1', '10', 'Karangpandan'),
(451, 22, 'PAC', '1', '11', 'Kebakkramat'),
(452, 22, 'PAC', '1', '12', 'Kerjo'),
(453, 22, 'PAC', '1', '13', 'Matesih'),
(454, 22, 'PAC', '1', '14', 'Mojogedang'),
(455, 22, 'PAC', '1', '15', 'Ngargoyoso'),
(456, 22, 'PAC', '1', '16', 'Tasikmadu'),
(457, 22, 'PAC', '1', '17', 'Tawangmangu'),
(458, 31, 'PAC', '1', '01', 'Adimulyo'),
(459, 31, 'PAC', '1', '02', 'Alian'),
(460, 31, 'PAC', '1', '03', 'Ambal'),
(461, 31, 'PAC', '1', '04', 'Ayah'),
(462, 31, 'PAC', '1', '05', 'Bonorowo'),
(463, 31, 'PAC', '1', '06', 'Buayan'),
(464, 31, 'PAC', '1', '07', 'Buluspesantren'),
(465, 31, 'PAC', '1', '08', 'Gombong'),
(466, 31, 'PAC', '1', '09', 'Gombong'),
(467, 31, 'PAC', '1', '10', 'Karanganyar'),
(468, 31, 'PAC', '1', '11', 'Karanganyar'),
(469, 31, 'PAC', '1', '12', 'Karanggayam'),
(470, 31, 'PAC', '1', '13', 'Karangsambung'),
(471, 31, 'PAC', '1', '14', 'Kebumen'),
(472, 31, 'PAC', '1', '15', 'Klirong'),
(473, 31, 'PAC', '1', '16', 'Kutowinangun'),
(474, 31, 'PAC', '1', '17', 'Kuwarasan'),
(475, 31, 'PAC', '1', '18', 'Mirit'),
(476, 31, 'PAC', '1', '19', 'Padureso'),
(477, 31, 'PAC', '1', '20', 'Pejagoan'),
(478, 31, 'PAC', '1', '21', 'Petanahan'),
(479, 31, 'PAC', '1', '22', 'Prembun'),
(480, 31, 'PAC', '1', '23', 'Poncowarno'),
(481, 31, 'PAC', '1', '24', 'Puring'),
(482, 31, 'PAC', '1', '25', 'Rowokele'),
(483, 31, 'PAC', '1', '26', 'Sadang'),
(484, 31, 'PAC', '1', '27', 'Sempor'),
(485, 31, 'PAC', '1', '28', 'Sruweng'),
(486, 3, 'PAC', '1', '01', 'Boja'),
(487, 3, 'PAC', '1', '02', 'Brangsong'),
(488, 3, 'PAC', '1', '03', 'Cepiring'),
(489, 3, 'PAC', '1', '04', 'Gemuh'),
(490, 3, 'PAC', '1', '05', 'Kaliwungu'),
(491, 3, 'PAC', '1', '06', 'Kaliwungu Selatan'),
(492, 3, 'PAC', '1', '07', 'Kangkung'),
(493, 3, 'PAC', '1', '08', 'Kendal'),
(494, 3, 'PAC', '1', '09', 'Limbangan'),
(495, 3, 'PAC', '1', '10', 'Ngampel'),
(496, 3, 'PAC', '1', '11', 'Pageruyung'),
(497, 3, 'PAC', '1', '12', 'Patean'),
(498, 3, 'PAC', '1', '13', 'Patebon'),
(499, 3, 'PAC', '1', '14', 'Pegandon'),
(500, 3, 'PAC', '1', '15', 'Plantungan'),
(501, 3, 'PAC', '1', '16', 'Ringinarum'),
(502, 3, 'PAC', '1', '17', 'Rowosari'),
(503, 3, 'PAC', '1', '18', 'Singorojo'),
(504, 3, 'PAC', '1', '19', 'Sukorejo'),
(505, 3, 'PAC', '1', '20', 'Weleri'),
(506, 12, 'PAC', '1', '01', 'Bayat'),
(507, 12, 'PAC', '1', '02', 'Cawas'),
(508, 12, 'PAC', '1', '03', 'Ceper'),
(509, 12, 'PAC', '1', '04', 'Delanggu'),
(510, 12, 'PAC', '1', '05', 'Gantiwarno'),
(511, 12, 'PAC', '1', '06', 'Jatinom'),
(512, 12, 'PAC', '1', '07', 'Jogonalan'),
(513, 12, 'PAC', '1', '08', 'Juwiring'),
(514, 12, 'PAC', '1', '09', 'Kalikotes'),
(515, 12, 'PAC', '1', '10', 'Karanganom'),
(516, 12, 'PAC', '1', '11', 'Karangdowo'),
(517, 12, 'PAC', '1', '12', 'Karangnongko'),
(518, 12, 'PAC', '1', '13', 'Kebonarum'),
(519, 12, 'PAC', '1', '14', 'Kemalang'),
(520, 12, 'PAC', '1', '15', 'Klaten Selatan'),
(521, 12, 'PAC', '1', '16', 'Klaten Tengah'),
(522, 12, 'PAC', '1', '17', 'Klaten Utara'),
(523, 12, 'PAC', '1', '18', 'Manisrenggo'),
(524, 12, 'PAC', '1', '19', 'Ngawen'),
(525, 12, 'PAC', '1', '20', 'Pedan'),
(526, 12, 'PAC', '1', '21', 'Polanharjo'),
(527, 12, 'PAC', '1', '22', 'Prambanan'),
(528, 12, 'PAC', '1', '23', 'Trucuk'),
(529, 12, 'PAC', '1', '24', 'Tulung'),
(530, 12, 'PAC', '1', '25', 'Wedi'),
(531, 12, 'PAC', '1', '26', 'Wonosari'),
(532, 29, 'PAC', '1', '01', 'Bae'),
(533, 29, 'PAC', '1', '02', 'Dawe'),
(534, 29, 'PAC', '1', '03', 'Gebog'),
(535, 29, 'PAC', '1', '04', 'Jati'),
(536, 29, 'PAC', '1', '05', 'Jekulo'),
(537, 29, 'PAC', '1', '06', 'Kaliwungu'),
(538, 29, 'PAC', '1', '07', 'Kudus'),
(539, 29, 'PAC', '1', '08', 'Mejobo'),
(540, 29, 'PAC', '1', '09', 'Undaan'),
(541, 14, 'PAC', '1', '01', 'Bandongan'),
(542, 14, 'PAC', '1', '02', 'Borobudur'),
(543, 14, 'PAC', '1', '03', 'Candimulyo'),
(544, 14, 'PAC', '1', '04', 'Dukun'),
(545, 14, 'PAC', '1', '05', 'Grabag'),
(546, 14, 'PAC', '1', '06', 'Kajoran'),
(547, 14, 'PAC', '1', '07', 'Kaliangkrik'),
(548, 14, 'PAC', '1', '08', 'Mertoyudan'),
(549, 14, 'PAC', '1', '09', 'Mungkid'),
(550, 14, 'PAC', '1', '10', 'Muntilan'),
(551, 14, 'PAC', '1', '11', 'Ngablak'),
(552, 14, 'PAC', '1', '12', 'Ngluwar'),
(553, 14, 'PAC', '1', '13', 'Pakis'),
(554, 14, 'PAC', '1', '14', 'Salam'),
(555, 14, 'PAC', '1', '15', 'Salaman'),
(556, 14, 'PAC', '1', '16', 'Sawangan'),
(557, 14, 'PAC', '1', '17', 'Secang'),
(558, 14, 'PAC', '1', '18', 'Srumbung'),
(559, 14, 'PAC', '1', '19', 'Tegalrejo'),
(560, 14, 'PAC', '1', '20', 'Tempuran'),
(561, 14, 'PAC', '1', '21', 'Windusari'),
(562, 15, 'PAC', '1', '01', 'Batangan'),
(563, 15, 'PAC', '1', '02', 'Cluwak'),
(564, 15, 'PAC', '1', '03', 'Dukuhseti'),
(565, 15, 'PAC', '1', '04', 'Gabus'),
(566, 15, 'PAC', '1', '05', 'Gembong'),
(567, 15, 'PAC', '1', '06', 'Gunungwungkal'),
(568, 15, 'PAC', '1', '07', 'Jaken'),
(569, 15, 'PAC', '1', '08', 'Jakenan'),
(570, 15, 'PAC', '1', '09', 'Juwana'),
(571, 15, 'PAC', '1', '10', 'Kayen'),
(572, 15, 'PAC', '1', '11', 'Margorejo'),
(573, 15, 'PAC', '1', '12', 'Margoyoso'),
(574, 15, 'PAC', '1', '13', 'Pati'),
(575, 15, 'PAC', '1', '14', 'Pucakwangi'),
(576, 15, 'PAC', '1', '15', 'Sukolilo'),
(577, 15, 'PAC', '1', '16', 'Tambakromo'),
(578, 15, 'PAC', '1', '17', 'Tayu'),
(579, 15, 'PAC', '1', '18', 'Tlogowungu'),
(580, 15, 'PAC', '1', '19', 'Trangkil'),
(581, 15, 'PAC', '1', '20', 'Wedarijaksa'),
(582, 15, 'PAC', '1', '21', 'Winong'),
(583, 37, 'PAC', '1', '01', 'Bojong'),
(584, 37, 'PAC', '1', '02', 'Buaran'),
(585, 37, 'PAC', '1', '03', 'Doro'),
(586, 37, 'PAC', '1', '04', 'Kajen'),
(587, 37, 'PAC', '1', '05', 'Kandangserang'),
(588, 37, 'PAC', '1', '06', 'Karanganyar'),
(589, 37, 'PAC', '1', '07', 'Karangdadap'),
(590, 37, 'PAC', '1', '08', 'Kedungwuni'),
(591, 37, 'PAC', '1', '09', 'Kesesi'),
(592, 37, 'PAC', '1', '10', 'Lebakbarang'),
(593, 37, 'PAC', '1', '11', 'Paninggaran'),
(594, 37, 'PAC', '1', '12', 'Petungkriyono'),
(595, 37, 'PAC', '1', '13', 'Siwalan'),
(596, 37, 'PAC', '1', '14', 'Sragi'),
(597, 37, 'PAC', '1', '15', 'Talun'),
(598, 37, 'PAC', '1', '16', 'Tirto'),
(599, 37, 'PAC', '1', '17', 'Wiradesa'),
(600, 37, 'PAC', '1', '18', 'Wonokerto'),
(601, 37, 'PAC', '1', '19', 'Wonopringgo'),
(602, 25, 'PAC', '1', '01', 'Ampelgading'),
(603, 25, 'PAC', '1', '02', 'Bantarbolang'),
(604, 25, 'PAC', '1', '03', 'Belik'),
(605, 25, 'PAC', '1', '04', 'Bodeh'),
(606, 25, 'PAC', '1', '05', 'Comal'),
(607, 25, 'PAC', '1', '06', 'Moga'),
(608, 25, 'PAC', '1', '07', 'Pemalang'),
(609, 25, 'PAC', '1', '08', 'Petarukan'),
(610, 25, 'PAC', '1', '09', 'Pulosari'),
(611, 25, 'PAC', '1', '10', 'Randudongkal'),
(612, 25, 'PAC', '1', '11', 'Taman'),
(613, 25, 'PAC', '1', '12', 'Ulujami'),
(614, 25, 'PAC', '1', '13', 'Warungpring'),
(615, 25, 'PAC', '1', '14', 'Watukumpul'),
(616, 7, 'PAC', '1', '01', 'Bobotsari'),
(617, 7, 'PAC', '1', '02', 'Bojongsari'),
(618, 7, 'PAC', '1', '03', 'Bukateja'),
(619, 7, 'PAC', '1', '04', 'Kaligondang'),
(620, 7, 'PAC', '1', '05', 'Kalimanah'),
(621, 7, 'PAC', '1', '06', 'Karanganyar'),
(622, 7, 'PAC', '1', '07', 'Karangjambu'),
(623, 7, 'PAC', '1', '08', 'Karangmoncol'),
(624, 7, 'PAC', '1', '09', 'Karangreja'),
(625, 7, 'PAC', '1', '10', 'Kejobong'),
(626, 7, 'PAC', '1', '11', 'Kemangkon'),
(627, 7, 'PAC', '1', '12', 'Kertanegara'),
(628, 7, 'PAC', '1', '13', 'Kutasari'),
(629, 7, 'PAC', '1', '14', 'Mrebet'),
(630, 7, 'PAC', '1', '15', 'Padamara'),
(631, 7, 'PAC', '1', '16', 'Pengadegan'),
(632, 7, 'PAC', '1', '17', 'Purbalingga'),
(633, 7, 'PAC', '1', '18', 'Rembang'),
(634, 27, 'PAC', '1', '01', 'Bagelen'),
(635, 27, 'PAC', '1', '02', 'Banyuurip'),
(636, 27, 'PAC', '1', '03', 'Bayan'),
(637, 27, 'PAC', '1', '04', 'Bener'),
(638, 27, 'PAC', '1', '05', 'Bruno'),
(639, 27, 'PAC', '1', '06', 'Butuh'),
(640, 27, 'PAC', '1', '07', 'Gebang'),
(641, 27, 'PAC', '1', '08', 'Grabag'),
(642, 27, 'PAC', '1', '09', 'Kaligesing'),
(643, 27, 'PAC', '1', '10', 'Kemiri'),
(644, 27, 'PAC', '1', '11', 'Kutoarjo'),
(645, 27, 'PAC', '1', '12', 'Loano'),
(646, 27, 'PAC', '1', '13', 'Ngombol'),
(647, 27, 'PAC', '1', '14', 'Pituruh'),
(648, 27, 'PAC', '1', '15', 'Purwodadi'),
(649, 27, 'PAC', '1', '16', 'Purworejo'),
(650, 8, 'PAC', '1', '01', 'Banjarejo'),
(651, 8, 'PAC', '1', '02', 'Blora'),
(652, 8, 'PAC', '1', '03', 'Bogorejo'),
(653, 8, 'PAC', '1', '04', 'Cepu'),
(654, 8, 'PAC', '1', '05', 'Japah'),
(655, 8, 'PAC', '1', '06', 'Jati'),
(656, 8, 'PAC', '1', '07', 'Jepon'),
(657, 8, 'PAC', '1', '08', 'Jiken'),
(658, 8, 'PAC', '1', '09', 'Kedungtuban'),
(659, 8, 'PAC', '1', '10', 'Kradenan'),
(660, 8, 'PAC', '1', '11', 'Kunduran'),
(661, 8, 'PAC', '1', '12', 'Ngawen'),
(662, 8, 'PAC', '1', '13', 'Randublatung'),
(663, 8, 'PAC', '1', '14', 'Sambong'),
(664, 8, 'PAC', '1', '15', 'Todanan'),
(665, 8, 'PAC', '1', '16', 'Tunjungan'),
(666, 9, 'PAC', '1', '01', 'Ambarawa'),
(667, 9, 'PAC', '1', '02', 'Bancak'),
(668, 9, 'PAC', '1', '03', 'Bandungan'),
(669, 9, 'PAC', '1', '04', 'Banyubiru'),
(670, 9, 'PAC', '1', '05', 'Bawen'),
(671, 9, 'PAC', '1', '06', 'Bergas'),
(672, 9, 'PAC', '1', '07', 'Bringin'),
(673, 9, 'PAC', '1', '08', 'Getasan'),
(674, 9, 'PAC', '1', '09', 'Jambu'),
(675, 9, 'PAC', '1', '10', 'Kaliwungu'),
(676, 9, 'PAC', '1', '11', 'Pabelan'),
(677, 9, 'PAC', '1', '12', 'Pringapus'),
(678, 9, 'PAC', '1', '13', 'Sumowono'),
(679, 9, 'PAC', '1', '14', 'Suruh'),
(680, 9, 'PAC', '1', '15', 'Susukan'),
(681, 9, 'PAC', '1', '16', 'Tengaran'),
(682, 9, 'PAC', '1', '17', 'Tuntang'),
(683, 9, 'PAC', '1', '18', 'Ungaran Barat'),
(684, 9, 'PAC', '1', '19', 'Ungaran Timur'),
(685, 10, 'PAC', '1', '01', 'Gemolong'),
(686, 10, 'PAC', '1', '02', 'Gesi'),
(687, 10, 'PAC', '1', '03', 'Gondang'),
(688, 10, 'PAC', '1', '04', 'Jenar'),
(689, 10, 'PAC', '1', '05', 'Kalijambe'),
(690, 10, 'PAC', '1', '06', 'Karangmalang'),
(691, 10, 'PAC', '1', '07', 'Kedawung'),
(692, 10, 'PAC', '1', '08', 'Masaran'),
(693, 10, 'PAC', '1', '09', 'Miri'),
(694, 10, 'PAC', '1', '10', 'Mondokan'),
(695, 10, 'PAC', '1', '11', 'Ngrampal'),
(696, 10, 'PAC', '1', '12', 'Plupuh'),
(697, 10, 'PAC', '1', '13', 'Sambirejo'),
(698, 10, 'PAC', '1', '14', 'Sambungmacan'),
(699, 10, 'PAC', '1', '15', 'Sidoharjo'),
(700, 10, 'PAC', '1', '16', 'Sragen'),
(701, 10, 'PAC', '1', '17', 'Sukodono'),
(702, 10, 'PAC', '1', '18', 'Sumberlawang'),
(703, 10, 'PAC', '1', '19', 'Tangen'),
(704, 10, 'PAC', '1', '20', 'Tanon'),
(705, 11, 'PAC', '1', '01', 'Baki'),
(706, 11, 'PAC', '1', '02', 'Bendosari'),
(707, 11, 'PAC', '1', '03', 'Bulu'),
(708, 11, 'PAC', '1', '04', 'Gatak'),
(709, 11, 'PAC', '1', '05', 'Grogol'),
(710, 11, 'PAC', '1', '06', 'Kartasura'),
(711, 11, 'PAC', '1', '07', 'Mojolaban'),
(712, 11, 'PAC', '1', '08', 'Nguter'),
(713, 11, 'PAC', '1', '09', 'Polokarto'),
(714, 11, 'PAC', '1', '10', 'Sukoharjo'),
(715, 11, 'PAC', '1', '11', 'Tawangsari'),
(716, 11, 'PAC', '1', '12', 'Weru'),
(717, 33, 'PAC', '1', '01', 'Adiwerna'),
(718, 33, 'PAC', '1', '02', 'Balapulang'),
(719, 33, 'PAC', '1', '03', 'Bojong'),
(720, 33, 'PAC', '1', '04', 'Bumijawa'),
(721, 33, 'PAC', '1', '05', 'Dukuhturi'),
(722, 33, 'PAC', '1', '06', 'Dukuhwaru'),
(723, 33, 'PAC', '1', '07', 'Jatinegara'),
(724, 33, 'PAC', '1', '08', 'Kedungbanteng'),
(725, 33, 'PAC', '1', '09', 'Kramat'),
(726, 33, 'PAC', '1', '10', 'Lebaksiu'),
(727, 33, 'PAC', '1', '11', 'Margasari'),
(728, 33, 'PAC', '1', '12', 'Pagerbarang'),
(729, 33, 'PAC', '1', '13', 'Pangkah'),
(730, 33, 'PAC', '1', '14', 'Slawi'),
(731, 33, 'PAC', '1', '15', 'Suradadi'),
(732, 33, 'PAC', '1', '16', 'Talang'),
(733, 33, 'PAC', '1', '17', 'Tarub'),
(734, 33, 'PAC', '1', '18', 'Warureja'),
(735, 32, 'PAC', '1', '01', 'Bansari'),
(736, 32, 'PAC', '1', '02', 'Bejen'),
(737, 32, 'PAC', '1', '03', 'Bulu'),
(738, 32, 'PAC', '1', '04', 'Candiroto'),
(739, 32, 'PAC', '1', '05', 'Gemawang'),
(740, 32, 'PAC', '1', '06', 'Jumo'),
(741, 32, 'PAC', '1', '07', 'Kaloran'),
(742, 32, 'PAC', '1', '08', 'Kandangan'),
(743, 32, 'PAC', '1', '09', 'Kedu'),
(744, 32, 'PAC', '1', '10', 'Kledung'),
(745, 32, 'PAC', '1', '11', 'Kranggan'),
(746, 32, 'PAC', '1', '12', 'Ngadirejo'),
(747, 32, 'PAC', '1', '13', 'Parakan'),
(748, 32, 'PAC', '1', '14', 'Pringsurat'),
(749, 32, 'PAC', '1', '15', 'Selopampang'),
(750, 32, 'PAC', '1', '16', 'Temanggung'),
(751, 32, 'PAC', '1', '17', 'Tembarak'),
(752, 32, 'PAC', '1', '18', 'Tlogomulyo'),
(753, 32, 'PAC', '1', '19', 'Tretep'),
(754, 32, 'PAC', '1', '20', 'Wonoboyo'),
(755, 23, 'PAC', '1', '01', 'Baturetno'),
(756, 23, 'PAC', '1', '02', 'Batuwarno'),
(757, 23, 'PAC', '1', '03', 'Bulukerto'),
(758, 23, 'PAC', '1', '04', 'Eromoko'),
(759, 23, 'PAC', '1', '05', 'Girimarto'),
(760, 23, 'PAC', '1', '06', 'Giritontro'),
(761, 23, 'PAC', '1', '07', 'Giriwoyo'),
(762, 23, 'PAC', '1', '08', 'Jatipurno'),
(763, 23, 'PAC', '1', '09', 'Jatiroto'),
(764, 23, 'PAC', '1', '10', 'Jatisrono'),
(765, 23, 'PAC', '1', '11', 'Karangtengah'),
(766, 23, 'PAC', '1', '12', 'Kismantoro'),
(767, 23, 'PAC', '1', '13', 'Manyaran'),
(768, 23, 'PAC', '1', '14', 'Ngadirojo'),
(769, 23, 'PAC', '1', '15', 'Nguntoronadi'),
(770, 23, 'PAC', '1', '16', 'Paranggupito'),
(771, 23, 'PAC', '1', '17', 'Pracimantoro'),
(772, 23, 'PAC', '1', '18', 'Puhpelem'),
(773, 23, 'PAC', '1', '19', 'Purwantoro'),
(774, 23, 'PAC', '1', '20', 'Selogiri'),
(775, 23, 'PAC', '1', '21', 'Sidoharjo'),
(776, 23, 'PAC', '1', '22', 'Slogohimo'),
(777, 23, 'PAC', '1', '23', 'Tirtomoyo'),
(778, 23, 'PAC', '1', '24', 'Wonogiri'),
(779, 23, 'PAC', '1', '25', 'Wuryantoro'),
(780, 28, 'PAC', '1', '01', 'Garung'),
(781, 28, 'PAC', '1', '02', 'Kalibawang'),
(782, 28, 'PAC', '1', '03', 'Kalikajar'),
(783, 28, 'PAC', '1', '04', 'Kaliwiro'),
(784, 28, 'PAC', '1', '05', 'Kejajar'),
(785, 28, 'PAC', '1', '06', 'Kepil'),
(786, 28, 'PAC', '1', '07', 'Kertek'),
(787, 28, 'PAC', '1', '08', 'Leksono'),
(788, 28, 'PAC', '1', '09', 'Mojotengah'),
(789, 28, 'PAC', '1', '10', 'Sapuran'),
(790, 28, 'PAC', '1', '11', 'Selomerto'),
(791, 28, 'PAC', '1', '12', 'Sukoharjo'),
(792, 28, 'PAC', '1', '13', 'Wadaslintang'),
(793, 28, 'PAC', '1', '14', 'Watumalang'),
(794, 28, 'PAC', '1', '15', 'Wonosobo'),
(795, 13, 'PAC', '1', '01', 'Magelang Selatan'),
(796, 13, 'PAC', '1', '02', 'Magelang Tengah'),
(797, 13, 'PAC', '1', '03', 'Magelang Utara'),
(798, 36, 'PAC', '1', '01', 'Pekalongan Barat'),
(799, 36, 'PAC', '1', '02', 'Pekalongan Selatan'),
(800, 36, 'PAC', '1', '03', 'Pekalongan Timur'),
(801, 36, 'PAC', '1', '04', 'Pekalongan Utara'),
(802, 35, 'PAC', '1', '01', 'Argomulyo'),
(803, 35, 'PAC', '1', '02', 'Sidorejo'),
(804, 35, 'PAC', '1', '03', 'Sidomukti'),
(805, 35, 'PAC', '1', '04', 'Tingkir'),
(806, 2, 'PAC', '1', '01', 'Banyumanik'),
(807, 2, 'PAC', '1', '02', 'Candisari'),
(808, 2, 'PAC', '1', '03', 'Gajahmungkur'),
(809, 2, 'PAC', '1', '04', 'Gayamsari'),
(810, 2, 'PAC', '1', '05', 'Genuk'),
(811, 2, 'PAC', '1', '06', 'Gunungpati'),
(812, 2, 'PAC', '1', '07', 'Mijen'),
(813, 2, 'PAC', '1', '08', 'Ngaliyan'),
(814, 2, 'PAC', '1', '09', 'Pedurungan'),
(815, 2, 'PAC', '1', '10', 'Semarang Barat'),
(816, 2, 'PAC', '1', '11', 'Semarang Selatan'),
(817, 2, 'PAC', '1', '12', 'Semarang Tengah'),
(818, 2, 'PAC', '1', '13', 'Semarang Timur'),
(819, 2, 'PAC', '1', '14', 'Semarang Utara'),
(820, 2, 'PAC', '1', '15', 'Tembalang'),
(821, 2, 'PAC', '1', '16', 'Tugu'),
(822, 1, 'PAC', '1', '01', 'Banjarsari'),
(823, 1, 'PAC', '1', '02', 'Jebres'),
(824, 1, 'PAC', '1', '03', 'Laweyan'),
(825, 1, 'PAC', '1', '04', 'Pasar Kliwon'),
(826, 1, 'PAC', '1', '05', 'Serengan'),
(827, 17, 'PAC', '1', '01', 'Margadana'),
(828, 17, 'PAC', '1', '02', 'Tegal Barat'),
(829, 17, 'PAC', '1', '03', 'Tegal Selatan'),
(830, 17, 'PAC', '1', '04', 'Tegal Timur'),
(833, 2, 'PKPT', '1', '01', 'UNNES'),
(834, 73, 'PAC', '0', '01', 'Tegal Barat'),
(835, 2, 'PKPT', '1', '02', 'UNWAHAS'),
(836, 34, 'PKPT', '1', '01', 'STAIN Banjar'),
(837, 39, 'PKPT', '0', '01', 'STAIN Cilacap'),
(838, 14, 'PKPT', '1', '22', 'STAI Syubbanul Wathon Magelang'),
(840, 14, 'PKPT', '1', '23', 'Universitas Tidar'),
(842, 34, 'PKPT', '1', '02', 'UIN Banjarnegara');

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
(997, 264, 34, 'PR', '1', '05', 'hula7'),
(998, 271, 39, 'PR', '0', '01', 'Karangmangu'),
(999, 273, 42, 'PR', '0', '01', 'Banjarkulon'),
(1000, 273, 42, 'PR', '0', '02', 'Banjarmangu'),
(1001, 264, 34, 'PR', '1', '06', 'Kulonprogo'),
(1002, 273, 42, 'PR', '0', '03', 'Suketiyem'),
(1003, 400, 19, 'PR', '1', '01', 'Ploso'),
(1004, 834, 73, 'PR', '0', '01', 'Tegalsari'),
(1005, 265, 34, 'PR', '1', '01', 'Alhamdulillah'),
(1006, 559, 14, 'PK', '1', '01', 'Syubbanul Wathon'),
(1007, 559, 14, 'PK', '1', '02', 'Birrul Ummah'),
(1008, 559, 14, 'PR', '1', '03', 'Girirejo'),
(1009, 559, 14, 'PK', '1', '04', 'Ponpes Al-Munir Pangkat'),
(1010, 559, 14, 'PK', '1', '05', 'Ponpes Nurul Maghfiroh'),
(1011, 559, 14, 'PR', '1', '06', 'Mangunrejo'),
(1012, 264, 34, 'PR', '1', '01', 'Tambaul Ulum'),
(1013, 264, 34, 'PR', '1', '01', 'Sumbulbukti'),
(1014, 264, 34, 'PK', '1', '07', 'Ponpes Nurul Maghfiroh'),
(1015, 264, 34, 'PK', '1', '08', 'MTs Ma\'arif Banjarmangu'),
(1016, 559, 14, 'PR', '1', '07', 'Banyuurip'),
(1017, 559, 14, 'PK', '1', '06', 'Ponpes Nurul Hasan Geger'),
(1018, 559, 14, 'PK', '1', '08', 'Komisariat MAN 2 Magelang'),
(1019, 271, 39, 'PK', '0', '02', 'MTs Sukses'),
(1020, 264, 34, 'PR', '1', '09', 'Kulonprogo'),
(1021, 264, 34, 'PK', '1', '10', 'MA Mambaul Ulum'),
(1022, 264, 34, 'PK', '1', '11', 'MA Nurul Hidayah');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(10) NOT NULL,
  `id_pimpinan` int(10) DEFAULT NULL,
  `kategori_data` varchar(10) DEFAULT NULL,
  `index_surat` varchar(30) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `tujuan_surat` varchar(100) NOT NULL,
  `uraian_singkat` varchar(100) DEFAULT NULL,
  `isi_surat` text DEFAULT NULL,
  `tanggal_surat` date NOT NULL,
  `sifat_surat` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `file_surat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `id_pimpinan`, `kategori_data`, `index_surat`, `nomor_surat`, `perihal`, `lampiran`, `tujuan_surat`, `uraian_singkat`, `isi_surat`, `tanggal_surat`, `sifat_surat`, `keterangan`, `file_surat`) VALUES
(10, 18, '1', '', '001/A', '-', NULL, 'PBNU', NULL, NULL, '2021-12-08', NULL, '-', NULL),
(11, 18, '1', 'A', '002/A/PW/7354/XII/2021', 'Undangan Rapat', NULL, 'PC IPNU  se Jawa Tengah', NULL, NULL, '2021-12-08', NULL, '-', 'PEDOMAN_AKREDITASI_SM_2021_r4_121.pdf');

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
  `tembusan` varchar(100) DEFAULT '',
  `catatan_disposisi` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `file_surat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `id_pimpinan`, `kategori_data`, `nomor_surat_masuk`, `tanggal_surat_diterima`, `pengirim`, `perihal`, `isi`, `tanggal_surat`, `tembusan`, `catatan_disposisi`, `keterangan`, `file_surat`) VALUES
(11, 18, '1', '001/PP/XII/2021', '2021-11-17', 'PP IPNU', 'Kerjasama Pengembangan Media', '-', '2021-11-15', '-', '-', 'Kerjasama Pengembangan Media 2', '-'),
(12, 18, '0', '002', '2021-11-17', 'PP RMI', 'Workshop Santri Mandiri', '-', '2021-11-15', '-', '-', 'Workshop Santri Mandiri', '-'),
(15, 18, '1', '01/PBNU', '2021-12-08', 'PBNU', 'PENGIRIMAN SANTRI PROGRAMMER', '', '2021-12-01', 'PWNU JATENG', '-', 'PENGIRIMAN SANTRI PROGRAMMER', 'Tangbuje_-ADC.pdf');

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
  ADD PRIMARY KEY (`id_daftar_kegiatan`);

--
-- Indexes for table `download_peraturan`
--
ALTER TABLE `download_peraturan`
  ADD PRIMARY KEY (`id_peraturan`);

--
-- Indexes for table `inventaris_barang`
--
ALTER TABLE `inventaris_barang`
  ADD PRIMARY KEY (`id_inventaris_barang`);

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
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`),
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
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

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
  MODIFY `id_daftar_kegiatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `download_peraturan`
--
ALTER TABLE `download_peraturan`
  MODIFY `id_peraturan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventaris_barang`
--
ALTER TABLE `inventaris_barang`
  MODIFY `id_inventaris_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_keuangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengaturan_pimpinan`
--
ALTER TABLE `pengaturan_pimpinan`
  MODIFY `id_pengaturan_pimpinan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id_pimpinan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `pimpinan_ac`
--
ALTER TABLE `pimpinan_ac`
  MODIFY `id_pimpinan_ac` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=843;

--
-- AUTO_INCREMENT for table `pimpinan_rk`
--
ALTER TABLE `pimpinan_rk`
  MODIFY `id_pimpinan_rk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
