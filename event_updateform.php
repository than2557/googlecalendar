
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

        <style>
       body {
       background:#ffffff;
          }
    </style>
    <title>จองห้องประชุม</title>

    <style>

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



<div class="topnav">
<a class="active"  style="margin-left:20px;"><img src="iconpea.png" style="width:40px;height:30px;"></a>
  <a  style="margin-left:20px;">หน้าหลัก</a>
  <a href="displaydata.php" style="margin-left:20px;">ข้อมูลการประชุม</a>
  <a href="logout.php" style="margin-left:20px;">ออกจากระบบ</a>
  <a style="margin-left:1%;color: back;">ยินดีต้อนรับ:&nbsp;<?php echo $_SESSION['name']; ;?> เลขประจำตัวพนักงาน:&nbsp;<?php echo $_SESSION['username'];?><a>
  <a href="Reservemeetingroom.php" style="margin-left:28%;">จองห้องประชุม<a>
    <a href="display_chart.php">สถิติการจอง</a>
    <a href="addmeetingroom_form.php">เพิ่มห้องประชุม</a>
    

</div>
<div>
            <div>
                <div>
                    <div>
                        
                        
 

                    </div>
                    <div style="margin-top:100px;">    
                        <form>
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
                                                <!-- <label>เวลาเริ่ม</label>
                                                <div class="input-group time" id="timepicker">
                                                    <input class="form-control" type="time" placeholder="เวลาเริ่ม" id="start" /><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-clock"></i></span></span>

                                                </div>

                                                <label>เวลาเสร็จสิ้นการประชุม</label>
                                                <div class="input-group time" id="timepicker">
                                                    <input class="form-control" placeholder="HH:MM AM/PM" type="time" id="endtime"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-clock"></i></span></span>

                                                </div> -->
                                                <label>ช่วงเวลา</label>
                                                <div class="input-group date">
                                                    <select id="time_period" class="form-control" value="<?=$row_event['time_period'];?>">
                                <option value="fullday">เต็มวัน</option>
                                <option value="halfdaymoring">ครึ่งวันเช้า</option>
                                <option value="halfdayafter">ครึ่งวันบ่าย</option>
                                </select>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary" onclick="updatecalendar()">submit</button>
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