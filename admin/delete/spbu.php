<?php
include "konek.php";
error_reporting(0);
$spbu = $_GET['SPBU'];
$spbu = str_replace("."," ",$spbu); 
$sql = "select * from fasilitas_umum where (kategori='SPBU') and (nama_fu like '%".$spbu."%')";
 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,
array('id_fu'=>$row[0],
'nama_fu'=>$row[1],
'gambar_fu'=>$row[2],
'latitude'=>$row[3],
'longitude'=>$row[4],
'kategori'=>$row[5],
'deskripsi'=>$row[6]
));
}
echo json_encode(array("result"=>$result));
mysqli_close($con);
 
?>