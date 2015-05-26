-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2015 at 06:01 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE IF NOT EXISTS `attribute` (
  `a_id` int(11) NOT NULL,
  `a_name` text NOT NULL,
  `a_desc` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`a_id`, `a_name`, `a_desc`) VALUES
(1, 'warranty', 'years'),
(6, 'color', ''),
(7, 'weight', 'Grams'),
(8, 'Capacity', 'bytes'),
(9, 'PowerConsumption', 'watts'),
(10, 'length', 'meters'),
(14, 'camera', 'megapixsels'),
(16, 'hp', 'hp'),
(17, 'maxpower', 'watt'),
(18, 'doors', ''),
(19, 'material', ''),
(20, 'Zoom', ''),
(21, 'Display', 'size');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `b_ID` int(11) NOT NULL,
  `b_name` text NOT NULL,
  `b_logo` text NOT NULL,
  `b_des` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_ID`, `b_name`, `b_logo`, `b_des`) VALUES
(2, 'Nokia', 'Nokia.jpg', 'Mobile Phones'),
(5, 'Dell', 'Dell.jpg', 'd'),
(9, 'Fujitsu', 'Fujitsu.jpg', 'lap'),
(12, 'STA', 'STA.jpg', ''),
(14, 'logitec', 'logitec.jpg', 'd'),
(15, 'samsung', 'samsung.jpg', 'xx'),
(16, 'other', 'logo', 'no brand'),
(17, 'Yamaha', 'Yamaha.jpg', ''),
(18, 'casio', 'casio.jpg', ''),
(20, 'VSTARCAM ', 'VSTARCAM .jpg', ''),
(21, 'N/A', 'N/A', ''),
(23, 'A4Tech', 'A4Tech.jpg', 'made in Malasiya'),
(24, 'Sony', 'Sony.jpg', ''),
(25, 'Nikon', 'Nikon.jpg', ''),
(26, 'Canon', 'Canon.jpg', ''),
(27, 'acer', 'acer.jpg', ''),
(29, 'D-Link', 'D-Link.jpg', ''),
(30, 'Sanan 8', 'Sanan 8.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `caro`
--

CREATE TABLE IF NOT EXISTS `caro` (
  `id` int(11) NOT NULL,
  `pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caro`
--

INSERT INTO `caro` (`id`, `pr`) VALUES
(1, 230),
(2, 231),
(3, 232),
(4, 233),
(5, 241);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `crt_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `crt_tot` int(11) DEFAULT NULL,
  `stat` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`crt_ID`, `C_ID`, `crt_tot`, `stat`) VALUES
