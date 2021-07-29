-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2020 at 10:03 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dunmun_edms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `document_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `document_id`, `user_name`, `document_name`, `action`, `created_at`, `updated_at`) VALUES
(24, 1, NULL, 'Admin', 'application', 'logged in', '2019-11-18 12:31:56', '2019-11-18 12:31:56'),
(25, 1, NULL, 'Admin', 'application', 'logged in', '2019-11-20 09:34:01', '2019-11-20 09:34:01'),
(26, 1, NULL, 'Admin', 'application', 'logged in', '2019-11-20 10:00:56', '2019-11-20 10:00:56'),
(27, 1, NULL, 'Admin', 'application', 'logged in', '2019-11-20 10:20:43', '2019-11-20 10:20:43'),
(28, 1, 8, 'Admin', 'asfdaf', 'created document', '2019-11-20 10:22:19', '2019-11-20 10:22:19'),
(29, 1, 9, 'Admin', 'asfdaf', 'updated document', '2019-11-20 10:22:30', '2019-11-20 10:22:30'),
(30, 2, NULL, 'Fatima Alam', 'application', 'logged in', '2019-11-20 10:28:42', '2019-11-20 10:28:42'),
(31, 3, NULL, 'Jason Dei', 'application', 'logged in', '2019-11-20 10:29:55', '2019-11-20 10:29:55'),
(32, 1, NULL, 'Admin', 'application', 'logged in', '2019-11-20 10:30:12', '2019-11-20 10:30:12'),
(33, 3, NULL, 'Jason Dei', 'application', 'logged in', '2019-11-20 10:30:55', '2019-11-20 10:30:55'),
(34, 1, NULL, 'Admin', 'application', 'logged in', '2019-11-20 11:14:47', '2019-11-20 11:14:47'),
(35, 2, NULL, 'Fatima Alam', 'application', 'logged in', '2019-11-20 23:35:49', '2019-11-20 23:35:49'),
(36, 1, NULL, 'Admin', 'application', 'logged in', '2019-11-20 23:36:40', '2019-11-20 23:36:40'),
(37, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-01 19:05:17', '2019-12-01 19:05:17'),
(38, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-02 21:55:34', '2019-12-02 21:55:34'),
(39, 1, 10, 'Admin', 'Patient Demographic', 'updated document', '2019-12-02 22:00:36', '2019-12-02 22:00:36'),
(40, 1, 11, 'Admin', 'patients all tests', 'created document', '2019-12-02 22:01:50', '2019-12-02 22:01:50'),
(41, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-02 22:05:59', '2019-12-02 22:05:59'),
(42, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-02 22:06:11', '2019-12-02 22:06:11'),
(43, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-02 22:23:37', '2019-12-02 22:23:37'),
(44, 1, 12, 'Admin', 'docked', 'created document', '2019-12-02 22:59:34', '2019-12-02 22:59:34'),
(45, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-02 23:25:03', '2019-12-02 23:25:03'),
(46, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-07 19:54:16', '2019-12-07 19:54:16'),
(47, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-07 20:47:10', '2019-12-07 20:47:10'),
(48, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-07 08:55:05', '2019-12-07 08:55:05'),
(49, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-07 09:22:02', '2019-12-07 09:22:02'),
(50, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-07 11:29:55', '2019-12-07 11:29:55'),
(51, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-07 12:09:12', '2019-12-07 12:09:12'),
(52, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-08 05:12:14', '2019-12-08 05:12:14'),
(53, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-10 13:00:39', '2019-12-10 13:00:39'),
(54, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-21 00:02:19', '2019-12-21 00:02:19'),
(55, 1, NULL, 'Admin', 'application', 'logged in', '2019-12-30 10:28:57', '2019-12-30 10:28:57'),
(56, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-08 08:52:32', '2020-01-08 08:52:32'),
(57, 1, 13, 'Admin', 'asasd', 'created document', '2020-01-08 09:37:46', '2020-01-08 09:37:46'),
(58, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-08 09:55:23', '2020-01-08 09:55:23'),
(59, 1, 14, 'Admin', 'asasda', 'created document', '2020-01-08 09:56:05', '2020-01-08 09:56:05'),
(60, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-08 10:31:40', '2020-01-08 10:31:40'),
(61, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-09 07:42:47', '2020-01-09 07:42:47'),
(62, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-09 08:29:06', '2020-01-09 08:29:06'),
(63, 1, 15, 'Admin', 'sasdasdds', 'created document', '2020-01-09 08:29:41', '2020-01-09 08:29:41'),
(64, 1, 16, 'Admin', 'adsasdasd', 'created document', '2020-01-09 08:30:01', '2020-01-09 08:30:01'),
(65, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-09 08:58:37', '2020-01-09 08:58:37'),
(66, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-09 09:21:23', '2020-01-09 09:21:23'),
(67, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-09 09:37:48', '2020-01-09 09:37:48'),
(68, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-09 10:55:32', '2020-01-09 10:55:32'),
(69, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-09 23:24:40', '2020-01-09 23:24:40'),
(70, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-09 23:41:34', '2020-01-09 23:41:34'),
(71, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-10 01:38:37', '2020-01-10 01:38:37'),
(72, 1, 17, 'Admin', 'test Doccc', 'created document', '2020-01-10 01:43:06', '2020-01-10 01:43:06'),
(73, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-10 02:15:29', '2020-01-10 02:15:29'),
(74, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-10 02:23:39', '2020-01-10 02:23:39'),
(75, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-10 02:24:18', '2020-01-10 02:24:18'),
(76, 1, 18, 'Admin', 'My first Document', 'created document', '2020-01-10 02:30:57', '2020-01-10 02:30:57'),
(77, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-13 06:05:41', '2020-01-13 06:05:41'),
(78, 1, 19, 'Admin', 'test Doccccc', 'updated document', '2020-01-13 06:07:38', '2020-01-13 06:07:38'),
(79, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-14 01:16:08', '2020-01-14 01:16:08'),
(80, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-14 05:45:12', '2020-01-14 05:45:12'),
(81, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-14 06:04:48', '2020-01-14 06:04:48'),
(82, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-14 14:41:40', '2020-01-14 14:41:40'),
(83, 1, 20, 'Admin', 'test Doc', 'created document', '2020-01-14 14:43:24', '2020-01-14 14:43:24'),
(84, 1, 21, 'Admin', 'test asif docs', 'created document', '2020-01-14 14:43:58', '2020-01-14 14:43:58'),
(85, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-17 21:31:27', '2020-01-17 21:31:27'),
(86, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-18 17:53:00', '2020-01-18 17:53:00'),
(87, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-18 18:29:34', '2020-01-18 18:29:34'),
(88, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-18 19:48:59', '2020-01-18 19:48:59'),
(89, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-19 22:09:25', '2020-01-19 22:09:25'),
(90, 1, 22, 'Admin', 'test Doc', 'created document', '2020-01-19 22:13:31', '2020-01-19 22:13:31'),
(91, 1, 23, 'Admin', 'ttttttttt', 'created document', '2020-01-19 22:14:54', '2020-01-19 22:14:54'),
(92, 1, 24, 'Admin', 'aaaaaaaaaaaaaaaaaaaa', 'created document', '2020-01-19 22:17:06', '2020-01-19 22:17:06'),
(93, 1, 25, 'Admin', 'bbbbbbbbbbbbbbbbbb', 'updated document', '2020-01-19 22:20:13', '2020-01-19 22:20:13'),
(94, 1, 26, 'Admin', 'bbbbbbbbbbbbbbbbbb', 'updated document', '2020-01-19 22:21:09', '2020-01-19 22:21:09'),
(95, 1, 27, 'Admin', 'bbbbbbbbbbbbbbbbbb', 'updated document', '2020-01-19 22:23:23', '2020-01-19 22:23:23'),
(96, 1, 28, 'Admin', 'bbbbbbbbbbbbbbbbbb', 'updated document', '2020-01-19 22:24:28', '2020-01-19 22:24:28'),
(97, 1, 29, 'Admin', 'nnnnnn', 'created document', '2020-01-19 22:28:47', '2020-01-19 22:28:47'),
(98, 1, 30, 'Admin', 'nnnnnop', 'updated document', '2020-01-19 22:33:32', '2020-01-19 22:33:32'),
(99, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-19 23:12:16', '2020-01-19 23:12:16'),
(100, 1, 31, 'Admin', 'mom', 'updated document', '2020-01-19 23:13:54', '2020-01-19 23:13:54'),
(101, 1, 32, 'Admin', 'momm', 'updated document', '2020-01-19 23:14:04', '2020-01-19 23:14:04'),
(102, 1, 33, 'Admin', 'momm', 'updated document', '2020-01-19 23:15:39', '2020-01-19 23:15:39'),
(103, 1, 34, 'Admin', 'popss', 'updated document', '2020-01-19 23:21:23', '2020-01-19 23:21:23'),
(104, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-19 23:46:28', '2020-01-19 23:46:28'),
(105, 1, 35, 'Admin', 'aaaa', 'created document', '2020-01-19 23:47:59', '2020-01-19 23:47:59'),
(106, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-20 00:48:50', '2020-01-20 00:48:50'),
(107, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-20 00:50:44', '2020-01-20 00:50:44'),
(108, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-20 15:40:28', '2020-01-20 15:40:28'),
(109, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-21 17:49:15', '2020-01-21 17:49:15'),
(110, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-21 18:13:51', '2020-01-21 18:13:51'),
(111, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-21 18:41:46', '2020-01-21 18:41:46'),
(112, 1, 36, 'Admin', 'aaaass', 'updated document', '2020-01-21 18:44:51', '2020-01-21 18:44:51'),
(113, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-21 19:14:01', '2020-01-21 19:14:01'),
(114, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-31 00:00:13', '2020-01-31 00:00:13'),
(115, 1, 37, 'Admin', 'doc2', 'created document', '2020-01-31 00:07:53', '2020-01-31 00:07:53'),
(116, 1, NULL, 'Admin', 'application', 'logged in', '2020-01-31 20:32:57', '2020-01-31 20:32:57'),
(117, 1, NULL, 'Admin', 'application', 'logged in', '2020-02-01 13:02:47', '2020-02-01 13:02:47'),
(118, 1, NULL, 'Admin', 'application', 'logged in', '2020-02-01 01:42:46', '2020-02-01 01:42:46'),
(119, 7, NULL, 'gaji asif', 'application', 'logged in', '2020-02-01 04:42:35', '2020-02-01 04:42:35'),
(120, 1, NULL, 'Admin', 'application', 'logged in', '2020-02-01 10:43:34', '2020-02-01 10:43:34'),
(121, 1, NULL, 'Admin', 'application', 'logged in', '2020-02-02 09:42:21', '2020-02-02 09:42:21'),
(122, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-02 09:48:36', '2020-02-02 09:48:36'),
(123, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-02 10:01:32', '2020-02-02 10:01:32'),
(124, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-06 10:46:52', '2020-02-06 10:46:52'),
(125, 1, 38, 'gaji asif', 'doc 333', 'created document', '2020-02-06 12:25:17', '2020-02-06 12:25:17'),
(126, 1, 38, 'gaji asif', 'doc 333', 'deleted document', '2020-02-06 13:07:40', '2020-02-06 13:07:40'),
(127, 1, 39, 'gaji asif', 'doc 1', 'created document', '2020-02-06 13:08:04', '2020-02-06 13:08:04'),
(128, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-07 07:14:34', '2020-02-07 07:14:34'),
(129, 1, 39, 'gaji asif', 'doc 1', 'updated document', '2020-02-07 07:19:23', '2020-02-07 07:19:23'),
(130, 1, 39, 'gaji asif', 'doc 1', 'updated document', '2020-02-07 07:20:24', '2020-02-07 07:20:24'),
(131, 1, 39, 'gaji asif', 'doc 1 update', 'updated document', '2020-02-07 07:23:39', '2020-02-07 07:23:39'),
(132, 1, 39, 'gaji asif', 'doc 1 updates', 'updated document', '2020-02-07 07:26:27', '2020-02-07 07:26:27'),
(133, 1, 39, 'gaji asif', 'doc 1 updatess', 'updated document', '2020-02-07 07:31:00', '2020-02-07 07:31:00'),
(134, 1, 39, 'gaji asif', 'doc 1 updatesoo', 'updated document', '2020-02-07 07:31:35', '2020-02-07 07:31:35'),
(135, 1, 40, 'gaji asif', 'rrrrrrrrrrrrrrrr', 'created document', '2020-02-07 07:32:00', '2020-02-07 07:32:00'),
(136, 1, 40, 'gaji asif', 'rrrrrrrrrrrrrrrr', 'updated document', '2020-02-07 07:32:26', '2020-02-07 07:32:26'),
(137, 1, 40, 'gaji asif', 'pppp', 'updated document', '2020-02-07 07:34:16', '2020-02-07 07:34:16'),
(138, 1, 41, 'gaji asif', 'doc 1', 'created document', '2020-02-07 07:35:14', '2020-02-07 07:35:14'),
(139, 1, 41, 'gaji asif', 'doc 1', 'updated document', '2020-02-07 07:35:23', '2020-02-07 07:35:23'),
(140, 1, 41, 'gaji asif', 'doc 1', 'updated document', '2020-02-07 08:02:51', '2020-02-07 08:02:51'),
(141, 1, 41, 'gaji asif', 'doc 1', 'updated document', '2020-02-07 08:04:20', '2020-02-07 08:04:20'),
(142, 1, 42, 'gaji asif', 'doc tesing', 'created document', '2020-02-07 08:07:15', '2020-02-07 08:07:15'),
(143, 1, 42, 'gaji asif', 'doc tesing', 'updated document', '2020-02-07 08:07:33', '2020-02-07 08:07:33'),
(144, 1, 42, 'gaji asif', 'doc tesing', 'updated document', '2020-02-07 08:09:46', '2020-02-07 08:09:46'),
(145, 1, 42, 'gaji asif', 'doc tesing upload', 'updated document', '2020-02-07 08:13:19', '2020-02-07 08:13:19'),
(146, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-08 12:40:23', '2020-02-08 12:40:23'),
(147, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-09 04:14:27', '2020-02-09 04:14:27'),
(148, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-09 04:22:34', '2020-02-09 04:22:34'),
(149, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-09 04:23:22', '2020-02-09 04:23:22'),
(150, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-09 04:52:55', '2020-02-09 04:52:55'),
(151, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-10 19:27:30', '2020-02-10 19:27:30'),
(152, 1, 41, 'gaji asif', 'doc 1', 'deleted document', '2020-02-10 19:28:56', '2020-02-10 19:28:56'),
(153, 1, 42, 'gaji asif', 'doc tesing upload', 'deleted document', '2020-02-10 19:29:01', '2020-02-10 19:29:01'),
(154, 1, 43, 'gaji asif', 'Doc 1', 'created document', '2020-02-10 19:29:29', '2020-02-10 19:29:29'),
(155, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-10 19:42:42', '2020-02-10 19:42:42'),
(156, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-10 19:45:20', '2020-02-10 19:45:20'),
(157, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-10 19:46:18', '2020-02-10 19:46:18'),
(158, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-10 19:47:29', '2020-02-10 19:47:29'),
(159, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-10 19:50:52', '2020-02-10 19:50:52'),
(160, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-10 19:58:23', '2020-02-10 19:58:23'),
(161, 1, 43, 'gaji asif', 'Doc 1', 'updated document', '2020-02-10 20:01:10', '2020-02-10 20:01:10'),
(162, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-10 20:02:12', '2020-02-10 20:02:12'),
(163, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-10 21:29:13', '2020-02-10 21:29:13'),
(164, 1, 44, 'gaji asif', 'cabinet', 'created document', '2020-02-10 21:37:02', '2020-02-10 21:37:02'),
(165, 1, 45, 'gaji asif', 'cabinet', 'created document', '2020-02-10 21:37:29', '2020-02-10 21:37:29'),
(166, 1, 44, 'gaji asif', 'cabinet', 'updated document', '2020-02-10 21:49:02', '2020-02-10 21:49:02'),
(167, 1, 45, 'gaji asif', 'cabinet', 'updated document', '2020-02-10 21:49:32', '2020-02-10 21:49:32'),
(168, 10, NULL, 'readwrite', 'application', 'logged in', '2020-02-10 21:57:49', '2020-02-10 21:57:49'),
(169, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-21 00:25:02', '2020-02-21 00:25:02'),
(170, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-21 12:17:15', '2020-02-21 12:17:15'),
(171, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-02-21 18:36:02', '2020-02-21 18:36:02'),
(172, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-03-26 21:13:26', '2020-03-26 21:13:26'),
(173, 1, 46, 'gaji asif', 'test Document', 'created document', '2020-03-26 22:46:26', '2020-03-26 22:46:26'),
(174, 1, 47, 'gaji asif', 'another test', 'created document', '2020-03-26 22:55:58', '2020-03-26 22:55:58'),
(175, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-03-29 18:39:23', '2020-03-29 18:39:23'),
(176, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-03 21:42:07', '2020-04-03 21:42:07'),
(177, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-04 19:44:37', '2020-04-04 19:44:37'),
(178, 1, 48, 'gaji asif', 'test Doc', 'created document', '2020-04-04 19:45:57', '2020-04-04 19:45:57'),
(179, 1, 49, 'gaji asif', 'asif doc', 'created document', '2020-04-04 19:46:44', '2020-04-04 19:46:44'),
(180, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-04 22:30:14', '2020-04-04 22:30:14'),
(181, 1, 49, 'gaji asif', 'asif doc', 'deleted document', '2020-04-04 22:30:49', '2020-04-04 22:30:49'),
(182, 1, 49, 'gaji asif', 'asif doc', 'deleted document', '2020-04-04 22:30:52', '2020-04-04 22:30:52'),
(183, 1, 47, 'gaji asif', 'another test', 'deleted document', '2020-04-04 22:33:34', '2020-04-04 22:33:34'),
(184, 1, 50, 'gaji asif', 'gaji docs', 'created document', '2020-04-04 22:34:11', '2020-04-04 22:34:11'),
(185, 1, 51, 'gaji asif', 'k', 'created document', '2020-04-04 22:35:52', '2020-04-04 22:35:52'),
(186, 1, 52, 'gaji asif', 'tyt', 'created document', '2020-04-04 22:59:49', '2020-04-04 22:59:49'),
(187, 1, 53, 'gaji asif', 'tyt', 'created document', '2020-04-04 23:57:49', '2020-04-04 23:57:49'),
(188, 1, 54, 'gaji asif', 'tyu', 'created document', '2020-04-05 00:04:26', '2020-04-05 00:04:26'),
(189, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-05 10:24:31', '2020-04-05 10:24:31'),
(190, 1, 55, 'gaji asif', 'gaji', 'created document', '2020-04-05 10:25:55', '2020-04-05 10:25:55'),
(191, 1, 56, 'gaji asif', 'test DOCSS', 'created document', '2020-04-05 10:27:30', '2020-04-05 10:27:30'),
(192, 1, 56, 'gaji asif', 'test DOCSS 1', 'updated document', '2020-04-05 11:17:39', '2020-04-05 11:17:39'),
(193, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-05 13:59:06', '2020-04-05 13:59:06'),
(194, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-05 14:00:26', '2020-04-05 14:00:26'),
(195, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-05 14:48:47', '2020-04-05 14:48:47'),
(196, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-05 15:01:29', '2020-04-05 15:01:29'),
(197, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-05 15:10:08', '2020-04-05 15:10:08'),
(198, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-05 15:11:25', '2020-04-05 15:11:25'),
(199, 14, NULL, 'admin', 'application', 'logged in', '2020-04-05 15:12:55', '2020-04-05 15:12:55'),
(200, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-05 15:13:19', '2020-04-05 15:13:19'),
(201, 15, NULL, 'consumer', 'application', 'logged in', '2020-04-05 15:17:35', '2020-04-05 15:17:35'),
(202, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-05 15:23:40', '2020-04-05 15:23:40'),
(203, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-05 18:52:52', '2020-04-05 18:52:52'),
(204, 14, NULL, 'admin', 'application', 'logged in', '2020-04-05 19:03:15', '2020-04-05 19:03:15'),
(205, 15, NULL, 'consumer', 'application', 'logged in', '2020-04-05 19:08:29', '2020-04-05 19:08:29'),
(206, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-05 19:16:38', '2020-04-05 19:16:38'),
(207, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-05 19:20:50', '2020-04-05 19:20:50'),
(208, 14, NULL, 'admin', 'application', 'logged in', '2020-04-05 19:24:14', '2020-04-05 19:24:14'),
(209, 15, NULL, 'consumer', 'application', 'logged in', '2020-04-05 19:30:20', '2020-04-05 19:30:20'),
(210, 14, NULL, 'admin', 'application', 'logged in', '2020-04-05 19:31:35', '2020-04-05 19:31:35'),
(211, 15, NULL, 'consumer', 'application', 'logged in', '2020-04-05 19:32:43', '2020-04-05 19:32:43'),
(212, 14, NULL, 'admin', 'application', 'logged in', '2020-04-05 19:48:07', '2020-04-05 19:48:07'),
(213, 16, NULL, 'coordinator', 'application', 'logged in', '2020-04-05 19:50:56', '2020-04-05 19:50:56'),
(214, 15, NULL, 'consumer', 'application', 'logged in', '2020-04-05 19:51:21', '2020-04-05 19:51:21'),
(215, 14, NULL, 'admin', 'application', 'logged in', '2020-04-05 19:51:44', '2020-04-05 19:51:44'),
(216, 14, 57, 'admin', '1st document', 'created document', '2020-04-05 19:54:05', '2020-04-05 19:54:05'),
(217, 14, 57, 'admin', '2nd document', 'updated document', '2020-04-05 19:54:49', '2020-04-05 19:54:49'),
(218, 15, NULL, 'consumer', 'application', 'logged in', '2020-04-05 19:55:33', '2020-04-05 19:55:33'),
(219, 14, NULL, 'admin', 'application', 'logged in', '2020-04-05 19:56:32', '2020-04-05 19:56:32'),
(220, 14, NULL, 'admin', 'application', 'logged in', '2020-04-05 20:03:20', '2020-04-05 20:03:20'),
(221, 14, 57, 'admin', '2nd document', 'document Checked Out', '2020-04-05 20:05:12', '2020-04-05 20:05:12'),
(222, 14, 57, 'admin', '2nd document', 'document Checked In', '2020-04-05 20:05:41', '2020-04-05 20:05:41'),
(223, 14, 57, 'admin', '2nd document', 'document Checked Out', '2020-04-05 20:06:18', '2020-04-05 20:06:18'),
(224, 15, NULL, 'consumer', 'application', 'logged in', '2020-04-05 20:08:33', '2020-04-05 20:08:33'),
(225, 16, NULL, 'coordinator', 'application', 'logged in', '2020-04-05 20:18:29', '2020-04-05 20:18:29'),
(226, 16, 57, 'coordinator', '2nd document', 'document Checked In', '2020-04-05 20:21:47', '2020-04-05 20:21:47'),
(227, 14, NULL, 'admin', 'application', 'logged in', '2020-04-05 20:49:16', '2020-04-05 20:49:16'),
(228, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-05 23:42:33', '2020-04-05 23:42:33'),
(229, 14, NULL, 'admin', 'application', 'logged in', '2020-04-06 19:08:30', '2020-04-06 19:08:30'),
(230, 14, NULL, 'admin', 'application', 'logged in', '2020-04-08 11:40:34', '2020-04-08 11:40:34'),
(231, 14, 58, 'admin', 'test Docs', 'created document', '2020-04-08 11:44:10', '2020-04-08 11:44:10'),
(232, 14, 58, 'admin', 'test Docs', 'document Checked Out', '2020-04-08 11:45:00', '2020-04-08 11:45:00'),
(233, 14, NULL, 'admin', 'application', 'logged in', '2020-04-08 13:51:54', '2020-04-08 13:51:54'),
(234, 14, 58, 'admin', 'test Docs', 'document Checked In', '2020-04-08 14:01:18', '2020-04-08 14:01:18'),
(235, 14, 58, 'admin', 'test Docs', 'updated document', '2020-04-08 14:02:02', '2020-04-08 14:02:02'),
(236, 14, 58, 'admin', 'test Docs', 'document Checked Out', '2020-04-08 14:02:59', '2020-04-08 14:02:59'),
(237, 14, 58, 'admin', 'test Docs', 'document Checked In', '2020-04-08 14:05:41', '2020-04-08 14:05:41'),
(238, 14, 58, 'admin', 'test Docs', 'updated document', '2020-04-08 14:06:37', '2020-04-08 14:06:37'),
(239, 14, NULL, 'admin', 'application', 'logged in', '2020-04-08 14:16:02', '2020-04-08 14:16:02'),
(240, 16, NULL, 'coordinator', 'application', 'logged in', '2020-04-08 14:17:53', '2020-04-08 14:17:53'),
(241, 14, NULL, 'admin', 'application', 'logged in', '2020-04-08 15:44:52', '2020-04-08 15:44:52'),
(242, 14, NULL, 'admin', 'application', 'logged in', '2020-04-09 12:16:52', '2020-04-09 12:16:52'),
(243, 14, NULL, 'admin', 'application', 'logged in', '2020-04-09 14:19:41', '2020-04-09 14:19:41'),
(244, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-11 22:46:12', '2020-04-11 22:46:12'),
(245, 1, NULL, 'gaji asif', 'application', 'logged in', '2020-04-12 19:11:54', '2020-04-12 19:11:54'),
(246, 14, NULL, 'admin', 'application', 'logged in', '2020-04-13 18:21:39', '2020-04-13 18:21:39'),
(247, 14, NULL, 'admin', 'application', 'logged in', '2020-04-15 20:36:01', '2020-04-15 20:36:01'),
(248, 14, NULL, 'admin', 'application', 'logged in', '2020-04-22 12:21:46', '2020-04-22 12:21:46'),
(249, 14, NULL, 'admin', 'application', 'logged in', '2020-04-24 11:54:08', '2020-04-24 11:54:08'),
(250, 14, NULL, 'admin', 'application', 'logged in', '2020-04-25 04:36:22', '2020-04-25 04:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `erp_base_groups`
--

CREATE TABLE `erp_base_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `erp_base_setups`
--

