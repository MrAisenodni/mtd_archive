-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Agu 2022 pada 20.45
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
(11, '2022_06_17_150013_create_mst_letter_type', 1),
(12, '2022_06_17_150014_create_mst_letter_status', 1),
(13, '2022_06_17_150015_create_mst_department_group', 1),
(14, '2022_06_17_150016_create_mst_department', 1);

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
  `created_at` datetime NOT NULL DEFAULT '2022-08-29 01:45:39',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_company`
--

INSERT INTO `mst_company` (`id`, `code`, `name`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'PTAI', 'PT Tanah Air Indonesia', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(2, 'PGS', 'PT Garuda Sampoerna', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(3, 'CCMJ', 'CV Cipta Mangun Jaya', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(4, 'PAHI', 'PT Anak Halal Ihsan', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(5, 'PJWP', 'PT Jayabaya Wijaya Purbaya', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_department`
--

CREATE TABLE `mst_department` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(10) UNSIGNED DEFAULT NULL,
  `doc_ref` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2022-08-29 01:45:39',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_department`
--

INSERT INTO `mst_department` (`id`, `code`, `name`, `group_id`, `doc_ref`, `user_id`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '9101', 'KLINIK ANAK', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(2, '9103', 'KLINIK BEDAH', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(3, '9106', 'KLINIK DARAH & KANKER', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(4, '9107', 'KLINIK LAMBUNG & PENCERNAAN', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(5, '9108', 'KLINIK KEBIDANAN & KANDUNGAN', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(6, '9110', 'KLINIK JANTUNG', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(7, '9111', 'KLINIK KULIT DAN KELAMIN', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(8, '9112', 'KLINIK MATA', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(9, '9113', 'KLINIK SYARAF', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(10, '9114', 'KLINIK JIWA', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(11, '9115', 'KLINIK PARU', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(12, '9116', 'KLINIK THT', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(13, '9117', 'KLINIK GIGI & MULUT', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(14, '9118', 'KLINIK UMUM', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(15, '9119', 'KLINIK PSIKOLOGI', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(16, '9120', 'KLINIK KOSMETIK', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(17, '9121', 'KLINIK DEMENSIA ALZHEIMER', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(18, '9122', 'KLINIK KONSULTASI GIZI', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(19, '9123', 'KLINIK KONSULTASI KELUARGA SAKINAH', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(20, '9124', 'KLINIK LAKTASI PENY. BUMIL & MENYUSUI', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(21, '9125', 'KLINIK AKUPUNKTUR', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(22, '9126', 'KLINIK INFORMASI DIABETES', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(23, '9128', 'KLINIK FISIOTERAPI', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(24, '9129', 'KLINIK KARYAWAN', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(25, '9130', 'KLINIK ORTHOPEDI', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(26, '9131', 'KLINIK GIZI', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(27, '9140', 'KLINIK NEUROLOGI ALAT ', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(28, '9141', 'KLINIK NEUROLOGI', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(29, '9144', 'KLINIK DALAM', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(30, '9148', 'KLINIK AKUPUNTUR', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(31, '9154', 'REHABILITASI MEDIK', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(32, '9155', 'KLINIK AUTIS ', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(33, '9162', 'KLINIK KECANTIKAN ', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(34, '9165', 'KLINIK UROLOGI', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(35, '9166', 'KLINIK ORTHOPEDI', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(36, '9169', 'BALKESMAS CIPINANG MUARA', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(37, '9170', 'KLINIK VAKSIN', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(38, '9171', 'KLINIK TRIAGE', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(39, '9172', 'KLINIK ENDOKRINOLOGI', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(40, '9174', 'MANAJER RAWAT JALAN', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(41, '9177', 'KLINIK MUMUM', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(42, '9179', 'KLINIK JIWA MMPI', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(43, '9180', 'KLINIK DOT', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(44, '9181', 'KLINIK MEMORY', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(45, '9214', 'KA. URUSAN PELAYANAN FARMASI 2 & STERILISASI', 2, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(46, '9310', 'MUZDALIFAH ATAS', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(47, '9311', 'MUZDALIFAH BAWAH', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(48, '9313', 'ARAFAH BAWAH', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(49, '9314', 'MULTAZAM BAWAH', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(50, '9320', 'SHAFA SHAFA', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(51, '9321', 'ARAFAH ATAS', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(52, '9322', 'MULTAZAM ATAS', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(53, '9323', 'STROKE CENTER', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(54, '9331', 'MATAHARI DUA', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(55, '9332', 'MARWAH ATAS', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(56, '9333', 'MARWAH BAWAH', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(57, '9341', 'MELATI', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(58, '9342', 'SHAFA AN-NISA', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(59, '9350', 'ICU', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(60, '9351', 'PERINATOLOGI', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(61, '9352', 'HCU', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(62, '9353', 'BADAR ', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(63, '9354', 'ZAM - ZAM', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(64, '9355', 'ICCU', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(65, '9356', 'NICU', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(66, '9357', 'PICU', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(67, '9358', 'KEMOTERAPI', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(68, '9359', 'LUKA BAKAR', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(69, '9362', 'AS-SAKINAH', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(70, '9403', 'HEMODIALISA', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(71, '9404', 'KA URUSAN LABORATORIUM', 13, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(72, '9405', 'PATOLOGI ANATOMI', 13, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(73, '9406', 'BANK DARAH', 13, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(74, '9410', 'KAMAR BEDAH', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(75, '9411', 'ANESTESI', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(76, '9413', 'KA. URUSAN PELAYANAN GIZI RANAP & RAJAL', 15, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(77, '9414', 'MEDICAL CHECK UP ', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(78, '9415', 'MANAJER PELAYANAN PENUNJANG', 13, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(79, '9454', 'ODC', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(80, '9510', 'UNIT GAWAT DARURAT', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(81, '9601', 'KOMITE MEDIK', 8, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(82, '9602', 'KOMITE PROFESI KESEHATAN LAIN', 6, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(83, '9603', 'KOMITE KEPERAWATAN', 7, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(84, '9604', 'KETUA KOMKORDIK', 11, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(85, '9610', 'KA. URUSAN  PELAYANAN MAKANAN', 3, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(86, '9612', 'KA. URUSAN MEKANIK & ELEKTRIK', 15, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(87, '9616', 'SPI', 21, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(88, '9618', 'MANAJER SIRS', 20, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(89, '9619', 'PENELITIAN & PENGEMBANGAN', 19, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(90, '9620', 'KETUA KOMITE MUTU DAN MANAJEMEN RISIKO', 5, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(91, '9621', 'KOMITE ETIK', 6, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(92, '9623', 'GEN MANAJER PEL KEPERAWATAN', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(93, '9624', 'ASS. DIR. BID. MED. & PKL', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(94, '9626', 'KA URUSAN PELAYANAN KESEHATAN MASYARAKAT', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(95, '9627', 'MANAJER GIZI', 15, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(96, '9628', 'MANAJER REKAM MEDIS', 18, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(97, '9629', 'KA. URUSAN PENDAFTARAN  & PENG. BERKAS', 18, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(98, '9631', 'KA. URUSAN PEMELIHARAAN SARANA FISIK', 15, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(99, '9632', 'KA. URUSAN KESEHATAN LINGKUNGAN & LINEN', 15, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(100, '9633', 'MANAJER PENUNJANG', 15, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(101, '9634', 'KA. URUSAN LOGISTIK PERBEKALAN UMUM ', 15, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(102, '9635', 'KA. URUSAN LOGISTIK PERBEKALAN KESEHATAN ', 15, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(103, '9636', 'MANAJER YANUM & LEGAL', 22, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(104, '9637', 'KA.URUSAN YANUM & LEGAL', 22, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(105, '9638', 'KA. URUSAN PERKANTORAN', 22, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(106, '9639', 'MANAJER PEMASARAN', 14, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(107, '9640', 'MANAJER KEUANGAN', 4, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(108, '9641', 'KA URUSAN AKUNTANSI MANAJEMEN & PAJAK', 4, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(109, '9642', 'KA. URUSAN ADMINISTRASI PASIEN', 4, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(110, '9643', 'KA. URUSAN PENAGIHAN', 4, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(111, '9644', 'KA. URUSAN PERBENDAHARAAN', 4, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(112, '9647', 'KA URUSAN AKUTANSI KEUANGAN', 4, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(113, '9648', 'MANAJER SDI', 19, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(114, '9649', 'MANAJER BINROH', 1, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(115, '9650', 'KA. URUSAN PEMBINAAN AGAMA & DAKWAH', 1, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(116, '9651', 'KA. URUSAN NAFSUL MUTMAINNAH', 1, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(117, '9652', 'KA. URUSAN POLIKLINIK RAUDHAH', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(118, '9654', 'KA. URUSAN POLIKLINIK DEPAN', 17, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(119, '9655', 'MANAJER RAWAT INAP', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(120, '9656', 'MANAJER FARMASI & STERILISASI', 2, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(121, '9657', 'KA URUSAN RADIOLOGI', 13, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(122, '9658', 'KA URUSAN DIAGNOSTIK', 13, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(123, '9662', 'KA. URUSAN PELAYANAN FARMASI I', 2, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(124, '9666', 'KA SIE PELAYANAN PEGAWAI', 19, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(125, '9667', 'KA SIE PENGEMBANGAN PEGAWAI', 19, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(126, '9668', 'KA.UR  PENDIDIKAN DAN PELATIHAN', 19, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(127, '9669', 'KA. URUSAN PENGOLAHAN DATA & PELAPORAN', 18, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(128, '9670', 'KA. URUSAN  HUMAS & PENCITRAAN', 22, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(129, '9671', 'KOMITE MUTU DAN TENAGA KESEHATAN LAINYA', 6, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(130, '9672', 'KA. URUSAN PENGEMBANGAN PASAR', 14, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(131, '9673', 'SIRS', 20, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(132, '9674', 'KA SIE HARDWARE', 20, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(133, '9675', 'KA.UR PELAYANAN PELANGGAN', 14, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(134, '9676', 'FASILITAS SARANA & PRASARANA', 5, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(135, '9677', 'K3 DAN MANAJEMEN RISIKO', 5, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(136, '9678', 'KESELAMATAN PASIEN', 5, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(137, '9679', 'MUTU', 5, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(138, '9680', 'ASDIR MED & PROFESI LAIN', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(139, '9681', 'ASDIR KEPERAWATAN', 16, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(140, '9683', 'KETUA KOMITE PPIRS', 10, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(141, '9684', 'KETUA KOMITE PKRS', 9, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(142, '9875', 'ASDIR MEDIS &  KESEHATAN', 12, 0, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(143, '9904', 'DOKUMEN KONTROL', 5, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_department_group`
--

CREATE TABLE `mst_department_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2022-08-29 01:45:39',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_department_group`
--

INSERT INTO `mst_department_group` (`id`, `code`, `name`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, NULL, 'BINROH', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(2, NULL, 'FARMASI', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(3, NULL, 'GIZI', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(4, NULL, 'KEUANGAN', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(5, NULL, 'KMMR', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(6, NULL, 'KOMITE', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(7, NULL, 'KOMITE KEPERAWATAN', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(8, NULL, 'KOMITE MEDIK', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(9, NULL, 'KOMITE PKRS', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(10, NULL, 'KOMITE PPIRS', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(11, NULL, 'KOMKORDIK', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(12, NULL, 'LAIN-LAIN', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(13, NULL, 'PEL. PENUNJANG', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(14, NULL, 'PEMASARAN', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(15, NULL, 'PENUNJANG', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(16, NULL, 'RAWAT INAP', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(17, NULL, 'RAWAT JALAN', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(18, NULL, 'RMK', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(19, NULL, 'SDI', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(20, NULL, 'SIRS', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(21, NULL, 'SPI', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39'),
(22, NULL, 'YANUM', 0, 'Migrasi', '2022-08-29 01:45:39', NULL, '2022-08-29 01:45:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_letter_status`
--

CREATE TABLE `mst_letter_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2022-08-29 01:45:39',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_letter_status`
--

INSERT INTO `mst_letter_status` (`id`, `name`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Ditutup', 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(2, 'Distribusi', 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(3, 'Dibuka', 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_letter_type`
--

CREATE TABLE `mst_letter_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2022-08-29 01:45:39',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_letter_type`
--

INSERT INTO `mst_letter_type` (`id`, `name`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Edaran', 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(2, 'Intruksi', 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(3, 'Jadwal Dokter Jaga', 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(4, 'Pengumuman', 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(5, 'Surat Keputusan', 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40');

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
  `created_at` datetime NOT NULL DEFAULT '2022-08-29 01:45:39',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_user`
--

INSERT INTO `mst_user` (`id`, `nik`, `full_name`, `gender`, `birth_place`, `birth_date`, `email`, `phone_number`, `home_number`, `address`, `join_date`, `religion_id`, `position_id`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '2022082812345', 'Developer', 'l', 'Bekasi', '1998-10-07', 'developer.pro@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(2, '2022082854321', 'Administrator', 'l', 'Bekasi', '1990-10-09', 'administrator.mtd@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40');

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
  `created_at` datetime NOT NULL DEFAULT '2022-08-29 01:45:39',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stg_login`
--

INSERT INTO `stg_login` (`id`, `username`, `password`, `email_verified_at`, `remember_token`, `user_id`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'developer', '$2y$10$XIbRQU0BuIsDDpjDQEckTONqzS3Ryrtlgj0V4/hSNFr8A1o/KYT8q', NULL, NULL, 1, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(2, 'admin_mtd', '$2y$10$8Jeb9W0Xnux/YDbwQdHjneMgguG9bj9in56sppzAdLemLveexPxBi', NULL, NULL, 2, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40');

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
  `created_at` datetime NOT NULL DEFAULT '2022-08-29 01:45:39',
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
  `created_at` datetime NOT NULL DEFAULT '2022-08-29 01:45:39',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stg_menu`
--

INSERT INTO `stg_menu` (`id`, `title`, `icon`, `url`, `parent`, `main_menu_id`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Home', 'lni lni-home', '/', 0, NULL, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(2, 'Manajemen Surat', 'lni lni-popup', NULL, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(3, 'Master', 'lni lni-layers', NULL, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(4, 'Pengaturan', 'lni lni-cog', NULL, 1, NULL, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40');

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
  `created_at` datetime NOT NULL DEFAULT '2022-08-29 01:45:39',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stg_submenu`
--

INSERT INTO `stg_submenu` (`id`, `title`, `icon`, `url`, `menu_id`, `disabled`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Surat Masuk', 'bx bx-download', '/manajemen/surat-masuk', 2, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(2, 'Surat Terkirim', 'bx bx-send', '/manajemen/surat-terkirim', 2, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(3, 'Surat Keluar', 'bx bx-mail-send', '/manajemen/surat-keluar', 2, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(4, 'Arsip Surat', 'bx bx-archive', '/manajemen/arsip-surat', 2, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(5, 'Sampah Surat', 'bx bx-trash', '/manajemen/sampah-surat', 2, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(6, 'Perusahaan', 'bi bi-arrow-right-short', '/master/perusahaan', 3, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(7, 'Jenis Surat', 'bi bi-arrow-right-short', '/master/jenis-surat', 3, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(8, 'Status Surat', 'bi bi-arrow-right-short', '/master/status-surat', 3, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(9, 'Departemen', 'bi bi-arrow-right-short', '/master/departemen', 3, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(10, 'Kelompok Departemen', 'bi bi-arrow-right-short', '/master/kelompok-departemen', 3, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(11, 'Asal Surat', 'bi bi-arrow-right-short', '/master/asal-surat', 3, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(12, 'Kategori Dokumen', 'bi bi-arrow-right-short', '/master/kategori-dokumen', 3, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(13, 'Klasifikasi Surat', 'bi bi-arrow-right-short', '/master/klasifikasi-surat', 3, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(14, 'Hari Libur', 'bi bi-arrow-right-short', '/master/hari-libur', 3, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(15, 'Kelurahan/Desa', 'bi bi-arrow-right-short', '/master/kelurahan', 3, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(16, 'Kecamatan', 'bi bi-arrow-right-short', '/master/kecamatan', 3, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(17, 'Kota', 'bi bi-arrow-right-short', '/master/kota', 3, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(18, 'Provinsi', 'bi bi-arrow-right-short', '/master/provinsi', 3, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(19, 'Negara', 'bi bi-arrow-right-short', '/master/negara', 3, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(20, 'Provider', 'bi bi-building', '/pengaturan/provider', 4, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(21, 'Bahasa', 'lni lni-library', '/pengaturan/bahasa', 4, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(22, 'FAQ', 'bi bi-exclamation-triangle', '/pengaturan/faq', 4, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40'),
(23, 'Dokumentasi', 'bi bi-file-earmark-code', '/pengaturan/dokumentasi', 4, 0, 'Migrasi', '2022-08-29 01:45:40', NULL, '2022-08-29 01:45:40');

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
-- Indeks untuk tabel `mst_department`
--
ALTER TABLE `mst_department`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_department_group`
--
ALTER TABLE `mst_department_group`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_letter_status`
--
ALTER TABLE `mst_letter_status`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `mst_company`
--
ALTER TABLE `mst_company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mst_department`
--
ALTER TABLE `mst_department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `mst_department_group`
--
ALTER TABLE `mst_department_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `mst_letter_status`
--
ALTER TABLE `mst_letter_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
