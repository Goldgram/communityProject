-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2014 at 10:28 PM
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
  `ip` varchar(15) NOT NULL,
  `location` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `objectType` varchar(20) NOT NULL,
  `objectWidth` tinyint(11) NOT NULL,
  `objectHeight` tinyint(11) NOT NULL,
  `objectX` int(11) NOT NULL,
  `objectY` int(11) NOT NULL,
  `objectColor` varchar(10) NOT NULL,
  `objectTexture` varchar(10) NOT NULL,
  `objectZIndex` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `objects_table`
--

INSERT INTO `objects_table` (`id`, `ip`, `location`, `country`, `userName`, `objectType`, `objectWidth`, `objectHeight`, `objectX`, `objectY`, `objectColor`, `objectTexture`, `objectZIndex`, `timestamp`) VALUES
(1, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'Square', 1, 2, 2, 2, 'aqua', '0', 0, '2014-04-27 20:23:46'),
(2, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'circle', 1, 1, 6, 3, 'green', '0', 0, '2014-04-27 20:23:57'),
(3, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'circle', 4, 2, 4, 6, 'orange', '0', 0, '2014-04-27 20:23:58');
