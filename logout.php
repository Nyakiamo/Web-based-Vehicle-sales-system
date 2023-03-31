<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>

<?php 

session_start();

if(isset($_SESSION["email"]))

{
	$_SESSION = array();


	session_destroy();

	header("Location:index.php");
}


 ?>


</body>
</html>