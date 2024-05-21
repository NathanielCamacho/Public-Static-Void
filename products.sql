-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 11:02 PM
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
  `imageurl` varchar(255) DEFAULT NULL,
  `createstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`itemid`, `itemname`, `itemprice`, `imageurl`, `createstamp`, `updatestamp`) VALUES
(1, 'Mamba', 500.00, 'mamba.png', '2024-05-21 11:19:02', '2024-05-21 11:19:02'),
(2, 'LeBron', 500.00, 'lebron.png', '2024-05-21 11:19:02', '2024-05-21 11:19:02'),
(3, 'Anniversary Tee', 500.00, 'tee.png', '2024-05-21 11:19:02', '2024-05-21 11:19:02'),
(4, 'Felix', 500.00, 'tommy.png', '2024-05-21 11:19:02', '2024-05-21 11:19:02'),
(5, 'Magatta', 500.00, 'cypunk.png', '2024-05-21 11:19:02', '2024-05-21 11:19:02'),
(6, 'Dali Doll', 500.00, 'gamble.png', '2024-05-21 11:19:02', '2024-05-21 11:19:02'),
(7, 'Windbreaker', 999.00, 'windbreaker.png', '2024-05-21 11:19:02', '2024-05-21 19:27:44');

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
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
