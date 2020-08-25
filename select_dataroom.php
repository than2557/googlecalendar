<?php

echo "TEST ajax";
date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;

         $start = isset($_POST['start']) ? $_POST['start'] : "";
        
         echo $start;

         $sqlroom = "SELECT * FROM room_tb WHERE room_tb.room_id not in (select event_tb.room_id from event_tb where event_tb.start = '$start'or event_tb.end = '$start') order by room_tb.room_id";
         $result_room = mysqli_query($conn,$sqlroom);


         $sqlroom2 = "SELECT * FROM room_tb WHERE room_tb.room_id not in (select event_tb.room_id from event_tb where event_tb.start = '$start') order by room_tb.room_id";
         $result_room2 = mysqli_query($conn,$sqlroom2);
         echo $sqlroom; 
         echo $sqlroom2; 
        
         while($dataroom = mysqli_fetch_array($result_room)){

            ?>  
    <tr>
      <td id="room_id" style="text-align:center;"><?=$dataroom['room_id'];?></td>
      <td id="room_name"><?=$dataroom['room_name'];?></td>
      <td id="room_location"><?=$dataroom['room_location'];?></td>
      <td id="room_type"><?=$dataroom['room_type'];?></td>
      <td  id="room_type" style="text-align:right;"><?=$dataroom['room_size']?></td>
      <td><button type="button" id="idroom"class="btn btn-info btnSelect" value="<?=$dataroom['room_id'];?>">จองห้องประชุม</button></td>
    </tr>
        

   
   <?php  } ?>