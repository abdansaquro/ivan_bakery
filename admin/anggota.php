<?php
$id_anggota = $_GET['id_anggota'];  
if($id_anggota != ""){
    $aksi = "proses.php?anggota=edit";
    $query = mysql_query("SELECT * FROM  `anggota` where id_anggota = $id_anggota");
    $result = mysql_fetch_assoc($query);  
}else{
     $aksi = "proses.php?anggota=tambah";
} 
?>	

<h3>Tampilan Tambah dan Ubah Anggota</h3>
<form action="<?php echo $aksi; ?>" method="post" enctype="multipart/form-data">

	<input type="hidden" id="id_anggota" name="id_anggota" value="<?php echo $result['id_anggota']; ?>" />
	
   <div class = "form-group">
      <label for = "name">Nama</label>
      <input type = "text" class = "form-control" id = "nama" name = "nama" value="<?php echo $result['nama']; ?>">
   </div>
   
   <div class = "form-group">
		<label for = "name">Jenis Kelamin</label>
		<tr><br>
        <input type="radio" checked="checked" name="jk" id="radio" value="L"<?php if ($result['jk']=="L") echo ("checked") ; ?> />
        L 
        <input type="radio" name="jk" id="radio2" value="P" <?php if ($result['jk']=="P") echo ("checked")  ; ?> />
        P
    </tr> 
   </div>
   
   <div class = "form-group">
      <label for = "name">Nomor HP</label>
      <input type = "text" class = "form-control" id = "no_hp" name = "no_hp" value="<?php echo $result['no_hp']; ?>">
   </div>
   
    <div class = "form-group">
      <label for = "name">Alamat</label>
      <input type = "text" class = "form-control" id = "alamat" name = "alamat" value="<?php echo $result['alamat']; ?>">
   </div>
   
   <div class = "form-group">
      <label for = "name">Username</label>
      <input type = "text" class = "form-control" id = "username" name = "username" value="<?php echo $result['username']; ?>">
   </div>
   
   
   <div class = "form-group">
      <label for = "name">Password</label>
      <input type = "password" class = "form-control" id = "password" name = "password" value="<?php echo $result['password']; ?>">
   </div>
   
   <button type = "submit" class = "btn btn-primary"><span class="fa fa-send"></span>
	<?php
	if($_GET['ubah']){
		echo "Ubah";
	}else{
		echo "Tambah";
	}
	?>
   </button>
</form>

<h3>Data Anggota</h3><br>
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>No</th>
						<th>ID anggota</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Nomor HP</th>
						<th>Alamat</th>
						<th>Username</th>
						<th>Password</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "../konek2.php";
				$view=mysqli_query($db,"select * from anggota order by id_anggota desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				$ubah	= "index.php?ubah=true&hal=anggota&id_anggota=".$row['id_anggota'];
				$hapus	= "proses.php?anggota=hapus&id_anggota=".$row['id_anggota'];
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['id_anggota'];?></td>
						<td><?php echo $row['nama'];?></td>
						<td><?php echo $row['jk'];?></td>
						<td><?php echo $row['no_hp'];?></td>
						<td><?php echo $row['alamat'];?></td>
						<td><?php echo $row['username'];?></td>
						<td>*****</td>
                       <td>
					    <a href="<?php echo $ubah ?>" class="btn btn-success">
							<span class="glyphicon glyphicon-edit"></span> 
						</a>
						<a href="<?php echo $hapus ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')">
							<span class="glyphicon glyphicon-trash"></span> 
						</a>
					</tr>
				<?php
				}
				?>
				</tbody>
				
 </table>
</div>
<br>