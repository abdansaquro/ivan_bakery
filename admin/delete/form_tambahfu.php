<h3>Tambah Fasilitas Umum</h3>
<form action="proses_tambah.php" method="post" enctype="multipart/form-data">

	<input type="hidden" id="id_fu" name="id_fu" value="" />
	
   <div class = "form-group">
      <label for = "name">Nama Fasilitas Umum</label>
      <input type = "text" class = "form-control" id = "nama_fu" name = "nama_fu" value="<?php echo $result['nama_fu']; ?>">
   </div>
   
    <div class = "form-group">
		<label for = "inputfile">Gambar</label>
		<input type = "file" name = "gambar_fu"><br>
		<?php if($id_fu != ""){ ?>
          <img src="<?php echo $gambar_fu;?>" height="100"/>
        <?php } ?>
   </div>
   
    <div class = "form-group">
      <label for = "name">Latitude</label>
      <input type = "text" class = "form-control" id = "latitude" name = "latitude" value="<?php echo $result['latitude']; ?>">
   </div>
   
   <div class = "form-group">
      <label for = "name">Longitude</label>
      <input type = "text" class = "form-control" id = "longitude" name = "longitude" value="<?php echo $result['longitude']; ?>">
   </div>
   
   <div class = "form-group">
      <label for = "name">Kategori</label>
      <select name="kategori" id="kategori" class = "form-control">
		<option value="">Silakan Pilih</option>
			<option value="rumah_ibadah" <?php if ($result['kategori']=="rumah_sakit") echo ("selected");?>>Rumah Sakit</option>     
			<option value="rumah_ibadah" <?php if ($result['kategori']=="rumah_ibadah") echo ("selected");?>>Rumah Ibadah</option>
			<option value="puskesmas" <?php if ($result['kategori']=="puskesmas") echo ("selected");?>>PUSKESMAS</option>
			<option value="gedung_olahraga" <?php if ($result['kategori']=="gedung_olahraga") echo ("selected");?>>Gedung Olahraga</option>
			<option value="spbu" <?php if ($result['kategori']=="spbu") echo ("selected");?>>SPBU</option>
			<option value="kantor_pos" <?php if ($result['kategori']=="Sabtu") echo ("selected");?>>Kantor Pos</option>
			<option value="terminal" <?php if ($result['kategori']=="terminal") echo ("selected");?>>Terminal</option>
			<option value="pasar" <?php if ($result['kategori']=="pasar") echo ("selected");?>>Pasar</option>
	    </select>
   </div>
   
    <div class = "form-group">
      <label for = "name">Deskripsi</label>
      <input type = "text" class = "form-control" id = "deskripsi" name = "deskripsi" value="<?php echo $result['deskripsi']; ?>">
   </div>
   <button type = "submit" class = "btn btn-primary"><span class="fa fa-send"></span> Submit</button>
</form>