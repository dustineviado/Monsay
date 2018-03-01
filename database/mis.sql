-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2018 at 11:22 PM
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
(2018001, 'Grade 1', 'Computer1', '99', 1, '2018-2019'),
(2018001, 'Grade 1', 'Computer1', '92', 2, '2018-2019'),
(2018001, 'Grade 1', 'Computer1', '88', 3, '2018-2019'),
(2018001, 'Grade 1', 'Computer1', '90', 4, '2018-2019'),
(2018001, 'Grade 1', 'English1', '98', 1, '2018-2019'),
(2018001, 'Grade 1', 'English1', '89', 2, '2018-2019'),
(2018001, 'Grade 1', 'English1', '90', 3, '2018-2019'),
(2018001, 'Grade 1', 'English1', '88', 4, '2018-2019'),
(2018001, 'Grade 1', 'Math1', '99', 1, '2018-2019'),
(2018001, 'Grade 1', 'Math1', '89', 2, '2018-2019'),
(2018001, 'Grade 1', 'Math1', '88', 3, '2018-2019'),
(2018001, 'Grade 1', 'Math1', '98', 4, '2018-2019');

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
('sc011', '2018-2019'),
('sc012', '2018-2019'),
('sc021', '2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `archive_schedule_subject`
--

CREATE TABLE `archive_schedule_subject` (
  `scheid` varchar(10) NOT NULL,
  `day` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `subid` varchar(10) NOT NULL,
  `room` varchar(10) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `schoolyear` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_schedule_subject`
--

INSERT INTO `archive_schedule_subject` (`scheid`, `day`, `time`, `subid`, `room`, `teacher_id`, `schoolyear`) VALUES
('sc011', 'M/T/W/Th/F', '8:00-9:00A', 'Computer1', '123', 201802, '2018-2019'),
('sc011', 'M/T/W/Th/F', '7:00-8:00A', 'English1', '123', 201803, '2018-2019'),
('sc011', 'M/T/W/Th/F', '9:00-10:00', 'Math1', '123', 201801, '2018-2019');

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
('011', 'Amity', 'Grade 1', 201801, 'sc011', '2018-2019'),
('012', 'Benevolence', 'Grade 1', 201802, 'sc012', '2018-2019'),
('021', 'Amity', 'Grade 2', 201803, 'sc021', '2018-2019');

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
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_student`
--

INSERT INTO `archive_student` (`id_num`, `fname`, `mname`, `lname`, `email`, `birthday`, `age`, `contact`, `gender`, `religion`, `address`, `parent_guard`, `pgcontact`, `year`, `secid`, `status`) VALUES
(0, 'sedg', 'sergsdrg', 'asdf', 'rgegwe@gmail.com', '2018-03-02', 0, 2345236, 'Male', 'Roman Catholic', 'sdfgsedtrge', 'sagsdg', 2147483647, 'Grade 10', '0101', 'Leaved'),
(2018001, 'Dustine John', 'Flores', 'Viado', 'dustineviado@gmail.com', '09/20/1997', 20, 918540141, 'Male', 'Roman Catholic', ' corregidor Manuguit', 'Celia F. Viado', 12123121, 'Grade 1', '011', 'Enrolled');

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
('Computer1', 'Basic Computer', 'Computer', 'Grade 1', '2018-2019'),
('English1', 'Grammar', 'English', 'Grade 1', '2018-2019'),
('Math1', 'Basic Math', 'Math', 'Grade 1', '2018-2019');

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
  `address` varchar(100) NOT NULL,
  `contact` int(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archive_type`
--

CREATE TABLE `archive_type` (
  `user_type` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `id_number` int(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2018001, 'Math1', 'Grade 1', '99', 1),
(2018001, 'Math1', 'Grade 1', '89', 2),
(2018001, 'Math1', 'Grade 1', '88', 3),
(2018001, 'Math1', 'Grade 1', '98', 4),
(2018001, 'Computer1', 'Grade 1', '99', 1),
(2018001, 'Computer1', 'Grade 1', '92', 2),
(2018001, 'Computer1', 'Grade 1', '88', 3),
(2018001, 'Computer1', 'Grade 1', '90', 4),
(2018001, 'English1', 'Grade 1', '98', 1),
(2018001, 'English1', 'Grade 1', '89', 2),
(2018001, 'English1', 'Grade 1', '90', 3),
(2018001, 'English1', 'Grade 1', '88', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pre_registration`
--

CREATE TABLE `pre_registration` (
  `ctrl_num` int(25) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `age` int(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `contact` bigint(50) NOT NULL,
  `parent_guard` varchar(100) NOT NULL,
  `pgcontact` bigint(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date_made` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_registration`
--

INSERT INTO `pre_registration` (`ctrl_num`, `fname`, `mname`, `lname`, `birthday`, `age`, `email`, `religion`, `gender`, `address`, `contact`, `parent_guard`, `pgcontact`, `status`, `date_made`) VALUES
(2, 'Kyrie', 'Drew', 'Irving', '2005-05-24', 0, 'uncledrew@gmail.com', 'Roman Catholic', 'Male', 'Boston', 91102231, 'Uncle Wes', 92132621, 'Pending', '0000-00-00 00:00:00'),
(6, 'Red', 'Jumpsuit', 'Apparatus', '04/21/2013', 0, 'RJA@gmail.com', 'Roman Catholic', 'Male', 'kalsjdlajsdjas123123', 912381237, 'askdasdask', 12939121, 'Pending', '2018-02-07 01:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` bigint(50) NOT NULL,
  `password` varchar(100) NOT NULL
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
  `scheid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheid`) VALUES
('sc000'),
('sc0101');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_subject`
--

CREATE TABLE `schedule_subject` (
  `scheid` varchar(20) DEFAULT NULL,
  `day` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `subid` varchar(25) DEFAULT NULL,
  `room` varchar(25) NOT NULL,
  `teacher_id` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `secid` varchar(25) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `year_level` varchar(25) NOT NULL,
  `teacher_id` int(25) NOT NULL,
  `scheid` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`secid`, `section_name`, `year_level`, `teacher_id`, `scheid`) VALUES
('000', 'Unassigned', '---', 0, 'sc000'),
('0101', 'Amity 10', 'Grade 10', 201803, 'sc0101');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_num` int(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` varchar(25) NOT NULL,
  `contact` bigint(50) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `address` varchar(200) NOT NULL,
  `parent_guard` varchar(100) NOT NULL,
  `pgcontact` bigint(50) NOT NULL,
  `year` varchar(25) NOT NULL,
  `secid` varchar(25) DEFAULT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_num`, `fname`, `mname`, `lname`, `email`, `birthday`, `contact`, `gender`, `religion`, `address`, `parent_guard`, `pgcontact`, `year`, `secid`, `status`) VALUES
(20180001, 'ralph jerome', 'Flores', 'shit1', 'dustineviado@gmail.com', '09/20/1997', 1231231231, 'Male', 'Roman Catholic', ' corregidor Manuguit', 'Celia F. Viado', 12123121, 'Grade 11', '000', 'Not Enrolled');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `year_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `subject`, `faculty`, `year_level`) VALUES
('Computer1', 'Basic Computer', 'Computer', 'Grade 1'),
('English1', 'Grammar', 'English', 'Grade 1'),
('Math1', 'Basic Math', 'Math', 'Grade 1');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(20) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `age` int(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` bigint(50) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `fname`, `mname`, `lname`, `birthday`, `age`, `gender`, `email`, `department`, `address`, `contact`, `status`) VALUES
(201801, 'Maria', 'G.', 'Francisco', '2002-01-02', 20, 'Female', 'mariafrancisco@gmail.com', 'Math', '9048 Makisig Street Las pinas', 2147483647, 'Active'),
(201802, 'Butch', 'R.', 'Bituonan', '1997-03-05', 24, 'Male', 'butcher@gmail.com', 'Computer', '34572 Santiago Street Happy Place', 2147483647, 'Male'),
(201803, 'Ernita', 'L.', 'Pilapil', '1996-02-27', 21, 'Female', 'ernitz@yahoo.com', 'English', '5738 Macapagal street dimawala Manila City', 2147483647, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `user_type` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_number` int(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`user_type`, `email`, `id_number`, `password`) VALUES
('Admin', 'admin@gmail.com', 123, 'admin1'),
('Teacher', 'mariafrancisco@gmail.com', 201801, 'hveateachersdefaultpasswo'),
('Teacher', '', 201802, 'hveateachersdefaultpasswo'),
('Teacher', 'ernitz@yahoo.com', 201803, 'hveateachersdefaultpasswo'),
('Student', 'dustineviado@gmail.com', 2018001, '12345'),
('Student', 'dustineviado@gmail.com', 20180001, '12345'),
('Student', 'fwef@gmail.com', 20180002, '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive_grading`
--
ALTER TABLE `archive_grading`
  ADD PRIMARY KEY (`id_num`,`year`,`subid`,`quarter`,`schoolyear`);

--
-- Indexes for table `archive_schedule`
--
ALTER TABLE `archive_schedule`
  ADD PRIMARY KEY (`scheid`,`schoolyear`);

--
-- Indexes for table `archive_schedule_subject`
--
ALTER TABLE `archive_schedule_subject`
  ADD PRIMARY KEY (`scheid`,`subid`,`teacher_id`,`schoolyear`),
  ADD KEY `scheid` (`scheid`),
  ADD KEY `subid` (`subid`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `archive_section`
--
ALTER TABLE `archive_section`
  ADD PRIMARY KEY (`secid`,`schoolyear`),
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
  ADD PRIMARY KEY (`subid`,`schoolyear`);

--
-- Indexes for table `archive_teacher`
--
ALTER TABLE `archive_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `archive_type`
--
ALTER TABLE `archive_type`
  ADD PRIMARY KEY (`id_number`);

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
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pre_registration`
--
ALTER TABLE `pre_registration`
  MODIFY `ctrl_num` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
