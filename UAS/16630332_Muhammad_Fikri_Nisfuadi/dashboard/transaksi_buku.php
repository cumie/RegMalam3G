<br><div class="well"><h3 align="center"><b>TRANSAKSI BUKU</b></h3></div>
<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
  if($act=='del'){
    $id=$_GET['id_transaksi'];
    $cek=mysqli_query($connect, "SELECT * FROM data_buku");
      while ($h=mysqli_fetch_array($cek)) {
        $sisa=$h['sisa_buku'];
        $sisa2=$sisa+1;
        $id_buku=$h['id_buku'];
      }
        $hasil = mysqli_query($connect, "UPDATE data_buku SET sisa_buku='$sisa2' WHERE id_buku='$id_buku'"); 
    $q=mysqli_query($connect, "DELETE FROM transaksi_buku WHERE id_transaksi='$id'");
    echo"<script>document.location.href='index.php?menu=transaksi_buku'</script>";      
}
elseif($act=='edit'){
    $id=$_GET['id_transaksi'];
    $q=mysqli_query($connect, "SELECT * FROM transaksi_buku WHERE id_transaksi=$id");
    while($d=mysqli_fetch_array($q)) { ?>
    <form method="POST" action="">
      <table class="table" id="user">
        <caption><h3>Edit Data Transaksi Buku</h3></caption>
          <tr><td>Nama Mahasiswa</td><td>
              <select name="npm">
                <?php 
                $npm=$d['npm'];
                $a=mysqli_query($connect, "SELECT * FROM data_mahasiswa WHERE npm=$npm");
                while ($b=mysqli_fetch_array($a)) { ?>
                <option value="<?php echo $b['npm']; ?>"><?php echo $b['nama_mahasiswa']; ?></option>
                <?php } ?>
                <option>-------- Pilih Nama Mahasiswa Yang Baru ------</option>
                <?php 
                $aa=mysqli_query($connect, "SELECT * FROM data_mahasiswa");
                while ($bb=mysqli_fetch_array($aa)) { ?>
                <option value="<?php echo $bb['npm']; ?>"><?php echo $bb['nama_mahasiswa']; ?></option>
                <?php } ?>
              </select>
          </td></tr>
          <tr><td>Buku Yang Dipinjam</td><td>
              <select name="id_buku">
                <?php 
                $id_buku=$d['id_buku'];
                $a=mysqli_query($connect, "SELECT * FROM data_buku WHERE id_buku=$id_buku");
                while ($b=mysqli_fetch_array($a)) { ?>
                <option value="<?php echo $b['id_buku']; ?>"><?php echo $b['nama_buku']; ?> | <b>Penulis :</b> <?php echo $b['penulis']; ?></option>
                <?php } ?>
                <option>-------- Pilih Nama Buku Yang Baru ------</option>
                <?php 
                $id_buku=$d['id_buku'];
                $a=mysqli_query($connect, "SELECT * FROM data_buku");
                while ($b=mysqli_fetch_array($a)) { ?>
                <option value="<?php echo $b['id_buku']; ?>"><?php echo $b['nama_buku']; ?> | <b>Penulis :</b> <?php echo $b['penulis']; ?></option>
                <?php } ?>
              </select></td></tr>
          <tr><td>Tanggal Peminjaman</td><td><input disabled="disable" name="tgl_pinjam" value="<?php echo $d['tgl_pinjam']; ?>"></td></tr>
          <tr><td>Batas Peminjaman</td><td><input type="date" name="batas_pinjam" value="<?php echo $d['batas_pinjam']; ?>"></td></tr>
          <tr><td></td><td><a href="index.php?menu=transaksi_buku" class="btn btn-danger"> Kembali Ke Data Transaksi</a> <input type="submit" class="btn btn-success" name="edit" value="Edit Transaksi"></td></tr>
      </table>
    </form>
<?php 
    if (isset($_POST['edit'])){
      $a=$_POST['npm'];
      $b=$_POST['id_buku'];
      $c=$_POST['batas_pinjam'];
      $hasil = mysqli_query($connect, "UPDATE transaksi_buku SET npm='$a', id_buku='$b', batas_pinjam='$c' WHERE id_transaksi='$id'");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=transaksi_buku\"
          </script>";
        }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=transaksi_buku\"
            </script>";
        }  
    }
  }
}
elseif($act=='tambah') {
?>
  <form method="POST" action="">
    <table class="table" id="user">
      <caption><h3>Transaksi Peminjaman Buku</h3></caption>
      <tr><td>Nama Mahasiswa</td><td>
          <select name="npm">
            <?php 
            $a=mysqli_query($connect, "SELECT * FROM data_mahasiswa");
            while ($b=mysqli_fetch_array($a)) { ?>
            <option value="<?php echo $b['npm']; ?>"><?php echo $b['nama_mahasiswa']; ?></option>
            <?php } ?>
          </select>
      </td></tr>
      <tr><td>Buku Yang Dipinjam</td><td>
          <select name="id_buku">
            <?php 
            $a=mysqli_query($connect, "SELECT * FROM data_buku");
            while ($b=mysqli_fetch_array($a)) { ?>
            <option value="<?php echo $b['id_buku']; ?>"><?php echo $b['nama_buku']; ?> | <b>Penulis :</b> <?php echo $b['penulis']; ?></option>
            <?php } ?>
          </select></td></tr>
      <tr><td>Tanggal Peminjaman</td><td><input disabled="disable" name="tgl_pinjam" value="<?php echo  date('d-m-Y'); ?>"></td></tr>
      <tr><td>Batas Peminjaman</td><td><input type="date" name="batas_pinjam"></td></tr>
      <tr><td></td><td><a href="index.php?menu=transaksi_buku" class="btn btn-danger"> Kembali Ke Data Transaksi</a>
      <input type="submit" class="btn btn-success" name="simpan" value="Simpan Data"></td></tr>
    </table>
  </form>
<?php
  if (isset($_POST['simpan'])){
      $a=$_POST['npm'];
      $b=$_POST['id_buku'];
      $c=$_POST['batas_pinjam'];
      $cek=mysqli_query($connect, "SELECT * FROM data_buku");
      while ($h=mysqli_fetch_array($cek)) {
        $sisa=$h['sisa_buku'];
        $sisa2=$sisa-1;
        $id_buku=$h['id_buku'];
      }
        $hasil = mysqli_query($connect, "UPDATE data_buku SET sisa_buku='$sisa2' WHERE id_buku='$id_buku'"); 
        $hasil = mysqli_query($connect, "INSERT INTO transaksi_buku (npm,id_buku,batas_pinjam) values ('$a','$b','$c')");
          if ($hasil) {
            echo "<script>
            alert(\"Success!\");
            document.location=\"index.php?menu=transaksi_buku\"
          </script>";
          }
          else {
              echo "<script>
              alert(\"Gagal\");
              document.location=\"index.php?menu=transaksi_buku\"
            </script>";
          }  
      }
}
else { ?>
<a class="btn btn-primary" href="index.php?menu=transaksi_buku&act=tambah"><i class="glyphicon glyphicon-plus"></i>TAMBAH DATA PEMINJAMAN BUKU (TRANSAKSI PEMINJAMAN)</a> <a class="btn btn-success" onclick="window.print();"><i class="glyphicon glyphicon-print"></i> Print / Cetak Data Transaksi</a>
<hr>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>NPM</th>
      <th>Nama Mahasiswa</th>
      <th>Nama Buku</th>
      <th>Pengarang</th>
      <th>Tanggal Pinjam</th>
      <th>Batas Pinjam</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $no=1;
    $query=mysqli_query($connect, "SELECT * FROM transaksi_buku");
       while($d=mysqli_fetch_array($query))
       { ?>
      <tr>
      <td><?php echo $no; ?></td>
      <?php
        $npm=$d['npm'];
        $a=mysqli_query($connect, "SELECT * FROM data_mahasiswa WHERE npm=$npm");
        while ($b=mysqli_fetch_array($a)) { ?>
      <td><?php echo $b['npm'] ?></td>
      <td><?php echo $b['nama_mahasiswa']; ?></td>
        <?php } ?>
      <?php
        $bk=$d['id_buku'];
        $a=mysqli_query($connect, "SELECT * FROM data_buku WHERE id_buku=$bk");
        while ($b=mysqli_fetch_array($a)) { ?>
      <td><?php echo $b['nama_buku'] ?></td>
      <td><?php echo $b['penulis']; ?></td>
        <?php } ?>
      <td><?php echo $d['tgl_pinjam']; ?></td>
      <td><?php echo $d['batas_pinjam']; ?></td>
      <td align="center"><a href="index.php?menu=transaksi_buku&act=edit&id_transaksi=<?php echo $d['id_transaksi']; ?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
        <a href="index.php?menu=transaksi_buku&act=del&id_transaksi=<?php echo $d['id_transaksi']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data ?')" title="Hapus Data" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td> 
      </tr>
    <?php 
    $no++;
    } ?>
  </tbody>
</table>
<?php } ?>