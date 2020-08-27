<!DOCTYPE html>
<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;
        //  $sql = "SELECT room_tb.room_id,room_tb.room_name, event_tb.id_event FROM room_tb INNER JOIN event_tb ON room_tb.room_id = event_tb.room_id";
        //  $result_event = mysqli_query($conn,$sql);
        

            $query = "SELECT room_tb.room_name,EXTRACT(YEAR FROM event_tb.start),event_tb.room_id,event_tb.id_event,event_tb.name_event,COUNT(*) as number FROM event_tb,room_tb WHERE event_tb.room_id=room_tb.room_id GROUP BY room_id";
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

        <!-- partial -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>
        <!-- <script src="./script.js"> -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="js-use/sb-admin-2.min.js"></script> 

<script src='https://cdn.datatables.net/plug-ins/1.10.21/i18n/Thai.json'></script>
<link rel="stylesheet" type="text/css" href="datatables.css"/>
 
<script type="text/javascript" src="datatables.js"></script>


    <title>Document</title>
</head>
<script>
$(document).ready( function () {
    $('#myTable').DataTable({  
      
      "columnDefs": [{ "width": "5%", "targets": 0 }],
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
                            "sFirst": "เริ่มต้น",
                            "sPrevious": "ก่อนหน้า",
                            "sNext": "ถัดไป",
                            "sLast": "สุดท้าย"
              }
     }
     
     
     });
    
} );
function selectyear(){
 var select_year = document.getElementById("select_year").value;

 console.log(select_year);
 $.ajax({
    type:"POST",
    url:"select_year.php",
    data: {"select_year": select_year},
        success: function(data) {
      // console.log("funtion Success")
            $('#data_chart').html(data);     

        }
});
}

function backindex(){
var level = document.getElementById("level").value;
console.log(level);
if(level == 1){
  open('index_admin.php');
  close('display_chart.php');
 
 
}
else{
  open('index_user.php');
  close('display_chart.php');


}
}
</script>
<style>

    
</style>

</style>
<body>
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


<div  class="card shadow" style="width:700px;height:100px;background-color:#ffff;margin-top:5%;margin-left:25%;">

<label for="" style="font-size: 200%;margin-top:4%;margin-left:30%;">จำนวนการใช้ห้องประชุม</label>
</div>
    <div class="card shadow" style="width:500px;margin-left:10%;margin-top:1%;height:100px;">
    <select  style="width:300px;margin-left:20%;margin-top:3%;"  class="form-control" name="select_year" id="select_year" onchange="selectyear()">
                      <option value="--เลือกปี--">--เลือกปี--</option>
                      <option value="2020">2020</option>
                      <option value="2019">2019</option>
                      <option value="2018">2018</option>
                      <option value="2017">2017</option>
                   </select>
                   </div>  
    <div style="card shadow">  
                <div class="card shadow "  id="piechart" style="width:500px;height:400px;margin-left:188px;"></div>  
         
           </div>
           <div>
           </div>

    


           <div class="card shadow" style="width:700px;margin-left:45%;margin-top:-25%;">
		<table class="table table-bordered" id="myTable" style="background-color:#ffff;width:695px;height:400px;margin-left:-0%;margin-top:-50%;">
  <thead>
    <tr>
     
      <th>ชื่อการประชุม</th>
      <th>ห้องประชุม</th>
      <th>จำนวนการจอง/ครั้ง</th>
  
    
    </tr>
  </thead>
  <tbody id="data_chart">
     <?php
  while($row_datacount = mysqli_fetch_array($result_event)){
    ?>
    <tr>
      <td style="text-align:center;"><?=$row_datacount['room_id'];?></td>
      <td><?=$row_datacount['room_name'];?></td>
      <td style="text-align:right;"><?=$row_datacount['number'];?></td>
    </tr>

    <?php }?>  
  </tbody>
</table>
</div> 

<script>
   google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['ห้องประชุม', 'จำนวนการใช่งาน'],<?php     
                          
              $room_name = array();
              $i = 0;
                          while($row = mysqli_fetch_array($result_room))  
                          {     
                              //  $array_name= array('room_name'=>$row['room_name'],
                              // 'number'=>$row['number']);
                         //      $room = $row['room_name'];
                         //     echo $room ;
                               
                               echo "['".$row['room_id']."',".$row['number']."],";  
                              // $room_name[$i] =$array_name;
                              // $i++;
                          }
                         //  echo json_encode($room_name,JSON_UNESCAPED_SLASHES);      
              ?>    
                        
                     ]);  
                var options = {  
                      title: 'จำนวนการใช้งานห้องประชุม',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           } 
            
</script>
<!-- <div class="tenor-gif-embed" data-postid="7939264" data-share-method="host" data-width="100%" data-aspect-ratio="1.0309278350515463"><a href="https://tenor.com/view/pepe-pepe-the-frog-sad-pepe-crying-tears-gif-7939264">Pepe GIF</a> from <a href="https://tenor.com/search/pepe-gifs">Pepe GIFs</a></div><script type="text/javascript" async src="https://tenor.com/embed.js"></script> -->

 
  
</body>
</html>