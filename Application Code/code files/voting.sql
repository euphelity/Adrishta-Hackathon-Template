-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 06:18 AM
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
(2, 'abc', 1, 'president', 1, '201800543', 'photos/default_photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `eid` int(255) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Disabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`eid`, `ename`, `status`) VALUES
(1, 'Student Council Election', 'Enabled');

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
(4, 'prat2808', 'x@x.com', '$2y$10$Mn490bMjMhoWcdI/Thdi..YJ/pQf3/En4gkvZPJ4cftXRZgb5rWue', '201800444', 1),
(5, 'prat2808', 'a@a.com', '$2y$10$yf4yZVig.oJH4yWLh4E2PuBIBbx3S/WkUpCQXlz3WWc1zBDYqCklC', '201800543', 1),
(6, 'prat2808', 'b@b.com', '$2y$10$hCFunWwdmDI6yDYgB4rlIONdZNTNYeuhDv8pPsEBiZkfMhjf7ii/W', '2018', 1),
(7, 'prat2808', 'c@c.com', '$2y$10$uqKOQ9124FEoynZbb43KZOW3YbbtHBE4V0VsdnhL1T.PvI682kyEG', '2018', 1),
(8, 'prat2808', 'd@d.com', '$2y$10$LZdKuCneEs.E6RxoCdYqL.0QfcxlJQGZdWrw1qG7YxTI3nk1h7NXq', '201800', 1),
(9, 'prat2808', 'e@e.com', '$2y$10$iJ7UcsybwaHSzU.tjz6CcOq9mECJgUL8JBamkwtK0gVrrXQlvjZ5y', '2018', 1),
(10, 'prat2808', 'g@g.com', '$2y$10$Ij3OTSonzYJdcmIds368hulBrJNTfEoME/47g7wGHZrXR4y71uYGm', '2018', 0),
(11, 'prat2808', 'h@h.com', '$2y$10$xJMAcAN0TshRUTYR2GzR2.nBMNzysc6YUCLCtdiwZvTDkaWns8yeK', '201800', 1),
(12, 'prat2808', 'i@i.com', '$2y$10$W/MWxl1fq9NFWlGIwJoUU.z0sjMbz4ZVuca6PU40k2LhAj5MYhKXC', '201800', 1),
(13, 'prat2808', 'j@j.com', '$2y$10$Vdjl6wH8fRicLW.SgibI/.S8/362fGWc5RVwk26XCNqwN5NKiowwO', '201800', 1),
(14, 'prat2808', 'k@k.com', '$2y$10$hf/7sDvrq.YlegIqS1F57eMNu6PMwVp3lZtApHsGmsd92QiBlAsxe', '201800', 1),
(15, 'prat2808', 'z@z.com', '$2y$10$yC5xMiGhxX0mTNozowFm3eMll5So0ln6fF0uBcVd4j2ZBtH/rEHJa', '201800', 0),
(16, 'prat2808', 'x@x', '$2y$10$apjezILpfHEot94ipzvCRey/LpUsxHpDsM3PL4qPcorGZHtR1zUG2', '201800', 0),
(17, 'prat2808', 'y@y.com', '$2y$10$D.GUfyIfzMhFo22tAvlIz.EgEH2PJdo7ef6tvGJ1EM9MV6Mqx2KYm', '201900', 0),
(18, 'prat2808', 'admin1@gmail.com', '$2y$10$QF9fZ9mBiVxE9MHO5WXo.u1H6PH8mUwfJ7lBXnSXjqn7Wz9YOEhYq', '201800543', 0),
(19, 'hello', 'q@q.com', '$2y$10$zrsVmNwk9RQpjHX/O2uVOe2FH0gZBQQS4LwzY2aoHa72vHJj93ofW', '201800333', 0),
(20, 'prat2808', 'w@w.com', '$2y$10$1zYwPzsCHhx3nVqDl75n5.v/CouZ.TdPiZUrOG8fBaGjoN9wkqYgm', '201800', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`eid`);

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
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `eid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `tid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
