-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 07:45 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

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
  `Phone` varchar(11) NOT NULL DEFAULT '0',
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(15) NOT NULL DEFAULT 'Pending',
  `Payment_Status` varchar(10) NOT NULL DEFAULT 'Not Paid',
  `Payment_Method` varchar(100) NOT NULL,
  `Shipping_Address` varchar(10000) NOT NULL,
  `Billing_Address` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`Invoice_Code`, `Member_ID`, `Phone`, `Date`, `Status`, `Payment_Status`, `Payment_Method`, `Shipping_Address`, `Billing_Address`) VALUES
('10', '2', 'w', '2017-12-27 15:03:01', 'Pending', 'Not Paid', 'Cash On Delivery', 'ww', 'ww'),
('11', '2', 'ww', '2017-12-27 15:03:32', 'Pending', 'Not Paid', 'Cash On Delivery', 'ww', 'ww'),
('12', '2', 'ee', '2017-12-27 15:04:42', 'Pending', 'Not Paid', 'Cash On Delivery', 'ee', 'ee'),
('13', '2', 'w', '2017-12-27 15:05:55', 'Pending', 'Not Paid', 'Cash On Delivery', 'w', 'w'),
('14', '2', 'ss', '2017-12-27 15:11:35', 'Pending', 'Not Paid', 'Cash On Delivery', 'ss', 'ss'),
('15', '2', 'ee', '2017-12-27 15:12:16', 'Pending', 'Not Paid', 'Cash On Delivery', 'ee', 'ee'),
('16', '2', 's', '2017-12-27 15:12:39', 'Pending', 'Not Paid', 'Cash On Delivery', 's', 's'),
('17', '2', 's', '2017-12-27 15:13:18', 'Pending', 'Not Paid', 'Cash On Delivery', 's', 's'),
('18', '2', 's', '2017-12-27 15:18:31', 'Pending', 'Not Paid', 'Cash On Delivery', 's', 's'),
('19', '2', 'ee', '2017-12-27 15:18:42', 'Pending', 'Not Paid', 'Cash On Delivery', 'ee', 'ee'),
('2', '2', '01690802161', '2017-12-27 14:16:23', 'Pending', 'Not Paid', 'Cash On Delivery', 'dhaka', 'dhaka'),
('20', '2', 'ww', '2017-12-27 15:19:06', 'Pending', 'Not Paid', 'Cash On Delivery', 'ww', 'ww'),
('21', '2', 'ss', '2017-12-27 15:19:31', 'Pending', 'Not Paid', 'Cash On Delivery', 'ss', 'ss'),
('22', '2', 'ss', '2017-12-27 15:24:50', 'Pending', 'Not Paid', 'Cash On Delivery', 'ss', 'ss'),
('25', '2', 'dd', '2017-12-27 15:27:40', 'Pending', 'Not Paid', 'Cash On Delivery', 'dd', 'dd'),
('26', '2', 'ee', '2017-12-27 15:28:42', 'Pending', 'Not Paid', 'Cash On Delivery', 'ee', 'ee'),
('27', '2', 's', '2017-12-27 15:29:47', 'Pending', 'Not Paid', 'Cash On Delivery', 's', 's'),
('28', '2', 's', '2017-12-27 15:33:01', 'Pending', 'Not Paid', 'Cash On Delivery', 's', 's'),
('29', '2', 'dd', '2017-12-27 15:34:24', 'Pending', 'Not Paid', 'Cash On Delivery', 'dd', 'dd'),
('3', '2', '01690802161', '2017-12-27 14:19:57', 'Pending', 'Not Paid', 'Cash On Delivery', 'ss', 'ss'),
('30', '2', 'ee', '2017-12-27 15:38:15', 'Pending', 'Not Paid', 'Cash On Delivery', 'ee', 'ee'),
('31', '2', 'xx', '2017-12-27 15:39:15', 'Pending', 'Not Paid', 'Cash On Delivery', 'xx', 'xx'),
('32', '2', 'ss', '2017-12-27 15:40:21', 'Pending', 'Not Paid', 'Cash On Delivery', 'ss', 'ss'),
('33', '2', 'ww', '2017-12-27 15:44:17', 'Pending', 'Not Paid', 'Cash On Delivery', 'ww', 'ww'),
('34', '2', 'ww', '2017-12-27 15:45:29', 'Pending', 'Not Paid', 'Cash On Delivery', 'ww', 'ww'),
('35', '2', 'ee', '2017-12-27 16:14:13', 'Pending', 'Not Paid', 'Cash On Delivery', 'ee', 'ee'),
('4', '2', '01690802161', '2017-12-27 14:23:55', 'Pending', 'Not Paid', 'Cash On Delivery', 'eee', 'eee'),
('5', '2', 'ww', '2017-12-27 14:49:52', 'Pending', 'Not Paid', 'Cash On Delivery', 'ww', 'ww'),
('6', '2', 'ww', '2017-12-27 14:51:16', 'Pending', 'Not Paid', 'Cash On Delivery', 'ww', 'ww'),
('7', '2', '01690802161', '2017-12-27 14:59:16', 'Pending', 'Not Paid', 'bkash', 'ww', 'ww'),
('8', '2', 'w', '2017-12-27 15:00:53', 'Pending', 'Not Paid', 'Cash On Delivery', 'ww', 'ww'),
('9', '2', 'w', '2017-12-27 15:02:50', 'Pending', 'Not Paid', 'Cash On Delivery', 'ww', 'ww');

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
('1', '123', 'Rajesh saha', 'r@gmail.com', 1, 'Active', '2017-12-23 16:01:03', '2017-12-27 18:42:26', 0),
('2', '123', 'Rajesh', 'r4@gmail.com', 4, 'Active', '2017-12-23 16:01:50', '2017-12-26 14:21:20', 0),
('3', '123', 'efti', 'e@gmail.com', 1, 'Active', '2017-12-24 11:46:51', '2017-12-24 11:46:51', 0),
('4', '123', 'Rakib', 'rakib@gmail.com', 1, 'Active', '2017-12-24 11:48:07', '2017-12-24 11:48:07', 0),
('5', '123', 'robi ullah', 'robi@gmail.com', 4, 'Active', '2017-12-27 14:38:50', '2017-12-27 14:38:50', 0),
('6', '123', 'reza ul', 'reza@gmail.com', 4, 'Active', '2017-12-27 14:42:10', '2017-12-27 14:42:10', 0);

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

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`Order_Code`, `Product_Code`, `Quantity`, `Invoice_Code`) VALUES
('10', '4', 1, '7'),
('11', '1', 1, '8'),
('12', '4', 1, '8'),
('13', '1', 1, '9'),
('14', '4', 1, '9'),
('15', '1', 1, '10'),
('16', '4', 1, '10'),
('17', '1', 1, '11'),
('18', '4', 1, '11'),
('19', '2', 1, '12'),
('2', '1', 1, '2'),
('20', '2', 1, '13'),
('21', '1', 1, '14'),
('22', '4', 1, '14'),
('23', '1', 1, '15'),
('24', '4', 1, '15'),
('25', '1', 1, '18'),
('26', '4', 1, '18'),
('27', '1', 1, '19'),
('28', '4', 1, '19'),
('29', '1', 1, '20'),
('3', '1', 1, '3'),
('30', '4', 1, '20'),
('31', '1', 1, '21'),
('32', '4', 1, '21'),
('33', '1', 1, '22'),
('34', '4', 1, '22'),
('37', '2', 1, '25'),
('38', '3', 1, '26'),
('39', '2', 1, '26'),
('4', '1', 1, '4'),
('40', '3', 1, '27'),
('41', '1', 1, '27'),
('42', '5', 1, '27'),
('43', '3', 1, '28'),
('44', '5', 0, '28'),
('45', '2', 1, '29'),
('46', '5', 1, '29'),
('47', '1', 1, '30'),
('48', '4', 1, '30'),
('49', '2', 1, '31'),
('5', '1', 1, '5'),
('50', '3', 1, '31'),
('51', '2', 1, '32'),
('52', '3', 1, '32'),
('53', '2', 1, '33'),
('54', '1', 1, '33'),
('55', '2', 1, '34'),
('56', '1', 1, '34'),
('57', '2', 1, '35'),
('58', '3', 1, '35'),
('6', '4', 1, '5'),
('7', '1', 1, '6'),
('8', '4', 1, '6'),
('9', '1', 1, '7');

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
  `Image` varchar(8) NOT NULL,
  `Catagory` varchar(30) NOT NULL,
  `Brand` varchar(30) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `Description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product _Code`, `Name`, `Quantity`, `Total_Sells`, `Price`, `Last_Sold`, `Image`, `Catagory`, `Brand`, `Size`, `Description`) VALUES
