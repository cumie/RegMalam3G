<?php include "head.php"; ?>
<?php include "koneksi.php"; ?>
<?php include "library.php"; ?>
<div class="container">
<h3>Laporan Data Mahasiswa</h3>
<hr/>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<tr>
    	<th>No</th>
        <th>Npm</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>No Telepon</th>
        <th>Fakultas</th>
        <th>Semester</th>
    </tr>
    <?php
		$sql = mysqli_query($koneksi, "SELECT * FROM mhs ORDER BY npm ASC");
		$no = 1;
		while ($row = mysqli_fetch_assoc($sql)){
			echo '
			<tr>
				<td>'.$no.'</td>
				<td>'.$row['npm'].'</td>
				<td>'.$row['nama'].'</td>
				<td>'.$row['tempat_lahir'].'</td>
				<td>'.IndonesiaTgl($row['tanggal_lahir']).'</td>
				<td>'.$row['no_telepon'].'</td>
				<td>'.$row['fakultas'].'</td>
				<td>'.$row['semester'].'</td>
			</tr>
			';
			$no++;
		}
	?>
</table>
</div>
<img src="img/btn_print.png" width="25" onClick="window.print();">
</div>
<?php include "foot.php"; ?>