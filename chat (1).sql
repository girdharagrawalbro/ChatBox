-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 05:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `isread` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `recipient_id`, `message`, `isread`, `status`, `sent_at`) VALUES
(1, 1, 2, 'hii ', 1, 0, '2024-04-29 17:42:54'),
(2, 2, 1, 'hw', 1, 0, '2024-04-29 17:42:54'),
(6, 2, 1, 'hellow', 1, 0, '2024-04-30 06:56:26'),
(7, 2, 1, 'kkrh', 1, 0, '2024-04-30 06:57:48'),
(8, 2, 1, 'kaha jaa rahi', 1, 0, '2024-04-30 07:06:13'),
(9, 1, 2, 'kahi ni', 1, 0, '2024-04-30 07:07:11'),
(25, 2, 1, 'uu', 1, 0, '2024-04-30 12:44:43'),
(26, 1, 2, 'jii', 1, 0, '2024-04-30 13:06:55'),
(31, 1, 2, 'hellow ', 1, 0, '2024-05-02 06:19:45'),
(32, 1, 2, 'hellow ', 1, 0, '2024-05-02 06:19:49'),
(33, 1, 2, 'helloe', 1, 0, '2024-05-02 06:19:55'),
(34, 1, 2, 'sun na ', 1, 0, '2024-05-02 06:21:39'),
(35, 1, 2, 'sun na ', 1, 0, '2024-05-02 06:21:45'),
(36, 1, 2, 'sun na ', 1, 0, '2024-05-02 06:23:14'),
(37, 1, 2, 'hellow ', 1, 0, '2024-05-02 06:24:43'),
(38, 1, 2, 'hellow ', 1, 0, '2024-05-02 06:25:00'),
(39, 1, 2, 'hellow ', 1, 0, '2024-05-02 06:25:03'),
(40, 1, 2, 'hellow ', 1, 0, '2024-05-02 06:25:43'),
(41, 2, 1, 'hii', 1, 0, '2024-05-02 06:28:31'),
(42, 2, 1, 'hii', 1, 0, '2024-05-02 06:28:39'),
(43, 2, 1, 'hii', 1, 0, '2024-05-02 06:30:08'),
(44, 2, 1, 'baby', 1, 0, '2024-05-02 06:55:33'),
(45, 2, 1, 'baby', 1, 0, '2024-05-02 06:55:40'),
(46, 2, 1, 'baby', 1, 0, '2024-05-02 06:55:54'),
(47, 2, 3, 'hii', 0, 0, '2024-05-03 10:39:04'),
(48, 2, 3, 'hii', 0, 0, '2024-05-03 10:39:08'),
(49, 2, 3, 'hii', 0, 0, '2024-05-03 10:40:04'),
(50, 2, 3, 'hellw', 0, 0, '2024-05-03 16:24:33'),
(51, 2, 3, 'hhhhh', 0, 0, '2024-05-03 16:24:57'),
(52, 2, 3, 'hhhhh', 0, 0, '2024-05-03 16:25:01'),
(53, 2, 3, 'hhhhh', 0, 0, '2024-05-03 16:25:51'),
(54, 2, 3, 'hhhhh', 0, 0, '2024-05-03 16:25:53'),
(55, 2, 3, 'hhhhh', 0, 0, '2024-05-03 16:25:54'),
(56, 2, 3, 'hhhhh', 0, 0, '2024-05-03 16:25:56'),
(57, 2, 3, 'hellw', 0, 0, '2024-05-03 16:26:22'),
(58, 2, 3, 'huuu', 0, 0, '2024-05-03 16:26:29'),
(59, 2, 1, 'sun na ', 1, 0, '2024-05-04 01:57:34'),
(60, 2, 1, 'vvc', 1, 0, '2024-05-04 02:22:37'),
(61, 2, 1, 'vvvv', 1, 0, '2024-05-04 03:02:47'),
(62, 2, 1, 'vvvv', 1, 0, '2024-05-04 03:02:50'),
(63, 2, 1, 'sun na ', 1, 0, '2024-05-04 03:14:26'),
(64, 2, 1, 'sun na ', 1, 0, '2024-05-04 03:14:49'),
(65, 2, 1, 'vvc', 1, 0, '2024-05-04 03:17:36'),
(66, 2, 1, 'vvc', 1, 0, '2024-05-04 03:17:38'),
(67, 2, 1, 'vvc', 1, 0, '2024-05-04 03:17:38'),
(68, 2, 1, 'vvc', 1, 0, '2024-05-04 03:17:38'),
(69, 2, 1, 'vvc', 1, 0, '2024-05-04 03:17:38'),
(70, 2, 1, 'kaha jaa rahi', 1, 0, '2024-05-04 03:20:57'),
(71, 2, 1, 'kaha jaa rahi', 1, 0, '2024-05-04 03:20:59'),
(72, 2, 1, 'kaha jaa rahi', 1, 0, '2024-05-04 03:20:59'),
(73, 2, 1, 'kaha jaa rahi', 1, 0, '2024-05-04 03:21:00'),
(74, 2, 1, 'vvc', 1, 0, '2024-05-04 03:21:42'),
(75, 2, 1, '  nhb', 1, 0, '2024-05-04 03:21:55'),
(76, 2, 3, 'hii', 0, 0, '2024-05-04 03:23:59'),
(77, 1, 2, 'kaha jaa rahi', 1, 0, '2024-05-04 09:47:33'),
(78, 1, 2, 'e', 1, 0, '2024-05-04 09:47:38'),
(79, 1, 2, 'sun na ', 1, 0, '2024-05-04 10:44:00'),
(80, 2, 3, 'ggg', 0, 0, '2024-05-04 11:13:26'),
(81, 2, 3, 'kaha jaa rahi', 0, 0, '2024-05-04 11:30:34'),
(82, 2, 3, 'kaha jaa rahi', 0, 0, '2024-05-04 11:30:36'),
(83, 2, 3, 'kaha jaa rahi', 0, 0, '2024-05-04 11:30:36'),
(84, 2, 3, 'hii', 0, 0, '2024-05-04 11:38:54'),
(85, 2, 3, 'sun na ', 0, 0, '2024-05-04 11:43:10'),
(86, 2, 3, 'kaha jaa rahi', 0, 0, '2024-05-04 11:46:29'),
(87, 2, 3, 'hey there', 0, 0, '2024-05-04 11:50:18'),
(88, 2, 3, 'eee', 0, 0, '2024-05-04 11:51:20'),
(89, 2, 3, 'eee', 0, 0, '2024-05-04 11:51:23'),
(90, 2, 1, 'vvc', 1, 0, '2024-05-04 11:52:48'),
(91, 2, 1, 'kaha jaa rahi', 1, 0, '2024-05-04 11:54:36'),
(92, 2, 1, 'kaha jaa rahi', 1, 0, '2024-05-04 11:54:38'),
(93, 2, 1, 'kaha jaa rahi', 1, 0, '2024-05-04 11:54:38'),
(94, 2, 1, 'kaha jaa rahi', 1, 0, '2024-05-04 11:54:38'),
(95, 2, 1, 'vvc', 1, 0, '2024-05-04 11:58:46'),
(96, 2, 1, 'hii', 1, 0, '2024-05-04 12:14:11'),
(97, 2, 1, 'hey there', 1, 0, '2024-05-04 12:14:35'),
(98, 2, 1, 'kaha jaa rahi', 1, 0, '2024-05-04 12:17:33'),
(99, 2, 1, 'hii', 1, 0, '2024-05-04 12:25:19'),
(100, 2, 1, 'huu', 1, 0, '2024-05-04 12:29:26'),
(101, 1, 2, 'hii', 1, 0, '2024-05-04 12:32:16'),
(102, 2, 1, 'gggg', 1, 0, '2024-05-04 12:34:01'),
(103, 1, 2, 'baby', 1, 0, '2024-05-04 14:43:38'),
(104, 1, 2, 'hii', 1, 0, '2024-05-04 14:48:09'),
(105, 1, 2, 'bbb', 1, 0, '2024-05-04 14:49:05'),
(106, 2, 1, 'hii', 1, 0, '2024-05-04 14:54:52'),
(107, 2, 1, 'hii', 1, 0, '2024-05-04 14:58:50'),
(108, 1, 2, 'hii', 1, 0, '2024-05-04 15:00:37'),
(109, 2, 1, 'hii', 1, 0, '2024-05-04 15:02:43'),
(110, 1, 2, 'bbb', 1, 0, '2024-05-04 15:03:03'),
(111, 1, 2, 'jiii', 1, 0, '2024-05-04 15:03:28'),
(112, 1, 2, 'bbbb', 1, 0, '2024-05-04 15:07:09'),
(113, 1, 2, 'bbb', 1, 0, '2024-05-04 15:07:21'),
(114, 1, 2, 'jiii', 1, 0, '2024-05-04 15:07:36'),
(115, 1, 2, 'hhhh', 1, 0, '2024-05-04 15:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_type` enum('text','image','video') DEFAULT NULL,
  `status_content` varchar(255) DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `profile_pic`, `password`, `dt`) VALUES
(1, 'Girdhar Agrawal', 'girdharagrawalbro@gmail.com', 'girdhar.jpg', 'Gir@123', '2024-04-29 21:22:12'),
(2, 'Harshita', 'harshita', 'hs.jpg', 'harshita', '2024-04-29 22:39:16'),
(3, 'Jharna ', 'jharna', '', 'jharna', '2024-05-03 14:31:00'),
(4, 'Yash Giri Goshwami', 'yash', '', 'yash', '2024-05-03 14:31:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `recipient_id` (`recipient_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
