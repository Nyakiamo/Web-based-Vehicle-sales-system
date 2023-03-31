<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 

if(!empty($_POST["username"]) && !empty($_POST["password"]))
{


$DBHOST="localhost";
$DBUSER="Vehiclemanagement";
$DBPWD="Vehiclemanagement123";
$DBNAME="vehiclemanagement";

$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if($conn->connect_error)
	{
		die("Connection error:".$conn->connect_error);
	}

$username= $_POST["username"];


$password= $_POST["password"];


$statement = "SELECT * FROM customer WHERE username = ?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows <= 0)
	{
		$value = "no_account";
		header("Location:delete_buyer.php?customer=$value");
	}

else
{
	$row = $result->fetch_assoc();

	if(password_verify($password, $row["password"]))
		{
			$statement = "DELETE FROM customer WHERE username=?";
			$stmt = $conn->prepare($statement);
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$value = "deleted";
			header("Location:delete_buyer.php?customer=$value");
		}



else
	{
		$value = "wrong_password";
		header("Location:delete_buyer.php?customer=$value");

	}/*verify password after buyer exists, is the password correct */


}/*verify if the user even exists? */

$conn->close();

}



else
	{
		header("Location:delete_buyer.php");
	}








?>

</body>
</html>