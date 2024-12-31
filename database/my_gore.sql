-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 06:20 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_gore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `message` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `pro_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `phone`, `message`, `password`, `pro_pic`) VALUES
(1, 'Nawsish Ahmed', 'nawsishahmed@yahoo.com', '+8801729754786', 'I am Nawsish Ahmed and I am a student.', 'Nawsish@12', '1ba1f616cc3eeae396f9d5833.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `BLOOD_GROUP_NO` int(11) NOT NULL,
  `BLOOD_GROUP` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`BLOOD_GROUP_NO`, `BLOOD_GROUP`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FEEDBACK_NO` int(11) NOT NULL,
  `NAME` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL_ADDRESS` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `USER_CONTACT` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MESSAGE` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `SUBMISSION_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `GENDER_NO` int(11) NOT NULL,
  `GENDER` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`GENDER_NO`, `GENDER`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `gen_districts`
--

CREATE TABLE `gen_districts` (
  `DISTRICT_NO` int(50) NOT NULL,
  `DISTRICT_NAME` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_districts`
--

INSERT INTO `gen_districts` (`DISTRICT_NO`, `DISTRICT_NAME`) VALUES
(1, 'Barguna'),
(2, 'Barishal'),
(3, 'Bhola'),
(4, 'Jhalokati'),
(5, 'Patuakhali'),
(6, 'Pirojpur'),
(7, 'Bandarban'),
(8, 'Brahmanbaria'),
(9, 'Chandpur'),
(10, 'Chattogram'),
(11, 'Cumilla'),
(12, 'Cox\'s Bazar'),
(13, 'Feni'),
(14, 'Khagrachhari'),
(15, 'Lakshmipur'),
(16, 'Noakhali'),
(17, 'Rangamati'),
(18, 'Dhaka'),
(19, 'Faridpur'),
(20, 'Gazipur'),
(21, 'Gopalganj'),
(22, 'Kishoreganj'),
(23, 'Madaripur'),
(24, 'Manikganj'),
(25, 'Munshiganj'),
(29, 'Narayanganj'),
(30, 'Narsingdi'),
(31, 'Rajbari'),
(32, 'Shariatpur'),
(33, 'Tangail'),
(34, 'Bagerhat'),
(35, 'Chuadanga'),
(36, 'Jessore'),
(37, 'Jhenaidah'),
(38, 'Khulna'),
(39, 'Kushtia'),
(40, 'Magura'),
(41, 'Meherpur'),
(42, 'Narail'),
(43, 'Satkhira'),
(44, 'Jamalpur'),
(45, 'Mymensingh'),
(46, 'Netrokona'),
(47, 'Sherpur'),
(48, 'Bogura'),
(49, 'Joypurhat'),
(50, 'Naogaon'),
(51, 'Natore'),
(52, 'Chapai Nawabganj'),
(53, 'Pabna'),
(54, 'Rajshahi'),
(55, 'Sirajganj'),
(56, 'Dinajpur'),
(57, 'Gaibandha'),
(58, 'Kurigram'),
(59, 'Lalmonirhat'),
(60, 'Nilphamari'),
(61, 'Panchagarh'),
(62, 'Rangpur'),
(63, 'Thakurgaon'),
(64, 'Habiganj'),
(65, 'Moulvibazar'),
(66, 'Sunamganj'),
(67, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `gen_upazila`
--

CREATE TABLE `gen_upazila` (
  `UPAZILA_NO` int(11) NOT NULL,
  `DISTRICT_NO` int(11) NOT NULL,
  `UPAZILA_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_upazila`
--

INSERT INTO `gen_upazila` (`UPAZILA_NO`, `DISTRICT_NO`, `UPAZILA_NAME`) VALUES
(1, 34, 'Bagerhat Sadar'),
(2, 34, 'Chitalmari'),
(3, 34, 'Fakirhat'),
(4, 34, 'Kachua'),
(5, 34, 'Mollahat'),
(6, 34, 'Mongla'),
(7, 34, 'Morrelganj'),
(8, 34, 'Rampal'),
(9, 34, 'Sarankhola'),
(10, 1, 'Amtali'),
(11, 1, 'Bamna'),
(12, 1, 'Barguna Sadar'),
(13, 1, 'Betagi'),
(14, 1, 'Patharghata'),
(15, 1, 'Taltali'),
(16, 2, 'Agailjhara'),
(17, 2, 'Babuganj'),
(18, 2, 'Bakerganj'),
(19, 2, 'Banaripara'),
(20, 2, 'Barishal Sadar'),
(21, 2, 'Gournadi'),
(22, 2, 'Hizla'),
(23, 2, 'Mehendiganj'),
(24, 2, 'Muladi'),
(25, 2, 'Wazirpur'),
(26, 3, 'Bhola Sadar'),
(27, 3, 'Borhanuddin'),
(28, 3, 'Char Fasson'),
(29, 3, 'Daulatkhan'),
(30, 3, 'Lalmohan'),
(31, 3, 'Manpura'),
(32, 3, 'Tazumuddin'),
(33, 4, 'Jhalokati Sadar'),
(34, 4, 'Kathalia'),
(35, 4, 'Nalchity'),
(36, 4, 'Rajapur'),
(37, 5, 'Bauphal'),
(38, 5, 'Dashmina'),
(39, 5, 'Dumki'),
(40, 5, 'Galachipa'),
(41, 5, 'Kalapara'),
(42, 5, 'Mirzaganj'),
(43, 5, 'Patuakhali Sadar'),
(44, 5, 'Rangabali'),
(45, 6, 'Bhandaria'),
(46, 6, 'Kawkhali'),
(47, 6, 'Mathbaria'),
(48, 6, 'Nazirpur'),
(49, 6, 'Nesarabad'),
(50, 6, 'Pirojpur Sadar'),
(51, 6, 'Zianagar'),
(52, 7, '\r\nAli Kadam'),
(53, 7, 'Bandarban Sadar'),
(54, 7, 'Lama'),
(55, 7, 'Naikhongchhari'),
(56, 7, 'Rowangchhari'),
(57, 7, 'Ruma'),
(58, 7, 'Thanchi'),
(59, 8, 'Ashuganj'),
(60, 8, 'Bancharampur'),
(61, 8, 'Bijoynagar'),
(62, 8, 'Brahmanbaria Sadar'),
(63, 8, 'Kasba'),
(64, 8, 'Sarail'),
(65, 8, 'Nabinagar'),
(66, 8, 'Nasirnagar'),
(67, 9, 'Chandpur Sadar'),
(68, 9, 'Dhakirgaon'),
(69, 9, 'Faridganj'),
(70, 9, 'Haimchar'),
(71, 9, 'Haziganj'),
(72, 9, 'Kachua'),
(73, 9, 'Matlab South'),
(74, 9, 'Matlab Uttar'),
(75, 9, 'Shahrasti'),
(76, 10, 'Bandar'),
(77, 10, 'Bayazid'),
(78, 10, 'Bhujpur'),
(79, 10, 'Double Mooring'),
(80, 10, 'Halishahar'),
(81, 10, 'Karnaphuli'),
(82, 10, 'Khulshi'),
(83, 10, 'Kotwali'),
(84, 10, 'Pahartali'),
(85, 10, 'Panchlaish'),
(86, 10, 'Patenga'),
(87, 11, 'Barura'),
(88, 11, 'Brahmanpara'),
(89, 11, 'Burichang'),
(90, 11, 'Chandina'),
(91, 11, 'Chapitala Union Parishad'),
(92, 11, 'Comilla Adarsha Sadar'),
(93, 11, 'Comilla Sadar Dakshin'),
(94, 11, 'Daudkandi'),
(95, 11, 'Debidwar'),
(96, 11, 'Homna'),
(97, 11, 'Laksham'),
(98, 11, 'Lalmai'),
(99, 11, 'Meghna'),
(100, 11, 'Monohorgonj'),
(101, 11, 'Muradnagar'),
(102, 11, ''),
(103, 11, 'Nangalkot'),
(104, 11, 'Titas'),
(105, 12, 'Badarkhali'),
(106, 12, 'Chakaria'),
(107, 12, 'Cox\'s Bazar Sadar'),
(108, 12, 'Kutubdia'),
(109, 12, 'Maheshkhali'),
(110, 12, 'Ramu'),
(111, 12, 'Teknaf'),
(112, 12, 'Ukhia'),
(113, 13, 'Chhagalnaiya'),
(114, 13, 'Daganbhuiyan'),
(115, 13, 'Feni Sadar'),
(116, 13, 'Fulgazi'),
(117, 13, 'Parshuram'),
(118, 13, 'Sonagazi'),
(119, 14, 'Dighinala'),
(120, 14, 'Khagrachhari Sadar'),
(121, 14, 'Lakshmichhari'),
(122, 14, 'Mahalchhari'),
(123, 14, 'Panchhari'),
(124, 14, 'Ramgarh'),
(125, 14, 'Guimara'),
(126, 14, 'Manikchhari'),
(127, 14, 'Matiranga'),
(128, 15, 'Kamalnagar'),
(129, 15, 'Lakshmipur Sadar'),
(130, 15, 'Raipur'),
(131, 15, 'Ramganj'),
(132, 15, 'Ramgati'),
(133, 16, 'Begumganj'),
(134, 16, 'Chatkhil'),
(135, 16, 'Companiganj'),
(136, 16, 'Hatiya'),
(137, 16, 'Kabirhat'),
(138, 16, 'Noakhali Sadar'),
(139, 16, 'Senbagh'),
(140, 16, 'Sonaimuri'),
(141, 16, 'Suborno Char'),
(142, 17, 'Bagaichhari'),
(143, 17, 'Barkal'),
(144, 17, 'Belaichhari'),
(145, 17, 'Juraichhari'),
(146, 17, 'Kaptai'),
(147, 17, 'Kawkhali'),
(148, 17, 'Langadu'),
(149, 17, 'Naniarchar'),
(150, 17, 'Rajasthali'),
(151, 17, 'Rangamati Sadar'),
(152, 18, 'Adabor'),
(153, 18, 'Azampur'),
(154, 18, 'Badda'),
(155, 18, 'Bangsal'),
(156, 18, 'Cantonment'),
(157, 18, 'Chowkbazar'),
(158, 18, 'Demra'),
(159, 18, 'Dhanmondi'),
(160, 18, 'Gendaria'),
(161, 18, 'Gulshan'),
(162, 18, 'Hazaribagh'),
(163, 18, 'Kadamtali'),
(164, 18, 'Kafrul'),
(165, 18, 'Kalabagan'),
(166, 18, 'Kamrangirchar'),
(167, 18, 'Khilgaon'),
(168, 18, 'Khilkhet'),
(169, 18, 'Kotwali'),
(170, 18, 'Lalbagh'),
(171, 18, 'Mirpur'),
(172, 18, 'Mohammadpur'),
(173, 18, 'Motijheel'),
(174, 18, 'New Market'),
(175, 18, 'Pallabi'),
(176, 18, 'Paltan'),
(177, 18, 'Panthapath'),
(178, 18, 'Ramna'),
(179, 18, 'Rampura'),
(180, 18, 'Sabujbagh'),
(181, 18, 'Shahbag'),
(182, 18, 'Sher-e-Bangla Nagar'),
(183, 18, 'Shyampur'),
(184, 18, 'Sutrapur'),
(185, 18, 'Tejgaon Industrial Area'),
(186, 18, 'Tejgaon'),
(187, 18, 'Uttar Khan'),
(188, 18, 'Uttara'),
(189, 18, 'Vatara'),
(190, 18, 'Wari'),
(191, 19, 'Alfadanga'),
(192, 19, 'Bhanga'),
(193, 19, 'Boalmari'),
(194, 19, 'Charbhadrasan'),
(195, 19, 'Faridpur Sadar'),
(196, 19, 'Madhukhali'),
(197, 19, 'Nagarkanda'),
(198, 19, 'Sadarpur'),
(199, 19, 'Saltha'),
(200, 20, 'Gazipur Sadar'),
(201, 20, 'Kaliakair'),
(202, 20, 'Kaliganj'),
(203, 20, 'Kapasia'),
(204, 20, 'Sreepur'),
(205, 20, 'Tongi'),
(206, 21, 'Gopalganj Sadar'),
(207, 21, 'Kashiani'),
(208, 21, 'Kotalipara'),
(209, 21, 'Muksudpur'),
(210, 21, 'Tungipara'),
(211, 22, 'Austagram'),
(212, 22, 'Bajitpur'),
(213, 22, 'Bhairab'),
(214, 22, 'Hossainpur'),
(215, 22, 'Itna Upazila'),
(216, 22, 'Itna'),
(217, 22, 'Karimganj'),
(218, 22, 'Katiadi'),
(219, 22, 'Kishoreganj Sadar'),
(220, 22, 'Kuliarchar'),
(221, 22, 'Mithamain'),
(222, 22, 'Nikli'),
(223, 22, 'Pakundia'),
(224, 22, 'Tarail'),
(225, 23, 'Kalkini'),
(226, 23, 'Madaripur Sadar'),
(227, 23, 'Rajoir'),
(228, 23, 'Shibchar'),
(229, 24, 'Daulatpur'),
(230, 24, 'Ghior'),
(231, 24, 'Harirampur'),
(232, 24, 'Manikganj Sadar'),
(233, 24, 'Saturia'),
(234, 24, 'Shivalaya'),
(235, 24, 'Singair'),
(236, 25, 'Gazaria'),
(237, 25, 'Lohajang'),
(238, 25, 'Munshiganj Sadar'),
(239, 25, 'Sirajdikhan'),
(240, 25, 'Sreenagar'),
(241, 25, 'Tongibari'),
(242, 29, 'Araihazar'),
(243, 29, 'Bandar'),
(244, 29, 'Narayanganj Sadar'),
(245, 29, 'Rupganj'),
(246, 29, 'Sonargaon'),
(247, 30, 'Belabo'),
(248, 30, 'Monohardi'),
(249, 30, 'Narsingdi Sadar'),
(250, 30, 'Palash'),
(251, 30, 'Raipura'),
(252, 30, 'Shibpur'),
(253, 31, 'Baliakandi'),
(254, 31, 'Goalandaghat'),
(255, 31, 'Pangsha'),
(256, 31, 'Rajbari Sadar'),
(257, 32, 'Bhedarganj'),
(258, 32, 'Damudya'),
(259, 32, 'Gosairhat'),
(260, 32, 'Naria'),
(261, 32, 'Shariatpur Sadar'),
(262, 32, 'Zajira'),
(263, 33, 'Basail'),
(264, 33, 'Bhuapur'),
(265, 33, 'Delduar'),
(266, 33, 'Dhanbari'),
(267, 33, 'Ghatail'),
(268, 33, 'Gopalpur'),
(269, 33, 'Kalihati'),
(270, 33, 'Madhupur'),
(271, 33, 'Mirzapur'),
(272, 33, 'Nagarpur'),
(273, 33, 'Sakhipur'),
(274, 33, 'Tangail Sadar'),
(275, 35, 'Alamdanga'),
(276, 35, 'Chuadanga Sadar'),
(277, 35, 'Damurhuda'),
(278, 35, 'Jibannagar'),
(279, 36, 'Abhaynagar'),
(280, 36, 'Bagherpara'),
(281, 36, 'haugachha'),
(282, 36, 'Jessore Sadar'),
(283, 36, 'Jhikargacha'),
(284, 36, 'Keshabpur'),
(285, 36, 'Manirampur'),
(286, 36, 'Sharsha'),
(287, 37, 'Harinakunda'),
(288, 37, 'Jhenaidah Sadar'),
(289, 37, 'Kaliganj'),
(290, 37, 'Kotchandpur'),
(291, 37, 'Maheshpur'),
(292, 37, 'Shailkupa'),
(293, 38, 'Batiaghata'),
(294, 38, 'Dacope'),
(295, 38, 'Daulatpur'),
(296, 38, 'Dighalia'),
(297, 38, 'Dumuria'),
(298, 38, 'Khalishpur'),
(299, 38, 'Khan Jahan Ali'),
(300, 38, 'Koyra'),
(301, 38, 'Moharajpur'),
(302, 38, 'Paikgachha'),
(303, 38, 'Phultala'),
(304, 38, 'Rupsa'),
(305, 38, 'Sonadanga'),
(306, 38, 'Terokhada'),
(307, 39, 'Bheramara'),
(308, 39, 'Daulatpur'),
(309, 39, 'Khoksa'),
(310, 39, 'Kumarkhali'),
(311, 39, 'Kushtia Sadar'),
(312, 39, 'Mirpur'),
(313, 40, 'Magura Sadar'),
(314, 40, 'Mohammadpur'),
(315, 40, 'Shalikha'),
(316, 40, 'Sreepur'),
(317, 41, 'Gangni'),
(318, 41, 'Meherpur Sadar'),
(319, 41, 'Mujibnagar'),
(320, 42, 'Kalia'),
(321, 42, 'Lohagara'),
(322, 42, 'Narail Sadar'),
(323, 42, 'Naragati'),
(324, 43, 'Assasuni'),
(325, 43, 'Debhata'),
(326, 43, 'Kalaroa'),
(327, 43, 'Kaliganj'),
(328, 43, 'Satkhira Sadar'),
(329, 43, 'Shyamnagar'),
(330, 43, 'Tala'),
(331, 44, 'Baksiganj'),
(332, 44, 'Dewanganj'),
(333, 44, 'Islampur'),
(334, 44, 'Jamalpur Sadar'),
(335, 44, 'Madarganj'),
(336, 44, 'Melandaha'),
(337, 44, 'Sarishabari'),
(338, 45, 'Bhaluka'),
(339, 45, 'Dhobaura'),
(340, 45, 'Fulbaria'),
(341, 45, 'Gaffargaon'),
(342, 45, 'Gouripur'),
(343, 45, 'Haluaghat'),
(344, 45, 'Ishwarganj'),
(345, 45, 'Muktagachha'),
(346, 45, 'Mymensingh Sadar'),
(347, 45, 'Nandail'),
(348, 45, 'Phulpur'),
(349, 45, 'Trishal'),
(350, 46, 'Atpara'),
(351, 46, 'Barhatta'),
(352, 46, 'Durgapur'),
(353, 46, 'Kalmakanda'),
(354, 46, 'Kendua'),
(355, 46, 'Khaliajuri'),
(356, 46, 'Madan'),
(357, 46, 'Mohanganj'),
(358, 46, 'Netrokona Sadar'),
(359, 46, 'Purbadhala'),
(360, 47, 'Jhenaigati'),
(361, 47, 'Nakla'),
(362, 47, 'Nalitabari'),
(363, 47, 'Sherpur Sadar'),
(364, 47, 'Sreebardi'),
(365, 48, 'Adamdighi'),
(366, 48, 'Bogura Sadar'),
(367, 48, 'Dhunat'),
(368, 48, 'Dhupchanchia'),
(369, 48, 'Gabtali'),
(370, 48, 'Kahaloo'),
(371, 48, 'Nandigram'),
(372, 48, 'Sariakandi'),
(373, 48, 'Shajahanpur'),
(374, 48, 'Sherpur'),
(375, 48, 'Shibganj'),
(376, 48, 'Sonatala'),
(377, 49, 'Akkelpur'),
(378, 49, 'Joypurhat Sadar'),
(379, 49, 'Kalai'),
(380, 49, 'Khetlal'),
(381, 49, 'Panchbibi'),
(382, 50, 'Atrai'),
(383, 50, 'Badalgachhi'),
(384, 50, 'Dhamoirhat'),
(385, 50, 'Manda'),
(386, 50, 'Mohadevpur'),
(387, 50, 'Naogaon Sadar'),
(388, 50, 'Niamatpur'),
(389, 50, 'Patnitala'),
(390, 50, 'Porsha'),
(391, 50, 'Raninagar'),
(392, 50, 'Sapahar'),
(393, 51, 'Bagatipara'),
(394, 51, 'Baraigram'),
(395, 51, 'Gurudaspur'),
(396, 51, 'Lalpur'),
(397, 51, 'Naldanga'),
(398, 51, 'Natore Sadar'),
(399, 51, 'Singra'),
(400, 52, 'Bholahat'),
(401, 52, 'Chapai Nawabganj Sadar'),
(402, 52, 'Gomostapur'),
(403, 52, 'Nachol'),
(404, 52, 'Shibganj'),
(405, 53, 'Atgharia'),
(406, 53, 'Bera'),
(407, 53, 'Bhangura'),
(408, 53, 'Chatmohar'),
(409, 53, 'Faridpur'),
(410, 53, 'Ishwardi'),
(411, 53, 'Pabna Sadar'),
(412, 53, 'Bhangura'),
(413, 53, 'Santhia'),
(414, 53, 'Sujanagar'),
(415, 54, 'Bagha'),
(416, 54, 'Bagmara'),
(417, 54, 'Boalia'),
(418, 54, 'Charghat'),
(419, 54, 'Durgapur'),
(420, 54, 'Godagari'),
(421, 54, 'Mohanpur'),
(422, 54, 'Paba'),
(423, 54, 'Puthia'),
(424, 54, 'Shah Makhdum'),
(425, 54, 'Tanore'),
(426, 55, 'Belkuchi'),
(427, 55, 'Chauhali'),
(428, 55, 'Kamarkhanda'),
(429, 55, 'Kazipur'),
(430, 55, 'Raiganj'),
(431, 55, 'Shahjadpur'),
(432, 55, 'Sirajganj Sadar'),
(433, 55, 'Tarash'),
(434, 55, 'Ullahpara'),
(435, 56, 'Biral'),
(436, 56, 'Birampur'),
(437, 56, 'Birganj'),
(438, 56, 'Bochaganj'),
(439, 56, 'Chirirbandar'),
(440, 56, 'Dinajpur Sadar'),
(441, 56, 'Fulbari'),
(442, 56, 'Ghoraghat'),
(443, 56, 'Hakimpur'),
(444, 56, 'Kaharole'),
(445, 56, 'Khansama'),
(446, 56, 'Nawabganj'),
(447, 56, 'Parbatipur'),
(448, 57, 'Gaibandha Sadar'),
(449, 57, 'Gobindaganj'),
(450, 57, 'Palashbari'),
(451, 57, 'Phulchhari'),
(452, 57, 'Sadullapur'),
(453, 57, 'Saghata'),
(454, 57, 'Sundarganj'),
(455, 58, 'Bhurungamari'),
(456, 58, 'Char Rajibpur'),
(457, 58, 'Chilmari'),
(458, 58, 'Kurigram Sadar'),
(459, 58, 'Nageshwari'),
(460, 58, 'Phulbari'),
(461, 58, 'Rajarhat'),
(462, 58, 'Raomari'),
(463, 58, 'Ulipur'),
(464, 59, 'Aditmari'),
(465, 59, 'Hatibandha'),
(466, 59, 'Kaliganj'),
(467, 59, 'Lalmonirhat Sadar'),
(468, 59, 'Patgram'),
(469, 60, 'Dimla'),
(470, 60, 'Domar'),
(471, 60, 'Jaldhaka'),
(472, 60, 'Kishoreganj'),
(473, 60, 'Nilphamari Sadar'),
(474, 60, 'Saidpur'),
(475, 61, 'Atwari'),
(476, 61, 'Boda'),
(477, 61, 'Debiganj'),
(478, 61, 'Panchagarh Sadar'),
(479, 61, 'Tetulia'),
(480, 62, 'Badarganj'),
(481, 62, 'Gangachhara'),
(482, 62, 'Kaunia'),
(483, 62, 'Mithapukur'),
(484, 62, 'Pirgachha'),
(485, 62, 'Pirganj'),
(486, 62, 'Rangpur Sadar'),
(487, 62, 'Taraganj'),
(488, 63, 'Baliadangi'),
(489, 63, 'Haripur'),
(490, 63, 'Pirganj'),
(491, 63, 'Ranisankail'),
(492, 63, 'Thakurgaon Sadar'),
(493, 64, 'Ajmiriganj'),
(494, 64, 'Bahubal'),
(495, 64, 'Baniachong'),
(496, 64, 'Chunarughat'),
(497, 64, 'Habiganj Sadar'),
(498, 64, 'Lakhai'),
(499, 64, 'Madhabpur'),
(500, 64, 'Nabiganj'),
(501, 65, 'Barlekha'),
(502, 65, 'Juri'),
(503, 65, 'Kamalganj'),
(504, 65, 'Kulaura'),
(505, 65, 'Moulvibazar Sadar'),
(506, 65, 'Rajnagar'),
(507, 65, 'Sreemangal'),
(508, 66, 'Bishwamvarpur'),
(509, 66, 'Chhatak'),
(510, 66, 'Dakshin Sunamganj'),
(511, 66, 'Derai'),
(512, 66, 'Dharamapasha'),
(513, 66, 'Dowarabazar'),
(514, 66, 'Jagannathpur'),
(515, 66, 'Jamalganj'),
(516, 66, 'Sullah'),
(517, 66, 'Sunamganj Sadar'),
(518, 66, 'Tahirpur'),
(519, 67, 'Amkuna'),
(520, 67, 'Balaganj'),
(521, 67, 'Balaganj'),
(522, 67, 'Beanibazar'),
(523, 67, 'Bishwanath'),
(524, 67, 'Companiganj'),
(525, 67, 'Dakshin Surma'),
(526, 67, 'Dayamir'),
(527, 67, 'Fenchuganj'),
(528, 67, 'Golapganj'),
(529, 67, 'Gowainghat'),
(530, 67, 'Jaintiapur'),
(531, 67, 'Kanaighat'),
(532, 67, 'Osmani Nagar'),
(533, 67, 'Sylhet Sadar'),
(534, 67, 'Uttar Bade Pasha'),
(535, 67, 'Zakiganj');

-- --------------------------------------------------------

--
-- Table structure for table `my_gore_db`
--

CREATE TABLE `my_gore_db` (
  `FLUID_USER_NO` int(11) NOT NULL,
  `FIRST_NAME` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `LAST_NAME` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL_ADDRESS` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `BLOOD_GROUP_NO` int(11) NOT NULL,
  `DISTRICT_NO` int(11) NOT NULL,
  `UPAZILA_NO` int(11) NOT NULL,
  `USER_CONTACT` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `LAST_DONATE` date NOT NULL,
  `USER_AGE` int(250) NOT NULL,
  `GENDER_NO` int(11) NOT NULL,
  `PASSWORD` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ACTIVE_FROM` date NOT NULL,
  `PROFILE_PICTURE` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `my_gore_db`
--

INSERT INTO `my_gore_db` (`FLUID_USER_NO`, `FIRST_NAME`, `LAST_NAME`, `EMAIL_ADDRESS`, `BLOOD_GROUP_NO`, `DISTRICT_NO`, `UPAZILA_NO`, `USER_CONTACT`, `LAST_DONATE`, `USER_AGE`, `GENDER_NO`, `PASSWORD`, `ACTIVE_FROM`, `PROFILE_PICTURE`) VALUES
(1, 'Nawsish', 'Ahmed', 'nawsishahmed@yahoo.com', 2, 52, 402, '01729754786', '2019-01-01', 28, 2, '123123', '2019-01-15', ''),
(2, 'Selim', 'Reza', 'selim@gmail.com', 3, 3, 28, '01728764587', '2019-01-09', 25, 1, '123123', '2019-01-12', ''),
(3, 'Hriday', 'Khan', 'hriday@gmail.com', 2, 54, 415, '012345678896', '2018-01-03', 26, 2, '123123', '2019-01-14', ''),
(4, 'Tushar', 'Islam', 'tushar009@yahoo.com', 6, 54, 425, '01747678731', '2018-06-03', 27, 1, '123123', '2019-01-14', '8c71986f7890749f7ef1666f0.jpg'),
(5, 'House', 'At', 'selim@gmail.com', 5, 54, 420, '012345678896', '2018-10-29', 28, 2, '123123', '2019-01-14', ''),
(6, 'Tania', 'At', 'selim@gmail.com', 2, 2, 16, '101010', '2019-01-03', 26, 1, '123123', '2019-01-14', ''),
(7, 'Kapali', 'Pal', 'kapali@gmail.com', 4, 2, 0, '01829875576', '2019-01-03', 28, 2, '123123', '2019-01-14', ''),
(10, 'Hasam', 'Mama ', 'hasan@gmail.com', 5, 2, 17, '12312312312', '2018-09-19', 24, 1, '123123', '2019-01-16', ''),
(11, 'setgetfg', 'sgsgyer', 'nawsish@gmail.com', 1, 3, 28, '4543564352525', '2019-01-07', 34, 2, '123456', '2019-01-29', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`BLOOD_GROUP_NO`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FEEDBACK_NO`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`GENDER_NO`);

--
-- Indexes for table `gen_districts`
--
ALTER TABLE `gen_districts`
  ADD PRIMARY KEY (`DISTRICT_NO`);

--
-- Indexes for table `gen_upazila`
--
ALTER TABLE `gen_upazila`
  ADD PRIMARY KEY (`UPAZILA_NO`);

--
-- Indexes for table `my_gore_db`
--
ALTER TABLE `my_gore_db`
  ADD PRIMARY KEY (`FLUID_USER_NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `BLOOD_GROUP_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FEEDBACK_NO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `GENDER_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gen_districts`
--
ALTER TABLE `gen_districts`
  MODIFY `DISTRICT_NO` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `gen_upazila`
--
ALTER TABLE `gen_upazila`
  MODIFY `UPAZILA_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=536;

--
-- AUTO_INCREMENT for table `my_gore_db`
--
ALTER TABLE `my_gore_db`
  MODIFY `FLUID_USER_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
