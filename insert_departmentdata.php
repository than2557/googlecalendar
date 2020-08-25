<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
 $conn=$DBconnect;

$name_department = $_POST['name_department'];
echo $name_department;

$sql ="INSERT INTO `department`(`name_department`)VALUES('$name_department')";
$Query = mysqli_query($conn,$sql);
echo $sql;

?>