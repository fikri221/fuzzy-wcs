-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 06:23 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuzzy_wcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `suhu` float DEFAULT NULL,
  `kelembapan` float DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `suhu`, `kelembapan`, `tanggal`) VALUES
(1, 27, 90, '2021-04-03 09:59:41'),
(2, 30, 81, '2021-04-03 10:16:09'),
(3, 35, 18, '2021-05-16 00:25:16'),
(4, 30, 50, '2021-05-14 02:14:09'),
(5, 26.33, 38, '2021-05-25 10:59:21'),
(6, 26, 58, '2021-05-29 10:38:05'),
(8, 33, 57, '2021-06-11 09:55:24'),
(9, 28, 75, '2021-06-12 09:30:16'),
(10, 31, 62, '2021-06-13 10:56:01'),
(11, 31, 67, '2021-06-14 09:35:29'),
(12, 40, 20, '2021-06-15 00:46:06'),
(14, 10, 80, '2021-06-16 09:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `data_klbp_udara`
--

CREATE TABLE `data_klbp_udara` (
  `id` int(11) NOT NULL,
  `klbp_min` float NOT NULL,
  `klbp_med` float NOT NULL,
  `klbp_max` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_klbp_udara`
--

INSERT INTO `data_klbp_udara` (`id`, `klbp_min`, `klbp_med`, `klbp_max`) VALUES
(1, 20, 50, 80);

-- --------------------------------------------------------

--
-- Table structure for table `data_siram`
--

CREATE TABLE `data_siram` (
  `id` int(11) NOT NULL,
  `siram_min` int(11) NOT NULL,
  `siram_med` int(11) NOT NULL,
  `siram_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siram`
--

INSERT INTO `data_siram` (`id`, `siram_min`, `siram_med`, `siram_max`) VALUES
(1, 1, 8, 15);

-- --------------------------------------------------------

--
-- Table structure for table `data_suhu`
--

CREATE TABLE `data_suhu` (
  `id` int(11) NOT NULL,
  `suhu_min` float NOT NULL,
  `suhu_med` float NOT NULL,
  `suhu_max` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_suhu`
--

INSERT INTO `data_suhu` (`id`, `suhu_min`, `suhu_med`, `suhu_max`) VALUES
(1, 10, 30, 40);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `id_data` int(11) NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `id_data`, `hasil`) VALUES
(44, 6, 6.38039),
(45, 5, 9.16721),
(48, 8, 10.8156),
(58, 11, 6.83333),
(59, 10, 5.375),
(60, 1, 3.77941),
(62, 4, 1),
(63, 9, 2.94444),
(64, 3, 11.5),
(65, 12, 8),
(66, 2, 1),
(67, 13, 1),
(68, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_siram`
--

CREATE TABLE `jadwal_siram` (
  `id` int(11) NOT NULL,
  `pagi` time NOT NULL,
  `sore` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_siram`
--

INSERT INTO `jadwal_siram` (`id`, `pagi`, `sore`) VALUES
(6, '07:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id` int(11) NOT NULL,
  `suhu` varchar(50) NOT NULL,
  `kelembapan_tanah` varchar(50) NOT NULL,
  `kelembapan` varchar(50) NOT NULL,
  `hasil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id`, `suhu`, `kelembapan_tanah`, `kelembapan`, `hasil`) VALUES
(1, 'rendah', 'rendah', 'kering', 'lama'),
(2, 'rendah', 'rendah', 'sedang', 'normal'),
(3, 'rendah', 'rendah', 'basah', 'cepat'),
(4, 'sedang', 'rendah', 'kering', 'lama'),
(5, 'sedang', 'rendah', 'sedang', 'normal'),
(6, 'sedang', 'rendah', 'basah', 'cepat'),
(7, 'tinggi', 'rendah', 'kering', 'lama'),
(8, 'tinggi', 'rendah', 'sedang', 'normal'),
(9, 'tinggi', 'rendah', 'basah', 'cepat');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 1),
(2, 'admin2', 'admin2@gmail.com', 'admin2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_klbp_udara`
--
ALTER TABLE `data_klbp_udara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_siram`
--
ALTER TABLE `data_siram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_suhu`
--
ALTER TABLE `data_suhu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_siram`
--
ALTER TABLE `jadwal_siram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `data_klbp_udara`
--
ALTER TABLE `data_klbp_udara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_siram`
--
ALTER TABLE `data_siram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_suhu`
--
ALTER TABLE `data_suhu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `jadwal_siram`
--
ALTER TABLE `jadwal_siram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
