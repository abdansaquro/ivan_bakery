<?php

error_reporting(0);

include "koneksi.php";

$id_penjualan_temp = $_POST['id_penjualan_temp'];
$id_barang		= $_POST['id_barang'];
$stok2			= $_POST['stok2'];
$harga2			= $_POST['harga2'];
$jumlah			= $_POST['jumlah'];

$sub_total2 = $harga2 * $jumlah;

// echo "harga : ".$harga2." jumlah: ".$jumlah." sub total : ".$sub_total2;

#jumlah tdk boleh lbh besar dari stok
if($jumlah > $stok2){
	echo "<script>alert('Stok kurang');
					window.location='index.php?hal=e_penjualan_temp&id_penjualan_temp=$id_penjualan_temp'</script>";				
}else{
	
	$q = mysql_query("select * from penjualan_temp where id_penjualan_temp = '$id_penjualan_temp'") or die (mysql_error());
	$data = mysql_fetch_array($q);
	$jumlah22	= $data['jumlah'];
	$id_barang	= $data['id_barang'];

	#tambah stok dari tabel barang
	mysql_query("UPDATE `barang` SET `stok` = stok + $jumlah22 WHERE `id_barang` = '$id_barang';") or die (mysql_error());
	
	mysql_query("update penjualan_temp set
				jumlah		= '$jumlah',
				sub_total	= '$sub_total2'
				where id_penjualan_temp = '$id_penjualan_temp'") or die (mysql_error());
				
				#tambah kurang dari tabel barang
	mysql_query("UPDATE `barang` SET `stok` = stok - $jumlah WHERE `id_barang` = '$id_barang';") or die (mysql_error());

				
	echo "<script>alert('Berhasil diedit');
				window.location='index.php?hal=penjualan_temp'</script>";				
	
}


?>