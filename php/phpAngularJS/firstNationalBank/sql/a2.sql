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
-- Database: `a2`
--
CREATE DATABASE IF NOT EXISTS `a2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `a2`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CARD_NUM` varchar(100) NOT NULL,
  `ACCOUNT_NAME` varchar(100) NOT NULL,
  `ACCOUNT_BALANCE` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID`, `USER_ID`, `CARD_NUM`, `ACCOUNT_NAME`, `ACCOUNT_BALANCE`) VALUES
(13, 13, '2121-3242-1212-5353', 'Freedom', '361.00'),
(18, 13, '1232-1235-3256-1231', 'Freedom', '0.00'),
(25, 13, '3212-3221-2367-4332', 'Go', '0.00'),
(26, 18, '2232-1235-6312-3215', 'Freedom', '2213.00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `ID` int(11) NOT NULL,
  `ACCOUNT_ID` int(11) NOT NULL,
  `TRANSACTION_AMOUNT` decimal(20,2) NOT NULL,
  `TRANSACTION_TYPE` varchar(100) NOT NULL,
  `TRANSACTION_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`ID`, `ACCOUNT_ID`, `TRANSACTION_AMOUNT`, `TRANSACTION_TYPE`, `TRANSACTION_DATE`) VALUES
(22, 13, '211.00', 'Deposit', '2016-12-14 00:36:45'),
(23, 13, '100.00', 'Deposit', '2016-12-14 00:37:12'),
(24, 13, '100.00', 'Withdraw', '2016-12-14 00:37:29'),
(25, 13, '150.00', 'Deposit', '2016-12-14 01:14:30'),
(26, 26, '2213.00', 'Deposit', '2016-12-20 02:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `USER_NAME` varchar(100) NOT NULL,
  `USER_PASSWORD` varchar(100) NOT NULL,
  `USER_FNAME` varchar(100) NOT NULL,
  `USER_LNAME` varchar(100) NOT NULL,
  `USER_EMAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='User Table';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `USER_NAME`, `USER_PASSWORD`, `USER_FNAME`, `USER_LNAME`, `USER_EMAIL`) VALUES
(13, 'a2', 'a2', 'a2', 'a2', 'a2@gmail.com'),
(18, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 'test@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CARD_NUM` (`CARD_NUM`),
  ADD KEY `FK_account_user` (`USER_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_transaction_account` (`ACCOUNT_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USER_NAME` (`USER_NAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `FK_account_user` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FK_transaction_account` FOREIGN KEY (`ACCOUNT_ID`) REFERENCES `account` (`ID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
