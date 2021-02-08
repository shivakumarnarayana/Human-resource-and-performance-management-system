-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 04:21 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Getall` ()  BEGIN
 SELECT *
 FROM employee;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `c_name` varchar(20) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `phone` decimal(10,0) DEFAULT NULL,
  `address` varchar(35) DEFAULT NULL,
  `requirement` text,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`c_name`, `username`, `password`, `phone`, `address`, `requirement`, `client_id`) VALUES
('rakesh', 'rakesh@gmail.com', 'rakesh', '8521479630', 'tamilnadu', 'billing system', 120);

--
-- Triggers `client`
--
DELIMITER $$
CREATE TRIGGER `pstate` AFTER INSERT ON `client` FOR EACH ROW INSERT into project_state values(0,new.client_id,null)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` decimal(10,0) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `Skill` varchar(20) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `rateing` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_id`, `name`, `address`, `phone`, `gender`, `role`, `Skill`, `salary`, `username`, `password`, `rateing`) VALUES
(101, 'sanjay', 'Halaguru', '7410258963', 'male', 'Employee', 'web developer', 20000, 'sanjay@gmail.com', 'sanjay', 5),
(102, 'shivakumar', 'mandya', '8548987355', 'male', 'Manager', 'data analyist', 250000, 'shivakumarnarayana00@gmail.com', 'Nanditha', 4.8125),
(103, 'srinivas', 'Mysore', '8746441214', 'male', 'Employee', 'java developer', 85100, 'srinivas@gmail.com', 'srinivas', 4.5),
(104, 'nagarjun', 'tumkur', '7412589630', 'male', 'Employee', 'system designer', 100000, 'nagarajun@gmail.com', 'nagarjun', 4.5),
(105, 'sowmya', 'banglore', '7569841023', 'female', 'Employee', 'java developer', 50000, 'sowmya@gmail.com', 'sowmya', 0),
(106, 'rohan', 'mandya', '7456982130', 'male', 'Employee', 'system designer', 55000, 'rohan@gmail.com', 'rohan', 0),
(107, 'sowndarya', 'malavalli', '9742930774', 'female', 'Manager', 'algorithm developer ', 200000, 'sowndarya@gmail.com', 'sowndarya', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emp_state`
--

CREATE TABLE `emp_state` (
  `Emp_id` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_state`
--

INSERT INTO `emp_state` (`Emp_id`, `state`) VALUES
(101, 0),
(102, 0),
(103, 0),
(104, 0),
(105, 0),
(106, 0),
(106, 0),
(107, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pre_project`
--

CREATE TABLE `pre_project` (
  `c_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `pre_req` text,
  `p_state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `p_no` int(11) DEFAULT NULL,
  `p_name` varchar(30) DEFAULT NULL,
  `mgr_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `fianl_date` date DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`p_no`, `p_name`, `mgr_id`, `start_date`, `fianl_date`, `client_id`) VALUES
(52, 'Billing system', 102, '2018-12-03', '2018-12-14', 120);

-- --------------------------------------------------------

--
-- Table structure for table `project_state`
--

CREATE TABLE `project_state` (
  `p_status` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `pno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_state`
--

INSERT INTO `project_state` (`p_status`, `client_id`, `pno`) VALUES
(7, 120, 52);

-- --------------------------------------------------------

--
-- Table structure for table `works_on`
--

CREATE TABLE `works_on` (
  `Empid` int(11) DEFAULT NULL,
  `pno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `email` (`username`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `project_state`
--
ALTER TABLE `project_state`
  ADD PRIMARY KEY (`pno`);

--
-- Indexes for table `works_on`
--
ALTER TABLE `works_on`
  ADD KEY `Empid` (`Empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `project_state`
--
ALTER TABLE `project_state`
  MODIFY `pno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
