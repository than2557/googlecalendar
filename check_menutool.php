<?php

date_default_timezone_set("Asia/Bangkok");
       
         $level = $_SESSION['level'];


if($level == 1){
?>
 <a class="collapse-item mb-0" style="font-size:20px;"href="index_backup.php">จองห้องประชุม</a>
<a class="collapse-item mb-0" style="font-size:20px;" href="addmeetingroom_form.php">เพิ่มห้องประชุม</a>

<?php } 

else{
 ?>
 <a class="collapse-item mb-0" style="font-size:20px;"href="index_backup.php">จองห้องประชุม</a>

<?php }?>       