-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 29, 2021 at 11:56 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cleansystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_06_08_131621_create_pegawai_table', 1),
(10, '2021_06_08_131857_create_presensi_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pegawai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_depan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_kabupaten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penempatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sektor_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_pegawai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nomor_pegawai`, `nama_depan`, `nama_belakang`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `provinsi`, `kota_kabupaten`, `kecamatan`, `kelurahan`, `pendidikan`, `jabatan`, `penempatan`, `sektor_area`, `tanggal_diterima`, `no_hp`, `foto_pegawai`, `created_at`, `updated_at`) VALUES
(1, 'PGW-2019070001', 'Fabio', 'Tavares', 'Fabio Tavares', 'Sao Paulo', '1993-10-23', 'L', 'Katolik', 'Pengadegan', 'DKI Jakarta', 'Kota Jakarta Selatan', 'Pancoran', 'Kalibata', 'Diploma', 'Cleaning Service', 'Mabes TNI AD', '1', '2019-07-23', NULL, 'Seto 3x4 cm.jpg', '2021-06-08 07:31:47', '2021-06-08 08:17:25'),
(2, 'PGW-2020060002', 'Roberto', 'Firmino', 'Roberto Firmino', 'Maceio', '1991-10-02', 'L', 'Katolik', 'Perdatam', 'DKI Jakarta', 'Kota Jakarta Selatan', 'Pancoran', 'Kalibata', 'S-1', 'Mandor', 'Mabes TNI AD', '1', '2020-06-16', NULL, 'Rizki 4x6 cm.jpg', '2021-06-08 08:55:17', '2021-06-08 08:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pegawai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sektor_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `catatan_masuk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan_keluar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `nomor_pegawai`, `nama_lengkap`, `jabatan`, `sektor_area`, `tanggal`, `jam_masuk`, `jam_keluar`, `catatan_masuk`, `catatan_keluar`, `keterangan`, `created_at`, `updated_at`) VALUES
(22, 'PGW-2019070001', 'Fabio Tavares', 'Cleaning Service', '1', '2021-06-28', '21:22:56', '21:23:04', 'Datang Telat ', 'Pulang Telat', NULL, '2021-06-28 07:22:56', '2021-06-28 07:23:04'),
(23, 'PGW-2020060002', 'Roberto Firmino', 'Mandor', '1', '2021-06-28', '00:00:00', '00:00:00', '-', NULL, 'Cuti', '2021-06-28 07:23:28', '2021-06-28 07:23:28'),
(24, 'PGW-2019070001', 'Fabio Tavares', 'Cleaning Service', '1', '2021-07-05', '00:00:00', '00:00:00', '-', NULL, 'Sakit', '2021-07-05 05:01:51', '2021-07-05 05:01:51'),
(25, 'PGW-2019070001', 'Fabio Tavares', 'Cleaning Service', '1', '2021-07-30', '06:36:12', NULL, 'Datang Tepat Waktu ', NULL, NULL, '2021-07-29 16:36:12', '2021-07-29 16:36:12'),
(26, 'PGW-2020060002', 'Roberto Firmino', 'Mandor', '1', '2021-07-30', '00:00:00', '00:00:00', '-', NULL, 'Cuti', '2021-07-29 16:36:37', '2021-07-29 16:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pegawai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_depan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nomor_pegawai`, `nama_depan`, `nama_belakang`, `nama_lengkap`, `tanggal_lahir`, `jenis_kelamin`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `jabatan`, `no_hp`, `foto_user`, `created_at`, `updated_at`) VALUES
(1, 'PGW-2020060002', 'Sandi', 'Maulana', 'Sandi Maulana', '1991-10-02', 'L', 'sandiduta@gmail.com', NULL, '$2y$10$Pg6IjHiYN0D5jdvDRJ5FUu6jb6usSjHVGCNZaPh3st9XP0EMKzQd2', 'SuperAdmin', '6bTSDLUJgy7XPszHaCJ6aLx71oumi3lEPjoRe1iuHmwqkuSKNfzYtDtHYEO1', 'Mandor', NULL, '753.png', '2021-06-11 03:47:31', '2021-07-29 16:38:05'),
(2, 'PGW-2019070001', 'Fabio', 'Tavares', 'Fabio Tavares', '1993-10-23', 'Pilih', 'adams@gmail.com', NULL, '$2y$10$kP9x1t77RqCCGllGoa9e5usJwPNSmIN5T6yzUq./a0xv3OANVLbGO', 'SuperAdmin', 'UXWojWhaWuQnV62OS2pt0qIExcSyZBU01K8z6ztpvDt3UP6f81WyCTKHD4H1', 'Cleaning Service', NULL, NULL, '2021-06-14 23:54:09', '2021-06-17 01:20:41'),
(3, '1234', 'Aldo', 'Kurnia', 'Aldo Kurnia', '1996-03-13', 'L', 'aldo@email.com', NULL, '$2y$10$bMGYDqgC3o6J7ug6Ip7g1ek7AgqGCV/Aq7329KOoz0tuPsqkbnO.W', 'Admin', 'uGt7mFxCw2WlSRwuMBcotY0JkdqXaVojnoZRIaPVJgALbFsd3I9nc1HODddR', 'Manajer', NULL, '753.png', '2021-06-28 03:10:37', '2021-06-28 03:10:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
