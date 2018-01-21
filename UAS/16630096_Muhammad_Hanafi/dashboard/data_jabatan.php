<br><div class="well"><h3 align="center"><b>LIST JABATAN KARYAWAN</b></h4></div>
<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
  if($act=='del'){
    $id=$_GET['id_jabatan'];
    $q=mysqli_query($connect, "DELETE FROM list_jabatan WHERE id_jabatan='$id'");
    echo"<script>document.location.href='index.php?menu=jabatan'</script>";      
}
  elseif($act=='edit'){
    $id=$_GET['id_jabatan'];
    $q=mysqli_query($connect, "SELECT * FROM list_jabatan WHERE id_jabatan=$id");
      while($d=mysqli_fetch_array($q)) { ?>
      <form method="POST" action="">
          <table class="table" id="user">
            <caption><h3>Edit Data List Jabatan</h3></caption>
            <tr><td>List Data Jabatan</td><td><input type="text" name="nama_jabatan" value="<?php echo $d['nama_jabatan']; ?>"></td></tr>
            <tr><td></td><td><a href="index.php?menu=jabatan" class="btn btn-danger"> Kembali Ke List Jabatan Karyawan</a>
                <input type="submit" class="btn btn-success" name="edit" value="Edit List Jabatan"></td></tr>
          </table>
      </form>
  <?php 
      if (isset($_POST['edit'])){
        $a=$_POST['nama_jabatan'];
        $hasil = mysqli_query($connect, "UPDATE list_jabatan SET nama_jabatan='$a' WHERE id_jabatan='$id'");
        if ($hasil) {
          echo "<script>
          alert(\"Success!\");
          document.location=\"index.php?menu=jabatan\"
        </script>";
      }
      else {
          echo "<script>
          alert(\"Gagal\");
          document.location=\"index.php?menu=jabatan\"
        </script>";
      }  
    }
  }
}
elseif($act=='tambah') {
?>
<form method="POST" action="">
    <table class="table" id="user">
      <caption><h3>Tambah Data List Jabatan</h3></caption>
      <tr><td>List Data Jabatan</td><td><input type="text" name="nama_jabatan"></td></tr>
      <tr><td></td><td><a href="index.php?menu=jabatan" class="btn btn-danger"> Kembali Ke List Jabatan Karyawan</a>
      <input type="submit" class="btn btn-success" name="simpan" value="Simpan List Jabatan"></td></tr>
    </table>
</form>
<?php
    if (isset($_POST['simpan'])){
        $a=$_POST['nama_jabatan'];
        $hasil = mysqli_query($connect, "INSERT INTO list_jabatan (nama_jabatan) values ('$a')");
        if ($hasil) {
          echo "<script>
          alert(\"Success!\");
          document.location=\"index.php?menu=jabatan\"
        </script>";
      }
      else {
          echo "<script>
          alert(\"Gagal\");
          document.location=\"index.php?menu=jabatan\"
        </script>";
      }  
    }
}
else { ?>
<a class="btn btn-primary" href="index.php?menu=jabatan&act=tambah"><i class="glyphicon glyphicon-plus"></i>Tambah List Kategori Jabatan</a>
<hr>
<table class="table table-striped table-bordered">
  <thead>
    <tr style="background-color: red;">
      <th>No</th>
      <th>Nama Jabatan</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $no=1;
    $query=mysqli_query($connect, "SELECT * FROM list_jabatan");
       while($d=mysqli_fetch_array($query))
       { ?>
      <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $d['nama_jabatan'] ?></td>
      <td align="center"><a href="index.php?menu=jabatan&act=edit&id_jabatan=<?php echo $d['id_jabatan']; ?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
        <a href="index.php?menu=jabatan&act=del&id_jabatan=<?php echo $d['id_jabatan']; ?>" title="Hapus Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $d['nama_jabatan'];?>')" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a></td> 
      </tr>
    <?php 
    $no++;
    } ?>
  </tbody>
</table>
<?php } ?>