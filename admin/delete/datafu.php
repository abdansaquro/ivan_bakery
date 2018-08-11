<b><h2 style="margin-top:1px;" >Data Fasilitas Umum</h2></b><br>
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>No</th>
						<th>Nama FU</th>
						<th>Gambar</th>
                        <th>Kategori</th>
                        <th>Opsi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "konek2.php";
				$view=mysqli_query($db,"SELECT * FROM `fasilitas_umum` order by id_fu desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
					$detail   		= "index.php?page=detailfu&id_fu=".$row['id_fu'];
					$hapus  		= "hp_fu.php?id_fu=".$row['id_fu'];
					
					if($row['kategori'] == "rumah_ibadah"){
						$kategori2 = "Rumah Ibadah";
					}else if($row['kategori'] == "rumah_sakit"){
						$kategori2 = "Rumah Sakit";
					}else if($row['kategori'] == "puskesmas"){
						$kategori2 = "Puskesmas";
					}else if($row['kategori'] == "gedung_olahraga"){
						$kategori2 = "Gedung Olahraga";
					}else if($row['kategori'] == "spbu"){
						$kategori2 = "SPBU";
					}else if($row['kategori'] == "kantor_pos"){
						$kategori2 = "Kantor Pos";
					}else if($row['kategori'] == "terminal"){
						$kategori2 = "Terminal";	
					}else if($row['kategori'] == "pasar"){
						$kategori2 = "pasar";			
					}else{
						$kategori2 = "Tidak ditemukan";
					}
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['nama_fu'];?></td>
						<td><?php echo "<center><img src='image/$row[gambar_fu]' width='120' height='120'/></center>"; ?></td>
						<td><?php echo $kategori2 ?></td>
                       <td>
						<a href="<?php echo $detail ?>" class="btn btn-success">
							<span class="glyphicon glyphicon-align-justify"></span> Detail 
						</a>
						<a href="<?php echo $hapus ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')">
							<span class="glyphicon glyphicon-trash"></span> Delete 
						</a>
					   </td>						
					</tr>
				<?php
				}
				?>
				</tbody>
				
 </table>
</div>
