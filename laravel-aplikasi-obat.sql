-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2024 at 09:26 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-aplikasi-obat`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` int UNSIGNED NOT NULL,
  `nama_klasifikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_klasifikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `nama_klasifikasi`, `deskripsi_klasifikasi`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Analgesik', 'Mengurangi Rasa Nyeri nya', 1, '2024-03-17 05:35:29', '2024-03-17 05:43:58'),
(2, 'Antipiretik', 'Menurunkan Demam dan nyeri', 1, '2024-03-17 05:36:18', '2024-03-17 19:33:31'),
(3, 'AntiBakteri', 'Membunuh Bakteri', 1, '2024-03-17 05:37:59', '2024-03-17 20:30:40'),
(4, 'Antivirus', 'Mengobati Infeksi Virus', 1, '2024-03-17 05:38:30', '2024-03-17 05:38:30'),
(5, 'Antikanker', 'Melawan Pertumbuhan sel kanker', 1, '2024-03-17 05:38:56', '2024-03-17 05:38:56'),
(6, 'Antiinflamasi', 'Mengurangi Peradangan', 1, '2024-03-17 05:39:24', '2024-03-17 05:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_obat`
--

CREATE TABLE `klasifikasi_obat` (
  `id_klasifikasi_obat` int UNSIGNED NOT NULL,
  `id_obat` int UNSIGNED NOT NULL,
  `id_klasifikasi` int UNSIGNED NOT NULL,
  `added_by` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klasifikasi_obat`
--

INSERT INTO `klasifikasi_obat` (`id_klasifikasi_obat`, `id_obat`, `id_klasifikasi`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, '2024-03-17 07:59:22', '2024-03-17 07:59:22'),
(3, 5, 1, 1, '2024-03-17 08:20:40', '2024-03-17 08:20:40'),
(4, 5, 2, 1, '2024-03-17 19:23:24', '2024-03-17 19:23:24'),
(5, 3, 5, 1, '2024-03-17 19:43:58', '2024-03-17 19:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_17_070430_create_obat', 1),
(6, '2024_03_17_070521_create_klasifikasi', 2),
(7, '2024_03_17_070600_create_klasifikasi_obat', 2);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int UNSIGNED NOT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_obat` int UNSIGNED NOT NULL,
  `harga_obat` int UNSIGNED NOT NULL,
  `deskripsi_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok_obat`, `harga_obat`, `deskripsi_obat`, `added_by`, `created_at`, `updated_at`) VALUES
(2, 'Paracetamol', 10, 10000, 'Penurun Panas', 1, '2024-03-17 03:11:40', '2024-03-17 03:11:40'),
(3, 'Bodrexcin', 9, 4000, 'vitamin untuk kesehatan tubuh', 1, '2024-03-17 03:51:17', '2024-03-17 04:48:53'),
(4, 'Amoxcilin', 18, 2000, 'Obat Amoxicilin', 1, '2024-03-17 04:48:22', '2024-03-17 05:09:42'),
(5, 'Ibu Profen', 2, 10000, 'Penurun panas dan sakit kepala', 1, '2024-03-17 08:19:58', '2024-03-17 08:19:58');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Gals18', 'galuh@gmail.com', '$2y$10$ycSgQNhoF8Igk0K3VSWG7Opw5x3TaeZGeHKxoxHcFsytUQ5Ya62Bi', '2024-03-17 00:27:09', '2024-03-17 00:27:09');

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
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`),
  ADD KEY `klasifikasi_added_by_foreign` (`added_by`);

--
-- Indexes for table `klasifikasi_obat`
--
ALTER TABLE `klasifikasi_obat`
  ADD PRIMARY KEY (`id_klasifikasi_obat`),
  ADD KEY `klasifikasi_obat_id_obat_foreign` (`id_obat`),
  ADD KEY `klasifikasi_obat_id_klasifikasi_foreign` (`id_klasifikasi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `obat_added_by_foreign` (`added_by`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id_klasifikasi` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `klasifikasi_obat`
--
ALTER TABLE `klasifikasi_obat`
  MODIFY `id_klasifikasi_obat` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD CONSTRAINT `klasifikasi_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `klasifikasi_obat`
--
ALTER TABLE `klasifikasi_obat`
  ADD CONSTRAINT `klasifikasi_obat_id_klasifikasi_foreign` FOREIGN KEY (`id_klasifikasi`) REFERENCES `klasifikasi` (`id_klasifikasi`) ON DELETE CASCADE,
  ADD CONSTRAINT `klasifikasi_obat_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE;

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
