<?php
	require_once("idm-service.php");
	$service = new IDMService();
	$username = $_POST["username"];

// echo $username;

$results1 = $service->getEmployeeInfoByUsername("93567815-dfbb-4727-b4da-ce42c046bfca",$username);

// echo '<pre>';
// var_dump($results1);
// echo '</pre>';




$arr = array('1'=>$results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["Username"],
'2'=>$results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["FirstName"],
'3'=>$results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["LastName"],
'4'=>$results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["PositionDescShort"],
'5'=>$results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["LevelDesc"],
'6'=>$results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["DepartmentShort"]
);


echo json_encode($arr);

// print_r($results1);

?>	