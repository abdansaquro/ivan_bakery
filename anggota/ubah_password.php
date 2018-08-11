<?php
include "konek.php";
$id_anggota = $_GET['id_anggota'];  
if($id_anggota != ""){
    $aksi = "pu_up.php";
    $query = mysql_query("SELECT * FROM  `anggota` where id_anggota = '$id_anggota'");
    $result = mysql_fetch_assoc($query);  
}
?>

<h2>Ubah Sandi</h2>
<form method="post" action="<?php echo $aksi; ?>">
<input type="hidden" name="id_anggota" id="id_anggota" value="<?php echo $result['id_anggota'];?>" />
   <input type = "hidden" class = "form-control" id = "password" name = "password" value="<?php echo $result['password'];?>">
   <div class = "form-group">
      <label for = "name">Sandi Lama</label>
      <input type = "text" class = "form-control" id = "password_l" name = "password_l" value="<?php echo $result['password_l'];?>">
	</div>
    <div class = "form-group">
      <label for = "name">Sandi Baru</label>
      <input type = "password" class = "form-control" id = "password_b" name = "password_b" value="<?php echo $result['password_b'];?>">
	</div>
	    <div class = "form-group">
      <label for = "name">Ulangi Sandi Baru</label>
      <input type = "password" class = "form-control" id = "upb" name = "upb" value="<?php echo $result['upb'];?>">
	</div>
   <button type = "submit" class = "btn btn-primary">Submit</button>
</form>