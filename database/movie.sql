-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2024 at 09:58 AM
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
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `movieUsers`
--

CREATE TABLE `movieUsers` (
  `id` int(100) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `LastLogin` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movieUsers`
--

INSERT INTO `movieUsers` (`id`, `Name`, `Email`, `Password`, `LastLogin`) VALUES
(22, 'Devansh', 'dkansagra04@gmail.com', '9879879871', '2024-04-05 18:29:23.000000'),
(23, 'Pratham Patel', 'pradpat1918@gmail.com', '1231231234', '2024-04-05 10:28:01.000000'),
(24, 'Manav Kalola', 'manavkalola1612@gmail.com', '1234', '2024-04-05 14:26:06.000000'),
(27, 'John Doe', 'nabor77592@agromgt.com', 'bvmengineering', '2024-04-05 19:40:11.000000'),
(28, 'Devansh Kansagra', 'devanshkansagra163@gmail.com', 'Dev123', '2024-04-05 21:14:10.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movieUsers`
--
ALTER TABLE `movieUsers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movieUsers`
--
ALTER TABLE `movieUsers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
