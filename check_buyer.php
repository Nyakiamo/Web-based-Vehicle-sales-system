<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php 
if(!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["gender"]) && !empty($_POST["phone"]) && !empty($_POST["password"]) )
{

$DBHOST="localhost";
$DBUSER="Vehiclemanagement";
$DBPWD="Vehiclemanagement123";
$DBNAME="vehiclemanagement";

$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if($conn->connect_error)
	{
		die("Connection failed!".$conn->connect_error);
	}


$username= $_POST["username"];

$firstname= $_POST["firstname"];

$lastname= $_POST["lastname"];

$email= $_POST["email"];

$gender= $_POST["gender"];

$phone= $_POST["phone"];

$password= $_POST["password"];

$isadmin= 0;

$hashed=password_hash($password, PASSWORD_DEFAULT);



$statement = "SELECT * FROM customer WHERE email=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows >= 1)
	{
		$value = "duplicate";
		header("Location:add_buyer.php?customer=$value");
	}

else
	{

		$statement = "INSERT INTO customer(username, firstname, lastname, email, gender, phone, password, isadmin) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($statement);
		$stmt->bind_param("sssssssi", $username, $firstname, $lastname, $email, $gender, $phone, $hashed, $isadmin);
		$stmt->execute();


		$value = "successful";
		header("Location: add_buyer.php?customer=$value");
	}

/*verify if there is a duplicate user*/
 
$conn->close();
} 

else
	{

		header("Location:add_buyer.php");
	}

/*verify user not direclty accessing this page*/
?>
</body>
</html>