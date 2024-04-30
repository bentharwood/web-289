-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 11:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmers_market_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `item_id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_description` text DEFAULT NULL,
  `item_price` decimal(10,2) DEFAULT NULL,
  `other_item_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`item_id`, `vendor_id`, `item_name`, `item_description`, `item_price`, `other_item_info`) VALUES
(1, 7, 'carrots', 'carrots', 1.00, 'carrots'),
(3, 7, 'lettice', 'lettice', 2.00, 'lettice'),
(4, 7, 'carrots', 'carrots', 2.00, 'carrots2');

-- --------------------------------------------------------

--
-- Table structure for table `users_usr`
--

CREATE TABLE `users_usr` (
  `id_usr` int(11) NOT NULL,
  `email_usr` varchar(50) DEFAULT NULL,
  `hashed_password_usr` varchar(255) DEFAULT NULL,
  `user_level_usr` tinyint(2) DEFAULT NULL,
  `first_name_usr` varchar(255) DEFAULT NULL,
  `last_name_usr` varchar(255) DEFAULT NULL,
  `username_usr` varchar(255) DEFAULT NULL,
  `phone_usr` char(10) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_usr`
--

INSERT INTO `users_usr` (`id_usr`, `email_usr`, `hashed_password_usr`, `user_level_usr`, `first_name_usr`, `last_name_usr`, `username_usr`, `phone_usr`, `vendor_id`) VALUES
(16, 'admintest@test.com', '$2y$10$oBILj8z1HjPe.RHPznvm9e7J9wOtxRkr4KM9afOqNWQyHIcsp2LAq', 2, 'admin', 'admin', 'administrator', '1111111111', 1),
(17, 'ben@harwood.ben', '$2y$10$I.ETovho/2zEyMJ9klmA/OMQwpwlVifvZENq0JYjjbnpPwOyUJWj.', 1, 'ben', 'harwood', 'bentharwood', '1111111111', 7);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `vendor_description` text DEFAULT NULL,
  `other_vendor_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor_name`, `vendor_description`, `other_vendor_info`) VALUES
(7, 'dfgh', 'dfgh', 'dfgh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `users_usr`
--
ALTER TABLE `users_usr`
  ADD PRIMARY KEY (`id_usr`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_usr`
--
ALTER TABLE `users_usr`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
