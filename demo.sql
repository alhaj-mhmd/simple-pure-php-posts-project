-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 05:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `skills` varchar(250) NOT NULL,
  `point` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `type`, `status`, `location`, `skills`, `point`, `user_id`) VALUES
(6, 'plumbing', 'open', 'e', 'joinery', '6666', 13),
(8, 'accounting', 'open', '0', 'plumbig,teaching,joinery', '90', 13),
(10, 'plumbing', 'open', '444', 'teaching', '1', 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `username` varchar(50) NOT NULL,
  `secure` varchar(255) NOT NULL,
  `skills` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `username`, `secure`, `skills`, `phone`, `address`, `facebook`, `instagram`, `twitter`, `linkedin`) VALUES
(1, 'hhdhldk', 'ed.al.tinawi@gmail.com', '$2y$10$I4MpbsZoJHRx4jmmtBM7verBg09wa4EJkaq9SFZzgVuTc25cdJjh6', '2020-11-15 16:14:13', 'usersds', 'adfadfd', 'plumbing,teaching,joinery', '', '', '', '', '', ''),
(9, 'mm', 'm@gmail.com', '$2y$10$UxswCbIg4w5kYA7rV4ShC.PKinrAps5sOBx1SijJsUQ3vsQVyT6gu', '2020-08-19 12:26:15', 'ff', '', '', '', '', '', '', '', ''),
(12, 'ff', 'f@gmail.com', '$2y$10$8EnE1lAuB6BNcsZfAhCBHOtC5vtvpFFkgOy1fH.k8yPmcB8wcIhRy', '2020-10-25 21:10:40', 'dfd', '', '', '', '', '', '', '', ''),
(13, 'John', 'ju5714y@gre.ac.uk', '$2y$10$qTxaI8vU56YlzXa3WhmJ7eMR4S8rhNzZ301dF8VOCl6l7bG/Wjss2', '2020-10-25 21:14:18', 'user', '', '', '', '', '', '', '', ''),
(14, 'meme meme', 'alhaj.mhmd@gmail.com', '$2y$10$7XSuezO02LZLcXF4q9Ax.uvOu/NluRVuCHMKSsNC5IDCnNEj97lMG', '2020-11-15 16:15:19', 'usersdssdas', 'adfadfdd', 'plumbing,teaching,joinery', '', '', '', '', '', ''),
(15, 'adfa', 'alhaj.mhmd@gmail.com', '$2y$10$hFd9RrO1Q9vDeuhVXKmVwuv1JI/dFKZ6.HzzXYbRtKbSwPA68MMSy', '2020-11-16 03:59:43', 'userkkk', 'adfadfffdf', 'joinery', '', '', '', '', '', ''),
(16, 'meme meme', 'alhaj.mhmd@gmail.com', '$2y$10$jA1wLl9c21Ozz7lOb2C5au8GF4cg43XJPxCB0H8f0O81iyi8scYIW', '2020-11-16 04:01:40', 'userdfd', 'adfadf', 'teaching', '', '', '', '', '', ''),
(17, 'meme meme', 'alhaj.mhmd@gmail.com', '$2y$10$LKo0lZhTEktozU4S0MUsC.krHVJasiXWfa7RSqRXSlDb5aeSnHyz.', '2020-11-16 04:03:33', 'userdfddfadf', 'adfadf', 'plumbing', '', '', '', '', '', ''),
(18, 'meme meme', 'alhaj.mhmd@gmail.com', '$2y$10$a07690jxwwkcpNFx2vG/Z.pq7jlR60WfHi4d3zvEGVsoe76fWymBy', '2020-11-16 04:04:11', 'uservtt', 'adfadf', 'teaching', '', '', '', '', '', ''),
(19, 'adfad', 'kk@gmail.com', '$2y$10$7i/mqCQGKc37lEAbAWjYrO1.aRjoDkTUDbfUkv1xXS./s6Ky.VZY2', '2020-11-16 04:10:21', 'userbb', '', 'plumbing', '', '', '', '', '', ''),
(20, 'test', 'alhaj.mhmd@gmail.com', '$2y$10$fGpElqeKaXXNo7qTA294juDyYsX3RNeJdZABBlpJWfiVyy22fFghi', '2020-11-22 23:41:15', 'test', '', 'plumbing', '01162304341', 'VIVO Residential Suites @ 9 Seputeh Condominium (Nine Seputeh)  Jalan 2/110a, Petaling Lama, 58100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', 'alhaj fac', 'alhaj inst', 'alhaj twit', 'alhaj in');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
