-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 พ.ค. 2020 เมื่อ 06:01 AM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- โครงสร้างตาราง `empolyee`
--

CREATE TABLE `empolyee` (
  `id_pea` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `event_tb`
--

CREATE TABLE `event_tb` (
  `id_event` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `name_event` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `time_period` varchar(50) NOT NULL,
  `end` date NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `event_tb`
--

INSERT INTO `event_tb` (`id_event`, `room_id`, `name_event`, `start`, `time_period`, `end`, `username`) VALUES
(16, 1, 'นำเสนอฝึกงานและโปรเจค', '2020-05-13', 'fullday', '2020-05-13', '505972'),
(17, 1, 'นำเสนอฝึกงานและโปรเจค', '2020-05-13', 'fullday', '2020-05-13', '505972'),
(20, 43, 'นำเสนอฝึกงานและโปรเจค', '2020-05-13', 'fullday', '2020-05-13', '505972');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `room_tb`
--

CREATE TABLE `room_tb` (
  `room_id` int(10) NOT NULL,
  `room_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_owner` varchar(255) NOT NULL,
  `room_owner_th` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_size` varchar(255) NOT NULL,
  `room_lcd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_status` int(1) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `room_tb`
--

INSERT INTO `room_tb` (`room_id`, `room_name`, `room_owner`, `room_owner_th`, `room_location`, `room_type`, `room_size`, `room_lcd`, `room_status`, `username`) VALUES
(1, 'ห้องประชุม\r\n', 'CSD\r\n', 'กรส.ต.2 (อาคาร 3 ชั้น 4)\r\n', 'อาคาร 3 ชั้น 4\r\n', 'NOR\r\n', '10\r\n', 'LCD แบบ Overhead\r\n', 1, '505972'),
(2, 'ห้อง Video Conference\r\n', 'CSD\r\n', 'ฝปบ.ต.2 (ชั้น2)\r\n', 'อาคาร SCADA ชั้น 2\r\n', 'VDO\r\n', '20\r\n', 'LCD แบบ Overhead\r\n', 0, '505971'),
(43, 'ห้องกาสะลอง\r\n', 'R01\r\n', 'กรท.\r\n', 'อาคาร2 ชั้น 2\r\n', 'VDO\r\n', '20\r\n', 'TV LED\r\n', 1, '505972');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `room_tb`
--
ALTER TABLE `room_tb`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empolyee`
--
ALTER TABLE `empolyee`
  MODIFY `id_pea` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_tb`
--
ALTER TABLE `event_tb`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
