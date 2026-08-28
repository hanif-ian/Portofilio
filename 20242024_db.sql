-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2026 at 04:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20242024_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `periode` varchar(200) NOT NULL,
  `posisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `judul`, `deskripsi`, `periode`, `posisi`) VALUES
(0, 'ATMI', 'D3 TMK (Teknik Mekatronika),angkatan 57\r\n', 'Period: 2024 - 2027', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `pesan`, `tanggal`) VALUES
(1, 'Anton', 'antonwisnuawm@gmail.com', 'baik banget orangnya', '2026-08-27 12:14:19'),
(2, 'anton', 'antonwisnuawm@gmail.com', 'wowwww', '2026-08-27 12:16:34'),
(3, 'hans', 'hanifaprillian1987@gmail.com', 'haloooo', '2026-08-28 01:05:58'),
(4, 'hans', 'hanifaprillian1987@gmail.com', 'yoyoyoyoyoyo', '2026-08-28 01:11:56'),
(5, 'hans', 'hanifaprillian1987@gmail.com', 'ouiiiiiiiii', '2026-08-28 01:12:38'),
(6, 'hans', 'hanifaprillian1987@gmail.com', 'ouiiiiiiiii', '2026-08-28 01:13:09'),
(7, 'hans', 'hanifaprillian1987@gmail.com', 'yiyyyy', '2026-08-28 01:21:45'),
(8, 'hans', 'hanifaprillian1987@gmail.com', 'oiiiiiiii', '2026-08-28 01:26:31'),
(9, 'hans', 'hanifaprillian1987@gmail.com', 'fghfghdfg', '2026-08-28 01:28:39'),
(10, 'hans', 'hanifaprillian1987@gmail.com', 'asfdasdfsdaf', '2026-08-28 01:54:37'),
(11, 'hans', 'hanifaprillian1987@gmail.com', 'tes', '2026-08-28 01:57:17'),
(12, 'hans', 'hanifaprillian1987@gmail.com', 'tesss', '2026-08-28 02:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `nama`, `deskripsi`, `gambar`) VALUES
(1, 'AUTOMATION', 'Industrial automation, robotics, and control systems', 'robot.png'),
(3, 'ELECTRICAL', 'Electrical systems, circuits, sensors, and control.', 'Electrical.png'),
(4, 'PLC PROGRAMMING', 'PLC programming, ladder logic, and automation.', 'PLC.png');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `pilihan` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `pilihan`, `tanggal`) VALUES
(1, 'Very Satisfied', '2026-08-27 12:39:03'),
(2, 'Satisfied', '2026-08-27 12:39:20'),
(3, 'Satisfied', '2026-08-27 12:39:24'),
(4, 'Neutral', '2026-08-27 12:42:37'),
(5, 'Very Satisfied', '2026-08-27 12:47:57'),
(6, 'Very Satisfied', '2026-08-28 01:06:12'),
(7, 'Very Satisfied', '2026-08-28 01:06:30'),
(8, 'Satisfied', '2026-08-28 01:06:40'),
(9, 'Very Satisfied', '2026-08-28 02:09:42'),
(10, 'Very Satisfied', '2026-08-28 02:09:50'),
(11, 'Neutral', '2026-08-28 02:21:13'),
(12, 'Neutral', '2026-08-28 02:21:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
