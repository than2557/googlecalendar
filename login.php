<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<title></title>
</head>
<body>
	<?php
		require('configDB.php');
		$conn=$DBconnect;
		include("session_check.php"); 
		//require_once("inc/db_connect.php"); 
		$username=$_POST["idem"];
		$password=md5($_POST["password"]);
		echo $username.'<br>';
		echo $password;
		$sql="select * from empolyee where username='$username' and password='$password'";
		$Query=$conn->query($sql);
		//echo $sql;
		$rows = mysqli_num_rows($Query);
		//echo $rows;
		$result = $Query->fetch_assoc();
		if($rows>0 && $result['level']== 0)
		{
			$_SESSION['level']=$result['level'];
			$_SESSION['username']=$username;
			$_SESSION['id_pea']=$result['id_pea'];
			$_SESSION['name']=$result['name'];
			$_SESSION['Department']=$result['Department'];
			//echo "USER";
			?>
				 <meta http-equiv="refresh" content= "0; url=index_user.php">
			<?php
		}
		else if($rows>0 && $result['level']== 1)
		{
			$_SESSION['level']=$result['level'];
			$_SESSION['username']=$username;
			$_SESSION['id_pea']=$result['id_pea'];
			$_SESSION['name']=$result['name'];
			$_SESSION['Department']= $result['Department'];
			//echo "ADMIN";
		?>
				<meta http-equiv="refresh" content= "0; url=index_admin.php">
			<?php
		}
		else
		{ ?>
			<p>

			<?php	echo "Login fail.";?>
				<!--<meta http-equiv="refresh" content= "0; url=index.php">-->
				<!--<meta http-equiv="refresh" content= "2; url=index_real.php">-->

		<?php } ?>


		


</body>
</html>