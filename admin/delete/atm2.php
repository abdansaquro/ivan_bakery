<?php
include "konek.php";
error_reporting(0);

$sql = "select * from fasilitas_umum where kategori = 'ATM'";
/*
$atm = $_GET['ATM'];
$atm = str_replace("."," ",$atm); 
$sql = "select * from fasilitas_umum where (kategori='ATM') and (nama_fu like '%".$atm."%')";
*/ 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,
array('id_fu'=>$row[0],
'nama_fu'=>$row[1],
'latitude'=>$row[3],
'longitude'=>$row[4]
));
}
echo json_encode(array("result"=>$result));
mysqli_close($con);
 
?>