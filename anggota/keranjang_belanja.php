<h3>Keranjang Belanja</h3> 
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>No</th>
						<th>Nama Barang</th>
						<th>gambar</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Sub Total</th>
						<th>Aksi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "konek2.php";
				$view=mysqli_query($db,"
				SELECT *, pt.jumlah as jt FROM penjualan_temp pt, anggota ag, barang br where pt.id_anggota = ag.id_anggota and pt.id_barang = br.id_barang and ag.id_anggota = '$_SESSION[id_anggota]'
				 order by id_penjualan_temp desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				#jika di ganti hapusnya jdi penjualan temp, maka yg di detail dk terhapus
				$hapus	= "hp_pt.php?id_penjualan_temp=".$row['id_penjualan_temp'];
				$edit	= "index.php?hal=e_penjualan_temp&id_penjualan_temp=".$row['id_penjualan_temp'];
				
				$harga2 = number_format($row[harga],0,",",".");
				$sub_total2 = number_format($row[sub_total],0,",",".");
				
				$penjualan_temp	= "index.php?hal=penjualan_temp&id_barang=".$row['id_barang'];
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['nama_barang'];?></td>
						<td><?php echo "<img src='../admin/image/$row[gambar]' width='80' height='80' />"?></td>
						<td>Rp. <?php echo $harga2 ?></td>
						<td><?php echo $row['jt'];?></td>
						<td>Rp. <?php echo $sub_total2 ?></td>
						<td>
						<a href="<?php echo $edit; ?>" class="btn btn-primary">
							<span class="glyphicon glyphicon-edit"></span> Edit 
						</a>	
						<a href="<?php echo $hapus; ?>" class="btn btn-danger">
							<span class="glyphicon glyphicon-trash"></span> Hapus	
						</a>	
						
							
						</td>
					</tr>
				<?php
				}
				?>
				</tbody>
				
 </table>
</div>
<br>
<?php
$q4 = mysql_query("SELECT sum(sub_total) as sub_total4  FROM `penjualan_temp` where id_anggota = '$_SESSION[id_anggota]'") or die (mysql_error());
$data4 = mysql_fetch_array($q4);
$sub_total4 = $data4['sub_total4'];
$sub_total5 = number_format($sub_total4,0,",",".");
echo "<center><h3>Total : Rp. $sub_total5</h3></center>";
?>

<form role = "form" action="ps_penjualan.php" method="post">
<div class = "form-group">
    <input type = "hidden" readonly required class = "form-control" id = "total_barang" name="total_barang" value="<?php echo $sub_total4; ?>">
    <input type = "hidden" readonly required class = "form-control" id = "id_anggota" name="id_anggota" value="<?php echo $_SESSION['id_anggota']; ?>">

<?php

$alamat_asli = $_SESSION['alamat'];


	
 
if($alamat_asli == $_SESSION['alamat']){
	$al = $_SESSION['alamat'];
}else{
	$al = $result['alamat'];
}

?>
	
	<div class = "form-group">
      <label for = "name">Alamat</label>
      <input type="text" class = "form-control" <?php if($_GET['ro']){
	echo "readonly";
} ?> id = "alamat" name="alamat" value="<?php echo $al; ?>">
	  <br>
			<a href="javascript:void(0);" class="btn btn-primary" onclick="hapus_sessi()">
						 Edit Alamat </a>

	</div>

	
	<div class = "form-group">
      <label for = "name">Kota dan Ongkos</label>
      <select class = "form-control" id="id_kota" name="id_kota">
		<option value="">Silakan Pilih</option>
		 <?php     
		include "konek.php";
        $h = mysql_query("select * from kota order by id_kota desc") or die(mysql_error());    
        while ($baris = mysql_fetch_array($h)) {
			
			$ongkir2 = "Rp. ".number_format($baris[ongkir],0,",",".");
				
			if($baris['id_kota'] == $result['id_kota']) {
				echo '<option value="' . $baris['id_kota'] . '" selected>' . $baris['kota'].' || ' . $ongkir2.' || </option>';    
			} else {
				echo '<option value="' . $baris['id_kota'] . '">' . $baris['kota'].' || ' . $ongkir2.'</option>';    
			}
        
          }    
        echo '</select>';    
        ?>
      </select>
    </div>
	
	<button type = "submit" class = "btn btn-primary"><span class="fa fa-send"></span> Proses</button>
</form>


<script>
	function hapus_sessi() {
		$("#alamat").removeAttr('readonly', true);
		$("#alamat").val('');
		$("#alamat").focus();
	}
</script>