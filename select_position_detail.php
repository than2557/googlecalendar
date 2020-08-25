<?php

date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
$conn=$DBconnect;

$position = isset($_POST['position']) ? $_POST['position'] : "";


$sql = "SELECT * FROM position_detail  WHERE  id_position ='$position' ";
$result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
		?>
        <option value="<?php echo $row['detail_position_id']; ?>">
        <?php echo $row['detail_position_name'];?> 
        </option>

   <?php }?>


