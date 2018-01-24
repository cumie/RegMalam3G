<?php
include("head.php");
?>
<h2>Laporan Data Karyawan</h2>
<hr/>
<br/>
<div class="table-responsive">
<table class="table table-striped table-hover">

		<tr>
			<th>No</th>
			<th>Nik</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>No Telpon</th>
			<th>Jabatan</th>
			<th>Status</th>
			<th>Tools</th>
		</tr>

		<?php
			$sql=mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY nik ASC");
			$no = 1;
			while($row = mysqli_fetch_assoc($sql)){
				echo '

					<tr>
						<td>'.$no.'</td>
						<td>'.$row['nik'].'</td>
						<td>'.$row['nama'].'</td>
						<td>'.$row['tempat_lahir'].'</td>
						<td>'.indonesiaTgl($row['tanggal_lahir']).'</td>
						<td>'.$row['no_telepon'].'</td>
						<td>'.$row['jabatan'].'</td>
						<td>'.$row['status'].'</td>

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