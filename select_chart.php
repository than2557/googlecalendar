
<?php
// echo "TEST ajax";
date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;

$year = $_POST['select_year'];
echo $year;

$sqlselectyear = "SELECT room_tb.room_name,event_tb.room_id,event_tb.id_event,event_tb.name_event,COUNT(*) as number FROM event_tb,room_tb WHERE event_tb.room_id=room_tb.room_id and substr(start,1,4)='$year' GROUP BY room_id";
$result = mysqli_query($conn,$sqlselectyear);
echo $sqlselectyear; 

 while($datacart = mysqli_fetch_array($result)){

?>

 
 <script>
   google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['ห้องประชุม', 'จำนวนการใช่งาน'],<?php     
       
                        
                               
                               echo "['".$datacart['room_name']."',".$datacart['number']."],";  
                           
                 
                        
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
<div class="card shadow "  id="piechart" style="width:500px;height:400px;margin-left:170px;"></div>  

<?php  
              
              }  ?>
