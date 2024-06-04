-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 11:51 AM
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
-- Dumping data for table `userpayments`
--

INSERT INTO `userpayments` (`paymentid`, `userid`, `gcashname`, `gcashnum`, `refnumber`, `paymentstatus`, `paymentstamp`, `street`, `baranggay`, `city`, `state`, `zipcode`) VALUES
(10, 3, 'Hans Dominic Arcilla', '09763430975', '1234567891', 'Pending', '2024-05-30 07:29:36', '3271 A. Mabini St.', 'Brgy. Poblacion', 'Makati City', 'Metro Manila', '1210');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `userpayments`
--
ALTER TABLE `userpayments`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userpayments`
--
ALTER TABLE `userpayments`
  ADD CONSTRAINT `userpayments_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `userdata` (`userid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
