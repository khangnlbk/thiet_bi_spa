-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2018 at 03:35 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED NOT NULL,
  `date_order` date NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `status`, `created_at`, `updated_at`) VALUES
(3, 3, '2018-11-23', '1', 'COD', 'af', 1, '2018-11-23 05:36:42', '2018-11-23 05:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 1, '2018-11-21 02:51:44', '2018-11-21 02:51:44'),
(2, 2, 3, 1, 1, '2018-11-23 05:35:08', '2018-11-23 05:35:08'),
(3, 3, 3, 1, 1, '2018-11-23 05:36:42', '2018-11-23 05:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `address`, `phone_number`, `gender`, `note`, `created_at`, `updated_at`) VALUES
(1, NULL, 'asfsa@gmail.com', 'afaf', '04546449', 'nam', 'dfsdf', '2018-11-21 02:51:44', '2018-11-21 02:51:44'),
(2, NULL, 'admin@gmail.com', 'f', '0975181095', 'nam', 'af', '2018-11-23 05:35:08', '2018-11-23 05:35:08'),
(3, NULL, 'admin@gmail.com', 'f', '0975181095', 'nam', 'af', '2018-11-23 05:36:42', '2018-11-23 05:36:42');

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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2018_11_08_105651_create_customers_table', 1),
(12, '2018_11_08_105914_create_bills_table', 1),
(13, '2018_11_08_110008_create_bill_details_table', 1),
(14, '2018_11_08_110028_create_news_table', 1),
(15, '2018_11_08_110037_create_products_table', 1),
(16, '2018_11_08_110045_create_product_types_table', 1),
(17, '2018_11_08_153936_create_slides_table', 1),
(18, '2018_11_10_160107_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double NOT NULL,
  `promotion_price` double NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(2, 'Máy chạy bộ', 5, 'edit', 33000000, 1, 'T3000.jpg', '6', 1, '2018-11-23 01:58:18', '2018-11-23 04:56:33'),
(3, 'Xe đạp tập thể dục', 5, 'edit', 7300000, 1, 'M5807.jpg', '3', 1, '2018-11-23 02:02:20', '2018-11-23 04:56:54'),
(4, 'Xe đạp trượt tuyết', 5, 'edit', 29000000, 1, 'M88008EL.jpg', '2', 1, '2018-11-23 02:03:37', '2018-11-23 04:57:03'),
(5, 'Máy rung toàn thân', 5, 'edit', 6700000, 1, 'anh4.jpg', '2', 1, '2018-11-23 02:04:30', '2018-11-23 04:57:12'),
(6, 'Máy rung dây', 5, 'edit', 2900000, 1, 'anh5.jpg', '3', 1, '2018-11-23 02:06:19', '2018-11-23 03:19:16'),
(7, 'Xô 2 chức năng', 5, 'edit', 23000000, 1, 'J200A-02.jpg', '1', 1, '2018-11-23 02:07:17', '2018-11-23 03:19:27'),
(8, 'Đá đùi trước', 5, 'edit', 18000000, 1, 'J200-10.png', '1', 1, '2018-11-23 02:12:46', '2018-11-23 03:19:36'),
(9, 'Móc đùi sau', 5, 'edit', 18000000, 1, 'J200-10(2).png', '1', 1, '2018-11-23 02:13:41', '2018-11-23 03:22:00'),
(10, 'Ép ngực vai sau', 5, 'edit', 18000000, 1, 'J200-15.png', '1', 1, '2018-11-23 02:16:08', '2018-11-23 03:23:16'),
(11, 'Tập tay trước', 5, 'edit', 18000000, 1, 'J200-12.jpg', '1', 1, '2018-11-23 02:18:12', '2018-11-23 03:23:26'),
(12, 'Đẩy ngực', 5, 'edit', 18000000, 1, 'J200-01.jpg', '1', 1, '2018-11-23 02:19:37', '2018-11-23 03:23:40'),
(13, 'Đạp mông kick bass plus', 5, 'edit', 18000000, 0, 'J200-07.jpg', '1', 1, '2018-11-23 03:25:35', '2018-11-23 03:25:35'),
(14, 'Xoay eo', 5, 'edit', 25000000, 0, 'J400-018.jpg', '1', 1, '2018-11-23 03:27:29', '2018-11-23 03:27:29'),
(15, 'ROBO xô cao', 5, 'edit', 18000000, 0, 'J500-05.jpg', '1', 1, '2018-11-23 03:28:39', '2018-11-23 03:28:39'),
(16, 'Đùi xiên', 5, 'edit', 18000000, 0, 'J300-25.jpg', 'edit', 1, '2018-11-23 03:29:52', '2018-11-23 03:29:52'),
(17, 'ROBO vai', 5, 'edit', 18000000, 0, 'J500-07.jpg', '1', 1, '2018-11-23 03:30:42', '2018-11-23 03:30:42'),
(18, 'Khung gánh', 5, 'edit', 29000000, 0, 'J300-24.jpg', '29000000', 1, '2018-11-23 03:31:39', '2018-11-23 03:31:39'),
(19, 'Vai đôi đa năng', 5, 'edit', 36000000, 0, 'JL7316.jpg', '1', 1, '2018-11-23 03:32:42', '2018-11-23 03:32:42'),
(20, 'Ngực ngang', 5, 'edit', 9500000, 0, 'J300-29.jpg', '3', 1, '2018-11-23 03:35:23', '2018-11-23 03:35:23'),
(21, 'Ngực trên', 5, 'edit', 9300000, 0, 'J300-30.jpg', '3', 1, '2018-11-23 03:36:09', '2018-11-23 03:36:09'),
(22, 'Ngực dưới', 5, 'edit', 9300000, 0, 'J300-31.jpg', '1', 1, '2018-11-23 03:37:00', '2018-11-23 03:37:00'),
(23, 'Khung kéo xô chữ T', 5, 'edit', 11900000, 0, 'FW-1005.jpg', '1', 1, '2018-11-23 03:37:51', '2018-11-23 03:38:05'),
(24, 'Khung đá bụng dưới', 5, 'edit', 11900000, 0, 'FW-2025.jpg', '1', 1, '2018-11-23 03:39:22', '2018-11-23 03:39:22'),
(25, 'Ghế nhón bắp chuối', 5, 'edit', 3900000, 0, 'anh24.jpg', '1', 1, '2018-11-23 03:40:23', '2018-11-23 03:40:23'),
(26, 'Ghế đa năng', 5, 'edit', 5300000, 0, 'J300-33.jpg', '2', 1, '2018-11-23 03:41:11', '2018-11-23 03:41:11'),
(27, 'Lưng bụng', 5, 'edit', 4500000, 0, 'J300-40.jpg', '1', 1, '2018-11-23 03:43:41', '2018-11-23 03:56:16'),
(28, 'Tập bụng', 5, 'edit', 6900000, 0, 'J300-36.jpg', '1', 1, '2018-11-23 03:44:46', '2018-11-23 03:44:46'),
(29, 'Dàn máng tạ', 5, 'edit', 7900000, 0, 'J300-43.jpg', '2', 1, '2018-11-23 03:45:35', '2018-11-23 03:45:35'),
(30, 'BỘ TẠ TAY JORDAN', 5, 'edit', 20000000, 0, 'anh29.jpg', '2', 1, '2018-11-23 03:46:20', '2018-11-23 04:02:29'),
(31, 'TẠ DĨA', 5, 'edit', 38000, 0, 'anh30.jpg', '1000', 1, '2018-11-23 03:47:27', '2018-11-23 03:47:27'),
(32, 'ĐÒN 2M2', 5, 'edit', 2400000, 0, 'anh31.jpg', '1', 1, '2018-11-23 03:48:04', '2018-11-23 03:48:04'),
(33, 'TẠ ĐÒN  1M95', 5, 'edit', 2200000, 0, 'anh32.png', '6', 1, '2018-11-23 03:48:36', '2018-11-23 03:48:56'),
(34, 'TẠ ĐÒN 1M5', 5, 'edit', 1350000, 0, 'anh33.png', '1', 1, '2018-11-23 03:49:58', '2018-11-23 03:49:58'),
(35, 'TẠ ĐÒN 1M2', 5, 'edit', 850000, 0, 'anh34.png', '1', 1, '2018-11-23 03:50:42', '2018-11-23 03:50:42'),
(36, 'ĐÒN ZICZAC', 5, 'edit', 950000, 0, 'anh35.jpg', '1', 1, '2018-11-23 03:53:18', '2018-11-23 03:53:18'),
(37, 'ĐÒN CHỮ H', 5, 'edit', 850000, 0, 'anh36.png', '1', 1, '2018-11-23 03:54:00', '2018-11-23 03:54:17'),
(38, 'test', 6, 'test', 1, 1, 'havan.png', '1', 0, '2018-11-23 05:01:16', '2018-11-23 05:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Training', NULL, NULL, '2018-11-23 01:51:37', '2018-11-23 01:51:37'),
(6, 'test', NULL, NULL, '2018-11-23 05:00:41', '2018-11-23 05:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, '', 'slide1.jpg', NULL, NULL),
(2, '', 'slide2.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `address`, `phone`, `gender`, `role`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, NULL, 'admin@gmail.com', '$2y$10$q1yTvnFL544wMU.MbpDfjeliooHp3NfL/djMRq33L7LrLetoTMZ/q', NULL, NULL, NULL, '1', NULL, NULL, 'HHhwpPs0v7IgdgtXBDBmsVfX2xsVfSpy5GUMEYFpJ08zpDH1aVaA9ROVj04E');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
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
