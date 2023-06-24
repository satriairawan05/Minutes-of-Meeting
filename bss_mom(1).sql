-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2023 at 02:34 AM
-- Server version: 10.11.3-MariaDB-1
-- PHP Version: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bss_mom`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE `approvals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `approval_histories`
--

CREATE TABLE `approval_histories` (
  `app_his_id` int(10) UNSIGNED NOT NULL,
  `app_module` varchar(255) DEFAULT NULL,
  `app_id` varchar(255) DEFAULT NULL,
  `app_user` varchar(255) DEFAULT NULL,
  `app_status` varchar(255) DEFAULT NULL,
  `app_his_note` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approval_histories`
--

INSERT INTO `approval_histories` (`app_his_id`, `app_module`, `app_id`, `app_user`, `app_status`, `app_his_note`, `created_at`, `updated_at`) VALUES
(1, 'issues', '1', '1', 'Need Revision', 'Bangsatria', '2023-06-24 01:53:43', '2023-06-24 01:53:43'),
(2, 'issues', '1', '1', 'Approved', 'ok', '2023-06-24 01:54:18', '2023-06-24 01:54:18'),
(3, 'issues', '1', '1', 'Approved', 'ok2', '2023-06-24 01:54:32', '2023-06-24 01:54:32'),
(4, 'issues', '1', '1', 'Approved', 'ok3', '2023-06-24 01:55:20', '2023-06-24 01:55:20'),
(5, 'issues', '1', '1', 'Approved', 'ok4', '2023-06-24 01:56:00', '2023-06-24 01:56:00'),
(6, 'issues', '4', '1', 'Approved', 'satr1a', '2023-06-24 01:57:35', '2023-06-24 01:57:35'),
(7, 'issues', '5', '3', 'Approved', 'oks', '2023-06-24 01:59:52', '2023-06-24 01:59:52'),
(8, 'issues', '6', '8', 'Approved', 'bss', '2023-06-24 02:00:21', '2023-06-24 02:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `approval_lists`
--

CREATE TABLE `approval_lists` (
  `app_list_id` int(10) UNSIGNED NOT NULL,
  `app_module` varchar(255) DEFAULT NULL,
  `app_ordinal` varchar(255) DEFAULT NULL,
  `app_user` varchar(255) DEFAULT NULL,
  `app_closer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approval_lists`
--

INSERT INTO `approval_lists` (`app_list_id`, `app_module`, `app_ordinal`, `app_user`, `app_closer`, `created_at`, `updated_at`) VALUES
(2, 'issues', '1', '1', '1', '2023-06-24 01:26:56', '2023-06-24 02:02:07'),
(3, 'issues', '2', '3', '0', '2023-06-24 01:27:54', '2023-06-24 01:56:16'),
(4, 'issues', '3', '8', '0', '2023-06-24 01:37:18', '2023-06-24 01:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `archive_dailies`
--

CREATE TABLE `archive_dailies` (
  `arc_daily_id` int(10) UNSIGNED NOT NULL,
  `daily_id` varchar(255) NOT NULL,
  `daily_xid` varchar(50) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `c_action` longtext NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `assignee` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `is_private` tinyint(4) DEFAULT NULL,
  `priority` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive_issues`
--

CREATE TABLE `archive_issues` (
  `arc_issue_id` int(10) UNSIGNED NOT NULL,
  `issue_id` varchar(255) NOT NULL,
  `issue_xid` varchar(50) NOT NULL,
  `project` varchar(50) NOT NULL,
  `tracker` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `c_action` longtext NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(100) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `assignee` varchar(100) NOT NULL,
  `is_private` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive_meets`
--

CREATE TABLE `archive_meets` (
  `arc_meeet_id` int(10) UNSIGNED NOT NULL,
  `meet_id` varchar(255) NOT NULL,
  `meet_xid` varchar(50) NOT NULL,
  `meet_project` varchar(20) NOT NULL,
  `meet_name` varchar(100) NOT NULL,
  `meet_date` date NOT NULL,
  `meet_time` time NOT NULL,
  `meet_preparedby` varchar(100) NOT NULL,
  `meet_locate` varchar(100) NOT NULL,
  `meet_attend` varchar(100) NOT NULL,
  `issue_id` varchar(255) NOT NULL,
  `issue_xid` varchar(50) NOT NULL,
  `project` varchar(50) NOT NULL,
  `tracker` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `c_action` longtext NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(100) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `assignee` varchar(100) NOT NULL,
  `is_private` tinyint(4) DEFAULT NULL,
  `archive_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dailies`
--

CREATE TABLE `dailies` (
  `daily_id` int(10) UNSIGNED NOT NULL,
  `daily_xid` varchar(50) NOT NULL,
  `tracker_id` varchar(255) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `c_action` longtext NOT NULL,
  `description_daily` longtext NOT NULL,
  `status` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `assignee` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `is_private` tinyint(4) DEFAULT NULL,
  `is_open` tinyint(1) NOT NULL DEFAULT 1,
  `priority` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_approvals`
--

CREATE TABLE `daily_approvals` (
  `dai_app_id` int(10) UNSIGNED NOT NULL,
  `daily_id` varchar(255) DEFAULT NULL,
  `app_list_id` varchar(255) DEFAULT NULL,
  `dai_app_user` varchar(255) DEFAULT NULL,
  `dai_app_date` date DEFAULT NULL,
  `dai_app_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_trackers`
--

CREATE TABLE `daily_trackers` (
  `tracker_id` int(10) UNSIGNED NOT NULL,
  `tracker_header` varchar(255) NOT NULL,
  `tracker_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departemens`
--

CREATE TABLE `departemens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemens`
--

INSERT INTO `departemens` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ENGINEERING', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(2, 'HSE', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(3, 'COAL & BERGING', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(4, 'FAT', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(5, 'HRGA', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(6, 'IT', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(7, 'LOGISTIC', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(8, 'PLANT', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(9, 'PRODUCTION', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(10, 'PURCASHING', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(11, 'MANAGEMENT', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(12, 'OPERATION', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(13, 'BOD', '2023-06-24 01:23:11', '2023-06-24 01:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(2, 'Direksi', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(3, 'Member', '2023-06-24 01:23:10', '2023-06-24 01:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `group_pages`
--

CREATE TABLE `group_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `access` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_pages`
--

INSERT INTO `group_pages` (`id`, `group_id`, `page_id`, `access`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(2, 1, 2, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(3, 1, 3, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(4, 1, 4, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(5, 1, 5, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(6, 1, 6, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(7, 1, 7, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(8, 1, 8, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(9, 1, 9, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(10, 1, 10, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(11, 1, 11, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(12, 1, 12, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(13, 1, 13, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(14, 1, 14, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(15, 1, 15, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(16, 1, 16, '1', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(17, 1, 17, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(18, 1, 18, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(19, 1, 19, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(20, 1, 20, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(21, 1, 21, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(22, 1, 22, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(23, 2, 1, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(24, 2, 2, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(25, 2, 3, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(26, 2, 4, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(27, 2, 5, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(28, 2, 6, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(29, 2, 7, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(30, 2, 8, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(31, 2, 9, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(32, 2, 10, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(33, 2, 11, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(34, 2, 12, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(35, 2, 13, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(36, 2, 14, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(37, 2, 15, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(38, 2, 16, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(39, 2, 17, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(40, 2, 18, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(41, 2, 19, '0', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(42, 2, 20, '0', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(43, 2, 21, '0', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(44, 2, 22, '0', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(45, 3, 1, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(46, 3, 2, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(47, 3, 3, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(48, 3, 4, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(49, 3, 5, '0', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(50, 3, 6, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(51, 3, 7, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(52, 3, 8, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(53, 3, 9, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(54, 3, 10, '0', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(55, 3, 11, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(56, 3, 12, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(57, 3, 13, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(58, 3, 14, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(59, 3, 15, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(60, 3, 16, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(61, 3, 17, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(62, 3, 18, '1', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(63, 3, 19, '0', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(64, 3, 20, '0', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(65, 3, 21, '0', '2023-06-24 01:23:11', '2023-06-24 01:23:11'),
(66, 3, 22, '0', '2023-06-24 01:23:11', '2023-06-24 01:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `issue_id` int(10) UNSIGNED NOT NULL,
  `issue_xid` varchar(50) NOT NULL,
  `project` varchar(50) NOT NULL,
  `tracker` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `c_action` longtext DEFAULT NULL,
  `description` longtext NOT NULL,
  `status` varchar(100) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `assignee` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `is_private` tinyint(4) DEFAULT NULL,
  `approvedby` varchar(255) DEFAULT NULL,
  `status_approved` varchar(255) DEFAULT NULL,
  `keterangan_approved` longtext DEFAULT NULL,
  `closed_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issue_approvals`
--

CREATE TABLE `issue_approvals` (
  `iss_app_id` int(10) UNSIGNED NOT NULL,
  `issue_id` varchar(255) DEFAULT NULL,
  `app_list_id` varchar(255) DEFAULT NULL,
  `iss_app_ordinal` varchar(255) DEFAULT NULL,
  `iss_app_user` varchar(255) DEFAULT NULL,
  `iss_app_date` date DEFAULT NULL,
  `iss_app_status` varchar(255) DEFAULT NULL,
  `iss_app_notes` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issue_approvals`
--

INSERT INTO `issue_approvals` (`iss_app_id`, `issue_id`, `app_list_id`, `iss_app_ordinal`, `iss_app_user`, `iss_app_date`, `iss_app_status`, `iss_app_notes`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '1', '1', '2023-06-24', 'Approved', 'ok4', '2023-06-24 01:53:02', '2023-06-24 01:56:00'),
(2, '1', '3', '2', '1', NULL, 'Open', NULL, '2023-06-24 01:53:02', '2023-06-24 01:53:02'),
(3, '1', '4', '3', '8', NULL, 'Open', NULL, '2023-06-24 01:53:02', '2023-06-24 01:53:02'),
(4, '2', '2', '1', '1', '2023-06-24', 'Approved', 'satr1a', '2023-06-24 01:56:39', '2023-06-24 01:57:35'),
(5, '2', '3', '2', '3', '2023-06-24', 'Approved', 'oks', '2023-06-24 01:56:39', '2023-06-24 01:59:52'),
(6, '2', '4', '3', '8', '2023-06-24', 'Approved', 'bss', '2023-06-24 01:56:39', '2023-06-24 02:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `meets`
--

CREATE TABLE `meets` (
  `meet_id` int(10) UNSIGNED NOT NULL,
  `meet_xid` varchar(50) NOT NULL,
  `meet_project` varchar(20) NOT NULL,
  `meet_name` varchar(100) NOT NULL,
  `meet_date` date NOT NULL,
  `meet_time` time NOT NULL,
  `meet_preparedby` varchar(100) NOT NULL,
  `meet_locate` varchar(100) NOT NULL,
  `meet_attend` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
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
(15, '2023_06_09_154641_create_archive_dailies_table', 1),
(16, '2023_06_20_092754_create_daily_trackers_table', 1),
(17, '2023_06_23_004400_create_approval_lists_table', 1),
(18, '2023_06_23_010934_create_issue_approvals_table', 1),
(19, '2023_06_23_010935_create_daily_approvals_table', 1),
(20, '2023_06_23_011350_create_approval_histories_table', 1),
(21, '2023_06_23_063724_create_approvals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(10) UNSIGNED NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `action`, `created_at`, `updated_at`) VALUES
(1, 'Meeting', 'Create', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(2, 'Meeting', 'Read', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(3, 'Meeting', 'Update', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(4, 'Meeting', 'Delete', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(5, 'Issue', 'Approval', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(6, 'Issue', 'Create', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(7, 'Issue', 'Read', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(8, 'Issue', 'Update', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(9, 'Issue', 'Delete', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(10, 'DWM_Report', 'Approval', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(11, 'DWM_Report', 'Create', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(12, 'DWM_Report', 'Read', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(13, 'DWM_Report', 'Update', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(14, 'DWM_Report', 'Delete', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(15, 'Archives', 'Create', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(16, 'Archives', 'Read', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(17, 'Archives', 'Update', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(18, 'Archives', 'Delete', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(19, 'User', 'Create', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(20, 'User', 'Read', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(21, 'User', 'Update', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(22, 'User', 'Delete', '2023-06-24 01:23:10', '2023-06-24 01:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `departemen` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `group_id`, `departemen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@bss.id', '2023-06-24 01:23:09', '$2y$10$m5.2ssoMWDtrEiymdVsjpO8eM9ejFFHaRsmHeBo53KCpGPXRHoLTu', 1, '', '7qXtwZQ9wDufhoxulV35oszPRXay5jmNkLnUKuBxHBf3t6TaORJcIbr43bdG', '2023-06-24 01:23:09', '2023-06-24 01:23:09'),
(2, 'PIC', 'pic@bss.id', '2023-06-24 01:23:09', '$2y$10$TMMHkdYyhaXYfRxR8C8AHuUI7Mea7FlQ1bilTtiSolEWcReZqw.LG', 2, '', 'bd5iFWTTO6', '2023-06-24 01:23:09', '2023-06-24 01:23:09'),
(3, 'ENGINEERING', 'engginering@bss.id', '2023-06-24 01:23:09', '$2y$10$ml8QiVkR9hTbWGu3BjqUXe9XpnCtwsRDYCE.81bHxoEABYFQEmj1G', 3, 'Engginering', '2HSUT1o86d4u8EdDEqnOdR5cNYm3F5LYfPQ3y633P66CjVtQJeWZqIIR5pHj', '2023-06-24 01:23:09', '2023-06-24 01:23:09'),
(4, 'HSE', 'hse@bss.id', '2023-06-24 01:23:10', '$2y$10$yRdHplSP2XtgzFOGYmJ6we.JZbSmgAYZxCZErrfJsKqbxP7oRoBOq', 3, 'HSE', 'FFaiWYVfIM', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(5, 'COAL & BERGING', 'cnb@bss.id', '2023-06-24 01:23:10', '$2y$10$Qge8kvTwIryDup.lYU0AVONfHaZe42zCIRLU3Fu8dx3QHVMDM89Fm', 3, ' & Berging', 'gkpGNa3vk6', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(6, 'FAT', 'fat@bss.id', '2023-06-24 01:23:10', '$2y$10$VphmuzcClg/mKJkDaXxwqeg9RjszAQ3s4ZghWGs.fNjAM2bKd7a8e', 3, 'FAT', 'Gom1Xp5Sfo', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(7, 'HRGA', 'hrga@bss.id', '2023-06-24 01:23:10', '$2y$10$9Htom4Wgb3Ch.YJDUBVqreEl/uEQ805kThPNRezQKRfyFlwO1Mab.', 3, 'HRGA', 'P48BHPkanY', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(8, 'IT', 'it@bss.id', '2023-06-24 01:23:10', '$2y$10$ucApPPgszrrQDA7YpYHJkeY42S6vM01.5VwZ0CQHOlDjko4Hh1liq', 3, 'IT', 'qbN3akkpkMBAlQKBh6ccGXUAORgy8LkYtRlQGhmdB3KpuLZxUwUhr4IA5VWg', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(9, 'LOGISTIC', 'logistic@bss.id', '2023-06-24 01:23:10', '$2y$10$5MYTdAwMxKSNszjf4v4JYuCXUQ6wT3K8P.A77Diz85IL312mcSR/K', 3, 'Logistic', '9qVQUxfPyq', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(10, 'PLANT', 'plant@bss.id', '2023-06-24 01:23:10', '$2y$10$Fhj11eG6Hg6gkdg4psy8euMNWBZVRkSPXL1eLuOW3UliXOipTympu', 3, 'PLANT', 'yMy20MXAZQ', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(11, 'PRODUCTION', 'production@bss.id', '2023-06-24 01:23:10', '$2y$10$zXGursK4NBQioT2qLTOu4O3QHtwH9iSoNzCcpi.xbx.Ba4HcLAC4m', 3, 'PRODUCTION', 'Q7O0ONZybM', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(12, 'PURCASHING', 'purcashing@bss.id', '2023-06-24 01:23:10', '$2y$10$6CQQOstDBp2YoQMeKjsLMe3zOSVKz264EHOeWdaoXTad/5MyXqQpu', 3, 'PURCASHING', 'PrtXdHvF5T', '2023-06-24 01:23:10', '2023-06-24 01:23:10'),
(13, 'BOD', 'bod@bss.id', '2023-06-24 01:23:10', '$2y$10$eptWzDIFcTIc6bYxMcQRf.d0c1jYrng/aO84IDWdaovAR/bR2vwhq', 3, 'BOD', 'yiIgTw4nUI', '2023-06-24 01:23:10', '2023-06-24 01:23:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approval_histories`
--
ALTER TABLE `approval_histories`
  ADD PRIMARY KEY (`app_his_id`);

--
-- Indexes for table `approval_lists`
--
ALTER TABLE `approval_lists`
  ADD PRIMARY KEY (`app_list_id`);

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
-- Indexes for table `daily_approvals`
--
ALTER TABLE `daily_approvals`
  ADD PRIMARY KEY (`dai_app_id`);

--
-- Indexes for table `daily_trackers`
--
ALTER TABLE `daily_trackers`
  ADD PRIMARY KEY (`tracker_id`);

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
-- Indexes for table `issue_approvals`
--
ALTER TABLE `issue_approvals`
  ADD PRIMARY KEY (`iss_app_id`);

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
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `approval_histories`
--
ALTER TABLE `approval_histories`
  MODIFY `app_his_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `approval_lists`
--
ALTER TABLE `approval_lists`
  MODIFY `app_list_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `archive_dailies`
--
ALTER TABLE `archive_dailies`
  MODIFY `arc_daily_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `archive_issues`
--
ALTER TABLE `archive_issues`
  MODIFY `arc_issue_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `archive_meets`
--
ALTER TABLE `archive_meets`
  MODIFY `arc_meeet_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dailies`
--
ALTER TABLE `dailies`
  MODIFY `daily_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_approvals`
--
ALTER TABLE `daily_approvals`
  MODIFY `dai_app_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_trackers`
--
ALTER TABLE `daily_trackers`
  MODIFY `tracker_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departemens`
--
ALTER TABLE `departemens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_pages`
--
ALTER TABLE `group_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `issue_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `issue_approvals`
--
ALTER TABLE `issue_approvals`
  MODIFY `iss_app_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meets`
--
ALTER TABLE `meets`
  MODIFY `meet_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
