-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 06:56 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem-core-ci-vebri-developer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `email_username` varchar(50) NOT NULL,
  `password` varchar(226) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `foto_admin` varchar(100) NOT NULL DEFAULT 'user.jpg',
  `role_id` int(1) NOT NULL,
  `active` int(1) NOT NULL,
  `admin_online` int(1) NOT NULL DEFAULT '0',
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_logout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `email_username`, `password`, `nama_admin`, `foto_admin`, `role_id`, `active`, `admin_online`, `created_on`, `update_at`, `last_login`, `last_logout`) VALUES
(1, 'vebri@admin.com', '$2y$10$lR.gs1.j5eL19x399IwlFetcw.Ae1mM8XU.r/eKJid6QQ8Dyj9unS', 'Vebri Yusdi Putra Pradana', 'PHOTO_ADMIN-1653141450.JPG', 1, 1, 0, '2021-02-12 09:50:30', '2022-05-23 11:47:12', '2022-07-17 11:46:54', '2022-07-17 11:47:34'),
(5, 'kodam5@petugas.com', '$2y$10$SknIiTfxjMEM7LUxIGLOGO9wjpROOtnAbDnvukRpQBb/efuGEVqtG', 'KODAM 5 BRAWIJAYA', 'PHOTO_ADMIN-1653572073.png', 1, 1, 0, '2022-04-19 14:04:59', '2022-05-26 20:35:11', '2022-05-26 20:35:39', '2022-05-26 20:35:48'),
(10, 'chanelpusat330@gmail.com', '$2y$10$CQbSSFwC6SU/oSCF6zaPWu/9gE6G9MEGNAPOLTFPKiH.HAA0eZ.Q2', 'VEBRI 330', 'user.jpg', 2, 1, 0, '2022-07-01 19:43:21', '2022-07-17 11:41:04', '2022-07-17 11:41:42', '2022-07-17 11:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_token`
--

CREATE TABLE `tbl_admin_token` (
  `id` int(11) NOT NULL,
  `email_username` varchar(225) NOT NULL,
  `token` varchar(225) NOT NULL,
  `created_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_babinsa`
--

CREATE TABLE `tbl_babinsa` (
  `id` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `pangkat` varchar(50) NOT NULL,
  `alamat` longtext NOT NULL,
  `active` int(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_babinsa`
--

INSERT INTO `tbl_babinsa` (`id`, `id_wilayah`, `nama`, `no_hp`, `foto`, `pangkat`, `alamat`, `active`, `created_on`, `update_at`) VALUES
(3, 5, 'Bapak Koramil', '0891923', 'default.jpg', 'SERTU', 'Singosari-Lawang', 0, '2022-07-17 11:19:16', '2022-07-17 11:31:31'),
(4, 3, 'RUS', '0812333222', 'PHOTO_BABINSA-1658032282.jpg', 'SERKA', 'Singosari', 1, '2022-07-17 11:31:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_website` varchar(225) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `email_pswd` varchar(255) NOT NULL,
  `email_protocol` varchar(255) NOT NULL,
  `email_host` varchar(255) NOT NULL,
  `email_port` varchar(255) NOT NULL,
  `email_type` varchar(255) NOT NULL,
  `email_charset` varchar(255) NOT NULL,
  `email_verifikasi` int(1) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `update_at` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_website`, `deskripsi`, `email`, `email_pswd`, `email_protocol`, `email_host`, `email_port`, `email_type`, `email_charset`, `email_verifikasi`, `phone`, `logo`, `update_at`) VALUES
(1010, 'KORAMIL 27', 'SISTEM INFORMASI KORAMIL', 'kosong@gmail.com', 'kosong', 'smtp', 'ssl://smtp.googlemail.com', '465', 'html', 'utf-8', 1, '000000000000000', 'PHOTO_WEBSITE-1653660298.png', '2022-07-17 11:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wilayah`
--

CREATE TABLE `tbl_wilayah` (
  `id` int(11) NOT NULL,
  `nama_wilayah` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `foto_desa` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `kepala_desa` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `alamat` longtext NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `lokasi_koordinat` longtext NOT NULL,
  `lokasi_iframe` longtext NOT NULL,
  `active` int(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wilayah`
--

INSERT INTO `tbl_wilayah` (`id`, `nama_wilayah`, `desa`, `foto_desa`, `kepala_desa`, `kelurahan`, `kecamatan`, `alamat`, `no_telp`, `lokasi_koordinat`, `lokasi_iframe`, `active`, `created_on`, `update_at`) VALUES
(3, 'DESA TURIREJO', 'TURIREJO', 'PHOTO_DESA-1657026642.png', 'H. Arif Sumawanto, SH,MM', 'TURIREJO', 'LAWANG', 'Jl. Anjasmoro No.43, Turi, Turirejo, Kec. Lawang, Kabupaten Malang, Jawa Timur 65213', '0341428209', 'https://goo.gl/maps/vMSyxhzfEMNuXTGE7', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.6680935123763!2d112.6910227146954!3d-7.824910294361583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7d4b83bf70bb3%3A0xa87c75def86ffcf1!2sKantor%20Desa%20Turirejo!5e0!3m2!1sid!2sid!4v1657026611136!5m2!1sid!2sid', 1, '2022-07-05 20:10:42', '0000-00-00 00:00:00'),
(4, 'DESA WONOREJO', 'WONOREJO', 'PHOTO_DESA-1657027699.png', 'BAPAK', 'WONOREJO', 'LAWANG', 'Jl. Raya Wonorejo No.4, Krajan Tengah, Wonorejo, Kec. Lawang, Kabupaten Malang, Jawa Timur 65251', '0341425143', 'https://goo.gl/maps/qq1ZQoAbTqinTD3o8', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15810.915797307578!2d112.66547359971635!3d-7.818488699999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7d4ddd09618d5%3A0x95372f8a50f24f90!2sKantor%20Desa%20Wonorejo%20Lawang!5e0!3m2!1sid!2sid!4v1657027654177!5m2!1sid!2sid', 0, '2022-07-05 20:28:08', '2022-07-05 20:30:56'),
(5, 'SUMBER PORONG', 'SUMBER PORONG', 'default.jpg', 'SUMBER PORONG', 'SUMBER PORONG', 'LAWANG', 'Jl. A Yani No.135, Krajan Utara, Sumber Porong, Kec. Lawang, Kabupaten Malang, Jawa Timur 65216', '0341424266', 'https://goo.gl/maps/YYMFgbPTFPR5HSXS7', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.675372370851!2d112.7100988146953!3d-7.824142494362152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7d4a63961f9c3%3A0x12f982e5c8643801!2sKantor%20Desa%20Sumbeporong!5e0!3m2!1sid!2sid!4v1658031250940!5m2!1sid!2sid', 1, '2022-07-17 11:14:57', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_admin_token`
--
ALTER TABLE `tbl_admin_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_babinsa`
--
ALTER TABLE `tbl_babinsa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_wilayah` (`id_wilayah`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wilayah`
--
ALTER TABLE `tbl_wilayah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_admin_token`
--
ALTER TABLE `tbl_admin_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_babinsa`
--
ALTER TABLE `tbl_babinsa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `tbl_wilayah`
--
ALTER TABLE `tbl_wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_babinsa`
--
ALTER TABLE `tbl_babinsa`
  ADD CONSTRAINT `tbl_babinsa_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `tbl_wilayah` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
