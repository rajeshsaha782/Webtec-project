-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2017 at 02:30 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
('1', '2', 'sadd', '2017-12-27 19:49:08', 'Pending', 'Not Paid', 'Cash On Delivery', 'sadasd', 'sadasd');

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
('1', '123', 'Rajesh saha', 'rajesh@gmail.com', 1, 'Active', '2017-12-23 16:01:03', '2017-12-26 12:39:08', 0),
('2', '123', 'Robi Ullah', 'robi@gmail.com', 4, 'Active', '2017-12-23 16:01:50', '2017-12-23 16:01:50', 360),
('3', '123', 'Efti Chowdhury', 'efti@gmail.com', 1, 'Active', '2017-12-24 11:46:51', '2017-12-27 19:53:47', 0),
('4', '123', 'Rakibul Hossain', 'rakib@gmail.com', 1, 'Active', '2017-12-24 11:48:07', '2017-12-27 14:15:27', 0),
('7', '123', 'sayeed sazzad', 'sazzad@gmail.com', 4, 'Active', '2017-12-25 08:41:54', '2017-12-25 08:41:54', 0),
('8', '123', 'Reza Karim', 'reza@gmail.com', 4, 'Active', '2017-12-25 11:20:51', '2017-12-25 11:20:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `Order_Code` varchar(8) NOT NULL,
  `Product_Code` varchar(8) NOT NULL,
  `Quantity` int(8) NOT NULL,
  `Invoice_Code` varchar(8) NOT NULL,
  `Customer_Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`Order_Code`, `Product_Code`, `Quantity`, `Invoice_Code`, `Customer_Email`) VALUES
('1', '1', 1, '1', '');

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
('1', 'Woolen Jacket', 0, 0, 300, '0000-00-00 00:00:00', 'Gents Winter Collection', 'Eacstasy', 'L', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle.\r\nFully Export Quality. \r\nTwo layer woolen Jacket '),
('10', 'Women Hoody', 5, 0, 1200, NULL, 'Ladies Winter Collection', 'Yellow', 'L', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle.\r\nFully Export Quality. \r\nHigh Quality Rubber Print.\r\nLong Lasting color.Nicely Sewed.'),
('100', 'bag4', 12, 0, 250, NULL, 'Money Bag', 'Eacstasy', 'L', 'Original leather'),
('101', 'bag6', 12, 0, 250, NULL, 'Money Bag', 'Yellow', 'L', 'Original leather'),
('102', 'bag7', 12, 0, 250, NULL, 'Money Bag', 'Yellow', 'L', 'Original leather'),
('103', 'bag8', 12, 0, 250, NULL, 'Money Bag', 'Eacstasy', 'L', 'Original leather'),
('104', 'shoe1', 12, 0, 2500, NULL, 'Mens Footwear', 'Eacstasy', 'L', 'Original leather'),
('105', 'shoe11', 12, 0, 2500, NULL, 'Footwear', 'Eacstasy', 'L', 'Original leather'),
('106', 'shoe2', 12, 0, 2500, NULL, 'Footwear', 'Eacstasy', 'L', 'Original leather'),
('107', 'shoe22', 12, 0, 2500, NULL, 'Mens Footwear', 'Eacstasy', 'L', 'Original leather'),
('108', 'shoe3', 12, 0, 2500, NULL, 'Womens Footwear', 'Eacstasy', 'L', 'Original leather'),
('109', 'shoe33', 12, 0, 2500, NULL, 'Footwear', 'Eacstasy', 'L', 'Original leather'),
('11', 'Kids Sweater', 5, 0, 400, NULL, 'Kids Winter Collection', 'Aarong', 'M', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle.\r\nFully Export Quality. \r\nHigh Quality Rubber Print.\r\nSweater'),
('110', 'shoe34', 12, 0, 2500, NULL, 'Womens Footwear', 'Eacstasy', 'L', 'Original leather'),
('111', 'shoe24', 12, 0, 2500, NULL, 'Footwear', 'Eacstasy', 'L', 'Original leather'),
('112', 'shoe4', 12, 0, 2400, NULL, 'Mens Footwear', 'Eacstasy', 'L', 'Original leather'),
('113', 'shoe5', 12, 0, 2400, NULL, 'Mens Footwear', 'Eacstasy', 'L', 'Original leather'),
('114', 'shoe6', 12, 0, 2400, NULL, 'Mens Footwear', 'Eacstasy', 'L', 'Original leather'),
('115', 'shoe66', 12, 0, 2400, NULL, 'Womens Footwear', 'Eacstasy', 'L', 'Original leather'),
('116', 'shoe67', 12, 0, 2400, NULL, 'Womens Footwear', 'Eacstasy', 'L', 'Original leather'),
('117', 'shoe68', 12, 0, 2400, NULL, 'Womens Footwear', 'Eacstasy', 'L', 'Original leather'),
('118', 'shoe9', 12, 0, 1200, NULL, 'Kids Footwear', 'Easy', 'L', 'Original leather'),
('119', 'shoe10', 12, 0, 1200, NULL, 'Footwear', 'Easy', 'L', 'Original leather'),
('12', 'Gavading pant', 6, 0, 750, NULL, 'Pant', 'Yellow', 'L', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle.\r\nFully Export Quality. \r\nHigh Quality Rubber Print.\r\nSweater'),
('120', 'shoe101', 12, 0, 1200, NULL, 'Footwear', 'Easy', 'L', 'Original leather'),
('121', 'shoe111', 12, 0, 1200, NULL, 'Kids Footwear', 'Easy', 'L', 'Original leather'),
('122', 'shoe13', 12, 0, 1200, NULL, 'Kids Footwear', 'Easy', 'L', 'Original leather'),
('123', 'shoe31', 12, 0, 1200, NULL, 'Kids Footwear', 'Yellow', 'L', 'Original leather'),
('124', 'shoe32', 12, 0, 500, NULL, 'Kids Footwear', 'Yellow', 'L', 'Original leather'),
('125', 'shoe3323', 12, 0, 500, NULL, 'Kids Footwear', 'Eacstasy', 'L', 'Original leather'),
('13', 'Moyur Ear Rings', 3, 0, 320, NULL, 'Ear Rings', 'Aarong', 'L', 'Designable Moyur Ear Rings\r\nDesi Materials'),
('14', 'Leather Wallet', 3, 0, 1500, NULL, 'Money Bag', 'Eacstasy', 'L', 'Full Leather MoneyBag'),
('15', 'Men Shoes', 3, 0, 4000, NULL, 'Mens Footwear', 'Yellow', 'L', 'Comfort Leather Shoes\r\nEasy to Wear'),
('16', 'Women Purple Shoe', 4, 0, 3400, NULL, 'Womens Footwear', 'Eacstasy', 'M', 'Comfort Leather Shoes\r\nEasy to Wear\r\nElegance,Go with Every Outfit'),
('17', 'Full Sleeve Tshirt', 12, 0, 350, NULL, 'Gents Winter Collection', 'Easy', 'L', 'Stitch T shirt'),
('18', 'Full Sleeve T-Shirt', 23, 0, 350, NULL, 'Gents Winter Collection', 'Yellow', 'S', 'Full Stitch T-Shirt'),
('19', 'Full Sleeve T-shirt', 15, 0, 350, NULL, 'Gents Winter Collection', 'Easy', 'M', 'Comfortable and 100% cotton.'),
('2', 'Woolen Jacket', 5, 0, 500, NULL, 'Gents Winter Collection', 'Eacstasy', 'S', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle.\r\nFully Export Quality. \r\nTwo layer woolen Jacket '),
('20', 'Long Tunik', 12, 0, 1000, NULL, 'Ladies Winter Collection', 'Aarong', 'S', 'Woolen and Unstitch'),
('21', 'Long Tunic', 12, 0, 1000, NULL, 'Ladies Winter Collection', 'Easy', 'S', 'Unstitch and Light weight'),
('22', 'Fluffy Jacket', 12, 0, 500, NULL, 'Ladies Winter Collection', 'Easy', 'S', 'Comfortable and Smooth Fabrics'),
('23', 'Jacket', 12, 0, 234, NULL, 'Ladies Winter Collection', 'Local', 'S', 'Unstitch and heavy duty. Easy to wash'),
('24', 'Woolen Sweater', 12, 0, 1200, NULL, 'Gents Winter Collection', 'Easy', 's', '!00 % made of Wool'),
('25', 'Hijab 2', 12, 0, 200, NULL, 'Hijab And Dupatta', 'Easy', 'S', '!00% Cotton and Smooth Fabric'),
('26', 'Hijab3', 21, 0, 234, NULL, 'Hijab And Dupatta', 'Aarong', 'S', 'Smooth Finishing And 100% cotton'),
('27', 'Scurf', 12, 0, 1200, NULL, 'Hijab And Dupatta', 'Eacstasy', 'S', 'Smooth Finishing And 100% cotton'),
('28', 'Dupatta', 12, 0, 1200, NULL, 'Hijab And Dupatta', 'Eacstasy', 'S', 'Smooth Finishing And 100% cotton'),
('29', 'Niqab', 12, 0, 1200, NULL, 'Hijab And Dupatta', 'Yellow', 'S', 'Smooth Finishing And 100% cotton'),
('3', 'Leather Jacket', 33, 0, 123, NULL, 'Gents Winter Collection', 'Eacstasy', 'L', 'High Quality Fabric: 150-180 GSM.Anti-Wrinkle.\r\nFully Export Quality. \r\nOriginal Leather'),
('30', 'Green saree', 2, 0, 12000, NULL, 'Saree', 'Aarong', 'L', 'Smooth Finishing And 100% cotton'),
('31', 'Katan Saree', 2, 0, 12000, NULL, 'Saree', 'Aarong', 'L', 'Smooth Finishing And 100% cotton'),
('32', 'Jorget Saree', 2, 0, 13000, NULL, 'Saree', 'Yellow', 'L', 'Smooth Finishing And 100% cotton'),
('33', 'Shiffon Saree', 2, 0, 12500, NULL, 'Saree', 'Eacstasy', 'L', 'Smooth Finishing And 100% cotton'),
('34', 'saree 2', 23, 0, 11000, NULL, 'Saree', 'Eacstasy', 'S', 'Smooth Finishing And 100% cotton'),
('35', 'Red saree', 2, 0, 12000, NULL, 'Womens Clothing', 'Eacstasy', 'L', 'Smooth Finishing And 100% cotton'),
('36', 'Black Shirt', 12, 0, 1232, NULL, 'Shirt', 'Easy', 'S', 'Smooth Finishing And 100% cotton'),
('37', 'Blue Shirt', 2, 0, 1232, NULL, 'Shirt', 'Eacstasy', 'L', 'Smooth Finishing And 100% cotton'),
('38', 'Check shirt', 12, 0, 2314, NULL, 'Shirt', 'Eacstasy', 'S', 'Smooth Finishing And 100% cotton'),
('39', 'MaroonShirt', 12, 0, 1234, NULL, 'Shirt', 'Local', 'M', 'Smooth Finishing And 100% cotton'),
('40', 'Red Shirt', 12, 0, 2300, NULL, 'Shirt', 'Yellow', 'L', 'Smooth Finishing And 100% cotton'),
('41', 'Shirt 3', 12, 0, 1234, NULL, 'Shirt', 'Eacstasy', 'M', 'Smooth Finishing And 100% cotton'),
('42', 'Panjabi 1', 15, 0, 1200, NULL, 'Panjabi', 'Eacstasy', 'M', 'Smooth Finishing And 100% cotton'),
('43', 'Red Panjabi', 2, 0, 2500, NULL, 'Panjabi', 'Eacstasy', 'L', 'Smooth Finishing And 100% cotton'),
('44', 'White Panjabi', 30, 0, 1200, NULL, 'Panjabi', 'Yellow', 'L', 'Smooth Finishing And 100% cotton'),
('45', 'Blue Pnajabi', 12, 0, 1200, NULL, 'Shirt', 'Local', 'L', 'Smooth Finishing And 100% cotton'),
('46', 'Embrodari panjabi', 2, 0, 2600, NULL, 'Panjabi', 'Eacstasy', 'L', 'Smooth Finishing And 100% cotton'),
('47', 'blue panjabi', 12, 0, 1200, NULL, 'Panjabi', 'Eacstasy', 'L', 'Smooth Finishing And 100% cotton'),
('48', 'Panjabi', 12, 0, 1200, NULL, 'Panjabi', 'Yellow', 'L', 'Smooth Finishing And 100% cotton'),
('49', 'shirt 1', 12, 0, 1200, NULL, 'Mens Clothing', 'Eacstasy', 'L', 'Smooth Finishing And 100% cotton'),
('50', 'Black shirt', 12, 0, 1250, NULL, 'Mens Clothing', 'Easy', 'L', 'Smooth Finishing And 100% cotton'),
('51', 'Blue shirt', 12, 0, 1200, NULL, 'Mens Clothing', 'Yellow', 'L', 'Smooth Finishing And 100% cotton'),
('52', 'Panjabi ', 12, 0, 1200, NULL, 'Mens Clothing', 'Eacstasy', 'L', ''),
('53', 'saree1', 12, 0, 1200, NULL, 'Womens Clothing', 'Eacstasy', 'L', 'Smooth Finishing And 100% cotton'),
('54', 'green sareee', 2, 0, 1200, NULL, 'Womens Clothing', 'Eacstasy', 'L', 'Smooth Finishing And 100% cotton'),
('55', 'saree3', 21, 0, 12000, NULL, 'Womens Clothing', 'Eacstasy', 'M', 'Smooth Finishing And 100% cotton'),
('56', 'Kameez', 12, 0, 1200, NULL, 'Womens Clothing', 'Yellow', 'M', 'Smooth Finishing And 100% cotton'),
('57', 'Jacket 1', 4, 0, 1200, NULL, 'Kids Winter Collection', 'Eacstasy', 'M', 'Smooth Finishing And 100% cotton'),
('58', 'Jacket 2', 3, 0, 1300, NULL, 'Kids Winter Collection', 'Eacstasy', 'L', 'Smooth Finishing And 100% cotton'),
('59', 'jacket 3', 23, 0, 1400, NULL, 'Kids Winter Collection', 'Local', 's', 'Smooth Finishing And 100% cotton'),
('6', 'Linen Frok', 5, 0, 500, NULL, 'Frok', 'Eacstasy', 'M', 'High Quality Fabric: 150-180\r\nStitch\r\n100% Cotton'),
('60', 'jacket 4', 12, 0, 1260, NULL, 'Kids Winter Collection', 'Aarong', 'L', 'Smooth Finishing And 100% cotton'),
('61', 'jacket 5', 14, 0, 1350, NULL, 'Kids Winter Collection', 'Eacstasy', 'S', 'Smooth Finishing And 100% cotton'),
('62', 'Saree 4', 12, 0, 1200, NULL, 'Womens Clothing', 'Eacstasy', 'L', 'Smooth Finishing And 100% cotton'),
('63', 'hijab 5', 2, 0, 350, NULL, 'Hijab And Dupatta', 'Yellow', 'S', 'Smooth Finishing And 100% cotton'),
('64', 'Three piece 1', 22, 0, 1250, NULL, 'Three Piece', 'Eacstasy', 'S', 'Smooth Finishing And 100% cotton'),
('65', 'kameez 2', 3, 0, 1500, NULL, 'Three Piece', 'Yellow', 'S', 'Smooth Finishing And 100% cotton'),
('66', 'kameez 3', 2, 0, 1300, NULL, 'Three Piece', 'Eacstasy', 'S', 'Smooth Finishing And 100% cotton'),
('67', 'kameez 4', 5, 0, 1250, NULL, 'Three Piece', 'Yellow', 'S', 'Smooth Finishing And 100% cotton'),
('68', 'kameez 5', 2, 0, 1250, NULL, 'Three Piece', 'Yellow', 'L', 'Smooth Finishing And 100% cotton'),
('69', 'kameez 6', 33, 0, 3400, NULL, 'Three Piece', 'Local', 'S', 'Smooth Finishing And 100% cotton'),
('7', 'Scythe T-Shirt', 5, 0, 400, NULL, 'T-Shirt', 'Aarong', 'L', 'High Quality Fabric: 150-180\r\nStitch\r\n100% Cotton'),
('70', 'Pant 2', 23, 0, 1200, NULL, 'Trouser', 'Yellow', 'L', 'Smooth Finishing And 100% cotton'),
('71', 'trouser 1', 22, 0, 1200, NULL, 'Trouser', 'Eacstasy', 'S', 'Smooth Finishing And 100% cotton'),
('72', 'tshirt1', 12, 0, 350, NULL, 'T-Shirt', 'Eacstasy', 'S', 'Smooth Finishing And 100% cotton'),
('73', 'tshirt2', 22, 0, 350, NULL, 'T-Shirt', 'Eacstasy', 'L', 'Smooth Finishing And 100% cotton'),
('74', 'tshirt3', 2, 0, 350, NULL, 'T-Shirt', 'Eacstasy', 'L', 'Smooth Finishing And 100% cotton'),
('75', 'tshirt4', 33, 0, 350, NULL, 'T-Shirt', 'Yellow', 'S', 'Smooth Finishing And 100% cotton'),
('76', 'tshirt5', 12, 0, 350, NULL, 'T-Shirt', 'Yellow', 'S', 'Smooth Finishing And 100% cotton'),
('77', 'trouser3', 12, 0, 2300, NULL, 'Trouser', 'Eacstasy', 'S', 'Smooth Finishing And 100% cotton'),
('78', 'trouser4', 4, 0, 450, NULL, 'Trouser', 'Yellow', 'S', 'Smooth Finishing And 100% cotton'),
('79', 'trouser5', 22, 0, 1200, NULL, 'Trouser', 'Eacstasy', 'S', 'Smooth Finishing And 100% cotton'),
('80', 'trouser6', 11, 0, 340, NULL, 'Trouser', 'Eacstasy', 'L', 'Smooth Finishing And 100% cotton'),
('81', 'cap1', 12, 0, 250, NULL, 'Cap', 'Yellow', 'L', 'Smooth Finishing and Heavy duty.'),
('82', 'cap2', 14, 0, 250, NULL, 'Cap', 'Yellow', 'S', 'Smooth Finishing and Heavy duty.'),
('83', 'cap3', 15, 0, 250, NULL, 'Cap', 'Easy', 'S', 'Smooth Finishing and Heavy duty.'),
('84', 'cap4', 16, 0, 250, NULL, 'Cap', 'Eacstasy', 'L', 'Smooth Finishing and Heavy duty.'),
('85', 'cap5', 16, 0, 250, NULL, 'Cap', 'Eacstasy', 'L', 'Smooth Finishing and Heavy duty.'),
('86', 'cap6', 12, 0, 250, NULL, 'Cap', 'Eacstasy', 'S', 'Smooth Finishing and Heavy duty.'),
('87', 'erings1', 2, 0, 1000, NULL, 'Ear Rings', 'Yellow', 'L', 'Heavy diamond with coated ruby.'),
('88', 'eri', 2, 0, 1000, NULL, 'Accessories', 'Aarong', 'L', 'Heavy diamond with coated ruby.'),
('89', 'er2', 22, 0, 240, NULL, 'Accessories', 'Eacstasy', 'L', 'Heavy diamond with coated ruby.'),
('9', 'Saree', 3, 0, 1000, NULL, 'Saree', 'Aarong', 'L', 'Pure Cotton Saree'),
('90', 'er22', 23, 0, 240, NULL, 'Ear Rings', 'Yellow', 'S', 'Heavy diamond with coated ruby.'),
('91', 'er3', 12, 0, 250, NULL, 'Accessories', 'Eacstasy', 'L', 'Heavy diamond with coated ruby.'),
('92', 'er33', 12, 0, 250, NULL, 'Ear Rings', 'Eacstasy', 'L', 'Heavy diamond with coated ruby.'),
('93', 'er4', 12, 0, 250, NULL, 'Ear Rings', 'Eacstasy', 'L', 'Heavy diamond with coated ruby.'),
('94', 'er5', 12, 0, 250, NULL, 'Ear Rings', 'Eacstasy', 'L', 'Heavy diamond with coated ruby.'),
('95', 'bag1', 12, 0, 250, NULL, 'Money Bag', 'Eacstasy', 'L', 'Original leather'),
('96', 'bag11', 12, 0, 250, NULL, 'Accessories', 'Eacstasy', 'L', 'Original leather'),
('97', 'bag2', 12, 0, 250, NULL, 'Accessories', 'Eacstasy', 'L', 'Original leather'),
('98', 'bag22', 12, 0, 250, NULL, 'Accessories', 'Yellow', 'L', 'Original leather'),
('99', 'bag3', 12, 0, 250, NULL, 'Accessories', 'Yellow', 'L', 'Original leather');

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
-- Dumping data for table `report`
--

INSERT INTO `report` (`Report_Code`, `Report_Title`, `Member_ID`, `Date`, `Status`, `Description`) VALUES
('1', 'Faulty Cloth', '1', '2017-12-25 18:00:00', 0, 'Faulty Cloth...'),
('2', 'Bad Quality', '1', '2017-12-26 11:51:48', 0, 'Not satisfied about the quality'),
('3', 'Good Serviece', '7', '2017-12-26 16:40:32', 0, 'Satisfied with your serviece');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
