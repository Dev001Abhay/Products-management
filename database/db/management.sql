-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2023 at 11:18 AM
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
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$GiHvM/Dsc441Hm5rwlZJrebhzT2BKxZ8zOCQGiaPJn.d6Q34GmqY.', 'fpkjeand1DS8L1D1kC58JB7DdJ7mVA8WnV2DLR7iB4jxhPPYHm5RDRagmbfZ', '2023-04-01 21:15:28', '2023-04-01 21:15:28'),
(2, 'Manager', 'manager@gmail.com', '$2y$10$j5r4O18yumcOVZuaRyno6.nK8CMLrQnp0Hczn.SgA2OHnO3DIKzoG', NULL, '2023-04-01 21:15:28', '2023-04-01 21:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `code`, `lat`, `longitude`, `exchange_rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USD', '$', 'USD', '47.751076', '-120.740135', '1', 0, NULL, '2021-06-27 13:39:37'),
(2, 'BDT', '৳', 'BDT', '23.811056', '90.407608', '108', 1, NULL, '2023-07-29 01:59:55'),
(3, 'Indian Rupi', '₹', 'INR', '28.644800', '77.216721', '81.08', 1, '2020-10-15 17:23:04', '2023-07-29 05:33:46'),
(4, 'Euro', '€', 'EUR', '50.85045', '4.34878', '100', 2, '2021-05-25 21:00:23', '2023-07-29 05:38:53'),
(5, 'YEN', '¥', 'JPY', '35.652832', '139.839478', '110', 1, '2021-06-10 22:08:31', '2023-07-29 04:42:58'),
(6, 'Ringgit', 'RM', 'MYR', ' 3.140853', '101.693207', '4.16', 1, '2021-07-03 11:08:33', '2023-07-29 04:06:58'),
(7, 'Rand', 'R', 'ZAR', '-25.731340', '28.218370', '14.26', 1, '2021-07-03 11:12:38', '2021-07-03 11:12:42');

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2017_11_14_124237_create_admins_table', 2),
(10, '2017_11_14_175115_create_notifications_table', 2),
(11, '2023_07_30_062602_create_services_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('19f673b4-5b1e-4f52-9d8b-3a296146780c', 'App\\Notifications\\RepliedToThread', 2, 'App\\Admin', '{\"user\":{\"name\":\"abhay\",\"email\":\"abhay@gmail.com\",\"updated_at\":\"2023-07-29 05:29:44\",\"created_at\":\"2023-07-29 05:29:44\",\"id\":1},\"admin\":{\"id\":2,\"name\":\"Manager\",\"email\":\"manager@gmail.com\",\"created_at\":\"2023-04-02 02:45:28\",\"updated_at\":\"2023-04-02 02:45:28\"}}', NULL, '2023-07-28 23:59:45', '2023-07-28 23:59:45'),
('eae34768-feb4-48b6-8aef-d42814e1b460', 'App\\Notifications\\RepliedToThread', 1, 'App\\Admin', '{\"user\":{\"name\":\"abhay\",\"email\":\"abhay@gmail.com\",\"updated_at\":\"2023-07-29 05:29:44\",\"created_at\":\"2023-07-29 05:29:44\",\"id\":1},\"admin\":{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"created_at\":\"2023-04-02 02:45:28\",\"updated_at\":\"2023-04-02 02:45:28\"}}', '2023-07-29 08:24:09', '2023-07-28 23:59:45', '2023-07-29 08:24:09');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_price` double(8,2) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Pending','Wait','Active') COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `zone_id`, `name`, `images`, `max_price`, `price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'White traditional long dress', '1690641684.jpeg', 60.00, 50.00, 'demo product', 'Active', '2023-07-29 07:42:06', '2023-07-29 07:42:06'),
(4, 1, 2, 'Long sleeve denim jacket', '1690641684.jpeg', 100.00, 90.00, 'this is demo entry..', 'Active', '2023-07-29 07:47:30', '2023-07-29 07:47:30'),
(5, 1, 1, 'Hush Puppies', '1690641508.jpeg', 120.00, 110.00, 'this is testing product', 'Active', '2023-07-29 09:08:28', '2023-07-29 09:08:28'),
(6, 1, 2, 'Athens skirt', '1690641684.jpeg', 30.00, 25.00, 'demo product.', 'Active', '2023-07-29 09:11:24', '2023-07-29 09:11:24'),
(7, 1, 1, 'Black camera', '1690711867.jpeg', 200.00, 190.00, 'this is testing product', 'Active', '2023-07-30 04:41:07', '2023-07-30 04:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `zone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double(10,8) DEFAULT NULL,
  `longitude` double(10,8) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `zone`, `services`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 1, 'Indore, Madhya Pradesh, India', '[\"22.866301145193983\",\" 75.47715159357647\",\"22.87262784647433\",\" 75.60898753107647\",\"22.819474402759212\",\" 75.59937449396709\",\"22.80175197386303\",\" 75.48401804865459\"]', 22.71956870, 75.85772580, '2023-07-30 02:32:56', '2023-07-30 02:32:56'),
(2, 1, 'Bhanwar Kuwa', '[\"22.690191447651767\",\" 75.86184749678341\",\"22.6902706353774\",\" 75.87120304182736\",\"22.68472738408086\",\" 75.87146053389279\",\"22.68536090986179\",\" 75.86141834334103\"]', 22.68782080, 75.86646720, '2023-07-30 04:15:38', '2023-07-30 04:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'abhay', 'abhay@gmail.com', '$2y$10$XlzwLBVZZj0WC38jTReGTupEkmvrVmbk1H0/QSFWn/2vkbV2Jy/Oa', 'FCIUle3lr0w1JmYpxMPwOJq3ztOuzacYMa4fS3FCaPZd10CsuuOtQmZ7SNA5', '2023-07-28 23:59:44', '2023-07-28 23:59:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
