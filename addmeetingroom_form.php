<!DOCTYPE html>
<html lang="en">
<head>
<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
 $conn=$DBconnect;

//  $id_event = $_GET['id_event'];
//  $sql = "SELECT * FROM `event_tb`,room_tb WHERE event_tb.id_event = '$id_event' and event_tb.room_id = room_tb.room_id";
//  $result_event = mysqli_query($conn,$sql);
//  $row_event=$result_event->fetch_assoc();

//  $sql2 = "SELECT * FROM room_tb WHERE username = '505972' ";
//  $result = mysqli_query($conn,$sql2);
?>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <script>
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
         <style>
       body {
       background: linear-gradient(135deg,  #ffb3ff 30%, #e580ff 50%);
          }
    </style>
    <title>จองห้องประชุม</title>

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
    <title>Document</title>
</head>
<body>

<div class="topnav">
  <a class="active" href="index_admin.php" style="margin-left:20px;">หน้าแรก</a>
  <a href="displaydata.php" style="margin-left:20px;">ข้อมูลการประชุม</a>
  <a href="logout.php" style="margin-left:20px;">ออกจากระบบ</a>
  <a style="margin-left:1%;color: white;">ยินดีต้อนรับ:&nbsp;<?php ;?> Username:&nbsp;<?php echo $_SESSION['username'];?><a>
  <a style="margin-left:30%;color: white;">จองห้องประชุม<a>
    <a href="display_chart.php">สถิติการจอง</a>
    <a href="addmeetingroom_form.php">เพิ่มห้องประชุม</a>
</div>
<div>
            <div>
                <div>
                    <div>         
                    </div>
                    <div class="neumorphic" style="width:1000px;margin-left:25%;margin-top:5%;">    
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
                                                <label>ผู้ดูแลห้อง</label>
                                                <div>
                                                <input class="form-control" type="text" id="room_owner_th" style="width:500px;" />
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

                                               

                                            <button  style="margin-left:10%;margin-top:10%;"  type="button" class="btn btn-primary" onclick="insertmeetingroom()">submit</button>
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