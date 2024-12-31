-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 01:06 PM
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
-- Database: `erp_solution`
--

-- --------------------------------------------------------

--
-- Table structure for table `gen_banks`
--

CREATE TABLE `gen_banks` (
  `BANKS_NO` int(11) NOT NULL,
  `BANK_NAME` varchar(255) NOT NULL,
  `ACCOUNT_NUMBER` varchar(50) NOT NULL,
  `ADDRESS` text NOT NULL,
  `OPENING_BALANCE` double NOT NULL DEFAULT '0',
  `ACCOUNT_TYPE_NO` int(11) NOT NULL,
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
-- Dumping data for table `gen_banks`
--

INSERT INTO `gen_banks` (`BANKS_NO`, `BANK_NAME`, `ACCOUNT_NUMBER`, `ADDRESS`, `OPENING_BALANCE`, `ACCOUNT_TYPE_NO`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 'ABC', '12345', 'Abcd', 123456, 4, 1, '2018-05-29 00:00:00', 0, 0, '0000-00-00 00:00:00', 1, 1, '2018-05-29 00:00:00'),
(2, 'NRB', '123', 'abcd', 123456, 9, 1, '2018-05-29 00:00:00', 0, 0, '0000-00-00 00:00:00', 1, 1, '2018-05-29 00:00:00'),
(3, 'q', '', '', 0, 0, 1, '2018-05-29 00:00:00', 1, 1, '2018-05-29 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(4, 'kbfke', '89457349', 'ihgfei', 9, 3, 1, '2018-05-29 00:00:00', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(5, 'www', '443', '', 2, 1, 1, '2018-05-29 00:00:00', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_cataegories`
--

CREATE TABLE `gen_cataegories` (
  `CATEGORIES_NO` int(11) NOT NULL,
  `GROUP_NO` int(11) NOT NULL,
  `SUB_GROUP_NO` int(11) NOT NULL,
  `CATEGORIES_NAME` varchar(50) NOT NULL,
  `CATEGORIES_CODE` int(11) NOT NULL,
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
-- Dumping data for table `gen_cataegories`
--

INSERT INTO `gen_cataegories` (`CATEGORIES_NO`, `GROUP_NO`, `SUB_GROUP_NO`, `CATEGORIES_NAME`, `CATEGORIES_CODE`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 1, 1, 'kkkkk', 1111, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_groups`
--

CREATE TABLE `gen_groups` (
  `GROUP_NO` int(11) NOT NULL,
  `GROUP_NAME` varchar(255) NOT NULL,
  `GROUP_CODE` varchar(55) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` datetime NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `gen_groups`
--

INSERT INTO `gen_groups` (`GROUP_NO`, `GROUP_NAME`, `GROUP_CODE`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 'Pay', '1234', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(2, 'Nai', '12211', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_sub_categories`
--

CREATE TABLE `gen_sub_categories` (
  `SUB_CATEGORIES_NO` int(11) NOT NULL,
  `GROUP_NO` int(11) NOT NULL,
  `SUB_GROUP_NO` int(11) NOT NULL,
  `CATEGORIES_NO` int(11) NOT NULL,
  `SUB_CATEGORIES_NAME` varchar(50) NOT NULL,
  `SUB_CATEGORIES_CODE` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(1) NOT NULL,
  `DELETED_ON` int(11) NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_sub_categories`
--

INSERT INTO `gen_sub_categories` (`SUB_CATEGORIES_NO`, `GROUP_NO`, `SUB_GROUP_NO`, `CATEGORIES_NO`, `SUB_CATEGORIES_NAME`, `SUB_CATEGORIES_CODE`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 1, 1, 1, 'tttt', 7774, 1, '2018-05-29 00:00:00', 0, 0, 0, 1, 1, '2018-05-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_sub_groups`
--

CREATE TABLE `gen_sub_groups` (
  `SUB_GROUP_NO` int(11) NOT NULL,
  `GROUP_NO` int(11) NOT NULL,
  `SUB_GROUP_NAME` varchar(50) NOT NULL,
  `SUB_GROUP_CODE` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` int(11) NOT NULL,
  `IS_DELETED` int(11) NOT NULL,
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` datetime NOT NULL,
  `IS_UPDATED` int(11) NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_sub_groups`
--

INSERT INTO `gen_sub_groups` (`SUB_GROUP_NO`, `GROUP_NO`, `SUB_GROUP_NAME`, `SUB_GROUP_CODE`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 1, 'fffff', 4, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(3, 2, 'ttttrr', 75, 0, 0, 0, 0, '0000-00-00 00:00:00', 1, 1, '0000-00-00 00:00:00');

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
-- Indexes for table `gen_banks`
--
ALTER TABLE `gen_banks`
  ADD PRIMARY KEY (`BANKS_NO`);

--
-- Indexes for table `gen_cataegories`
--
ALTER TABLE `gen_cataegories`
  ADD PRIMARY KEY (`CATEGORIES_NO`);

--
-- Indexes for table `gen_groups`
--
ALTER TABLE `gen_groups`
  ADD PRIMARY KEY (`GROUP_NO`);

--
-- Indexes for table `gen_sub_categories`
--
ALTER TABLE `gen_sub_categories`
  ADD PRIMARY KEY (`SUB_CATEGORIES_NO`);

--
-- Indexes for table `gen_sub_groups`
--
ALTER TABLE `gen_sub_groups`
  ADD PRIMARY KEY (`SUB_GROUP_NO`);

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
-- AUTO_INCREMENT for table `gen_banks`
--
ALTER TABLE `gen_banks`
  MODIFY `BANKS_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gen_cataegories`
--
ALTER TABLE `gen_cataegories`
  MODIFY `CATEGORIES_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gen_groups`
--
ALTER TABLE `gen_groups`
  MODIFY `GROUP_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gen_sub_categories`
--
ALTER TABLE `gen_sub_categories`
  MODIFY `SUB_CATEGORIES_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gen_sub_groups`
--
ALTER TABLE `gen_sub_groups`
  MODIFY `SUB_GROUP_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `xxx_user`
--
ALTER TABLE `xxx_user`
  MODIFY `user_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
