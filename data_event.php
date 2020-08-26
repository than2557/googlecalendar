<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;

$room_id =$_POST['room_id'];
$sql_room = "SELECT * FROM `event_tb`,room_tb WHERE room_tb.room_id = '$room_id' and  event_tb.room_id = room_tb.room_id and status_event='1'";
$result_data = mysqli_query($conn,$sql_room);
         $event_json = array();
         $i = 0;
         while($dataevent = mysqli_fetch_array($result_data)){
            $room_id = $dataevent['room_id'];
            $end = $dataevent['end'];
           $dateend = date_create($end)->format('Y-m-d');
           $strNewDateend = date("Y-m-d", strtotime("+0 day", strtotime($dateend)));
           $time_start = $dataevent['time_start'];
           $time_end = $dataevent['time_end'];
  
          $arr_event= array(
          'title'=>$dataevent['name_event'],
          'start'=>$dataevent['start'].'T'.$time_start,
          'end'=>$strNewDateend.'T'.$time_end,
          'idevent'=>$dataevent['id_event'],
          'roomid'=>$dataevent['room_id'],
          'room_location'=>$dataevent['room_location'],
          'room_size'=>$dataevent['room_size'],
          'room_owner_th'=>$dataevent['room_owner_th'],
          'time_start'=>$dataevent['time_start'],
          'time_end'=>$dataevent['time_end']
          
         );
             $event_json[$i] =$arr_event;
             $i++;
         }  
         echo json_encode($event_json);     


?>