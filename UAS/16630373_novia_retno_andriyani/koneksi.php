<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="uas_16630373";

$koneksi = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if(mysqli_connect_errno()){
	echo 'Koneksi Gagal : '.mysqli_error();
	}
?>