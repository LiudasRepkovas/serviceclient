-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2015 at 04:38 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shorten`
--

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `short_url` varchar(255) NOT NULL,
  `long_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `user`, `short_url`, `long_url`) VALUES
(999, 1, 'qD', 'http://google.com'),
(1000, 1, 'qF', 'http://google.com'),
(1001, 1, 'qG', 'http://google.com'),
(1002, 1, 'qH', 'http://google.com'),
(1003, 1, 'qJ', 'http://google.com'),
(1004, 1, 'qK', 'http://google.com'),
(1005, 1, 'qL', 'http://google.com'),
(1006, 1, 'qM', 'http://google.com'),
(1007, 1, 'qN', 'http://google.com'),
(1008, 1, 'qP', 'http://google.com'),
(1009, 1, 'qQ', 'http://google.com'),
(1010, 1, 'qR', 'http://google.com'),
(1011, 1, 'qS', 'http://google.com'),
(1012, 1, 'qT', 'http://google.com'),
(1013, 1, 'qV', 'http://google.com'),
(1014, 1, 'qW', 'http://google.com'),
(1015, 1, 'qX', 'http://google.com'),
(1016, 1, 'qY', 'http://google.com'),
(1017, 1, 'qZ', 'http://google.com'),
(1018, 1, 'q-', 'http://google.com'),
(1019, 1, 'q_', 'http://google.com'),
(1020, 1, 'r2', 'http://google.com'),
(1021, 1, 'r3', 'http://dailycard.lt'),
(1022, 1, 'r4', 'http://dailycard.lt'),
(1023, 1, 'r5', 'http://dailycard.lt'),
(1024, 1, 'r6', 'http://dailycard.lt'),
(1025, 1, 'r7', 'http://dailycard.lt'),
(1026, 1, 'r8', 'http://dailycard.lt'),
(1027, 1, 'r9', 'http://dailycard.lt'),
(1028, 1, 'rb', 'http://dailycard.lt'),
(1029, 1, 'rc', 'ghjghj'),
(1030, 1, 'rd', 'ghjghj'),
(1031, 1, 'rf', 'ghjghj'),
(1032, 1, 'rg', 'ghjghj'),
(1033, 1, 'rh', 'ghjghj'),
(1034, 1, 'rj', 'http://mieste.delfi.lt'),
(1035, 1, 'rk', 'http://mieste.delfi.lt'),
(1036, 1, 'rm', 'http://mieste.delfi.lt'),
(1037, 1, 'rn', 'http://mieste.delfi.lt');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'liudas', 'asas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1038;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
