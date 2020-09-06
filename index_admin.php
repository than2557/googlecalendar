<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
$conn = $DBconnect;
//  $room_id = isset($_POST['room']) ? $_POST['room'] : "";
// echo $_POST['room'];
$username = $_SESSION['username'];
$sql = "SELECT * FROM `event_tb` WHERE `room_id`";
$result_event = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM room_tb WHERE `username`";
//ตอนนี้ผม login เป็นไอดีพี่ตาวครับ
//  $_SESSION['userName'] 
$result_room = mysqli_query($conn, $sql2);
$result = mysqli_query($conn, $sql2);


?>
<html lang="en">

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



  <link rel="icon" type="img/png" href="iconpea.png" />



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="js-use/sb-admin-2.min.js"></script>

  <script src='https://cdn.datatables.net/plug-ins/1.10.21/i18n/Thai.json'></script>

  <link rel="stylesheet" type="text/css" href="datatables.css" />
  <script type="text/javascript" src="datatables.js"></script>

  <script>
 var dd = moment.locale('th');
    var id_room = '';
    var time_period = '';
    var date_today = new Date();
    var dd = String(date_today.getDate()).padStart(2, '0');
    var mm = String(date_today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = date_today.getFullYear();
    date_today = yyyy + '-' + mm + '-' + dd;


    function sentcalendar() {

      var event = document.getElementById("event").value;
      var date = document.getElementById("startdate").value;
      var enddate = document.getElementById("enddate").value;
      // var time_period = document.getElementById("time_period").value;
      var room_id = document.getElementById("room_select").value;
      // var visitor = document.getElementById("visitor").value;
      var time_start = document.getElementById("time_start").value;
      var time_end = document.getElementById("time_end").value;

      console.log(date)
      console.log(event)
      // console.log(visitor)
      console.log(enddate)
      console.log(time_period)
      console.log(room_id)
      console.log(time_start)
      console.log(time_end)
      $.ajax({
        type: "POST",
        url: "quickstart.php",
        data: {
          "date": date,
          "event": event,
          "enddate": enddate,
          "time_period": time_period,
          "room_id": room_id,
          "time_start": time_start,
          "time_end": time_end
        },
        success: function(data) {
          // alert('wow' + data);
          Swal.fire(
            'Good job!',
            'การเพิ่มข้อมูลเสร็จสิ้น!',
            'success')
          // setTimeout(function(){
          //       location.reload();
          //         },3000); 
        }
      });
    }

    function fixdata() {
      var data_id_event = document.getElementById("tp").value;
      console.log(data_id_event);
      $.ajax({
        type: "POST",
        url: "change_status.php",
        data: {
          id_event: data_id_event
        },
        success: function(data) {
          // alert('wow' + data);
          Swal.fire(
            'ปิดการประชุม!',
          )
          // location.reload();
        }

      });

    }

    function selectroom() {
      id_room = document.getElementById("select_room").value;

      $.ajax({
        type: 'POST',
        data: {
          room: id_room
        },
        url: 'select_room.php',
        success: function(data) {
          // console.log(data);
          var get = JSON.parse(data);
          console.log(get);
          var calendarEl = document.getElementById('calendar');
          calendarEl.innerHTML = '';
          var calendar = new FullCalendar.Calendar(calendarEl, {
            height: 700,
            themeSystem: 'bootstrap',
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay'

            },
            initialDate: date_today,
            locale: 'local',

            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            editable: true,
            eventLimit: true,

            timezone: 'UTC',
            //allow "more" link when too many events
            events: get,
            eventColor: '#275AF9',
            eventTextColor: '#FBFAFC',
            fontsize: '30px',
            ///fuction popup
            select: function(info) {

              var TT = document.getElementById("tp").value;
              var start = info.startStr;

              document.getElementById("startdate").value = start;
              var check = info.startStr;
              var today = new Date();
              var dd = String(today.getDate()).padStart(2, '0');
              var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
              var yyyy = today.getFullYear();
              today = yyyy + '-' + mm + '-' + dd;
              // alert('select'+check);

              if (check < today) {
                Swal.fire({
                  title: 'ไม่สามารถเพิ่มการประชุมได้',
                  icon: 'warning',
                  confirmButtonColor: '#3085d6',
                })

              } else {

                var Eventform = $("#basicModal").modal();
              }

            },
            eventClick: function(info) {
              var Eventpopup = $("#datainfo").modal();
              console.log(info.event.extendedProps.room_name);
              document.getElementById("room_modal").innerHTML = info.event.extendedProps.room_name;
              document.getElementById("title").innerHTML = info.event.title;
              document.getElementById("event_start").innerHTML = moment(info.event.start).add(543, 'year').format('MMMM Do YYYY, h:mm:ss a');
              document.getElementById("event_end").innerHTML =  moment(info.event.end).add(543, 'year').format('MMMM Do YYYY, h:mm:ss a');

              var tp = info.event.extendedProps.idevent;
              document.getElementById("tp").value = tp;

            }
          });
          calendar.destroy();
          calendar.render();


        },
        error: function(jqXHR, text, error) {
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
        type: "POST",
        url: "select_detailroom.php",
        data: {
          "room_id": id_room
        },
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
        type: "POST",
        url: "select_room2.php",
        data: {
          "room_id": id_room
        },
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

    $(function() {
      var dtToday = new Date();

      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if (month < 10)
        month = '0' + month.toString();
      if (day < 10)
        day = '0' + day.toString();

      var maxDate = year + '-' + month + '-' + day;

      $('#startdate').attr('min', maxDate);
      $('#enddate').attr('min', maxDate);
      $('#startdate2').attr('min', maxDate);

    });





    $(document).ready(function() {
      var room_id = document.getElementById("room").value;
      console.log(room_id);
      $.ajax({
        type: 'POST',
        url: 'data_event.php',
        data: {
          "room_id": room_id
        },
        success: function(data) {
          var getdata = JSON.parse(data);
          console.log(getdata);



          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap',
            height: 700,
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay'

            },
            initialDate: date_today,
            locale: 'th',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: getdata
          });

          calendar.render();



        }

      });
    });

    function checktime() {
      var date = document.getElementById("startdate").value;
      var enddate = document.getElementById("enddate").value;
      var time_start = document.getElementById("time_start").value;
      var time_end = document.getElementById("time_end").value;
      var room_id = document.getElementById("room_select").value;
      // console.log("data before"+date);
      // console.log("enddate before"+enddate);
      console.log("time_start before" + time_start);
      // console.log("time_end before"+time_end);
      // console.log("room_id before"+room_id);
      $.ajax({
        type: 'POST',
        url: 'checktime.php',
        data: {
          startdate: date,
          enddate: enddate,
          time_start: time_start,
          time_end: time_end,
          room_id: room_id
        },
        success: function(data) {
          var dataevent = JSON.parse(data);

          if(dataevent && dataevent.length) {
            console.log("testcondition");
            Swal.fire({
              icon: 'error',
              title: 'ไม่สามารถเลือกเวลานี้ได้',
            })
            document.getElementById("time_start").value = '';
          }
        }

      });

    }
  </script>

  <title>จองห้องประชุม</title>

</head>

<body>

  <div class="modal" id="datainfo" tabindex="-1">

    <div class="modal-header" style="width:500px;background-color:#FAF1F1;margin-top:10%;margin-left:35%;">
      <h4 class="modal-title" id="myModalLabel">การประชุม</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" style="width:500px;background-color:#FAF1F1;margin-left:35%;">

      <label for="room_modal">ห้องประชุม:</label><label for="room_modal" id="room_modal">ห้องประชุม:</label><br>
      <label for="title">หัวข้อการประชุม:</label><label for="title" id="title">หัวข้อการประชุม:</label><br>

      <label for="start">เวลาเริ่มประชุม:</label> <label for="start" id="event_start">เวลาเริ่มประชุม:</label><br>

      <label for="end">เวลาสิ้นสุด:</label><label for="end" id="event_end">เวลาสิ้นสุด:</label><br>
      <input type="text" id="tp" value="" hidden>

      <button type="button" class="btn btn-primary" onclick="fixdata()" data-dismiss="modal">ปิดการประชุม</button>


    </div>
  </div>



  <!-- Page Wrapper -->
  <input id="room" value="1" hidden>

  <div id="wrapper">
    <!-- bg-gradient-success -->
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion fixed-left" id="accordionSidebar">


      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#" style="margin-top:50px;">
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

            <?php include('check_menutool.php'); ?>
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

            <?php include('check_menudisplay.php'); ?>
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name'];  ?></span>

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

        <!-- End of Topbar -->





        <div class="d-flex p-3 col-sm" style="margin-left: 300px;">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header  d-flex flex-row align-items-center justify-content-between">

              <h6 class="m-0 font-weight-bold">ข้อมูลการจองห้องประชุม:</h6>
              <select class="form-control" name="select_room" style="width: 200px;" id="select_room" onchange="selectroom()">
                <option value="">--เลือกห้องประชุม--</option>
                <?php while ($row = mysqli_fetch_array($result)) {
                  echo '<option value="' . $row['room_id'] . '">' . $row['room_name'] . '</option>';
                } ?>
              </select>
            </div>

            <div class="card" style="width:1200px;">

              <div>


                <div>
                  <label for="text">ที่ตั้งห้องประชุม:</label>
                  <label for="room_location" id="room_location"></label>
                  <label for="text">จำนวนคนที่รองรับ:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                  <label for="room_size" id="room_size"></label>&nbsp;&nbsp;&nbsp;&nbsp;คน
                </div>

              </div>

              <div id='calendar'></div>

            </div>
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
                            <label>หัวข้อการประชุม</label>
                            <div>
                              <input class="form-control" type="text" id="event" />


                            </div>
                            <label>ห้องประชุม</label>
                            <div>
                              <select class="form-control" name="room_select" id="room_select">
                                <option value="--เลือกห้องประชุม--">--เลือกห้องประชุม--</option>

                              </select>
                            </div>
                            <label>วันที่จอง</label>
                            <div class="input-group date">
                              <input class="form-control" placeholder="yyyy-MM-dd" id="startdate" type="date" />
                            </div>

                            <label>ถึงวันที่</label>
                            <div class="input-group date">
                              <input class="form-control" placeholder="yyyy-MM-dd" id="enddate" type="date" />
                            </div>
                          </div>

                          <div class="col">
                            <label>ช่วงเวลา:</label>
                            <input type="time" format="hh:mm:ss" step="1" id="time_start" class="form-control" onchange="checktime()">
                          </div>
                          <div class="col">
                            <label>ถึง:</label>
                            <input type="time" format="hh:mm:ss" id="time_end" step="1" class="form-control" onchange="checktime()">
                          </div>


                          <button type="button" class="btn btn-primary" onclick="sentcalendar()">submit</button>
                        </div>
                      </div>

                    </div>

                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>


</body>

</html>