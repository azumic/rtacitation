-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 10:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcitationticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(11) NOT NULL,
  `a_fname` varchar(50) NOT NULL,
  `a_mname` varchar(50) NOT NULL,
  `a_lname` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `date_of_hired` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `a_fname`, `a_mname`, `a_lname`, `position`, `date_of_hired`, `username`, `password`) VALUES
(1, 'Cedric', 'Matthew', 'Verdida', 'Admin', '2019-08-25', '1', '1'),
(3, 'sample', 's', 'sample', 'Admin', '2020-04-05', 's', 's'),
(4, 'Jeriamiah', 'B', 'Simo', 'User', '2020-04-11', 'a', 'a'),
(5, 'Cedric', 'B', 'Verdida', 'Admin', '2021-03-08', 'azumica', 'verdida123'),
(12, 'Tqe', 'qwe', 'teq', 'Admin', '2021-03-08', 'q', 'q'),
(13, 'e', 'w', 'w', 'User', '2021-03-08', 'we', 'w'),
(14, 'Jennifer', 'B', 'Ranedo', 'User', '2021-03-09', 'jiji', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `citation_reg`
--

CREATE TABLE `citation_reg` (
  `citation_no` int(11) NOT NULL,
  `violator_name` varchar(50) NOT NULL,
  `violator_address` varchar(50) NOT NULL,
  `cs_id` int(11) NOT NULL,
  `enforcer` int(11) NOT NULL,
  `violator_bday` date NOT NULL,
  `license_number` varchar(20) NOT NULL,
  `license_code` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `height` varchar(20) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `plate_number` varchar(50) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `owners_address` varchar(50) NOT NULL,
  `vehicle_code` int(11) NOT NULL,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `marking` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `cit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citation_reg`
--

INSERT INTO `citation_reg` (`citation_no`, `violator_name`, `violator_address`, `cs_id`, `enforcer`, `violator_bday`, `license_number`, `license_code`, `expire_date`, `nationality`, `height`, `weight`, `location`, `plate_number`, `owner_name`, `owners_address`, `vehicle_code`, `make`, `model`, `color`, `marking`, `amount`, `cit_date`) VALUES
(8, 'JERIMIAH B SIMO', 'ROSAL STREET CARMEN CAGAYAN DE ORO CITY', 2, 1, '1999-02-09', 'K02-KJQ-342', 50, '2023-09-24', 'SPANISH', '58', '52', '23', 'CED 092', 'JERIMIAH B SIMO', 'ROSAL STREET CARMEN CAGAYAN DE ORO CITY', 2, '2021', 'TESLA', 'WHITE', 'NO HEADLIGHTS', 3000, '2021-03-14'),
(9, 'CEDRIC MATTHEW VERDIDA', 'VILLA ANGELA BALULANG CAGAYAN DE ORO CITY', 2, 1, '2000-09-27', 'KO2-CAB2-KQJ', 48, '2023-09-14', 'FILIPINO', '55', '49', '24', 'ABJD 023', 'CEDRIC MATTHEW VERDIDA', 'VILLA ANGELA BALULANG BLK16 LOT 12 B CAGAYAN DE OR', 1, '2020', 'KAWASAKI 200 CC NINJA', 'MATTE RED', 'LOUD PIPE', 8000, '2021-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `cs_status`
--

CREATE TABLE `cs_status` (
  `cs_id` int(11) NOT NULL,
  `cs_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_status`
--

INSERT INTO `cs_status` (`cs_id`, `cs_status`) VALUES
(2, '73 hours'),
(3, '48 hours'),
(4, '1 hour'),
(5, '2 hours'),
(7, '4 hours'),
(12, '3 hours');

-- --------------------------------------------------------

--
-- Table structure for table `enforcer_id`
--

CREATE TABLE `enforcer_id` (
  `enforcer_id` int(11) NOT NULL,
  `e_fname` varchar(50) NOT NULL,
  `e_mname` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `location_dispatch` varchar(50) NOT NULL,
  `e_position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `license_type`
--

CREATE TABLE `license_type` (
  `license_code` int(11) NOT NULL,
  `license_typename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `license_type`
--

INSERT INTO `license_type` (`license_code`, `license_typename`) VALUES
(48, 'non prof'),
(49, 'professional'),
(50, 'student permit');

-- --------------------------------------------------------

--
-- Table structure for table `location_info`
--

CREATE TABLE `location_info` (
  `location_code` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_info`
--

INSERT INTO `location_info` (`location_code`, `location_name`) VALUES
(21, 'carmen'),
(22, 'balulang'),
(23, 'macanhan'),
(24, 'puerto'),
(25, 'lapasan'),
(26, 'agora');

-- --------------------------------------------------------

--
-- Table structure for table `offense_info`
--

CREATE TABLE `offense_info` (
  `offense_id` int(11) NOT NULL,
  `offense_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offense_info`
--

INSERT INTO `offense_info` (`offense_id`, `offense_name`) VALUES
(1, 'first offense'),
(2, 'second offense'),
(3, 'third offense'),
(7, 'fourth offense'),
(8, 'fifth offense'),
(9, 'sixth offense'),
(10, 'seventh offense');

-- --------------------------------------------------------

--
-- Table structure for table `penalty_info`
--

CREATE TABLE `penalty_info` (
  `penalty_id` int(11) NOT NULL,
  `violation_code` int(11) NOT NULL,
  `offense_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penalty_info`
--

INSERT INTO `penalty_info` (`penalty_id`, `violation_code`, `offense_id`, `amount`) VALUES
(141, 2, 2, 6000),
(142, 3, 1, 2000),
(145, 2, 1, 1000),
(147, 1, 1, 1500),
(148, 1, 2, 3000),
(149, 1, 3, 4500),
(150, 1, 7, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `vehicle_code` int(11) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`vehicle_code`, `vehicle_type`) VALUES
(1, '2 wheels'),
(2, '4 wheels'),
(3, '5 wheels'),
(4, '10 wheels');

-- --------------------------------------------------------

--
-- Table structure for table `violation_info`
--

CREATE TABLE `violation_info` (
  `violation_code` int(11) NOT NULL,
  `violation_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `violation_info`
--

INSERT INTO `violation_info` (`violation_code`, `violation_name`) VALUES
(1, 'no helmet'),
(2, 'reckless driving'),
(3, 'beating the red light'),
(4, 'driving without seatbealt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `citation_reg`
--
ALTER TABLE `citation_reg`
  ADD PRIMARY KEY (`citation_no`);

--
-- Indexes for table `cs_status`
--
ALTER TABLE `cs_status`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `enforcer_id`
--
ALTER TABLE `enforcer_id`
  ADD PRIMARY KEY (`enforcer_id`);

--
-- Indexes for table `license_type`
--
ALTER TABLE `license_type`
  ADD PRIMARY KEY (`license_code`);

--
-- Indexes for table `location_info`
--
ALTER TABLE `location_info`
  ADD PRIMARY KEY (`location_code`);

--
-- Indexes for table `offense_info`
--
ALTER TABLE `offense_info`
  ADD PRIMARY KEY (`offense_id`);

--
-- Indexes for table `penalty_info`
--
ALTER TABLE `penalty_info`
  ADD PRIMARY KEY (`penalty_id`),
  ADD UNIQUE KEY `violation_code` (`violation_code`,`offense_id`),
  ADD KEY `violation_code_2` (`violation_code`),
  ADD KEY `offense_id` (`offense_id`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD PRIMARY KEY (`vehicle_code`);

--
-- Indexes for table `violation_info`
--
ALTER TABLE `violation_info`
  ADD PRIMARY KEY (`violation_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `citation_reg`
--
ALTER TABLE `citation_reg`
  MODIFY `citation_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cs_status`
--
ALTER TABLE `cs_status`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `enforcer_id`
--
ALTER TABLE `enforcer_id`
  MODIFY `enforcer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `license_type`
--
ALTER TABLE `license_type`
  MODIFY `license_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `location_info`
--
ALTER TABLE `location_info`
  MODIFY `location_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `offense_info`
--
ALTER TABLE `offense_info`
  MODIFY `offense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penalty_info`
--
ALTER TABLE `penalty_info`
  MODIFY `penalty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `vehicle_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `violation_info`
--
ALTER TABLE `violation_info`
  MODIFY `violation_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penalty_info`
--
ALTER TABLE `penalty_info`
  ADD CONSTRAINT `penalty_info_ibfk_1` FOREIGN KEY (`violation_code`) REFERENCES `violation_info` (`violation_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penalty_info_ibfk_2` FOREIGN KEY (`offense_id`) REFERENCES `offense_info` (`offense_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
