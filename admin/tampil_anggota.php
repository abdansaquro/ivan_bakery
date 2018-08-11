<?php
error_reporting();
include "koneksi.php";
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
<h3><u>Laporan Anggota</u></h3>
</center>
<center>
 <!-- <hr width="100%" color="#000"> -->
<br>

<body>
<table style="width:700px">
<tr>
						<th width="80px">No</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
                        <th width="180px">No HP</th>
                        <th>Alamat</th>
  </tr>
<tr>

<?php
				$view=mysql_query("
				select * from anggota order by nama asc
				") or die (mysql_error());
				$no=0;
				while($row=mysql_fetch_array($view)){
				$no++;	
				?>

<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $row['nama'] ;?></td>
						<td><?php echo $row['jk'];?></td>
						<td><?php echo $row['no_hp'];?></td>
						<td><?php echo $row['alamat'];?></td>
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
