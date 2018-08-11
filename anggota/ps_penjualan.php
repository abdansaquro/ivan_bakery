<?php
error_reporting(0);
session_start();
include "koneksi.php";

$id_anggota		= $_POST['id_anggota'];
$alamat			= $_POST['alamat'];
$id_kota		= $_POST['id_kota'];

$total_barang2	= $_POST['total_barang'];


/*
$alm = $_SESSION['alamat'];

if($alamat == ""){
	$a = $alm;
}else{
	$a = $alamat;
}
*/

#cek tgl
$tgl = date('Y-m-d');

#cek ongkir
if($id_kota == "" or $alamat == ""){
	echo "<script>alert('Data yang anda inputkan tidak lengkap');history.go(-1);</script>";
}else{
	$q = extract(mysql_fetch_array(mysql_query("select * from kota where id_kota = '$id_kota'")))or die (mysql_error());

	#cari total
	$total = $total_barang2 + $ongkir;

	#cek data penjualan ada atau tidak
	$qry = extract(mysql_fetch_array(mysql_query("select count(id_anggota) as id_anggota2 from penjualan"))) or die (mysql_error());

	if($id_anggota2 == 0){
		$id_penjualan3 = 1;
	}else{
		#cek kode penjualan terakhir
		extract(mysql_fetch_array(mysql_query("select max(id_penjualan) + 1 as id_penjualan2 from penjualan")));
		$id_penjualan3 = $id_penjualan2;
		
		$qs = mysql_query("insert into penjualan values(
							'$id_penjualan3',
							'$tgl',
							'$id_anggota',
							'$alamat',
							'$id_kota',
							'$total',
							'Baru')") or die (mysql_error());

		$qq = mysql_query("select * from penjualan_temp") or die (mysql_error());	
		while($d = mysql_fetch_array($qq)){
				mysql_query("insert into `penjualan_detail` values(
							0,
							'$id_penjualan3',
							'$d[id_barang]',
							'$d[jumlah]',
							'$d[sub_total]')");
				
			#tambah di tabel brg		
		 mysql_query("update barang set jumlah = jumlah + $d[jumlah] where id_barang = $d[id_barang]") or die (mysql_error());				  
			#hapus smua data di penjualan temp
			mysql_query("delete from penjualan_temp") or die (mysql_error());						
			//mysql_query("UPDATE  `penjualan`.`barang` SET  `jumlah` =  jumlah  WHERE  `barang`.`id_barang` =3;") or die (mysql_error());						
		}						
			$t = number_format($total,0,",","."); 
		echo "<script>window.location='index.php?hal=barang2&pesan=Berhasil disimpan, total adalah Rp. $t, Silakan transfer sesuai dengan rekening yang disediakan dan lakukan konfirmasi'</script>";

	}		
} 
?>