
</html>
<!DOCTYPE html>
<html>
<?

session_start();
include_once("configDB.php");
$conn = $DBconnect;
date_default_timezone_set("Asia/Bangkok");
$date_stamp =  date("Y-m-d G:i");
echo $_SESSION['userName'];

?>
<head>
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

<body onload="renderDate()">
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
                 console.log(cells) }  else{

                    cells += "<input onclick='selectdate()'id='"+i+"day' class='day' value='"+i+"' href='#' data-toggle='modal' data-target='#basicModal' readonly></input>";
                    console.log(cells)
                  }
                 

             
            }
     
  document.getElementsByClassName("days")[0].innerHTML = cells;

        
                

        }
        function selectdate(){
            var endDate = new Date(
                dt.getFullYear(),
                dt.getMonth() + 1,
                0
            ).getDate();

            var mon =new new Date(
                dt.getFullYear(),
                dt.getMonth() + 1,
                0
            ).getMonth();

            console.log(mon)

for(var j=0;j<=endDate;j++){
    
    var date = document.getElementsByClassName("day")[j];
console.log(date.value)

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



</body>

</html>