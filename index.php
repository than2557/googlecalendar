<?php 
date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;

      
        $sql2 = "SELECT * FROM `department`";

        $result = mysqli_query($conn,$sql2);

       


      
        ?>
<html lang="en">
<head>
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css'>
     
<!-- 
        <link href='./packages/core/main.css' rel='stylesheet' />
        <link href='./packages/daygrid/main.css' rel='stylesheet' />
        <link href='./packages/timegrid/main.css' rel='stylesheet' />
        <script src='./packages/core/main.js'></script>
        <script src='./packages/interaction/main.js'></script>
        <script src='./packages/daygrid/main.js'></script>
        <script src='./packages/timegrid/main.js'></script> -->
        <link rel="icon" type="img/png" href="iconpea.png"/>
        <link rel="stylesheet" href="css/index.css">
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>
        <!-- <script src="/index.js"/> -->
       
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <title>จองห้องประชุม</title>





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
                <a class="btn-6 center"  href="register_form.php" style="border-radius: 5px;"  data-whatever="@fat">สมัครสมาชิก</a>
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
                <input type="text" class="form-control" id="idem" name="idem" onchange="checktextid()">
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
