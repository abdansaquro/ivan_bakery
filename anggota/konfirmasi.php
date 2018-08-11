<?php
error_reporting(0);
	if($hal == "konfirmasi"){	
?>
<u><h3>Konfirmasi</h3> </u> 
<form role = "form" action="konfirmasi.php?proses=true" method="post" enctype="multipart/form-data">

   <div class = "form-group" style="display:none">
		<label for = "name">Id Penjualan</label>
		    <select name="id_penjualan"  id="id_penjualan" class = "form-control">    
      <?php   
		include "koneksi.php";
        $result2 = mysql_query("select max(id_penjualan) as id_penjualan from penjualan where id_anggota = '$id_a'");    
        $jsArray = "var prdName = new Array();\n";  
        while ($row = mysql_fetch_array($result2)) {    
        echo '<option value="' . $row['id_penjualan'] . '">' . $row['id_penjualan'].' || ' . $row['nama'].' || ' . $row['status'].'</option>';    
          }    
        echo '</select>';    
        ?>
   </div>	
   
   <div class = "form-group">
      <label for = "name">Bukti Pembayaran</label>
      <input type = "file" name = "bukti_pembayaran"><br>
		<?php if($id_barang != ""){ ?>
          <img src="<?php echo $bukti_pembayaran;?>" height="100"/>
        <?php } ?>
   </div>
   
   <button type = "submit" class = "btn btn-primary">
Submit
	
   </button>
</form>
<?php } ?>


<?php
include "koneksi.php";
if($_GET['proses']){
	
	$id_penjualan 	= $_POST['id_penjualan'];
	$tgl = date('Y-m-d');


$nama_file				= $_FILES['bukti_pembayaran']['name'];
$temp 					= $_FILES['bukti_pembayaran']['tmp_name'];

if (!empty($nama_file)){
	if(!copy($temp,"../admin/image_konfirmasi/".$nama_file)){
		echo "<script>alert('gambar harus di upload'); window.location = 'index.php?hal=konfirmasi'</script>";
		exit;
	}
}

if($nama_file == ""){
	echo "<script>alert('Gambar harus di upload'); 
		window.location='index.php?hal=konfirmasi'</script>";
}else{
	$save = mysql_query("insert into konfirmasi values(
				0,
				'$id_penjualan', 
				'$tgl', 
				'$nama_file')") or die (mysql_error()); 				
}

		if($save){	
		echo "<script>alert('Data berhasil di simpan'); window.location = 'index.php?hal=konfirmasi'</script>";	 
			exit;
		}
}

?>