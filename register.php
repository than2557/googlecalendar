<?php
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
$conn=$DBconnect;
  $username = $_POST['username'];
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $Department = $_POST['Department'];
 $password = md5($_POST['password']);

 echo "USERNAME:".$username.'</br>';
 echo  "NAME:".$name.'</br>';
 echo  "lastname:".$lastname.'</br>';
 echo   "Department:".$Department.'</br>';
 echo  "password:".$password.'</br>';

 $sql ="INSERT INTO `empolyee`(`username`, `name`, `lastname`,`Department`, `password`,`level`) VALUES ('$username','$name','$lastname','$Department','$password','0')";
$Query = mysqli_query($conn,$sql);
echo $sql;

?>