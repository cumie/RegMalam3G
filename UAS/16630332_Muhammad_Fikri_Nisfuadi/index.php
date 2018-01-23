<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LOGIN</title>
  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/fonts/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="assets/css/custom.css" rel="stylesheet">
  <script src="assets/js/jquery.min.js"></script>
</head>
<body style="background::#fffff0; color:#000000">
<div class="container">
  <div class="col-md-4 col-sm-8 col-md-offset-4" style="padding-top:100px">
          <form action="cek_login.php" method="post">
            <h1 align="center">AKUN LOGIN</h1>
            <div class="form-group has-feedback"><input type="text" class="form-control" value="admin" placeholder="Username" name="username" required="" />
			<span class="glyphicon glyphicon-user form-control-feedback"></span></div>
            <div class="form-group has-feedback"><input type="password" class="form-control" value="admin" placeholder="Password" name="password" required="" />
			<span class="glyphicon glyphicon-lock form-control-feedback"></span></div>
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
            <div class="clearfix"></div>
            <div class="separator">
              <div><h3 align="center"> UAS PEMROGRAMAN WEB</h2><p align="center"> <br> Oleh : Muhammad Fikri Nisfuadi</p></div>
            </div>
          </form>
    </div>
  </div>
</body>
</html>
