-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2018 at 11:41 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `latihan_uniska_app1`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `nik` varchar(10) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` char(12) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telpon`, `jabatan`, `status`) VALUES
('1426715678', 'Zainudin', 'Landasan Ulin', '1996-01-15', 'Jl.Anggrek', '081256789876', 'Operator', 'Tetap'),
('2345678875', 'Bahriansyah.S', 'Banjarbaru', '1978-09-16', 'Jl.Sidomulyo', '081345768765', 'Leader', 'Outsourcing'),
('3446417183', 'Eko Bahrian', 'Banjarbaru', '1978-03-16', 'Jl.Kenanga', '081345678765', 'Operator', 'Kontrak'),
('3456272868', 'Fuadi.A', 'Banjarmasin', '1978-11-16', 'Jl.Handil Bakti', '081345678954', 'Supervisor', 'Tetap'),
('9090939', 'Anshar udin noor rizko', 'Klaten', '1986-12-12', 'Jl.Pembatuan', '0891-9839-12', 'Manager', 'Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `npm` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `fakultas` varchar(30) NOT NULL,
  `semester` varchar(25) NOT NULL,
  PRIMARY KEY (`npm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telpon`, `fakultas`, `semester`) VALUES
(16630523, 'fitria nuraini', 'Guntung Manggis', '1978-02-16', 'cindai', '081345657689', 'fti', 'dua'),
(16634523, 'Sariam', 'Banjarbaru', '1978-04-16', 'Jl.Kenanga', '081265473829', 'fh', 'tiga'),
(16634576, 'Indrawati', 'Banjarmasin', '1978-05-16', 'Jl.Bupati', '081345678765', 'fti', 'tiga'),
(16635620, 'Yuliana', 'Guntung Manggis', '1978-02-16', 'Jl.Sembarang', '08979654324', 'fkip', 'satu'),
(16638976, 'Retno aliana', 'Martapura', '1999-03-19', 'Jl.Sekumpul', '081376589045', 'fh', 'dua');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE IF NOT EXISTS `pengajar` (
  `nik` varchar(8) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `tempat_lahir` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` char(12) NOT NULL,
  `fakultas` varchar(32) NOT NULL,
  `matakuliah` varchar(32) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telpon`, `fakultas`, `matakuliah`) VALUES
('14627147', 'Maulana.S.Kom', 'Banjarmasin', '1981-01-16', 'Jl.Handil Bersama', '081345678293', 'fkm', 'Algoritma'),
('23525661', 'Anhar Muzan', 'Martapura', '1978-01-16', 'Martapura', '081345678923', 'fti', 'Sistem Berkas'),
('38252386', 'mAULINA S.Pd', 'Landasan Ulin', '1989-09-16', 'Jl.Sapta Marga', '081523274384', 'fti', 'Sistem Basis Data'),
('41655828', 'M.Indra S.H', 'Banjarmasin', '1982-11-16', 'Jl.Sungai andai', '085642562742', 'fh', 'Sistem Berkas'),
('46u12i56', 'Maimunah S.Kom', 'Banjarbaru', '1981-05-16', 'Jl.Guntung Manggis', '081368764265', 'fkip', 'Sistem Berkas');
