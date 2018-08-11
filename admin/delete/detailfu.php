<b><h2 style="margin-top:1px;" >Detail Fasilitas Umum</h2></b>
<div >

<?php
	include "koneksi.php";
	extract(mysql_fetch_array(mysql_query("select * from fasilitas_umum where id_fu = '$_GET[id_fu]'"))) or die (mysql_error());
	
					if($kategori == "rumah_ibadah"){
						$kategori2 = "Rumah Ibadah";
					}else if($kategori == "rumah_sakit"){
						$kategori2 = "Rumah Sakit";
					}else if($kategori == "puskesmas"){
						$kategori2 = "Puskesmas";
					}else if($kategori == "gedung_olahraga"){
						$kategori2 = "Gedung Olahraga";
					}else if($kategori == "spbu"){
						$kategori2 = "SPBU";
					}else if($kategori == "kantor_pos"){
						$kategori2 = "Kantor Pos";
					}else if($kategori == "terminal"){
						$kategori2 = "Terminal";	
					}else if($kategori == "pasar"){
						$kategori2 = "pasar";			
					}else{
						$kategori2 = "Tidak ditemukan";
					}
					
?>
 <table class="table table-striped table-bordered" cellspacing="0" width="60%">
				<thead align="center">
					<tr  >
						<td><?php echo $nama_fu; ?></td>
					</tr>
					
					<tr>
						<td><?php echo "<img src='image/$gambar_fu' width='120' height='120'/>";  ?></td>
					</tr>
					
					<tr>
						<td><?php echo $latitude; ?></td>
					</tr>
					
					<tr>
						<td><?php echo $longitude; ?></td>
					</tr>
					
					<tr>
						<td><?php echo $kategori2 ?></td>
					</tr>
					
					<tr>
						<td><?php echo $deskripsi; ?></td>
					</tr>
				</thead>
			
 </table>
</div>
