<?php
include("head.php");
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

<h2 class="style1">Laporan Data Mahasiswa</h2>
<hr/>
<br/>
<div class="table-responsive">
<table class="table table-striped table-hover">

		<tr>
			<th>No</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Agama</th>
			<th>No Handphone</th>
			<th>Fakultas</th>
			<th>Jurusan</th>
			<th>Semester</th>
		</tr>

		<?php
			$sql=mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY npm ASC");
			$no = 1;
			while($row = mysqli_fetch_assoc($sql)){
				echo '

					<tr>
						<td>'.$no.'</td>
						<td>'.$row['npm'].'</td>
						<td>'.$row['nama'].'</td>
						<td>'.$row['tmpt_lahir'].'</td>
						<td>'.indonesiaTgl($row['tgl_lahir']).'</td>
						<td>'.$row['jns_kelamin'].'</td>
						<td>'.$row['agama'].'</td>
						<td>'.$row['no_hp'].'</td>
						<td>'.$row['kd_fakultas'].'</td>
						<td>'.$row['kd_jurusan'].'</td>
						<td>'.$row['semester'].'</td>
					</tr>

				';
				$no++;
			}



		?>	

</table>
</div>

<img src="img/btn_print.png" width="25" onclick="window.print();">




<?php
include("foot.php");
?>