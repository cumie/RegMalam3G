<br><div class="well"><h3 align="center"><b>DATA KARYAWAN</b></h4></div>
<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
  if($act=='del'){
    $id=$_GET['nik'];
    $q=mysqli_query($connect, "DELETE FROM karyawan WHERE nik='$id'");
    echo"<script>document.location.href='index.php?menu=karyawan_data'</script>";      
}
  elseif($act=='edit') {
  	$id=$_GET['nik'];
    $q=mysqli_query($connect, "SELECT * FROM karyawan WHERE nik=$id");
    while($d=mysqli_fetch_array($q)) { ?>
    <form method="POST" action="">
      <table class="table" id="user">
      <caption><h4>Edit Data Karyawan</h4></caption>
          <tr><td>NIK </td><td><input type="number" name="nik" value="<?php echo $d['nik']; ?>"></td></tr>
          <tr><td>Nama Karyawan</td><td><input type="text" name="nama" value="<?php echo $d['nama']; ?>"></td></tr>
          <tr><td>Jenis Kelamin</td><td>
                <select name="jk">
                  <option value="<?php echo $d['jk']; ?>"><?php echo $d['jk']; ?></option>
                  <option value="<?php echo $d['jk']; ?>"><- Pilih Jenis Kelamin Yang Baru -></option>
                  <option value="Laki - Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select></td></tr>
          <tr><td>Tempat Lahir</td><td><input type="text" placeholder=" Isikan Tempat Lahir" name="tempat_lahir" value="<?php echo $d['tempat_lahir']; ?>"></td></tr>
      	  <tr><td>Tanggal Lahir</td><td><input type="date" name="tanggal_lahir" value="<?php echo $d['tanggal_lahir']; ?>"></td></tr>
      	  <tr><td>Alamat</td><td><textarea style="width:300px" name="alamat" placeholder="Isikan Alamat Lengkap">
      	  	<?php echo $d['alamat']; ?>
      	  </textarea></td></tr>      
	      <tr><td>No Telepon</td><td><input type="number" name="no_telpon" value="<?php echo $d['no_telpon']; ?>"></td></tr>
	      <tr><td>Jabatan</td><td><select name="jabatan">
	    	<?php 
	    		$id_jabatan=$d['id_jabatan']; 
	    		$a=mysqli_query($connect, "SELECT * FROM list_jabatan WHERE id_jabatan=$id_jabatan");
	    		$b=mysqli_fetch_array($a);
	    		?>
	    		<option value="<?php echo $b['id_jabatan']; ?>"><?php echo $b['nama_jabatan']; ?></option>
	    		<option value="<?php echo $b['id_jabatan']; ?>">----Pilih Jabatan-----</option>
	    		<?php
	    		$cek=mysqli_query($connect, "SELECT * FROM list_jabatan");
	    		while ($hasil=mysqli_fetch_array($cek)) {
	    		?>
	    		<option value="<?php echo $hasil['id_jabatan']; ?>"><?php echo $hasil['nama_jabatan']; ?></option>
	    		<?php }
	    	?></select></td></tr>
	      <tr><td>Status</td><td>
	          <select name="status">
	          <option value="<?php echo $d['status']; ?>"><?php echo $d['status']; ?></option>
	          <option value="<?php echo $d['status']; ?>">---Pilih---</option>
              <option value="Tetap">Tetap</option>
              <option value="Kontrak">Kontrak</option>
              <option value="Outsourcing">Outsourcing</option>
          </select></td></tr>
          <tr><td></td><td><a href="index.php?menu=data_user" class="btn btn-danger"> Kembali Ke Data User</a> <input type="submit" class="btn btn-success" name="edit" value="edit"></td></tr>
      </table>
    </form>
<?php
	if (isset($_POST['edit'])){
      $a=$_POST['nik'];
      $b=$_POST['nama'];
      $c=$_POST['tempat_lahir'];
      $d=$_POST['tanggal_lahir'];
      $e=$_POST['jk'];
      $f=$_POST['alamat'];
      $g=$_POST['no_telpon'];
      $h=$_POST['jabatan'];
      $i=$_POST['status'];
      $hasil = mysqli_query($connect, "UPDATE karyawan SET nik='$a', nama='$b', tempat_lahir='$c', tanggal_lahir='$d', jk='$e', alamat='$f', no_telpon='$g', id_jabatan='$h', status='$i' WHERE nik='$id'");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=karyawan_data\"
          </script>";
        }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=karyawan_data\"
            </script>";
          }  
     }
}
}
  elseif($act=='tambah') { ?>
  	<form method="POST" action="">
    <table class="table" id="user">
      <tr><td>NIK</td><td><input type="number" name="nik" placeholder="Isikan NIK Karyawan"></td></tr>
      <tr><td>Nama</td><td><input type="text" name="nama" placeholder="Isikan Nama Karyawan"></td></tr>
      <tr><td>Tempat Lahir</td><td><input type="text" placeholder=" Isikan Tempat Lahir" name="tempat_lahir"></td></tr>
      <tr><td>Tanggal Lahir</td><td><input type="date" name="tanggal_lahir"></td></tr>
      <tr><td>Jenis Kelamin</td><td>
          <select name="jk">
              <option value="Laki - Laki"><- Pilih Jenis Kelamin -></option>
              <option value="Laki - Laki">Laki - Laki</option>
              <option value="Perempuan">Perempuan</option>
          </select></td></tr>
      <tr><td>Alamat</td><td><textarea style="width:300px" name="alamat" placeholder="Isikan Alamat Lengkap"></textarea></td></tr>      
      <tr><td>No Telepon</td><td><input type="number" name="no_telpon" placeholder="Isikan Nomor Telepon Aktif"></td></tr>
      <tr><td>Jabatan</td><td><select name="jabatan">
    	<?php 
    		$id_jabatan=$d['id_jabatan']; 
    		$cek=mysqli_query($connect, "SELECT * FROM list_jabatan");
    		while ($hasil=mysqli_fetch_array($cek)) {
    		?>
    		<option value="<?php echo $hasil['id_jabatan']; ?>"><?php echo $hasil['nama_jabatan']; ?></option>
    		<?php }
    	?></select></td></tr>
      <tr><td>Status</td><td>
          <select name="status">
              <option value="Tetap">Tetap</option>
              <option value="Kontrak">Kontrak</option>
              <option value="Outsourcing">Outsourcing</option>
          </select></td></tr>
      <tr><td></td><td><a href="index.php?menu=karyawan_data" class="btn btn-danger"> Kembali Ke Data Karyawan</a>
      <input type="submit" class="btn btn-success" name="simpan" value="Simpan Data Karyawan"></td></tr>
    </table>
  </form>
  <?php
  if (isset($_POST['simpan'])){
      $a=$_POST['nik'];
      $b=$_POST['nama'];
      $c=$_POST['tempat_lahir'];
      $d=$_POST['tanggal_lahir'];
      $e=$_POST['jk'];
      $f=$_POST['alamat'];
      $g=$_POST['no_telpon'];
      $h=$_POST['jabatan'];
      $i=$_POST['status'];
        $hasil = mysqli_query($connect, "INSERT INTO karyawan (nik,nama,tempat_lahir,tanggal_lahir,jk,alamat,no_telpon,id_jabatan,status) values ('$a','$b','$c','$d','$e','$f','$g','$h','$i')");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=karyawan_data\"
          </script>";
          }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=karyawan_data\"
            </script>";
          }  
      }
}
  elseif($act=='detail'){
    $id=$_GET['nik'];
    $q=mysqli_query($connect, "SELECT * FROM karyawan WHERE nik='$id'");
    while ($d=mysqli_fetch_array($q)) {
    ?>
    <table class="strip" style="padding:20px;" width="600px" cellpadding="7" align="center">
    	<caption><h4>Detail Data Karyawan</h4></caption>
    	<tr><td width="200px">NIK</td><td> : </td><td><?php echo $d['nik']; ?></td></tr>
    	<tr><td>Nama Lengkap</td><td> : </td><td><?php echo $d['nama']; ?></td></tr>
    	<tr><td>Jenis Kelamin</td><td> : </td><td><?php echo $d['jk']; ?></td></tr>
    	<tr><td>Tempat , Tanggal Lahir</td><td> : </td><td><?php echo $d['tempat_lahir']; ?>, <?php echo $d['tanggal_lahir']; ?></td></tr>
    	<tr><td>Status</td><td> : </td><td><span class="label label-success"><?php echo $d['status']; ?></span></td></tr>
    	<tr><td>Alamat</td><td> : </td><td><?php echo $d['alamat']; ?></td></tr>
    	<tr><td>Nomor Telepon</td><td> : </td><td><?php echo $d['no_telpon']; ?></td></tr>
    	<tr><td>Jabatan</td><td> : </td><td><button class="btn btn-sm btn-warning">
    	<?php 
    		$id_jabatan=$d['id_jabatan']; 
    		$cek=mysqli_query($connect, "SELECT * FROM list_jabatan WHERE id_jabatan=$id_jabatan");
    		$hasil=mysqli_fetch_array($cek);
    		echo $hasil['nama_jabatan']; 
    	?></button></td></tr>
    </table>
    <hr><center><a href="index.php?menu=karyawan_data" class="btn btn-danger"> <i class="glyphicon glyphicon-refresh"></i> Kembali Ke Data Karyawan</a>
    <a href="index.php?menu=karyawan_data&act=edit&nik=<?php echo $d['nik'];?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit Ke Data Karyawan</a></center>
    <?php   
    }   
}
else {
?>
<a class="btn btn-primary" href="index.php?menu=karyawan_data&act=tambah"><i class="glyphicon glyphicon-plus"></i>Tambah Data Karyawan</a>
<a class="btn btn-success" onclick="window.print();"><i class="glyphicon glyphicon-print"></i> Print / Cetak Data Karyawan</a>
<hr>
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<tr style="background-color: red;">
			<th>No</th>
      <th>NIK</th>
			<th>Nama</th>
			<th>Tempat Tanggal Lahir</th>
			<th>Status</th>
			<th>Tools</th>
		</tr>
		<?php
			$sql = mysqli_query($connect, "SELECT * FROM karyawan ORDER BY nik ASC");
			$no = 1;
			while($row = mysqli_fetch_assoc($sql)){
		?>
		<tr>
			<td><?php echo $no;?></td>
      <td><?php echo $row['nik'];?></td>
			<td><a href="index.php?menu=karyawan_data&act=detail&nik=<?php echo $row['nik'];?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $row['nama'];?></a></td>
			<td><?php echo $row['tempat_lahir'];?> , <?php echo $row['tanggal_lahir'];?></td>
			<td><center>
				<?php
				if($row['status'] == 'Tetap'){
				?>
				<span class="label label-success">Tetap</span>
				<?php
					}else if($row['status'] == 'Kontrak'){
				?>	
				<span class="label label-success">Kontrak</span>
				<?php
					}else if($row['status'] == 'Outsourcing'){
				?>
				<span class="label label-success">Outsourcing</span>
				<?php
				}
				?>
				</center></td>
			<td>
				<a href="index.php?menu=karyawan_data&act=detail&nik=<?php echo $row['nik'];?>" title="Detail Data" class="btn btn-warning btn-sm"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
				<a href="index.php?menu=karyawan_data&act=edit&nik=<?php echo $row['nik'];?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
				<a href="index.php?menu=karyawan_data&act=del&nik=<?php echo $row['nik'];?>" title="Hapus Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $row['nama'];?>')" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			</td>
		</tr>
		<?php 
		$no++;
		}
		?>
	</table>
</div>
<?php } ?>