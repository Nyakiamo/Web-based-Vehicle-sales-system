<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php 

session_start();

$customer_id = $_SESSION['customer_id'];

if(!empty($_POST["vehicle_type"]) && !empty($_POST["vehicle_number_plate"]) && !empty($_POST["vehicle_description"]) && !empty($_FILES["vehicle_picture"]["name"])  && !empty($_POST["payment_method"]) && !empty($_POST["vehicle_category"]) && !empty($_POST["vehicle_seller"]))
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

$vehicle_type = $_POST["vehicle_type"];
$vehicle_number_plate = $_POST["vehicle_number_plate"];
$vehicle_desc = $_POST["vehicle_description"];
$iipic = $_FILES["vehicle_picture"]["name"];
$vehicle_price = $_POST["vehicle_price"];
$payment_method = $_POST["payment_method"];
$vehicle_category = $_POST["vehicle_category"];
$vehicle_seller = $_POST["vehicle_seller"];
$is_bought = 0;

$statement = "SELECT * FROM vehicle WHERE vehicle_number_plate=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $vehicle_number_plate);
$stmt->execute();

$result = $stmt->get_result();

/*grab from table all see if there is an item of the same name*/

if($result->num_rows >= 1)
{
	$value = "duplicate";
	$conn->close();
	header("Location:add_item.php?vehicle=$value");

}

else
		
{

	$statement = "INSERT INTO vehicle (vehicle_type, vehicle_number_plate, vehicle_desc, vehicle_picture, vehicle_price, payment_method, vehicle_category, vehicle_seller, customer_id,is_bought) VALUES(?,?,?,?,?,?,?,?,?,?)";

	$stmt = $conn->prepare($statement);
	$stmt->bind_param("ssssssssss", $vehicle_type, $vehicle_number_plate, $vehicle_desc, $iipic, $vehicle_price, $payment_method, $vehicle_category, $vehicle_seller, $customer_id,$is_bought);

	print_r($stmt);
	$stmt->execute();

	$value = "successful";
	$conn->close();
	header("Location:add_item.php?vehicle=$value");

} /*insert intotable if item name not duplicate */

}

else
{
			
	header("Location:add_item.php");

}/*verify user not directly accessing*/


?>	

</body>
</html>