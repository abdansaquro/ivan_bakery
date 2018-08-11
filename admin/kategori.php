<?php
$id_kategori = $_GET['id_kategori'];
if($id_kategori != ""){
	$aksi = "proses.php?kategori=edit";
	$q = mysql_query("select * from kategori where id_kategori = '$id_kategori'");
	$result = mysql_fetch_assoc($q);
}else{
	$aksi = "proses.php?kategori=tambah";
}

?>

<h3>Tampilan Tambah Dan Ubah Kategori</h3> 
<form role = "form" action="<?php echo $aksi ?>" method="post">
	<input type = "hidden" id="id_kategori" name="id_kategori" value="<?php echo $result['id_kategori']; ?>">
   <div class = "form-group">
      <label for = "name">Kategori</label>
      <input type = "text" class = "form-control" id = "kategori" name="kategori" value="<?php echo $result['kategori']; ?>">
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


<h3>Data Kategori</h3><br>   
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>No</th>
						<th>ID Kategori</th>
						<th>Kategori</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "../konek2.php";
				$view=mysqli_query($db,"select * from kategori order by id_kategori desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				$ubah	= "index.php?ubah=true&hal=kategori&id_kategori=".$row['id_kategori'];
				$hapus	= "proses.php?kategori=hapus&id_kategori=".$row['id_kategori'];
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['id_kategori'];?></td>
						<td><?php echo $row['kategori'];?></td>
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