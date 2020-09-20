<?php
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
 $conn=$DBconnect;

$id_event=$_POST['id_event'];
echo "TESTPOST:".$id_event;

$sql= "UPDATE `event_tb` SET `status_event` = 0 WHERE id_event = $id_event";
$Query = mysqli_query($conn,$sql);
echo $sql;

?>