('1', 'p', 100, 0, 123, '0000-00-00 00:00:00', '', 'Gents Winter Collection', 'Easy', 'L', ''),
('2', 'q', 13, 0, 222, '0000-00-00 00:00:00', '2', 'Gents Winter Collection', 'Easy', 'S', ''),
('3', 's', 27, 0, 123, '0000-00-00 00:00:00', 's', 'Gents Winter Collection', 'Easy', 'S', ''),
('4', 'a', 99, 0, 11, '2017-12-27 15:37:37', 'a', 'Gents Winter Collection', '', '', ''),
('5', 'b', 42, 0, 44, '0000-00-00 00:00:00', 'b', 'Gents Winter Collection', '', '', ''),
('6', 'c', 44, 0, 0, NULL, '', 'Gents Winter Collection', '', '', ''),
('7', 'd', 33, 0, 22, NULL, '', 'Gents Winter Collection', '', '', ''),
('8', 'e', 33, 0, 33, NULL, '', 'Gents Winter Collection', '', '', ''),
('9', 'f', 33, 0, 33, NULL, '', 'Gents Winter Collection', '', '', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(10) NOT NULL,
  `Product_code` varchar(10) NOT NULL,
  `Review` int(10) NOT NULL,
  `NoOFReviewer` int(10) NOT NULL
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
