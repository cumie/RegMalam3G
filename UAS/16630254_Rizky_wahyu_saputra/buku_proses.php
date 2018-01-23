<script type="text/javascript">
	    alert("Pesan Berhasil disimpan");
</script>
<?php
include('koneksi.php');





$nama = $_POST['nama'];
$email = $_POST['email'];
$cp =$_POST['cp'];
$waktu=$_POST['waktu'];
$pesan = $_POST['pesan'];

$q_insert="INSERT INTO wisata SET nama='$nama', email='$email', cp='$cp', pesan='$pesan', waktu='$waktu'";
mysql_query($q_insert); 






header('location:tahu.php');

?>