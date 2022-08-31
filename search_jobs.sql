-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2022 at 07:23 PM
-- Server version: 8.0.30-0ubuntu0.22.04.1
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `search_jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `ktgr_loker`
--

CREATE TABLE `ktgr_loker` (
  `id_ktgr` int UNSIGNED NOT NULL,
  `nm_ktgr` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ktgr_loker`
--

INSERT INTO `ktgr_loker` (`id_ktgr`, `nm_ktgr`, `created_at`, `updated_at`) VALUES
(1, 'developer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'marketing', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'ternak', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lamaran`
--

CREATE TABLE `lamaran` (
  `id_lamaran` int UNSIGNED NOT NULL,
  `id_pencaker` int UNSIGNED NOT NULL,
  `id_loker` int UNSIGNED NOT NULL,
  `berkas` varchar(20) NOT NULL,
  `tgl_lamar` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `lamaran`
--

INSERT INTO `lamaran` (`id_lamaran`, `id_pencaker`, `id_loker`, `berkas`, `tgl_lamar`, `created_at`, `updated_at`) VALUES
(3, 2, 5, 'SuratPmadie.pdf', '2022-08-29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 5, 'tugasKomputerGrafis.', '2022-08-31', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id_loker` int UNSIGNED NOT NULL,
  `id_ktgr` int UNSIGNED NOT NULL,
  `id_prshn` int UNSIGNED NOT NULL,
  `judul_loker` varchar(35) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `syrt_pend` varchar(15) NOT NULL,
  `gaji` decimal(10,0) NOT NULL,
  `detail_loker` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id_loker`, `id_ktgr`, `id_prshn`, `judul_loker`, `posisi`, `tgl_buka`, `tgl_tutup`, `syrt_pend`, `gaji`, `detail_loker`, `created_at`, `updated_at`) VALUES
(5, 1, 2, 'software enginer', 'analisis', '2022-08-01', '2022-08-27', 'S1', '3000000', 'sebagai analisis sistem', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 4, 2, 'cet es batu batu biar berwarna', 'jdhjakhd', '2022-08-25', '2022-08-25', 'SD', '10000', 'sebagai teknik cat es batu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2, 3, 'designer grafika', 'tecnical', '2022-08-08', '2022-08-31', 'SMK', '1234567', 'work fulltime', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 2, 4, 'testing', 'manager', '2022-08-16', '2022-08-23', 'S1', '9876543', 'part time for work', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(3, '2022-07-26-170313', 'App\\Database\\Migrations\\Perusahaan', 'default', 'App', 1660628986, 1),
(4, '2022-07-26-175541', 'App\\Database\\Migrations\\KtgrLoker', 'default', 'App', 1660628986, 1),
(5, '2022-07-26-175542', 'App\\Database\\Migrations\\Loker', 'default', 'App', 1660628987, 1),
(6, '2022-07-26-175618', 'App\\Database\\Migrations\\Pencaker', 'default', 'App', 1660628987, 1),
(7, '2022-07-26-175619', 'App\\Database\\Migrations\\Lamaran', 'default', 'App', 1660628987, 1),
(8, '2022-08-14-142433', 'App\\Database\\Migrations\\Users', 'default', 'App', 1660628987, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pencaker`
--

CREATE TABLE `pencaker` (
  `id_pencaker` int UNSIGNED NOT NULL,
  `nm_lkp` varchar(50) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `usia` int NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tlp` char(14) NOT NULL,
  `email` varchar(35) NOT NULL,
  `pend_ter` varchar(20) NOT NULL,
  `peng_ker` text NOT NULL,
  `bid_keahlian` varchar(20) NOT NULL,
  `sertifikat` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pencaker`
--

INSERT INTO `pencaker` (`id_pencaker`, `nm_lkp`, `tgl_lhr`, `jk`, `usia`, `alamat`, `tlp`, `email`, `pend_ter`, `peng_ker`, `bid_keahlian`, `sertifikat`, `created_at`, `updated_at`) VALUES
(1, 'leni sevia', '1999-08-04', 'perempuan', 24, 'tanak beak     ', '087777777777', 'lenis@gmail.com', 'S1', 'pernah menjadi admin', 'Computer Sciences', 'done_all_tables.pdf', '2022-08-16 16:55:52', '2022-08-16 16:55:52'),
(2, 'saepul', '2022-08-04', 'laki-laki', 20, 'melar desa selebung', '087757012333', 'd@gmail.com', 'S1', 'developer enginer', 'Computer Science', 'done_all_tables_1.pd', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_prshn` int UNSIGNED NOT NULL,
  `nm_prshn` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `tlp` char(14) NOT NULL,
  `logo` varchar(20) NOT NULL,
  `srt_izin` varchar(20) NOT NULL,
  `strk_organis` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_prshn`, `nm_prshn`, `alamat`, `email`, `tlp`, `logo`, `srt_izin`, `strk_organis`, `created_at`, `updated_at`) VALUES
(2, 'pt central', 'selebung', 'sbahry063@gmail.com', '087757012333', 'foto.png', 'done_all_tables.pdf', 'done_all_tables.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'PT elektronika computer', 'Penujak', 'Helsabaiq110@gmail.com', '08775701212', 'foto_1.png', 'tugasKomputerGrafis.', 'tugasKomputerGrafis.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'PT Citra Solusi', 'Praya', 'pctrs@gmail.com', '085340211251', 'foto_2.png', 'QuisKomputerGrafis.p', 'QuisKomputerGrafis.p', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_image` varchar(70) NOT NULL DEFAULT 'default.png',
  `role` enum('admin','instansi','pencaker') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `user_image`, `role`, `created_at`, `updated_at`) VALUES
(1, 'bahri', 'sbahry063@gmail.com', '$2y$10$qLB2Qvo50IpnWS63ewc3v.s78HmP3jR1JSpmW4RWmoS2qmqbbNHwm', 'default.png', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'bahri2', 'bahrysaipul266@gmail.com', '$2y$10$goLRzysqZrwAF5gxlI/mr.3b.pYZjU0GmVwzAkb7y3Gd5icD29tXW', 'default.png', 'instansi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'saepul bahri', 'd@gmail.com', '$2y$10$UpE2iXyLZp/yNDdTBmhn6.xbKruytWqy6Ssc/YbCRiawOKWx4PCzW', 'default.png', 'pencaker', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ktgr_loker`
--
ALTER TABLE `ktgr_loker`
  ADD PRIMARY KEY (`id_ktgr`);

--
-- Indexes for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id_lamaran`),
  ADD KEY `lamaran_id_pencaker_foreign` (`id_pencaker`),
  ADD KEY `lamaran_id_loker_foreign` (`id_loker`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id_loker`),
  ADD KEY `loker_id_ktgr_foreign` (`id_ktgr`),
  ADD KEY `loker_id_prshn_foreign` (`id_prshn`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pencaker`
--
ALTER TABLE `pencaker`
  ADD PRIMARY KEY (`id_pencaker`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_prshn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ktgr_loker`
--
ALTER TABLE `ktgr_loker`
  MODIFY `id_ktgr` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id_lamaran` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id_loker` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pencaker`
--
ALTER TABLE `pencaker`
  MODIFY `id_pencaker` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_prshn` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD CONSTRAINT `lamaran_id_loker_foreign` FOREIGN KEY (`id_loker`) REFERENCES `loker` (`id_loker`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lamaran_id_pencaker_foreign` FOREIGN KEY (`id_pencaker`) REFERENCES `pencaker` (`id_pencaker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loker`
--
ALTER TABLE `loker`
  ADD CONSTRAINT `loker_id_ktgr_foreign` FOREIGN KEY (`id_ktgr`) REFERENCES `ktgr_loker` (`id_ktgr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loker_id_prshn_foreign` FOREIGN KEY (`id_prshn`) REFERENCES `perusahaan` (`id_prshn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
