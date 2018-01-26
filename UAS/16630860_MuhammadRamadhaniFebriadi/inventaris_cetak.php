<?php
include("head.php");
?>
<h2>Laporan Data inventaris</h2>
<hr/>
<br/>
<div class="table-responsive">
<table class="table table-striped table-hover">

		<tr>
			<th>No</th>
			<th>Kode Barang</th>
			<th>Nama</th>
			<th>Tanggal Masuk</th>
			<th>Merk</th>
			<th>Jenis</th>
			<th>Aksi</th>
		</tr>

		<?php
			$sql=mysqli_query($koneksi, "SELECT * FROM inventaris ORDER BY kd_barang ASC");
			$no = 1;
			while($row = mysqli_fetch_assoc($sql)){
				echo '

					<tr>
						<td>'.$no.'</td>
						<td>'.$row['kd_barang'].'</td>
						<td>'.$row['nama'].'</td>
						<td>'.indonesiaTgl($row['tgl_masuk']).'</td>
						<td>'.$row['merk'].'</td>
						<td>'.$row['jenis'].'</td>

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