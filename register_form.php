<?php

date_default_timezone_set("Asia/Bangkok");
 require('configDB.php');
$conn=$DBconnect;

 $sql2 = "SELECT * FROM `department`";

  $result = mysqli_query($conn,$sql2);


?>

<!DOCTYPE html>
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
        
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>
        <!-- <script src="./register_script.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


      <script>

function register() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var name = document.getElementById("name").value;
    var lastname = document.getElementById("lastname").value;
    var Department = document.getElementById("Department").value;
    console.log(username);
    console.log(password);
    console.log(name);
    console.log(lastname);
    console.log(Department);
    $.ajax({
        type: "POST",
        url: "register.php",
        data: { "username": username, "password": password, "name": name, "lastname": lastname, "Department": Department },
        success: function(data) {
            // alert('wow' + data);
            Swal.fire(
                    'Good job!',
                    'สมัครสมาชิกเสร็จสิ้น!',
                    'success')
                    setTimeout(function(){
        location.reload();
          },3000);  
        }
    });
}
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
}}

function selectposition(){

var Department =document.getElementById("Department").value;
console.log(Department);
$.ajax({

  type: 'POST',
 data: {"Department":Department},
  url: 'select_position.php',
  success: function(data) {
   //alert("data : ",data);
   $('#position').html(data);     
   //$('#results').html(data);
                          }

});


}

function selectpositiondetail(){
var position = document.getElementById("position").value;
console.log(position);
$.ajax({
  type: 'POST',
 data: {"position":position},
  url: 'select_position_detail.php',
  success: function(data) {
   //alert("data : ",data);
   $('#position_detail').html(data);     
   //$('#results').html(data);
  }




});



}
      </script>
        <style>
body {
background:#f5f5f5;
  margin: 40px 10px;
  padding: 0;
  font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  font-size: 14px;
  width:100%;
}

#calendar {
  max-width: 900px;
  margin: 0 auto;
}


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

    <title>register</title>
</head>
<body>
<div class="topnav">
  <a class="active" href="index.php" style="margin-left:20px;">หน้าหลัก</a>
  
</div>
<div class="neumorphic"style="margin-top:1%;margin-left:35%;width:400px;height:100px;z-index:-1;">
<label style="margin-left:35%;margin-top:10%;font-size:20px;">สมัครสมาชิก</label>
</div>
    <div class="container">
        <form>
            <div  class="neumorphic"style="margin-top:4%;width:1000px;height:500px;z-index:-1;border-style:solid;">
        <div class="row">
     
<label style="margin-left:10%;margin-top:10%;">ชื่อผู้ใช้:</label> <input class="form-control" type="text" id="username" onchange="checkusernme()" style="margin-left:3%;width:200px;margin-top:10%;">
<label style="margin-left:6%;margin-top:10%;">รหัสผ่าน:</label> <input class="form-control" type="password" id="password" onchange="checkpassword()" style="margin-left:3%;width:200px;margin-top:10%;"> 

  
</div>

<div class="row">
<label style="margin-left:10%;margin-top:4%;">ชื่อ:</label> <input class="form-control" type="text" id="name" style="margin-left:5%;width:200px;margin-top:4%;">
<label style="margin-left:8%;margin-top:4%;">นามสกุล:</label> <input class="form-control" type="text" id="lastname" style="margin-left:1%;width:200px;margin-top:4%;">
 
</div>


<div class="row">
<label style="margin-left:10%;margin-top:4%;">แผนก:</label>     
<select  class="form-control" name="Department" id="Department" style="margin-left:3%;width:200px;margin-top:4%;" onchange="selectposition()">
                      <option value="--เลือกห้องประชุม--">--แผนก--</option>
                       <?php while($row = mysqli_fetch_array($result)){ 
                           echo '<option value="'.$row['id_department'].'">'.$row['name_department'].'</option>'; 
                       } ?> 
                   </select> 
                   <label style="margin-left:10%;margin-top:4%;">ฝ่าย:</label>    
                   <select  class="form-control" name="position" id="position" style="margin-left:2%;width:300px;margin-top:4%;" onchange="selectpositiondetail()">
                   
                   </select>   
                   
                   
                 

</div>
<div class="row"> 
<label style="margin-left:10%;margin-top:4%;">ตำแหน่ง:</label>    
                   <select  class="form-control" name="position_detail" id="position_detail" style="margin-left:2%;width:200px;margin-top:4%;" onchange="selectpositiondetail()">
                   
                   </select> 

                   <button style="margin-top:4%;margin-left:5%;width:100px;height:50px;" type="button" class="btn btn-primary" onclick="register()">submit</button> 
</div>

</div>
</form>    
</div>

</body>
</html>