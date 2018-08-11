<?php
error_reporting(0);
include "koneksi.php";
$id_penjualan = $_GET['id_penjualan'];  
if($id_penjualan != ""){
    $aksi = "edit_konfirmasi.php?ek=true";
    $query = mysql_query("select * FROM  `penjualan` where id_penjualan = '$id_penjualan'");
    $result = mysql_fetch_assoc($query);  
}
?>

<?php 
if($hal == "edit_konfirmasi"){
?>

<h3>Ubah Status</h3>
<form action="<?php echo $aksi; ?>" method="post" enctype="multipart/form-data">

	<input type="hidden" id="id_penjualan" name="id_penjualan" value="<?php echo $result['id_penjualan']; ?>" />
	
   <div class = "form-group">
		<label for = "name">Status</label>
		<tr><br>
        <input type="radio" checked="checked" name="status" id="status" value="Baru"<?php if ($result['status']=="Baru") echo ("checked") ; ?> />
        Baru 
        <input type="radio" name="status" id="status" value="Lunas" <?php if ($result['status']=="Lunas") echo ("checked")  ; ?> />
        Lunas
		<input type="radio" name="status" id="status" value="Dikirim" <?php if ($result['status']=="Dikirim") echo ("checked")  ; ?> />
        Dikirim
    </tr> 
   </div>
   
   <button type = "submit" class = "btn btn-primary"><span class="fa fa-send"></span>
Ubah
   </button>
</form>	

<?php

}

if($_GET['ek']){
	
	$id_penjualan		= $_POST['id_penjualan'];
	$status				= $_POST['status'];
	
mysql_query("UPDATE  `penjualan`.`penjualan` SET  `status` =  '$status' WHERE  `penjualan`.`id_penjualan` ='$id_penjualan';") or die (mysql_error());
	echo "<script>alert('Berhasil disimpan');
				window.location='index.php?hal=konfirmasi'</script>";
}

?>