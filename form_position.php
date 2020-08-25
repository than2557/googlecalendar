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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
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
        
<script src='https://cdn.datatables.net/plug-ins/1.10.21/i18n/Thai.json'></script>
<link rel="stylesheet" type="text/css" href="datatables.css"/>
 
<script type="text/javascript" src="datatables.js"></script>
    <title>Document</title>
</head>
<script>

function insertposition() {
var  id_department = document.getElementById("id_department").value;
var  position_name = document.getElementById("position_name").value;
console.log(id_department);
console.log(position_name);
$.ajax({
type:"POST",
url:"insert_position.php",
data:{"id_department":id_department,"position_name":position_name},
success: function(data) {
      
alert(data);

}
});
}
    </script>
<body>



<label>แผนก</label>
                <select name="id_department" id="id_department">
                      <option value="--เลือกห้องประชุม--">--แผนก--</option>
                       <?php while($row = mysqli_fetch_array($result)){ 
                           echo '<option value="'.$row['id_department'].'">'.$row['name_department'].'</option>'; 
                       } ?> 
                   </select>
    <label>ฝ่าย</label>
    <input name="position_name" id="position_name">
<button onclick="insertposition()">submit</button>

   
</body>
</html>