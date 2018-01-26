<?php
include("head.php");
?>
<h2>Laporan Data kegiatan</h2>
<hr/>
<br/>
<div class="table-responsive">
<table class="table table-striped table-hover">

		<tr>
			<th>No</th>
			<th>Kode Kegiatan</th>
			<th>Nama</th>
			<th>Tanggal Lahir</th>
			<th>Estimasi</th>
			<th>Penanggung Jawab</th>
			<th>Jenis Kegiatan</th>
			<th>Tools</th>
		</tr>

		<?php
			$sql=mysqli_query($koneksi, "SELECT * FROM kegiatan ORDER BY kode_kegiatan ASC");
			$no = 1;
			while($row = mysqli_fetch_assoc($sql)){
				echo '

					<tr>
						<td>'.$no.'</td>
						<td>'.$row['kode_kegiatan'].'</td>
						<td>'.$row['nama'].'</td>
						<td>'.indonesiaTgl($row['tgl_mulai']).'</td>
						<td>'.$row['no_telepon'].'</td>
						<td>'.$row['estimasi'].'</td>
						<td>'.$row['penanggung_jawab'].'</td>
						<td>'.$row['jenis_kegiatan'].'</td>
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