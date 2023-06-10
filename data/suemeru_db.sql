-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2023 at 09:57 AM
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
-- Database: `suemeru_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive_dailies`
--

CREATE TABLE `archive_dailies` (
  `arc_daily_id` int UNSIGNED NOT NULL,
  `daily_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daily_xid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_action` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignee` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_private` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive_issues`
--

CREATE TABLE `archive_issues` (
  `arc_issue_id` int UNSIGNED NOT NULL,
  `issue_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_xid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracker` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_action` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignee` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_private` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive_meets`
--

CREATE TABLE `archive_meets` (
  `arc_meeet_id` int UNSIGNED NOT NULL,
  `meet_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meet_xid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meet_project` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meet_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meet_date` date NOT NULL,
  `meet_time` time NOT NULL,
  `meet_preparedby` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meet_locate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meet_attend` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_xid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracker` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_action` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignee` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_private` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dailies`
--

CREATE TABLE `dailies` (
  `daily_id` int UNSIGNED NOT NULL,
  `daily_xid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_action` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignee` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_private` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departemens`
--

CREATE TABLE `departemens` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemens`
--

INSERT INTO `departemens` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Engginering', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(2, 'HSE', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(3, 'Coal & Berging', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(4, 'FAT', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(5, 'HRGA', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(6, 'IT', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(7, 'Logistic', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(8, 'PLANT', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(9, 'PRODUCTION', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(10, 'PURCASHING', '2023-06-09 09:56:38', '2023-06-09 09:56:38');

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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int UNSIGNED NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2023-06-09 09:56:37', '2023-06-09 09:56:37'),
(2, 'PIC', '2023-06-09 09:56:37', '2023-06-09 09:56:37'),
(3, 'Member', '2023-06-09 09:56:37', '2023-06-09 09:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `group_pages`
--

CREATE TABLE `group_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `group_id` bigint UNSIGNED NOT NULL,
  `page_id` bigint UNSIGNED NOT NULL,
  `access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_pages`
--

INSERT INTO `group_pages` (`id`, `group_id`, `page_id`, `access`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(2, 1, 2, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(3, 1, 3, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(4, 1, 4, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(5, 1, 5, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(6, 1, 6, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(7, 1, 7, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(8, 1, 8, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(9, 1, 9, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(10, 1, 10, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(11, 1, 11, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(12, 1, 12, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(13, 1, 13, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(14, 1, 14, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(15, 1, 15, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(16, 1, 16, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(17, 1, 17, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(18, 1, 18, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(19, 1, 19, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(20, 1, 20, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(21, 2, 1, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(22, 2, 2, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(23, 2, 3, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(24, 2, 4, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(25, 2, 5, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(26, 2, 6, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(27, 2, 7, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(28, 2, 8, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(29, 2, 9, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(30, 2, 10, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(31, 2, 11, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(32, 2, 12, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(33, 2, 13, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(34, 2, 14, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(35, 2, 15, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(36, 2, 16, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(37, 2, 17, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(38, 2, 18, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(39, 2, 19, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(40, 2, 20, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(41, 3, 1, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(42, 3, 2, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(43, 3, 3, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(44, 3, 4, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(45, 3, 5, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(46, 3, 6, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(47, 3, 7, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(48, 3, 8, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(49, 3, 9, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(50, 3, 10, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(51, 3, 11, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(52, 3, 12, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(53, 3, 13, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(54, 3, 14, '1', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(55, 3, 15, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(56, 3, 16, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(57, 3, 17, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(58, 3, 18, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(59, 3, 19, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(60, 3, 20, '0', '2023-06-09 09:56:38', '2023-06-09 09:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `issue_id` int UNSIGNED NOT NULL,
  `issue_xid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracker` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_action` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignee` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_private` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meets`
--

CREATE TABLE `meets` (
  `meet_id` int UNSIGNED NOT NULL,
  `meet_xid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meet_project` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meet_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meet_date` date NOT NULL,
  `meet_time` time NOT NULL,
  `meet_preparedby` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meet_locate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meet_attend` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_10_075236_create_meets_table', 1),
(7, '2023_05_29_080214_create_issues_table', 1),
(8, '2023_06_02_180737_create_departemens_table', 1),
(9, '2023_06_05_121329_create_groups_table', 1),
(10, '2023_06_05_123912_create_pages_table', 1),
(11, '2023_06_05_140826_create_group_pages_table', 1),
(12, '2023_06_07_135728_create_dailies_table', 1),
(13, '2023_06_07_222659_create_archives_table', 1),
(14, '2023_06_09_132649_create_archive_issues_table', 1),
(15, '2023_06_09_154641_create_archive_dailies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `action`, `created_at`, `updated_at`) VALUES
(1, 'Meeting', 'Create', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(2, 'Meeting', 'Read', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(3, 'Meeting', 'Update', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(4, 'Meeting', 'Delete', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(5, 'Issue', 'Create', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(6, 'Issue', 'Read', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(7, 'Issue', 'Update', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(8, 'Issue', 'Delete', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(9, 'DWM Report', 'Create', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(10, 'DWM Report', 'Read', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(11, 'DWM Report', 'Update', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(12, 'DWM Report', 'Delete', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(13, 'Archives', 'Create', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(14, 'Archives', 'Read', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(15, 'Archives', 'Update', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(16, 'Archives', 'Delete', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(17, 'User', 'Create', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(18, 'User', 'Read', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(19, 'User', 'Update', '2023-06-09 09:56:38', '2023-06-09 09:56:38'),
(20, 'User', 'Delete', '2023-06-09 09:56:38', '2023-06-09 09:56:38');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` bigint UNSIGNED NOT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `group_id`, `departemen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@bss.com', '2023-06-09 09:56:37', '$2y$10$2IlPXxFdi1ChwQlPYru3V.fAT1.QiXCF/1o39ugFbCtEWeaBCPAzm', 1, '', 'BMUtW1Az2Z', '2023-06-09 09:56:37', '2023-06-09 09:56:37'),
(2, 'PIC', 'pic@bss.com', '2023-06-09 09:56:37', '$2y$10$HLC8FALNjHpJ4WBYuOorheoCdghVLC.vnjXDuSvR4aZa8TJ.sv7x6', 2, '', 'T1i4zmgH80', '2023-06-09 09:56:37', '2023-06-09 09:56:37'),
(3, 'Engginering', 'engginering@bss.com', '2023-06-09 09:56:37', '$2y$10$BgZyGeesM3lZo/EG0NujVerZFFW2vTutIJM9Dhad5cEv/LNjVT1hq', 3, 'Engginering', 'NSXs4E9I3h', '2023-06-09 09:56:37', '2023-06-09 09:56:37'),
(4, 'HSE', 'hse@bss.com', '2023-06-09 09:56:37', '$2y$10$tkYtG6i8wsQbGxn23IL.a.shBuViGR.WOpDXLrEnMYpvigWHnLc3a', 3, 'HSE', 'jNEWaFqYI2', '2023-06-09 09:56:37', '2023-06-09 09:56:37'),
(5, ' & Berging', 'cnb@bss.com', '2023-06-09 09:56:37', '$2y$10$v2D5RWjfkHA03rKI/ubOFe2b7E7HYDeWGxlof2tjc4bey.vh75u9W', 3, ' & Berging', 'tYNcbkq02j', '2023-06-09 09:56:37', '2023-06-09 09:56:37'),
(6, 'FAT', 'fat@bss.com', '2023-06-09 09:56:37', '$2y$10$ztatnS8At47ImmGOvfVhC.KjLyOBocB8Rve2gM3lZntKtmakEMX32', 3, 'FAT', 'IBd8e1bQXF', '2023-06-09 09:56:37', '2023-06-09 09:56:37'),
(7, 'HRGA', 'hrga@bss.com', '2023-06-09 09:56:37', '$2y$10$O90FnTBd7TlOnkxqbkYxTOq5YcoGkDxLxe3YtY.7wTTPuL1Rb/3TK', 3, 'HRGA', '0V4sg8m3sn', '2023-06-09 09:56:37', '2023-06-09 09:56:37'),
(8, 'IT', 'it@bss.com', '2023-06-09 09:56:37', '$2y$10$4aIyDc58XzIP2x1dNN548evW.wtMknO750dHJoqKOGKeqidcwhPwm', 3, 'IT', 'DN7YFvzIvk', '2023-06-09 09:56:37', '2023-06-09 09:56:37'),
(9, 'Logistic', 'logistic@bss.com', '2023-06-09 09:56:37', '$2y$10$TzpKk6mHRGsgWzVn5eGoRuKORVGxp7RdbDZvnj5skw0dGMAkDOMMG', 3, 'Logistic', 'VuuFnwOQfv', '2023-06-09 09:56:37', '2023-06-09 09:56:37'),
(10, 'PLANT', 'plant@bss.com', '2023-06-09 09:56:37', '$2y$10$.wHNqHdldOoLStBljZBB8O/Lkzbcpf5xbi5NdfjNz8hCY01tSeani', 3, 'PLANT', 'uHa8TEzdxm', '2023-06-09 09:56:37', '2023-06-09 09:56:37'),
(11, 'PRODUCTION', 'production@bss.com', '2023-06-09 09:56:37', '$2y$10$s52pijEhGaYKy3MwZiUVW.9gB98j3ZcU5cK0uysSG7Bwb1AbL2c32', 3, 'PRODUCTION', 'w6SA1ocXFg', '2023-06-09 09:56:37', '2023-06-09 09:56:37'),
(12, 'PURCASHING', 'purcashing@bss.com', '2023-06-09 09:56:37', '$2y$10$MrhglbDSBHvcCBR72P5E7.DnLvh6gOP4FL.U6oYyyqqtIKsTuOIbK', 3, 'PURCASHING', '9STY5RMEex', '2023-06-09 09:56:37', '2023-06-09 09:56:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive_dailies`
--
ALTER TABLE `archive_dailies`
  ADD PRIMARY KEY (`arc_daily_id`);

--
-- Indexes for table `archive_issues`
--
ALTER TABLE `archive_issues`
  ADD PRIMARY KEY (`arc_issue_id`);

--
-- Indexes for table `archive_meets`
--
ALTER TABLE `archive_meets`
  ADD PRIMARY KEY (`arc_meeet_id`);

--
-- Indexes for table `dailies`
--
ALTER TABLE `dailies`
  ADD PRIMARY KEY (`daily_id`);

--
-- Indexes for table `departemens`
--
ALTER TABLE `departemens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `group_pages`
--
ALTER TABLE `group_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `meets`
--
ALTER TABLE `meets`
  ADD PRIMARY KEY (`meet_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive_dailies`
--
ALTER TABLE `archive_dailies`
  MODIFY `arc_daily_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `archive_issues`
--
ALTER TABLE `archive_issues`
  MODIFY `arc_issue_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `archive_meets`
--
ALTER TABLE `archive_meets`
  MODIFY `arc_meeet_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dailies`
--
ALTER TABLE `dailies`
  MODIFY `daily_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departemens`
--
ALTER TABLE `departemens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_pages`
--
ALTER TABLE `group_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `issue_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meets`
--
ALTER TABLE `meets`
  MODIFY `meet_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
