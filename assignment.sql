-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 02:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_22_031208_add_fields_to_users_table', 1),
(6, '2024_12_23_060141_create_projects_table', 2),
(7, '2024_12_23_060235_create_tasks_table', 2);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `manager_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_code`, `name`, `manager_id`, `created_at`, `updated_at`) VALUES
(2, 'Emran Sikder', 'Petrol Erp Services', 1, '2024-12-23 01:38:35', '2024-12-23 01:38:35'),
(3, 'ECOM-2024', 'Ecommerce Solution', 1, '2024-12-23 07:22:25', '2024-12-23 07:22:25'),
(4, 'ERP-NON', 'ERP Development', 1, '2024-12-23 07:22:51', '2024-12-23 07:22:51'),
(5, 'SA-0205', 'SAAS Project', 1, '2024-12-23 07:23:07', '2024-12-23 07:23:07'),
(6, 'CAFEW', 'Resturant Management System', 1, '2024-12-23 07:23:33', '2024-12-23 07:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Pending','Working','Done') NOT NULL DEFAULT 'Pending',
  `teammate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `project_id`, `description`, `status`, `teammate_id`, `created_at`, `updated_at`) VALUES
(1, 'Update The Authentication Code', 2, 'This is the first time i would like to say nothing', 'Pending', NULL, '2024-12-23 02:02:29', '2024-12-23 02:02:29'),
(2, 'Mahmudul Hasan Shahin', 2, 'dsfsadf', 'Pending', NULL, '2024-12-23 02:03:03', '2024-12-23 02:03:03'),
(3, 'Hello This is Defferent', 2, 'Hello Harun', 'Done', 6, '2024-12-23 02:10:29', '2024-12-23 02:48:42'),
(4, 'Create Cruid On User Table', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, sunt reiciendis eum error quis eius aperiam ea rem ad fugiat.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, sunt reiciendis eum error quis eius aperiam ea rem ad fugiat.', 'Pending', 8, '2024-12-23 07:24:16', '2024-12-23 07:24:16'),
(5, 'Add Google Authentication Api', 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, sunt reiciendis eum error quis eius aperiam ea rem ad fugiat.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, sunt reiciendis eum error quis eius aperiam ea rem ad fugiat.', 'Working', 8, '2024-12-23 07:25:10', '2024-12-23 07:26:19'),
(6, 'Customer Bill And Voucher', 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, sunt reiciendis eum error quis eius aperiam ea rem ad fugiat.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, sunt reiciendis eum error quis eius aperiam ea rem ad fugiat.', 'Pending', 8, '2024-12-23 07:25:33', '2024-12-23 07:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `role` enum('manager','teammate') NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `employee_id`, `role`, `position`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Emran Sikder', 'emranhasans594@gmail.com', 'DF2594', 'manager', NULL, NULL, '$2y$10$5hRjGQ0sihv0R1NsHsGtYOtfRdNDZUJDYdpsoJhtJxqbgMWBisO1W', NULL, '2024-12-22 11:45:15', '2024-12-22 11:45:15'),
(6, 'Harun', 'harun@gmail.com', '654987', 'teammate', 'Salesperson', NULL, '$2y$10$8AVUHiNaztq98luu6X9ZT.n371mq5bcInEGxVX.cqxm/rw0fP2I5K', NULL, '2024-12-22 23:59:17', '2024-12-22 23:59:17'),
(7, 'Md Fauk Hossain', 'faruk@gmail.com', '10-2016-1270', 'teammate', 'Assistant', NULL, '$2y$10$rtdeErkX5F61phNoqRgIquatwaXT6oxhSCCJ0zbZS.fjG1H06rfm.', NULL, '2024-12-23 07:20:39', '2024-12-23 07:20:39'),
(8, 'Jahidul Islam', 'jahid@gmail.com', '10-1358-2022', 'teammate', 'Executive', NULL, '$2y$10$HIonsn2GeC4Twhvr5ZKR..TiOnQ4nF./1IPbG0G8cC1mxNGT2pVIq', NULL, '2024-12-23 07:21:15', '2024-12-23 07:21:15'),
(9, 'Md Rana', 'rana@gmail.com', '13-5876-2024', 'teammate', 'Salesperson', NULL, '$2y$10$JYEgIrVpn76fHn2JmXCjRuReysFK59fupWLDTigtJ9ZKUPHgOTp4y', NULL, '2024-12-23 07:21:49', '2024-12-23 07:21:49');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_project_code_unique` (`project_code`),
  ADD KEY `projects_manager_id_foreign` (`manager_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_project_id_foreign` (`project_id`),
  ADD KEY `tasks_teammate_id_foreign` (`teammate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_employee_id_unique` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_teammate_id_foreign` FOREIGN KEY (`teammate_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
