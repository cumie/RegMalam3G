<br><div class="well"><h3 align="center"><b>DATA GAJI KARYAWAN</b></h4></div>
<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
  if($act=='del'){
    $id=$_GET['id_gaji'];
    $q=mysqli_query($connect, "DELETE FROM gaji_karyawan WHERE id_gaji='$id'");
    echo"<script>document.location.href='index.php?menu=gaji'</script>";      
}
elseif($act=='tambah') {
    ?>
  <form method="POST" action="">
    <table class="table" id="user">
      <caption><h3>Tambah Data Gaji Karyawan</h3></caption>
      <tr><td>Nama Karyawan</td><td>
          <select name="nik">
              <?php
              $cek=mysqli_query($connect, "SELECT * FROM karyawan");
              while ($data=mysqli_fetch_array($cek)) { ?>
              <option value="<?php echo $data['nik']; ?>"><?php echo $data['nama']; ?></option>
              <?php } ?>
          </select>
      </td></tr>
      <tr><td>Nominal Gaji</td><td><input type="number" placeholder="Isikan Nominal Gaji Karyawan" name="nominal"></td></tr>      
      <tr><td>Gaji Bulan</td><td>
          <select name="bulan">
              <option value="Januari">Januari</option>
              <option value="Februari">Februari</option>
              <option value="Maret">Maret</option>
              <option value="April">April</option>
              <option value="Mei">Mei</option>
              <option value="Juni">Juni</option>
              <option value="Juli">Juli</option>
              <option value="Agustus">Agustus</option>
              <option value="September">September</option>
              <option value="Oktober">Oktober</option>
              <option value="November">November</option>
              <option value="Desember">Desember</option>
          </select>
      </td></tr>
      <tr><td></td><td><a href="index.php?menu=gaji" class="btn btn-danger"> Kembali Ke Data Gaji Karyawan</a>
      <input type="submit" class="btn btn-success" name="simpan" value="Simpan Data Gaji"></td></tr>
    </table>
</form>
<?php
    if (isset($_POST['simpan'])){
        $a=$_POST['nik'];
        $b=$_POST['nominal'];
        $c=$_POST['bulan'];
        $hasil = mysqli_query($connect, "INSERT INTO  gaji_karyawan (nik,nominal,bulan) values ('$a','$b','$c')");
        if ($hasil) {
          echo "<script>
          alert(\"Success!\");
          document.location=\"index.php?menu=gaji\"
        </script>";
      }
      else {
          echo "<script>
          alert(\"Gagal\");
          document.location=\"index.php?menu=gaji\"
        </script>";
      }  
    }
}elseif($act=='edit') {
  $id=$_GET['id_gaji'];
    $q=mysqli_query($connect, "SELECT * FROM gaji_karyawan WHERE id_gaji=$id");
      while($d=mysqli_fetch_array($q)) { ?>
  <form method="POST" action="">
    <table class="table" id="user">
      <caption><h3>Edit Data Gaji Karyawan</h3></caption>
      <tr><td>Nama Karyawan</td><td>
          <select name="nik">
              <?php
              $nik=$d['nik'];
              $cek=mysqli_query($connect, "SELECT * FROM karyawan WHERE nik=$nik");
              while ($data=mysqli_fetch_array($cek)) { ?>
              <option value="<?php echo $data['nik']; ?>"><?php echo $data['nama']; ?></option>
              <?php } ?>

              <option value="$data['nama'];">---Pilih Karyawan----</option>
              <?php
              $nik=$d['nik'];
              $cek=mysqli_query($connect, "SELECT * FROM karyawan");
              while ($data=mysqli_fetch_array($cek)) { ?>
              <option value="<?php echo $data['nik']; ?>"><?php echo $data['nama']; ?></option>
              <?php } ?>
          </select>
      </td></tr>
      <tr><td>Nominal Gaji</td><td><input type="number" placeholder="Isikan Nominal Gaji Karyawan" value="<?php echo $d['nominal']; ?>" name="nominal"></td></tr>      
      <tr><td>Gaji Bulan</td><td>
          <select name="bulan">
              <option value="<?php echo $d['bulan']; ?>"><?php echo $d['bulan']; ?></option>
              <option value="<?php echo $d['bulan']; ?>">--Pilih Bulan---</option>
              <option value="Januari">Januari</option>
              <option value="Februari">Februari</option>
              <option value="Maret">Maret</option>
              <option value="April">April</option>
              <option value="Mei">Mei</option>
              <option value="Juni">Juni</option>
              <option value="Juli">Juli</option>
              <option value="Agustus">Agustus</option>
              <option value="September">September</option>
              <option value="Oktober">Oktober</option>
              <option value="November">November</option>
              <option value="Desember">Desember</option>
          </select>
      </td></tr>
      <tr><td></td><td><a href="index.php?menu=gaji" class="btn btn-danger"> Kembali Ke Data Gaji Karyawan</a>
      <input type="submit" class="btn btn-success" name="edit" value="Edit Data Gaji"></td></tr>
    </table>
</form>
<?php
}
    if (isset($_POST['edit'])){
        $a=$_POST['nik'];
        $b=$_POST['nominal'];
        $c=$_POST['bulan'];
        $hasil = mysqli_query($connect, "UPDATE gaji_karyawan SET nik='$a', nominal='$b' ,bulan='$c' WHERE id_gaji=$id");
        if ($hasil) {
          echo "<script>
          alert(\"Success!\");
          document.location=\"index.php?menu=gaji\"
        </script>";
      }
      else {
          echo "<script>
          alert(\"Gagal\");
          document.location=\"index.php?menu=gaji\"
        </script>";
      }  
    }
}
else { ?>
<a class="btn btn-primary" href="index.php?menu=gaji&act=tambah"><i class="glyphicon glyphicon-plus"></i>Tambah Data Gaji Karyawan</a><small> Setiap Data Gaji Ini Mendapatkan Pajak Sebesar 5%</small>
<hr>
<table class="table table-striped table-bordered">
  <thead>
    <tr style="background-color: red;">
      <th>No</th>
      <th>Nama Karyawan</th>
      <th>Nominal Gaji</th>
      <th>Pajak</th>
      <th>Terima Bersih</th>
      <th>Gaji Bulan</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $no=1;
    $query=mysqli_query($connect, "SELECT * FROM gaji_karyawan");
       while($d=mysqli_fetch_array($query))
       { ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php 
                $nik=$d['nik'];
                $queryy=mysqli_query($connect, "SELECT * FROM karyawan WHERE nik=$nik");
         while($dd=mysqli_fetch_array($queryy))
         { echo $dd['nama']; } ?></td>
        <td>Rp. <?php echo $d['nominal'] ?></td>
        <td>Rp. <?php  $gj=$d['nominal']; $pajak=0.05;
                echo $gj*$pajak; ?> (5%)</td>
        <td>Rp. <?php echo $gj-($gj*$pajak); ?></td>
        <td><?php echo $d['bulan'] ?></td>
        <td align="center"><a href="index.php?menu=gaji&act=edit&id_gaji=<?php echo $d['id_gaji'];?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
          <a href="index.php?menu=gaji&act=del&id_gaji=<?php echo $d['id_gaji'];?>" title="Hapus Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data Gaji <?php echo $d['nik'];?>')" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td> 
      </tr>
    <?php 
    $no++;
    } ?>
  </tbody>
</table>
<?php } ?>