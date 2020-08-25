


<?php
    session_start();

?>	

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <!-- <script src="/phpexcel/lib/Jquery/jquery.js"></script> -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php
require_once("idm-service.php");
$service = new IDMService();
$userName = $_POST["idem"];
$password =$_POST["password"];
echo $userName.'<br>';
echo $password.'<br>';
$authenKey = "3a243291-44d0-4171-8b17-347cfc1472ea";

$results1 = $service->login($authenKey,$userName, $password);

$arr= array('1'=>$results1["LoginResult"]["ResultObject"]["Result"]);


echo $arr[1].'<br>';
// print_r($results1);

if($arr[1]=="true"){

$_SESSION['userName'] = $userName;
    ?>  
<meta http-equiv="refresh" content= "0; url=index_admin.php">    
    <?php
    }
else
{ ?>  

<meta http-equiv="refresh" content= "0; url=page.php">    

<?php } ?>
</body>
</html>