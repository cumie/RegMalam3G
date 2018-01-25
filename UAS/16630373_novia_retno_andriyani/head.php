<? include ("koneksi.php");?>
<? include ("library.php");?>
<!doctype html>
<html leng="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>web saya</title>
    <link href="css/site.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img">
    <link rel="stylesheet" href="css/tambah.css">
    <style type="text/css">
      .navbar-inverse{
		  font-size:16px;
		background-color: #368815;
       }
    </style>
    </head>
<body background="img/23.jpg">
<div class="container">
	<div class="content">
	<img class="img" src="img/web.jpg" height="137" width="100%">
    	<nav class="navbar navbar-inverse">
        <div id="navbar">
        <ul class="dropDownMenu">
        	<li><a href="index.php">Beranda</a>
            <li><a href="">Master Data</a>
            	<ul>
                	<li><a href="karyawan_data.php">Data Karyawan</a></li>
					 </li>
					<li><a href="mahasiswa_data.php">Data mahasiswa</a></li>
                </ul>
            </li>
            <li><a href="">Laporan</a>
            	<ul>
                	<li><a href="karyawan_cetak.php">Cetak Data Karyawan</a></li>
					<li><a href="mahasiswa_cetak.php">Cetak Data mahasiswa</a></li>
                </ul>
            </li>
            <li><a href="profil.php">Profilku</a>
        </ul>
        </div>
        </nav>
    </div>
</div>
<div class="container">
	<div class="content"> 
</div>
</div>