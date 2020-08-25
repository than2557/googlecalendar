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

<script src='https://cdn.datatables.net/plug-ins/1.10.21/i18n/Thai.json'></script>
<link rel="stylesheet" type="text/css" href="datatables.css"/>
 
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


 $sql = "SELECT * FROM `empolyee` WHERE `id_pea`";
 $result_event = mysqli_query($conn,$sql);

	?>


</head>

<style>

body {
  background: linear-gradient(135deg,  #ffb3ff 50%, #e580ff 50%);
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
background-color: #333;
margin-top:-40px;
width:2000px;
margin-left:-40px;
}

.topnav a {
float: left;
color: #f2f2f2;
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
background-color: #4CAF50;
color: white;
}

</style>
<body>
<div class="topnav">
  <a class="active" href="index_admin.php" style="margin-left:20px;">Home</a>
  <a href="displaydata.php" style="margin-left:20px;">editdata</a>
  <a href="logout.php" style="margin-left:20px;">logout</a>
  <a style="margin-left:50%;color: white;"> จองห้องประชุม<a>
</div>
<div style="width:700px;margin-left:30%;margin-top:50px;">
		<table class="table table-bordered" id="myTable" style="background-color:#ffff;width:700px;height:400px ;margin-left:0%;margin-top:10%;">
  <thead>
    <tr>
      <th>username</th>
      <th>ชื่อ</th>
      <th>นามสกุล</th>
      <th>แผนก</th>
      <th>แก้ไข</th>
      <th>ลบ</th>
    </tr>
  </thead>
  <tbody>
     <?php
  while($row = $result_event->fetch_assoc()){
    ?>

    <tr>
      <td style="text-align:center;"><?=$row['username'];?></td>
      <td><?=$row['name'];?></td>
      <td><?=$row['lastname'];?></td>
      <td><?=$row['Department'];?></td>
      <td><a href="event_updateform.php?id_event=<?=$row['id_pea'];?>"><img src="upload/Edit-512.png" style="width:50px;"></a></td>
      <td><a href="event_del.php?id_pea=<?=$row['id_pea'];?>" onClick="return window.confirm('แน่ใจเหรอ?')"><img src="upload/47-512.png" style="width:50px;"></a></td>
      
    </tr>

    <?php }?>  
  </tbody>
</table>





	
</div>

</body>
</html>