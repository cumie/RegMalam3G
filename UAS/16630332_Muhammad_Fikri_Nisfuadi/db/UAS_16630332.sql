-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2018 at 02:40 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aceng`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_buku`
--

CREATE TABLE `data_buku` (
  `id_buku` int(4) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `jenis_buku` varchar(20) NOT NULL,
  `jumlah_buku` int(10) NOT NULL,
  `sisa_buku` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_buku`
--

INSERT INTO `data_buku` (`id_buku`, `nama_buku`, `penerbit`, `penulis`, `jenis_buku`, `jumlah_buku`, `sisa_buku`) VALUES
(1, 'Ayat Ayat Cinta', 'Habiburrahman', 'El-Shirazzy', 'Novel', 10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `npm` int(20) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tmp_lhr` varchar(50) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`npm`, `nama_mahasiswa`, `jk`, `tmp_lhr`, `tgl_lhr`, `alamat`, `telp`) VALUES
(98765, 'Muhammad Akbar', 'Perempuan', 'Banjarmasin', '2000-09-09', 'hahaha', '9876543678'),
(3456789, 'Nurul Hayah', 'Perempuan', 'Banjarbaru', '2000-01-02', 'Jl.Trans Kalimantan', '3456789');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_buku`
--

CREATE TABLE `transaksi_buku` (
  `id_transaksi` int(4) NOT NULL,
  `npm` int(20) NOT NULL,
  `id_buku` int(4) NOT NULL,
  `tgl_pinjam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `batas_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_buku`
--

INSERT INTO `transaksi_buku` (`id_transaksi`, `npm`, `id_buku`, `tgl_pinjam`, `batas_pinjam`) VALUES
(5, 98765, 1, '2018-01-18 13:37:03', '2018-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `jk`) VALUES
(3, 'admin', 'admin', 'Muhammad Hanafi', 'Laki - Laki'),
(4, 'aya', 'aya', 'Nurul Hayah', 'Perempuan'),
(5, 'akbar', 'akbar', 'Muhammad Akbar', 'Laki - Laki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `transaksi_buku`
--
ALTER TABLE `transaksi_buku`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `id_buku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  MODIFY `npm` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3456790;
--
-- AUTO_INCREMENT for table `transaksi_buku`
--
ALTER TABLE `transaksi_buku`
  MODIFY `id_transaksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
