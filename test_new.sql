-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for test
DROP DATABASE IF EXISTS `test`;
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test`;


-- Dumping structure for table test.tbl_assignment
DROP TABLE IF EXISTS `tbl_assignment`;
CREATE TABLE IF NOT EXISTS `tbl_assignment` (
  `Assignment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL DEFAULT '0',
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Assignment_Name` varchar(250) NOT NULL,
  `assignment_description` varchar(250) NOT NULL,
  `Weightage` float NOT NULL,
  `preffereed_Hours` float NOT NULL,
  `Course_ID` int(11) NOT NULL,
  PRIMARY KEY (`Assignment_ID`),
  KEY `FK_tbl_assignment_tbl_course` (`Course_ID`),
  KEY `FK_tbl_assignment_tbl_user` (`author_id`),
  CONSTRAINT `FK_tbl_assignment_tbl_course` FOREIGN KEY (`Course_ID`) REFERENCES `tbl_course` (`Course_ID`),
  CONSTRAINT `FK_tbl_assignment_tbl_user` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_assignment: ~2 rows (approximately)
DELETE FROM `tbl_assignment`;
/*!40000 ALTER TABLE `tbl_assignment` DISABLE KEYS */;
INSERT INTO `tbl_assignment` (`Assignment_ID`, `author_id`, `Start_Date`, `End_Date`, `Assignment_Name`, `assignment_description`, `Weightage`, `preffereed_Hours`, `Course_ID`) VALUES
	(1, 5, '2016-05-29', '2016-06-01', 'new assignment', 'new assignment desc', 4.2, 50, 1),
	(2, 5, '2016-05-29', '2016-06-11', 'new assignment 2', 'new assignment 2 desc', 10, 49, 1),
	(3, 5, '2016-05-30', '2016-07-05', 'new assignment 3', 'sdad', 6, 30, 1),
	(4, 5, '2016-05-31', '2016-06-14', 'new assignment 4', 'sdadsfdsf', 30, 60, 1),
	(5, 5, '2016-05-29', '2016-06-14', 'new assignment 5', 'sdadsfdsfdfgdg', 30, 25, 1);
/*!40000 ALTER TABLE `tbl_assignment` ENABLE KEYS */;


-- Dumping structure for table test.tbl_course
DROP TABLE IF EXISTS `tbl_course`;
CREATE TABLE IF NOT EXISTS `tbl_course` (
  `Course_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Course_Name` varchar(250) NOT NULL,
  `Course_Dsecription` varchar(250) NOT NULL,
  `Percentage_Of_Fulltime` varchar(250) NOT NULL,
  PRIMARY KEY (`Course_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_course: ~2 rows (approximately)
DELETE FROM `tbl_course`;
/*!40000 ALTER TABLE `tbl_course` DISABLE KEYS */;
INSERT INTO `tbl_course` (`Course_ID`, `Course_Name`, `Course_Dsecription`, `Percentage_Of_Fulltime`) VALUES
	(1, 'Engineering', 'civil', '100'),
	(2, 'sss', 'sss', 'sss');
/*!40000 ALTER TABLE `tbl_course` ENABLE KEYS */;


