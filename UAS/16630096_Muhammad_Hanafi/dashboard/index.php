<?php
include("../koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charsets="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UAS Pemrograman Web</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/site.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body style="background-color:#f5f5f5;">
<div class="col-md-12" id="header" style="background:url(../assets/img/header2.jpg)">
</div>
	<div class="container">
		<div class="col-md-3" id="menu" style="height:800px;">
			<ul class="nav nav-pills nav-stacked" id="list">
				<li><a href="index.php?menu=home">Beranda</a></li>
				<li><a href="index.php?menu=data_user">Data User</a></li>
				<li class="dropdown" style="color:#fff;"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Master Data</a>
					<ul class="dropdown-menu">
						<li><a href="index.php?menu=jabatan" style="color:#fff;">Data List Jabatan</a></li>
						<li><a href="index.php?menu=karyawan_data" style="color:#fff;">Data Karyawan</a></li>
						<li><a href="index.php?menu=gaji" style="color:#fff;">Data Gaji Karyawan</a></li>
					</ul>
				</li>
				<li><a href="index.php?menu=profile">Profil Diri</a></li>
				<li><a href="index.php?menu=logout"><i class="fa fa-user"></i>Keluar</a></li>
			</ul>	
		</div>
		<div class="col-md-9" style="background-color:#fff; padding:0px 50px;height:800px;">
			<div class="row">
					<?php
          				if (isset($_GET['menu'])){
          				$menu=$_GET['menu'];
          				if($menu=="home"){include "home.php";}
                    	if($menu=="karyawan_data"){include "karyawan_data.php";}
                    	if($menu=="jabatan"){include "data_jabatan.php";}
                    	if($menu=="gaji"){include "gaji.php";}
                    	if($menu=="karyawan_cetak"){include "karyawan_cetak.php";}
                    	if($menu=="data_user"){include "data_user.php";}
                    	if($menu=="profile"){include "profile.php";}
                    	if($menu=="logout"){include "logout.php";}}
          					else{include"home.php";}
          			?>
			</div>
		</div>
<div class="col-md-12" style="background-color:#0b3050; color:#fff;padding:10px">
	<center><h5>UAS Pemrograman WEB dengan PHP - Developer : Muhammad Hanafi_16630096</h5></center>
</div>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
</script>
</body>
</html>