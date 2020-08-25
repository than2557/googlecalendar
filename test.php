<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<select name="year" id="year" class="form-control"> 
        
             
        </select>   
</body>
<?
$sql = "SELECT date_place, DATE_FORMAT(date_place, '%M'),SUM(total) AS sum FROM orders WHERE date_place !='' and orders.pay_status = '1' and substr(date_place,1,4) = '$years' GROUP BY DATE_FORMAT(date_place, '%m%') ASC";
substr(start,1,4)
DATE_FORMAT(start, '%M')
?>
</html>