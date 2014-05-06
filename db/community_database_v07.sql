-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2014 at 10:56 AM
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
  `objectWidth` tinyint(3) NOT NULL,
  `objectHeight` tinyint(3) NOT NULL,
  `objectX` int(11) NOT NULL,
  `objectY` int(11) NOT NULL,
  `objectColor` varchar(10) NOT NULL,
  `objectTexture` varchar(10) NOT NULL,
  `objectZIndex` int(11) NOT NULL,
  `objectRotation` tinyint(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `objects_table`
--

INSERT INTO `objects_table` (`id`, `ip`, `location`, `country`, `userName`, `objectType`, `objectWidth`, `objectHeight`, `objectX`, `objectY`, `objectColor`, `objectTexture`, `objectZIndex`, `objectRotation`, `timestamp`) VALUES
(1, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'triangle-R', 3, 1, 7, 8, 'silver', '002', 0, 0, '2014-04-30 08:46:44'),
(2, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'triangle-E', 1, 4, 1, 5, 'green', '000', 0, 0, '2014-04-30 08:46:45'),
(3, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'triangle-L', 2, 4, 5, 7, 'maroon', '001', 0, 0, '2014-04-30 08:46:46'),
(4, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'triangle-E', 3, 2, 2, 8, 'blue', '001', 0, 1, '2014-04-30 08:46:46'),
(5, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'circle', 1, 1, 3, 3, 'red', '002', 0, 0, '2014-04-30 08:46:46'),
(6, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'square', 1, 1, 5, 2, 'yellow', '002', 0, 0, '2014-04-30 08:46:46'),
(7, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'square', 4, 2, 6, 6, 'orange', '001', 0, 3, '2014-04-30 08:46:46'),
(8, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'square', 4, 4, 6, 4, 'lime', '000', 0, 0, '2014-04-30 08:46:46'),
(9, '50.31.252.76', 'Tokyo', 'Japan', 'A', 'circle', 3, 4, 11, 7, 'teal', '001', 0, 0, '2014-04-30 08:46:46');
