-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 09:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playground`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(4) NOT NULL,
  `id_pegawai_user` int(4) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `maker_pegawai` int(4) NOT NULL,
  `tanggal_pegawai` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_pegawai_user`, `nama_pegawai`, `no_telp`, `maker_pegawai`, `tanggal_pegawai`) VALUES
(1, 3, 'norman ang', '0813710352523', 3, '2024-02-20 16:57:51'),
(4, 6, 'asep sumanto', '081376453652', 3, '2024-02-21 13:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_barang`
--

CREATE TABLE `pembelian_barang` (
  `id_pb` int(4) NOT NULL,
  `nama_pb` varchar(255) NOT NULL,
  `nominal_pb` text NOT NULL,
  `maker_pb` int(4) NOT NULL,
  `tanggal_pb` datetime NOT NULL DEFAULT current_timestamp(),
  `taggal_laporan` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_barang`
--

INSERT INTO `pembelian_barang` (`id_pb`, `nama_pb`, `nominal_pb`, `maker_pb`, `tanggal_pb`, `taggal_laporan`) VALUES
(2, 'komputer HP', '9999000', 3, '2024-02-21 16:35:45', '2024-02-21'),
(3, 'komputer acer', '8990000', 3, '2024-02-21 16:44:16', '2024-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `permainan`
--

CREATE TABLE `permainan` (
  `id_permainan` int(4) NOT NULL,
  `nama_permainan` varchar(255) NOT NULL,
  `harga_permainan` text NOT NULL,
  `maker_permainan` int(4) NOT NULL,
  `tanggal_permainan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permainan`
--

INSERT INTO `permainan` (`id_permainan`, `nama_permainan`, `harga_permainan`, `maker_permainan`, `tanggal_permainan`) VALUES
(1, 'basket', '10.000', 3, '2024-02-20 17:58:23'),
(2, 'ayunan', '10.000', 3, '2024-02-20 17:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `playground`
--

CREATE TABLE `playground` (
  `id_playground` int(4) NOT NULL,
  `id_permainan_playground` int(4) NOT NULL,
  `nama_pemain` varchar(255) NOT NULL,
  `durasi` varchar(24) NOT NULL,
  `jam_mulai` time NOT NULL DEFAULT current_timestamp(),
  `jam_selesai` time NOT NULL,
  `total_harga` text NOT NULL,
  `status` int(1) NOT NULL,
  `maker_playground` int(4) NOT NULL,
  `tanggal_playground` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_laporan` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playground`
--

INSERT INTO `playground` (`id_playground`, `id_permainan_playground`, `nama_pemain`, `durasi`, `jam_mulai`, `jam_selesai`, `total_harga`, `status`, `maker_playground`, `tanggal_playground`, `tanggal_laporan`) VALUES
(18, 2, 'norman ang', '1', '17:42:01', '18:46:01', '10.000', 2, 3, '2024-02-21 17:42:01', '2024-02-21'),
(19, 1, 'norman ang', '1', '17:42:07', '18:47:07', '10.000', 2, 3, '2024-02-21 17:42:07', '2024-02-21'),
(20, 1, 'test', '1', '14:11:30', '14:13:30', '10.000', 2, 3, '2024-02-21 14:11:30', '2024-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(3, 'Super Admin', '3dcf34a6023633a0d92521ec9c8d5ae4', 1),
(6, 'petugas playground', '3dcf34a6023633a0d92521ec9c8d5ae4', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `NO_TELP` (`no_telp`);

--
-- Indexes for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD PRIMARY KEY (`id_pb`);

--
-- Indexes for table `permainan`
--
ALTER TABLE `permainan`
  ADD PRIMARY KEY (`id_permainan`),
  ADD UNIQUE KEY `NAMA_PERMAINAN` (`nama_permainan`);

--
-- Indexes for table `playground`
--
ALTER TABLE `playground`
  ADD PRIMARY KEY (`id_playground`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `USERNAME` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  MODIFY `id_pb` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permainan`
--
ALTER TABLE `permainan`
  MODIFY `id_permainan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `playground`
--
ALTER TABLE `playground`
  MODIFY `id_playground` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
