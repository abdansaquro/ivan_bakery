
<h3>Data Penjualan</h3><br>
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>No</th>
						<th>ID Penjualan</th>
						<th>Tanggal</th>
						<th>Id Anggota</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Total</th>
						<th>Status</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "../konek2.php";
				$view=mysqli_query($db,"select *, p.alamat as al2 from penjualan p, anggota a where a.id_anggota = p.id_anggota order by p.id_penjualan desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				$t = date_format(date_create($row['tgl']), 'd-m-Y');
				
				$total2 = number_format($row['total'],0,",",".");	
				
				$detail_barang	= "index.php?hal=detail_penjualan&id_penjualan=".$row['id_penjualan'];
				$hapus	= "hp_penjualan.php?id_penjualan=".$row['id_penjualan'];
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['id_penjualan'];?></td>
						<td><?php echo $t;?></td>
						<td><?php echo $row['id_anggota'];?></td>
						<td><?php echo $row['nama'];?></td>
						<td><?php echo $row['al2'];?></td>
						<td>Rp. <?php echo $total2;?></td>
						<td><?php echo $row['status'];?></td>
						
                       <td>
					    <a href="<?php echo $detail_barang ?>" class="btn btn-success">
							<span class="glyphicon glyphicon-align-justify"></span>
						</a>
						<a href="<?php echo $hapus ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')">
							<span class="glyphicon glyphicon-trash"></span> 
						</a>
					</tr>
				<?php
				}
				?>
				</tbody>
				
 </table>
</div>
<br>