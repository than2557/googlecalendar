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
$room_id = $_POST['room_id'];

echo $username.'<br>';
echo $room_name.'<br>';
echo $room_owner_th.'<br>';
echo $room_location.'<br>';
echo $room_type.'<br>';
echo $room_size.'<br>';
echo $room_id;

$sql ="UPDATE `room_tb` SET `room_name`='$room_name',`room_owner_th`='$room_owner_th',`room_location`='$room_location',`room_type`='$room_type',`room_size`='$room_size',`room_status`='0',`username`='$username' WHERE `room_id`='$room_id'";
$Query = mysqli_query($conn,$sql);
echo $sql;

?>