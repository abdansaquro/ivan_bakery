<?php
include "koneksi.php";
$id_penjualan_temp = $_GET['id_penjualan_temp'];

#mysql_query("delete from `penjualan_temp` where id_penjualan_temp = '$id_penjualan_temp'");

$q = mysql_query("select * from penjualan_temp where id_penjualan_temp = '$id_penjualan_temp'") or die (mysql_error());
$data = mysql_fetch_array($q);
$jumlah	= $data['jumlah'];
$id_barang	= $data['id_barang'];
//echo $jumlah.$id_barang;

#tambah stok dari tabel barang
	mysql_query("UPDATE `barang` SET `stok` = stok + $jumlah WHERE `id_barang` = '$id_barang';") or die (mysql_error());

	mysql_query("delete from `penjualan`.`penjualan_temp` where `penjualan_temp`.`id_penjualan_temp` = '$id_penjualan_temp'");

echo "<script>
			window.location='index.php?hal=penjualan_temp&pesan=Data tersebut berhasil didelete'</script>";

?>