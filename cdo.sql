-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2024 at 06:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `sent_to` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `position` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `sent_to`, `message`, `created_at`, `position`) VALUES
(1, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'hi', '2024-11-27 02:14:53', 'admin'),
(2, 'CDO Foodsphere Ecart', 'Dela Cruz, Juan', 'hi', '2024-11-27 02:15:01', 'admin'),
(3, 'CDO Foodsphere Ecart', 'Dela Cruz, Juan', 'hi', '2024-11-27 02:15:09', 'admin'),
(4, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'hii', '2024-11-27 02:15:19', 'admin'),
(5, 'Dela Cruza, Juana', 'admin', 'Hello', '2024-11-27 02:18:29', 'customer'),
(6, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'Hi', '2024-11-27 02:18:41', 'admin'),
(7, 'CDO Foodsphere Ecart', 'Dela Cruz, Juan', 'Hi', '2024-11-27 02:19:24', 'admin'),
(8, 'CDO Foodsphere Ecart', 'Dela Cruz, Juan', 'Again', '2024-11-27 02:19:35', 'admin'),
(9, 'Dela Cruz, Juan', 'admin', 'wassup', '2024-11-27 02:19:38', 'customer'),
(10, 'CDO Foodsphere Ecart', 'Dela Cruz, Juan', 'a', '2024-11-27 02:29:06', 'admin'),
(11, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', '_', '2024-11-27 03:08:17', 'admin'),
(12, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'huh', '2024-11-27 03:08:29', 'admin'),
(13, 'Dela Cruza, Juana', 'admin', 'bruh', '2024-11-27 03:08:45', 'customer'),
(14, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'Hellow Juana', '2024-11-27 03:15:03', 'admin'),
(15, 'Dela Cruza, Juana', 'admin', 'Hi admin', '2024-11-27 03:15:10', 'customer'),
(16, 'Dela Cruza, Juana', 'admin', 'ayaw lumabas?', '2024-11-27 03:15:26', 'customer'),
(17, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'oo eh', '2024-11-27 03:15:31', 'admin'),
(18, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'ok na?', '2024-11-27 03:19:03', 'admin'),
(19, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'ok na?', '2024-11-27 03:19:39', 'admin'),
(20, 'Dela Cruza, Juana', 'admin', 'hindi', '2024-11-27 03:19:50', 'customer'),
(21, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'luh', '2024-11-27 03:20:10', 'admin'),
(22, 'Dela Cruza, Juana', 'admin', 'ulit', '2024-11-27 03:20:15', 'customer'),
(23, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', '1', '2024-11-27 03:23:05', 'admin'),
(24, 'Dela Cruza, Juana', 'admin', '2', '2024-11-27 03:23:08', 'customer'),
(25, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', '12', '2024-11-27 03:23:28', 'admin'),
(26, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', '3', '2024-11-27 03:23:31', 'admin'),
(27, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', '4', '2024-11-27 03:23:34', 'admin'),
(28, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', '5', '2024-11-27 03:23:36', 'admin'),
(29, 'Dela Cruza, Juana', 'admin', '6', '2024-11-27 03:23:43', 'customer'),
(30, 'Dela Cruza, Juana', 'admin', '7', '2024-11-27 03:23:46', 'customer'),
(31, 'Dela Cruza, Juana', 'admin', '8', '2024-11-27 03:23:48', 'customer'),
(32, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'asda', '2024-11-27 03:27:10', 'admin'),
(33, 'Dela Cruza, Juana', 'admin', 'hayp', '2024-11-27 03:27:20', 'customer'),
(34, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'a', '2024-11-27 03:51:47', 'admin'),
(35, 'Dela Cruza, Juana', 'admin', 's', '2024-11-27 03:51:51', 'customer'),
(36, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 's', '2024-11-27 03:53:14', 'admin'),
(37, 'Dela Cruza, Juana', 'admin', 'asda', '2024-11-27 03:53:39', 'customer'),
(38, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'hi?', '2024-11-27 04:55:57', 'admin'),
(39, 'Dela Cruza, Juana', 'admin', 'Hello?', '2024-11-27 04:56:05', 'customer'),
(40, 'CDO Foodsphere Ecart', 'Dela Cruz, Juan', 'wassup', '2024-11-27 04:56:14', 'admin'),
(41, 'Lina, Mark Anthony ', 'admin', 'Hello', '2024-12-09 00:35:57', 'customer'),
(42, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'Hi', '2024-12-11 06:57:13', 'admin'),
(43, 'Ramos, Nathaniel Patrick L.', 'admin', 'yow', '2024-12-11 10:11:00', 'customer'),
(44, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'test1', '2024-12-16 03:07:33', 'admin'),
(45, 'Lina, Mark Anthony ', 'admin', 'test2', '2024-12-16 03:08:25', 'customer'),
(46, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'message 1 to cus', '2024-12-16 03:24:27', 'admin'),
(47, 'Lina, Mark Anthony ', 'admin', 'message 1 to admin', '2024-12-16 03:24:41', 'customer'),
(48, 'Lina, Mark Anthony ', 'admin', 'message 2 to admin', '2024-12-16 03:26:20', 'customer'),
(49, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'message 2 to cus', '2024-12-16 03:26:30', 'admin'),
(50, 'Lina, Mark Anthony ', 'admin', 'message 3 to admin', '2024-12-16 03:27:54', 'customer'),
(51, 'Lina, Mark Anthony ', 'admin', 'message 3 to admin 2', '2024-12-16 03:28:23', 'customer'),
(52, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'message 3 to cus', '2024-12-16 03:28:34', 'admin'),
(53, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'message 3 to cus 2', '2024-12-16 03:29:18', 'admin'),
(54, 'Lina, Mark Anthony ', 'admin', 'here', '2024-12-16 03:29:35', 'customer'),
(55, 'Lina, Mark Anthony ', 'admin', 'here', '2024-12-16 03:29:43', 'customer'),
(56, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 's', '2024-12-16 03:30:24', 'admin'),
(57, 'Lina, Mark Anthony ', 'admin', 's', '2024-12-16 03:30:29', 'customer'),
(58, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 's', '2024-12-16 03:30:46', 'admin'),
(59, 'Lina, Mark Anthony ', 'admin', 's', '2024-12-16 03:30:51', 'customer'),
(60, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 's', '2024-12-16 03:31:09', 'admin'),
(61, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 's', '2024-12-16 03:31:30', 'admin'),
(62, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 's', '2024-12-16 03:31:35', 'admin'),
(63, 'Lina, Mark Anthony ', 'admin', 'bat', '2024-12-16 03:33:11', 'customer'),
(64, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'bat again', '2024-12-16 03:33:18', 'admin'),
(65, 'Lina, Mark Anthony ', 'admin', 'cus to admin', '2024-12-16 03:35:55', 'customer'),
(66, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'admin to cus', '2024-12-16 03:36:04', 'admin'),
(67, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'sss', '2024-12-16 03:36:32', 'admin'),
(68, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'sssss', '2024-12-16 03:36:39', 'admin'),
(69, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'mark', '2024-12-16 03:37:41', 'admin'),
(70, 'Lina, Mark Anthony ', 'admin', 'mark', '2024-12-16 03:37:46', 'customer'),
(71, 'Lina, Mark Anthony ', 'admin', 'mark', '2024-12-16 03:38:00', 'customer'),
(72, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'again', '2024-12-16 03:38:05', 'admin'),
(73, 'Lina, Mark Anthony ', 'admin', 'again', '2024-12-16 03:40:20', 'customer'),
(74, 'Lina, Mark Anthony ', 'admin', 'Hi', '2024-12-16 03:45:26', 'customer'),
(75, 'Lina, Mark Anthony ', 'admin', 'Hi', '2024-12-16 03:45:52', 'customer'),
(76, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'Hi', '2024-12-16 03:46:41', 'admin'),
(77, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'Hi', '2024-12-16 03:47:05', 'admin'),
(78, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'Hi', '2024-12-16 03:48:03', 'admin'),
(79, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'Hi', '2024-12-16 03:48:10', 'admin'),
(80, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'Test', '2024-12-16 03:48:55', 'admin'),
(81, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'test', '2024-12-16 03:49:25', 'admin'),
(82, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'tset 2', '2024-12-16 03:49:40', 'admin'),
(83, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'test 2', '2024-12-16 03:50:48', 'admin'),
(84, 'Lina, Mark Anthony ', 'admin', 'test 333', '2024-12-16 03:51:14', 'customer'),
(85, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'tesesfa\\', '2024-12-16 03:51:36', 'admin'),
(86, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'again', '2024-12-16 03:51:46', 'admin'),
(87, 'Lina, Mark Anthony ', 'admin', 'mark to admin', '2024-12-16 03:51:57', 'customer'),
(88, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'admin to mark', '2024-12-16 03:52:39', 'admin'),
(89, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'again', '2024-12-16 03:52:52', 'admin'),
(90, 'Lina, Mark Anthony ', 'admin', 'mark', '2024-12-16 03:52:58', 'customer'),
(91, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'test 1', '2024-12-16 03:53:22', 'admin'),
(92, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'test 2', '2024-12-16 03:53:28', 'admin'),
(93, 'Lina, Mark Anthony ', 'admin', 'test 3', '2024-12-16 03:53:33', 'customer'),
(94, 'Lina, Mark Anthony ', 'admin', 'test 4', '2024-12-16 03:53:39', 'customer'),
(95, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'test 5', '2024-12-16 03:53:46', 'admin'),
(96, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'test 6', '2024-12-16 03:54:42', 'admin'),
(97, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'test 5 admin to ramos', '2024-12-16 03:55:11', 'admin'),
(98, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'test 6 admin to mark', '2024-12-16 03:55:35', 'admin'),
(99, 'Lina, Mark Anthony ', 'admin', 'mark to admin', '2024-12-16 03:55:48', 'customer'),
(100, 'Lina, Mark Anthony ', 'admin', 'mark to admin', '2024-12-16 03:55:56', 'customer'),
(101, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'admin to mark', '2024-12-16 03:56:56', 'admin'),
(102, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'asdasd', '2024-12-16 03:57:22', 'admin'),
(103, 'Lina, Mark Anthony ', 'admin', 'asdasd', '2024-12-16 03:57:26', 'customer'),
(104, 'Lina, Mark Anthony ', 'admin', 'asdasda', '2024-12-16 03:57:35', 'customer'),
(105, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'asdasd', '2024-12-16 03:58:34', 'admin'),
(106, 'Lina, Mark Anthony ', 'admin', 'asdasd', '2024-12-16 03:59:21', 'customer'),
(107, 'Lina, Mark Anthony ', 'admin', 'asdasda', '2024-12-16 04:00:42', 'customer'),
(108, 'Lina, Mark Anthony ', 'admin', 'asdasdasdasdasd', '2024-12-16 04:00:56', 'customer'),
(109, 'Lina, Mark Anthony ', 'admin', 'sadasda', '2024-12-16 04:02:06', 'customer'),
(110, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'asdasd', '2024-12-16 04:02:12', 'admin'),
(111, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'asdasdasd', '2024-12-16 04:02:27', 'admin'),
(112, 'Lina, Mark Anthony ', 'admin', 'asdasdasd', '2024-12-16 04:03:18', 'customer'),
(113, 'Lina, Mark Anthony ', 'admin', 'mark', '2024-12-16 04:03:49', 'customer'),
(114, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'aramos', '2024-12-16 04:03:58', 'admin'),
(115, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'asdasdad', '2024-12-16 04:04:55', 'admin'),
(116, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'asdasdad', '2024-12-16 04:05:01', 'admin'),
(117, 'Lina, Mark Anthony ', 'admin', 'asdasdad', '2024-12-16 04:05:08', 'customer'),
(118, 'Lina, Mark Anthony ', 'admin', 'sadasdad', '2024-12-16 04:05:13', 'customer'),
(119, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'sadasd', '2024-12-16 04:06:11', 'admin'),
(120, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'sadasdas', '2024-12-16 04:06:20', 'admin'),
(121, 'Lina, Mark Anthony ', 'admin', 'admin to cus', '2024-12-16 04:06:37', 'customer'),
(122, 'Lina, Mark Anthony ', 'admin', 'mark to admin', '2024-12-16 04:06:53', 'customer'),
(123, 'Lina, Mark Anthony ', 'admin', 'mark to admin', '2024-12-16 04:10:02', 'customer'),
(124, 'Lina, Mark Anthony ', 'admin', 'mark to admin again', '2024-12-16 04:10:10', 'customer'),
(125, 'Lina, Mark Anthony ', 'admin', 'mark to admin', '2024-12-16 04:11:06', 'customer'),
(126, 'Lina, Mark Anthony ', 'admin', 'mta', '2024-12-16 04:11:29', 'customer'),
(127, 'Lina, Mark Anthony ', 'admin', 'mta', '2024-12-16 04:12:00', 'customer'),
(128, 'Lina, Mark Anthony ', 'admin', 'mta', '2024-12-16 04:12:19', 'customer'),
(129, 'Lina, Mark Anthony ', 'admin', 'mta', '2024-12-16 04:13:36', 'customer'),
(130, 'Lina, Mark Anthony ', 'admin', 'mta', '2024-12-16 04:13:47', 'customer'),
(131, 'Lina, Mark Anthony ', 'admin', 'again', '2024-12-16 04:13:51', 'customer'),
(132, 'Lina, Mark Anthony ', 'admin', 'asdasd', '2024-12-16 04:14:11', 'customer'),
(133, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'admin to mark', '2024-12-16 04:17:46', 'admin'),
(134, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'admin to mark', '2024-12-16 04:18:20', 'admin'),
(135, 'Lina, Mark Anthony ', 'admin', 'mark to admin', '2024-12-16 04:18:27', 'customer'),
(136, 'Lina, Mark Anthony ', 'admin', 'mark to admin', '2024-12-16 04:18:34', 'customer'),
(137, 'Lina, Mark Anthony ', 'admin', 'mark to admin', '2024-12-16 04:19:19', 'customer'),
(138, 'Lina, Mark Anthony ', 'admin', 'mark to admin 2', '2024-12-16 04:19:27', 'customer'),
(139, 'Lina, Mark Anthony ', 'admin', 'mark to admin 3', '2024-12-16 04:19:51', 'customer'),
(140, 'Lina, Mark Anthony ', 'admin', 'mta4', '2024-12-16 04:20:26', 'customer'),
(141, 'Lina, Mark Anthony ', 'admin', 'mta5', '2024-12-16 04:20:48', 'customer'),
(142, 'Lina, Mark Anthony ', 'admin', 'mta6', '2024-12-16 04:21:01', 'customer'),
(143, 'Lina, Mark Anthony ', 'admin', 'mta7', '2024-12-16 04:21:33', 'customer'),
(144, 'Lina, Mark Anthony ', 'admin', 'mta8', '2024-12-16 04:21:39', 'customer'),
(145, 'Lina, Mark Anthony ', 'admin', 'mta9', '2024-12-16 04:23:30', 'customer'),
(146, 'Lina, Mark Anthony ', 'admin', 'mta10', '2024-12-16 04:23:38', 'customer'),
(147, 'Lina, Mark Anthony ', 'admin', 'mta', '2024-12-16 04:25:20', 'customer'),
(148, 'Lina, Mark Anthony ', 'admin', 'asdasda', '2024-12-16 04:25:45', 'customer'),
(149, 'Lina, Mark Anthony ', 'admin', 'asdasdad', '2024-12-16 04:26:13', 'customer'),
(150, 'Lina, Mark Anthony ', 'admin', 'mark to admin', '2024-12-16 04:27:57', 'customer'),
(151, 'Lina, Mark Anthony ', 'admin', 'mark to admin', '2024-12-16 04:28:31', 'customer'),
(152, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'what', '2024-12-16 04:32:16', 'admin'),
(153, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'what', '2024-12-16 04:32:54', 'admin'),
(154, 'Lina, Mark Anthony ', 'admin', 'mta11', '2024-12-16 04:33:17', 'customer'),
(155, 'Lina, Mark Anthony ', 'admin', 'awaht', '2024-12-16 04:33:41', 'customer'),
(156, 'Lina, Mark Anthony ', 'admin', 'dsadasdasda', '2024-12-16 04:34:13', 'customer'),
(157, 'Lina, Mark Anthony ', 'admin', 'asdasda', '2024-12-16 04:34:32', 'customer'),
(158, 'Lina, Mark Anthony ', 'admin', 'adasdas', '2024-12-16 04:35:43', 'customer'),
(159, 'Lina, Mark Anthony ', 'admin', 'asdasdadsa', '2024-12-16 04:36:10', 'customer'),
(160, 'Lina, Mark Anthony ', 'admin', 'resrseds', '2024-12-16 04:37:39', 'customer'),
(161, 'Lina, Mark Anthony ', 'admin', 'sadasdas', '2024-12-16 04:37:43', 'customer'),
(162, 'Lina, Mark Anthony ', 'admin', 'what is this', '2024-12-16 04:41:05', 'customer'),
(163, 'Lina, Mark Anthony ', 'admin', 'test 1', '2024-12-16 04:41:52', 'customer'),
(164, 'Lina, Mark Anthony ', 'admin', 'test 2', '2024-12-16 04:42:05', 'customer'),
(165, 'Lina, Mark Anthony ', 'admin', 'test3', '2024-12-16 04:42:40', 'customer'),
(166, 'Lina, Mark Anthony ', 'admin', 'asdasd', '2024-12-16 04:43:09', 'customer'),
(167, 'Lina, Mark Anthony ', 'admin', 'was', '2024-12-16 04:43:19', 'customer'),
(168, 'Lina, Mark Anthony ', 'admin', 'asdasd', '2024-12-16 04:43:25', 'customer'),
(169, 'Lina, Mark Anthony ', 'admin', 'test1', '2024-12-16 04:47:11', 'customer'),
(170, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'tset2', '2024-12-16 04:47:21', 'admin'),
(171, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'test3', '2024-12-16 04:47:29', 'admin'),
(172, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'to mark', '2024-12-16 04:48:41', 'admin'),
(173, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'to ramos', '2024-12-16 04:49:12', 'admin'),
(174, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'to ramo', '2024-12-16 04:49:25', 'admin'),
(175, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'to mark', '2024-12-16 04:49:34', 'admin'),
(176, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'to mark1', '2024-12-16 04:49:55', 'admin'),
(177, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'to mark 2', '2024-12-16 04:50:13', 'admin'),
(178, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'to mark 2', '2024-12-16 04:50:47', 'admin'),
(179, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'to mark 3', '2024-12-16 04:51:08', 'admin'),
(180, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'to ramos', '2024-12-16 04:51:26', 'admin'),
(181, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'to mark 4', '2024-12-16 04:52:05', 'admin'),
(182, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'to mark 5', '2024-12-16 04:52:46', 'admin'),
(183, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'to mark 6', '2024-12-16 04:53:17', 'admin'),
(184, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'to mark 7', '2024-12-16 04:56:01', 'admin'),
(185, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'to mark 8', '2024-12-16 04:56:23', 'admin'),
(186, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'to mark 9', '2024-12-16 04:56:57', 'admin'),
(187, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'to ramos2', '2024-12-16 04:57:09', 'admin'),
(188, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'to ramos3', '2024-12-16 04:58:05', 'admin'),
(189, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'to mark 10', '2024-12-16 04:58:13', 'admin'),
(190, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'test', '2024-12-16 04:59:19', 'admin'),
(191, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'test2', '2024-12-16 04:59:27', 'admin'),
(192, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'test3', '2024-12-16 04:59:45', 'admin'),
(193, 'Lina, Mark Anthony ', 'admin', 'gagag', '2024-12-16 05:00:33', 'customer'),
(194, 'Lina, Mark Anthony ', 'admin', 'gagaaaa', '2024-12-16 05:00:39', 'customer'),
(195, 'Lina, Mark Anthony ', 'admin', 'tasdadad', '2024-12-16 05:01:44', 'customer'),
(196, 'Lina, Mark Anthony ', 'admin', 'asdasda', '2024-12-16 05:02:00', 'customer'),
(197, 'Lina, Mark Anthony ', 'admin', 'asdasdasdafmkfmekke', '2024-12-16 05:02:16', 'customer'),
(198, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'whatttt', '2024-12-16 05:03:04', 'admin'),
(199, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'whattt', '2024-12-16 05:03:45', 'admin'),
(200, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'dsadadasd', '2024-12-16 05:04:04', 'admin'),
(201, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'what', '2024-12-16 05:04:36', 'admin'),
(202, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'wut', '2024-12-16 05:04:48', 'admin'),
(203, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'wafsadad', '2024-12-16 05:05:26', 'admin'),
(204, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'asdasdasdasda', '2024-12-16 05:05:36', 'admin'),
(205, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'asdasdasdasd', '2024-12-16 05:08:17', 'admin'),
(206, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'please gumana ka', '2024-12-16 05:10:34', 'admin'),
(207, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'ugghh', '2024-12-16 05:11:27', 'admin'),
(208, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'esfafasdas', '2024-12-16 05:12:11', 'admin'),
(209, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'asdasd', '2024-12-16 05:15:52', 'admin'),
(210, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'sadasd', '2024-12-16 05:16:07', 'admin'),
(211, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'asdasd', '2024-12-16 05:16:28', 'admin'),
(212, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'whattt', '2024-12-16 05:17:07', 'admin'),
(213, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'asdasda', '2024-12-16 05:17:57', 'admin'),
(214, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 's', '2024-12-16 05:19:45', 'admin'),
(215, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'asdasdasd', '2024-12-16 05:21:29', 'admin'),
(216, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'what', '2024-12-16 05:23:14', 'admin'),
(217, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'bobo', '2024-12-16 05:23:49', 'admin'),
(218, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'sdasda', '2024-12-16 05:24:21', 'admin'),
(219, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'again', '2024-12-16 05:25:25', 'admin'),
(220, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'hi', '2024-12-16 05:27:07', 'admin'),
(221, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'sadasd', '2024-12-16 05:28:30', 'admin'),
(222, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'asdasdasd', '2024-12-16 05:29:06', 'admin'),
(223, 'CDO Foodsphere Ecart', 'Ramos, Nathaniel Patrick L.', 'asdasdasd', '2024-12-16 05:29:15', 'admin'),
(224, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'to mark', '2024-12-16 05:29:52', 'admin'),
(225, 'Ramos, Nathaniel Patrick L.', 'admin', 'ramos to admin', '2024-12-16 05:30:40', 'customer'),
(226, 'Ramos, Nathaniel Patrick L.', 'admin', 'ramos to admin', '2024-12-16 05:30:48', 'customer'),
(227, 'Ramos, Nathaniel Patrick L.', 'admin', 'ramos to admin', '2024-12-16 05:32:46', 'customer'),
(228, 'Ramos, Nathaniel Patrick L.', 'admin', 'ramos to admin 2', '2024-12-16 05:32:53', 'customer'),
(229, 'Ramos, Nathaniel Patrick L.', 'admin', 'ramos to admin 4', '2024-12-16 05:33:00', 'customer'),
(230, 'Ramos, Nathaniel Patrick L.', 'admin', 'ramos to admin 5', '2024-12-16 05:33:47', 'customer'),
(231, 'Ramos, Nathaniel Patrick L.', 'admin', 'reamos to 6', '2024-12-16 05:34:19', 'customer'),
(232, 'Ramos, Nathaniel Patrick L.', 'admin', 'ramos to admin', '2024-12-16 05:34:34', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `ID` int NOT NULL,
  `fldname` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fldemail` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fldpassword` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fldposition` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `fldaddress` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `authentication` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`ID`, `fldname`, `fldemail`, `fldpassword`, `fldposition`, `fldaddress`, `authentication`, `code`) VALUES
(2, 'CDO Foodsphere Ecart', 'cdofoodsphereecart@gmail.com', '123', 'admin', '01, barangay1, Lipa City, Batangas', 'True', '194265'),
(18, 'Lina, Mark Anthony', 'markanthonylina05@gmail.com', '123', 'customer', '1, Barangay Uno, Lipa City, Batangas', 'True', '556100'),
(19, 'Ramos, Nathaniel Patrick L.', 'irumaramos123@gmail.com', '123', 'customer', '1, Barangay Uno, Lipa City, Batangas', 'True', '835638');

-- --------------------------------------------------------

--
-- Table structure for table `tblallprod`
--

CREATE TABLE `tblallprod` (
  `prodname` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblallprod`
--

INSERT INTO `tblallprod` (`prodname`) VALUES
('Hotdog'),
('Young Pork Tocino'),
('Young Pork Tocino Fatless'),
('Young Pork Tocino Chili'),
('Cheesedog (Go Balls)'),
('CDO Karne Norte'),
('Ulam Burger Regular'),
('Ulam Burger Mini'),
('Young Pork Bacon'),
('Luncheon Meat');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `orderid` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cusname` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prodimage` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prodname` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `quan` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prodstatus` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`orderid`, `cusname`, `prodimage`, `prodname`, `quan`, `price`, `prodstatus`) VALUES
('6759355d0db2d', 'Lina, Mark Anthony ', '675012b2bc5ab.png', 'Young Pork Tocino', '4', '130', 'done'),
('67593c2c07aa7', 'Lina, Mark Anthony ', '6750188600193.png', 'Ulam Burger Mini', '5', '100', 'done'),
('67593c2c07aa7', 'Lina, Mark Anthony ', '67501730e5e3a.png', 'CDO Karne Norte', '4', '60', 'done'),
('67593c2c07aa7', 'Lina, Mark Anthony ', '675018274ca02.png', 'Ulam Burger Regular', '2', '300', 'done'),
('67593c45c32bf', 'Lina, Mark Anthony ', '6750195731312.png', 'Luncheon Meat', '2', '180', 'done'),
('67593c5b67e06', 'Lina, Mark Anthony ', '67501915907aa.png', 'Young Pork Bacon', '1', '180', 'done'),
('67593c5b67e06', 'Lina, Mark Anthony ', '6750143d7f3b9.png', 'Cheesedog (Go Balls)', '1', '140', 'done'),
('67593c624c949', 'Lina, Mark Anthony ', '6750195731312.png', 'Luncheon Meat', '2', '180', 'done'),
('67593c691871f', 'Lina, Mark Anthony ', '6750143d7f3b9.png', 'Cheesedog (Go Balls)', '4', '140', 'done'),
('67593c7446ed0', 'Lina, Mark Anthony ', '67501730e5e3a.png', 'CDO Karne Norte', '2', '60', 'done'),
('6759433418373', 'Lina, Mark Anthony ', '6750036a08490.png', 'Hotdog', '7', '20', 'done'),
('67594bf3573dd', 'Lina, Mark Anthony ', '6750036a08490.png', 'Hotdog', '1', '20', 'done'),
('67594bf3573dd', 'Lina, Mark Anthony ', '675012b2bc5ab.png', 'Young Pork Tocino', '1', '130', 'done'),
('67594bf3573dd', 'Lina, Mark Anthony ', '675013379102e.png', 'Young Pork Tocino Fatless', '2', '150', 'done'),
('67594bfe89e6f', 'Lina, Mark Anthony ', '675012b2bc5ab.png', 'Young Pork Tocino', '1', '130', 'done'),
('67594daa99d00', 'Lina, Mark Anthony ', '675012b2bc5ab.png', 'Young Pork Tocino', '1', '130', 'done'),
('67594e7c93a56', 'Lina, Mark Anthony ', '675012b2bc5ab.png', 'Young Pork Tocino', '1', '130', 'done'),
('67594f8ce2c04', 'Lina, Mark Anthony ', '675013379102e.png', 'Young Pork Tocino Fatless', '1', '150', 'done'),
('675952a5dc129', 'Lina, Mark Anthony ', '6750195731312.png', 'Luncheon Meat', '1', '180', 'done'),
('6759533c06bbe', 'Lina, Mark Anthony ', '675018274ca02.png', 'Ulam Burger Regular', '1', '300', 'done'),
('', 'Lina, Mark Anthony ', '675013379102e.png', 'Young Pork Tocino Fatless', '1', '150', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory`
--

CREATE TABLE `tblinventory` (
  `id` int NOT NULL,
  `flddate` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fldname` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fldquan` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `flddesc` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fldstatus` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblinventory`
--

INSERT INTO `tblinventory` (`id`, `flddate`, `fldname`, `fldquan`, `flddesc`, `fldstatus`) VALUES
(1, '2024-12-04', 'Hotdog', '20', 'Product Delivery', 'delivery'),
(2, '2024-12-04', 'Hotdog', '1', 'Expired', 'wastages'),
(3, '2024-12-04', 'Young Pork Tocino', '20', 'Product Delivery', 'delivery'),
(4, '2024-12-04', 'Young Pork Tocino Fatless', '30', 'Product Delivery', 'delivery'),
(5, '2024-12-04', 'Young Pork Tocino Chili', '20', 'Product Delivery', 'delivery'),
(6, '2024-12-04', 'Cheesedog (Go Balls)', '20', 'Product Delivery', 'delivery'),
(7, '2024-12-04', 'CDO Karne Norte', '30', 'Product Delivery', 'delivery'),
(8, '2024-12-04', 'Ulam Burger Regular', '20', 'Product Delivery', 'delivery'),
(9, '2024-12-04', 'Ulam Burger Mini', '20', 'Product Delivery', 'delivery'),
(10, '2024-12-04', 'Young Pork Bacon', '25', 'Product Delivery', 'delivery'),
(11, '2024-12-04', 'Luncheon Meat', '25', 'Product Delivery', 'delivery'),
(12, '2024-12-04', 'Hotdog', '1', 'Delivery', 'delivery'),
(13, '2024-12-04', 'Young Pork Tocino', '1', 'Import', 'delivery'),
(14, '2024-12-11', 'Hotdog', '20', 'From Mark', 'delivery'),
(15, '2024-12-11', 'Hotdog', '1', 'Outdated', 'wastages');

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `orderid` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `cusname` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `method` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`orderid`, `date`, `cusname`, `total`, `method`, `address`, `status`) VALUES
('6759355d0db2d', '2024-12-11', 'Lina, Mark Anthony ', '520', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Completed'),
('67593c2c07aa7', '2024-12-11', 'Lina, Mark Anthony ', '1340', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Shipping'),
('67593c45c32bf', '2024-12-11', 'Lina, Mark Anthony ', '360', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Completed'),
('67593c5b67e06', '2024-12-11', 'Lina, Mark Anthony ', '320', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Shipping'),
('67593c624c949', '2024-12-11', 'Lina, Mark Anthony ', '360', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Completed'),
('67593c691871f', '2024-12-11', 'Lina, Mark Anthony ', '560', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Shipping'),
('67593c7446ed0', '2024-12-11', 'Lina, Mark Anthony ', '120', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Processing'),
('6759433418373', '2024-12-11', 'Lina, Mark Anthony ', '140', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Processing'),
('67594bf3573dd', '2024-12-11', 'Lina, Mark Anthony ', '450', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Processing'),
('67594bfe89e6f', '2024-12-11', 'Lina, Mark Anthony ', '130', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Processing'),
('67594f8ce2c04', '2024-12-11', 'Lina, Mark Anthony ', '150', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Shipping'),
('6759533c06bbe', '2024-12-11', 'Lina, Mark Anthony ', '300', '6759533c06809.png', '1, Barangay Uno, Lipa City, Batangas', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `prodid` int NOT NULL,
  `prodname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prodprice` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `prodimage` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `proddesc` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prodquantity` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`prodid`, `prodname`, `prodprice`, `prodimage`, `proddesc`, `prodquantity`) VALUES
(1, 'Hotdog', '20', '6750036a08490.png', 'A hot dog is a dish consisting of a grilled, steamed, or boiled sausage served in the slit of a partially sliced bun. The term hot dog can refer to the sausage itself. The sausage used is a wiener (Vi', '31'),
(2, 'Young Pork Tocino', '130', '675012b2bc5ab.png', 'What makes CDO Funtastyk Tocino deliciously special? It’s made from 100% YOUNG PORK making it deliciously tender with the balanced taste of sweet and salty flavors. That’s why there’s no need to boil,', '13'),
(3, 'Young Pork Tocino Fatless', '150', '675013379102e.png', 'What makes CDO Funtastyk Tocino deliciously special? It’s made from 100% YOUNG PORK making it deliciously tender with the balanced taste of sweet and salty flavors. That’s why there’s no need to boil,', '27'),
(4, 'Young Pork Tocino Chili', '140', '6750139ed35ec.png', 'What makes CDO Funtastyk Tocino deliciously special? It’s made from 100% YOUNG PORK making it deliciously tender with the balanced taste of sweet and salty flavors. That’s why there’s no need to boil,', '20'),
(5, 'Cheesedog (Go Balls)', '140', '6750143d7f3b9.png', 'CDO Idol Cheesedog has the perfect blend of hotdog and delightfully creamy cheese bits in every bite.  Allergen Information: Contains Milk, Soya, and Wheat. May contain traces of Egg', '15'),
(6, 'CDO Karne Norte', '60', '67501730e5e3a.png', 'CDO Karne Norte is a Filipino-style corned beef with a delicious beefy guisado taste. Its fine beef strands and flavorful beef juice make it a family favorite. Whether you\'re cooking a quick meal or adding extra flavor to your dishes, CDO Karne Norte is the perfect kitchen partner. Try it in torta, lumpia, and sopas for a hearty, beefy twist! <br><br> Allergen Information: Contains Soy, Cereals and Milk', '24'),
(7, 'Ulam Burger Regular', '300', '675018274ca02.png', 'It\'s a delicious burger with strong beefy aroma that is best topped on rice. In addition to its satisfying flavor and appetizing aroma, CDO Ulam Burger is a great source of protein to give the kids the energy they need to start the day. <br><br> Allergen Information:  Contains Egg, Soya, and Wheat. May contain traces of Celery, Milk, Sesame.', '17'),
(8, 'Ulam Burger Mini', '100', '6750188600193.png', 'It\'s a delicious burger with strong beefy aroma that is best topped on rice. In addition to its satisfying flavor and appetizing aroma, CDO Ulam Burger is a great source of protein to give the kids the energy they need to start the day. <br><br> Allergen Information:  Contains Egg, Soya, and Wheat. May contain traces of Celery, Milk, Sesame.', '15'),
(9, 'Young Pork Bacon', '180', '67501915907aa.png', 'CDO Young Pork Bacon Smoked is the perfect all-around bacon, versatile for any dish. With its smoky flavor, it is suitably delightful with any flavor pairing at home.<br> <br> Allergen Information: May contain traces of Milk, Soya and Wheat', '24'),
(10, 'Luncheon Meat', '180', '6750195731312.png', '<p class=\"detail_desc\">CDO Chinese Style Luncheon Meat is a meaty and flavorful luncheon meat delightfully seasoned with unique blend of spices.<br> <br> Allergen information: Contains Soy</p>', '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblinventory`
--
ALTER TABLE `tblinventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`prodid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblinventory`
--
ALTER TABLE `tblinventory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `prodid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
