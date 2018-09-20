-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 06:50 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `appid` int(11) NOT NULL AUTO_INCREMENT,
  `idNumber` int(10) NOT NULL,
  `hospitaID` int(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `appointmentType` varchar(50) NOT NULL,
  PRIMARY KEY (`appid`),
  UNIQUE KEY `idNumber` (`idNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appid`, `idNumber`, `hospitaID`, `date`, `time`, `appointmentType`) VALUES
(1, 31025958, 101, '2018-09-13', '16:00:00', 'RECIPIENT'),
(2, 2122132, 101, '2018-09-21', '13:59:00', 'DONOR');

-- --------------------------------------------------------

--
-- Table structure for table `donatedblood`
--

CREATE TABLE IF NOT EXISTS `donatedblood` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idNumber` int(70) NOT NULL,
  `serial` int(100) NOT NULL,
  `hospital` int(100) NOT NULL,
  `ddate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `donatedblood`
--

INSERT INTO `donatedblood` (`id`, `idNumber`, `serial`, `hospital`, `ddate`) VALUES
(1, 31025958, 1001, 101, '2018-09-21'),
(2, 29160543, 1002, 102, '2018-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE IF NOT EXISTS `hospitals` (
  `hospitalID` int(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobileNo` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`hospitalID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hospitalID`, `location`, `name`, `mobileNo`, `email`) VALUES
(101, 'NAIROBI', 'Nairobi west', 2147483647, 'billy@gmail.com'),
(103, 'nairobi', 'The nairobi hospital', 714562312, 'test1@tracom.co.ke'),
(102, 'Kisumu', 'prikl', 714562312, 'billy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `processedblood`
--

CREATE TABLE IF NOT EXISTS `processedblood` (
  `id` int(70) NOT NULL AUTO_INCREMENT,
  `serial` int(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `edate` date NOT NULL,
  `transfusionStatus` varchar(70) NOT NULL,
  `tdate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial` (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `processedblood`
--

INSERT INTO `processedblood` (`id`, `serial`, `type`, `status`, `edate`, `transfusionStatus`, `tdate`) VALUES
(1, 482017, 'A+', 'negative', '2018-09-14', '0000-00-00', '0000-00-00'),
(2, 402018, 'A+', 'negative', '2018-09-19', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `idNumber` int(10) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `code` int(4) NOT NULL,
  PRIMARY KEY (`idNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstName`, `lastName`, `idNumber`, `mobile`, `email`, `userType`, `password`, `code`) VALUES
('billy', 'liam', 23313323, '+254705895190', 'billy@gmail.com', 'admin', '$2y$10$TMm1bUhPkg65eNXSg9ahgePe.u6xFDR3mr59g8JzY74h7lgEDL.p.', 9873),
('ann2345', 'thiauru', 29160549, '+254724435030', 'liliankiri@gmail.com', 'user', '$2y$10$wvHlN8FfOs5RGCB9oiAjges5Jiyr3dptbn5FivN/rLlVFML9P9sCG', 0),
('user', 'usertena', 31025959, '+254712940269', 'user@yahoo.com', 'user', '$2y$10$wvHlN8FfOs5RGCB9oiAjges5Jiyr3dptbn5FivN/rLlVFML9P9sCG', 0),
('ann', 'mary', 23456789, '+254790123456', 'annmary@gmail.com', 'user', '$2y$10$zxj71JICtx.9yAR70.Tz6epCCn2/CL6L/53d9zdyYZ8VXU5H3gqaK', 0),
('roy', 'choge', 29160544, '+254712940267', 'chogeroy@gmail.com', 'user', '$2y$10$n/KFM6ShJcBwfeFBxZbmiukPlZ/aOUASCkdDLnR.jvOmqiW.wO7g.', 9724);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
