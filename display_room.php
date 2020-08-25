<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css'>
        <link rel="icon" type="img/png" href="iconpea.png"/>
 
        <link href='./packages/core/main.css' rel='stylesheet' />
        <link href='./packages/daygrid/main.css' rel='stylesheet' />
        <link href='./packages/timegrid/main.css' rel='stylesheet' />
        <script src='./packages/core/main.js'></script>
        <script src='./packages/interaction/main.js'></script>
        <script src='./packages/daygrid/main.js'></script>
        <script src='./packages/timegrid/main.js'></script>
        
        <!-- partial -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>


<link rel="stylesheet" type="text/css" href="datatables.css"/>
<style>
body {
  background:#bdbdbd;
  margin: 40px 10px;
  padding: 0;
  font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  font-size: 14px;
}

#calendar {
  max-width: 900px;
  margin: 0 auto;
}
.topnav {
  overflow: hidden;
  background-color: #ffffff ;
  margin-top:-40px;
  width:2000px;
  margin-left:-40px;
}

.topnav a {
  float: left;
  color: #000000;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #c95eff;
  color: white;
}
  .neumorphic {
        border-radius: 1rem;
        background: var(--color);
        /* -webkit-animation: 1s -.3s 1 paused opacify;
        animation: 1s -.3s 1 paused opacify; */
        -webkit-backdrop-filter: blur(1.5rem);
        backdrop-filter: blur(1.5rem);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: -0.25rem -0.25rem 0.5rem rgba(255, 255, 255, 0.07), 0.25rem 0.25rem 0.5rem rgba(0, 0, 0, 0.12), -0.75rem -0.75rem 1.75rem rgba(255, 255, 255, 0.07), 0.75rem 0.75rem 1.75rem rgba(0, 0, 0, 0.12), inset 8rem 8rem 8rem rgba(0, 0, 0, 0.05), inset -8rem -8rem 8rem rgba(255, 255, 255, 0.05);
      }
      @-webkit-keyframes opacify {
        to {
          background: transparent;
        }
      }
      @keyframes opacify {
        to {
          background: transparent;
        }
      }
      .neumorphic{
        --color: hsl(210deg,10%,30%);
        background: #ffffff;
      }
      @import url(https://fonts.googleapis.com/css?family=Lato:300,400,700);
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css);
*, *:before, *:after {
  box-sizing: border-box;
}

body {
  font: 14px/22px "Lato", Arial, sans-serif;
  background: #e5d8ed;
}

.lighter-text {
  color: #ABB0BE;
}

.main-color-text {
  color: #6394F8;
}

    
</style>
<script type="text/javascript" src="datatables.js"></script>

<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable({  
      
      "columnDefs": [{ "width": "20%", "targets": 0 }],
  "language": {
              "sProcessing": "กำลังดำเนินการ...",
              "sLengthMenu": "แสดง_MENU_ แถว",
              "sZeroRecords": "ไม่พบข้อมูล",
              "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
              "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
              "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
              "sInfoPostFix": "",
              "sSearch": "ค้นหา:",
              "sUrl": "",
              "oPaginate": {
                            "sFirst": "เิริ่มต้น",
                            "sPrevious": "ก่อนหน้า",
                            "sNext": "ถัดไป",
                            "sLast": "สุดท้าย"
              }
     }
     
     
     });
    
} );
</script>

	<title>display</title>


	<?php 

date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
 $conn=$DBconnect;


 $sql = "SELECT * FROM `room_tb` WHERE `room_id`";
 $result_room = mysqli_query($conn,$sql);

	?>


</head>
<body>

<div class="topnav">
  <a class="active" href="#home" style="margin-left:20px;">หน้าหลัก</a>
  <a href="displaydata.php" style="margin-left:20px;">ข้อมูลการจองห้องประชุม</a>
  <a href="display_room.php" style="margin-left:20px;"></a>
  <a href="logout.php" style="margin-left:20px;">ออกจากระบบ</a>
  <a style="margin-left:50%;color: white;"> จองห้องประชุม<a>
</div>
<div style="background-color:#ffff;margin-left:25%;width:800px;margin-top:20px;height:100px;">
<label for="text" style="font-size:30px;margin-left:35%;">ข้อมูลห้องประชุม</label>
</div>
<div style="background-color:#ffff;margin-left:25%;width:800px;">
		<table class="table table-bordered" id="myTable" style="width:800px;height:400px ;border-radius: 100%;margin-left:0%;margin-top:5%;">
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





	
</div>

</body>
</html>