<?php

        date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;

         $room_id = isset($_POST['room']) ? $_POST['room'] : "";
    

        $sqlroom = "SELECT event_tb.end,event_tb.time_start,event_tb.time_end,event_tb.id_event,event_tb.name_event,event_tb.start,event_tb.room_id,room_tb.room_location,room_tb.room_size,room_tb.room_owner_th,room_tb.room_name,empolyee.name FROM event_tb,empolyee,room_tb WHERE event_tb.room_id = room_tb.room_id and event_tb.username = empolyee.username and room_tb.room_id ='$room_id' GROUP BY id_event";
  
        $result_room = mysqli_query($conn,$sqlroom);
        $event_json = array();
        $i = 0;
        function ThDate()
 {
 //วันภาษาไทย
 $ThDay = array ( "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์" );
 //เดือนภาษาไทย
 $ThMonth = array ( "มกรามก", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );
  
 //กำหนดคุณสมบัติ
 $week = date( "w" ); // ค่าวันในสัปดาห์ (0-6)
 $months = date( "m" )-1; // ค่าเดือน (1-12)
 $day = date( "d" ); // ค่าวันที่(1-31)
 $years = date( "Y" )+543; // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.
  
 return "วัน
     ที่ $day  
     $ThMonth[$months] 
     พ.ศ. $years";
 }
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
          'room_name'=>$dataevent['room_name'],
          'name'=>$dataevent['name']
          
         );
             $event_json[$i] =$arr_event;
             $i++;
         }       
        echo json_encode($event_json);      
    
?>