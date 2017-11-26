-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2017 at 02:48 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(20) NOT NULL,
  `position` varchar(25) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `contact` int(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archive_admin`
--

CREATE TABLE `archive_admin` (
  `admin_id` int(25) NOT NULL,
  `position` varchar(25) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `contact` int(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archive_grading`
--

CREATE TABLE `archive_grading` (
  `id_num` int(25) NOT NULL,
  `year_level` varchar(25) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `grade` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archive_schedule`
--

CREATE TABLE `archive_schedule` (
  `teacher` varchar(25) NOT NULL,
  `year_level` varchar(25) NOT NULL,
  `time` time(6) NOT NULL,
  `day` varchar(25) NOT NULL,
  `section` varchar(25) NOT NULL,
  `adviser` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archive_section`
--

CREATE TABLE `archive_section` (
  `year_level` varchar(25) NOT NULL,
  `section_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archive_student`
--

CREATE TABLE `archive_student` (
  `id_num` int(20) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `contact` int(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `section` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archive_subject`
--

CREATE TABLE `archive_subject` (
  `year_level` varchar(25) NOT NULL,
  `subject` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archive_teacher`
--

CREATE TABLE `archive_teacher` (
  `teacher_id` int(25) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `advisory` varchar(25) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `contact` int(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grading`
--

CREATE TABLE `grading` (
  `id_num` int(25) NOT NULL,
  `year_level` varchar(25) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `grade` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pre_registration`
--

CREATE TABLE `pre_registration` (
  `ctrl_num` int(25) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `contact` int(25) NOT NULL,
  `parent_guard` varchar(25) NOT NULL,
  `pgcontact` int(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_registration`
--

INSERT INTO `pre_registration` (`ctrl_num`, `fname`, `mname`, `lname`, `birthday`, `age`, `email`, `religion`, `gender`, `address`, `contact`, `parent_guard`, `pgcontact`, `status`) VALUES
(1, 'ralph jerome', 'daluyon', 'reyes', '2013-06-11', 4, '', '', 'male', 'asdkasjdasd', 1231231231, 'Shing Shang Fu', 12123121, ''),
(2, 'John', 'John', 'John', '2005-03-24', 12, 'bentong@gmail.com', 'Roman Catholic', 'Male', 'Dito lang sa tabi', 1234567890, 'Omniknight', 2147483647, ''),
(3, 'Havana', 'Ona', 'Na', '2002-05-27', 15, 'Obeybe@gmail.com', 'Roman Catholic', 'Female', 'asjdlasjdlk', 1231231231, 'asldjalksdj', 12312313, ''),
(4, 'Kyrie', 'Drew', 'Irving', '1992-04-21', 25, 'uncledrew@gmail.com', 'Roman Catholic', 'Male', 'Boston Celtics', 23123123, 'Earth is Flat', 2147483647, '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `contact` int(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `email`, `contact`, `password`) VALUES
('', 'ralph@gmail.com', 1234567890, '1234567'),
('', 'ralph3@gmail.com', 1231329, '123123'),
('', 'aasdd@yahoo.com', 1231329, 'aasdkasd'),
('blobbers', 'skska@gmail.com', 12318231, 'alsdaks');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `teacher` varchar(25) NOT NULL,
  `year_level` varchar(25) NOT NULL,
  `day` varchar(25) NOT NULL,
  `time` time(6) NOT NULL,
  `section` varchar(25) NOT NULL,
  `adviser` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `year_level` varchar(25) NOT NULL,
  `section_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_num` int(20) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `birthday` varchar(25) NOT NULL,
  `age` int(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `contact` int(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `parent_guard` varchar(25) NOT NULL,
  `pgcontact` int(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `section` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_num`, `fname`, `mname`, `lname`, `birthday`, `age`, `gender`, `religion`, `address`, `contact`, `status`, `parent_guard`, `pgcontact`, `email`, `year`, `section`) VALUES
(4, 'Ralph ', 'Pogi', 'Reyes', '2001-07-22', 16, 'Male', '', 'asjdlakjsdlkj', 2147483647, '', 'asdlkajlkdjaslkdj', 12313123, 'aslkdjaklsdjalkd', '', ''),
(5, 'Jane', 'Burnik', 'Doe', '2000-03-17', 17, 'Female', '', 'New York Cubao', 1232111231, '', 'Mang Man Doe', 2147483647, 'alskjdalksdj', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` int(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `year_level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(20) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `advisory` varchar(25) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `contact` int(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `userID` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`userID`, `username`, `email`, `password`) VALUES
(123, 'gitgud', 'burnik@yahoo.com', '1234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pre_registration`
--
ALTER TABLE `pre_registration`
  ADD PRIMARY KEY (`ctrl_num`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pre_registration`
--
ALTER TABLE `pre_registration`
  MODIFY `ctrl_num` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id_num` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
