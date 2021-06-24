<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css'>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    



      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/index_admin.css">

<link rel="stylesheet" href="js/fullcalendar-5.3.0/lib/main.css">
<script src="js/fullcalendar-5.3.0/lib/main.min.js"></script>

      

        <link rel="icon" type="img/png" href="iconpea.png"/>
        

     
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
       
      
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="js-use/sb-admin-2.min.js"></script> 

<script src='https://cdn.datatables.net/plug-ins/1.10.21/i18n/Thai.json'></script>
<link rel="stylesheet" type="text/css" href="datatables.css"/>
 
<script type="text/javascript" src="datatables.js"></script>

<script type="text/javascript">

function backindex(){
var level = document.getElementById("level").value;
console.log(level);
if(level == 1){
  open('index_admin.php');
  close('displaymeeting.php');
 
 
}
else{
  open('index_user.php');
  close('displaymeeting.php');


}
}
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
                            "sFirst": "เริ่มต้น",
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
session_start();
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
 $conn=$DBconnect;
$username=$_SESSION['username'];
// echo $username;
 $sql = "SELECT event_tb.name_event,event_tb.id_event,event_tb.start,event_tb.end,event_tb.time_start,event_tb.time_end,event_tb.username,empolyee.name,room_tb.room_id,room_tb.room_name FROM event_tb,empolyee,room_tb WHERE event_tb.room_id =room_tb.room_id and event_tb.username = empolyee.username and event_tb.username = '$username' GROUP BY id_event ";
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
	?>


</head>


<body>


<input id="level" value="<?php echo $_SESSION['level'];  ?>" hidden>
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion fixed-left"   id="accordionSidebar" style="background-color: #e2a2ff;
    background-image: linear-gradient(180deg,#b788d0 70%,#f9b269c7 100%);">


    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#"style="margin-top:50px;"onclick="backindex()">
      <div class="sidebar-brand-icon">
        <i><img src="img/icon.png" style="width:200px;"></i>
      </div>
    </a>

 <li class="nav-item" style="margin-top:50px;">
   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
     <i class="fas fa-fw fa-cog"></i>
     <span class="textsize" style="font-size:20px;">เมนู</span>
   </a>
   <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
     <div class="bg-white py-2 collapse-inner rounded">

     <?php include('check_menutool.php');?>
     </div>
   </div>
 </li>


 <li class="nav-item">
   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
     <i class="fas fa-fw fa-table"></i>
     <span style="font-size:20px;">รายงาน</span>
   </a>
   <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
     <div class="bg-white py-2 collapse-inner rounded">
      
     <?php include('check_menudisplay.php');?>
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
 <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow" style="background-color: #ebc1f7;">
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
 <div class="container" style="margin-left:600px;">
<div class="row">
<div class="col-sm-6 card shadow">
<h1 class=""for="text" style="margin-left:80px;" >ข้อมูลการจองห้องประชุม</h1>
</div>
</div>
</div>
<div class="card shadow container-sm mt-4">
		<?php include('checkdisplaymeeting.php')?>

</div>

</body>
</html>