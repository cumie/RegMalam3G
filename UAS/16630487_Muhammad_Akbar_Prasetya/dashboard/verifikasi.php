<br><div class="well"><h3 align="center"><b>Verifikasi Pendaftar</b></h3></div>
<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
  if($act=='del'){
    $id=$_GET['id_game'];
    $q=mysqli_query($connect, "DELETE FROM pendaftar WHERE id_game='$id'");
    echo"<script>document.location.href='index.php?menu=pendaftar'</script>";      
}
elseif($act=='ver'){
  $id=$_GET['id_game'];
  $q=mysqli_query($connect, "UPDATE pendaftar SET status='1' WHERE id_game='$id'");
  echo"<script>document.location.href='index.php?menu=verifikasi'</script>";
}
else { ?>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>ID GAME</th>
      <th>Username</th>
      <th>Password</th>
      <th>E-mail</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $no=1;
    $query=mysqli_query($connect, "SELECT * FROM pendaftar");
       while($d=mysqli_fetch_array($query))
       { ?>
      <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $d['id_game'] ?></td>
      <td><?php echo $d['username']; ?></td>
      <td><?php echo $d['password']; ?></td>
      <td><?php echo $d['email']; ?></td>
      <td><center><?php if($d['status']=='1'){echo"<a class='btn btn-sm btn-default'><i class='fa fa-check'></i>Terverifikasi</a>"; }else{ 
              echo"<a class='btn btn-sm btn-default'><i class='fa fa-toggle-off'></i>Belum Diverifikasi</a>"; } ?></center></td>
      <td><?php if($d['status']=='0'){echo"<a class='btn btn-sm btn-danger' href='index.php?menu=verifikasi&act=ver&id_game=$d[0]'><i class='fa fa-toggle-off'></i> Verifikasi Sekarang</a>";}
      else {
        echo "<center><button class='btn btn-sm btn-success'>Complete</button></center>";
      } ?></td>
      </tr>
    <?php 
    $no++;
    } ?>
  </tbody>
</table>
<?php } ?>