<?php

date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;

$year = $_POST['select_year'];
echo $year;

$query = "SELECT room_tb.room_name,event_tb.room_id,event_tb.id_event,event_tb.name_event,COUNT(*) as number FROM event_tb,room_tb WHERE event_tb.room_id=room_tb.room_id and substr(start,1,4)='$year' GROUP BY room_id";
$result = mysqli_query($conn,$query);
echo $query; 

 while($row = mysqli_fetch_array($result)){

?>
  <tr>
      <td style="text-align:center;"><?=$row['room_id'];?></td>
      <td><?=$row['room_name'];?></td>
      <td style="text-align:right;"><?=$row['number'];?></td>
    </tr>


<?php  }  ?>



