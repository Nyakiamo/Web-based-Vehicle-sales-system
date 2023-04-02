<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php 


if(!empty($_POST["email"]) && !empty($_POST["opassword"]) && !empty($_POST["npassword"]))
{

$DBHOST = "localhost";
$DBUSER = "Vehiclemanagement";
$DBPWD = "Vehiclemanagement123";
$DBNAME = "vehiclemanagement";


$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if($conn->connect_error)
	{

		die("Connection failed!".$conn->connect_error);
	}



$email = $_POST["email"];
$npassword = $_POST["npassword"];

$statement = "SELECT * FROM  customer WHERE email=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();
$hash = $row["password"];


if(password_verify($_POST["opassword"], $hash))


	{
		echo "Password Successfully changed!"
		echo "<br>";
		echo "<a href='display_vehicles.php'><button>Ok</button></a>";


		$statement = "UPDATE customer SET password=? WHERE email=?";
		$phash = password_hash($npassword, PASSWORD_DEFAULT);
		$stmt = $conn->prepare($statement);
		$stmt->bind_param("ss", $phash, $email);
		$stmt->execute();

		
	}

	else
	{
		echo "wrong old password!";
		echo "<br>";
		echo "<a href='passwd_reset.php'><button>Try Again</button></a>";
	}

}

else
{
			
	header("Location:passwd_reset.php");

}/*verify user not directly accessing*/

?>	
</body>
</html>