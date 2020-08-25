<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;
        //  $room_id = isset($_POST['room']) ? $_POST['room'] : "";
        // echo $_POST['room'];
       $username = $_SESSION['username'];
         $sql = "SELECT * FROM `event_tb` WHERE `room_id`";
         $result_event = mysqli_query($conn,$sql);

         $sql2 = "SELECT * FROM room_tb WHERE `username` = '$username'";  //ตอนนี้ผม login เป็นไอดีพี่ตาวครับ
        //  $_SESSION['userName'] 
         $result = mysqli_query($conn,$sql2);

        $result_room = mysqli_query($conn,$sql2);


      
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
<script>

function checkusernme(){

var username = document.getElementById("username").value;
console.log(username);
$.ajax({
type:"POST",
url:"checkusername.php",
data:{"username":username},
success: function(data){
 if(data == 1){
  Swal.fire({
  icon: 'error',
  title: 'ชื่อผู้ใช้นี้มีผู้ใช้แล้ว...',

});
document.getElementById("username").value =" ";
 }
 else{

  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'ชื่อผู้ใช้นี้สามรถใช้งานได้',
  showConfirmButton: false,
  timer: 1500
});


 }
}

});
}
function checkpassword(){
var password = document.getElementById("password").value;
console.log(password);
var pass =  /^[A-Za-z]\w{7,14}$/;
if(password.match(pass)){
  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'รหัสสามารถใช้งานได้',
  showConfirmButton: false,
  timer: 1500
});


}
else{

  Swal.fire({
  icon: 'error',
  title: 'รหัสไม่ปลอดภัย...',

});
document.getElementById("password").value ="";
}


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
  background-color: #333;
  margin-top:-40px;
  width:1700px;
  margin-left:-40px;
}

.topnav a {
  float: left;
  color: #f2f2f2;
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
  background-color: #4CAF50;
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
    card {
      position: absolute;
      top: 50vh;
      left: 50vw;
      width: 400px;
      height: 300px;
      max-width: 80vw;
      max-height: 80vh;
      -webkit-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      box-sizing: border-box;
      padding: .5rem;
    /* color:#d9d9d9; 
      color:#aee0ee; */
    }
    .neumorphic{
      --color: hsl(210deg,10%,30%);
      background: #ffffff;
    }

</style>
</head>
<body>
<input id="username" name="username" onchange="checkusernme()">
<input type="password" name="password"  onchange="checkpassword()" id="password">  
</body>

</html>
