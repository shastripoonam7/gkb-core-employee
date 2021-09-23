-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 01:47 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `hobbies` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `image_path` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `first_name`, `last_name`, `email`, `hobbies`, `gender`, `joining_date`, `department`, `image_path`, `created_at`, `active`) VALUES
(19, 'Poonam', 'Shastri', 'shastripoonam7@gmail.com', 'TV,Coding', 'Female', '2021-09-24', 'Production', 'avatar3.png', '2021-09-22 16:35:50', 1),
(21, 'Rani', 'Shastri', 'shastripoonam7@gmail.com', 'Coding,Reading', 'Female', '2021-09-24', 'Marketing', 'avatar3.png', '2021-09-22 11:56:18', 1),
(22, 'Shrina', 'proo', 'prooh@gmail.com', 'TV,Reading', 'Male', '2021-09-29', 'Admin', 'avatar2.jpg', '2021-09-22 14:33:22', 1),
(23, 'rahil', 'kry', 'kry@gmail.com', 'TV,Skiing', 'Female', '2021-09-17', 'HR', 'avatar6_1.png', '2021-09-22 16:28:32', 1),
(26, 'Prit', 'Shastri', 'shastripoonam7@gmail.com', 'TV,Coding,Reading,Skiing', 'Male', '2021-09-01', 'Production', 'avatar1_2.jpg', '2021-09-22 16:36:32', 1),
(32, 'ryaa', 'moo', 'riya@gmail.com', 'Coding,Reading', 'Female', '2021-09-24', 'Marketing', NULL, NULL, 1),
(34, 'ryaaraj', 'moo', 'riya@gmail.com', 'Coding,Reading', 'Female', '0000-00-00', 'Marketing', NULL, NULL, 1),
(35, 'bricky', 'tapiman', 'bricky@gmail.com', 'TV,Coding', 'Male', '2021-09-29', 'Admin', 'mm.jpg', '2021-09-22 18:43:30', 1),
(36, 'ryaaraj', 'ryaaraj', 'riya@gmail.com', 'Coding,Reading', 'Female', '0000-00-00', 'Marketing', NULL, NULL, 1),
(37, 'tapiman', 'tapiman', 'tapionam7@gmail.com', 'TV,Coding', 'Female', '0000-00-00', 'Admin', NULL, NULL, 1),
(38, 'ryaaraj', 'ryaaraj', 'riya@gmail.com', 'Coding,Reading', 'Female', '0000-00-00', 'Marketing', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
