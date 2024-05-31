-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 09:58 PM
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
(3, 'Anniversary Tee', 500.00, 15, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `cartcontents`
--

CREATE TABLE `cartcontents` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `createstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dalidoll`
--

CREATE TABLE `dalidoll` (
  `itemid` int(11) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `itemprice` decimal(10,2) NOT NULL,
  `sstock` int(2) NOT NULL DEFAULT 99,
  `mstock` int(2) NOT NULL DEFAULT 99,
  `lstock` int(2) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dalidoll`
--

INSERT INTO `dalidoll` (`itemid`, `itemname`, `itemprice`, `sstock`, `mstock`, `lstock`) VALUES
(6, 'Dali Doll', 500.00, 15, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `felix`
--

CREATE TABLE `felix` (
  `itemid` int(11) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `itemprice` decimal(10,2) NOT NULL,
  `sstock` int(2) DEFAULT 99,
  `mstock` int(2) NOT NULL DEFAULT 99,
  `lstock` int(2) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `felix`
--

INSERT INTO `felix` (`itemid`, `itemname`, `itemprice`, `sstock`, `mstock`, `lstock`) VALUES
(4, 'Felix', 500.00, 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `lebron`
--

CREATE TABLE `lebron` (
  `itemid` int(11) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `itemprice` decimal(10,2) NOT NULL,
  `sstock` int(2) DEFAULT 99,
  `mstock` int(2) NOT NULL DEFAULT 99,
  `lstock` int(2) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lebron`
--

INSERT INTO `lebron` (`itemid`, `itemname`, `itemprice`, `sstock`, `mstock`, `lstock`) VALUES
(2, 'LeBron', 500.00, 15, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `magatta`
--

CREATE TABLE `magatta` (
  `itemid` int(11) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `itemprice` decimal(10,2) NOT NULL,
  `sstock` int(2) DEFAULT 99,
  `mstock` int(2) NOT NULL DEFAULT 99,
  `lstock` int(2) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `magatta`
--

INSERT INTO `magatta` (`itemid`, `itemname`, `itemprice`, `sstock`, `mstock`, `lstock`) VALUES
(5, 'Magatta', 500.00, 15, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `mamba`
--

CREATE TABLE `mamba` (
  `itemid` int(11) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `itemprice` decimal(10,2) NOT NULL,
  `sstock` int(2) DEFAULT 99,
  `mstock` int(2) NOT NULL DEFAULT 99,
  `lstock` int(2) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mamba`
--

INSERT INTO `mamba` (`itemid`, `itemname`, `itemprice`, `sstock`, `mstock`, `lstock`) VALUES
(1, 'Mamba', 500.00, 15, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `ordercontents`
--

CREATE TABLE `ordercontents` (
  `contentid` int(3) NOT NULL,
  `orderid` int(3) NOT NULL,
  `itemid` int(3) NOT NULL,
  `quantity` int(3) NOT NULL,
  `size` enum('S','M','L') DEFAULT NULL,
  `createstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderhistory`
--

CREATE TABLE `orderhistory` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `orderstatus` enum('placed','payconfirmed','packed','shipped') NOT NULL,
  `status_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `totalamount` decimal(10,2) NOT NULL,
  `createstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `orderstatus` enum('placed','payconfirmed','packed','shipped') NOT NULL,
  `updatestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `placed_timestamp` timestamp NULL DEFAULT NULL,
  `payconfirmed_timestamp` timestamp NULL DEFAULT NULL,
  `packed_timestamp` timestamp NULL DEFAULT NULL,
  `shipped_timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `itemid` int(11) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `itemprice` decimal(10,2) NOT NULL,
  `itemsize` enum('S','M','L') DEFAULT NULL,
  `imageurl` varchar(255) DEFAULT NULL,
  `createstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`itemid`, `itemname`, `itemprice`, `itemsize`, `imageurl`, `createstamp`, `updatestamp`) VALUES
(1, 'Mamba', 500.00, NULL, 'mamba.png', '2024-05-21 11:19:02', '2024-05-31 19:33:00'),
(2, 'LeBron', 500.00, NULL, 'lebron.png', '2024-05-21 11:19:02', '2024-05-31 19:33:25'),
(3, 'Anniversary Tee', 500.00, NULL, 'tee.png', '2024-05-21 11:19:02', '2024-05-31 19:33:25'),
(4, 'Felix', 500.00, NULL, 'tommy.png', '2024-05-21 11:19:02', '2024-05-31 19:33:25'),
(5, 'Magatta', 500.00, NULL, 'cypunk.png', '2024-05-21 11:19:02', '2024-05-31 19:33:25'),
(6, 'Dali Doll', 500.00, NULL, 'gamble.png', '2024-05-21 11:19:02', '2024-05-31 19:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `saleid` int(11) NOT NULL,
  `itemid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `saledate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `userid` int(11) NOT NULL,
  `usertype` enum('user','admin','delivery') NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`userid`, `usertype`, `username`, `password`, `createstamp`, `updatestamp`) VALUES
(1, 'admin', 'admin', 'Admin123', '2024-05-23 16:51:42', '2024-05-31 07:48:21'),
(3, 'user', 'hans', 'Hans1234', '2024-05-24 16:19:46', '2024-05-31 07:23:01');

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
  `paymentstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `street` varchar(50) NOT NULL,
  `baranggay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anniversary`
--
ALTER TABLE `anniversary`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `cartcontents`
--
ALTER TABLE `cartcontents`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `dalidoll`
--
ALTER TABLE `dalidoll`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `felix`
--
ALTER TABLE `felix`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `lebron`
--
ALTER TABLE `lebron`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `magatta`
--
ALTER TABLE `magatta`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `mamba`
--
ALTER TABLE `mamba`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `ordercontents`
--
ALTER TABLE `ordercontents`
  ADD PRIMARY KEY (`contentid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD UNIQUE KEY `orderid` (`orderid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`saleid`);

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
  MODIFY `contentid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orderhistory`
--
ALTER TABLE `orderhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `saleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userpayments`
--
ALTER TABLE `userpayments`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anniversary`
--
ALTER TABLE `anniversary`
  ADD CONSTRAINT `anniversary_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `products` (`itemid`);

--
-- Constraints for table `cartcontents`
--
ALTER TABLE `cartcontents`
  ADD CONSTRAINT `cartcontents_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `userdata` (`userid`),
  ADD CONSTRAINT `cartcontents_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `products` (`itemid`);

--
-- Constraints for table `dalidoll`
--
ALTER TABLE `dalidoll`
  ADD CONSTRAINT `dalidoll_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `products` (`itemid`);

--
-- Constraints for table `felix`
--
ALTER TABLE `felix`
  ADD CONSTRAINT `felix_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `products` (`itemid`);

--
-- Constraints for table `lebron`
--
ALTER TABLE `lebron`
  ADD CONSTRAINT `lebron_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `products` (`itemid`);

--
-- Constraints for table `magatta`
--
ALTER TABLE `magatta`
  ADD CONSTRAINT `magatta_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `products` (`itemid`);

--
-- Constraints for table `mamba`
--
ALTER TABLE `mamba`
  ADD CONSTRAINT `mamba_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `products` (`itemid`);

--
-- Constraints for table `ordercontents`
--
ALTER TABLE `ordercontents`
  ADD CONSTRAINT `ordercontents_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`),
  ADD CONSTRAINT `ordercontents_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `products` (`itemid`);

--
-- Constraints for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD CONSTRAINT `orderhistory_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`);

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
