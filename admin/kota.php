<?php
$id_kota = $_GET['id_kota'];
if($id_kota != ""){
	$aksi = "proses.php?kota=edit";
	$q = mysql_query("select * from kota where id_kota = '$id_kota'");
	$result = mysql_fetch_assoc($q);
}else{
	$aksi = "proses.php?kota=tambah";
}

?>


<h3>Tampilan Tambah Dan Ubah Kota</h3> 
<form role = "form" action="<?php echo $aksi ?>" method="post">
	<input type = "hidden" id="id_kota" name="id_kota" value="<?php echo $result['id_kota']; ?>">
   <div class = "form-group">
      <label for = "name">Kota</label>
      <input type = "text" class = "form-control" id = "kota" name="kota" value="<?php echo $result['kota']; ?>">
   </div>
   <div class = "form-group">
      <label for = "name">Ongkir</label>
      <input type = "text" class = "form-control" id = "ongkir" name="ongkir" value="<?php echo $result['ongkir']; ?>">
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

<h3>Data Kota</h3><br>   
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>No</th>
						<th>ID Kota</th>
						<th>Kota</th>
						<th>Ongkir</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "../konek2.php";
				$view=mysqli_query($db,"select * from kota order by id_kota desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				$ubah	= "index.php?ubah=true&hal=kota&id_kota=".$row['id_kota'];
				$hapus	= "proses.php?kota=hapus&id_kota=".$row['id_kota'];
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['id_kota'];?></td>
						<td><?php echo $row['kota'];?></td>
						<td><?php echo $row['ongkir'];?></td>
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

