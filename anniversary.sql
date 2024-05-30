-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 11:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krookedweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `anniversary`
--

CREATE TABLE `anniversary` (
  `itemid` int(11) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `itemprice` decimal(10,2) NOT NULL,
  `sstock` int(2) NOT NULL DEFAULT 99,
  `mstock` int(2) NOT NULL DEFAULT 99,
  `lstock` int(2) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anniversary`
--

INSERT INTO `anniversary` (`itemid`, `itemname`, `itemprice`, `sstock`, `mstock`, `lstock`) VALUES
(3, 'Anniversary Tee', 500.00, 99, 99, 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anniversary`
--
ALTER TABLE `anniversary`
  ADD PRIMARY KEY (`itemid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anniversary`
--
ALTER TABLE `anniversary`
  ADD CONSTRAINT `anniversary_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `products` (`itemid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
