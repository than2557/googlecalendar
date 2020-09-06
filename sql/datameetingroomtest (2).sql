-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2020 at 03:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datameetingroomtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id_department` int(10) NOT NULL,
  `name_department` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id_department`, `name_department`) VALUES
(1, 'สารสนเทศและการสื่อสาร'),
(2, 'งานบัญชีการเงิน'),
(3, 'อำนวยการ');

-- --------------------------------------------------------

--
-- Table structure for table `empolyee`
--

CREATE TABLE `empolyee` (
  `id_pea` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `id_department` int(11) NOT NULL,
  `id_position` int(11) NOT NULL,
  `detail_position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empolyee`
--

INSERT INTO `empolyee` (`id_pea`, `username`, `name`, `lastname`, `password`, `level`, `id_department`, `id_position`, `detail_position_id`) VALUES
(1, '505972', 'สุภัทรา', 'มณีโชติ', 'fa717c1cae7a7b36f7518a5dfbb4b214', 1, 1, 1, 1),
(3, 'admin', 'ประทาน', 'โพธิ์ภู่', '25f9e794323b453885f5181f1b624d0b', 0, 1, 2, 2),
(4, 'user', 'กิตติ', 'ศิริ', 'fa717c1cae7a7b36f7518a5dfbb4b214', 0, 1, 2, 2),
(5, 'than2557', 'ประทาน', 'โพธิ์ภู่', '3e42520abd353c67245d860a4b4f9f64', 0, 1, 1, 1),
(6, 'user1', 'โต๋', 'พงศธร', '3e42520abd353c67245d860a4b4f9f64', 0, 1, 1, 1),
(7, 'sabaho', 'พิทักพล', ' ดิริศิลป์', '3e42520abd353c67245d860a4b4f9f64', 0, 1, 3, 6),
(8, 'thanagen47', 'พิทักพล ', 'ดิริศิลป์', '3e42520abd353c67245d860a4b4f9f64', 0, 1, 2, 3),
(9, 'thegoddrak', 'โต๋', 'test', '3e42520abd353c67245d860a4b4f9f64', 0, 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `event_tb`
--

CREATE TABLE `event_tb` (
  `id_event` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `name_event` varchar(100) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `visitor` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status_event` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_tb`
--

INSERT INTO `event_tb` (`id_event`, `room_id`, `name_event`, `start`, `end`, `username`, `visitor`, `status_event`, `time_start`, `time_end`) VALUES
(43, 45, 'test', '2019-09-09', '2019-09-10', '505972', 'สุภัทรา', 1, '08:30:00', '12:30:00'),
(44, 45, 'นำเสนอ', '2019-09-27', '2019-08-28', '505972', 'สุภัทรา', 1, '16:30:00', '18:30:00'),
(45, 43, 'นำเสนอ', '2019-09-25', '2019-09-26', '505972', 'สุภัทรา', 1, '08:30:00', '12:30:00'),
(47, 45, 'นำเสนอฝึกงานและโปรเจค', '2020-08-30', '2020-09-30', '505972', 'สุภัทรา', 0, '08:30:00', '12:30:00'),
(48, 2, 'นำเสนอฝึกงานและโปรเจค', '2020-08-27', '2020-08-27', '505972', 'สุภัทรา', 1, '16:30:00', '18:30:00'),
(49, 44, 'นำเสนอฝึกงานและโปรเจค', '2020-08-29', '2020-08-30', '505972', 'สุภัทรา', 1, '08:30:00', '16:30:00'),
(50, 1, 'นำเสนอโปรเจคครั้งที่ 3', '2020-08-30', '2020-08-30', '505972', 'สุภัทรา', 1, '08:30:00', '16:30:00'),
(51, 2, 'นำเสนอ', '2020-10-31', '2020-10-30', '505972', 'สุภัทรา', 1, '08:30:00', '12:30:00'),
(52, 45, 'นำเสนอ', '2020-09-09', '2020-09-10', '505972', 'สุภัทรา', 1, '13:00:00', '16:30:00'),
(54, 45, 'นำเสนอ', '2020-09-01', '2020-09-02', 'user1', 'โต๋', 1, '08:30:00', '12:30:00'),
(55, 2, 'นำเสนอ', '2020-09-01', '2020-09-01', 'thegoddrak', 'โต๋', 1, '08:30:00', '13:30:00'),
(57, 1, 'นำเสนอฝึกงานและโปรเจค', '2020-10-01', '2020-09-02', 'user1', 'โต๋', 1, '08:30:00', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id_position` int(10) NOT NULL,
  `id_department` int(10) NOT NULL,
  `position_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id_position`, `id_department`, `position_name`) VALUES
(1, 1, 'วางแผนสารสนเทศการสื่อสาร'),
(2, 1, 'สารสนเทศ'),
(3, 1, 'พัฒนาและสนับสนุนระบบสารสนเทศ'),
(4, 1, 'สื่อสารและโทรคมนาคม');

-- --------------------------------------------------------

--
-- Table structure for table `position_detail`
--

CREATE TABLE `position_detail` (
  `detail_position_id` int(10) NOT NULL,
  `id_position` int(10) NOT NULL,
  `detail_position_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position_detail`
--

INSERT INTO `position_detail` (`detail_position_id`, `id_position`, `detail_position_name`) VALUES
(1, 1, 'กองแผนสารสนเทศการสื่อสาร'),
(2, 1, 'กองบริการสารสนเทศการสื่อสาร'),
(3, 2, 'กองออกแบบระบบสารสนเทศ'),
(4, 2, 'กองคอมพิวเตอร์และเครือข่าย'),
(5, 2, 'กองมาตรฐานและความมั่นคงปลอดภัยสารสนเทศ'),
(6, 3, 'กองพัฒนาระบบสารสนเทศบริการลูกค้า'),
(7, 3, 'กองพัฒนาระบบสารสรเทศด้านการจัดการองค์กร'),
(8, 3, 'กองสนับสนุนระบบสารสนเทศ'),
(9, 4, 'กองออกแบบระบบสื่อสาร'),
(10, 4, 'กองบำรุงรักษาอุปกรณ์สื่อสาร'),
(11, 4, 'กองออกแบบระบบการสื่อสาร'),
(12, 4, 'กองบริหารเครือข่ายสื่อสาร');

-- --------------------------------------------------------

--
-- Table structure for table `room_tb`
--

CREATE TABLE `room_tb` (
  `room_id` int(10) NOT NULL,
  `room_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_owner` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_owner_th` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_size` varchar(255) NOT NULL,
  `room_lcd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_status` int(1) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_tb`
--

INSERT INTO `room_tb` (`room_id`, `room_name`, `room_owner`, `room_owner_th`, `room_location`, `room_type`, `room_size`, `room_lcd`, `room_status`, `username`) VALUES
(1, 'ห้องประชุม', 'CSD\r\n', 'กรส.ต.2 (อาคาร 3 ชั้น 4)', 'อาคาร 3 ชั้น 4', 'NOR', '20', 'LCD แบบ Overhead\r\n', 1, '505972'),
(2, 'ห้องVideoConference', 'CSD\r\n', 'ฝปบ.ต.2 (ชั้น2)\r\n', 'อาคาร SCADA ชั้น 2\r\n', 'VDO\r\n', '20\r\n', 'LCD แบบ Overhead\r\n', 1, '505972'),
(43, 'ห้องกาสะลอง', 'R01\r\n', 'กรท.\r\n', 'อาคาร2 ชั้น 2\r\n', 'VDO\r\n', '20\r\n', 'TV LED\r\n', 1, '505972'),
(44, 'ห้องประชุมที่1', '', 'ประทาน', 'อาคาร1ชั้น2', 'โปรเจคเตอร์', '20', '', 1, '505972'),
(45, 'ห้องกัลปพฤกษ์', '', 'กอก.', 'อาคาร 2 ชั้น 4', 'VDO', '120', '', 1, '505972');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `empolyee`
--
ALTER TABLE `empolyee`
  ADD PRIMARY KEY (`id_pea`);

--
-- Indexes for table `event_tb`
--
ALTER TABLE `event_tb`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id_position`);

--
-- Indexes for table `position_detail`
--
ALTER TABLE `position_detail`
  ADD PRIMARY KEY (`detail_position_id`);

--
-- Indexes for table `room_tb`
--
ALTER TABLE `room_tb`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id_department` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `empolyee`
--
ALTER TABLE `empolyee`
  MODIFY `id_pea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event_tb`
--
ALTER TABLE `event_tb`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id_position` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `position_detail`
--
ALTER TABLE `position_detail`
  MODIFY `detail_position_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_tb`
--
ALTER TABLE `room_tb`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
