<?php
include ('koneksi.php');
$no_wisata = $_GET['hapus_pesan'];
$q_delete="DELETE FROM wisata where no_wisata='$no_wisata'";
mysql_query($q_delete);

header('location:lihat_tamu1');


?>