-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2016 at 01:49 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `electronics`
--

-- --------------------------------------------------------

--
-- Table structure for table `addvertisement`
--

CREATE TABLE IF NOT EXISTS `addvertisement` (
  `add_ID` int(30) NOT NULL,
  `add_name` varchar(200) NOT NULL,
  `add_description` varchar(250) NOT NULL,
  `organization_name` varchar(200) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `entry_date` varchar(100) NOT NULL,
  `entry_timestamp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE IF NOT EXISTS `category_list` (
  `category_ID` int(25) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `Entry_Date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`category_ID`, `category_name`, `Entry_Date`) VALUES
(8, 'Motherboard', '0000-00-00'),
(11, 'Desktop', '0000-00-00'),
(14, 'Processor', '0000-00-00'),
(17, 'Mobile', '0000-00-00'),
(18, 'Monitor', '0000-00-00'),
(19, 'Computer', '0000-00-00'),
(21, 'Speaker', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_ID` int(30) NOT NULL,
  `category_ID` int(25) NOT NULL,
  `product_model` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `product_brand` varchar(50) NOT NULL,
  `Origin_country` varchar(30) NOT NULL,
  `Buying_price_BDT` int(25) NOT NULL,
  `Buying_price_USD` int(25) NOT NULL,
  `Selling_price_BDT` int(25) NOT NULL,
  `Selling_price_USD` int(25) NOT NULL,
  `product_full_image` varchar(250) NOT NULL,
  `product_image_1` varchar(250) NOT NULL,
  `product_image_2` varchar(250) NOT NULL,
  `product_image_3` varchar(250) NOT NULL,
  `entry_date` varchar(50) NOT NULL,
  `post_timestamp` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_ID`, `category_ID`, `product_model`, `product_description`, `product_brand`, `Origin_country`, `Buying_price_BDT`, `Buying_price_USD`, `Selling_price_BDT`, `Selling_price_USD`, `product_full_image`, `product_image_1`, `product_image_2`, `product_image_3`, `entry_date`, `post_timestamp`) VALUES
(6, 11, 'samsung1', 'hjukhj', 'hjk', 'jhkjh', 567, 567, 56756, 56756, '6.png', '6.png', '6.png', '6.png', '30-Jul-2016', '1910383200'),
(7, 17, 'hk1', 'gyj', 'ghj', 'gyhj', 5675, 567, 567, 567, '7.jpg', '7.jpg', '7.jpg', '7.jpg', '30-Jul-2016', '1910383200'),
(8, 11, 'Lenovo', 'Lenovo', 'Lenovo', 'USA', 50000, 50000, 50000, 50000, '8.jpg', '8.jpg', '8.jpg', '8.jpg', '30-Jul-2016', '1910383200'),
(9, 18, 'KLV 32 BX', 'Sony LED TV', 'Sony', 'Malyashia', 30000, 30000, 30000, 30000, '9.png', '9.png', '9.png', '9.png', '30-Jul-2016', '1910383200'),
(10, 11, 'Dell', 'Dell', 'Dell', 'Japan', 50000, 50000, 50000, 50000, '10.jpg', '10.jpg', '10.jpg', '10.jpg', '30-Jul-2016', '1910383200'),
(11, 17, 'Galaxy Note5 32GB (Verizon)', 'Get things done with the advanced S Pen. Jot down reminders, lists and schedules without waking the device. And S Pen features are easy to find from any screen or app with the Air Command menu.', 'SAMSUNG', 'USA', 40000, 40000, 40000, 40000, '11.png', '11.png', '11.png', '11.png', '30-Jul-2016', '1910383200');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addvertisement`
--
ALTER TABLE `addvertisement`
  ADD PRIMARY KEY (`add_ID`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addvertisement`
--
ALTER TABLE `addvertisement`
  MODIFY `add_ID` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `category_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_ID` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
