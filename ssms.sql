-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2024 at 09:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin1002@gmail.com', 'root12'),
(2, 'Admin', 'xyz@gmail.com', 'PjwnJTF6'),
(9, 'Admin1001', 'admin1001@gmail.com', 'AWlxauaL');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `startno` int(11) NOT NULL,
  `endno` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` int(11) GENERATED ALWAYS AS (`endno` - `startno` + 1) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `class_id`, `room_id`, `startno`, `endno`, `date`) VALUES
(40, 7, 18, 1, 7, '2021-06-08'),
(41, 8, 18, 1, 3, '2021-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `year` varchar(20) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `division` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `year`, `dept`, `division`) VALUES
(33, 'FE', 'Computer', 'A'),
(34, 'FE', 'IT', 'A'),
(7, 'SE', 'Computer', 'A'),
(8, 'SE', 'ETRX', 'A'),
(32, 'TE', 'Computer', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `rid` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`rid`, `room_no`, `floor`, `capacity`) VALUES
(9, 1, 3, 5),
(10, 2, 3, 5),
(18, 3, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `se_batch`
--

CREATE TABLE `se_batch` (
  `batch_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(11) NOT NULL,
  `division` varchar(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `exam_id` varchar(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `start_no` varchar(11) NOT NULL,
  `end_no` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL DEFAULT current_timestamp(),
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `se_batch`
--

INSERT INTO `se_batch` (`batch_id`, `class_id`, `class_name`, `division`, `room_id`, `exam_id`, `sub_id`, `start_no`, `end_no`, `date`, `total`) VALUES
(24, 10, '11', 'A', 5, 'TERM-I', 3, '11101', '11110', '2024-07-09 ', 10),
(25, 7, '9', 'A', 5, 'TERM-I', 5, '9101', '9110', '2024-07-09 ', 10),
(26, 10, '11', 'A', 5, 'TERM-I', 3, '11111', '11120', '2024-07-09 ', 10),
(27, 10, '11', 'A', 6, 'TERM-I', 5, '11121', '11130', '2024-07-09 ', 10),
(28, 8, '9', 'B', 6, 'TERM-I', 5, '9111', '9120', '2024-07-09 ', 10),
(29, 10, '11', 'A', 6, 'TERM-I', 5, '11131', '11140', '2024-07-09 ', 10),
(30, 10, '11', 'A', 7, 'TERM-I', 3, '11141', '11150', '2024-07-09 ', 10),
(31, 7, '9', 'A', 7, 'TERM-I', 5, '9131', '9140', '2024-07-09 ', 10),
(32, 10, '11', 'A', 7, 'TERM-I', 5, '11151', '11160', '2024-07-09 ', 10),
(33, 10, '11', 'A', 8, 'TERM-I', 3, '11161', '11170', '2024-07-09 ', 10),
(35, 7, '9', 'A', 8, 'TERM-I', 5, '9141', '9150', '2024-07-09 ', 10),
(36, 10, '11', 'A', 8, 'TERM-I', 5, '11171', '11180', '2024-07-09 ', 10),
(37, 10, '11', 'A', 10, 'TERM-I', 3, '11181', '11190', '2024-07-09 ', 10),
(38, 7, '9', 'A', 10, 'TERM-I', 5, '9151', '9160', '2024-07-09 ', 10),
(39, 10, '11', 'A', 10, 'TERM-I', 5, '11191', '11200', '2024-07-09 ', 10),
(41, 8, '9', 'B', 1, 'TERM-I', 5, '9161', '9170', '2024-07-09 ', 10),
(42, 10, '11', 'A', 1, 'TERM-I', 3, '11201', '11208', '2024-07-09 ', 8),
(43, 7, '9', 'A', 1, 'TERM-I', 5, '9171', '9180', '2024-07-09 ', 10),
(44, 5, '7', 'A', 1, 'TERM-I', 5, '7101', '7102', '2024-07-09 ', 2),
(45, 7, '9', 'A', 2, 'TERM-I', 5, '9181', '9190', '2024-07-09 ', 10),
(47, 5, '7', 'A', 2, 'TERM-I', 5, '7103', '7112', '2024-07-09 ', 10),
(48, 7, '9', 'A', 2, 'TERM-I', 5, '9191', '9200', '2024-07-09 ', 10),
(50, 5, '7', 'A', 3, 'TERM-I', 5, '7113', '7122', '2024-07-09 ', 10),
(51, 7, '9', 'A', 3, 'TERM-I', 5, '9201', '9208', '2024-07-09 ', 8),
(52, 5, '7', 'A', 3, 'TERM-I', 5, '7123', '7132', '2024-07-09 ', 10),
(53, 5, '7', 'A', 4, 'TERM-I', 5, '7133', '7143', '2024-07-09 ', 11);

-- --------------------------------------------------------

--
-- Table structure for table `se_class`
--

CREATE TABLE `se_class` (
  `class_id` int(5) NOT NULL,
  `class_name` varchar(10) NOT NULL,
  `division` varchar(25) NOT NULL,
  `class_teacher` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `se_class`
--

INSERT INTO `se_class` (`class_id`, `class_name`, `division`, `class_teacher`) VALUES
(3, '6', 'A', 'SELVAKUMAR'),
(4, '6', 'B', 'PUVI'),
(5, '7', 'A', 'SELVAKUMAR'),
(6, '12', 'A', 'NAGARAJ'),
(7, '9', 'A', 'SELVAKUMAR'),
(8, '9', 'B', 'PUVI'),
(9, '10', 'A', 'SELVAKUMAR'),
(10, '11', 'A', 'SELVAKUMAR');

-- --------------------------------------------------------

--
-- Table structure for table `se_exam`
--

CREATE TABLE `se_exam` (
  `ex_id` int(5) NOT NULL,
  `ex_name` varchar(25) NOT NULL,
  `ex_date` varchar(25) NOT NULL,
  `ex_stime` varchar(6) NOT NULL,
  `ex_etime` varchar(6) NOT NULL,
  `ex_session` varchar(5) NOT NULL,
  `ex_classid` int(5) NOT NULL,
  `ex_subid` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `se_exam`
--

INSERT INTO `se_exam` (`ex_id`, `ex_name`, `ex_date`, `ex_stime`, `ex_etime`, `ex_session`, `ex_classid`, `ex_subid`) VALUES
(2, 'TERM-I', '2024-07-08', '10:00', '12:00', 'FN', 6, 'ENGLISH'),
(3, 'TERM-I', '2024-07-08', '14:00', '18:00', 'AN', 7, 'ENGLISH'),
(4, 'TERM-I', '2024-07-09', '10:00', '12:00', 'FN', 7, 'MATHAMATICS'),
(5, 'TERM-I', '2024-07-10', '10:00', '12:00', 'FN', 10, 'ENGLISH');

-- --------------------------------------------------------

--
-- Table structure for table `se_room`
--

CREATE TABLE `se_room` (
  `room_id` int(5) NOT NULL,
  `room_no` int(5) NOT NULL,
  `capacity` int(5) NOT NULL,
  `model` int(5) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `se_room`
--

INSERT INTO `se_room` (`room_id`, `room_no`, `capacity`, `model`) VALUES
(1, 1, 30, 3),
(2, 2, 30, 3),
(3, 3, 30, 3),
(4, 4, 30, 3),
(5, 5, 30, 3),
(6, 6, 30, 3),
(7, 7, 30, 3),
(8, 8, 30, 3),
(9, 2, 30, 3),
(10, 9, 30, 3);

-- --------------------------------------------------------

--
-- Table structure for table `se_staff`
--

CREATE TABLE `se_staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(25) NOT NULL,
  `staff_gender` varchar(11) NOT NULL,
  `class_name` int(11) NOT NULL,
  `sub_name` varchar(25) NOT NULL,
  `current_rm` int(11) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Unassigned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `se_staff`
--

INSERT INTO `se_staff` (`staff_id`, `staff_name`, `staff_gender`, `class_name`, `sub_name`, `current_rm`, `status`) VALUES
(3, 'selvakumar', 'M', 6, 'SCEIENCE', 0, 'Unassigned'),
(4, 'puvi', 'M', 7, 'MATHAMATICS', 0, 'Unassigned'),
(5, 'Nagaraj', 'M', 12, 'SOCIAL', 0, 'Unassigned');

-- --------------------------------------------------------

--
-- Table structure for table `se_student`
--

CREATE TABLE `se_student` (
  `std_id` int(5) NOT NULL,
  `std_name` varchar(100) NOT NULL,
  `std_rollno` varchar(20) NOT NULL,
  `std_gender` varchar(10) NOT NULL,
  `std_class` int(5) NOT NULL,
  `division` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `se_student`
--

INSERT INTO `se_student` (`std_id`, `std_name`, `std_rollno`, `std_gender`, `std_class`, `division`) VALUES
(1, 'std1', '6101', 'F', 6, 'A'),
(2, 'std2', '6102', 'F', 6, 'A'),
(3, 'std3', '6103', 'F', 6, 'A'),
(4, 'std4', '6104', 'F', 6, 'A'),
(5, 'std5', '6105', 'F', 6, 'A'),
(6, 'std6', '6106', 'F', 6, 'A'),
(7, 'std7', '6107', 'F', 6, 'A'),
(8, 'std8', '6108', 'F', 6, 'A'),
(9, 'std9', '6109', 'F', 6, 'A'),
(10, 'std10', '6110', 'F', 6, 'A'),
(11, 'std11', '6111', 'M', 6, 'A'),
(12, 'std12', '6112', 'M', 6, 'A'),
(13, 'std13', '6113', 'M', 6, 'A'),
(14, 'std14', '6114', 'M', 6, 'A'),
(15, 'std15', '6115', 'M', 6, 'A'),
(16, 'std16', '6116', 'M', 6, 'A'),
(17, 'std17', '6117', 'M', 6, 'A'),
(18, 'std18', '6118', 'M', 6, 'A'),
(19, 'std19', '6119', 'M', 6, 'A'),
(20, 'std20', '6120', 'M', 6, 'A'),
(21, 'std21', '7101', 'F', 7, 'A'),
(22, 'std22', '7102', 'F', 7, 'A'),
(23, 'std23', '7103', 'F', 7, 'A'),
(24, 'std24', '7104', 'F', 7, 'A'),
(25, 'std25', '7105', 'F', 7, 'A'),
(26, 'std26', '7106', 'F', 7, 'A'),
(27, 'std27', '7107', 'F', 7, 'A'),
(28, 'std28', '7108', 'F', 7, 'A'),
(29, 'std29', '7109', 'F', 7, 'A'),
(30, 'std30', '7110', 'F', 7, 'A'),
(31, 'std31', '7111', 'M', 7, 'A'),
(32, 'std32', '7112', 'M', 7, 'A'),
(33, 'std33', '7113', 'M', 7, 'A'),
(34, 'std34', '7114', 'M', 7, 'A'),
(35, 'std35', '7115', 'M', 7, 'A'),
(36, 'std36', '7116', 'M', 7, 'A'),
(37, 'std37', '7117', 'M', 7, 'A'),
(38, 'std38', '7118', 'M', 7, 'A'),
(39, 'std39', '7119', 'M', 7, 'A'),
(40, 'std40', '7120', 'M', 7, 'A'),
(41, 'ganesh', '10101', 'M', 10, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `se_subject`
--

CREATE TABLE `se_subject` (
  `sub_id` int(10) NOT NULL,
  `sub_name` varchar(25) NOT NULL,
  `class_name` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `se_subject`
--

INSERT INTO `se_subject` (`sub_id`, `sub_name`, `class_name`) VALUES
(1, 'TAMIL', 6),
(2, 'ENGLISH', 6),
(3, 'MATHAMATICS', 6),
(4, 'SCEIENCE', 6),
(5, 'SOCIAL SCEIENCE', 6),
(6, 'TAMIL', 7),
(7, 'ENGLISH', 7),
(8, 'MATHAMATICS', 7),
(9, 'SCEIENCE', 7),
(10, 'SOCIAL SCEIENCE', 7);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `class` int(11) NOT NULL,
  `rollno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `password`, `name`, `email`, `class`, `rollno`) VALUES
(7, 'john44', 'John', 'john@gmail.com', 8, 11),
(8, 'h@rry', 'Harry', 'harry2@gmail.com', 8, 8),
(9, 'Jam#s', 'James', 'james@gmail.com', 8, 2),
(10, 'Paul45', 'Paul', 'paul@gmail.com', 8, 3),
(11, 'p@uli', 'Pauly', 'pauly@gmail.com', 8, 4),
(13, 'lisa12', 'Lisa', 'lisa@gmail.com', 8, 7),
(14, 'daniel98', 'Daniel', 'daniel@gmail.com', 8, 5),
(15, 'anthony', 'Anthony', 'anthony@gmail.com', 8, 6),
(16, 'mary', 'Mary', 'mary@gmail.com', 8, 9),
(17, 'laura12', 'Laura', 'laura@gmail.com', 8, 10),
(18, 'michelle', 'Michelle', 'michelle@gmail.com', 7, 1),
(19, 'robert', 'Robert', 'robert@gmail.com', 7, 2),
(20, 'ronald', 'Ronald', 'ronald@gmail.com', 7, 3),
(21, 'patrica', 'Patrica', 'patrica@gmail.com', 7, 4),
(22, 'nancy', 'Nancy', 'Nancy@gmail.com', 7, 5),
(23, 'christopher', 'Christopher', 'christopher@gmail.com', 7, 6),
(32, 'clark', 'Clark', 'clark@gmail.com', 8, 1),
(41, 'thomas', 'Thomas', 'thomas@gmail.com', 7, 7),
(42, 'admin', 'LIPI', '', 7, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `admin_email` (`email`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`),
  ADD KEY `batch_ibfk_1` (`room_id`),
  ADD KEY `batch_ibfk_2` (`class_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `uniqueclass` (`year`,`dept`,`division`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `se_batch`
--
ALTER TABLE `se_batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `se_class`
--
ALTER TABLE `se_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `se_exam`
--
ALTER TABLE `se_exam`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `se_room`
--
ALTER TABLE `se_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `se_staff`
--
ALTER TABLE `se_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `se_student`
--
ALTER TABLE `se_student`
  ADD UNIQUE KEY `std_id` (`std_id`);

--
-- Indexes for table `se_subject`
--
ALTER TABLE `se_subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `Student_email` (`email`),
  ADD KEY `students_ibfk_1` (`class`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `se_batch`
--
ALTER TABLE `se_batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `se_class`
--
ALTER TABLE `se_class`
  MODIFY `class_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `se_exam`
--
ALTER TABLE `se_exam`
  MODIFY `ex_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `se_room`
--
ALTER TABLE `se_room`
  MODIFY `room_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `se_staff`
--
ALTER TABLE `se_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `se_student`
--
ALTER TABLE `se_student`
  MODIFY `std_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `se_subject`
--
ALTER TABLE `se_subject`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `batch_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
