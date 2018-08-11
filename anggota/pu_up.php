<?php
include "koneksi.php";

$id_anggota				= $_POST['id_anggota'];
$password				= $_POST['password'];
$password_l				= $_POST['password_l'];
$password_b				= $_POST['password_b'];
$upb					= $_POST['upb'];

if($password_l == "" or $password_b == "" or $upb == ""){
	echo "<script>
			window.location='index.php?hal=ubah_sandi&id_anggota=1&pesan=Semua data tdk boleh kosong'</script>";
}else if($password != $password_l){
	echo "<script>
			window.location='index.php?hal=ubah_sandi&id_anggota=1&pesan=sandi lama anda salah'</script>";
}else if($password_b != $upb){
	echo "<script>
			window.location='index.php?hal=ubah_sandi&id_anggota=1&pesan=sandi baru dan ulangi password baru tidak sesuai'</script>";			
}else{
	mysql_query("UPDATE  anggota SET  password =  '$password_b' WHERE  id_anggota ='$id_anggota'");
	echo "<script>
			window.location='index.php?hal=ubah_sandi&id_anggota=1&pesan=Data tersebut berhasil diedit'</script>";
}
?>