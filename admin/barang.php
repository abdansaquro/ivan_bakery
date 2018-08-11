<?php
$id_barang = $_GET['id_barang'];
if($id_barang != ""){
	$aksi = "proses.php?barang=edit";
	$q = mysql_query("select * from barang where id_barang = '$id_barang'");
	$result = mysql_fetch_assoc($q);
	$gambar = "image/".$result['gambar'];
}else{
	$aksi = "proses.php?barang=tambah";
}

?>

<h3>Tampilan Tambah Dan Ubah Barang</h3> 
<form role = "form" action="<?php echo $aksi ?>" method="post" enctype="multipart/form-data">
	<input type = "hidden" id="id_barang" name="id_barang" value="<?php echo $result['id_barang']; ?>">
   
   <div class = "form-group">
      <label for = "name">Nama Barang</label>
      <input type = "text"  class = "form-control" id = "nama_barang" name="nama_barang" value="<?php echo $result['nama_barang']; ?>">
   </div>
   
   <div class = "form-group">
      <label for = "name">Gambar</label>
      <input type = "file" name = "gambar"><br>
		<?php if($id_barang != ""){ ?>
          <img src="<?php echo $gambar;?>" height="100"/>
        <?php } ?>
   </div>
   
   <div class = "form-group">
		<label for = "name">Kategori</label>
		    <select name="id_kategori"  id="id_kategori" class = "form-control">    
		<option value="" >Silahkan Pilih</option>
      <?php     
		include "../konek2.php";
        $result2 = mysql_query("select * from kategori order by id_kategori desc");    
        $jsArray = "var prdName = new Array();\n";  
        while ($row = mysql_fetch_array($result2)) {    
        echo '<option value="' . $row['id_kategori'] . '">' . $row['kategori'].'</option>';    
          }    
        echo '</select>';    
        ?>
   </div>
   
   <div class = "form-group">
      <label for = "name">Harga</label>
      <input type = "text"  class = "form-control" id = "harga" name="harga" value="<?php echo $result['harga']; ?>">
   </div>
   <div class = "form-group">
      <label for = "name">Stok</label>
      <input type = "text"  class = "form-control" id = "stok" name="stok" value="<?php echo $result['stok']; ?>">
   </div>
   
   <div class = "form-group">
    <label for = "name">Deskripsi</label>
   <textarea class = "form-control" rows = "2" id="deskripsi" name="deskripsi" value="<?php echo $result['deskripsi']; ?>"><?php echo $result['deskripsi']; ?></textarea>
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

<script>document.getElementById('id_kategori').value = <?php echo $result['id_kategori']; ?></script>

<h3>Data Barang</h3><br>
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>No</th>
						<th>ID Barang</th>
						<th>Nama Barang</th>
						<th>Gambar</th>
						<th>Kategori</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "../konek2.php";
				$view=mysqli_query($db,"SELECT * FROM barang b, kategori k where k.id_kategori = b.id_kategori order by id_barang desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				$detail	= "index.php?hal=detail_barang&id_barang=".$row['id_barang'];
				$ubah	= "index.php?ubah=true&hal=barang&id_barang=".$row['id_barang'];
				$hapus	= "proses.php?barang=hapus&id_barang=".$row['id_barang'];
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['id_barang'];?></td>
						<td><?php echo $row['nama_barang'];?></td>
						<td><?php echo "<center><img src='image/$row[gambar]' width='120' height='120'/></center>";?></td>
						<td><?php echo $row['kategori'];?></td>
                       <td>
					    <a href="<?php echo $detail ?>" class="btn btn-primary">
							<span class="glyphicon glyphicon-align-justify"></span> Detail 
						</a>
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