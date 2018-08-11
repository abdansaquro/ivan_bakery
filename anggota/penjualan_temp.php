<?php
include "konek.php";
$id_barang = $_GET['id_barang'];
if($id_barang != ""){
	$aksi = "ps_penjualan_temp.php";
	$q = mysql_query("select * from barang where id_barang = '$id_barang'");
	$result = mysql_fetch_assoc($q);
}
?>



<h3>Barang</h3> 
<form role = "form" action="<?php echo $aksi ?>" method="post">
	<input type = "hidden" id="id_penjualan_temp" name="id_penjualan_temp" value="<?php echo $result['id_penjualan_temp']; ?>">
	
    <input type = "hidden" readonly required class = "form-control" id = "id_barang" name="id_barang" value="<?php echo $result['id_barang']; ?>">
	
	<div class = "form-group">
      <label for = "name">Nama Barang</label>
      <input type = "text" readonly required class = "form-control" id = "nama_barang" name="nama_barang" value="<?php echo $result['nama_barang']; ?>">
	</div>
	
		<div class = "form-group">
      <label for = "name">Stok</label>
      <input type = "text" readonly required class = "form-control" id = "stok" name="stok" value="<?php echo $result['stok']; ?>">
	</div>
	
	<div class = "form-group">
      <label for = "name">Harga</label>
      <input type = "hidden" readonly required class = "form-control" id = "harga" name="harga" value="<?php echo $result['harga']; ?>">
      <input type = "text" readonly required class = "form-control" value="Rp. <?php echo number_format($result['harga'],0,",","."); ?>">
	</div>
	
	<div class = "form-group">
      <label for = "name">Jumlah</label>
      <input type = "text" required class = "form-control" id = "jumlah" name="jumlah">
	</div>
    
	<button type = "submit" class = "btn btn-primary"><span class="fa fa-send"></span> Submit</button>
	<a href="index.php?hal=barang2" class="btn btn-info">
							<span class="glyphicon glyphicon-shopping-cart"></span> Beli Lagi 
	</a>
	</form>