-- Dumping structure for table test.tbl_course_assignment
DROP TABLE IF EXISTS `tbl_course_assignment`;
CREATE TABLE IF NOT EXISTS `tbl_course_assignment` (
  `Course_Assignment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Course_ID` int(45) NOT NULL,
  `Assignment_ID` int(45) NOT NULL,
  `Actual_hours` varchar(250) NOT NULL,
  PRIMARY KEY (`Course_Assignment_ID`),
  KEY `User_Course_ID` (`User_Course_ID`),
  KEY `Assignment_ID` (`Assignment_ID`),
  CONSTRAINT `tbl_course_assignment_ibfk_1` FOREIGN KEY (`User_Course_ID`) REFERENCES `tbl_user_course` (`User_Course_ID`),
  CONSTRAINT `tbl_course_assignment_ibfk_2` FOREIGN KEY (`Assignment_ID`) REFERENCES `tbl_assignment` (`Assignment_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_course_assignment: ~0 rows (approximately)
DELETE FROM `tbl_course_assignment`;
/*!40000 ALTER TABLE `tbl_course_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_course_assignment` ENABLE KEYS */;


-- Dumping structure for table test.tbl_course_program
DROP TABLE IF EXISTS `tbl_course_program`;
CREATE TABLE IF NOT EXISTS `tbl_course_program` (
  `Course_Program_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Course_ID` int(45) NOT NULL,
  `Program_ID` int(45) NOT NULL,
  PRIMARY KEY (`Course_Program_ID`),
  KEY `Course_ID` (`Course_ID`),
  KEY `Program_ID` (`Program_ID`),
  CONSTRAINT `tbl_course_program_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `tbl_course` (`Course_ID`) ON DELETE CASCADE,
  CONSTRAINT `tbl_course_program_ibfk_2` FOREIGN KEY (`Program_ID`) REFERENCES `tbl_programs` (`Program_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_course_program: ~2 rows (approximately)
DELETE FROM `tbl_course_program`;
/*!40000 ALTER TABLE `tbl_course_program` DISABLE KEYS */;
INSERT INTO `tbl_course_program` (`Course_Program_ID`, `Course_ID`, `Program_ID`) VALUES
	(2, 2, 1),
	(10, 1, 1);
/*!40000 ALTER TABLE `tbl_course_program` ENABLE KEYS */;


-- Dumping structure for table test.tbl_institute
DROP TABLE IF EXISTS `tbl_institute`;
CREATE TABLE IF NOT EXISTS `tbl_institute` (
  `Institute_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Institute_Name` varchar(250) NOT NULL,
  `Institute_Address` varchar(250) NOT NULL,
  `Institute_Phone` varchar(250) NOT NULL,
  `Institute_Email` varchar(250) NOT NULL,
  PRIMARY KEY (`Institute_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_institute: ~2 rows (approximately)
DELETE FROM `tbl_institute`;
/*!40000 ALTER TABLE `tbl_institute` DISABLE KEYS */;
INSERT INTO `tbl_institute` (`Institute_ID`, `Institute_Name`, `Institute_Address`, `Institute_Phone`, `Institute_Email`) VALUES
	(1, 'vjcet', 'vazhakulam', '1234', 'a@b.com'),
	(6, 'kkkk', 'wow', 'wow', 'wow@ddd.ccc');
/*!40000 ALTER TABLE `tbl_institute` ENABLE KEYS */;


-- Dumping structure for table test.tbl_programs
DROP TABLE IF EXISTS `tbl_programs`;
CREATE TABLE IF NOT EXISTS `tbl_programs` (
  `Program_ID` int(11) NOT NULL AUTO_INCREMENT,
  `program_Name` varchar(250) NOT NULL,
  `program_Description` varchar(250) NOT NULL,
  `Institute_ID` int(45) NOT NULL,
  PRIMARY KEY (`Program_ID`),
  KEY `Institute_ID` (`Institute_ID`),
  CONSTRAINT `tbl_programs_ibfk_1` FOREIGN KEY (`Institute_ID`) REFERENCES `tbl_institute` (`Institute_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_programs: ~2 rows (approximately)
DELETE FROM `tbl_programs`;
/*!40000 ALTER TABLE `tbl_programs` DISABLE KEYS */;
INSERT INTO `tbl_programs` (`Program_ID`, `program_Name`, `program_Description`, `Institute_ID`) VALUES
	(1, 'btech', 'wow', 1),
	(2, 'koo', 'koo', 6);
/*!40000 ALTER TABLE `tbl_programs` ENABLE KEYS */;


-- Dumping structure for table test.tbl_semester
DROP TABLE IF EXISTS `tbl_semester`;
CREATE TABLE IF NOT EXISTS `tbl_semester` (
  `Semester_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `No_Of_Weeks` varchar(250) NOT NULL,
  `Course_ID` int(45) NOT NULL,
  PRIMARY KEY (`Semester_ID`),
  KEY `Program_ID` (`Course_ID`),
  CONSTRAINT `tbl_semester_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `tbl_course` (`Course_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_semester: ~0 rows (approximately)
DELETE FROM `tbl_semester`;
/*!40000 ALTER TABLE `tbl_semester` DISABLE KEYS */;
INSERT INTO `tbl_semester` (`Semester_ID`, `Start_Date`, `End_Date`, `No_Of_Weeks`, `Course_ID`) VALUES
	(4, '2016-05-22', '2016-05-22', '32', 1);
/*!40000 ALTER TABLE `tbl_semester` ENABLE KEYS */;


-- Dumping structure for table test.tbl_semester_course
DROP TABLE IF EXISTS `tbl_semester_course`;
CREATE TABLE IF NOT EXISTS `tbl_semester_course` (
  `Semester_Course_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Course_ID` int(45) NOT NULL,
  `Semester_ID` int(45) NOT NULL,
  PRIMARY KEY (`Semester_Course_ID`),
  KEY `Course_ID` (`Course_ID`),
  KEY `Semester_ID` (`Semester_ID`),
  CONSTRAINT `tbl_semester_course_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `tbl_course` (`Course_ID`) ON DELETE CASCADE,
  CONSTRAINT `tbl_semester_course_ibfk_2` FOREIGN KEY (`Semester_ID`) REFERENCES `tbl_semester` (`Semester_ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_semester_course: ~0 rows (approximately)
DELETE FROM `tbl_semester_course`;
/*!40000 ALTER TABLE `tbl_semester_course` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_semester_course` ENABLE KEYS */;


-- Dumping structure for table test.tbl_student_assignment
DROP TABLE IF EXISTS `tbl_student_assignment`;
CREATE TABLE IF NOT EXISTS `tbl_student_assignment` (
  `id_student_assignment` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL DEFAULT '0',
  `assignment_id` int(11) NOT NULL DEFAULT '0',
  `completed_hours` float NOT NULL DEFAULT '0',
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_student_assignment`),
  KEY `FK_tbl_student_assignment_tbl_user` (`student_id`),
  KEY `FK_tbl_student_assignment_tbl_assignment` (`assignment_id`),
  CONSTRAINT `FK_tbl_student_assignment_tbl_assignment` FOREIGN KEY (`assignment_id`) REFERENCES `tbl_assignment` (`Assignment_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_student_assignment_tbl_user` FOREIGN KEY (`student_id`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_student_assignment: ~2 rows (approximately)
DELETE FROM `tbl_student_assignment`;
/*!40000 ALTER TABLE `tbl_student_assignment` DISABLE KEYS */;
INSERT INTO `tbl_student_assignment` (`id_student_assignment`, `student_id`, `assignment_id`, `completed_hours`, `modified_date`) VALUES
	(11, 6, 2, 30.5, '2016-05-29 21:45:28'),
	(12, 6, 1, 20, '2016-05-30 00:41:54'),
	(13, 6, 3, 15, '2016-05-30 00:52:44'),
	(14, 6, 4, 20, '2016-05-30 00:52:50'),
	(15, 6, 5, 10, '2016-05-30 00:52:54');
/*!40000 ALTER TABLE `tbl_student_assignment` ENABLE KEYS */;


-- Dumping structure for table test.tbl_student_task
DROP TABLE IF EXISTS `tbl_student_task`;
CREATE TABLE IF NOT EXISTS `tbl_student_task` (
  `id_student_task` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT '0',
  `task_id` int(11) DEFAULT '0',
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `completed_hours` float DEFAULT NULL,
  PRIMARY KEY (`id_student_task`),
  KEY `FK_tbl_student_task_tbl_task` (`task_id`),
  KEY `FK_tbl_student_task_tbl_user` (`student_id`),
  CONSTRAINT `FK_tbl_student_task_tbl_task` FOREIGN KEY (`task_id`) REFERENCES `tbl_task` (`Task_ID`) ON DELETE CASCADE,
  CONSTRAINT `FK_tbl_student_task_tbl_user` FOREIGN KEY (`student_id`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_student_task: ~2 rows (approximately)
DELETE FROM `tbl_student_task`;
/*!40000 ALTER TABLE `tbl_student_task` DISABLE KEYS */;
INSERT INTO `tbl_student_task` (`id_student_task`, `student_id`, `task_id`, `last_update`, `completed_hours`) VALUES
	(4, 6, 2, '2016-05-29 02:06:46', 3),
	(6, 6, 1, '2016-05-29 20:11:56', 5.5);
/*!40000 ALTER TABLE `tbl_student_task` ENABLE KEYS */;


-- Dumping structure for table test.tbl_task
DROP TABLE IF EXISTS `tbl_task`;
CREATE TABLE IF NOT EXISTS `tbl_task` (
  `Task_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Task_Name` varchar(250) NOT NULL,
  `author_id` int(11) NOT NULL,
  `weightage` float NOT NULL,
  `course_id` int(11) NOT NULL,
  `preferred_hour` float NOT NULL,
  `Task_Description` varchar(250) NOT NULL,
  `Task_due_date` date DEFAULT NULL,
  `Task_start_date` date DEFAULT NULL,
  PRIMARY KEY (`Task_ID`),
  KEY `FK_tbl_task_tbl_user` (`author_id`),
  KEY `FK_tbl_task_tbl_course` (`course_id`),
  CONSTRAINT `FK_tbl_task_tbl_course` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`Course_ID`) ON DELETE CASCADE,
  CONSTRAINT `FK_tbl_task_tbl_user` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_task: ~2 rows (approximately)
DELETE FROM `tbl_task`;
/*!40000 ALTER TABLE `tbl_task` DISABLE KEYS */;
INSERT INTO `tbl_task` (`Task_ID`, `Task_Name`, `author_id`, `weightage`, `course_id`, `preferred_hour`, `Task_Description`, `Task_due_date`, `Task_start_date`) VALUES
	(1, 'new task', 5, 0, 1, 30, 'new test task', '2016-06-04', '2016-05-29'),
	(2, 'second task', 5, 0, 2, 50, 'second test task', '2016-06-08', '2016-05-29');
/*!40000 ALTER TABLE `tbl_task` ENABLE KEYS */;


-- Dumping structure for table test.tbl_user
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
  KEY `Institute_ID` (`Institute_ID`),
  CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`User_Type_ID`) REFERENCES `tbl_user_type` (`user_Type_ID`) ON DELETE CASCADE,
  CONSTRAINT `tbl_user_ibfk_2` FOREIGN KEY (`Institute_ID`) REFERENCES `tbl_institute` (`Institute_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_user: ~8 rows (approximately)
DELETE FROM `tbl_user`;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`User_ID`, `F_Name`, `L_Name`, `User_Name`, `Password`, `Recovery_Mail`, `user_approoved`, `profile_complete`, `User_Type_ID`, `Institute_ID`) VALUES
	(1, 'Lejin', 'Joseph', 'lejin', 'lejin', 'll', 0, 0, 3, 1),
	(2, 'admin', 'admin', 'admin', 'admin', '', 1, 0, 1, 1),
	(3, 'q', 'q', 'amjatha', '2582213', 'q', 1, 0, 3, 1),
	(4, 'w', 'w', 'amjatha', '2582213', 'w@w.com', 0, 0, 3, 1),
	(5, 'staff', 'staff', 'staff', 'staff', 'w@w.com', 1, 1, 2, 1),
	(6, 'student', 'student', 'student', 'student', '', 1, 1, 3, 1),
	(7, 'justin', 'justin', 'justin', 'justin', 'justin@grll.com', 1, 1, 3, 1),
	(8, 'a', 'a', 'a', 'a', 'a@grll.com', 1, 0, 3, 6);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;


-- Dumping structure for table test.tbl_user_course
DROP TABLE IF EXISTS `tbl_user_course`;
CREATE TABLE IF NOT EXISTS `tbl_user_course` (
  `User_Course_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Course_ID` int(45) NOT NULL,
  `User_ID` int(45) NOT NULL,
  PRIMARY KEY (`User_Course_ID`),
  KEY `Course_ID` (`Course_ID`),
  KEY `User_ID` (`User_ID`),
  CONSTRAINT `tbl_user_course_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `tbl_course` (`Course_ID`) ON DELETE CASCADE,
  CONSTRAINT `tbl_user_course_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_user_course: ~4 rows (approximately)
DELETE FROM `tbl_user_course`;
/*!40000 ALTER TABLE `tbl_user_course` DISABLE KEYS */;
INSERT INTO `tbl_user_course` (`User_Course_ID`, `Course_ID`, `User_ID`) VALUES
	(9, 1, 5),
	(33, 1, 6),
	(36, 2, 8),
	(37, 2, 6);
/*!40000 ALTER TABLE `tbl_user_course` ENABLE KEYS */;


-- Dumping structure for table test.tbl_user_institute
DROP TABLE IF EXISTS `tbl_user_institute`;
CREATE TABLE IF NOT EXISTS `tbl_user_institute` (
  `User_Institute_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(45) NOT NULL,
  `Institute_ID` int(45) NOT NULL,
  PRIMARY KEY (`User_Institute_ID`),
  KEY `User_ID` (`User_ID`),
  KEY `Institute_ID` (`Institute_ID`),
  CONSTRAINT `tbl_user_institute_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `tbl_user` (`User_ID`),
  CONSTRAINT `tbl_user_institute_ibfk_2` FOREIGN KEY (`Institute_ID`) REFERENCES `tbl_institute` (`Institute_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_user_institute: ~3 rows (approximately)
DELETE FROM `tbl_user_institute`;
/*!40000 ALTER TABLE `tbl_user_institute` DISABLE KEYS */;
INSERT INTO `tbl_user_institute` (`User_Institute_ID`, `User_ID`, `Institute_ID`) VALUES
	(1, 4, 1),
	(2, 7, 1),
	(3, 8, 6);
/*!40000 ALTER TABLE `tbl_user_institute` ENABLE KEYS */;


-- Dumping structure for table test.tbl_user_program
DROP TABLE IF EXISTS `tbl_user_program`;
CREATE TABLE IF NOT EXISTS `tbl_user_program` (
  `user_program_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  PRIMARY KEY (`user_program_id`),
  KEY `FK_tbl_user_program_tbl_user` (`user_id`),
  KEY `FK_tbl_user_program_tbl_programs` (`program_id`),
  CONSTRAINT `FK_tbl_user_program_tbl_programs` FOREIGN KEY (`program_id`) REFERENCES `tbl_programs` (`Program_ID`) ON DELETE CASCADE,
  CONSTRAINT `FK_tbl_user_program_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_user_program: ~0 rows (approximately)
DELETE FROM `tbl_user_program`;
/*!40000 ALTER TABLE `tbl_user_program` DISABLE KEYS */;
INSERT INTO `tbl_user_program` (`user_program_id`, `user_id`, `program_id`) VALUES
	(1, 6, 1);
/*!40000 ALTER TABLE `tbl_user_program` ENABLE KEYS */;


-- Dumping structure for table test.tbl_user_task
DROP TABLE IF EXISTS `tbl_user_task`;
CREATE TABLE IF NOT EXISTS `tbl_user_task` (
  `user_Task_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Due_Date` varchar(250) NOT NULL,
  `Assignee` varchar(250) NOT NULL,
  `User_ID` int(45) NOT NULL,
  `Task_ID` int(45) NOT NULL,
  PRIMARY KEY (`user_Task_ID`),
  KEY `User_ID` (`User_ID`),
  KEY `Task_ID` (`Task_ID`),
  CONSTRAINT `tbl_user_task_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE,
  CONSTRAINT `tbl_user_task_ibfk_2` FOREIGN KEY (`Task_ID`) REFERENCES `tbl_task` (`Task_ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_user_task: ~0 rows (approximately)
DELETE FROM `tbl_user_task`;
/*!40000 ALTER TABLE `tbl_user_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user_task` ENABLE KEYS */;


-- Dumping structure for table test.tbl_user_type
DROP TABLE IF EXISTS `tbl_user_type`;
CREATE TABLE IF NOT EXISTS `tbl_user_type` (
  `user_Type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type_Code` varchar(250) NOT NULL,
  `User_Type` varchar(250) NOT NULL,
  PRIMARY KEY (`user_Type_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table test.tbl_user_type: ~3 rows (approximately)
DELETE FROM `tbl_user_type`;
/*!40000 ALTER TABLE `tbl_user_type` DISABLE KEYS */;
INSERT INTO `tbl_user_type` (`user_Type_ID`, `Type_Code`, `User_Type`) VALUES
	(1, 'admin', 'admin'),
	(2, 'staff', 'staff'),
	(3, 'student', 'student');
/*!40000 ALTER TABLE `tbl_user_type` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
