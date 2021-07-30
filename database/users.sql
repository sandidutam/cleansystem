-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2021 at 12:14 AM
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
