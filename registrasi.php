<?php
error_reporting(0);
if($hal == "registrasi"){
	
?>
<h3>Registrasi Anggota</h3>
<form action="registrasi.php?registrasi=true" method="post">

	<input type="hidden" id="id_anggota" name="id_anggota" value="<?php echo $result['id_anggota']; ?>" />
	
   <div class = "form-group">
      <label for = "name">Nama</label>
      <input type = "text" class = "form-control" id = "nama" name = "nama" value="<?php echo $result['nama']; ?>">
   </div>
   
   <div class = "form-group">
		<label for = "name">Jenis Kelamin</label>
		<tr><br>
        <input type="radio" checked="checked" name="jk" id="radio" value="L"<?php if ($result['jk']=="L") echo ("checked") ; ?> />
        L 
        <input type="radio" name="jk" id="radio2" value="P" <?php if ($result['jk']=="P") echo ("checked")  ; ?> />
        P
    </tr> 
   </div>
   
   <div class = "form-group">
      <label for = "name">Nomor HP</label>
      <input type = "text" class = "form-control" id = "no_hp" name = "no_hp" value="<?php echo $result['no_hp']; ?>">
   </div>
   
    <div class = "form-group">
      <label for = "name">Alamat</label>
      <input type = "text" class = "form-control" id = "alamat" name = "alamat" value="<?php echo $result['alamat']; ?>">
   </div>
   
   <div class = "form-group">
      <label for = "name">Username</label>
      <input type = "text" class = "form-control" id = "username" name = "username" value="<?php echo $result['username']; ?>">
   </div>
   
   
   <div class = "form-group">
      <label for = "name">Password</label>
      <input type = "password" class = "form-control" id = "password" name = "password" value="<?php echo $result['password']; ?>">
   </div>
   
   <button type = "submit" class = "btn btn-primary"><span class="fa fa-send"></span>
	Submit
   </button>
</form>
<?php
}
?>
<?php

include "konek.php";
if ($_GET['registrasi']){

	$nama			= $_POST['nama'];
	$jk				= $_POST['jk'];
	$no_hp			= $_POST['no_hp'];
	$alamat			= $_POST['alamat'];
	$username		= $_POST['username'];
	$password		= $_POST['password'];
	
	if($nama == "" or $jk == "" or $no_hp == "" or 
		$username == "" or $password == ""){
		echo "<script type='text/javascript'>
				alert('Data yang anda di inputkan belum lengkap'); history.go(-1);</script>";
	}else{
		mysql_query("insert into anggota values(
					0,
					'$nama',
					'$jk',
					'$no_hp',
					'$alamat',
					'$username',
					'$password')") or die (mysql_error());
		
		echo "	<script>alert('Terima kasih telah mendaftar menjadi anggota ivan bakery, silakan login untuk membeli barang');
					window.location='anggota/login.php'
				</script>";			
	}

}	
?>	