-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2023 at 05:34 PM
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
-- Database: `db_spk_karyawan_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kriteria` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Benefit','Cost') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Benefit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `nama_kriteria`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Pengalaman Kerja', 'Benefit', NULL, NULL),
(2, 'Kemampuan Berbahasa', 'Benefit', NULL, NULL),
(3, 'Pendidikan', 'Benefit', NULL, NULL),
(4, 'Kehadiran', 'Cost', NULL, NULL),
(5, 'Kedisiplinan', 'Cost', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisis`
--

CREATE TABLE `divisis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_divisi` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisis`
--

INSERT INTO `divisis` (`id`, `nama_divisi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Pemasaran', 'Divisi pemasaran berperan penting dalam mencapai tujuan bisnis perusahaan dengan meningkatkan penjualan, membangun merek yang kuat, dan memenuhi kebutuhan pelanggan.', NULL, NULL),
(2, 'Personalia', 'Divisi personalia berperan untuk memastikan organisasi memiliki sumber daya manusia yang berkualitas, termotivasi, dan berkompeten untuk mencapai tujuan bisnis perusahaan.', NULL, NULL),
(3, 'Produksi', 'Divisi ini berperan penting dalam memastikan bahwa produk yang dihasilkan memenuhi standar kualitas, diproduksi dengan biaya yang efektif, dan memenuhi permintaan pasar dengan tepat waktu.', NULL, NULL),
(4, 'Pembelanjaan', 'Divisi ini berperan penting dalam menjaga kelancaran rantai pasokan, menjamin ketersediaan sumber daya yang diperlukan, dan memastikan kepatuhan terhadap prosedur dan kebijakan pembelian perusahaan.', NULL, NULL),
(5, 'UX', 'Divisi ini bertanggung jawab untuk meningkatkan pengalaman pengguna dalam menggunakan produk atau layanan digital perusahaan.', '2023-05-21 02:50:43', '2023-05-21 05:41:40'),
(17, 'DevOps', 'Tujuan utama dari DevOps adalah untuk mengatasi tantangan yang muncul dalam siklus pengembangan perangkat lunak.', '2023-06-04 10:13:05', '2023-06-04 10:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `departement_id` bigint UNSIGNED DEFAULT NULL,
  `nama_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `departement_id`, `nama_karyawan`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, 'Emily Stephana Waty', 'Blimbing, Malang', NULL, NULL),
(2, 1, 'Widiyanti Putri', 'Klojen, Malang', NULL, NULL),
(3, 2, 'Novianto Aldo Wibisono', 'Pakis, Malang', NULL, NULL),
(4, 3, 'Rashid Irawan Mangunkusumo', 'Blimbing, Malang', NULL, NULL),
(5, 4, 'Tiara Dharani Josodirdjo', 'Sukun, Malang', NULL, NULL),
(6, 3, 'Ahmad Abdullah', 'Karangploso, Malang', NULL, NULL),
(7, 4, 'Linda Wijaya', 'Lawang, Malang', NULL, NULL),
(8, 2, 'Budi Hartono', 'Pakis, Malang', NULL, NULL);

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
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `criteria_id` bigint UNSIGNED DEFAULT NULL,
  `sub_criteria_id` bigint UNSIGNED DEFAULT NULL,
  `year` year NOT NULL DEFAULT '2023',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `employee_id`, `criteria_id`, `sub_criteria_id`, `year`, `created_at`, `updated_at`) VALUES
