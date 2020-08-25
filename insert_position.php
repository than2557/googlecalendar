<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
 $conn=$DBconnect;
 $id_department = $_POST['id_department'];
$position_name = $_POST['position_name'];

echo  $id_department;
echo  $position_name;


$sql ="INSERT INTO `position` (`id_department`,`position_name`) VALUES ('$id_department','$position_name')";
$Query = mysqli_query($conn,$sql);
echo $sql;

?>