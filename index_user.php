<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;

        //  $room_id = isset($_POST['room']) ? $_POST['room'] : "";
        // echo $_POST['room'];
       
        $sql = "SELECT * FROM `event_tb` WHERE `room_id`";
        $result_event = mysqli_query($conn,$sql);

        $sql2 = "SELECT * FROM room_tb";
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
       background: linear-gradient(135deg,  #ffb3ff 50%, #e580ff 50%);
          }
    </style>
        <script>
var id_room = '';
var time_period='';  
var date_today = new Date();
var dd = String(date_today.getDate()).padStart(2, '0');
var mm = String(date_today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = date_today.getFullYear();
date_today = yyyy + '-' + mm + '-' + dd;

function sentcalendar(){

    var event = document.getElementById("event").value;
    var date = document.getElementById("startdate").value;
    var enddate = document.getElementById("enddate").value;
    var time_period = document.getElementById("time_period").value;
    var room_id = document.getElementById("room_select").value;
    var visitor = document.getElementById("visitor").value;
    
    console.log(date)
    console.log(event)
    console.log(visitor)
    console.log(enddate)
    console.log(time_period)
    console.log(room_id)
    $.ajax({
        type: "POST",
        url: "quickstart.php",
        data: {"date": date, "event": event,"enddate": enddate, "time_period": time_period, "room_id": room_id,"visitor":visitor},
        success:function(data) {
            // alert('wow' + data);
            Swal.fire(
  'Good job!',
  'การเพิ่มข้อมูลเสร็จสิ้น!',
  'success')
// location.reload();
        }
    });
}

function fixdata(){
var data_id_event =  document.getElementById("tp").value;
console.log(data_id_event);
$.ajax({
type:"POST",
url:"change_status.php",
data:{id_event:data_id_event},
success:function(data) {
            // alert('wow' + data);
            Swal.fire(
  'ปิดการประชุม!',
  )
// location.reload();
        }

});

}

function selectroom(){
  id_room = document.getElementById("select_room").value;
  
                     $.ajax({
                          type: 'POST',
                          data: {room: id_room},
                          url: 'select_room.php',
                          success: function(data) {
                            // console.log(data);
                            var get = JSON.parse(data);
                            console.log(get);
     var calendarEl = document.getElementById('calendar');
     calendarEl.innerHTML= '';
     var calendar = new FullCalendar.Calendar(calendarEl, {
    height: 550,
    plugins: [ 'interaction', 'dayGrid', 'timeGrid' ,'bootstrap' ],
    themeSystem: 'bootstrap',
    header: {
      left: 'prev,next today',
      center: 'title',
      right:'dayGridMonth,timeGridWeek,timeGridDay'
    },
    defaultDate: date_today,
    lang: 'TH',
    navLinks: true, // can click day/week names to navigate views
    selectable: true,
    selectMirror: true,
    ///fuction popup
select:function(info){
  // extraParams.
// var tp = info.time_periodStr;
// alert('select'+tp);
var TT = document.getElementById("tp").value;
      console.log(TT);
  var start = info.startStr;
 
  document.getElementById("startdate").value = start;
var check = info.startStr;
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
today = yyyy + '-' + mm + '-' + dd;
// alert('select'+check);

if(check < today)
    {
        Swal.fire({
          title: 'ไม่สามารถเพิ่มการประชุมได้',
              icon: 'warning',
              confirmButtonColor: '#3085d6',
            })
 
    }

    else
    {
      // Its a right date
     
      var Eventform = $("#basicModal").modal(); 
 }
//  if(time_period=="fullday"){
//   Swal.fire({
//           title: 'ไม่สามารถเพิ่มการประชุมได้',
//               icon: 'warning',
//               confirmButtonColor: '#3085d6',
//             })
//  }
//  else{
//   var Eventform = $("#basicModal").modal(); 
//  }
 },
    editable: true,
    eventLimit: true,
    timeZone:'Asia/Bangkok', //allow "more" link when too many events
    events:get,
    eventColor: '#275AF9',
    eventTextColor:'#FBFAFC',
    fontsize:'30px',
 eventClick: function(info) {
   var Eventpopup = $("#datainfo").modal();
      document.getElementById("title").innerHTML = info.event.title; 
      document.getElementById("event_start").innerHTML = info.event.start; 
      document.getElementById("event_end").innerHTML = info.event.end; 
      var tp = info.event.extendedProps.idevent;
      document.getElementById("tp").value = tp ; 
      
  }
    });
    calendar.destroy();
    calendar.render();
                          

},
              error: function(jqXHR, text, error){
              // Displaying if there are any errors
              Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  footer: '<a href>Why do I have this issue?</a>'
});     
          }
                      });
                      $.ajax({
        type:"POST",
        url:"select_detailroom.php",
        data: {"room_id": id_room},
        success: function(data) {
            var dataroom = JSON.parse(data);
            // console.log(dataroom);
            console.log(dataroom[0].room_location);
            console.log(dataroom[0].room_size);
            console.log(dataroom[0].room_name);
            console.log(dataroom[0].room_id);

              document.getElementById("room_location").innerHTML = dataroom[0].room_location;
              document.getElementById("room_size").innerHTML = dataroom[0].room_size;
            // document.getElemetById("room_select").value = room_id;
             

        }
    });
    
    $.ajax({
        type:"POST",
        url:"select_room2.php",
        data: {"room_id": id_room},
        success: function(data) {
      
             $('#room_select').html(data);

        }
    });

}

