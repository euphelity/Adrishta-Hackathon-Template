-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 04:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone
= "+00:00";


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

CREATE TABLE `candidates`
(
  `cid` int
(255) NOT NULL,
  `cname` varchar
(255) NOT NULL,
  `tid` int
(255) NOT NULL,
  `position` varchar
(255) NOT NULL,
  `votes` int
(255) NOT NULL DEFAULT 0,
  `regNo` varchar
(255) NOT NULL,
  `photo` varchar
(255) NOT NULL DEFAULT 'photos/default_photo.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`
cid`,
`cname
`, `tid`, `position`, `votes`, `regNo`, `photo`) VALUES
(1, 'Nehal', 1, 'president', 0, '201800488', 'photos/default_photo.jpg'),
(2, 'Ronak', 1, 'Vice President', 0, '201800566', 'photos/default_photo.jpg'),
(3, 'Rahul', 1, 'General Secretary', 0, '201800608', 'photos/default_photo.jpg'),
(4, 'Vishal', 1, 'Cultural Secretary', 0, '201800588', 'photos/default_photo.jpg'),
(5, 'Ruchika', 1, 'Mess Secretary', 0, '201800288', 'photos/default_photo.jpg'),
(6, 'Naman', 1, 'Sports Secretary', 0, '201800388', 'photos/default_photo.jpg'),
(7, 'Sanyam', 2, 'president', 0, '201800188', 'photos/default_photo.jpg'),
(8, 'Sushant', 2, 'Vice President', 0, '201800133', 'photos/default_photo.jpg'),
(9, 'Kritika', 2, 'General Secretary', 0, '201800688', 'photos/default_photo.jpg'),
(10, 'Bhavuk', 2, 'Cultural Secretary', 0, '201800508', 'photos/default_photo.jpg'),
(11, 'Semal', 2, 'Mess Secretary', 0, '201800108', 'photos/default_photo.jpg'),
(12, 'Khushi', 2, 'Sports Secretary', 0, '201800308', 'photos/default_photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election`
(
  `eid` int
(255) NOT NULL,
  `ename` varchar
(255) NOT NULL,
  `status` varchar
(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`
eid`,
`ename
`, `status`) VALUES
(1, 'Student Council Election', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams`
(
  `tid` int
(255) NOT NULL,
  `tname` varchar
(255) NOT NULL,
  `members` int
(255) NOT NULL,
  `slogan` varchar
(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`
tid`,
`tname
`, `members`, `slogan`) VALUES
(1, 'Team1', 6, 'Advancing Knowledge. Transforming Lives.'),
(2, 'Team2', 6, 'Bank on me. Will treasure your vote.');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters`
(
  `id` int
(255) NOT NULL,
  `username` varchar
(255) NOT NULL,
  `email` varchar
(255) NOT NULL,
  `password` varchar
(255) NOT NULL,
  `regNo` varchar
(255) NOT NULL,
  `ifvoted` int
(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`
id`,
`username
`, `email`, `password`, `regNo`, `ifvoted`) VALUES
(1, 'admin', 'admin_202000000@smit.smu.edu.in', '$2y$10$xhmPbUI7aMaegtrFoxHVduymuH0s0KqAgn4xMtYvXjFQ9i44vcCB2', '202000000', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
ADD PRIMARY KEY
(`cid`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
ADD PRIMARY KEY
(`tid`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `cid` int
(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `tid` int
(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int
(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;