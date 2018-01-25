-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 11:35 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satria`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` char(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tmpt_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kelamin` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `no_hp` char(12) NOT NULL,
  `kd_fakultas` char(5) NOT NULL,
  `kd_makul` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jns_kelamin`, `agama`, `no_hp`, `kd_fakultas`, `kd_makul`) VALUES
('123123', 'Imam Rivaldi', 'Banjarbaru', '2002-01-02', 'Laki - Laki', 'Islam', '123312', 'FTI', 'TGRAF'),
('12313', 'Khairunnajiii', 'Desa Jingah Habang Ulu', '1997-05-14', 'Laki Laki', 'Islam', '081231234124', 'FTI', 'WEB1');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `kd_fakultas` char(5) NOT NULL,
  `nm_fakultas` varchar(35) NOT NULL,
  `akreditasi` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`kd_fakultas`, `nm_fakultas`, `akreditasi`) VALUES
('FATEK', 'Fakultas Teknik', 'B'),
('FEKON', 'Fakultas Ekonomi', 'B'),
('FTI', 'Fakultas Teknologi Informasi', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kd_jurusan` char(5) NOT NULL,
  `nm_jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kd_jurusan`, `nm_jurusan`) VALUES
('SI', 'Sistem Informasi'),
('TI', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` char(8) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tmpt_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kelamin` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `no_hp` char(12) NOT NULL,
  `kd_fakultas` char(5) NOT NULL,
  `kd_jurusan` char(5) NOT NULL,
  `semester` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jns_kelamin`, `agama`, `no_hp`, `kd_fakultas`, `kd_jurusan`, `semester`) VALUES
('16630474', 'Kevin Juli Reksi', 'Teweh', '1995-07-11', 'Laki Laki', 'Protestan', '08123456791', 'FTI', 'TI', 3),
('16630539', 'Imam Rivaldiii', 'Banjarbaru', '2002-01-02', 'Laki - Laki', 'Islam', '09812312312', 'FTI', 'TI', 3);

-- --------------------------------------------------------

--
-- Table structure for table `makul`
--

CREATE TABLE `makul` (
  `kd_makul` char(5) NOT NULL,
  `nm_makul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makul`
--

INSERT INTO `makul` (`kd_makul`, `nm_makul`) VALUES
('TGRAF', 'Teknologi Grafika'),
('WEB1', 'Pemrograman Web 1'),
('WEB2', 'Pemrograman Web 2');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `npm` char(8) NOT NULL,
  `kd_fakultas` char(5) NOT NULL,
  `kd_jurusan` char(5) NOT NULL,
  `kd_makul` char(5) NOT NULL,
  `nip` char(10) NOT NULL,
  `nilai_angka` int(5) NOT NULL,
  `nilai_huruf` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`npm`, `kd_fakultas`, `kd_jurusan`, `kd_makul`, `nip`, `nilai_angka`, `nilai_huruf`) VALUES
('16630474', 'FTI', 'TI', 'WEB1', '12313', 87, 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `kd_fakultas` (`kd_fakultas`),
  ADD KEY `kd_makul` (`kd_makul`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`kd_fakultas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kd_jurusan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `kd_fakultas` (`kd_fakultas`),
  ADD KEY `kd_jurusan` (`kd_jurusan`);

--
-- Indexes for table `makul`
--
ALTER TABLE `makul`
  ADD PRIMARY KEY (`kd_makul`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD KEY `npm` (`npm`),
  ADD KEY `kd_fakultas` (`kd_fakultas`),
  ADD KEY `kd_jurusan` (`kd_jurusan`),
  ADD KEY `kd_makul` (`kd_makul`),
  ADD KEY `nip` (`nip`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`kd_fakultas`) REFERENCES `fakultas` (`kd_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`kd_makul`) REFERENCES `makul` (`kd_makul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kd_fakultas`) REFERENCES `fakultas` (`kd_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`kd_jurusan`) REFERENCES `jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kd_fakultas`) REFERENCES `fakultas` (`kd_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kd_jurusan`) REFERENCES `jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`kd_makul`) REFERENCES `makul` (`kd_makul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_5` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
