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
  `ip` varchar(15) NOT NULL,
  `location` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `objectType` varchar(20) NOT NULL,
  `objectX` int(11) NOT NULL,
  `objectY` int(11) NOT NULL,
  `objectColor` varchar(10) NOT NULL,
  `objectTexture` varchar(10) NOT NULL,
  `objectZIndex` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

