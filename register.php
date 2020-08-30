<?php
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
$conn=$DBconnect;
  $username = $_POST['username'];
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $id_department = $_POST['Department'];
 $password = md5($_POST['password']);
$id_position =  $_POST['position'];
$detail_position_id =  $_POST['position_detail'];

 echo "USERNAME:".$username.'</br>';
 echo  "NAME:".$name.'</br>';
 echo  "lastname:".$lastname.'</br>';
 echo   "id_department:".$id_department.'</br>';
 echo  "id_position:".$id_position.'</br>';
 echo  "detail_position_id:".$detail_position_id.'</br>';

 $sql ="INSERT INTO `empolyee`( `username`, `name`, `lastname`, `password`,`level`,`id_department`,`id_position`,`detail_position_id`) VALUES ('$username','$name','$lastname','$password','0','$id_department','$id_position','$detail_position_id')";
$Query = mysqli_query($conn,$sql);
echo $sql;

?>