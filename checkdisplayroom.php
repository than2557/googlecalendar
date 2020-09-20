<?php

date_default_timezone_set("Asia/Bangkok");
       
         $level = $_SESSION['level'];


if($level == 1){
?>
<table class="table table-bordered" id="myTable">
  <thead>
    <tr>
      <th>รหัสห้องประชุม</th>
      <th>ชื่อห้องประชุม</th>
      <th>ที่ตั้งห้องประชุม</th>
      <th>ชนิดห้อง</th>
      <th>จำนวนคนที่รองรับ</th>
      <th>แก้ไข</th>
      <th>ลบ</th>
    </tr>
  </thead>
  <tbody>
     <?php
  while($row = $result_room->fetch_assoc()){
    ?>

    <tr>
      <td><?=$row['room_id'];?></td>
      <td><?=$row['room_name'];?></td>
      <td><?=$row['room_location'];?></td>
      <td><?=$row['room_type'];?></td>
      <td style="text-align: right;"><?=$row['room_size'];?></td>
      <td><a href="room_updateform.php?room_id=<?=$row['room_id'];?>"><img src="upload/Edit-512.png" style="width:50px;"></a></td>
      <td><a href="room_delete.php?room_id=<?=$row['room_id'];?>" onClick="return window.confirm('แน่ใจเหรอ?')"><img src="upload/47-512.png" style="width:50px;"></a></td>
    </tr>

    <?php }?>  
  </tbody>
</table>
<?php } 

else{
 ?>
<table class="table table-bordered" id="myTable">
  <thead>
    <tr>
      <th>รหัสห้องประชุม</th>
      <th>ชื่อห้องประชุม</th>
      <th>ที่ตั้งห้องประชุม</th>
      <th>ชนิดห้อง</th>
      <th>จำนวนคนที่รองรับ</th>
     
    </tr>
  </thead>
  <tbody>
     <?php
  while($row = $result_room->fetch_assoc()){
    ?>

    <tr>
      <td><?=$row['room_id'];?></td>
      <td><?=$row['room_name'];?></td>
      <td><?=$row['room_location'];?></td>
      <td><?=$row['room_type'];?></td>
      <td style="text-align: right;"><?=$row['room_size'];?></td>
   
    </tr>

    <?php }?>  
  </tbody>
</table>

<?php }?>       