-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 01:17 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `merpati_futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `lap_id` int(10) NOT NULL,
  `nama_lap` varchar(30) NOT NULL,
  `harga_lap` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`lap_id`, `nama_lap`, `harga_lap`) VALUES
(1, 'Lapangan Futsal A', 120000),
(2, 'Lapangan Futsal B', 120000),
(3, 'Lapangan Badminton', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `lapangan_book`
--

CREATE TABLE `lapangan_book` (
  `booking_code` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lapangan` varchar(20) NOT NULL,
  `book_ind` int(11) DEFAULT NULL,
  `book_time` time DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pay_ind` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan_book`
--

INSERT INTO `lapangan_book` (`booking_code`, `nama`, `tanggal`, `jam`, `lapangan`, `book_ind`, `book_time`, `user_id`, `pay_ind`) VALUES
(15, 'Danny', '2019-11-28', '09:00:00', 'Lapangan A', 0, '03:49:02', 2, 0),
(16, 'Danny', '2019-11-28', '10:00:00', 'Lapangan A', 0, '04:22:02', 2, 0),
(17, 'Danny', '2019-11-28', '11:00:00', 'Lapangan A', 0, '05:36:04', 2, 0),
(18, 'Danny', '2019-11-28', '12:00:00', 'Lapangan A', 0, '05:43:26', 2, 0),
(19, 'Danny', '2019-11-28', '13:00:00', 'Lapangan A', 0, '05:50:42', 2, 0),
(20, 'Danny', '2019-11-28', '14:00:00', 'Lapangan A', 0, '06:05:40', 2, 0),
(21, 'Danny', '2019-11-28', '07:00:00', 'Lapangan A', 0, '06:22:17', 2, 0),
(22, 'Danny', '2019-11-28', '08:00:00', 'Lapangan A', 0, '06:26:47', 2, 0),
(26, 'Danny', '2019-11-28', '07:00:00', 'Lapangan A', 0, '06:42:42', 2, 0),
(28, 'Danny', '2019-11-28', '07:00:00', 'Lapangan A', 1, '06:47:56', 2, 1),
(29, 'dannyajah', '2019-11-28', '08:00:00', 'Lapangan A', 1, '07:12:49', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_ind` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `email`, `user_ind`) VALUES
(1, 'Admin', 'admin', 'admin', 'admin@merpati-futsal.com', 1),
(2, 'Danny', 'dannybastian', 'dannybastian', 'danybstian@gmail.com', 2),
(3, 'Dandi', 'admin_dandi', 'admin_dandi', 'dandi@admin-merpati.com', 1),
(4, 'dannyajah', 'dannyajah', 'dannyajah', 'dannyajah@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`lap_id`);

--
-- Indexes for table `lapangan_book`
--
ALTER TABLE `lapangan_book`
  ADD PRIMARY KEY (`booking_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `lap_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lapangan_book`
--
ALTER TABLE `lapangan_book`
  MODIFY `booking_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
