<?php 
echo "TEST ajax";
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
 $conn=$DBconnect;

 $time_start = isset($_POST['time_start']) ? $_POST['time_start'] : "";


$sqlroom = "SELECT * FROM room_tb WHERE room_tb.room_id not in (select event_tb.room_id from event_tb where event_tb.time_start = '$time_start') order by room_tb.room_id";
 $result_room = mysqli_query($conn,$sqlroom);
         echo $sqlroom;
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