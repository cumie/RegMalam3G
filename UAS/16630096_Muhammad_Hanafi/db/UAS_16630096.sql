-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 09:06 PM
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
-- Database: `uniska`
--

-- --------------------------------------------------------

--
-- Table structure for table `gaji_karyawan`
--

CREATE TABLE `gaji_karyawan` (
  `id_gaji` int(4) NOT NULL,
  `nik` int(20) NOT NULL,
  `nominal` varchar(30) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji_karyawan`
--

INSERT INTO `gaji_karyawan` (`id_gaji`, `nik`, `nominal`, `bulan`) VALUES
(3, 16630096, '9000000000', 'Januari'),
(4, 16630763, '900000', 'Mei');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(10) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` char(12) NOT NULL,
  `id_jabatan` int(4) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `jk`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telpon`, `id_jabatan`, `status`) VALUES
('16630096', 'Muhammad Hanafi', 'Laki - Laki', 'Guntung Payung', '1993-12-10', 'Jl.Sungai Sumba       	  ', '085393095140', 2, 'Tetap'),
('16630487', 'Muhammad Akbar Prasetya', 'Laki - Laki', 'Banjarbaru', '1997-01-10', 'Jl.Kemuning      	        	  ', '080989892377', 2, 'Tetap'),
('16630763', 'Riky Irawan', 'Laki - Laki', 'Brimob', '1995-12-01', 'Jl.Karamunting      	  ', '085231319889', 4, 'Outsourcing'),
('16630860', 'Muhammad Ramadani Febriyadi', 'Laki - Laki', 'Banjarbaru', '1995-07-11', 'jl.sidomulyo      	  ', '085116784532', 1, 'Tetap'),
('6567890', 'Aya Cantik', 'Perempuan', 'Singapore', '2000-09-09', 'Amerika', '876534567', 1, 'Tetap'),
('9876543456', 'Nurul Hayah', 'Perempuan', 'Banjarmasin', '2000-04-27', 'Banjarmasin', '987654345676', 1, 'Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `list_jabatan`
--

CREATE TABLE `list_jabatan` (
  `id_jabatan` int(4) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_jabatan`
--

INSERT INTO `list_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Manajer'),
(2, 'Supervisor'),
(4, 'Leader'),
(7, 'Direktur Utama'),
(8, 'Personalia');

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
-- Indexes for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `list_jabatan`
--
ALTER TABLE `list_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  MODIFY `id_gaji` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `list_jabatan`
--
ALTER TABLE `list_jabatan`
  MODIFY `id_jabatan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
