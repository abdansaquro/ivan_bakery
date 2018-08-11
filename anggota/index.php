<?php
	error_reporting(0);
	session_start();
	include "../konek.php";
	
	session_start();
	if($_SESSION['login'] !="1"){
		 echo "<script> window.location = 'login.php'</script>";
	}

	$hal 		= $_GET['hal'];
	
	$id_a = $_SESSION['id_anggota'];
	$alm = $_SESSION['alamat'];
	
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Anggota</title>
	<link rel="shortcut icon" type="image/x-icon" href="gambar/kawasaki.awd">
	<link rel="stylesheet" type="text/css" href="settings/css/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="tanggal/jquery.min.js"></script>
	<script type="text/javascript" src="tanggal/jquery-ui.js"></script>
 
	<link rel="stylesheet" type="text/css" href="../admin/index.css">
 
</head>
<body>
 		
		<div class="block-fixed">
		<div class="header no-print col-md-10">
			<div style="margin-right:10px">
				
				   <?php include "../header.php"; ?>

				
				<!--	<img src="../admin/gambar/a.jpg" width="1040" height="250px">
				-->
			</div>
		</div>

	</div>
	<div style="border-bottom:1px solid #fff;padding:10px; background-color: #11BD28; color:white;"><marquee style="margin-top:10px;">Selamat Datang di Website Ivan Bakery Mayang Jambi</marquee></div> 
	<div class="menu no-print">
			<table class="menu">
				<tbody>
				
				<?php 
					$qkb = mysql_query("SELECT count(id_anggota) as ja FROM `penjualan_temp` WHERE id_anggota = $id_a") or die (mysql_query());
					$data = mysql_fetch_array($qkb);
					$ja = $data['ja'];
					if($ja > 0){
						$ja2 = $ja;
					}else{
						$ja2 = 0;
					}
				?>
				
				<tr>
					<td class="nav-menu"><a href="index.php?hal=barang2"><?php if($hal == "barang2"){ echo "@"; } ?>Barang</a></td>
					<td class="nav-menu"><a href="index.php?ro=true&hal=keranjang_belanja"><?php if($hal == "keranjang_belanja"){ echo "@"; } ?>Keranjang Belanja (<?php echo $ja2; ?>)</a></td>
					<td class="nav-menu"><a href="index.php?hal=rekening"><?php if($hal == "rekening"){ echo "@"; } ?>Rekening</a></td>
					<td class="nav-menu"><a href="index.php?hal=konfirmasi"><?php if($hal == "konfirmasi"){ echo "@"; } ?>Konfirmasi</a></td>
					<td class="nav-menu"><a href="index.php?hal=kelola_akun&id_anggota=<?php echo $id_a ?>"><?php if($hal == "kelola_akun"){ echo "@"; } ?>Kelola Akun</a></td>
				<!--	<td class="nav-menu"><a href="index.php?hal=ubah_pengguna&id_anggota=<?php echo $id_a ?>"><?php if($hal == "ubah_pengguna"){ echo "@"; } ?>Ubah Pengguna</a></td>				
					<td class="nav-menu"><a href="index.php?hal=ubah_sandi&id_anggota=<?php echo $id_a ?>"><?php if($hal == "ubah_sandi"){ echo "@"; } ?>Ubah Sandi</a></td>					
					-->
					<td class="nav-menu"><a href="logout.php">Keluar</a></td>
				</tr>
				</tbody>
			</table>
		</div>
	<div class="konten">
		<div class="isi">
			
			  <!-- utk ckeditor -->
		<script src="ckeditor/ckeditor.js"></script>
		  <!-- utk ckeditor -->


<!-- table -->	
<!-- <link rel="stylesheet" href="plugin_table/bootstrap.min.css"> -->
<script src="plugin_table/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="plugin_table/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="plugin_table/jquery.dataTables.css">
<script type="text/javascript" src="plugin_table/jquery.min.js"></script>
<script type="text/javascript" src="plugin_table/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
	   $('#example').DataTable();
	} );
</script>
<!-- table sampe sni -->	

		

		<?php
		
		$qr = mysql_query("select * from penjualan where id_penjualan = (select max(id_penjualan) from penjualan where id_anggota = '$id_a')");
		$data22 = mysql_fetch_array($qr);
		$status2 = $data22['status'];
		
		if($status2 == "Lunas"){
			echo "
				<div class='alert alert-info'>
					<strong>SUKSES.</strong> Bukti pembayaran anda sudah di konfirmasi admin, terima kasih sudah berbelanja di Ivan Bakery.
				</div>
			";
		}

		//mengambil pesan saat program di proses
		if($_GET['pesan']){
			echo "
					<div class='alert alert-success'>
						<strong>$_GET[pesan]</strong>
					</div>
			";
		}		
		
		if($hal == "barang"){
			include "barang.php";
		}else if($hal == "detail_barang"){
			include "detail_barang.php";

		}else if($hal == "keranjang_belanja"){
			include "keranjang_belanja.php";	
		
		}else if($hal == "konfirmasi"){
			include "konfirmasi.php";
		}else if($hal == "kelola_akun"){
			include "kelola_akun.php";	
		}else if($hal == "rekening"){
			include "rekening.php";	
		}else if($hal == "ubah_pengguna"){
			include "ubah_username.php";
		}else if($hal == "ubah_sandi"){
			include "ubah_password.php";	
		}else if($hal == "beli_temp"){
			include "beli_temp.php";
		}else if($hal == "penjualan_temp"){
			include "penjualan_temp.php";
		}else if($hal == "barang2"){
			include "barang2.php";	
		}else if($hal == "e_penjualan_temp"){
			include "e_penjualan_temp.php";	
		}else{
			echo "Halaman yg anda maksd tdk ada";
		}	
		
		?>
			
		</div>
	</div>
	<script type="text/javascript" src="settings/js/slider.js"></script>
	<!-- setting footer -->
	<div style="text-align:center;background:#3E3C3C;padding:5px;color:#fff">&copy; 2018 - Ivan Bakery Mayang Jambi</div>
</body>
</html>