(26, 2, 1, 1, 2023, '2023-06-03 12:16:41', '2023-06-03 12:16:41'),
(27, 2, 2, 6, 2023, '2023-06-03 12:16:41', '2023-06-03 12:16:41'),
(28, 2, 3, 8, 2023, '2023-06-03 12:16:41', '2023-06-03 12:16:41'),
(29, 2, 4, 11, 2023, '2023-06-03 12:16:41', '2023-06-03 12:16:41'),
(30, 2, 5, 15, 2023, '2023-06-03 12:16:41', '2023-06-03 12:16:41'),
(31, 4, 1, 3, 2023, '2023-06-03 12:17:10', '2023-06-03 12:17:10'),
(32, 4, 2, 4, 2023, '2023-06-03 12:17:10', '2023-06-03 12:17:10'),
(33, 4, 3, 9, 2023, '2023-06-03 12:17:10', '2023-06-03 12:17:10'),
(34, 4, 4, 12, 2023, '2023-06-03 12:17:10', '2023-06-03 12:17:10'),
(35, 4, 5, 14, 2023, '2023-06-03 12:17:10', '2023-06-03 12:17:10'),
(36, 5, 1, 1, 2023, '2023-06-03 12:17:43', '2023-06-03 12:17:43'),
(37, 5, 2, 4, 2023, '2023-06-03 12:17:43', '2023-06-03 12:17:43'),
(38, 5, 3, 9, 2023, '2023-06-03 12:17:43', '2023-06-03 12:17:43'),
(39, 5, 4, 11, 2023, '2023-06-03 12:17:43', '2023-06-03 12:17:43'),
(40, 5, 5, 14, 2023, '2023-06-03 12:17:43', '2023-06-03 12:17:43'),
(41, 6, 1, 1, 2023, '2023-06-03 12:18:04', '2023-06-03 12:18:04'),
(42, 6, 2, 4, 2023, '2023-06-03 12:18:04', '2023-06-03 12:18:04'),
(43, 6, 3, 7, 2023, '2023-06-03 12:18:04', '2023-06-03 12:18:04'),
(44, 6, 4, 10, 2023, '2023-06-03 12:18:04', '2023-06-03 12:18:04'),
(45, 6, 5, 13, 2023, '2023-06-03 12:18:04', '2023-06-03 12:18:04'),
(46, 7, 1, 3, 2023, '2023-06-03 12:18:40', '2023-06-03 12:18:40'),
(47, 7, 2, 6, 2023, '2023-06-03 12:18:40', '2023-06-03 12:18:40'),
(48, 7, 3, 9, 2023, '2023-06-03 12:18:40', '2023-06-03 12:18:40'),
(49, 7, 4, 12, 2023, '2023-06-03 12:18:40', '2023-06-03 12:18:40'),
(50, 7, 5, 15, 2023, '2023-06-03 12:18:40', '2023-06-03 12:18:40'),
(76, 3, 1, 1, 2022, '2023-06-03 21:44:27', '2023-06-03 21:44:27'),
(77, 3, 2, 4, 2022, '2023-06-03 21:44:27', '2023-06-03 21:44:27'),
(78, 3, 3, 7, 2022, '2023-06-03 21:44:27', '2023-06-03 21:44:27'),
(79, 3, 4, 10, 2022, '2023-06-03 21:44:27', '2023-06-03 21:44:27'),
(80, 3, 5, 13, 2022, '2023-06-03 21:44:27', '2023-06-03 21:44:27'),
(86, 3, 1, 2, 2023, '2023-06-04 01:44:49', '2023-06-04 01:44:49'),
(87, 3, 2, 4, 2023, '2023-06-04 01:44:49', '2023-06-04 01:44:49'),
(88, 3, 3, 7, 2023, '2023-06-04 01:44:49', '2023-06-04 01:44:49'),
(89, 3, 4, 10, 2023, '2023-06-04 01:44:49', '2023-06-04 01:44:49'),
(90, 3, 5, 13, 2023, '2023-06-04 01:44:49', '2023-06-04 01:44:49'),
(126, 1, 1, 3, 2023, '2023-06-04 10:08:49', '2023-06-04 10:08:49'),
(127, 1, 2, 5, 2023, '2023-06-04 10:08:49', '2023-06-04 10:08:49'),
(128, 1, 3, 9, 2023, '2023-06-04 10:08:49', '2023-06-04 10:08:49'),
(129, 1, 4, 10, 2023, '2023-06-04 10:08:49', '2023-06-04 10:08:49'),
(130, 1, 5, 13, 2023, '2023-06-04 10:08:49', '2023-06-04 10:08:49');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_11_014317_create_divisi_table', 2),
(7, '2023_05_17_191256_create_criterias_table', 3),
(8, '2023_05_22_125123_drop_employees_table', 4),
(9, '2023_05_22_131123_create_employees_table', 5),
(10, '2023_05_22_134740_drop_employees_table', 6),
(11, '2023_05_22_162523_drop_weights_table', 7),
(12, '2023_05_22_162708_create_weights_table', 8),
(13, '2023_05_22_235512_create_sub_criterias_table', 9),
(14, '2023_05_29_123029_add_photo_and_level_on_users_table', 10),
(15, '2023_05_29_123534_add_level_on_users_table', 11),
(16, '2023_05_29_163107_create_scores_table', 12),
(17, '2023_06_03_143820_create_rankings_table', 13),
(18, '2023_06_03_164746_create_histories_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('novaldo@linkedco.com', '$2y$10$PVkR2coMWw8QFCC3O4XZzu.C/AubdvHY02OMw5hzdA5lDKr3rUShS', '2023-04-28 23:00:42');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rankings`
--

CREATE TABLE `rankings` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rankings`
--

INSERT INTO `rankings` (`id`, `employee_id`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 0.90, '2023-06-03 07:44:02', '2023-06-03 22:33:01'),
(2, 2, 0.45, '2023-06-03 07:44:02', '2023-06-03 22:33:01'),
(3, 3, 0.29, '2023-06-03 07:44:02', '2023-06-03 22:33:01'),
(4, 4, 0.51, '2023-06-03 07:44:02', '2023-06-03 22:33:01'),
(5, 5, 0.32, '2023-06-03 07:44:02', '2023-06-03 22:33:01'),
(6, 6, 0.18, '2023-06-03 07:44:02', '2023-06-03 22:33:01'),
(7, 7, 0.65, '2023-06-03 07:44:02', '2023-06-03 22:33:01'),
(8, 8, 0.67, '2023-06-03 07:44:02', '2023-06-03 22:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED DEFAULT NULL,
  `criteria_id` bigint UNSIGNED DEFAULT NULL,
  `sub_criteria_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `employee_id`, `criteria_id`, `sub_criteria_id`, `created_at`, `updated_at`) VALUES
