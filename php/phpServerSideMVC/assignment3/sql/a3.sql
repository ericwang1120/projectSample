-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2016 at 06:45 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a3`
--
CREATE DATABASE IF NOT EXISTS `a3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `a3`;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `PRODUCT_SKU` varchar(100) NOT NULL,
  `PRODUCT_NAME` varchar(100) NOT NULL,
  `PRODUCT_CATEGORY` varchar(100) NOT NULL,
  `PRODUCT_COST` varchar(100) NOT NULL,
  `PRODUCT_STOCK_QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `PRODUCT_SKU`, `PRODUCT_NAME`, `PRODUCT_CATEGORY`, `PRODUCT_COST`, `PRODUCT_STOCK_QUANTITY`) VALUES
(1, 'ham13', 'Square Hammer', 'Hammers', '$39.95', 10),
(2, 'gun12', 'Heat Gun 1500 Watt', 'Heat Guns', '$29.95', 5),
(3, 'pli15', 'Slip Joint Pliers', 'Pliers', '$34.95', 13),
(4, 'screw11', 'Square screwdirvers', 'Screwdrivers', '$14.95', 14),
(5, 'ham23', 'Claw Hammer', 'Hammers', '$24.95', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `USER_NAME` varchar(100) NOT NULL,
  `USER_PASSWORD` varchar(100) NOT NULL,
  `USER_FULL_NAME` varchar(100) NOT NULL,
  `USER_EMAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `USER_NAME`, `USER_PASSWORD`, `USER_FULL_NAME`, `USER_EMAIL`) VALUES
(22, 'The_Toolman', 'cfcd208495d565ef66e7dff9f98764da', 'Tim Taylor', 'tim@gmail.com'),
(23, 'test1', 'cfcd208495d565ef66e7dff9f98764da', 'test1', 'test1@qq.com'),
(24, 'a3', 'cfcd208495d565ef66e7dff9f98764da', 'a3', 'a@a.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