function myFunction(e) {
    var Eventform = $("#basicModal").modal(); 
}

function clearCoor() {
  document.getElementById("demo").innerHTML = "";
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
});


</script>

    <title>จองห้องประชุม</title>

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
</head>
<body>

<div class="topnav">
  <a class="active" href="#home" style="margin-left:20px;">หน้าหลัก</a>


  <a style="margin-left:1%;color: black;">ยินดีต้อนรับ:&nbsp;<?php  echo $_SESSION['name'];;?> Username:&nbsp;<?php echo $_SESSION['username'];?><a>
  <a href="logout.php" style="margin-left:20px;">ออกจากระบบ</a>
  <a href="Reservemeetingroom.php" style="margin-left:30%;">จองห้องประชุม<a>
    <a href="display_chart.php">สถิติการจอง</a>
    <a href="displaymeeting.php">ข้อมูลการจองห้องประชุม </a>
  
 
</div>



<div class="container">
<div class="neumorphic"style="width:900;background-color:#ffff;margin-left:15%;margin-top:3%">
<label style="margin-left:20%;margin-top:15px;" for="text">ห้องประชุม:</label>
<select  style="width:300px;margin-left:30%;margin-top:-3.5%;"  class="form-control" name="select_room" id="select_room" onchange="selectroom()">
                      <option value="--เลือกห้องประชุม--">--เลือกห้องประชุม--</option>
                       <?php while($row = mysqli_fetch_array($result )){ 
                           echo '<option value="'.$row['room_id'].'">'.$row['room_name'].'</option>'; 
                       } ?> 
                   </select>

                   <div style="margin-left:32%;margin-top:10px;">
            <label for="text">ที่ตั้งห้องประชุม:</label>
            <label for="room_location" id="room_location"></label>
            <label for="text">จำนวนคนที่รองรับ:</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="room_size" id="room_size"></label>&nbsp;&nbsp;&nbsp;&nbsp;คน
            </div>

            </div>
<div style="width:900;margin-top:10px;background-color:#ffff;margin-left:15%;" id='calendar'></div>
<div>


<div class="data_room" id="">

</div>
                   <div class="modal" id="datainfo" tabindex="-1">
                 
                    <div class="modal-header"style="width:500px;background-color:#FAF1F1;margin-top:10%;margin-left:35%;">
       <h4 class="modal-title" id="myModalLabel">การประชุม</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>   
        <div class="modal-body" style="width:500px;background-color:#FAF1F1;margin-left:35%;"> 
                <label for="title">หัวข้อการประชุม:</label><label for="title" id="title">หัวข้อการประชุม:</label><br>
                      
                       <label for="start">เวลาเริ่มประชุม:</label> <label for="start" id="event_start">เวลาเริ่มประชุม:</label><br>

                       <label for="end">เวลาสิ้นสุด:</label><label for="end" id="event_end">เวลาสิ้นสุด:</label><br>
                        <input type="text" id="tp" value="" hidden>
                      
                        <button type="button"  class="btn btn-primary" onclick="fixdata()" data-dismiss="modal">ปิดการประชุม</button>
                        
                   
                    </div>
                    </div>


<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width:1000px;margin-left:-50%;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">จองห้องประชุม</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <div class="modal-body">    
                        <form>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                        <div class="content">
                                            <h1>จองห้องประชุม</h1>
                                            <div class="form-group">
                                                <label>ชื่อการประชุม</label>
                                                <div>
                                                    <input class="form-control" type="text" id="event" />
                                                    <label>ชื่อผู้ติดต่อการประชุม</label>
                                                    <input class="form-control" type="text" name="visitor" id="visitor" />
                                                </div>
                                                <label>ห้องประชุม</label>
                                                <div>
                                                    <select class="form-control" name="room_select" id="room_select">
                      <option value="--เลือกห้องประชุม--">--เลือกห้องประชุม--</option>
                 
                   </select>
                                                </div>
                                                <label>วันที่จอง</label>
                                                <div class="input-group date">
                                                    <input class="form-control" placeholder="yyyy-MM-dd" id="startdate" type="date"/>
                                                </div>

                                                <label>ถึงวันที่</label>
                                                <div class="input-group date">
                                                    <input class="form-control" placeholder="yyyy-MM-dd" id="enddate" type="date"/>
                                                </div>

                                            </div>
                                      
                                                <label>ช่วงเวลา</label>
                                                <div class="input-group date">
                                                    <select id="time_period" class="form-control">
                                <option value="fullday">เต็มวัน</option>
                                <option value="halfdaymoring">ครึ่งวันเช้า</option>
                                <option value="halfdayafter">ครึ่งวันบ่าย</option>
                                </select>
                             
                             
                                            <button type="button" class="btn btn-primary" onclick="sentcalendar()">submit</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div> -->
                </div>
            </div>
            </div>
        
           
        
</body>

</html>
