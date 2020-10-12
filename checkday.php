<?php
// echo "TEST ajax";
date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;
         $start = isset($_POST['start']) ? $_POST['start'] : "";
        //  echo $start;

         $sql = "SELECT empolyee.name,event_tb.name_event,event_tb.id_event,empolyee.username,department.name_department,department.id_department,event_tb.room_id,room_tb.room_name,event_tb.start,event_tb.end,event_tb.time_start,event_tb.time_end FROM department,room_tb,event_tb,empolyee WHERE event_tb.room_id = room_tb.room_id and event_tb.username =empolyee.username and empolyee.id_department = department.id_department and event_tb.start='$start' GROUP BY id_event";
         $result_event = mysqli_query($conn,$sql);
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

 function DateThai($strDate)
 {
     $strYear = date("Y",strtotime($strDate))+543;
     $strMonth= date("n",strtotime($strDate));
     $strDay= date("j",strtotime($strDate));

     $strMonthCut = Array( "มกรามก", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );
     $strMonthThai=$strMonthCut[$strMonth];
     return "$strDay $strMonthThai $strYear";
 }

         while($dataevent = mysqli_fetch_array($result_event)){
  ?>
   <tr>
      <td style="text-align:center;"><?=$dataevent['id_event'];?></td>
      <td><?=$dataevent['room_name'];?></td>
      <td><?=$dataevent['name_event'];?></td>
      <td><?=DateThai($dataevent['start']);?></td>
      <td><?=DateThai($dataevent['end']);?></td>
      <td><?=$dataevent['time_start'].'-'.$dataevent['time_end'];?></td>
      <td><?=$dataevent['name'];?></td>
      <td><?=$dataevent['name_department'];?></td>
      <td><a href="event_updateform.php?id_event=<?=$dataevent['id_event'];?>"><img src="upload/Edit-512.png" style="width:50px;"></a></td>
      <td><a href="event_del.php?id_event=<?=$dataevent['id_event'];?>" onClick="return window.confirm('แน่ใจเหรอ?')"><img src="upload/47-512.png" style="width:50px;"></a></td>
      
    </tr>



  <?php }?>