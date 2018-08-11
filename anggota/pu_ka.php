<?php

include "koneksi.php";

$id_anggota				= $_POST['id_anggota'];

$username				= $_POST['username'];
$username_l				= $_POST['username_l'];
$username_b				= $_POST['username_b'];
$uub					= $_POST['uub'];

$password				= $_POST['password'];
$password_l				= $_POST['password_l'];
$password_b				= $_POST['password_b'];
$upb					= $_POST['upb'];


if($username_l == "" or $username_b == "" or $uub == ""){
	echo "<script>
			window.location='index.php?hal=kelola_akun&id_anggota=$id_anggota&pesan=Semua data tdk boleh kosong..'</script>";
}else if($username != $username_l){
	echo "<script>
			window.location='index.php?hal=kelola_akun&id_anggota=$id_anggota&pesan=Username lama anda salah'</script>";
}else if($username_b != $uub){
	echo "<script>
			window.location=
'index.php?hal=kelola_akun&id_anggota=$id_anggota&pesan=Username baru dan ulangi username baru tidak sesuai'</script>";
}else if($password_l == "" or $password_b == "" or $upb == ""){
	echo "<script>
			window.location='index.php?hal=kelola_akun&id_anggota=$id_anggota&pesan=Semua data tdk boleh kosong'</script>";
}else if($password != $password_l){
	echo "<script>
			window.location='index.php?hal=kelola_akun&id_anggota=$id_anggota&pesan=sandi lama anda salah'</script>";
}else if($password_b != $upb){
	echo "<script>
			window.location='index.php?hal=kelola_akun&id_anggota=$id_anggota&pesan=sandi baru dan ulangi password baru tidak sesuai'</script>";				
}else{
	mysql_query("UPDATE  anggota SET  username =  '$username_b' WHERE  id_anggota ='$id_anggota'");
	mysql_query("UPDATE  anggota SET  password =  '$password_b' WHERE  id_anggota ='$id_anggota'");
	echo "<script>
window.location='index.php?hal=kelola_akun&id_anggota=$id_anggota&pesan=Data tersebut berhasil diedit'</script>";
}

?>