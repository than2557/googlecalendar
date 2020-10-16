<?php

date_default_timezone_set("Asia/Bangkok");
       
         $level = $_SESSION['level'];

if($level == 1){
?>
<table class="table table-bordered mt-4" id="myTable" style="margin-top:100px;">
  <thead class="table-primary">
    <tr style="background-color:#f9ebff;">
      <th>รหัสการประชุม</th>
      <th>ชื่อการประชุม</th>
      <th>วันที่จอง</th>
      <th>ถึงวันที่</th>
      <th>รหัสพนักงาน</th>
      <th>ชื่อผู้จอง</th>
      <th>แก้ไข</th>
      <th>ลบ</th>
    </tr>
  </thead>
  <tbody>
     <?php
  while($row = $result_event->fetch_assoc()){
    ?>

    <tr>
      <td style="text-align:center;"><?=$row['id_event'];?></td>
      <td><?=$row['name_event'];?></td>
      <td><?=$row['start'];?></td>
      <td><?=$row['end'];?></td>
      <td><?=$row['username'];?></td>
      <td><?=$row['name'];?></td>
      <td><a href="event_updateform.php?id_event=<?=$row['id_event'];?>"><img src="upload/Edit-512.png" style="width:50px;"></a></td>
      <td><a href="event_del.php?id_event=<?=$row['id_event'];?>" onClick="return window.confirm('แน่ใจเหรอ?')"><img src="upload/47-512.png" style="width:50px;"></a></td>
      
    </tr>

    <?php }?>  
  </tbody>
</table>
<?php } 

else{
 ?>
<table class="table table-bordered mt-4" id="myTable">
  <thead class="table-primary">
    <tr>
      <th>รหัสการประชุม</th>
      <th>ชื่อการประชุม</th>
      <th>วันที่จอง</th>
      <th>ถึงวันที่</th>
      <th>รหัสพนักงาน</th>
      <th>ชื่อผู้จอง</th>
     
    </tr>
  </thead>
  <tbody>
     <?php
  while($row = $result_event->fetch_assoc()){
    ?>
    <tr>
      <td style="text-align:center;"><?=$row['id_event'];?></td>
      <td><?=$row['name_event'];?></td>
      <td><?=DateThai($row['start']);?></td>
      <td><?=DateThai($row['end']);?></td>
      <td><?=$row['username'];?></td>
      <td><?=$row['name'];?></td>
    </tr>
    <?php }?>  
  </tbody>
</table>

<?php }?>       