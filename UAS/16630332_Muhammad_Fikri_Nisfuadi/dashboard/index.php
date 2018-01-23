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
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  </div>
</head>
<body>
 <div id="header">
 	<img src="../assets/img/p.jpg" width="100%" height="200"/>
</div>
<div class="container">
<div class="col-md-12" style="background-color:#DC143C; color:#F8F8FF;padding:15px">
	<ul class="dropDownMenu">
		<li><a href="index.php">Beranda</a></li>
		<li><a href="index.php">Master Data</a>
			<ul style="background-color:#DC143C"> 
			    <li><a href="index.php?menu=mahasiswa_data" style="colorw:#F8F8FF;">Data Mahasiswa</a></li>
				<li><a href="index.php?menu=data_buku" style="color:#F8F8FF;">Data Buku</a></li>
				<li><a href="index.php?menu=transaksi_buku" style="color:#F8F8FF;">Transaksi Buku</a></li>
			</ul>
		</li>
		<li><a href="index.php?menu=profile">Profil Diri</a></li>
		<li><a href="index.php?menu=logout"><i class="fa fa-user"></i>Keluar</a></li>
	</ul>			
</div>
<div class="col-md-12" style="background-color:#F8F8FF;">
	<div class="content">
		<?php
			if (isset($_GET['menu'])){
 				$menu=$_GET['menu'];
        		if($menu=="home"){include "home.php";}
                if($menu=="mahasiswa_data"){include "mahasiswa_data.php";}
                if($menu=="data_user"){include "data_user.php";}
                if($menu=="data_buku"){include "data_buku.php";}
                if($menu=="transaksi_buku"){include "transaksi_buku.php";}
                if($menu=="profile"){include "profile.php";}
                if($menu=="logout"){include "logout.php";}}
          		else{include"home.php";}
        ?>
	</div>
</div>
<div class="col-md-12" style="background-color:#DC143C; color:#F8F8FF;padding:25px">
<center><h5>JANGAN LUPA LOG OUT SETELAH MENGGUNAKAN APLIKASI INI </h5></center>	
</div>
	</div>
</body>
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