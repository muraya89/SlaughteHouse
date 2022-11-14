-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 07:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`, `date_created`) VALUES
(1, 'admin@gmail.com', '$2y$10$IN/KYitjiLOis84/ucr04O69bHAge99JuRVTzdhDT9Tb5TzmpIcnW', 'ADMIN', '2022-11-04 09:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `weight` int(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `number` int(255) NOT NULL,
  `available_quantity` int(255) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `supply_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `supplier`, `breed`, `weight`, `sex`, `age`, `number`, `available_quantity`, `price`, `type`, `status`, `supply_date`) VALUES
(1, 'dandora', 'angus', 2, 'female', 2, 1, 1, 2, 'redmeat', 'available', '2022-11-13 15:26:13'),
(2, '', 'holstein', 20, 'female', 3, 6, 4, 61405, 'redmeat', 'available', '2022-11-13 19:01:15'),
(3, '', '2', 2, 'female', 2, 1, 1, 2, '', 'new', '2022-11-13 17:06:38'),
(4, '', 'Shorthorn Cattle', 20, 'female', 20, 10, 10, 2, '', 'new', '2022-11-13 17:06:26'),
(5, '', 'Limousin cattle', 40, 'female', 40, 20, 20, 34784, '', 'new', '2022-11-13 17:06:20'),
(6, 'dandora', 'simmental cattle', 24, 'female', 43, 43, 28, 24344, '', 'available', '2022-11-14 06:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `date_created`) VALUES
(2, 'Shorthorn Cattle', 'Red meat', '2022-10-24 07:35:40'),
(3, 'Limousin cattle', 'red meat', '2022-11-04 09:16:48'),
(4, 'simmental cattle', 'red meat', '2022-11-04 09:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `input` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `input`, `lname`, `fname`, `email`) VALUES
(9, 'I do not say blah blah blah', 'doe', 'jane', 'janedoe@gmail.com'),
(10, 'i do not say blah blah blah', 'muraya', 'susan', 'susanmuraya89@gmail.com'),
(11, 'i do not say blah blah blah', 'muraya', 'susan', 'susanmuraya89@gmail.com'),
(12, 'i do not say blah blah blah', 'muraya', 'susan', 'susanmuraya89@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(255) NOT NULL,
  `mode_of_payment` varchar(255) NOT NULL,
  `total_price` float NOT NULL,
  `delivery` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `user_id`, `username`, `breed`, `price`, `quantity`, `mode_of_payment`, `total_price`, `delivery`, `address`, `created_at`) VALUES
(17, 6, 2, 'susan', 'simmental cattle', 24344, 12, 'cash', 292128, 'no', '', '2022-11-14 06:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `cname`, `email`, `phoneno`, `address`, `account`, `password`, `status`, `date_created`, `last_activity`) VALUES
(1, 'dandora', 'dandora@gmail.com', 70000000, '1128', 'supplier', '$2y$10$Exd1eigMidoE8uVk9Nu8eukVTfnImIaYeg3v3RQKnsCpc/mgayrHq', 'offline', '2022-11-13 17:40:23', '2022-11-13 17:40:23'),
(2, 'susan', 'susan@gmail.com', 70000000, '1128', 'customer', '$2y$10$IN/KYitjiLOis84/ucr04O69bHAge99JuRVTzdhDT9Tb5TzmpIcnW', 'online', '2022-11-13 17:42:07', '0000-00-00 00:00:00'),
(4, 'kikuyu butchers', 'diana@gmail.com', 70000000, '1223-2332 nairobi', 'supplier', '$2y$10$gjtoEkCbhpPlDTzposiby.iwRd.QOGECjphh75rqFkO0ivrQtsMuC', 'offline', '2022-11-10 17:12:58', '2022-11-10 17:12:58'),
(5, 'kikuyu butchers', 'diana@gmail.com', 70000000, '1223-2332 nairobi', 'supplier', '$2y$10$TnK9ofYwMdJnkT6pDCYar.LYrHKvFDbsyxmURbpg1hqZVVFWL/yey', '', '2022-11-10 16:52:19', '2022-11-10 16:52:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
