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


	<title>UTS Pemrograman Web</title>
	<link rel="stylesheet" type="text/css" href="css/site.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>

<div class="container">
	<div class="content">
		<nav class="navbar navbar-inverse">
		<div id="navbar">
		<ul class="dropDownMenu">
			<li><a href="">Beranda</a></li>
			<li><a href="#">Master Data</a>
				<ul>
				<li><a href="karyawan_data">Karyawan Data</a></li>
				</ul>
			</li>
				
			<li><a href="#">Laporan</a>
				<ul>
					<li><a href="">Cetak Data Karyawan</a></li>
				</ul>
				
			</li>	
		</ul>			
		</div>
		</nav>
	</div>
</div>

<div class="container">
	<div class="content">
		
	<h2>UTS Pemrograman Web</h2>
	<hr />

	<div class="well">
		<p>Selamat Datang Di Hasil UTS Pemrograman Web Dengan PHP</p>
	</div>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})

</script>
</body>
</html>