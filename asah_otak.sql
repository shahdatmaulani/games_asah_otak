-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 04:53 PM
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
-- Database: `asah_otak`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_kata`
--

CREATE TABLE `master_kata` (
  `id` int(11) NOT NULL,
  `kata` varchar(255) NOT NULL,
  `clue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_kata`
--

INSERT INTO `master_kata` (`id`, `kata`, `clue`) VALUES
(1, 'Gajah', 'Binatang darat terbesar dengan belalai panjang'),
(2, 'Singa', 'Dikenal sebagai raja hutan dengan surai di sekitar leher jantannya'),
(3, 'Harimau', 'Kucing besar dengan garis-garis hitam di tubuhnya'),
(4, 'Zebra', 'Kuda liar Afrika dengan pola garis-garis hitam dan putih'),
(5, 'Jerapah', 'Binatang dengan leher panjang yang digunakan untuk mencapai daun di puncak pohon'),
(6, 'Panda', 'Beruang hitam dan putih yang memakan bambu, berasal dari Tiongkok'),
(7, 'Koala', 'Marsupial kecil dari Australia yang suka tidur di pohon eukaliptus'),
(8, 'Kanguru', 'Binatang berkantung yang melompat-lompat, berasal dari Australia'),
(9, 'Lumba-lumba', 'Mamalia laut yang dikenal cerdas dan sering melompat di atas permukaan air'),
(10, 'Paus', 'Mamalia laut terbesar, ada yang dikenal dengan suara nyanyiannya'),
(11, 'Hiu', 'Predator laut dengan tubuh ramping dan gigi tajam'),
(12, 'Penguin', 'Burung yang tidak bisa terbang, hidup di daerah dingin dan berjalan dengan cara meluncur di atas perutnya'),
(13, 'Burung Unta', 'Burung terbesar yang tidak bisa terbang, terkenal dengan kecepatan larinya'),
(14, 'Komodo', 'Kadal terbesar di dunia, ditemukan di Indonesia'),
(15, 'Kucing', 'Binatang peliharaan yang sering dipelihara di rumah, dikenal dengan suaranya yang disebut meong'),
(16, 'Anjing', 'Binatang peliharaan setia yang dikenal sebagai sahabat manusia'),
(17, 'Kuda', 'Binatang yang sering digunakan untuk berkuda dan balapan'),
(18, 'Rusa', 'Binatang dengan tanduk bercabang yang hidup di hutan dan padang rumput'),
(19, 'Ular', 'Reptil tanpa kaki yang sering melata di tanah, beberapa spesiesnya berbisa'),
(20, 'Kupu-kupu', 'Serangga dengan sayap berwarna-warni yang indah dan metamorfosis dari ulat');

-- --------------------------------------------------------

--
-- Table structure for table `point_game`
--

CREATE TABLE `point_game` (
  `id_point` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `total_point` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `point_game`
--

INSERT INTO `point_game` (`id_point`, `nama_user`, `total_point`) VALUES
(1, 'Alex', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_kata`
--
ALTER TABLE `master_kata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_game`
--
ALTER TABLE `point_game`
  ADD PRIMARY KEY (`id_point`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_kata`
--
ALTER TABLE `master_kata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `point_game`
--
ALTER TABLE `point_game`
  MODIFY `id_point` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
