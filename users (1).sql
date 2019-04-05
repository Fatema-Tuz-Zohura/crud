-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 12:56 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ss_php_02`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(80) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `role` varchar(50) DEFAULT 'user',
  `email_verification_token` varchar(100) DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `photo`, `role`, `email_verification_token`, `email_verified`) VALUES
(14, 'fakhruzzamankhan@gmail.com', '$2y$10$muCNM51WSz6Vw8LZnEKh.O4gDMAy5G7nJ9fqCVUrwY6', 'photo_5c8e1412228282.244565141552815122.jpg', 'user', NULL, 1),
(55, 'sumi@gmail.com', '$2y$10$WGRPMSJ2qHXywmFdnlMjo.GMnwOtQMMj6kbSBxMNmfwvQicUS6nX2', 'photo_5ca36d50123ce0.131108481554214224.jpg', 'user', '', 1),
(56, 'tuntuni@gmail.com', '$2y$10$YtmqzF1oVdo4g9HhEtYZEuKCgnA0gJ5aC64..aYLW5ve0br/ezLx6', 'photo_5ca36e83392938.229534661554214531.jpg', 'admin', '', 1),
(57, 'rattri@gmail.com', '$2y$10$DEuVrsLO/y/LIN24fcn4UOXabTyXX0OvlAlt9u2wOQ9eKBwyLDnv6', 'photo_5ca7206a751f97.044637061554456682.jpg', 'user', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
