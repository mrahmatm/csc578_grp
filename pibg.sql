-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2022 at 03:52 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pibg`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(5) NOT NULL,
  `parent_icNum` varchar(15) NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_detail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `parent_icNum`, `complaint_title`, `complaint_detail`) VALUES
(3, 'root', 'tt', 'tt'),
(4, 'root', 'aduan saya', 'woof'),
(5, 'root', 'aduan dia', 'meow'),
(6, 'root', 'try', 'apink jjang'),
(7, 'root', 'asas', 'asas'),
(8, 'root', 'dede', 'dede'),
(9, 'root', 'nnn', 'nnn'),
(10, 'root', 'bb', 'bb'),
(11, '123456789', 'vvv', 'vvv'),
(12, '987654', 'new complaint', 'nnn');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(10) NOT NULL,
  `student_BC` varchar(10) NOT NULL,
  `invoice_status` varchar(30) NOT NULL,
  `invoice_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `student_BC`, `invoice_status`, `invoice_year`) VALUES
(1, 'ABC123', 'PENDING', 2022),
(2, 'ABC456', 'PENDING', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_icNum` varchar(15) NOT NULL,
  `parent_name` varchar(30) NOT NULL,
  `parent_email` varchar(30) NOT NULL,
  `parent_phone` varchar(15) NOT NULL,
  `parent_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_icNum`, `parent_name`, `parent_email`, `parent_phone`, `parent_password`) VALUES
('123456789', 'orang', 'master@gmail.com', '', 'master');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_icNum` varchar(15) NOT NULL,
  `staff_name` varchar(30) NOT NULL,
  `staff_email` varchar(30) NOT NULL,
  `staff_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_icNum`, `staff_name`, `staff_email`, `staff_password`) VALUES
('098765', 'master staff', 'masterstaff@gmail.com', 'master');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_BC` varchar(10) NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `parent_icNum` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_BC`, `student_name`, `parent_icNum`) VALUES
('ABC123', 'eunha', '123456789'),
('ABC456', 'umji', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `complaint_parent_fk` (`parent_icNum`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_icNum`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_icNum`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_BC`),
  ADD KEY `student_parent_fk` (`parent_icNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_parent_fk` FOREIGN KEY (`parent_icNum`) REFERENCES `parent` (`parent_icNum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
