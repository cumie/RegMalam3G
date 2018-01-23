<?php
include('head.php');

?>
<style type="text/css">
	.wrap {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 40px;
    margin-top: 10px;
}
.komeng{
	border-radius: 50%;
}
</style>

<?php

include('koneksi.php');



	$no=$_GET['no_wisata'];
	$sql_baca="SELECT * FROM wisata WHERE no_wisata='$no'";
	$data_baca=mysql_query($sql_baca);
	 	$data_tampil=mysql_fetch_array($data_baca);

 		$baca_nama= $data_tampil['nama'];
 		$baca_email= $data_tampil['email'];
 		$baca_cp= $data_tampil['cp'];
 		$baca_waktu=$data_tampil['waktu'];
 		 $baca_komentar= $data_tampil['pesan'];

 		$baca_no_wisata= $data_tampil['no_wisata'];
?>
<div class="wrap">
<p align="right"><a title="Edit Pesan" href="update?update_pesan=<?php echo $baca_no_wisata; ?>" "><img src="gambar/edit.png" width="30px"></a>  

 <a title="Hapus Pesan" <a href='hapus?hapus_pesan= <?php echo $baca_no_wisata;?>'><img src="gambar/hapus.png" width="30px"></a> </p>

<?php
echo'<img src="gambar/user.png" width="30px">Nama Pengirim :';
 		echo $baca_nama;
 		echo'<br><br>';
echo'<img src="gambar/waktu.png" width="30px">Waktu Pengirimiman :';
 		echo $baca_waktu;
 		echo'<br><br>';
echo'<img src="gambar/email.png" width="30px"> E-mail Pengirim :';
 		echo $baca_email;

 		echo'<br><br>';
echo'<img src="gambar/cp.png" width="30px">Kontak Pengirim :';
 		echo $baca_cp;

 		echo'<br><br>';
echo'<img src="gambar/pesan.png" width="30px">Pesan Pengirin :';
 		echo $baca_komentar;

 		echo'<br>';
 echo '</div>';
include('kaki.php');


?>
