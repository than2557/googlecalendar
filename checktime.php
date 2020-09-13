<?php 
//echo "TEST ajax";
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
 $conn=$DBconnect;

 $time_start = isset($_POST['time_start']) ? $_POST['time_start'] : "";
 $time_end = isset($_POST['time_end']) ? $_POST['time_end'] : "";
$start =  isset($_POST['startdate']) ? $_POST['startdate'] : "";
$room_id =  isset($_POST['room_id']) ? $_POST['room_id'] : "";



$sqlroom = "SELECT * FROM `event_tb` WHERE `room_id` ='$room_id' and time_start ='$time_start' and  start ='$start'";

 $result_room = mysqli_query($conn,$sqlroom);
      
         $event = array();
         $i = 0;

         while($dataroom = mysqli_fetch_array($result_room)){
            
          $arrayevent =array(
            'room_id'=>$dataroom['room_id'],
            'time_start'=>$dataroom['time_start'],
            'time_end'=>$dataroom['time_end'],
            'start'=>$dataroom['start']);

            $event[$i] =$arrayevent;
            $i++;
 } 
 echo json_encode($event);   
 ?>