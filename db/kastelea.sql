-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2018 at 09:33 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kastelea`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE `app_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `user_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_user`
--

INSERT INTO `app_user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `user_type`) VALUES
(7, 'shamsudeen', 'fc93f00d1e684d6a335629969e61f432a28d46c1', 'Shamsudeen', 'Lawal', 'ROLE_ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `citizen_info`
--

CREATE TABLE `citizen_info` (
  `citizen_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `state_of_origin` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `license_no` varchar(50) NOT NULL,
  `passport` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `citizen_offence_info`
--

CREATE TABLE `citizen_offence_info` (
  `citizen_offence_id` int(11) NOT NULL,
  `citizen_id` int(11) NOT NULL,
  `code_id` int(11) NOT NULL,
  `vehicle_reg_no` varchar(200) NOT NULL,
  `vehicle_make` varchar(200) NOT NULL,
  `vehicle_colour` varchar(200) NOT NULL,
  `vehicle_type` varchar(200) NOT NULL,
  `vehicle_ownership` varchar(40) NOT NULL,
  `report_location` varchar(200) NOT NULL,
  `report_date` date NOT NULL,
  `offence_date` date NOT NULL,
  `officer_type` varchar(100) NOT NULL,
  `officer_id` varchar(100) NOT NULL,
  `officer_comment` varchar(200) NOT NULL,
  `settlement` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offences`
--

CREATE TABLE `offences` (
  `offence_id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `points` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `offence_desc` varchar(200) NOT NULL,
  `penalty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penalty_info`
--

CREATE TABLE `penalty_info` (
  `penalty_id` int(11) NOT NULL,
  `citizen_id` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `citizen_info`
--
ALTER TABLE `citizen_info`
  ADD PRIMARY KEY (`citizen_id`),
  ADD UNIQUE KEY `license_no` (`license_no`);

--
-- Indexes for table `citizen_offence_info`
--
ALTER TABLE `citizen_offence_info`
  ADD PRIMARY KEY (`citizen_offence_id`),
  ADD KEY `citizen_id` (`citizen_id`),
  ADD KEY `code_id` (`code_id`);

--
-- Indexes for table `offences`
--
ALTER TABLE `offences`
  ADD PRIMARY KEY (`offence_id`);

--
-- Indexes for table `penalty_info`
--
ALTER TABLE `penalty_info`
  ADD PRIMARY KEY (`penalty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_user`
--
ALTER TABLE `app_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `citizen_info`
--
ALTER TABLE `citizen_info`
  MODIFY `citizen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `citizen_offence_info`
--
ALTER TABLE `citizen_offence_info`
  MODIFY `citizen_offence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `offences`
--
ALTER TABLE `offences`
  MODIFY `offence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penalty_info`
--
ALTER TABLE `penalty_info`
  MODIFY `penalty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `citizen_offence_info`
--
ALTER TABLE `citizen_offence_info`
  ADD CONSTRAINT `citizen_offence_info_ibfk_1` FOREIGN KEY (`citizen_id`) REFERENCES `citizen_info` (`citizen_id`),
  ADD CONSTRAINT `citizen_offence_info_ibfk_2` FOREIGN KEY (`code_id`) REFERENCES `offences` (`offence_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
