<br><div class="well"><h3 align="center"><b>DATA PELANGGAN</b></h4></div>
<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
  if($act=='del'){
    $id=$_GET['id_pelanggan'];
    $q=mysqli_query($connect, "DELETE FROM pelanggan WHERE id_pelanggan='$id'");
    echo"<script>document.location.href='index.php?menu=data_pelanggan'</script>";      
}
  elseif($act=='edit') {
  	$id=$_GET['id_pelanggan'];
    $q=mysqli_query($connect, "SELECT * FROM pelanggan WHERE id_pelanggan=$id");
    while($d=mysqli_fetch_array($q)) { ?>
    <form method="POST" action="">
      <table class="table" id="user">
      <caption><h4>Edit Data Pelanggan</h4></caption>
          <tr><td>Nama Pelanggan</td><td><input type="text" name="nama_pelanggan" value="<?php echo $d['nama_pelanggan']; ?>"></td></tr>
          <tr><td>Jenis Kelamin</td><td>
                <select name="jk">
                  <option value="<?php echo $d['jk']; ?>"><?php echo $d['jk']; ?></option>
                  <option value="<?php echo $d['jk']; ?>"><- Pilih Jenis Kelamin Yang Baru -></option>
                  <option value="Laki - Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select></td></tr>
          <tr><td>Umur</td><td><input type="number" placeholder=" Isikan Umur Pelanggan" name="umur" value="<?php echo $d['umur']; ?>"></td></tr>
      	  <tr><td>Alamat</td><td><textarea style="width:300px" name="alamat" placeholder="Isikan Alamat Lengkap">
      	  	<?php echo $d['alamat']; ?>
      	  </textarea></td></tr>      
	      <tr><td>No Telepon</td><td><input type="number" name="no_telpon" value="<?php echo $d['telp']; ?>"></td></tr>
	    	?></select></td></tr>
      <tr><td></td><td><a href="index.php?menu=data_pelanggan" class="btn btn-danger"> Kembali Ke Data Pelanggan</a>
      <input type="submit" class="btn btn-success" name="edit" value="Edit Data Pelanggan"></td></tr>
    </table>
  </form>
<?php
	if (isset($_POST['edit'])){
      $a=$_POST['nama_pelanggan'];
      $b=$_POST['jk'];
      $c=$_POST['umur'];
      $d=$_POST['alamat'];
      $e=$_POST['no_telpon'];
      $hasil = mysqli_query($connect, "UPDATE pelanggan SET nama_pelanggan='$a', jk='$b', umur='$c', alamat='$d', telp='$e' WHERE id_pelanggan='$id'");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=data_pelanggan\"
          </script>";
        }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=data_pelanggan\"
            </script>";
          }  
     }
  }
}
elseif($act=='tambah') { ?>
  <form method="POST" action="">
    <table class="table" id="user">
      <tr><td>Nama</td><td><input type="text" name="nama" placeholder="Isikan Nama Pelanggan"></td></tr>
      <tr><td>Jenis Kelamin</td><td>
          <select name="jk">
              <option value="Laki - Laki"><- Pilih Jenis Kelamin -></option>
              <option value="Laki - Laki">Laki - Laki</option>
              <option value="Perempuan">Perempuan</option>
          </select></td></tr>
      <tr><td>Umur</td><td><input type="number" name="umur" placeholder="Isikan Umur Pelanggan"></td></tr>
      <tr><td>Alamat</td><td><textarea style="width:300px" name="alamat" placeholder="Isikan Alamat Lengkap"></textarea></td></tr>      
      <tr><td>No Telepon</td><td><input type="number" name="telp" placeholder="Isikan Nomor Telepon Aktif"></td></tr>
    	<?php 
    	?></select></td></tr>

          </select></td></tr>
      <tr><td></td><td><a href="index.php?menu=data_pelanggan" class="btn btn-danger"> Kembali Ke Data Pelanggan</a>
      <input type="submit" class="btn btn-success" name="simpan" value="Simpan Data Pelanggan"></td></tr>
    </table>
  </form>
<?php
  if (isset($_POST['simpan'])){
      $a=$_POST['nama'];
      $b=$_POST['jk'];
      $c=$_POST['umur'];
      $d=$_POST['alamat'];
      $e=$_POST['telp'];
        $hasil = mysqli_query($connect, "INSERT INTO pelanggan (nama_pelanggan,jk,umur,alamat,telp) values ('$a','$b','$c','$d','$e')");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=data_pelanggan\"
          </script>";
          }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=data_pelanggan\"
            </script>";
          }  
      }
}
else {
?>
<a class="btn btn-primary" href="index.php?menu=data_pelanggan&act=tambah"><i class="glyphicon glyphicon-plus"></i>Tambah Data Pelanggan</a>
<a class="btn btn-success" onclick="window.print();"><i class="glyphicon glyphicon-print"></i> Print / Cetak Data Pelanggan</a>
<hr>
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<tr>
      <th>No</th>
      <th>Nama Pelanggan</th>
			<th>Jenis Kelamin</th>
			<th>Umur</th>
      <th>Alamat</th>
      <th>No Telpon</th>
      <th>Action</th>
		</tr>
		<?php
			$sql = mysqli_query($connect, "SELECT * FROM pelanggan");
			$no = 1;
			while($d = mysqli_fetch_array($sql)){
		?>
		<tr>
      <td><?php echo $no;?></td>
      <td><?php echo $d['nama_pelanggan'];?></td>
      <td><?php echo $d['jk'];?></td>
      <td><?php echo $d['umur'];?></td>
      <td><?php echo $d['alamat'];?></td>
      <td><?php echo $d['telp'];?></td>
			<td>
				<a href="index.php?menu=data_pelanggan&act=edit&id_pelanggan=<?php echo $d['id_pelanggan'];?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
				<a href="index.php?menu=data_pelanggan&act=del&id_pelanggan=<?php echo $d['id_pelanggan'];?>" title="Hapus Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $d['nama_pelanggan']; ?>')" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			</td>
		</tr>
		<?php 
		$no++;
		}
		?>
	</table>
</div>
<?php } ?>