<?php

date_default_timezone_set("Asia/Bangkok");
        require('configDB.php');
         $conn=$DBconnect;

         $username = $_POST['username'];

         $sql = "SELECT * FROM  empolyee WHERE username = '$username'";
         $result = mysqli_query($conn,$sql);
         $datausername = mysqli_fetch_array($result);
         if($datausername == 0){

        echo "0";

         }
         else{

            echo "1";

         }




?>