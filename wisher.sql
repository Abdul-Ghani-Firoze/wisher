-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2019 at 02:26 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wishlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemId` int(11) NOT NULL,
  `title` text NOT NULL,
  `url` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `listId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemId`, `title`, `url`, `price`, `priority`, `listId`) VALUES
(46, 'ldkfnvxm', 'mxcmn', 7, 2, 13),
(53, 'lsdkfj', 'lksdjf', 3, 1, 14),
(54, 'abc', 'lkjl', 20, 2, 14),
(56, 'something', 'nothing', 40, 3, 14),
(57, 'dklfj', 'ldskjf', 6, 1, 13),
(59, 'final 2', 'nowhere.com', 20, 2, 16),
(60, 'final 3', 'sdkfjs.com', 50, 3, 16),
(61, 'vcm', 'oei', 44, 1, 16),
(63, 'spray', 'somewhere.com', 20, 1, 17),
(64, 'bottles', 'anywhere.com', 40, 3, 17),
(65, 'noted', 'ksdf', 29, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `listId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`listId`, `name`, `description`, `email`) VALUES
(11, 'test list', 'tested', 'rck180@gmail.com'),
(12, 'birthday list', 'sam''s birthday', 'lol@mol.com'),
(13, 'Gifts to purchase', 'John''s birthday', 'mail@ok.com'),
(14, 'testing', 'test', 'admin@admin.com'),
(15, 'test3', 'fsldkfjs', 'new@list.com'),
(16, 'finalized list', 'finalized testing', 'final@test.com'),
(17, 'abu''s list', 'birthday presents', 'abu@somebody.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `password`) VALUES
(27, 'A Ghani', 'rck180@gmail.com', '$2y$10$O4AbpNVi27BwhtTZJOVZKuu6uaUol1UDIKBUgvrIjZ3IMaO78E8EG'),
(29, 'firoze', 'mail@ok.com', '$2y$10$g7DS/7rT9k6ke.ZpoTpiu.zxGsGZ2yjFHWQWJBR5ESbMik8EKweyW'),
(30, 'admin', 'admin@admin.com', '$2y$10$MAP6h71bBZSCS0D6V2W7kOLA27k/OghkeQINhoRT9Th303ZW7FQZe'),
(31, 'adil', 'adil@someone.com', '$2y$10$GfLS52zUyzedeHqeq7FF1eh2osrQxGRFMW/Dri1B/ChtQqA/HwyJG'),
(32, 'new', 'new@list.com', '$2y$10$s07EvW8EdZS4JSfjsNeJtePR5lQYYPgdnb3QyNwSzzQ2MFKUNP8ny'),
(33, 'final test', 'final@test.com', '$2y$10$PEeOjHPZFEULlPtW5Jm2lemJ8qBAngRM0ZgJL3VFocaGdcXqnMb3G'),
(34, 'abu', 'abu@somebody.com', '$2y$10$GNnOEabG2V9Fm8VT0cJ21ufgdaLRjdpikMhgevrx/LVjAdWE85Te.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`listId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `listId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
