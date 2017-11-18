-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 01:25 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nowaitappointments`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `aid` int(65) NOT NULL,
  `requestId` int(65) NOT NULL,
  `serviceId` int(65) NOT NULL,
  `appTime` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `status` int(1) NOT NULL DEFAULT '0',
  `closure` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `name`, `description`) VALUES
(1, 'Carpenter', 'Carpenter for all types of wood work'),
(2, 'Painter', 'Painter for painting'),
(3, 'Doctor', 'Doctors for All types of patients'),
(4, 'Plumber', 'Plumber for tap works'),
(5, 'Consultant', 'Consultant for any problem'),
(6, 'Laywer', 'Help clients');

-- --------------------------------------------------------

--
-- Table structure for table `serviceprofile`
--

CREATE TABLE `serviceprofile` (
  `categoryId` int(10) NOT NULL,
  `currentLat` varchar(30) NOT NULL,
  `currentLong` varchar(30) NOT NULL,
  `uid` int(65) NOT NULL,
  `price` int(65) NOT NULL,
  `limit` int(65) NOT NULL,
  `durationStart` time(6) NOT NULL,
  `durationStop` time(6) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceprofile`
--

INSERT INTO `serviceprofile` (`categoryId`, `currentLat`, `currentLong`, `uid`, `price`, `limit`, `durationStart`, `durationStop`, `rating`) VALUES
(1, '12.9376048', '77.5346939', 1, 280, 5, '09:30:00.000000', '17:00:00.000000', 3),
(2, '12.9323747', '77.5706254', 2, 350, 4, '08:15:00.000000', '17:30:00.000000', 4),
(3, '12.9419154', '77.5451603', 3, 420, 7, '09:45:00.000000', '16:00:00.000000', 5),
(4, '12.9394849', '77.5101414', 4, 620, 8, '10:30:00.000000', '18:00:00.000000', 4),
(5, '12.9396475', '77.5101414', 5, 290, 2, '07:45:00.000000', '15:00:00.000000', 3),
(6, '12.9354351', '77.5345509', 6, 1400, 9, '08:45:00.000000', '17:15:00.000000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `dob` date NOT NULL,
  `uid` int(65) NOT NULL,
  `currentLat` varchar(30) NOT NULL,
  `currentLong` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`dob`, `uid`, `currentLat`, `currentLong`) VALUES
('1999-08-18', 11, '12.974831', '77.60935'),
('1996-01-08', 12, '12.927607', '77.617035'),
('1998-11-27', 13, '12.969096', '77.746124'),
('1995-05-31', 14, '13.097536', '77.595749'),
('1997-02-07', 15, '13.239945', '77.711792');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(65) NOT NULL,
  `uname` varchar(65) NOT NULL,
  `uid` int(65) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `password` varchar(65) NOT NULL,
  `address` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `uname`, `uid`, `type`, `password`, `address`) VALUES
('Service A', 'service1', 1, 1, 'service1', 'bangalore'),
('Service B', 'service2', 2, 1, 'service2', 'bangalore'),
('Service C', 'service3', 3, 1, 'service3', 'bangalore'),
('Service D', 'service4', 4, 1, 'service4', 'bangalore'),
('Service E', 'service5', 5, 1, 'service5', 'bangalore'),
('Service F', 'service6', 6, 1, 'service6', 'bangalore'),
('Raaghav', 'user1', 11, 0, 'user1', 'Promont apartments'),
('Ravi', 'user2', 12, 0, 'user2', 'Skyline Ambrosia Apartment'),
('Anujay', 'user3', 13, 0, 'user3', 'Sterling Terraces Apartment'),
('Amit', 'user4', 14, 0, 'user4', 'Farm No 36, Chattarpur Farms'),
('Subham', 'user5', 15, 0, 'user5', 'Gulmohar Villa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `Appointment_fk0` (`requestId`),
  ADD KEY `Appointment_fk1` (`serviceId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `serviceprofile`
--
ALTER TABLE `serviceprofile`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `ServiceProfile_fk0` (`categoryId`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `aid` int(65) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `Appointment_fk0` FOREIGN KEY (`requestId`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `Appointment_fk1` FOREIGN KEY (`serviceId`) REFERENCES `users` (`uid`);

--
-- Constraints for table `serviceprofile`
--
ALTER TABLE `serviceprofile`
  ADD CONSTRAINT `ServiceProfile_fk0` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`),
  ADD CONSTRAINT `ServiceProfile_fk1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `UserProfile_fk0` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
