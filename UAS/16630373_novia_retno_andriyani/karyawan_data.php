<?php include "head.php" ;?>
<div class="container">
  <h3>Data Karyawan</h3>
  <hr/>
 <?php include "koneksi.php"; ?>
<?php 
	if (isset($_GET['aksi'])=='delete'){
		$nik = $_GET['nik'];
		$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik ='$nik'");
		if(mysqli_num_rows($cek) == 0){
			echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Tidak Ditemukan.</div>';
			}
			else{
				$delete = mysqli_query($koneksi, "DELETE FROM karyawan WHERE nik = '$nik'");
				if($delete){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Karyawan Berhasil Dihapus.</div>';
					}
					else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Gagal Dihapus.</div>';
						}
				}
		}

$page_sql="SELECT * FROM karyawan";
if (isset($_POST['qcari'])){
	$qcari=$_POST['qcari'];
	$page_sql="SELECT * FROM karyawan WHERE nik like '%qcari%' or nama like '%qcari%' or no_telepon like '%qcari%' or tempat_lahir like '%qcari%' ";
	}
?>
<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="karyawan_add.php" class="btn btn-succes">Tambah Data</a>

<div class="form-group">
	<div class="left">
    	<form class="form-inline" method="get">
        	<select name="filter" class="form-control" onChange="form.submit()">
            	<option value="0">Filter Data Karyawan</option>
            	<?php $filter=(isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
                <option value="Tetap"><?php if($filter =='Tetap') {echo'selected';} ?>>Tetap</option>
                <option value="Kontrak"><?php if($filter =='Kontrak') {echo'selected';} ?>>Kontrak</option>
                <option value="Outsourching"><?php if($filter =='Outsourching') {echo'selected';} ?>>Outsourching</option>
            </select>
        </form>
    </div>
    <div class="right">
    	<form class="" method="post" action="karyawan_data.php">
        	<input type="text" class="form-control" name="qcari" placeholder="Cari Data" autofocus>
        </form>
    </div>
    
    <br/>
    <br/>
    <div class="table-responsive">
    	<table class="table table-striped table-hover">
        	<tr>
            	<th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>No Telepon</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Tools</th>
            </tr>
            <?php include "koneksi.php"; ?>
            <?php include "library.php"; ?>
            <?php 
				if($filter){
					$sql = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE status ='$filter' ORDER BY nik ASC");
					}
					else{
						$sql = mysqli_query($koneksi, $page_sql." ORDER BY nik ASC");
						}
				if(mysqli_num_rows($sql) == 0){
			?>
            <tr><td colspan="8">Tidak Ada Data!!!</td></tr>
            <?php
				}else{
					$no = 1;	
					while ($row = mysqli_fetch_assoc($sql)){
			?>	
            	<tr>
                	<td><?php echo $no; ?></td>
                    <td><?php echo $row['nik']; ?></td>
                    <td><a href="karyawan_detail.php?nik=<?php echo $row['nik']; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $row['nama']; ?></a></td>
                    <td><?php echo $row['tempat_lahir']; ?></td>
                    <td><?php echo indonesiaTgl($row['tanggal_lahir'])?></td>
                    <td><?php echo $row['no_telepon']; ?></td>
                    <td><?php echo $row['jabatan']; ?></td>
                    <td>
					<?php 
						if($row['status']== 'Tetap'){	
						?>
                    <span class="label label-success">Tetap</span>
                    <?php }
						else if($row['status']== 'Kontrak'){
                    ?>
                    <span class="label label-info">Kontrak</span>
                    <?php }
						else if($row['status']== 'Outsourching'){
					?>
                    <span class="label label-warning">Outsourching</span>
                   <?php } ?>  
                    </td>
                    <td>
                    	<a href="karyawan_edit.php?nik=<?php echo $row['nik']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        
                        <a href="karyawan_data.php?aksi=delete&nik=<?php echo $row['nik']; ?>" title="Hapus Data" onClick="return confirm('Anda Yakin Akan Menghapus Data <?php echo $row['nama']; ?> ??')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </td>
                </tr>
                <?php 
				$no++;
					}
				}
				?>
        </table>
    </div>
    <?php include "foot.php"; ?>
</div>
</div>