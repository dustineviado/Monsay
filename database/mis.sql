-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2018 at 12:16 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

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
  `status` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `position`, `fname`, `lname`, `birthday`, `age`, `address`, `email`, `contact`, `status`, `username`, `password`) VALUES
(0, 'Head Admin', 'Dustine', 'Viado', '1997-01-20', 20, 'abad santos', 'dustineviado@gmail.com', 123456789, 'Single', 'Admin', 'admin123'),
(2, 'Support', 'John', 'Julag-ay', '1997-04-09', 20, 'las pinas city', 'junjulagay@gmail.com', 123456789, 'Single', 'John Julag-ay', '12345'),
(3, 'Carry', 'Ralph', 'Reyes', '1997-03-20', 20, 'tondo', 'reyesralph@gmail.com', 123456789, 'Single', 'Ralph Reyes', '12345');

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
(4, 'Kyrie', 'Drew', 'Irving', '1992-04-21', 25, 'uncledrew@gmail.com', 'Roman Catholic', 'Male', 'Boston Celtics', 23123123, 'Earth is Flat', 2147483647, ''),
(5, 'Nathalia Starr', '', '', '1997-03-02', 20, 'asaskda@gmail.com', 'Roman Catholic', 'Male', 'klasdklzxkclasdj', 23232123, 'aksjdaxzkcjz', 823712731, 'Pending');

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
  `scheid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheid`) VALUES
('SAM123'),
('SAM231');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_subject`
--

CREATE TABLE `schedule_subject` (
  `scheid` varchar(10) NOT NULL,
  `day` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `subid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_subject`
--

INSERT INTO `schedule_subject` (`scheid`, `day`, `time`, `subid`) VALUES
('SAM123', '7:00', '8:00', 'M102'),
('SAM123', '8:00', '7:00', 'S101'),
('SAM231', '9:00', '10', 'H103'),
('SAM123', '123', '123', 'S101'),
('SAM123', '321', '321', 'S101');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `secid` varchar(25) NOT NULL,
  `section_name` varchar(25) NOT NULL,
  `year_level` varchar(25) NOT NULL,
  `scheid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`secid`, `section_name`, `year_level`, `scheid`) VALUES
('12345', 'Bethlehem', 'Kinder', 'SAM123'),
('54321', 'Amity', 'Preparatory', 'SAM231');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_num` int(20) NOT NULL,
  `studname` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `birthday` varchar(25) NOT NULL,
  `age` int(25) NOT NULL,
  `contact` int(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `parent_guard` varchar(25) NOT NULL,
  `pgcontact` int(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `secid` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `year_level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `subject`, `faculty`, `year_level`) VALUES
('H103', 'Hekasi', 'History', 'Grade 4'),
('M102', 'Basic Math', 'Math', 'Grade 1'),
('S101', 'Biology', 'Science', 'Grade 2');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(20) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `advisory` varchar(25) NOT NULL,
  `faculty` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `contact` int(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `fullname`, `birthday`, `age`, `gender`, `email`, `advisory`, `faculty`, `address`, `contact`, `status`) VALUES
(123123, 'lkjaslkdj', '0000-00-00', 1771, 'Male', 'lajsdlkajd', 'llkkjasdiuaysd', 'assiduy', 'iuuayssd', 87126387, 'lajsd');

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
(123, 'gitgud', 'burnik@yahoo.com', '1234567'),
(1, 'admin', 'rmhsadmin@gmail.com', 'admin1'),
(2, 'John', 'John@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pre_registration`
--
ALTER TABLE `pre_registration`
  ADD PRIMARY KEY (`ctrl_num`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheid`);

--
-- Indexes for table `schedule_subject`
--
ALTER TABLE `schedule_subject`
  ADD KEY `scheid` (`scheid`),
  ADD KEY `subid` (`subid`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`secid`),
  ADD KEY `scheid` (`scheid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_num`),
  ADD KEY `secid` (`secid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pre_registration`
--
ALTER TABLE `pre_registration`
  MODIFY `ctrl_num` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id_num` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule_subject`
--
ALTER TABLE `schedule_subject`
  ADD CONSTRAINT `schedule_subject_ibfk_1` FOREIGN KEY (`scheid`) REFERENCES `schedule` (`scheid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_subject_ibfk_2` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`scheid`) REFERENCES `schedule` (`scheid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`secid`) REFERENCES `section` (`secid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
