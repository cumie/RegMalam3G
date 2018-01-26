-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Jan 2018 pada 11.53
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_16630860`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `kd_barang` varchar(8) NOT NULL,
  `nama` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `merk` varchar(32) NOT NULL,
  `jenis` varchar(32) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`kd_barang`, `nama`, `tgl_masuk`, `merk`, `jenis`, `gambar`) VALUES
('12345678', 'Laptop', '1990-02-27', 'Honda', 'Transportas', ''),
('88888888', 'keyboard', '2018-01-01', 'Toshiba', 'Teknologi & Komunikasi', 'gambar'),
('CPU1001', 'Komputer', '2018-01-01', 'Toshiba', 'Teknologi & Komunikasi', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(10) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` char(12) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telpon`, `jabatan`, `status`) VALUES
('5254242654', 'hfjh', 'tfhg', '1990-08-27', 'ugu', '081255604576', 'Operator', 'Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `kode_kegiatan` varchar(8) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `estimasi` char(32) NOT NULL,
  `penanggung_jawab` varchar(32) NOT NULL,
  `jenis_kegiatan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`kode_kegiatan`, `nama`, `tgl_mulai`, `estimasi`, `penanggung_jawab`, `jenis_kegiatan`) VALUES
('1818181', 'Festival Musil', '2018-01-25', '2hari', 'Dhani', 'Seni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