(6, 3, 1, 2, '2023-06-03 00:55:42', '2023-06-03 00:55:42'),
(7, 3, 2, 4, '2023-06-03 00:55:35', '2023-06-03 00:55:35'),
(8, 3, 3, 7, '2023-06-03 00:55:26', '2023-06-03 00:55:26'),
(9, 3, 4, 10, '2023-06-03 00:55:18', '2023-06-03 00:55:18'),
(10, 3, 5, 13, '2023-06-03 00:55:07', '2023-06-03 00:55:07'),
(11, 2, 1, 1, '2023-06-01 01:08:53', '2023-06-01 01:08:53'),
(12, 2, 2, 6, '2023-06-01 01:08:53', '2023-06-01 01:08:53'),
(13, 2, 3, 8, '2023-06-01 01:08:53', '2023-06-01 01:08:53'),
(14, 2, 4, 11, '2023-06-01 01:08:53', '2023-06-01 01:08:53'),
(15, 2, 5, 15, '2023-06-01 01:08:53', '2023-06-01 01:08:53'),
(16, 4, 1, 3, '2023-06-01 01:11:33', '2023-06-01 01:11:33'),
(17, 4, 2, 4, '2023-06-01 01:11:33', '2023-06-01 01:11:33'),
(18, 4, 3, 9, '2023-06-01 01:11:33', '2023-06-01 01:11:33'),
(19, 4, 4, 12, '2023-06-01 01:11:33', '2023-06-01 01:11:33'),
(20, 4, 5, 14, '2023-06-01 01:11:33', '2023-06-01 01:11:33'),
(21, 5, 1, 1, '2023-06-01 01:13:24', '2023-06-01 01:13:24'),
(22, 5, 2, 4, '2023-06-01 01:13:24', '2023-06-01 01:13:24'),
(23, 5, 3, 9, '2023-06-01 01:13:24', '2023-06-01 01:13:24'),
(24, 5, 4, 11, '2023-06-01 01:13:24', '2023-06-01 01:13:24'),
(25, 5, 5, 14, '2023-06-01 01:13:24', '2023-06-01 01:13:24'),
(36, 6, 1, 1, '2023-06-02 04:45:19', '2023-06-02 04:45:19'),
(37, 6, 2, 4, '2023-06-02 04:45:19', '2023-06-02 04:45:19'),
(38, 6, 3, 7, '2023-06-02 04:45:19', '2023-06-02 04:45:19'),
(39, 6, 4, 10, '2023-06-02 04:45:19', '2023-06-02 04:45:19'),
(40, 6, 5, 13, '2023-06-02 04:45:19', '2023-06-02 04:45:19'),
(41, 7, 1, 3, '2023-06-02 04:45:38', '2023-06-02 04:45:38'),
(42, 7, 2, 6, '2023-06-02 04:45:38', '2023-06-02 04:45:38'),
(43, 7, 3, 9, '2023-06-02 04:45:38', '2023-06-02 04:45:38'),
(44, 7, 4, 12, '2023-06-02 04:45:38', '2023-06-02 04:45:38'),
(45, 7, 5, 15, '2023-06-02 04:45:38', '2023-06-02 04:45:38'),
(111, 1, 1, 3, '2023-06-03 12:12:41', '2023-06-03 12:12:41'),
(112, 1, 2, 5, '2023-06-03 12:12:41', '2023-06-03 12:12:41'),
(113, 1, 3, 9, '2023-06-03 12:12:41', '2023-06-03 12:12:41'),
(114, 1, 4, 10, '2023-06-03 12:12:41', '2023-06-03 12:12:41'),
(115, 1, 5, 13, '2023-06-03 12:12:41', '2023-06-03 12:12:41'),
(136, 8, 1, 3, '2023-06-03 22:24:14', '2023-06-03 22:24:14'),
(137, 8, 2, 5, '2023-06-03 22:24:14', '2023-06-03 22:24:14'),
(138, 8, 3, 9, '2023-06-03 22:24:14', '2023-06-03 22:24:14'),
(139, 8, 4, 10, '2023-06-03 22:24:14', '2023-06-03 22:24:14'),
(140, 8, 5, 13, '2023-06-03 22:24:14', '2023-06-03 22:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `sub_criterias`
--

CREATE TABLE `sub_criterias` (
  `id` bigint UNSIGNED NOT NULL,
  `criteria_id` bigint UNSIGNED DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_criterias`
--

INSERT INTO `sub_criterias` (`id`, `criteria_id`, `keterangan`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, '<1 tahun', 0.25, NULL, '2023-06-03 04:27:24'),
(2, 1, '1-3 tahun', 0.50, NULL, '2023-06-03 04:27:30'),
(3, 1, '>3 tahun', 1.00, NULL, '2023-06-03 04:27:34'),
(4, 2, 'Hanya menguasai satu bahasa', 0.25, NULL, '2023-06-03 04:27:40'),
(5, 2, 'Menguasai dua bahasa', 0.50, NULL, '2023-06-03 04:27:45'),
(6, 2, 'Menguasai tiga bahasa atau lebih', 1.00, NULL, '2023-06-03 04:28:25'),
(7, 3, 'SMA/SMK', 0.25, NULL, '2023-06-03 04:28:00'),
(8, 3, 'D3', 0.50, NULL, '2023-06-03 04:28:05'),
(9, 3, 'S1', 1.00, NULL, '2023-06-03 04:28:29'),
(10, 4, '1-2 kali absen dalam sebulan', 0.25, NULL, '2023-06-03 04:28:37'),
(11, 4, '3-4 kali absen dalam sebulan', 0.50, NULL, '2023-06-03 04:28:42'),
(12, 4, '>4 kali absen dalam sebulan', 1.00, NULL, '2023-06-03 04:28:47'),
(13, 5, '1-2 kali terlambat dalam sebulan', 0.25, NULL, '2023-06-03 04:28:52'),
(14, 5, '3-4 kali terlambat dalam sebulan', 0.50, NULL, '2023-06-03 04:28:56'),
(15, 5, '>4 kali terlambat dalam sebulan', 1.00, NULL, '2023-06-03 04:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `photo`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Novaldo', 'photos/8Gx5L2kTqkDMfOXkVOy4HyJKphifDK9X7Xtdu8Bf.png', 3, 'novaldo@linkedco.com', NULL, '$2y$10$DHH.gnPHJNIY.S8HGvd50.4xA.qDk4ADzszImsVe5LW8tmkKXykBS', 'zEwMAvYfs2KR14rysUom3czIfMaXqnbPi40c405pvlLgt04igtbdzZ72ikRr', '2023-04-28 22:57:44', '2023-06-04 05:41:35'),
(3, 'Emily', 'photos/JDlLNQ2TnJgvHQFM7bWNwBQlj0nFGn50Os1y38sy.jpg', 2, 'emily@linkedco.com', NULL, '$2y$10$lDE10yegWdoXlmTgC/XJ8eYHW/rrMGeaq30VzJKQfTt3/EoLnI85m', NULL, '2023-05-29 06:41:38', '2023-05-29 07:30:47'),
(4, 'Putri', 'photos/lGBfZ3IFBjYmv9HOcPrIQHLyLZYp5pVa0LXBUVoS.png', 1, 'putri@linkedco.com', NULL, '$2y$10$z0jRhaOB9USqQKHsx6dMxuk0m//2a/lvo7TaSlAtrbxkgl4qRzp12', NULL, '2023-05-29 07:01:36', '2023-05-29 07:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id` bigint UNSIGNED NOT NULL,
  `criteria_id` bigint UNSIGNED DEFAULT NULL,
  `nilai` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `criteria_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 0.25, NULL, NULL),
(2, 2, 0.20, NULL, NULL),
(3, 3, 0.20, NULL, NULL),
(4, 4, 0.15, NULL, NULL),
(5, 5, 0.20, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisis`
--
ALTER TABLE `divisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histories_employee_id_foreign` (`employee_id`),
  ADD KEY `histories_criteria_id_foreign` (`criteria_id`),
  ADD KEY `histories_sub_criteria_id_foreign` (`sub_criteria_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rankings_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_employee_id_foreign` (`employee_id`),
  ADD KEY `scores_criteria_id_foreign` (`criteria_id`),
  ADD KEY `scores_sub_criteria_id_foreign` (`sub_criteria_id`);

--
-- Indexes for table `sub_criterias`
--
ALTER TABLE `sub_criterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_criterias_criteria_id_foreign` (`criteria_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `weights_criteria_id_foreign` (`criteria_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `divisis`
--
ALTER TABLE `divisis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rankings`
--
ALTER TABLE `rankings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `sub_criterias`
--
ALTER TABLE `sub_criterias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `weights`
--
ALTER TABLE `weights`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`),
  ADD CONSTRAINT `histories_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `histories_sub_criteria_id_foreign` FOREIGN KEY (`sub_criteria_id`) REFERENCES `sub_criterias` (`id`);

--
-- Constraints for table `rankings`
--
ALTER TABLE `rankings`
  ADD CONSTRAINT `rankings_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`),
  ADD CONSTRAINT `scores_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `scores_sub_criteria_id_foreign` FOREIGN KEY (`sub_criteria_id`) REFERENCES `sub_criterias` (`id`);

--
-- Constraints for table `sub_criterias`
--
ALTER TABLE `sub_criterias`
  ADD CONSTRAINT `sub_criterias_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`);

--
-- Constraints for table `weights`
--
ALTER TABLE `weights`
  ADD CONSTRAINT `weights_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
