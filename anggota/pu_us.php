<?php
include "koneksi.php";

$id_anggota				= $_POST['id_anggota'];
$username				= $_POST['username'];
$username_l				= $_POST['username_l'];
$username_b				= $_POST['username_b'];
$uub					= $_POST['uub'];

if($username_l == "" or $username_b == "" or $uub == ""){
	echo "<script>
			window.location='index.php?hal=ubah_pengguna&id_anggota=1&pesan=Semua data tdk boleh kosong'</script>";
}else if($username != $username_l){
	echo "<script>
			window.location='index.php?hal=ubah_pengguna&id_anggota=1&pesan=Username lama anda salah'</script>";
}else if($username_b != $uub){
	echo "<script>
			window.location=
'index.php?hal=ubah_pengguna&id_anggota=1&pesan=Username baru dan ulangi username baru tidak sesuai'</script>";			
}else{
	mysql_query("UPDATE  anggota SET  username =  '$username_b' WHERE  id_anggota ='$id_anggota'");
	echo "<script>
window.location='index.php?hal=ubah_pengguna&id_anggota=1&pesan=Data tersebut berhasil diedit'</script>";
}
?>