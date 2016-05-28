-- phpMyAdmin SQL Dump oola loop koop
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2016 at 10:54 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

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

CREATE TABLE `tbl_assignment` (
  `Assignment_ID` int(11) NOT NULL,
  `Start_Date` varchar(250) NOT NULL,
  `End_Date` varchar(250) NOT NULL,
  `Assignment_Name` varchar(250) NOT NULL,
  `Weightage` varchar(250) NOT NULL,
  `preffereed_Hours` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `Course_ID` int(11) NOT NULL,
  `Course_Name` varchar(250) NOT NULL,
  `Course_Dsecription` varchar(250) NOT NULL,
  `Percentage_Of_Fulltime` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_course_assignment` (
  `Course_Assignment_ID` int(11) NOT NULL,
  `User_Course_ID` int(45) NOT NULL,
  `Assignment_ID` int(45) NOT NULL,
  `Actual_hours` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_program`
--

CREATE TABLE `tbl_course_program` (
  `Course_Program_ID` int(11) NOT NULL,
  `Course_ID` int(45) NOT NULL,
  `Program_ID` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course_program`
--

INSERT INTO `tbl_course_program` (`Course_Program_ID`, `Course_ID`, `Program_ID`) VALUES
(2, 2, 1),
(10, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_institute`
--

CREATE TABLE `tbl_institute` (
  `Institute_ID` int(11) NOT NULL,
  `Institute_Name` varchar(250) NOT NULL,
  `Institute_Address` varchar(250) NOT NULL,
  `Institute_Phone` varchar(250) NOT NULL,
  `Institute_Email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_programs` (
  `Program_ID` int(11) NOT NULL,
  `program_Name` varchar(250) NOT NULL,
  `program_Description` varchar(250) NOT NULL,
  `Institute_ID` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_semester` (
  `Semester_ID` int(11) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `No_Of_Weeks` varchar(250) NOT NULL,
  `Course_ID` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`Semester_ID`, `Start_Date`, `End_Date`, `No_Of_Weeks`, `Course_ID`) VALUES
(4, '2016-05-22', '2016-05-22', '32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester_course`
--

CREATE TABLE `tbl_semester_course` (
  `Semester_Course_ID` int(11) NOT NULL,
  `Course_ID` int(45) NOT NULL,
  `Semester_ID` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `Task_ID` int(11) NOT NULL,
  `Task_Name` varchar(250) NOT NULL,
  `Task_Description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `User_ID` int(11) NOT NULL,
  `F_Name` varchar(250) NOT NULL,
  `L_Name` varchar(250) NOT NULL,
  `User_Name` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Recovery_Mail` varchar(250) NOT NULL,
  `user_approoved` int(11) NOT NULL DEFAULT '0',
  `profile_complete` int(11) NOT NULL DEFAULT '0',
  `User_Type_ID` int(45) NOT NULL,
  `Institute_ID` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`User_ID`, `F_Name`, `L_Name`, `User_Name`, `Password`, `Recovery_Mail`, `user_approoved`, `profile_complete`, `User_Type_ID`, `Institute_ID`) VALUES
(1, 'Lejin', 'Joseph', 'lejin', 'lejin', 'll', 0, 0, 3, 1),
(2, 'admin', 'admin', 'admin', 'admin', '', 1, 0, 1, 1),
(3, 'q', 'q', 'amjatha', '2582213', 'q', 1, 0, 3, 1),
(4, 'w', 'w', 'amjatha', '2582213', 'w@w.com', 0, 0, 3, 1),
(5, 'staff', 'staff', 'staff', 'staff', 'w@w.com', 1, 1, 2, 1),
(6, 'student', 'student', 'student', 'student', '', 0, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_course`
--

CREATE TABLE `tbl_user_course` (
  `User_Course_ID` int(11) NOT NULL,
  `Course_ID` int(45) NOT NULL,
  `User_ID` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_course`
--

INSERT INTO `tbl_user_course` (`User_Course_ID`, `Course_ID`, `User_ID`) VALUES
(9, 1, 5),
(10, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_institute`
--

CREATE TABLE `tbl_user_institute` (
  `User_Institute_ID` int(11) NOT NULL,
  `User_ID` int(45) NOT NULL,
  `Institute_ID` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_institute`
--

INSERT INTO `tbl_user_institute` (`User_Institute_ID`, `User_ID`, `Institute_ID`) VALUES
(1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_task`
--

CREATE TABLE `tbl_user_task` (
  `user_Task_ID` int(11) NOT NULL,
  `Due_Date` varchar(250) NOT NULL,
  `Assignee` varchar(250) NOT NULL,
  `User_ID` int(45) NOT NULL,
  `Task_ID` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `user_Type_ID` int(11) NOT NULL,
  `Type_Code` varchar(250) NOT NULL,
  `User_Type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_Type_ID`, `Type_Code`, `User_Type`) VALUES
(1, 'admin', 'admin'),
(2, 'staff', 'staff'),
(3, 'student', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
  ADD PRIMARY KEY (`Assignment_ID`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `tbl_course_assignment`
--
ALTER TABLE `tbl_course_assignment`
  ADD PRIMARY KEY (`Course_Assignment_ID`),
  ADD KEY `User_Course_ID` (`User_Course_ID`),
  ADD KEY `Assignment_ID` (`Assignment_ID`);

--
-- Indexes for table `tbl_course_program`
--
ALTER TABLE `tbl_course_program`
  ADD PRIMARY KEY (`Course_Program_ID`),
  ADD KEY `Course_ID` (`Course_ID`),
  ADD KEY `Program_ID` (`Program_ID`);

--
-- Indexes for table `tbl_institute`
--
ALTER TABLE `tbl_institute`
  ADD PRIMARY KEY (`Institute_ID`);

--
-- Indexes for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  ADD PRIMARY KEY (`Program_ID`),
  ADD KEY `Institute_ID` (`Institute_ID`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`Semester_ID`),
  ADD KEY `Program_ID` (`Course_ID`);

--
-- Indexes for table `tbl_semester_course`
--
ALTER TABLE `tbl_semester_course`
  ADD PRIMARY KEY (`Semester_Course_ID`),
  ADD KEY `Course_ID` (`Course_ID`),
  ADD KEY `Semester_ID` (`Semester_ID`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`Task_ID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `User_Type_ID` (`User_Type_ID`),
  ADD KEY `Institute_ID` (`Institute_ID`);

--
-- Indexes for table `tbl_user_course`
--
ALTER TABLE `tbl_user_course`
  ADD PRIMARY KEY (`User_Course_ID`),
  ADD KEY `Course_ID` (`Course_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `tbl_user_institute`
--
ALTER TABLE `tbl_user_institute`
  ADD PRIMARY KEY (`User_Institute_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Institute_ID` (`Institute_ID`);

--
-- Indexes for table `tbl_user_task`
--
ALTER TABLE `tbl_user_task`
  ADD PRIMARY KEY (`user_Task_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Task_ID` (`Task_ID`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_Type_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
  MODIFY `Assignment_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `Course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_course_assignment`
--
ALTER TABLE `tbl_course_assignment`
  MODIFY `Course_Assignment_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_course_program`
--
ALTER TABLE `tbl_course_program`
  MODIFY `Course_Program_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_institute`
--
ALTER TABLE `tbl_institute`
  MODIFY `Institute_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  MODIFY `Program_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `Semester_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_semester_course`
--
ALTER TABLE `tbl_semester_course`
  MODIFY `Semester_Course_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `Task_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user_course`
--
ALTER TABLE `tbl_user_course`
  MODIFY `User_Course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_user_institute`
--
ALTER TABLE `tbl_user_institute`
  MODIFY `User_Institute_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user_task`
--
ALTER TABLE `tbl_user_task`
  MODIFY `user_Task_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_Type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

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
-- Constraints for table `tbl_user_task`
--
ALTER TABLE `tbl_user_task`
  ADD CONSTRAINT `tbl_user_task_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `tbl_user` (`User_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_user_task_ibfk_2` FOREIGN KEY (`Task_ID`) REFERENCES `tbl_task` (`Task_ID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Constraints for table `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
	ADD COLUMN `Course_ID` INT NOT NULL AFTER `preffereed_Hours`;

ALTER TABLE `tbl_assignment`
	ADD CONSTRAINT `FK_tbl_assignment_tbl_course` FOREIGN KEY (`Course_ID`) REFERENCES `tbl_course` (`Course_ID`);