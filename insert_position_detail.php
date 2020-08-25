<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
 $conn=$DBconnect;
 $id_position = $_POST['id_position'];
$detail_position_name = $_POST['detail_position_name'];

echo  $id_position;
echo  $detail_position_name;


$sql ="INSERT INTO `position_detail`(`id_position`, `detail_position_name`) VALUES ('$id_position','$detail_position_name')";
$Query = mysqli_query($conn,$sql);
echo $sql;

?>