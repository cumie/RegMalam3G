-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 25. Januari 2018 jam 15:01
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uas_16630219`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` char(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tmpt_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kelamin` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `no_hp` char(12) NOT NULL,
  `kd_fakultas` char(5) NOT NULL,
  `kd_makul` char(5) NOT NULL,
  PRIMARY KEY (`nip`),
  KEY `kd_fakultas` (`kd_fakultas`),
  KEY `kd_makul` (`kd_makul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jns_kelamin`, `agama`, `no_hp`, `kd_fakultas`, `kd_makul`) VALUES
('2134124', 'Yogi', 'California', '1989-09-09', 'Laki - Laki', 'Islam', '08224421390', 'FTI', 'WEB2'),
('8132921', 'Satria Surapto', 'Tapin', '1998-01-06', 'Laki - Laki', 'Islam', '082251543214', 'FTI', 'WEB1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `kd_fakultas` char(5) NOT NULL,
  `nm_fakultas` varchar(35) NOT NULL,
  `akreditasi` char(5) NOT NULL,
  PRIMARY KEY (`kd_fakultas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`kd_fakultas`, `nm_fakultas`, `akreditasi`) VALUES
('FEKON', 'Fakultas Ekonomi', 'B'),
('FH', 'Fakultas Hukum', 'B'),
('FISIP', 'Fakultas FISIP', 'B'),
('FKM', 'Fakultas Kesehatan Masyarakat', 'B'),
('FML', 'Fakultas Mobile Legend', 'A+'),
('FTI', 'Fakultas Teknik Informatika', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `kd_jurusan` char(5) NOT NULL,
  `nm_jurusan` varchar(25) NOT NULL,
  PRIMARY KEY (`kd_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kd_jurusan`, `nm_jurusan`) VALUES
('AK', 'Akuntansi'),
('Kesme', 'Kesehatan Masyarakat'),
('SI', 'Sistem Informasi'),
('Tek', 'Teknik'),
('TI', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `npm` char(8) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tmpt_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kelamin` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `no_hp` char(12) NOT NULL,
  `kd_fakultas` char(5) NOT NULL,
  `kd_jurusan` char(5) NOT NULL,
  `semester` int(5) NOT NULL,
  PRIMARY KEY (`npm`),
  KEY `kd_fakultas` (`kd_fakultas`),
  KEY `kd_jurusan` (`kd_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jns_kelamin`, `agama`, `no_hp`, `kd_fakultas`, `kd_jurusan`, `semester`) VALUES
('1663019', 'Jason Statham', 'Cempaka', '1988-07-02', 'Laki - Laki', 'Katolik', '213123124', 'FH', 'Kesme', 5),
('16630219', 'Satria Surapto', 'Tapin', '1998-01-06', 'Laki - Laki', 'Islam', '082251543214', 'FTI', 'TI', 3),
('166390', 'Jack Sparrow', 'Tortuga', '1992-12-09', 'Laki - Laki', 'Islam', '0822123213', 'FTI', 'Tek', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `makul`
--

CREATE TABLE IF NOT EXISTS `makul` (
  `kd_makul` char(5) NOT NULL,
  `nm_makul` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_makul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `makul`
--

INSERT INTO `makul` (`kd_makul`, `nm_makul`) VALUES
('TGRAF', 'Teknologi Grafika'),
('WEB1', 'Pemrograman Web 1'),
('WEB2', 'Pemrograman Web 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `npm` char(8) NOT NULL,
  `kd_fakultas` char(5) NOT NULL,
  `kd_jurusan` char(5) NOT NULL,
  `kd_makul` char(5) NOT NULL,
  `nip` char(10) NOT NULL,
  `nilai_angka` int(5) NOT NULL,
  `nilai_huruf` char(5) NOT NULL,
  KEY `npm` (`npm`),
  KEY `kd_fakultas` (`kd_fakultas`),
  KEY `kd_jurusan` (`kd_jurusan`),
  KEY `kd_makul` (`kd_makul`),
  KEY `nip` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`kd_fakultas`) REFERENCES `fakultas` (`kd_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`kd_makul`) REFERENCES `makul` (`kd_makul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kd_fakultas`) REFERENCES `fakultas` (`kd_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`kd_jurusan`) REFERENCES `jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kd_fakultas`) REFERENCES `fakultas` (`kd_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kd_jurusan`) REFERENCES `jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`kd_makul`) REFERENCES `makul` (`kd_makul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_5` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
