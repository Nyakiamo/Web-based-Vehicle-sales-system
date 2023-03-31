<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
session_start();


if(!empty($_POST["vehicle_id"]) && !empty($_POST["email"] ))
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


	$iid = $_POST['vehicle_id'];
	$customer_email = $_POST['email'];
	$vehicle_price = $_POST['vehicle_price'];
	$seller_id = $_POST['seller_id'];
	$transaction_code = $_POST['transaction_code'];

	$statement = "SELECT email FROM  customer WHERE customer_id=?";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("s", $seller_id);
	$stmt->execute();

	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	$seller_email = $row['email'];





	$statement = "INSERT INTO payements(vehicle_id, customer_email, seller_email, vehicle_price, transaction_code) VALUES(?, ?, ?, ?, ?)";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("sssds", $iid, $customer_email, $seller_email, $vehicle_price, $transaction_code);
	$stmt->execute();



	$statement = "UPDATE vehicle SET is_bought= 1 WHERE vehicle_id=?";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("s", $iid);
	$stmt->execute();
	

header("Location:vehicle_details.php");
}


else{

	header("Location:vehicle_details.php");
}

?>	 


</body>
</html>