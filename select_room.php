<?php

        date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;

         $room_id = isset($_POST['room']) ? $_POST['room'] : "";
        

        $sqlroom = "SELECT * FROM `event_tb`,room_tb WHERE room_tb.room_id = '$room_id' and  event_tb.room_id = room_tb.room_id and status_event='1'";
        // echo $sqlroom;
        $result_room = mysqli_query($conn,$sqlroom);
        $event_json = array();
        $i = 0;

        while($dataevent = mysqli_fetch_array($result_room)){

            $room_id = $dataevent['room_id'];
            $end = $dataevent['end'];
           $dateend = date_create($end)->format('Y-m-d');
           $strNewDateend = date("Y-m-d", strtotime("+0 day", strtotime($dateend)));
           $time_start = $dataevent['time_start'];
           $time_end = $dataevent['time_end'];
        //    echo date(DATE_ATOM,$dataevent['start']);
         
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
          'time_end'=>$dataevent['time_end'],
          'room_name'=>$dataevent['room_name']
          
         );
             $event_json[$i] =$arr_event;
             $i++;
         }       
        echo json_encode($event_json);      
    
?>