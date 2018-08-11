<?php
include "koneksi.php";

$nama_file				= $_FILES['gambar_fu']['name'];
$temp 					= $_FILES['gambar_fu']['tmp_name'];

if (!empty($nama_file)){
	if(!copy($temp,"image/".$nama_file)){
		echo "<script>alert('gambar harus di upload'); window.location = 'tambah_fu.php?page=form_tambahfu'</script>";
		exit;
	}
}

if($nama_file == ""){
	echo "<script>alert('Gambar harus di upload'); 
		window.location='tambah_fu.php?page=form_tambahfu'</script>";
}else{
	$save = mysql_query("insert into fasilitas_umum values(
				0,
				'$_POST[nama_fu]', 
				'$nama_file'
				'',
				'$_POST[latitude]',
				'$_POST[longitude]',
				'$_POST[kategori]',
				'$_POST[deskripsi]')") or die (mysql_error()); 				
}

if($save){	
echo "<script>alert('Data berhasil di tambah'); window.location = 'tambah_fu.php?page=form_tambahfu'</script>";	 
	exit;
}				
?>