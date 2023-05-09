-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 01:09 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profile_pic`, `role`) VALUES
(1, 'admin1', '$2y$10$gHA7pSNNckAOQQrvYLmecuDkY2IuDcpE67JvLdQ3zUCdvbWDYRQEO', '', 1);

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
(6, 6, 8, 'Hii Omee here', '2023-05-02 18:04:59'),
(7, 6, 3, '3 post, 1 comment', '2023-05-02 18:05:17'),
(12, 16, 3, 'Holla', '2023-05-06 20:39:23');

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
(2, 1, 'this is my second post', '2023-02-06 16:49:15'),
(3, 1, 'this is my third post', '2023-02-06 16:50:19'),
(6, 4, 'hiii', '2023-04-24 02:19:43'),
(7, 4, 'Qwerty', '2023-04-24 02:25:24'),
(8, 6, 'Hi World', '2023-05-07 07:58:47'),
(12, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum est, voluptatibus eos consequuntur iste rem possimus, corporis dolor maiores placeat minima itaque hic nisi earum. Voluptas voluptatibus in atque sequi.', '2023-05-05 17:33:32');

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
  `image` varchar(1024) DEFAULT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`, `image`, `role`) VALUES
(1, 'Eathorne', 'email@email.com', '$2y$10$RFbYu7mI0HO9wdw9DOmUzOnJ.WQ5BXKdCQ1zBwvcn2p0jk/vuOX0W', '2023-02-06', 'assets/images/image1.png', 1),
(4, 'Mary', 'mary@email.com', '$2y$10$FNSKNLPVLIxayzO7kWlGB.jsRHm12s5/u04hMjXDHpJRwBb4v8I2m', '2023-02-06', 'assets/images/image2.png', 2),
(5, 'beqenuke', 'pacyvop@mailinator.com', '$2y$10$8HRIG10WTQpUTHT.UXFLY.APxea0rRvaw3R1/ljd7GkeRwHi8DdbW', '2023-05-02', 'assets/images/image3.jpeg', 1),
(6, 'jarykajun', 'sezipev@mailinator.com', '$2y$10$YvY87myJmTYcQBSyA5dDxOO5M74sEpKEiYVT3rnvQTz5xrbP8wcAS', '2023-05-02', 'assets/images/q.jpg', 2),
(14, 'belafa', 'xutivofu@mailinator.com', '$2y$10$x/8eZG5tWx0IgdMHDCsb7uRjm54gPS4aEPYSsBvSP2G3vL.CMGc3e', '2023-05-06', 'assets/images/image5.jpeg', 2),
(15, 'zawira', 'ruhatelej@mailinator.com', '$2y$10$nYeDc3bxULmytCPE58TYoOFkBy/jGv/630uFO2hdfVyO2EIEM2O/S', '2023-05-06', 'assets/images/default.png', 1),
(16, 'rylityxew', 'gibenyxilu@mailinator.com', '$2y$10$vKFHXTfG34E.7nbWYod3oOJNKjP/y5WuzAOD.imoRxQ6LukmC0hf6', '2023-05-06', 'assets/images/default.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
