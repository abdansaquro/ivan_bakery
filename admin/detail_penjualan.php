
<h3>Detail Penjualan</h3><br>
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>No</th>
						<th>ID Barang</th>
						<th>Nama Barang</th>
						<th>Jumlah</th>
						<th>Sub Total</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "../konek2.php";
				$view=mysqli_query($db,"SELECT * FROM penjualan_detail pd, barang br
where pd.id_barang = br.id_barang and pd.id_penjualan = $_GET[id_penjualan]");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				$t = date_format(date_create($row['tgl']), 'd-m-Y');
				
				$total2 = number_format($row['total'],0,",",".");	
				
				$detail_barang	= "index.php?hal=detail_penjualan&id_penjualan=".$row['id_penjualan'];
				$hapus	= "proses.php?id_anggota=".$row['id_penjualan'];
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['id_barang'];?></td>
						<td><?php echo $row['nama_barang'];?></td>
						<td><?php echo $row['jumlah'];?></td>
						<td><?php echo $row['sub_total'];?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
				
 </table>
</div>
<br>