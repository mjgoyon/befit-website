-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 08:55 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `befit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admins_id` int(11) NOT NULL,
  `admins_username` varchar(255) NOT NULL,
  `admins_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admins_id`, `admins_username`, `admins_password`) VALUES
(1, 'befitadmin', 'webdev2021');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payments_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `payments_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ratings_id` int(11) NOT NULL,
  `services_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_username` varchar(255) NOT NULL,
  `ratings_rate` int(5) NOT NULL,
  `ratings_comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ratings_id`, `services_id`, `users_id`, `users_username`, `ratings_rate`, `ratings_comment`) VALUES
(3, 1, 19, 'patrickuy', 5, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `services_id` int(11) NOT NULL,
  `services_title` varchar(255) NOT NULL,
  `services_price` varchar(255) NOT NULL,
  `services_description` text NOT NULL,
  `services_type` varchar(255) NOT NULL,
  `services_availability` int(1) NOT NULL,
  `services_time` varchar(255) NOT NULL,
  `services_day` varchar(255) NOT NULL,
  `services_session` varchar(255) NOT NULL COMMENT 'grouped or solo',
  `services_duration` varchar(255) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`services_id`, `services_title`, `services_price`, `services_description`, `services_type`, `services_availability`, `services_time`, `services_day`, `services_session`, `services_duration`, `users_id`) VALUES
(1, 'Cardio', '1000', 'Mahabang description', 'Cardio', 1, '2:00PM', 'Monday', 'Solo', '1 week', 19),
(2, 'Strength', '1000', 'Mahabang description', 'Strength', 1, '2:00PM', 'Monday', 'Solo', '1 week', 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_account` varchar(100) NOT NULL,
  `users_avatar` varchar(255) NOT NULL,
  `users_name` varchar(255) NOT NULL,
  `users_username` varchar(255) NOT NULL,
  `users_birthdate` varchar(255) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_password` varchar(255) NOT NULL,
  `users_code` varchar(20) NOT NULL,
  `users_active` int(1) NOT NULL,
  `users_wallet` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_account`, `users_avatar`, `users_name`, `users_username`, `users_birthdate`, `users_email`, `users_password`, `users_code`, `users_active`, `users_wallet`) VALUES
(19, 'Trainee', 'c738453b124a084c48633e3d6d5404d1.jpg', 'Patrick Uy', 'patrickuy', 'April 26, 2000', 'patrickjeromeauy@gmail.com', 'webdev2021', 'oQgPZ42mSITW', 1, 400),
(20, 'Coach', 'dummy.jpg', 'Dummy', 'dummy1', 'Dummy', 'Dummy@gmail.com', 'dummy2021', 'dummy', 0, 0),
(21, 'Coach', 'dummy.jpg', 'Dummy', 'dummy2', 'Dummy', 'Dummy@gmail.com', 'dummy2021', 'dummy', 0, 0),
(22, 'Trainee', 'dummy.jpg', 'Dummy', 'dummy3', 'Dummy', 'dummy3@gmail.com', 'dummy2021', 'dummyyy', 0, 0),
(23, 'Trainee', 'dummy.jpg', 'Dummy', 'dummy4', 'Dummy', 'dummy4@gmail.com', 'dummy2021', 'dummyyy', 0, 0),
(24, 'Trainee', 'beb33fbfc61d9bb7ce73b6dfd58713cd.jpg', 'NotPat Uy', 'notpatuy', 'April 26, 2000', 'woofingfox26@gmail.com', 'webdev2021', 'Ro8CBfI5KXyQ', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admins_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payments_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ratings_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `services_id` (`services_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`services_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admins_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payments_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ratings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`services_id`) REFERENCES `services` (`services_id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
