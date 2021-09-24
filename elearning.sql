-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 15 juin 2021 à 23:51
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `elearning`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `firstName`, `lastName`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'client 1', 'client 1', 'client1@gmail.com', NULL, '@Rania@555', NULL, NULL),
(2, 'kzjgizr', 'cjezifz', 'rania.lamtabti@gmail.com', NULL, '$2y$10$iAaLPzc6gxj9qllkCnilZeYSr21dIzclFaDJ53W086QdjSSrcJj/m', '2021-06-12 10:44:09', '2021-06-12 10:44:09');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours` time NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `videoIntroPath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('attendre','accepte') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `users_id`, `name`, `hours`, `description`, `videoIntroPath`, `created_at`, `updated_at`, `status`, `image`) VALUES
(1, 6, 'php lesson', '09:52:36', 'Lorem ipsum dolor siquisquam.', NULL, '2021-06-10 20:45:20', '2021-06-10 20:38:44', 'attendre', 'course/cms.jpg'),
(4, 6, 'Womennn', '03:15:00', 'Lorem ipsum dolor sit amet molestiae quas vel sint commodi', 'course/namelast/1.mp4', '2021-06-11 21:17:09', '2021-06-11 21:17:09', 'attendre', 'course/html-css.jpg'),
(5, 6, 'Womennn', '03:15:00', 'Lorem ipsum dolor sime mollitia, molestiae quas vel sint commodi', 'course/namelast/1.mp4', '2021-06-11 21:20:17', '2021-06-11 21:20:17', 'attendre', 'course/php.jpg'),
(6, 6, 'Womennn', '03:15:00', 'Lorem ipsum dolor se mollitia, molestiae quas vel sint commodi', 'course/namelast/1.mp4', '2021-06-11 21:21:57', '2021-06-11 21:21:57', 'attendre', 'course/html-css.jpg'),
(7, 6, 'Womennn', '03:15:00', 'Lorem ipsum dolo$ollitia, molestiae quas vel sint commodi', 'course/namelast/1.mp4', '2021-06-11 21:27:30', '2021-06-11 21:27:30', 'attendre', 'course/cms.jpg'),
(8, 6, 'Womennn', '03:15:00', 'Lorem ipsum dolor sit amodi', 'course/namelast/1.mp4', '2021-06-11 21:27:46', '2021-06-11 21:27:46', 'attendre', 'course/php.jpg'),
(9, 6, 'Womennn', '03:15:00', 'Lorem ipsum dolor sit amet  molestiae quas vel sint commodi', 'course/namelast/1.mp4', '2021-06-11 21:43:55', '2021-06-11 21:43:55', 'attendre', 'course/html-css.jpg'),
(10, 6, 'Womennn', '03:15:00', 'Lorem ipsum dolor sit amet con', 'course/namelast/1.mp4', '2021-06-11 21:45:26', '2021-06-11 21:45:26', 'attendre', 'course/cms.jpg'),
(11, 6, 'Womennn', '03:15:00', 'Lorem ipsum dolor sit amet consect', 'course/namelast/gyfu.mp4', '2021-06-11 21:48:31', '2021-06-11 21:48:31', 'attendre', 'course/php.jpg'),
(12, 6, 'Womennn', '12:46:00', 'n cjrjgieg rgkjjgeijil', 'course/namelast/hands-of-unrecognizable-female-doctor-writing-on-form-and-typing-on-laptop-keyboard.jpg', '2021-06-12 09:53:56', '2021-06-12 09:53:56', 'attendre', 'course/html-css.jpg'),
(13, 6, 'Womennn', '12:46:00', 'n cjrjgieg rgkjjgeijil', 'course/namelast/hands-of-unrecognizable-female-doctor-writing-on-form-and-typing-on-laptop-keyboard.jpg', '2021-06-12 09:57:41', '2021-06-12 09:57:41', 'attendre', 'course/cms.jpg'),
(14, 6, 'Womennn', '12:46:00', 'n cjrjgieg rgkjjgeijil', 'course/namelast/hands-of-unrecognizable-female-doctor-writing-on-form-and-typing-on-laptop-keyboard.jpg', '2021-06-12 09:58:48', '2021-06-12 09:58:48', 'attendre', 'course/php.jpg'),
(15, 6, 'Womennn', '12:46:00', 'n cjrjgieg rgkjjgeijil', 'course/namelast/hands-of-unrecognizable-female-doctor-writing-on-form-and-typing-on-laptop-keyboard.jpg', '2021-06-12 09:59:36', '2021-06-12 09:59:36', 'attendre', 'course/html-css.jpg'),
(16, 6, 'Womennn', '12:46:00', 'n cjrjgieg rgkjjgeijil', 'course/namelast/hands-of-unrecognizable-female-doctor-writing-on-form-and-typing-on-laptop-keyboard.jpg', '2021-06-12 10:01:53', '2021-06-12 10:01:53', 'attendre', 'course/cms.jpg'),
(17, 6, 'Womennn', '12:46:00', 'n cjrjgieg rgkjjgeijil', 'course/namelast/hands-of-unrecognizable-female-doctor-writing-on-form-and-typing-on-laptop-keyboard.jpg', '2021-06-12 10:02:08', '2021-06-12 10:02:08', 'attendre', 'course/php.jpg'),
(18, 6, 'rania lamtabti', '13:03:00', 'figejkahg uyi(hnv sf,  urighng', 'course/namelast/gyfu.mp4', '2021-06-12 10:03:09', '2021-06-12 10:03:09', 'attendre', 'course/html-css.jpg'),
(19, 6, 'rania lamtabti', '13:03:00', 'figejkahg uyi(hnv sf,  urighng', 'course/namelast/gyfu.mp4', '2021-06-12 10:03:30', '2021-06-12 10:03:30', 'attendre', 'course/cms.jpg'),
(20, 6, 'rania lamtabti', '13:03:00', 'figejkahg uyi(hnv sf,  urighng', 'course/namelast/gyfu.mp4', '2021-06-12 10:04:41', '2021-06-12 10:04:41', 'attendre', 'course/php.jpg'),
(21, 6, 'rania lamtabti', '13:03:00', 'figejkahg uyi(hnv sf,  urighng', 'course/namelast/gyfu.mp4', '2021-06-12 10:05:27', '2021-06-12 10:05:27', 'attendre', 'course/html-css.jpg'),
(22, 6, 'rania lamtabti', '13:03:00', 'figejkahg uyi(hnv sf,  urighng', 'course/namelast/gyfu.mp4', '2021-06-12 10:05:52', '2021-06-12 10:05:52', 'attendre', 'course/cms.jpg'),
(23, 6, 'rania lamtabti', '13:03:00', 'figejkahg uyi(hnv sf,  urighng', 'course/namelast/gyfu.mp4', '2021-06-12 10:10:19', '2021-06-12 10:10:19', 'attendre', 'course/php.jpg'),
(24, 6, 'rania lamtabti', '13:03:00', 'figejkahg uyi(hnv sf,  urighng', 'course/namelast/gyfu.mp4', '2021-06-12 10:12:41', '2021-06-12 10:12:41', 'attendre', 'course/html-css.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `levels_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `videoPath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lessons`
--

INSERT INTO `lessons` (`id`, `levels_id`, `name`, `videoPath`, `created_at`, `updated_at`) VALUES
(4, 2, 'lesoon', 'course/namelast/gyfu.mp4', NULL, NULL),
(7, 2, 'rania lamtabti', 'course/namelast/gyfu.mp4', '2021-06-11 22:19:24', '2021-06-11 22:19:24'),
(8, 2, 'allOptique', 'course/namelast/gyfu.mp4', '2021-06-11 22:19:33', '2021-06-11 22:19:33'),
(9, 2, 'allOptique', 'course/namelast/gyfu.mp4', '2021-06-11 22:21:13', '2021-06-11 22:21:13'),
(10, 2, 'Rania Lamtabti', 'course/namelast/gyfu.mp4', '2021-06-11 22:21:24', '2021-06-11 22:21:24'),
(11, 2, 'man', 'course/namelast/gyfu.mp4', '2021-06-11 22:24:10', '2021-06-11 22:24:10'),
(12, 42, 'Womennn', 'course/namelast/gyfu.mp4', '2021-06-12 10:19:00', '2021-06-12 10:19:00'),
(13, 43, 'allOptique', 'course/namelast/gyfu.mp4', '2021-06-12 10:19:16', '2021-06-12 10:19:16'),
(14, 43, 'allOptique', 'course/namelast/gyfu.mp4', '2021-06-12 10:19:30', '2021-06-12 10:19:30'),
(15, 43, 'allOptique', 'course/namelast/gyfu.mp4', '2021-06-12 10:19:46', '2021-06-12 10:19:46');

-- --------------------------------------------------------

--
-- Structure de la table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courses_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `levels`
--

INSERT INTO `levels` (`id`, `courses_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'niveaux 1', '2021-06-10 18:49:41', NULL),
(2, 11, 'nv1', '2021-06-11 21:53:55', '2021-06-11 21:53:55'),
(3, 11, 'nv2', '2021-06-11 21:53:55', '2021-06-11 21:53:55'),
(4, 11, 'nv1', '2021-06-11 21:56:26', '2021-06-11 21:56:26'),
(5, 11, 'nv2', '2021-06-11 21:56:26', '2021-06-11 21:56:26'),
(6, 11, 'nv1', '2021-06-11 21:56:44', '2021-06-11 21:56:44'),
(7, 11, 'nv2', '2021-06-11 21:56:44', '2021-06-11 21:56:44'),
(8, 11, 'nv1', '2021-06-11 21:57:15', '2021-06-11 21:57:15'),
(9, 11, 'nv2', '2021-06-11 21:57:15', '2021-06-11 21:57:15'),
(10, 11, 'nv1', '2021-06-11 21:57:30', '2021-06-11 21:57:30'),
(11, 11, 'nv2', '2021-06-11 21:57:30', '2021-06-11 21:57:30'),
(12, 11, 'nv1', '2021-06-11 21:58:54', '2021-06-11 21:58:54'),
(13, 11, 'nv2', '2021-06-11 21:58:54', '2021-06-11 21:58:54'),
(14, 11, 'nv1', '2021-06-11 21:59:17', '2021-06-11 21:59:17'),
(15, 11, 'nv2', '2021-06-11 21:59:17', '2021-06-11 21:59:17'),
(16, 11, 'nv1', '2021-06-11 22:00:00', '2021-06-11 22:00:00'),
(17, 11, 'nv2', '2021-06-11 22:00:00', '2021-06-11 22:00:00'),
(18, 11, 'nv1', '2021-06-11 22:01:14', '2021-06-11 22:01:14'),
(19, 11, 'nv2', '2021-06-11 22:01:14', '2021-06-11 22:01:14'),
(20, 11, 'nv1', '2021-06-11 22:01:35', '2021-06-11 22:01:35'),
(21, 11, 'nv2', '2021-06-11 22:01:35', '2021-06-11 22:01:35'),
(22, 11, 'nv1', '2021-06-11 22:03:16', '2021-06-11 22:03:16'),
(23, 11, 'nv2', '2021-06-11 22:03:16', '2021-06-11 22:03:16'),
(24, 11, 'nv1', '2021-06-11 22:03:30', '2021-06-11 22:03:30'),
(25, 11, 'nv2', '2021-06-11 22:03:30', '2021-06-11 22:03:30'),
(26, 11, 'nv1', '2021-06-11 22:03:33', '2021-06-11 22:03:33'),
(27, 11, 'nv2', '2021-06-11 22:03:33', '2021-06-11 22:03:33'),
(28, 11, 'nv1', '2021-06-11 22:03:46', '2021-06-11 22:03:46'),
(29, 11, 'nv2', '2021-06-11 22:03:46', '2021-06-11 22:03:46'),
(30, 11, 'nv1', '2021-06-11 22:04:30', '2021-06-11 22:04:30'),
(31, 11, 'nv2', '2021-06-11 22:04:30', '2021-06-11 22:04:30'),
(32, 11, 'nv1', '2021-06-11 22:05:11', '2021-06-11 22:05:11'),
(33, 11, 'nv2', '2021-06-11 22:05:11', '2021-06-11 22:05:11'),
(34, 11, 'nv1', '2021-06-11 22:06:37', '2021-06-11 22:06:37'),
(35, 11, 'nv2', '2021-06-11 22:06:37', '2021-06-11 22:06:37'),
(36, 11, 'nv1', '2021-06-11 22:16:52', '2021-06-11 22:16:52'),
(37, 11, 'nv2', '2021-06-11 22:16:52', '2021-06-11 22:16:52'),
(38, 11, 'nv1', '2021-06-11 22:17:13', '2021-06-11 22:17:13'),
(39, 11, 'nv2', '2021-06-11 22:17:13', '2021-06-11 22:17:13'),
(40, 11, 'nv1', '2021-06-11 22:24:00', '2021-06-11 22:24:00'),
(41, 11, 'nv2', '2021-06-11 22:24:00', '2021-06-11 22:24:00'),
(42, 6, 'niv', '2021-06-12 10:10:34', '2021-06-12 10:10:34'),
(43, 6, 'niv', '2021-06-12 10:10:58', '2021-06-12 10:10:58'),
(44, 6, 'niv', '2021-06-12 10:12:45', '2021-06-12 10:12:45'),
(45, 6, 'niv', '2021-06-12 10:13:06', '2021-06-12 10:13:06'),
(46, 6, 'niv', '2021-06-12 10:15:18', '2021-06-12 10:15:18'),
(47, 6, 'niv', '2021-06-12 10:17:06', '2021-06-12 10:17:06'),
(48, 6, 'niv', '2021-06-12 10:17:30', '2021-06-12 10:17:30');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_10_110845_create_clients_table', 1),
(5, '2021_06_10_155158_create_courses_table', 2),
(6, '2021_06_10_155600_create_level_table', 3),
(7, '2021_06_10_155906_create_lessons_table', 3),
(8, '2021_06_10_155951_create_plans_table', 3),
(9, '2021_06_10_192725_add_user_to_course_table', 4),
(10, '2021_06_10_192858_add_course_to_level_table', 5),
(11, '2021_06_10_192948_add_level_to_lesson_table', 5),
(12, '2021_06_10_193046_add_client_to_plan_table', 5),
(13, '2021_06_10_194555_add_status_to_course_table', 6),
(14, '2021_06_11_150322_add_finale_date_to_plan_table', 7),
(15, '2021_06_12_210931_add_image_to_course_table', 8);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('lamtabti.rania@gmail.com', '$2y$10$xsnFNSpwFwilC2H8UzJtLukta6LSoRDGElVC.HVpJl0xhD9aBPX5u', '2021-06-11 20:55:50');

-- --------------------------------------------------------

--
-- Structure de la table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clients_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('monthly','annual','permanent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `finale_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plans`
--

INSERT INTO `plans` (`id`, `clients_id`, `type`, `created_at`, `updated_at`, `finale_date`) VALUES
(1, 1, 'monthly', '2021-06-10 18:49:41', NULL, '2021-07-11'),
(2, 2, 'monthly', '2021-06-13 11:44:15', '2021-06-13 11:44:15', '2021-07-13');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateBirth` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `description`, `dateBirth`, `image`, `phone`, `is_admin`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rania', 'lamtabti', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi', '2021-06-01', 'profile/2021-06-11_1_Image 1.png', '0635339673', 1, 'allOptique@gmail.com', NULL, 'rania555', NULL, '2021-06-10 11:20:04', '2021-06-11 19:28:53'),
(2, 'user2', 'user2', NULL, NULL, NULL, NULL, 1, 'user2@gmail.com', NULL, '@555@555', NULL, NULL, '2021-06-11 19:02:32'),
(3, 'rania', 'lamtabti', 'ufhé jfieh fjifhf jfef', '2021-06-01', NULL, '0635339673', 0, 'lamtabti.rania@gmail.com', NULL, '$2y$10$gp/2yU5HYEHQu5326p2BZ.Kn7.EZ9OIe0PNHaM1qBS9ACjuuhgq.m', NULL, '2021-06-11 13:55:19', '2021-06-11 13:55:19'),
(5, 'name', 'last', NULL, NULL, NULL, NULL, 0, 'name@gmail.com', NULL, 'rania', NULL, NULL, NULL),
(6, 'name', 'last', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi', '2021-06-01', 'profile/man.jpg', '0635339673', 0, 'allOptique2@gmail.com', NULL, '$2y$10$AOLPIn197pOyqpo6cQuG0e5H1AvrHTzEQ/mZA1K1IB6kJE/VtY/vm', NULL, '2021-06-11 21:07:10', '2021-06-11 21:07:10'),
(7, 'name1', 'last1', NULL, NULL, NULL, NULL, 0, 'user23@gmail.com', NULL, '$2y$10$r7nz6iWLvgXJrJ0bJ0VMCeY2F7jueKcMbVz1y5tZkf0c6H7Z4UwF.', NULL, '2021-06-13 12:49:25', '2021-06-13 12:49:25');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_users_id_foreign` (`users_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_levels_id_foreign` (`levels_id`);

--
-- Index pour la table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `levels_courses_id_foreign` (`courses_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plans_clients_id_foreign` (`clients_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_levels_id_foreign` FOREIGN KEY (`levels_id`) REFERENCES `levels` (`id`);

--
-- Contraintes pour la table `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `levels_courses_id_foreign` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`);

--
-- Contraintes pour la table `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_clients_id_foreign` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
