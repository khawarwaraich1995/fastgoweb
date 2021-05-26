-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 07:18 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodtiger`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `apartment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intercom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `address`, `created_at`, `updated_at`, `lat`, `lng`, `active`, `user_id`, `apartment`, `intercom`, `floor`, `entry`) VALUES
(1, '5797 Riley Lights\nCorrinefort, CT 69979', '2021-05-04 16:29:37', '2021-05-04 16:29:37', '40.621997', '-73.938831', 1, 4, NULL, NULL, NULL, NULL),
(2, '505 Crist Avenue\nPort Nash, NH 47856-0955', '2021-05-04 16:29:37', '2021-05-04 16:29:37', '40.621997', '-73.938831', 1, 5, NULL, NULL, NULL, NULL),
(3, '52038 Bernhard Roads Suite 549\nWest Leonmouth, NJ 00156', '2021-05-04 16:29:37', '2021-05-04 16:29:37', '40.621997', '-73.938831', 1, 5, NULL, NULL, NULL, NULL),
(4, '3225 Sid Fields\nKaylifort, NY 05779-0249', '2021-05-04 16:29:37', '2021-05-04 16:29:37', '40.621997', '-73.938831', 1, 4, NULL, NULL, NULL, NULL),
(5, '77623 Meggie Isle\nSpinkamouth, CA 78609', '2021-05-04 16:29:37', '2021-05-04 16:29:37', '40.621997', '-73.938831', 1, 4, NULL, NULL, NULL, NULL),
(6, '9368 Botsford Pass\nWest Paolo, SC 29684-4087', '2021-05-04 16:29:37', '2021-05-04 16:29:37', '40.621997', '-73.938831', 1, 5, NULL, NULL, NULL, NULL),
(7, '891 Skiles Bridge Apt. 643\nPort Shanna, SC 29087', '2021-05-04 16:29:37', '2021-05-04 16:29:37', '40.621997', '-73.938831', 1, 5, NULL, NULL, NULL, NULL),
(8, '9030 Ernest Roads Apt. 294\nPort Mallieburgh, AR 87621', '2021-05-04 16:29:37', '2021-05-04 16:29:37', '40.621997', '-73.938831', 1, 5, NULL, NULL, NULL, NULL),
(9, '51324 Trantow Stravenue\nOrnburgh, IL 27855-7285', '2021-05-04 16:29:37', '2021-05-04 16:29:37', '40.621997', '-73.938831', 1, 4, NULL, NULL, NULL, NULL),
(10, '96402 Kyler Underpass Apt. 818\nWest Brayanfort, WI 17856', '2021-05-04 16:29:37', '2021-05-04 16:29:37', '40.621997', '-73.938831', 1, 5, NULL, NULL, NULL, NULL),
(11, '213, Rahim Yar Khan, Pakistan', '2021-05-04 23:39:07', '2021-05-04 23:39:07', '28.4211565', '70.2988744', 1, 7, '312', '123', '123', '23');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '0 - Vendor, 1 - Blog',
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `active_from` date NOT NULL,
  `active_to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'received',
  `from_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` tinyint(4) NOT NULL,
  `order_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pickup_time` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_id`, `driver_id`, `category_id`, `order_status`, `from_location`, `to_location`, `full_name`, `email`, `phone`, `transaction_no`, `note`, `payment_status`, `order_total`, `created_at`, `updated_at`, `pickup_time`, `payment_method`) VALUES
