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

	<link rel="stylesheet" type="text/css" href="css/site.css" />
		<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>


</head>
<body>

<div class="container">
	<div class="content">

		<div class="header"> 
				<img src="img/mawargin.jpg" width="100%">
				</div> 


		<nav class="navbar navbar-inverse">
		<div id="navbar">
		<ul class="dropDownMenu">
			<li><a href="index.php">Beranda</a></li>
			<li><a href="#">Master Data</a><ul>
			<li><a href="karyawan_data.php">Karyawan Data</a></li></ul></li>
			<li><a href="#">Laporan</a><ul>
			<li><a href="karyawan_cetak.php">Cetak Data Karyawan</a></li></ul>
			<li><a href="profil.php">Profil</a></li>
			<li><a href="dosen_data.php">Dosen</a></li>
					
			</li>	
		</ul>			
		</div>
		</nav>
	</div>
</div>

<div class="container">
	<div class="content">