(26, 7, 21000, 1),
(63, 8, NULL, 1),
(66, 7, NULL, 1),
(67, 7, NULL, 1),
(68, 7, NULL, 1),
(69, 7, NULL, 1),
(70, 7, NULL, 1),
(71, 7, NULL, 1),
(72, 7, NULL, 1),
(73, 7, NULL, 1),
(74, 7, NULL, 1),
(75, 7, NULL, 1),
(76, 7, NULL, 1),
(77, 7, NULL, 1),
(78, 7, NULL, 1),
(79, 7, NULL, 1),
(87, 7, NULL, 1),
(90, 7, NULL, 1),
(91, 7, NULL, 1),
(94, 7, NULL, 1),
(95, 7, NULL, 1),
(96, 7, NULL, 1),
(97, 7, NULL, 1),
(103, 7, NULL, 1),
(104, 7, NULL, 1),
(105, 7, NULL, 1),
(106, 7, NULL, 1),
(107, 7, NULL, 1),
(108, 7, NULL, 1),
(109, 7, NULL, 1),
(110, 7, NULL, 0),
(111, 8, NULL, 1),
(112, 8, NULL, 1),
(113, 8, NULL, 1),
(114, 9, NULL, 1),
(115, 9, NULL, 1),
(116, 9, NULL, 1),
(117, 9, NULL, 1),
(118, 9, NULL, 1),
(119, 9, NULL, 1),
(120, 9, NULL, 1),
(121, 9, NULL, 1),
(122, 9, NULL, 1),
(123, 9, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE IF NOT EXISTS `cart_product` (
  `crt_ID` int(11) NOT NULL,
  `p_ID` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_product`
--

INSERT INTO `cart_product` (`crt_ID`, `p_ID`, `qty`) VALUES
(96, 235, 2),
(97, 237, 1),
(105, 231, 1),
(111, 231, 1),
(114, 233, 1),
(115, 231, 1),
(116, 232, 1),
(117, 233, 1),
(118, 235, 1),
(122, 231, 1),
(123, 250, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `c_ID` int(11) NOT NULL,
  `c_name` text NOT NULL,
  `c_desc` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_ID`, `c_name`, `c_desc`) VALUES
(3, 'Camera', ''),
(4, 'Hard Disk', ''),
(5, 'Laptop', ''),
(8, 'Speaker', ''),
(9, 'Electronics', ''),
(13, 'DVR', ''),
(15, 'Security management system', ''),
(18, 'Ups', ''),
(19, 'Power Supply', ''),
(21, 'Accessories ', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact`) VALUES
(1, '<address>\r\n<address><strong>Seculiink</strong><br />\r\n41/2A,Negambo Road,<br />\r\nKurunegala,Sri Lanka.<br />\r\nPhone:&nbsp;(+94)37 2223082&nbsp;<br />\r\nFax:&nbsp;(+94)37 2223082</address>\r\n\r\n<address><strong>Email</strong><br />\r\nSeculink@sltnet.lk<br />\r\n<strong>Web</strong><br />\r\nhttp://www.seculink.lk</address>\r\n</address>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `cus`
--

CREATE TABLE IF NOT EXISTS `cus` (
  `c_id` int(10) NOT NULL,
  `c_fname` text NOT NULL,
  `c_mname` text NOT NULL,
  `c_lname` text NOT NULL,
  `c_email` text NOT NULL,
  `c_dob` text NOT NULL,
  `c_tp` int(10) NOT NULL,
  `c_shaddr1` text NOT NULL,
  `c_shaddr2` text NOT NULL,
  `c_shaddr3` text NOT NULL,
  `c_baddr1` text NOT NULL,
  `c_baddr2` text NOT NULL,
  `c_baddr3` text NOT NULL,
  `un` varchar(11) NOT NULL,
  `pw` text NOT NULL,
  `type` int(11) NOT NULL,
  `cus_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cus`
--

INSERT INTO `cus` (`c_id`, `c_fname`, `c_mname`, `c_lname`, `c_email`, `c_dob`, `c_tp`, `c_shaddr1`, `c_shaddr2`, `c_shaddr3`, `c_baddr1`, `c_baddr2`, `c_baddr3`, `un`, `pw`, `type`, `cus_status`) VALUES
(7, 'Chinthaka', '--', 'Gomes', 'fe@gmail.com', '2014-08-06', 123456789, 'No.23,', 'Dahamana,Balangoda.', 'Sri Lanka', 'No.23,', 'Dahamana,Balangoda.', 'sri lanka', 'as', 'as', 0, 1),
(8, 'dd', 'dd', 'dd', 'ssa@adasd.com', '2014-09-17', 100000000, 'das', 'asd', '', 'asd', 'asd', '', 'qw', 'qw', 0, 1),
(9, 'Chinthaka', '', 'Gomes', 'chinthaka1250@gmail.com', '2015-02-09', 715496594, 'No.23,"Nisala"', 'Dahamana,Balangoda.', '', 'No.23,"Nisala"', 'Dahamana,Balangoda.', '', 'chint', '123', 0, 1),
(11, 'Chinthaka', 'cvxc', 'Gomes', 'chinthaksa1250@gmail.com', '2015-05-24', 715496594, 'No.23,"Nisala"', 'Dahamana,Balangoda.', '', 'No.23,"Nisala"', 'Dahamana,Balangoda.', '', 'd', 'as', 0, 1),
(12, 'Chinthaka', 'g', 'Gomes', 'chinthaka125d0@gmail.com', '2015-05-06', 715496594, 'No.23,', 'Dahamana,Balangoda.', '', 'No.23,', 'Dahamana,Balangoda.', '', 'n', 'n', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `inv_ID` int(11) NOT NULL,
  `sup_ID` int(11) NOT NULL,
  `su_name` text NOT NULL,
  `p_add_date` date NOT NULL,
  `total_price` int(11) NOT NULL,
  `total_pquantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_ID`, `sup_ID`, `su_name`, `p_add_date`, `total_price`, `total_pquantity`) VALUES
(8, 2, 'aa', '2015-05-20', 4343, 434343);

-- --------------------------------------------------------

--
-- Table structure for table `invtemp`
--

CREATE TABLE IF NOT EXISTS `invtemp` (
  `inv_ID` int(11) NOT NULL,
  `sup_name` text NOT NULL,
  `p_add_date` date NOT NULL,
  `total_price` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invtemp`
--

INSERT INTO `invtemp` (`inv_ID`, `sup_name`, `p_add_date`, `total_price`, `total_quantity`) VALUES
(9, '7', '2015-05-14', 242, 32);

-- --------------------------------------------------------

--
-- Table structure for table `invtemp2`
--

CREATE TABLE IF NOT EXISTS `invtemp2` (
  `p_id` int(11) NOT NULL,
  `u_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invtemp2`
--

INSERT INTO `invtemp2` (`p_id`, `u_price`, `quantity`) VALUES
(233, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `or_ID` int(11) NOT NULL,
  `crt_ID` int(11) NOT NULL,
  `c_ID` int(11) NOT NULL,
  `pay_ID` int(11) NOT NULL,
  `ship_ID` int(11) NOT NULL,
  `or_date` date DEFAULT NULL,
  `or_time` time NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`or_ID`, `crt_ID`, `c_ID`, `pay_ID`, `ship_ID`, `or_date`, `or_time`, `status`) VALUES
(47, 78, 7, 34, 10, '2014-10-31', '00:00:00', 'notconfirmed'),
(48, 79, 7, 35, 11, '2014-11-05', '00:00:00', 'notconfirmed'),
(58, 87, 7, 47, 23, '2014-11-12', '14:13:16', 'confirmed'),
(59, 90, 7, 48, 24, '2014-12-11', '11:02:53', 'confirmed'),
(60, 91, 7, 49, 25, '2015-01-11', '22:20:21', 'confirmed'),
(61, 94, 7, 50, 26, '2015-01-13', '00:00:22', 'not confirmed'),
(62, 95, 7, 51, 27, '2015-01-26', '17:15:22', 'not confirmed'),
(63, 96, 7, 55, 31, '2015-05-15', '14:34:07', 'not confirmed'),
(64, 97, 7, 56, 32, '2015-05-22', '21:51:46', 'not confirmed'),
(65, 103, 7, 57, 33, '2015-05-22', '21:52:09', 'not confirmed'),
(66, 104, 7, 58, 34, '2015-05-22', '21:53:01', 'not confirmed'),
(67, 105, 7, 59, 35, '2015-05-22', '21:55:19', 'not confirmed'),
(68, 106, 7, 60, 36, '2015-05-22', '22:04:09', 'not confirmed'),
(69, 107, 7, 61, 37, '2015-05-22', '22:05:14', 'not confirmed'),
(70, 108, 7, 62, 38, '2015-05-22', '22:18:45', 'not confirmed'),
(71, 109, 7, 63, 39, '2015-05-22', '22:19:12', 'confirmed'),
(72, 63, 8, 64, 40, '2015-05-23', '12:16:51', 'not confirmed'),
(73, 111, 8, 65, 41, '2015-05-23', '12:18:03', 'not confirmed'),
(74, 112, 8, 66, 42, '2015-05-23', '12:20:18', 'not confirmed'),
(75, 113, 8, 67, 43, '2015-05-23', '12:20:47', 'not confirmed'),
(76, 114, 9, 68, 44, '2015-05-23', '12:21:54', 'not confirmed'),
(77, 115, 9, 69, 45, '2015-05-23', '12:23:49', 'not confirmed'),
(78, 116, 9, 70, 46, '2015-05-23', '13:32:25', 'not confirmed'),
(79, 117, 9, 71, 47, '2015-05-23', '13:37:22', 'confirmed'),
(80, 118, 9, 72, 48, '2015-05-23', '13:43:25', 'confirmed'),
(81, 119, 9, 73, 49, '2015-05-23', '13:46:10', 'confirmed'),
(82, 120, 9, 74, 50, '2015-05-23', '19:05:18', 'confirmed'),
(83, 121, 9, 75, 51, '2015-05-23', '19:18:58', 'confirmed'),
(84, 122, 9, 76, 52, '2015-05-24', '22:14:04', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `pay-methods`
--

CREATE TABLE IF NOT EXISTS `pay-methods` (
  `paym_ID` int(11) NOT NULL,
  `paym_name` text NOT NULL,
  `paym_desc` mediumtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay-methods`
--

INSERT INTO `pay-methods` (`paym_ID`, `paym_name`, `paym_desc`) VALUES
(1, 'Bank Deposit', '<div><p style="font-size: 14px; line-height: 20px;">Bank Account Name:	Myshop Trading (Pvt) Ltd.</p><p style="font-size: 14px; line-height: 20px;">Account number:	#########</p><p style="font-size: 14px; line-height: 20px;">Bank:	Sampath Bank</p><p style="font-size: 14px; line-height: 20px;">Branch:	Boralesgamuwa Branch</p><p style="font-size: 14px; line-height: 20px;">Order Number will be available in My Account and New Order Emails Please send the Transaction Reference Number along with our Order Number to&nbsp;<a href="mailto:sales@myshop.com">sales@myshop.com</a></p></div>  <div><br></div><img src="../web/web/images/bankslip.jpg" alt="" align="none"> <div><br></div><div><br></div>'),
(2, 'Cash on delivary', '<p>National Identity Card Number:</p><input  name="p_desc" size="10" type="text" pattern="^[0-9]{9}[a-z]{1}$" required />'),
(3, 'Paypal', '<p>Paypal Methods</p><span style="color:#FF8C00">Under Construction</span>'),
(4, 'Credit Card', '<p>Credit Card Methods</p><span style="color:#FF8C00">Under Construction</span>'),
(5, 'EZY-Cash', '<p><h4>Dialog Number:</p><input maxlength="10" name="p_desc" pattern="^[0-9]{10}$" size="10" type="text" required/>');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `pay_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_time` time NOT NULL,
  `pay_amount` int(11) NOT NULL,
  `pay_desc` text NOT NULL,
  `paym_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_ID`, `C_ID`, `pay_date`, `pay_time`, `pay_amount`, `pay_desc`, `paym_ID`) VALUES
(1, 1, '2014-10-08', '00:00:00', 0, '', 1),
(2, 1, '2014-10-08', '00:00:00', 55, '', 2),
(3, 1, '2014-10-01', '00:00:00', 1, 'ff', 1),
(4, 1, '2014-10-30', '00:00:00', 1, 'ff', 5),
(6, 1, '2014-10-30', '00:00:00', 64855, 'ff', 5),
(7, 1, '2014-10-30', '00:00:00', 64855, 'ff', 1),
(8, 1, '2014-10-30', '00:00:00', 64855, 'ff', 1),
(9, 1, '2014-10-30', '00:00:00', 64855, 'ff', 1),
(10, 1, '2014-10-30', '00:00:00', 64855, 'ff', 1),
(11, 1, '2014-10-30', '00:00:00', 64855, 'ff', 1),
(12, 1, '2014-10-30', '00:00:00', 64855, 'ff', 1),
(13, 1, '2014-10-30', '00:00:00', 64855, 'ff', 1),
(14, 1, '2014-10-30', '00:00:00', 64855, 'ff', 2),
(15, 1, '2014-10-30', '00:00:00', 64855, 'ff', 1),
(16, 1, '2014-10-30', '00:00:00', 64855, 'ff', 1),
(17, 1, '2014-10-30', '00:00:00', 9000, 'ff', 5),
(18, 1, '2014-10-30', '00:00:00', 55855, 'ff', 5),
(19, 1, '2014-10-30', '00:00:00', 55855, 'ff', 5),
(20, 1, '2014-10-30', '00:00:00', 2300, 'ff', 2),
(21, 1, '2014-10-30', '00:00:00', 10000, 'ff', 2),
(22, 1, '2014-10-30', '00:00:00', 10000, 'ff', 5),
(23, 1, '2014-10-30', '00:00:00', 10000, 'ff', 1),
(24, 1, '2014-10-30', '00:00:00', 10300, 'ff', 1),
(25, 1, '2014-10-30', '00:00:00', 10300, 'ff', 1),
(26, 1, '2014-10-30', '00:00:00', 10000, 'ff', 3),
(28, 1, '2014-10-30', '00:00:00', 10300, 'ff', 5),
(29, 1, '2014-10-30', '00:00:00', 10300, 'ff', 5),
(30, 1, '2014-10-30', '00:00:00', 10000, 'ff', 5),
(31, 1, '2014-10-30', '00:00:00', 10000, 'ff', 5),
(32, 1, '2014-10-30', '00:00:00', 10000, 'ff', 5),
(33, 1, '2014-10-31', '00:00:00', 10002, 'ff', 1),
(34, 1, '2014-10-31', '00:00:00', 0, 'ff', 1),
(35, 1, '2014-11-05', '00:00:00', 45468, 'ff', 1),
(36, 1, '2014-11-05', '00:00:00', 2002, 'ff', 1),
(37, 1, '2014-11-05', '00:00:00', 45766, 'ff', 3),
(38, 1, '2014-11-05', '00:00:00', 100000, 'ff', 3),
(39, 1, '2014-11-05', '00:00:00', 300, 'ff', 5),
(40, 1, '2014-11-05', '00:00:00', 9300, 'ff', 4),
(41, 1, '2014-11-05', '16:55:01', 300, 'ff', 5),
(42, 1, '2014-11-05', '17:09:51', 54766, 'ff', 5),
(43, 1, '2014-11-05', '17:10:05', 54766, 'ff', 5),
(44, 1, '2014-11-05', '17:10:33', 550, 'ff', 5),
(45, 1, '2014-11-05', '17:11:26', 9300, 'ff', 2),
(46, 1, '2014-11-08', '23:19:42', 45766, 'ff', 4),
(47, 1, '2014-11-12', '14:13:16', 145466, 'ff', 1),
(48, 7, '2014-12-11', '11:02:53', 55766, 'ff', 5),
(49, 7, '2015-01-11', '22:20:20', 20000, 'ff', 2),
(50, 7, '2015-01-13', '00:00:21', 45466, 'ff', 1),
(51, 7, '2015-01-26', '17:15:22', 111732, 'ff', 1),
(52, 1, '2015-04-26', '21:33:31', 550, 'ff', 4),
(53, 1, '2015-04-26', '21:33:50', 250, 'ff', 4),
(54, 1, '2015-04-26', '21:37:40', 6000, 'ff', 4),
(55, 1, '2015-05-15', '14:34:07', 62000, 'ff', 1),
(56, 7, '2015-05-22', '21:51:46', 135300, '', 2),
(57, 7, '2015-05-22', '21:52:09', 30300, '', 2),
(58, 7, '2015-05-22', '21:53:01', 30300, '', 2),
(59, 7, '2015-05-22', '21:55:19', 24300, '234234', 2),
(60, 7, '2015-05-22', '22:04:09', 65300, 'dasd', 2),
(61, 7, '2015-05-22', '22:05:14', 30000, 'asfas', 2),
(62, 7, '2015-05-22', '22:18:45', 65300, '123456789v', 2),
(63, 7, '2015-05-22', '22:19:11', 190300, '123456789v', 2),
(64, 8, '2015-05-23', '12:16:51', 65300, '', 4),
(65, 8, '2015-05-23', '12:18:03', 24300, '', 4),
(66, 8, '2015-05-23', '12:20:18', 96300, '', 4),
(67, 8, '2015-05-23', '12:20:46', 96000, '', 4),
(68, 9, '2015-05-23', '12:21:54', 73000, '', 4),
(69, 9, '2015-05-23', '12:23:49', 24300, '3123213123', 5),
(70, 9, '2015-05-23', '13:32:25', 92100, 'N/A', 4),
(71, 9, '2015-05-23', '13:37:22', 73300, 'N/A', 4),
(72, 9, '2015-05-23', '13:43:25', 31300, 'N/A', 4),
(73, 9, '2015-05-23', '13:46:09', 30000, '3553534534', 5),
(74, 9, '2015-05-23', '19:05:17', 30300, 'N/A', 4),
(75, 9, '2015-05-23', '19:18:58', 30300, 'N/A', 4),
(76, 9, '2015-05-24', '22:14:04', 24300, 'N/A', 4);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `p_ID` int(11) NOT NULL,
  `cat_ID` int(11) NOT NULL,
  `B_ID` int(11) NOT NULL,
  `p_name` text NOT NULL,
  `p_modelno` text NOT NULL,
  `p_price` text NOT NULL,
  `p_qih` text NOT NULL,
  `p_reorderlvl` text NOT NULL,
  `p_image` text NOT NULL,
  `p_desc` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_ID`, `cat_ID`, `B_ID`, `p_name`, `p_modelno`, `p_price`, `p_qih`, `p_reorderlvl`, `p_image`, `p_desc`) VALUES
(231, 3, 26, 'Canon IXUS', '155', '24000', '3251', '2', '231.jpg', '<p>Shoot great group shots with ultra-wide 24mm or zoom in 20x closer without losing quality.</p>\r\n\r\n<p>*Easy viewing and sharing on 6.8 cm (2.7&rdquo;) LCD.</p>\r\n\r\n<p>*Get creative with Miniature, Fish-eye and Toy Camera Effects.</p>\r\n\r\n<p>*More shots per battery charge with Eco Mode.</p>\r\n'),
(232, 5, 9, 'Fujitsu Lifebook i5', 'LH532', '91800', '3', '2', '232.jpg', '3rd Generation***2.5GHz Processor up to 3.1GHz***2GB DDR3 RAM***500GB HDD'),
(233, 5, 27, 'acer Aspire', 'V3-371', '73000', '2', '2', '233.jpg', 'Intel Core i3-4030U processor***4GB of DDR3L system memory***500GB HDD'),
(235, 15, 29, 'Indoor Speed Dome IP Camera', 'DCS-6616', '31000', '3', '1', '235.jpg', 'Maximum Resolution : D1 (704 x 480)***Operating Temperature Range : 0Â° to 40Â° C***Power Options : Included Power Supply***Light Conditions : Day/Night IR Filter'),
(236, 15, 30, 'Sanan 8 Camera & DVR Kit', 'SA- 2121B-8', '135000', '3', '2', '236.jpg', '8-Channel DVR-01 unit***connectors (BNS/DC)***'),
(237, 13, 29, 'ONVIF Security system CCTV DVR ', 'JA-3218T', '10000', '4', '3', '237.jpg', 'OS-Linux***picture resolution D1***4'),
(238, 13, 20, 'VStarcam', 'TZ373', '30000', '4', '2', '238.jpg', 'Touch screen***2TB HDD***RAM/ROM: 1GB  DDR/4GB  Flash Memory***Built-in WIFI: 802.11.b/g/n'),
(239, 8, 17, 'Powered Speaker', 'MSR800W', '142000', '3', '1', '239.jpg', '15-inch Woofer in a Bass Reflex Enclosure***The Case For Built-in Power***80 to 100 Hz High-pass Filter'),
(240, 8, 15, 'Home theater system', 'HTD5580/98', '44900', '3', '1', '240.jpg', 'EasyLink (HDMI-CEC): Audio Return Channel, Automatic audio input mapping, One touch play, One touch standby, Remote Control-Passthrough, System standby'),
(241, 18, 29, 'Ups-1.32kv', 'PC-1200', '9400', '6', '2', '241.jpg', 'Waveform: Synchronized Stepped***Noise Filtering: EMI/RFI Full Time Suppression*** Frequency: 50HZÂ±1% or 60HZÂ±1%'),
(242, 19, 2, 'BTY', '23PT', '4000', '9', '3', '242.jpg', 'Output voltage: 12V, 30A***Suitable for supplying power for LED lights, LED billboards, security monitors, etc.'),
(243, 21, 14, 'Wireless Gaming Mouse', '1000/1200/1600dpi', '3000', '10', '4', '243.jpg', 'Support system=Win xp , Linux , Win 2000 , Win7 32 , Win7 64 , Win8 32 , MAC OS X***'),
(244, 15, 29, 'Fingerprint Reader', 'F18', '13000', '8', '2', '244.jpg', ' 1-touch 1-second employee recognition***Doorbell button with backlight as indicator***Support U-disk function up to 2GB'),
(245, 4, 15, '500gb Laptop Sata', 'Z5K500-500', '6300', '10', '4', '245.jpg', 'SATA interface'),
(246, 4, 5, '2TB External USB3.0', 'ST320005EXA101-RK', '16000', '6', '2', '246.jpg', 'Include the external power supply'),
(247, 9, 5, 'Laptop Battery (6m)', 'Dv4/Dv5', '6500', '10', '3', '247.jpg', 'Cell Type-Li-Ion***Cells:	6***Package Includes:	1 x Laptop Battery 4400mAh 11.1V for HP HSTNN-IB72'),
(248, 9, 16, 'Ups Battery-X (6m)', 'INw231', '3000', '10', '5', '248.jpg', 'Cycle use : 14.5-14.9v(25C)***Standby use : 13.6-13.8V (25C)'),
(249, 19, 16, 'Power Extention-borl 6way', '1003X', '1200', '8', '3', '249.jpg', 'Power Extension 6 Way'),
(250, 21, 14, 'Coolermaster X-lite(6m)', 'R9-NBC-XLIT-GP', '1400', '22', '2', '250.jpg', '<p>-Full range mesh and aerodynamic designed intake for great cooling performance</p>\r\n\r\n<p>-140 mm silent fan for superior airflow</p>\r\n\r\n<p>-Compatible with all&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `product_inv`
--

CREATE TABLE IF NOT EXISTS `product_inv` (
  `inv_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_uprice` int(11) NOT NULL,
  `p_pquantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_inv`
--

INSERT INTO `product_inv` (`inv_id`, `p_id`, `p_uprice`, `p_pquantity`) VALUES
(8, 231, 3223, 3232);

-- --------------------------------------------------------

--
-- Table structure for table `pro_att`
--

CREATE TABLE IF NOT EXISTS `pro_att` (
  `p_id` int(11) NOT NULL,
  `att_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pro_att`
--

INSERT INTO `pro_att` (`p_id`, `att_id`, `qty`, `value`) VALUES
(231, 1, 0, '2    '),
(231, 6, 0, 'gun metlic    '),
(231, 14, 0, '20    '),
(231, 20, 0, '20x    '),
(232, 1, 0, ' 2 '),
(232, 6, 0, ' Red and Blue '),
(232, 7, 0, ' 2.4 '),
(232, 14, 0, ' yes '),
(232, 21, 0, ' 14 '),
(233, 1, 0, '2 '),
(233, 6, 0, 'black '),
(233, 21, 0, '13.3'),
(235, 1, 0, '1 '),
(235, 6, 0, 'white '),
(235, 7, 0, '560 g '),
(235, 9, 0, '14 '),
(235, 10, 0, '3.8 to 45.6 mm '),
(235, 20, 0, '12x '),
(236, 1, 0, '1 '),
(236, 6, 0, 'white '),
(236, 9, 0, '20AMP '),
(237, 1, 0, '1 1/2 '),
(237, 6, 0, 'black '),
(237, 7, 0, '850g '),
(237, 9, 0, '12-15W '),
(237, 19, 0, 'ABS+Aluminium alloy  '),
(238, 1, 0, '1   '),
(238, 6, 0, 'black and white   '),
(238, 7, 0, ' 1320G  '),
(238, 9, 0, ' 5V  '),
(238, 10, 0, '10m   '),
(238, 14, 0, '1.0   '),
(238, 19, 0, 'ABS  '),
(239, 1, 0, '1  '),
(239, 6, 0, 'black  '),
(239, 7, 0, '45000  '),
(239, 9, 0, '800  '),
(240, 1, 0, '1 '),
(240, 6, 0, 'black '),
(240, 7, 0, '8000 '),
(240, 9, 0, '105 '),
(241, 1, 0, '1 '),
(241, 6, 0, 'Black and Silver '),
(241, 7, 0, '9500 '),
(241, 19, 0, 'plastic & alluminium '),
(242, 1, 0, '1/2'),
(242, 6, 0, 'Silver+Black +multi colored'),
(242, 7, 0, '810'),
(242, 19, 0, 'Alloy'),
(243, 1, 0, '1/2 '),
(243, 6, 0, 'black+red+white+pink '),
(243, 7, 0, '54 '),
(243, 19, 0, 'plastic '),
(244, 1, 0, '1/2 '),
(244, 6, 0, 'Silver '),
(244, 19, 0, 'ABS  '),
(244, 21, 0, '2.4'),
(245, 1, 0, '1 '),
(245, 7, 0, '120 '),
(246, 1, 0, '2  '),
(246, 6, 0, 'black  '),
(246, 7, 0, '1500  '),
(246, 8, 0, '2000000000  '),
(246, 10, 0, '208mm  '),
(247, 1, 0, '1/2'),
(247, 8, 0, '4400mAh'),
(248, 1, 0, '1/2 '),
(249, 6, 0, 'white '),
(250, 1, 0, '1/2   '),
(250, 6, 0, 'Black and Silver   '),
(250, 17, 0, ' 5  '),
(250, 19, 0, 'Metal, Plastic, and Rubber   ');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE IF NOT EXISTS `returns` (
  `re_id` int(11) NOT NULL,
  `or_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`re_id`, `or_id`, `reason`, `date`) VALUES
(5, 80, 'hjv', '2015-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `returnstemp2`
--

CREATE TABLE IF NOT EXISTS `returnstemp2` (
  `re_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returnstemp2`
--

INSERT INTO `returnstemp2` (`re_id`, `p_id`, `qty`) VALUES
(5, 235, 1);

-- --------------------------------------------------------

--
-- Table structure for table `returns_prod`
--

CREATE TABLE IF NOT EXISTS `returns_prod` (
  `re_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `r_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns_prod`
--

INSERT INTO `returns_prod` (`re_id`, `p_id`, `r_qty`) VALUES
(5, 235, 1);

-- --------------------------------------------------------

--
-- Table structure for table `returntemp`
--

CREATE TABLE IF NOT EXISTS `returntemp` (
  `P_ID` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returntemp`
--

INSERT INTO `returntemp` (`P_ID`, `qty`) VALUES
(233, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipmethod`
--

CREATE TABLE IF NOT EXISTS `shipmethod` (
  `shipm_ID` int(11) NOT NULL,
  `shipm_name` text NOT NULL,
  `shipm_desc` text NOT NULL,
  `shipm_cost` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipmethod`
--

INSERT INTO `shipmethod` (`shipm_ID`, `shipm_name`, `shipm_desc`, `shipm_cost`) VALUES
(1, 'Free', 'postal service', 0),
(2, 'FlatRate', 'courier service', 300);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE IF NOT EXISTS `shipping` (
  `ship_ID` int(11) NOT NULL,
  `shipm_ID` int(11) NOT NULL,
  `ship_desc` text NOT NULL,
  `ship_date` datetime NOT NULL,
  `ship_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`ship_ID`, `shipm_ID`, `ship_desc`, `ship_date`, `ship_status`) VALUES
(1, 1, '', '2015-05-22 00:00:00', 1),
(2, 1, 're', '2014-10-14 00:00:00', 0),
(7, 1, '', '0000-00-00 00:00:00', 0),
(8, 1, '', '0000-00-00 00:00:00', 0),
(9, 2, '', '0000-00-00 00:00:00', 0),
(10, 2, '', '0000-00-00 00:00:00', 0),
(11, 2, '', '0000-00-00 00:00:00', 0),
(12, 2, '', '0000-00-00 00:00:00', 0),
(13, 2, '', '0000-00-00 00:00:00', 0),
(14, 1, '', '0000-00-00 00:00:00', 0),
(15, 2, '', '0000-00-00 00:00:00', 0),
(16, 2, '', '0000-00-00 00:00:00', 0),
(17, 2, '', '0000-00-00 00:00:00', 0),
(18, 2, '', '0000-00-00 00:00:00', 0),
(19, 2, '', '0000-00-00 00:00:00', 0),
(20, 2, '', '0000-00-00 00:00:00', 0),
(21, 2, '', '0000-00-00 00:00:00', 0),
(22, 2, '', '0000-00-00 00:00:00', 0),
(23, 2, '', '2015-05-23 00:00:00', 1),
(24, 2, '', '2015-05-23 00:00:00', 1),
(25, 1, '', '2015-05-23 00:00:00', 1),
(26, 1, '', '0000-00-00 00:00:00', 0),
(27, 2, '', '0000-00-00 00:00:00', 0),
(28, 2, '', '0000-00-00 00:00:00', 0),
(29, 1, '', '0000-00-00 00:00:00', 0),
(30, 1, '', '0000-00-00 00:00:00', 0),
(31, 1, '', '0000-00-00 00:00:00', 0),
(32, 2, '', '0000-00-00 00:00:00', 0),
(33, 2, '', '0000-00-00 00:00:00', 0),
(34, 2, '', '0000-00-00 00:00:00', 0),
(35, 2, '', '0000-00-00 00:00:00', 0),
(36, 2, '', '0000-00-00 00:00:00', 0),
(37, 1, '', '0000-00-00 00:00:00', 0),
(38, 2, '', '0000-00-00 00:00:00', 0),
(39, 2, '', '2015-05-23 00:00:00', 1),
(40, 2, '', '0000-00-00 00:00:00', 0),
(41, 2, '', '0000-00-00 00:00:00', 0),
(42, 2, '', '0000-00-00 00:00:00', 0),
(43, 1, '', '0000-00-00 00:00:00', 0),
(44, 1, '', '0000-00-00 00:00:00', 0),
(45, 2, '', '0000-00-00 00:00:00', 0),
(46, 2, '', '0000-00-00 00:00:00', 0),
(47, 2, '', '0000-00-00 00:00:00', 0),
(48, 2, '', '0000-00-00 00:00:00', 0),
(49, 1, '', '2015-05-24 00:00:00', 1),
(50, 2, '', '2015-05-23 00:00:00', 1),
(51, 2, '', '2015-05-23 00:00:00', 1),
(52, 2, '', '2015-05-24 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `sup_ID` int(11) NOT NULL,
  `sup_name` text NOT NULL,
  `sup_company` text NOT NULL,
  `sup_tp` int(11) NOT NULL,
  `sup_email` text NOT NULL,
  `sup_addr` text NOT NULL,
  `sup_des` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_ID`, `sup_name`, `sup_company`, `sup_tp`, `sup_email`, `sup_addr`, `sup_des`) VALUES
(2, 'Janaka Pachaya', 'MAS', 716669177, 'janaka@gmail.com', 'fvgsgvsbg', 'jokerrrrr 1'),
(5, 'ddddddddddd', 'aaaaaaa', 2222222, 'bbbbbbbb', 'ttttttttttt', 'jjjjjjjjjjjj'),
(6, 'ddddddddddd', 'aaaaaaa', 2222222, 'bbbbbbbb', 'ttttttttttt', 'jjjjjjjjjjjj'),
(7, 'Shihan', 'NSBM', 2147483647, 'shihan@gmail.com', 'Colombo', 'LOL'),
(8, 'com', 'com2', 123456789, 'dd@gm.c', 'ef', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `suser`
--

CREATE TABLE IF NOT EXISTS `suser` (
  `c_id` int(11) NOT NULL,
  `su_fname` text NOT NULL,
  `su_lname` text NOT NULL,
  `su_email` text NOT NULL,
  `su_un` text NOT NULL,
  `su_pw` text NOT NULL,
  `su_type` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suser`
--

INSERT INTO `suser` (`c_id`, `su_fname`, `su_lname`, `su_email`, `su_un`, `su_pw`, `su_type`) VALUES
(1, 'aa', 'bb', 'chinthaka1250@gmail.com', 'aa', 'aa', 'admin'),
(2, 'Hasanka', 'Sandakin', 'sandakinh@gmail.com', 'king', '123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_ID`);

--
-- Indexes for table `caro`
--
ALTER TABLE `caro`
  ADD PRIMARY KEY (`pr`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`crt_ID`), ADD KEY `C_ID` (`C_ID`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`crt_ID`,`p_ID`), ADD KEY `cart_product_ibfk_2` (`p_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cus`
--
ALTER TABLE `cus`
  ADD PRIMARY KEY (`c_id`), ADD UNIQUE KEY `un_3` (`un`), ADD KEY `un` (`un`), ADD KEY `un_2` (`un`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inv_ID`);

--
-- Indexes for table `invtemp2`
--
ALTER TABLE `invtemp2`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`or_ID`), ADD KEY `crt_ID` (`crt_ID`), ADD KEY `c_ID` (`c_ID`), ADD KEY `pay_ID` (`pay_ID`), ADD KEY `ship_ID` (`ship_ID`);

--
-- Indexes for table `pay-methods`
--
ALTER TABLE `pay-methods`
  ADD PRIMARY KEY (`paym_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_ID`), ADD KEY `paym_ID` (`paym_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_ID`), ADD KEY `B_ID` (`B_ID`);

--
-- Indexes for table `pro_att`
--
ALTER TABLE `pro_att`
  ADD UNIQUE KEY `p_id` (`p_id`,`att_id`), ADD KEY `att_id` (`att_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `shipmethod`
--
ALTER TABLE `shipmethod`
  ADD PRIMARY KEY (`shipm_ID`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`ship_ID`), ADD KEY `shipm_ID` (`shipm_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_ID`);

--
-- Indexes for table `suser`
--
ALTER TABLE `suser`
  ADD PRIMARY KEY (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `b_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `crt_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `cus`
--
ALTER TABLE `cus`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inv_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `or_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `pay-methods`
--
ALTER TABLE `pay-methods`
  MODIFY `paym_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shipmethod`
--
ALTER TABLE `shipmethod`
  MODIFY `shipm_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `ship_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `suser`
--
ALTER TABLE `suser`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `cus` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
ADD CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`p_ID`) REFERENCES `product` (`p_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `cart_product_ibfk_3` FOREIGN KEY (`crt_ID`) REFERENCES `cart` (`crt_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`crt_ID`) REFERENCES `cart` (`crt_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`c_ID`) REFERENCES `cus` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`pay_ID`) REFERENCES `payment` (`pay_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `order_ibfk_4` FOREIGN KEY (`ship_ID`) REFERENCES `shipping` (`ship_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`paym_ID`) REFERENCES `pay-methods` (`paym_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`B_ID`) REFERENCES `brand` (`b_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pro_att`
--
ALTER TABLE `pro_att`
ADD CONSTRAINT `pro_att_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pro_att_ibfk_2` FOREIGN KEY (`att_id`) REFERENCES `attribute` (`a_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`shipm_ID`) REFERENCES `shipmethod` (`shipm_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
