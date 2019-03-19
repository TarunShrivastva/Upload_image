-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2019 at 09:08 PM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 5.6.40-5+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `recent` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `trending` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `most_popular` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `published` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_types`
--

CREATE TABLE `content_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_types`
--

INSERT INTO `content_types` (`id`, `content_type_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Food', '1', '2019-03-18 10:45:35', '2019-03-18 10:45:35', NULL),
(2, 'Technology', '1', '2019-03-18 11:29:19', '2019-03-18 11:36:59', NULL);

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
(3, '2019_02_09_073743_create_table_modules', 1),
(4, '2019_02_17_142254_create_module_user_table', 1),
(5, '2019_02_17_143000_create_parameter_in_module_user_table', 1),
(7, '2019_03_18_084847_create_content_type_table', 1),
(8, '2019_03_03_102237_create_article_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `display`, `url`, `parent_id`, `icon`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'master', 'master', '/master', 0, 'fa-master', '1', '2019-03-18 10:16:09', '2019-03-18 10:16:09', NULL),
(2, 'Content Type', 'Content Type', '/contenttype', 1, 'fa-content-type', '1', '2019-03-18 10:16:55', '2019-03-18 10:16:55', NULL),
(3, 'Content', 'Content', '/content', 0, 'fa-content', '1', '2019-03-18 10:29:13', '2019-03-18 10:29:13', NULL),
(4, 'Articles', 'Articles', '/articles', 3, 'fa-articles', '1', '2019-03-18 10:30:03', '2019-03-18 10:30:03', NULL),
(5, 'Top Ten', 'Top Ten', '/topten', 3, 'fa-topten', '1', '2019-03-18 10:31:04', '2019-03-18 10:31:04', NULL),
(6, 'Review', 'Review', '/review', 3, 'fa-review', '1', '2019-03-18 10:31:27', '2019-03-18 10:31:27', NULL),
(7, 'Media', 'Media', '/media', 3, 'fa-media', '1', '2019-03-18 10:32:54', '2019-03-18 10:32:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module_user`
--

CREATE TABLE `module_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `can_add` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `can_edit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `can_delete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module_user`
--

INSERT INTO `module_user` (`user_id`, `module_id`, `can_add`, `can_edit`, `can_delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '1', '1', '1', '2019-03-18 10:16:10', '2019-03-18 10:16:10', NULL),
(1, 2, '1', '1', '1', '2019-03-18 10:16:55', '2019-03-18 10:16:55', NULL),
(1, 3, '1', '1', '1', '2019-03-18 10:29:14', '2019-03-18 10:29:14', NULL),
(1, 4, '1', '1', '1', '2019-03-18 10:30:03', '2019-03-18 10:30:03', NULL),
(1, 5, '1', '1', '1', '2019-03-18 10:31:04', '2019-03-18 10:31:04', NULL),
(1, 6, '1', '1', '1', '2019-03-18 10:31:27', '2019-03-18 10:31:27', NULL),
(1, 7, '1', '1', '1', '2019-03-18 10:32:54', '2019-03-18 10:32:54', NULL);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_by` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_image`, `age`, `address`, `contact_number`, `latitude`, `longitude`, `user_type`, `login_by`, `hash`, `api_token`, `is_verified`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'shrivastvatarun@gmail.com', '$2y$10$dW87XRjuBQa5X4bnshiHfu.JLwnPlcE5g4KPxgMJSEZ5HAmMiOxqy', 'admin', 27, '278 Fatak Karor Ajmeri Gate ', '8375856240', '34.434343', '32.323223', '0', '0', '', '', '1', '1', 'MVJetd7mOqVpHHeWA5BFAw8MUhtfXu4pzJRZ6EwjCXkPZXHbIiwitAZXxN5o', '2019-03-17 18:30:00', '2019-03-17 18:30:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_title_unique` (`title`);

--
-- Indexes for table `content_types`
--
ALTER TABLE `content_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modules_display_unique` (`display`),
  ADD UNIQUE KEY `modules_url_unique` (`url`);

--
-- Indexes for table `module_user`
--
ALTER TABLE `module_user`
  ADD KEY `module_user_user_id_foreign` (`user_id`),
  ADD KEY `module_user_module_id_foreign` (`module_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content_types`
--
ALTER TABLE `content_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `module_user`
--
ALTER TABLE `module_user`
  ADD CONSTRAINT `module_user_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `module_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
