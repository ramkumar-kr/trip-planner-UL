-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 04, 2015 at 09:13 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trip_planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `Stations`
--

CREATE TABLE IF NOT EXISTS `Stations` (
  `St_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`St_id`,`Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `Stations`
--

INSERT INTO `Stations` (`St_id`, `Name`) VALUES
(3, 'Ledo'),
(4, 'New Tinsukia Junction'),
(5, 'Dimapur'),
(6, 'Guhwati'),
(7, 'Kamakhya Junction'),
(8, 'Dibrugarh Town'),
(9, 'New Jalpaiguri Junction'),
(10, 'Delhi'),
(11, 'Bhopal'),
(12, 'Nagpur'),
(13, 'Vijaywada'),
(14, 'Chennai'),
(15, 'Madurai'),
(16, 'Kanyakumari'),
(17, 'Bhusaval'),
(18, 'Lucknow'),
(19, 'Mumbai'),
(20, 'Guntakkal'),
(21, 'Solapur'),
(22, 'Pune'),
(23, 'New Delhi'),
(24, 'Patna'),
(25, 'Kanpur Central');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE IF NOT EXISTS `trains` (
  `number` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `start_stn` int(11) DEFAULT NULL,
  `end_stn` int(11) DEFAULT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`number`, `name`, `description`, `start_stn`, `end_stn`) VALUES
(12163, 'Chennai Express', 'Journey Time is 23 hours...Arrives at Destination Next Day', 19, 14),
(12164, 'Chennai Express', 'Journey Time is 23 hours...Arrives at Destination Next Day', 14, 19),
(12423, 'Dibrugarh Town New Delhi Rajdhani Express', '', 8, 23),
(12424, 'New Delhi Dibrugarh Town Rajdhani Express', '', 23, 8),
(12533, 'Pushpak Express', 'Journey time is approximately 24 hours...Arrives at Destination next day', 18, 19),
(12534, 'Pushpak Express', 'Journey time is approximately 24 hours...Arrives at Destination next day', 19, 18),
(12641, 'Thirukkural Express', '', 16, 9),
(12642, 'Thirukkural Express', '', 9, 16),
(15603, 'Kamakhya Ledo Intercity Express', '', 7, 3),
(15604, 'Ledo Kamakhya Intercity Express', '', 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `number` bigint(20) NOT NULL DEFAULT '0',
  `St_id` int(11) NOT NULL DEFAULT '0',
  `Days` int(11) NOT NULL,
  `time` time NOT NULL,
  `type` tinyint(1) NOT NULL,
  `hop_index` int(11) NOT NULL,
  PRIMARY KEY (`number`,`St_id`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`number`, `St_id`, `Days`, `time`, `type`, `hop_index`) VALUES
(12163, 14, 127, '19:45:00', 0, 5),
(12163, 19, 127, '20:30:00', 1, 1),
(12163, 20, 127, '11:00:00', 0, 4),
(12163, 20, 127, '11:15:00', 1, 4),
(12163, 21, 127, '03:55:00', 0, 3),
(12163, 21, 127, '04:05:00', 1, 3),
(12163, 22, 127, '00:05:00', 0, 2),
(12163, 22, 127, '00:10:00', 1, 2),
(12164, 14, 127, '06:50:00', 1, 1),
(12164, 19, 127, '06:00:00', 0, 5),
(12164, 20, 127, '14:45:00', 0, 2),
(12164, 20, 127, '15:00:00', 1, 2),
(12164, 21, 127, '21:50:00', 0, 3),
(12164, 21, 127, '22:00:00', 1, 3),
(12164, 22, 127, '02:25:00', 0, 4),
(12164, 22, 127, '02:35:00', 1, 4),
(12534, 11, 127, '21:00:00', 0, 3),
(12534, 11, 127, '21:05:00', 1, 3),
(12534, 17, 127, '14:55:00', 0, 2),
(12534, 17, 127, '15:10:00', 1, 2),
(12534, 18, 127, '08:40:00', 0, 5),
(12534, 19, 127, '08:20:00', 1, 1),
(12534, 25, 127, '06:45:00', 0, 4),
(12534, 25, 127, '07:00:00', 1, 4),
(15603, 3, 8, '10:00:00', 0, 5),
(15603, 4, 8, '08:00:00', 0, 4),
(15603, 4, 8, '08:20:00', 1, 4),
(15603, 5, 8, '01:20:00', 0, 3),
(15603, 5, 8, '01:30:00', 1, 3),
(15603, 6, 4, '20:00:00', 0, 2),
(15603, 6, 4, '20:15:00', 1, 2),
(15603, 7, 4, '19:45:00', 1, 1),
(15604, 3, 4, '15:15:00', 1, 1),
(15604, 4, 4, '16:50:00', 0, 2),
(15604, 4, 4, '17:00:00', 1, 2),
(15604, 5, 4, '23:00:00', 0, 3),
(15604, 5, 4, '23:10:00', 1, 3),
(15604, 6, 8, '04:35:00', 0, 4),
(15604, 6, 8, '04:50:00', 1, 4),
(15604, 7, 8, '05:10:00', 0, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
