-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 05:38 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_16630373`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(10) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` char(12) NOT NULL,
  `jabatan` varchar(12) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `jabatan`, `status`) VALUES
('11201201', 'Wahyu Mustajib', 'Wonosobo', '1994-11-24', 'Jl. Sapta Marga', '082214845808', 'Manager', 'Tetap'),
('11201202', 'Sulistyawati', 'Banjarmasin', '1995-12-28', 'Jl. Sultan Adam gang Benawa', '085356451987', 'Supervisor', 'Kontrak'),
('11201203', 'Anni Susilawati', 'Amuntai', '1995-06-22', 'Jl. P. Hidayatullah', '087814347656', 'Leader', 'Kontrak'),
('11201204', 'Faizal Ardiansyah', 'Balikpapan', '1996-12-23', 'Jl. Panglima Batur', '081276542333', 'Operator', 'Outsourching');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `npm` int(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `fakultas` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`npm`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_telepon`, `fakultas`, `semester`) VALUES
(16630510, 'Gusti Nurshobah', 'Martapura', '1998-07-07', '082225009880', 'Teknik Informatika', 'Ganjil'),
(16630878, 'Dita ', 'Martapura', '1996-12-24', '085244318128', 'Teknik Informatika', 'Ganjil'),
(16635254, 'Esty Yuliani', 'Gambut', '1998-07-21', '085352117789', 'Teknik Informatika', 'Ganjil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
