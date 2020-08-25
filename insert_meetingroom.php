<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
 $conn=$DBconnect;

 $username = $_SESSION['username'];
 $room_name= $_POST['room_name'];
 $room_owner_th= $_POST['room_owner_th'];
 $room_location = $_POST['room_location'];
$room_type = $_POST['room_type'];
$room_size= $_POST['room_size'];


echo $username.'<br>';
echo $room_name.'<br>';
echo $room_owner_th.'<br>';
echo $room_location.'<br>';
echo $room_type.'<br>';
echo $room_size.'<br>';


$sql ="INSERT INTO `room_tb`(`room_name`,`room_owner_th`,`room_location`,`room_type`,`room_size`,`room_status`,`username`)VALUES
                            ('$room_name','$room_owner_th','$room_location','$room_type','$room_size','0','$username')";
$Query = mysqli_query($conn,$sql);
echo $sql;

?>