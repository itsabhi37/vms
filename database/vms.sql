-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2018 at 09:12 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `id` bigint(20) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `department` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `gender` text NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`id`, `uname`, `name`, `designation`, `department`, `email`, `mobile`, `gender`, `image`) VALUES
(1, 'ak11693', 'Abhishek Kumar', 'Assistant Programmer', 'National Informatics Center, Dhanbad', 'ak11693@gmail.com', '9608663316', 'Male', 'http://localhost:8080/vms/uploads/admin_image/1528700746.jpg'),
(3, 'ak116', 'Sandeep Kumar', 'Programmer', 'NIC', 'sandcse07@gmail.com', '9708561587', 'Female', 'http://localhost:8080/vms/uploads/admin_image/1528702318.png'),
(4, 'admin', 'Abhishek Kumar', 'Administrator', 'NIC', 'abhishekkr11693@gmail.com', '7209565717', 'Male', 'http://localhost:8080/vms/uploads/admin_image/1528702319.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

CREATE TABLE `bookingdetails` (
  `id` bigint(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `uname` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingdetails`
--

INSERT INTO `bookingdetails` (`id`, `ip`, `uname`, `date`, `time_from`, `time_to`) VALUES
(11, '010.134.073.012', 'NIC20180003', '2018-06-20', '13:05:00', '14:05:00'),
(12, '010.134.073.012', 'NIC20180003', '2018-06-21', '08:45:00', '09:45:00'),
(13, '010.134.073.007', 'NIC20180003', '2018-06-21', '09:13:00', '10:13:00'),
(14, '010.134.073.007', 'NIC20180001', '2018-06-21', '10:34:00', '11:00:00'),
(15, '010.134.073.012', 'NIC20180003', '2018-06-21', '10:45:00', '10:45:00'),
(16, '010.134.073.012', 'NIC20180003', '2018-06-21', '10:46:00', '10:50:00'),
(18, '010.134.073.012', 'NIC20180001', '2018-06-21', '11:44:00', '12:44:00'),
(19, '010.134.073.007', 'NIC20180001', '2018-06-21', '12:03:00', '13:04:00'),
(20, '010.134.073.010', 'NIC20180001', '2018-05-13', '10:00:00', '15:00:00'),
(21, '010.134.073.010', 'NIC20180001', '2018-06-28', '15:58:00', '16:58:00'),
(22, '010.134.073.010', 'NIC20180003', '2018-06-28', '14:59:00', '15:59:00'),
(23, '010.134.073.010', 'NIC20180003', '2018-07-07', '10:46:00', '11:46:00'),
(24, '010.134.073.010', 'NIC20180003', '2018-07-10', '12:34:00', '13:05:00'),
(25, '010.134.073.012', 'NIC20180003', '2018-07-10', '12:36:00', '13:05:00'),
(26, '010.134.073.007', 'NIC20180003', '2018-07-10', '13:03:00', '13:15:00'),
(27, '010.134.073.012', 'NIC20180003', '2018-07-10', '13:46:00', '14:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`uname`, `pwd`, `user_type`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin'),
('ak116', '57416f91f587dc49e0e722781f7f706ecca47119', 'Admin'),
('ak11693', '57416f91f587dc49e0e722781f7f706ecca47119', 'Admin'),
('NIC20180001', '57416f91f587dc49e0e722781f7f706ecca47119', 'Visitor'),
('NIC20180003', '57416f91f587dc49e0e722781f7f706ecca47119', 'Visitor'),
('visitor', '4ed0428505b0b89fe7bc1a01928ef1bd4c77c1be', 'Visitor');

-- --------------------------------------------------------

--
-- Table structure for table `pcdetails`
--

CREATE TABLE `pcdetails` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `systemtype` varchar(10) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `networktype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcdetails`
--

INSERT INTO `pcdetails` (`id`, `name`, `systemtype`, `uname`, `password`, `ip`, `networktype`) VALUES
(1, 'DELL', 'Desktop', 'DHN', '123', '010.134.073.010', 'Internet'),
(3, 'Lenovo', 'Desktop', 'DHN', '123', '010.134.073.007', 'Intranet'),
(4, 'HP', 'Laptop', 'DHN', '123', '010.134.073.012', 'Internet');

-- --------------------------------------------------------

--
-- Table structure for table `visitordetails`
--

CREATE TABLE `visitordetails` (
  `uname` varchar(15) NOT NULL,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `department` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `gender` text NOT NULL,
  `poi` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitordetails`
--

INSERT INTO `visitordetails` (`uname`, `name`, `designation`, `department`, `email`, `mobile`, `gender`, `poi`, `image`) VALUES
('NIC20180001', 'Abhishek Kumar', 'Administrator', 'National Informatics Center, Dhanbad', 'abhi11693@yahoo.com', '9608663316', 'Male', 'http://localhost:8080/vms/uploads/visitor_poi/POI_NIC20180001.pdf', 'http://localhost:8080/vms/uploads/visitor_image/NIC20180001.JPG'),
('NIC20180003', 'Sandeep Kumar', 'Programmer', 'National Informatics Center, Dhanbad', 'sandcse07@gmail.com', '9708561587', 'Male', 'http://localhost:8080/vms/uploads/visitor_poi/POI_NIC20180003.pdf', 'http://localhost:8080/vms/uploads/visitor_image/NIC20180003.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD PRIMARY KEY (`uname`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `pcdetails`
--
ALTER TABLE `pcdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip` (`ip`);

--
-- Indexes for table `visitordetails`
--
ALTER TABLE `visitordetails`
  ADD PRIMARY KEY (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindetails`
--
ALTER TABLE `admindetails`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `pcdetails`
--
ALTER TABLE `pcdetails`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
