-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2022 at 11:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Senior_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `r_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `city`, `country`) VALUES
(1, 'Agility Consulting', 'Albuquerque', 'USA'),
(2, 'Tribeca Labs,lnc', 'Little Rock', 'USA'),
(3, 'BEA Systems', 'Boulder', 'USA'),
(4, 'Dell', 'Round Rock', 'USA'),
(5, 'Microsoft', 'Redmond', 'USA'),
(6, 'GCI Group', 'Washington. DC', 'USA'),
(7, 'Clinton Consulting', 'New York', 'USA'),
(8, 'Joan\'s Fabrics', 'Atlanta', 'USA'),
(9, 'Slippery Slopes', 'Boulder', 'USA'),
(10, 'Schlitterbahn Water Park', 'San Antonio', 'USA'),
(11, 'Whole Foods', 'Austin', 'USA'),
(12, '1-800-Flowers', 'Lost Angles', 'USA'),
(13, 'Whole Foods', 'Austin', 'USA'),
(14, 'Borders Bookstores', 'Chicago', 'Netherlands'),
(15, 'Philips', 'Eindhoven', 'USANe');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(2, 'user', 'e10adc3949ba59abbe56e057f20f883e', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reguredate` datetime NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `r_price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `reguredate`, `p_name`, `price`, `r_price`, `qty`, `user_id`, `image`, `payment_status`, `payment_method`) VALUES
(34, '2022-07-02 17:00:00', '2022-07-04 00:00:00', 'Apple MacBook Pro 2021 M1 PRO/16GB/1TB SSD/16.2/SPACE GREY (MK193TH/A)', '96950', 50, 1, 1, 'https://www.jib.co.th/img_master/product/original/2022061516094953748_1.jpg', 'pending', 'fedex'),
(35, '2022-07-02 17:00:00', '2022-07-04 00:00:00', 'CPU LIQUID COOLER', '9830', 50, 2, 1, 'https://www.jib.co.th/img_master/product/original/2020020110380836560_1.jpg', 'pending', 'fedex');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `category` varchar(255) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `in_struck` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `price`, `category`, `weight`, `image`, `in_struck`) VALUES
(1, 'VGA GALAX GEFORCE RTX 3070 TI- 8GB GDDR6X ', 27500, 'hardware', '20', 'https://www.jib.co.th/img_master/product/original/2021092213384748786_1.JPG', 10),
(2, 'CPU LIQUID COOLER', 4890, 'hardware', '20', 'https://www.jib.co.th/img_master/product/original/2020020110380836560_1.jpg', 10),
(3, 'Apple MacBook Pro 2021 M1 PRO/16GB/1TB SSD/16.2/SPACE GREY (MK193TH/A)', 96900, 'computer', '2.2', 'https://www.jib.co.th/img_master/product/original/2022061516094953748_1.jpg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
