-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 02:06 PM
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
-- Database: `toko_buku`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `databuku` ()   SELECT * FROM buku$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `noisbn` int(11) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_pokok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `gambar` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `noisbn`, `penulis`, `penerbit`, `tahun`, `stok`, `harga_pokok`, `harga_jual`, `gambar`) VALUES
(18, 'Gintama', 123456, 'Hideaki Sorachi', 'Gramedia', 2006, 55, 45000, 50000, 0x3339302d646f776e6c6f6164202831292e6a706567),
(19, 'One piece', 126482, 'Eiichiro Oda', 'Erlangga', 1997, 65, 50000, 52000, 0x393738363233303033353134322d312e6a7067),
(20, 'Record of Ragnarok', 273647, 'Takumi Fukui', 'Gramedia', 2017, 71, 40000, 43000, 0x3536382d646f776e6c6f616420283133292e6a706567),
(21, 'To Kill a Mockingbird', 187361, 'Harper Lee', 'Erlangga', 1960, 23, 50000, 57000, 0x636f76514e2d37332e6a7067),
(22, 'Laskar Pelangi', 826321, 'Andrea Hirata', 'Gramedia', 2005, 17, 30000, 32000, 0x646f776e6c6f61642e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_buku`, `jumlah`, `harga`, `total`) VALUES
(1, 2, 5, 1, 20000, 20000),
(2, 3, 5, 1, 20000, 20000),
(3, 4, 5, 1, 20000, 20000),
(4, 5, 7, 2, 40000, 80000),
(5, 5, 6, 1, 40000, 40000),
(6, 6, 7, 2, 40000, 80000),
(7, 6, 6, 1, 40000, 40000),
(8, 7, 7, 1, 40000, 40000),
(9, 8, 7, 1, 40000, 40000),
(10, 9, 5, 4, 45000, 180000),
(11, 10, 7, 9, 40000, 360000),
(12, 11, 10, 2, 50000, 100000),
(13, 12, 10, 8, 50000, 400000);

--
-- Triggers `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `penjualan` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
UPDATE buku set stok=stok-NEW.jumlah
WHERE id_buku=NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`) VALUES
(7, 'Berkah buku', 'jl. mangga 267', '087612347658');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` int(11) DEFAULT NULL,
  `status` varchar(59) DEFAULT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','pegawai','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama`, `alamat`, `telepon`, `status`, `username`, `password`, `level`) VALUES
(14, 'calvin', 'Jl. Mangga', 889711, 'Admin', 'Admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(15, 'andi', 'Jl. Apel', 827638, 'Pegawai', 'Pegawai', 'b69706c80477d3d04ecc1d8f62cdb35a', 'pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `pasok`
--

CREATE TABLE `pasok` (
  `id_pasok` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `jumlah` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasok`
--

INSERT INTO `pasok` (`id_pasok`, `id_distributor`, `id_buku`, `jumlah`, `tanggal`) VALUES
(8, 7, 18, '5', '2024-07-14');

--
-- Triggers `pasok`
--
DELIMITER $$
CREATE TRIGGER `tambah_pasok` AFTER INSERT ON `pasok` FOR EACH ROW BEGIN
UPDATE buku set stok=stok+new.jumlah
WHERE id_buku=new.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `total` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_kasir`, `total`, `tanggal`) VALUES
(3, 5, '20000', '2024-06-04'),
(4, 5, '20000', '2024-06-04'),
(6, 5, '120000', '2024-06-04'),
(7, 5, '40000', '2024-06-04'),
(8, 5, '40000', '2024-07-12'),
(9, 10, '180000', '2024-11-21'),
(10, 10, '360000', '2024-11-21'),
(11, 15, '100000', '2024-11-21'),
(12, 15, '400000', '2024-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan2`
--

CREATE TABLE `penjualan2` (
  `id_buku` int(11) NOT NULL,
  `kasir` int(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan2`
--

INSERT INTO `penjualan2` (`id_buku`, `kasir`, `jumlah`, `total`, `tanggal`) VALUES
(1, 0, 2, 0, '2024-05-26'),
(2, 0, 2, 0, '2024-05-26'),
(3, 0, 4, 0, '2024-05-29'),
(5, 0, 4, 0, '2024-06-01'),
(6, 0, 4, 0, '2024-06-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `pasok`
--
ALTER TABLE `pasok`
  ADD PRIMARY KEY (`id_pasok`),
  ADD KEY `id_distributor` (`id_distributor`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penjualan2`
--
ALTER TABLE `penjualan2`
  ADD PRIMARY KEY (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pasok`
--
ALTER TABLE `pasok`
  MODIFY `id_pasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penjualan2`
--
ALTER TABLE `penjualan2`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pasok`
--
ALTER TABLE `pasok`
  ADD CONSTRAINT `pasok_ibfk_1` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id_distributor`),
  ADD CONSTRAINT `pasok_ibfk_2` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id_distributor`),
  ADD CONSTRAINT `pasok_ibfk_3` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
