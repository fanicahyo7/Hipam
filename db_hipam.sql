-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 09:42 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hipam`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_18_030101_create_rws_table', 1),
(5, '2020_11_18_030120_create_rts_table', 1),
(6, '2020_11_24_030222_create_retribusi_table', 1),
(7, '2020_11_27_034607_create_coba_table', 2),
(8, '2020_11_27_040220_create_rt_table', 3),
(9, '2020_11_27_040236_create_rw_table', 3),
(10, '2020_11_27_040959_create_rt_table', 4),
(11, '2020_11_27_041009_create_rw_table', 4),
(12, '2020_11_27_080859_create_rw_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retribusis`
--

CREATE TABLE `retribusis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `retribusi_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif1` int(11) NOT NULL,
  `tarif2` int(11) NOT NULL,
  `abonemen` int(11) NOT NULL,
  `kompensasi` int(11) NOT NULL,
  `user_entry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_update` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_delete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `retribusis`
--

INSERT INTO `retribusis` (`id`, `retribusi_name`, `tarif1`, `tarif2`, `abonemen`, `kompensasi`, `user_entry`, `user_update`, `user_delete`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Default', 0, 0, 0, 0, 'Fani7', 'Fani7', NULL, NULL, '2020-11-26 01:45:44', '2020-11-25 23:44:11'),
(5, 'Retribusi 1', 235, 34346, 545, 235435, 'Fani7', NULL, NULL, NULL, '2020-11-29 21:04:17', '2020-11-29 21:04:17'),
(6, 'dfgfhg', 4557, 678, 46, 57, 'Fani7', NULL, NULL, NULL, '2020-12-01 01:01:11', '2020-12-01 01:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `rts`
--

CREATE TABLE `rts` (
  `id_rt` int(11) NOT NULL,
  `id_rw` int(11) NOT NULL,
  `user_entry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_update` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_delete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rts`
--

INSERT INTO `rts` (`id_rt`, `id_rw`, `user_entry`, `user_update`, `user_delete`, `deleted_at`, `created_at`, `updated_at`) VALUES
(0, 0, 'Fani7', NULL, 'Fani7', NULL, '2020-11-28 00:51:56', '2020-11-28 01:35:57'),
(3, 2, 'Fani7', NULL, NULL, NULL, '2020-11-29 21:04:53', '2020-11-29 21:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `rws`
--

CREATE TABLE `rws` (
  `id_rw` int(11) NOT NULL,
  `id_retribusi` int(11) NOT NULL,
  `user_entry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_update` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_delete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rws`
--

INSERT INTO `rws` (`id_rw`, `id_retribusi`, `user_entry`, `user_update`, `user_delete`, `deleted_at`, `created_at`, `updated_at`) VALUES
(0, 1, 'Fani7', NULL, NULL, NULL, '2020-11-27 03:45:34', '2020-11-27 03:45:34'),
(2, 5, 'Fani7', NULL, NULL, NULL, '2020-11-29 21:04:39', '2020-11-29 21:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `tagihans`
--

CREATE TABLE `tagihans` (
  `id_tagihan` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` date NOT NULL,
  `metersekarang` int(11) NOT NULL,
  `metersebelumnya` int(11) NOT NULL,
  `pakai` int(11) NOT NULL,
  `tarif1` int(11) NOT NULL,
  `totaltarif1` int(11) NOT NULL,
  `tarif2` int(11) NOT NULL,
  `totaltarif2` int(11) NOT NULL,
  `abonemen` int(11) NOT NULL,
  `totalabonemen` int(11) NOT NULL,
  `kompensasi` int(11) NOT NULL,
  `totalkompensasi` int(11) NOT NULL,
  `rekeningpakaiair` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `totaltagihan` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_entry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_update` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_delete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwordnohash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rt` int(11) NOT NULL,
  `id_rw` int(11) NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PELANGGAN',
  `user_entry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_update` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_delete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `passwordnohash`, `id_rt`, `id_rw`, `roles`, `user_entry`, `user_update`, `user_delete`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Fani7', 'Fani Dwi Cahyo', '$2y$10$YlzFxLqD6i9UxfWmIZCJmOl/7V0prs0yeIW3eR02V/AxelM8jrfdi', 'fanidwicahyo', 0, 0, 'ADMIN', 'Fani', NULL, NULL, NULL, NULL, '2020-11-25 18:52:28', '2020-11-25 18:52:28'),
(3, 'Aldi12', 'Aldi Putra', '$2y$10$GjDLy9HR8OGUF/gfkm15OOrV0XKxdcvbBXTamAs0/HcjHiDqUUm0u', 'qwertyuiop', 3, 2, 'PELANGGAN', 'Fani7', NULL, NULL, NULL, NULL, '2020-11-29 21:05:14', '2020-11-29 21:05:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `retribusis`
--
ALTER TABLE `retribusis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rts`
--
ALTER TABLE `rts`
  ADD PRIMARY KEY (`id_rt`,`id_rw`);

--
-- Indexes for table `rws`
--
ALTER TABLE `rws`
  ADD PRIMARY KEY (`id_rw`);

--
-- Indexes for table `tagihans`
--
ALTER TABLE `tagihans`
  ADD PRIMARY KEY (`id_tagihan`,`id_user`,`periode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `retribusis`
--
ALTER TABLE `retribusis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tagihans`
--
ALTER TABLE `tagihans`
  MODIFY `id_tagihan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
