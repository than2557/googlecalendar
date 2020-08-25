<!DOCTYPE html>
<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;
        //  $sql = "SELECT room_tb.room_id,room_tb.room_name, event_tb.id_event FROM room_tb INNER JOIN event_tb ON room_tb.room_id = event_tb.room_id";
        //  $result_event = mysqli_query($conn,$sql);
        

            $query = "SELECT room_tb.room_name,EXTRACT(YEAR FROM event_tb.start),event_tb.room_id,event_tb.id_event,event_tb.name_event,COUNT(*) as number FROM event_tb,room_tb WHERE event_tb.room_id=room_tb.room_id GROUP BY room_id";
            $result_room = mysqli_query($conn,$query);
            $result_event = mysqli_query($conn,$query);
?>
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
$(document).ready( function () {
    $('#myTable').DataTable({  
      
      "columnDefs": [{ "width": "5%", "targets": 0 }],
  "language": {
              "sProcessing": "กำลังดำเนินการ...",
              "sLengthMenu": "แสดง_MENU_ แถว",
              "sZeroRecords": "ไม่พบข้อมูล",
              "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
              "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
              "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
              "sInfoPostFix": "",
              "sSearch": "ค้นหา:",
              "sUrl": "",
              "oPaginate": {
                            "sFirst": "เริ่มต้น",
                            "sPrevious": "ก่อนหน้า",
                            "sNext": "ถัดไป",
                            "sLast": "สุดท้าย"
              }
     }
     
     
     });
    
} );
function selectyear(){
 var select_year = document.getElementById("select_year").value;

 console.log(select_year);
 $.ajax({
    type:"POST",
    url:"select_year.php",
    data: {"select_year": select_year},
        success: function(data) {
      // console.log("funtion Success")
            $('#data_chart').html(data);     

        }




});
}
</script>
<style>
body {
  background:#bdbdbd;
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

</style>
<body>
<div class="topnav">
  <a class="active" href="index_admin.php" style="margin-left:20px;">หน้าหลัก</a>
  <a href="displaydata.php" style="margin-left:20px;">ข้อมูลการประชุม</a>
  <a href="logout.php" style="margin-left:20px;">ออกจากระบบ</a>
  <a style="margin-left:60%;color: white;">จำนวนการจองห้องประชุม<a>
</div>

<div  class="neumorphic" style="width:700px;height:100px;background-color:#ffff;margin-top:5%;margin-left:25%;">

<label for="" style="font-size: 200%;margin-top:4%;margin-left:30%;">จำนวนการใช้ห้องประชุม</label>
</div>
    <div class="neumorphic" style="width:500px;margin-left:10%;margin-top:1%;height:100px;">
    <select  style="width:300px;margin-left:20%;margin-top:3%;"  class="form-control" name="select_year" id="select_year" onchange="selectyear()">
                      <option value="--เลือกปี--">--เลือกปี--</option>
                      <option value="2020">2020</option>
                      <option value="2019">2019</option>
                      <option value="2018">2018</option>
                      <option value="2017">2017</option>
                   </select>
                   </div>  
    <div style="width:900px;">  
                <div class="neumorphic"  id="piechart" style="width:500px;height:400px;margin-top:3%;margin-left:20%;border-color:#000000;border-style: solid;"></div>  
         
           </div>

    


           <div class="neumorphic" style="width:700px;margin-left:45%;margin-top:-25%;">
		<table class="table table-bordered" id="myTable" style="background-color:#ffff;width:695px;height:400px ;margin-left:-0%;margin-top:-50%;">
  <thead>
    <tr>
     
      <th>ชื่อการประชุม</th>
      <th>ห้องประชุม</th>
      <th>จำนวนการจอง/ครั้ง</th>
  
    
    </tr>
  </thead>
  <tbody id="data_chart">
     <?php
  while($row_datacount = mysqli_fetch_array($result_event)){
    ?>
    <tr>
      <td style="text-align:center;"><?=$row_datacount['room_id'];?></td>
      <td><?=$row_datacount['room_name'];?></td>
      <td style="text-align:right;"><?=$row_datacount['number'];?></td>
    </tr>

    <?php }?>  
  </tbody>
</table>
</div> 

<script>
   google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['ห้องประชุม', 'จำนวนการใช่งาน'],<?php     
                          
              $room_name = array();
              $i = 0;
                          while($row = mysqli_fetch_array($result_room))  
                          {     
                              //  $array_name= array('room_name'=>$row['room_name'],
                              // 'number'=>$row['number']);
                         //      $room = $row['room_name'];
                         //     echo $room ;
                               
                               echo "['".$row['room_id']."',".$row['number']."],";  
                              // $room_name[$i] =$array_name;
                              // $i++;
                          }
                         //  echo json_encode($room_name,JSON_UNESCAPED_SLASHES);      
              ?>    
                        
                     ]);  
                var options = {  
                      title: 'จำนวนการใช้งานห้องประชุม',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           } 
            
</script>
<!-- <div class="tenor-gif-embed" data-postid="7939264" data-share-method="host" data-width="100%" data-aspect-ratio="1.0309278350515463"><a href="https://tenor.com/view/pepe-pepe-the-frog-sad-pepe-crying-tears-gif-7939264">Pepe GIF</a> from <a href="https://tenor.com/search/pepe-gifs">Pepe GIFs</a></div><script type="text/javascript" async src="https://tenor.com/embed.js"></script> -->

 
  
</body>
</html>