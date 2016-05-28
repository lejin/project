-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2016 at 04:55 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignment`
--

DROP TABLE IF EXISTS `tbl_assignment`;
CREATE TABLE IF NOT EXISTS `tbl_assignment` (
  `Assignment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL DEFAULT '0',
  `Start_Date` varchar(250) NOT NULL,
  `End_Date` varchar(250) NOT NULL,
  `Assignment_Name` varchar(250) NOT NULL,
  `Weightage` varchar(250) NOT NULL,
  `preffereed_Hours` varchar(250) NOT NULL,
  `Course_ID` int(11) NOT NULL,
  PRIMARY KEY (`Assignment_ID`),
  KEY `FK_tbl_assignment_tbl_course` (`Course_ID`),
  KEY `FK_tbl_assignment_tbl_user` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

DROP TABLE IF EXISTS `tbl_course`;
CREATE TABLE IF NOT EXISTS `tbl_course` (
  `Course_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Course_Name` varchar(250) NOT NULL,
  `Course_Dsecription` varchar(250) NOT NULL,
  `Percentage_Of_Fulltime` varchar(250) NOT NULL,
  PRIMARY KEY (`Course_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`Course_ID`, `Course_Name`, `Course_Dsecription`, `Percentage_Of_Fulltime`) VALUES
(1, 'Engineering', 'civil', '100'),
(2, 'sss', 'sss', 'sss');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_assignment`
--

DROP TABLE IF EXISTS `tbl_course_assignment`;
CREATE TABLE IF NOT EXISTS `tbl_course_assignment` (
  `Course_Assignment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Course_ID` int(45) NOT NULL,
  `Assignment_ID` int(45) NOT NULL,
  `Actual_hours` varchar(250) NOT NULL,
  PRIMARY KEY (`Course_Assignment_ID`),
  KEY `User_Course_ID` (`User_Course_ID`),
  KEY `Assignment_ID` (`Assignment_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_program`
--

DROP TABLE IF EXISTS `tbl_course_program`;
CREATE TABLE IF NOT EXISTS `tbl_course_program` (
  `Course_Program_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Course_ID` int(45) NOT NULL,
  `Program_ID` int(45) NOT NULL,
  PRIMARY KEY (`Course_Program_ID`),
  KEY `Course_ID` (`Course_ID`),
  KEY `Program_ID` (`Program_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course_program`
--

INSERT INTO `tbl_course_program` (`Course_Program_ID`, `Course_ID`, `Program_ID`) VALUES
(2, 2, 1),
(10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_institute`
--

DROP TABLE IF EXISTS `tbl_institute`;
CREATE TABLE IF NOT EXISTS `tbl_institute` (
  `Institute_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Institute_Name` varchar(250) NOT NULL,
  `Institute_Address` varchar(250) NOT NULL,
  `Institute_Phone` varchar(250) NOT NULL,
  `Institute_Email` varchar(250) NOT NULL,
  PRIMARY KEY (`Institute_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_institute`
--

INSERT INTO `tbl_institute` (`Institute_ID`, `Institute_Name`, `Institute_Address`, `Institute_Phone`, `Institute_Email`) VALUES
(1, 'vjcet', 'vazhakulam', '1234', 'a@b.com'),
(6, 'kkkk', 'wow', 'wow', 'wow@ddd.ccc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_programs`
--

DROP TABLE IF EXISTS `tbl_programs`;
CREATE TABLE IF NOT EXISTS `tbl_programs` (
  `Program_ID` int(11) NOT NULL AUTO_INCREMENT,
  `program_Name` varchar(250) NOT NULL,
  `program_Description` varchar(250) NOT NULL,
  `Institute_ID` int(45) NOT NULL,
  PRIMARY KEY (`Program_ID`),
  KEY `Institute_ID` (`Institute_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_programs`
--

INSERT INTO `tbl_programs` (`Program_ID`, `program_Name`, `program_Description`, `Institute_ID`) VALUES
(1, 'btech', 'wow', 1),
(2, 'koo', 'koo', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

DROP TABLE IF EXISTS `tbl_semester`;
CREATE TABLE IF NOT EXISTS `tbl_semester` (
  `Semester_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `No_Of_Weeks` varchar(250) NOT NULL,
  `Course_ID` int(45) NOT NULL,
  PRIMARY KEY (`Semester_ID`),
  KEY `Program_ID` (`Course_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`Semester_ID`, `Start_Date`, `End_Date`, `No_Of_Weeks`, `Course_ID`) VALUES
(4, '2016-05-22', '2016-05-22', '32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester_course`
--

DROP TABLE IF EXISTS `tbl_semester_course`;
CREATE TABLE IF NOT EXISTS `tbl_semester_course` (
  `Semester_Course_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Course_ID` int(45) NOT NULL,
  `Semester_ID` int(45) NOT NULL,
  PRIMARY KEY (`Semester_Course_ID`),
  KEY `Course_ID` (`Course_ID`),
  KEY `Semester_ID` (`Semester_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_assignment`
--

DROP TABLE IF EXISTS `tbl_student_assignment`;
CREATE TABLE IF NOT EXISTS `tbl_student_assignment` (
  `id_student_assignment` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL DEFAULT '0',
  `assignment_id` int(11) NOT NULL DEFAULT '0',
  `completed_hours` float NOT NULL DEFAULT '0',
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_student_assignment`),
  KEY `FK_tbl_student_assignment_tbl_user` (`student_id`),
  KEY `FK_tbl_student_assignment_tbl_assignment` (`assignment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_task`
--

DROP TABLE IF EXISTS `tbl_student_task`;
CREATE TABLE IF NOT EXISTS `tbl_student_task` (
  `id_student_task` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT '0',
  `task_id` int(11) DEFAULT '0',
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_student_task`),
  KEY `FK_tbl_student_task_tbl_task` (`task_id`),
  KEY `FK_tbl_student_task_tbl_user` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

DROP TABLE IF EXISTS `tbl_task`;
CREATE TABLE IF NOT EXISTS `tbl_task` (
  `Task_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Task_Name` varchar(250) NOT NULL,
  `author_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `Task_Description` varchar(250) NOT NULL,
  `Task_due_date` date DEFAULT NULL,
  PRIMARY KEY (`Task_ID`),
  KEY `FK_tbl_task_tbl_user` (`author_id`),
  KEY `FK_tbl_task_tbl_course` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `F_Name` varchar(250) NOT NULL,
  `L_Name` varchar(250) NOT NULL,
  `User_Name` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Recovery_Mail` varchar(250) NOT NULL,
  `user_approoved` int(11) NOT NULL DEFAULT '0',
  `profile_complete` int(11) NOT NULL DEFAULT '0',
  `User_Type_ID` int(45) NOT NULL,
  `Institute_ID` int(45) NOT NULL,
  PRIMARY KEY (`User_ID`),
  KEY `User_Type_ID` (`User_Type_ID`),
  KEY `Institute_ID` (`Institute_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`User_ID`, `F_Name`, `L_Name`, `User_Name`, `Password`, `Recovery_Mail`, `user_approoved`, `profile_complete`, `User_Type_ID`, `Institute_ID`) VALUES
(1, 'Lejin', 'Joseph', 'lejin', 'lejin', 'll', 0, 0, 3, 1),
(2, 'admin', 'admin', 'admin', 'admin', '', 1, 0, 1, 1),
(3, 'q', 'q', 'amjatha', '2582213', 'q', 1, 0, 3, 1),
(4, 'w', 'w', 'amjatha', '2582213', 'w@w.com', 0, 0, 3, 1),
(5, 'staff', 'staff', 'staff', 'staff', 'w@w.com', 1, 1, 2, 1),
(6, 'student', 'student', 'student', 'student', '', 1, 1, 3, 1),
(7, 'justin', 'justin', 'justin', 'justin', 'justin@grll.com', 1, 1, 3, 1),
(8, 'a', 'a', 'a', 'a', 'a@grll.com', 1, 0, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_course`
--

DROP TABLE IF EXISTS `tbl_user_course`;
CREATE TABLE IF NOT EXISTS `tbl_user_course` (
  `User_Course_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Course_ID` int(45) NOT NULL,
  `User_ID` int(45) NOT NULL,
  PRIMARY KEY (`User_Course_ID`),
  KEY `Course_ID` (`Course_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_course`
--

INSERT INTO `tbl_user_course` (`User_Course_ID`, `Course_ID`, `User_ID`) VALUES
(9, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_institute`
--

DROP TABLE IF EXISTS `tbl_user_institute`;
CREATE TABLE IF NOT EXISTS `tbl_user_institute` (
  `User_Institute_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(45) NOT NULL,
  `Institute_ID` int(45) NOT NULL,
  PRIMARY KEY (`User_Institute_ID`),
  KEY `User_ID` (`User_ID`),
  KEY `Institute_ID` (`Institute_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_institute`
--

INSERT INTO `tbl_user_institute` (`User_Institute_ID`, `User_ID`, `Institute_ID`) VALUES
(1, 4, 1),
(2, 7, 1),
(3, 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_program`
--

DROP TABLE IF EXISTS `tbl_user_program`;
CREATE TABLE IF NOT EXISTS `tbl_user_program` (
  `user_program_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  PRIMARY KEY (`user_program_id`),
  KEY `FK_tbl_user_program_tbl_user` (`user_id`),
  KEY `FK_tbl_user_program_tbl_programs` (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_program`
--

INSERT INTO `tbl_user_program` (`user_program_id`, `user_id`, `program_id`) VALUES
(1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_task`
--

DROP TABLE IF EXISTS `tbl_user_task`;
CREATE TABLE IF NOT EXISTS `tbl_user_task` (
  `user_Task_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Due_Date` varchar(250) NOT NULL,
  `Assignee` varchar(250) NOT NULL,
  `User_ID` int(45) NOT NULL,
  `Task_ID` int(45) NOT NULL,
  PRIMARY KEY (`user_Task_ID`),
  KEY `User_ID` (`User_ID`),
  KEY `Task_ID` (`Task_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

DROP TABLE IF EXISTS `tbl_user_type`;
CREATE TABLE IF NOT EXISTS `tbl_user_type` (
  `user_Type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type_Code` varchar(250) NOT NULL,
  `User_Type` varchar(250) NOT NULL,
  PRIMARY KEY (`user_Type_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_Type_ID`, `Type_Code`, `User_Type`) VALUES
(1, 'admin', 'admin'),
(2, 'staff', 'staff'),
(3, 'student', 'student');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
  ADD CONSTRAINT `FK_tbl_assignment_tbl_course` FOREIGN KEY (`Course_ID`) REFERENCES `tbl_course` (`Course_ID`),
  ADD CONSTRAINT `FK_tbl_assignment_tbl_user` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_course_assignment`
--
ALTER TABLE `tbl_course_assignment`
  ADD CONSTRAINT `tbl_course_assignment_ibfk_1` FOREIGN KEY (`User_Course_ID`) REFERENCES `tbl_user_course` (`User_Course_ID`),
  ADD CONSTRAINT `tbl_course_assignment_ibfk_2` FOREIGN KEY (`Assignment_ID`) REFERENCES `tbl_assignment` (`Assignment_ID`);

--
-- Constraints for table `tbl_course_program`
--
ALTER TABLE `tbl_course_program`
  ADD CONSTRAINT `tbl_course_program_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `tbl_course` (`Course_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_course_program_ibfk_2` FOREIGN KEY (`Program_ID`) REFERENCES `tbl_programs` (`Program_ID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  ADD CONSTRAINT `tbl_programs_ibfk_1` FOREIGN KEY (`Institute_ID`) REFERENCES `tbl_institute` (`Institute_ID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD CONSTRAINT `tbl_semester_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `tbl_course` (`Course_ID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_semester_course`
--
ALTER TABLE `tbl_semester_course`
  ADD CONSTRAINT `tbl_semester_course_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `tbl_course` (`Course_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_semester_course_ibfk_2` FOREIGN KEY (`Semester_ID`) REFERENCES `tbl_semester` (`Semester_ID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_student_assignment`
--
ALTER TABLE `tbl_student_assignment`
  ADD CONSTRAINT `FK_tbl_student_assignment_tbl_assignment` FOREIGN KEY (`assignment_id`) REFERENCES `tbl_assignment` (`Assignment_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_student_assignment_tbl_user` FOREIGN KEY (`student_id`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_student_task`
--
ALTER TABLE `tbl_student_task`
  ADD CONSTRAINT `FK_tbl_student_task_tbl_task` FOREIGN KEY (`task_id`) REFERENCES `tbl_task` (`Task_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_tbl_student_task_tbl_user` FOREIGN KEY (`student_id`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD CONSTRAINT `FK_tbl_task_tbl_course` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`Course_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_tbl_task_tbl_user` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`User_Type_ID`) REFERENCES `tbl_user_type` (`user_Type_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_user_ibfk_2` FOREIGN KEY (`Institute_ID`) REFERENCES `tbl_institute` (`Institute_ID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_user_course`
--
ALTER TABLE `tbl_user_course`
  ADD CONSTRAINT `tbl_user_course_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `tbl_course` (`Course_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_user_course_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_user_institute`
--
ALTER TABLE `tbl_user_institute`
  ADD CONSTRAINT `tbl_user_institute_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `tbl_user` (`User_ID`),
  ADD CONSTRAINT `tbl_user_institute_ibfk_2` FOREIGN KEY (`Institute_ID`) REFERENCES `tbl_institute` (`Institute_ID`);

--
-- Constraints for table `tbl_user_program`
--
ALTER TABLE `tbl_user_program`
  ADD CONSTRAINT `FK_tbl_user_program_tbl_programs` FOREIGN KEY (`program_id`) REFERENCES `tbl_programs` (`Program_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_tbl_user_program_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_user_task`
--
ALTER TABLE `tbl_user_task`
  ADD CONSTRAINT `tbl_user_task_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_user_task_ibfk_2` FOREIGN KEY (`Task_ID`) REFERENCES `tbl_task` (`Task_ID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
