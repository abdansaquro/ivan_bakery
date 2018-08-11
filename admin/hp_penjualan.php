<?php
include "../koneksi.php";
mysql_query("delete from penjualan where id_penjualan = '$_GET[id_penjualan]'");
echo "<script>alert('Berhasil dihapus');
				window.location='index.php?hal=penjualan'</script>";
?>