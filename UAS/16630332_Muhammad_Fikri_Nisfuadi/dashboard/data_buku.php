<br><div class="well"><h3 align="center"><b>DATA - DATA BUKU PERPUSTAKAAN</b></h3></div>
<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
  if($act=='del'){
    $id=$_GET['id_buku'];
    $q=mysqli_query($connect, "DELETE FROM data_buku WHERE id_buku='$id'");
    echo"<script>document.location.href='index.php?menu=data_buku'</script>";      
}
elseif($act=='edit'){
    $id=$_GET['id_buku'];
    $q=mysqli_query($connect, "SELECT * FROM data_buku WHERE id_buku=$id");
    while($d=mysqli_fetch_array($q)) { 
    ?>
    <form method="POST" action="">
      <table class="table" id="user">
        <caption><h3>Edit Data Buku</h3></caption>
          <tr><td>Nama Buku</td><td><input type="text" name="nama_buku" value="<?php echo $d['nama_buku']; ?>"></td></tr>
          <tr><td>Penerbit</td><td><input type="text" name="penerbit" value="<?php echo $d['penerbit']; ?>"></td></tr>
          <tr><td>Penulis</td><td><input type="text" name="penulis" value="<?php echo $d['penulis']; ?>"></td></tr>
          <tr><td>Jenis Buku</td><td>
              <select name="jenis_buku">
                  <option value="<?php echo $d['jenis_buku']; ?>"><?php echo $d['jenis_buku']; ?></option>
                  <option value="<?php echo $d['jenis_buku']; ?>"----Pilih----</option>
                  <option value="Novel">Novel</option>
                  <option value="Fiksi">Fiksi</option>
                  <option value="Non Fiksi">Non Fiksi</option>
                  <option value="Pelajaran">Pelajaran</option>
              </select></td></tr>
          <tr><td>Jumlah Buku</td><td><input type="number" name="jumlah_buku" value="<?php echo $d['jumlah_buku']; ?>"></td></tr>
          <tr><td></td><td><a href="index.php?menu=data_buku" class="btn btn-danger"> Kembali Ke Data Buku</a> <input type="submit" class="btn btn-success" name="edit" value="Edit"></td></tr>
      </table>
    </form>
<?php 
    if (isset($_POST['edit'])){
      $a=$_POST['nama_buku'];
      $b=$_POST['penerbit'];
      $c=$_POST['penulis'];
      $d=$_POST['jenis_buku'];
      $e=$_POST['jumlah_buku'];
      $hasil = mysqli_query($connect, "UPDATE data_buku SET nama_buku='$a', penerbit='$b', penulis='$c', jenis_buku='$d', jumlah_buku='$e', sisa_buku='$e' WHERE id_buku='$id'");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=data_buku\"
          </script>";
        }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=data_buku\"
            </script>";
        }  
    }
  }
}
elseif($act=='tambah') {
?>
  <form method="POST" action="">
    <table class="table" id="user">
      <caption><h3>Tambah Data Buku Perpustakaan</h3></caption>
      <tr><td>Nama Buku</td><td><input type="text" name="nama_buku"></td></tr>
      <tr><td>Penerbit</td><td><input type="text" name="penerbit"></td></tr>
      <tr><td>Penulis</td><td><input type="text" name="penulis"></td></tr>
      <tr><td>Jenis Buku</td><td>
          <select name="jenis_buku">
              <option value="Novel">Novel</option>
              <option value="Fiksi">Fiksi</option>
              <option value="Non Fiksi">Non Fiksi</option>
              <option value="Pelajaran">Pelajaran</option>
          </select></td></tr>
      <tr><td>Jumlah Buku</td><td><input type="number" name="jumlah_buku"></td></tr>
      <tr><td></td><td><a href="index.php?menu=data_buku" class="btn btn-danger"> Kembali Ke Data Buku</a>
      <input type="submit" class="btn btn-success" name="simpan" value="Simpan Data Buku Baru"></td></tr>
    </table>
  </form>
<?php
  if (isset($_POST['simpan'])){
      $a=$_POST['nama_buku'];
      $b=$_POST['penerbit'];
      $c=$_POST['penulis'];
      $d=$_POST['jenis_buku'];
      $e=$_POST['jumlah_buku'];
        $hasil = mysqli_query($connect, "INSERT INTO data_buku (nama_buku,penerbit,penulis,jenis_buku,jumlah_buku,sisa_buku) values ('$a','$b','$c','$d','$e','$e')");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=data_buku\"
          </script>";
          }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=data_buku\"
            </script>";
          }  
      }
}
else { ?>
<a class="btn btn-primary" href="index.php?menu=data_buku&act=tambah"><i class="glyphicon glyphicon-plus"></i>Tambah Data Buku Perpustakaan</a> <a class="btn btn-success" onclick="window.print();"><i class="glyphicon glyphicon-print"></i> Print / Cetak Data Perpustakaan</a>
<hr>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Buku</th>
      <th>Penerbit</th>
      <th>Penulis</th>
      <th>Jenis Buku</th>
      <th>Jumlah Buku</th>
      <th>Sisa Buku Yang Tersedia</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $no=1;
    $query=mysqli_query($connect, "SELECT * FROM data_buku");
       while($d=mysqli_fetch_array($query))
       { ?>
      <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $d['nama_buku'] ?></td>
      <td><?php echo $d['penerbit']; ?></td>
      <td><?php echo $d['penulis']; ?></td>
      <td><?php echo $d['jenis_buku']; ?></td>
      <td><center><?php echo $d['jumlah_buku']; ?> Buah</center></td>
      <td><center><?php echo $d['sisa_buku']; ?> Buah</center></td>
      <td align="center"><a href="index.php?menu=data_buku&act=edit&id_buku=<?php echo $d['id_buku']; ?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
        <a href="index.php?menu=data_buku&act=del&id_buku=<?php echo $d['id_buku']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $d['nama_buku'];?>')" title="Hapus Data" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td> 
      </tr>
    <?php 
    $no++;
    } ?>
  </tbody>
</table>
<?php } ?>