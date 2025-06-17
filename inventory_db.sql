-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2025 at 09:31 AM
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
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp(),
  `satuan_barang` varchar(20) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `status` enum('Tersedia','Habis') DEFAULT NULL,
  `barcode` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `kategori`, `jumlah`, `harga`, `tanggal_input`, `satuan_barang`, `lokasi`, `supplier`, `status`, `barcode`) VALUES
(4, 'Barang 1', 'Elektronik', 12, 1200000, '2025-06-17 06:30:42', 'unit', 'Gudang A', 'PT ABC', 'Tersedia', 'BRG00001'),
(5, 'Barang 2', 'ATK', 40, 3500, '2025-06-17 06:30:42', 'pcs', 'Gudang B', 'CV XYZ', 'Tersedia', 'BRG00002'),
(6, 'Barang 3', 'Makanan', 25, 5000, '2025-06-17 06:30:42', 'pcs', 'Gudang C', 'UD Maju', 'Habis', 'BRG00003'),
(7, 'Barang 4', 'Minuman', 60, 4000, '2025-06-17 06:30:42', 'liter', 'Gudang A', 'Indo Supplier', 'Tersedia', 'BRG00004'),
(8, 'Barang 5', 'Elektronik', 8, 1750000, '2025-06-17 06:30:42', 'unit', 'Gudang B', 'PT ABC', 'Tersedia', 'BRG00005'),
(9, 'Barang 6', 'ATK', 100, 2000, '2025-06-17 06:30:42', 'pcs', 'Gudang C', 'CV XYZ', 'Habis', 'BRG00006'),
(10, 'Barang 7', 'Makanan', 50, 2500, '2025-06-17 06:30:42', 'pcs', 'Gudang A', 'UD Maju', 'Tersedia', 'BRG00007'),
(11, 'Barang 8', 'Minuman', 30, 3500, '2025-06-17 06:30:42', 'liter', 'Gudang B', 'Indo Supplier', 'Tersedia', 'BRG00008'),
(12, 'Barang 9', 'Lainnya', 10, 15000, '2025-06-17 06:30:42', 'box', 'Gudang C', 'Global Tekno', 'Habis', 'BRG00009'),
(13, 'Barang 10', 'Elektronik', 5, 2400000, '2025-06-17 06:30:42', 'unit', 'Gudang A', 'PT ABC', 'Tersedia', 'BRG00010'),
(14, 'Barang 11', 'ATK', 80, 1200, '2025-06-17 06:30:42', 'pcs', 'Gudang B', 'CV XYZ', 'Tersedia', 'BRG00011'),
(15, 'Barang 12', 'Makanan', 90, 3000, '2025-06-17 06:30:42', 'pcs', 'Gudang C', 'UD Maju', 'Habis', 'BRG00012'),
(16, 'Barang 13', 'Minuman', 25, 5000, '2025-06-17 06:30:42', 'liter', 'Gudang A', 'Indo Supplier', 'Tersedia', 'BRG00013'),
(17, 'Barang 14', 'Elektronik', 6, 1850000, '2025-06-17 06:30:42', 'unit', 'Gudang B', 'PT ABC', 'Tersedia', 'BRG00014'),
(18, 'Barang 15', 'ATK', 70, 2700, '2025-06-17 06:30:42', 'pcs', 'Gudang C', 'CV XYZ', 'Habis', 'BRG00015'),
(19, 'Barang 16', 'Makanan', 45, 2800, '2025-06-17 06:30:42', 'pcs', 'Gudang A', 'UD Maju', 'Tersedia', 'BRG00016'),
(20, 'Barang 17', 'Minuman', 60, 4200, '2025-06-17 06:30:42', 'liter', 'Gudang B', 'Indo Supplier', 'Tersedia', 'BRG00017'),
(21, 'Barang 18', 'Lainnya', 20, 10000, '2025-06-17 06:30:42', 'box', 'Gudang C', 'Global Tekno', 'Habis', 'BRG00018'),
(22, 'Barang 19', 'Elektronik', 7, 2100000, '2025-06-17 06:30:42', 'unit', 'Gudang A', 'PT ABC', 'Tersedia', 'BRG00019'),
(23, 'Barang 20', 'ATK', 90, 1500, '2025-06-17 06:30:42', 'pcs', 'Gudang B', 'CV XYZ', 'Tersedia', 'BRG00020'),
(24, 'Barang 21', 'Makanan', 55, 2600, '2025-06-17 06:30:42', 'pcs', 'Gudang C', 'UD Maju', 'Habis', 'BRG00021'),
(25, 'Barang 22', 'Minuman', 70, 3800, '2025-06-17 06:30:42', 'liter', 'Gudang A', 'Indo Supplier', 'Tersedia', 'BRG00022'),
(26, 'Barang 23', 'Lainnya', 15, 13500, '2025-06-17 06:30:42', 'box', 'Gudang B', 'Global Tekno', 'Tersedia', 'BRG00023'),
(27, 'Barang 24', 'Elektronik', 9, 2000000, '2025-06-17 06:30:42', 'unit', 'Gudang C', 'PT ABC', 'Habis', 'BRG00024'),
(28, 'Barang 25', 'ATK', 65, 1700, '2025-06-17 06:30:42', 'pcs', 'Gudang A', 'CV XYZ', 'Tersedia', 'BRG00025'),
(29, 'Barang 26', 'Makanan', 35, 2900, '2025-06-17 06:30:42', 'pcs', 'Gudang B', 'UD Maju', 'Tersedia', 'BRG00026'),
(30, 'Barang 27', 'Minuman', 80, 3700, '2025-06-17 06:30:42', 'liter', 'Gudang C', 'Indo Supplier', 'Tersedia', 'BRG00027'),
(31, 'Barang 28', 'Lainnya', 18, 12500, '2025-06-17 06:30:42', 'box', 'Gudang A', 'Global Tekno', 'Habis', 'BRG00028'),
(32, 'Barang 29', 'Elektronik', 4, 2300000, '2025-06-17 06:30:42', 'unit', 'Gudang B', 'PT ABC', 'Tersedia', 'BRG00029'),
(33, 'Barang 30', 'ATK', 75, 2100, '2025-06-17 06:30:42', 'pcs', 'Gudang C', 'CV XYZ', 'Tersedia', 'BRG00030'),
(34, 'Barang 31', 'Makanan', 60, 3100, '2025-06-17 06:30:42', 'pcs', 'Gudang A', 'UD Maju', 'Habis', 'BRG00031'),
(35, 'Barang 32', 'Minuman', 55, 3900, '2025-06-17 06:30:42', 'liter', 'Gudang B', 'Indo Supplier', 'Tersedia', 'BRG00032'),
(36, 'Barang 33', 'Lainnya', 22, 14500, '2025-06-17 06:30:42', 'box', 'Gudang C', 'Global Tekno', 'Habis', 'BRG00033'),
(37, 'Barang 34', 'Elektronik', 11, 1950000, '2025-06-17 06:30:42', 'unit', 'Gudang A', 'PT ABC', 'Tersedia', 'BRG00034'),
(38, 'Barang 35', 'ATK', 85, 2300, '2025-06-17 06:30:42', 'pcs', 'Gudang B', 'CV XYZ', 'Habis', 'BRG00035'),
(39, 'Barang 36', 'Makanan', 42, 3200, '2025-06-17 06:30:42', 'pcs', 'Gudang C', 'UD Maju', 'Tersedia', 'BRG00036'),
(40, 'Barang 37', 'Minuman', 67, 4100, '2025-06-17 06:30:42', 'liter', 'Gudang A', 'Indo Supplier', 'Habis', 'BRG00037'),
(41, 'Barang 38', 'Lainnya', 19, 15500, '2025-06-17 06:30:42', 'box', 'Gudang B', 'Global Tekno', 'Tersedia', 'BRG00038'),
(42, 'Barang 39', 'Elektronik', 13, 1800000, '2025-06-17 06:30:42', 'unit', 'Gudang C', 'PT ABC', 'Habis', 'BRG00039'),
(43, 'Barang 40', 'ATK', 95, 2500, '2025-06-17 06:30:42', 'pcs', 'Gudang A', 'CV XYZ', 'Tersedia', 'BRG00040'),
(44, 'Barang 41', 'Makanan', 38, 3300, '2025-06-17 06:30:42', 'pcs', 'Gudang B', 'UD Maju', 'Tersedia', 'BRG00041'),
(45, 'Barang 42', 'Minuman', 48, 4400, '2025-06-17 06:30:42', 'liter', 'Gudang C', 'Indo Supplier', 'Tersedia', 'BRG00042'),
(46, 'Barang 43', 'Lainnya', 26, 16500, '2025-06-17 06:30:42', 'box', 'Gudang A', 'Global Tekno', 'Habis', 'BRG00043'),
(47, 'Barang 44', 'Elektronik', 10, 2150000, '2025-06-17 06:30:42', 'unit', 'Gudang B', 'PT ABC', 'Tersedia', 'BRG00044'),
(48, 'Barang 45', 'ATK', 88, 2400, '2025-06-17 06:30:42', 'pcs', 'Gudang C', 'CV XYZ', 'Tersedia', 'BRG00045'),
(49, 'Barang 46', 'Makanan', 47, 3400, '2025-06-17 06:30:42', 'pcs', 'Gudang A', 'UD Maju', 'Habis', 'BRG00046'),
(50, 'Barang 47', 'Minuman', 76, 4600, '2025-06-17 06:30:42', 'liter', 'Gudang B', 'Indo Supplier', 'Tersedia', 'BRG00047'),
(51, 'Barang 48', 'Lainnya', 30, 17500, '2025-06-17 06:30:42', 'box', 'Gudang C', 'Global Tekno', 'Habis', 'BRG00048'),
(52, 'Barang 49', 'Elektronik', 14, 2250000, '2025-06-17 06:30:42', 'unit', 'Gudang A', 'PT ABC', 'Tersedia', 'BRG00049'),
(53, 'Barang 50', 'ATK', 92, 2600, '2025-06-17 06:30:42', 'pcs', 'Gudang B', 'CV XYZ', 'Tersedia', 'BRG00050'),
(54, '', '', 0, 0, '2025-06-17 06:34:29', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('admin','viewer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin123', 'admin'),
(2, 'viewer', 'viewer123', 'viewer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
