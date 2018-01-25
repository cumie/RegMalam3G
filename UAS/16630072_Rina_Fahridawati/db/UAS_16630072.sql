-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jan 2018 pada 14.55
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
-- Database: `uniska_latihan_app1`
--

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
('16.33.0723', 'muhammad supian tauri', 'sungai besar banjarbaru', '1985-02-08', 'banjarbaru \r\n', '0897338495', 'Manager', 'Tetap'),
('16.35.7865', 'shintia sari', 'cempaka ', '1998-04-05', 'jl.taruna praja ', '089738953743', 'Leader', 'Outsourcing'),
('16.37.8723', 'ahmad maulana', 'karangan putih martapura', '1983-03-09', 'jl.pangeran hidayatullah martapura', '089633445566', 'Operator', 'Outsourcing'),
('16.73.8645', 'hasna shofia', 'martapura', '1997-12-03', 'pakauman hulu', '085673843967', 'Supervisor', 'Kontrak'),
('16.76,8923', 'muhammad hanafi', 'guntung manggis', '1985-08-10', 'jl.anggrek raya', '087624582912', 'Leader', 'Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` char(8) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `fakultas` varchar(30) NOT NULL,
  `semester` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telpon`, `fakultas`, `semester`) VALUES
('16 45 33', 'budi', 'banjarmasin', '1996-03-07', 'guntung manggis', '087867321454', 'fkip', 'satu'),
('16 63 00', 'Rina fahridawati', 'martapura', '1996-12-11', 'jl.karya murung keraton', '089622989274', 'fkm', 'tiga'),
('16 73 88', 'novia retno', 'banjarbaru', '1995-08-02', 'kertak anyar ', '0879563413', 'fh', 'dua'),
('16.63.00', 'Rahmat bayu Fajrin', 'banjarbaru', '2000-02-04', 'jl.cemara', '0895836357353', 'fti', 'tiga'),
('929399', 'Muhammad Ramadhani Febriadi', 'Klayan A', '1999-12-12', 'Jl.Sidoarjo', '20040400', 'fti', 'satu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `nik` varchar(8) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `tempat_lahir` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` char(12) NOT NULL,
  `fakultas` varchar(32) NOT NULL,
  `matakuliah` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telpon`, `fakultas`, `matakuliah`) VALUES
('16 37 89', 'sari banun', 'martapura', '1995-12-08', 'jl.sekumpul ujung', '087856892314', 'fkm', 'satu'),
('16 71 33', 'muhammad rizky', 'banjarmasin', '1993-12-04', 'jl.melati', '089374567897', 'fh', 'tiga'),
('16 76 22', 'rini pebriadi', 'banjarbaru', '1998-06-21', 'jl.rahayu', '089634561254', 'fti', 'tiga'),
('16 87 33', 'rafi ', 'landasan ulin', '1995-12-11', 'banjarbaru', '089734567891', 'fkip', 'dua'),
('16.63.08', 'muhammad alif', 'banjarmasin', '1996-03-05', 'jl.cendrawasih', '089622989273', 'fkip', 'satu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
