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
     

       
        <link rel="icon" type="img/png" href="iconpea.png"/>
        <link rel="stylesheet" href="css/index.css">
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>
       
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


      <script>

function register() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var name = document.getElementById("name").value;
    var lastname = document.getElementById("lastname").value;
    var Department = document.getElementById("Department").value;
    var position =document.getElementById("position").value;
    var position_detail =document.getElementById("position_detail").value;

    console.log(username);
    console.log(password);
    console.log(name);
    console.log(lastname);
    console.log(Department);
    console.log(position);
    console.log(position_detail);
    $.ajax({
        type: "POST",
        url: "register.php",
        data: { "username": username, "password": password, "name": name, "lastname": lastname, "Department": Department,"position":position,"position_detail":position_detail },
        success: function(data) {
       
            Swal.fire(
                    'Good job!',
                    'สมัครสมาชิกเสร็จสิ้น!',
                    'success')
                    setTimeout(function(){
        location.reload();
          },3000); 
          close('register_form.php');
          open('index.php');
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
  

    <title>register</title>
</head>
<body>

<div class="card mar">
     <div class="text-center head">
   <h1 class="text-center mx-auto" style="margin-top:80px;">สมัครสมาชิก<h1>
</div>
    <div class="bg-div">

<div class="img-mar">
       
   <div>   
   <form>
            <div  class="container-md"style="margin-top:50px;margin-left:500px;">
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


</body>
</html>