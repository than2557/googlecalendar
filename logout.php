<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ออกจากระบบ</title>
</head>
<body>
<meta  http-equiv="refresh" content="0; url = index.html"> 
<script type="text/javascript">
	window.location.href="index.php"
</script>
</body>
</html>