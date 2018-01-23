<?php

include('head.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>tamu</title>

<style type="text/css">
	.wrap{



  border-radius: 5px;
  background-color: #f2f2f2;
    padding: 40px;
}

.pagination  li a{
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    background: #1ba2bf;;
    float: left;
}
.detail  {
    background-color: #4CAF50;;
    color: white;
    padding: 10px 20px;
    text-align: center;	
    text-decoration: none;
    display: inline-block;
    border-radius: 5px;
}


.detail{
    background-color:#4CAF50;
}

</style>

<?php




//koneksi database
mysql_connect("localhost", "root", "");
mysql_select_db("buku");//fungsi pagination
$BatasAwal = 4;
if (!empty($_GET['page'])) {
$hal = $_GET['page'] - 1;
$MulaiAwal = $BatasAwal * $hal;
} else if (!empty($_GET['page']) and $_GET['page'] == 1) {
$MulaiAwal = 0;
} else if (empty($_GET['page'])) {
$MulaiAwal = 0;
}//tampil data
$query = mysql_query("SELECT * FROM wisata ORDER BY nama LIMIT $MulaiAwal , $BatasAwal ");
while ($record = mysql_fetch_array($query)) {
?>


<?php




echo '

<table>
<div class="wrap">



<b><img src="gambar/user.png" width="30px"> ' . $record['nama'] . '</b>  <br> 

<img src="gambar/pesan.png" width="30px"> Berpesan: ' . $record['pesan'] . '<br>';

?>
        <a class="detail" href="tamu_detail?no_wisata=<?php echo $record['no_wisata']; ?>" class="btn btn-danger">Detail</a>

</div><br>




<?php



?>





<?php
}

//navigasi
echo '';
$cekQuery = mysql_query("SELECT * FROM wisata");
$jumlahData = mysql_num_rows($cekQuery);
if ($jumlahData > $BatasAwal) {
echo '<ul style="background-color:#DEB218; border-radius:8px;" type="1" class="pagination" ><li class="pager"> ';
$a = explode(".", $jumlahData / $BatasAwal);
$b = $a[0];
$c = $b + 1;
for ($i = 1; $i <= $c; $i++) {
echo '<a style="text-decoration:none;';
if ($_GET['page'] == $i) {
echo '
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #5cb85c;
    border-color: #337ab7;
';
}
echo '" href="?page=' . $i . '">' . $i . '</a> ';
}
echo '</li><ul></table>';
}

include('kaki.php');

?>

