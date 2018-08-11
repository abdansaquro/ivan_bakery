<?php
include "koneksi.php";
$id_penjualan_temp = $_GET['id_penjualan_temp'];
if($id_penjualan_temp != ""){
	$aksi = "pe_penjualan_temp.php";
	$q = mysql_query("select * from penjualan_temp where id_penjualan_temp = '$id_penjualan_temp'");
	$result = mysql_fetch_assoc($q);
	
	
}
?>

<h2>Edit Penjualan</h2> 
<form role = "form" action="<?php echo $aksi; ?>" method="post">
	<input type = "hidden" id="id_penjualan_temp" name="id_penjualan_temp" value="<?php echo $result['id_penjualan_temp']; ?>">
	<input type = "hidden" id="id_barang" name="id_barang" value="<?php echo $result['id_barang']; ?>">
	
	<?php
	# utk menampilkan nama barang, stok dan harga
	$id_barang22 = $result['id_barang'];
	$qq = mysql_query("select * from barang where id_barang = $id_barang22") or die (mysql_error());
	$data2 = mysql_fetch_array($qq);
	$nama_barang2 = $data2['nama_barang'];
	$stok2 = $data2['stok'];
	$harga2 = $data2['harga'];
	?>
	<div class = "form-group">
      <label for = "name">Nama Barang</label>
      <input type = "text" readonly required class = "form-control" id = "nama_barang" name="nama_barang" value="<?php echo $nama_barang2 ?>">
	</div>
	
		<div class = "form-group">
      <label for = "name">Stok</label>
      <input type = "text" readonly required class = "form-control" id = "stok2" name="stok2" value="<?php echo $stok2 ?>">
	</div>
	
	<div class = "form-group">
      <label for = "name">Harga</label>
      <input type = "hidden" readonly required class = "form-control" id = "harga2" name="harga2" value="<?php echo $harga2 ?>">
      <input type = "text" readonly required class = "form-control" value="Rp. <?php echo number_format($harga2,0,",","."); ?>">
	</div>
	
	<div class = "form-group">
      <label for = "name">Jumlah</label>
      <input type = "text" required class = "form-control" id = "jumlah" name="jumlah" value="<?php echo $result['jumlah']; ?>">
	</div>
    
	<button type = "submit" class = "btn btn-primary"><span class="fa fa-send"></span> Submit</button>
	</a>
	</form>
