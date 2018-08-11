
<h3>Data Rekening</h3><br>   
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>No</th>
						<th>ID Rekening</th>
						<th>Nama Bank</th>
						<th>No Rekening</th>
						<th>Atas Nama</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "../konek2.php";
				$view=mysqli_query($db,"select * from rekening order by id_rek desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['id_rek'];?></td>
						<td><?php echo $row['nama_bank'];?></td>
						<td><?php echo $row['no_rek'];?></td>
						<td><?php echo $row['atas_nama'];?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
				
 </table>
</div>
<br>