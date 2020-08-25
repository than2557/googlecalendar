<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
$conn=$DBconnect;
// $username=$_SESSION['userName'];
$id_event=$_POST['id_event'];
$startdate = $_POST['startdate'];
$event =$_POST['event'];
// $start=$_POST['start'];
// $end =$_POST['end'];
$enddate = $_POST['enddate'];
$time_period=$_POST['time_period'];
$room_id=$_POST['room_id'];

if($time_period == 'fullday'){

  $start = "08:30:00";
  $end = "16:30:00";
  // echo $timestart;
  // echo $timeend;
}
elseif($time_period == 'halfdaymoring'){

  $start = "08:30:00";
  $end ="12:30:00";
  
}
elseif($time_period =='halfdayafter'){

  $start = "13:00:00";
  $end = "16:30:00";

}

echo $startdate.'<br>';
echo $event.'<br>';
echo $start.'<br>';
echo $end.'<br>';
echo $enddate.'<br>';
echo $time_period.'<br>';
echo $room_id.'<br>';
echo $id_event.'<br>';

$sql ="UPDATE `event_tb` SET `room_id`='$room_id',`name_event`='$event',`start`='$startdate',`time_period`='$time_period',`end`='$enddate',`username`='505972' WHERE id_event ='$id_event'";
$Query = mysqli_query($conn,$sql);
echo $sql;



?>