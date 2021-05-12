-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2021 at 04:46 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surgery`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_10_02_142505_create_products_table', 1),
(10, '2021_05_06_191544_create_staff_table', 1),
(11, '2021_05_06_191619_create_patients_table', 1),
(12, '2021_05_06_191634_create_rooms_table', 1),
(13, '2021_05_06_191726_create_surgery_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0ca5ed8278158bbdec679cecd7cb8d6a4a89b4fa1c83f69a82608a28670fcd97c1cb5dc7a05d1151', 1, 1, 'MyApp', '[]', 0, '2021-05-10 01:27:05', '2021-05-10 01:27:05', '2022-05-09 20:27:05'),
('1d10769d89a35be18556fc1b0eb03537ba66e1f162f996ebf39d5f94ed4d40d2e05d614286dc5f99', 4, 1, 'MyApp', '[]', 0, '2021-05-10 07:51:55', '2021-05-10 07:51:55', '2022-05-10 02:51:55'),
('200f2982788adabe672f3edca121ad6b71b17e6207a23fb4889182827d0225374c290eb42c5fd914', 4, 1, 'MyApp', '[]', 0, '2021-05-10 07:40:07', '2021-05-10 07:40:07', '2022-05-10 02:40:07'),
('2b3179f805d1bf53814fd5eced2a599fcc5d27def39150f22b817a59fc5ad9990010a92529f2c2d1', 4, 1, 'MyApp', '[]', 0, '2021-05-10 08:45:12', '2021-05-10 08:45:12', '2022-05-10 03:45:12'),
('3609e0e699dd75426b6f195097c82794e79d491ef2d186cf8fc496d53d98ea249f2c033e7e92da62', 1, 1, 'MyApp', '[]', 0, '2021-05-10 07:30:16', '2021-05-10 07:30:16', '2022-05-10 02:30:16'),
('426fac1820dd96325a2dbb7d9a52b37bbc9eb9e80dc9a27882ef9b7f184734c16fa7e04f5fd18b28', 4, 1, 'MyApp', '[]', 0, '2021-05-08 00:57:18', '2021-05-08 00:57:18', '2022-05-07 19:57:18'),
('480dacb553e84d58fb098b95aab32dc69e64f7988ce3b5535cbb68f8e18482151ada4b5611b2a067', 4, 1, 'MyApp', '[]', 1, '2021-05-10 07:40:38', '2021-05-10 07:40:38', '2022-05-10 02:40:38'),
('484b9ba4382311c9f1dbc8a0e7a5cc22036ace0bfb64e6cb1a5a83905b662c4e2896bbecc65df237', 4, 1, 'MyApp', '[]', 0, '2021-05-10 08:20:24', '2021-05-10 08:20:24', '2022-05-10 03:20:24'),
('511402aac8fba0f03ce4ad1de435e85f7d6d04686b84e503815616f7046ab8c0a4573bfff3db3548', 1, 1, 'MyApp', '[]', 0, '2021-05-10 00:30:29', '2021-05-10 00:30:29', '2022-05-09 19:30:29'),
('52bd37c84093a69a07ee4d739d8d3111981d07fdfc1b71653a7552064be9a562bfa4cf91a8cff6e4', 7, 1, 'MyApp', '[]', 0, '2021-05-12 08:14:19', '2021-05-12 08:14:19', '2022-05-12 03:14:19'),
('697ceba360c11266dc021b3d1fd55ae80c56c0dad96bd9438f79ea4be280473d1e32948052ba5618', 4, 1, 'MyApp', '[]', 0, '2021-05-10 07:37:09', '2021-05-10 07:37:09', '2022-05-10 02:37:09'),
('997ede7170bdc2d14bbef45ff1f1e073cc22d8a32a565c7d0bee44a38c8c3c5abb74aa0c9faf8e3e', 3, 1, 'MyApp', '[]', 0, '2021-05-08 00:55:08', '2021-05-08 00:55:08', '2022-05-07 19:55:08'),
('9d633160afc2d1084776f566b15afaaf077aae74238b290f56383029c98dfd8f7d9aa2482b8d0c4b', 4, 1, 'MyApp', '[]', 0, '2021-05-10 07:32:55', '2021-05-10 07:32:55', '2022-05-10 02:32:55'),
('a12866e63c65bfcd07f4a8e608ce5bf09170c104deebf9e047b6ca13a1e1192388257fa12d5a8075', 4, 1, 'MyApp', '[]', 0, '2021-05-10 07:39:10', '2021-05-10 07:39:10', '2022-05-10 02:39:10'),
('b7d507c1a4ed27da970ba6ef1fb2cd39cb3286cd716237c1762db474ec8d9f8bdeda63afe4debbaf', 1, 1, 'MyApp', '[]', 0, '2021-05-10 01:18:04', '2021-05-10 01:18:04', '2022-05-09 20:18:04'),
('c40a426b2984f9eb02108f26c4b72f536b80953008d59d97386454ab8cc113cd4ee6e13d03443746', 4, 1, 'MyApp', '[]', 0, '2021-05-10 07:42:16', '2021-05-10 07:42:16', '2022-05-10 02:42:16'),
('cdfb3e272bebaeaac256b2cff8065ba36e39fc5b857e0294a99f0bdc42dbfd2cf9a7e1d9b27787f1', 1, 1, 'MyApp', '[]', 0, '2021-05-10 07:30:33', '2021-05-10 07:30:33', '2022-05-10 02:30:33'),
('d03603fe805869d007acbc98f98f6d74e0dd678a82593ecbde13b0569ab9668daa77ff30c480f878', 5, 1, 'MyApp', '[]', 0, '2021-05-08 01:17:49', '2021-05-08 01:17:49', '2022-05-07 20:17:49'),
('f02ad1494eb4f7388609fe9b3a6193ed26c29dd1eaab7df4cc05839429d07cdf5802e55656aa5889', 1, 1, 'MyApp', '[]', 0, '2021-05-10 07:17:17', '2021-05-10 07:17:17', '2022-05-10 02:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'surgery', 'tmFJOGWuyLfq42B4NJgowH4DBfJkic88XfHAAnF6', NULL, 'http://localhost', 1, 0, 0, '2021-05-08 00:54:40', '2021-05-08 00:54:40');

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

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-05-08 00:54:41', '2021-05-08 00:54:41');

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactNumber` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `email`, `fname`, `lname`, `dob`, `contactNumber`, `created_at`, `updated_at`) VALUES
(1, 'james@gmail.com', 'James', 'Smith', '22/12/1995', '1822933', '2021-05-07 05:00:00', '2021-05-07 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roomName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomName`, `created_at`, `updated_at`) VALUES
(1, 'Theatre1', '2021-05-07 05:00:00', '2021-05-07 05:00:00'),
(2, 'Theatre2', '2021-05-07 05:00:00', '2021-05-07 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staffType` enum('DOCTOR','RECEPTIONIST','ADMIN') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `email`, `staffType`, `fname`, `lname`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(4, 'billyocean@gmail.com', 'ADMIN', 'Billy', 'Ocean', '187648484', '$2y$10$6aCkmCV3R99S/Tn1/0GYMe5uqGdQFtfkssxyku6dsRYhKy/hO.RSm', '2021-05-08 00:57:18', '2021-05-08 01:15:09'),
(5, 'tom@gmail.com', 'DOCTOR', 'Tommy', 'Lee', '187648484', '$2y$10$64popHOU4kDnWW0JxPUb1uYW9B.Q2RIm5rOGdo4TaabMG8QhFugOi', '2021-05-08 01:17:49', '2021-05-08 01:17:49'),
(6, 'tash@gmail.com', 'DOCTOR', 'Tashana', 'Jones', '8763834834', '$2y$10$64popHOU4kDnWW0JxPUb1uYW9B.Q2RIm5rOGdo4TaabMG8QhFugOi', NULL, NULL),
(7, 'admin@speurgroup.com', 'ADMIN', 'Ruel', 'Johnson', '8765294165', '$2y$10$O539cS1.sPWY/wghjQiF7ezhmeeiD2kF.dANdEpwxGWoKYzYOj5dy', '2021-05-12 08:14:17', '2021-05-12 08:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `surgeries`
--

CREATE TABLE `surgeries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requestedBy` bigint(20) UNSIGNED DEFAULT NULL,
  `room` bigint(20) UNSIGNED NOT NULL,
  `patient` bigint(20) UNSIGNED NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `doctors` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surgeries`
--

INSERT INTO `surgeries` (`id`, `requestedBy`, `room`, `patient`, `startDate`, `endDate`, `doctors`, `created_at`, `updated_at`) VALUES
(2, NULL, 1, 1, '2021-05-07 21:11:29', '2021-05-07 21:55:29', '\"[4]\"', NULL, NULL),
(3, 4, 1, 1, '2021-05-07 15:11:29', '2021-05-07 15:55:29', '\"[4,6]\"', NULL, NULL),
(4, NULL, 1, 1, '2017-01-01 10:10:10', '2017-01-01 12:10:10', '\"[4,5]\"', NULL, NULL),
(5, NULL, 1, 1, '2017-01-01 10:10:10', '2017-01-01 12:10:10', '\"[4,5,6]\"', NULL, NULL),
(6, NULL, 1, 1, '2017-01-01 10:10:10', '2017-01-01 12:10:10', '\"[4,5,6]\"', '2021-05-12 07:59:39', '2021-05-12 07:59:39'),
(7, 6, 1, 1, '2017-01-01 10:10:10', '2017-01-01 12:10:10', '\"[4,5,6]\"', '2021-05-12 08:00:15', '2021-05-12 08:00:15');

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgeries`
--
ALTER TABLE `surgeries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surgery_requestedby_foreign` (`requestedBy`),
  ADD KEY `surgery_room_foreign` (`room`),
  ADD KEY `surgery_patient_foreign` (`patient`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surgeries`
--
ALTER TABLE `surgeries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surgeries`
--
ALTER TABLE `surgeries`
  ADD CONSTRAINT `surgery_patient_foreign` FOREIGN KEY (`patient`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `surgery_requestedby_foreign` FOREIGN KEY (`requestedBy`) REFERENCES `staff` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `surgery_room_foreign` FOREIGN KEY (`room`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
