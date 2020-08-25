<!DOCTYPE html>
<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;
        //  $sql = "SELECT room_tb.room_id,room_tb.room_name, event_tb.id_event FROM room_tb INNER JOIN event_tb ON room_tb.room_id = event_tb.room_id";
        //  $result_event = mysqli_query($conn,$sql);
            $query = "SELECT room_tb.room_name,event_tb.room_id,event_tb.id_event,event_tb.name_event,COUNT(*) as number FROM event_tb,room_tb WHERE event_tb.room_id=room_tb.room_id GROUP BY room_id";
            $result_room = mysqli_query($conn,$query);
            $result_event = mysqli_query($conn,$query);
             
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css'>
     

        <link href='./packages/core/main.css' rel='stylesheet' />
        <link href='./packages/daygrid/main.css' rel='stylesheet' />
        <link href='./packages/timegrid/main.css' rel='stylesheet' />
        <script src='./packages/core/main.js'></script>
        <script src='./packages/interaction/main.js'></script>
        <script src='./packages/daygrid/main.js'></script>
        <script src='./packages/timegrid/main.js'></script>
        <link rel="icon" type="img/png" href="iconpea.png"/>

        <!-- partial -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>
        <!-- <script src="./script.js"> -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        
<script src='https://cdn.datatables.net/plug-ins/1.10.21/i18n/Thai.json'></script>
<link rel="stylesheet" type="text/css" href="datatables.css"/>
 
<script type="text/javascript" src="datatables.js"></script>


    <title>จองห้องประชุม</title>
</head>
<script>
// $(document).ready( function () {
//     $('#myTable').DataTable({  
      
//       "columnDefs": [{ "width": "5%", "targets": 0 }],
//   "language": {
//               "sProcessing": "กำลังดำเนินการ...",
//               "sLengthMenu": "แสดง_MENU_ แถว",
//               "sZeroRecords": "ไม่พบข้อมูล",
//               "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
//               "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
//               "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
//               "sInfoPostFix": "",
//               "sSearch": "ค้นหา:",
//               "sUrl": "",
//               "oPaginate": {
//                             "sFirst": "เิริ่มต้น",
//                             "sPrevious": "ก่อนหน้า",
//                             "sNext": "ถัดไป",
//                             "sLast": "สุดท้าย"
//               }
//      }
     
     
//      });
    
// } );
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
   
    $('#startdate').attr('min', maxDate);
    $('#enddate').attr('min', maxDate);
    // $('#startdate2').attr('min', maxDate);
});

function selectroommeeting(){
var startdate = document.getElementById("startdate").value;

console.log(startdate);
$.ajax({
    type:"POST",
    url:"select_dataroom.php",
    data: {"start": startdate},
        success: function(data) {
      
            $('#data_room').html(data);     

        }




});

$.ajax({

  type:"POST",
    url:"check_stdateend.php",
    data: {"start": startdate},
        success: function(data) {
      
            $('#data_room').html(data);     

        }
});
}

function checkenddate(){
  var startdate = document.getElementById("startdate").value;

console.log(startdate);
  var enddate = document.getElementById("enddate").value;
console.log(enddate);
$.ajax({
    type:"POST",
    url:"select_dataroom.php",
    data: {"start":startdate,"end": enddate},
        success: function(data) {
      
            $('#data_room').html(data);     

        }




});
}


$(document).ready(function(){
     $("#table").on('click', '.btnSelect', function() {
      // get the current row
      var currentRow = $(this).closest("tr");

      var col1 = currentRow.find("td:eq(0)").html();
 
      var data_room = col1;
      Swal.fire({
  title: 'ต้องการจองห้องประชุม?',
  text: "กรุณากดปุ่มยืนยันเพื่อจองห้องประชุม",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'ยืนยันการจองห้องประชุม'
}).then((result) => {
  if (result.value) {
    var event = document.getElementById("event").value;
    var date = document.getElementById("startdate").value;
    var enddate = document.getElementById("enddate").value;
    // var time_period = document.getElementById("time_period").value;
    var visitor = document.getElementById("visitor").value;
    var username = document.getElementById("username").value;
    var time_start = document.getElementById("time_start").value;
    var time_end = document.getElementById("time_end").value;
    console.log(data_room);
    console.log(date)
    console.log(event)
    console.log(visitor)
    console.log(enddate)
    // console.log(time_period)
    console.log(username)
    $.ajax({
type: "POST",
        url: "quickstart.php",
        data: {"date": date, "event": event,"enddate": enddate, "room_id": data_room,"visitor":visitor,"username":username,"time_start":time_start,"time_end":time_end},
        success:function(data) {
          Swal.fire({title:'การจองเสร็จสิ้น!',
                text:'บันทึกการจองเสร็จสิ้น.',
                icon: 'success'
                });
          //   setTimeout(function(){
          // location.reload();
          //   },3000);  
  } 
    });
  }
})
    });

 });

