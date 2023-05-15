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
(15, 19, 17, 'Reducing inequalities requires us to acknowledge and address systemic barriers that have historically disadvantaged certain groups. By working towards a more inclusive and equitable society, we can create a world where everyone has the chance to thrive an', '2023-05-10 18:00:06'),
(16, 30, 26, 'Sorry to hear that maam. It is not just kids who are bullied, adults experience it too. Workplace bullying is a serious problem that can lead to depression, anxiety, and even physical harm. Employers need to take this issue seriously.','2023-05-13 09:48:29');

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
(17, 22, 'Access to education, healthcare, and economic opportunities should be universal rights, not privileges for a select few. Let us strive for a world where no one is held back by their socio-economic background or circumstances.\r\n#EqualOpportunities #SocialJustice #ReducedInequalities', '2023-05-10 17:56:50'),
(18, 23, 'Nothing ever goes right for me. I am such a failure. #negativeselftalk #lowselfesteem', '2023-05-13 17:57:50'),
(19, 23, 'Why even bother trying? It is not like anything ever changes. ', '2023-05-13 17:58:50'),
(20, 24, 'I am so alone in this. Nobody understands me or cares about me.', '2023-05-13 17:59:50'),
(21, 24, 'I am never going to get better. This is just who I am now. ', '2023-05-13 17:10:50'),
(22, 25, 'I am just a burden to everyone around me. They do all be better off without me. I cannot do anything right. I might as well just give up.', '2023-05-13 17:01:50'),
(23, 26, 'Things will never get better. I am stuck in this cycle forever.', '2023-05-13 17:02:50'),
(24, 27, 'I cannot seem to do anything right. I always mess things up.', '2023-05-13 17:03:50'),
(25, 28, 'I am sick of hearing about another kid who took their own life because they were bullied. It’s time for parents, teachers, and society as a whole to step up and protect our children. We need to teach them to be kind and accepting of others, not to tear them down.', '2023-05-13 17:04:50'),
(26, 29, 'I am a teacher at this university but I feel like I am still a high school student. I feel like my co-teachers do not like me and one time I accidentally heard them talking bad about me at the faculty room. What am I gonna do? I cannot afford to lose this job.', '2023-05-13 17:05:50'),
(27, 30, 'I was once eating at the cafeteria alone enjoying my lunch, when suddenly a group of guys came and ganged up on me. Now, I experience panic attacks from time to time because of the trauma. I am afraid to go to school because I might see them again.', '2023-05-13 17:06:50'),
(28, 30, 'I think ever since I experienced bullying, things are not the same anymore.', '2023-05-13 17:07:50'),
(29, 31, 'Is it that bad if I still push myself to be a part of a circle that they clearly do not want me to be a part of? I think I cannot handle being alone in this university. I will just bear with it even if they clearly do not like me.', '2023-05-13 17:08:50'),
(30, 31, 'My friends once poured their juice on my brand new shirt just because I bought them the wrong juice flavor. I am so tired but I know I cannot handle being alone so I will just post my thoughts here.', '2023-05-13 17:09:50');





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
(22, 'Kate', 'katekate@yahoo.com', '$2y$10$FK9fLzP2N8UcDr/Jw9IkzOWf303.a0zhw6Z093kT.tloFqcMrbgSW', '2023-05-10', 'assets/images/kate.jpg', 1),
(23,'Susan','susan@gmail.com','$2y$10$2UsETgGfV4hmjbCsotM2EejOGYUuOwhP5SMaP/Wp95d4qrwcfroCa','2023-05-13','assets/images/user.jpg',2),
(24,'Ryan','ryan@gmail.com','$2y$10$85FrRwKHsox8LfoFVkb4geWMNZ5hepoYEMHQ1hlJlE3f4mOwU9heu','2023-05-13','assets/images/images.png',2),
(25,'Anna Marie','annamarie@gmail.com','$2y$10$Y9qyXy8DO3dxXBHlRm08sOmSSPuucybxt8eRsQ3qwgZ9NeVtJCIxq','2023-05-13','assets/images/image3.jpeg',2),
(26,'Jake','jake@gmail.com','$2y$10$HfZM.RIOJwJP0SodpdUqVOJbh.OsMdR5ew/fqLw4w1Z.In6dCAsum','2023-05-13','assets/images/q.jpg',2),
(27,'Juliet','juliet@gmail.com','$2y$10$6JiKL3BmmMJLNqvVfz06U.cgydq5Lx79E2lOG2HICL7DWiyJUp21i','2023-05-13','assets/images/image2.png',1),
(28,'Jimin','jiminpark@gmail.com','$2y$10$onQC0fb3XOhCiG0nDldpS.jnjgYPZxJJf5T9hbazBzWzk8lugJHHW','2023-05-13','assets/images/qwerty.jpg',1),
(29,'Amanda','amanda12@gmail.com','$2y$10$5YIP0nlL5C7U5lGIbqNwR.tGvmRhDOHdFzXb0w86.WPN7jvLP2iQC','2023-05-13','assets/images/image4.jpeg',1),
(30,'Ervin','Ervin@gmail.com','$2y$10$fsAdFnUZiZksn0QE.ttSeekuL1GcHog./TERQBbDk/kKFE5HLDe6u','2023-05-13','assets/images/default.png',2),
(31,'Martin','martinp@gmail.com','$2y$10$F2lJpxsgZcLyFcLcU9.u6.SahyAZkOtcR1VUwWledygKskTuY1LLW','2023-05-13','assets/images/default.png',2);
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
