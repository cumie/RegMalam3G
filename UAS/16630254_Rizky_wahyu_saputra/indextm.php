


<!DOCTYPE html>
<html>
<head>
	<title>Buku Proses</title>
	<style type="text/css">

body {
 
}

h2.wisata{
	text-align: center;
color: black;

}

input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}



textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
}

	</style>
</head>
<body>

<form action="buku_proses.php" method="POST">
<img class="img" src="img/user.png"  width="50">

	<h2 class="wisata">data tamu</h2>
<label>Nama Lengkap</label>
<input type="text" name="nama" placeholder="Nama Lengkap" required><br>
<label>E-mail</label>
<input type="text" name="email" placeholder="E-mail" required><br>
<label>Waktu</label>
<input type="text" name="waktu" value="<?php date_default_timezone_set("America/New_York"); echo date('Y-m-d H:i:sa') ?>"> 
<label>Nomor Telepon</label>
<input type="text" name="cp" placeholder="Nomor Telepon" required><br>
<label>Pesan Anda</label>
<textarea cols="5" name="pesan" rows="5" placeholder="Pesan Untuk Kami" required></textarea><br>
<input type="submit" name="submit" value="Kirim">
</form>
</div>

</body>
</html>
