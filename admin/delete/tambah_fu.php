<?php
error_reporting(0);
?> 
 
 
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="shortcut icon" type="image/x-icon" href="#">
	<link rel="stylesheet" type="text/css" href="settings/css/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="tanggal/jquery.min.js"></script>
	<script type="text/javascript" src="tanggal/jquery-ui.js"></script>
</head>
 
	
	<div class="konten">
		<div class="isi">


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

<?php echo 
		"<h3><u> $_GET[pesan] </u></h3>"; 
		
		$page = $_GET['page'];
		
		if($page == "form_tambahfu"){
			include "form_tambahfu.php";
		}else{
			echo "Halaman yang anda maksud tidak ditemukan";
		}
		
		?>

			
