<?php
include ('koneksi.php');
$no_wisata = $_GET['no'];
$update_nama=$_POST['nama'];
$update_email=$_POST['email'];
$update_cp=$_POST['cp'];
$update_pesan=$_POST['pesan'];

$q_update="UPDATE wisata SET nama='$update_nama', email='$update_email', cp='$update_cp', pesan='$update_pesan' where no_wisata='$no_wisata'";
mysql_query($q_update);




?>
<style type="text/css">
	.konten{
		border : 1px solid #46b8da; ;
		margin-left: 150px;
		border-radius: 5px;
		background-color: #5bc0de;
		width: 70%;
		height: 
		text-decoration: -moz-none;
		box-shadow: -5px 1px 30px #238099;

	}
	.lihat1{
		color: white;

		text-decoration-style: none;
		font-style: none;
		text-decoration: none;
	}
	.bawah{
				border : 1px solid #46b8da; ;
		margin-left: 150px;
		border-radius: 5px;
		background-color: #red;
		width: 70%;
		height: 
		text-decoration: -moz-none;
		box-shadow: -5px 1px 30px #238099;
		height: 70%;
	}

.p-tulisan {padding: 15px;padding-top: 1px;padding-bottom: 1px;padding-left: 30px;}

</style>
<div class="konten">
<center><a class="tautan" href="lihat_tamu1"><h2 class="lihat">Lihat</h2></a></center>
</div>
<div class="bawah">
<center><h2 style="color: #46b8da;"><a href="lihat_tamu1" style="color: #5bc0de; font-size: 20px;"><img src="gambar/email.png" width="70px"></a></h2></center>
	<p class="p-tulisan">    Terimakasih Karena Telah Memberikan Saran, Masukan, dan Kritika Untuk Kami Saran dari<br> Anda Sangat kami Hargai
	.<br>  Berikan Saran dan Kritikan Dengan Santum. Karena Perkataan Mencerminkan Diri Seseorang Terimaksih.  <b><a href="lihat_tamu1" style="color: #5bc0de; font-size: 20px;">Pesanku</a></b></p>
</div>