CREATE TABLE `orderdetails` (
  `orderdetailid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `orderdetails` (`orderdetailid`, `orderid`, `productname`, `quantity`) VALUES
(1, 22, 'Product A', 5),
(2, 22, 'Product B', 3);

ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderdetailid`),
  ADD KEY `orderid` (`orderid`),
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`);

GRANT ALL PRIVILEGES ON krookedweb.* TO 'admin'@'localhost' IDENTIFIED BY 'your_password';
FLUSH PRIVILEGES;
