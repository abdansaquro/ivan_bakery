<div class="row">

			<?php
				include "konek2.php";
				$view=mysqli_query($db,"select * from barang b, kategori k
				where b.id_kategori = k.id_kategori	order by id_barang desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				$harga2 = number_format($row[harga],0,",",".");
				
				$penjualan_temp	= "index.php?hal=penjualan_temp&id_barang=".$row['id_barang'];
				$hapus	= "hp_kategori.php?id_kategori=".$row['id_kategori'];
				$detail	= "index.php?hal=detail_barang&id_barang=".$row['id_barang'];
				
			?>

  <div class="col-md-4" align="center">
    <div class="thumbnail">
      <h3><?php echo $row['nama_barang'];?></h3>
      <p><?php echo "<img src='../admin/image/$row[gambar]' width='160' height='120' />"?></p>
      <div class="caption">
		<p ><a href="#" class="btn btn-success" role="button"> Rp. <?php echo $harga2 ?></a> <a href="#" class="btn btn-warning" role="button">Stok  : <?php echo $row['stok'] ?></a></p>
        <p ><a href="<?php echo $penjualan_temp ?>" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Beli</a> <a href="#" class="btn btn-default" role="button"><?php echo $row['kategori'];?></a> <a href="<?php echo $detail ?>" class="btn btn-info"><span class="glyphicon glyphicon-list"></span> Detail</a></p>
      </div>
    </div>
  </div>

<?php } ?>
  
</div>
<br>