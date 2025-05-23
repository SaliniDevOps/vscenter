-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2025 at 01:15 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vscenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinmentservicetype`
--

DROP TABLE IF EXISTS `appoinmentservicetype`;
CREATE TABLE IF NOT EXISTS `appoinmentservicetype` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `AppoinmentID` int NOT NULL,
  `ServiceTypeID` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=197 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appoinmentservicetype`
--

INSERT INTO `appoinmentservicetype` (`ID`, `AppoinmentID`, `ServiceTypeID`) VALUES
(167, 1, 14),
(189, 9, 12),
(166, 1, 12),
(183, 7, 12),
(184, 7, 14),
(188, 9, 11),
(175, 4, 28),
(185, 7, 16),
(174, 4, 29),
(190, 10, 11),
(191, 10, 12),
(192, 11, 11),
(196, 13, 22),
(173, 2, 27),
(165, 1, 11),
(178, 6, 23),
(172, 2, 21),
(171, 2, 12),
(181, 3, 14),
(176, 5, 22);

-- --------------------------------------------------------

--
-- Table structure for table `customeraccounts`
--

DROP TABLE IF EXISTS `customeraccounts`;
CREATE TABLE IF NOT EXISTS `customeraccounts` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `VehicleType` int NOT NULL,
  `VehicleModel` int NOT NULL,
  `VehicleNumber` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customeraccounts`
--

INSERT INTO `customeraccounts` (`ID`, `Name`, `NIC`, `Mobile`, `VehicleType`, `VehicleModel`, `VehicleNumber`, `Email`, `Password`) VALUES
(1, 'salini maleesha gunathilaka', '975780015v', '0332261168', 4, 3, 'abc123', 'test@gmail.com', '123'),
(2, 'Maleesha Lekamge', '985851425V', '7034259622', 5, 3, 'abc123', 'test2@gmail.com', '123'),
(3, 'Hasanthi Perera', '901512515V', '0772258965', 6, 3, 'asd1234', 'Hasanthi@gmail.com', '123'),
(4, 'Raveen Jayantha', '892514526V', '0778852569', 7, 5, 'dg4567', 'Raveen@gmail.com', '123'),
(5, 'Nimantha Bandara', '695814525V', '0778885555', 5, 7, 'asd12345', 'Nimantha@gmail.com', '123'),
(6, 'abc', '523423423V', '3242342342', 4, 5, 'abc123erwer', 'a@gmail.com', '123'),
(7, 'Janith', '121212121v', '2584656598', 5, 11, 'adv56', 'Janith@gmail.com', '123'),
(8, 'test1', '342342332V', '3234234234', 4, 1, 'abc123545', 'test1@gmail.com', '123'),
(9, 'Gughan', '454536767V', '5345345345', 4, 3, '345vfg', 'gughan@gmail.com', '123'),
(10, 'Ravindu Gunarathna', '985421584V', '5456654654', 4, 5, 'jhj0098', 'R@gmail.com', '123'),
(11, 'Kala', '958451545V', '0788546654', 4, 1, 'abc123', 'kala@gmail.com', '123'),
(12, 'Sanath', '958458177V', '0884584456', 4, 5, 'vgf1234554', 'sanath@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `customerappoinments`
--

DROP TABLE IF EXISTS `customerappoinments`;
CREATE TABLE IF NOT EXISTS `customerappoinments` (
  `AppoinmentID` int NOT NULL AUTO_INCREMENT,
  `CustomerNIC` varchar(12) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mobile1` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(50) NOT NULL,
  `VehicleType` int NOT NULL,
  `VehicleModel` int NOT NULL,
  `VehicleRegNo` varchar(50) NOT NULL,
  `AppoinmentDate` date NOT NULL,
  `AppoinmentTime` time NOT NULL,
  `Status` int NOT NULL,
  `FuelType` int NOT NULL,
  `Comments` varchar(400) NOT NULL,
  `IsNewRecord` int NOT NULL,
  `Mobile2` double NOT NULL,
  `IsInvoice` int NOT NULL,
  PRIMARY KEY (`AppoinmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customerappoinments`
--

INSERT INTO `customerappoinments` (`AppoinmentID`, `CustomerNIC`, `Name`, `Mobile1`, `Email`, `VehicleType`, `VehicleModel`, `VehicleRegNo`, `AppoinmentDate`, `AppoinmentTime`, `Status`, `FuelType`, `Comments`, `IsNewRecord`, `Mobile2`, `IsInvoice`) VALUES
(1, '695814525V', 'Nimantha Bandara', '0778885555', 'Nimantha@gmail.com', 5, 7, 'asd12345', '2024-07-21', '12:41:00', 1, 0, '', 0, 0, 1),
(3, '975780015v', 'salini maleesha gunathilaka', '0332261168', 'test@gmail.com', 4, 3, 'abc123', '2024-07-21', '02:22:00', 1, 0, '', 0, 0, 1),
(4, '985851425V', 'Maleesha Lekamge', '7034259622', 'test2@gmail.com', 5, 3, 'abc123', '2024-10-19', '16:20:00', 1, 0, '', 0, 0, 1),
(5, '901512515V', 'Hasanthi Perera', '0772258965', 'Hasanthi@gmail.com', 6, 3, 'asd1234', '2024-10-19', '14:20:00', 1, 0, '', 0, 0, 1),
(6, '892514526V', 'Raveen Jayantha', '0778852569', 'Raveen@gmail.com', 7, 5, 'dg4567', '2024-10-19', '16:22:00', 1, 0, '', 0, 0, 1),
(7, '523423423V', 'abc', '3242342342', 'a@gmail.com', 4, 5, 'abc123erwer', '2024-10-19', '15:53:00', 1, 0, '', 0, 0, 1),
(8, '975780015v', 'salini maleesha gunathilaka', '0332261168', 'test@gmail.com', 4, 3, 'abc123', '2024-10-19', '17:32:00', 1, 0, '', 0, 0, 1),
(9, '975780015v', 'salini maleesha gunathilaka', '0332261168', 'test@gmail.com', 4, 3, 'abc123', '2024-10-19', '07:21:00', 1, 0, '', 0, 0, 1),
(10, '342342332V', 'test1', '3234234234', 'test1@gmail.com', 4, 1, 'abc123545', '2024-10-19', '20:26:00', 1, 0, '', 0, 0, 0),
(11, '985421584V', 'Ravindu Gunarathna', '5456654654', 'R@gmail.com', 4, 5, 'jhj0098', '2025-05-22', '23:06:00', 1, 0, '', 0, 0, 1),
(13, '958458177V', 'Sanath', '0884584456', 'sanath@gmail.com', 4, 5, 'vgf1234554', '2025-05-22', '18:34:00', 1, 0, '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customerappoinments_`
--

DROP TABLE IF EXISTS `customerappoinments_`;
CREATE TABLE IF NOT EXISTS `customerappoinments_` (
  `AppoinmentID` int NOT NULL AUTO_INCREMENT,
  `CustomerNIC` varchar(12) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mobile1` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(50) NOT NULL,
  `VehicleType` int NOT NULL,
  `VehicleModel` int NOT NULL,
  `VehicleRegNo` varchar(50) NOT NULL,
  `AppoinmentDate` date NOT NULL,
  `AppoinmentTime` time NOT NULL,
  `Status` int NOT NULL,
  `FuelType` int NOT NULL,
  `Comments` varchar(400) NOT NULL,
  `IsNewRecord` int NOT NULL,
  `Mobile2` double NOT NULL,
  `IsInvoice` int NOT NULL,
  PRIMARY KEY (`AppoinmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customerappoinments_`
--

INSERT INTO `customerappoinments_` (`AppoinmentID`, `CustomerNIC`, `Name`, `Mobile1`, `Email`, `VehicleType`, `VehicleModel`, `VehicleRegNo`, `AppoinmentDate`, `AppoinmentTime`, `Status`, `FuelType`, `Comments`, `IsNewRecord`, `Mobile2`, `IsInvoice`) VALUES
(1, '985851425V', 'salini maleesha gunathilaka', '0772514214', 'sali@gmail.com', 4, 5, 'abc123', '2024-06-15', '09:58:00', 0, 0, '', 0, 0, 1),
(2, '921514525V', 'Supun Lekamge', '0775814125', 'supu@gmail.com', 5, 4, 'Abc_kp10', '2024-06-09', '20:02:00', 0, 0, '', 0, 0, 0),
(3, '992514525V', 'Navabalan Gughan', '0775251485', 'gughan@gmail.com', 6, 10, 'qwe1', '2024-06-09', '20:05:00', 0, 0, '', 0, 0, 1),
(4, '962514525V', 'Sahan Hansaja', '0750231547', 'sahan@gmail.com', 9, 8, 'alg143', '2024-06-09', '19:06:00', 0, 0, '', 0, 0, 1),
(5, '892514525V', 'Chathumal Perera', '0772562415', 'chathura@gmail.com', 4, 1, 'tot345', '2024-06-10', '21:08:00', 0, 0, '', 0, 0, 1),
(6, '985825814V', 'shehan bandara', '0772585142', 'shehan@gmail.com', 7, 6, 'qwe1', '2024-06-09', '18:09:00', 0, 0, '', 0, 0, 1),
(7, '251412514V', 'Priyantha Fernando', '0775255584', 'priya@gmail.com', 4, 1, 'abc123', '2024-06-08', '12:54:00', 1, 0, '', 0, 0, 1),
(8, '985812545V', 'Testing Name', '0772558585', 'test@gmail.com', 8, 8, 'ads123', '2024-06-12', '11:05:00', 0, 0, '', 0, 0, 0),
(9, '958514515v', 'salini maleesha gunathilaka', '0778585854', 'sali@gmail.com', 4, 1, 'abcd', '2024-06-09', '11:52:00', 1, 0, '', 0, 0, 1),
(10, '785845845V', 'testing name 1', '0551412589', 'testing@gmail.com', 5, 1, 'Abc_kp10', '2024-06-16', '06:57:00', 1, 0, '', 0, 0, 1),
(11, '254585212V', 'testing name 2', '7034259645', 't@gmail.com', 6, 4, 'abc1234', '2024-06-16', '08:59:00', 1, 0, '', 0, 0, 1),
(12, '975780015v', 'tesing name 3', '7034259698', 't1@gmail.com', 6, 5, 'abc12389', '2024-06-16', '10:00:00', 1, 0, '', 0, 0, 0),
(13, '975780015v', 'testing4', '7034259634', 'nisha@gmail.com', 5, 1, 'abc123', '2024-06-16', '09:01:00', 1, 0, '', 0, 0, 0),
(14, '975780015v', 'testing 5', '7034259688', 'nisha@gmail.com', 6, 3, 'abc12356', '2024-06-16', '11:02:00', 1, 0, '', 0, 0, 0),
(15, '985847215V', 'testing 6', '7034259667', 'gertert@gmail.com', 6, 4, 'abc123', '2024-06-16', '00:03:00', 1, 0, '', 0, 0, 0),
(16, '975780015v', 'salini maleesha gunathilaka', '7034259678', 'test@gmail.com', 5, 3, 'abc123', '2024-06-19', '21:32:00', 0, 0, '', 0, 0, 0),
(17, '975780015v', 'salini maleesha gunathilaka', '7034259678', 'test@gmail.com', 5, 3, 'abc123', '2024-06-19', '19:39:00', 0, 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fueltype`
--

DROP TABLE IF EXISTS `fueltype`;
CREATE TABLE IF NOT EXISTS `fueltype` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `FuelType` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fueltype`
--

INSERT INTO `fueltype` (`ID`, `FuelType`) VALUES
(4, 'Deasel'),
(3, 'Petrol'),
(5, 'Electric');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `InvoiceID` int NOT NULL AUTO_INCREMENT,
  `JobNumber` int NOT NULL,
  `TotalAmount` double NOT NULL,
  `AdditionalCharges` double NOT NULL,
  `SubTotal` double NOT NULL,
  `Note` varchar(200) NOT NULL,
  `PaidAmount` double NOT NULL,
  `BalanceAmount` double NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `IsInvoice` int NOT NULL,
  PRIMARY KEY (`InvoiceID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`InvoiceID`, `JobNumber`, `TotalAmount`, `AdditionalCharges`, `SubTotal`, `Note`, `PaidAmount`, `BalanceAmount`, `Date`, `Time`, `IsInvoice`) VALUES
(2, 1, 104000, 0, 104000, 'undefined', 104000, 0, '2024-07-21', '02:40:35', 1),
(3, 3, 25000, 0, 25000, 'undefined', 25000, 0, '2024-07-21', '12:26:55', 1),
(4, 6, 15000, 0, 15000, 'undefined', 15000, 0, '2024-07-21', '01:02:07', 1),
(5, 7, 70400, 0, 70400, 'undefined', 70400, 0, '2024-10-18', '06:46:48', 1),
(6, 4, 44000, 4000, 48000, 'undefined', 50000, 2000, '2024-10-19', '08:46:07', 1),
(7, 5, 12000, 15000, 27000, 'undefined', 30000, 3000, '2024-10-19', '08:46:44', 1),
(8, 8, 0, 0, 0, 'undefined', 0, 0, '2024-10-19', '08:47:09', 1),
(9, 9, 60120, 500, 60620, 'undefined', 70000, 9380, '2024-10-19', '09:57:03', 1),
(10, 11, 20000, 0, 20000, 'undefined', 20000, 0, '2025-05-22', '02:55:22', 1),
(11, 13, 12000, 0, 12000, 'undefined', 13000, 1000, '2025-05-22', '11:36:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_`
--

DROP TABLE IF EXISTS `invoice_`;
CREATE TABLE IF NOT EXISTS `invoice_` (
  `InvoiceID` int NOT NULL AUTO_INCREMENT,
  `JobNumber` int NOT NULL,
  `TotalAmount` double NOT NULL,
  `AdditionalCharges` double NOT NULL,
  `SubTotal` double NOT NULL,
  `Note` varchar(200) NOT NULL,
  `PaidAmount` double NOT NULL,
  `BalanceAmount` double NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `IsInvoice` int NOT NULL,
  PRIMARY KEY (`InvoiceID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice_`
--

INSERT INTO `invoice_` (`InvoiceID`, `JobNumber`, `TotalAmount`, `AdditionalCharges`, `SubTotal`, `Note`, `PaidAmount`, `BalanceAmount`, `Date`, `Time`, `IsInvoice`) VALUES
(3, 38, 13050, 100, 13150, 'undefined', 14000, 850, '2024-06-08', '04:58:46', 1),
(4, 36, 15000, 0, 15000, 'undefined', 16000, 1000, '2024-06-08', '05:01:50', 1),
(5, 0, 0, 0, 0, 'undefined', 0, 0, '2024-06-08', '05:04:17', 1),
(6, 0, 0, 0, 0, 'undefined', 0, 0, '2024-06-08', '05:09:36', 1),
(7, 0, 0, 0, 0, 'undefined', 0, 0, '2024-06-08', '05:09:48', 1),
(8, 0, 0, 0, 0, 'undefined', 0, 0, '2024-06-08', '05:12:00', 1),
(9, 0, 0, 0, 0, 'undefined', 0, 0, '2024-06-08', '05:13:59', 1),
(10, 35, 5000, 0, 5000, 'undefined', 0, 0, '2024-06-08', '05:17:54', 1),
(11, 39, 15000, 200, 15200, 'undefined', 15500, 300, '2024-06-08', '07:26:07', 1),
(12, 1, 22000, 2000, 24000, 'undefined', 25000, 1000, '2024-06-08', '08:45:40', 1),
(13, 6, 25000, 100, 25100, 'undefined', 26000, 900, '2024-06-08', '09:19:21', 1),
(14, 7, 98000, 100, 98100, 'undefined', 98500, 400, '2024-06-08', '03:32:18', 1),
(15, 7, 98000, 100, 98100, 'undefined', 98500, 400, '2024-06-08', '03:33:13', 1),
(16, 5, 20000, 0, 20000, 'undefined', 20000, 0, '2024-06-08', '03:37:50', 1),
(17, 4, 56000, 0, 56000, 'undefined', 56000, 0, '2024-06-08', '03:38:45', 1),
(18, 3, 30000, 0, 30000, 'undefined', 30000, 0, '2024-06-08', '03:39:48', 1),
(19, 9, 45000, 2000, 47000, 'undefined', 50000, 3000, '2024-06-15', '12:23:54', 1),
(20, 10, 25000, 0, 25000, 'undefined', 25000, 0, '2024-06-16', '09:58:07', 1),
(21, 11, 10000, 0, 10000, 'undefined', 10000, 0, '2024-06-16', '09:58:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `itemwiseorder`
--

DROP TABLE IF EXISTS `itemwiseorder`;
CREATE TABLE IF NOT EXISTS `itemwiseorder` (
  `OrderID` int NOT NULL,
  `ItemID` int NOT NULL,
  `QTY` float NOT NULL,
  `NewPrice` double NOT NULL,
  `ID` int NOT NULL AUTO_INCREMENT,
  `Status` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `itemwiseorder`
--

INSERT INTO `itemwiseorder` (`OrderID`, `ItemID`, `QTY`, `NewPrice`, `ID`, `Status`) VALUES
(1, 16, 5, 200, 1, 1),
(1, 19, 8, 500, 2, 1),
(2, 16, 1, 200, 3, 1),
(3, 16, 5, 500, 4, 1),
(4, 16, 1, 200, 5, 1),
(6, 16, 25, 120, 13, 1),
(5, 16, 12, 120, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

DROP TABLE IF EXISTS `orderitems`;
CREATE TABLE IF NOT EXISTS `orderitems` (
  `OrderID` int NOT NULL AUTO_INCREMENT,
  `SuplierID` int NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`OrderID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`OrderID`, `SuplierID`, `Date`) VALUES
(1, 1, '2024-06-25'),
(2, 3, '2024-06-25'),
(3, 1, '2024-06-25'),
(4, 1, '2024-06-29'),
(5, 1, '2024-10-19'),
(6, 1, '2024-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `servicetype`
--

DROP TABLE IF EXISTS `servicetype`;
CREATE TABLE IF NOT EXISTS `servicetype` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ServiceType` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `servicetype`
--

INSERT INTO `servicetype` (`ID`, `ServiceType`, `Price`) VALUES
(11, 'Interior cleaning', 20000),
(12, 'Leather treatment', 40000),
(14, 'Gear Oil change', 25000),
(15, 'Radiator coolant change', 25000),
(16, 'Spark plugs replacement', 5000),
(17, 'Brake cleaner', 6500),
(18, 'Brake oil change', 10000),
(19, 'Brake pad/shoe change', 28000),
(20, 'Battery terminal cleaner ', 12000),
(21, 'Head lamps cleaner', 35000),
(22, 'Wheel Alignment', 12000),
(23, 'Wheel balancing', 15000),
(24, 'Clutch oil change', 5000),
(26, 'Engine scanning', 42000),
(27, 'Engine degreasing', 5000),
(28, 'Diesel filter change', 14000),
(29, 'Hybrid services', 30000),
(30, 'Full Service', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `spareparts`
--

DROP TABLE IF EXISTS `spareparts`;
CREATE TABLE IF NOT EXISTS `spareparts` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `SpareName` varchar(100) NOT NULL,
  `ItemCode` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `ServiceTypeID` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `spareparts`
--

INSERT INTO `spareparts` (`ID`, `SpareName`, `ItemCode`, `Price`, `ServiceTypeID`) VALUES
(18, ' brake shoes', 'A003', 4000, 19),
(17, 'Brake pads', 'A002', 3000, 19),
(16, 'Spark plugs', 'A001', 120, 16),
(19, 'protective spray bottles', 'A004', 500, 20),
(21, 'radiator flush bottle', 'A006', 200, 15);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `SpareID` int NOT NULL,
  `AvalQTY` double NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`ID`, `SpareID`, `AvalQTY`) VALUES
(1, 16, 125),
(2, 17, 34),
(3, 18, 30),
(4, 19, 78),
(5, 20, 20),
(6, 21, 31),
(7, 22, 8);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Company` varchar(200) NOT NULL,
  `SupplierName` varchar(100) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`ID`, `Company`, `SupplierName`, `Mobile`, `Email`) VALUES
(1, 'ABC Pvt Ltd', 'Rohan Perera', '0771234567', 'rohan.perera@abcpvt.lk'),
(2, 'XYZ Trading Co', 'Sunil Jayasinghe', '0772345678', 'sunil.jayasinghe@xyztrading.lk'),
(3, 'Global Supplies', 'Kamal Silva', '0773456789', 'kamal.silva@globalsupplies.lk'),
(4, 'Prime Imports', 'Nimal Fernando', '0774567890', 'nimal.fernando@primeimports.lk'),
(5, 'Quality Goods', 'Amara De Silva', '0775678901', 'amara.desilva@qualitygoods.lk'),
(6, 'Metro Distributors', 'Dilshan Wickramasinghe', '0776789012', 'dilshan.wickramasinghe@metrodist.lk'),
(7, 'Rohitha', 'Rohitha', '3232312312', 'Rohitha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `technicianrecord`
--

DROP TABLE IF EXISTS `technicianrecord`;
CREATE TABLE IF NOT EXISTS `technicianrecord` (
  `ID` int NOT NULL,
  `JobNumber` int NOT NULL,
  `TechnicianID` int NOT NULL,
  `Status` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

DROP TABLE IF EXISTS `technicians`;
CREATE TABLE IF NOT EXISTS `technicians` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NIC` varchar(12) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Mobile1` varchar(15) NOT NULL,
  `Mobile2` double NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `technicians`
--

INSERT INTO `technicians` (`ID`, `NIC`, `Name`, `Address`, `Mobile1`, `Mobile2`, `Email`, `Username`, `Password`) VALUES
(6, '972345678V', 'Nimal Silva', 'No. 15, Galle Road, Galle', '0712345678', 941912345678, 'nimal.silva@example.lk', 'a', '1'),
(5, '961234567V', 'Kamal Perera', 'No. 10, Temple Road, Colombo 05', '0771234567', 942117654321, 'kamal.perera@example.lk', '1', '1'),
(7, '982456789V', 'Sunil Jayasinghe', 'No. 25, Main Street, Kandy', '0709876543', 948122345678, 'sunil.jayasinghe@example.lk', 'a', '1'),
(9, '002678901V', 'Amara Fernando', 'No. 5, High Street, Negombo', '0765432109', 941122345678, 'amara.fernando@example.lk', 'a', '1'),
(11, '022890123V', 'Dilshan Herath', 'No. 18, Station Road, Jaffna', '0756784321', 944222345678, 'dilshan.herath@example.lk', 'a', '1'),
(12, '032901234V', 'Kusal Mendis', 'No. 45, Church Road, Matara', '0716785432', 941232345678, 'kusal.mendis@example.lk', 'a', '1'),
(13, '042012345V', 'Pasan Gunasekara', 'No. 22, Queens Road, Anuradhapura', '0749876543', 945122345678, 'pasan.gunasekara@example.lk', 'a', '1');

-- --------------------------------------------------------

--
-- Table structure for table `techniciansassigned`
--

DROP TABLE IF EXISTS `techniciansassigned`;
CREATE TABLE IF NOT EXISTS `techniciansassigned` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `JobNumber` int NOT NULL,
  `TechnicianID` int NOT NULL,
  `Status` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `techniciansassigned`
--

INSERT INTO `techniciansassigned` (`ID`, `JobNumber`, `TechnicianID`, `Status`) VALUES
(1, 7, 6, 1),
(2, 7, 5, 1),
(4, 3, 6, 1),
(5, 4, 5, 1),
(6, 5, 9, 1),
(7, 8, 9, 1),
(8, 6, 12, 1),
(9, 9, 6, 1),
(10, 10, 6, 1),
(11, 11, 6, 1),
(13, 13, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usedspareitems`
--

DROP TABLE IF EXISTS `usedspareitems`;
CREATE TABLE IF NOT EXISTS `usedspareitems` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `AppoinmentID` int NOT NULL,
  `SpareItemID` int NOT NULL,
  `Status` int NOT NULL,
  `QTY` double NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usedspareitems`
--

INSERT INTO `usedspareitems` (`ID`, `AppoinmentID`, `SpareItemID`, `Status`, `QTY`) VALUES
(1, 1, 16, 0, 5),
(2, 1, 17, 0, 6),
(5, 7, 16, 0, 2),
(6, 7, 17, 0, 2),
(7, 9, 16, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Users` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Users`, `UserName`, `Password`, `Status`) VALUES
(1, 'Admin', 'admin', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehiclemodels`
--

DROP TABLE IF EXISTS `vehiclemodels`;
CREATE TABLE IF NOT EXISTS `vehiclemodels` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `VehicleModels` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehiclemodels`
--

INSERT INTO `vehiclemodels` (`ID`, `VehicleModels`) VALUES
(1, 'Toyota Corolla'),
(3, 'Honda Civic'),
(4, 'Vaganar'),
(5, 'Suzuki '),
(6, 'Mazda RX-7'),
(7, 'eep Cherokee (XJ, 1984)'),
(8, 'Isuzu KB (1985)'),
(9, 'BMW R90S (1975)'),
(10, 'Yamaha XS650 (1975)'),
(11, 'Mitsubishi'),
(12, 'Maruti'),
(13, 'Alto');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclemoredetails`
--

DROP TABLE IF EXISTS `vehiclemoredetails`;
CREATE TABLE IF NOT EXISTS `vehiclemoredetails` (
  `Year` int NOT NULL,
  `OdometerRead` varchar(50) NOT NULL,
  `EngineType` varchar(50) NOT NULL,
  `EngineCapacity` varchar(50) NOT NULL,
  `FuelType` int NOT NULL,
  `OtherNotes` varchar(300) NOT NULL,
  `AppoinmentID` int NOT NULL,
  `ID` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehiclemoredetails`
--

INSERT INTO `vehiclemoredetails` (`Year`, `OdometerRead`, `EngineType`, `EngineCapacity`, `FuelType`, `OtherNotes`, `AppoinmentID`, `ID`) VALUES
(1990, '2000', 'a1', '200', 0, 'test othernotes', 36, 2),
(2000, '2000', 'a1', '300', 3, 'test', 38, 4),
(2000, '500', 'a23', '1200', 0, 'testing', 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

DROP TABLE IF EXISTS `vehicletype`;
CREATE TABLE IF NOT EXISTS `vehicletype` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `VehicleType` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehicletype`
--

INSERT INTO `vehicletype` (`ID`, `VehicleType`) VALUES
(4, 'Car'),
(5, 'Van'),
(6, 'Jeep'),
(7, 'Double Cab'),
(8, 'Lorry'),
(9, 'Bike');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
