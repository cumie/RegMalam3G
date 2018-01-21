<br><div class="well"><h3 align="center"><b>DATA USER APLIKASI</b></h3></div>
<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
  if($act=='del'){
    $id=$_GET['id_user'];
    $q=mysqli_query($connect, "DELETE FROM user  WHERE id_user='$id'");
    echo"<script>document.location.href='index.php?menu=data_user'</script>";      
}
elseif($act=='edit'){
    $id=$_GET['id_user'];
    $q=mysqli_query($connect, "SELECT * FROM user WHERE id_user=$id");
    while($d=mysqli_fetch_array($q)) { ?>
    <form method="POST" action="">
      <table class="table" id="user">
        <caption><h3>Edit Data User</h3></caption>
          <tr><td>Username</td><td><input type="text" name="username" value="<?php echo $d['username']; ?>"></td></tr>
          <tr><td>Password</td><td><input type="text" name="password" value="<?php echo $d['password']; ?>"></td></tr>
          <tr><td>Nama Lengkap</td><td><input type="text" name="nama_lengkap" value="<?php echo $d['nama_lengkap']; ?>"></td></tr>
          <tr><td>Jenis Kelamin</td><td>
                <select name="jk">
                  <option value="<?php echo $d['jk']; ?>"><?php echo $d['jk']; ?></option>
                  <option value="<?php echo $d['jk']; ?>"><- Pilih Jenis Kelamin Yang Baru -></option>
                  <option value="Laki - Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select></td></tr>
          <tr><td></td><td><a href="index.php?menu=data_user" class="btn btn-danger"> Kembali Ke Data User</a> <input type="submit" class="btn btn-success" name="edit_user" value="edit"></td></tr>
      </table>
    </form>
<?php 
    if (isset($_POST['edit_user'])){
      $a=$_POST['username'];
      $b=$_POST['password'];
      $c=$_POST['nama_lengkap'];
      $d=$_POST['jk'];
      $hasil = mysqli_query($connect, "UPDATE user SET nama_lengkap='$c', username='$a', password='$b', jk='$d' WHERE id_user='$id'");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=data_user\"
          </script>";
        }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=data_user\"
            </script>";
        }  
    }
  }
}
elseif($act=='tambah') {
?>
  <form method="POST" action="">
    <table class="table" id="user">
      <caption><h3>Tambah Data User Aplikasi</h3></caption>
      <tr><td>username</td><td><input type="text" name="username"></td></tr>
      <tr><td>Password</td><td><input type="text" name="password"></td></tr>
      <tr><td>Nama Lengkap</td><td><input type="text" name="nama_lengkap"></td></tr>
      <tr><td>Jenis Kelamin</td><td>
          <select name="jk">
              <option value="Laki - Laki"><- Pilih Jenis Kelamin Yang Baru -></option>
              <option value="Laki - Laki">Laki - Laki</option>
              <option value="Perempuan">Perempuan</option>
          </select></td></tr>
      <tr><td></td><td><a href="index.php?menu=data_user" class="btn btn-danger"> Kembali Ke List User</a>
      <input type="submit" class="btn btn-success" name="simpan" value="Simpan Data User Baru"></td></tr>
    </table>
  </form>
<?php
  if (isset($_POST['simpan'])){
      $a=$_POST['username'];
      $b=$_POST['password'];
      $c=$_POST['nama_lengkap'];
      $d=$_POST['jk'];
        $hasil = mysqli_query($connect, "INSERT INTO user (username,password,nama_lengkap,jk) values ('$a','$b','$c','$d')");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=data_user\"
          </script>";
          }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=data_user\"
            </script>";
          }  
      }
}
else { ?>
<a class="btn btn-primary" href="index.php?menu=data_user&act=tambah"><i class="glyphicon glyphicon-plus"></i>Tambah Data User Aplikasi</a>
<hr>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Lengkap</th>
      <th>Jenis Kelamin</th>
      <th>Username</th>
      <th>Password</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $no=1;
    $query=mysqli_query($connect, "SELECT * FROM user");
       while($d=mysqli_fetch_array($query))
       { ?>
      <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $d['nama_lengkap'] ?></td>
      <td><?php echo $d['jk']; ?></td>
      <td><?php echo $d['username']; ?></td>
      <td><?php echo $d['password']; ?></td>
      <td align="center"><a href="index.php?menu=data_user&act=edit&id_user=<?php echo $d['id_user']; ?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
        <a href="index.php?menu=data_user&act=del&id_user=<?php echo $d['id_user']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $d['nama_lengkap'];?>')" title="Hapus Data" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td> 
      </tr>
    <?php 
    $no++;
    } ?>
  </tbody>
</table>
<?php } ?>