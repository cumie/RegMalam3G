<?php
include "../koneksi.php";
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Administrator | Mobile Legend Online</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
</head>
<body style="background-color: #f3f0f0">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="index.php?menu=home">Beranda</a></li>
				<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Master Data <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?menu=data_user">Kelola User</a></li>
                        <li><a href="index.php?menu=genre">Master Genre</a></li>
                        <li><a href="index.php?menu=shop">Master Shop</a></li>
                    </ul>
                </li>	
				<li><a href="index.php?menu=pendaftar">Pendaftar Online</a></li>
				<li><a href="index.php?menu=verifikasi">Verifikasi Pendaftar</a></li>
				<li><a href="index.php?menu=profile">Profile Developer</a></li>			
			</ul>
			<form class="navbar-form navbar-right" role="search">
                <div class="input-group"  >
						
                    <input type="text" class="form-control" placeholder="Lakukan Pencarian ?">
                    <div class="input-group-btn">
						<a><button class="btn btn-primary">Search</button></a>
						</div>
                </div>
            </form>
		</div>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-9" style="margin-top:80px;">
			<div class="panel panel-default">
				<div class="panel-body">
				<?php
          				if (isset($_GET['menu'])){
          				$menu=$_GET['menu'];
          				if($menu=="pendaftar"){include "pendaftar.php";}
          				if($menu=="home"){include "home.php";}
                    	if($menu=="genre"){include "genre.php";}
                    	if($menu=="verifikasi"){include "verifikasi.php";}
                    	if($menu=="profile"){include "profile.php";}
                    	if($menu=="shop"){include "olshop.php";}
                    	if($menu=="data_user"){include "user.php";}
                    	if($menu=="logout"){include "logout.php";}}
          					else{include"home.php";}
          			?>
				</div>
			</div>
		</div>
		<div class="col-sm-3"  style="margin-top:80px;">
			<div class="panel panel-default">
			   <div class="panel-heading"><h4 class="text-center">Halaman Administrator</h4></div>
			   <div class="panel-body">
					<center><img src="../assets/img/user.png" width="80%" align="center">
					<p><hr><b>Ingat !</b>Jangan lupa logout setelah menggunakan halaman ini</p>
					<hr>
					<a href="index.php?menu=logout" class="btn btn-primary"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Logout / Keluar Aplikasi</a>
				</div>
			</div>		
		</div>			
	</div>			
</div>
<hr><div class="container"><h3 align="center"> UAS PEMROGRAMAN WEB</h2><p align="center">&copy; 2018 - UAS Pemrograman WEB dengan PHP - Developer : Muhammad Akbar Prasetya</p><br>
</div>		
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>				
</body>
</html>