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

</head>
<body>


<div class="container">
	<div class="content">
	<div class="header">
	</div>
		<nav class="navbar navbar-inverse">
		<div id="navbar">
		<ul class="dropDownMenu">
			<li><a href="index.php">Beranda</a></li>
			<li><a href="#">Master Data</a>
				<ul>
				<li><a href="karyawan_data.php">Karyawan Data</a></li>
				<li><a href="mahasiswa_data.php">Mahasiswa Data</a></li>
				<li><a href="dosen_data.php">Dosen Data</a></li>
				</ul>
			</li>
				
			<li><a href="#">Laporan</a>
				<ul>
					<li><a href="karyawan_cetak.php">Cetak Data Karyawan</a></li>
					<li><a href="mahasiswa_cetak.php">Cetak Data Mahasiswa</a></li>
					<li><a href="dosen_cetak.php">Cetak Data Mahasiswa</a></li>
				</ul>
				<li><a href="profile.php">Kontak Profil</a></li>
				
			</li>	
		</ul>			
		</div>
		</nav>
	</div>
</div>

<div class="container">
	<div class="content">