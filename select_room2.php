<?php
 date_default_timezone_set("Asia/Bangkok");
 require('configDB.php');
  $conn=$DBconnect;


$room_id = isset($_POST['room_id']) ? $_POST['room_id'] : "";



$sql = "SELECT * FROM room_tb  WHERE  room_id='$room_id ' ";

$result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
    ?>
        <option value="<?php echo $row['room_id']; ?>">
        <?php echo $row['room_name'];?> 
        </option>
   <?php }?>