function checktime(){
  var time_start = document.getElementById("time_start").value;
  var startdate = document.getElementById("startdate").value;
  console.log(time_start)
  console.log(startdate)
  $.ajax({
    type:"POST",
    url:"checktime.php",
    data:{"time_start":time_start,"startdate":startdate},
    success:function(data) {
      $('#data_room').html(data);    
  } 

  })


}  

</script>
<style>
body {
background:#f5f5f5;
  margin: 40px 10px;
  padding: 0;
  font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  font-size: 14px;
  width:100%;
}

#calendar {
  max-width: 900px;
  margin: 0 auto;
}


  body {
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
  background-color: #9d00d1;
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
  background: #faf7f7;
}

.lighter-text {
  color: #ABB0BE;
}

.main-color-text {
  color: #6394F8;
}

    

</style>

</style>
<body>
<div class="topnav">
  <a class="active" href="index_admin.php" style="margin-left:20px;">หน้าหลัก</a>
  <a href="displaydata.php" style="margin-left:20px;">แก้ไขข้อมูล</a>
  <a  style="margin-left:1%;color: back;">ยินดีต้อนรับ:&nbsp;<?php echo $_SESSION['name']; ?> </a><a style="color: back;">เลขประจำตัวพนักงาน:&nbsp;<?php echo $_SESSION['username'];?></a>
  <a href="logout.php" style="margin-left:50%;">ออกจากระบบ</a>
<input  id="visitor" value="<?php echo$_SESSION['name'];?>"hidden>
<input id="username"  value="<?php echo$_SESSION['username'];?>" hidden>
  <!-- <a style="margin-left:60%;color: white;">จำนวนการจองห้องประชุม<a> -->
</div>

<div class="neumorphic" style="width:1200px;height:100px;margin-left:15%;margin-top:2%;">
<div class="row"style="margin-left:30%;margin-top:3.2%;">

<label style="margin-left:-40%;">หัวข้อการประชุม:</label> <input class="form-control" type="text" id="event" style="width:200px;margin-top:-10px;">
<label style="margin-left:1%;margin-top:-0.1%;">วันที่:</label><input class="form-control" style="width:200px;margin-top:-10px;" type="date" id="startdate" onchange="selectroommeeting()">
<label>ถึงวันที่</label>
<input class="form-control" placeholder="yyyy-MM-dd" id="enddate"  onchange="checkenddate()" style="width:200px;margin-top:-10px;"type="date"/>
<label>ช่วงเวลา:</label>
<input type="time" id="time_start"class="form-control" style="width:100px;margin-top:-10px;" onchange="checktime()">
<label>ถึง:</label>
<input type="time" id="time_end" class="form-control" style="width:100px;margin-top:-10px;">
 <!-- <select id="time_period" style="width:200px;margin-top:-10px;" class="form-control">
                                <option value="fullday">เต็มวัน</option>
                                <option value="halfdaymoring">ครึ่งวันเช้า</option>
                                <option value="halfdayafter">ครึ่งวันบ่าย</option>
                                </select> -->
</div>
</div>
    
  <div class="neumorphic" style="width: 1000px;margin-left:20%;margin-top:1%;">
  <table class="table table-bordered" id="table" style="width:800px;height:400px ;border-radius: 100%;margin-left:7%;margin-top:5%;">
  <thead>
    <tr>
      <th>รหัสห้องประชุม</th>
      <th>ชื่อห้องประชุม</th>
      <th>ที่ตั้งห้องประชุม</th>
      <th>ชนิดห้อง</th>
      <th>จำนวนคนที่รองรับ</th>
      <th>จองห้องประชุม</th>
    </tr>
  </thead>
  <tbody id="data_room">
  </tbody>
  <table>
</div>
        

    


 




 
  
</body>
</html>