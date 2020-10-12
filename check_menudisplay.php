<?php

date_default_timezone_set("Asia/Bangkok");
       
         $level = $_SESSION['level'];


if($level == 1){
?>
        <a class="collapse-item" style="font-size:14px;" href="displaydaydata.php">ข้อมูลการจองห้องประชุม</a>
       <a class="collapse-item"style="font-size:14px;"  href="display_chart.php">ข้อมูลสถิติการใช่ห้องประชุม</a>
       <a class="collapse-item" style="font-size:14px;"  href="display_room.php">ข้อมูลห้องประชุม</a>
    

<?php } 

else{
 ?>
       <!-- <a class="collapse-item"style="font-size:14px;"  href="display_chart.php">ข้อมูลสถิติการใช่ห้องประชุม</a>-->
       <a class="collapse-item" style="font-size:14px;"  href="display_room.php">ข้อมูลห้องประชุม</a>
       <a class="collapse-item" style="font-size:14px;"  href="displaymeeting.php">ข้อมูลการจอง</a>


<?php }?>       