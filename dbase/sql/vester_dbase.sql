-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 20, 2018 at 01:52 PM
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
  `contactPersonId` int(11) NOT NULL AUTO_INCREMENT,
  `relationship` varchar(255) DEFAULT NULL,
  `info_infoId` int(11) NOT NULL,
  PRIMARY KEY (`contactPersonId`,`info_infoId`),
  KEY `fk_contactPersons_info1_idx` (`info_infoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employeeId` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `dateHired` date DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `info_infoId` int(11) NOT NULL,
  PRIMARY KEY (`employeeId`,`info_infoId`),
  KEY `fk_employees_info1_idx` (`info_infoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

DROP TABLE IF EXISTS `info`;
CREATE TABLE IF NOT EXISTS `info` (
  `infoId` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `userName` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `img` blob,
  `gender` varchar(45) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `mobileNumber` varchar(255) DEFAULT NULL,
  `emailAddress` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `isApproved` tinyint(1) DEFAULT '0',
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`infoId`),
  UNIQUE KEY `userName_UNIQUE` (`userName`),
  KEY `firstName` (`firstName`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`infoId`, `type`, `firstName`, `lastName`, `userName`, `pass`, `img`, `gender`, `birthDate`, `mobileNumber`, `emailAddress`, `city`, `isApproved`, `createdOn`) VALUES
(6, 'Owner', 'Kendall ', 'Jenner', 'kendall', '0235ba98d61628fd6da1e543dc274e94', 0x6c6f676f2e6a7067, 'Female', '2000-12-01', '12312312312', 'wefdq@dfdfsd', 'Tarlac', 0, '2018-09-20 12:27:53'),
(11, 'Resident', 'Landley', 'Bernardo', 'landley', 'aasdasdasdasd', 0x6c6f676f2e6a7067, 'Male', '1996-12-03', '9752826318', 'lmbernardo@slu.edu.ph', 'Baguio City', 1, '2018-09-20 12:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

DROP TABLE IF EXISTS `owners`;
CREATE TABLE IF NOT EXISTS `owners` (
  `ownerId` int(11) NOT NULL AUTO_INCREMENT,
  `bankName` varchar(255) DEFAULT NULL,
  `bankAccountNumber` varchar(255) DEFAULT NULL,
  `info_infoId` int(11) NOT NULL,
  PRIMARY KEY (`ownerId`,`info_infoId`),
  KEY `fk_owners_info1_idx` (`info_infoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owners_has_rooms`
--

DROP TABLE IF EXISTS `owners_has_rooms`;
CREATE TABLE IF NOT EXISTS `owners_has_rooms` (
  `owners_has_roomsId` int(11) NOT NULL AUTO_INCREMENT,
  `owners_ownerId` int(11) NOT NULL,
  `rooms_roomNo` varchar(255) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `dateBought` date DEFAULT NULL,
  `moveInDate` date DEFAULT NULL,
  `ModeOfPayment` varchar(45) DEFAULT NULL,
  `downPayment` int(11) DEFAULT NULL,
  `downPaymentMontlyAmortization` int(11) DEFAULT NULL,
  `monthlyAmortization` int(11) DEFAULT NULL,
  `durationToPay` int(11) DEFAULT NULL,
  PRIMARY KEY (`owners_has_roomsId`,`owners_ownerId`,`rooms_roomNo`),
  KEY `fk_owners_has_rooms_rooms2_idx` (`rooms_roomNo`),
  KEY `fk_owners_has_rooms_owners1_idx` (`owners_ownerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `repairs`
--

DROP TABLE IF EXISTS `repairs`;
CREATE TABLE IF NOT EXISTS `repairs` (
  `repairId` int(11) NOT NULL AUTO_INCREMENT,
  `roomNo` varchar(255) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `dateReported` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `dateFinished` date DEFAULT NULL,
  `repairStatus` varchar(45) DEFAULT NULL,
  `employees_employeeId` int(11) NOT NULL,
  `residents_residentId` int(11) NOT NULL,
  PRIMARY KEY (`repairId`,`roomNo`,`employees_employeeId`,`residents_residentId`),
  KEY `fk_owners_has_rooms_rooms1_idx` (`roomNo`),
  KEY `fk_repairs_employees1_idx` (`employees_employeeId`),
  KEY `fk_repairs_residents1_idx` (`residents_residentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

DROP TABLE IF EXISTS `residents`;
CREATE TABLE IF NOT EXISTS `residents` (
  `residentId` int(11) NOT NULL AUTO_INCREMENT,
  `residentStatus` varchar(255) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `yearLevel` int(11) DEFAULT NULL,
  `info_infoId` int(11) NOT NULL,
  PRIMARY KEY (`residentId`,`info_infoId`),
  KEY `fk_residents_info1_idx` (`info_infoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `roomNo` varchar(255) NOT NULL,
  `rentalFee` int(11) DEFAULT NULL,
  `roomStatus` varchar(255) DEFAULT NULL,
  `building` varchar(45) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  PRIMARY KEY (`roomNo`),
  KEY `roomNo` (`roomNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `transactionId` int(11) NOT NULL AUTO_INCREMENT,
  `roomNo` varchar(255) NOT NULL,
  `residentId` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `moveInDate` date DEFAULT NULL,
  `moveOutDate` date DEFAULT NULL,
  `employees_employeeId` int(11) NOT NULL,
  PRIMARY KEY (`transactionId`,`roomNo`,`residentId`,`employees_employeeId`),
  KEY `fk_rooms_has_residents_residents1_idx` (`residentId`),
  KEY `fk_rooms_has_residents_rooms_idx` (`roomNo`),
  KEY `fk_transactions_employees1_idx` (`employees_employeeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contactpersons`
--
ALTER TABLE `contactpersons`
  ADD CONSTRAINT `fk_contactPersons_info1` FOREIGN KEY (`info_infoId`) REFERENCES `info` (`infoId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_employees_info1` FOREIGN KEY (`info_infoId`) REFERENCES `info` (`infoId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owners`
--
ALTER TABLE `owners`
  ADD CONSTRAINT `fk_owners_info1` FOREIGN KEY (`info_infoId`) REFERENCES `info` (`infoId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `owners_has_rooms`
--
ALTER TABLE `owners_has_rooms`
  ADD CONSTRAINT `fk_owners_has_rooms_owners1` FOREIGN KEY (`owners_ownerId`) REFERENCES `owners` (`ownerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_owners_has_rooms_rooms2` FOREIGN KEY (`rooms_roomNo`) REFERENCES `rooms` (`roomNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `repairs`
--
ALTER TABLE `repairs`
  ADD CONSTRAINT `fk_owners_has_rooms_rooms1` FOREIGN KEY (`roomNo`) REFERENCES `rooms` (`roomNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_repairs_employees1` FOREIGN KEY (`employees_employeeId`) REFERENCES `employees` (`employeeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_repairs_residents1` FOREIGN KEY (`residents_residentId`) REFERENCES `residents` (`residentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `residents`
--
ALTER TABLE `residents`
  ADD CONSTRAINT `fk_residents_info1` FOREIGN KEY (`info_infoId`) REFERENCES `info` (`infoId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_rooms_has_residents_residents1` FOREIGN KEY (`residentId`) REFERENCES `residents` (`residentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rooms_has_residents_rooms` FOREIGN KEY (`roomNo`) REFERENCES `rooms` (`roomNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transactions_employees1` FOREIGN KEY (`employees_employeeId`) REFERENCES `employees` (`employeeId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
