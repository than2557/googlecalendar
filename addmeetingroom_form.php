<!DOCTYPE html>
<html lang="en">
<head>
<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
 $conn=$DBconnect;

?>
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
 function insertmeetingroom(){

    var room_name = document.getElementById("room_name").value;
    var room_owner_th = document.getElementById("room_owner_th").value;
    var room_location = document.getElementById("room_location").value;

    var room_type = document.getElementById("room_type").value;
    var room_size = document.getElementById("room_size").value;
 
    console.log(room_name)
    console.log(room_owner_th)
    console.log(room_location)
    console.log(room_type)
    console.log(room_size)
  



    $.ajax({
        type: "POST",
        url: "insert_meetingroom.php",
        data: {"room_name":room_name,"room_owner_th": room_owner_th, "room_location": room_location,"room_type": room_type,"room_size": room_size,},
        success: function(data) {
            alert('wow' + data);
        }
    });
        }
        </script>
   
    <title>จองห้องประชุม</title>
</head>
<body>

<input id="level" value="<?php echo $_SESSION['level'];  ?>" hidden>
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion fixed-left"   id="accordionSidebar" style="background-color: #e2a2ff;
    background-image: linear-gradient(180deg,#b788d0 70%,#f9b269c7 100%);">


<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#"style="margin-top:50px;" onclick="backindex()">
  <div class="sidebar-brand-icon">
    <i><img src="img/icon.png" style="width:200px;"></i>
  </div>

</a>


<li class="nav-item" style="margin-top:50px;">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span class="mb-0" style="font-size:20px;">เมนู</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
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
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
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

 

   




<div>
    <div>
       <div>
         <div>         
            </div>
                 <div class="card shadow" style="width:1000px;margin-left:300px;margin-top:100px;">    
                        <form>
                             <div class="container-fluid" style="margin-left:-10%;">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2" style="margin-left:35%;margin-top:5%">
                                        <div class="content">
                                            <h1>เพิ่มห้องประชุม</h1>
                                            <div class="form-group">
                                                <label>ชื่อห้องประชุม</label>
                                                <div>
                                            <input class="form-control" type="text" id="room_name" style="width:500px;"/>
                                                </div>
                                   
                                                <div>
                                                <input class="form-control" type="text" id="room_owner_th"  value="<?php echo$_SESSION['name'];?>"style="width:500px;" hidden/>
                                                </div>
                                                <label>ที่ตั้งห้องประชุม</label>
                                                <div>
                                                    <input class="form-control"  id="room_location" style="width:500px;"/>
                                                </div>

                                                <label>ชนิดของห้อง</label>
                                                <div>
                                                    <input class="form-control"  id="room_type" type="text" style="width:500px;"/>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label>รองรับคนเท่าไร</label>
                                            
                                                    <input class="form-control" type="text" id="room_size" style="width:500px;"/>

                                               

                                            <button  style="margin-left:10%;margin-top:10%;"  type="button" class="btn btn-primary" onclick="insertmeetingroom()">บันทึก</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                   
                    </div>
                </div>
            </div>
            </div>
        
</body>
</html>