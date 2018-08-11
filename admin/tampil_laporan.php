<?php
include "koneksi.php";

$tglawal	= $_POST['tglawal'];
$tglakhir	= $_POST['tglakhir'];

$tglawal2 = date_format(date_create($tglawal), 'Y-m-d') ;
$tglawal3 = date_format(date_create($tglawal), 'd-m-Y') ;
$tglakhir2 = date_format(date_create($tglakhir), 'Y-m-d') ;
$tglakhir3 = date_format(date_create($tglakhir), 'd-m-Y') ;

?>





<!DOCTYPE html>
<html>

<head>

<script type="text/javascript">
<!--
window.print();
//-->
</script>

<style>
table,th,td
{
border:1px solid black;
border-collapse:collapse;
}
th,td
{
padding:5px;
}
hr{
	color: #000000;
background-color: #000000;
height: 2px;
width:80%;
	
}
</style>
</head>

<center>
<h2>IVAN BAKERY MAYANG</h2>
<h3><u>Laporan PENJUALAN</u></h3>
</center>
<?php echo "Tanggal $tglawal3 s/d $tglakhir3" ?>
<center>
 <!-- <hr width="100%" color="#000"> -->
<br>

<body>
<table style="width:700px">
<tr>
						<th width="80px">ID Penjualan</th>
						<th>Tanggal</th>
						<th>Id Anggota</th>
                        <th width="180px">Nama</th>
                        <th>Total</th>
  </tr>
<tr>

<?php
				$view=mysql_query("
				select * from penjualan p, anggota a where a.id_anggota = p.id_anggota and p.tgl >= '$tglawal2' and p.tgl <= '$tglakhir2'
				") or die (mysql_error());
				$no=0;
				while($row=mysql_fetch_array($view)){
				$no++;	
				?>

<tr>
						<td><?php echo $row['id_penjualan'];?></td>
						<td><?php echo $row['tgl'] ;?></td>
						<td><?php echo $row['id_anggota'];?></td>
						<td><?php echo $row['nama'];?></td>
						<td><?php echo $row['total'];?></td>
  </tr>
				<?php } ?>
</table>
<div  style="margin:0px 0px 0px 390px;"><br>
     <font>Mengetahui</font>
     <div  style="margin:60px 100px 0px 0px;"><br>
     <font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____________________</font>
</body>
</center>
</html>
