<h3>Data Konfirmasi</h3><br>
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th width="1px">No</th>
						<th width="1px">ID Konfirmasi</th>
						<th width="1px">ID Penjualan</th>
						<th width="1px">Tanggal Konfirmasi</th>
						<th>Bukti Pembayaran</th>
						<th>Nama</th>
						<th width="1px">Total</th>
						<th width="1px">Status</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "../konek2.php";
				$view=mysqli_query($db,"select * from konfirmasi kf, penjualan pj, anggota ag
where pj.id_penjualan = kf.id_penjualan
and pj.id_anggota = ag.id_anggota order by kf.id_konfirmasi desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				$edit_konfirmasi	= "index.php?hal=edit_konfirmasi&id_penjualan=".$row['id_penjualan'];
				$hapus	= "proses.php?konfirmasi=hapus&id_konfirmasi=".$row['id_konfirmasi'];
				
				$t = date_format(date_create($row['tgl_konfirmasi']), 'd-m-Y');
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['id_konfirmasi'];?></td>
						<td><?php echo $row['id_penjualan'];?></td>
						<td><?php echo $t ;?></td>
						<td><?php echo "<center><img src='image_konfirmasi/$row[bukti_pembayaran]' width='120' height='120'/></center>";?></td>
						<td><?php echo $row['nama'];?></td>
						<td><?php echo $row['total'];?></td>
						<td><?php echo $row['status'];?></td>
                       <td>
						<a href="<?php echo $edit_konfirmasi ?>" class="btn btn-success" title="Ubah">
							<span class="glyphicon glyphicon-edit"></span>  
						</a>
						<a href="<?php echo $hapus ?>" class="btn btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')">
							<span class="glyphicon glyphicon-trash"></span> 
						</a>
						</td>
					</tr>
				<?php
				}
				?>
				</tbody>
				
 </table>
</div>