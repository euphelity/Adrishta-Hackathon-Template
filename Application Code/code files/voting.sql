-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 05:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `cid` int(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `tid` int(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `votes` int(255) NOT NULL DEFAULT 0,
  `regNo` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'photos/default_photo.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`cid`, `cname`, `tid`, `position`, `votes`, `regNo`, `photo`) VALUES
(2, 'abc', 1, 'president', 0, '201800543', 'photos/default_photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `tid` int(255) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `members` int(255) NOT NULL,
  `slogan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`tid`, `tname`, `members`, `slogan`) VALUES
(1, 'team1', 3, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `ifvoted` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `username`, `email`, `password`, `regNo`, `ifvoted`) VALUES
(1, 'prat2808', 'pa1.sharma@gmail.com', '$2y$10$kioTmCMJtwPdob1fENYljOEe/fOZiNwumyj9KXDkCccRWjG3qn2nS', '201800543', 0),
(2, 'prat2808_1', 'abc@abc.com', '$2y$10$urHMZBSo8e7SBR8LRkfrzu6UQVUMcfutvR3rEKwVV.me7P6bqSC16', '1', 0),
(3, 'prat2808', 'xyz@xyz.com', '$2y$10$YNtStljT27cHgBpm1d7rt.Atgst0EA1qX6Azkb0iE1yrtyh3N46eC', '201700432', 1),
(4, 'prat2808', 'x@x.com', '$2y$10$Mn490bMjMhoWcdI/Thdi..YJ/pQf3/En4gkvZPJ4cftXRZgb5rWue', '201800444', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `cid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `tid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
