-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 11:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jawhara`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whats_up_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_type` tinyint(4) NOT NULL DEFAULT 0,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='الادمن و مسئولى الدعم الفنى';

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `whats_up_number`, `email`, `email_verified_at`, `password`, `image`, `admin_type`, `lang`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed Elsdodey', '01025130204', NULL, 'admin@admin.com', NULL, '$2y$10$szA1.TRGoC6N5EUpl25dvemx1Je2xYZ0EwEuzFrbg0oD2.FIKGK12', 'admins/jpg_mohamed.jpg_1663518903.jpg', 0, NULL, NULL, NULL, '2022-09-03 11:35:23', '2022-09-18 14:35:03'),
(2, 'تجريبى', NULL, NULL, 'vendor@vendor.com', NULL, '$2y$10$lK.Me5H7/jT8YO.DW16GkeNtWSkqQNYZd0IvTPlhKhZ3WhNwAAlGG', 'admins/webp_avatar.webp_1662309816.webp', 1, NULL, NULL, NULL, '2022-09-04 14:43:36', '2022-09-04 14:43:36'),
(3, 'تجريبى 2', NULL, NULL, 'admi4n@admin.com', NULL, '$2y$10$WGfLyqEiQwZ3fksIo5Vu5.QzvyWjcVbOV305Qm6PPR3TeRAxx0eVa', 'admins/webp_avatar.webp_1662309839.webp', 1, NULL, NULL, NULL, '2022-09-04 14:43:59', '2022-09-04 14:43:59'),
(4, 'تجريبىى 3', NULL, NULL, 'admin55@admin.com', NULL, '$2y$10$ldrbF9bh6/X1MyDYECrFD..UXwNDYv.bF9Rw9YIhxgmrJqmAm43KC', 'admins/webp_avatar.webp_1662309859.webp', 1, NULL, NULL, NULL, '2022-09-04 14:44:19', '2022-09-04 14:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect_to_route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` enum('read','unread') COLLATE utf8mb4_unicode_ci DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `age_ranges`
--

CREATE TABLE `age_ranges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` int(11) NOT NULL DEFAULT 0,
  `to` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='فئة الاعمار للبحب  للسيرة الذاتية';

--
-- Dumping data for table `age_ranges`
--

INSERT INTO `age_ranges` (`id`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, 18, 30, '2021-12-29 06:54:11', '2021-12-20 06:54:11'),
(2, 31, 40, '2022-01-10 08:03:49', '2022-01-10 08:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `biographies`
--

CREATE TABLE `biographies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('new','under_work','finished','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `type_of_experience` enum('new','with_experience') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new' COMMENT 'new=>قادم جديد , with_experience=>لديه خبرة جديدة ',
  `order_type` enum('normal','special') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal' COMMENT 'normal=>سيرة عادى , special=>طلب من نوع خاص ',
  `cv_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ملف السيرة الذاتية',
  `recruitment_office_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'مكتب السيرة الذاتية',
  `nationalitie_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'الجنسية',
  `language_title_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'اللغة التى يتحدث بها العامل',
  `religion_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'الدين',
  `job_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'المهنة',
  `social_type_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'الحالة الاجتماعية',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'ممثل خدمة العملاء',
  `age` int(11) NOT NULL DEFAULT 0,
  `salary` double NOT NULL DEFAULT 0,
  `recruitment_price` double NOT NULL DEFAULT 0,
  `biography_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'رقم سجل السيرة الذاتية',
  `passport_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'رقم جواز السفر',
  `visa_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'رقم التأشيرة',
  `special_requirement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'متطلبات خاصة',
  `user_id` bigint(20) DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT NULL,
  `video` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_created_at` date DEFAULT NULL,
  `passport_ended_at` date DEFAULT NULL,
  `passport_place` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `height` double DEFAULT NULL,
  `skin_colour` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `childern_number` int(11) NOT NULL DEFAULT 0,
  `high_degree` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `living_location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arabic_degree` enum('weak','average','good','very good','excellent') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `english_degree` enum('weak','average','good','very good','excellent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_of_age_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT=' السيرة الذاتية و طلبات السير الذاتية الخاصة';

--
-- Dumping data for table `biographies`
--

INSERT INTO `biographies` (`id`, `status`, `type_of_experience`, `order_type`, `cv_file`, `recruitment_office_id`, `nationalitie_id`, `language_title_id`, `religion_id`, `job_id`, `social_type_id`, `admin_id`, `age`, `salary`, `recruitment_price`, `biography_number`, `passport_number`, `visa_number`, `special_requirement`, `user_id`, `image`, `name`, `order_date`, `video`, `passport_created_at`, `passport_ended_at`, `passport_place`, `weight`, `height`, `skin_colour`, `childern_number`, `high_degree`, `living_location`, `arabic_degree`, `english_degree`, `created_at`, `updated_at`, `order_of_age_id`) VALUES
(8, 'new', 'with_experience', 'special', NULL, NULL, 1, 1, 1, 1, 1, NULL, 0, 0, 0, NULL, NULL, '84545445', 'test', 10, NULL, 'محمد جمال', '2022-09-12 17:21:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'good', '2022-09-12 17:21:40', '2022-09-12 17:21:40', 1),
(9, 'new', 'new', 'special', NULL, NULL, 3, 2, 3, 2, 4, NULL, 0, 0, 0, NULL, NULL, '881', 'Voluptatum irure qui', 12, NULL, NULL, '2022-09-13 18:29:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'good', '2022-09-13 18:29:48', '2022-09-13 18:29:48', 1),
(10, 'under_work', 'with_experience', 'special', NULL, NULL, 2, 2, 2, 2, 3, NULL, 0, 0, 0, NULL, NULL, '839', 'Voluptas et magnam atfi', 13, NULL, NULL, '2022-09-13 18:41:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'good', '2022-09-13 18:41:38', '2022-09-13 18:41:38', 1),
(11, 'under_work', 'new', 'special', NULL, NULL, 1, 1, 2, 1, 4, NULL, 0, 0, 0, NULL, NULL, '934', 'Qui id totam dolori', 14, NULL, NULL, '2022-09-13 19:03:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'good', '2022-09-13 19:03:05', '2022-09-13 19:03:05', 2),
(14, 'under_work', 'new', 'normal', 'biographies/jpg_bg.jpg_1663180430.jpg', 2, 2, 1, 1, 1, 1, 1, 22, 43424, 0, '13131', '23232323', NULL, NULL, 1, 'biographies/png_logo-sm.png_1663180430.png', 'محمد', '2022-09-15 09:21:39', 'https://www.youtube.com/watch?v=9Zc2b7XgDSk', '2022-09-01', '2022-09-30', 'مصر', 232, 122, 'بني', 4, 'بكالريوس', 'بنجلدش', 'average', 'good', '2022-09-14 16:33:50', '2022-09-15 09:21:39', NULL),
(15, 'under_work', 'new', 'special', NULL, NULL, 1, 1, 2, 2, 1, NULL, 0, 0, 0, NULL, NULL, '665', 'Nostrum sint provide', 15, NULL, NULL, '2022-09-15 07:33:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'good', '2022-09-15 07:33:53', '2022-09-15 07:33:53', 2),
(16, 'under_work', 'new', 'special', NULL, NULL, 3, 1, 2, 2, 4, NULL, 0, 0, 0, NULL, NULL, '80', 'Sapiente aute sit l', 16, NULL, NULL, '2022-09-15 07:49:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'good', '2022-09-15 07:49:58', '2022-09-15 07:49:58', 1),
(17, 'under_work', 'with_experience', 'special', NULL, NULL, 1, 3, 2, 1, 4, NULL, 0, 0, 0, NULL, NULL, '168', 'Sed dolor aut sed re', 17, NULL, NULL, '2022-09-15 07:50:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'good', '2022-09-15 07:50:55', '2022-09-15 07:50:55', 2),
(18, 'under_work', 'with_experience', 'normal', 'biographies/jpg_302543122_623798889316278_4595044135238627038_n.jpg_1663241578.jpg', 2, 1, 2, 2, 1, 1, 1, 33, 4444, 0, '33', '23232', NULL, NULL, 1, 'biographies/jpg_Snapchat-1697358959 (1).jpg_1663241578.jpg', 'asd', '2022-09-15 09:35:10', 'https://www.youtube.com/watch?v=5Slh_nEGKBQ&list=RD5Slh_nEGKBQ&start_radio=1', '2022-09-01', '2022-09-30', '23232', 323, 2323, 'بني', 3, 'بكالريوس', 'بنجلدش', 'average', 'average', '2022-09-15 09:32:58', '2022-09-15 09:35:10', NULL),
(19, 'under_work', 'new', 'normal', 'jlbuo.kl.', NULL, 3, 1, 1, 2, 3, 4, 77, 66, 77, '787', '6767', '768', 'hkgi.', 1, 'jkoiho;j;ojo', 'jjhliho', '2022-09-15 21:13:20', 'ioh;p', '2022-09-01', '2022-09-01', 'uh\'oup', 77, 77, 'f[kp', 66, 'ut8oo', 'ihoiho', 'average', 'good', '2022-09-15 20:40:29', '2022-09-15 21:13:20', NULL),
(20, 'under_work', 'new', 'special', NULL, NULL, 3, 3, 1, 1, 4, NULL, 0, 0, 0, NULL, NULL, '160', 'Reiciendis ut incidi', 21, NULL, NULL, '2022-09-15 20:16:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'good', '2022-09-15 20:16:28', '2022-09-15 20:16:28', 2),
(21, 'under_work', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 3, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-16 21:00:48', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-09-16 21:00:48', NULL),
(22, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(23, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(24, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(25, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(26, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(27, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(28, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(29, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(30, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(31, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(32, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(33, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(34, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(35, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(36, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(37, 'new', 'new', 'normal', 'dcdeve', 1, 3, 3, 3, 2, 2, 2, 0, 0, 0, '3333', '24242', '422424', '242424', 1, '23434342424', '24242424', '2022-09-27 22:57:41', '24242424', '2022-09-06', NULL, '24242', 24, 42, '242', 0, 'drgrg', 'fwfwfwf', 'average', 'good', '2022-05-21 07:00:39', '2022-05-21 07:00:39', NULL),
(38, 'under_work', 'new', 'special', NULL, NULL, 2, 3, 3, 2, 1, NULL, 0, 0, 0, NULL, NULL, '356', 'Quaerat perspiciatiswef3f32', 23, NULL, NULL, '2022-09-18 09:00:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'good', '2022-09-18 09:00:02', '2022-09-18 09:00:02', 2);

-- --------------------------------------------------------

--
-- Table structure for table `biography_images`
--

CREATE TABLE `biography_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `biography_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT ' السيرة الذاتية',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT=' صور السير الذاتية';

--
-- Dumping data for table `biography_images`
--

INSERT INTO `biography_images` (`id`, `biography_id`, `image`, `created_at`, `updated_at`) VALUES
(5, 14, 'biographies/png_logo-light.png_1663180430.png', '2022-09-14 16:33:50', '2022-09-14 16:33:50'),
(6, 18, 'biographies/jpg_269076572_648068226392586_1848036720860803370_n.jpg_1663241578.jpg', '2022-09-15 09:32:58', '2022-09-15 09:32:58'),
(7, 18, 'biographies/jpg_Snapchat-804973178.jpg_1663241578.jpg', '2022-09-15 09:32:58', '2022-09-15 09:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `biography_skills`
--

CREATE TABLE `biography_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `biography_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT ' السيرة الذاتية',
  `skill_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT ' المهارات',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT=' المهارات للسير الذاتية';

--
-- Dumping data for table `biography_skills`
--

INSERT INTO `biography_skills` (`id`, `biography_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(6, 14, 2, '2022-09-14 16:33:50', '2022-09-14 16:33:50'),
(7, 18, 2, '2022-09-15 09:32:58', '2022-09-15 09:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='المدن';

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0627\\u0644\\u0631\\u064a\\u0627\\u0636\",\"en\":\"Riyadh\"}', '2021-12-29 06:54:11', '2021-12-20 06:54:11'),
(2, '{\"ar\":\"\\u0645\\u0643\\u0629\",\"en\":\"maka\"}', '2022-01-10 08:03:49', '2022-06-05 16:40:36'),
(3, '{\"ar\":\"\\u062c\\u062f\\u0629\"}', '2022-09-12 14:30:51', '2022-09-12 14:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` enum('read','un_read') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'un_read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `subject`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(3, 'ssss', '66532', NULL, 'sss', 'sss', 'un_read', '2022-09-04 07:23:38', '2022-09-04 07:23:38'),
(4, 'sss', '555', NULL, '858', 'ss', 'un_read', '2022-09-04 07:23:55', '2022-09-04 07:23:55'),
(5, 'محمد', '01010871488', NULL, '122323', 's;lmfcepovf4vp4v4vp', 'un_read', '2022-09-13 11:19:34', '2022-09-13 11:19:34'),
(10, 'Mona Durham', '+1 (632) 281-4596', NULL, 'Enim consequuntur of', 'In minima dolorum ul', 'un_read', '2022-09-15 11:02:51', '2022-09-15 11:02:51'),
(11, 'Xena Alvarez', '+1 (593) 936-4523', NULL, 'Nihil sed dolores el', 'Aperiam et numquam l', 'un_read', '2022-09-15 11:04:21', '2022-09-15 11:04:21'),
(12, 'Reese Davidson', '+1 (298) 477-4471', NULL, 'Culpa nemo quis qui', 'Ducimus culpa unde', 'un_read', '2022-09-17 07:49:40', '2022-09-17 07:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `dailylabordemand`
--

CREATE TABLE `dailylabordemand` (
  `id` int(11) NOT NULL,
  `facility_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `record_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `number_worker` int(20) NOT NULL,
  `visa_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `other_requirements` text COLLATE utf8_unicode_ci NOT NULL,
  `job_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='الخبرة  للسيرة الذاتية';

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u062a\\u0639\\u0644\\u064a\\u0645 \\u0639\\u0627\\u0644\\u0649\",\"en\":\"Riyadh\"}', '2021-12-29 06:54:11', '2022-09-12 14:25:58'),
(2, '{\"ar\":\"\\u062f\\u0628\\u0644\\u0648\\u0645\\u0629\",\"en\":\"maka\"}', '2021-12-29 06:54:11', '2022-09-12 14:26:07'),
(3, '{\"ar\":\"\\u063a\\u064a\\u0631 \\u0645\\u062a\\u0639\\u0644\\u0645\"}', '2022-09-12 14:26:15', '2022-09-12 14:26:15');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `firebase_tokens`
--

CREATE TABLE `firebase_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `software_type` enum('web','android','ios') COLLATE utf8mb4_unicode_ci DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frequently_questions`
--

CREATE TABLE `frequently_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='الاسئلة الشائعة فى الصفحة الرئيسة';

--
-- Dumping data for table `frequently_questions`
--

INSERT INTO `frequently_questions` (`id`, `title`, `desc`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0643\\u064a\\u0641 \\u064a\\u062a\\u0645 \\u0627\\u0633\\u062a\\u062e\\u0631\\u0627\\u062c \\u0627\\u0644\\u062a\\u0623\\u0634\\u064a\\u0631\\u0629 \\u061f\",\"en\":\"How is the visa issued?\"}', '{\"ar\":\"1- \\u0641\\u062a\\u062d \\u062d\\u0633\\u0627\\u0628 \\u0641\\u064a \\u0645\\u0633\\u0627\\u0646\\u062f\\r\\n2- \\u0627\\u062f\\u062e\\u0644 \\u062d\\u0633\\u0627\\u0628\\u064a\\r\\n3- \\u0644\\u0648\\u062d\\u0629 \\u0627\\u0644\\u062a\\u062d\\u0643\\u0645\\r\\n4-  \\u0641\\u062a\\u062d \\u062d\\u0633\\u0627\\u0628 \\u0641\\u064a \\u0645\\u0633\\u0627\\u0646\\u062f\\r\\n5- \\u0627\\u062f\\u062e\\u0644 \\u062d\\u0633\\u0627\\u0628\\u064a\\r\\n6- \\u0644\\u0648\\u062d\\u0629 \\u0627\\u0644\\u062a\\u062d\\u0643\\u0645\",\"en\":\"1- Opening an account in Musaned\\r\\n2- Log in to my account\\r\\n3- control panel\\r\\n4- Opening an account in Musaned\\r\\n5- Log in to my account\\r\\n6- control panel\"}', '2021-12-29 06:54:11', '2021-12-20 06:54:11'),
(2, '{\"ar\":\"\\u0643\\u0645 \\u0645\\u062f\\u0629 \\u0627\\u0633\\u062a\\u062e\\u0631\\u0627\\u062c \\u0627\\u0644\\u062a\\u0623\\u0634\\u064a\\u0631\\u0629\\u061f\"}', '{\"ar\":\"\\u062e\\u0644\\u0627\\u0644 24 \\u0633\\u0627\\u0639\\u0629.\"}', '2022-09-12 13:49:44', '2022-09-12 13:49:44'),
(3, '{\"ar\":\"\\u0643\\u0645 \\u0645\\u062f\\u0629 \\u0627\\u0633\\u062a\\u062e\\u0631\\u0627\\u062c \\u0627\\u0644\\u062a\\u0623\\u0634\\u064a\\u0631\\u0629\\u061f\"}', '{\"ar\":\"\\u062e\\u0644\\u0627\\u0644 24 \\u0633\\u0627\\u0639\\u0629.\"}', '2022-09-12 13:50:09', '2022-09-12 13:50:09'),
(4, '{\"ar\":\"\\u0643\\u0645 \\u0645\\u062f\\u0629 \\u0627\\u0633\\u062a\\u062e\\u0631\\u0627\\u062c \\u0627\\u0644\\u062a\\u0623\\u0634\\u064a\\u0631\\u0629\\u061f\"}', '{\"ar\":\"\\u062e\\u0644\\u0627\\u0644 24 \\u0633\\u0627\\u0639\\u0629.\"}', '2022-09-12 13:50:09', '2022-09-12 13:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `frequently_subjects`
--

CREATE TABLE `frequently_subjects` (
  `id` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frequently_subjects`
--

INSERT INTO `frequently_subjects` (`id`, `title`, `desc`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0639 \\u0627\\u0644\\u0644\\u0629\"}', '{\"ar\":\"\\u0627\\u0644\\u062c\\u0643\\u0627\\u064a\\u0629\"}', '2022-05-21 07:00:39', '2022-09-18 18:20:00'),
(2, '{\"ar\":\"\\u0627\\u064a\\u0629 \\u0627\\u0644\\u062d\\u0643\\u0627\\u064a\\u0629\"}', '{\"ar\":\"\\u0627\\u0644\\u062d\\u0643\\u0627\\u064a\\u0629 \\u064a\\u0628\\u0644\\u062f\"}', '2022-07-03 12:31:55', '2022-09-18 18:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='مسميات الوظائف  للسيرة الذاتية';

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0639\\u0627\\u0645\\u0644\\u0629 \\u0645\\u0646\\u0632\\u0644\\u064a\\u0629\",\"en\":\"maka\"}', '2021-12-29 06:54:11', '2022-09-12 14:26:38'),
(2, '{\"ar\":\"\\u0639\\u0627\\u0645\\u0644 \\u062d\\u062f\\u0627\\u0626\\u0642\"}', '2022-09-12 14:26:50', '2022-09-12 14:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('active','not_active') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='اللغات خاصة بالاضافة كاعداد';

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'ar', 'active', '2022-03-27 11:57:36', '2022-03-27 11:57:36'),
(2, 'en', 'not_active', '2022-03-27 11:57:36', '2022-03-27 11:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `language_titles`
--

CREATE TABLE `language_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='اللغات  للسيرة الذاتية';

--
-- Dumping data for table `language_titles`
--

INSERT INTO `language_titles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629\",\"en\":\"maka\"}', '2021-12-29 06:54:11', '2022-09-12 14:27:03'),
(2, '{\"ar\":\"\\u0627\\u0644\\u0647\\u0646\\u062f\\u064a\\u0629\"}', '2022-09-12 14:27:11', '2022-09-12 14:27:11'),
(3, '{\"ar\":\"\\u0627\\u0644\\u0627\\u0646\\u062c\\u0644\\u064a\\u0632\\u064a\\u0629\"}', '2022-09-12 14:27:19', '2022-09-12 14:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_11_000000_create_cities_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2019_07_31_100743_create_firebase_tokens_table', 1),
(10, '2019_07_31_101144_create_contacts_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2019_12_29_104801_create_admins_table', 1),
(14, '2020_04_09_105520_create_settings_table', 1),
(15, '2020_09_14_081240_create_admin_notifications_table', 1),
(16, '2021_06_03_143103_create_languages_table', 1),
(17, '2022_02_08_180749_create_permission_tables', 1),
(18, '2022_02_23_171358_create_statistics_table', 1),
(19, '2022_04_05_151820_create_sponsors_table', 1),
(20, '2022_05_16_172152_create_sliders_table', 1),
(21, '2022_08_29_175217_create_our_services_table', 1),
(22, '2022_08_29_175630_create_frequently_questions_table', 1),
(23, '2022_08_29_182528_create_jobs_table', 1),
(24, '2022_08_29_182612_create_social_types_table', 1),
(25, '2022_08_29_182706_create_religions_table', 1),
(26, '2022_08_29_182756_create_language_titles_table', 1),
(27, '2022_08_29_182854_create_experiences_table', 1),
(28, '2022_08_29_182917_create_age_ranges_table', 1),
(29, '2022_08_29_183030_create_nationalities_table', 1),
(30, '2022_08_29_183206_create_skills_table', 1),
(31, '2022_08_29_183250_create_recruitment_offices_table', 1),
(32, '2022_08_30_170707_create_biographies_table', 1),
(33, '2022_08_30_173102_create_biography_images_table', 1),
(34, '2022_08_30_173257_create_biography_skills_table', 1),
(35, '2022_09_10_081239_create_orders_table', 2),
(36, '2022_09_10_090744_create_user_notifications_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='الجنسيات  للسيرة الذاتية';

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `title`, `desc`, `image`, `created_at`, `updated_at`, `country_name`, `price`) VALUES
(1, '{\"ar\":\"\\u0647\\u0646\\u062f\\u064a\\u0629\",\"en\":\"maka\"}', 'مدة الاستقدام في خلال 60 يوم', 'countries/jpg_صور-تصميمات-اثاث-مودرن-3.jpg_1663524500.jpg', '2021-12-29 06:54:11', '2022-09-18 16:08:20', 'الهند', 33),
(2, '{\"ar\":\"\\u063a\\u0627\\u0646\\u064a\\u0629\"}', 'مدة الاستقدام في خلال 60 يوم', 'countries/jpg_cc.jpg_1663524486.jpg', '2022-09-12 14:27:46', '2022-09-18 16:08:06', 'غانا', 44),
(3, '{\"ar\":\"\\u0646\\u064a\\u062c\\u064a\\u0631\\u064a\\u0629\"}', 'مدة الاستقدام في خلال 60 يوم', 'countries/jpg_clean.jpg_1663524464.jpg', '2022-09-12 14:27:54', '2022-09-18 16:07:44', 'نيجريا', 66);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('new','under_work','finished','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `biography_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT ' السيرة الذاتية',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'ممثل خدمة العملاء',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'العميل لو حجز العامل',
  `order_date` timestamp NULL DEFAULT NULL,
  `order_complete` timestamp NULL DEFAULT NULL,
  `order_canceled` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `status`, `biography_id`, `admin_id`, `user_id`, `order_date`, `order_complete`, `order_canceled`, `created_at`, `updated_at`) VALUES
(9, 'NK211663369248', 'under_work', 21, 3, 1, '2022-09-16 21:00:48', NULL, NULL, '2022-09-16 21:00:48', '2022-09-16 21:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `our_services`
--

CREATE TABLE `our_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='خدماتنا فى الصفحة الرئيسة';

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
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `id` int(11) NOT NULL,
  `employer_rights_and_duties` text DEFAULT NULL,
  `rights_and_duties_of_domestic_workers` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`id`, `employer_rights_and_duties`, `rights_and_duties_of_domestic_workers`, `created_at`, `updated_at`) VALUES
(1, 'PDF/pdf_WashSquad.pdf_1663577817.pdf', 'PDF/pdf_asd.pdf_1663577777.pdf', '2022-05-21 07:00:39', '2022-09-19 06:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_offices`
--

CREATE TABLE `recruitment_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='مكاتب الاستقدام  للسيرة الذاتية';

--
-- Dumping data for table `recruitment_offices`
--

INSERT INTO `recruitment_offices` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0645\\u0643\\u062a\\u0628 \\u0633\\u0645\\u0627\\u0631\\u062a\",\"en\":\"maka\"}', '2021-12-29 06:54:11', '2022-09-12 14:28:19'),
(2, '{\"ar\":\"\\u0645\\u0643\\u062a\\u0628 \\u0627\\u0644\\u0631\\u064a\\u0627\\u0636\"}', '2022-09-12 14:28:31', '2022-09-12 14:28:31'),
(3, '{\"ar\":\"\\u0645\\u0643\\u062a\\u0628 \\u0645\\u0627\\u0643\\u0648\\u0646\\u063a\\u0648\"}', '2022-09-12 14:28:46', '2022-09-12 14:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_trip`
--

CREATE TABLE `recruitment_trip` (
  `id` int(11) NOT NULL,
  `recruitment_contract_title` varchar(50) NOT NULL,
  `recruitment_contract_desc` text NOT NULL,
  `recruitment_trip_title` varchar(50) NOT NULL,
  `recruitment_trip_desc` text NOT NULL,
  `employment_arrival_title` varchar(50) NOT NULL,
  `employment_arrival_desc` text NOT NULL,
  `customers_service_title` varchar(50) NOT NULL,
  `customers_service_desc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recruitment_trip`
--

INSERT INTO `recruitment_trip` (`id`, `recruitment_contract_title`, `recruitment_contract_desc`, `recruitment_trip_title`, `recruitment_trip_desc`, `employment_arrival_title`, `employment_arrival_desc`, `customers_service_title`, `customers_service_desc`, `created_at`, `updated_at`) VALUES
(1, 'recruitment_', 'كل ما عليك القيام به هو اختيار العمالة المنزلية التي تحتاج إليها لنقوم بمطابقة المواصفات المطلوبة واختيار عمالة يمكن الاعتماد عليها بعد الاتفاق على الشروط والأحكام وقيمة الراتب المدفوع بين صاحب العمل والعمالة المنزلية , بعد ذلك يقوم العميل بدفع مبلغ الرسوم لتقديم طلب الاستقدام لتوظيف العامل المنزلي المطلوب والتنسيق مع وكالة الاستقدام الأجنبية في البلد المعني ونقوم بتحديث الحالة لطلب الاستقدام', 'تعاقد الإستقدام', 'يتكون فريق العمل من أفضل المتخصصين في مجالات استقدام العمالة المنزلية للافراد بخبرة كبيرة في توظيف الكوادر البشرية وخدمات الاستقدام بالتعاون مع مجموعة كبيرة من خبراء الاستقدام ومن خلال شبكة من الوكالات الدولية ومكاتب الاستقدام الاقليمية والعالمية وبمعرفة شاملة بكل ما يخص تعاقد الاستقدام للعمل المنزلي والالتزام بجميع قوانين وتشريعات وزارة العمل للارتقاء بأعلى مستويات الجودة في الخدمة المقدمة لعملائنا وتغطية احتياجات المواطن السعودي وكذلك المقيم وفق أعلى المعايير الوطنية لجميع المدن في المملكة العربية السعودية.', 'وصول العمالة', 'فريق العمل يضمن دائما وباستمرار تقديم خدمات سريعة ومتميزة في استقدام العمالة المنزلية المدربة داخل المملكة العربية السعودية مع متابعة مستمرة للعامل أو العاملة من خلال إشعار العميل بوقت وصول العمالة الوافدة بسرعة ودقة عالية، والتنسيق لاستقبال السائق الخاص أو الخادمة المنزلية واستلام كامل وثائق استقدام العمالة المنزلية', 'خدمة العملاء', 'دائما ما نتبنى أحدث الأساليب والتقنيات للتعامل مع العملاء وضمان جودة عالية في الخدمات المقدمة في مكتب الجوهرة الاولي للاستقدام كما أننا نوفر جميع الأدوات لدراسة السوق لتطوير وتوفير خدمات ذات جودة عالية لاستقدام العمالة المنزلية وللتواصل مع العملاء قبل وبعد وصول العمالة المنزلية , نلتزم بشكل تام لخدمة مختلف الاحتياجات بمصداقية عالية وشفافية مطلقة حيث أننا نطمح لتجاوز توقعات عملائنا وبناء علاقة طويلة المدى مع كافة العملاء لمعرفة كافة احتياجاتهم ومتطلباتهم.', NULL, '2022-09-18 21:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='الاديان  للسيرة الذاتية';

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0645\\u0633\\u0644\\u0645\",\"en\":\"maka\"}', '2021-12-29 06:54:11', '2022-09-12 14:28:56'),
(2, '{\"ar\":\"\\u0645\\u0633\\u064a\\u062d\\u0649\"}', '2022-09-12 14:29:05', '2022-09-12 14:29:05'),
(3, '{\"ar\":\"\\u0628\\u0648\\u0632\\u0649\"}', '2022-09-12 14:29:11', '2022-09-12 14:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tap_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `header_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `footer_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `footer_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `phone1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `address1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `address2` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double NOT NULL DEFAULT 0 COMMENT 'مطلوب',
  `longitude` double NOT NULL DEFAULT 0 COMMENT 'مطلوب',
  `email1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `email2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `our_service_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `our_family_title1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `our_family_desc1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `our_family_image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `our_family_title2` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `our_family_desc2` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `our_family_image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'مطلوب',
  `our_statistics_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT ' نص الاحصائيات مطلوب',
  `recruitment_step_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '   مطلوب',
  `recruitment_step1_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '   مطلوب',
  `recruitment_step2_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '   مطلوب',
  `recruitment_step3_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '   مطلوب',
  `recruitment_step4_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '   مطلوب',
  `recruitment_step5_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '   مطلوب',
  `application_for_the_recruitment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '   مطلوب',
  `desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_condition_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_policy_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat_ghost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_app` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_condition` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_policy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_slider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_profile_pdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `android_app` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ios_app` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_user_pass` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_sender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `default_theme` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_muted` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_notification` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `tap_logo`, `header_logo`, `footer_logo`, `title`, `footer_desc`, `phone1`, `phone2`, `address1`, `address2`, `latitude`, `longitude`, `email1`, `email2`, `our_service_desc`, `our_family_title1`, `our_family_desc1`, `our_family_image1`, `our_family_title2`, `our_family_desc2`, `our_family_image2`, `our_statistics_desc`, `recruitment_step_desc`, `recruitment_step1_desc`, `recruitment_step2_desc`, `recruitment_step3_desc`, `recruitment_step4_desc`, `recruitment_step5_desc`, `application_for_the_recruitment`, `desc`, `terms_condition_link`, `about_us_link`, `privacy_policy_link`, `facebook`, `twitter`, `instagram`, `linkedin`, `telegram`, `youtube`, `google_plus`, `snapchat_ghost`, `whatsapp`, `about_app`, `terms_condition`, `privacy_policy`, `login_banner`, `image_slider`, `company_profile_pdf`, `fax`, `android_app`, `ios_app`, `link`, `sms_user_name`, `sms_user_pass`, `sms_sender`, `publisher`, `default_language`, `default_theme`, `offer_muted`, `offer_notification`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '{\"0\":\"\\u0628\\u0644\\u0627\\u062a\\u0646\\u064a\\u0648\\u0645\",\"1\":\"platinum\",\"ar\":\"\\u062c\\u0648\\u0647\\u0631\\u0629\"}', '{\"ar\":\"\\u062c\\u0648\\u0647\\u0631\\u0629\",\"en\":\"At Nesma Akeem, we care about serving you through multiple communication channels and guaranteeing you an integrated service and a distinct customer experience\",\"0\":\"\\u0646\\u0647\\u062a\\u0645 \\u0641\\u064a \\u0646\\u0633\\u0645\\u0629 \\u0623\\u0643\\u064a\\u0645 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 \\u0639\\u0646 \\u0637\\u0631\\u064a\\u0642 \\u0642\\u0646\\u0648\\u0627\\u062a \\u062a\\u0648\\u0627\\u0635\\u0644 \\u0645\\u062a\\u0639\\u062f\\u062f\\u0629 \\u0648\\u0646\\u0636\\u0645\\u0646 \\u0644\\u0643\\u0645 \\u062e\\u062f\\u0645\\u0629 \\u0645\\u062a\\u0643\\u0627\\u0645\\u0644\\u0629 \\u0648\\u062a\\u062c\\u0631\\u0628\\u0629 \\u0639\\u0645\\u064a\\u0644 \\u0645\\u0645\\u064a\\u0632\\u0629\",\"1\":\"At platinum Akeem, we care about serving you through multiple communication channels and guaranteeing you an integrated service and a distinct customer experience\"}', NULL, NULL, '{\"ar\":\"\\u062c\\u0648\\u0647\\u0631\\u0629\",\"en\":\"Saudi Arabia - Riyadh - Al Wahda Street\",\"0\":\"\\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u064a\\u0629 - \\u0627\\u0644\\u0631\\u064a\\u0627\\u0636 - \\u0634\\u0627\\u0631\\u0639 \\u0627\\u0644\\u0648\\u062d\\u062f\\u0629\",\"1\":\"Saudi Arabia - Riyadh - Al Wahda Street\"}', NULL, 24.774265, 46.738586, NULL, NULL, '{\"ar\":\"\\u062a\\u0639\\u0631\\u0641 \\u0639\\u0644\\u064a \\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a \\u0627\\u0644\\u062a\\u064a \\u0646\\u0642\\u062f\\u0645\\u0647\\u0627 \\u0644\\u0644\\u0645\\u062c\\u062a\\u0645\\u0639 ...\",\"en\":\"Learn about the services we provide to the community...\"}', '{\"ar\":\"\\u0645\\u0639 hg\",\"en\":\"With Nesma Akeem\"}', '{\"ar\":\"\\u0639\\u0627\\u0626\\u0644\\u062a\\u0643 \\u0627\\u0633\\u0639\\u062f ,\\u062d\\u064a\\u0627\\u062a\\u0643 \\u0627\\u0641\\u0636\\u0644\",\"en\":\"Your family is happier, your life is better\"}', 'settings/webp_family1.webp_1662278528.webp', '{\"ar\":\"\\u0639\\u0627\\u0626\\u0644\\u062a\\u0643 \\u062f\\u0627\\u0626\\u0645\\u0627 \\u0627\\u0644\\u0623\\u0647\\u0645\",\"en\":\"Your family is always the most important\"}', '{\"ar\":\"\\u0627\\u062a\\u0631\\u0643\\u064a \\u0634\\u063a\\u0644 \\u0627\\u0644\\u0628\\u064a\\u062a \\u0639\\u0644\\u064a\\u0646\\u0627\",\"en\":\"Leave the housework to us\"}', 'settings/webp_family2.webp_1662278578.webp', '{\"ar\":\"\\u0625\\u0644\\u064a\\u0643 \\u0628\\u0639\\u0636 \\u0625\\u062d\\u0635\\u0627\\u0626\\u064a\\u0627\\u062a \\u0627\\u0644\\u0639\\u0645\\u0644\\u0627\\u0621 \\u0627\\u0644\\u0630\\u064a\\u0646 \\u062a\\u0634\\u0631\\u0641\\u0646\\u0627 \\u0628\\u0627\\u0644\\u0639\\u0645\\u0644 \\u0645\\u0639\\u0647\\u0645\",\"en\":\"Here are some statistics from clients we have had the pleasure of working with\"}', '{\"ar\":\"\\u062a\\u0639\\u0631\\u0641 \\u0639\\u0644\\u064a \\u0627\\u0644\\u062e\\u0637\\u0648\\u0627\\u062a \\u0627\\u0644\\u062a\\u064a \\u0646\\u0639\\u0645\\u0644 \\u0628\\u0647\\u0627 ...\",\"en\":\"Find out what we\'re doing...\"}', '{\"ar\":\"\\u0633\\u062f\\u0627\\u062f \\u0631\\u0633\\u0648\\u0645 \\u062a\\u0627\\u0634\\u064a\\u0631\\u0629 \\u0627\\u0644\\u0639\\u0645\\u0627\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0646\\u0632\\u0644\\u064a\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0643 \\u0639\\u0628\\u0631 \\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a \\u0627\\u0644\\u062d\\u0643\\u0648\\u0645\\u064a\\u0629 \\u0641\\u064a \\u0627\\u0644\\u0628\\u0646\\u0643 \\u0627\\u0648 \\u0639\\u0646 \\u0637\\u0631\\u064a\\u0642 \\u0627\\u0644\\u0642\\u0646\\u0648\\u0627\\u062a \\u0627\\u0644\\u062a\\u0627\\u0644\\u064a\\u0629\",\"en\":\"Pay your domestic worker visa fees through government services in the bank or through the following channels\"}', '{\"ar\":\"\\u0637\\u0644\\u0628 \\u0627\\u0635\\u062f\\u0627\\u0631 \\u062a\\u0627\\u0634\\u064a\\u0631\\u0629 \\u0627\\u0644\\u0639\\u0645\\u0627\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0646\\u0632\\u0644\\u064a\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0643 \\u0641\\u064a \\u0628\\u0631\\u0646\\u0627\\u0645\\u062c \\u0645\\u0633\\u0627\\u0646\\u062f\",\"en\":\"Request to issue your domestic worker visa in the Musaned Program\"}', '{\"ar\":\"\\u0627\\u062e\\u062a\\u064a\\u0627\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0631\\u0629 \\u0627\\u0644\\u0630\\u0627\\u062a\\u064a\\u0629 \\u0644\\u0644\\u0639\\u0645\\u0627\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0646\\u0632\\u0644\\u064a\\u0629 \\u0639\\u0628\\u0631 \\u0627\\u0644\\u0628\\u062d\\u062b \\u0641\\u064a \\u0628\\u0631\\u0646\\u0627\\u0645\\u062c \\u0645\\u0633\\u0627\\u0646\\u062f \\u0639\\u0646 \\u0637\\u0631\\u064a\\u0642 \\u0627\\u0644\\u0645\\u0647\\u0646\\u0629\\/ \\u0627\\u0644\\u062c\\u0646\\u0633\\u064a\\u0629\",\"en\":\"Choosing a resume for a domestic worker by searching for a support program by profession\\/nationality\"}', '{\"ar\":\"\\u062f\\u0641\\u0639 \\u0645\\u0628\\u0644\\u063a \\u0627\\u062e\\u062a\\u064a\\u0627\\u0631\\u064a \\u0648\\u062a\\u0648\\u062b\\u064a\\u0642 \\u0637\\u0644\\u0628 \\u0627\\u0633\\u062a\\u0642\\u062f\\u0627\\u0645 \\u0627\\u0644\\u0639\\u0645\\u0627\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0646\\u0632\\u0644\\u064a\\u0629 \\u0627\\u0644\\u0645\\u062d\\u062f\\u062f\\u0629 \\u0628\\u0639\\u062f \\u0627\\u062e\\u062a\\u064a\\u0627\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0631\\u0629 \\u0627\\u0644\\u0630\\u0627\\u062a\\u064a\\u0629\",\"en\":\"Pay an optional amount and document the application for the recruitment of specific domestic workers after choosing the CV\"}', '{\"ar\":\"\\u0648\\u0635\\u0648\\u0644 \\u0627\\u0644\\u0639\\u0645\\u0627\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0646\\u0632\\u0644\\u064a\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0631 \\u0627\\u0644\\u0645\\u062d\\u0644\\u064a \\u0627\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0643\\u062a\\u0628\",\"en\":\"Arrival of domestic workers from the local airport to the office\"}', '{\"ar\":\"\\u064a\\u0633\\u0631\\u0646\\u0627 \\u0623\\u0646 \\u0646\\u0631\\u062d\\u0628 \\u0628\\u0643 \\u0644\\u0644\\u0627\\u0637\\u0644\\u0627\\u0639 \\u0639\\u0644\\u0649 \\u062e\\u062f\\u0645\\u0627\\u062a\\u0646\\u0627\\u060c \\u0646\\u062d\\u0646 \\u0646\\u0633\\u0639\\u0649 \\u062c\\u0627\\u0647\\u062f\\u064a\\u0646 \\u0644\\u062a\\u0642\\u062f\\u064a\\u0645 \\u0623\\u0641\\u0636\\u0644 \\u062e\\u062f\\u0645\\u0627\\u062a \\u0627\\u0644\\u0625\\u0633\\u062a\\u0642\\u062f\\u0627\\u0645 \\u0644\\u0644\\u0639\\u0645\\u0627\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0646\\u0632\\u0644\\u064a\\u0629. \\u0644\\u062a\\u0642\\u062f\\u064a\\u0645 \\u0637\\u0644\\u0628 \\u0625\\u0633\\u062a\\u0642\\u062f\\u0627\\u0645 \\u0627\\u0644\\u0639\\u0645\\u0627\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0646\\u0632\\u0644\\u064a\\u0629 \\u0646\\u0631\\u062c\\u0648 \\u062a\\u0639\\u0628\\u0626\\u0629 \\u0643\\u0627\\u0645\\u0644 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a \\u0628\\u0634\\u0643\\u0644 \\u0635\\u062d\\u064a\\u062d\",\"en\":\"We are pleased to welcome you to view our services. We strive to provide the best recruitment services for domestic workers. To submit an application for the recruitment of domestic workers, please fill in all the data correctly\"}', NULL, NULL, NULL, NULL, 'https://www.facebook.com//', 'https://twitter.com/', '#', '#', '#', '#', '#', '#', '500000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar', NULL, NULL, 1, '2022-09-03 11:35:21', '2022-09-18 14:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='المهارات  للسيرة الذاتية';

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0627\\u0644\\u0643\\u0648\\u0649\",\"en\":\"maka\"}', '2021-12-29 06:54:11', '2022-09-12 14:29:34'),
(2, '{\"ar\":\"\\u0627\\u0644\\u063a\\u0633\\u064a\\u0644\"}', '2022-09-12 14:29:44', '2022-09-12 14:29:44'),
(3, '{\"ar\":\"\\u0627\\u0644\\u0637\\u0628\\u062e\"}', '2022-09-12 14:29:53', '2022-09-12 14:29:53'),
(4, '{\"ar\":\"\\u0639\\u0646\\u0627\\u064a\\u0629 \\u0627\\u0644\\u0631\\u0636\\u0639\"}', '2022-09-12 14:30:06', '2022-09-12 14:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0627\\u0644\\u062c\\u0648\\u0647\\u0631\\u0629 \\u0627\\u0644\\u0623\\u0648\\u0644\\u0649 \\u0644\\u0644\\u0625\\u0633\\u062a\\u0642\\u062f\\u0627\\u0645\"}', '{\"ar\":\"\\u0627\\u0643\\u0628\\u0631 \\u0645\\u0643\\u062a\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0642\\u062f\\u0627\\u0645 \\u0641\\u064a \\u0627\\u0644\\u0645\\u0645\\u0644\\u0643\\u0629 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629 \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u064a\\u0629\"}', 'sliders/png_user.png_1663519476.png', '2022-09-18 14:44:36', '2022-09-18 14:49:54'),
(2, '{\"ar\":\"\\u062e\\u062f\\u0645\\u0627\\u062a \\u0645\\u062a\\u0645\\u064a\\u0632\\u0629\"}', '{\"ar\":\"\\u062a\\u0639\\u0631\\u0641 \\u0639\\u0644\\u064a \\u062e\\u062f\\u0645\\u062a\\u0646\\u0627 \\u0627\\u0644\\u062a\\u064a \\u0646\\u0642\\u062f\\u0645\\u0647\\u0627 \\u0644\\u0643\"}', 'sliders/png_user.png_1663519898.png', '2022-09-18 14:51:38', '2022-09-18 14:51:38'),
(3, '{\"ar\":\"\\u0633\\u0647\\u0648\\u0644\\u0629 \\u0627\\u0644\\u0627\\u0633\\u062a\\u062e\\u062f\\u0627\\u0645\"}', '{\"ar\":\"\\u0627\\u0628\\u062f\\u0623 \\u062d\\u062c\\u0632\\u0643 \\u0648\\u0627\\u062a\\u0645\\u0645 \\u062f\\u0641\\u0639\\u0643 \\u0645\\u0646 \\u062e\\u0644\\u0627\\u0644 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0627\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0627\\u0648 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0645\\u0639\\u0646\\u0627 \\u0628\\u0648\\u0642\\u062a \\u0648\\u062c\\u064a\\u0632 \\u0648\\u0628\\u062e\\u0637\\u0648\\u0627\\u062a \\u0645\\u062e\\u062a\\u0635\\u0631\\u0629\"}', 'sliders/jpg_clean.jpg_1663519999.jpg', '2022-09-18 14:53:19', '2022-09-18 14:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `social_types`
--

CREATE TABLE `social_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='الحالة الاجتماعية  للسيرة الذاتية';

--
-- Dumping data for table `social_types`
--

INSERT INTO `social_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0627\\u0639\\u0632\\u0628\",\"en\":\"maka\"}', '2021-12-29 06:54:11', '2022-09-12 14:30:17'),
(2, '{\"ar\":\"\\u0627\\u0631\\u0645\\u0644\\u0629\"}', '2022-09-12 14:30:23', '2022-09-12 14:30:23'),
(3, '{\"ar\":\"\\u0645\\u062a\\u0632\\u0648\\u062c\\u0647\"}', '2022-09-12 14:30:31', '2022-09-12 14:30:31'),
(4, '{\"ar\":\"\\u0645\\u0637\\u0644\\u0642\\u0629\"}', '2022-09-12 14:30:42', '2022-09-12 14:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='الرعاة فى الصفحة الرئيسة';

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `title`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'our_services/svg_Ministry-of-Foreign-Affairs-01.svg_1662993158.svg', '2022-09-04 06:39:27', '2022-09-12 14:32:38'),
(2, NULL, NULL, 'our_services/svg_Ministry-of-Interior-01.svg_1662993192.svg', '2022-09-04 06:39:27', '2022-09-12 14:33:12'),
(3, NULL, NULL, 'our_services/svg_Ministry-of-Labor-and-Social-Development.svg_1662993208.svg', '2022-09-04 06:39:27', '2022-09-12 14:33:28'),
(4, NULL, NULL, 'our_services/svg_musand.svg_1662993227.svg', '2022-09-04 06:39:27', '2022-09-12 14:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='الاحصائيات فى الصفحة الرئيسة';

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `title`, `icon`, `number`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0639\\u0645\\u0644\\u0627\\u0626\\u0646\\u0627\",\"en\":\"our clients\"}', 'fa-users', '794', '2022-09-04 08:24:27', '2022-09-04 08:24:27'),
(2, '{\"ar\":\"\\u0632\\u0648\\u0627\\u0631\\u0646\\u0627\",\"en\":\"our visitors\"}', 'fa-buildings', '812', '2022-09-04 08:24:27', '2022-09-04 08:24:27'),
(3, '{\"ar\":\"\\u062e\\u062f\\u0645\\u0629 \\u0627\\u0644\\u0639\\u0645\\u0644\\u0627\\u0621\",\"en\":\"customers service\"}', 'fa-user-headset', '50', '2022-09-04 08:24:27', '2022-09-04 08:24:27'),
(4, '{\"ar\":\"\\u0639\\u0627\\u0645\\u0644 \\u0648\\u0639\\u0627\\u0645\\u0644\\u0629\",\"en\":\"worker\"}', 'fa-briefcase', '720', '2022-09-04 08:24:27', '2022-09-04 08:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('normal_user','employer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal_user' COMMENT 'normal_user=> عميل عادى  ,employer=>صاحب طلب خاص ',
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_iso` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_county` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'الاسم ',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'البريد الالكترونى unique',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_activation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `password_rest_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_link_expire` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_blocked` enum('blocked','not_blocked') COLLATE utf8mb4_unicode_ci DEFAULT 'not_blocked',
  `is_login` enum('connected','not_connected') COLLATE utf8mb4_unicode_ci DEFAULT 'not_connected',
  `logout_time` int(11) DEFAULT NULL,
  `software_type` enum('ios','android','web') COLLATE utf8mb4_unicode_ci DEFAULT 'web',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `city_id`, `phone_code`, `phone`, `phone_iso`, `phone_county`, `logo`, `name`, `email`, `password`, `phone_activation_code`, `activated_at`, `password_rest_code`, `token`, `confirm_link_expire`, `email_verified_at`, `is_blocked`, `is_login`, `logout_time`, `software_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'normal_user', 2, NULL, '500000001', NULL, NULL, 'users/jpg_mohamed.jpg_1663253985.jpg', 'محمد السدودي', 'mohamedelsdodey1996@gmail.com', '$2y$10$9igTeXPy4opgVIDntDuD2.bFYScFaVBs6BWOJ3rUvvZ4juQj392PG', NULL, '2022-09-16 20:53:41', NULL, '6d1da216fe00844a66eba708d92596d2', '2022-09-15 14:11:23', NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-03 11:36:12', '2022-09-16 20:53:41'),
(2, 'normal_user', NULL, NULL, '500000002', NULL, NULL, 'users/166240330987376.png', 'test test', NULL, '$2y$10$tA3fStFCOc7a1qThSLBiBumnzqR/T93YB/O08ZX8UQqz/Oks4sNCe', NULL, '2022-09-05 16:41:49', NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-05 16:41:49', '2022-09-05 16:41:49'),
(3, 'employer', 1, NULL, '512369856', NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-10 05:41:45', '2022-09-10 05:41:45'),
(4, 'employer', 1, NULL, '512369856', NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-10 05:45:52', '2022-09-10 05:45:52'),
(5, 'employer', 2, NULL, '558004111', NULL, NULL, NULL, 'ingazweb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-10 05:47:22', '2022-09-10 05:47:22'),
(6, 'normal_user', NULL, NULL, '501236548', NULL, NULL, 'users/166291089255447.png', 'mostafa', NULL, '$2y$10$Nbb5d6QL8Oyh0SbFY5gr2.RMCePos32S82iZfp8pJSESevN9/DRiC', NULL, '2022-09-11 13:41:32', NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-11 13:41:32', '2022-09-11 13:41:32'),
(7, 'normal_user', NULL, NULL, '512361236', NULL, NULL, 'users/166297757625995.png', 'احمد مصطفى', NULL, '$2y$10$SIF62C/AO5/X71Xu7/REgOc1DKBXthJaBS79yyIdxzBi9i85Szql.', NULL, '2022-09-12 08:12:56', NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-12 08:12:57', '2022-09-12 08:12:57'),
(8, 'employer', 1, NULL, '563216321', NULL, NULL, NULL, 'Ahmed Customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-12 08:52:36', '2022-09-12 08:52:36'),
(9, 'normal_user', 1, NULL, '500000000', NULL, NULL, 'users/jpg_297562647_432268955597737_796102947721556524_n.jpg_1663006807.jpg', 'mostafa elraw', NULL, '$2y$10$kTlotvFzwRTDXrq5ogTlNeW9/cI/OqDIC4uDC2EOYoVgBSS81y3EK', NULL, '2022-09-12 16:08:00', NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-12 16:08:00', '2022-09-12 18:20:07'),
(10, 'employer', 1, NULL, '523698562', NULL, NULL, NULL, 'test test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-12 17:21:40', '2022-09-12 17:21:40'),
(11, 'normal_user', NULL, NULL, '568181758', NULL, NULL, 'users/166301152552984.png', 'AbdEl moniem', NULL, '$2y$10$cQTV50/AxzsiHeogwErLf.UzKpRwqHvswmZ5rxN.GDUaEkynR/a56', NULL, '2022-09-12 19:38:45', NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-12 19:38:45', '2022-09-12 19:38:45'),
(12, 'employer', 1, NULL, '500000000', NULL, NULL, NULL, 'Hannah Ashley', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-13 18:29:48', '2022-09-13 18:29:48'),
(13, 'employer', 3, NULL, '500000000', NULL, NULL, NULL, 'Mary Whitney', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-13 18:41:38', '2022-09-13 18:41:38'),
(14, 'employer', 2, NULL, '500000000', NULL, NULL, NULL, 'Sara Calhoun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-13 19:03:05', '2022-09-13 19:03:05'),
(15, 'employer', 3, NULL, '500000000', NULL, NULL, NULL, 'Harlan Chandler', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-15 07:33:53', '2022-09-15 07:33:53'),
(16, 'employer', 1, NULL, '501111111', NULL, NULL, NULL, 'Tiger Hooper', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-15 07:49:58', '2022-09-15 07:49:58'),
(17, 'employer', 1, NULL, '500000000', NULL, NULL, NULL, 'Veronica Santiago', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-15 07:50:55', '2022-09-15 07:50:55'),
(18, 'normal_user', NULL, NULL, '590333333', NULL, NULL, 'users/166325027651824.png', 'Rigel Underwood', NULL, '$2y$10$WBA7kObsAYzEaojcupXDdeOV3GWBkP2arlexYYQjyFjiRV/layCMS', NULL, '2022-09-15 11:57:56', NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-15 11:57:56', '2022-09-15 11:57:56'),
(19, 'normal_user', NULL, NULL, '544343433', NULL, NULL, 'users/166325276591724.png', 'Emerald Palmer', NULL, '$2y$10$OUSshwhqAv9QEyWh1bV/eOAYaG1t6H5JNIPq5XkGH49l2Oj6c2WKC', NULL, '2022-09-15 12:39:25', NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-15 12:39:25', '2022-09-15 12:39:25'),
(20, 'normal_user', NULL, NULL, '543432221', NULL, NULL, 'users/166325293167844.png', 'Madonna Walls', NULL, '$2y$10$psubGjn2jBExVUdh99YOye3w99OCdX/fqHjm9Qu5jsD.T6fL4k5ym', NULL, '2022-09-15 12:42:12', NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-15 12:42:12', '2022-09-15 12:42:12'),
(21, 'employer', 2, NULL, '567897654', NULL, NULL, NULL, 'Conan Melton', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-15 20:16:28', '2022-09-15 20:16:28'),
(22, 'normal_user', NULL, NULL, '567865432', NULL, NULL, 'users/166348538617786.png', 'Orla Trevino', NULL, '$2y$10$rNOGxQ0lkZX4hs9H5W5ktOfKgPKw83EXtTihMiDh6.UzM05pgoU72', NULL, '2022-09-18 05:16:26', NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-18 05:16:26', '2022-09-18 05:16:26'),
(23, 'employer', 1, NULL, '500000000', NULL, NULL, NULL, 'Louis Haynes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-18 09:00:02', '2022-09-18 09:00:02'),
(24, 'normal_user', NULL, NULL, '534244222', NULL, NULL, 'users/166350045344609.png', 'Jessica Ortiz', NULL, '$2y$10$htOm26G6RSJ0ukppjEjCe.mYMnXwKhyUgGTn0ZciBnoTxBuZj43ly', NULL, '2022-09-18 09:27:33', NULL, NULL, NULL, NULL, 'not_blocked', 'not_connected', NULL, 'web', NULL, '2022-09-18 09:27:33', '2022-09-18 09:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_read` enum('read','unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `title`, `desc`, `user_id`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'wrwq3wr33f3', 'gt4g34h43ok343442g4gf3v eg4g4g', 1, 'unread', '2022-05-21 07:00:39', '2022-05-21 07:00:39'),
(2, 'wrwq3wr33f3', 'gt4g34h43ok343442g4gf3v eg4g4g', 1, 'unread', '2022-05-21 07:00:39', '2022-05-21 07:00:39'),
(3, 'wrwq3wr33f3', 'gt4g34h43ok343442g4gf3v eg4g4g', 1, 'unread', '2022-05-21 07:00:39', '2022-05-21 07:00:39'),
(4, 'wrwq3wr33f3', 'gt4g34h43ok343442g4gf3v eg4g4g', 1, 'unread', '2022-05-21 07:00:39', '2022-05-21 07:00:39'),
(5, 'wrwq3wr33f3', 'gt4g34h43ok343442g4gf3v eg4g4g', 1, 'unread', '2022-05-21 07:00:39', '2022-05-21 07:00:39'),
(6, 'wrwq3wr33f3', 'gt4g34h43ok343442g4gf3v eg4g4g', 1, 'unread', '2022-05-21 07:00:39', '2022-05-21 07:00:39'),
(7, 'wrwq3wr33f3', 'gt4g34h43ok343442g4gf3v eg4g4g', 1, 'unread', '2022-05-21 07:00:39', '2022-05-21 07:00:39'),
(8, 'wrwq3wr33f3', 'gt4g34h43ok343442g4gf3v eg4g4g', 1, 'unread', '2022-05-21 07:00:39', '2022-05-21 07:00:39'),
(9, 'wrwq3wr33f3', 'gt4g34h43ok343442g4gf3v eg4g4g', 1, 'unread', '2022-05-21 07:00:39', '2022-05-21 07:00:39'),
(10, 'wrwq3wr33f3', 'gt4g34h43ok343442g4gf3v eg4g4g', 1, 'unread', '2022-05-21 07:00:39', '2022-05-21 07:00:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `age_ranges`
--
ALTER TABLE `age_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biographies`
--
ALTER TABLE `biographies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biographies_recruitment_office_id_foreign` (`recruitment_office_id`),
  ADD KEY `biographies_nationalitie_id_foreign` (`nationalitie_id`),
  ADD KEY `biographies_language_title_id_foreign` (`language_title_id`),
  ADD KEY `biographies_religion_id_foreign` (`religion_id`),
  ADD KEY `biographies_job_id_foreign` (`job_id`),
  ADD KEY `biographies_social_type_id_foreign` (`social_type_id`),
  ADD KEY `biographies_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `biography_images`
--
ALTER TABLE `biography_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biography_images_biography_id_foreign` (`biography_id`);

--
-- Indexes for table `biography_skills`
--
ALTER TABLE `biography_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biography_skills_biography_id_foreign` (`biography_id`),
  ADD KEY `biography_skills_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailylabordemand`
--
ALTER TABLE `dailylabordemand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `firebase_tokens`
--
ALTER TABLE `firebase_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firebase_tokens_user_id_foreign` (`user_id`);

--
-- Indexes for table `frequently_questions`
--
ALTER TABLE `frequently_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frequently_subjects`
--
ALTER TABLE `frequently_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_titles`
--
ALTER TABLE `language_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_biography_id_foreign` (`biography_id`),
  ADD KEY `orders_admin_id_foreign` (`admin_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `our_services`
--
ALTER TABLE `our_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recruitment_offices`
--
ALTER TABLE `recruitment_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitment_trip`
--
ALTER TABLE `recruitment_trip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_types`
--
ALTER TABLE `social_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_city_id_foreign` (`city_id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_notifications_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `age_ranges`
--
ALTER TABLE `age_ranges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `biographies`
--
ALTER TABLE `biographies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `biography_images`
--
ALTER TABLE `biography_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `biography_skills`
--
ALTER TABLE `biography_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dailylabordemand`
--
ALTER TABLE `dailylabordemand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `firebase_tokens`
--
ALTER TABLE `firebase_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frequently_questions`
--
ALTER TABLE `frequently_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `frequently_subjects`
--
ALTER TABLE `frequently_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `language_titles`
--
ALTER TABLE `language_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `our_services`
--
ALTER TABLE `our_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruitment_offices`
--
ALTER TABLE `recruitment_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recruitment_trip`
--
ALTER TABLE `recruitment_trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_types`
--
ALTER TABLE `social_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biographies`
--
ALTER TABLE `biographies`
  ADD CONSTRAINT `biographies_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biographies_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biographies_language_title_id_foreign` FOREIGN KEY (`language_title_id`) REFERENCES `language_titles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biographies_nationalitie_id_foreign` FOREIGN KEY (`nationalitie_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biographies_recruitment_office_id_foreign` FOREIGN KEY (`recruitment_office_id`) REFERENCES `recruitment_offices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biographies_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biographies_social_type_id_foreign` FOREIGN KEY (`social_type_id`) REFERENCES `social_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `biography_images`
--
ALTER TABLE `biography_images`
  ADD CONSTRAINT `biography_images_biography_id_foreign` FOREIGN KEY (`biography_id`) REFERENCES `biographies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `biography_skills`
--
ALTER TABLE `biography_skills`
  ADD CONSTRAINT `biography_skills_biography_id_foreign` FOREIGN KEY (`biography_id`) REFERENCES `biographies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biography_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `firebase_tokens`
--
ALTER TABLE `firebase_tokens`
  ADD CONSTRAINT `firebase_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_biography_id_foreign` FOREIGN KEY (`biography_id`) REFERENCES `biographies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD CONSTRAINT `user_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
