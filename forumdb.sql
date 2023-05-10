-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 06:14 PM
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
(15, 19, 17, 'Reducing inequalities requires us to acknowledge and address systemic barriers that have historically disadvantaged certain groups. By working towards a more inclusive and equitable society, we can create a world where everyone has the chance to thrive an', '2023-05-10 18:00:06');

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
(14, 19, 'Let us work towards a world where everyone has equal opportunities and access to resources, so that we can reduce inequalities and build a more just and sustainable future for all.\r\n\r\n#ReducedInequalities \r\n#SDG10\r\n#SocialJustice', '2023-05-10 17:39:53'),
(15, 20, 'Let us work towards creating a world where everyone has an equal opportunity to thrive. By reducing inequalities, we can pave the way for a brighter future where no one is left behind.\r\n#ReducedInequalities #EqualityForAll #SocialJustice', '2023-05-10 17:52:33'),
(16, 21, 'Reducing inequalities is not just a moral imperative, it is also key to sustainable development. Let us join forces to promote a fair and inclusive society where every individual can realize their full potential.\r\n#LeaveNoOneBehind #SustainableDevelopment #ReducedInequalities', '2023-05-10 17:54:47'),
(17, 22, 'Access to education, healthcare, and economic opportunities should be universal rights, not privileges for a select few. Let us strive for a world where no one is held back by their socio-economic background or circumstances.\r\n#EqualOpportunities #SocialJustice #ReducedInequalities', '2023-05-10 17:56:50');

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
(19, 'Romeo Estoy', 'romeo@email.com', '$2y$10$oEn4dwYKKdkAaQASusA.rOqOeGNBrPueRE8cdCCSWTIfbqKHgGDAq', '2023-05-10', 'assets/images/romeo.jpg', 1),
(20, 'Andrei Ilao', 'andrei123@gmail.com', '$2y$10$GffBLmys7rqQWPohtDlQwuE8GRQe7dz9cLojRs1.mNKPn9wZBDAqe', '2023-05-10', 'assets/images/andrei.jpg', 2),
(21, 'Roseann', 'roseannc23@outlook.com', '$2y$10$KfkYc6Iz7tOkT63m03/FCuil3urK7.dX8T9KXG4/23flb1uwDbZaK', '2023-05-10', 'assets/images/roseann.jpg', 2),
(22, 'Kate', 'katekate@yahoo.com', '$2y$10$FK9fLzP2N8UcDr/Jw9IkzOWf303.a0zhw6Z093kT.tloFqcMrbgSW', '2023-05-10', 'assets/images/kate.jpg', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
