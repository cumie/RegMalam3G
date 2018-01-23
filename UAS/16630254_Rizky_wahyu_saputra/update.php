
<?php
include ('koneksi.php');
$no_wisata= $_GET['update_pesan'];

$sql_pilih="SELECT * FROM wisata WHERE no_wisata='$no_wisata'";
$data_pilih=mysql_query($sql_pilih);
$data_tampil=mysql_fetch_array($data_pilih);
        $baca_nama= $data_tampil['nama'];
        $baca_email= $data_tampil['email'];
        $baca_cp= $data_tampil['cp'];
        $baca_waktu=$data_tampil['waktu'];
        $baca_komentar= $data_tampil['pesan'];

        $baca_no_wisata= $data_tampil['no_wisata'];

echo '<!DOCTYPE html>
 <html>
<head>
	<title>Edit Pesan</title>
	<style type="text/css">



h2.wisata{
	text-align: center;
color: black;
}
form {
    background: #fff;
    border-radius: 6px;
    padding: 20px;
    padding-top: 30px;
    width: 70%;
    margin: 70px auto;
    box-shadow: 15px 15px 0px rgba(0,0,0,.1);
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

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 40px;
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
<body>';

?>
<form action="update_proses?no=<?php echo $baca_no_wisata; ?>"" method="POST">
<?php
echo '<a href="lihat_tamu.php" title="Homepage"><center><img src="gambar/home.png" width="50px"></center></a>
	<h2 class="wisata">Wisata Banjarnegara</h2>
<label>Nama Lengkap</label>
<input type="text" name="nama" value="'.$baca_nama.'"><br>
<label>E-mail</label>
<input type="text" name="email" placeholder="E-mail" value="'.$baca_email.'" required><br>
<label>Waktu</label>';
?>
<input type="text" name="waktu" value="<?php date_default_timezone_set("America/New_York"); echo date('Y-m-d H:i:sa') ?>"> 



<?php
echo '<label>Nomor Telepon</label>
<input type="text" name="cp" placeholder="Nomor Telepon" value="'.$baca_cp.'" required><br>
<label>Pesan Anda</label>
<textarea cols="5" name="pesan" rows="5" placeholder="Pesan Untuk Kami" required>"'.$baca_komentar.'"</textarea><br>
<input type="submit" name="submit" value="Update Pesan">
</form>
</div>

</body>
</html>';
?>
