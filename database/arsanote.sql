-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 05:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsanote`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `id_card` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `id_card`, `id_user`, `message`, `created`, `updated`, `deleted`, `is_active`) VALUES
(1, 6, 2, 'Tes Pesan Activity', '2023-12-26 17:02:22', NULL, '2023-12-26 23:26:24', 1),
(2, 6, 1, 'Tes Input Activity542', '2023-12-26 23:22:24', '2023-12-26 23:45:22', NULL, 1),
(3, 6, 1, 'Tes Input Activitiessssss', '2023-12-26 23:45:45', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `activity_reply`
--

CREATE TABLE `activity_reply` (
  `id` int(11) NOT NULL,
  `id_activity` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` int(11) NOT NULL,
  `id_workspace` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `uniqueId` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `id_workspace`, `name`, `thumbnail`, `uniqueId`, `created`, `created_by`, `updated`, `updated_by`, `deleted`, `deleted_by`, `is_active`) VALUES
(1, 1, 'Board 1', 'Board1.jpeg', '2023-12-23 13:18:321311', '2023-12-07 08:26:23', 1, NULL, NULL, '2023-12-26 12:55:51', NULL, 1),
(2, 1, 'Board 2', 'Board2.jpeg', '2023-12-23 13:19:12131', '2023-12-13 13:52:32', 1, NULL, NULL, '2023-12-26 12:56:52', NULL, 1),
(3, 1, 'Board 3 tes', 'thumbnail_Board_3.jpeg', '2023-12-23 13:20:182123', '2023-12-13 14:01:25', 1, '2023-12-27 11:10:03', 1, '2023-12-26 13:14:17', NULL, 1),
(4, 1, 'Board 4', 'thumbnail_Board_4.jpeg', '2023-12-23 13:21:182319', '2023-12-13 14:01:44', 1, NULL, NULL, '2023-12-26 13:14:20', NULL, 1),
(5, 1, 'Board 5', 'thumbnail_Board_51.jpg', '2023-12-23 13:26:186809', '2023-12-23 13:26:18', 1, '2023-12-26 13:57:59', 1, NULL, NULL, 1),
(6, 1, 'Board 6', 'thumbnail_Board_6.png', '2023-12-23 13:32:116755', '2023-12-23 13:32:11', 1, NULL, NULL, NULL, NULL, 1),
(7, 1, 'Board 7', 'thumbnail_Board_7.jpeg', '2023-12-23 13:33:248549', '2023-12-23 13:33:24', 1, NULL, NULL, NULL, NULL, 1),
(8, 1, 'Tes', 'thumbnail_Tes.jpg', '2023-12-26 13:55:394709', '2023-12-26 13:55:39', 1, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `board_access`
--

CREATE TABLE `board_access` (
  `id` int(11) NOT NULL,
  `uniqueId_board` varchar(50) NOT NULL,
  `division` varchar(200) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `board_access`
--

INSERT INTO `board_access` (`id`, `uniqueId_board`, `division`, `created`, `updated`, `deleted`, `is_active`) VALUES
(1, '1', 'IT', '2023-12-23 05:54:24', NULL, NULL, 1),
(2, '2023-12-23 13:26:186809', 'SEKRETARIS', '2023-12-23 06:26:18', NULL, '2023-12-26 06:43:14', 0),
(3, '2023-12-23 13:26:186809', 'PIJAR', '2023-12-23 06:26:18', NULL, '2023-12-26 06:43:14', 0),
(4, '2023-12-23 13:26:186809', 'MEDIA', '2023-12-23 06:26:18', NULL, '2023-12-26 06:43:14', 0),
(5, '2023-12-23 13:32:116755', 'SEKRETARIS', '2023-12-23 06:32:11', NULL, NULL, 1),
(6, '2023-12-23 13:32:116755', 'LITERASI', '2023-12-23 06:32:11', NULL, NULL, 1),
(7, '2023-12-23 13:33:248549', 'IT', '2023-12-23 06:33:24', NULL, NULL, 1),
(8, '2023-12-23 13:33:248549', 'SUPPORT', '2023-12-23 06:33:24', NULL, NULL, 1),
(9, '2023-12-26 13:55:394709', 'SEKRETARIS', '2023-12-26 06:55:39', NULL, NULL, 1),
(10, '2023-12-26 13:55:394709', 'PIJAR', '2023-12-26 06:55:39', NULL, NULL, 1),
(11, '2023-12-26 13:55:394709', 'MEDIA', '2023-12-26 06:55:39', NULL, NULL, 1),
(12, '2023-12-23 13:26:186809', 'SEKRETARIS', '2023-12-26 06:56:59', NULL, '2023-12-26 06:57:59', 0),
(13, '2023-12-23 13:26:186809', 'PIJAR', '2023-12-26 06:56:59', NULL, '2023-12-26 06:57:59', 0),
(14, '2023-12-23 13:26:186809', 'MEDIA', '2023-12-26 06:56:59', NULL, '2023-12-26 06:57:59', 0),
(15, '2023-12-23 13:26:186809', 'SEKRETARIS', '2023-12-26 06:57:59', NULL, NULL, 1),
(16, '2023-12-23 13:26:186809', 'PIJAR', '2023-12-26 06:57:59', NULL, NULL, 1),
(17, '2023-12-23 13:26:186809', 'MEDIA', '2023-12-26 06:57:59', NULL, NULL, 1),
(18, '2023-12-23 13:20:182123', 'SEKRETARIS', '2023-12-27 04:10:03', NULL, NULL, 1),
(19, '2023-12-23 13:20:182123', 'PIJAR', '2023-12-27 04:10:03', NULL, NULL, 1),
(20, '2023-12-23 13:20:182123', 'MEDIA', '2023-12-27 04:10:03', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `id_list` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `label_name` varchar(200) DEFAULT NULL,
  `label_color` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `link_drive` varchar(200) DEFAULT NULL,
  `cover` varchar(200) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `id_list`, `name`, `description`, `label_name`, `label_color`, `date`, `link_drive`, `cover`, `position`, `created`, `created_by`, `updated`, `updated_by`, `deleted`, `deleted_by`, `is_active`) VALUES
(1, 1, 'Card 1', 'Apa Aja yang penting Card', 'Tes', '000', NULL, '', '', 0, '2023-12-04 05:26:38', 1, NULL, NULL, NULL, NULL, 1),
(2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eu ipsum turpis. Cras et eros eu diam consequat sollicitudin. Praesent rhoncus libero', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-12-05 13:47:29', 1, NULL, NULL, NULL, NULL, 1),
(3, 1, 'Card 2', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-12-05 13:47:34', 1, NULL, NULL, NULL, NULL, 1),
(4, 1, 'Card 3', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-12-05 13:48:08', 1, NULL, NULL, NULL, NULL, 1),
(5, 1, 'Card 4', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-12-05 13:48:24', 1, NULL, NULL, NULL, NULL, 1),
(6, 2, 'Card 5', '123', NULL, NULL, '2023-12-19', NULL, NULL, 0, '2023-12-05 13:52:26', 1, '2023-12-15 15:55:48', NULL, NULL, NULL, 1),
(7, 3, 'Card 6', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-12-05 13:52:44', 1, NULL, NULL, NULL, NULL, 1),
(8, 2, 'Card 7', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-12-05 13:53:58', 1, NULL, NULL, NULL, NULL, 1),
(9, 2, 'Card 8', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-12-05 13:54:03', 1, NULL, NULL, NULL, NULL, 1),
(10, 3, 'Card 9', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-12-05 13:57:57', 1, NULL, NULL, NULL, NULL, 1),
(11, 6, 'Card 10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-12-06 10:24:58', 1, NULL, NULL, NULL, NULL, 1),
(12, 2, 'Card 11', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-12-06 10:25:59', 1, NULL, NULL, NULL, NULL, 1),
(13, 1, 'Card 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-07 15:02:05', 1, NULL, NULL, NULL, NULL, 1),
(14, 7, 'sada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-13 14:09:23', 1, NULL, NULL, NULL, NULL, 1),
(15, 7, 'asda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-13 14:09:27', 1, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `id` int(11) NOT NULL,
  `id_card` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `note` text NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`id`, `id_card`, `name`, `note`, `status`, `created`, `created_by`, `updated`, `updated_by`, `deleted`, `deleted_by`, `is_active`) VALUES
(1, 6, 'Tes Name Checklist 1', 'Tes Note Checklist 1', NULL, '2023-12-15 09:42:24', 0, NULL, NULL, NULL, NULL, 0),
(2, 6, 'Tugas Untuk Dimas', 'YEAY BISA INPUT', 0, '2023-12-15 09:42:24', 1, '2023-12-26 23:45:33', 1, '2023-12-26 23:25:39', 1, 1),
(3, 6, 'tes123', '', 1, '2023-12-15 15:50:35', NULL, '2023-12-26 23:59:18', 1, NULL, NULL, 1),
(4, 6, 'anjay', '', NULL, '2023-12-26 13:59:02', NULL, NULL, NULL, '2023-12-26 14:32:10', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `checklist_item`
--

CREATE TABLE `checklist_item` (
  `id` int(11) NOT NULL,
  `id_checklist` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `position` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `name`, `created`, `updated`, `deleted`, `is_active`) VALUES
(1, 'GM', '2023-12-18 13:13:35', NULL, NULL, 1),
(2, 'OM', '2023-12-18 13:13:35', NULL, NULL, 1),
(3, 'SEKRETARIS', '2023-12-18 13:13:35', NULL, NULL, 1),
(4, 'PIJAR', '2023-12-18 13:13:35', NULL, NULL, 1),
(5, 'MEDIA', '2023-12-18 13:13:35', NULL, NULL, 1),
(6, 'LITERASI', '2023-12-18 13:13:35', NULL, NULL, 1),
(7, 'MARCOM', '2023-12-18 13:13:35', NULL, NULL, 1),
(8, 'IT', '2023-12-18 13:13:35', NULL, NULL, 1),
(9, 'SUPPORT', '2023-12-18 13:13:35', NULL, NULL, 1),
(10, 'SPONSOR', '2023-12-18 13:13:35', NULL, NULL, 1),
(11, 'KOMUNITAS', '2023-12-18 13:13:35', NULL, NULL, 1),
(12, 'LAINNYA', '2023-12-18 13:13:35', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE `label` (
  `id` int(11) NOT NULL,
  `id_card` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `color` varchar(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `label`
--

INSERT INTO `label` (`id`, `id_card`, `name`, `color`, `created`, `updated`, `deleted`, `is_active`) VALUES
(1, 6, 'Label 1', '#9d28ae', NULL, '2023-12-27 00:16:14', NULL, 1),
(2, 6, 'Label 2', '#4dc1ce', NULL, '2023-12-27 00:15:57', NULL, 1),
(3, 6, 'qwe', '#e66465', '2023-12-15 15:29:34', NULL, NULL, 1),
(4, 6, 'tes', '#cf7a7a', '2023-12-15 16:01:21', NULL, NULL, 1),
(5, 11, 'tes', '#db6f72', '2023-12-26 23:51:38', NULL, NULL, 1),
(6, 11, 'tes123', '#dc2121', '2023-12-27 00:03:37', NULL, NULL, 1),
(7, 11, 'tes123', '#dc2121', '2023-12-27 00:03:43', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `id_board` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `position` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `id_board`, `name`, `position`, `created`, `created_by`, `updated`, `updated_by`, `deleted`, `deleted_by`, `is_active`) VALUES
(1, 1, 'List 1', 1, '2023-12-04 05:18:21', 1, NULL, NULL, NULL, NULL, 1),
(2, 1, 'List 2', 0, '2023-12-04 15:45:39', 1, NULL, NULL, NULL, NULL, 1),
(3, 1, 'List 3', 2, '2023-12-04 15:46:49', 1, NULL, NULL, NULL, NULL, 1),
(4, 1, 'List 4', 3, '2023-12-04 15:47:29', 1, NULL, NULL, '2023-12-13 14:00:31', 1, 0),
(5, 1, 'List 5', 4, '2023-12-05 13:55:22', 1, NULL, NULL, '2023-12-14 10:06:54', 1, 0),
(6, 1, 'adada', 0, '2023-12-13 14:01:50', 1, NULL, NULL, NULL, NULL, 1),
(7, 4, 'List 1', 0, '2023-12-13 14:05:11', 1, NULL, NULL, NULL, NULL, 1),
(8, 4, 'list 2', 0, '2023-12-13 14:05:23', 1, NULL, NULL, NULL, NULL, 1),
(9, 4, 'ada', 0, '2023-12-13 14:07:41', 1, NULL, NULL, NULL, NULL, 1),
(10, 4, 'adsa', 0, '2023-12-13 14:09:03', 1, NULL, NULL, NULL, NULL, 1),
(11, 1, 'tes', 0, '2023-12-26 18:43:50', 1, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recently_board`
--

CREATE TABLE `recently_board` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_board` int(11) NOT NULL,
  `open_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recently_board`
--

INSERT INTO `recently_board` (`id`, `id_user`, `id_board`, `open_time`) VALUES
(1, 1, 1, '2023-12-07 08:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `recently_workspace`
--

CREATE TABLE `recently_workspace` (
  `id` int(11) NOT NULL,
  `id_workspace` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `open_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recently_workspace`
--

INSERT INTO `recently_workspace` (`id`, `id_workspace`, `id_user`, `open_time`) VALUES
(1, 1, 1, '2023-12-27 11:10:07'),
(2, 2, 1, '2023-12-26 22:32:14'),
(3, 0, 1, '2023-12-27 11:10:08'),
(4, 2, 8, '2023-12-26 15:01:34'),
(5, 0, 8, '2023-12-26 15:06:27'),
(6, 1, 8, '2023-12-26 15:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `division` varchar(50) NOT NULL,
  `id_division` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `division`, `id_division`, `created`, `updated`, `deleted`, `is_active`) VALUES
(1, 'Sir Gatut Mukti Wirawan', 'sirgm@gmail.com', '$2y$10$X1UHk4TthL7QXgtmUFl0Ve.ttp57u.kuJH42FZLirypbPtnqyWaOC', 'GM', NULL, NULL, NULL, NULL, 1),
(2, 'Madam Nurhasanah Shihab', 'madamom@gmail.com', '$2y$10$R87FM8B9MI7tVQPp9/H8TO2N/fpacatTR6LlMuDzhks904eQaatoa', 'OM', NULL, NULL, NULL, NULL, 1),
(3, 'Lady Secretary', 'sekretaris@gmail.com', '$2y$10$ZjfndVGmn6XWuXuloXReqOj/Ykj6bpUFp6lkAvSPRH0vxgM2o9Qxa', 'SEKRETARIS', NULL, NULL, NULL, NULL, 1),
(4, 'Pijar People', 'pijar@gmail.com', '$2y$10$7pKLupdiREQbJghO.io2c.K5jAwKEm4WYRbm49Nz9WdjtUPPIpzIS', 'PIJAR', NULL, NULL, NULL, NULL, 1),
(5, 'Media People', 'media@gmail.com', '$2y$10$5zdtf0G/rWmYXn7iQ9Z4muQsZOOwh7Q7qaWMaNk50nkWJKVT5AZkC', 'MEDIA', NULL, NULL, NULL, NULL, 1),
(6, 'Literasi People', 'literasi@gmail.com', '$2y$10$DOxZ6F7n3e/IpbyqKrHv..npU41Wl6U4HB6x76oiIcyiiGZH/.yXS', 'LITERASI', NULL, NULL, NULL, NULL, 1),
(7, 'Marcom People', 'marcom@gmail.com', '$2y$10$A6wqXCv5lCxxGads1MBezOZvVM1CXtvZj0lyiIJWQBQ5ScrfQOdEG', 'MARCOM', NULL, NULL, NULL, NULL, 1),
(8, 'IT BOYS', 'itboys@gmail.com', '$2y$10$xiLYlxGp1mJZpeIpzEOC2exl7cyleDjq106sinfdBPvFWlR.zzQvu', 'IT', 8, NULL, NULL, NULL, 1),
(9, 'Team Support', 'support@gmail.com', '$2y$10$LmDtmAW2GibiHBfNxTsmmO0mQFdijtFIqA9z2WkBsmVN9RigrA8Qq', 'SUPPORT', NULL, NULL, NULL, NULL, 1),
(10, 'Sponsor\'s', 'sponsor@gmail.com', '$2y$10$iNUkLvlDcagODkE6JoyJi./LzOlZ2XSqCZPnZhrTdZR8hBQzTr/tK', 'SPONSOR', NULL, NULL, NULL, NULL, 1),
(11, 'Komunitas', 'komunitas@gmail.com', '$2y$10$23l/oOgdgtRH.hV4IKh/LeuqfQYEO6bVHdKZOHvCJYelaAKpGqqo2', 'KOMUNITAS', NULL, NULL, NULL, NULL, 1),
(12, 'Other', 'lainnya@gmail.com', '$2y$10$h3KgSkNjRq2jEeGGoArh0OUwsKNUCAoXzFc2mrfADxQu4ESXPvsQ6', 'LAINNYA', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `workspace`
--

CREATE TABLE `workspace` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `thumbnail` varchar(200) DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workspace`
--

INSERT INTO `workspace` (`id`, `title`, `thumbnail`, `created`, `created_by`, `updated`, `updated_by`, `deleted`, `deleted_by`, `is_active`) VALUES
(1, 'Workspace 1', 'tes123.png', '2023-12-07 08:35:57', 1, NULL, NULL, NULL, NULL, 1),
(2, 'tes123', 'thumbnail_tes1232.jpeg', '2023-12-15 16:05:54', 1, NULL, NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_reply`
--
ALTER TABLE `activity_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board_access`
--
ALTER TABLE `board_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist_item`
--
ALTER TABLE `checklist_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `label`
--
ALTER TABLE `label`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recently_board`
--
ALTER TABLE `recently_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recently_workspace`
--
ALTER TABLE `recently_workspace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workspace`
--
ALTER TABLE `workspace`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `activity_reply`
--
ALTER TABLE `activity_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `board_access`
--
ALTER TABLE `board_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `checklist_item`
--
ALTER TABLE `checklist_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `label`
--
ALTER TABLE `label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `recently_board`
--
ALTER TABLE `recently_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recently_workspace`
--
ALTER TABLE `recently_workspace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `workspace`
--
ALTER TABLE `workspace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
