-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2017 at 01:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `train_tracker`
--
CREATE DATABASE IF NOT EXISTS `train_tracker` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `train_tracker`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `password`) VALUES
('admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `ulr` varchar(100) DEFAULT 'uploads/init.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`email`, `name`, `ulr`) VALUES
('musfiqpolash@yahoo.com', NULL, 'uploads/abc.ico'),
('musfiqpolash@gmail.com', NULL, 'uploads/We4ponx-Dead-Space-3-Dead-Space-3-3.ico'),
('sun.amran@gmail.com', NULL, 'uploads/init.png');

-- --------------------------------------------------------

--
-- Table structure for table `regnlog`
--

CREATE TABLE `regnlog` (
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `confirmed` int(11) DEFAULT '0',
  `confirm_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regnlog`
--

INSERT INTO `regnlog` (`firstname`, `lastname`, `gender`, `email`, `password`, `confirmed`, `confirm_code`) VALUES
('MD. MUSFIQUR', 'RAHMAN', 'male', 'musfiqpolash@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 1, '0'),
('MD. MUSFIQUR', 'RAHMAN', 'male', 'musfiqpolash@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '0'),
('shahi', 'amran', 'male', 'sun.amran@gmail.com', '7c79dd68b400e6b0c9f99f8f221dae26', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `stationmaster`
--

CREATE TABLE `stationmaster` (
  `name` varchar(150) NOT NULL,
  `password` varchar(150) DEFAULT NULL,
  `confirm` int(10) DEFAULT '0',
  `train_station` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stationmaster`
--

INSERT INTO `stationmaster` (`name`, `password`, `confirm`, `train_station`) VALUES
('samad', '1234567', 0, 'Dewangong'),
('stationmaster@dinajpur', '123456', 0, 'Dinajpur'),
('stationmaster@komlapur', '123456', 0, 'komlapur');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `train_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`train_name`) VALUES
('Ekota Express'),
('Mohanagar Goduli'),
('Parabat Express'),
('Subarna Express'),
('Tista Express');

-- --------------------------------------------------------

--
-- Table structure for table `trainschedule`
--

CREATE TABLE `trainschedule` (
  `train_no` int(11) NOT NULL,
  `train_name` varchar(100) DEFAULT NULL,
  `off_day` varchar(100) DEFAULT NULL,
  `starting_station` varchar(100) DEFAULT NULL,
  `departure_time` varchar(100) DEFAULT NULL,
  `arrival_station` varchar(100) DEFAULT NULL,
  `arrival_time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainschedule`
--

INSERT INTO `trainschedule` (`train_no`, `train_name`, `off_day`, `starting_station`, `departure_time`, `arrival_station`, `arrival_time`) VALUES
(111, 'Mohanagar Goduli', 'Monday', 'Chittagong', '10:20', 'Dhaka', '15:47'),
(123, 'Parabat Express', 'Thursday', 'Dhaka', '4:15', 'Dinajpur', '13:20'),
(707, 'Tista Express', 'Monday', 'Dhaka', '7.30', 'Dewangong', '12.40'),
(708, 'Tista Express', 'Monday', 'Dewangong', '15.00', 'Dhaka', '20.10');

-- --------------------------------------------------------

--
-- Table structure for table `trainstation`
--

CREATE TABLE `trainstation` (
  `station_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainstation`
--

INSERT INTO `trainstation` (`station_name`) VALUES
('banani'),
('Chittagong'),
('Dewangong'),
('Dhaka'),
('Dinajpur'),
('komlapur');

-- --------------------------------------------------------

--
-- Table structure for table `trainupdate`
--

CREATE TABLE `trainupdate` (
  `train_name` varchar(150) DEFAULT NULL,
  `train_status` varchar(150) DEFAULT NULL,
  `station_name` varchar(150) DEFAULT NULL,
  `t_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainupdate`
--

INSERT INTO `trainupdate` (`train_name`, `train_status`, `station_name`, `t_time`) VALUES
('Ekota Express', 'left', 'Dinajpur', '00:13:26'),
('Mohanagar Goduli', 'left', 'komlapur', '22:10:22'),
('Parabat Express', 'arrived', 'komlapur', '20:42:43'),
('Tista Express', 'left', 'komlapur', '13:13:29'),
('Subarna Express', 'arrived', 'Dinajpur', '23:41:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD KEY `email` (`email`);

--
-- Indexes for table `regnlog`
--
ALTER TABLE `regnlog`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `stationmaster`
--
ALTER TABLE `stationmaster`
  ADD PRIMARY KEY (`name`),
  ADD KEY `train_station` (`train_station`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`train_name`);

--
-- Indexes for table `trainschedule`
--
ALTER TABLE `trainschedule`
  ADD PRIMARY KEY (`train_no`),
  ADD KEY `train_name` (`train_name`),
  ADD KEY `starting_station` (`starting_station`),
  ADD KEY `arrival_station` (`arrival_station`);

--
-- Indexes for table `trainstation`
--
ALTER TABLE `trainstation`
  ADD PRIMARY KEY (`station_name`);

--
-- Indexes for table `trainupdate`
--
ALTER TABLE `trainupdate`
  ADD KEY `ststion_name` (`station_name`),
  ADD KEY `train_name` (`train_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `fk_of_regnlog` FOREIGN KEY (`email`) REFERENCES `regnlog` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stationmaster`
--
ALTER TABLE `stationmaster`
  ADD CONSTRAINT `stationmaster_ibfk_1` FOREIGN KEY (`train_station`) REFERENCES `trainstation` (`station_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainschedule`
--
ALTER TABLE `trainschedule`
  ADD CONSTRAINT `trainschedule_ibfk_1` FOREIGN KEY (`train_name`) REFERENCES `train` (`train_name`),
  ADD CONSTRAINT `trainschedule_ibfk_2` FOREIGN KEY (`starting_station`) REFERENCES `trainstation` (`station_name`),
  ADD CONSTRAINT `trainschedule_ibfk_3` FOREIGN KEY (`arrival_station`) REFERENCES `trainstation` (`station_name`);

--
-- Constraints for table `trainupdate`
--
ALTER TABLE `trainupdate`
  ADD CONSTRAINT `trainupdate_ibfk_1` FOREIGN KEY (`train_name`) REFERENCES `train` (`train_name`),
  ADD CONSTRAINT `trainupdate_ibfk_2` FOREIGN KEY (`station_name`) REFERENCES `trainstation` (`station_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
