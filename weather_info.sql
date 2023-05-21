-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 10:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weather_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `weather_info`
--

CREATE TABLE `weather_info` (
  `country` varchar(100) DEFAULT current_timestamp(),
  `Dayy` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `icon` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `weather_description` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `temperature` float NOT NULL DEFAULT current_timestamp(),
  `humidity` double NOT NULL DEFAULT current_timestamp(),
  `wind_speed` float NOT NULL DEFAULT current_timestamp(),
  `weather_when` datetime NOT NULL DEFAULT current_timestamp(),
  `city` varchar(100) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weather_info`
--

INSERT INTO `weather_info` (`country`, `Dayy`, `icon`, `weather_description`, `temperature`, `humidity`, `wind_speed`, `weather_when`, `city`) VALUES
('NP', 'Sunday', '04d', 'overcast clouds', 10.48, 68, 2.51, '2023-05-07 10:01:25', 'Gorkhā');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
