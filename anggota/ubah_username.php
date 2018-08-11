<?php
include "koneksi.php";
$id_anggota = $_GET['id_anggota'];  
if($id_anggota != ""){
    $aksi = "pu_us.php";
    $query = mysql_query("SELECT * FROM  `anggota` where id_anggota = '$id_anggota'");
    $result = mysql_fetch_assoc($query);  
}
?>

<h2>Ubah Pengguna</h2>
<form method="post" action="<?php echo $aksi; ?>">
<input type="hidden" name="id_anggota" id="id_anggota" value="<?php echo $result['id_anggota'];?>" />
   <input type = "hidden" class = "form-control" id = "username" name = "username" value="<?php echo $result['username'];?>">
   <div class = "form-group">
      <label for = "name">Pengguna Lama</label>
      <input type = "text" class = "form-control" id = "username_l" name = "username_l" value="<?php echo $result['username_l'];?>">
	</div>
    <div class = "form-group">
      <label for = "name">Pengguna Baru</label>
      <input type = "text" class = "form-control" id = "username_b" name = "username_b" value="<?php echo $result['username_b'];?>">
	</div>
	    <div class = "form-group">
      <label for = "name">Ulangi Pengguna Baru</label>
      <input type = "text" class = "form-control" id = "uub" name = "uub" value="<?php echo $result['uub'];?>">
	</div>
   <button type = "submit" class = "btn btn-primary">Submit</button>
</form>