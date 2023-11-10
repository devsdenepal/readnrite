-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 08:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `readnrite`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `user_key` int(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `pages_authored` int(255) NOT NULL,
  `page_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`page_list`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`Field_name`, `Min_value`, `Max_value`, `Min_length`, `Max_length`, `Empties_or_zeros`, `Nulls`, `Avg_value_or_avg_length`, `Std`, `Optimal_fieldtype`) VALUES
(0x726561646e726974652e617574686f72732e617574686f725f6e616d65, NULL, NULL, 0, 0, 0, 0, 0x302e30, NULL, 0x43484152283029204e4f54204e554c4c),
(0x726561646e726974652e617574686f72732e73686f72745f6e616d65, NULL, NULL, 0, 0, 0, 0, 0x302e30, NULL, 0x43484152283029204e4f54204e554c4c),
(0x726561646e726974652e617574686f72732e757365725f6b6579, NULL, NULL, 0, 0, 0, 0, 0x302e30, 0x302e30, 0x43484152283029204e4f54204e554c4c),
(0x726561646e726974652e617574686f72732e646174655f63726561746564, NULL, NULL, 0, 0, 0, 0, 0x302e30, NULL, 0x43484152283029204e4f54204e554c4c),
(0x726561646e726974652e617574686f72732e70616765735f617574686f726564, NULL, NULL, 0, 0, 0, 0, 0x302e30, 0x302e30, 0x43484152283029204e4f54204e554c4c),
(0x726561646e726974652e617574686f72732e706167655f6c697374, NULL, NULL, 0, 0, 0, 0, 0x302e30, NULL, 0x43484152283029204e4f54204e554c4c);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`user_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `user_key` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
