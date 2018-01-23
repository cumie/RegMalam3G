<?php include "head.php" ;?>
<div class="container">
  <h3>Data Dosen</h3>
  <hr/>
 <?php include "koneksi.php"; ?>
<?php 
	if (isset($_GET['aksi'])=='delete'){
		$nik = $_GET['nik'];
		$cek = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nik ='$nik'");
		if(mysqli_num_rows($cek) == 0){
			echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Tidak Ditemukan.</div>';
			}
			else{
				$delete = mysqli_query($koneksi, "DELETE FROM dosen WHERE nik = '$nik'");
				if($delete){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data dosen Berhasil Dihapus.</div>';
					}
					else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Gagal Dihapus.</div>';
						}
				}
		}

$page_sql="SELECT * FROM dosen";
if (isset($_POST['qcari'])){
	$qcari=$_POST['qcari'];
	$page_sql="SELECT * FROM dosen WHERE nik like '%qcari%' or nama like '%qcari%' or no_telepon like '%qcari%' or tempat_lahir like '%qcari%' ";
	}
?>
<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="dosen_add.php" class="btn btn-succes">Tambah Data</a>

<div class="form-group">
	<div class="left">
    	<form class="form-inline" method="get">
        	<select name="filter" class="form-control" onChange="form.submit()">
            	<option value="0">Filter Data dosen</option>
            	<?php $filter=(isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
                <option value="Teknik Informatika"><?php if($filter =='Teknik Informatika') {echo'selected';} ?>>Teknik Informatika</option>
                <option value="Teknik Sipil"><?php if($filter =='Teknik Sipil') {echo'selected';} ?>>Teknik Sipil</option>
                <option value="Sistem Informasia"><?php if($filter =='Sistem Informasi') {echo'selected';} ?>Sistem Informasi</option>
				 <option value="Kesehatan Masyarakat"><?php if($filter =='Kesehatan Masyarakati') {echo'selected';} ?>Kesehatan Masyarakat</option>
            </select>
        </form>
    </div>
    <div class="right">
    	<form class="" method="post" action="dosen_data.php">
        	<input type="text" class="form-control" name="qcari" placeholder="Cari Data" autofocus>
        </form>
    </div>
    
    <br/>
    <br/>
    <div class="table-responsive">
    	<table class="table table-striped table-hover">
        	<tr>
            	<th>No</th>
                <th>nik</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>No Telepon</th>
                <th>Fakultas</th>
                <th>matakuliah</th>
                <th>Tools</th>
            </tr>
            <?php include "koneksi.php"; ?>
            <?php include "library.php"; ?>
            <?php 
				if($filter){
					$sql = mysqli_query($koneksi,"SELECT * FROM dosen WHERE matakuliah ='$filter' ORDER BY nik ASC");
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
                    <td><a href="dosen_detail.php?nik=<?php echo $row['nik']; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $row['nama']; ?></a></td>
                    <td><?php echo $row['tempat_lahir']; ?></td>
                    <td><?php echo indonesiaTgl($row['tanggal_lahir'])?></td>
                    <td><?php echo $row['no_telepon']; ?></td>
                    <td><?php echo $row['prodi']; ?></td>
                    <td>
					<?php 
						if($row['matakuliah']== 'VISUAL BASIC'){	
						?>
                    <span class="label label-success">VISUAL BASIC</span>
                    <?php }
						else if($row['matakuliah']== 'KOMPUTER JARINGAN'){
                    ?>
                    <span class="label label-info">KOMPUTER JARINGAN</span>
                    <?php }
						else if($row['matakuliah']== 'SISTEM INFORMASI MENEJEMEN'){
					?>
                    <span class="label label-warning">SISTEM INFORMASI MENEJEMEN</span>
						<?php }
						
					else	if($row['matakuliah']== 'PEMOGRAMAN WEB'){	
						?>
                    <span class="label label-success">PEMOGRAMAN WEB</span>
						<?php }
					else	if($row['matakuliah']== 'PEMOGRAMAN TEKSTURE'){	
						?>
                    <span class="label label-success">PEMOGRAMAN TEKSTURE</span>
						
                   <?php } ?>  
                    </td>
                    <td>
                    	<a href="dosen_edit.php?nik=<?php echo $row['nik']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        
                        <a href="dosen_data.php?aksi=delete&nik=<?php echo $row['nik']; ?>" title="Hapus Data" onClick="return confirm('Anda Yakin Akan Menghapus Data <?php echo $row['nama']; ?> ??')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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