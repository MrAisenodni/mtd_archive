-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Agu 2022 pada 11.51
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtd_archive`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_17_150007_create_mst_user', 1),
(6, '2022_06_17_150008_create_stg_login', 1),
(7, '2022_06_17_150009_create_stg_main_menu', 1),
(8, '2022_06_17_150010_create_stg_menu', 1),
(9, '2022_06_17_150011_create_stg_submenu', 1),
(10, '2022_06_17_150012_create_mst_company', 1),
(11, '2022_06_17_150013_create_mst_letter_type', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_company`
--

CREATE TABLE `mst_company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2022-08-28 16:48:35',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_company`
--

INSERT INTO `mst_company` (`id`, `code`, `name`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'PTAI', 'PT Tanah Air Indonesia', 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35'),
(2, 'PGS', 'PT Garuda Sampoerna', 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35'),
(3, 'CCMJ', 'CV Cipta Mangun Jaya', 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35'),
(4, 'PAHI', 'PT Anak Halal Ihsan', 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35'),
(5, 'PJWP', 'PT Jayabaya Wijaya Purbaya', 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_letter_type`
--

CREATE TABLE `mst_letter_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2022-08-28 16:48:35',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_letter_type`
--

INSERT INTO `mst_letter_type` (`id`, `name`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Edaran', 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35'),
(2, 'Intruksi', 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35'),
(3, 'Jadwal Dokter Jaga', 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35'),
(4, 'Pengumuman', 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35'),
(5, 'Surat Keputusan', 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_user`
--

CREATE TABLE `mst_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('l','p') COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `religion_id` int(10) UNSIGNED DEFAULT NULL,
  `position_id` int(10) UNSIGNED DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2022-08-28 16:48:34',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_user`
--

INSERT INTO `mst_user` (`id`, `nik`, `full_name`, `gender`, `birth_place`, `birth_date`, `email`, `phone_number`, `home_number`, `address`, `join_date`, `religion_id`, `position_id`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '2022082812345', 'Developer', 'l', 'Bekasi', '1998-10-07', 'developer.pro@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35'),
(2, '2022082854321', 'Administrator', 'l', 'Bekasi', '1990-10-09', 'administrator.mtd@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stg_login`
--

CREATE TABLE `stg_login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2022-08-28 16:48:34',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stg_login`
--

INSERT INTO `stg_login` (`id`, `username`, `password`, `email_verified_at`, `remember_token`, `user_id`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'developer', '$2y$10$/kcLWrQbiX1CakWUJgU80e4TX3V5fCQmRyoos2Xaw98BwZ3xU4csy', NULL, NULL, 1, 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35'),
(2, 'admin_mtd', '$2y$10$8vQtkKbyAzyQvs09U3BUx.keQZq6I/P4mC5gwOVCBzsG9EWju7.Aq', NULL, NULL, 2, 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stg_main_menu`
--

CREATE TABLE `stg_main_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` tinyint(1) NOT NULL DEFAULT 0,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2022-08-28 16:48:35',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stg_menu`
--

CREATE TABLE `stg_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` tinyint(1) NOT NULL DEFAULT 0,
  `main_menu_id` int(10) UNSIGNED DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2022-08-28 16:48:35',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stg_menu`
--

INSERT INTO `stg_menu` (`id`, `title`, `icon`, `url`, `parent`, `main_menu_id`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Home', 'lni lni-home', '/', 0, NULL, 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35'),
(2, 'Manajemen Surat', 'lni lni-popup', NULL, 1, NULL, 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35'),
(3, 'Master', 'lni lni-layers', NULL, 1, NULL, 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35'),
(4, 'Pengaturan', 'lni lni-cog', NULL, 1, NULL, 0, 'Migrasi', '2022-08-28 16:48:35', NULL, '2022-08-28 16:48:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stg_submenu`
--

CREATE TABLE `stg_submenu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2022-08-28 16:48:35',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stg_submenu`
--

INSERT INTO `stg_submenu` (`id`, `title`, `icon`, `url`, `menu_id`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Surat Masuk', 'bx bx-download', '/manajemen/surat-masuk', 2, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(2, 'Surat Terkirim', 'bx bx-send', '/manajemen/surat-terkirim', 2, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(3, 'Surat Keluar', 'bx bx-mail-send', '/manajemen/surat-keluar', 2, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(4, 'Arsip Surat', 'bx bx-archive', '/manajemen/arsip-surat', 2, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(5, 'Sampah Surat', 'bx bx-trash', '/manajemen/sampah-surat', 2, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(6, 'Perusahaan', 'bi bi-arrow-right-short', '/master/perusahaan', 3, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(7, 'Jenis Surat', 'bi bi-arrow-right-short', '/master/jenis-surat', 3, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(8, 'Bagian', 'bi bi-arrow-right-short', '/master/bagian', 3, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(9, 'Asal Surat', 'bi bi-arrow-right-short', '/master/asal-surat', 3, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(10, 'Kategori Dokumen', 'bi bi-arrow-right-short', '/master/kategori-dokumen', 3, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(11, 'Klasifikasi Surat', 'bi bi-arrow-right-short', '/master/klasifikasi-surat', 3, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(12, 'Hari Libur', 'bi bi-arrow-right-short', '/master/hari-libur', 3, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(13, 'Kelurahan/Desa', 'bi bi-arrow-right-short', '/master/kelurahan', 3, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(14, 'Kecamatan', 'bi bi-arrow-right-short', '/master/kecamatan', 3, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(15, 'Kota', 'bi bi-arrow-right-short', '/master/kota', 3, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(16, 'Provinsi', 'bi bi-arrow-right-short', '/master/provinsi', 3, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(17, 'Negara', 'bi bi-arrow-right-short', '/master/negara', 3, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(18, 'Provider', 'bi bi-building', '/pengaturan/provider', 4, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(19, 'Bahasa', 'lni lni-library', '/pengaturan/bahasa', 4, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(20, 'FAQ', 'bi bi-exclamation-triangle', '/pengaturan/faq', 4, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36'),
(21, 'Dokumentasi', 'bi bi-file-earmark-code', '/pengaturan/dokumentasi', 4, 0, 'Migrasi', '2022-08-28 16:48:36', NULL, '2022-08-28 16:48:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_company`
--
ALTER TABLE `mst_company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mst_company_code_unique` (`code`);

--
-- Indeks untuk tabel `mst_letter_type`
--
ALTER TABLE `mst_letter_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mst_user_nik_unique` (`nik`),
  ADD UNIQUE KEY `mst_user_email_unique` (`email`),
  ADD UNIQUE KEY `mst_user_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `mst_user_home_number_unique` (`home_number`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `stg_login`
--
ALTER TABLE `stg_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stg_login_username_unique` (`username`);

--
-- Indeks untuk tabel `stg_main_menu`
--
ALTER TABLE `stg_main_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stg_menu`
--
ALTER TABLE `stg_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stg_submenu`
--
ALTER TABLE `stg_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mst_company`
--
ALTER TABLE `mst_company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mst_letter_type`
--
ALTER TABLE `mst_letter_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stg_login`
--
ALTER TABLE `stg_login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `stg_main_menu`
--
ALTER TABLE `stg_main_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stg_menu`
--
ALTER TABLE `stg_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `stg_submenu`
--
ALTER TABLE `stg_submenu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
