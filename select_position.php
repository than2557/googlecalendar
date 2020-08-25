<?php

echo "TEST ajax";
date_default_timezone_set("Asia/Bangkok");
require('configDB.php');
$conn=$DBconnect;

$Department = isset($_POST['Department']) ? $_POST['Department'] : "";


$sql = "SELECT * FROM position  WHERE  id_department ='$Department' ";
$result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
		?>
        <option value="<?php echo $row['id_position']; ?>">
        <?php echo $row['position_name'];?> 
        </option>

   <?php }?>


