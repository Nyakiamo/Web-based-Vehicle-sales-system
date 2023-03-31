<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php 

//prevents the user from accessing the page directly
if(!empty($_POST["email"]) && !empty($_POST["password"]))
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



//bidning parameter
$statement = "SELECT * FROM  customer WHERE email=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();
$hash = $row["password"];
//get the admin field
$isadmin=$row['isadmin'];


//hashed password verifier 

if(password_verify($_POST["password"], $hash))

	{

		echo "Successful Login";

		session_start();
		$_SESSION["username"] = $_POST["username"];
		$_SESSION["email"] = $row["email"];
		$_SESSION["customer_id"] = $row["customer_id"];
		$_SESSION['isadmin'] = $isadmin;
		$conn->close();
		header("Location:display_vehicles.php");
	}


else
	{

		echo "Login Failed, try again";
		echo "<br>";

		$conn->close();
		header("Location:relogin.php");

	}/* verifies if user has entered correct password*/
}

else
	{
		header("Location:login.php");


	}/* verify user not directly accessing this page */


 ?>	

</body>
</html>