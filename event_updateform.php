
<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
 $conn=$DBconnect;
 $id_event = $_GET['id_event'];
 $sql = "SELECT * FROM `event_tb`,room_tb WHERE event_tb.id_event = '$id_event' and event_tb.room_id = room_tb.room_id";
 $result_event = mysqli_query($conn,$sql);
 $row_event=$result_event->fetch_assoc();

 $sql2 = "SELECT * FROM room_tb WHERE username = '505972' ";
 $result = mysqli_query($conn,$sql2);
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


        <script>
 function updatecalendar(){

    var event = document.getElementById("event").value;
    var startdate = document.getElementById("startdate").value;
    var id_event = document.getElementById("id_event").value;
    // var end = document.getElementById("endtime").value;
    var enddate = document.getElementById("enddate").value;
    var time_period = document.getElementById("time_period").value;
    var room_id = document.getElementById("room_id").value;
    console.log(startdate)
    console.log(event)
    console.log(id_event)
    // console.log(end)
    console.log(enddate)
    console.log(time_period)
    console.log(room_id)



    $.ajax({
        type: "POST",
        url: "update_event.php",
        data: { "id_event":id_event,"startdate": startdate, "event": event,"enddate": enddate,"time_period": time_period, "room_id": room_id },
        success: function(data) {
            alert('wow' + data);
        }
    });


        }
        
        
        </script>
    <title>Document</title>
</head>
<body>
<input id="level" value="<?php echo $_SESSION['level'];  ?>" hidden>
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion fixed-left"   id="accordionSidebar">


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

 

   




       <div>
               <div class="card shadow container-md">    
                        <form >
                        <input id="id_event" value="<?=$row_event['id_event'];?>" hidden="true"/>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                        <div class="content">
                                            <h1>จองห้องประชุม</h1>
                                            <div class="form-group">
                                                <label>ชื่อการประชุม</label>
                                                <div>
                                                    <input class="form-control" type="text" id="event" value="<?=$row_event['name_event'];?>"/>
                                                </div>
                                                <label>ห้องประชุม</label>
                                                <div>
                                                    <select class="form-control" name="room_id" id="room_id" >
                      <option value="<?=$row_event['room_id'];?>"><?=$row_event['room_name'];?></option>
                       <?php while($row = mysqli_fetch_array($result)){ 
                           echo '<option value="'.$row['room_id'].'">'.$row['room_name'].'</option>'; 
                       } ?> 
                   </select>
                                                </div>
                                                <label>วันที่จอง</label>
                                                <div class="input-group date">
                                                    <input class="form-control" placeholder="yyyy-MM-dd" id="startdate" type="date" value="<?=$row_event['start'];?>" /><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></span>
                                                </div>

                                                <label>ถึงวันที่</label>
                                                <div class="input-group date">
                                                    <input class="form-control" placeholder="yyyy-MM-dd" id="enddate" type="date" value="<?=$row_event['end'];?>"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></span>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                         
                                                <label>เวลาเริ่ม</label>
                                                <div class="input-group date">
                                                    <input id="time_period" type="time" class="form-control" value="<?=$row_event['time_start'];?>">
                                                    <label>ถึงเวลา</label>
                                                    <input id="time_period" type="time" class="form-control" value="<?=$row_event['time_end'];?>">
                                
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary" onclick="updatecalendar()">submit</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
               
                </div>
         
        
</body>
</html>