<?php
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charsets="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UAS Pemrograman Web</title>
	<link rel="stylesheet" type="text/css" href="assets/css/site.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
  </div>
</head>
<body style="background-color:#656d73; margin: 20px">
<div class="container">
<div class="col-md-12" style="background-color:#244867; color:#F8F8FF;padding:15px">
	<ul class="dropDownMenu">
		<li><a href="index.php">Beranda</a></li>
		<li><a href="#">Master Data</a>
			<ul>
			    <li><a href="index.php?menu=data_pelanggan" style="color::#F8F8FF;">Data Pelanggan</a></li>
				<li><a href="index.php?menu=data_kamar" style="color::#F8F8FF;">Data Kamar</a></li>
			</ul>
		</li>
		<li><a href="index.php?menu=booking">Booking Hotel</a></li>
		<li><a href="index.php?menu=profile">Profil Diri</a></li>
	</ul>			
</div>
<div class="col-md-12" style="background-color:#Fcfcfc;">
	<div class="content">
		<?php
			if (isset($_GET['menu'])){
 				$menu=$_GET['menu'];
        		if($menu=="home"){include "home.php";}
        		if($menu=="booking"){include "booking.php";}
        		if($menu=="data_kamar"){include "data_kamar.php";}
        		if($menu=="data_pelanggan"){include "data_pelanggan.php";}
                if($menu=="profile"){include "profile.php";}}
          		else{include"home.php";}
        ?>
	</div>
</div>
<div class="col-md-12" style="background-color:#244867; color:#F8F8FF;padding:15px">
	<center><h5>UAS Pemrograman WEB dengan PHP - Oleh : Muhammad Noor Feizi </h5></center>
</div>
	</div>
</body>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
</script>
</body>
</html>