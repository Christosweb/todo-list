-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2025 at 12:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkboxes`
--

CREATE TABLE `checkboxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkboxes`
--

INSERT INTO `checkboxes` (`id`, `task_id`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 1, '2024-07-13 08:17:46', '2024-07-13 08:17:46', 7),
(2, 2, '2024-07-13 08:17:48', '2024-07-13 08:17:48', 7),
(4, 2, '2024-07-13 08:59:23', '2024-07-13 08:59:23', 7),
(5, 19, '2024-07-13 16:40:18', '2024-07-13 16:40:18', 8),
(10, 23, '2024-07-19 11:47:39', '2024-07-19 11:47:39', 19),
(12, 24, '2024-07-19 11:49:11', '2024-07-19 11:49:11', 19),
(14, 21, '2024-07-19 11:49:15', '2024-07-19 11:49:15', 19);

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2024_07_01_151813_create_tasks_table', 2),
(10, '2024_07_01_152604_create_actives_table', 2),
(11, '2024_07_01_152840_create_completeds_table', 2),
(13, '2024_07_05_111343_create_checkboxes_table', 3),
(14, '2024_07_13_084640_add_user_id_to_checkboxes', 3);

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
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `todo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `todo`, `created_at`, `updated_at`) VALUES
(1, 7, 'i want to visit shola', '2024-07-04 04:55:17', '2024-07-04 04:55:17'),
(2, 7, 'I want to study mathematics', '2024-07-04 05:02:38', '2024-07-13 17:33:51'),
(8, 7, 'program program program', '2024-07-11 15:25:08', '2024-07-11 15:25:08'),
(9, 7, 'i want to play football', '2024-07-11 15:29:00', '2024-07-11 15:29:00'),
(10, 7, 'read novel', '2024-07-11 15:37:30', '2024-07-11 15:37:30'),
(18, 8, 'go on vacation', '2024-07-11 23:13:42', '2024-07-11 23:13:42'),
(19, 8, 'lawal visit', '2024-07-13 16:40:08', '2024-07-13 16:40:08'),
(21, 19, 'this is from user 3', '2024-07-19 11:46:47', '2024-07-19 11:46:47'),
(23, 19, 'watch film', '2024-07-19 11:47:28', '2024-07-19 11:47:28'),
(24, 19, 'go to gym', '2024-07-19 11:48:03', '2024-07-19 11:49:31'),
(25, 19, 'play football', '2024-07-19 11:48:16', '2024-07-19 11:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `age`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shola', 'Adeleke', 'user@gmail.com', 1234567890, 24, NULL, '123456', NULL, '2024-06-25 00:12:58', '2024-06-25 00:12:58'),
(3, 'Omolade', 'Makanjuola', 'makanjuola@gmail.com', 81619076, 24, NULL, '123456', NULL, '2024-06-25 13:25:56', '2024-06-25 13:25:56'),
(4, 'shola', 'Adefila', 'shola7@gmail.com', 778765, 25, NULL, '123456', NULL, '2024-06-25 13:31:39', '2024-06-25 13:31:39'),
(5, 'Abiodun', 'Adefila', 'shola11@gmail.com', 778765, 25, NULL, '123456', NULL, '2024-06-25 13:33:41', '2024-06-25 13:33:41'),
(6, 'Abiodun', 'Makanjuola', 'temitope9@gmail.com', 568976, 24, NULL, '666666', NULL, '2024-06-26 05:35:22', '2024-06-26 05:35:22'),
(7, 'tunbosun', 'tunbosun', 'tunbosun@gmail.com', 123456789, 20, NULL, '$2y$10$vfyakH2cd1Qvc0cNfKndYu2CdRhU7/ndAc6EuSyeclNCfSM4MdJt6', 'kBStj3AKpmaUfq9qD7YCTMnJka0ksShoyufbc43ktATF5XioPiKHmzoFZD7l', '2024-06-26 15:22:05', '2024-07-14 06:08:50'),
(8, 'lawal', 'sofiat', 'lawal@gmail.com', 56789024, 23, NULL, '$2y$10$PZAvFKzkeujdrCf2aDaWeOlRj4JQfn8Zijz20OivQgdHHest0SRV6', 'YPCWn2WVmwASQAiqXcTy1NncrSEOkxxUx2NRrbh3gEjLV8nsgHdhOl1WSYjV', '2024-07-11 22:54:40', '2024-07-12 15:32:55'),
(11, 'Abiodun', 'Adefila', 'shola22@gmail.com', 444444, 24, NULL, '$2y$10$pVzIyWgL3.EZBpZRWitsBONeWDUIT96nhdqN6NUdU9UnojHDmVhBK', NULL, '2024-07-11 23:10:44', '2024-07-11 23:10:44'),
(12, 'timileyin', 'ajiboye', 'ajiboyetimileyin0@gmail.com', 816199966, 34, NULL, '$2y$10$pw9Kw6A5YoLbLVoB8WeuP.Ga5c0MceytnTKd2CcYWX567/USH5W7a', 'or4399pqBZj6ckPk88QHleVOCcVmYp0LRXwteLx43Sz8MgMtsU3pNq5o6vRz', '2024-07-15 15:57:25', '2024-07-19 12:01:25'),
(13, 'user', 'user', 'users@gmail.com', 888888888, 34, NULL, '$2y$10$bhlKCxeZ/LDXJlh5OPHK9OwwKtv0tauyTEEFyW9sDrU33kCI9Woru', NULL, '2024-07-19 11:20:37', '2024-07-19 11:20:37'),
(15, 'dummy', 'dummy', 'dummy@gmail.com', 999, 56, NULL, '$2y$10$hpi3p1wchkLzkW9nrcJZ9.hpokiGqjl9IK2N1UjbroXil.GEVd8ai', NULL, '2024-07-19 11:27:47', '2024-07-19 11:27:47'),
(16, 'dummy', 'dummy', 'dummy1@gmail.com', 999, 56, NULL, '$2y$10$S9fDI0O9W6l.eUx/bmY0u.ahRN1QfDDe8fewxNudthyOAJPbE8hH6', NULL, '2024-07-19 11:29:24', '2024-07-19 11:29:24'),
(17, 'dummy', 'dumm', 'dummy2@gmail.com', 999, 78, NULL, '$2y$10$VGJxaTHA8CZah9gyl0Y9Z.P9.IvNS6ckq7hyEpmsn7Lc1BpmB4jBq', NULL, '2024-07-19 11:31:35', '2024-07-19 11:31:35'),
(18, 'dummy', 'du', 'dummy3@gmail.com', 999, 78, NULL, '$2y$10$6AaKvXThasDF4SfOHNiYRe4JR/B2MumcLtGCa0Y0eRNgXGhWZhVGy', NULL, '2024-07-19 11:41:16', '2024-07-19 11:41:16'),
(19, 'user3', 'user3', 'user3@gmail.com', 345565, 2, NULL, '$2y$10$O1hrn2OtJw3a3h5NXG9LO.lNNS9fPLOS4mo2yxAs9sryMzGSWXQwa', 'X3JuB7rIqLhQLH6fME4zFMFPdhykIlscbgiviy5I1V73RpTsDD7rfnjr53j5', '2024-07-19 11:45:50', '2024-07-19 11:50:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkboxes`
--
ALTER TABLE `checkboxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkboxes_task_id_foreign` (`task_id`),
  ADD KEY `checkboxes_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `checkboxes`
--
ALTER TABLE `checkboxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkboxes`
--
ALTER TABLE `checkboxes`
  ADD CONSTRAINT `checkboxes_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checkboxes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
