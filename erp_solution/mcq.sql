-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 07:21 AM
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
-- Database: `mcq`
--

-- --------------------------------------------------------

--
-- Table structure for table `gen_add_question`
--

CREATE TABLE `gen_add_question` (
  `QUESTION_NO` int(11) NOT NULL,
  `GROUP_NO` int(11) NOT NULL,
  `CLASS_NO` int(11) NOT NULL,
  `SUBJECT_NO` int(11) NOT NULL,
  `CHAPTER_NO` int(11) NOT NULL,
  `QUESTION_TITLE` varchar(255) NOT NULL,
  `QUESTION_TYPE` varchar(255) NOT NULL,
  `QUESTION_MARK` double NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` datetime NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_add_question`
--

INSERT INTO `gen_add_question` (`QUESTION_NO`, `GROUP_NO`, `CLASS_NO`, `SUBJECT_NO`, `CHAPTER_NO`, `QUESTION_TITLE`, `QUESTION_TYPE`, `QUESTION_MARK`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 1, 1, 1, 1, 'ertyhvucuvivfhyxtfr', 'on', 6, 0, '2018-05-15 08:40:09', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(2, 1, 1, 1, 1, 'wertydfgh', 'on', 8, 0, '2018-05-15 08:50:01', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(3, 1, 1, 1, 1, 'uuuuuuuuuuu', 'on', 1, 0, '2018-05-15 08:51:50', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(4, 1, 1, 1, 1, 'tf2egiueehueey', 'on', 2, 0, '2018-05-15 08:55:40', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(5, 2, 2, 2, 2, 'gfiyegfeuofhejofej', 'on', 2, 0, '2018-05-15 09:18:04', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(6, 2, 2, 2, 2, 'rqefrfrwbfwkjf', 'on', 3, 0, '2018-05-15 09:19:26', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(7, 2, 2, 2, 2, 'hj3bvr3ihr1k', 'on', 4, 1, '2018-05-15 09:21:12', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(8, 2, 2, 2, 2, 'gdftufiygbivgcg', 'Single', 5, 1, '2018-05-16 06:25:33', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(9, 1, 1, 1, 1, 'iugeriueghiojfeuofgeiyfgvefi', 'Single', 0, 1, '2018-05-16 06:29:38', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(10, 1, 1, 1, 1, 'ttttttttttttttttttttt', 'Single', 9, 1, '2018-05-16 06:40:18', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(11, 1, 1, 1, 1, 'what is this ', 'Single', 5, 1, '2018-05-17 06:34:08', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_chapter`
--

CREATE TABLE `gen_chapter` (
  `CHAPTER_NO` int(11) NOT NULL,
  `CHAPTER_CODE` varchar(255) NOT NULL,
  `SUBJECT_NO` int(11) NOT NULL,
  `CHAPTER_TITLE` varchar(255) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` datetime NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_chapter`
--

INSERT INTO `gen_chapter` (`CHAPTER_NO`, `CHAPTER_CODE`, `SUBJECT_NO`, `CHAPTER_TITLE`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, '1200', 1, 'A book', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(2, '2', 2, 'Bangla reading', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_class`
--

CREATE TABLE `gen_class` (
  `CLASS_NO` int(11) NOT NULL,
  `CLASS_CODE` varchar(255) NOT NULL,
  `GROUP_NO` int(11) NOT NULL,
  `CLASS_NAME` varchar(255) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` datetime NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_class`
--

INSERT INTO `gen_class` (`CLASS_NO`, `CLASS_CODE`, `GROUP_NO`, `CLASS_NAME`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, '001', 1, 'Nine', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(2, '13', 2, 'Ten', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_exam`
--

CREATE TABLE `gen_exam` (
  `EXAM_NO` int(11) NOT NULL,
  `GROUP_NO` int(11) NOT NULL,
  `CLASS_NO` int(11) NOT NULL,
  `SUBJECT_NO` int(11) NOT NULL,
  `CHAPTER_NO` int(11) NOT NULL,
  `EXAM_TITLE` varchar(255) NOT NULL,
  `START_TIME` date NOT NULL,
  `END_TIME` date NOT NULL,
  `TOTAL_MARK` double NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` datetime NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gen_group`
--

CREATE TABLE `gen_group` (
  `GROUP_NO` int(11) NOT NULL,
  `GROUP_CODE` varchar(255) NOT NULL,
  `GROUP_NAME` varchar(255) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` datetime NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_group`
--

INSERT INTO `gen_group` (`GROUP_NO`, `GROUP_CODE`, `GROUP_NAME`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, '1', 'Science', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(2, '2', 'Arts', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_prepare_question_master`
--

CREATE TABLE `gen_prepare_question_master` (
  `PREPARE_QUESTION_MASTER_NO` int(50) NOT NULL,
  `GROUP_NO` int(50) NOT NULL,
  `CLASS_NO` int(50) NOT NULL,
  `SUBJECT_NO` int(50) NOT NULL,
  `QUESTION_TITLE` varchar(50) NOT NULL,
  `CREATED_BY` int(50) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(50) NOT NULL,
  `DELETED_BY` int(50) NOT NULL,
  `DELETED_NO` datetime NOT NULL,
  `IS_UPDATED` int(50) NOT NULL,
  `UPDATED-BY` int(50) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gen_question_options`
--

CREATE TABLE `gen_question_options` (
  `QUESTION_OPTION_NO` int(50) NOT NULL,
  `QUESTION_NO` int(11) NOT NULL,
  `QUESTION_NAME` varchar(100) NOT NULL,
  `IS_ANS` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(11) NOT NULL,
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` datetime NOT NULL,
  `IS_UPDATED` int(11) NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_question_options`
--

INSERT INTO `gen_question_options` (`QUESTION_OPTION_NO`, `QUESTION_NO`, `QUESTION_NAME`, `IS_ANS`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 0, 'jhvyu', 0, 0, '2018-05-15 08:40:09', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(2, 0, 'gvygy', 1, 0, '2018-05-15 08:50:01', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(3, 0, 'qqqqqq', 0, 0, '2018-05-15 08:51:50', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(4, 4, 'abcd', 1, 0, '2018-05-15 08:55:40', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(5, 4, 'efgh', 0, 0, '2018-05-15 08:55:40', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(6, 4, 'ijkl', 0, 0, '2018-05-15 08:55:40', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(7, 4, 'mnop', 0, 0, '2018-05-15 08:55:40', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(8, 5, 't7uyugihv', 1, 0, '2018-05-15 09:18:04', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(9, 6, 'fgg', 1, 0, '2018-05-15 09:19:26', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(10, 7, 'hegri3', 1, 1, '2018-05-15 09:21:12', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(11, 8, 'hfygiu', 1, 1, '2018-05-16 06:25:33', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(12, 8, 'ty', 0, 1, '2018-05-16 06:25:33', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(13, 9, 'hjvhj', 1, 1, '2018-05-16 06:29:38', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(14, 10, 'jhf', 1, 1, '2018-05-16 06:40:18', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(15, 10, 'nai', 0, 1, '2018-05-16 06:40:18', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(16, 11, 'option1', 1, 1, '2018-05-17 06:34:08', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(17, 11, 'dtdegg', 0, 1, '2018-05-17 06:34:08', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_students`
--

CREATE TABLE `gen_students` (
  `REG_NO` int(20) NOT NULL,
  `REG_ID` int(20) NOT NULL,
  `GROUP_NO` int(50) NOT NULL,
  `CLASS_NO` int(50) NOT NULL,
  `GROUP_NAME` varchar(20) NOT NULL,
  `CLASS_NAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `CREATED_BY` int(20) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(20) NOT NULL,
  `DELETED_BY` int(20) NOT NULL,
  `DELETED_ON` datetime NOT NULL,
  `IS_UPDATED` int(20) NOT NULL,
  `UPDATED_BY` int(20) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_students`
--

INSERT INTO `gen_students` (`REG_NO`, `REG_ID`, `GROUP_NO`, `CLASS_NO`, `GROUP_NAME`, `CLASS_NAME`, `PASSWORD`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 1, 0, 0, 'Science', 'A', '1234', 1, '2018-05-13 00:00:00', 1, 1, '2018-05-13 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(2, 111, 0, 0, 'Science', 'A', '1234', 1, '2018-05-13 00:00:00', 1, 1, '2018-05-13 00:00:00', 1, 1, '2018-05-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_student_record`
--

CREATE TABLE `gen_student_record` (
  `STUDENT_RECORD_NO` int(50) NOT NULL,
  `REG_NO` int(50) NOT NULL,
  `EXAM_NO` int(50) NOT NULL,
  `EXAM_STATUS` varchar(50) NOT NULL,
  `CREATED_BY` int(50) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(50) NOT NULL,
  `DELETED_BY` int(50) NOT NULL,
  `DELETED_ON` datetime NOT NULL,
  `IS_UPDATED` int(50) NOT NULL,
  `UPDATED_BY` int(50) NOT NULL,
  `UPDATED_ON` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gen_subject`
--

CREATE TABLE `gen_subject` (
  `SUBJECT_NO` int(50) NOT NULL,
  `GROUP_NO` int(11) NOT NULL,
  `CLASS_NO` int(11) NOT NULL,
  `SUBJECT_CODE` varchar(50) NOT NULL,
  `SUBJECT_NAME` varchar(50) NOT NULL,
  `CREATED_BY` int(50) NOT NULL,
  `CREATED-ON` datetime NOT NULL,
  `IS_DELETED` int(50) NOT NULL,
  `DELETED_BY` int(50) NOT NULL,
  `DELETED_ON` datetime NOT NULL,
  `IS_UPDATED` int(50) NOT NULL,
  `UPDATED_BY` int(50) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_subject`
--

INSERT INTO `gen_subject` (`SUBJECT_NO`, `GROUP_NO`, `CLASS_NO`, `SUBJECT_CODE`, `SUBJECT_NAME`, `CREATED_BY`, `CREATED-ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 1, 1, '1', 'English', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(2, 2, 2, '2', 'Bangla', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `prepare_question_details`
--

CREATE TABLE `prepare_question_details` (
  `PREPARE_QUESTION_DETAILS_NO` int(11) NOT NULL,
  `PREPARE_QUESTION_MASTER_NO` int(11) NOT NULL,
  `CHAPTER_NO` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` datetime NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `xxx_user`
--

CREATE TABLE `xxx_user` (
  `user_no` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_contact` text COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `active_from` date NOT NULL,
  `active_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `xxx_user`
--

INSERT INTO `xxx_user` (`user_no`, `user_name`, `pass`, `user_full_name`, `user_email`, `user_contact`, `is_active`, `active_from`, `active_to`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', '', 'admin@gmail.com', '', 1, '2017-10-10', '2018-11-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gen_add_question`
--
ALTER TABLE `gen_add_question`
  ADD PRIMARY KEY (`QUESTION_NO`);

--
-- Indexes for table `gen_chapter`
--
ALTER TABLE `gen_chapter`
  ADD PRIMARY KEY (`CHAPTER_NO`);

--
-- Indexes for table `gen_class`
--
ALTER TABLE `gen_class`
  ADD PRIMARY KEY (`CLASS_NO`);

--
-- Indexes for table `gen_exam`
--
ALTER TABLE `gen_exam`
  ADD PRIMARY KEY (`EXAM_NO`);

--
-- Indexes for table `gen_group`
--
ALTER TABLE `gen_group`
  ADD PRIMARY KEY (`GROUP_NO`);

--
-- Indexes for table `gen_prepare_question_master`
--
ALTER TABLE `gen_prepare_question_master`
  ADD PRIMARY KEY (`PREPARE_QUESTION_MASTER_NO`);

--
-- Indexes for table `gen_question_options`
--
ALTER TABLE `gen_question_options`
  ADD PRIMARY KEY (`QUESTION_OPTION_NO`);

--
-- Indexes for table `gen_students`
--
ALTER TABLE `gen_students`
  ADD PRIMARY KEY (`REG_NO`);

--
-- Indexes for table `gen_student_record`
--
ALTER TABLE `gen_student_record`
  ADD PRIMARY KEY (`STUDENT_RECORD_NO`);

--
-- Indexes for table `gen_subject`
--
ALTER TABLE `gen_subject`
  ADD PRIMARY KEY (`SUBJECT_NO`);

--
-- Indexes for table `prepare_question_details`
--
ALTER TABLE `prepare_question_details`
  ADD PRIMARY KEY (`PREPARE_QUESTION_DETAILS_NO`);

--
-- Indexes for table `xxx_user`
--
ALTER TABLE `xxx_user`
  ADD PRIMARY KEY (`user_no`),
  ADD UNIQUE KEY `USER_NAME` (`user_name`),
  ADD UNIQUE KEY `USER_FULL_NAME` (`user_full_name`),
  ADD UNIQUE KEY `USER_EMAIL` (`user_email`),
  ADD UNIQUE KEY `USER_NO` (`user_no`),
  ADD UNIQUE KEY `USER_NO_2` (`user_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gen_add_question`
--
ALTER TABLE `gen_add_question`
  MODIFY `QUESTION_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `gen_chapter`
--
ALTER TABLE `gen_chapter`
  MODIFY `CHAPTER_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gen_class`
--
ALTER TABLE `gen_class`
  MODIFY `CLASS_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gen_exam`
--
ALTER TABLE `gen_exam`
  MODIFY `EXAM_NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gen_group`
--
ALTER TABLE `gen_group`
  MODIFY `GROUP_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gen_prepare_question_master`
--
ALTER TABLE `gen_prepare_question_master`
  MODIFY `PREPARE_QUESTION_MASTER_NO` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gen_question_options`
--
ALTER TABLE `gen_question_options`
  MODIFY `QUESTION_OPTION_NO` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `gen_students`
--
ALTER TABLE `gen_students`
  MODIFY `REG_NO` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gen_student_record`
--
ALTER TABLE `gen_student_record`
  MODIFY `STUDENT_RECORD_NO` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gen_subject`
--
ALTER TABLE `gen_subject`
  MODIFY `SUBJECT_NO` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prepare_question_details`
--
ALTER TABLE `prepare_question_details`
  MODIFY `PREPARE_QUESTION_DETAILS_NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `xxx_user`
--
ALTER TABLE `xxx_user`
  MODIFY `user_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
