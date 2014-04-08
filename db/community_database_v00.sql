SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `community_database`
--
CREATE DATABASE `community_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `community_database`;

-- --------------------------------------------------------

--
-- Table structure for table `objects_table`
--
CREATE TABLE `objects_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,

  `location` varchar(100) NOT NULL,
  `level` int NOT NULL,

  `ip` varchar(15) NOT NULL,
  `user_name` varchar(50) NOT NULL,

  `object_type` varchar(100) NOT NULL,
  `object_x` int NOT NULL,
  `object_y` int NOT NULL,

  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
