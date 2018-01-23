-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Jan 2018 pada 11.04
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_16630254`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nik` int(14) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` int(15) NOT NULL,
  `prodi` varchar(40) NOT NULL,
  `matakuliah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_telepon`, `prodi`, `matakuliah`) VALUES
(12124, 'Hendra', 'BANJARMASIN', '1987-01-08', 878145676, 'Teknik Informatika', 'KOMPUTER JARINGAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `jabatan`, `status`) VALUES
(112244, 'Ferdy Hasan', 'Surabaya', '1978-12-06', 'Banjarmasin', '0780780780', 'Leader', 'Outsourching'),
(112255, 'Andriyani Fitria', 'Banjarmasin', '1996-09-12', 'Banjarmasin', '0878145545', 'Supervisor', 'Kontrak'),
(7776, 'Hasanudin', 'Banjarbaru', '1995-09-12', 'Banjarbaru', '0878154335', 'Operator', 'Outsourching');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs`
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
-- Dumping data untuk tabel `mhs`
--

INSERT INTO `mhs` (`npm`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_telepon`, `fakultas`, `semester`) VALUES
(16630254, 'Rizky wahyu saputra', 'Landasan Ulin', '1995-01-21', '0878154312', 'Teknik Informatika', 'Ganjil'),
(16630096, 'Muhammad Hanafi', 'Banjarbaru', '1995-01-08', '08781245554', 'Teknik Informatika', 'Ganjil'),
(16673999, 'Ryan Fadilah', 'Jorong', '1998-08-08', '0878154312', 'Teknik Sipil', 'Genap'),
(66678, 'Reza adrian', 'Banjarmasin', '1998-08-13', '0852345678', 'Teknik Sipil', 'Genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `no_wisata` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cp` varchar(200) NOT NULL,
  `waktu` datetime NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`no_wisata`, `nama`, `email`, `cp`, `waktu`, `pesan`) VALUES
(0, 'Zidni Ridwan Nulmuarif', 'reza@gmail.com', '083844164136', '0000-00-00 00:00:00', '"Banjarnegara Merupakan Kota yang memiliki banay wisata namun tidak dikelola dengan baik oleh pemerintah."'),
(6, 'Wahyu Tri Kurniawan12', 'Wahyu@gmail.com', '083844164137', '0000-00-00 00:00:00', '""Wah Ternyata Di banjarnegaraobjek wisatanya sanag banyak dan bervariasi yah.""'),
(11, 'Kadi Nurrohim', 'kadi@ryi.com', '083844164131', '0000-00-00 00:00:00', 'Bagi para pencinta traveling kunjungi banjarnegara khusunya kecamatan madukara dan sigaluh disana banyak obyek wisata yang belum di explore loh.'),
(13, 'Fauzan A mahanani', 'fauzan@mahanani.id', '083844164121', '2017-01-19 08:42:18', 'Dengan Adanya Website pariwisata merupakan hal yang tepat untuk memberikan informasi dan mempromosikan Destinasi wisata yang ada di Banjarnegara.'),
(14, 'Ahmad Mustaqim Maulana', 'ama@ama.zio', '083844164131', '2017-01-19 18:09:32', '"Semangatr Terus Buat Pariwisata Banjarnegara Pertamax gan."'),
(18, 'zaqinatun khalifah', 'zaqina@kina.com', '080844164133', '2017-01-22 10:43:28', 'Semangat Buat Pariwisata Banjarnegara.'),
(19, 'Srimardiyah', 'kadi@gmail.cpm', '080844164131', '2017-01-22 10:44:11', 'Wah Keren Nih kalau kita bisa promosikan obyek wisata secara online apalagi resmi itu. A+ buat Banjarnegara.'),
(20, 'Zidni Ridwan NulmUarif', 'user@gmail.com', '083844164133', '2017-06-21 01:58:01', 'Nice App'),
(21, 'kkki', 'jjgjgjg', 'jijij', '2017-06-21 02:14:19', 'jkjij\r\n\r\n'),
(22, 'aknak', 'aaak', 'zkakak', '2017-06-21 02:26:58', 'ksksk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`no_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `no_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
