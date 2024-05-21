-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 04:23 PM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `itemid` int(11) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `itemprice` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `imageurl` varchar(255) DEFAULT NULL,
  `createstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`itemid`, `itemname`, `itemprice`, `description`, `imageurl`, `createstamp`, `updatestamp`) VALUES
(1, 'Mamba', 500.00, NULL, 'mamba.png', '2024-05-21 11:19:02', '2024-05-21 11:19:02'),
(2, 'LeBron', 500.00, NULL, 'lebron.png', '2024-05-21 11:19:02', '2024-05-21 11:19:02'),
(3, 'Anniversary Tee', 500.00, NULL, 'tee.png', '2024-05-21 11:19:02', '2024-05-21 11:19:02'),
(4, 'Felix', 500.00, NULL, 'tommy.png', '2024-05-21 11:19:02', '2024-05-21 11:19:02'),
(5, 'Magatta', 500.00, NULL, 'cypunk.png', '2024-05-21 11:19:02', '2024-05-21 11:19:02'),
(6, 'Dali Doll', 500.00, NULL, 'gamble.png', '2024-05-21 11:19:02', '2024-05-21 11:19:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`itemid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
