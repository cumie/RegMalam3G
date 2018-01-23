<?php include "head.php" ;?>
<div class="container">
  <h3>Data Mahasiswa</h3>
  <hr/>
 <?php include "koneksi.php"; ?>
<?php 
	if (isset($_GET['aksi'])=='delete'){
		$npm = $_GET['npm'];
		$cek = mysqli_query($koneksi, "SELECT * FROM mhs WHERE npm ='$npm'");
		if(mysqli_num_rows($cek) == 0){
			echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Tidak Ditemukan.</div>';
			}
			else{
				$delete = mysqli_query($koneksi, "DELETE FROM mhs WHERE npm = '$npm'");
				if($delete){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Mahasiswa Berhasil Dihapus.</div>';
					}
					else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Gagal Dihapus.</div>';
						}
				}
		}

$page_sql="SELECT * FROM mhs";
if (isset($_POST['qcari'])){
	$qcari=$_POST['qcari'];
	$page_sql="SELECT * FROM mhs WHERE npm like '%qcari%' or nama like '%qcari%' or no_telepon like '%qcari%' or tempat_lahir like '%qcari%' ";
	}
?>
<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="mahasiswa_add.php" class="btn btn-succes">Tambah Data</a>

<div class="form-group">
	<div class="left">
    	<form class="form-inline" method="get">
        	<select name="filter" class="form-control" onChange="form.submit()">
            	<option value="0">Filter Data Mahasiswa</option>
            	<?php $filter=(isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
                <option value="Ganjil"><?php if($filter =='Ganjil') {echo'selected';} ?>>Ganjil</option>
                <option value="Genap"><?php if($filter =='Genap') {echo'selected';} ?>>Genap</option>
                <option value="Ganjil"><?php if($filter =='Ganjil') {echo'selected';} ?>Ganjil</option>
            </select>
        </form>
    </div>
    <div class="right">
    	<form class="" method="post" action="mahasiswa_data.php">
        	<input type="text" class="form-control" name="qcari" placeholder="Cari Data" autofocus>
        </form>
    </div>
    
    <br/>
    <br/>
    <div class="table-responsive">
    	<table class="table table-striped table-hover">
        	<tr>
            	<th>No</th>
                <th>Npm</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>No Telepon</th>
                <th>Fakultas</th>
                <th>Semester</th>
                <th>Tools</th>
            </tr>
            <?php include "koneksi.php"; ?>
            <?php include "library.php"; ?>
            <?php 
				if($filter){
					$sql = mysqli_query($koneksi,"SELECT * FROM mhs WHERE semester ='$filter' ORDER BY npm ASC");
					}
					else{
						$sql = mysqli_query($koneksi, $page_sql." ORDER BY npm ASC");
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
                    <td><?php echo $row['npm']; ?></td>
                    <td><a href="mahasiswa_detail.php?npm=<?php echo $row['npm']; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $row['nama']; ?></a></td>
                    <td><?php echo $row['tempat_lahir']; ?></td>
                    <td><?php echo indonesiaTgl($row['tanggal_lahir'])?></td>
                    <td><?php echo $row['no_telepon']; ?></td>
                    <td><?php echo $row['fakultas']; ?></td>
                    <td>
					<?php 
						if($row['semester']== 'Ganjil'){	
						?>
                    <span class="label label-success">Ganjil</span>
                    <?php }
						else if($row['semester']== 'Genap'){
                    ?>
                    <span class="label label-info">Genap</span>
                    <?php }
						else if($row['semester']== 'Ganjil'){
					?>
                    <span class="label label-warning">Ganjil</span>
                   <?php } ?>  
                    </td>
                    <td>
                    	<a href="mahasiswa_edit.php?npm=<?php echo $row['npm']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        
                        <a href="mahasiswa_data.php?aksi=delete&npm=<?php echo $row['npm']; ?>" title="Hapus Data" onClick="return confirm('Anda Yakin Akan Menghapus Data <?php echo $row['nama']; ?> ??')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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