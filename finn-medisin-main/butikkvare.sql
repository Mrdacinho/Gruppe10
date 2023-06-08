-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: eu-cdbr-west-03.cleardb.net
-- Generation Time: May 19, 2023 at 06:34 PM
-- Server version: 5.6.50-log
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heroku_6ddedc26b2d36d5`
--

-- --------------------------------------------------------

--
-- Table structure for table `butikkvare`
--

CREATE TABLE `butikkvare` (
  `butikk_id` int(11) NOT NULL,
  `vare_id` int(11) NOT NULL,
  `på_lager` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `butikkvare`
--

INSERT INTO `butikkvare` (`butikk_id`, `vare_id`, `på_lager`) VALUES
(1, 1, 10),
(1, 2, 5),
(1, 3, 3),
(1, 4, 0),
(1, 5, 12),
(2, 1, 8),
(2, 2, 15),
(2, 3, 2),
(2, 4, 7),
(2, 5, 9),
(3, 1, 20),
(3, 2, 0),
(3, 3, 5),
(3, 4, 4),
(3, 5, 3),
(4, 1, 6),
(4, 2, 12),
(4, 3, 7),
(4, 4, 9),
(4, 5, 1),
(5, 1, 2),
(5, 2, 0),
(5, 3, 10),
(5, 4, 6),
(5, 5, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `butikkvare`
--
ALTER TABLE `butikkvare`
  ADD PRIMARY KEY (`butikk_id`,`vare_id`),
  ADD KEY `vare_id` (`vare_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `butikkvare`
--
ALTER TABLE `butikkvare`
  ADD CONSTRAINT `butikkvare_ibfk_1` FOREIGN KEY (`butikk_id`) REFERENCES `butikk` (`butikk_id`),
  ADD CONSTRAINT `butikkvare_ibfk_2` FOREIGN KEY (`vare_id`) REFERENCES `vare` (`vare_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
