-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2014 at 12:07 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `community_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `objects_table`
--

CREATE TABLE `objects_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `object_type` varchar(100) NOT NULL,
  `object_x` int(11) NOT NULL,
  `object_y` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `objects_table`
--

INSERT INTO `objects_table` (`id`, `location`, `level`, `ip`, `user_name`, `object_type`, `object_x`, `object_y`, `timestamp`) VALUES
(1, 'Artane', 1, '89.100.130.46', 'Sterling Archer', 'Square', 150, 100, '2014-04-08 22:06:28'),
(2, 'Artane', 1, '89.100.130.46', 'Sterling Archer', 'Square', 150, 100, '2014-04-08 22:06:29'),
(3, 'Artane', 1, '89.100.130.46', 'Sterling Archer', 'Square', 150, 100, '2014-04-08 22:06:29'),
(4, 'Artane', 1, '89.100.130.46', 'Sterling Archer', 'Square', 150, 100, '2014-04-08 22:06:30'),
(5, 'Artane', 1, '89.100.130.46', 'Sterling Archer', 'Square', 150, 100, '2014-04-08 22:06:36');
