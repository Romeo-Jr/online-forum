-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 11:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forumdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment_id`, `comment`, `date`) VALUES
(1, 5, 4, 'gsdgdsgsdfdsfsdfsdfsd', '2023-05-02 00:00:00'),
(2, 5, 4, 'asdasdaszxczxcz', '2023-05-02 17:39:03'),
(3, 5, 4, 'sadcvxclcklghkfgnfbcvb', '2023-05-02 17:39:18'),
(4, 5, 4, 'Jiii', '2023-05-02 17:40:37'),
(5, 6, 4, 'Hello', '2023-05-02 17:53:04'),
(6, 6, 8, 'Hii Omee here', '2023-05-02 18:04:59'),
(7, 6, 3, '3 post, 1 comment', '2023-05-02 18:05:17'),
(8, 6, 9, 'Hello Ome', '2023-05-02 18:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `post` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post`, `date`) VALUES
(1, 1, 'This is my first post', '2023-02-06 16:30:16'),
(2, 1, 'this is my second post', '2023-02-06 16:49:15'),
(3, 1, 'this is my third post', '2023-02-06 16:50:19'),
(4, 1, 'this is my fourth post', '2023-02-06 17:07:56'),
(5, 1, 'post number 5', '2023-02-06 17:17:48'),
(6, 4, 'hiii', '2023-04-24 02:19:43'),
(7, 4, 'Qwerty', '2023-04-24 02:25:24'),
(8, 6, 'Hello World', '2023-05-02 18:04:07'),
(9, 6, 'Hii Romeo', '2023-05-02 18:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`, `image`) VALUES
(1, 'Eathorne', 'email@email.com', '$2y$10$RFbYu7mI0HO9wdw9DOmUzOnJ.WQ5BXKdCQ1zBwvcn2p0jk/vuOX0W', '2023-02-06', NULL),
(4, 'Mary', 'mary@email.com', '$2y$10$FNSKNLPVLIxayzO7kWlGB.jsRHm12s5/u04hMjXDHpJRwBb4v8I2m', '2023-02-06', NULL),
(5, 'beqenuke', 'pacyvop@mailinator.com', '$2y$10$8HRIG10WTQpUTHT.UXFLY.APxea0rRvaw3R1/ljd7GkeRwHi8DdbW', '2023-05-02', NULL),
(6, 'jarykajun', 'sezipev@mailinator.com', '$2y$10$3A7l6yTCD4R6g6SC9G4V9OBAjlDyWcyK37pynQqsRmxxe0j8gQMJ2', '2023-05-02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
