<?php
include "koneksi.php";
$user=$_POST['username'];
$pw=$_POST['password'];
$q=mysqli_query($connect, "SELECT * FROM user WHERE username='$user' and password='$pw'");
$hit=mysqli_num_rows($q);
	if($hit>0){
		while($d=mysqli_fetch_array($q)){
				echo "<script>window.location.href='dashboard/index.php?menu=home';</script>";
	}
}
	else{
		echo "<script>
		alert('Maaf username dan password anda salah! Silahkan coba lagi');
		window.location.href='index.php';
		</script>";
		}
?>