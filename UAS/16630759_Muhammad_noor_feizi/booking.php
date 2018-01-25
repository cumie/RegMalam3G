<br><div class="well"><h3 align="center"><b>DATA - DATA PEMESANAN KAMAR HOTEL</b></h3></div>
<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
  if($act=='del'){
    $id=$_GET['id_book'];
    $q=mysqli_query($connect, "DELETE FROM booking WHERE id_book='$id'");
    echo"<script>document.location.href='index.php?menu=booking'</script>";      
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
          <tr><td></td><td><a href="index.php?menu=booking" class="btn btn-danger"> Kembali Ke Data Pemesanan</a> <input type="submit" class="btn btn-success" name="edit_user" value="Edit Data Pemesanan"></td></tr>
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
            document.location=\"index.php?menu=booking\"
          </script>";
        }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=booking\"
            </script>";
        }  
    }
  }
}
elseif($act=='tambah') {
?>
  <form method="POST" action="">
    <table class="table" id="user">
      <caption><h3>Tambah Data Pemesanan</h3></caption>
      <tr><td>Nama Pelanggan</td><td><select name="nama_pelanggan">
      <?php 
      $a=mysqli_query($connect, "SELECT * FROM pelanggan");
      while ($b=mysqli_fetch_array($a)) {
        ?>
      <option value="<?php echo $b['id_pelanggan']; ?>"><?php echo $b['nama_pelanggan']; ?></option>
      <?php } ?>
      </select></td></tr>
      <tr><td>Nama Kamar</td><td><select name="nama_kamar">
      <?php 
      $a=mysqli_query($connect, "SELECT * FROM kamar");
      while ($b=mysqli_fetch_array($a)) {
        ?>
      <option value="<?php echo $b['id_kamar']; ?>"><?php echo $b['nama_kamar']; ?></option>
      <?php } ?>
      </select></td></tr>
      <tr><td>Batas Akhir Pemesanan</td><td><input type="date" name="akhir_pesan"></td></tr>
      <tr><td>Biaya Pemesanan</td><td><input type="number" name="price"></td></tr>
      <tr><td></td><td><a href="index.php?menu=booking" class="btn btn-danger"> Kembali Ke Data Pemesanan</a>
      <input type="submit" class="btn btn-success" name="simpan" value="Simpan Data Kamar Baru"></td></tr>
    </table>
  </form>
<?php
  if (isset($_POST['simpan'])){
      $a=$_POST['nama_pelanggan'];
      $b=$_POST['nama_kamar'];
      $c=$_POST['akhir_pesan'];
      $d=$_POST['price'];
        $hasil = mysqli_query($connect, "INSERT INTO booking (id_pelanggan,id_kamar,akhir_pesan,price) values ('$a','$b','$c','$d')");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=booking\"
          </script>";
          }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=booking\"
            </script>";
          }  
      }
}
else { ?>
<a class="btn btn-primary" href="index.php?menu=booking&act=tambah"><i class="glyphicon glyphicon-plus"></i>Tambah Data Pemesanan Kamar</a>
<a class="btn btn-success" onclick="window.print();"><i class="glyphicon glyphicon-print"></i> Print / Cetak Data Pemesanan Kamar Hotel</a>
<hr>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Pelanggan</th>
      <th>Kamar Yang Dipesan</th>
      <th>Dari Tanggal</th>
      <th>Sampai Tanggal</th>
      <th>Biaya</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $no=1;
    $query=mysqli_query($connect, "SELECT * FROM booking");
       while($d=mysqli_fetch_array($query))
       { ?>
      <tr>
      <td><?php echo $no; ?></td>
      <td><?php $c=$d['id_pelanggan']; 
      $a=mysqli_query($connect, "SELECT * FROM pelanggan WHERE id_pelanggan='$c'");
      while ($b=mysqli_fetch_array($a)) {
        echo $b['nama_pelanggan']; }
         ?></td>
      <td><?php $c=$d['id_kamar']; 
      $a=mysqli_query($connect, "SELECT * FROM kamar WHERE id_kamar='$c'");
      while ($b=mysqli_fetch_array($a)) {
        echo $b['nama_kamar']; }
         ?></td>
      <td><?php echo $d['awal_pesan']; ?></td>
      <td><?php echo $d['akhir_pesan']; ?></td>
      <td>Rp. <?php echo $d['price']; ?></td>
      <td align="center">
        <a href="index.php?menu=booking&act=del&id_book=<?php echo $d['id_book']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $d['nama_kamar'];?>')" title="Hapus Data" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Pemesanan</a></td> 
      </tr>
    <?php 
    $no++;
    } ?>
  </tbody>
</table>
<?php } ?>