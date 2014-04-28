-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2014 at 11:22 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `objects_table`
--

INSERT INTO `objects_table` (`id`, `ip`, `location`, `country`, `userName`, `objectType`, `objectWidth`, `objectHeight`, `objectX`, `objectY`, `objectColor`, `objectTexture`, `objectZIndex`, `timestamp`) VALUES
(1, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'triangle-L', 4, 2, 6, 7, 'lime', '001', 0, '2014-04-28 10:32:01'),
(2, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'circle', 1, 2, 5, 5, 'gray', '002', 0, '2014-04-28 10:32:02'),
(3, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'square', 2, 4, 2, 7, 'fuchsia', '000', 0, '2014-04-28 10:32:02'),
(4, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'triangle-R', 3, 1, 7, 2, 'purple', '002', 0, '2014-04-28 20:58:20'),
(5, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'triangle-R', 4, 4, 8, 3, 'navy', '002', 0, '2014-04-28 20:58:36'),
(6, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'circle', 2, 2, 7, 10, 'yellow', '001', 0, '2014-04-28 20:58:36'),
(7, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'triangle-R', 2, 4, 5, 4, 'red', '002', 0, '2014-04-28 20:58:36'),
(8, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'triangle-L', 1, 1, 2, 7, 'green', '001', 0, '2014-04-28 20:58:36'),
(9, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'triangle-R', 2, 4, 1, 4, 'orange', '000', 0, '2014-04-28 20:58:36');
