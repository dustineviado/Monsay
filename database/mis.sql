-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2018 at 08:28 AM
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
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `position`, `fname`, `lname`, `birthday`, `age`, `address`, `email`, `contact`, `status`, `password`) VALUES
(12345, 'admin', 'admin', 'admin', '1997-01-30', 20, 'Las Pinas City', 'rmhsadmin@gmail.com', 123456789, 'Single', 'admin1');

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
  `id_num` int(20) NOT NULL,
  `year` varchar(25) NOT NULL,
  `subid` varchar(10) NOT NULL,
  `grade` varchar(3) NOT NULL,
  `quarter` int(1) NOT NULL,
  `schoolyear` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_grading`
--

INSERT INTO `archive_grading` (`id_num`, `year`, `subid`, `grade`, `quarter`, `schoolyear`) VALUES
(6, 'Kinder', 'M102', '89', 1, '2016-2017'),
(234, 'Kinder', 'M102', '98', 1, '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `archive_schedule`
--

CREATE TABLE `archive_schedule` (
  `scheid` varchar(10) NOT NULL,
  `schoolyear` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_schedule`
--

INSERT INTO `archive_schedule` (`scheid`, `schoolyear`) VALUES
('SAM123', '2016-2017'),
('SAM321', '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `archive_schedule_subject`
--

CREATE TABLE `archive_schedule_subject` (
  `scheid` varchar(10) DEFAULT NULL,
  `day` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `subid` varchar(10) DEFAULT NULL,
  `teacher_id` int(20) DEFAULT NULL,
  `schoolyear` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_schedule_subject`
--

INSERT INTO `archive_schedule_subject` (`scheid`, `day`, `time`, `subid`, `teacher_id`, `schoolyear`) VALUES
('SAM123', 'yown', '8:00-7:00 ', 'S101', 123, '2016-2017'),
('SAM321', 'M/T/W/Th/F', '8:00-7:00 ', 'H103', 321, '2016-2017'),
('SAM123', 'M/T/W/Th/F', '9:00-10:00', 'M102', 321, '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `archive_section`
--

CREATE TABLE `archive_section` (
  `secid` varchar(25) NOT NULL,
  `section_name` varchar(25) NOT NULL,
  `year_level` varchar(25) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `scheid` varchar(10) DEFAULT NULL,
  `schoolyear` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_section`
--

INSERT INTO `archive_section` (`secid`, `section_name`, `year_level`, `teacher_id`, `scheid`, `schoolyear`) VALUES
('123', 'Amity', 'Kinder', 123, 'SAM123', '2016-2017'),
('321', 'Bethlehem', 'Kinder', 321, 'SAM321', '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `archive_student`
--

CREATE TABLE `archive_student` (
  `id_num` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
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
  `secid` varchar(25) DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `schoolyear` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_student`
--

INSERT INTO `archive_student` (`id_num`, `fname`, `mname`, `lname`, `email`, `birthday`, `age`, `contact`, `gender`, `religion`, `address`, `parent_guard`, `pgcontact`, `year`, `secid`, `status`, `schoolyear`) VALUES
(6, 'ralph jerome', '', '', '', '2013-06-11', 4, 1231231231, 'male', '', 'asdkasjdasd', 'Shing Shang Fu', 12123121, 'Kinder', '123', 'Enrolled', '2016-2017'),
(234, 'jqeury', 'gewrgew', 'wergwerg', 'erger@gmail.com', '234234', 32, 3453456, 'Male', 'Roman Catholic', 'rth4y6', 'edhghe', 345345, 'Kinder', '123', 'Enrolled', '2016-2017'),
(321, 'wefwe', 'f', 'qwer', 'wefw@gmail.com', '234', 23, 234235, 'Male', 'Roman Catholic', 'erg345', 'rtgrt', 345345, 'Kinder', '321', 'Enrolled', '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `archive_subject`
--

CREATE TABLE `archive_subject` (
  `subid` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `year_level` varchar(25) NOT NULL,
  `schoolyear` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_subject`
--

INSERT INTO `archive_subject` (`subid`, `subject`, `faculty`, `year_level`, `schoolyear`) VALUES
('H103', 'Hekasi', 'History', 'Grade 4', '2016-2017'),
('M102', 'Basic Math', 'Math', 'Grade 1', '2016-2017'),
('S101', 'Biology', 'Science', 'Grade 2', '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `archive_teacher`
--

CREATE TABLE `archive_teacher` (
  `teacher_id` int(20) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `department` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `contact` int(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `schoolyear` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_teacher`
--

INSERT INTO `archive_teacher` (`teacher_id`, `fname`, `mname`, `lname`, `birthday`, `age`, `gender`, `email`, `department`, `address`, `contact`, `status`, `schoolyear`) VALUES
(123, 'wew', 'tae1', 'shit1', '2018-01-09', 25, 'Male', 'wew@gmail.com', 'Math', '523dfgew', 12342345, 'Active', '2016-2017'),
(321, 'wefwef', 'tae2', 'shit2', '2017-12-15', 23, 'wfgwg', 'wefwe@gmail.com', 'wfwf', '234wef', 234234, 'Active', '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `grading`
--

CREATE TABLE `grading` (
  `id_num` int(20) NOT NULL,
  `subid` varchar(10) NOT NULL,
  `year` varchar(25) NOT NULL,
  `grade` varchar(3) NOT NULL,
  `quarter` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grading`
--

INSERT INTO `grading` (`id_num`, `subid`, `year`, `grade`, `quarter`) VALUES
(6, 'M102', 'Kinder', '89', 1),
(234, 'M102', 'Kinder', '98', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pre_registration`
--

CREATE TABLE `pre_registration` (
  `ctrl_num` int(25) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `birthday` varchar(25) NOT NULL,
  `age` int(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `contact` int(25) NOT NULL,
  `parent_guard` varchar(25) NOT NULL,
  `pgcontact` int(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `date_made` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_registration`
--

INSERT INTO `pre_registration` (`ctrl_num`, `fname`, `mname`, `lname`, `birthday`, `age`, `email`, `religion`, `gender`, `address`, `contact`, `parent_guard`, `pgcontact`, `status`, `date_made`) VALUES
(1, 'Oh', 'Sean', 'Park', '2010-10-22', 0, 'ohsean@gmail.com', 'Roman Catholic', 'Female', 'Manila', 92134612, 'Paz Sig', 91235123, 'Pending', '0000-00-00 00:00:00'),
(2, 'Kyrie', 'Drew', 'Irving', '2005-05-24', 0, 'uncledrew@gmail.com', 'Roman Catholic', 'Male', 'Boston', 91102231, 'Uncle Wes', 92132621, 'Pending', '0000-00-00 00:00:00'),
(6, 'Red', 'Jumpsuit', 'Apparatus', '04/21/2013', 0, 'RJA@gmail.com', 'Roman Catholic', 'Male', 'kalsjdlajsdjas123123', 912381237, 'askdasdask', 12939121, 'Pending', '2018-02-07 01:56:57');

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
('SAM321');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_subject`
--

CREATE TABLE `schedule_subject` (
  `scheid` varchar(10) DEFAULT NULL,
  `day` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `subid` varchar(10) DEFAULT NULL,
  `teacher_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_subject`
--

INSERT INTO `schedule_subject` (`scheid`, `day`, `time`, `subid`, `teacher_id`) VALUES
('SAM123', 'yown', '8:00-7:00 ', 'S101', 123),
('SAM321', 'M/T/W/Th/F', '8:00-7:00 ', 'H103', 321),
('SAM123', 'M/T/W/Th/F', '9:00-10:00', 'M102', 321);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `secid` varchar(25) NOT NULL,
  `section_name` varchar(25) NOT NULL,
  `year_level` varchar(25) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `scheid` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`secid`, `section_name`, `year_level`, `teacher_id`, `scheid`) VALUES
('123', 'Amity', 'Kinder', 123, 'SAM123'),
('321', 'Bethlehem', 'Kinder', 321, 'SAM321');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_num` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
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
  `secid` varchar(25) DEFAULT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_num`, `fname`, `mname`, `lname`, `email`, `birthday`, `age`, `contact`, `gender`, `religion`, `address`, `parent_guard`, `pgcontact`, `year`, `secid`, `status`) VALUES
(6, 'ralph jerome', '', '', '', '2013-06-11', 4, 1231231231, 'male', '', 'asdkasjdasd', 'Shing Shang Fu', 12123121, 'Kinder', '123', 'Enrolled'),
(234, 'jqeury', 'gewrgew', 'wergwerg', 'erger@gmail.com', '234234', 32, 3453456, 'Male', 'Roman Catholic', 'rth4y6', 'edhghe', 345345, 'Kinder', '123', 'Enrolled'),
(321, 'wefwe', 'f', 'qwer', 'wefw@gmail.com', '234', 23, 234235, 'Male', 'Roman Catholic', 'erg345', 'rtgrt', 345345, 'Kinder', '321', 'Enrolled');

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
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `department` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `contact` int(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `fname`, `mname`, `lname`, `birthday`, `age`, `gender`, `email`, `department`, `address`, `contact`, `status`) VALUES
(123, 'wew', 'tae1', 'shit1', '2018-01-09', 25, 'Male', 'wew@gmail.com', 'Math', '523dfgew', 12342345, 'Active'),
(321, 'wefwef', 'tae2', 'shit2', '2017-12-15', 23, 'wfgwg', 'wefwe@gmail.com', 'wfwf', '234wef', 234234, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `id_number` int(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type`, `email`, `id_number`, `password`) VALUES
('Admin', 'rmhsadmin@gmail.com', 12345, 'admin1'),
('Student', 'GILBERT@gmail.com', 1, '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive_schedule`
--
ALTER TABLE `archive_schedule`
  ADD PRIMARY KEY (`scheid`);

--
-- Indexes for table `archive_schedule_subject`
--
ALTER TABLE `archive_schedule_subject`
  ADD KEY `scheid` (`scheid`),
  ADD KEY `subid` (`subid`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `archive_section`
--
ALTER TABLE `archive_section`
  ADD PRIMARY KEY (`secid`),
  ADD KEY `scheid` (`scheid`);

--
-- Indexes for table `archive_student`
--
ALTER TABLE `archive_student`
  ADD PRIMARY KEY (`id_num`),
  ADD KEY `secid` (`secid`);

--
-- Indexes for table `archive_subject`
--
ALTER TABLE `archive_subject`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `archive_teacher`
--
ALTER TABLE `archive_teacher`
  ADD PRIMARY KEY (`teacher_id`);

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
  ADD KEY `subid` (`subid`),
  ADD KEY `teacher_id` (`teacher_id`);

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
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive_student`
--
ALTER TABLE `archive_student`
  MODIFY `id_num` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `pre_registration`
--
ALTER TABLE `pre_registration`
  MODIFY `ctrl_num` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id_num` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule_subject`
--
ALTER TABLE `schedule_subject`
  ADD CONSTRAINT `schedule_subject_ibfk_1` FOREIGN KEY (`scheid`) REFERENCES `schedule` (`scheid`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_subject_ibfk_2` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_subject_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`scheid`) REFERENCES `schedule` (`scheid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`secid`) REFERENCES `section` (`secid`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
