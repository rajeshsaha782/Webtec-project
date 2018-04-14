-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2017 at 07:09 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easylife_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `Invoice_Code` varchar(8) NOT NULL,
  `Member_ID` varchar(8) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(15) NOT NULL DEFAULT 'Pending',
  `Payment_Status` varchar(10) NOT NULL DEFAULT 'Not Paid',
  `Payment_Method` varchar(100) NOT NULL,
  `Shipping_Address` varchar(10000) NOT NULL,
  `Billing_Address` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Member_ID` varchar(8) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Type` int(1) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Active',
  `Member_Since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Last_Logged_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Total_Purchase` int(8) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Member_ID`, `Password`, `Name`, `Email`, `Type`, `Status`, `Member_Since`, `Last_Logged_in`, `Total_Purchase`) VALUES
('1', '123', 'Rajesh saha', 'rajesh@gmail.com', 1, 'Active', '2017-12-23 16:01:03', '2017-12-23 16:01:03', 0),
('2', '123', 'Robi Ullah', 'robi@gmail.com', 4, 'Active', '2017-12-23 16:01:50', '2017-12-23 16:01:50', 0),
('3', '123', 'Efti Chowdhury', 'efti@gmail.com', 1, 'Active', '2017-12-24 11:46:51', '2017-12-24 11:46:51', 0),
('4', '123', 'Rakibul Hossain', 'rakib@gmail.com', 1, 'Active', '2017-12-24 11:48:07', '2017-12-24 11:48:07', 0),
('7', '123', 'sayeed sazzad', 'sazzad@gmail.com', 4, 'Active', '2017-12-25 08:41:54', '2017-12-25 08:41:54', 0),
('8', '123', 'Reza Karim', 'reza@gmail.com', 4, 'Active', '2017-12-25 11:20:51', '2017-12-25 11:20:51', 0),
('9', '123', 'E C', 'e@gmail.com', 4, 'Active', '2017-12-25 12:21:40', '2017-12-25 12:21:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `Order_Code` varchar(8) NOT NULL,
  `Product_Code` varchar(8) NOT NULL,
  `Quantity` int(8) NOT NULL,
  `Invoice_Code` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product _Code` varchar(8) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `Quantity` int(8) NOT NULL,
  `Total_Sells` int(8) NOT NULL DEFAULT '0',
  `Price` float NOT NULL,
  `Last_Sold` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Catagory` varchar(30) NOT NULL,
  `Brand` varchar(30) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `Description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product _Code`, `Name`, `Quantity`, `Total_Sells`, `Price`, `Last_Sold`, `Catagory`, `Brand`, `Size`, `Description`) VALUES
('1', 'Woolen Jacket', 1, 0, 300, NULL, 'Gents Winter Collection', 'Eacstasy', 'L', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle.\r\nFully Export Quality. \r\nTwo layer woolen Jacket '),
('10', 'Women Hoody', 5, 0, 1200, NULL, 'Ladies Winter Collection', 'Yellow', 'L', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle.\r\nFully Export Quality. \r\nHigh Quality Rubber Print.\r\nLong Lasting color.Nicely Sewed.'),
('11', 'Kids Sweater', 5, 0, 400, NULL, 'Kids Winter Collection', 'Aarong', 'M', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle.\r\nFully Export Quality. \r\nHigh Quality Rubber Print.\r\nSweater'),
('12', 'Gavading pant', 6, 0, 750, NULL, 'Pant', 'Yellow', 'L', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle.\r\nFully Export Quality. \r\nHigh Quality Rubber Print.\r\nSweater'),
('13', 'Moyur Ear Rings', 3, 0, 320, NULL, 'Ear Rings', 'Aarong', 'L', 'Designable Moyur Ear Rings\r\nDesi Materials'),
('14', 'Leather Wallet', 3, 0, 1500, NULL, 'Money Bag', 'Eacstasy', 'L', 'Full Leather MoneyBag'),
('15', 'Men Shoes', 3, 0, 4000, NULL, 'Mens Footwear', 'Yellow', 'L', 'Comfort Leather Shoes\r\nEasy to Wear'),
('16', 'Women Purple Shoe', 4, 0, 3400, NULL, 'Womens Footwear', 'Eacstasy', 'M', 'Comfort Leather Shoes\r\nEasy to Wear\r\nElegance,Go with Every Outfit'),
('2', 'Woolen Jacket', 5, 0, 500, NULL, 'Gents Winter Collection', 'Eacstasy', 'S', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle.\r\nFully Export Quality. \r\nTwo layer woolen Jacket '),
('3', 'Leather Jacket', 33, 0, 123, NULL, 'Gents Winter Collection', 'Eacstasy', 'L', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle.\r\nFully Export Quality. \r\nOriginal Leather'),
('4', 'Kakashi T-shirt', 1, 0, 350, NULL, 'Shirt', 'Yellow', 'L', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle.\r\nFully Export Quality. \r\nHigh Quality Rubber Print.\r\nLong Lasting color.Nicely Sewed.'),
('5', 'One Piece T-Shirt', 5, 0, 350, NULL, 'Shirt', 'Yellow', 'S', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle.\r\nFully Export Quality. \r\nHigh Quality Rubber Print.\r\nLong Lasting color.Nicely Sewed.'),
('6', 'Linen Frok', 5, 0, 500, NULL, 'Frok', 'Eacstasy', 'M', 'High Quality Fabric: 150-180\r\nStitch\r\n100% Cotton'),
('7', 'Scythe T-Shirt', 5, 0, 400, NULL, 'T-Shirt', 'Aarong', 'L', 'High Quality Fabric: 150-180\r\nStitch\r\n100% Cotton'),
('8', 'Hijab', 4, 0, 150, NULL, 'Hijab And Dupatta', 'Yellow', 'S', 'Balck Colored Hijab\r\nPure Cotton.'),
('9', 'Saree', 3, 0, 1000, NULL, 'Saree', 'Aarong', 'L', 'Pure Cotton Saree'),
('17', 'Women Black Jacket', 3, 0, 1500, NULL, 'wbj.jpg', 'Ladies Winter Collection', 'Eacstasy', 'L', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle. Fully Export Quality. High Quality Rubber Print. Long Lasting color.Nicely Sewed.'),
('18', 'Women Long Coat', 2, 0, 1700, NULL, 'wlc.jpg', 'Ladies Winter Collection', 'Yellow', 'M', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle. Fully Export Quality. High Quality Rubber Print. Long Lasting color.Nicely Sewed.'),
('19', 'Kids Jacket', 4, 0, 600, NULL, '', 'Kids Winter Collection', 'Eacstasy', 'S', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle. Fully Export Quality. High Quality Rubber Print. Sweater'),
('20', 'Kameez', 6, 0, 1200, NULL, '', 'Three Piece', 'Aarong', 'M', 'Pure Cotton Three Piece'),
('21', 'Panjabi', 5, 0, 1100, NULL, '', 'Panjabi', 'Aarong', 'L', 'High quality hand stiched panjabi.'),
('22', 'Fasttrack Sunglass', 5, 0, 200, NULL, '', 'Sunglass', 'Eacstasy', 'S', 'High quality imported sunglass'),
('23', 'Rayban Sunglass', 4, 0, 300, NULL, '', 'Sunglass', 'Easy', 'S', 'High quality imported sunglass'),
('24', 'Emporio Watch', 3, 0, 1400, NULL, '', 'Watch', 'Eacstasy', 'S', 'Exclusive Emporio Armani Watch.'),
('25', 'Digital Watch', 6, 0, 1100, NULL, '', 'Watch', 'Yellow', 'S', 'Exclusive digital Watch.'),
('26', 'MVMT Watch', 3, 0, 1300, NULL, '', 'Watch', 'Easy', 'S', 'EXclusive MVMT watch.'),
('27', 'Diamond Necklace', 1, 0, 5000, NULL, '', 'Necklace', 'Aarong', 'M', 'Artificial diamond necklace.'),
('28', 'Heart Necklace', 3, 0, 2000, NULL, '', 'Necklace', 'Eacstasy', 'S', 'Imported heart shaped necklace.'),
('29', 'MK Bag', 3, 0, 1800, NULL, '', 'Bag', 'Eacstasy', 'M', 'Exclusive import quality MK bag.'),
('30', 'Sport Trouser', 5, 0, 400, NULL, '', 'Trouser', 'Easy', 'M', 'High quality cotton trouser.'),
('31', 'Nike Cap', 7, 0, 250, NULL, '', 'Cap', 'Easy', 'S', 'High quality imported cap.'),
('32', 'Kids Shoes', 8, 0, 1250, NULL, '', 'Kids Footwear', 'Eacstasy', 'S', 'High quality imported shoes for kids.');



-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `Report_Code` varchar(8) NOT NULL,
  `Report_Title` varchar(30) NOT NULL,
  `Member_ID` varchar(8) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` tinyint(1) NOT NULL DEFAULT '0',
  `Description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Invoice_Code`),
  ADD KEY `invoice_of_member` (`Member_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Member_ID`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`Order_Code`),
  ADD KEY `order_of_product` (`Product_Code`),
  ADD KEY `order_of_invoice` (`Invoice_Code`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product _Code`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`Report_Code`),
  ADD KEY `report_of_member` (`Member_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_of_member` FOREIGN KEY (`Member_ID`) REFERENCES `member` (`Member_ID`) ON DELETE NO ACTION;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_of_invoice` FOREIGN KEY (`Invoice_Code`) REFERENCES `invoice` (`Invoice_Code`) ON DELETE NO ACTION,
  ADD CONSTRAINT `order_of_product` FOREIGN KEY (`Product_Code`) REFERENCES `product` (`Product _Code`) ON DELETE NO ACTION;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_of_member` FOREIGN KEY (`Member_ID`) REFERENCES `member` (`Member_ID`) ON DELETE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
