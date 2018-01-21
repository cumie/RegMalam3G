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
    <center><h3><b>SELAMAT DATANG <br>DI PENDAFTARAN MOBILE LEGEND ONLINE</b></h3><hr><img src="assets/img/header.png" width="60%"></center>
  <form style="background-color:#e2e2e2; padding:40px; border-radius:10px;" id="demo-form2"  enctype="multipart/form-data" method="POST" class="form-horizontal form-label-left col-md-8 col-md-offset-2">
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12">ID Game <span class="required">*</span></label>
        <div class="col-md-5 col-sm-5 col-xs-12">
          <input type="text" name="id_game" required="required" placeholder="Isikan ID Game Anda" class="form-control col-md-7 col-xs-12">
        </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12">Email <span class="required">*</span></label>
        <div class="col-md-5 col-sm-5 col-xs-12">
          <input type="text" name="email" required="required" placeholder="Isikan E-mail Anda" class="form-control col-md-7 col-xs-12">
        </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12">Nama Pengguna <span class="required">*</span></label>
        <div class="col-md-5 col-sm-5 col-xs-12">
          <input type="text" name="username" required="required" placeholder="Isikan Username Anda" class="form-control col-md-7 col-xs-12">
        </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12">Password <span class="required">*</span></label>
        <div class="col-md-5 col-sm-5 col-xs-12">
          <input type="password" name="password" required="required" placeholder="*****************" class="form-control col-md-7 col-xs-12">
        </div>
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
        <input type="reset" class="btn btn-danger" value="Reset">
        <input type="submit" name="simpan" class="btn btn-primary" value="Daftar Online">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12 col-sm-12 col-xs-12">
      <hr>
      <center><a href="error.php" class="btn btn-success"> Apakah Anda Ingin Daftar Lewat Facebook ?</a></center>
      </div>
    </div>
	</form>            <div class="clearfix"></div>
<hr><div class="container"><h3 align="center"> UAS PEMROGRAMAN WEB</h2><p align="center">&copy; 2018 - UAS Pemrograman WEB dengan PHP - Developer : Muhammad Akbar Prasetya</p><br>
</div>
            </body>
            </html>


            <?php
            include "koneksi.php";
  if (isset($_POST['simpan'])){
      $a=$_POST['id_game'];
      $b=$_POST['username'];
      $c=$_POST['password'];
      $d=$_POST['email'];
        $hasil = mysqli_query($connect, "INSERT INTO pendaftar(id_game,username,password,email) values ('$a','$b','$c','$d')");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"sukses_pendaftaran.php\"
          </script>";
          }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"pendaftaran.php\"
            </script>";
          }  
      }
      ?>