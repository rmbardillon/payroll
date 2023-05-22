-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 02:26 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lucas`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `ADMINISTRATOR_ID` varchar(16) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4),'-',''),
  `FIRST_NAME` varchar(64) NOT NULL,
  `LAST_NAME` varchar(64) NOT NULL,
  `EMAIL` varchar(64) NOT NULL,
  `USERNAME` varchar(16) NOT NULL,
  `PASSWORD` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`ADMINISTRATOR_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `USERNAME`, `PASSWORD`) VALUES
('d7313390f52011ed', 'ROMEO JR', 'BARDILLON', 'romsky.bardillon@gmail.com', 'adminrbardillon', 'Owner@001');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ATTENDANCE_ID` int(11) NOT NULL,
  `EMPLOYEE_ID` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `TIME_IN` datetime NOT NULL,
  `TIME_OUT` datetime DEFAULT NULL,
  `TOTAL_HOURS_WORKED` int(16) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ATTENDANCE_ID`, `EMPLOYEE_ID`, `DATE`, `TIME_IN`, `TIME_OUT`, `TOTAL_HOURS_WORKED`) VALUES
(1, 1, '2023-05-21', '2023-05-21 14:01:44', '2023-05-21 22:01:47', 8),
(2, 1, '2023-05-26', '2023-05-26 14:01:44', '2023-05-26 23:01:47', 8);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(64) NOT NULL,
  `MIDDLE_NAME` varchar(64) NOT NULL,
  `LAST_NAME` varchar(64) NOT NULL,
  `BIRTHDAY` date NOT NULL,
  `GENDER` varchar(16) NOT NULL,
  `SALARY_RATE` decimal(6,2) NOT NULL,
  `CONTACT_NUMBER` varchar(16) NOT NULL,
  `EMAIL` varchar(64) NOT NULL,
  `STREET` varchar(64) NOT NULL,
  `BARANGAY` varchar(64) NOT NULL,
  `MUNICIPALITY` varchar(64) NOT NULL,
  `PROVINCE` varchar(64) NOT NULL,
  `STATUS` varchar(16) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `FIRST_NAME`, `MIDDLE_NAME`, `LAST_NAME`, `BIRTHDAY`, `GENDER`, `SALARY_RATE`, `CONTACT_NUMBER`, `EMAIL`, `STREET`, `BARANGAY`, `MUNICIPALITY`, `PROVINCE`, `STATUS`) VALUES
(1, 'ROMEO JR', 'MONTEALEGRE', 'BARDILLON', '2001-07-30', 'Male', '50.00', '09062267692', 'romsky.bardillon@gmail.com', 'OAK STREET ROSE POINTE SUBD', 'TAGAPO', 'SANTA ROSA', 'LAGUNA', 'ACTIVE'),
(2, 'CLARENCE', 'MONTEALEGRE', 'MONTEALEGRE', '2023-12-31', 'Male', '45.00', '09654455658', 'clarence@gmail.com', 'OAK STREET ROSE POINTE SUBD', 'TAGAPO', 'SANTA ROSA', 'LAGUNA', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `salary_history`
--

CREATE TABLE `salary_history` (
  `SALARY_HISTORY_ID` int(11) NOT NULL,
  `EMPLOYEE_ID` int(11) NOT NULL,
  `SALARY_RATE` decimal(6,2) NOT NULL,
  `START_DATE` date NOT NULL DEFAULT current_timestamp(),
  `END_DATE` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_history`
--

INSERT INTO `salary_history` (`SALARY_HISTORY_ID`, `EMPLOYEE_ID`, `SALARY_RATE`, `START_DATE`, `END_DATE`) VALUES
(1, 1, '45.00', '2023-05-21', '2023-05-24'),
(2, 2, '45.00', '2023-05-21', '2023-05-21'),
(3, 1, '50.00', '2023-05-24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ADMINISTRATOR_ID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ATTENDANCE_ID`),
  ADD KEY `FK_EMPLOYEE_ATTENDANCE` (`EMPLOYEE_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPLOYEE_ID`);

--
-- Indexes for table `salary_history`
--
ALTER TABLE `salary_history`
  ADD PRIMARY KEY (`SALARY_HISTORY_ID`),
  ADD KEY `FK_EMPLOYEE_SALARY_HISTORY` (`EMPLOYEE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ATTENDANCE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary_history`
--
ALTER TABLE `salary_history`
  MODIFY `SALARY_HISTORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `FK_EMPLOYEE_ATTENDANCE` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employee` (`EMPLOYEE_ID`);

--
-- Constraints for table `salary_history`
--
ALTER TABLE `salary_history`
  ADD CONSTRAINT `FK_EMPLOYEE_SALARY_HISTORY` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employee` (`EMPLOYEE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
