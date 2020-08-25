<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php

date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;

$id_event = $_GET['id_event'];
$sql = "delete from event_tb where id_event=$id_event";
$conn->query($sql);

echo $sql;    
?>
<meta http-equiv="refresh" content="0; url =displaydata.php">
</body>
</html>