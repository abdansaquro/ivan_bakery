<?php
session_start();
include "koneksi.php";

$id_barang 			= $_POST['id_barang'];
$stok 				= $_POST['stok'];
$harga				= $_POST['harga'];
$jumlah				= $_POST['jumlah'];

#hitung harga
$harga2	= $harga * $jumlah;

# query cek id barang yg sama
$q2 = mysql_num_rows(mysql_query("select id_barang from penjualan_temp where id_barang = '$id_barang' and id_anggota = '$_SESSION[id_anggota]'"));

#jumlah tdk boleh lbh besar dari stok
if($jumlah > $stok){
	echo "<script>alert('Stok kurang');
					window.location='index.php?hal=penjualan_temp'</script>";	
# query cek id barang yg sama
}else if($q2 > 0){
	echo "<script>alert('Barang tersebut sudah ada di database');
					window.location='index.php?hal=penjualan_temp'</script>";	
}else{
#simpan ke temp
	$q = mysql_query("insert into penjualan_temp values(
					0,
					'$_SESSION[id_anggota]',
					'$id_barang',
					'$jumlah',
					'$harga2')") or die (mysql_error());
					
/*	
	#cek kode penjualan terakhir
extract(mysql_fetch_array(mysql_query("select max(id_penjualan) + 1 as id_penjualan2 from penjualan")));	
#simpan ke detail		
		mysql_query("insert into penjualan_detail values(
				0,
				'$id_penjualan2',
				'$id_barang',
				'$jumlah',
				'$harga2')") or die (mysql_error()); 
*/
					
	#kurangi stok dari tabel barang
	mysql_query("UPDATE `penjualan`.`barang` SET `stok` = stok - $jumlah WHERE `barang`.`id_barang` = '$id_barang';") or die (mysql_error());
					

	if($q){
		echo "<script>alert('Berhasil disimpan');
					window.location='index.php?hal=barang2'</script>";
	}

}
?>