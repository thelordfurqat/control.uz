-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2019 at 11:22 AM
-- Server version: 5.7.16
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `jihoz`
--

CREATE TABLE `jihoz` (
  `id` int(11) NOT NULL,
  `modell_id` int(11) NOT NULL,
  `stuff_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `seriya` varchar(50) NOT NULL,
  `holati` int(11) NOT NULL,
  `more` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jihoz`
--

INSERT INTO `jihoz` (`id`, `modell_id`, `stuff_id`, `room_id`, `seriya`, `holati`, `more`) VALUES
(23, 24, 12, 1, 'AA123321', 1, NULL),
(24, 25, 13, 1, 'AA321321321', 2, NULL),
(25, 25, 14, 13, 'Xushnud', 2, NULL),
(26, 25, 12, 14, 'Masharipov', 2, NULL),
(27, 24, 12, 4, 'bilimman', 1, NULL),
(28, 24, 12, 6, 'xzcxc', 1, NULL),
(29, 24, 15, 15, 'lkjasdlkj', 1, NULL),
(30, 24, 15, 16, 'kjkjhasdk', 1, NULL),
(31, 24, 15, 17, 'liullulas', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `modell`
--

CREATE TABLE `modell` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `more` text,
  `qurilma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modell`
--

INSERT INTO `modell` (`id`, `name`, `image`, `more`, `qurilma_id`) VALUES
(24, 'Lenovo G580', '2019-04-22-12 56 10.jpg', NULL, 1),
(25, 'Canon LBP 2900', '2019-04-22-01 04 26.jpg', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `qismmodel`
--

CREATE TABLE `qismmodel` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `more` text,
  `modell_id` int(11) NOT NULL,
  `qism_qurilma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qismmodel`
--

INSERT INTO `qismmodel` (`id`, `name`, `more`, `modell_id`, `qism_qurilma_id`) VALUES
(53, 'NT/Film 1366x768', NULL, 24, 9),
(54, 'Inter Core i5', NULL, 24, 13),
(55, '2 Gb', NULL, 24, 16),
(56, '1', NULL, 24, 18),
(57, '1', NULL, 24, 19),
(58, '1', NULL, 24, 20),
(59, '1', NULL, 24, 21),
(60, '1', NULL, 24, 22),
(61, '0', NULL, 25, 24);

-- --------------------------------------------------------

--
-- Table structure for table `qismqurilma`
--

CREATE TABLE `qismqurilma` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `more` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `qurilma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qismqurilma`
--

INSERT INTO `qismqurilma` (`id`, `name`, `more`, `type`, `qurilma_id`) VALUES
(9, 'Ekran', '', 'input', 1),
(10, 'Ekran diognali', '', 'input', 1),
(11, '3D ekran', '', 'checkbox', 1),
(12, 'Sensor Ekran', '', 'checkbox', 1),
(13, 'Protsessor', '', 'input', 1),
(14, 'Protsessor chastotasi', '', 'input', 1),
(15, 'Tezkor xotira', '', 'input', 1),
(16, 'Videoxotira', '', 'input', 1),
(17, 'Qattiq disk', '', 'input', 1),
(18, 'Kamera', '', 'checkbox', 1),
(19, 'Wifi', '', 'checkbox', 1),
(20, 'USB2', '', 'checkbox', 1),
(21, 'USB3', '', 'checkbox', 1),
(22, 'Barareya', '', 'checkbox', 1),
(23, 'Chop qilish texnalogiyasi', '', 'input', 2),
(24, 'Rangli', '', 'checkbox', 2);

-- --------------------------------------------------------

--
-- Table structure for table `qurilma`
--

CREATE TABLE `qurilma` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `more` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qurilma`
--

INSERT INTO `qurilma` (`id`, `name`, `more`) VALUES
(1, 'Notebook', 'Bu qurilma kompuyter hisoblanadi'),
(2, 'Printer', 'chop etish moslamasi');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `more` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `more`) VALUES
(1, '109', 'bu xona birni birnima'),
(2, 'qwertyu', NULL),
(3, '234567', NULL),
(4, 'xcvbnm', NULL),
(5, 'kjasda', NULL),
(6, '1090', NULL),
(7, 'asd', NULL),
(8, 'asda', NULL),
(9, 'asas', NULL),
(10, '12321', NULL),
(11, '32164', NULL),
(12, 'adsda', NULL),
(13, 'Xushnud', NULL),
(14, 'masharipov', NULL),
(15, 'lkjsdflkjsdf', NULL),
(16, 'kjkjhsdfkjhsd', NULL),
(17, 'iuiuoisdls', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stuff`
--

CREATE TABLE `stuff` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `more` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stuff`
--

INSERT INTO `stuff` (`id`, `name`, `tel`, `image`, `more`) VALUES
(1, 'Sultonova Asal', '+999671042', '2019-04-21-09 55 31.jpg', 'Bir kuni bopti bilan dipti bopdi'),
(3, 'Karimov Islom', '+998999671042', '2019-04-09-09-41-58.bmp', 'Bilimmanay'),
(12, 'Masharipov', '+998999671042', 'avatar.jpg', ''),
(13, 'Asal', NULL, '2019-04-22-11 20 20.jpg', NULL),
(14, 'Xushnud', NULL, 'avatar.jpg', NULL),
(15, 'kljkjasd', NULL, 'avatar.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jihoz`
--
ALTER TABLE `jihoz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `stuff_id` (`stuff_id`),
  ADD KEY `modell_id` (`modell_id`);

--
-- Indexes for table `modell`
--
ALTER TABLE `modell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qurilma_id` (`qurilma_id`);

--
-- Indexes for table `qismmodel`
--
ALTER TABLE `qismmodel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modell_id` (`modell_id`),
  ADD KEY `qism_qurilma_id` (`qism_qurilma_id`);

--
-- Indexes for table `qismqurilma`
--
ALTER TABLE `qismqurilma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qurilma_id` (`qurilma_id`);

--
-- Indexes for table `qurilma`
--
ALTER TABLE `qurilma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stuff`
--
ALTER TABLE `stuff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jihoz`
--
ALTER TABLE `jihoz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `modell`
--
ALTER TABLE `modell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `qismmodel`
--
ALTER TABLE `qismmodel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `qismqurilma`
--
ALTER TABLE `qismqurilma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `qurilma`
--
ALTER TABLE `qurilma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `stuff`
--
ALTER TABLE `stuff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jihoz`
--
ALTER TABLE `jihoz`
  ADD CONSTRAINT `jihoz_ibfk_1` FOREIGN KEY (`modell_id`) REFERENCES `modell` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jihoz_ibfk_2` FOREIGN KEY (`stuff_id`) REFERENCES `stuff` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jihoz_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modell`
--
ALTER TABLE `modell`
  ADD CONSTRAINT `modell_ibfk_1` FOREIGN KEY (`qurilma_id`) REFERENCES `qurilma` (`id`);

--
-- Constraints for table `qismmodel`
--
ALTER TABLE `qismmodel`
  ADD CONSTRAINT `qismmodel_ibfk_1` FOREIGN KEY (`modell_id`) REFERENCES `modell` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qismmodel_ibfk_2` FOREIGN KEY (`qism_qurilma_id`) REFERENCES `qismqurilma` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qismqurilma`
--
ALTER TABLE `qismqurilma`
  ADD CONSTRAINT `qismqurilma_ibfk_1` FOREIGN KEY (`qurilma_id`) REFERENCES `qurilma` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