(1, 1, 0, 0, 'accepted', '28.4211565,70.2988744', '28.4211565,70.2988744', 'Admin Admin', 'mtayyabakmal786@gmail.com', '', '', NULL, 0, 20.00, '2021-05-24 00:44:54', '2021-05-24 00:45:18', NULL, ''),
(2, 1, 0, 0, 'received', '31.170406299999996,72.7097161', '28.4211565,70.2988744', 'Admin Admin', 'mtayyabakmal786@gmail.com', '', '', NULL, 0, 12893.48, '2021-05-24 02:20:44', '2021-05-24 02:20:44', NULL, ''),
(3, 1, 0, 0, 'received', '28.4211565,70.2988744', '31.5203696,74.35874729999999', 'Admin Admin', 'mtayyabakmal786@gmail.com', '', '', NULL, 0, 11260.00, '2021-05-24 02:52:52', '2021-05-24 02:52:52', NULL, ''),
(4, 1, 0, 0, 'received', '28.4211565,70.2988744', '31.5203696,74.35874729999999', 'Admin Admin', 'mtayyabakmal786@gmail.com', '', '', NULL, 0, 11260.00, '2021-05-24 02:54:08', '2021-05-24 02:54:08', NULL, ''),
(5, 1, 0, 0, 'received', '28.4211565,70.2988744', '31.5203696,74.35874729999999', 'Admin Admin', 'mtayyabakmal786@gmail.com', '', '', NULL, 0, 11260.00, '2021-05-24 02:56:19', '2021-05-24 02:56:19', NULL, ''),
(6, 1, 0, 0, 'received', '31.170406299999996,72.7097161', '31.170406299999996,72.7097161', 'Admin Admin', 'mtayyabakmal786@gmail.com', '', '', NULL, 1, 20.00, '2021-05-24 03:06:04', '2021-05-24 03:15:41', '', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charges` double(8,2) NOT NULL DEFAULT 0.00,
  `charges_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `name`, `description`, `charges`, `charges_type`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sedan', NULL, 20.00, 'distance', '1_sedan-512.png', 1, '2021-05-21 23:38:43', '2021-05-21 23:38:43'),
(2, 'Van', NULL, 50.00, 'miles', '2_sedan-512.png', 1, '2021-05-21 23:39:49', '2021-05-22 00:20:22'),
(3, 'Truck', NULL, 10.00, 'miles', '3_03.png', 1, '2021-05-22 00:15:54', '2021-05-22 00:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `catagoriesmains`
--

CREATE TABLE `catagoriesmains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagoriesmains`
--

INSERT INTO `catagoriesmains` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Juice', '1_05.png', 1, '2021-05-21 23:38:43', '2021-05-26 04:37:11'),
(2, 'Soup', '2_07.png', 1, '2021-05-21 23:39:49', '2021-05-26 04:36:52'),
(3, 'Dinner', '3_01.png', 1, '2021-05-22 00:15:54', '2021-05-26 04:36:35'),
(4, 'Tea', '4_06.png', 1, '2021-05-26 04:38:11', '2021-05-26 04:38:11'),
(5, 'Chicken', '5_08.png', 1, '2021-05-26 04:58:47', '2021-05-26 04:58:47'),
(6, 'Lemon', '6_05.png', 1, '2021-05-26 04:58:59', '2021-05-26 04:58:59'),
(7, 'Drinks', '7_04.png', 1, '2021-05-26 04:59:12', '2021-05-26 04:59:12'),
(8, 'Fast Food', '8_02.png', 1, '2021-05-26 04:59:26', '2021-05-26 04:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restorant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_index` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `restorant_id`, `created_at`, `updated_at`, `order_index`, `active`) VALUES
(69, '{\"en\":\"Pizza\",\"ur\":\"Pizza\"}', 17, '2021-05-04 23:48:13', '2021-05-04 23:49:25', 1, 1),
(70, '{\"en\":\"Burger\"}', 19, '2021-05-05 17:11:16', '2021-05-05 17:11:16', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `created_at`, `updated_at`, `name`, `alias`, `image`, `header_title`, `header_subtitle`, `deleted_at`) VALUES
(1, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'Bronx', 'bx', 'https://foodtiger.mobidonia.com/uploads/settings/177686e2-8597-46e0-bf70-daa8d5ff0085_large.jpg', 'Food Delivery from<br /><strong>Bronx</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(2, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'Brooklyn', 'br', 'https://foodtiger.mobidonia.com/uploads/settings/6d001b6c-2ba1-499e-9f57-09b7dc46ace3_large.jpg', 'Food Delivery from<br /><strong>Brooklyn</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(3, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'Queens', 'qe', 'https://foodtiger.mobidonia.com/uploads/settings/492b78df-1756-4c30-910a-d3923b66aa97_large.jpg', 'Food Delivery from<br /><strong>Queens</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(4, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'Manhattn', 'mh', 'https://foodtiger.mobidonia.com/uploads/settings/01f41f56-1acf-44f0-8e8d-fedceb5267cf_large.jpg', 'Food Delivery from<br /><strong>Manhattn</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(5, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'Richmond', 'ri', 'https://foodtiger.mobidonia.com/uploads/settings/fe6c500b-3410-41ff-9734-94c58351ba60_large.jpg', 'Food Delivery from<br /><strong>Richmond</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(6, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'Buffalo', 'bf', 'https://foodtiger.mobidonia.com/uploads/settings/0c3c8fb0-c252-4758-9699-6851b15796ef_large.jpg', 'Food Delivery from<br /><strong>Buffalo</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(7, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'Rochester', 'rh', 'https://foodtiger.mobidonia.com/uploads/settings/c7f21267-7149-4311-9fd9-4a08904f67a3_large.jpg', 'Food Delivery from<br /><strong>Rochester</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(8, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'Yonkers', 'yo', 'https://foodtiger.mobidonia.com/uploads/settings/8c65269a-3bbc-4899-be13-75d1bc35e9cd_large.jpg', 'Food Delivery from<br /><strong>Yonkers</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(9, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'Syracuse', 'sy', 'https://foodtiger.mobidonia.com/uploads/settings/1e5fcde5-5dc0-4c29-8f49-314658836fb8_large.jpg', 'Food Delivery from<br /><strong>Syracuse</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(10, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'Albany', 'al', 'https://foodtiger.mobidonia.com/uploads/settings/b521e77f-1d3e-4695-b871-bac8262c85dc_large.jpg', 'Food Delivery from<br /><strong>Albany</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(11, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'New Rochelle', 'nr', 'https://foodtiger.mobidonia.com/uploads/settings/8b3ebb83-2e2e-43dd-8747-4f9c6f451199_large.jpg', 'Food Delivery from<br /><strong>New Rochelle</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(12, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'Mount Vernon', 'mv', 'https://foodtiger.mobidonia.com/uploads/settings/daecfb93-677f-43a9-9e7e-4cf109194399_large.jpg', 'Food Delivery from<br /><strong>Mount Vernon</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(13, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'Schenectady', 'sc', 'https://foodtiger.mobidonia.com/uploads/settings/177686e2-8597-46e0-bf70-daa8d5ff0085_large.jpg', 'Food Delivery from<br /><strong>Schenectady</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(14, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'Utica', 'ut', 'https://foodtiger.mobidonia.com/uploads/settings/507847c5-1896-4ecf-bfe8-9c5f198ce41e_large.jpg', 'Food Delivery from<br /><strong>Utica</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(15, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'White Plains', 'wp', 'https://foodtiger.mobidonia.com/uploads/settings/a8e96a74-dc3a-403c-8fd0-b4528838e98c_large.jpg', 'Food Delivery from<br /><strong>White Plains</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL),
(16, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 'Niagara Falls', 'nf', 'https://foodtiger.mobidonia.com/uploads/settings/99d5b4c3-0bb4-428a-96cf-0e510bc3ab57_large.jpg', 'Food Delivery from<br /><strong>Niagara Falls</strong>’s Best Restaurants', 'The meals you love, delivered with care', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `value`, `key`, `model_type`, `model_id`, `created_at`, `updated_at`) VALUES
(1, '0', 'disable_callwaiter', 'App\\Restorant', 17, '2021-05-04 22:52:33', '2021-05-04 22:52:33'),
(2, '0', 'time_to_prepare_order_in_minutes', 'App\\Restorant', 17, '2021-05-04 23:44:18', '2021-05-05 14:01:52'),
(3, '5', 'delivery_interval_in_minutes', 'App\\Restorant', 17, '2021-05-04 23:44:18', '2021-05-05 14:17:48'),
(4, '0', 'disable_callwaiter', 'App\\Restorant', 18, '2021-05-05 00:27:56', '2021-05-05 00:27:56'),
(5, '0', 'disable_callwaiter', 'App\\Restorant', 19, '2021-05-05 13:46:01', '2021-05-05 13:46:01'),
(6, 'Impressum', 'impressum_title', 'App\\Restorant', 17, '2021-05-05 14:18:07', '2021-05-05 14:18:07'),
(7, 'sa', 'impressum_value', 'App\\Restorant', 17, '2021-05-05 14:18:07', '2021-05-05 14:18:07'),
(8, '0', 'time_to_prepare_order_in_minutes', 'App\\Restorant', 19, '2021-05-05 17:11:00', '2021-05-05 17:11:00'),
(9, '30', 'delivery_interval_in_minutes', 'App\\Restorant', 19, '2021-05-05 17:11:00', '2021-05-05 17:11:00'),
(10, '0', 'disable_callwaiter', 'App\\Restorant', 20, '2021-05-09 02:21:36', '2021-05-09 02:21:36'),
(11, '0', 'time_to_prepare_order_in_minutes', 'App\\Restorant', 20, '2021-05-26 02:46:55', '2021-05-26 02:46:55'),
(12, '30', 'delivery_interval_in_minutes', 'App\\Restorant', 20, '2021-05-26 02:46:55', '2021-05-26 02:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1 COMMENT '0 - Fixed, 1 - Percentage',
  `price` double(8,2) NOT NULL,
  `active_from` date NOT NULL,
  `active_to` date NOT NULL,
  `limit_to_num_uses` int(11) NOT NULL,
  `used_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `extra_for_all_variants` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `item_id`, `price`, `name`, `created_at`, `updated_at`, `deleted_at`, `extra_for_all_variants`) VALUES
(497, 342, 2.00, '{\"en\":\"Cheas\"}', '2021-05-04 23:50:37', '2021-05-04 23:50:37', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hours`
--

CREATE TABLE `hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `0_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `0_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `1_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `1_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `2_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `2_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `3_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `3_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `4_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `4_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `5_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `5_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `6_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `6_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restorant_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hours`
--

INSERT INTO `hours` (`id`, `created_at`, `updated_at`, `0_from`, `0_to`, `1_from`, `1_to`, `2_from`, `2_to`, `3_from`, `3_to`, `4_from`, `4_to`, `5_from`, `5_to`, `6_from`, `6_to`, `restorant_id`) VALUES
(17, '2021-05-04 22:52:33', '2021-05-04 23:45:58', '12:01 AM', '11:59 PM', '12:01 AM', '11:59 PM', '12:01 AM', '11:59 PM', '12:01 AM', '11:59 PM', '12:01 AM', '11:59 PM', '12:01 AM', '11:59 PM', '12:01 AM', '11:59 PM', 17),
(18, '2021-05-04 23:46:25', '2021-05-04 23:46:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(19, '2021-05-05 00:27:56', '2021-05-05 00:27:56', '9:00 AM', '5:00 PM', '9:00 AM', '5:00 PM', '9:00 AM', '5:00 PM', '9:00 AM', '5:00 PM', '9:00 AM', '5:00 PM', '9:00 AM', '5:00 PM', '9:00 AM', '5:00 PM', 18),
(20, '2021-05-05 13:46:01', '2021-05-05 13:46:01', '9:00 AM', '5:00 AM', '9:00 AM', '5:00 AM', '9:00 AM', '5:00 AM', '9:00 AM', '5:00 AM', '9:00 AM', '5:00 AM', '9:00 AM', '5:00 AM', '9:00 AM', '5:00 AM', 19),
(21, '2021-05-09 02:21:36', '2021-05-09 02:21:36', '9:00 AM', '5:00 AM', '9:00 AM', '5:00 AM', '9:00 AM', '5:00 AM', '9:00 AM', '5:00 AM', '9:00 AM', '5:00 AM', '9:00 AM', '5:00 AM', '9:00 AM', '5:00 AM', 20);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(455) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `available` int(11) NOT NULL DEFAULT 1,
  `has_variants` int(11) NOT NULL DEFAULT 0,
  `vat` double(8,2) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `image`, `price`, `category_id`, `created_at`, `updated_at`, `available`, `has_variants`, `vat`, `deleted_at`) VALUES
(341, '{\"en\":\"Fajita Pizza\",\"ur\":\"Fajita Pizza\"}', '{\"en\":\"Fajita Pizza\",\"ur\":\"Fajita Pizza\"}', '', 299.00, 69, '2021-05-04 23:48:40', '2021-05-04 23:49:25', 1, 0, NULL, NULL),
(342, '{\"ur\":\"Fajita Pizza Urdu\",\"en\":\"Fajita Pizza Urdu\"}', '{\"ur\":\"Fajita Pizza Urdu\",\"en\":\"Fajita Pizza Urdu\"}', '', 123.00, 69, '2021-05-04 23:49:48', '2021-05-04 23:51:01', 1, 0, 10.00, NULL),
(343, '{\"en\":\"Tower Burger\"}', '{\"en\":\"Tower Burger\"}', '', 300.00, 70, '2021-05-05 17:11:39', '2021-05-05 17:11:39', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `localmenus`
--

CREATE TABLE `localmenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `languageName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` int(11) NOT NULL DEFAULT 0 COMMENT '0 - No, 1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `localmenus`
--

INSERT INTO `localmenus` (`id`, `created_at`, `updated_at`, `restaurant_id`, `language`, `languageName`, `default`) VALUES
(18, '2021-05-04 23:50:08', '2021-05-05 13:13:11', 17, 'en', 'English', 1);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_29_200844_create_languages_table', 1),
(4, '2018_08_29_205156_create_translations_table', 1),
(5, '2019_05_03_000001_create_customer_columns', 1),
(6, '2019_05_03_000002_create_subscriptions_table', 1),
(7, '2019_05_03_000003_create_subscription_items_table', 1),
(8, '2020_02_06_010033_create_permission_tables', 1),
(9, '2020_02_06_022212_create_restorants_table', 1),
(10, '2020_02_09_015116_create_status_table', 1),
(11, '2020_02_09_152551_create_categories_table', 1),
(12, '2020_02_09_152656_create_items_table', 1),
(13, '2020_02_11_052117_create_address_table', 1),
(14, '2020_02_11_054259_create_orders_table', 1),
(15, '2020_02_20_094727_create_settings_table', 1),
(16, '2020_03_25_134914_create_pages_table', 1),
(17, '2020_04_03_143518_update_settings_table', 1),
(18, '2020_04_10_202027_create_payments_table', 1),
(19, '2020_04_11_165819_update_table_orders', 1),
(20, '2020_04_22_105556_update_items_table', 1),
(21, '2020_04_23_212320_update_restorants_table', 1),
(22, '2020_04_23_212502_update_orders_table', 1),
(23, '2020_04_28_112519_update_address_table', 1),
(24, '2020_05_07_122727_create_hours_table', 1),
(25, '2020_05_09_012646_update_orders_add_delivery_table', 1),
(26, '2020_05_09_024507_add_options_to_settings_table', 1),
(27, '2020_05_20_232204_create_notifications_table', 1),
(28, '2020_06_03_134258_change_radius_to_delivery_area_restorants_table', 1),
(29, '2020_06_26_131803_create_sms_verifications_table', 1),
(30, '2020_07_12_182829_create_extras_table', 1),
(31, '2020_07_14_155509_create_plan_table', 1),
(32, '2020_07_23_183000_update_restorants_with_featured', 1),
(33, '2020_07_28_131511_update_users_sms_verification', 1),
(34, '2020_07_30_102916_change_json_to_string', 1),
(35, '2020_08_01_014851_create_variants', 1),
(36, '2020_08_14_003718_create_ratings_table', 1),
(37, '2020_08_18_035731_update_table_plans', 1),
(38, '2020_08_18_053012_update_user_add_plan', 1),
(39, '2020_09_02_131604_update_orders_time_to_prepare', 1),
(40, '2020_09_09_080747_create_cities_table', 1),
(41, '2020_09_28_131250_update_item_softdelete', 1),
(42, '2020_10_24_150254_create_tables_table', 1),
(43, '2020_10_25_021321_create_visits_table', 1),
(44, '2020_10_26_004421_update_orders_client_nullable', 1),
(45, '2020_10_26_104351_update_restorant_table', 1),
(46, '2020_10_26_190049_update_plan', 1),
(47, '2020_10_27_180123_create_stripe_payment', 1),
(48, '2020_11_01_190615_update_user_table', 1),
(49, '2020_11_05_081140_create_paths_table', 1),
(50, '2020_11_14_111220_create_phone_in_orders', 1),
(51, '2020_11_17_211252_update_logo_in_settings', 1),
(52, '2020_11_25_182453_create_paypal_payment', 1),
(53, '2020_11_25_225536_update_user_for_paypal_subsc', 1),
(54, '2020_11_27_102829_update_restaurants_for_delivery_pickup', 1),
(55, '2020_11_27_165901_create_coupons_table', 1),
(56, '2020_12_02_192213_update_for_whatsapp_order', 1),
(57, '2020_12_02_195333_update_for_mollie_payment', 1),
(58, '2020_12_07_142304_create_banners_table', 1),
(59, '2020_12_10_155335_wp_address', 1),
(60, '2020_12_14_195627_update_for_paystack_sub', 1),
(61, '2020_12_15_130511_update_paystack_verification', 1),
(62, '2020_12_27_155822_create_restaurant_multilanguage', 1),
(63, '2020_12_27_162902_update_restaurant_with_currency', 1),
(64, '2021_01_16_093708_update_restorant_with_pay_link', 1),
(65, '2021_01_22_142723_create_crud_for_whatsapp_landing', 1),
(66, '2021_02_16_065037_create_configs_table', 2),
(67, '2021_02_18_140330_allow_null_on_config_value', 2),
(68, '2021_02_22_135519_update_settinga_table', 3),
(69, '2021_02_26_113854_order_fee_update', 4),
(70, '2021_03_23_135952_update_config_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 8),
(2, 'App\\User', 11),
(2, 'App\\User', 13),
(2, 'App\\User', 14),
(3, 'App\\User', 3),
(3, 'App\\User', 6),
(3, 'App\\User', 9),
(3, 'App\\User', 10),
(3, 'App\\User', 12),
(4, 'App\\User', 4),
(4, 'App\\User', 5),
(4, 'App\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0073b772-d21a-4139-80a9-a61153726790', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Your order is ready.\",\"body\":\"Your order is ready for delivery. Expect us soon.\"}', NULL, '2021-05-05 13:54:02', '2021-05-05 13:54:02'),
('126db74a-5f2a-431d-b7c4-4b0c07bad15f', 'App\\Notifications\\OrderNotification', 'App\\User', 12, '{\"title\":\"There is new order for you.\",\"body\":\"There is new order assigned to you.\"}', NULL, '2021-05-08 17:39:23', '2021-05-08 17:39:23'),
('1c2443ae-5b83-4044-bf90-d6e6a2270e76', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Your order has been accepted\",\"body\":\"order#619 We are now working on it!\"}', NULL, '2021-05-05 13:53:44', '2021-05-05 13:53:44'),
('3525f26c-1970-4749-a25a-017f13e0fbde', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Your order is ready.\",\"body\":\"Your order is ready for pickup. We are expecting you.\"}', NULL, '2021-05-05 13:13:28', '2021-05-05 13:13:28'),
('37e91df5-9f62-44a5-ac3c-dc5d3b07ee17', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Your order is ready.\",\"body\":\"Your order is ready for pickup. We are expecting you.\"}', NULL, '2021-05-05 14:20:12', '2021-05-05 14:20:12'),
('39c5141b-ff07-4287-b399-1fce9d1d1238', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Your order has been accepted\",\"body\":\"order#615 We are now working on it!\"}', NULL, '2021-05-05 13:13:24', '2021-05-05 13:13:24'),
('3af3a310-5fa3-4249-900a-15d97e283557', 'App\\Notifications\\OrderNotification', 'App\\User', 1, '{\"title\":\"Your order is ready.\",\"body\":\"Your order is ready for pickup. We are expecting you.\"}', NULL, '2021-05-05 14:19:21', '2021-05-05 14:19:21'),
('4e82469a-f184-42af-8cfa-36c8125678f1', 'App\\Notifications\\OrderNotification', 'App\\User', 8, '{\"title\":\"There is new order\",\"body\":\"You have just received an order\"}', NULL, '2021-05-05 13:19:37', '2021-05-05 13:19:37'),
('50e81457-0f38-4535-a6fc-61429b70d221', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Your order has been accepted\",\"body\":\"order#603 We are now working on it!\"}', NULL, '2021-05-05 13:57:57', '2021-05-05 13:57:57'),
('51bc5345-c981-430e-bef2-38fcf6b98626', 'App\\Notifications\\OrderNotification', 'App\\User', 8, '{\"title\":\"There is new order\",\"body\":\"You have just received an order\"}', NULL, '2021-05-05 13:51:15', '2021-05-05 13:51:15'),
('543977be-13b1-4320-b7b0-43b185dc3c75', 'App\\Notifications\\OrderNotification', 'App\\User', 8, '{\"title\":\"There is new order\",\"body\":\"You have just received an order\"}', NULL, '2021-05-05 13:52:04', '2021-05-05 13:52:04'),
('5d013ebe-173c-406c-a0f3-86ac6faa27fa', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Order rejected\",\"body\":\"Unfortunately your order is rejected. There where issues with the order and we need to reject it. Pls contact us for more info.\"}', NULL, '2021-05-05 13:13:20', '2021-05-05 13:13:20'),
('6b742e23-a6d5-442b-b152-b2d03a91f9ba', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Your order is ready.\",\"body\":\"Your order is ready for delivery. Expect us soon.\"}', NULL, '2021-05-05 13:58:03', '2021-05-05 13:58:03'),
('6c24ce4a-1751-4647-8a38-a5f3cd3a7939', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Your order has been accepted\",\"body\":\"order#614 We are now working on it!\"}', NULL, '2021-05-05 14:20:08', '2021-05-05 14:20:08'),
('6dc6ed97-2e60-4a1a-bf1a-d34611a8d6a3', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Your order is ready.\",\"body\":\"Your order is ready for delivery. Expect us soon.\"}', NULL, '2021-05-05 13:20:51', '2021-05-05 13:20:51'),
('8b664220-ed77-4d8d-9097-a1ecdcc43503', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Your order is ready.\",\"body\":\"Your order is ready for delivery. Expect us soon.\"}', NULL, '2021-05-05 14:10:19', '2021-05-05 14:10:19'),
('91b8ddfc-6b68-4cb6-95e5-32f1b034386f', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Your order is ready.\",\"body\":\"Your order is ready for delivery. Expect us soon.\"}', NULL, '2021-05-05 13:13:39', '2021-05-05 13:13:39'),
('9d1d0a57-bcab-4d70-a81b-43639621a38b', 'App\\Notifications\\OrderNotification', 'App\\User', 1, '{\"title\":\"Your order has been accepted\",\"body\":\"order#618 We are now working on it!\"}', NULL, '2021-05-05 14:19:13', '2021-05-05 14:19:13'),
('a49ac3c9-30c9-406c-b6d4-049cda981c8b', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Your order has been accepted\",\"body\":\"order#617 We are now working on it!\"}', NULL, '2021-05-05 13:20:48', '2021-05-05 13:20:48'),
('ae76a938-8f10-4bc8-bcc9-bd2ed2070215', 'App\\Notifications\\OrderNotification', 'App\\User', 8, '{\"title\":\"There is new order\",\"body\":\"You have just received an order\"}', NULL, '2021-05-05 14:08:29', '2021-05-05 14:08:29'),
('b649be22-203e-4463-9a76-bbfeb70706c3', 'App\\Notifications\\OrderNotification', 'App\\User', 8, '{\"title\":\"There is new order\",\"body\":\"You have just received an order\"}', NULL, '2021-05-05 13:12:04', '2021-05-05 13:12:04'),
('c86ca93f-9b39-45b5-8c2f-8b5a86d8bf81', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Your order has been accepted\",\"body\":\"order#613 We are now working on it!\"}', NULL, '2021-05-05 13:13:35', '2021-05-05 13:13:35'),
('ccc84c16-b317-487d-8493-681e26eb827f', 'App\\Notifications\\OrderNotification', 'App\\User', 7, '{\"title\":\"Your order has been accepted\",\"body\":\"order#620 We are now working on it!\"}', NULL, '2021-05-05 14:10:16', '2021-05-05 14:10:16'),
('e9f7a3b8-33aa-4f95-8b20-093fe70f0cc2', 'App\\Notifications\\OrderNotification', 'App\\User', 8, '{\"title\":\"There is new order\",\"body\":\"You have just received an order\"}', NULL, '2021-05-05 13:08:00', '2021-05-05 13:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `restorant_id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `delivery_price` double(8,2) NOT NULL,
  `order_price` double(8,2) NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `srtipe_payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee` double(8,2) NOT NULL DEFAULT 0.00,
  `fee_value` double NOT NULL DEFAULT 0,
  `static_fee` double(8,2) NOT NULL DEFAULT 0.00,
  `delivery_method` int(11) NOT NULL DEFAULT 1 COMMENT '1- Delivery, 2- Pickup',
  `delivery_pickup_interval` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `vatvalue` double(8,2) DEFAULT 0.00,
  `payment_processor_fee` double(8,2) NOT NULL DEFAULT 0.00,
  `time_to_prepare` int(11) DEFAULT NULL,
  `table_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `address_id`, `client_id`, `restorant_id`, `driver_id`, `delivery_price`, `order_price`, `payment_method`, `payment_status`, `comment`, `lat`, `lng`, `srtipe_payment_id`, `fee`, `fee_value`, `static_fee`, `delivery_method`, `delivery_pickup_interval`, `vatvalue`, `payment_processor_fee`, `time_to_prepare`, `table_id`, `phone`, `whatsapp_address`, `payment_link`) VALUES
(603, '2021-05-04 23:52:46', '2021-05-04 23:52:46', 11, 7, 17, NULL, 0.00, 299.00, 'cod', 'unpaid', ' ', NULL, NULL, NULL, 10.00, 29.9, 0.00, 1, '1260_1290', 0.00, 0.00, NULL, NULL, NULL, NULL, ''),
(604, '2021-05-05 02:00:15', '2021-05-05 02:00:18', NULL, 7, 17, NULL, 0.00, 299.00, 'stripe', 'paid', ' ', NULL, NULL, 'pi_1InUPkHGxSu88lZ8ehVnzPVh', 10.00, 29.9, 0.00, 2, '1380_1410', 0.00, 8.07, NULL, NULL, NULL, NULL, ''),
(605, '2021-05-05 02:30:16', '2021-05-05 02:30:17', NULL, 1, 17, NULL, 0.00, 299.00, 'stripe', 'paid', ' ', NULL, NULL, 'pi_1InUsmHGxSu88lZ8pk3S8EuN', 10.00, 29.9, 0.00, 2, '1410_1440', 0.00, 8.07, NULL, NULL, NULL, NULL, ''),
(606, '2021-05-05 10:42:26', '2021-05-05 10:42:26', NULL, 7, 17, NULL, 0.00, 299.00, 'cod', 'unpaid', ' ', NULL, NULL, NULL, 10.00, 29.9, 0.00, 2, '480_510', 0.00, 0.00, NULL, NULL, NULL, NULL, ''),
(607, '2021-05-05 11:02:00', '2021-05-05 11:02:02', NULL, 7, 17, NULL, 0.00, 299.00, 'stripe', 'paid', ' ', NULL, NULL, 'pi_1Incs1HGxSu88lZ8M7n9Vb58', 10.00, 29.9, 0.00, 2, '480_510', 0.00, 8.07, NULL, NULL, NULL, NULL, ''),
(608, '2021-05-05 11:26:16', '2021-05-05 11:26:16', NULL, 7, 17, NULL, 0.00, 299.00, 'cod', 'unpaid', ' ', NULL, NULL, NULL, 10.00, 29.9, 0.00, 2, '840_870', 0.00, 0.00, NULL, NULL, NULL, NULL, ''),
(612, '2021-05-05 12:59:45', '2021-05-05 12:59:45', NULL, 7, 17, NULL, 0.00, 299.00, 'cod', 'unpaid', ' ', NULL, NULL, NULL, 10.00, 29.9, 0.00, 2, '630_660', 0.00, 0.00, NULL, NULL, NULL, NULL, ''),
(613, '2021-05-05 13:01:12', '2021-05-08 17:38:55', 11, 7, 17, 12, 0.00, 299.00, 'cod', 'unpaid', ' ', NULL, NULL, NULL, 10.00, 29.9, 0.00, 1, '600_630', 0.00, 0.00, NULL, NULL, NULL, NULL, ''),
(614, '2021-05-05 13:06:21', '2021-05-05 14:20:15', NULL, 7, 17, NULL, 0.00, 299.00, 'cod', 'paid', ' ', NULL, NULL, NULL, 10.00, 29.9, 0.00, 2, '630_660', 0.00, 0.00, NULL, NULL, NULL, NULL, ''),
(615, '2021-05-05 13:08:00', '2021-05-05 14:19:28', NULL, 7, 17, NULL, 0.00, 299.00, 'cod', 'paid', ' ', NULL, NULL, NULL, 10.00, 29.9, 0.00, 2, '660_690', 0.00, 0.00, NULL, NULL, NULL, NULL, ''),
(616, '2021-05-05 13:12:02', '2021-05-05 13:12:04', NULL, 7, 17, NULL, 0.00, 299.00, 'stripe', 'paid', ' ', NULL, NULL, 'pi_1Inetr2eZvKYlo2CFcB5Ik3e', 10.00, 29.9, 0.00, 2, '1440_1470', 0.00, 8.07, NULL, NULL, NULL, NULL, ''),
(617, '2021-05-05 13:19:37', '2021-05-05 13:19:37', 11, 7, 17, NULL, 0.00, 299.00, 'cod', 'unpaid', ' ', NULL, NULL, NULL, 10.00, 29.9, 0.00, 1, '690_720', 0.00, 0.00, NULL, NULL, NULL, NULL, ''),
(618, '2021-05-05 13:51:15', '2021-05-05 14:19:25', NULL, 1, 17, NULL, 0.00, 598.00, 'cod', 'paid', ' ', NULL, NULL, NULL, 10.00, 59.8, 0.00, 2, '1440_1470', 0.00, 0.00, NULL, NULL, NULL, NULL, ''),
(619, '2021-05-05 13:52:04', '2021-05-05 13:52:04', 11, 7, 17, NULL, 0.00, 299.00, 'cod', 'unpaid', ' ', NULL, NULL, NULL, 10.00, 29.9, 0.00, 1, '720_750', 0.00, 0.00, NULL, NULL, NULL, NULL, ''),
(620, '2021-05-05 14:08:29', '2021-05-05 14:08:29', 11, 7, 17, NULL, 0.00, 299.00, 'cod', 'unpaid', ' ', NULL, NULL, NULL, 10.00, 29.9, 0.00, 1, '630_660', 0.00, 0.00, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_has_items`
--

CREATE TABLE `order_has_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `extras` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `vat` double(8,2) DEFAULT 0.00,
  `vatvalue` double(8,2) DEFAULT 0.00,
  `variant_price` double(8,2) DEFAULT NULL,
  `variant_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_has_items`
--

INSERT INTO `order_has_items` (`id`, `created_at`, `updated_at`, `order_id`, `item_id`, `qty`, `extras`, `vat`, `vatvalue`, `variant_price`, `variant_name`) VALUES
(73, NULL, NULL, 603, 341, 1, '[]', NULL, 0.00, 299.00, ''),
(74, NULL, NULL, 604, 341, 1, '[]', NULL, 0.00, 299.00, ''),
(75, NULL, NULL, 605, 341, 1, '[]', NULL, 0.00, 299.00, ''),
(76, NULL, NULL, 606, 341, 1, '[]', NULL, 0.00, 299.00, ''),
(77, NULL, NULL, 607, 341, 1, '[]', NULL, 0.00, 299.00, ''),
(78, NULL, NULL, 608, 341, 1, '[]', NULL, 0.00, 299.00, ''),
(82, NULL, NULL, 612, 341, 1, '[]', NULL, 0.00, 299.00, ''),
(83, NULL, NULL, 613, 341, 1, '[]', NULL, 0.00, 299.00, ''),
(84, NULL, NULL, 614, 341, 1, '[]', NULL, 0.00, 299.00, ''),
(85, NULL, NULL, 615, 341, 1, '[]', NULL, 0.00, 299.00, ''),
(86, NULL, NULL, 616, 341, 1, '[]', NULL, 0.00, 299.00, ''),
(87, NULL, NULL, 617, 341, 1, '[]', NULL, 0.00, 299.00, ''),
(88, NULL, NULL, 618, 341, 2, '[]', NULL, 0.00, 299.00, ''),
(89, NULL, NULL, 619, 341, 1, '[]', NULL, 0.00, 299.00, ''),
(90, NULL, NULL, 620, 341, 1, '[]', NULL, 0.00, 299.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_has_status`
--

CREATE TABLE `order_has_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_has_status`
--

INSERT INTO `order_has_status` (`id`, `created_at`, `updated_at`, `order_id`, `status_id`, `user_id`, `comment`) VALUES
(771, '2021-05-04 23:52:46', NULL, 603, 1, 7, ''),
(772, '2021-05-04 23:58:24', NULL, 603, 2, 1, ''),
(773, '2021-05-05 02:00:18', NULL, 604, 1, 7, ''),
(774, '2021-05-05 02:00:18', NULL, 604, 2, 1, 'Automatically approved by admin'),
(775, '2021-05-05 02:30:17', NULL, 605, 1, 1, ''),
(776, '2021-05-05 02:30:17', NULL, 605, 2, 1, 'Automatically approved by admin'),
(777, '2021-05-05 10:42:26', NULL, 606, 1, 7, ''),
(778, '2021-05-05 10:42:26', NULL, 606, 2, 1, 'Automatically approved by admin'),
(780, '2021-05-05 11:02:02', NULL, 607, 1, 7, ''),
(781, '2021-05-05 11:02:02', NULL, 607, 2, 1, 'Automatically approved by admin'),
(782, '2021-05-05 11:26:16', NULL, 608, 1, 7, ''),
(783, '2021-05-05 11:26:16', NULL, 608, 2, 1, 'Automatically approved by admin'),
(788, '2021-05-05 12:59:45', NULL, 612, 1, 7, ''),
(789, '2021-05-05 12:59:45', NULL, 612, 2, 1, 'Automatically approved by admin'),
(790, '2021-05-05 13:01:12', NULL, 613, 1, 7, ''),
(791, '2021-05-05 13:01:12', NULL, 613, 2, 1, 'Automatically approved by admin'),
(792, '2021-05-05 13:06:21', NULL, 614, 1, 7, ''),
(793, '2021-05-05 13:06:21', NULL, 614, 2, 1, 'Automatically approved by admin'),
(794, '2021-05-05 13:08:00', NULL, 615, 1, 7, ''),
(795, '2021-05-05 13:08:00', NULL, 615, 2, 1, 'Automatically approved by admin'),
(796, '2021-05-05 13:12:04', NULL, 616, 1, 7, ''),
(797, '2021-05-05 13:12:04', NULL, 616, 2, 1, 'Automatically approved by admin'),
(798, '2021-05-05 13:13:20', NULL, 616, 9, 8, ''),
(799, '2021-05-05 13:13:24', NULL, 615, 3, 8, ''),
(800, '2021-05-05 13:13:28', NULL, 615, 5, 8, ''),
(801, '2021-05-05 13:13:35', NULL, 613, 3, 8, ''),
(802, '2021-05-05 13:13:39', NULL, 613, 5, 8, ''),
(803, '2021-05-05 13:19:37', NULL, 617, 1, 7, ''),
(804, '2021-05-05 13:19:37', NULL, 617, 2, 1, 'Automatically approved by admin'),
(805, '2021-05-05 13:20:48', NULL, 617, 3, 8, ''),
(806, '2021-05-05 13:20:51', NULL, 617, 5, 8, ''),
(807, '2021-05-05 13:51:15', NULL, 618, 1, 1, ''),
(808, '2021-05-05 13:51:15', NULL, 618, 2, 1, 'Automatically approved by admin'),
(809, '2021-05-05 13:52:04', NULL, 619, 1, 7, ''),
(810, '2021-05-05 13:52:04', NULL, 619, 2, 1, 'Automatically approved by admin'),
(811, '2021-05-05 13:53:45', NULL, 619, 3, 8, ''),
(812, '2021-05-05 13:54:02', NULL, 619, 5, 8, ''),
(813, '2021-05-05 13:57:57', NULL, 603, 3, 8, ''),
(814, '2021-05-05 13:58:03', NULL, 603, 5, 8, ''),
(815, '2021-05-05 14:08:29', NULL, 620, 1, 7, ''),
(816, '2021-05-05 14:08:29', NULL, 620, 2, 1, 'Automatically approved by admin'),
(817, '2021-05-05 14:10:17', NULL, 620, 3, 8, ''),
(818, '2021-05-05 14:10:20', NULL, 620, 5, 8, ''),
(819, '2021-05-05 14:19:13', NULL, 618, 3, 8, ''),
(820, '2021-05-05 14:19:21', NULL, 618, 5, 8, ''),
(821, '2021-05-05 14:19:25', NULL, 618, 7, 8, ''),
(822, '2021-05-05 14:19:28', NULL, 615, 7, 8, ''),
(823, '2021-05-05 14:20:08', NULL, 614, 3, 8, ''),
(824, '2021-05-05 14:20:12', NULL, 614, 5, 8, ''),
(825, '2021-05-05 14:20:15', NULL, 614, 7, 8, ''),
(826, '2021-05-08 17:39:24', NULL, 613, 4, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `showAsLink` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `created_at`, `updated_at`, `title`, `content`, `showAsLink`) VALUES
(1, '2021-05-04 16:29:31', '2021-05-04 23:14:11', 'Terms and conditions', '<p><strong>gfd</strong></p>', 1),
(2, '2021-05-04 16:29:31', '2021-05-04 17:39:16', 'How it works', '<p>cc</p>\r\n\r\n<p>&nbsp;</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tayyab@hwryk.com', '$2y$10$MNypkY7Tu2j9uaD1Wa11WuKSt5jqqjwJdQJijkb0eUO7i.DAWm9Ia', '2021-05-05 00:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `paths`
--

CREATE TABLE `paths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage restorants', 'web', '2021-05-04 16:29:31', '2021-05-04 16:29:31'),
(2, 'manage drivers', 'web', '2021-05-04 16:29:31', '2021-05-04 16:29:31'),
(3, 'manage orders', 'web', '2021-05-04 16:29:31', '2021-05-04 16:29:31'),
(4, 'edit settings', 'web', '2021-05-04 16:29:31', '2021-05-04 16:29:31'),
(5, 'view orders', 'web', '2021-05-04 16:29:31', '2021-05-04 16:29:31'),
(6, 'edit restorant', 'web', '2021-05-04 16:29:31', '2021-05-04 16:29:31'),
(7, 'edit orders', 'web', '2021-05-04 16:29:31', '2021-05-04 16:29:31'),
(8, 'access backedn', 'web', '2021-05-04 16:29:31', '2021-05-04 16:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit_items` int(11) NOT NULL DEFAULT 0 COMMENT '0 is unlimited',
  `limit_orders` int(11) NOT NULL DEFAULT 0 COMMENT '0 is unlimited',
  `price` double(8,2) NOT NULL,
  `period` int(11) NOT NULL DEFAULT 1 COMMENT '1 - monthly, 2-anually',
  `paddle_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `description` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `features` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `limit_views` int(11) NOT NULL DEFAULT 0 COMMENT '0 is unlimited',
  `enable_ordering` int(11) NOT NULL DEFAULT 1,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mollie_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paystack_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `rateable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rateable_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `created_at`, `updated_at`, `rating`, `rateable_type`, `rateable_id`, `user_id`, `order_id`, `comment`) VALUES
(17, '2021-05-05 14:21:15', '2021-05-05 14:21:15', 5, 'App\\Restorant', 17, 7, 615, 'GReat Teste assdadsfd');

-- --------------------------------------------------------

--
-- Table structure for table `restoareas`
--

CREATE TABLE `restoareas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restorants`
--

CREATE TABLE `restorants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subdomain` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `fee` double(8,2) NOT NULL DEFAULT 0.00,
  `static_fee` double(8,2) NOT NULL DEFAULT 0.00,
  `radius` varchar(800) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `city_id` int(11) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `can_pickup` int(11) NOT NULL DEFAULT 1,
  `can_deliver` int(11) NOT NULL DEFAULT 1,
  `self_deliver` int(11) NOT NULL DEFAULT 0,
  `free_deliver` int(11) NOT NULL DEFAULT 0,
  `whatsapp_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_covertion` int(11) NOT NULL DEFAULT 1,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mollie_payment_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restorants`
--

INSERT INTO `restorants` (`id`, `created_at`, `updated_at`, `name`, `subdomain`, `logo`, `cover`, `active`, `user_id`, `lat`, `lng`, `address`, `phone`, `minimum`, `description`, `fee`, `static_fee`, `radius`, `is_featured`, `city_id`, `views`, `can_pickup`, `can_deliver`, `self_deliver`, `free_deliver`, `whatsapp_phone`, `fb_username`, `do_covertion`, `currency`, `payment_info`, `mollie_payment_key`) VALUES
(17, '2021-05-04 22:52:33', '2021-05-22 02:57:54', 'Pizza Point', 'pizza-point', '', '', 1, 8, '28.4211565', '70.2988744', 'Rahim Yar Khan', '03040643525', '20', 'Pizza Point', 10.00, 0.00, '[{\"lat\":28.446063870891788,\"lng\":70.29827358518065},{\"lat\":28.444252623435947,\"lng\":70.36075832639159},{\"lat\":28.41285274042254,\"lng\":70.35955669675292},{\"lat\":28.387937555576418,\"lng\":70.30376674924315},{\"lat\":28.405303303070927,\"lng\":70.2538132885498},{\"lat\":28.442894167489236,\"lng\":70.24248363767089}]', 0, NULL, 44, 1, 1, 1, 1, '+923418979347', NULL, 0, '', '', ''),
(18, '2021-05-05 00:27:56', '2021-05-05 00:28:37', 'Fz', 'fz', '', '', 0, 11, '0', '0', '', '123', '0', '', 0.00, 0.00, '{}', 0, NULL, 0, 1, 1, 0, 0, NULL, NULL, 1, '', '', ''),
(19, '2021-05-05 13:46:01', '2021-05-13 19:40:48', 'Food Point', 'food-point', '', '', 1, 13, '36.1444244', '-115.2759094', 'RYK', '32424', '0', 'Food Point', 0.00, 0.00, '[{\"lat\":28.442179079815435,\"lng\":70.27859560827635},{\"lat\":28.440518709852732,\"lng\":70.34897677282713},{\"lat\":28.420139319901107,\"lng\":70.35687319616697},{\"lat\":28.38994041988111,\"lng\":70.29970995764158},{\"lat\":28.393262720210465,\"lng\":70.26898257116697},{\"lat\":28.43010306750698,\"lng\":70.25559298376463},{\"lat\":28.44414130162592,\"lng\":70.25730959753416}]', 0, NULL, 8, 1, 1, 0, 0, NULL, NULL, 0, '', '', ''),
(20, '2021-05-09 02:21:36', '2021-05-26 02:46:55', 'Khawar Hussain', 'khawar-hussain', '', 'da6f476d-33f4-4d13-bf1b-1644d7a0494f', 1, 14, '24.887296', '67.0564352', 'ghgfghgf', '+923485126286', '0', 'nono', 0.00, 0.00, '{}', 0, NULL, 1, 1, 1, 0, 0, NULL, NULL, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-05-04 16:29:31', '2021-05-04 16:29:31'),
(2, 'owner', 'web', '2021-05-04 16:29:31', '2021-05-04 16:29:31'),
(3, 'driver', 'web', '2021-05-04 16:29:31', '2021-05-04 16:29:31'),
(4, 'client', 'web', '2021-05-04 16:29:31', '2021-05-04 16:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(7, 3),
(8, 1),
(8, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `search` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restorant_details_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `restorant_details_cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `playstore` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `appstore` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `maps_api_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `delivery` double(8,2) NOT NULL DEFAULT 0.00,
  `typeform` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `mobile_info_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `mobile_info_subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `order_options` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '{}',
  `site_logo_dark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_fields` text COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `site_name`, `site_logo`, `search`, `restorant_details_image`, `restorant_details_cover_image`, `description`, `header_title`, `header_subtitle`, `currency`, `facebook`, `instagram`, `playstore`, `appstore`, `maps_api_key`, `delivery`, `typeform`, `mobile_info_title`, `mobile_info_subtitle`, `order_options`, `site_logo_dark`, `order_fields`) VALUES
(1, '2021-05-04 16:29:31', '2021-05-05 17:06:52', 'Fast go', '9d98c059-5c33-49f5-9a65-59abbe80ed9c', '/default/cover.jpg', 'a40237d3-bc4a-480c-a5aa-0602ac28f2e7', '/default/cover.jpg', 'Food Delivery from best restaurants', 'Food Delivery from<br /><b>Novi Pazar</b> Best Restaurants', 'It\'s the food you love, delivered', 'USD', '#', '#', '', '', 'AIzaSyDffZbIsJa_vyw7j8ZKjYuVcdQpGb0Ph3Q', 0.00, '', 'Download the food you love', 'It`s all at your fingertips - the restaurants you love. Find the right food to suit your mood, and make the first bite last. Go ahead, download us.', '{}', '/default/logo.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sms_verifications`
--

CREATE TABLE `sms_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `alias`) VALUES
(1, 'Just created', 'just_created'),
(2, 'Accepted by admin', 'accepted_by_admin'),
(3, 'Accepted by restaurant', 'accepted_by_restaurant'),
(4, 'Assigned to driver', 'assigned_to_driver'),
(5, 'Prepared', 'prepared'),
(6, 'Picked up', 'picked_up'),
(7, 'Delivered', 'delivered'),
(8, 'Rejected by admin', 'rejected_by_admin'),
(9, 'Rejected by restaurant', 'rejected_by_restaurant'),
(10, 'Updated', 'updated'),
(11, 'Closed', 'closed'),
(12, 'Rejected by driver', 'rejected_by_driver'),
(13, 'Accepted by driver', 'accepted_by_driver');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL DEFAULT 4,
  `restoarea_id` bigint(20) UNSIGNED DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_id` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_id` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cancel_url` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `update_url` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `checkout_id` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `subscription_plan_id` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `stripe_account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `birth_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working` int(11) NOT NULL DEFAULT 1,
  `onorder` int(11) DEFAULT NULL,
  `numorders` int(11) NOT NULL DEFAULT 0,
  `rejectedorders` int(11) NOT NULL,
  `paypal_subscribtion_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mollie_customer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mollie_mandate_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_percentage` decimal(6,4) NOT NULL DEFAULT 0.0000,
  `extra_billing_information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mollie_subscribtion_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paystack_subscribtion_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paystack_trans_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `fb_id`, `name`, `email`, `email_verified_at`, `password`, `api_token`, `phone`, `remember_token`, `created_at`, `updated_at`, `active`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `verification_code`, `phone_verified_at`, `plan_id`, `plan_status`, `cancel_url`, `update_url`, `checkout_id`, `subscription_plan_id`, `stripe_account`, `birth_date`, `lat`, `lng`, `working`, `onorder`, `numorders`, `rejectedorders`, `paypal_subscribtion_id`, `mollie_customer_id`, `mollie_mandate_id`, `tax_percentage`, `extra_billing_information`, `mollie_subscribtion_id`, `paystack_subscribtion_id`, `paystack_trans_id`) VALUES
(1, NULL, NULL, 'Admin Admin', 'mtayyabakmal786@gmail.com', '2021-05-04 16:29:31', '$2y$10$uKN3gZMBjTBkRGjRxkoF7uyBAPyETR0U/o/SPHbJ7oV7gwKvCVFyq', 'FOsdWtuthakqKruJ8NZWXleGPYeYLLwxaAZ8F7D6uKOdDTpSVdpixEH5aQh5uiXfxTWOyhCdZgyuo0yb', '', 'R5Fy0WCZhmX2pUjta2V4uX5J6VOmt3NySpJQCGzUg0NvopHlFPS2XoX5prXK', '2021-05-04 16:29:31', '2021-05-04 16:29:31', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, NULL, '0.0000', NULL, NULL, NULL, NULL),
(2, NULL, NULL, 'Demo Owner', 'owner@example.com', '2021-05-04 16:29:31', '$2y$10$6vjRQrETlMwR2ddpNdQl7u89YpRT720IZIjGmJr.BeiyhJGSoZfB2', 'La9J2pNs8D98z8Rdz8tQXnust0lCpgPDiv7PpaBR4XONU4XS9JJitBiAlYW2oCLY8fJXTtu5uMbog73A', '', NULL, '2021-05-04 16:29:31', '2021-05-04 16:29:31', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, NULL, '0.0000', NULL, NULL, NULL, NULL),
(3, NULL, NULL, 'Demo Driver', 'driver@example.com', '2021-05-04 16:29:37', '$2y$10$t2Ei2c.qZrITjsuooJ1F5eEilVXVcbdYnZEFKeLYeA.oy2oRn/b5C', 'eeUb71DnoEoDsyq9aQpYfAxFySb7XqyTI9AQ3kZCZywSVZCwd6iKhO0SDu0o1MYL77IA8LKjprivQs0D', '', NULL, '2021-05-04 16:29:37', '2021-05-05 13:50:03', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, NULL, '0.0000', NULL, NULL, NULL, NULL),
(4, NULL, NULL, 'Demo Client 1', 'client@example.com', '2021-05-04 16:29:37', '$2y$10$I3xgCQyJeAoBegixeuMDNeewqaGn.RGlEJXrW4ymP8GyJcx0D4TfW', 'Y1aVP4ejl07u7icT2EmXMbOq3uty7mNSrgkOmGb6O33RVJOyjRpoUwUDfi40ZumiY8b7W2o5YVfVjP6q', '', NULL, '2021-05-04 16:29:37', '2021-05-05 00:05:07', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, NULL, '0.0000', NULL, NULL, NULL, NULL),
(5, NULL, NULL, 'Demo Client 2', 'client2@example.com', '2021-05-04 16:29:37', '$2y$10$6LwmacGRyMyoGpSdquuHWu.H99m80s.TPjy1v.IS6uppMrbc5Quwa', 'NHCO61y7uif9zZuVjnciQd41AMcjHdn0jByGLBOSZc4E9R19imI5oNJ5OORJh9daiU1v9N6km32fXzV4', '', NULL, '2021-05-04 16:29:37', '2021-05-05 00:05:21', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, NULL, '0.0000', NULL, NULL, NULL, NULL),
(6, NULL, NULL, 'Demo Driver 2', 'driver2@example.com', '2021-05-04 16:29:37', '$2y$10$3X.0LwU6IeFPdkcjnQKmP.wEm.JyibuDKkf2tkEZinfxCV6aAiznq', 'p4HXMaBqJrRdgQHK8N7uu2OiceyOaEakU5hS2TSSny2mYjC2xXI80uXs2BCFugkEN5Dqdgh3PWkG04rP', '', NULL, '2021-05-04 16:29:37', '2021-05-05 13:04:14', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, NULL, '0.0000', NULL, NULL, NULL, NULL),
(7, NULL, NULL, 'Tayyab', 'tayyabqa4@gmail.com', NULL, '$2y$10$D2FVlDSnLrcMc5Fe8FIqtOBGWEMQxLsp524SWNtMBYFMjQnuAY2Ue', 'y6VZANrR5yrUIUh4SQjvCVuNrWt8TjHtteYiXVI79dQT6WzC3V1ofdkh3nXJVuzSBXZXscQhITZuspLz', '03040643525', NULL, '2021-05-04 22:48:38', '2021-05-04 22:48:38', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, NULL, '0.0000', NULL, NULL, NULL, NULL),
(8, NULL, NULL, 'M Tayyab', 'tayyab@hwryk.com', NULL, '$2y$10$bZGcKi142uRI/RRUF6ICguOW7d7OnCFkWMsGU/d8VHNs7Sbahki6K', 'SWmOIbmFyivysPTXvSwryK97D4bHvtxUUJeiBKBWU0L0h0HpIO36FIKUq2jFi7wIviCJPXmBCBQ8s7qr', '03040643525', 'CZtIij7m3GIMdIJNnzAceoZ3ggYohMdJTGWQZ9X9sKk6tXXQgrTYRS5wKBEE', '2021-05-04 22:52:33', '2021-05-05 17:02:45', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'acct_1IniV6CZwk4Nwxco', '', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, NULL, '0.0000', NULL, NULL, NULL, NULL),
(9, NULL, NULL, 'Tayyab', 'tayyabqa@gmail.com', NULL, '$2y$10$4X1Y2EhekbM3ixDN2bMiNODJpgNoTSSRehSexCw.5ByDHwuRdsMB6', 'meDK89vPYRhE3HDZZmTcOEORO5rNPLFu9hhBV6P4WJ8dLEog2jg2wmAWcE9idO5JvoyQaRZfaEeoa8vh', NULL, NULL, '2021-05-04 22:54:08', '2021-05-05 13:04:10', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, NULL, '0.0000', NULL, NULL, NULL, NULL),
(10, NULL, NULL, 'Tayyab', 'tayyabqa54@gmail.com', NULL, '$2y$10$l4udNk78tvIPr6H/n8VAx.3uRyijgk7Cq9HkUChLmiO7G4HBcx9pe', 'gbOpA3ZCZ4MiFwDZ2ZmNLUqb5J8exi1yFcxfQqBpU8yWjiY8Z69LsVN5zipxVSNVx5MMLU0t9tiNGnzb', NULL, NULL, '2021-05-04 22:59:48', '2021-05-05 13:04:21', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, NULL, '0.0000', NULL, NULL, NULL, NULL),
(11, NULL, NULL, 'as', 'm@gmail.com', NULL, '$2y$10$f3PZwDJmfkOLaY1Bi13yOuxZXzYZ7NJEBlxaiVugPMXET5F1hrND2', '4j4KRLlMd9WM0o49NmTl570ZRKMELyVUlb5fhX0Bz9aPQAjI5udfZN69PYPGvxSoa5QMxHSRARdOKt6M', '123', NULL, '2021-05-05 00:27:56', '2021-05-05 00:27:56', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, NULL, '0.0000', NULL, NULL, NULL, NULL),
(12, NULL, NULL, 'Tayyab Akmal', 'dtlogicsryk@gmail.com', NULL, '$2y$10$JqZS5kaIDEkmcY1VsxGhEuIpFkhi3lV7YujUvzcM7N6LfgbFi8BGa', 'sOrrxOcvMhJse9dZ2qernuUSlaNVGAy9j9qqxAljGqOkVbnKmIydVXrMi2GsSaswSLE6bQCcbwagPwpT', NULL, NULL, '2021-05-05 13:39:28', '2021-05-08 17:38:55', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, 1, NULL, 1, 0, NULL, NULL, NULL, '0.0000', NULL, NULL, NULL, NULL),
(13, NULL, NULL, 'Tayyab Akmal', 'tayyabakmal7777@gmail.com', NULL, '$2y$10$iIy8qzB0WSlJwjEKxeF5fuA/KUu7cLFBMVEUD5jZe7ci/QSImN/Ye', '9AOoJjBtIj1GtVjGatzuVKCArob4rHmw1BCzvQxE0XC3kEjOxVYTttEtjEO8DQqJPKbJq7YcxgqsONRN', '32424', 'QYU0BjnIcjOqfPhDBIx0oKDJ8VEKva7S5rRuSzCbQ4XPmqgZ0gqma5ZETSja', '2021-05-05 13:46:01', '2021-05-05 13:49:03', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, NULL, '0.0000', NULL, NULL, NULL, NULL),
(14, NULL, NULL, 'Khawar Hussain', 'khawar.waraich1995@gmail.com', NULL, '$2y$10$yk19qmJQiIomQNWE5aFfbu2u3K7eRT6zhKqO.lhGxSxQMcPqbXtDa', 'VDfsTD3z9dpq8TVKwGMluX3RfRD2ENTkitWP2EuPZDvm7yJBdvHBT7PTqOzATMaJAVwgoned4iLi2QUL', '+923485126286', NULL, '2021-05-09 02:21:36', '2021-05-09 02:23:06', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, NULL, '0.0000', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `options` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `enable_qty` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variants_has_extras`
--

CREATE TABLE `variants_has_extras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `variant_id` bigint(20) UNSIGNED NOT NULL,
  `extra_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `table_id` bigint(20) UNSIGNED DEFAULT NULL,
  `by` int(11) NOT NULL DEFAULT 1 COMMENT '1 - Owner, 0 - Client Himself',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_user_id_foreign` (`user_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_vendor_id_foreign` (`vendor_id`),
  ADD KEY `banners_page_id_foreign` (`page_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagoriesmains`
--
ALTER TABLE `catagoriesmains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_restorant_id_foreign` (`restorant_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_alias_unique` (`alias`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`),
  ADD KEY `coupons_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extras_item_id_foreign` (`item_id`);

--
-- Indexes for table `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hours_restorant_id_foreign` (`restorant_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `localmenus`
--
ALTER TABLE `localmenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `localmenus_restaurant_id_foreign` (`restaurant_id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_item_id_foreign` (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_address_id_foreign` (`address_id`),
  ADD KEY `orders_client_id_foreign` (`client_id`),
  ADD KEY `orders_restorant_id_foreign` (`restorant_id`),
  ADD KEY `orders_driver_id_foreign` (`driver_id`);

--
-- Indexes for table `order_has_items`
--
ALTER TABLE `order_has_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_has_items_order_id_foreign` (`order_id`),
  ADD KEY `order_has_items_item_id_foreign` (`item_id`);

--
-- Indexes for table `order_has_status`
--
ALTER TABLE `order_has_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_has_status_order_id_foreign` (`order_id`),
  ADD KEY `order_has_status_status_id_foreign` (`status_id`),
  ADD KEY `order_has_status_user_id_foreign` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paths`
--
ALTER TABLE `paths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`),
  ADD KEY `ratings_rateable_id_index` (`rateable_id`),
  ADD KEY `ratings_rateable_type_index` (`rateable_type`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_order_id_foreign` (`order_id`);

--
-- Indexes for table `restoareas`
--
ALTER TABLE `restoareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restoareas_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `restorants`
--
ALTER TABLE `restorants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restorants_name_unique` (`name`),
  ADD UNIQUE KEY `restorants_subdomain_unique` (`subdomain`),
  ADD KEY `restorants_user_id_foreign` (`user_id`);

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
-- Indexes for table `sms_verifications`
--
ALTER TABLE `sms_verifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sms_verifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status_name_unique` (`name`),
  ADD UNIQUE KEY `status_alias_unique` (`alias`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_plan_unique` (`subscription_id`,`stripe_plan`),
  ADD KEY `subscription_items_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tables_restoarea_id_foreign` (`restoarea_id`),
  ADD KEY `tables_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translations_language_id_foreign` (`language_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`),
  ADD UNIQUE KEY `users_verification_code_unique` (`verification_code`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variants_item_id_foreign` (`item_id`);

--
-- Indexes for table `variants_has_extras`
--
ALTER TABLE `variants_has_extras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variants_has_extras_variant_id_foreign` (`variant_id`),
  ADD KEY `variants_has_extras_extra_id_foreign` (`extra_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_restaurant_id_foreign` (`restaurant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `catagoriesmains`
--
ALTER TABLE `catagoriesmains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT for table `hours`
--
ALTER TABLE `hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `localmenus`
--
ALTER TABLE `localmenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=621;

--
-- AUTO_INCREMENT for table `order_has_items`
--
ALTER TABLE `order_has_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `order_has_status`
--
ALTER TABLE `order_has_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=827;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paths`
--
ALTER TABLE `paths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `restoareas`
--
ALTER TABLE `restoareas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `restorants`
--
ALTER TABLE `restorants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_verifications`
--
ALTER TABLE `sms_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1057;

--
-- AUTO_INCREMENT for table `variants_has_extras`
--
ALTER TABLE `variants_has_extras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1057;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`),
  ADD CONSTRAINT `banners_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `restorants` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_restorant_id_foreign` FOREIGN KEY (`restorant_id`) REFERENCES `restorants` (`id`);

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restorants` (`id`);

--
-- Constraints for table `extras`
--
ALTER TABLE `extras`
  ADD CONSTRAINT `extras_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `hours`
--
ALTER TABLE `hours`
  ADD CONSTRAINT `hours_restorant_id_foreign` FOREIGN KEY (`restorant_id`) REFERENCES `restorants` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `localmenus`
--
ALTER TABLE `localmenus`
  ADD CONSTRAINT `localmenus_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restorants` (`id`);

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
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_restorant_id_foreign` FOREIGN KEY (`restorant_id`) REFERENCES `restorants` (`id`);

--
-- Constraints for table `order_has_items`
--
ALTER TABLE `order_has_items`
  ADD CONSTRAINT `order_has_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `order_has_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `order_has_status`
--
ALTER TABLE `order_has_status`
  ADD CONSTRAINT `order_has_status_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_has_status_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `order_has_status_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `restoareas`
--
ALTER TABLE `restoareas`
  ADD CONSTRAINT `restoareas_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restorants` (`id`);

--
-- Constraints for table `restorants`
--
ALTER TABLE `restorants`
  ADD CONSTRAINT `restorants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sms_verifications`
--
ALTER TABLE `sms_verifications`
  ADD CONSTRAINT `sms_verifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restorants` (`id`),
  ADD CONSTRAINT `tables_restoarea_id_foreign` FOREIGN KEY (`restoarea_id`) REFERENCES `restoareas` (`id`);

--
-- Constraints for table `translations`
--
ALTER TABLE `translations`
  ADD CONSTRAINT `translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `variants_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `variants_has_extras`
--
ALTER TABLE `variants_has_extras`
  ADD CONSTRAINT `variants_has_extras_extra_id_foreign` FOREIGN KEY (`extra_id`) REFERENCES `extras` (`id`),
  ADD CONSTRAINT `variants_has_extras_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`);

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restorants` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
