<br><div class="well"><h3 align="center"><b>PENDAFTAR ML ONLINE</b></h3></div>
<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
  if($act=='del'){
    $id=$_GET['id_game'];
    $q=mysqli_query($connect, "DELETE FROM pendaftar WHERE id_game='$id'");
    echo"<script>document.location.href='index.php?menu=pendaftar'</script>";      
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
      <td align="center">
        <a href="index.php?menu=pendaftar&act=del&id_game=<?php echo $d['id_game']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $d['username'];?>')" title="Hapus Data" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a></td> 
      </tr>
    <?php 
    $no++;
    } ?>
  </tbody>
</table>
<?php } ?>