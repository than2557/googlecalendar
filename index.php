<?php 
date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;

        //  $room_id = isset($_POST['room']) ? $_POST['room'] : "";
        // echo $_POST['room'];
       
        //  $sql = "SELECT * FROM `event_tb` WHERE `room_id`";
        //  $result_event = mysqli_query($conn,$sql);

        //  $sql2 = "SELECT * FROM room_tb";
        //  $result = mysqli_query($conn,$sql2);
        $sql2 = "SELECT * FROM `department`";

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
        <link rel="stylesheet" href="css/index.css">
        <!-- partial -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>
        <script src="/index.js"/>
       
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <script>





var id_room = '';
var time_period='';  
var date_today = new Date();
var dd = String(date_today.getDate()).padStart(2, '0');
var mm = String(date_today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = date_today.getFullYear();
date_today = yyyy + '-' + mm + '-' + dd;

function selectroom(){


  var room = document.getElementById("select_room").value;
  console.log(room);
                     $.ajax({
                          type: 'POST',
                          data: {room: room},
                          url: 'select_room.php',
                          success: function(data) {

                            // console.log(data);
                            var get = JSON.parse(data);
                            // console.log(get[0].room_location);
                            // console.log(get);
                            // document.getElementById("room_location").innerHTML = get[0].room_location;       
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
  
    
select:function(){
//    var Eventform = $("#basicModal").modal(); 
//       var datestart = document.getElementsByClassName("fc-day");
 },
    editable: true,
    eventLimit: true, //allow "more" link when too many events
    events:get,
    eventColor: '#275AF9',
    eventTextColor:'#FBFAFC',
    fontsize:'30px',
 eventClick: function(info) {
   var Eventpopup = $("#datainfo").modal();
      document.getElementById("title").innerHTML = info.event.title; 
      document.getElementById("event_start").innerHTML = info.event.start; 
      document.getElementById("event_end").innerHTML = info.event.end; 
   
  }



    });
    calendar.destroy();
    calendar.render();
                          
//                             Swal.fire({
//   position: 'top-end',
//   icon: 'success',
//   title: 'Your work has been saved',
//   showConfirmButton: false,
//   timer: 1500
// });
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
        data: {"room_id": room },
        success: function(data) {
            var dataroom = JSON.parse(data);
            // console.log(dataroom);
            console.log(dataroom[0].room_location);
            console.log(dataroom[0].room_size);
            console.log(dataroom[0].room_name);

              document.getElementById("room_location").innerHTML = dataroom[0].room_location;
              document.getElementById("room_size").innerHTML = dataroom[0].room_size;  
        }

    });



}



</script>

    <title>จองห้องประชุม</title>



</style>
</head>
<body>




            <div class="card mar">
     <div class="text-center head">
   <h1 class="text-center">ยินดีตอนรับเข้าสู่ระบบการจองห้องประชุม<h1>
</div>
    <div class="bg-div">

<div class="img-mar">
        <img src="img/icon.png" class="rounded mx-auto d-block icon martop" alt="Responsive image">
   <div>   
        <form class="form-inline">
   

          <div class="container mar">
            <div class="row justify-content-md-center">
              <div class="col col-lg-2">
                <a class="btn-4 center"  href=""  style="border-radius: 5px;"  data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">เข้าสู่ระบบ</a>
               
            
              </div>
              <div class="col col-lg-2">
                <a class="btn-6 center"  href="" style="border-radius: 5px;" data-toggle="modal"  data-target="#registermodal" data-whatever="@fat">สมัครสมาชิก</a>
              </div>
          
            </div>
     
     
  
   </form>
    </div>
    </div>

    <div class="modal fade centered" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">เข้าสู่ระบบ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="login.php">
              <div class="form-group">
                <label for="idem" class="col-form-label">ชื่อผู่ใช้:</label>
                <input type="text" class="form-control" id="idem" name="idem">
              </div>
              <div class="form-group">
                <label for="password" class="col-form-label">รหัสผ่าน:</label>
                <input class="form-control" type="password" id="password" name="password"></input>
              </div>
              <button type="submit" class="btn btn-primary" >เข้าสู่ระบบ</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </form>
          </div>
          <div class="modal-footer">
         
           
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade centered" id="registermodal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">สมัครสมาชิก</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">ชื่อผู่ใช้:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">รหัสผ่าน:</label>
                <input class="form-control" type="password" id="message-text"></input>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            <button type="button" class="btn btn-primary">เข้าสู่ระบบ</button>
          </div>
        </div>
      </div>
    </div>


           
        
</body>

</html>
