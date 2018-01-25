<br><div class="well"><h3 align="center"><b>DATA - DATA KAMAR HOTEL</b></h3></div>
<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
  if($act=='del'){
    $id=$_GET['id_kamar'];
    $q=mysqli_query($connect, "DELETE FROM kamar WHERE id_kamar='$id'");
    echo"<script>document.location.href='index.php?menu=data_kamar'</script>";      
}
elseif($act=='edit'){
    $id=$_GET['id_kamar'];
    $q=mysqli_query($connect, "SELECT * FROM kamar WHERE id_kamar=$id");
    while($d=mysqli_fetch_array($q)) { ?>
    <form method="POST" action="">
      <table class="table" id="user">
        <caption><h3>Edit Data Kamar</h3></caption>
          <tr><td>Nama Kamar</td><td><input type="text" name="nama_kamar" value="<?php echo $d['nama_kamar']; ?>"></td></tr>
          <tr><td>Lokasi Kamar</td><td><input type="text" name="lokasi" value="<?php echo $d['lokasi']; ?>"></td></tr>
          <tr><td>status Kamar</td><td>
                <select name="status">
                  <option value="<?php echo $d['status']; ?>"><?php echo $d['status']; ?></option>
                  <option value="<?php echo $d['jk']; ?>"><- Pilih Yang Baru -></option>
                  <option value="0">Available (Tersedia)</option>
                  <option value="1">Reserve (Dipesan)</option>
                </select></td></tr>
          <tr><td></td><td><a href="index.php?menu=data_kamar" class="btn btn-danger"> Kembali Ke Data Kamar</a> <input type="submit" class="btn btn-success" name="edit_user" value="Edit Data Kamar"></td></tr>
      </table>
    </form>
<?php 
    if (isset($_POST['edit_user'])){
      $a=$_POST['nama_kamar'];
      $b=$_POST['lokasi'];
      $c=$_POST['status'];
      $hasil = mysqli_query($connect, "UPDATE kamar SET nama_kamar='$a', lokasi='$b', status='$c' WHERE id_kamar='$id'");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=data_kamar\"
          </script>";
        }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=data_kamar\"
            </script>";
        }  
    }
  }
}
elseif($act=='tambah') {
?>
  <form method="POST" action="">
    <table class="table" id="user">
      <caption><h3>Tambah Data Kamar</h3></caption>
      <tr><td>Nama Kamar</td><td><input type="text" name="nama_kamar"></td></tr>
      <tr><td>Lokasi</td><td><input type="text" name="lokasi"></td></tr>
      <tr><td>status Kamar</td><td>
                <select name="status">
                  <option value="0">Available (Tersedia)</option>
                  <option value="1">Reserve (Dipesan)</option>
                </select></td></tr>
      <tr><td></td><td><a href="index.php?menu=data_kamar" class="btn btn-danger"> Kembali Ke Data Kamar</a>
      <input type="submit" class="btn btn-success" name="simpan" value="Simpan Data Kamar Baru"></td></tr>
    </table>
  </form>
<?php
  if (isset($_POST['simpan'])){
      $a=$_POST['nama_kamar'];
      $b=$_POST['lokasi'];
      $c=$_POST['status'];
        $hasil = mysqli_query($connect, "INSERT INTO kamar (nama_kamar,lokasi,status) values ('$a','$b','$c')");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=data_kamar\"
          </script>";
          }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=data_kamar\"
            </script>";
          }  
      }
}
else { ?>
<a class="btn btn-primary" href="index.php?menu=data_kamar&act=tambah"><i class="glyphicon glyphicon-plus"></i>Tambah Data Kamar</a>
<a class="btn btn-success" onclick="window.print();"><i class="glyphicon glyphicon-print"></i> Print / Cetak Data Kamar Hotel</a>
<hr>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Kamar</th>
      <th>Lokasi</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $no=1;
    $query=mysqli_query($connect, "SELECT * FROM kamar");
       while($d=mysqli_fetch_array($query))
       { ?>
      <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $d['nama_kamar'] ?></td>
      <td><?php echo $d['lokasi']; ?></td>
      <td><?php $stat=$d['status']; 
      if($stat=='0') {
        echo "Available (Tersedia)"; }
        else {
          echo "Reserve (Dipesan)"; }?></td>
      <td align="center"><a href="index.php?menu=data_kamar&act=edit&id_kamar=<?php echo $d['id_kamar']; ?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
        <a href="index.php?menu=data_kamar&act=del&id_kamar=<?php echo $d['id_kamar']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $d['nama_kamar'];?>')" title="Hapus Data" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td> 
      </tr>
    <?php 
    $no++;
    } ?>
  </tbody>
</table>
<?php } ?>