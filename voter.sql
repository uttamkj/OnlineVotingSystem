-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3301
-- Generation Time: Dec 19, 2024 at 04:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ovs`
--

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `voterID` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`name`, `date`, `email`, `voterID`, `mobile`, `password`) VALUES
('Uttam Jena', '2002-02-02', 'uttamkumarjena507@gmail.com', '1234567ABC', '8018886621', 'Uttam@123'),
('Deepak', '2001-09-17', 'dk@gmail.com', '1234567ABD', '8984584457', 'Deepak@801'),
('Abhay das', '2002-07-24', 'abhay@gmail.com', '1234567ABY', '8899445855', 'Abhay@801'),
('Anil Sahu', '2002-10-10', 'anil@gmail.com', '1234567ANL', '8018015507', 'Anil@801'),
('Akanshya Das', '2002-01-08', 'bhua@gmail.com', '1234567BHU', '7735682996', 'Bhua@143'),
('Biki Dash', '2002-07-15', 'biki@gmail.com', '1234567BIK', '7735682119', 'Biki@801'),
('Neha Tabsassum', '2001-10-03', 'neha@gmail.com', '1234567NAH', '7873666772', '12345'),
('Rakesh Jena', '2002-07-18', 'rrjena@gmail.com', '1234567RRJ', '8984504020', 'Rakesh@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`voterID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
