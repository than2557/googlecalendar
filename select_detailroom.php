<?php

date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;

         $room_id = isset($_POST['room_id']) ? $_POST['room_id'] : "";
         $sqlroom = "SELECT * FROM `room_tb` WHERE room_id='$room_id'";
         $result_room = mysqli_query($conn,$sqlroom);
         $room_json = array();
         $i = 0;
         while($dataroom = mysqli_fetch_array($result_room)){
                $room_id = $dataroom['room_id'];
                $room_name = $dataroom['room_name'];
                $room_owner_th = $dataroom['room_owner_th'];
                $room_location = $dataroom['room_location'];
                $room_size = $dataroom['room_size'];

                $arr_room =array('room_id'=>$room_id ,
                'room_name'=>$room_name ,
                'room_owner_th'=> $room_owner_th,
                'room_location'=>$room_location,
                'room_size'=> $room_size,
                'room_id'=>$room_id
            );
            $room_json[$i] =$arr_room;
            $i++;
         }
         echo json_encode($room_json);   
        
?>