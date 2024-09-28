-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 15, 2024 at 02:03 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kas_kelas`
--

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jul4` int DEFAULT '0',
  `aug1` int DEFAULT '0',
  `aug2` int DEFAULT '0',
  `aug3` int DEFAULT '0',
  `aug4` int DEFAULT '0',
  `sep1` int DEFAULT '0',
  `sep2` int DEFAULT '0',
  `sep3` int DEFAULT '0',
  `sep4` int DEFAULT '0',
  `okt1` int DEFAULT '0',
  `okt2` int DEFAULT '0',
  `okt3` int DEFAULT '0',
  `okt4` int DEFAULT '0',
  `nov1` int DEFAULT '0',
  `nov2` int DEFAULT '0',
  `nov3` int DEFAULT '0',
  `nov4` int DEFAULT '0',
  `des1` int DEFAULT '0',
  `des2` int DEFAULT '0',
  `des3` int DEFAULT '0',
  `des4` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id`, `nama`, `jul4`, `aug1`, `aug2`, `aug3`, `aug4`, `sep1`, `sep2`, `sep3`, `sep4`, `okt1`, `okt2`, `okt3`, `okt4`, `nov1`, `nov2`, `nov3`, `nov4`, `des1`, `des2`, `des3`, `des4`) VALUES
(61, 'dummy1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 'dummy2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 'dummy3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 'dummy4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 'dummy5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
