<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Selamat Datang Di Pendaftaran Mobile Legend Online</title>
  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/fonts/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="assets/css/custom.css" rel="stylesheet">
  <script src="assets/js/jquery.min.js"></script>
  <style type="text/css">
    .front {
      padding: 40px;

    }
  </style>
</head>
<body>
<div class="container">
  <div class="col-md-12">
    <center><h3><b>SELAMAT DATANG <br>DI SHOP ONLINE MOBILE LEGEND</b></h3><hr><img src="assets/img/header.png" width="60%"></center>
    <hr>
    <?php
    include "koneksi.php";
    $cek=mysqli_query($connect, "SELECT * FROM shop");
    while ($d=mysqli_fetch_array($cek)) {
      ?>
      <div class="col-md-3">
        <center><img src="assets/img/<?php echo $d['pic']; ?>" width="50%">
        <h4><b><?php echo $d['nama_shop']; ?></b></h4>
        <a class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>  Chart | <?php echo $d['harga']; ?></a></center>
      </div>
      <?php
    }
    ?>           
<div class="clearfix"></div>
<hr><div class="container"><h3 align="center"> UAS PEMROGRAMAN WEB</h2><p align="center">&copy; 2018 - UAS Pemrograman WEB dengan PHP - Developer : Muhammad Akbar Prasetya</p><br>
</div>
            </body>
            </html>