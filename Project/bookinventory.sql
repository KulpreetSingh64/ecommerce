-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 01:12 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookinventory`
--

CREATE TABLE `bookinventory` (
  `BookId` int(11) NOT NULL,
  `Book_Name` varchar(200) NOT NULL,
  `Book_Author` varchar(50) NOT NULL,
  `Published_Date` date DEFAULT NULL,
  `Media_Type` varchar(50) DEFAULT NULL,
  `Pages` int(10) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookinventory`
--

INSERT INTO `bookinventory` (`BookId`, `Book_Name`, `Book_Author`, `Published_Date`, `Media_Type`, `Pages`, `Quantity`) VALUES
(3, 'The Subtle Art of Not Giving Fuck ', 'Mark Manson', '2016-09-13', 'Print', 224, 50),
(4, 'Rani Tatt', 'Harmanjeet Singh', '2015-08-19', 'Print', 159, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinventory`
--
ALTER TABLE `bookinventory`
  ADD PRIMARY KEY (`BookId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinventory`
--
ALTER TABLE `bookinventory`
  MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
