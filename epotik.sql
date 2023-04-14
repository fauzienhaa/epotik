-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 10:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '$2y$10$mtCqfDu0..ziLbQvyo93CubSIk.1/jXdT2rt/cKqeYpgdzfXs.fYa'),
(2, 'Muadz', 'muadz', '$2y$10$YXmopYgq6sWUYnj9gDSjket9PO1VxtDaoFSihyqR.NadqZ2PIlrlm'),
(3, 'fauzi', 'fauzi', '$2y$10$h7rT671KSWoyR62d11fRqOohzl6pgOG8NRNpQBpgzwLq9TYI6RMw2'),
(7, 'Muhammad Rizqi', 'mamad', '$2y$10$BjMVpgnZxvDK8Hylv8kWOuWMOC.bCODY1W4AfsOV07jxBvbTtsxui');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `kode` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `stok` int(11) NOT NULL,
  `hargabeli` int(11) NOT NULL,
  `hargajual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`kode`, `nama`, `kategori`, `satuan`, `stok`, `hargabeli`, `hargajual`) VALUES
('B000358', 'Adem Sari', 'Obat Bebas', 'Box', 55, 15500, 20000),
('C000951', 'Cod Liver Oil', 'Obat Bebas', 'Botol', 85, 9000, 12000),
('D000312', 'Panadol', 'Obat Bebas', 'Tablet', 100, 5000, 7000),
('E000357', 'Amoxilin', 'Obat Bebas', 'Tablet', 90, 16000, 20000),
('F000132', 'Aspirin', 'Obat Bebas', 'Tablet', 125, 17500, 22000),
('H000682', 'Acar bose', 'Obat Resep', 'Tablet', 230, 17000, 22000),
('J000967', 'Minyak Ikan Cod', 'Obat Bebas', 'Botol', 75, 35000, 39000),
('K000352', 'Antimo', 'Obat Bebas', 'Tablet', 100, 5000, 7500),
('K000356', 'Antimo Anak', 'Obat Bebas', 'Sachet', 140, 1000, 2500),
('L000632', 'Paramex', 'Obat Bebas', 'Tablet', 100, 5000, 7500),
('P000965', 'Bodrexin', 'Obat Bebas', 'Tablet', 215, 6500, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` enum('Belum Dibayar','Sudah Dibayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `id_user`, `kode_obat`, `nama_obat`, `harga`, `jumlah_beli`, `total`, `date`, `status`) VALUES
(11, 2, 'F000132', 'Aspirin', 22000, 34, 748000, '15-06-2021 19:11:22', 'Sudah Dibayar'),
(12, 1, 'E000357', 'Amoxilin', 20000, 54, 1080000, '15-06-2021 22:23:58', 'Sudah Dibayar'),
(13, 1, 'B000358', 'Adem Sari', 20000, 13, 260000, '15-06-2021 22:30:36', 'Sudah Dibayar'),
(14, 1, 'B000358', 'Adem Sari', 20000, 13, 260000, '15-06-2021 22:38:07', 'Sudah Dibayar'),
(15, 1, 'B000358', 'Adem Sari', 20000, 23, 460000, '15-06-2021 22:38:43', 'Sudah Dibayar'),
(16, 1, 'F000132', 'Aspirin', 22000, 3, 66000, '16-06-2021 05:11:32', 'Belum Dibayar'),
(18, 1, 'F000132', 'Aspirin', 22000, 5, 110000, '16-06-2021 07:57:26', 'Sudah Dibayar'),
(19, 2, 'K000352', 'Antimo', 7500, 15, 112500, '16-06-2021 10:53:55', 'Sudah Dibayar'),
(20, 1, 'B000358', 'Adem Sari', 20000, 4, 80000, '16-06-2021 10:58:57', 'Sudah Dibayar'),
(21, 1, 'E000357', 'Amoxilin', 20000, 8, 160000, '16-06-2021 11:00:15', 'Sudah Dibayar'),
(22, 1, 'K000352', 'Antimo', 7500, 15, 112500, '16-06-2021 16:43:15', 'Belum Dibayar'),
(23, 1, 'K000356', 'Antimo Anak', 2500, 10, 25000, '16-06-2021 17:01:05', 'Belum Dibayar'),
(24, 1, 'L000632', 'Paramex', 7500, 10, 75000, '16-06-2021 17:01:49', 'Belum Dibayar'),
(25, 2, 'F000132', 'Aspirin', 22000, 5, 110000, '16-06-2021 17:02:38', 'Belum Dibayar'),
(26, 6, 'C000951', 'Cod Liver Oil', 12000, 15, 180000, '16-06-2021 17:04:11', 'Belum Dibayar'),
(28, 6, 'L000632', 'Paramex', 7500, 10, 75000, '16-06-2021 17:12:30', 'Belum Dibayar'),
(29, 6, 'H000682', 'Acar bose', 22000, 15, 330000, '16-06-2021 17:14:24', 'Belum Dibayar'),
(30, 6, 'H000682', 'Acar bose', 22000, 5, 110000, '16-06-2021 17:23:13', 'Belum Dibayar'),
(31, 6, 'F000132', 'Aspirin', 22000, 5, 110000, '16-06-2021 22:24:46', 'Sudah Dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_riwayat`
--

INSERT INTO `tb_riwayat` (`id_riwayat`, `id_penjualan`, `id_user`, `id_admin`, `kode_obat`, `nama_obat`, `harga`, `jumlah_beli`, `total`, `date`) VALUES
(14, 14, 1, 1, 'B000358', 'Adem Sari', 20000, 13, 260000, '16-06-2021 16:55:28'),
(15, 11, 2, 2, 'F000132', 'Aspirin', 22000, 34, 748000, '16-06-2021 16:55:50'),
(16, 31, 6, 1, 'F000132', 'Aspirin', 22000, 5, 110000, '16-06-2021 22:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Marvi', 'marvi', '$2y$10$w73zyzSCnJv9w/uwqYkAq.sWw7fvHVKLkmHxrojj8mWyAjg7/49pK'),
(2, 'user', 'user', '$2y$10$zGvYO8zHLvoveAR44akMHeR.LWkmN1nuuoKjH3/rQE9nJqls8c5Wq'),
(6, 'Indra', 'indra', '$2y$10$mBgJRgigKKOHUEDTiUnn1ehSnlSgI6om8X00zISpZ87fhogCc2Q7G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD CONSTRAINT `tb_penjualan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`),
  ADD CONSTRAINT `tb_penjualan_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `tb_obat` (`kode`);

--
-- Constraints for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD CONSTRAINT `tb_riwayat_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `tb_penjualan` (`id_penjualan`),
  ADD CONSTRAINT `tb_riwayat_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `tb_obat` (`kode`),
  ADD CONSTRAINT `tb_riwayat_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`),
  ADD CONSTRAINT `tb_riwayat_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
