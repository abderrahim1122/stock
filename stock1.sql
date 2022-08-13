-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 12:18 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock1`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `service_charge_value` varchar(255) NOT NULL,
  `vat_charge_value` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `service_charge_value`, `vat_charge_value`, `address`, `phone`, `country`, `message`, `currency`) VALUES
(1, 'Infosys private', '13', '10', 'Madrid', '758676851', 'Spain', 'hello everyone one', 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `service_charge_rate` varchar(255) NOT NULL,
  `service_charge` varchar(255) NOT NULL,
  `vat_charge_rate` varchar(255) NOT NULL,
  `vat_charge` varchar(255) NOT NULL,
  `net_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `paid_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `bill_no`, `customer_name`, `customer_address`, `customer_phone`, `date_time`, `gross_amount`, `service_charge_rate`, `service_charge`, `vat_charge_rate`, `vat_charge`, `net_amount`, `discount`, `paid_status`, `user_id`) VALUES
(2, 'BILPR-BEA4', 'Prothom Acharjee', '3 J.M Sen Lane, Jamal Khan', '1818105488', '1655223090', '100.00', '13', '13.00', '10', '10.00', '123.00', '', 2, 1),
(3, 'BILPR-2BAE', 'Raktim Dutta', 'Haji Bodor Uddin Building,KB Dovas Lane,Agrabad', '', '1655227404', '2000.00', '13', '260.00', '10', '200.00', '2460.00', '', 2, 1),
(5, 'BILPR-5286', 'ABC', 'ABC', 'ABC', '1656107382', '24.00', '13', '3.12', '10', '2.40', '29.52', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_item`
--

CREATE TABLE `orders_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_item`
--

INSERT INTO `orders_item` (`id`, `order_id`, `product_id`, `qty`, `rate`, `amount`) VALUES
(3, 2, 2, '1', '100', '100.00'),
(4, 3, 3, '10', '200', '2000.00'),
(7, 5, 7, '1', '24', '24.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `availability` int(11) NOT NULL,
  `update_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `price`, `qty`, `description`, `availability`, `update_at`) VALUES
(2, 'XYZ', '20220613', '100', '19', '<p>Test</p>', 1, '1655139529'),
(3, 'AbC', '20220614', '200', '40', '', 1, '1655227390'),
(4, 'ABCD-1', 'ABCD-1', '20', '20', '<p>ABCD-1ABCD-1ABCD-1ABCD-1ABCD-1ABCD-1<br></p>', 1, '1656085789'),
(5, 'ABCD-2', 'ABCD-2', '40', '40', '<p>ABCD-2 ABCD-2 ABCD-2 ABCD-2 ABCD-2</p><p>ABCD-2<br></p>', 1, '1656105340'),
(6, 'abde-5', 'abde-5', '25', '100', '<p>abde-5abde -5abde-5a bde-5 abde- 5abde-5abde-5<br></p>', 1, '1656105410'),
(7, 'ABCE-30', 'ABCE-30', '24', '29', '<p>ABCE-30ABCE-30ABCE-30ABCE-30&nbsp;<br></p>', 1, '1656107121');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `gender`) VALUES
(1, 'adminknst', '$2y$10$yfi5nUQGXUZtMdl27dWAyOd/jMOmATBpiUvJDmUu9hJ5Ro6BE5wsK', 'admin@admin.com', 'john', 'doe', '80789998', 1),
(6, 'testtest', '$2y$10$mKDsZspGMPFP9pRzgzUGcOoJeK9AhDe5JAJJ92SJcOqoosKfJ7L/2', 'hr@wersoftsource.com', 'Prothom', 'Acharjee', '1818105488', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
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
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
