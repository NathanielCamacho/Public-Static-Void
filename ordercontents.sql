-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 06:43 PM
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
-- Table structure for table `ordercontents`
--

CREATE TABLE `ordercontents` (
  `contentid` int(3) NOT NULL,
  `orderid` int(3) NOT NULL,
  `itemid` int(3) NOT NULL,
  `quantity` int(3) NOT NULL,
  `color` enum('black','white') DEFAULT NULL,
  `size` enum('S','M','L') DEFAULT NULL,
  `createstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordercontents`
--

INSERT INTO `ordercontents` (`contentid`, `orderid`, `itemid`, `quantity`, `color`, `size`, `createstamp`, `updatestamp`) VALUES
(10, 22, 3, 6, 'black', 'L', '2024-05-24 16:20:21', '2024-05-24 16:20:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ordercontents`
--
ALTER TABLE `ordercontents`
  ADD PRIMARY KEY (`contentid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `itemid` (`itemid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ordercontents`
--
ALTER TABLE `ordercontents`
  MODIFY `contentid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordercontents`
--
ALTER TABLE `ordercontents`
  ADD CONSTRAINT `ordercontents_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`),
  ADD CONSTRAINT `ordercontents_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `products` (`itemid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
