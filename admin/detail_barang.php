<b><h2 style="margin-top:1px;" >Detail Barang</h2></b>
<div >

<?php
	include "konek.php";
	extract(mysql_fetch_array(mysql_query("select * from barang b, kategori k where k.id_kategori = b.id_kategori and id_barang = '$_GET[id_barang]'"))) or die (mysql_error());

	$harga2 = number_format($harga,0,",",".");	
					
?>
<?php echo "Nama Barang : ".$nama_barang; ?>
<br>				
<br>				
<?php echo ""."<img src='image/$gambar' width='120' height='120'/>";  ?>
<br>				
<br>
<?php echo "Kategori : ".$kategori; ?>
<br>				
<br>
<?php echo "Harga : Rp. ".$harga2; ?>
<br>				
<br>
<?php echo "Stok : ".$stok ?>
<br>				
<br>					
<?php echo "Deskripsi : ".$deskripsi; ?>
