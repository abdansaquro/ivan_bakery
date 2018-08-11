<?php

include "konek.php";

#cari kode terbesar di tabel peminjaman detail
$q3= mysql_query("SELECT max(kode_peminjaman) + 1  as kode_peminjaman2  from peminjaman_detail") or die (mysql_error());
$data3 = mysql_fetch_array($q3);
$kode_peminjaman2 = $data3['kode_peminjaman2'];
//echo $kode_peminjaman2;

#utk cek data di peminjaman detail, jika kosong isi 1, jika ada jalankan kode peminjaman2
if($kode_peminjaman2 == ""){
	$kode_peminjaman3 = 1;
}else{
	$kode_peminjaman3 = $kode_peminjaman2;
}


$query = mysql_query("select * from peminjaman_temp");
while($data=mysql_fetch_array($query)){
	$simpan = mysql_query("insert into `peminjaman_detail` values(
						0,
					  '$kode_peminjaman3',
					  '$data[kode_buku]', 						  
					  '$data[jumlah_pinjam]',
					  '$data[jumlah_pinjam]'
					    )") or die (mysql_error());

mysql_query("update buku set stok = stok - '$data[jumlah_pinjam]' where kode_buku = '$data[kode_buku]'") or die (mysql_error());
}

$kode_anggota		= $_POST['kode_anggota'];

#cek tgl skrng
$tglskrg = date('Y-m-d'); 

#+ tgl skrng 3 hari		
$tgl1 = date('Y-m-d');// pendefinisian tanggal awal
$bataspinjam = date('Y-m-d', strtotime('+3 days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 3 hari

#total 
$qT = mysql_query("select sum(jumlah_pinjam) as total_buku from peminjaman_temp") or die (mysql_error());
$data = mysql_fetch_array($qT);
$tb = $data['total_buku'];

if($tb < 1){
	echo "<script>alert('Buku yang dipinjam blum ada');
			window.location='index.php?hal=peminjaman'</script>";
}else{
$q = mysql_query("insert into peminjaman values(
					'$kode_peminjaman3',
					'$kode_anggota',
					'$tglskrg',
					'$bataspinjam',
					'$tb')") or die (mysql_error());

					
#hapus smua data di peminjaman temp
mysql_query("delete from peminjaman_temp") or die (mysql_error());
}
if($q){
	echo "<script>alert('Berhasil disimpan');
			window.location='index.php?hal=peminjaman'</script>";
}
?>