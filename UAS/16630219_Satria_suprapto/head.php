<?php
include("koneksi.php");
include("library.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charsets="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UAS Pemrograman Web</title>
	<link rel="stylesheet" type="text/css" href="css/site.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="css/custom.css" rel="stylesheet">
</head>
<body>

<div class="container">
	<div class="content">
		<nav class="navbar navbar-inverse">
		<div id="navbar">
		<ul class="dropDownMenu">
			<li><a href="index.php">Beranda</a></li>
			<li><a href="#">Master Data</a>
				<ul>
				<li><a href="fakultas_data.php">Data Fakultas</a></li>
				<li><a href="jurusan_data.php">Data Jurusan</a></li>
				<li><a href="makul_data.php">Data Mata Kuliah</a></li>
				<li><a href="dosen_data.php">Data Dosen</a></li>
				<li><a href="mahasiswa_data.php">Data Mahasiswa</a></li>
				<li><a href="nilai_data.php">Data Nilai</a></li>
				</ul>
			</li>

			<li><a href="#">Laporan</a>
				<ul>
					<li><a href="dosen_cetak.php">Cetak Data Dosen</a></li>
					<li><a href="mahasiswa_cetak.php">Cetak Data Mahasiswa</a></li>
					<li><a href="nilai_cetak.php">Cetak Data Nilai</a></li>
				</ul>
				<li><a href="profil.php">Profile Saya</a></li>

			</li>
		</ul>
		</div>
		</nav>
	</div>
</div>

<div class="container">
	<div class="content">
