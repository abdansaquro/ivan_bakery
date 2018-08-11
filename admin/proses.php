<?php

include "../konek.php";
error_reporting(0);

//menu anggota

if($_GET['anggota'] == "tambah"){
	
	$nama			= $_POST['nama'];
	$jk				= $_POST['jk'];
	$no_hp			= $_POST['no_hp'];
	$alamat			= $_POST['alamat'];
	$username		= $_POST['username'];
	$password		= $_POST['password'];
	
	if($nama == "" or $jk == "" or $no_hp == "" or $alamat == "" or 
		$username == "" or $password == ""){
		echo "<script type='text/javascript'>
				alert('Data yang anda di inputkan belum lengkap'); history.go(-1);</script>";
	}else{
		mysql_query("insert into anggota values(
					0,
					'$nama',
					'$jk',
					'$no_hp',
					'$alamat',
					'$username',
					'$password')") or die (mysql_error());
		
		echo "	<script>alert('Berhasil disimpan');
					window.location='index.php?hal=anggota'
				</script>";			
	}
	
}else if($_GET['anggota'] == "edit"){
	
	$id_anggota		= $_POST['id_anggota'];
	$nama			= $_POST['nama'];
	$jk				= $_POST['jk'];
	$no_hp			= $_POST['no_hp'];
	$alamat			= $_POST['alamat'];
	$username		= $_POST['username'];
	$password		= $_POST['password'];
	
	if($nama == "" or $jk == "" or $no_hp == "" or $alamat == "" or 
		$username == "" or $password == ""){
		echo "<script type='text/javascript'>
				alert('Data yang anda di inputkan belum lengkap'); history.go(-1);</script>";
	}else{
		mysql_query("update anggota set 
				nama				= '$nama',
				jk					= '$jk',
				no_hp				= '$no_hp',
				alamat				= '$alamat',
				username			= '$username',
				password			= '$password'
				where id_anggota	= '$id_anggota'
				") or die (mysql_error());
		
		echo "	<script>alert('Berhasil disimpan');
					window.location='index.php?hal=anggota'
				</script>";			
	}
	
}else if($_GET['anggota'] == "hapus"){
	
	mysql_query("delete from anggota where id_anggota = '$_GET[id_anggota]'");
	
	echo "	<script>alert('Berhasil dihapus');
					window.location='index.php?hal=anggota'
				</script>";	

}else if($_GET['kategori'] == "tambah"){
	
	$kategori = $_POST['kategori'];
	
	if($kategori == ""){
		echo	"<script type='text/javascript'>
					alert('Data yang anda inputkan tidak lengkap'); history.go(-1);
				 </script>";
	}else{
		
		mysql_query("insert into kategori values(
						0,
						'$kategori')") or die (mysql_error());
						
		echo "	<script>alert('Berhasil disimpan');
						window.location='index.php?hal=kategori'
					</script>";		
	}
	
}else if($_GET['kategori'] == "edit"){
	
	$id_kategori			= $_POST['id_kategori'];
	$kategori				= $_POST['kategori'];
	
	
	if($kategori == ""){
		echo	"<script type='text/javascript'>
					alert('Data yang anda inputkan tidak lengkap'); history.go(-1);
				 </script>";
	}else{		
		mysql_query("update kategori set
				kategori			= '$kategori'
				where id_kategori	= '$id_kategori'") or die (mysql_error());

		echo "	<script>alert('Berhasil disimpan');
						window.location='index.php?hal=kategori'
					</script>";		 	
	}
	
}else if($_GET['kategori'] == "hapus"){
	
	$id_kategori = $_GET['id_kategori'];
	
	mysql_query("delete from `kategori` where id_kategori = '$id_kategori'");
	
	echo "	<script>alert('Berhasil dihapus');
					window.location='index.php?hal=kategori'
				</script>";	 
	
}else if($_GET['barang'] == "tambah"){
		
	
		$nama_barang			= $_POST['nama_barang'];

		$nama_file				= $_FILES['gambar']['name'];
		$temp 					= $_FILES['gambar']['tmp_name'];

		$id_kategori			= $_POST['id_kategori'];
		$harga					= $_POST['harga'];
		$stok					= $_POST['stok'];
		$deskripsi				= $_POST['deskripsi'];

		if (!empty($nama_file)){
			if(!copy($temp,"image/".$nama_file)){
				echo "<script>alert('gambar harus di upload..'); window.location = 'index.php?page=datafs'</script>";
				exit;
			}
		}

			// tipe data gambar ygdi perbolehkan
			$file_type = array('jpg','jpeg');
			// mencari extensi gambar
			$explode = explode('.',$nama_file);
			$extensi = $explode[count($explode)-1];
		
		if($nama_barang == "" or $nama_file == "" or $id_kategori == "" or
			$harga == "" or $stok == "" or $deskripsi == ""){
				
			echo "<script type='text/javascript'>
							alert('Data yang di input belum lengkap'); history.go(-1);
						</script>";
						
		}else if(!in_array($extensi,$file_type)){
			echo "<script type='text/javascript'>alert('Format gambar harus jpg atau jpeg'); history.go(-1);</script>";
		}else{
			$save = mysql_query("insert into barang values(
						0,
						'$nama_barang',
						'$nama_file',
						'$id_kategori',
						'$harga',
						'$stok',
						'$deskripsi')") or die (mysql_error()); 	
				
				echo "<script>alert('Data disimpan'); window.location = 'index.php?hal=barang'</script>";				
		
		} 			

}else if($_GET['barang'] == "edit"){
	
		$id_barang				= $_POST['id_barang'];
		$nama_barang			= $_POST['nama_barang'];

		$nama_file				= $_FILES['gambar']['name'];
		$temp 					= $_FILES['gambar']['tmp_name'];

		$id_kategori			= $_POST['id_kategori'];
		$harga					= $_POST['harga'];
		$stok					= $_POST['stok'];
		$deskripsi				= $_POST['deskripsi'];

		if (!empty($nama_file)){
			if(!copy($temp,"image/".$nama_file)){
				echo "<script>alert('gambar harus di upload..'); window.location = 'index.php?page=datafs'</script>";
				exit;
			}
		}

			// tipe data gambar ygdi perbolehkan
			$file_type = array('jpg','jpeg');
			// mencari extensi gambar
			$explode = explode('.',$nama_file);
			$extensi = $explode[count($explode)-1];
		
		if($nama_barang == "" or $id_kategori == "" or
			$harga == "" or $stok == "" or $deskripsi == ""){
				
			echo "<script type='text/javascript'>
							alert('Data yang di input belum lengkap'); history.go(-1);
						</script>";
		
		}else if($nama_file == ""){	
		
			$save = mysql_query("update barang set
					nama_barang			= '$nama_barang',
					id_kategori			= '$id_kategori',
					harga				= '$harga',
					stok				= '$stok',
					deskripsi			= '$deskripsi'
					where id_barang		= '$id_barang'") or die (mysql_error()); 	
				
				echo "<script>alert('Data disimpan'); window.location = 'index.php?hal=barang'</script>";		
						
		}else if(!in_array($extensi,$file_type)){
			echo "<script type='text/javascript'>alert('Format gambar harus jpg atau jpeg'); history.go(-1);</script>";	
		
		}else{
			 mysql_query("update barang set
					nama_barang			= '$nama_barang',
					gambar				= '$nama_file',
					id_kategori			= '$id_kategori',
					harga				= '$harga',
					stok				= '$stok',
					deskripsi			= '$deskripsi'
					where id_barang		= '$id_barang'") or die (mysql_error()); 	
				
				echo "<script>alert('Data disimpan'); window.location = 'index.php?hal=barang'</script>";				
		
		}
	
		
}else if($_GET['barang'] == "hapus"){

	mysql_query("delete from `barang` where id_barang = '$_GET[id_barang]'");
	
	echo "	<script>alert('Berhasil dihapus');
					window.location='index.php?hal=barang'
				</script>";	 

}else if($_GET['konfirmasi'] == "tambah"){
	

}else if($_GET['konfirmasi'] == "edit"){
	


		
}else if($_GET['konfirmasi'] == "hapus"){
	
			mysql_query("delete from `konfirmasi` where id_konfirmasi = '$_GET[id_konfirmasi]'");
	
	echo "	<script>alert('Berhasil dihapus');
					window.location='index.php?hal=konfirmasi'
				</script>";	
	
	
}else if($_GET['kota'] == "tambah"){
	
	$kota	 	= $_POST['kota'];
	$ongkir 	= $_POST['ongkir'];
	
	if($kota == "" or $ongkir == ""){
	
		echo	"<script type='text/javascript'>
					alert('Data yang dinputkan tidak lengkap'); history.go(-1);
				 </script>";
		
	}else{
		mysql_query("insert into kota values(
					0,
					'$kota',
					'$ongkir')") or die (mysql_error());
					
		echo "	<script>alert('Berhasil disimpan');
					window.location='index.php?hal=kota'
				</script>";		
	}
	
}else if($_GET['kota'] == "edit"){
	
	$id_kota	= $_POST['id_kota'];
	$kota	 	= $_POST['kota'];
	$ongkir 	= $_POST['ongkir'];

	if($kota == "" or $ongkir == ""){
	
		echo	"<script type='text/javascript'>
					alert('Data yang dinputkan tidak lengkap'); history.go(-1);
				 </script>";
		
	}else{
	
		mysql_query("update kota set
					kota		= '$kota',
					ongkir		= '$ongkir'
					where id_kota = '$id_kota'") or die (mysql_error());
						
		echo "	<script>alert('Berhasil disimpan');
						window.location='index.php?hal=kota'
					</script>";	
	}
}else if($_GET['kota'] == "hapus"){
		
	mysql_query("delete from `kota` where id_kota = '$_GET[id_kota]'");
	
	echo "	<script>alert('Berhasil dihapus');
					window.location='index.php?hal=kota'
				</script>";		

}else if($_GET['penjualan'] == "tambah"){
	
	
	

}else if($_GET['penjualan'] == "edit"){

		

}else if($_GET['penjualan'] == "hapus"){
	

	
}else if($_GET['rekening'] == "tambah"){
	
	$nama_bank	 	= $_POST['nama_bank'];
	$no_rek 		= $_POST['no_rek'];
	$atas_nama 		= $_POST['atas_nama'];
	
	if($nama_bank == "" or $no_rek == "" or $atas_nama == ""){
		
		echo	"<script type='text/javascript'>
					alert('Data yang diinputkan tidak lengkap'); history.go(-1);
				 </script>";
		
	}else{
	
		mysql_query("insert rekening values(
						0,
						'$nama_bank',
						'$no_rek',
						'$atas_nama')") or die (mysql_error());
						
		echo "	<script>alert('Berhasil disimpan');
						window.location='index.php?hal=rekening'
					</script>";	
	}

}else if($_GET['rekening'] == "edit"){
	
	$id_rek		 	= $_POST['id_rek'];
	$nama_bank	 	= $_POST['nama_bank'];
	$no_rek 		= $_POST['no_rek'];
	$atas_nama 		= $_POST['atas_nama'];
	
	if($nama_bank == "" or $no_rek == "" or $atas_nama == ""){
		
		echo	"<script type='text/javascript'>
					alert('Data yang diinputkan tidak lengkap'); history.go(-1);
				 </script>";
		
	}else{
	
		mysql_query("update rekening set
					nama_bank			= '$nama_bank',
					no_rek				= '$no_rek',
					atas_nama			= '$atas_nama'
					where id_rek		= '$id_rek'") or die (mysql_error());
						
		echo "	<script>alert('Berhasil disimpan');
						window.location='index.php?hal=rekening'
					</script>";
	
	}
}else if($_GET['rekening'] == "hapus"){
	
	mysql_query("delete from `rekening` where id_rek = '$_GET[id_rek]'");
	
	echo "	<script>alert('Berhasil dihapus');
					window.location='index.php?hal=rekening'
				</script>";	
	
}





?>