-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 08:47 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_training`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `name` varchar(32) NOT NULL,
  `age` int(2) NOT NULL,
  `city` varchar(16) NOT NULL,
  `image` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `username`, `email`, `name`, `age`, `city`, `image`, `created_at`) VALUES
(4, 'sanket_kumbhare', 'sanket@gmail.com', 'Sanket Kumbhare', 21, 'Kalyan', '1243658796-1635751347.jpg', '2021-11-01 07:22:27'),
(6, 'test_user', 'test@gmail.com', 'test user', 30, 'Dombivali', '1313518208-1635751417.jpg', '2021-11-01 07:23:48'),
(7, 'test_user1', 'test1@gmail.com', 'test user', 32, 'Thane', '1736153946-1635751526.jpg', '2021-11-01 07:25:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
