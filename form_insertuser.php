
<?php
    session_start();
    include_once("configDB.php");
    $conn = $DBconnect;
    date_default_timezone_set("Asia/Bangkok");
    $date_stamp =  date("Y-m-d G:i");
    echo $_SESSION['userName'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css'>
    <title>Document</title>
</head>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<body>
  <?php 
                       $sql = "SELECT * FROM room_tb WHERE room_id";
                       $result = mysqli_query($conn,$sql);
                   ?>
<div class="container">
  <form>
    <div class="row">
      <div class="col-25">
        <label for="fname">username</label>
      </div>
      <div class="col-75">
        <input type="text" id="username" name="username" placeholder="Your username.." onchange="insertuser()">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="Your  name..">
      </div>
    </div>

    
   
  </form>
  <button onclick="saveuser()">submit</button>
</div>






<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://code.angularjs.org/1.3.14/angular-animate.js'></script>

        <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>

        <script>

        function insertuser() {
    // alert("test");
  var username = document.getElementById("username");
  //console.log(id);
  $.ajax({
    url: "selectuserset.php", // test_json_encode.php เรียกข้อมูลจากฐานข้อมูลมาแสดงในรูปแบบ json
    method: "POST",
    async: false,
    dataType: "JSON",
    data: { username: username.value },
    error: function(jqXHR, text, error) {
      Swal.fire({
  icon: 'warning',
  title: 'ไม่พบข้อมูลพนักงาน!!!',
  text: 'กรุณาตรวจสอบข้อมูล!'
})
    }
  })
  .done(function(data) {
    //response = data;
    console.log(data);
   
    $("#name").val(data[2]+'  '+data[3]);
   
  });
}

function saveuser(){
    var username = document.getElementById("username").value;
    var name =  document.getElementById("name").value;
    var room_id = document.getElementById("room_id").value;
    console.log(username)
    console.log(name)
    console.log(room_id)
$.ajax({
    url: "saveuser.php", // test_json_encode.php เรียกข้อมูลจากฐานข้อมูลมาแสดงในรูปแบบ json
    method: "POST",
    async: false,
    dataType: "JSON",
    data: { username: username.value },
    error: function(jqXHR, text, error) {
      Swal.fire({
  icon: 'warning',
  title: 'เพิ่มข้อมูลไม่ได้!!!',
  text: 'กรุณาตรวจสอบข้อมูล!'
})
}
}).done(function(data){
    Swal.fire({
  icon: 'success',
  title: 'เพิ่มข้อมูลได้!!!',
  
});





});


}

</script>
</body>
</html>

