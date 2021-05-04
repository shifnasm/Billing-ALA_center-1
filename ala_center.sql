-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 08:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ala_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `shop_code` varchar(5) NOT NULL,
  `shop_name` varchar(40) NOT NULL,
  `owner` varchar(40) NOT NULL,
  `contact` int(40) NOT NULL,
  `address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`shop_code`, `shop_name`, `owner`, `contact`, `address`) VALUES
('S0001', 'Poonakutty', 'Shifna', 756895485, 'Colombo 07'),
('S0002', 'Breezebee', 'Juz', 778899665, 'Kattankudy');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_code` varchar(10) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `unit_price` int(40) NOT NULL,
  `quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_code`, `product_name`, `unit_price`, `quantity`) VALUES
('A0001', 'Poonakutty', 1000000, 3),
('A0002', 'Book', 1000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(25) NOT NULL,
  `date` varchar(255) NOT NULL,
  `total` int(50) NOT NULL,
  `pay` int(50) NOT NULL,
  `due` int(50) NOT NULL,
  `payment_type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `date`, `total`, `pay`, `due`, `payment_type`) VALUES
(1, '2021-05-04', 2000000, 3000000, 1000000, 'cash'),
(2, '2021-05-04', 2000000, 3000000, 1000000, 'cash'),
(3, '2021-05-04', 2000000, 3000000, 1000000, 'cash'),
(4, '2021-05-04', 2000000, 3000000, 1000000, 'cash'),
(5, '2021-05-04', 2000000, 3000000, 1000000, 'cash'),
(6, '2021-05-04', 2000000, 3000000, 1000000, 'cash'),
(7, '2021-05-04', 0, 0, 0, 'select'),
(8, '2021-05-04', 2000000, 0, -2000000, 'cash'),
(9, '2021-05-04', 1002000, 1500000, 498000, 'cash'),
(10, '2021-05-04', 2005000, 3000000, 995000, 'cash'),
(11, '2021-05-04', 2005000, 3000000, 995000, 'cash'),
(12, '2021-05-04', 10000, 15000, 5000, 'cash'),
(13, '2021-05-04', 2000000, 3000000, 1000000, 'cash'),
(14, '2021-05-04', 2002000, 3000000, 998000, 'cash'),
(15, '2021-05-04', 3005000, 4000000, 995000, 'cash'),
(16, '2021-05-04', 2003000, 3000000, 997000, 'cash'),
(17, '2021-05-04', 2005000, 3000000, 995000, 'cash'),
(18, '2021-05-04', 2015000, 3000000, 985000, 'cash'),
(19, '2021-05-04', 2003000, 3000000, 997000, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

CREATE TABLE `purchase_item` (
  `id` int(25) NOT NULL,
  `purchase_id` int(25) NOT NULL,
  `product_code` int(25) NOT NULL,
  `buy_price` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`id`, `purchase_id`, `product_code`, `buy_price`, `quantity`, `total`) VALUES
(1, 6, 0, 0, 0, 0),
(2, 6, 0, 1000000, 2, 2000000),
(3, 7, 0, 0, 0, 0),
(4, 8, 0, 0, 0, 0),
(5, 8, 0, 1000000, 2, 2000000),
(6, 9, 0, 0, 0, 0),
(7, 9, 0, 1000000, 1, 1000000),
(8, 9, 0, 1000, 2, 2000),
(9, 10, 0, 0, 0, 0),
(10, 10, 0, 1000000, 2, 2000000),
(11, 10, 0, 1000, 5, 5000),
(12, 11, 0, 0, 0, 0),
(13, 11, 0, 1000000, 2, 2000000),
(14, 11, 0, 1000, 5, 5000),
(15, 12, 0, 0, 0, 0),
(16, 12, 0, 1000, 10, 10000),
(17, 13, 0, 0, 0, 0),
(18, 13, 0, 1000000, 2, 2000000),
(19, 14, 0, 0, 0, 0),
(20, 14, 0, 1000000, 2, 2000000),
(21, 14, 0, 1000, 2, 2000),
(22, 15, 0, 0, 0, 0),
(23, 15, 0, 1000000, 3, 3000000),
(24, 15, 0, 1000, 5, 5000),
(25, 16, 0, 0, 0, 0),
(26, 16, 0, 1000000, 2, 2000000),
(27, 16, 0, 1000, 3, 3000),
(28, 17, 0, 0, 0, 0),
(29, 17, 0, 1000000, 2, 2000000),
(30, 17, 0, 1000, 5, 5000),
(31, 18, 0, 0, 0, 0),
(32, 18, 0, 1000000, 2, 2000000),
(33, 18, 0, 1000, 5, 5000),
(34, 18, 0, 5000, 2, 10000),
(35, 19, 0, 0, 0, 0),
(36, 19, 0, 1000000, 2, 2000000),
(37, 19, 0, 1000, 3, 3000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`shop_code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_code`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
