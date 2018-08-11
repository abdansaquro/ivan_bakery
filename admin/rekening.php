<?php
$id_rek = $_GET['id_rek'];
if($id_rek != ""){
	$aksi = "proses.php?rekening=edit";
	$q = mysql_query("select * from rekening where id_rek = '$id_rek'");
	$result = mysql_fetch_assoc($q);
}else{
	$aksi = "proses.php?rekening=tambah";
}

?>

<h3>Tampilan Tambah Dan Ubah Rekening</h3> 
<form role = "form" action="<?php echo $aksi ?>" method="post">
	<input type = "hidden" id="id_rek" name="id_rek" value="<?php echo $result['id_rek']; ?>">
   <div class = "form-group">
      <label for = "name">Nama Bank</label>
      <input type = "text"  class = "form-control" id = "nama_bank" name="nama_bank" value="<?php echo $result['nama_bank']; ?>">
   </div>
   <div class = "form-group">
      <label for = "name">Nomor Rekening</label>
      <input type = "text"  class = "form-control" id = "no_rek" name="no_rek" value="<?php echo $result['no_rek']; ?>">
   </div>
   <div class = "form-group">
      <label for = "name">Atas Nama</label>
      <input type = "text"  class = "form-control" id = "atas_nama" name="atas_nama" value="<?php echo $result['atas_nama']; ?>">
   </div>
   <button type = "submit" class = "btn btn-primary">
	<?php
	if($_GET['ubah']){
		echo "Ubah";
	}else{
		echo "Tambah";
	}
	?>
   </button>
</form>

<h3>Data Rekening</h3><br>   
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>No</th>
						<th>ID Rekening</th>
						<th>Nama Bank</th>
						<th>No Rekening</th>
						<th>Atas Nama</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "../konek2.php";
				$view=mysqli_query($db,"select * from rekening order by id_rek desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				$ubah	= "index.php?ubah=true&hal=rekening&id_rek=".$row['id_rek'];
				$hapus	= "proses.php?rekening=hapus&id_rek=".$row['id_rek'];
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['id_rek'];?></td>
						<td><?php echo $row['nama_bank'];?></td>
						<td><?php echo $row['no_rek'];?></td>
						<td><?php echo $row['atas_nama'];?></td>
                       <td>
					    <a href="<?php echo $ubah ?>" class="btn btn-success">
							<span class="glyphicon glyphicon-edit"></span> Ubah 
						</a>
						<a href="<?php echo $hapus ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')">
							<span class="glyphicon glyphicon-trash"></span> Hapus 
						</a>
					</tr>
				<?php
				}
				?>
				</tbody>
				
 </table>
</div>
<br>