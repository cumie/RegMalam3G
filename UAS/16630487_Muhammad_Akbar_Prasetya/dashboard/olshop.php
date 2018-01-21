<br><div class="well"><h3 align="center"><b>PENGELOLAAN SHOP ONLINE</b></h3></div>
<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
  if($act=='del'){
    $id=$_GET['id_shop'];
    $q=mysqli_query($connect, "DELETE FROM shop WHERE id_shop='$id'");
    echo"<script>document.location.href='index.php?menu=shop'</script>";      
}
elseif($act=='edit'){
    $id=$_GET['id_shop'];
    $q=mysqli_query($connect, "SELECT * FROM shop WHERE id_shop=$id");
    while($d=mysqli_fetch_array($q)) { ?>
    <form method="POST" action=""  enctype="multipart/form-data" >
    <table class="table" id="user">
      <caption><h3>Edit Data Master Shop</h3></caption>
      <tr><td>Nama Shop</td><td><input type="text" name="nama_shop" value="<?php echo $d['nama_shop']; ?>"></td></tr>
      <tr><td>Harga</td><td><input type="text" name="harga" value="<?php echo $d['harga']; ?>"></td></tr>
      <tr><td></td><td><img src="../assets/img/<?php echo $d['pic']; ?>" width="30%"></td></tr>
      <tr><td>Ubah Gambar</td><td><input type="file" name="pic"></td></tr>
      <tr><td></td><td><a href="index.php?menu=shop" class="btn btn-danger"> Kembali Ke Data  Shop</a>
      <input type="submit" class="btn btn-success" name="simpan" value="Edit Data Shop Baru"></td></tr>
    </table>
  </form>
<?php
  if (isset($_POST['simpan'])){
      $a=$_POST['nama_shop'];
      $b=$_POST['harga'];
      $fileName = $_FILES['pic']['name'];
        $hasil = mysqli_query($connect, "UPDATE shop SET nama_shop='$a', harga='$b', pic='$fileName' WHERE id_shop=$id");
        move_uploaded_file($_FILES['pic']['tmp_name'], "../assets/img/".$_FILES['pic']['name']);
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=shop\"
          </script>";
          }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=shop\"
            </script>";
          }  
      }
}
}
elseif($act=='tambah') {
?>
  <form method="POST" action=""  enctype="multipart/form-data" >
    <table class="table" id="user">
      <caption><h3>Tambah Data Master Shop</h3></caption>
      <tr><td>Nama Shop</td><td><input type="text" name="nama_shop"></td></tr>
      <tr><td>Harga</td><td><input type="text" name="harga"></td></tr>
      <tr><td>Gambar</td><td><input type="file" name="pic"></td></tr>
      <tr><td></td><td><a href="index.php?menu=shop" class="btn btn-danger"> Kembali Ke Data  Shop</a>
      <input type="submit" class="btn btn-success" name="simpan" value="Simpan Data Shop Baru"></td></tr>
    </table>
  </form>
<?php
  if (isset($_POST['simpan'])){
      $a=$_POST['nama_shop'];
      $b=$_POST['harga'];
      $fileName = $_FILES['pic']['name'];
        $hasil = mysqli_query($connect, "INSERT INTO shop (nama_shop,harga,pic) values ('$a','$b','$fileName')");
        move_uploaded_file($_FILES['pic']['tmp_name'], "../assets/img/".$_FILES['pic']['name']);
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=shop\"
          </script>";
          }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=shop\"
            </script>";
          }  
      }
}
else { ?>
<a class="btn btn-primary" href="index.php?menu=shop&act=tambah"><i class="glyphicon glyphicon-plus"></i>Tambah Data Genre</a>
<hr>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Shop</th>
      <th>Gambar</th>
      <th>Harga</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $no=1;
    $query=mysqli_query($connect, "SELECT * FROM shop");
       while($d=mysqli_fetch_array($query))
       { ?>
      <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $d['nama_shop'] ?></td>
      <td width="100px"><center><img src="../assets/img/<?php echo $d['pic']; ?>" width="50%"></center></td>
      <td><?php echo $d['harga'] ?></td>
      <td align="center"><a href="index.php?menu=shop&act=edit&id_shop=<?php echo $d['id_shop']; ?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Shop</a>
        <a href="index.php?menu=shop&act=del&id_shop=<?php echo $d['id_shop']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $d['nama_shop'];?>')" title="Hapus Data" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Shop</a></td> 
      </tr>
    <?php 
    $no++;
    } ?>
  </tbody>
</table>
<?php } ?>