CREATE TABLE `erp_base_setups` (
  `id` int(10) UNSIGNED NOT NULL,
  `base_group_id` tinyint(1) NOT NULL,
  `base_setup_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `erp_consultants`
--

CREATE TABLE `erp_consultants` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `erp_consultants`
--

INSERT INTO `erp_consultants` (`id`, `name`, `action`, `created_at`, `updated_at`) VALUES
(1, 'Accident Emergency', NULL, '2020-01-08 16:05:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `erp_departments`
--

CREATE TABLE `erp_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `erp_designations`
--

CREATE TABLE `erp_designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `erp_document_types`
--

CREATE TABLE `erp_document_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `erp_document_types`
--

INSERT INTO `erp_document_types` (`id`, `type_name`, `type_code`, `action`, `created_at`, `updated_at`) VALUES
(1, 'Referral', 'Referral', NULL, '2019-12-08 11:28:09', NULL),
(2, 'Clinic Correspondence', 'Clinic Correspondence', NULL, '2020-01-08 15:12:56', NULL),
(4, 'ITU Discharge', 'ITU Discharge', NULL, '2020-01-09 23:26:34', '2020-01-09 23:26:34'),
(5, 'Historic Document', 'HIST', NULL, '2020-01-10 02:27:29', '2020-01-10 02:27:29'),
(6, 'Alert', 'ALER', NULL, '2020-01-31 00:19:18', '2020-01-31 00:19:18'),
(7, 'Cas Card', 'CAS', NULL, '2020-01-31 00:19:47', '2020-01-31 00:19:47'),
(8, 'TestType', 'TestCode', NULL, '2020-02-10 21:55:06', '2020-02-10 21:55:06'),
(9, 'again test', 'again', NULL, '2020-04-05 19:52:31', '2020-04-05 19:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `erp_employees`
--

CREATE TABLE `erp_employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
  `current_address` text COLLATE utf8mb4_unicode_ci,
  `department_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `employee_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `blood_group_id` int(11) DEFAULT NULL,
  `qualifications` text COLLATE utf8mb4_unicode_ci,
  `experiences` text COLLATE utf8mb4_unicode_ci,
  `active_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `erp_patients`
--

CREATE TABLE `erp_patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sur_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nhs_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_death` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gp_details` text COLLATE utf8mb4_unicode_ci,
  `next_of_kin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_plan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behaviour` text COLLATE utf8mb4_unicode_ci,
  `communication` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daily_living_skills` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behabiour_date` date DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `erp_patients`
--

INSERT INTO `erp_patients` (`id`, `patient_id`, `title`, `first_name`, `last_name`, `sur_name`, `full_name`, `nhs_no`, `date_of_birth`, `mobile`, `post_code`, `date_of_death`, `address`, `gender`, `gp_details`, `next_of_kin`, `support_plan`, `behaviour`, `communication`, `daily_living_skills`, `education`, `position`, `signature`, `behabiour_date`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(11, '3333', 'Mr', 'asdasdas', 'asdasdasd', 'asdasdasdasdasd', 'asdasdas asdasdasdasdasd asdasdasd', '1321', '1988-10-28', NULL, NULL, NULL, 'gulshan dhaka', 'male', NULL, NULL, '1,3', NULL, NULL, NULL, NULL, NULL, '', NULL, 0, '1', 'gaji asif', '2019-07-05 17:46:27', '2019-12-02 21:58:36'),
(12, '222', NULL, 'Asad', 'Uz', 'Zaman', 'Asad Zaman Uz', '556', '2019-08-08', NULL, NULL, NULL, 'bangladesh', 'male', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, 0, '1', 'Admin', '2019-08-16 20:12:59', '2019-12-02 21:58:43'),
(13, '123123123', 'Prof', 'gaji', 'md', 'asif', 'gaji asif md', '123', '2019-08-07', '01711526589', NULL, NULL, 'habijksebcflasiov oihe   ih', 'male', NULL, NULL, '', NULL, '<p><strong>Communication&nbsp;</strong></p>', '<p><strong>Living&nbsp;</strong></p>', NULL, NULL, '', NULL, 1, '1', NULL, '2019-08-21 06:31:54', '2019-08-21 06:31:54'),
(14, '1236656', 'Miss', 'Edith', NULL, 'Rogers', 'Edith Rogers ', NULL, '1958-12-23', NULL, NULL, '2019-12-25', NULL, 'male', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, 1, '1', NULL, '2019-12-02 22:27:35', '2019-12-02 22:27:35'),
(15, '11414144', 'Mr', 'Mike', NULL, 'Smith', 'Mike Smith ', 'NHS1286277', '1967-12-18', '079756543123', 'BH12 4ND', NULL, '12 Williamson road, Birmingham,', 'male', 'Dr. Alijar, 100 Station Street East, Birmingham, BH12 4DD', 'Susan Smith', '', NULL, NULL, NULL, NULL, NULL, '', NULL, 1, '1', 'gaji asif', '2019-12-02 22:32:16', '2020-02-10 21:44:30'),
(16, '222222', 'Miss', 'Dave', 'John', 'Senna', 'Dave Senna John', 'NHS1282222', '2027-12-16', '07887817887', NULL, '2021-12-08', NULL, 'male', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, 1, '1', NULL, '2019-12-02 22:50:13', '2019-12-02 22:50:13'),
(17, '1111', 'Mrs', 'sadia', 'sultana', 'sadia', 'sadia sadia sultana', '1111', '2020-01-08', '017145895', '22', '2020-01-28', 'asdadad', 'female', 'asdadsad', 'asd', '', NULL, NULL, NULL, NULL, NULL, '', NULL, 1, '1', 'gaji asif', '2020-01-09 23:30:25', '2020-03-26 22:45:34'),
(18, '5664554', 'Mr', 'Steve', NULL, 'Whightman', 'Steve Whightman ', NULL, '1991-01-15', NULL, NULL, NULL, NULL, 'male', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, 1, '1', NULL, '2020-01-10 02:26:36', '2020-01-10 02:26:36'),
(19, '123', 'Mr', 'Gaji', 'Md', 'Asif', 'Gaji Asif Md', '123', '2009-04-15', '0171525695', '345', '2020-04-04', 'dhaka', 'female', 'dhaka\r\nGP details:', 'Next to kin:', '', NULL, NULL, NULL, NULL, NULL, '', NULL, 1, '14', NULL, '2020-04-05 19:53:28', '2020-04-05 19:53:28'),
(20, '222', 'Mrs', 'asasdasd', 'asdasd', 'asdasda', 'asasdasd asdasda asdasd', '333', '2020-04-02', '0171525895', '12030', '2020-04-08', 'asdasd', 'female', 'asdasdas', 'asasd', '', NULL, NULL, NULL, NULL, NULL, '', NULL, 1, '1', NULL, '2020-04-11 22:53:11', '2020-04-11 22:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `erp_specialities`
--

CREATE TABLE `erp_specialities` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `erp_specialities`
--

INSERT INTO `erp_specialities` (`id`, `name`, `action`, `created_at`, `updated_at`) VALUES
(1, 'Accident Emergency', NULL, '2019-12-08 11:27:53', NULL),
(3, 'Blood Transfusion', NULL, '2020-01-09 23:27:15', '2020-01-09 23:27:15'),
(4, 'Oncology', NULL, '2020-01-10 02:27:54', '2020-01-10 02:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `erp_support_plans`
--

CREATE TABLE `erp_support_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2019_08_23_161547_create_erp_base_groups_table', 1),
(2, '2019_08_23_161547_create_erp_base_setups_table', 1),
(3, '2019_08_23_161547_create_erp_departments_table', 1),
(4, '2019_08_23_161547_create_erp_designations_table', 1),
(5, '2019_08_23_161547_create_erp_employees_table', 1),
(6, '2019_08_23_161547_create_erp_patients_table', 1),
(7, '2019_08_23_161547_create_erp_support_plans_table', 1),
(8, '2019_08_23_161547_create_password_resets_table', 1),
(9, '2019_08_23_161547_create_users_table', 1),
(10, '2019_10_03_055900_create_model_has_permissions_table', 1),
(11, '2019_10_03_055900_create_model_has_roles_table', 1),
(12, '2019_10_03_055900_create_permissions_table', 1),
(13, '2019_10_03_055900_create_role_has_permissions_table', 1),
(14, '2019_10_03_055900_create_roles_table', 1),
(15, '2019_11_16_150500_create_activity_logs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 12),
(2, 'App\\User', 12),
(3, 'App\\User', 12);

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
(3, 'App\\User', 3),
(3, 'App\\User', 4),
(3, 'App\\User', 5),
(2, 'App\\User', 8),
(3, 'App\\User', 9),
(2, 'App\\User', 10),
(1, 'App\\User', 11),
(3, 'App\\User', 6),
(3, 'App\\User', 7),
(5, 'App\\User', 12),
(2, 'App\\User', 13),
(1, 'App\\User', 14),
(2, 'App\\User', 16),
(3, 'App\\User', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_documents`
--

CREATE TABLE `patient_documents` (
  `id` int(11) NOT NULL,
  `doc_type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `document_type_code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_document` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speciality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consultant` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `document_date` date DEFAULT NULL,
  `check_in_out` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `check_in_out_user_id` int(11) DEFAULT NULL,
  `acl` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_id` int(11) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_documents`
--

INSERT INTO `patient_documents` (`id`, `doc_type`, `patient_id`, `document_type_code`, `document_name`, `upload_document`, `file_type`, `speciality`, `consultant`, `owner`, `created_date`, `document_date`, `check_in_out`, `check_in_out_user_id`, `acl`, `version_no`, `version_type`, `previous_id`, `active_status`, `created_at`, `updated_at`) VALUES
(57, '1', 19, 'Referral', '2nd document', '/uploads/documents/1586098445Tasks.docx', 'docx', '3', '1', 'admin', '2020-04-05', '1970-01-01', '1', 16, NULL, '1.2', 'Minor', NULL, 1, '2020-04-05 19:54:05', '2020-04-05 20:21:47'),
(58, '5', 19, 'HIST', 'test Docs', '/uploads/documents/15863367971586336522Unit_513_-_Manage_health_and_social_care V02.docx', 'docx', '3', '1', 'admin', '2020-04-08', '2020-04-02', '1', 14, NULL, '1.3', 'Minor', NULL, 1, '2020-04-08 11:44:10', '2020-04-08 14:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `patient_document_versions`
--

CREATE TABLE `patient_document_versions` (
  `id` int(11) NOT NULL,
  `doc_type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `document_type_code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_document` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speciality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consultant` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `document_date` date DEFAULT NULL,
  `acl` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_id` int(11) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_document_versions`
--

INSERT INTO `patient_document_versions` (`id`, `doc_type`, `doc_id`, `document_type_code`, `document_name`, `upload_document`, `file_type`, `speciality`, `consultant`, `owner`, `created_date`, `document_date`, `acl`, `version_no`, `version_type`, `previous_id`, `active_status`, `created_at`, `updated_at`) VALUES
(23, '2', 56, 'Clinic Correspondence', 'test DOCSS', '/uploads/documents/1586064450Features of Affiliate Program Management.docx', 'docx', '3', '1', 'gaji asif', '2020-04-05', '2020-04-01', NULL, '1.1', NULL, NULL, 1, '2020-04-05 10:27:30', '2020-04-05 10:27:30'),
(24, '2', 56, 'Clinic Correspondence', 'test DOCSS 1', '/uploads/documents/1586067459Tasks.docx', NULL, '3', '1', 'gaji asif', '2020-04-05', '2020-04-01', NULL, '1.2', 'Minor', NULL, 1, '2020-04-05 11:17:39', '2020-04-05 11:17:39'),
(25, '1', 57, 'Referral', '1st document', '/uploads/documents/1586098445Tasks.docx', 'docx', '3', '1', 'admin', '2020-04-05', NULL, NULL, '1.1', NULL, NULL, 1, '2020-04-05 19:54:05', '2020-04-05 19:54:05'),
(26, '1', 57, 'Referral', '2nd document', NULL, NULL, '3', '1', 'admin', '2020-04-05', '1970-01-01', NULL, '1.2', 'Minor', NULL, 1, '2020-04-05 19:54:49', '2020-04-05 19:54:49'),
(27, '6', 58, 'ALER', 'test Docs', '/uploads/documents/1586328250EDMS_Testing_Issues (2).docx', 'docx', '3', '1', 'admin', '2020-04-08', '2020-04-02', NULL, '1.1', NULL, NULL, 1, '2020-04-08 11:44:10', '2020-04-08 11:44:10'),
(28, '6', 58, 'ALER', 'test Docs', '/uploads/documents/1586336522Unit_513_-_Manage_health_and_social_care.docx', NULL, '3', '1', 'admin', '2020-04-08', '2020-04-02', NULL, '1.2', 'Minor', NULL, 1, '2020-04-08 14:02:02', '2020-04-08 14:02:02'),
(29, '5', 58, 'HIST', 'test Docs', '/uploads/documents/15863367971586336522Unit_513_-_Manage_health_and_social_care V02.docx', NULL, '3', '1', 'admin', '2020-04-08', '2020-04-02', NULL, '1.3', 'Minor', NULL, 1, '2020-04-08 14:06:37', '2020-04-08 14:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Module_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `Module_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Add documents', NULL, 'web', '2019-11-10 08:48:54', '2019-11-10 08:48:54'),
(2, 'Edit documents', NULL, 'web', '2019-11-10 08:49:09', '2019-11-10 08:49:09'),
(3, 'Delete documents', NULL, 'web', '2019-11-10 08:49:21', '2019-11-10 08:49:21'),
(4, 'Add patients', NULL, 'web', '2019-11-10 08:49:43', '2019-11-10 08:49:43'),
(5, 'Edit patients', NULL, 'web', '2019-11-10 08:49:52', '2019-11-10 08:49:52'),
(6, 'Delete patients', NULL, 'web', '2019-11-10 08:50:02', '2019-11-10 08:50:02'),
(7, 'Add/Edit Role', NULL, 'web', '2019-11-10 08:51:03', '2019-11-10 08:51:03'),
(8, 'Assign Permission by Role', NULL, 'web', '2019-11-10 08:51:24', '2019-11-10 08:51:24'),
(9, 'Assign Permission by User', NULL, 'web', '2019-11-10 08:54:13', '2019-11-10 08:54:13'),
(10, 'Add User', NULL, 'web', '2019-11-10 08:57:56', '2019-11-10 08:57:56'),
(11, 'Edit User', NULL, 'web', '2019-11-10 08:58:06', '2019-11-10 08:58:06'),
(12, 'Delete User', NULL, 'web', '2019-11-10 08:58:16', '2019-11-10 08:58:16'),
(13, 'View User List', NULL, 'web', '2019-11-10 08:58:31', '2019-11-10 08:58:31'),
(17, 'View documents', NULL, 'web', '2019-11-20 10:26:16', '2019-11-20 10:26:16'),
(19, 'Doc Type & Code', NULL, 'web', '2020-04-05 19:16:47', '2020-04-05 19:16:47'),
(20, 'Speciality List', NULL, 'web', '2020-04-05 19:16:47', '2020-04-05 19:16:47');

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
(1, 'Adminstrator', 'web', '2019-11-10 08:42:55', '2019-11-20 09:39:45'),
(2, 'Coordinator', 'web', '2019-11-10 08:44:20', '2019-11-10 08:44:20'),
(3, 'Consumer', 'web', '2019-11-10 08:45:17', '2019-11-20 09:39:25');

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
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(17, 1),
(19, 1),
(20, 1),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(17, 3),
(19, 3),
(20, 3),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(17, 2),
(19, 2),
(20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1',
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `active_status`, `last_login_at`, `last_login_ip`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'gaji asif', 'asif01665@yahoo.com', NULL, '$2y$10$HOgBg0bUNWW8VVdo/oIr/uXoVA7ZPIKg1gPzoc2OYpTVeKaJboRjy', NULL, 1, '2020-04-12 14:11:54', '103.86.111.38', 'AEBYY4JyB5xIgn3sE3SJkrUDra1ANUtocpz05e3yTqEgw4BC49PMMDRgDRjA', NULL, NULL, '2020-02-02 09:47:52', '2020-04-12 19:11:54'),
(14, 'admin', 'admin@gmail.com', NULL, '$2y$10$eEdCG2FdhEvzkSKpsbyEm.sDXqgvSZKBsLbllHH/fn8PuSa8bQzIm', NULL, 1, '2020-04-24 23:36:22', '103.86.111.38', 'yuGwuhPPfJBSiD4mkJUCKHu3gBKv38FCJOc1RF3Qix44KTEMfcLWOZ7rjWzE', 1, NULL, '2020-04-05 15:12:32', '2020-04-25 04:36:22'),
(15, 'consumer', 'consumer@gmail.com', NULL, '$2y$10$NPZPu16/PxLV5jKtf0NJve5m43mKsXmIDFlRmUSE/GE2NOK1kKpLy', NULL, 1, '2020-04-05 15:08:33', '151.228.186.94', 'gkFlrljqlbHypaQgZ4nojES3UzS8mCZVTH0BdnAK2BX551Qwr5OEgzlxhBFS', 1, NULL, '2020-04-05 15:17:17', '2020-04-05 20:08:33'),
(16, 'coordinator', 'coordinator@gmail.com', NULL, '$2y$10$U2MPbK.ZY2FbT9w2YDHX4.m/Jn1bbX8BIybG0a/dyACiLdLAOUiV2', NULL, 1, '2020-04-08 09:17:52', '151.228.186.94', '89obb2UG5Xeif4uDQpai5cdfg5zn6eyuGj9xK6OSTgLjt51Tlayy9NOyc6zS', 1, NULL, '2020-04-05 19:01:51', '2020-04-08 14:17:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_base_groups`
--
ALTER TABLE `erp_base_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_base_setups`
--
ALTER TABLE `erp_base_setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_consultants`
--
ALTER TABLE `erp_consultants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_departments`
--
ALTER TABLE `erp_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_designations`
--
ALTER TABLE `erp_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_document_types`
--
ALTER TABLE `erp_document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_employees`
--
ALTER TABLE `erp_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_patients`
--
ALTER TABLE `erp_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_specialities`
--
ALTER TABLE `erp_specialities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_support_plans`
--
ALTER TABLE `erp_support_plans`
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
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patient_documents`
--
ALTER TABLE `patient_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_document_versions`
--
ALTER TABLE `patient_document_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
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
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `erp_base_groups`
--
ALTER TABLE `erp_base_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `erp_base_setups`
--
ALTER TABLE `erp_base_setups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `erp_consultants`
--
ALTER TABLE `erp_consultants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `erp_departments`
--
ALTER TABLE `erp_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `erp_designations`
--
ALTER TABLE `erp_designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `erp_document_types`
--
ALTER TABLE `erp_document_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `erp_employees`
--
ALTER TABLE `erp_employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `erp_patients`
--
ALTER TABLE `erp_patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `erp_specialities`
--
ALTER TABLE `erp_specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `erp_support_plans`
--
ALTER TABLE `erp_support_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  MODIFY `permission_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_documents`
--
ALTER TABLE `patient_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `patient_document_versions`
--
ALTER TABLE `patient_document_versions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
