<?php
    session_start();
    include_once("configDB.php");
    $conn = $DBconnect;
    date_default_timezone_set("Asia/Bangkok");
    $date_stamp =  date("Y-m-d G:i");
    // echo $_SESSION['userName'];
?>

    <!DOCTYPE html>
    <html ng-app='calendarApp' ng-cloak='true'>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Meeting</title>
        
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css'>
      

        <link rel="stylesheet" href="./style.css">
        <style>
             * {
            box-sizing: border-box;
        }

        ul {
            list-style-type: none;
        }

        body {
            font-family: "Lato", sans-serif;
        }

        * {
            margin: 0;
            box-sizing: border-box;
        }

        .wrapper {
            background-color: #dfe6e9;
            width: 100vw;
            height: 100vh;
            display: flex;
        }

        .calendar {
            margin: auto;
            width: 600px;
            background-color: #fff;
            box-shadow: 0px 0px 15px 4px rgba(0, 0, 0, 0.2);
       
        }

        .month {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 40px 30px;
            text-align: center;
            background-color: #2ecc71;
            color: #fff;
        }

        .weekdays {
            background-color: #27ae60;
            color: #fff;
            padding: 7px 0;
            display: flex;
        }

        .days {
            font-weight: 300;
            padding: 10px 0;
            display: flex;
            flex-wrap: wrap;
        }

        .weekdays div,
        .days div {
            text-align: center;
            width: 14.28%;
        }

          .weekdays input,
        .days input {
            text-align: center;
            width: 14.28%;
        }
        .days input {
            padding: 10px 0;
            margin-bottom: 10px;
            transition: all 0.4s;
        }
        

        .days div {
            padding: 10px 0;
            margin-bottom: 10px;
            transition: all 0.4s;
        }
        

        .prev_date {
            color: #999;
        }

        .today {
            background-color: #27ae60;
            color: #fff;
        }

        .days div:hover {
            cursor: pointer;
            background-color: #dfe6e9
        }

        .days input:hover {
            cursor: pointer;
            background-color: #dfe6e9
        }

        .prev,
        .next {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 23px;
            background-color: rgba(0, 0, 0, 0.1);
            transition: all 0.4s;
        }

        .prev:hover,
        .next:hover {
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.2);
        }

        #month {
            font-size: 30px;
            font-weight: 500;
        }
            </style>

    </head>
    <?php      
    
              $username = $_SESSION['userName'];
                    $sql = "SELECT * FROM room_tb WHERE username = '$username'";
                    $result = mysqli_query($conn,$sql);


                   ?>

    <body onload="renderDate()">
        <!-- partial:index.partial.html -->

        <!-- <div class="row mb-4">
            <div class="col text-center">
                <h3>จองห้องประชุม</h3>
                <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">Click to open Modal</a>
            </div>
        </div> -->





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
                                                <label>ชื่อการประชุม</label>
                                                <div>
                                                    <input class="form-control" type="text" id="event" />
                                                </div>
                                                <label>ห้องประชุม</label>
                                                <div>
                                                    <select class="form-control" name="room_id" id="room_id">
                      <option value="--เลือกห้องประชุม--">--เลือกห้องประชุม--</option>
                       <?php while($row = mysqli_fetch_array($result)){ 
                           echo '<option value="'.$row['room_id'].'">'.$row['room_name'].'</option>'; 
                       } ?> 
                   </select>
                                                </div>
                                                <label>วันที่จอง</label>
                                                <div class="input-group date">
                                                    <input class="form-control" placeholder="yyyy-MM-dd" id="date" type="date" /><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></span>
                                                </div>

                                                <label>ถึงวันที่</label>
                                                <div class="input-group date">
                                                    <input class="form-control" placeholder="yyyy-MM-dd" id="enddate" type="date" /><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></span>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label>เวลาเริ่ม</label>
                                                <div class="input-group time" id="timepicker">
                                                    <input class="form-control" type="time" placeholder="เวลาเริ่ม" id="start" /><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-clock"></i></span></span>

                                                </div>

                                                <label>เวลาเสร็จสิ้นการประชุม</label>
                                                <div class="input-group time" id="timepicker">
                                                    <input class="form-control" placeholder="HH:MM AM/PM" type="time" id="endtime" /><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-clock"></i></span></span>

                                                </div>
                                                <label>ช่วงเวลา</label>
                                                <div class="input-group date">
                                                    <select id="time_period" class="form-control">
                                <option value="เต็มวัน">เต็มวัน</option>
                                <option value="ครึ่งวันเช้า">ครึ่งวันเช้า</option>
                                <option value="ครึ่งวันบ่าย">ครึ่งวันบ่าย</option>


                                </select>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary" onclick="sentcalendar()">submit</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



   
  <div class="wrapper">
        <div class="calendar">
            <div class="month">
                <div class="prev" onclick="moveDate('prev')">
                    <span>&#10094;</span>
                </div>
                <div>
                    <h2 id="month"></h2>
                    <p id="date_str"></p>
                </div>
                <div class="next" onclick="moveDate('next')">
                    <span>&#10095;</span>
                </div>
            </div>
            <div class="weekdays">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="days">

            </div>
        </div>
    </div>
    <script>
        var dt = new Date();
        function renderDate() {
            dt.setDate(1);
            var day = dt.getDay();
            var today = new Date();
            var endDate = new Date(
                dt.getFullYear(),
                dt.getMonth() + 1,
                0
            ).getDate();

            var prevDate = new Date(
                dt.getFullYear(),
                dt.getMonth(),
                0
            ).getDate();
            var months = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ]
            document.getElementById("month").innerHTML = months[dt.getMonth()];
            document.getElementById("date_str").innerHTML = dt.toDateString();
            var cells = "";
            for (x = day; x > 0; x--) {
                
                cells += "<div class='prev_date'>" + (prevDate - x + 1) + "</div>";
            }
            console.log(day);
            for (i  = 1; i <= endDate; i++) {
                
                if (i == today.getDate() && dt.getMonth() == today.getMonth()) {cells += "<input  onclick='selectdate()' id='"+i+"day' class='today' value='"+i+"' href='#' data-toggle='modal' data-target='#basicModal' readonly></>"; 
                //  console.log(cells) 
            }  
                else{

                    cells += "<input onclick='selectdate()'id='"+i+"day' class='day' value='"+i+"' href='#' data-toggle='modal' data-target='#basicModal' readonly></input>";
                    // console.log(cells)
                  }
                 

             
            }
     
  document.getElementsByClassName("days")[0].innerHTML = cells;

        
                

        }
        function selectdate(){
            var endDate = new Date(
                dt.getFullYear(),
                dt.getMonth() + 2,
                0
            ).getDate();

            var mon = new Date(
                dt.getFullYear(),
                dt.getMonth() + 1,
                0
            ).getMonth();

            var year = new Date(
                dt.getFullYear(),
                dt.getMonth() + 1,
                0
            ).getFullYear();
            var mons= mon+1;
var datetime = year+'-'+mons+'-'+endDate;
            console.log(datetime)

for(var j=0;j<=endDate;j++){
    
    var date = document.getElementsByClassName("day")[j];
// console.log(date.value)

}


}
        function moveDate(para) {
            if(para == "prev") {
                dt.setMonth(dt.getMonth() - 1);
            } else if(para == 'next') {
                dt.setMonth(dt.getMonth() + 1);
            }
            renderDate();
        }
     
  
    </script>


  
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://code.angularjs.org/1.3.14/angular-animate.js'></script>

        <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>
        <script src="./script.js">
        </script>

    </body>

    </html>