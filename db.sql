-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 20, 2015 at 01:43 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `fun`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`) VALUES
(17, 'Animals'),
(18, 'Professions');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `imgName` varchar(250) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `imgName`, `itemName`, `categoryId`) VALUES
(17, 'e6f1099e9960f5195174623c7ba8bb74.png', 'Panda', 17),
(18, 'a3e23c4a2497a4bb34f3a11b0c7df8e4.png', 'Jaguar', 17),
(19, 'ac72d984ab7d82d0339c83e43ec2cc69.png', 'Cat', 17),
(20, '3d0ec3bc1267d7d4eb84d63586d2e8d3.png', 'Elephant', 17),
(22, '4339d6519ce6793974592464977f955a.png', 'squirrel', 17),
(23, '9c6610ef683e6eb4b63406b6cc51b42e.png', 'Lion', 17),
(24, 'f05ed56eb669be1942521c8ff0b6e49a.png', 'Police', 18),
(25, 'cc15b179fd70ab9e5d06e7f2a2bad763.png', 'Teacher', 18),
(26, '266308e310ce7a5aaa83c992e596b93c.png', 'Fireman', 18),
(27, 'ddab77a07a14bee0825b053f68278797.png', 'Doctor', 18),
(28, 'fb08a0478907b87077808880f755bc64.png', 'Chef', 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(240) NOT NULL,
  `level` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`) VALUES
(1, 'farhad', 'felli', 'fa@no.se', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;