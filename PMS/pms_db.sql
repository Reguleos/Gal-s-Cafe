-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 03:49 PM
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
-- Database: `pms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `description_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`description_id`, `description`) VALUES
(1, 'Welcome to Gal&#039;s Cafe, where we are dedicated to transforming the food and beverage industry through real-time customer feedback. Our platform empowers businesses to gather, analyse, and act on insights that enhance the dining experience, improve customer satisfaction, and drive growth. By leveraging cutting-edge technology and a customer-centric approach, we bridge the gap between diners and establishments, ensuring that every meal meets the highest standards.\r\nFounded by a team of passionate food enthusiasts and tech experts, Gal&#039;s Cafe is committed to helping businesses thrive by turning feedback into actionable improvements. Join us in creating unforgettable dining experiences, one feedback at a time.');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `role` varchar(15) NOT NULL,
  `account_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `birthday` date NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `address` varchar(60) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `mobile_number` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `username`, `password`, `first_name`, `last_name`, `role`, `account_creation`, `birthday`, `age`, `sex`, `address`, `e_mail`, `mobile_number`) VALUES
(1, 'admin', '123123', 'Lance', 'Briones', 'Manager', '2024-08-26 00:00:00', '2004-02-19', 20, 'Male', 'Trece Martires City, Cavite', 'lancebriones1904@gmail.com', 9661777255),
(2, 'crew01', '123123', 'Queency', 'Sese', 'Crew', '2024-08-26 00:00:00', '2003-11-14', 20, 'Female', 'Tanza, Cavite', 'queencygallanosese@gmail.com', 9651679497),
(3, 'lyecln', '123123', 'Llyle', 'Nidea', 'Customer', '2024-08-26 00:00:00', '2004-03-30', 20, 'Female', 'Trece Martires City, Cavite', 'llylenidea@gmail.com', 9568964574),
(4, 'cfa.shane', '123123', 'Shane', 'Aguirre', 'Customer', '2024-08-26 00:00:00', '2003-12-07', 20, 'Female', 'Trece Martires City, Cavite', 'shaneaguirre@gmail.com', 9754345669),
(5, 'crew02', '123123', 'Benedict', 'Briones', 'Crew', '2024-08-27 01:17:33', '2004-02-19', 20, 'Male', 'Trece Martires City, Cavite', 'lancebriones1904@gmail.com', 9661777255);

-- --------------------------------------------------------

--
-- Table structure for table `rating_and_reviews`
--

CREATE TABLE `rating_and_reviews` (
  `randr_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `rating` int(3) NOT NULL,
  `review` varchar(750) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating_and_reviews`
--

INSERT INTO `rating_and_reviews` (`randr_id`, `account_id`, `category`, `rating`, `review`, `date_time`) VALUES
(2, 4, 'beverage', 5, 'Sample review', '2024-08-26 20:22:05'),
(3, 4, 'service', 5, 'Sample review', '2024-08-26 20:22:05'),
(4, 4, 'beverage', 4, 'Sample review', '2024-08-26 20:22:05'),
(5, 4, 'food', 3, 'Sample review', '2024-08-26 20:22:05'),
(6, 4, 'beverage', 4, 'Sample review', '2024-08-26 20:22:05'),
(7, 4, 'food', 4, 'Sample review', '2024-08-26 20:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `report` varchar(750) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `account_id`, `category`, `report`, `date_time`) VALUES
(1, 4, 'food', 'Sample report', '2024-08-26 20:22:52'),
(2, 4, 'beverage', 'Sample report', '2024-08-26 23:01:48'),
(3, 4, 'service', 'Sample report', '2024-08-26 23:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `suggestion_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `suggestion` varchar(750) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`suggestion_id`, `account_id`, `category`, `suggestion`, `date_time`) VALUES
(1, 4, 'beverage', 'Sample suggestion', '2024-08-26 20:23:09'),
(2, 4, 'beverage', 'Sample suggestion', '2024-08-26 20:23:09'),
(3, 4, 'service', 'Sample suggestion', '2024-08-26 20:59:17'),
(4, 4, 'service', 'Sample suggestion', '2024-08-26 20:59:19'),
(5, 4, 'food', 'Sample suggestion', '2024-08-26 20:59:21'),
(6, 4, 'food', 'Sample suggestion', '2024-08-26 20:59:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`description_id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `rating_and_reviews`
--
ALTER TABLE `rating_and_reviews`
  ADD PRIMARY KEY (`randr_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`suggestion_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating_and_reviews`
--
ALTER TABLE `rating_and_reviews`
  MODIFY `randr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `suggestion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
