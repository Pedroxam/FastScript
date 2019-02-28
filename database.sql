-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2019 at 09:40 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastscript`
--

-- --------------------------------------------------------

--
-- Table structure for table `my_admin`
--

CREATE TABLE `my_admin` (
  `ID` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_admin`
--

INSERT INTO `my_admin` (`ID`, `user`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `my_settings`
--

CREATE TABLE `my_settings` (
  `ID` int(11) NOT NULL,
  `site_name` text CHARACTER SET utf8mb4 NOT NULL,
  `site_desc` text CHARACTER SET utf8mb4,
  `site_keywords` text CHARACTER SET utf8mb4,
  `theme` text NOT NULL,
  `logo` text,
  `admin_email` text,
  `cache_days` text,
  `cache_method` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_settings`
--

INSERT INTO `my_settings` (`ID`, `site_name`, `site_desc`, `site_keywords`, `theme`, `logo`, `admin_email`, `cache_days`, `cache_method`) VALUES
(1, 'Fast Script', 'Build Your Project Easy and Fast', 'This is My Project', 'default', NULL, 'admin@admin.com', '2', 'files');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_admin`
--
ALTER TABLE `my_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `my_settings`
--
ALTER TABLE `my_settings`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_admin`
--
ALTER TABLE `my_admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `my_settings`
--
ALTER TABLE `my_settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
