-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 03:28 AM
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
(3, 1, '2023-05-01', '2023-05-01 07:00:00', '2023-05-01 23:00:00', 16),
(4, 1, '2023-05-02', '2023-05-02 07:00:00', '2023-05-02 23:00:00', 16),
(5, 1, '2023-05-03', '2023-05-03 07:00:00', '2023-05-03 23:00:00', 16),
(32, 2, '2023-05-01', '2023-05-01 07:00:00', '2023-05-01 23:00:00', 16),
(33, 2, '2023-05-02', '2023-05-02 07:00:00', '2023-05-02 23:00:00', 16),
(34, 2, '2023-05-03', '2023-05-03 07:00:00', '2023-05-03 23:00:00', 16),
(63, 3, '2023-05-01', '2023-05-01 07:00:00', '2023-05-01 23:00:00', 16),
(64, 3, '2023-05-02', '2023-05-02 07:00:00', '2023-05-02 23:00:00', 16),
(65, 3, '2023-05-03', '2023-05-03 07:00:00', '2023-05-03 23:00:00', 16),
(93, 4, '2023-05-01', '2023-05-01 07:00:00', '2023-05-01 23:00:00', 16),
(94, 4, '2023-05-02', '2023-05-02 07:00:00', '2023-05-02 23:00:00', 16),
(95, 4, '2023-05-03', '2023-05-03 07:00:00', '2023-05-03 23:00:00', 16),
(123, 5, '2023-05-01', '2023-05-01 07:00:00', '2023-05-01 23:00:00', 16),
(124, 5, '2023-05-02', '2023-05-02 07:00:00', '2023-05-02 23:00:00', 16),
(125, 5, '2023-05-03', '2023-05-03 07:00:00', '2023-05-03 23:00:00', 16),
(153, 6, '2023-05-01', '2023-05-01 07:00:00', '2023-05-01 23:00:00', 16),
(154, 6, '2023-05-02', '2023-05-02 07:00:00', '2023-05-02 23:00:00', 16),
(155, 6, '2023-05-03', '2023-05-03 07:00:00', '2023-05-03 23:00:00', 16),
(183, 7, '2023-05-01', '2023-05-01 07:00:00', '2023-05-01 23:00:00', 16),
(184, 7, '2023-05-02', '2023-05-02 07:00:00', '2023-05-02 23:00:00', 16),
(185, 7, '2023-05-03', '2023-05-03 07:00:00', '2023-05-03 23:00:00', 16),
(213, 8, '2023-05-01', '2023-05-01 07:00:00', '2023-05-01 23:00:00', 16),
(214, 8, '2023-05-02', '2023-05-02 07:00:00', '2023-05-02 23:00:00', 16),
(215, 8, '2023-05-03', '2023-05-03 07:00:00', '2023-05-03 23:00:00', 16),
(243, 9, '2023-05-01', '2023-05-01 07:00:00', '2023-05-01 23:00:00', 16),
(244, 9, '2023-05-02', '2023-05-02 07:00:00', '2023-05-02 23:00:00', 16),
(245, 9, '2023-05-03', '2023-05-03 07:00:00', '2023-05-03 23:00:00', 16),
(273, 10, '2023-05-01', '2023-05-01 07:00:00', '2023-05-01 23:00:00', 16),
(274, 10, '2023-05-02', '2023-05-02 07:00:00', '2023-05-02 23:00:00', 16),
(275, 10, '2023-05-03', '2023-05-03 07:00:00', '2023-05-03 23:00:00', 16),
(303, 11, '2023-05-01', '2023-05-01 07:00:00', '2023-05-01 23:00:00', 16),
(304, 11, '2023-05-02', '2023-05-02 07:00:00', '2023-05-02 23:00:00', 16),
(305, 11, '2023-05-03', '2023-05-03 07:00:00', '2023-05-03 23:00:00', 16),
(306, 1, '2023-04-17', '2023-04-17 09:36:24', '2023-04-17 21:36:50', 12),
(307, 1, '2023-05-18', '2023-05-18 08:21:29', '2023-05-18 08:58:48', 1);

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
  `PROVINCE` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `FIRST_NAME`, `MIDDLE_NAME`, `LAST_NAME`, `BIRTHDAY`, `GENDER`, `SALARY_RATE`, `CONTACT_NUMBER`, `EMAIL`, `STREET`, `BARANGAY`, `MUNICIPALITY`, `PROVINCE`) VALUES
(1, 'ROMEO JR', 'MONTEALEGRE', 'BARDILLON', '2001-12-31', 'Male', '50.00', '09760657071', 'romsky.bardillon@gmail.com', 'OAK', 'TAGAPO', 'SANTA ROSA', 'LAGUNA'),
(2, 'John', 'Doe', 'Smith', '1990-05-15', 'Male', '40.00', '0987654321', 'john.doe@example.com', 'Maple', 'Sunnyvale', 'California', 'USA'),
(3, 'Jane', 'Alice', 'Johnson', '1985-09-20', 'Female', '45.50', '0912345678', 'jane.johnson@example.com', 'Oak', 'Brooklyn', 'New York', 'USA'),
(4, 'Michael', 'James', 'Williams', '1992-02-10', 'Male', '42.75', '0943215678', 'michael.williams@example.com', 'Cedar', 'Birmingham', 'Alabama', 'USA'),
(5, 'Emily', 'Grace', 'Anderson', '1988-07-03', 'Female', '47.25', '0918765432', 'emily.anderson@example.com', 'Pine', 'Toronto', 'Ontario', 'Canada'),
(6, 'Daniel', 'Robert', 'Brown', '1994-11-28', 'Male', '38.50', '0987654321', 'daniel.brown@example.com', 'Birch', 'Melbourne', 'Victoria', 'Australia'),
(7, 'Olivia', 'Sophia', 'Miller', '1991-06-18', 'Female', '44.00', '0912345678', 'olivia.miller@example.com', 'Willow', 'London', 'England', 'United Kingdom'),
(8, 'Alexander', 'William', 'Jones', '1993-09-05', 'Male', '46.75', '0943215678', 'alexander.jones@example.com', 'Ash', 'Glasgow', 'Scotland', 'United Kingdom'),
(9, 'Charlotte', 'Ava', 'Davis', '1987-04-11', 'Female', '41.25', '0918765432', 'charlotte.davis@example.com', 'Elm', 'Paris', 'Île-de-France', 'France'),
(10, 'Liam', 'Noah', 'Martinez', '1996-01-25', 'Male', '36.50', '0987654321', 'liam.martinez@example.com', 'Maple', 'Sydney', 'New South Wales', 'Australia'),
(11, 'Emma', 'Mia', 'Lopez', '1990-08-09', 'Female', '43.00', '0912345678', 'emma.lopez@example.com', 'Oak', 'Madrid', 'Community of Madrid', 'Spain');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ATTENDANCE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `FK_EMPLOYEE_ATTENDANCE` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employee` (`EMPLOYEE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
