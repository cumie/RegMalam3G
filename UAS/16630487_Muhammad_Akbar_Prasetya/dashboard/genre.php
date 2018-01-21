<br><div class="well"><h3 align="center"><b>PENGELOLAAN USER APLIKASI</b></h3></div>
<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
  if($act=='del'){
    $id=$_GET['id_genre'];
    $q=mysqli_query($connect, "DELETE FROM genre WHERE id_genre='$id'");
    echo"<script>document.location.href='index.php?menu=genre'</script>";      
}
elseif($act=='edit'){
    $id=$_GET['id_genre'];
    $q=mysqli_query($connect, "SELECT * FROM genre WHERE id_genre=$id");
    while($d=mysqli_fetch_array($q)) { ?>
    <form method="POST" action="">
      <table class="table" id="user">
        <caption><h3>Edit Data Genre</h3></caption>
          <tr><td>Nama Genre</td><td><input type="text" name="id_genre" value="<?php echo $d['nama_genre']; ?>"></td></tr>
          <tr><td></td><td><a href="index.php?menu=genre" class="btn btn-danger"> Kembali Ke Data Genre</a> <input type="submit" class="btn btn-success" name="edit" value="Edit Genre"></td></tr>
      </table>
    </form>
<?php 
    if (isset($_POST['edit'])){
      $a=$_POST['id_genre'];
      $hasil = mysqli_query($connect, "UPDATE genre SET nama_genre='$a' WHERE id_genre='$id'");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=genre\"
          </script>";
        }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=genre\"
            </script>";
        }  
    }
  }
}
elseif($act=='tambah') {
?>
  <form method="POST" action="">
    <table class="table" id="user">
      <caption><h3>Tambah Data Master Genre</h3></caption>
      <tr><td>Nama Genre</td><td><input type="text" name="nama_genre"></td></tr>
      <tr><td></td><td><a href="index.php?menu=data_user" class="btn btn-danger"> Kembali Ke Data Genre</a>
      <input type="submit" class="btn btn-success" name="simpan" value="Simpan Data Genre Baru"></td></tr>
    </table>
  </form>
<?php
  if (isset($_POST['simpan'])){
      $a=$_POST['nama_genre'];
        $hasil = mysqli_query($connect, "INSERT INTO genre (nama_genre) values ('$a')");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=genre\"
          </script>";
          }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=genre\"
            </script>";
          }  
      }
}
else { ?>
<a class="btn btn-primary" href="index.php?menu=genre&act=tambah"><i class="glyphicon glyphicon-plus"></i>Tambah Data Genre</a>
<hr>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Genre</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $no=1;
    $query=mysqli_query($connect, "SELECT * FROM genre");
       while($d=mysqli_fetch_array($query))
       { ?>
      <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $d['nama_genre'] ?></td>
      <td align="center"><a href="index.php?menu=genre&act=edit&id_genre=<?php echo $d['id_genre']; ?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Genre</a>
        <a href="index.php?menu=genre&act=del&id_genre=<?php echo $d['id_genre']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $d['nama_genre'];?>')" title="Hapus Data" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Genre</a></td> 
      </tr>
    <?php 
    $no++;
    } ?>
  </tbody>
</table>
<?php } ?>