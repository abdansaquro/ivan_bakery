<h2>Laporan Penjualan</h2> 
<form role = "form" action="tampil_laporan.php" method="post">
   <div class = "form-group">
   
		<div class = "form-group">
			<label for = "name">Tanggal Awal</label>
			<input type = "date" class = "form-control" id = "tglawal" name = "tglawal">
		</div>
		
		<div class = "form-group">
			<label for = "name">Tanggal Akhir</label>
			<input type = "date" class = "form-control" id = "tglakhir" name = "tglakhir">
		</div>
		
    </div>
   <button type = "submit" class = "btn btn-primary"><span class="glyphicon glyphicon-print"></span> Submit</button>
</form>