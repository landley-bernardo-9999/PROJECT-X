-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2018 at 02:33 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vester_dbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactpersons`
--

DROP TABLE IF EXISTS `contactpersons`;
CREATE TABLE IF NOT EXISTS `contactpersons` (
  `contactPersonId` int(11) NOT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `personId` int(11) NOT NULL,
  PRIMARY KEY (`contactPersonId`,`personId`),
  KEY `fk_contactPersons_persons1_idx` (`personId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactpersons`
--

INSERT INTO `contactpersons` (`contactPersonId`, `relationship`, `personId`) VALUES
(1, 'sibling', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employeeId` int(11) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `personId` int(11) NOT NULL,
  PRIMARY KEY (`employeeId`,`userid`,`personId`),
  KEY `fk_employees_users1_idx` (`userid`),
  KEY `fk_employees_persons1_idx` (`personId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

DROP TABLE IF EXISTS `owners`;
CREATE TABLE IF NOT EXISTS `owners` (
  `ownerId` int(11) NOT NULL,
  `bankName` varchar(255) DEFAULT NULL,
  `bankAccountNumber` varchar(255) DEFAULT NULL,
  `personId` int(11) NOT NULL,
  PRIMARY KEY (`ownerId`,`personId`),
  KEY `fk_owners_persons1_idx` (`personId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
CREATE TABLE IF NOT EXISTS `persons` (
  `personId` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `image` blob,
  `gender` varchar(45) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `mobileNumber` varchar(255) DEFAULT NULL,
  `emailAddress` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`personId`),
  KEY `firstName` (`firstName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`personId`, `firstName`, `lastName`, `image`, `gender`, `birthDate`, `mobileNumber`, `emailAddress`, `city`, `country`, `zip`) VALUES
(1, 'landley', 'beranrdo', '', 'male', '2018-09-11', '0000000000000', 'akskjasdkausd', 'sdkfskdhfksdfh', 'slkdnfksjdf', 'sdnfskjdf');

-- --------------------------------------------------------

--
-- Table structure for table `repairs`
--

DROP TABLE IF EXISTS `repairs`;
CREATE TABLE IF NOT EXISTS `repairs` (
  `repairId` int(11) NOT NULL,
  `dateReported` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `maintenance` varchar(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `residentId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  PRIMARY KEY (`repairId`,`residentId`,`employeeId`,`roomId`),
  KEY `fk_repairs_residents1_idx` (`residentId`),
  KEY `fk_repairs_employees1_idx` (`employeeId`),
  KEY `fk_repairs_rooms1_idx` (`roomId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

DROP TABLE IF EXISTS `residents`;
CREATE TABLE IF NOT EXISTS `residents` (
  `residentId` int(11) NOT NULL,
  `moveInDate` date DEFAULT NULL,
  `moveOutDate` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `yearLevel` int(11) DEFAULT NULL,
  `personId` int(11) NOT NULL,
  `contactPersonId` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  PRIMARY KEY (`residentId`,`personId`,`contactPersonId`,`roomId`),
  KEY `fk_residents_persons_idx` (`personId`),
  KEY `fk_residents_contactPersons1_idx` (`contactPersonId`),
  KEY `fk_residents_rooms1_idx` (`roomId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `roomId` int(11) NOT NULL,
  `roomNo` varchar(255) DEFAULT NULL,
  `rentalFee` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `dateBought` date DEFAULT NULL,
  `downPayment` int(11) DEFAULT NULL,
  `monthlyAmort` int(11) DEFAULT NULL,
  `moveInDate` date DEFAULT NULL,
  `building` varchar(45) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `ownerId` int(11) NOT NULL,
  PRIMARY KEY (`roomId`,`ownerId`),
  KEY `roomNo` (`roomNo`),
  KEY `fk_rooms_owners1_idx` (`ownerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `transactionId` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `roomNo` varchar(45) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `residentId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  PRIMARY KEY (`transactionId`,`residentId`,`employeeId`,`roomId`),
  KEY `fk_transactions_residents1_idx` (`residentId`),
  KEY `fk_transactions_employees1_idx` (`employeeId`),
  KEY `fk_transactions_rooms1_idx` (`roomId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contactpersons`
--
ALTER TABLE `contactpersons`
  ADD CONSTRAINT `fk_contactPersons_persons1` FOREIGN KEY (`personId`) REFERENCES `persons` (`personId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_employees_persons1` FOREIGN KEY (`personId`) REFERENCES `persons` (`personId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employees_users1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owners`
--
ALTER TABLE `owners`
  ADD CONSTRAINT `fk_owners_persons1` FOREIGN KEY (`personId`) REFERENCES `persons` (`personId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `repairs`
--
ALTER TABLE `repairs`
  ADD CONSTRAINT `fk_repairs_employees1` FOREIGN KEY (`employeeId`) REFERENCES `employees` (`employeeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_repairs_residents1` FOREIGN KEY (`residentId`) REFERENCES `residents` (`residentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_repairs_rooms1` FOREIGN KEY (`roomId`) REFERENCES `rooms` (`roomId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `residents`
--
ALTER TABLE `residents`
  ADD CONSTRAINT `fk_residents_contactPersons1` FOREIGN KEY (`contactPersonId`) REFERENCES `contactpersons` (`contactPersonId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_residents_persons` FOREIGN KEY (`personId`) REFERENCES `persons` (`personId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_residents_rooms1` FOREIGN KEY (`roomId`) REFERENCES `rooms` (`roomId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_rooms_owners1` FOREIGN KEY (`ownerId`) REFERENCES `owners` (`ownerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_transactions_employees1` FOREIGN KEY (`employeeId`) REFERENCES `employees` (`employeeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transactions_residents1` FOREIGN KEY (`residentId`) REFERENCES `residents` (`residentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transactions_rooms1` FOREIGN KEY (`roomId`) REFERENCES `rooms` (`roomId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
