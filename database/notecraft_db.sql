-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: sdb-61.hosting.stackcp.net
-- Generation Time: Aug 06, 2025 at 11:58 AM
-- Server version: 10.6.18-MariaDB-log
-- PHP Version: 8.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notecraft_db-353032377203`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `title`, `description`, `created_at`) VALUES
(1, 12, 'Weekly Workout Plan', 'Include push-ups, squats, and evening runs to improve strength and stay fit all week.', '2025-08-06 11:57:39'),
(2, 12, 'Client Feedback Summary', 'Summarize the latest client feedback and prepare action points for improvements.', '2025-08-06 11:57:39'),
(3, 12, 'Daily Study Plan', 'Allocate 2 hours coding, 1 hour reading, and 30 minutes for problem-solving daily.', '2025-08-06 11:57:39'),
(4, 12, 'Office Task Reminder', 'Complete assigned tasks, review reports, and prepare for tomorrow\'s meeting.', '2025-08-06 11:57:39'),
(5, 12, 'Project Deadline Checklist', 'Check milestones, review progress, and finalize all pending tasks before delivery.', '2025-08-06 11:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(56) NOT NULL,
  `email` varchar(56) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `gender`, `password`, `role`, `status`, `created_at`) VALUES
(12, 'Test User 1', 'testuser1@notecraft.com', 'male', '$2y$10$/VKNrXtfsn1a/yPzJgrsd.4fSYLrkd344MInrihg3zRC9o6pCB5qy', 'user', 'active', '2025-08-06 11:11:29'),
(13, 'Test User 2', 'testuser2@notecraft.com', 'male', '$2y$10$Y3N0TdDMxZe3KCl5qzSEpOlKN2CeU3AmRv/2k.cwNXugmUyHCmGJ2', 'user', 'active', '2025-08-06 11:12:11'),
(14, 'Test User 3', 'testuser3@notecraft.com', 'male', '$2y$10$g5FVhv5mryfj.H5B13QXk.TJHZlEnQXhuia/p1xC4p2ZFC63h3xQK', 'user', 'blocked', '2025-08-06 11:12:42'),
(15, 'Test User 4', 'testuser4@notecraft.com', 'male', '$2y$10$Jqa6NwuSG0We5manBgyr5eY2JmzaANp.95R/aIM1pILzlYyy1mWxK', 'user', 'active', '2025-08-06 11:13:34'),
(10, 'Hazrat Bilal', 'admin@notecraft.com', 'male', '$2y$10$ZuPz9dSd9dV7gR1pN3iqsefIH.1vtgd1IiCCCHS8C8fx/Ylj.56gS', 'admin', 'active', '2025-08-06 11:06:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
