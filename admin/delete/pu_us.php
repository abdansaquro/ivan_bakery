<?php
include "koneksi.php";

$id_admin				= $_POST['id_admin'];
$username				= $_POST['username'];
$username_l				= $_POST['username_l'];
$username_b				= $_POST['username_b'];
$uub					= $_POST['uub'];

if($username_l == "" or $username_b == "" or $uub == ""){
	echo "<script>alert('Semua data tdk boleh kosong');
			window.location='index.php?page=edit_username&id_admin=1'</script>";
}else if($username != $username_l){
	echo "<script>alert('Username lama anda salah');
			window.location='index.php?page=edit_username&id_admin=1'</script>";
}else if($username_b != $uub){
	echo "<script>alert('Username baru dan ulangi username baru tidak sesuai');
			window.location=
'index.php?page=edit_username&id_admin=1'</script>";			
}else{
	mysql_query("UPDATE  `dbfu`.`admin` SET  `username` =  '$uub' WHERE  `admin`.`id_admin` =1;");
	echo "<script>alert('Berhasil diedit');
window.location='index.php?page=edit_username&id_admin=1'</script>";
} 
?>