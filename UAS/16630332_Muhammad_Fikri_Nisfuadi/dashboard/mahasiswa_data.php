<br><div class="well"><h3 align="center"><b>DATA MAHASISWA</b></h4></div>
<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
  if($act=='del'){
    $id=$_GET['npm'];
    $q=mysqli_query($connect, "DELETE FROM data_mahasiswa WHERE npm='$id'");
    echo"<script>document.location.href='index.php?menu=mahasiswa_data'</script>";      
}
  elseif($act=='edit') {
  	$id=$_GET['npm'];
    $q=mysqli_query($connect, "SELECT * FROM data_mahasiswa WHERE npm=$id");
    while($d=mysqli_fetch_array($q)) { ?>
    <form method="POST" action="">
      <table class="table" id="user">
      <caption><h4>Edit Data mahasiswa</h4></caption>
          <tr><td>NPM </td><td><input type="number" name="npm" value="<?php echo $d['npm']; ?>"></td></tr>
          <tr><td>Nama Mahasiswa</td><td><input type="text" name="nama" value="<?php echo $d['nama_mahasiswa']; ?>"></td></tr>
          <tr><td>Jenis Kelamin</td><td>
                <select name="jk">
                  <option value="<?php echo $d['jk']; ?>"><?php echo $d['jk']; ?></option>
                  <option value="<?php echo $d['jk']; ?>"><- Pilih Jenis Kelamin Yang Baru -></option>
                  <option value="Laki - Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select></td></tr>
          <tr><td>Tempat Lahir</td><td><input type="text" placeholder=" Isikan Tempat Lahir" name="tempat_lahir" value="<?php echo $d['tmp_lhr']; ?>"></td></tr>
      	  <tr><td>Tanggal Lahir</td><td><input type="date" name="tanggal_lahir" value="<?php echo $d['tgl_lhr']; ?>"></td></tr>
      	  <tr><td>Alamat</td><td><textarea style="width:300px" name="alamat" placeholder="Isikan Alamat Lengkap">
      	  	<?php echo $d['alamat']; ?>
      	  </textarea></td></tr>      
	      <tr><td>No Telepon</td><td><input type="number" name="no_telpon" value="<?php echo $d['telp']; ?>"></td></tr>
	    	?></select></td></tr>
      <tr><td></td><td><a href="index.php?menu=mahasiswa_data" class="btn btn-danger"> Kembali Ke Data Mahasiswa</a>
      <input type="submit" class="btn btn-success" name="edit" value="Edit Data Mahasiswa"></td></tr>
    </table>
  </form>
<?php
	if (isset($_POST['edit'])){
      $a=$_POST['npm'];
      $b=$_POST['nama'];
      $c=$_POST['tempat_lahir'];
      $d=$_POST['tanggal_lahir'];
      $e=$_POST['jk'];
      $f=$_POST['alamat'];
      $g=$_POST['no_telpon'];
      $hasil = mysqli_query($connect, "UPDATE data_mahasiswa SET npm='$a', nama_mahasiswa='$b', tmp_lhr='$c', tgl_lhr='$d', jk='$e', alamat='$f', telp='$g' WHERE npm='$id'");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=mahasiswa_data\"
          </script>";
        }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=mahasiswa_data\"
            </script>";
          }  
     }
  }
}
elseif($act=='tambah') { ?>
  <form method="POST" action="">
    <table class="table" id="user">
      <tr><td>NPM</td><td><input type="number" name="npm" placeholder="Isikan NPM Mahasiswa "></td></tr>
      <tr><td>Nama</td><td><input type="text" name="nama" placeholder="Isikan Nama Mahasiswa"></td></tr>
      <tr><td>Tempat Lahir</td><td><input type="text" placeholder=" Isikan Tempat Lahir" name="tempat_lahir"></td></tr>
      <tr><td>Tanggal Lahir</td><td><input type="date" name="tanggal_lahir"></td></tr>
      <tr><td>Jenis Kelamin</td><td>
          <select name="jk">
              <option value="Laki - Laki"><- Pilih Jenis Kelamin -></option>
              <option value="Laki - Laki">Laki - Laki</option>
              <option value="Perempuan">Perempuan</option>
          </select></td></tr>
      <tr><td>Alamat</td><td><textarea style="width:300px" name="alamat" placeholder="Isikan Alamat Lengkap"></textarea></td></tr>      
      <tr><td>No Telepon</td><td><input type="number" name="telp" placeholder="Isikan Nomor Telepon Aktif"></td></tr>
    	<?php 
    	?></select></td></tr>

          </select></td></tr>
      <tr><td></td><td><a href="index.php?menu=mahasiswa_data" class="btn btn-danger"> Kembali Ke Data Mahasiswa</a>
      <input type="submit" class="btn btn-success" name="simpan" value="Simpan Data Mahasiswa"></td></tr>
    </table>
  </form>
<?php
  if (isset($_POST['simpan'])){
      $a=$_POST['npm'];
      $b=$_POST['nama'];
      $c=$_POST['tempat_lahir'];
      $d=$_POST['tanggal_lahir'];
      $e=$_POST['jk'];
      $f=$_POST['alamat'];
      $g=$_POST['telp'];
        $hasil = mysqli_query($connect, "INSERT INTO data_mahasiswa (npm,nama_mahasiswa,tmp_lhr,tgl_lhr,jk,alamat,telp) values ('$a','$b','$c','$d','$e','$f','$g')");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=mahasiswa_data\"
          </script>";
          }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=mahasiswa_data\"
            </script>";
          }  
      }
}
else {
?>
<a class="btn btn-primary" href="index.php?menu=mahasiswa_data&act=tambah"><i class="glyphicon glyphicon-plus"></i>Tambah Data Mahasiswa</a>
<a class="btn btn-success" onclick="window.print();"><i class="glyphicon glyphicon-print"></i> Print / Cetak Data Mahasiswa</a>
<hr>
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<tr>
      <th>No</th>
      <th>Npm</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
      <th>Alamat</th>
      <th>No Telpon</th>
      <th>Action</th>
		</tr>
		<?php
			$sql = mysqli_query($connect, "SELECT * FROM data_mahasiswa ORDER BY npm ASC");
			$no = 1;
			while($d = mysqli_fetch_array($sql)){
		?>
		<tr>
      <td><?php echo $no;?></td>
      <td><?php echo $d['npm'];?></td>
      <td><?php echo $d['nama_mahasiswa'];?></td>
      <td><?php echo $d['jk'];?></td>
      <td><?php echo $d['tmp_lhr'];?></td>
      <td><?php echo $d['tgl_lhr'];?></td>
      <td><?php echo $d['alamat'];?></td>
      <td><?php echo $d['telp'];?></td>
			<td>
				<a href="index.php?menu=mahasiswa_data&act=edit&npm=<?php echo $d['npm'];?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
				<a href="index.php?menu=mahasiswa_data&act=del&npm=<?php echo $d['npm'];?>" title="Hapus Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $d['nama_mahasiswa'];?>')" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			</td>
		</tr>
		<?php 
		$no++;
		}
		?>
	</table>
</div>
<?php } ?>