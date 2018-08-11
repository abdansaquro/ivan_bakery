<?php
include "koneksi.php";

$id_admin				= $_POST['id_admin'];
$password				= $_POST['password'];
$password_l				= $_POST['password_l'];
$password_b				= $_POST['password_b'];
$upb					= $_POST['upb'];

if($password_l == "" or $password_b == "" or $upb == ""){
	echo "<script>alert('Semua data tdk boleh kosong');
			window.location='index.php?hal=ubah_password&id_admin=1'</script>";
}else if($password != $password_l){
	echo "<script>alert('Password lama anda salah');
			window.location='index.php?hal=ubah_password&id_admin=1'</script>";
}else if($password_b != $upb){
	echo "<script>alert('Password baru dan ulangi password baru tidak sesuai');
			window.location='index.php?hal=ubah_password&id_admin=1'</script>";			
}else{
	mysql_query("UPDATE  admin SET  password =  '$password_b' WHERE  id_admin ='$id_admin'");
	echo "<script>alert('Data tersebut berhasil diedit');
			window.location='index.php?hal=ubah_password&id_admin=1'</script>";
}
?>