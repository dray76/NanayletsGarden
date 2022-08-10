-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql108.epizy.com
-- Generation Time: Mar 04, 2022 at 09:52 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31210536_nanaygarden`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordersId` int(11) NOT NULL,
  `ordersItem` varchar(128) NOT NULL,
  `ordersPrice` int(11) NOT NULL,
  `ordersUser` varchar(128) NOT NULL,
  `ordersDate` varchar(128) NOT NULL,
  `ordersAddrs` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ordersId`, `ordersItem`, `ordersPrice`, `ordersUser`, `ordersDate`, `ordersAddrs`) VALUES
(1, 'Ficus Audreyx2, Monstera deliciosax1, Gardening Potx3', 16600, 'Shishamo', '03/05/2022 02:33am', 'Orense, Makati, Metro Manila'),
(2, 'Gardening Potx4, Gardening Shovelx1', 1020, 'Tuffles', '03/05/2022 03:58am', 'Hagonoy Bagumbayan, Taguig City'),
(3, 'Gardening Shovelx2, Gardening Potx1', 640, 'Shishamo', '03/05/2022 10:40am', 'Orense, Makati, Metro Manila');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersAddress` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersEmail`, `usersUid`, `usersAddress`, `usersPwd`) VALUES
(1, 'admin@admin.com', 'Admin', 'Admin', '$2y$10$DDjxhjetquHo2xnmpK8ktuHtb4XKm5oGT6yOdkkJV50pHR.mHeAqO'),
(2, 'shishamo@shishamo.com', 'Shishamo', 'Orense, Makati, Metro Manila', '$2y$10$bjx6k/fBy2yStP5er7/tdOt42J8b7g9G52m2CnkbnZrMtwa/6hCki'),
(3, 'ygluvia@gmail.com', 'Tuffles', 'Hagonoy Bagumbayan, Taguig City', '$2y$10$Z0lMiT1/t5MK85D3VT0lw.QFK.w0Wat1KKOv5V7Tb0MLHdRP0pH7K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordersId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
