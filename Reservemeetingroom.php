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
        <link rel="icon" type="img/png" href="iconpea.png"/>
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
    


        <!-- partial -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>
        <!-- <script src="./script.js"> -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="js-use/sb-admin-2.min.js"></script>

        <script src='https://cdn.datatables.net/plug-ins/1.10.21/i18n/Thai.json'></script>
<link rel="stylesheet" type="text/css" href="datatables.css"/>
<script type="text/javascript" src="datatables.js"></script>


    <title>จองห้องประชุม</title>
</head>
<script>
function backindex(){
var level = document.getElementById("level").value;
console.log(level);
if(level == 1){
  open('index_admin.php');
  close('Reservemeetingroom.php');
 
 
}
else{
  open('index_user.php');
  close('Reservemeetingroom.php');


}
}
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
          setTimeout(function(){
        location.reload();
          },3000);  
  } 
    });
  }
})
    });

 });

function checktime(){
  var time_start = document.getElementById("time_start").value;
  console.log(time_start)
  $.ajax({
    type:"POST",
    url:"checktime.php",
    data:{"time_start":time_start},
    success:function(data) {
      $('#data_room').html(data);    
  } 

  })


}  

</script>


<body>




          <!-- Page Wrapper -->
        <!-- <input id="room" value="1" hidden> -->
<input id="level" value="<?php echo $_SESSION['level'];  ?>" hidden>
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion fixed-left" id="accordionSidebar">


<a class="sidebar-brand d-flex align-items-center justify-content-center" style="color:#ffffff;" onclick="backindex()">
      <div class="sidebar-brand-icon">
        <i><img src="img/icon.png" style="width:50px;"></i>
      </div>
      <div class="sidebar-brand-text mx-3">ระบบจองห้องประชุม</div>
    </a>


 <li class="nav-item">
   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
     <i class="fas fa-fw fa-cog"></i>
     <span class="textsize" style="font-size:20px;">เมนู</span>
   </a>
   <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
     <div class="bg-white py-2 collapse-inner rounded">

       <a class="collapse-item textsize" style="font-size:20px;" href="Reservemeetingroom.php">จองห้องประชุม</a>
       <a class="collapse-item mb-0" style="font-size:20px;" href="addmeetingroom_form.php">เพิ่มห้องประชุม</a>
     </div>
   </div>
 </li>


 <li class="nav-item">
   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
     <i class="fas fa-fw fa-table"></i>
     <span style="font-size:20px;">รายงาน</span>
   </a>
   <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
     <div class="bg-white py-2 collapse-inner rounded">
      
     <a class="collapse-item" style="font-size:14px;" href="displaydata.php">ข้อมูลการจองห้องประชุม</a>
       <a class="collapse-item"style="font-size:14px;"  href="display_chart.php">ข้อมูลสถิติการใช่ห้องประชุม</a>
       <a class="collapse-item" style="font-size:14px;"  href="display_room.php">ข้อมูลห้องประชุม</a>
     </div>
   </div>
 </li>


 <li class="nav-item">
   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
     <i class="fas fa-fw fa-folder"></i>
     <span>--</span>
   </a>
   <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
     <div class="bg-white py-2 collapse-inner rounded">
       <h6 class="collapse-header">Login Screens:</h6>
       <a class="collapse-item" href="login.html">Login</a>
       <a class="collapse-item" href="register.html">Register</a>
       <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
       <div class="collapse-divider"></div>
       <h6 class="collapse-header">Other Pages:</h6>
       <a class="collapse-item" href="404.html">404 Page</a>
       <a class="collapse-item" href="blank.html">Blank Page</a>
     </div>
   </div>
 </li>

 <li class="nav-item">
   <a class="nav-link" href="charts.html">
     <i class="fas fa-fw fa-chart-area"></i>
     <span>Charts</span></a>
 </li>


 <hr class="sidebar-divider d-none d-md-block">


</ul>

<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
 <h1 class="h3 mb-0 text-gray-800">ระบบจองห้องประชุม</h1>
  
   <ul class="navbar-nav ml-auto">


 

     <div class="topbar-divider d-none d-sm-block"></div>

     <!-- Nav Item - User Information -->
     <li class="nav-item dropdown no-arrow">
       <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo$_SESSION['name'];  ?></span>
         
         <img class="img-profile rounded-circle material-icons" src="img/account.png">
       </a>
       <!-- Dropdown - User Information -->
       <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in " aria-labelledby="userDropdown">
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="logout.php">
           <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400 "></i>
           ออกจากระบบ
         </a>
       </div>
     </li>

   </ul>

 </nav>

 

   



   









  
       








    
     




<input  id="visitor" value="<?php echo$_SESSION['name'];?>"hidden>
<input id="username"  value="<?php echo$_SESSION['username'];?>" hidden>
 


<div class="container themed-container " style="margin-left: 300px;width:1200px;">
<div class="card">
<div class="card-header  d-flex flex-row align-items-center justify-content-between ">
      <h2>จองห้องประชุม</h2>
 </div>
 <div class="card">
<div class="container">
<div class="row shadow" > 
  <div class="col">
  <label>หัวข้อการประชุม:</label> <input class="form-control" type="text" id="event">

  </div>
  <div class="col">
  <label>วันที่:</label>
<input class="form-control"  type="date" id="startdate" onchange="selectroommeeting()">
    </div>
<div class="col">
    <label>ถึงวันที่</label>
<input class="form-control" placeholder="yyyy-MM-dd" id="enddate"  onchange="checkenddate()" type="date"/>

 </div>
 <div class="col">
 <label>ช่วงเวลา:</label>
<input type="time" id="time_start"class="form-control"  onchange="checktime()">
</div>
<div class="col">
<label>ถึง:</label>
<input type="time" id="time_end" class="form-control">
</div>
</div>
</div>
<br>
<br>
<div>
  <table class="table table-bordered" id="table">
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


</div>
</div>
</div>
        

    


 




 
  
</body>
</html>