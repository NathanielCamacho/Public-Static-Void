-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 04:19 PM
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
-- Table structure for table `cartcontents`
--

CREATE TABLE `cartcontents` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `createstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordercontents`
--

CREATE TABLE `ordercontents` (
  `contentid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `totalamount` decimal(10,2) NOT NULL,
  `createstamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userpayments`
--

CREATE TABLE `userpayments` (
  `paymentid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `gcashname` varchar(255) NOT NULL,
  `gcashnum` varchar(11) NOT NULL,
  `refnumber` varchar(10) NOT NULL,
  `paymentstatus` enum('Pending','Successful','Failed') NOT NULL DEFAULT 'Pending',
  `paymentstamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartcontents`
--
ALTER TABLE `cartcontents`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `ordercontents`
--
ALTER TABLE `ordercontents`
  ADD PRIMARY KEY (`contentid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `userpayments`
--
ALTER TABLE `userpayments`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartcontents`
--
ALTER TABLE `cartcontents`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordercontents`
--
ALTER TABLE `ordercontents`
  MODIFY `contentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userpayments`
--
ALTER TABLE `userpayments`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartcontents`
--
ALTER TABLE `cartcontents`
  ADD CONSTRAINT `cartcontents_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `userdata` (`userid`),
  ADD CONSTRAINT `cartcontents_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `products` (`itemid`);

--
-- Constraints for table `ordercontents`
--
ALTER TABLE `ordercontents`
  ADD CONSTRAINT `ordercontents_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`),
  ADD CONSTRAINT `ordercontents_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `products` (`itemid`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `userdata` (`userid`);

--
-- Constraints for table `userpayments`
--
ALTER TABLE `userpayments`
  ADD CONSTRAINT `userpayments_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `userdata` (`userid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
