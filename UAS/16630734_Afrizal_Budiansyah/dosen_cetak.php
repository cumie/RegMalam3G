<?php
include("head.php");
?>
<h2>Laporan Data Dosen</h2>
<hr/>
<br/>
<div class="table-responsive">
<table class="table table-striped table-hover">
</head>
<body bg background="img/tokyo.jpg">
		<tr>
			<th>No</th>
			<th>NIP</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Agama</th>
			<th>No Handphone</th>
			<th>Fakultas</th>
			<th>Mata Kuliah</th>
		</tr>

		<?php
			$sql=mysqli_query($koneksi, "SELECT * FROM dosen ORDER BY nip ASC");
			$no = 1;
			while($row = mysqli_fetch_assoc($sql)){
				echo '

					<tr>
						<td>'.$no.'</td>
						<td>'.$row['nip'].'</td>
						<td>'.$row['nama'].'</td>
						<td>'.$row['tmpt_lahir'].'</td>
						<td>'.indonesiaTgl($row['tgl_lahir']).'</td>
						<td>'.$row['jns_kelamin'].'</td>
						<td>'.$row['agama'].'</td>
						<td>'.$row['no_hp'].'</td>
						<td>'.$row['kd_fakultas'].'</td>
						<td>'.$row['kd_makul'].'</td>
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