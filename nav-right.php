	<div class="col-md-4">
		<?php if(isset($_GET['q'])){ ?>
		<div class="box-nav">
			<?php if(!isset($_SESSION['login_id'])){ ?>
			<div class="nav-title">Pencarian</div>
			<form action="" method="post">
			<div class="input-group">
			    <input type="text" class="form-control" name="search" value="<?=$_SESSION['search']?>" placeholder="Cari <?=$cur_hal[0]?>">
			    <span class="input-group-btn">
			        <button class="btn btn-primary" type="submit">CARI</button>
			      </span>
			</div>
			</form>
			<?php unset($_SESSION['search']); }else{ ?>
			<div class="nav-title">Login sebagai, <strong><?=$login_nama?></strong></div>
			Lengkapi data pada form ini :<br>
			<a href="index.php?hal=daftar/index"><span class="pilihan">&raquo; Formulir Pendaftaran</span></a><br>
			<a href="index.php?hal=upload_nilai/index"><span class="pilihan">&raquo; Upload Nilai</span></a><br>
			<center><a href="?logout">Logout</a></center>
			<?php } ?>
		</div>
		<?php } ?>
		<div class="box-nav">
			<div class="nav-title">Berita Terbaru</div>
			<div class="nav-content">
				<?php $query=mysql_query("select * from berita order by id_berita desc limit 0,10"); while($r=mysql_fetch_array($query)){ extract($r); ?>
				<a href="?hal=berita/index&id=<?=$id_berita?>"><span class="pilihan">&raquo; <?=$judul?></span></a><br>
				<?php } ?>
			</div>
		</div>
		<?php if(isset($_GET['hal'])){ ?>
		<div class="box-nav">
			<div class="nav-title">Kalender</div>
			<div class="nav-content">
				<div id="my-calendar"></div>

			</div>
		</div>
		<?php } ?>
		<!-- <div class="box-nav">
			<div class="nav-title">Komentar</div>
			<div class="nav-content komentar" id="komentar">
				<?php $query=mysql_query("select * from komentar"); while($r=mysql_fetch_array($query)){ extract($r); ?>
				<div class="isi_komentar"><font color="#008542" size="2"><?=ucwords($nama)?> : </font><?=$pesan?></div>
				<?php } ?>
			</div>
			<div>
				<hr>
				<a class="btn btn-primary" href="index.php?hal=komentar/index">Kirim Komentar</a>
			</div>
		</div> -->
	</div>
	<script>
		$('#komentar').scrollTop($('#komentar')[0].scrollHeight);
	</script>