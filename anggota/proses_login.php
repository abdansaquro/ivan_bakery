<?php
	session_start();
	error_reporting(0);
	include "koneksi.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$login 	= mysql_query("select * from anggota where username='$username' and password='$password'");
	// $row 	= mysql_num_rows($login);
 
      if($username == "" or $password == ""){
	    echo "<script>alert('Username dan password harus di isi semua');window.location='index.php'</script>";
	  }else if(mysql_num_rows($login) == 0){
		echo "<script>alert('Username atau password anda ada yg salah');window.location='index.php'</script>";
		exit;	
	  }else{
		$data = mysql_fetch_array($login);
		
		$nama=$data['nama'];
     	$_SESSION['nama']=$nama;
		
		$id_anggota=$data['id_anggota'];
     	$_SESSION['id_anggota']=$id_anggota;
		
		$alamat=$data['alamat'];
     	$_SESSION['alamat']=$alamat;

		
		$_SESSION['login']		= "1";
		# $_SESSION['nama_user'] 	= $data ['username'];

		
		echo "<script> window.location = 'index.php?hal=barang2'</script>";
	}
?>