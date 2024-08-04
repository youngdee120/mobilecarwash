-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2024 at 01:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carwash`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `house_number` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL,
  `time_slot` varchar(255) NOT NULL,
  `car_size` varchar(50) NOT NULL,
  `service` varchar(100) NOT NULL,
  `other_services` text DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `phone`, `email`, `location`, `house_number`, `date_time`, `time_slot`, `car_size`, `service`, `other_services`, `additional_info`, `created_at`, `status`) VALUES
(1, 'sam', '123', '123@gmail.com', 'sam', 'sam', '2024-07-18 10:30:00', '1:00 PM', 'sedan', 'interiorCleaning', 'carpetCleaning, parkingCleaning', 'Fast service', '2024-07-30 07:30:30', 'Approved'),
(2, 'sam', '123', 'kenyapoweritict@gmail.com', 'sam', 'sam', '2024-07-11 02:00:00', '7:00 AM', 'truck', 'fullService', 'carpetCleaning, parkingCleaning', 'Nataka kazi safi', '2024-07-30 08:06:22', 'Declined'),
(4, 'sam 2', '123', '123@gmail.com', 'kush', '234', '2024-08-06 21:39:00', '7:00 AM', 'truck', 'interiorCleaning', 'carpetCleaning, parkingCleaning', 'faster', '2024-08-02 06:38:14', 'Declined'),
(11, 'jane', '123456890', 'jane@gmail.com', 'Nakuru', 'A057', '2024-08-10 03:00:00', '2:30 PM', 'suv', 'interiorCleaning', 'carpetCleaning, parkingCleaning', 'fffff', '2024-08-02 10:01:41', 'Pending'),
(12, 'jane 2', '1234567890', 'jane@gmail.com', 'Nakuru', '234', '2024-08-17 13:05:00', '3:00 PM', 'sedan', 'interiorCleaning', 'carpetCleaning, parkingCleaning', 'eeeeee', '2024-08-02 10:05:17', 'Approved'),
(13, 'test', '123', 'test@gmail.com', 'Nakuru', '123', '2024-08-08 13:08:00', '3:30 PM', 'sedan', 'fullService', 'carpetCleaning, parkingCleaning', 'Please come!', '2024-08-02 10:08:33', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'sam', 'kenyapoweritict@gmail.com', 'qwdfcdw', '2024-07-30 12:18:31'),
(2, 'Young Dee kush', 'deey440@gmail.com', 'whats up', '2024-08-02 10:50:11'),
(3, 'Young Dee kush', 'sammykush2020@GMAIL.COM', 'testing', '2024-08-02 10:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `location` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `gender`, `location`, `address`, `password`, `created_at`) VALUES
(1, '123', '123@gmail.com', '1234567890', 'female', 'kiti', '123', '$2y$10$atDxx0DeTagkQ9xl3AAEYOTxfN1yiqpwljJ9kQAlR3dPdQTEQKUY2', '2024-07-26 11:25:26'),
(2, 'test', 'test@gmail.com', '1234', 'female', 'weil', '1233', '$2y$10$Cgz1lkU7A.0ObXMZEinek.lyTYFm2CZ3h7Q8moEubPDOVdfB6OAQO', '2024-07-26 11:37:33'),
(3, 'sam', 'kenyapoweritict@gmail.com', '123', 'male', 'sam', '123', '$2y$10$9xdZ0VPGBYrp2YF76i4.wOdVEFnjuVasbfSEB4YDms/4fVrqzKniy', '2024-07-30 08:05:09'),
(4, 'Young Dee kush', 'kush@gmail.com', '0112650257', 'male', 'kush', '56-subukia', '$2y$10$yjFI1/QGgBOXRKAQEO/Y1eLayI3yCDB06SpS66.Nv/h0QTyVl7xkS', '2024-08-01 18:29:21'),
(5, 'jane', 'jane@gmail.com', '1234567890', 'female', 'Nakuru', 'A057', '$2y$10$V.uyCvXS11PXEB1izmF9t.Qink6.zg1wsMXidkjv1UAcF189udzQa', '2024-08-02 09:13:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
